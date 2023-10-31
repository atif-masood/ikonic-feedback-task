@extends('layout.master')
@section('title')
Users
@endsection
@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Users</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created Time</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @if(isset($users))
                    @foreach($users as $user)
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('d F Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-fw" href="{{ route('admin.delete-user', ['id' => $user->id]) }}">Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                @else
                    <td> No Record</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
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