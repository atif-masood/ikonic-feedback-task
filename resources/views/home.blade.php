@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    @if(isset($feedbacks) && $feedbacks->count() > 0)
        <div class="row">
            @foreach($feedbacks as $feedback)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $feedback->title ?? '' }}
                        </div>
                        <div class="card-body">
                            <p><strong>Category:</strong> {{ $feedback->category ?? '' }}</p>
                            <p>{!! $feedback->description ?? '' !!}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('feedback.show', $feedback) }}" class="btn btn-primary">View Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @else
            <p class="text-center strong">No Feedback Available</p>
        @endif
    </div
</div>
@endsection
