<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedbacks = Feedback::get();
        return view('home' , compact('feedbacks'));
    }

    public function show( $id)
    {
        $feedback = Feedback::find($id);
        return view('feedback.show', compact('feedback'));
    }
}
