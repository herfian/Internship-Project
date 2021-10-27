<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TrayekController extends Controller
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
        $data = DB::table('t_trayek')->get();

        return view('trayek.index', compact('data'));
    }
    public function tambah_trayek()
    {
        
        $data = DB::table('t_trayek')->get();
        return view('trayek.tambah_trayek');
    }

    public function simpan_trayek(Request $request)
    {

        $request->validate([
            'kd_trayek' => 'required',
            'rute' => 'required',
            'alokasi' => 'required'
        ]);

        $simpan = DB::table('t_trayek')
                    ->insert([
                        'kd_trayek' => $request->input('kd_trayek'),
                        'rute' => $request->input('rute'),
                        'alokasi' => $request->input('alokasi')
                    ]);

        return redirect('/data/trayek')->with('status1', 'Data Trayek telah ditambahkan.');
    }

    public function edit_trayek($id)
    {
        $data_trayek = DB::table('t_trayek')
                            ->where('id', $id)
                            ->first();

        return view('trayek.edit_trayek', compact('data_trayek'));
    }

    public function update_trayek(Request $request)
    {

        $request->validate([
            'id_trayek' => 'required',
            'kd_trayek' => 'required',
            'rute' => 'required',
            'alokasi' => 'required'
        ]);

        $update = DB::table('t_trayek')
                    ->where('id', $request->input('id_trayek'))
                    ->update([
                        'kd_trayek' => $request->input('kd_trayek'),
                        'rute' => $request->input('rute'),
                        'alokasi' => $request->input('alokasi')
                    ]);

        return redirect('/data/trayek')->with('status2', 'Data Trayek telah diupdate.');
    }

    public function delete_trayek($id){
        $data_trayek = DB::table('t_trayek')
                            ->where('id', $id)
                            ->delete();

        return back()->with('status3', 'Data Trayek telah dihapus.');
    }
}
