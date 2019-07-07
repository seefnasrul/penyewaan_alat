@extends('layouts.admin-master')

@section('title')
Perbarui Transaksi
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Perbarui Transaksi</h1>
  </div>

  <div class="section-body">
    <div class="container">
        <form action="{{route('pengguna.update',['id'=>$pengguna->id])}}" enctype="multipart/form-data" method="POST" >
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-12">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama</label>
                        <input readonly value="{{$pengguna->name}}" type="text" class="form-control {{isset($errors->messages()['name']) ? ' invalid-input' : '' }}" placeholder="Name" name="name">
                        @if(isset($errors->messages()['name']))  
                        <span class="error-message">*@foreach ($errors->messages()['name'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input readonly value="{{$pengguna->email}}" type="text" class="form-control {{isset($errors->messages()['email']) ? ' invalid-input' : '' }}" placeholder="Email" name="email">
                        @if(isset($errors->messages()['email']))  
                        <span class="error-message">*@foreach ($errors->messages()['email'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control" {{isset($errors->messages()['jabatan']) ? ' invalid-input' : '' }}>
                            <option value="pemilik" @if($pengguna->jabatan == "pemilik") selected="selected" @endif >Pemilik</option>
                            <option value="karyawan" @if($pengguna->jabatan == "karyawan") selected="selected" @endif >Karyawan</option>
                        </select>

                        @if(isset($errors->messages()['jabatan']))  
                        <span class="error-message">*@foreach ($errors->messages()['jabatan'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                        <!-- <input readonly value="{{$pengguna->email}}" type="text" class="form-control {{isset($errors->messages()['email']) ? ' invalid-input' : '' }}" placeholder="Alat ID" name="alat_id">
                        @if(isset($errors->messages()['email']))  
                        <span class="error-message">*@foreach ($errors->messages()['email'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif -->
                    </div>

                    <button class="btn btn-primary"  type="submit" >Simpan</button>



                </div>
            </div>
        
        </form>
    </div>
    

  </div>
</section>

@endsection