<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use DataTables;
use Illuminate\Support\Facades\Gate;


class bludController extends Controller
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

//BLUD
    public function merah_putih()
    {
        $merah_putih = DB::table('bus_blud')->limit(10)->get();
		$jurusan=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS MERAH PUTIH')->select('JURUSAN')->groupBy('JURUSAN')->orderBy('JURUSAN', 'desc')->get();
		$merk=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS MERAH PUTIH')->select('MERK_TYPE')->groupBy('MERK_TYPE')->orderBy('MERK_TYPE', 'desc')->get();
        $tahun = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS MERAH PUTIH')->select('TAHUN')->groupBy('TAHUN')->orderBy('TAHUN', 'desc')->get();

        return view('blud/index1', compact("merah_putih","jurusan","merk","tahun"));
    }     

     public function get_data_merah_putih(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS MERAH PUTIH')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {
                                
                                $btn = '<a href="'.url('data/bmp/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/bmp/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS MERAH PUTIH')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }

        }

        return view('blud.index1');
    }

     public function bandros()
    {
        $merah_putih = DB::table('bus_blud')->limit(10)->get();
		$jurusan=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BANDROS')->select('JURUSAN')->groupBy('JURUSAN')->orderBy('JURUSAN', 'desc')->get();
		$merk=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BANDROS')->select('MERK_TYPE')->groupBy('MERK_TYPE')->orderBy('MERK_TYPE', 'desc')->get();
        $tahun = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BANDROS')->select('TAHUN')->groupBy('TAHUN')->orderBy('TAHUN', 'desc')->get();

        return view('blud/index2', compact("merah_putih","jurusan","merk","tahun"));
    }      
    public function get_data_bandros(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BANDROS')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/bandros/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/bandros/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BANDROS')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }

        }

        return view('blud.index2');
    }
    public function bus_sekolah()
    {
        $merah_putih = DB::table('bus_blud')->limit(10)->get();
		$jurusan=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS SEKOLAH')->select('JURUSAN')->groupBy('JURUSAN')->orderBy('JURUSAN', 'desc')->get();
		$merk=DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS SEKOLAH')->select('MERK_TYPE')->groupBy('MERK_TYPE')->orderBy('MERK_TYPE', 'desc')->get();
        $tahun = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS SEKOLAH')->select('TAHUN')->groupBy('TAHUN')->orderBy('TAHUN', 'desc')->get();


        return view('blud/index3', compact("merah_putih","jurusan","merk","tahun"));
    }      
        public function get_data_bus_sekolah(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS SEKOLAH')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/bs/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/bs/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','BUS SEKOLAH')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }

        }

        return view('blud.index3');
    }
    public function tmb()
    {
        $tmb = DB::table('bus_blud')->limit(10)->get();
		$jurusan=DB::table('bus_blud')->where('JENIS_PEMILIK','=','TMB')->select('JURUSAN')->groupBy('JURUSAN')->orderBy('JURUSAN', 'desc')->get();
		$merk=DB::table('bus_blud')->where('JENIS_PEMILIK','=','TMB')->select('MERK_TYPE')->groupBy('MERK_TYPE')->orderBy('MERK_TYPE', 'desc')->get();
        $tahun = DB::table('bus_blud')->where('JENIS_PEMILIK','=','TMB')->select('TAHUN')->groupBy('TAHUN')->orderBy('TAHUN', 'desc')->get();

        return view('blud/index4', compact("tmb","jurusan","merk","tahun"));
    }    
    public function get_data_tmb(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','TMB')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/tmb/edit/' .$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/tmb/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('bus_blud')->where('JENIS_PEMILIK','=','TMB')->get();
                //dd($data);
                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }

        }

        return view('blud.index4');
    }
//



//MERAH PUTIH

    public function tambah_mp()
    {
            $list_status = DB::table('bus_blud')
                                    ->select('JENIS_PEMILIK')
                                    ->distinct()
                                    ->get();
            return view('blud.tambah_mp', compact('list_status'));
    }

    public function simpan_data_mp(Request $request){

        $this->validate($request, [
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            // 'JURUSAN'         => ['required', 'string', 'min:5'],
            // 'KODE_JURUSAN'    => ['required', 'string', 'min:5'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:1900'],
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        // $JURUSAN         = $request->JURUSAN;
        // $KODE_JURUSAN    = $request->KODE_JURUSAN;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->insert([
                    'PLAT_NO'         => $PLAT_NO,
                    'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    // 'JURUSAN'         => $JURUSAN,
                    // 'KODE_JURUSAN'    => $KODE_JURUSAN,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bmp')->with('status1', "Data Bus Merah Putih berhasil disimpan.");
        
    }

    public function edit_mp($NO)
    {
        $data_mp = DB::table('bus_blud')
                                    ->where('NO', $NO)
                                    ->first();
        return view('blud.edit_mp', compact('data_mp'));
    }

    public function update_data_mp(Request $request){

        $this->validate($request, [
            'NO'              => ['required', 'int', 'min:1'],
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            // 'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:4'],           
      
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        // $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->where('NO', $NO)
                ->update([
                    'NO'              => $NO,
                    'PLAT_NO'         => $PLAT_NO,
                    // 'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bmp')->with('status2', "Data Bus Merah Putih diupdate.");
        
    }
    public function delete_mp($NO){
        $data_mp = DB::table('bus_blud')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Bus Merah Putih telah dihapus.');
    }



    //BUS SEKOLAH

    public function tambah_bs()
    {
            
        $list_status = DB::table('bus_blud')
                                    ->select('JENIS_PEMILIK')
                                    ->distinct()
                                    ->get();
        return view('blud.tambah_bs', compact('list_status'));

    }

    public function simpan_data_bs(Request $request){

        $this->validate($request, [
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            // 'JURUSAN'         => ['required', 'string', 'min:5'],
            // 'KODE_JURUSAN'    => ['required', 'string', 'min:5'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:1900'],
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        // $JURUSAN         = $request->JURUSAN;
        // $KODE_JURUSAN    = $request->KODE_JURUSAN;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->insert([
                    'PLAT_NO'         => $PLAT_NO,
                    'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    // 'JURUSAN'         => $JURUSAN,
                    // 'KODE_JURUSAN'    => $KODE_JURUSAN,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bs')->with('status1', "Data Bus Sekolah berhasil disimpan.");
        
    }

    public function edit_bs($NO)
    {
        $data_bs = DB::table('bus_blud')
                                    ->where('NO', $NO)
                                    ->first();
        return view('blud.edit_bs', compact('data_bs'));
    }

    public function update_data_bs(Request $request){

        $this->validate($request, [
            'NO'              => ['required', 'int', 'min:1'],
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            // 'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:4'],           
      
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        // $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->where('NO', $NO)
                ->update([
                    'NO'              => $NO,
                    'PLAT_NO'         => $PLAT_NO,
                    // 'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bs')->with('status2', "Data Bus Sekolah diupdate.");        
    }
    public function delete_bs($NO){
        $data_bs = DB::table('bus_blud')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Bus Sekolah telah dihapus.');
    }


    //BANDROS

    public function tambah_bandros()
    {
            
        $list_status = DB::table('bus_blud')
                                    ->select('JENIS_PEMILIK')
                                    ->distinct()
                                    ->get();
        return view('blud.tambah_bandros', compact('list_status'));

    }

    public function simpan_data_bandros(Request $request){

        $this->validate($request, [
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            // 'JURUSAN'         => ['required', 'string', 'min:5'],
            // 'KODE_JURUSAN'    => ['required', 'string', 'min:5'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:1900'],
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        // $JURUSAN         = $request->JURUSAN;
        // $KODE_JURUSAN    = $request->KODE_JURUSAN;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->insert([
                    'PLAT_NO'         => $PLAT_NO,
                    'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    // 'JURUSAN'         => $JURUSAN,
                    // 'KODE_JURUSAN'    => $KODE_JURUSAN,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bandros')->with('status1', "Data Bus Bandros berhasil disimpan.");
        
    }

    public function edit_bandros($NO)
    {
        $data_bandros = DB::table('bus_blud')
                                    ->where('NO', $NO)
                                    ->first();
        return view('blud.edit_bandros', compact('data_bandros'));
    }

    public function update_data_bandros(Request $request){

        $this->validate($request, [
            'NO'              => ['required', 'int', 'min:1'],
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            // 'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:4'],           
      
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        // $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->where('NO', $NO)
                ->update([
                    'NO'              => $NO,
                    'PLAT_NO'         => $PLAT_NO,
                    // 'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/bandros')->with('status2', "Data Bus Bandros diupdate.");
        
    }
    public function delete_bandros($NO){
        $data_bandros = DB::table('bus_blud')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Bandros telah dihapus.');
    }


    // TRANS METRO BANDUNG
    public function tambah_tmb()
    {
            
        $list_status = DB::table('bus_blud')
                                    ->select('JENIS_PEMILIK')
                                    ->distinct()
                                    ->get();
        return view('blud.tambah_tmb', compact('list_status'));

    }

    public function simpan_data_tmb(Request $request){

        $this->validate($request, [
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            // 'JURUSAN'         => ['required', 'string', 'min:5'],
            // 'KODE_JURUSAN'    => ['required', 'string', 'min:5'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:1900'],
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        // $JURUSAN         = $request->JURUSAN;
        // $KODE_JURUSAN    = $request->KODE_JURUSAN;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->insert([
                    'PLAT_NO'         => $PLAT_NO,
                    'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    // 'JURUSAN'         => $JURUSAN,
                    // 'KODE_JURUSAN'    => $KODE_JURUSAN,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/tmb/')->with('status1', "Data Bus Trans Metro Bandung berhasil disimpan.");
        
    }

    public function edit_tmb($NO)
    {
        $data_tmb = DB::table('bus_blud')
                                    ->where('NO', $NO)
                                    ->first();
        return view('blud.edit_tmb', compact('data_tmb'));
    }

    public function update_data_tmb(Request $request){

        $this->validate($request, [
            'NO'              => ['required', 'int', 'min:1'],
            'PLAT_NO'         => ['required', 'string', 'min:5'],
            // 'JENIS_PEMILIK'   => ['required', 'string', 'min:3'],
            'MERK_TYPE'       => ['required', 'string', 'min:3'],
            'WARNA_KENDARAAN' => ['required', 'string', 'min:5'],
            'JENIS_BUS'       => ['required', 'string', 'min:5'],
            'NOMOR_BPKB'      => ['required', 'string', 'min:5'],
            'NAMA_PEMILIK'    => ['required', 'string', 'min:5'],
            'TAHUN'           => ['required', 'int', 'min:4'],           
      
        ]);

        $NO              = $request->NO;
        $PLAT_NO         = $request->PLAT_NO;
        // $JENIS_PEMILIK   = $request->JENIS_PEMILIK;
        $MERK_TYPE       = $request->MERK_TYPE;
        $WARNA_KENDARAAN = $request->WARNA_KENDARAAN;
        $JENIS_BUS       = $request->JENIS_BUS;
        $NOMOR_BPKB      = $request->NOMOR_BPKB;
        $NAMA_PEMILIK    = $request->NAMA_PEMILIK;
        $TAHUN           = $request->TAHUN;

        DB::table('bus_blud')
                ->where('NO', $NO)
                ->update([
                    'NO'              => $NO,
                    'PLAT_NO'         => $PLAT_NO,
                    // 'JENIS_PEMILIK'   => $JENIS_PEMILIK,
                    'MERK_TYPE'       => $MERK_TYPE,
                    'WARNA_KENDARAAN' => $WARNA_KENDARAAN,
                    'JENIS_BUS'       => $JENIS_BUS,
                    'NOMOR_BPKB'      => $NOMOR_BPKB,
                    'NAMA_PEMILIK'    => $NAMA_PEMILIK,
                    'TAHUN'           => $TAHUN,
                ]);
        
        return redirect('/data/tmb')->with('status2', "Data Bus Tans Metro Bandung diupdate.");    
    }

    public function delete_tmb($NO){
        $data_tmb = DB::table('bus_blud')
                            ->where('NO', $NO)
                            ->delete();

        return back()->with('status3', 'Data Bus Trans Metro Bandung telah dihapus.');
    }
        
}