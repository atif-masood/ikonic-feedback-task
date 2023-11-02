@extends('layout.master')
@section('title')
Edit Feedback
@endsection
@push('plugin-styles')
@endpush

@section('content')
<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit FeedBack</h4>
          <div class="table-responsive">
            <form method="POST" action="{{ route('feedback.update_feedback', $feedback->id) }}">
                @csrf
                @method('PATCH') <!-- Use PATCH for updating data -->
    
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $feedback->title }}" required>
                </div>
    
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="bug" {{ $feedback->category === 'bug' ? 'selected' : '' }}>Bug Report</option>
                        <option value="feature" {{ $feedback->category === 'feature' ? 'selected' : '' }}>Feature Request</option>
                        <option value="improvement" {{ $feedback->category === 'improvement' ? 'selected' : '' }}>Improvement Suggestion</option>
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control ckeditor" rows="5" required>{!! $feedback->description !!}</textarea>
                </div>
    
                <button type="submit" class="btn btn-primary">Update Feedback</button>
            </form>
    
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('plugin-scripts')
  <link href="{{URL::asset('/assets/plugins/chartjs/chart.min.js') }}" rel="stylesheet" type="text/javascript" />
  <link href="{{URL::asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}" rel="stylesheet" type="text/javascript" />
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

        $('.ckeditor').ckeditor();

        });

    </script>
@endpush

@push('custom-scripts')
  <link href="{{URL::asset('/assets/js/dashboard.js') }}" rel="stylesheet" type="text/javascript" />
@endpush