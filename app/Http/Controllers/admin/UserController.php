<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $adminRole = Role::where('name', 'admin')->first(); // Get the admin role

        $users = User::whereDoesntHave('roles', function ($query) use ($adminRole) {
            $query->where('name', $adminRole->name);
        })->get();

        return view('admin.user.list-users', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id); 
        if ($user) {
            $user->delete(); 
        }

        return redirect()->route('admin.list-users');
    }
}
