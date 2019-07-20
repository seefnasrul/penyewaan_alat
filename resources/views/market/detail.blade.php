    @extends('layouts.market-master')
  @section('content')

    <div class="row">

      <div class="col-lg-3">
        <h4 class="my-4">Kategori Alat</h4>
        <div class="list-group">
          <a href="{{route('market.home')}}?category={{$data->jenis_id}}" class="list-group-item active">{{$data->nama}}</a>
        </div>
      </div>

      <div class="col-lg-9">

        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="{{url('uploads/'.$data->image)}}" alt="">
          <div class="card-body">
            <h3 class="card-title">{{$data->tipe}}</h3>
            <h4 class="text-success">{{format_rupiah($data->harga_sewa_perhari)}} /  Hari</h4>
            <h5 class="text-info">Kategori : {{$data->nama}}</h5>
            <p class="card-text">
                {{$data->keterangan}}
            </p>
          </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            <h4>Perusahaan Pemilik</h4>
          </div>
          <div class="card-body">
            <table style="width:100%;">
                <tr>
                    <td ><b>Nama Perusahaan</b></td>
                    <td>{{$data->nama_perusahaan}}</td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td>{{$data->alamat}}</td>
                </tr>
                <tr>
                    <td><b>Telp.</b></td>
                    <td>{{$data->no_telp}}</td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td>{{$data->email_perusahaan}}</td>
                </tr>
            </table>

          </div>
        </div>

      </div>

    </div>

  @endsection