<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Alat;
use App\Transaksi;
use App\Perusahaan;
use Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $count_transaksi = new Transaksi;
        $count_iklan = new Alat;
        $count_perusahaan = Perusahaan::count();
        
        if(Auth::user()->jabatan == "perusahaan"){
            $count_transaksi = $count_transaksi->join('alats','alats.id','transaksis.alat_id')
            ->join('users','alats.created_by','users.id')
            ->where('users.id',Auth::user()->id);
            $count_iklan = $count_iklan->join('users','alats.created_by','users.id')
            ->where('users.id',Auth::user()->id);
        }
        $count_transaksi = $count_transaksi->count();
        $count_iklan = $count_iklan->count();
        
        return view('admin.dashboard.index',
        compact([
            'count_transaksi',
            'count_perusahaan',
            'count_iklan'
        ]));
    }
}
