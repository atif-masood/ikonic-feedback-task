@extends('layout.master')
@section('title')
Dashboard
@endsection
@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Users</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $countUsers ?? '' }}</h3>
            </div>
          </div>
        </div>
        {{-- <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth </p> --}}
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Total Feedback</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $countFeedbacks ?? ''}}</h3>
            </div>
          </div>
        </div>
        {{-- <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
          <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales </p> --}}
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <link href="{{URL::asset('/assets/plugins/chartjs/chart.min.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}" rel="stylesheet" type="text/javascript" />
@endpush

@push('custom-scripts')
  <link href="{{URL::asset('/assets/js/dashboard.js') }}" rel="stylesheet" type="text/javascript" />
@endpush