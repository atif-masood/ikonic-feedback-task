<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vote;

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
}
