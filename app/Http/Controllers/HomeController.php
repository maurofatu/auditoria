<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $potentialreal;

    public function __construct()
    {
        // $this->middleware('role.typist');
        $this->potentialreal = array(
            '00' => '215756',
            '1' => '81211',
            '2' => '38250',
            '3' => '35125',
            '4' => '3795',
            '5' => '13575',
            '6' => '3974',
            '7' => '39826',
            '11' => '12742',
            '12' => '7103',
            '13' => '2053',
            '14' => '1259',
            '15' => '7951',
            '16' => '11851',
            '17' => '8764',
            '18' => '31',
            '19' => '7318',
            '110' => '4500',
            '111' => '8792',
            '112' => '3979',
            '113' => '241',
            '114' => '687',
            '115' => '265',
            '116' => '1238',
            '117' => '631',
            '118' => '812',
            '119' => '557',
            '120' => '200',
            '121' => '237',
            '222' => '7313',
            '223' => '7008',
            '224' => '3894',
            '225' => '6159',
            '226' => '4173',
            '227' => '1336',
            '228' => '123',
            '229' => '145',
            '230' => '182',
            '231' => '450',
            '232' => '576',
            '233' => '3696',
            '234' => '52',
            '235' => '2125',
            '236' => '404',
            '237' => '614',
            '338' => '5500',
            '339' => '5599',
            '340' => '5140',
            '341' => '5170',
            '342' => '1814',
            '343' => '3696',
            '344' => '1222',
            '345' => '1219',
            '346' => '1508',
            '347' => '501',
            '348' => '189',
            '349' => '54',
            '350' => '31',
            '351' => '3482',
            '452' => '3766',
            '453' => '29',
            '554' => '6067',
            '555' => '4544',
            '556' => '842',
            '557' => '1720',
            '558' => '402',
            '652' => '3974',
            '759' => '6751',
            '760' => '8577',
            '761' => '5830',
            '762' => '2248',
            '763' => '4676',
            '764' => '8091',
            '765' => '253',
            '766' => '2902',
            '767' => '273',
            '768' => '225',
            );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( in_array( Auth::user()->fk_roles, [4] ) ){
            return redirect()->route('monitor.dashboard');
        }
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

    public function Format(){

        $name = Auth::user()->name;
        $locuser = preg_replace('/[0-9]+/', '', $name);
        $horaActual = Carbon::now();
        $horaComparacion = Carbon::createFromTime(16, 0, 0); // Crear una instancia de Carbon para las 16:00

        // $bool = $horaActual->greaterThan($horaComparacion) ? true : false;
        $bool = true;

        return view('format', ["name" => $locuser, "hora" => $bool, "ha" => $horaActual]);
    }

    public function CountVotes()
    {
        $this->middleware('role.typist');
        return view('countvotes');
    }

    public function SearchVotes()
    {
        $this->middleware('role.typist');
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
        $this->middleware('role.typist');

        // $countVotesRequest = DB::select('SELECT  idCity, city, idLocation, location, sum(cantidad) as cant FROM (
        //         SELECT dc.id as idCity, dc.description as city,dl.id as idLocation, dl.description as location, fcv.fk_fact_polling_stations as mesa, 
        //         max(amount) as cantidad 
        //         FROM fact_count_votes fcv 
        //         INNER JOIN fact_polling_stations fps on ( fcv.fk_fact_polling_stations = fps.id )
        //         INNER JOIN dim_locations dl on ( fps.fk_dim_locations = dl.id )
        //         INNER JOIN dim_cities dc on ( fps.fk_dim_cities = dc.id) 
        //         group by fk_fact_polling_stations 
        // ) as result
        // GROUP by idCity,city,idLocation, location order by idCity');

        $falt = DB::select('SELECT dc.description as city, dl.description as location, dt.description as mesa 
        from fact_polling_stations fps 
            inner join dim_cities dc ON (fps.fk_dim_cities=dc.id)
            inner join dim_locations dl on (fps.fk_dim_locations=dl.id)
            inner join dim_tables dt ON (fps.fk_dim_tables=dt.id)
            where fps.id not in (SELECT DISTINCT fk_fact_polling_stations from fact_votes)
        order by fps.id');

        return $falt;

    }

    public function PotentialVotersRequest($id){
        $this->middleware('role.typist');
        $potentialvoters = DB::select('select sum(fpv.amount) as cant from fact_potential_voters fpv
        inner join fact_polling_stations fps ON fps.id = fpv.fk_fact_polling_stations
       where fps.fk_dim_locations = ?', [$id]);

       return $potentialvoters[0];

    }

    public function dashboard(){

        $dim_cities = DB::select('
            SELECT DISTINCT dc.id as value, dc.description as label
            from fact_polling_stations fps
            inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )
            order by value
        ');

        $data = [
            'dim_cities' => $dim_cities,
            'status' => 200
        ];

        return view('monitor.dashboard',["data" => $data]);

    }

    public function GraphicsCountVotes(){

        // $dim_cities = DB::select('
        //     SELECT DISTINCT dc.id as value, dc.description as label
        //     from fact_polling_stations fps
        //     inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )
        //     order by value
        // ');

        // $data = [
        //     'dim_cities' => $dim_cities,
        //     'status' => 200
        // ];

        // return view('monitor.dashboard',["data" => $data]);
        return view('monitor.graphicscountvotes');

    }

    public function graphicsAlcaldia(){
        return view('monitor.graphicsalcaldia');
    }

    public function graphicsgobernacion(){
        return view('monitor.graphicsgobernacion');
    }

    public function searchlocationCountVotesDash($id)
    {
        try {

         $dim_locations = DB::select('
         SELECT DISTINCT dl.id as value, dl.description as label
         from fact_polling_stations fps
             inner join dim_locations dl on ( fps.fk_dim_locations = dl.id )
         where fps.fk_dim_cities = ? ;
            ', [$id]);

            if ($dim_locations) {
                return response()->json($dim_locations, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 302);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function searchCountVotesDash($id){

        try {

            $cvotesdash = DB::select('
            SELECT amount, HOUR(TIME(created_at)) as hora  from fact_count_votes fcv 
            where fk_fact_polling_stations in (select id from fact_polling_stations where fk_dim_locations = ?)
            order by created_at  
            ', [$id]);

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_locations = ?  
            ', [$id]);

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_locations = ? and fk_dim_elections = 2; 
            ', [$id]);

            $potentialr = DB::select('
            select distinct fk_dim_cities as city, fk_dim_locations as local from fact_polling_stations fps 
            where fps.fk_dim_locations = ? 
            ', [$id]);

            $x = $potentialr['0']->city;
            $y = $potentialr['0']->local;
            
            $datapotential = $this->potentialreal[$x.$y];


   
               if ($cvotesdash) {
                   return response()->json(["cvotesdash" => $cvotesdash, "potential" => $potential,"cantable" => $cantable,"potentialreal" => $datapotential, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchCountVotesDepDash($id){

        try {

            $cvotesdash = DB::select('
            SELECT amount, HOUR(TIME(created_at)) as hora  from fact_count_votes fcv 
            where fk_fact_polling_stations in (select id from fact_polling_stations where fk_dim_cities = ?)
            order by created_at  
            ', [$id]);

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_cities = ?  
            ', [$id]);

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_cities = ? and fk_dim_elections = 2; 
            ', [$id]);

            $datapotential = $this->potentialreal[$id];


   
               if ($cvotesdash) {
                   return response()->json(["cvotesdash" => $cvotesdash, "potential" => $potential,"cantable" => $cantable,"potentialreal" => $datapotential, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchCountVotesFDash(){

        try {

            $cvotesdash = DB::select('
            SELECT amount, HOUR(TIME(created_at)) as hora  from fact_count_votes fcv 
            where fk_fact_polling_stations in (select id from fact_polling_stations)
            order by created_at  
            ');

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)  
            ');

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fk_dim_elections = 2; 
            ');

            $datapotential = $this->potentialreal['00'];


   
               if ($cvotesdash) {
                   return response()->json(["cvotesdash" => $cvotesdash, "potential" => $potential, "potentialreal" => $datapotential, "cantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchGobernacionDash($id){

        try {

            $gobvotedash = DB::select('
            select fc.id,CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, SUM(amount) as amount from fact_candidates fc 
            inner join fact_votes fv on ( fv.fk_fact_candidates = fc.id )
            inner join dim_people dp on (fc.fk_dim_people = dp.id)
            where fc.id <> 31
            and fv.fk_fact_polling_stations in (select id from fact_polling_stations where fk_dim_locations = ? and fk_dim_elections = 2)   
            group by fc.id order by amount desc  
            ', [$id]);

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_locations = ?  
            ', [$id]);

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_locations = ?  
            ', [$id]);

            $potentialr = DB::select('
            select distinct fk_dim_cities as city, fk_dim_locations as local from fact_polling_stations fps 
            where fps.fk_dim_locations = ? 
            ', [$id]);

            $x = $potentialr['0']->city;
            $y = $potentialr['0']->local;
            
            $datapotential = $this->potentialreal[$x.$y];

          
   
               if ($gobvotedash) {
                   return response()->json(["gobvotedash" => $gobvotedash, "potential" => $potential,"gobpotentialreal" => $datapotential, "cantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchGobernacionFDash($id){

        try {

            $gobvotedash = DB::select('
            select fc.id,CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, SUM(amount) as amount from fact_candidates fc 
            inner join fact_votes fv on ( fv.fk_fact_candidates = fc.id )
            inner join dim_people dp on (fc.fk_dim_people = dp.id)
            where fc.id <> 31
            and fv.fk_fact_polling_stations in (select id from fact_polling_stations where  fk_dim_cities = ? and fk_dim_elections = 2)   
            group by fc.id order by amount desc 
            ', [$id]);

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_cities = ?  
            ', [$id]);

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_cities = ?  
            ', [$id]);

            $datapotential = $this->potentialreal[$id];


   
               if ($gobvotedash) {
                   return response()->json(["gobvotedash" => $gobvotedash, "potential" => $potential,"gobpotentialreal" => $datapotential,"cantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchGobernacionDepDash(){

        try {

            $gobvotedash = DB::select('
            select fc.id,CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, SUM(amount) as amount from fact_candidates fc 
            inner join fact_votes fv on ( fv.fk_fact_candidates = fc.id )
            inner join dim_people dp on (fc.fk_dim_people = dp.id)
            where fc.id <> 31
            and fv.fk_fact_polling_stations in (select id from fact_polling_stations where  fk_dim_elections = 2)   
            group by fc.id order by amount desc 
            ');

            $potential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            ');

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            ');

            $datapotential = $this->potentialreal['00'];


   
               if ($gobvotedash) {
                   return response()->json(["gobvotedash" => $gobvotedash, "potential" => $potential,"gobpotentialreal" => $datapotential,"cantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchAlcaldiaDash($id){

        try {

            $alcvotedash = DB::select('
            select fc.id,CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, SUM(amount) as amount from fact_candidates fc 
            inner join fact_votes fv on ( fv.fk_fact_candidates = fc.id )
            inner join dim_people dp on (fc.fk_dim_people = dp.id)
            where fc.id <> 17
            and fv.fk_fact_polling_stations in (select id from fact_polling_stations where fk_dim_locations = ? and fk_dim_elections = 1)   
            group by fc.id order by amount desc  
            ', [$id]);

            $alcpotential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_locations = ?  
            ', [$id]);

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_locations = ?  
            ', [$id]);

            $potentialr = DB::select('
            select distinct fk_dim_cities as city, fk_dim_locations as local from fact_polling_stations fps 
            where fps.fk_dim_locations = ? 
            ', [$id]);

            $x = $potentialr['0']->city;
            $y = $potentialr['0']->local;
            
            $datapotential = $this->potentialreal[$x.$y];


   
               if ($alcvotedash) {
                   return response()->json(["alcvotedash" => $alcvotedash, "alcpotential" => $alcpotential,"alcpotentialreal" => $datapotential,"alccantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

    public function searchAlcaldiaFDash(){

        try {

            $alcvotedash = DB::select('
            select fc.id,CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, SUM(amount) as amount from fact_candidates fc 
            inner join fact_votes fv on ( fv.fk_fact_candidates = fc.id )
            inner join dim_people dp on (fc.fk_dim_people = dp.id)
            where fc.id <> 17
            and fv.fk_fact_polling_stations in (select id from fact_polling_stations where  fk_dim_cities = 1 and fk_dim_elections = 1)   
            group by fc.id order by amount desc  
            ');

            $alcpotential = DB::select('
            select sum(amount) as potential from fact_potential_voters fpv 
            inner join fact_polling_stations fps on (fps.id = fpv.fk_fact_polling_stations)
            where fps.fk_dim_cities = 1  
            ');

            $cantable = DB::select('
            select count(*) as cant from fact_polling_stations fps 
            where fps.fk_dim_cities = 1  
            ');

            $datapotential = $this->potentialreal['1'];


   
               if ($alcvotedash) {
                   return response()->json(["alcvotedash" => $alcvotedash, "alcpotential" => $alcpotential,"alcpotentialreal" => $datapotential,"alccantable" => $cantable, 200]);
               } else {
                   return response()->json(['message' => 'No se encontró registros'], 302);
               }
           } catch (\Illuminate\Database\QueryException $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
    }

}
