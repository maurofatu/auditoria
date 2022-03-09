<?php

namespace App\Http\Controllers;

use App\Models\DimCity;
use App\Models\DimLocation;
use App\Models\FactPollingStation;
use App\Models\FactVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactVoteController extends Controller
{
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

        $dim_cities = DimCity::select('id', 'description')->get();
        $data = [
            'dim_cities' => $dim_cities,
            'status' => 200
        ];
        return view('facvote/create', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

            $dim_locations = DB::select('SELECT DISTINCT dl.id as value, dl.description as label 
                from fact_polling_stations fps
                join dim_cities dc on ( fps.fk_dim_cities = dc.id )
                join dim_locations dl on ( fps.fk_dim_locations = dl.id )
            where dc.id = ?', [$id]);

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

            $dim_tables = DB::select('SELECT dt.id as value, dt.description as label from fact_polling_stations fps
            join dim_locations dl on ( fps.fk_dim_locations = dl.id )   
            join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            where dl.id = ?', [$id]);

            if ($dim_tables) {
                return response()->json($dim_tables, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
