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

        // return redirect()->route('factvote.votes')->with(['message' => 'Success']);
        // return "hooola";

        $election = $validado['election'];

        $dim_people = DB::select('
        SELECT fc.id as id  FROM fact_candidates fc
        inner join dim_people dp on (fc.fk_dim_people = dp.id)   
        where fk_dim_elections = ?', [$election]);


        DB::beginTransaction();

        try {

            foreach($dim_people as $item){
           
                $iid = "vote" . $item->id . "";
                FactVote::create([
                    'fk_fact_polling_stations' => $validado['mesvot'],
                    'fk_fact_candidates' => $item->id,
                    'ip' => request()->ip(),
                    'amount' => $validado['vote'.$item->id],
                    'fk_users' => Auth::user()->id,
                    'fk_dim_elections' => $election
                ]);

            }


            DB::commit();

            return redirect()->route('factvote.votes',$election)->with(['message' => 'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('factvote.votes',$election)->with(['message' => 'Error', 'Code' => $e->getMessage()]);
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

    public function SearchLocation($id,$election)
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
                        and fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes where fk_dim_elections = ?)
                        and fp2.fk_users = fp.fk_users) > 0
                and fp.fk_users = ? ;
            ', [$id, $election, Auth::user()->id]);

            if ($dim_locations) {
                return response()->json($dim_locations, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function SearchTable($id,$election)
    {
        try {

            $dim_tables = DB::select('
            SELECT fps.id as value, dt.description as label from fact_polling_stations fps 
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
                inner join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            where fk_dim_locations = ?
                and fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes where fk_dim_elections = ?)
                and fp.fk_users = ?;
            ', [$id, $election, Auth::user()->id]);

            if ($dim_tables) {
                return response()->json($dim_tables, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function Votes($id){

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
        
        $dim_people = DB::select('
        SELECT CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, fc.id as id  FROM fact_candidates fc
        inner join dim_people dp on (fc.fk_dim_people = dp.id)   
        where fk_dim_elections = ?', [$id]);


        return view('factvote.votes',["dim_people" => $dim_people, "id" => $id,"data" => $data]);

    }
}
