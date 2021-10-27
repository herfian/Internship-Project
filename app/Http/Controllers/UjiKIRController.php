<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class UjiKIRController extends Controller
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
        $data = DB::table('t_uji_kir')->get();
        $merk = DB::table('t_uji_kir')->select('merk')->groupBy('merk')->orderBy('merk', 'desc')->get();
        $jenis =DB::table('t_uji_kir')->select('jenis')->groupBy('jenis')->orderBy('jenis', 'desc')->get();
        $tahun = DB::table('t_uji_kir')->select('tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
		

        return view('uji_kir/index',compact("data","merk","jenis","tahun"));
    }
    public function tambah_uji_kir()
    {
        
        $data = DB::table('t_uji_kir')->get();
        return view('uji_kir.tambah_kir');
    }

    public function simpan_uji_kir(Request $request)
    {

        $request->validate([
            'tgl_uji' => 'required',
            'tgl_uji' => 'required',
            'no_kendaraan' => 'required',
            'no_uji' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'uji_Sebelumnya' => 'required'
        ]);

        $simpan = DB::table('t_uji_kir')
                    ->insert([
                        'tgl_uji' => $request->input('tgl_uji'),
                        'no_kendaraan' => $request->input('no_kendaraan'),
                        'no_uji' => $request->input('no_uji'),
                        'merk' => $request->input('merk'),
                        'type' => $request->input('type'),
                        'jenis' => $request->input('jenis'),
                        'tahun' => $request->input('tahun'),
                        'uji_Sebelumnya' => $request->input('uji_Sebelumnya')
                    ]);

        return redirect('/uji_kir')->with('status1', 'Data KIR telah ditambahkan.');
    }

    public function edit_uji_kir($id)
    {
        $data_uji_kir = DB::table('t_uji_kir')
                            ->where('id', $id)
                            ->first();

        return view('uji_kir.edit_kir', compact('data_uji_kir'));
    }
    public function update_uji_kir(Request $request)
    {

        $request->validate([
            'id_uji_kir' => 'required',
            'tgl_uji' => 'required',
            'no_kendaraan' => 'required',
            'no_uji' => 'required',
            'merk' => 'required',
            'type' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
            'uji_Sebelumnya' => 'required'
        ]);

        $update = DB::table('t_uji_kir')
                    ->where('id', $request->input('id_uji_kir'))
                    ->update([
                        'tgl_uji' => $request->input('tgl_uji'),
                        'no_kendaraan' => $request->input('no_kendaraan'),
                        'no_uji' => $request->input('no_uji'),
                        'merk' => $request->input('merk'),
                        'type' => $request->input('type'),
                        'jenis' => $request->input('jenis'),
                        'tahun' => $request->input('tahun'),
                        'uji_Sebelumnya' => $request->input('uji_Sebelumnya')                    
                    ]);

        return redirect('/uji_kir')->with('status2', 'Data KIR telah disimpan.');
    }

    // public function delete($id){
    //     $data=DB::table('t_uji_kir')->where('id', $id)->delete();

    //     return with('status', 'Data KIR telah dihapus.');
    // }
    public function delete_kir($id){
        $data_uji_kir = DB::table('t_uji_kir')
                            ->where('id', $id)
                            ->delete();

        return back()->with('status3', 'Data KIR telah dihapus.');
    }
}
