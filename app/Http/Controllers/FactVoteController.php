<?php

namespace App\Http\Controllers;

use App\Models\DimCity;
use App\Models\DimLocation;
use App\Models\FactPollingStation;
use App\Models\FactVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FactVoteRequest;

class FactVoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('role.typist');
    }

    /** Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // $dim_cities = DimCity::select('id', 'description')->get();

        $dim_cities = DB::select('
            SELECT DISTINCT dc.id as value, dc.description as label 
            from fact_polling_stations fps
                inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            where fp.fk_users = ? ;
        ', [Auth::user()->id]);

        $data = [
            'dim_cities' => $dim_cities,
            'status' => 200
        ];
        return view('factvote/create', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FactVoteRequest $request)
    {
        //
        $validado = $request->validated();
        var_dump($validado);


        DB::beginTransaction();

        try {

            FactVote::create([
                'fk_fact_polling_stations' => $validado['mesvot'],
                'fk_fact_candidates' => 1,
                'ip' => request()->ip(),
                'amount' => $validado['l101'],
                'fk_users' => Auth::user()->id
            ]);

            FactVote::create([
                'fk_fact_polling_stations' => $validado['mesvot'],
                'fk_fact_candidates' => 2,
                'ip' => request()->ip(),
                'amount' => $validado['l102'],
                'fk_users' => Auth::user()->id
            ]);

            FactVote::create([
                'fk_fact_polling_stations' => $validado['mesvot'],
                'fk_fact_candidates' => 3,
                'ip' => request()->ip(),
                'amount' => $validado['l103'],
                'fk_users' => Auth::user()->id
            ]);


            DB::commit();

            return redirect()->route('factvote')->with(['message' => 'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('factvote')->with(['message' => 'Error', 'Code' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactVote  $factVote
     * @return \Illuminate\Http\Response
     */
    public function show(FactVote $factVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactVote  $factVote
     * @return \Illuminate\Http\Response
     */
    public function edit(FactVote $factVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactVote  $factVote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FactVote $factVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactVote  $factVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(FactVote $factVote)
    {
        //
    }

    public function SearchLocation($id)
    {
        try {

            // $dim_locations = DB::select('
            //     SELECT DISTINCT dl.id as value, dl.description as label 
            //     from fact_polling_stations fps
            //         inner join dim_locations dl on ( fps.fk_dim_locations = dl.id )
            //         inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            //     where fps.fk_dim_cities = ?
            //         and fp.fk_users = ? ;
            // ', [$id, Auth::user()->id]);

            $dim_locations = DB::select('
            SELECT DISTINCT dl.id as value, dl.description as label 
            from fact_polling_stations fps
                inner join dim_locations dl on ( fps.fk_dim_locations = dl.id )
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            where fps.fk_dim_cities = ?
                and (SELECT COUNT(*)  as label 
                    from fact_polling_stations fps2 
                        inner join fact_permits fp2 on ( fps2.id = fp2.fk_fact_polling_stations )
                        inner join dim_tables dt on ( fps2.fk_dim_tables = dt.id )
                    where fk_dim_locations = dl.id
                        and fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes )
                        and fp2.fk_users = fp.fk_users) > 0
                and fp.fk_users = ? ;
            ', [$id, Auth::user()->id]);

            if ($dim_locations) {
                return response()->json($dim_locations, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function SearchTable($id)
    {
        try {

            $dim_tables = DB::select('
            SELECT fps.id as value, dt.description as label from fact_polling_stations fps 
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
                inner join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            where fk_dim_locations = ?
                and fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes )
                and fp.fk_users = ?;
            ', [$id, Auth::user()->id]);

            if ($dim_tables) {
                return response()->json($dim_tables, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function VotesAlcaldia(){

        $data = [
            "Egdumar Chavez Arana",
            "Juan Alfredo Quenza",
            "Camilo Andres Gonzalez",
            "Wilson Hernando Perez",
            "Yomar Asdrubal Reyes",
            "William Paul Leon Roa",
            "Jose Hernando Gonzalez",
            "Oscar Mariño Montaño",
            "Andres Padilla Avila",
            "Ehiana Galeano Reyes",
            "Roger Alcides Cisneros",
            "Dumar Jose Quintero",
            "Juan Carlos Castañeda",
            "Votos en Blanco",
            "Votos Nulos",
            "Votos No Marcados",
            "Total Votos"
        ];

        return view('factvote.votesalcaldia',["data" => $data]);

    }
}
