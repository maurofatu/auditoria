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
        $id = "";

        $dim_people = DB::select('
        SELECT fc.id as id  FROM fact_candidates fc
        inner join dim_people dp on (fc.fk_dim_people = dp.id)   
        where fk_dim_elections = ?', [$election]);


        DB::beginTransaction();

        try {

            if ($validado['datoscargados'] == 'N') {

                foreach ($dim_people as $item) {

                    $iid = "vote" . $item->id . "";
                    FactVote::create([
                        'fk_fact_polling_stations' => $validado['mesvot'],
                        'fk_fact_candidates' => $item->id,
                        'ip' => request()->ip(),
                        'amount' => $validado['vote' . $item->id],
                        'fk_users' => Auth::user()->id,
                        'fk_dim_elections' => $election
                    ]);
                }
            } elseif ($validado['datoscargados'] == 'S') {

                $fact_polling = DB::select('
            select de.description as election, dc.description as city, dl.description as location, dt.description as mesa, fps.fk_dim_elections as id
            from fact_polling_stations fps
            inner join dim_elections de on (de.id = fps.fk_dim_elections)
            inner join dim_cities dc on (dc.id = fps.fk_dim_cities)
            inner join dim_locations dl on (dl.id = fps.fk_dim_locations)
            inner join dim_tables dt on (dt.id = fps.fk_dim_tables)
            where fps.id = ?
            ', [$validado['mesvot']]);

                foreach ($fact_polling as $item) {
                    $election = $item->election;
                    $city = $item->city;
                    $location = $item->location;
                    $mesa = $item->mesa;
                    $id = $item->id;
                }

                // return $request->file('imagen');

                $ruta = 'public/E-14/' . $election . '/' . $city . '/' . $location;
                $file = $request->file('imagen');
                $file->storeAs($ruta, $mesa . "." . $file->extension());

                $name = $ruta . "/" . $mesa;
                $registro = FactPollingStation::find($validado['mesvot']);
                $registro->url_photo_e4 = $name;
                $registro->save();
            }

            $election = $validado['datoscargados'] == 'S' ? $id : $election;

            DB::commit();

            return redirect()->route('factvote.votes', $election)->with(['message' => 'Success']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('format')->with(['message' => 'Error', 'Code' => $e->getMessage()]);
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

    public function SearchLocation($id, $election)
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
                    and (url_photo_e4 is null
                    or fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes where fk_dim_elections = ?))
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

    public function SearchTable($id, $election)
    {
        try {

            // $dim_tables = DB::select('
            // SELECT fps.id as value, dt.description as label, fps.url_photo_e4 from fact_polling_stations fps 
            //     inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            //     inner join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            // where fk_dim_locations = ?
            //     and fk_fact_polling_stations not in ( select fk_fact_polling_stations from fact_votes where fk_dim_elections = ? )
            //     and fps.fk_dim_elections = ?
            //     and fp.fk_users = ?;
            // ', [$id, $election, $election, Auth::user()->id]);

            $dim_tables = DB::select('
            SELECT fps.id as value, dt.description as label, fps.url_photo_e4 from fact_polling_stations fps 
            inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            inner join dim_tables dt on ( fps.fk_dim_tables = dt.id )
            where fk_dim_locations = ?
            and fp.fk_users = ?
            and fk_dim_elections = ?
            and (url_photo_e4 is null
            or fk_fact_polling_stations not in ( 
                select DISTINCT fk_fact_polling_stations from fact_votes fv 
                where fv.fk_dim_elections = ?
            ))
            ', [$id, Auth::user()->id, $election, $election]);


            if ($dim_tables) {
                return response()->json($dim_tables, 200);
            } else {
                return response()->json(['message' => 'No se encontró locaciones'], 404);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function SearchImg($id, $election)
    {
        try {

            $dim_img = DB::select('
            select DISTINCT fps.id from fact_polling_stations fps 
            inner join fact_votes fv ON (fps.id = fv.fk_fact_polling_stations)
            where fps.id = ? and fps.url_photo_e4 is null
            ', [$id]);

            $count_votes = DB::select('
            select fk_fact_candidates as candidate, amount
            from fact_votes fv 
            where fv.fk_fact_polling_stations = ?
            ', [$id]);

            if ($election == '1') {
                $dat = [
                    "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17"
                ];
            } else {
                $dat = [
                    "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31",
                ];
            }

            if ($dim_img) {
                return response()->json(['dim_img' => $dim_img, 'count_votes' => $count_votes], 200);
            } else {
                return response()->json(['dat' => $dat], 200);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function img(Request $request)
    {

        try {

            $request->validate([
                'imagen' => 'required|image',
                'mesvotimg' => 'required'
            ]);


            $fact_polling = DB::select('
        select de.description as election, dc.description as city, dl.description as location, dt.description as mesa, fps.fk_dim_elections as id
        from fact_polling_stations fps
        inner join dim_elections de on (de.id = fps.fk_dim_elections)
        inner join dim_cities dc on (dc.id = fps.fk_dim_cities)
        inner join dim_locations dl on (dl.id = fps.fk_dim_locations)
        inner join dim_tables dt on (dt.id = fps.fk_dim_tables)
        where fps.id = ?
        ', [$request->mesvotimg]);

            foreach ($fact_polling as $item) {
                $election = $item->election;
                $city = $item->city;
                $location = $item->location;
                $mesa = $item->mesa;
                $id = $item->id;
            }

            $ruta = 'E-14/' . $election . '/' . $city . '/' . $location;

            $request->file('imagen')->store('public/' . $ruta);

            if ($request->isMethod('POST')) {

                $file = $request->file('imagen');
                $file->storeAs($ruta, $mesa . "." . $file->extension());


                $name = $ruta . "/" . $mesa;
                $registro = FactPollingStation::find($request->mesvotimg);
                $registro->url_photo_e4 = $name;
                // Actualiza otros campos según sea necesario
                $registro->save();

                //     return redirect()->back()->with(['message' => 'Success']);
                // } else {
                //     return redirect()->back()->with(['message' => 'Error']);
                // }

                return response()->json(['success' => true, 'message' => 'El archivo se ha cargado correctamente.', 'election' => $id]);
            } else {
                return response()->json(['success' => false, 'message' => 'No se ha seleccionado ningún archivo.']);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function Votes($id)
    {

        $dim_cities = DB::select('
            SELECT DISTINCT dc.id as value, dc.description as label
            from fact_polling_stations fps
                inner join dim_cities dc on ( fps.fk_dim_cities = dc.id )
                inner join fact_permits fp on ( fps.id = fp.fk_fact_polling_stations )
            where fp.fk_users = ? and fps.fk_dim_elections = ?;
        ', [Auth::user()->id, $id]);

        $data = [
            'dim_cities' => $dim_cities,
            'status' => 200
        ];

        $dim_people = DB::select('
        SELECT CONCAT(dp.first_name," ",if(dp.second_name,dp.second_name, ""),dp.first_last_name, if(dp.second_last_name,dp.second_last_name,"")) as name, fc.id as id  FROM fact_candidates fc
        inner join dim_people dp on (fc.fk_dim_people = dp.id)   
        where fk_dim_elections = ?', [$id]);


        return view('factvote.votes', ["dim_people" => $dim_people, "id" => $id, "data" => $data]);
    }
}
