@extends('layouts.admin-master')

@section('title')
Pengguna
@endsection

@section('content')
<section class="section">
  <div class="section-header">
          <h1>Pengguna</h1>
  </div>

  <div class="section-body">
      <a class="btn btn-primary"style="text-alight:right" href="{{route('pengguna.create')}}">Tambah</a>
      <table class="table table-bordered" id="alat-table">
          <thead>
              <tr>
                  <th>ID User</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jabatan</th>
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
            ajax: '{!! route('pengguna.get-data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'jabatan', name: 'jabatan' },
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