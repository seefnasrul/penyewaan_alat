<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Alat;
use App\Jenis;
use DB;
// use Yajra\Datatables\Datatables;
class MarketController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return view('laporan.index');
        $jenis =  Jenis::all();
        $data = Alat::select('alats.*','perusahaans.nama_perusahaan')->leftjoin('transaksis','alats.id','transaksis.alat_id')
        ->leftjoin('users','users.id','alats.created_by')
        ->leftjoin('perusahaans','perusahaans.user_id','users.id');


        if($request->has('category')){
            $data = $data->where('jenis_id',$request->category);
        }
        $data = $data->where(function($query) use($request){
            $query->where('transaksis.tanggal_kembali','=',null);
            $query->where('transaksis.tanggal_pinjam','=',null);
            if($request->has('category')){
                $query->where('jenis_id',$request->category);
            }
        })->orWhere(function($query) use($request){
            $query->where('transaksis.tanggal_kembali','!=',null);
            $query->where('transaksis.tanggal_pinjam','!=',null);
            if($request->has('category')){
                $query->where('jenis_id',$request->category);
            }
        })->get();

        $top_sales = Transaksi::
        select(DB::RAW('count(alats.id) as total_transaksi'),'alats.*')
        ->join('alats','alats.id','transaksis.alat_id')
        ->groupBy('alats.id')->orderBy('total_transaksi','desc')->limit(5)->get();
        
        // return response($laris);
        return view('market.index',compact('data','jenis','top_sales'));
    }
    public function detail($id){

        $alat = Alat::findorfail($id);

        $data = Alat::select('jenis.nama','perusahaans.nama_perusahaan','perusahaans.email as email_perusahaan','perusahaans.alamat',
        'perusahaans.no_telp as no_telp','alats.*')
        ->join('jenis','jenis.id','alats.jenis_id')
        ->leftjoin('users','users.id','alats.created_by')
        ->leftjoin('perusahaans','perusahaans.user_id','users.id')        
        ->where('alats.id',$alat->id)->first();
        // return response($data);
        return view('market.detail',compact('data'));
    }
}
