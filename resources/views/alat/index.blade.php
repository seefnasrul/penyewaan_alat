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
      <a class="btn btn-primary"style="text-alight:right" href="{{route('alat.create')}}">Tambah</a>
      <table class="table table-bordered" id="alat-table">
          <thead>
              <tr>
                  <th>ID Alat</th>
                  <th>Jenis Peralatan</th>
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
                { data: 'jenis_peralatan', name: 'jenis_peralatan' },
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
  @endpush
@endsection