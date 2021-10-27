<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use DataTables;
use Illuminate\Support\Facades\Gate;


class taxiController extends Controller
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
        $data_taxi_bb = DB::table('data_taksi')->limit(10)->get();
        $tahun = DB::table('v_taksi_bb')->select('tahun_pajak')->groupBy('tahun_pajak')->orderBy('tahun_pajak', 'desc')->get();
		$merk = DB::table('data_taksi')->select('MERK')->groupBy('MERK')->get();
		//dd($merk);
        return view('taxi/index', compact("data_taxi_bb","tahun","merk"));
    }  
    public function taxi_gr()
    {
        $data_gr = DB::table('taxi_gemah_ripah')->limit(10)->get();
		$tahun = DB::table('taxi_gemah_ripah')->select('TAHUN_PEMBUATAN')->groupBy('TAHUN_PEMBUATAN')->orderBy('TAHUN_PEMBUATAN', 'desc')->get();
		$merk = DB::table('taxi_gemah_ripah')->select('MERK_TYPE')->groupBy('MERK_TYPE')->get();
		//dd($merk);
        return view('taxi/index2', compact("data_gr","tahun","merk"));
    }
    public function taxi_primkopau()
    {
        $data_pk = DB::table('taksi_primkopa')->limit(10)->get();
		$tahun = DB::table('taksi_primkopa')->select('TAHUN_TAXI')->groupBy('TAHUN_TAXI')->orderBy('TAHUN_TAXI', 'desc')->get();
		$merk = DB::table('taksi_primkopa')->select('MERK_TAXI')->groupBy('MERK_TAXI')->get();

        return view('taxi/index3', compact("data_pk","tahun","merk"));
    }    
    public function taxi_kk()
    {
        $data_kk = DB::table('taksi_kota_kembang')->limit(10)->get();
		$tahun = DB::table('taksi_kota_kembang')->select('TAHUN_TAXI')->groupBy('TAHUN_TAXI')->orderBy('TAHUN_TAXI', 'desc')->get();
		$merk = DB::table('taksi_kota_kembang')->select('MERK_TAXI')->groupBy('MERK_TAXI')->get();

        return view('taxi/index4', compact("data_kk","tahun","merk"));
    }

    // data_taxi

    public function get_data_taxi_bb(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('v_taksi_bb')
				->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/taxi_bb/edit/'.$row->ID).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/taxi_bb/delete/'.$row->ID).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('v_taksi_bb')->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }

        }

        return view('taxi.index');
    }

     public function get_data_gr(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('taxi_gemah_ripah')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/taxi_gr/edit/'.$row->id).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/taxi_gr/delete/'.$row->id).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('taxi_gemah_ripah')
						->join('data_pajak_taxi','data_taksi.NO_KEND','=','data_pajak_taxi.PLAT_NO')
						->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }
            
        }

        return view('taxi.index2');
    }

     public function get_data_primkopau(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('taksi_primkopa')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/taxi_pk/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/taxi_pk/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('taksi_primkopa')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }
            
        }

        return view('taxi.index3');
    }

    public function get_data_kk(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('taksi_kota_kembang')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/taxi_kk/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/taxi_kk/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('taksi_kota_kembang')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }
            
        }

        return view('taxi.index3');
    }



    public function index()
    {
            $data = DB::table('data_taksi')->get();

        return view('taxi/index',compact("data"));
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

     

     // BLUEBIRD

    public function tambah_bb()
    {
            
        $list_status = DB::table('data_taksi')
                                    ->select()
                                    ->distinct()
                                    ->get();
        return view('taxi.tambah_bb', compact('list_status'));
    
    }

    public function edit_bb($ID)
    {
        $data_taxi_bb = DB::table('data_taksi')
                                    ->where('ID', $ID)
                                    ->first();
        return view('taxi.edit_bb', compact('data_taxi_bb'));
    }

    public function simpan_data_bb(Request $request){

        $this->validate($request, [
            'NO_KEND'               => ['required', 'string', 'min:5'],
            'no_lambung'            => ['required', 'string', 'min:5'],
            'MERK'                  => ['required', 'string', 'min:3'],
            'THN'                   => ['required', 'int', 'min:1900'],
            'NO_UJI'                => ['required', 'string', 'min:5'],
            'no_regIzin_trayek'     => ['required', 'string', 'min:5'],
            'no_reg_kartu_pengawas' => ['required', 'string', 'min:5'],
            'nama_pengemudi'        => ['required', 'string', 'min:3'],
        ]);

        $ID                    = $request->ID;
        $NO_KEND               = $request->NO_KEND;
        $no_lambung            = $request->no_lambung;
        $NO_UJI                = $request->NO_UJI;
        $MERK                  = $request->MERK;
        $THN                   = $request->THN;
        $no_regIzin_trayek     = $request->no_regIzin_trayek;
        $no_reg_kartu_pengawas = $request->no_reg_kartu_pengawas;
        $nama_pengemudi        = $request->nama_pengemudi;

        DB::table('data_taksi')
                ->insert([
                    // 'ID'                    => $ID,
                    'NO_KEND'               => $NO_KEND,
                    'no_lambung'            => $no_lambung,
                    'NO_UJI'                => $NO_UJI,
                    'MERK'                  => $MERK,
                    'THN'                   => $THN,
                    'no_regIzin_trayek'     => $no_regIzin_trayek,
                    'no_reg_kartu_pengawas' => $no_reg_kartu_pengawas,
                    'nama_pengemudi'        => $nama_pengemudi
                ]);
        
        return redirect('/data/taxi/')->with('status1', 'Data Taksi Bluebird berhasil disimpan.');
        
    }   

    public function update_data_bb(Request $request){

        $this->validate($request, [
            'ID'                    => ['required', 'int', 'min:1'],
            'NO_KEND'               => ['required', 'string', 'min:5'],
            'no_lambung'            => ['required', 'string', 'min:5'],
            'MERK'                  => ['required', 'string', 'min:3'],
            'THN'                   => ['required', 'int', 'min:4'],
            'NO_UJI'                => ['required', 'string', 'min:5'],
            'no_regIzin_trayek'     => ['required', 'string', 'min:5'],
            'no_reg_kartu_pengawas' => ['required', 'string', 'min:5'],
            'nama_pengemudi'        => ['required', 'string', 'min:3'],           
      
        ]);

        $ID                    = $request->ID;
        $NO_KEND               = $request->NO_KEND;
        $no_lambung            = $request->no_lambung;
        $NO_UJI                = $request->NO_UJI;
        $MERK                  = $request->MERK;
        $THN                   = $request->THN;
        $no_regIzin_trayek     = $request->no_regIzin_trayek;
        $no_reg_kartu_pengawas = $request->no_reg_kartu_pengawas;
        $nama_pengemudi        = $request->nama_pengemudi;

        DB::table('data_taksi')
                ->where('ID', $ID)
                ->update([
                    'ID'                    => $ID,
                    'NO_KEND'               => $NO_KEND,
                    'no_lambung'            => $no_lambung,
                    'NO_UJI'                => $NO_UJI,
                    'MERK'                  => $MERK,
                    'THN'                   => $THN,
                    'no_regIzin_trayek'     => $no_regIzin_trayek,
                    'no_reg_kartu_pengawas' => $no_reg_kartu_pengawas,
                    'nama_pengemudi'        => $nama_pengemudi
                ]);
        
        return redirect('/data/taxi/')->with('status2', 'Data Taksi Bluebird berhasil diupdate.');
        
    }
    
    public function delete_bb($ID){
        $data_bb = DB::table('data_taksi')
                            ->where('ID', $ID)
                            ->delete();

        return back()->with('status3', 'Data Taksi Bluebird telah dihapus.');
    }
    

    // GEMAH RIPAH

    public function tambah_gr()
    {
            
        $list_status = DB::table('taxi_gemah_ripah')
                                    ->select()
                                    ->distinct()
                                    ->get();
        return view('taxi.tambah_gr');
    
    }

    public function simpan_data_gr(Request $request){

        $this->validate($request, [
            'NO_POL'             => ['required', 'string', 'min:5'],
            'NO_kir'             => ['required', 'string', 'min:5'],
            'MERK_TYPE'          => ['required', 'string', 'min:3'],
            'TAHUN_PEMBUATAN'    => ['required', 'int', 'min:1900'],
            'IZIN_TRAYEK'        => ['required', 'string', 'min:5'],
            'NOKARTU_PENGAWASAN' => ['required', 'string', 'min:5'],
        ]);

        $id                 = $request->id;
        $NO_POL             = $request->NO_POL;
        $NO_kir             = $request->NO_kir;
        $MERK_TYPE          = $request->MERK_TYPE;
        $TAHUN_PEMBUATAN    = $request->TAHUN_PEMBUATAN;
        $IZIN_TRAYEK        = $request->IZIN_TRAYEK;
        $NOKARTU_PENGAWASAN = $request->NOKARTU_PENGAWASAN;

        DB::table('taxi_gemah_ripah')
                ->insert([
                    'NO_POL'             => $NO_POL,
                    'NO_kir'             => $NO_kir,
                    'MERK_TYPE'          => $MERK_TYPE,
                    'TAHUN_PEMBUATAN'    => $TAHUN_PEMBUATAN,
                    'IZIN_TRAYEK'        => $IZIN_TRAYEK,
                    'NOKARTU_PENGAWASAN' => $NOKARTU_PENGAWASAN
                ]);
        
        return redirect('/data/taxi_gr/')->with('status1', "Data Taksi Gemah Ripah berhasil disimpan.");
        
    }

    public function edit_gr($id)
    {
        $data_gr = DB::table('taxi_gemah_ripah')
                                    ->where('id', $id)
                                    ->first();
        return view('taxi.edit_gr', compact('data_gr'));
    }

    public function update_data_gr(Request $request){

        $this->validate($request, [
            'id'                 => ['required', 'int', 'min:1'],
            'NO_POL'             => ['required', 'string', 'min:5'],
            'NO_kir'             => ['required', 'string', 'min:5'],
            'MERK_TYPE'          => ['required', 'string', 'min:3'],
            'TAHUN_PEMBUATAN'    => ['required', 'int', 'min:4'],
            'IZIN_TRAYEK'        => ['required', 'string', 'min:5'],
            'NOKARTU_PENGAWASAN' => ['required', 'string', 'min:5'],           
      
        ]);

        $id                 = $request->id;
        $NO_POL             = $request->NO_POL;
        $NO_kir             = $request->NO_kir;
        $MERK_TYPE          = $request->MERK_TYPE;
        $TAHUN_PEMBUATAN    = $request->TAHUN_PEMBUATAN;
        $IZIN_TRAYEK        = $request->IZIN_TRAYEK;
        $NOKARTU_PENGAWASAN = $request->NOKARTU_PENGAWASAN;

        DB::table('taxi_gemah_ripah')
                ->where('id', $id)
                ->update([
                    'id'                 => $id,
                    'NO_POL'             => $NO_POL,
                    'NO_kir'             => $NO_kir,
                    'MERK_TYPE'          => $MERK_TYPE,
                    'TAHUN_PEMBUATAN'    => $TAHUN_PEMBUATAN,
                    'IZIN_TRAYEK'        => $IZIN_TRAYEK,
                    'NOKARTU_PENGAWASAN' => $NOKARTU_PENGAWASAN
                ]);
        
        return redirect('/data/taxi_gr/')->with('status2', "Data Taksi Gemah Ripah berhasil diupdate.");
        
    }

    public function delete_gr($id){
        $data_gr = DB::table('taxi_gemah_ripah')
                            ->where('id', $id)
                            ->delete();

        return back()->with('status3', 'Data Taksi Gemah Ripah telah dihapus.');
    }



    // KOTA KEMBANG

    public function tambah_kk()
    {
            
        $list_status = DB::table('taksi_kota_kembang')
                                    ->select()
                                    ->distinct()
                                    ->get();
        return view('taxi.tambah_kk');
    
    }

    public function simpan_data_kk(Request $request){

        $this->validate($request, [
            'NO_KENDARAAN'            => ['required', 'string', 'min:5'],
            'NO_UJI_KIR_TAXI'         => ['required', 'string', 'min:5'],
            'MERK_TAXI'               => ['required', 'string', 'min:3'],
            'TAHUN_TAXI'              => ['required', 'int', 'min:1900'],
            'NO_REG_IZIN_TRAYEK_TAXI' => ['required', 'string', 'min:5'],
        ]);

        $NO                      = $request->NO;
        $NO_KENDARAAN            = $request->NO_KENDARAAN;
        $NO_UJI_KIR_TAXI         = $request->NO_UJI_KIR_TAXI;
        $MERK_TAXI               = $request->MERK_TAXI;
        $TAHUN_TAXI              = $request->TAHUN_TAXI;
        $NO_REG_IZIN_TRAYEK_TAXI = $request->NO_REG_IZIN_TRAYEK_TAXI;

        DB::table('taksi_kota_kembang')
                ->insert([
                    'NO_KENDARAAN'            => $NO_KENDARAAN,
                    'NO_UJI_KIR_TAXI'         => $NO_UJI_KIR_TAXI,
                    'MERK_TAXI'               => $MERK_TAXI,
                    'TAHUN_TAXI'              => $TAHUN_TAXI,
                    'NO_REG_IZIN_TRAYEK_TAXI' => $NO_REG_IZIN_TRAYEK_TAXI
                ]);
        
        return redirect('/data/taxi_kk/')->with('status1', "Data Taksi Kota Kembang berhasil disimpan.");
        
    }

    public function edit_kk($NO)
    {
        $data_kk = DB::table('taksi_kota_kembang')
                                    ->where('NO', $NO)
                                    ->first();
        return view('taxi.edit_kk', compact('data_kk'));
    }

    public function update_data_kk(Request $request){

        $this->validate($request, [
            'NO'                      => ['required', 'int', 'min:1'],
            'NO_KENDARAAN'            => ['required', 'string', 'min:5'],
            'NO_UJI_KIR_TAXI'         => ['required', 'string', 'min:5'],
            'MERK_TAXI'               => ['required', 'string', 'min:3'],
            'TAHUN_TAXI'              => ['required', 'int', 'min:4'],
            'NO_REG_IZIN_TRAYEK_TAXI' => ['required', 'string', 'min:5'],           
      
        ]);

        $NO                      = $request->NO;
        $NO_KENDARAAN            = $request->NO_KENDARAAN;
        $NO_UJI_KIR_TAXI         = $request->NO_UJI_KIR_TAXI;
        $MERK_TAXI               = $request->MERK_TAXI;
        $TAHUN_TAXI              = $request->TAHUN_TAXI;
        $NO_REG_IZIN_TRAYEK_TAXI = $request->NO_REG_IZIN_TRAYEK_TAXI;

        DB::table('taksi_kota_kembang')
                ->where('NO', $NO)
                ->update([
                    'NO'                      => $NO,
                    'NO_KENDARAAN'            => $NO_KENDARAAN,
                    'NO_UJI_KIR_TAXI'         => $NO_UJI_KIR_TAXI,
                    'MERK_TAXI'               => $MERK_TAXI,
                    'TAHUN_TAXI'              => $TAHUN_TAXI,
                    'NO_REG_IZIN_TRAYEK_TAXI' => $NO_REG_IZIN_TRAYEK_TAXI
                ]);
        
        return redirect('/data/taxi_kk/')->with('status2', "Data Taksi Kota Kembang berhasil diupdate.");
        
    }

    public function delete_kk($NO){
        $data_kk = DB::table('taksi_kota_kembang')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Taksi Kota Kembang telah dihapus.');
    }



    // PRIMKOPAU
    public function tambah_pk()
    {
            
        $list_status = DB::table('taksi_primkopa')
                                    ->select()
                                    ->distinct()
                                    ->get();
        return view('taxi.tambah_pk');
    
    }

    public function simpan_data_pk(Request $request){

        $this->validate($request, [
            'NO_KENDARAAN'            => ['required', 'string', 'min:5'],
            'NO_UJI_KIR_TAXI'         => ['required', 'string', 'min:5'],
            'MERK_TAXI'               => ['required', 'string', 'min:3'],
            'TAHUN_TAXI'              => ['required', 'int', 'min:1900'],
            'NO_REG_IZIN_TRAYEK_TAXI' => ['required', 'string', 'min:5'],
        ]);

        $NO                      = $request->NO;
        $NO_KENDARAAN            = $request->NO_KENDARAAN;
        $NO_UJI_KIR_TAXI         = $request->NO_UJI_KIR_TAXI;
        $MERK_TAXI               = $request->MERK_TAXI;
        $TAHUN_TAXI              = $request->TAHUN_TAXI;
        $NO_REG_IZIN_TRAYEK_TAXI = $request->NO_REG_IZIN_TRAYEK_TAXI;

        DB::table('taksi_primkopa')
                ->insert([
                    'NO_KENDARAAN'            => $NO_KENDARAAN,
                    'NO_UJI_KIR_TAXI'         => $NO_UJI_KIR_TAXI,
                    'MERK_TAXI'               => $MERK_TAXI,
                    'TAHUN_TAXI'              => $TAHUN_TAXI,
                    'NO_REG_IZIN_TRAYEK_TAXI' => $NO_REG_IZIN_TRAYEK_TAXI
                ]);
        
        return redirect('/data/taxi_primkopau/')->with('status1', "Data Taksi Primkopau berhasil disimpan.");
        
    }

    public function edit_pk($NO)
    {
        $data_pk = DB::table('taksi_primkopa')
                                    ->where('NO', $NO)
                                    ->first();
        return view('taxi.edit_pk', compact('data_pk'));
    }

    public function update_data_pk(Request $request){

        $this->validate($request, [
            'NO'                      => ['required', 'int', 'min:1'],
            'NO_KENDARAAN'            => ['required', 'string', 'min:5'],
            'NO_UJI_KIR_TAXI'         => ['required', 'string', 'min:5'],
            'MERK_TAXI'               => ['required', 'string', 'min:3'],
            'TAHUN_TAXI'              => ['required', 'int', 'min:4'],
            'NO_REG_IZIN_TRAYEK_TAXI' => ['required', 'string', 'min:5'],           
      
        ]);

        $NO                      = $request->NO;
        $NO_KENDARAAN            = $request->NO_KENDARAAN;
        $NO_UJI_KIR_TAXI         = $request->NO_UJI_KIR_TAXI;
        $MERK_TAXI               = $request->MERK_TAXI;
        $TAHUN_TAXI              = $request->TAHUN_TAXI;
        $NO_REG_IZIN_TRAYEK_TAXI = $request->NO_REG_IZIN_TRAYEK_TAXI;

        DB::table('taksi_primkopa')
                ->where('NO', $NO)
                ->update([
                    'NO'                      => $NO,
                    'NO_KENDARAAN'            => $NO_KENDARAAN,
                    'NO_UJI_KIR_TAXI'         => $NO_UJI_KIR_TAXI,
                    'MERK_TAXI'               => $MERK_TAXI,
                    'TAHUN_TAXI'              => $TAHUN_TAXI,
                    'NO_REG_IZIN_TRAYEK_TAXI' => $NO_REG_IZIN_TRAYEK_TAXI
                ]);
        
        return redirect('/data/taxi_primkopau/')->with('status2', "Data Taksi Primkopa berhasil diupdate.");
        
    }

    public function delete_pk($NO){
        $data_pk = DB::table('taksi_primkopa')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Taksi Primkopau telah dihapus.');
    }
}
