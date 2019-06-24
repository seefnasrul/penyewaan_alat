<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use Yajra\Datatables\Datatables;
class AlatController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alat.index');
    }
    public function getAlats(){
        return Datatables::of(Alat::query())->addColumn('action', function ($alat) {
            return '<a href="'.route('alat.edit',['id'=>$alat->id]).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="'.route('alat.delete',['id'=>$alat->id]).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-delete"></i> Delete</a>';
        })
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alat.create');
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
            'jenis_peralatan'=>'required',
            'tipe'=>'required',
            'no_reg'=>'required',
            'harga_sewa_perhari'=>'required|integer',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index');
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
        $alat = Alat::find($id);
        if(!$alat) return redirect()->back();
        return view('alat.edit',['alat'=>$alat]);
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
        $request->validate([
            'jenis_peralatan'=>'required',
            'tipe'=>'required',
            'no_reg'=>'required',
            'harga_sewa_perhari'=>'required|integer',
        ]);
        $alat = Alat::find($id);
        if(!$alat) return redirect()->back();
        $alat->update($request->all());
        return redirect()->route('alat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alat = Alat::find($id);
        if(!$alat) return redirect()->back();
        $alat->delete();
        return redirect()->route('alat.index');
    }
}
