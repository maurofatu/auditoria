<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactCountVoteRequest;
use App\Models\FactCountVotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FactCountVotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('role.countvotes');
    }

    /** Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dim_cities = DB::select('
            SELECT DISTINCT dc.id as value, dc.description as label 
            from fact_polling_stations fps
                inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )', []);

            

        $data = [
            'dim_cities' => $dim_cities,
            'status' => 200
        ];
        return view('factcountvote/create', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FactCountVoteRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try{

            FactCountVotes::create([
                'fk_fact_polling_stations' => $data['mesvotfcv'],
                'ip' => request()->ip(),
                'amount' => $data['countvotes'],
                'fk_users' => Auth::user()->id
            ]);


        DB::commit();

        return redirect()->route('factcountvote.create')->with(['messagefcv'=>'Success']);

    } catch (\Exception $e){
        DB::rollback();
        return redirect()->route('factcountvote.create')->with(['messagefcv'=>'Error', 'Codefcv' => $e->getMessage()]);
    }

    }

    public function SearchLocationFcv($id)
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

    public function SearchTableFcv($id)
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
