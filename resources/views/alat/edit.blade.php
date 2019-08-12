@extends('layouts.admin-master')

@section('title')
Tambah Alat
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Tambah Alat</h1>
  </div>

  <div class="section-body">
    <div class="container">
            <form action="{{route('alat.update',['id'=>$alat->id])}}" method="POST"  enctype="multipart/form-data">
        <div class="row">
            
            
                <div class="col-md-6">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                    <div class="form-group">
                        <label>Jenis Alat</label>
                        <select name="jenis_id" class="form-control {{isset($errors->messages()['jenis_peralatan']) ? ' invalid-input' : '' }}" >
                            @foreach ($jenis as $j)
                                <option value="{{$j->id}}" @if($j->id == $alat->jenis_id) selected="selected" @endif>{{$j->nama}}</option>
                            @endforeach
                        </select>
                        @if(isset($errors->messages()['jenis_id']))  
                        <span class="error-message">*@foreach ($errors->messages()['jenis_id'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tipe / Merek</label>
                        <input value="{{$alat->tipe}}" type="text" class="form-control {{isset($errors->messages()['tipe']) ? ' invalid-input' : '' }}" placeholder="Tipe / Merek" name="tipe">
                        @if(isset($errors->messages()['tipe']))  
                        <span class="error-message">*@foreach ($errors->messages()['tipe'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>No. Reg</label>
                        <input value="{{$alat->tipe}}" type="text" class="form-control {{isset($errors->messages()['no_reg']) ? ' invalid-input' : '' }}" placeholder="No. Reg" name="no_reg">
                        @if(isset($errors->messages()['no_reg']))  
                        <span class="error-message">*@foreach ($errors->messages()['no_reg'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kapasitas</label>
                    <input value="{{$alat->kapasitas}}" type="text" class="form-control {{isset($errors->messages()['kapasitas']) ? ' invalid-input' : '' }}" placeholder="Kapasitas cth: 10 Ton" name="kapasitas">
                        @if(isset($errors->messages()['kapasitas']))  
                        <span class="error-message">*@foreach ($errors->messages()['kapasitas'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nomor Polisi</label>
                        <input value="{{$alat->no_polisi}}" type="text" class="form-control {{isset($errors->messages()['no_polisi']) ? ' invalid-input' : '' }}" placeholder="Nomor Polisi" name="no_polisi">
                        @if(isset($errors->messages()['no_polisi']))  
                        <span class="error-message">*@foreach ($errors->messages()['no_polisi'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea  name="keterangan" cols="30" rows="10" placeholder="Keterangan" class="form-control {{isset($errors->messages()['keterangan']) ? ' invalid-input' : '' }}">{{$alat->keterangan}}</textarea>
                        @if(isset($errors->messages()['keterangan']))  
                        <span class="error-message">*@foreach ($errors->messages()['keterangan'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="image" class="form-control {{isset($errors->messages()['image']) ? ' invalid-input' : '' }}" />
                        @if(isset($errors->messages()['image']))  
                        <span class="error-message">*@foreach ($errors->messages()['image'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                            <label>Gambar</label>
                            {{-- <input type="file" class="form-control {{isset($errors->messages()['scan_identitas']) ? ' invalid-input' : '' }}" placeholder="No KTP / SIM" name="scan_identitas">
                            @if(isset($errors->messages()['scan_identitas']))  
                            <span class="error-message">*@foreach ($errors->messages()['scan_identitas'] as $message)
                                    {{$message." "}}
                                @endforeach</span>
                            @endif --}}
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Uploaded Gambar</p>
                                    <a style="pointer:hand;" href="{{url('uploads/'.$alat->image)}}" target="_blank"><img src="{{url('uploads/'.$alat->image)}}" alt="" height="150" /></a>
                                </div>
                            </div>
                        </div>

                    <div class="form-group">
                        <label>Harga Sewa / Hari (Rp/Rupiah)</label>
                    <input value="{{$alat->harga_sewa_perhari}}" type="number" class="form-control {{isset($errors->messages()['harga_sewa_perhari']) ? ' invalid-input' : '' }}" placeholder="cth:30000" name="harga_sewa_perhari">
                        @if(isset($errors->messages()['harga_sewa_perhari']))  
                        <span class="error-message">*@foreach ($errors->messages()['harga_sewa_perhari'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            
        </div>
        
    </form>
    </div>
    

  </div>
</section>
@endsection
