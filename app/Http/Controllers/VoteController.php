<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function vote($id)
    {
        $feedback = Feedback::find($id);

        $vote = new Vote;
        $vote->feedback_id = $feedback->id;
        $vote->user_id = $feedback->user_id;
        $vote->save();

        return redirect()->back()->with('success', 'Vote recorded successfully.');
    }

    public function store_comment(Request $request)
    {
        $userId = Auth::user()->id;
        // dd($userId);
        $comment = new Comment;
        $comment->feedback_id = $request->feedback_id;
        $comment->user_id = $userId;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->back()->with('success', 'Comment successfully.');
    }
}
