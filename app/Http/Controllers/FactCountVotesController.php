<?php

namespace App\Http\Controllers;

use App\Http\Requests\FactCountVoteRequest;
use App\Models\FactCountVotes;
use App\Models\FactPotentialVoter;
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
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $dim_cities = DB::select('
//            SELECT DISTINCT dc.id as value, dc.description as label
//            from fact_polling_stations fps
//                inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )', []);

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

        try {

            FactCountVotes::create([
                'fk_fact_polling_stations' => $data['mesvotfcv'],
                'ip' => request()->ip(),
                'amount' => $data['countvotes'],
                'fk_users' => Auth::user()->id
            ]);

            if (isset($data['potentialvotes'])) {

                FactPotentialVoter::create([
                    'fk_fact_polling_stations' => $data['mesvotfcv'],
                    'ip' => request()->ip(),
                    'amount' => $data['potentialvotes'],
                    'fk_users' => Auth::user()->id
                ]);
            }


            DB::commit();

            return redirect()->route('factcountvote.create')->with(['messagefcv' => 'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('factcountvote.create')->with(['messagefcv' => 'Error', 'Codefcv' => $e->getMessage()]);
        }
    }

    public function SearchLocationFcv($id)
    {
        try {

//            $dim_locations = DB::select('SELECT DISTINCT dl.id as value, dl.description as label
//                from fact_polling_stations fps
//                join dim_cities dc on ( fps.fk_dim_cities = dc.id )
//                join dim_locations dl on ( fps.fk_dim_locations = dl.id )
//            where dc.id = ?', [$id]);
            $dim_locations = DB::select('
            SELECT DISTINCT dl.id as value, dl.description as label
            from fact_polling_stations fps
                inner join dim_locations dl on ( fps.fk_dim_locations = dl.id )
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            where fps.fk_dim_cities = ?
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

    public function SearchTableFcv($id)
    {
        try {

//            $dim_tables = DB::select('SELECT fps.id as value, dt.description as label from fact_polling_stations fps
//            join dim_locations dl on ( fps.fk_dim_locations = dl.id )
//            join dim_tables dt on ( fps.fk_dim_tables = dt.id )
//            where dl.id = ?', [$id]);

            $dim_tablesfcv = DB::select('
            SELECT fps.id as value, dt.description as label from fact_polling_stations fps
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
                inner join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            where fk_dim_locations = ?
                and fp.fk_users = ?
                and fps.fk_dim_elections = 2;
            ', [$id, Auth::user()->id]);

            if ($dim_tablesfcv) {
                return response()->json($dim_tablesfcv, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function searchPotential($id)
    {
        try {

            $potential = DB::select('SELECT * FROM fact_potential_voters
            WHERE fk_fact_polling_stations = ?', [$id]);

            $npotential = DB::select('SELECT amount FROM fact_potential_voters
            WHERE fk_fact_polling_stations = ?', [$id]);

            $countvotes = DB::select('SELECT * FROM fact_count_votes
            WHERE fk_fact_polling_stations = ?', [$id]);

            $potential = $potential ? true : false;
            
            $data = [
                "count" => $potential,
                "amount" => $npotential,
                "countvotes" => $countvotes
            ];
                
            return $data;
            
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function news()
    {

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
        return view('factcountvote/news', ["data" => $data]);
    }

    public function storenews(FactCountVoteRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();

        try {

            


            DB::commit();

            return redirect()->route('factcountvote.create')->with(['messagefcv' => 'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('factcountvote.create')->with(['messagefcv' => 'Error', 'Codefcv' => $e->getMessage()]);
        }
    }
}
