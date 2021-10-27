<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use DataTables;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profiles/index');
    }

    public function list_user()
    {
        $data = DB::table('users')->get();

        return view('user.list_user', compact('data'));
    }

    public function tambah_user()
    {
        $list_role = DB::table('users')
                        ->select('role')
                        ->distinct()
                        ->get();
        return view('user.tambah_user', compact('list_role'));
    }

    public function simpan(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'min:5'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role = $request->role;

        DB::table('users')
                ->insert([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role,
                ]);
        
        return redirect('/user/list')->with('status1', 'User berhasil ditambah.');

    }
    public function delete_user($id){
        $data = DB::table('users')
                        ->where('id', $id)
                        ->delete();

        return back()->with('status3', 'User telah dihapus.');
    }

    public function edit_user($id)
    {
        $data = DB::table('users')
                        ->where('id', $id)
                        ->first();

        return view('user.edit_user', compact('data'));
    }

    public function update_user(Request $request)
    {

        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'min:5'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role = $request->role;

        $update = DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'id' => $id,
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                        'role' => $role,
                    ]);

        return redirect('/user/list')->with('status2', 'Data user telah diupdate.');
    }
}