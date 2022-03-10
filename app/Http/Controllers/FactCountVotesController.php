<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactCountVotesController extends Controller
{

    public function __construct()
    {
        // $this->middleware('role.typist');
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
    public function store(Request $request)
    {
        //
    //     $validado = $request->validated();

    //     DB::beginTransaction();

    //     try{

        


    //     DB::commit();

    //     return redirect()->route('factcountvote')->with(['message'=>'Success']);

    // } catch (\Exception $e){
    //     DB::rollback();
    //     return redirect()->route('factcountvote')->with(['message'=>'Error', 'Code' => $e->getMessage()]);
    // }

    }


}
