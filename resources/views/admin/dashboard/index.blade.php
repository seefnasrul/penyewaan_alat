@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="section-body">
    <div class="row">
      @if(Auth::user()->jabatan != "perusahaan")
      <div class="col-md-4">
          <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-building"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Perusahaan</h4> 
                </div>
                <div class="card-body">
                  {{$count_perusahaan}}
                </div>
              </div>
            </div>
      </div>
      @endif
      <div class="@if(Auth::user()->jabatan == "perusahaan") col-md-6 @else col-md-4 @endif">
          <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Transaksi</h4>
                </div>
                <div class="card-body">
                  {{$count_transaksi}}
                </div>
              </div>
            </div>
      </div>
      <div class="@if(Auth::user()->jabatan == "perusahaan") col-md-6 @else col-md-4 @endif">
          <div class="card card-statistic-2">
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-ad"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Iklan</h4>
                </div>
                <div class="card-body">
                  {{$count_iklan}}
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>
@endsection
