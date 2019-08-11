@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
          <h1>Alat</h1>
  </div>

  <div class="section-body">
      @if(Auth::user()->jabatan == "perusahaan")
      <a class="btn btn-primary"style="text-alight:right" href="{{route('alat.create')}}">Tambah</a>
      @endif
      <table class="table table-bordered" id="alat-table">
          <thead>
              <tr>
                  <th>ID Alat</th>
                  <th>Jenis</th>
                  <th>Tipe</th>
                  <th>Kapasitas</th>
                  <th>Harga Sewa / Hari (Rp)</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
  </div>
</section>
@push('scripts')
<script>
    $(function() {
        $('#alat-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('alat.get-data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'jenis_id', name: 'jenis_id' },
                { data: 'tipe', name: 'tipe' },
                { data: 'kapasitas', name: 'kapasitas' },
                { data: 'harga_sewa_perhari', name: 'harga_sewa_perhari' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    </script>
    @if(!empty($success))
    <script>
        var toast = new iqwerty.toast.Toast();
        toast
        .setText('{{$success}}')
        .stylize({
        background: '#007E33',
        color: 'white',
        'box-shadow': '0 0 50px rgba(0, 0, 0, .7)'
        })
        .show();
    </script>
    
    @endif
  @endpush
@endsection