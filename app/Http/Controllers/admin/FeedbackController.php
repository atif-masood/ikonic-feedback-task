<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Vote;
use DB;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
    $voteCounts = [];

    foreach ($feedbacks as $feedback) {
        $voteCount = DB::table('votes')
            ->where('feedback_id', $feedback->id)
            ->count();

        $voteCounts[$feedback->id] = $voteCount;
    }
        return view('admin.feedbacks.index', compact('feedbacks' , 'voteCounts'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        // Feedback::create($request->all());
        $feedback = new Feedback;
        $feedback->title = $request->title;
        $feedback->description = $request->description;
        $feedback->category = $request->category;
        $feedback->user_id = Auth::user()->id;
        $feedback->save();

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback created successfully');
    }

    public function show(Feedback $feedback)
    {
        // return view('admin.feedbacks.show', compact('feedback'));
    }

    public function edit($id)
    {
        // dd($id);
        $feedback = Feedback::find($id);
        return view('admin.feedbacks.edit', compact('feedback'));
    }

    public function edit_feedback($id)
    {
        // dd($id);
        $feedback = Feedback::find($id);
        return view('feedback.edit_feedback', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $feedback->update($request->all());

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback updated successfully');
    }

    public function destroy($id)
    {
        $feedback = Feedback::find($id); 
        if ($feedback) {
            $feedback->delete(); 
        }

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback deleted successfully');
    }

    public function feedback_vote(Request $request , $feedback_id)
    {
        // dd($feedback_id);
        $user = auth()->user();
        $vote = new Vote([
            'feedback_id' => $feedback_id,
            'user_id' => $user->id,
        ]);

        $vote->save();

        return redirect()->back()->with('success', 'Comment successfully.');
    }

}
