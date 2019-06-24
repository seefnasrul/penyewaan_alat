@extends('layouts.admin-master')

@section('title')
Traksaksi Peminjaman
@endsection

@section('content')
<section class="section">
  <div class="section-header">
          <h1>History Transaksi Penyewaan</h1>
          
  </div>

  <div class="section-body">
      <table class="table table-bordered" id="transaksi-table">
          <thead>
              <tr>
                  <th>ID Transaksi</th>
                  <th>ID Alat</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Rencana Kembali</th>
                  <th>Nama Penyewa</th>
                  <th>Status Sewa</th>
                  <th>Created At</th>
                  <th>Action</th>
              </tr>
          </thead>
      </table>
  </div>
</section>
@push('scripts')
<script>
    $(function() {
        $('#transaksi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('transaksi.get-data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'alat_id', name: 'alat_id' },
                { data: 'tanggal_pinjam', name: 'tanggal_pinjam' },
                { data: 'tanggal_rencana_kembali', name: 'tanggal_rencana_kembali' },
                { data: 'nama_peminjam', name: 'nama_peminjam' },
                { data: 'status_pinjam', name: 'status_pinjam' ,searchable: false},
                { data: 'created_at', name: 'created_at' },
              {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
    </script>
    {{-- @if($message = Session::get('success')) --}}
    <script>
        var toast = new iqwerty.toast.Toast();
        toast
        .setText("<p>asdasdas</p>")
        .stylize({
            background: '#007E33',
            color: 'white',
            'box-shadow': '0 0 50px rgba(0, 0, 0, .7)'
        })
        .show();
    </script>
    {{-- @endif --}}
  @endpush
@endsection