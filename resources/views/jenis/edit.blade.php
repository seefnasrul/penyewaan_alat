@extends('layouts.admin-master')

@section('title')
Edit Jenis
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Jenis</h1>
  </div>

  <div class="section-body">
    <div class="container">
        <form action="{{route('jenis.update',['id'=>$data->id])}}" method="POST">
        <div class="row">
                @method('PUT')
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control {{isset($errors->messages()['nama']) ? ' invalid-input' : '' }}" placeholder="Nama" name="nama" value="{{$data->nama}}" >
                        @if(isset($errors->messages()['nama']))  
                        <span class="error-message">*@foreach ($errors->messages()['nama'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            
        </div>
        
    </form>
    </div>
    

  </div>
</section>
@endsection
