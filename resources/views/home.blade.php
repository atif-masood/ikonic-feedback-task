@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content">
        <div class="col-md-2">
            <div class="card">
                {{-- @auth --}}
                <a href="{{ route('feedback.create') }}" target="_blank" class="btn btn-success btn-fw">Add Feedback</a>
                {{-- @endauth --}}
            </div>
        </div>
    </div><br>
        <div class="row">
            @foreach($feedbacks as $feedback)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            {{ $feedback->title }}
                        </div>
                        <div class="card-body">
                            <p><strong>Category:</strong> {{ $feedback->category }}</p>
                            <p>{!! $feedback->description !!}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('feedback.show', $feedback) }}" class="btn btn-primary">View Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div
</div>
@endsection
