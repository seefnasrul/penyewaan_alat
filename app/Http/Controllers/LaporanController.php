<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Perusahaan;
use Yajra\Datatables\Datatables;
use PDF;
use Auth;

class LaporanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }


    public function generateReport(Request $request){
        
        $id_user =  Auth::user()->id;
        $transaksis = Transaksi::
        select('alats.*','transaksis.*')
        ->whereBetween('tanggal_pinjam',[
            $request->date_start,
            $request->date_end
        ])->orWhereBetween('tanggal_kembali',[
            $request->date_start,
            $request->date_end
        ])
        ->join('alats','alats.id','transaksis.alat_id')
        ->join('users','alats.created_by','users.id');
        if(Auth::user()->jabatan == "perusahaan"){
            $transaksis = $transaksis->where('users.id',Auth::user()->id);
            $perusahaan = Perusahaan::where('user_id',Auth::user()->id)->first();
        }
        $transaksis = $transaksis->get();
        
        $data = [
            'date_start'=>$request->date_start,
            'date_end'=>$request->date_end,
            'perusahaan'=>$perusahaan,
            'transaksis'=>$transaksis,
        ];
        // return view('laporan.pdf',$data);

        $pdf = PDF::loadview('laporan.pdf',$data);

        return $pdf->download('laporan-periode-'.$request->date_start.'-'.$request->date_end.'.pdf');

    }
}
