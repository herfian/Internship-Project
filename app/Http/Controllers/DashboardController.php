<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
class DashboardController extends Controller
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
        // $data = DB::table('t_angkot')->limit(24)->get();
        // $total['under2009'] = DB::table('t_angkot')->where('tahun', '<=', '2009')->count(); // Lebih kecil atau sama dengan tahun 2009
        // $total['equal2010'] = DB::table('t_angkot')->where('tahun', '=', '2010')->count(); // Sama dengan 2010
        // $total['over2010'] = DB::table('t_angkot')->where('tahun', '>', '2010')->count(); // Lebih dari 2010


        // dd($data);

        //DB::select('call sp_dashboard_usia_kendaraan()');
       // dd($data);
        return view('dashboard/index');
    }    
	public function dashboard_taksi()
    {
       
        return view('dashboard/index2');
    }

    public function sp_dashboard_usia_kendaraan(){

        $data = DB::select('call sp_dashboard_usia_kendaraan()');

        return json_encode($data);
    }

    public function rata_harian(){
        $data = DB::select('call rata_harian()');
        return json_encode($data);
    }

    public function graf_pajak_angkot(){

        $data = DB::select('call dashboard_pajak()');

        return json_encode($data);

    }

    public function best_angkot() {

        $data = DB::select('call best_angkot()');

        return json_encode($data);
    }

    public function best_jurusan() {

        $data = DB::select('call best_jurusan()');

        return json_encode($data);
    }

    public function penumpang_tercatat() {

        $data = DB::select('call chart_tercatat_penumpang()');

        return json_encode($data);
    }

    public function graf_ujikir_angkot(){

        $data = DB::select('call sp_dashboard_ujikir()');

        return json_encode($data);

    }  
    public function graf_survey_angkot(Request $request){
    //dd($request->plat);
        $platno =$request->plat;
        $data = DB::select("call sp_survey_dashboard('$platno')");
        return json_encode($data);

    }

    public function total_angkot_bandung(){
    //dd($request->plat);
        //$platno =$request->plat;
        $data = DB::select('call total_angkot_bandung()');
        return json_encode($data);
        
    }
    public function total_taxi(){
    //dd($request->plat);
        //$platno =$request->plat;
        $data = DB::select('call total_taxi()');
        return json_encode($data);
        
    }

    public function total_angkot_akdp() {
    //dd($request->plat);
        $data = DB::select('call total_angkot_akdp()');
        return json_encode($data);
            
    }

    public function total_angkot(Request $request){
    //dd($request->plat);
        $platno =$request->plat;
        $data = DB::select("call total_angkot('2020-10-10')");
        return json_encode($data);
    }

    public function total_data() {
        //dd($request->plat);
        $data = DB::select('call total_data()');
        return json_encode($data);
    }

    public function total_trip_angkot() {
        //dd($request->plat);
        $data = DB::select('call total_trip_angkot()');
        return json_encode($data);
    }

    public function total_angkot_beroperasi() {
        //dd($request->plat);
        $data = DB::select('call total_angkot_beroperasi()');
        return json_encode($data);
    }

}

