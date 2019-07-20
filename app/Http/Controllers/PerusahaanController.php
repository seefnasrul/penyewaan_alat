<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\Datatables\Datatables;
use Hash;
use App\Perusahaan;
class PerusahaanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.index');
    }
    
    public function daftar(Request $request){
        return view('market.register');
    }

    public function register(Request $request){

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'nama_perusahaan'=>'required|string|max:255',
            'no_telp'=>'required',
            'email_perusahaan'=>'required|string|email|max:255',
            'alamat'=>'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jabatan'=>'perusahaan',
        ]);

        Perusahaan::create([
            'nama_perusahaan'=>$request->nama_perusahaan,
            'no_telp'=> $request->no_telp,
            'alamat'=>$request->alamat,
            'email'=>$request->email_perusahaan,
            'user_id'=>$user->id,
        ]);
        session()->flash('info', 'Pendaftaran Berhasil!.');
        return redirect('/login');
        // return "ok";
    }
}
