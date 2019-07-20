@extends('layouts.auth-master')

@section('content')
@foreach ($errors->all() as $error)
        <div style="color:red;">{{ $error }}</div>
    @endforeach
<div class="card card-primary">
  <div class="card-header">
        @foreach ($errors->all() as $error)
        <script>alert('error');</script>
    @endforeach  
    <h4>Daftar Sebagai Perusahaan</h4></div>

  <div class="card-body">
    <form  action="{{ route('market.register')}}" method="POST" >
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" tabindex="1" placeholder="Full name" value="{{ old('name') }}" autofocus>
          <div class="invalid-feedback">
            {{ $errors->first('name') }}
          </div>
        </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" name="email" tabindex="1" value="{{ old('email') }}" autofocus>
        <div class="invalid-feedback">
          {{ $errors->first('email') }}
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" placeholder="Set account password" name="password" tabindex="2">
        <div class="invalid-feedback">
          {{ $errors->first('password') }}
        </div>
      </div>

      <div class="form-group">
        <label for="password_confirmation" class="control-label">Confirm Password</label>
        <input id="password_confirmation" type="password" placeholder="Confirm account password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}" name="password_confirmation" tabindex="2">
        <div class="invalid-feedback">
          {{ $errors->first('password_confirmation') }}
        </div>
      </div>
    
      <div class="form-group">
        <label for="name">Nama Perusahaan</label>
        <input id="name" type="text" class="form-control{{ $errors->has('nama_perusahaan') ? ' is-invalid' : '' }}" name="nama_perusahaan" tabindex="1" placeholder="Nama Perusahaan" value="{{ old('nama_perusahaan') }}" autofocus>
        <div class="invalid-feedback">
            {{ $errors->first('nama_perusahaan') }}
        </div>
        </div>
        
        <div class="form-group">
            <label for="name">No Telp Perusahaan</label>
            <input id="name" type="text" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" tabindex="1" placeholder="Nomor Telepon" value="{{ old('no_telp') }}" autofocus>
            <div class="invalid-feedback">
                {{ $errors->first('no_telp') }}
            </div>
        </div>

        <div class="form-group">
            <label for="name">Email Perusahaan</label>
            <input id="name" type="text" class="form-control{{ $errors->has('email_perusahaan') ? ' is-invalid' : '' }}" name="email_perusahaan" tabindex="1" placeholder="Email Perusahaan" value="{{ old('email_perusahaan') }}" autofocus>
            <div class="invalid-feedback">
                {{ $errors->first('email_perusahaan') }}
            </div>
        </div>

        <div class="form-group">
          <label for="name">Alamat Perusahaan</label>
          <input id="name" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" tabindex="1" placeholder="Alamat Perusahaan" value="{{ old('alamat') }}" autofocus>
          <div class="invalid-feedback">
              {{ $errors->first('alamat') }}
          </div>  
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Register
        </button>
      </div>
    </form>
  </div>
</div>
<div class="mt-5 text-muted text-center">
 Already have an account? <a href="{{ route('login') }}">Sign In</a>
</div>
@endsection
