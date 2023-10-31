@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h2>
                    {{ $feedback->title }}
                </h2>
                <div class="card-body">
                    <p><strong>Category:</strong> {{ $feedback->category }}</p>
                    {{-- <p><strong>Author:</strong> {{ $blog->author }}</p> --}}
                    <p><strong>Date:</strong> {{ $feedback->created_at }}</p>
                    <p>{!! $feedback->description !!}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    {{-- @foreach ($comments as $comment)
                        <div class="mb-3">
                            <strong>{{ $comment->user->name }}</strong> said:
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endforeach --}}

                    <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $feedback->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" rows="3" placeholder="Add a comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            {{-- You can add a sidebar or additional content here --}}
        </div>
    </div>
    </div
</div>
@endsection
