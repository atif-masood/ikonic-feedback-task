@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h2 class="ml-4"> 
                    {{ $feedback->title }}
                </h2>
                <div class="card-body">
                    <strong>Category:</strong> {{ $feedback->category }} &nbsp; &nbsp;
                    <p><strong>Author:</strong> {{ $feedback->user->name }}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>Date:</strong> {{ $feedback->created_at }}</p>
                    <p><strong>Description:</strong>{!! $feedback->description !!}</p>
                    {{-- <button class="btn btn-primary" id="voteButton">Vote</button> --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#voteModal">
                        Vote
                    </button>
                    @if(auth()->check() && auth()->user()->id == $feedback->user_id)
                    <a href="{{ url('feedback/edit_feedback', $feedback) }}" class="btn btn-primary" style="float: inline-end;" >Edit Feedback</a>
                    @endif
                </div>
                <div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="voteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        @if(auth()->check())
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="voteModalLabel">Vote Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal-content">
                                <p>Are you sure you want to vote?</p>
                                {{-- <a class="btn btn-primary" href="{{ url('feedback/vote', $feedback) }}">Vote</a> --}}
                                <form action="{{ route('feedback.vote', $feedback->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-fw">Vote</button>
                                </form>
                                {{-- <a class="btn btn-danger btn-fw" href="{{ route('feedback.vote', $feedback->id) }}">Vote</a> --}}
                            </div>
                        </div>
                        @else
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="voteModalLabel">Login Required</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal-content">
                                <p>Please login to vote.</p>
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    @foreach ($comments as $comment)
                        <div class="mb-3">
                            <strong>{{ $comment->user->name }}</strong> said:
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach
                    @auth
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                    @endauth
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- You can add a sidebar or additional content here --}}
        </div>
    </div>
    </div
</div>
<script src="{{ asset('js/vote.js') }}"></script>

@endsection
