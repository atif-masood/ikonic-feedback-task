@extends('layout.master')
@section('title')
Feedback
@endsection
@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">FeedBack</h4>
          {{-- <a href="{{ route('feedbacks.create') }}" class="btn btn-success btn-fw">Add Feedback</a> --}}
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Vote Count</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    @if(isset($feedbacks ))
                    @foreach($feedbacks as $feedback)
                    <td>{{$feedback->title}}</td>
                    <td>{!! $feedback->description !!}</td>
                    <td>{{$feedback->category}}</td>
                    <td>{{ $voteCounts[$feedback->id]}}</td>
                    <td>
                        @if ($feedback->status == 1)
                            Active
                        @else
                            Inactive
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-fw" href="{{ route('feedbacks.edit',  $feedback->id) }}">Edit</a>
                        <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-fw">Delete</button>
                        </form>
                        {{-- <a class="btn btn-danger btn-fw" href="{{ route('feedbacks.destroy', $feedback->id) }}">Delete</a> --}}
                    </td>
                    
                </tr>
                @endforeach
                @else
                    <td> No Record</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $feedbacks->links() }}
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