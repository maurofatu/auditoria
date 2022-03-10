<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $this->middleware('auth');
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

            $count_votes = DB::select('SELECT format(sum(amount),0) as votes,fk_fact_candidates as candidate FROM fact_votes
            GROUP BY (fk_fact_candidates)');

            if ($count_votes) {
                return response()->json($count_votes, 200);
            } else {
                return response()->json(['message' => 'No se encontró votos'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

}
