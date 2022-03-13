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

        $cities = array(
            '1' => 'Arauca',
            '2' => 'Arauquita',
            '3' => 'Cravo Norte',
            '4' => 'Fortul',
            '5' => 'Puerto Rondon',
            '6' => 'Saravena',
            '7' => 'Tame',
        );
        
        $data = [
            'cities' => $cities,
            'status' => 200
        ];

        return view('home', ["data" => $data]);
    }

    public function CountVotes()
    {
        return view('countvotes');
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

    public function CountVotesRequest(){

        $countVotesRequest = DB::select('SELECT  idCity, city, idLocation, location, sum(cantidad) as cant FROM (
                SELECT dc.id as idCity, dc.description as city,dl.id as idLocation, dl.description as location, fcv.fk_fact_polling_stations as mesa, 
                max(amount) as cantidad 
                FROM fact_count_votes fcv 
                INNER JOIN fact_polling_stations fps on ( fcv.fk_fact_polling_stations = fps.id )
                INNER JOIN dim_locations dl on ( fps.fk_dim_locations = dl.id )
                INNER JOIN dim_cities dc on ( fps.fk_dim_cities = dc.id) 
                group by fk_fact_polling_stations 
        ) as result
        GROUP by idCity,city,idLocation, location');

        return $countVotesRequest;

    }

    public function PotentialVotersRequest($id){
        
        $potentialvoters = DB::select('select sum(fpv.amount) as cant from fact_potential_voters fpv
        inner join fact_polling_stations fps ON fps.id = fpv.fk_fact_polling_stations
       where fps.fk_dim_locations = ?', [$id]);

       return $potentialvoters[0];

    }

}
