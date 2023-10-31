<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(10);
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('admin.feedbacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Feedback::create($request->all());

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

}
