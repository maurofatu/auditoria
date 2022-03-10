<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role.monitor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function SearchVotes()
    {
        try {

            $count_votes = DB::select('SELECT sum(fv.amount) as votes, fc.id as candidate FROM fact_votes fv
            right join fact_candidates fc on fc.id = fv.fk_fact_candidates 
            GROUP BY (fc.id)');

            return $count_votes;

            if ($count_votes) {
                return response()->json($count_votes, 200);
            } else {
                return response()->json(['message' => 'No se encontró votos imbecil'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function CitiesRequest(){

        $cities_request = DB::select('SELECT fv.fk_fact_candidates as candidate,fps.fk_dim_cities as city, sum(fv.amount) as votes 
        FROM fact_votes fv
        INNER JOIN fact_polling_stations fps on fps.id = fv.fk_fact_polling_stations
        GROUP BY fps.fk_dim_cities, fv.fk_fact_candidates
        ORDER BY city');

        return $cities_request;

    }

}
