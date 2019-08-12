<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Jenis;
use Yajra\Datatables\Datatables;
use File;
use Auth;
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
        

        if(Auth::user()->jabatan == "perusahaan"){
            $data = Alat::where('created_by',Auth::user()->id);
        }else{
            $data = Alat::query();
        }
        return Datatables::of($data)->addColumn('action', function ($alat) {
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
        $jenis = Jenis::all();
        return view('alat.create',compact('jenis'));
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
            'jenis_id'=>'required',
            'tipe'=>'required',
            'no_reg'=>'required',
            'harga_sewa_perhari'=>'required|integer',
            'image'=>'required|image|mimes:jpeg,png,gif,webp,jpg|max:2048',
        ]);

        $request->merge(['created_by'=>Auth::user()->id]);

        $file = $request->file('image');
        $filename = 'alat-' . time() . '.' . $file->getClientOriginalExtension();
        $folder = $file->move('uploads', $filename);
        // dd($filename);
        $request = new Request($request->all());
        $request->merge(['image'=>$filename]);
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
        $alat = Alat::findorfail($id);
        $jenis = Jenis::all();
        if(!$alat) return redirect()->back();

        if($alat->created_by != Auth::user()->id && Auth::user()->jabatan == "perusahaan"){
            return abort(403,'Bukan Hak Akses Anda');
        }
        return view('alat.edit',['alat'=>$alat,'jenis'=>$jenis]);
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
            'jenis_id'=>'required',
            'tipe'=>'required',
            'no_reg'=>'required',
            'harga_sewa_perhari'=>'required|integer',
            'image'=>'image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $alat = Alat::find($id);
        if(!$alat) return redirect()->back();

        
        if($request->has('image')){

            $file = $request->file('image');
            $filename = 'alat-' . time() . '.' . $file->getClientOriginalExtension();
            $folder = $file->move('uploads', $filename);
            
            $request = new Request($request->all());
            $request->merge(['image'=>$filename]);

            $image_path = public_path().'/uploads/'.$alat->image;  
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
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
