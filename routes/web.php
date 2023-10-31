<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('feedback/create', [FeedbackController::class , 'create'])->name('feedback.create');
    Route::get('feedback/show/{id}', [App\Http\Controllers\HomeController::class , 'show'])->name('feedback.show');
    Route::post('/feedback/{id}/vote', [App\Http\Controllers\VoteController::class ,'vote']);
    Route::post('/comment/store', [App\Http\Controllers\VoteController::class ,'store_comment'])->name('comment.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('feedbacks', FeedbackController::class);
    Route::get('admin/dashboard', [DashboardController::class , 'index']);
    Route::get('admin/users', [UserController::class , 'index'])->name('admin.list-users');
    Route::get('/admin/delete-user/{id}', [UserController::class , 'deleteUser'])->name('admin.delete-user');
});

Route::group(['prefix' => 'user-pages'], function(){
    Route::get('login', function () { return view('pages.user-pages.login'); });
    Route::get('login-2', function () { return view('pages.user-pages.login-2'); });
    Route::get('register', function () { return view('pages.user-pages.register'); });
    Route::get('register-2', function () { return view('pages.user-pages.register-2'); });
});
