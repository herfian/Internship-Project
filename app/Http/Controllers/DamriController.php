<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use DataTables;
use Illuminate\Support\Facades\Gate;

class DamriController extends Controller
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
        $data_damri = DB::table('damri')->limit(10)->get();
		$jurusan=DB::table('damri')->select('TRAYEK')->groupBy('TRAYEK')->orderBy('TRAYEK', 'desc')->get();
		return view('damri/index', compact("data_damri","jurusan"));
    }

    public function get_data_damri(Request $request)
    {
        if ($request->ajax()) {

            if (Gate::allows('isAdmin')) {
                $data = DB::table('damri')->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->addColumn('aksi', function($row) {

                                $btn = '<a href="'.url('data/damri/edit/'.$row->NO).'" class="edit btn btn-info btn-sm">Edit</a>
                                <a href="'.url('data/damri/delete/'.$row->NO).'" class="delete btn btn-danger btn-sm">Delete</a>';

                                return $btn;
                            })
                            ->rawColumns(['aksi'])
                            ->make(true);
            } else {
                $data = DB::table('damri')->get();

                return Datatables::of($data)
                            ->addIndexColumn()
                            ->make(true);
            }
        }

        return view('damri.index');
    }



     public function tambah_data_damri()
    {
        
        $form_damri = DB::table('damri')->get();
        return view('damri.tambah_damri', compact('form_damri'));
    }

    public function edit_data_damri($NO)
    {
        $data_damri = DB::table('damri')
                                ->where('NO', $NO)
                                ->first();
        return view('damri.edit_damri', compact('data_damri'));
    }

    public function simpan_data_damri(Request $request){

        $this->validate($request, [
            'CODE' => ['required', 'int', 'min:4'],
            'PLATNO' => ['required', 'string', 'min:5'],
            'TRAYEK' => ['required', 'string', 'min:5'],     
        ]);

        $NO = $request->NO;
        $CODE = $request->CODE;
        $PLATNO = $request->PLATNO;
        $TRAYEK = $request->TRAYEK;

        DB::table('damri')
                ->insert([
                    'CODE' => $CODE,
                    'PLATNO' => $PLATNO,
                    'TRAYEK' => $TRAYEK,
                ]);
        
        return redirect('/data/damri')->with('status1', "Data Damri berhasil disimpan.");
        
    }   

    public function update_data_damri(Request $request){

        $this->validate($request, [
            'NO' => ['required', 'int', 'min:1'],
            'CODE' => ['required', 'int', 'min:4'],
            'PLATNO' => ['required', 'string', 'min:5'],
            'TRAYEK' => ['required', 'string', 'min:5'],           
      
        ]);

        $NO = $request->NO;
        $CODE = $request->CODE;
        $PLATNO = $request->PLATNO;
        $TRAYEK = $request->TRAYEK;

        DB::table('damri')
                ->where('NO', $NO)
                ->update([
                    'NO' => $NO,
                    'CODE' => $CODE,
                    'PLATNO' => $PLATNO,
                    'TRAYEK' => $TRAYEK,
                ]);
        
        return redirect('/data/damri')->with('status2', "Data Damri berhasil diupdate.");
        
    }   

    public function delete_damri($NO){
            $data_damri = DB::table('damri')
                            ->where('NO', $NO)
                            ->delete();

            return back()->with('status3', 'Data Damri telah dihapus.');
    }
    
}
