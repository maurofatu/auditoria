<?php

namespace App\Http\Controllers;

use App\Models\DimTypesNews;
use App\Models\FactNews;
use App\Models\FactPermit;
use App\Models\FactPollingStation;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FactNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role.coordinator');
    }

    /** Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fact_permits = FactPermit::firstWhere('fk_users', Auth::user()->id);

        $fact_polling_station = DB::select('
        SELECT 
            fk_dim_cities,
            fk_dim_locations,
            fk_dim_tables,
            SUM(CASE WHEN fn.status = "S" THEN 1 ELSE 0 END) AS cantidad_s,
            SUM(CASE WHEN fn.status = "G" THEN 1 ELSE 0 END) AS cantidad_g,
            SUM(CASE WHEN fn.status = "D" THEN 1 ELSE 0 END) AS cantidad_d
        FROM fact_polling_stations fps
        LEFT JOIN fact_news fn ON fps.id = fn.fk_fact_polling_stations
        WHERE fps.fk_dim_cities = ?
        AND fps.fk_dim_locations = ?
        GROUP BY fk_dim_cities, fk_dim_locations, fk_dim_tables', [
            $fact_permits->factPollingStation->fk_dim_cities,
            $fact_permits->factPollingStation->fk_dim_locations
        ]);

        $data = [
            'fact_permits' => $fact_permits,
            'fact_polling_station' => $fact_polling_station
        ];
        return view('coordinators.index', ["data" => $data]);
    }

    public function find($city, $location, $table)
    {
        $fact_permits = FactPermit::firstWhere('fk_users', Auth::user()->id);

        $conteo = [
            "S" => 0,
            "G" => 0,
            "D" => 0,
            "T" => 0
        ];

        $fact_news = DB::table('fact_polling_stations as fps')
            ->selectRaw('fn.id, DATE_FORMAT(fn.created_at, "%H:%i:%s") as hora, dtn.description as type, fn.status as code_status')
            ->addSelect(DB::raw('CASE WHEN fn.status = "S" THEN "Sin gestionar" WHEN fn.status = "G" THEN "Gestionada" WHEN fn.status = "D" THEN "Direccionado" END as status'))
            ->join('fact_news as fn', 'fps.id', '=', 'fn.fk_fact_polling_stations')
            ->join('dim_types_news as dtn', 'fn.fk_dim_types_news', '=', 'dtn.id')
            ->where('fps.fk_dim_cities', $city)
            ->where('fps.fk_dim_locations', $location)
            ->where('fps.fk_dim_tables', $table)
            ->paginate(10);

        $conteo = DB::select('
        SELECT
            SUM(CASE WHEN fn.status = "S" THEN 1 ELSE 0 END) AS S,
            SUM(CASE WHEN fn.status = "G" THEN 1 ELSE 0 END) AS G,
            SUM(CASE WHEN fn.status = "D" THEN 1 ELSE 0 END) AS D
        FROM fact_polling_stations fps
        LEFT JOIN fact_news fn ON fps.id = fn.fk_fact_polling_stations
        WHERE fps.fk_dim_cities = ?
        AND fps.fk_dim_locations = ?
        and fk_dim_tables = ?
        GROUP BY fk_dim_cities, fk_dim_locations', [
            $city,
            $location,
            $table
        ]);

        if (!empty($conteo)) {
            $conteo = $conteo[0];
        } else {
            $conteo = json_decode(json_encode([
                "S" => 0,
                "D" => 0,
                "G" => 0
            ]), false);
        }

        $data = [
            'fact_permits' => $fact_permits,
            'fact_news' => $fact_news,
            'conteo' => $conteo
        ];
        return view('coordinators.find', ["data" => $data]);
    }

    public function edit($id)
    {
        $fact_permits = FactPermit::firstWhere('fk_users', Auth::user()->id);

        $fact_new = FactNews::find($id);
        $dim_types_news = DimTypesNews::get();

        $dim_status = [
            ["value" => "S", "label" => 'Sin direccionar'],
            ["value" => "G", "label"  => 'Gestionada'],
            ["value" => "D", "label"  => 'Direccionada']
        ];

        $data = [
            'fact_permits' => $fact_permits,
            'fact_new' => $fact_new,
            'dim_types_news' => $dim_types_news,
            'dim_status' => $dim_status
        ];
        return view('coordinators.edit', ["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        // $fact_permits = FactPermit::firstWhere('fk_users', Auth::user()->id);

        // $fact_new = FactNews::find($id);
        // $dim_types_news = DimTypesNews::get();

        // $dim_status = [
        //     ["value" => "S", "label" => 'Sin direccionar'],
        //     ["value" => "G", "label"  => 'Gestionada'],
        //     ["value" => "D", "label"  => 'Direccionada']
        // ];

        // $data = [
        //     'fact_permits' => $fact_permits,
        //     'fact_new' => $fact_new,
        //     'dim_types_news' => $dim_types_news,
        //     'dim_status' => $dim_status
        // ];
        return redirect()->route('coordinators.update', $id)->with(['success', 'Elemento actualizado con éxito']);
    }
}
