<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Alat;   
use Yajra\Datatables\Datatables;
use DateTime;
use DB;
USE Carbon\Carbon;
class TransaksiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('transaksi.index');
    }

    public function indexTambahTransaksi(){
        return view('transaksi.indexTambah');
    }

    public function getDataTambahTransaksi(){
        $data = Alat::select('alats.*')->leftjoin('transaksis','alats.id','transaksis.alat_id');
        $data = $data->where(function($query) {
            $query->where('transaksis.tanggal_kembali','=',null)
            ->where('transaksis.tanggal_pinjam','=',null);
        })->orWhere(function($query) {
            $query->where('transaksis.tanggal_kembali','!=',null)
            ->where('transaksis.tanggal_pinjam','!=',null);
        });
        return Datatables::of($data)->addColumn('action', function ($alat) {
            return '<a href="'.route('transaksi.create',['id'=>$alat->id]).'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-delete"></i> Pinjam</a>';
        })
        ->make(true);
    }

    public function getData(){

        $data = Transaksi::select('transaksis.id','alats.id as alat_id','tanggal_pinjam','tanggal_rencana_kembali','nama_peminjam',DB::RAW('(CASE WHEN tanggal_kembali IS NULL THEN "Belum Dikembalikan" ELSE "Dikembalikan" END) as status_pinjam'),
        'transaksis.created_at')->join('alats','alats.id','transaksis.alat_id');
        return Datatables::of($data)->addColumn('action', function ($t) {
            return '<a href="'.route('transaksi.edit',['id'=>$t->id]).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Perbarui</a>';
        })
        ->make(true);
    }
    /**                                                                               x
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $alat = Alat::find($id);
        
        if(!$alat) return  redirect()->back();
        return view('transaksi.create',['alat'=>$alat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'alat_id'=>'required',
            'tanggal_pinjam'=>'required|date|before:tanggal_rencana_kembali',
            'tanggal_rencana_kembali'=>'required|date|after:tanggal_pinjam',
            'nama_peminjam'=>'required',
            'no_ktp_sim'=>'required',
            'tipe_identitas'=>'required|in:SIM,KTP',
            'scan_identitas'=>'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        
        $alat = Alat::find($request->alat_id);
        if(!$alat) return redirect()->back();

        if(Transaksi::where('alat_id',$request->alat_id)->count()){
            $alat = Alat::select('alats.*')->leftjoin('transaksis','transaksis.alat_id','alats.id')
            ->where('transaksis.tanggal_kembali','!=',null)
            ->where('alats.id',$request->alat_id)
            ->first($request->alat_id);

            if(!$alat) return redirect()->back();
        }

        $fdate = $request->tanggal_pinjam;
        $tdate = $request->tanggal_rencana_kembali;
        $datetime1 = new DateTime($fdate);
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $file = $request->file('scan_identitas');
        $filename = 'scan_id-' . time() . '.' . $file->getClientOriginalExtension();
        $folder = $file->move('uploads', $filename);

        $transaksi = new Transaksi;
        $transaksi->alat_id = $request->alat_id;
        $transaksi->tanggal_pinjam = $request->tanggal_pinjam;
        $transaksi->tanggal_rencana_kembali = $request->tanggal_rencana_kembali;
        $transaksi->lama_hari = $days;
        $transaksi->total_biaya_sewa = $days*$alat->harga_sewa_perhari;
        $transaksi->scan_identitas = $filename;
        $transaksi->tipe_identitas = $request->tipe_identitas;
        $transaksi->nama_peminjam = $request->nama_peminjam;
        $transaksi->no_ktp_sim = $request->no_ktp_sim;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success','Simpan Berhasil!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        if(!$transaksi) return redirect()->back();

        $alat = Alat::find($transaksi->alat_id);
        if(!$alat) return redirect()->back();
        
        return view('transaksi.edit',['transaksi'=>$transaksi,'alat'=>$alat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $transaksi = Transaksi::find($id);
        if(!$transaksi) return redirect()->back();
        $request->validate([
            'tanggal_kembali'=>'required|date',
        ]);
        
        if($request->tanggal_kembali > $transaksi->tanggal_rencana_kembali){
            $to = Carbon::createFromFormat('Y-m-d',$transaksi->tanggal_rencana_kembali);
            $from = Carbon::createFromFormat('Y-m-d',$request->tanggal_kembali);
            $diff_in_days = $to->diffInDays($from);
            $denda = $diff_in_days*(($transaksi->total_biaya_sewa/$transaksi->lama_hari)*1.2);   
            $transaksi->update(['total_denda'=>$denda]);
        }else{
            $transaksi->update(['total_denda'=>0]);
        }

        $transaksi->update(['tanggal_kembali'=>$request->tanggal_kembali]);

        return redirect()->route('transaksi.index')->withSuccess('Perbaruan Berhasil!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $alat = Alat::find($id);
        // if(!$alat) return redirect()->back();
        // $alat->delete();
        // return redirect()->route('alat.index');
    }
}
