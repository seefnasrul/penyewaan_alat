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
            <form action="{{route('transaksi.update',['id'=>$transaksi->id])}}" enctype="multipart/form-data" method="POST" >
                
                    {{ method_field('PUT') }}
        <div class="row">
                <div class="col-md-6">
                        <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th colspan=2>Keterangan Alat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>ID Alat</td>
                                    <td>{{$alat->id}}</td>
                                  </tr>
                                  <tr>
                                    <td>Jenis Peralatan</td>
                                    <td >{{$alat->jenis_peralatan}}</td>
                                  </tr>
                                    <tr>
                                        <td>No. Reg</th>
                                        <td>{{$alat->no_reg}}</th>
                                    </tr>
                                    <tr>
                                        <td>Kapasitas</th>
                                        <td>{{$alat->kapasitas}}</th>
                                    </tr>
                                    
                                    <tr>
                                        <td>No. Polisi</th>
                                        <td>{{$alat->no_polisi}}</th>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</th>
                                        <td>{{$alat->keterangan}}</th>
                                    </tr>
                                    <tr>
                                        <td>Harga Sewa / Hari (Rp)</th>
                                        <td>{{format_rupiah($alat->harga_sewa_perhari)}}</th>
                                    </tr>
                                </tbody>
                              </table>

                </div>
                <div class="col-md-6">
                        <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th colspan=2>Kalkulasi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                      <tr>
                                        <td>Lama (Hari)</td>
                                        <td id="lama-hari">0</td>
                                      </tr>
                                      <tr>
                                        <td>Biaya / Hari</td>
                                        <td >Rp{{$alat->harga_sewa_perhari}}</td>
                                      </tr>
                                      <tr>
                                        <th>Total Biaya Sewa</th>
                                        <th id="total-biaya">Rp0</th>
                                      </tr>
                                      <tr>
                                        <td>Lama Melebihi Batas Peminjaman (Hari)</th>
                                        <td id="lama-denda-hari">Rp0</th>
                                      </tr>
                                      <tr>
                                            <td>Biaya Denda / Hari</th>
                                            <td id="total-biaya">Rp{{$alat->harga_sewa_perhari*1.2}} (120% dari biaya sewa normal)</th>
                                        </tr>
                                      <tr>
                                        <th>Total Denda</th>
                                        <th id="total-denda">Rp0</th>
                                      </tr>
                                    </tbody>
                                  </table>
                        
                        <button type="submit" class="btn btn-primary btn-block">Perbarui Transaksi</button>
                </div>
                <div class="col-md-6">
                        {{ csrf_field() }}
                    <div class="form-group">
                            <label>ID Alat</label>
                            <input readonly value="{{$alat->id}}" type="text" class="form-control {{isset($errors->messages()['alat_id']) ? ' invalid-input' : '' }}" placeholder="Alat ID" name="alat_id">
                            @if(isset($errors->messages()['alat_id']))  
                            <span class="error-message">*@foreach ($errors->messages()['alat_id'] as $message)
                                    {{$message." "}}
                                @endforeach</span>
                            @endif
                        </div>

                        <div class="form-group">
                                <label>Nama Lengkap Penyewa</label>
                        <input readonly value="{{$transaksi->nama_peminjam}}" type="text" class="form-control {{isset($errors->messages()['nama_peminjam']) ? ' invalid-input' : '' }}" placeholder="Nama Lengkap Penyewa" name="nama_peminjam">
                                @if(isset($errors->messages()['nama_peminjam']))  
                                <span class="error-message">*@foreach ($errors->messages()['nama_peminjam'] as $message)
                                        {{$message." "}}
                                    @endforeach</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tipe Identitas</label>
                                <select readonly name="tipe_identitas" class="form-control {{isset($errors->messages()['tipe_identitas']) ? ' invalid-input' : '' }}">
                                    <option value="KTP" @if($transaksi->tipe_idenditas == "KTP") selected="selected" @endif>KTP</option>
                                    <option value="SIM" @if($transaksi->tipe_idenditas == "SIM") selected="selected" @endif>SIM</option>
                                </select>
                                @if(isset($errors->messages()['tipe_identitas']))  
                                <span class="error-message">*@foreach ($errors->messages()['tipe_identitas'] as $message)
                                        {{$message." "}}
                                    @endforeach</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>No KTP / SIM</label>
                                <input readonly value="{{$transaksi->no_ktp_sim}}}" type="text" class="form-control {{isset($errors->messages()['no_ktp_sim']) ? ' invalid-input' : '' }}" placeholder="No KTP / SIM" name="no_ktp_sim">
                                @if(isset($errors->messages()['no_ktp_sim']))  
                                <span class="error-message">*@foreach ($errors->messages()['no_ktp_sim'] as $message)
                                        {{$message." "}}
                                    @endforeach</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Scan Identitas</label>
                                {{-- <input type="file" class="form-control {{isset($errors->messages()['scan_identitas']) ? ' invalid-input' : '' }}" placeholder="No KTP / SIM" name="scan_identitas">
                                @if(isset($errors->messages()['scan_identitas']))  
                                <span class="error-message">*@foreach ($errors->messages()['scan_identitas'] as $message)
                                        {{$message." "}}
                                    @endforeach</span>
                                @endif --}}
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-title">Uploaded Scan</p>
                                        <a style="pointer:hand;" href="{{url('uploads/'.$transaksi->scan_identitas)}}" target="_blank"><img src="{{url('uploads/'.$transaksi->scan_identitas)}}" alt="" height="150" /></a>
                                    </div>
                                </div>
                            </div>

                </div>
                <div class="col-md-6">
                    

                    <div class="form-group">
                        <label>Tanggal Mulai Pinjam</label>
                    <input readonly value="{{$transaksi->tanggal_pinjam}}" id="date_start"  type="date" class="form-control {{isset($errors->messages()['tanggal_pinjam']) ? ' invalid-input' : '' }}" placeholder="Tanggal Peminjaman" name="tanggal_pinjam">
                        @if(isset($errors->messages()['tanggal_pinjam']))  
                        <span class="error-message">*@foreach ($errors->messages()['tanggal_pinjam'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Tanggal Rencana Pengembalian</label>
                        <input readonly value="{{$transaksi->tanggal_rencana_kembali}}" id="date_end" type="date" class="form-control {{isset($errors->messages()['tanggal_rencana_kembali']) ? ' invalid-input' : '' }}" placeholder="Tanggal Rencana Pengembalian" name="tanggal_rencana_kembali">
                        @if(isset($errors->messages()['tanggal_rencana_kembali']))  
                        <span class="error-message">*@foreach ($errors->messages()['tanggal_rencana_kembali'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>  

                    <div class="form-group">
                        <label>Tanggal Pengembalian</label>
                        <input min="{{$transaksi->tanggal_rencana_kembali}}" onChange="calculateDenda()" value="{{$transaksi->tanggal_kembali}}" id="return-date" type="date" class="form-control {{isset($errors->messages()['tanggal_kembali']) ? ' invalid-input' : '' }}" placeholder="Tanggal Pengembalian" name="tanggal_kembali">
                        @if(isset($errors->messages()['tanggal_kembali']))  
                        <span class="error-message">*@foreach ($errors->messages()['tanggal_kembali'] as $message)
                                {{$message." "}}
                            @endforeach</span>
                        @endif
                    </div>  
                </div>
        </div>
        
    </form>
    </div>
    

  </div>
</section>

<script>
    var harga = {{ $alat->harga_sewa_perhari }};
    var harga_denda  = {{$alat->harga_sewa_perhari*1.2}}
    function calculate(){ 
        if(document.getElementById('date_end').value != null || document.getElementById('date_end').value != ""){
            var startDay = new Date(document.getElementById('date_start').value);
            var endDay = new Date(document.getElementById('date_end').value);
            var millisecondsPerDay = 1000 * 60 * 60 * 24;

            var millisBetween = endDay.getTime() - startDay.getTime();
            var days = millisBetween / millisecondsPerDay;
            // Round down.
            
            document.getElementById('lama-hari').innerHTML = days;
            document.getElementById('total-biaya').innerHTML = 'Rp'+days*harga;
        }
    }

    function calculateDenda(){
        if(document.getElementById('date_end').value != null || document.getElementById('return-date').value != ""){
            var startDay = new Date(document.getElementById('date_end').value);
            var endDay = new Date(document.getElementById('return-date').value);
            var millisecondsPerDay = 1000 * 60 * 60 * 24;

            var millisBetween =  endDay.getTime() - startDay.getTime();
            var days = millisBetween / millisecondsPerDay;
            // Round down.
            
            document.getElementById('lama-denda-hari').innerHTML = days;
            document.getElementById('total-denda').innerHTML = 'Rp'+days*harga_denda;
        }
    }
</script>
@endsection
