<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Feedback;

class DashboardController extends Controller
{
    public function index()
    {
        $adminRole = Role::where('name', 'admin')->first();

        $countUsers = User::whereDoesntHave('roles', function ($query) use ($adminRole) {
            $query->where('id', $adminRole->id);
        })->count();
        $countFeedbacks = Feedback::count();
        return view('admin.dashboard' , compact('countUsers' , 'countFeedbacks'));
    }
}
