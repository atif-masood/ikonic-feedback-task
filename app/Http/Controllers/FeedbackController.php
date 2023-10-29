<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.create');
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
        return view('feedbacks.show', compact('feedback'));
    }

    public function edit(Feedback $feedback)
    {
        return view('feedbacks.edit', compact('feedback'));
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

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('feedbacks.index')
            ->with('success', 'Feedback deleted successfully');
    }

}