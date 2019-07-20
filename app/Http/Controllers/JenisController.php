<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Yajra\Datatables\Datatables;
class JenisController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis.index');
    }
    public function getJenis(){
        return Datatables::of(Jenis::query())->addColumn('action', function ($data) {
            return '<a href="'.route('jenis.edit',['id'=>$data->id]).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="'.route('jenis.delete',['id'=>$data->id]).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-delete"></i> Delete</a>';
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
        return view('jenis.create');
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
            'nama'=>'required',
        ]);

        Jenis::create($request->all());

        return redirect()->route('jenis.index');
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
        $data = Jenis::find($id);
        if(!$data) return redirect()->back();
        return view('jenis.edit',['data'=>$data]);
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
            'nama'=>'required',
        ]);
        $data = Jenis::find($id);
        if(!$data) return redirect()->back();
        $data->update($request->all());
        return redirect()->route('jenis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenis::find($id);
        if(!$data) return redirect()->back();
        $data->delete();
        return redirect()->route('jenis.index');
    }
}
