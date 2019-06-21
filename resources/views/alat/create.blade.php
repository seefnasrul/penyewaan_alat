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
            <form action="{{route('alat.create')}}" method="POST">
        <div class="row">
            
            
                <div class="col-md-6">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Jenis Alat</label>
                        <input type="text" class="form-control {{isset($errors->messages()['jenis_peralatan']) ? ' invalid-input' : '' }}" placeholder="Jenis Alat" name="jenis_peralatan">
                        @if(isset($errors->messages()['jenis_peralatan']))  
                        <span class="error-message">*@foreach ($errors->messages()['jenis_peralatan'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tipe / Merek</label>
                        <input type="text" class="form-control {{isset($errors->messages()['tipe']) ? ' invalid-input' : '' }}" placeholder="Tipe / Merek" name="tipe">
                        @if(isset($errors->messages()['tipe']))  
                        <span class="error-message">*@foreach ($errors->messages()['tipe'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>No. Reg</label>
                        <input type="text" class="form-control {{isset($errors->messages()['no_reg']) ? ' invalid-input' : '' }}" placeholder="No. Reg" name="no_reg">
                        @if(isset($errors->messages()['no_reg']))  
                        <span class="error-message">*@foreach ($errors->messages()['no_reg'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input type="text" class="form-control {{isset($errors->messages()['kapasitas']) ? ' invalid-input' : '' }}" placeholder="Kapasitas cth: 10 Ton" name="kapasitas">
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
                        <input type="text" class="form-control {{isset($errors->messages()['no_polisi']) ? ' invalid-input' : '' }}" placeholder="Nomor Polisi" name="no_polisi">
                        @if(isset($errors->messages()['no_polisi']))  
                        <span class="error-message">*@foreach ($errors->messages()['no_polisi'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>
                    
                    
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" cols="30" rows="10" placeholder="Keterangan" class="form-control {{isset($errors->messages()['keterangan']) ? ' invalid-input' : '' }}"></textarea>
                        @if(isset($errors->messages()['keterangan']))  
                        <span class="error-message">*@foreach ($errors->messages()['keterangan'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Harga Sewa / Hari (Rp/Rupiah)</label>
                        <input type="number" class="form-control {{isset($errors->messages()['harga_sewa_perhari']) ? ' invalid-input' : '' }}" placeholder="cth:30000" name="harga_sewa_perhari">
                        @if(isset($errors->messages()['harga_sewa_perhari']))  
                        <span class="error-message">*@foreach ($errors->messages()['harga_sewa_perhari'] as $message)
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
