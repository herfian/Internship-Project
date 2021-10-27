<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use DataTables;
use Illuminate\Support\Facades\Gate;

class AngkotController extends Controller
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

    public function index2()
    {
        $data_angkot = DB::table('t_angkot')->limit(10)->get();
        $tahun = DB::table('t_angkot')->select('tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
		$status = DB::table('t_angkot')->select('status')->groupBy('status')->get();
		$trayek = DB::table('t_angkot')->select('TRAYEK')->groupBy('TRAYEK')->get();
		
        return view('angkot/index', compact("data_angkot","tahun","status","trayek"));
    }

    public function get_data_angkot(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('v_angkot_2')->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/angkot/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>,
                                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('v_angkot_2')->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }
        }

        return view('angkot.index');
    }


    public function index()
    {
        $data = DB::table('t_angkot')->get();
        $tahun = DB::table('t_angkot')->select('tahun')->groupBy('tahun')->get();

        return view('angkot/index',compact("data","tahun"));
    }
        public function search()
    {
        $data = DB::select("call sp_cari()");

        return view('angkot/search',compact("data"));
    }
    public function search_datatable()
    {
        $data = DB::select("call sp_cari()");

        return json_encode($data);
    }

    public function pencarian(Request $request)
    {
        $p_cari = $request->data_search;
        $data = DB::select("call sp_cari_bydata('$p_cari')");



        return json_encode($data);

    }
     public function detail_kendaraan($no_kendaraan)
    {
        $data_angkot = DB::table('t_angkot')->where('no_kendaraan',$no_kendaraan)->count();
        $data_taxi_bluebird = DB::table('data_taksi')->where('NO_KEND',$no_kendaraan)->count();
        $data_taxi_gr = DB::table('taxi_gemah_ripah')->where('NO_POL',$no_kendaraan)->count();
        $data_taxi_pk = DB::table('taksi_primkopa')->where('NO_KENDARAAN',$no_kendaraan)->count();
        $data_taxi_kk = DB::table('taksi_kota_kembang')->where('NO_KENDARAAN',$no_kendaraan)->count();
        $data_bus_blud = DB::table('bus_blud')->where('PLAT_NO',$no_kendaraan)->count();
        $data_damri = DB::table('damri')->where('PLATNO',$no_kendaraan)->count();
       if ($data_angkot >0){
        $data = DB::select("call detail_angkot('$no_kendaraan')");

        return view('angkot/detail',compact("data"));

       }else if ( $data_taxi_bluebird > 0){
        $data = DB::select("call detail_taksi_bb('$no_kendaraan')");
    //   dd ($data);
        return view('taxi/detail_bb',compact("data"));
       }else if ( $data_taxi_gr > 0){
         $data = DB::select("call detail_taksi_gr('$no_kendaraan')");

        return view('taxi/detail_gr',compact("data"));

       }else if ( $data_taxi_pk > 0){
        $data = DB::select("call detail_taksi_pk('$no_kendaraan')");

       return view('taxi/detail_pk',compact("data"));

      }else if ( $data_taxi_kk > 0){
        $data = DB::select("call detail_taksi_kk('$no_kendaraan')");

       return view('taxi/detail_kk',compact("data"));

      }else if ($data_bus_blud > 0){
        $data = DB::select("call detail_bus_blud('$no_kendaraan')");
  //      dd($data);
        return view('blud/detail_blud',compact("data"));
       }else if ($data_damri > 0){
        $data = DB::select("call detail_damri('$no_kendaraan')");
  //      dd($data);
        return view('damri/detail_damri',compact("data"));

       }else {
           return Log::alert('Data tidak ada');
       }
       // dd($data);
    }
     public function form_data_angkot()
    {
            $list_status = DB::table('t_angkot')
                                    ->select('status')
                                    ->distinct()
                                    ->get();
            return view('angkot.form_data_angkot', compact('list_status'));
    }

    public function edit_data_angkot($id)
    {
            $data_angkot = DB::table('t_angkot')
                                    ->where('id', $id)
                                    ->first();
            return view('angkot.edit_data_angkot', compact('data_angkot'));
    }

    public function simpan_data_angkot(Request $request){

        $this->validate($request, [
            'no_kendaraan' => ['required', 'string', 'min:5'],
            'pemilik' => ['required', 'string', 'min:5'],     
            'no_uji' => ['required', 'string', 'min:5'],     
            'merk' => ['required', 'string', 'min:5'],           
            'tahun' => ['required', 'int', 'min:1900'],           
            'status' => ['required', 'string', 'min:3'],           
        ]);

        $id             = $request->id;
        $no_kendaraan   = $request->no_kendaraan;
        $pemilik        = $request->pemilik;
        $no_uji        = $request->no_uji;
        $merk           = $request->merk;
        $tahun          = $request->tahun;

        DB::table('t_angkot')
                ->insert([
                    'no_kendaraan' => $no_kendaraan,
                    'pemilik' => $pemilik,
                    'no_uji' => $no_uji,
                    'merk' => $merk,
                    'tahun' => $tahun
                ]);
        
        return redirect('/data/angkot')->with('status1', "Data Angkot berhasil disimpan.");
        
    }   

    public function update_data_angkot(Request $request){

        $this->validate($request, [
            'id' => ['required', 'int', 'min:1'],
            'no_kendaraan' => ['required', 'string', 'min:5'],
            'pemilik' => ['required', 'string', 'min:5'],     
            'no_uji' => ['required', 'string', 'min:5'],     
            'merk' => ['required', 'string', 'min:5'],           
            'tahun' => ['required', 'int', 'min:4'],           
      
        ]);

        $id             = $request->id;
        $no_kendaraan   = $request->no_kendaraan;
        $pemilik        = $request->pemilik;
        $no_uji        = $request->no_uji;
        $merk           = $request->merk;
        $tahun          = $request->tahun;

        DB::table('t_angkot')
                ->where('id', $id)
                ->update([
                    'id' => $id,
                    'no_kendaraan' => $no_kendaraan,
                    'pemilik' => $pemilik,
                    'no_uji' => $no_uji,
                    'merk' => $merk,
                    'tahun' => $tahun
                ]);
        
        return redirect('/data/angkot')->with('status2', "Data Angkot berhasil diupdate.");
        
    }   

    public function delete_angkot($id){
        DB::table('t_angkot')->where('id', $id)->delete();
        return back()->with('status', "Data Angkot berhasil dihapus.");    
    }    
}
