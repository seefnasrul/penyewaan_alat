@extends('layouts.admin-master')

@section('title')
Laporan Bulanan
@endsection

@section('content')
<section class="section">
  <div class="section-header">
          <h1>Laporan</h1>
  </div>

  <div class="section-body">
  <form action="{{route('laporan.generate_report')}}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="date-start">Tanggal Mulai</label>
                    <input class="form-control" type="date" name="date_start" id="date-start" />   
                </div> 
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="date-start">Tanggal Akhir</label>
                    <input class="form-control" type="date" name="date_end" id="date-end" />   
                </div> 
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary btn-block">Generate Report</button>
            </div>
        </div>
        
    </form>
  </div>
{{-- </section>
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
  @endpush --}}
@endsection