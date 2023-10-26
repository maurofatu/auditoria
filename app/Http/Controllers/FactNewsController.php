<?php

namespace App\Http\Controllers;

use App\Models\FactPermit;
use App\Models\FactPollingStation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
}
