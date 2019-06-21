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
  @endpush
@endsection