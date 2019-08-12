@extends('layouts.admin-master')

@section('title')
Tambah Jenis
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Tambah Jenis</h1>
  </div>

  <div class="section-body">
    <div class="container">
            <form action="{{route('jenis.create')}}" method="POST">
        <div class="row">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control {{isset($errors->messages()['nama']) ? ' invalid-input' : '' }}" placeholder="Nama" name="nama">
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
