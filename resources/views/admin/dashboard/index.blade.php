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

      <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card card-statistic-2">
            <div class="card-stats">
              <div class="card-stats-title">Statistics
              </div>
              <div class="card-stats-items">
                <div class="card-stats-item">
                  <div class="card-stats-item-count">24</div>
                  <div class="card-stats-item-label">Pending</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">12</div>
                  <div class="card-stats-item-label">Shipping</div>
                </div>
                <div class="card-stats-item">
                  <div class="card-stats-item-count">23</div>
                  <div class="card-stats-item-label">Completed</div>
                </div>
              </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Orders</h4>
              </div>
              <div class="card-body">
                59
              </div>
            </div>
          </div>
        </div>


  </div>
</section>
@endsection
