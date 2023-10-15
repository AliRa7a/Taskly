<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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

Route::get('/', function () {
    return view('auth.login');
});
//User Registration
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest')->name('register');

//User Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Get List of tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index')->middleware('auth');

//Add New Task
Route::get('/task/add', function () {
    return view('tasks.create');
})->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//Update the Task
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/task/update/{id}', [TaskController::class, 'update'])->name('tasks.update');

//Delete the task
Route::get('/task/destroy/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

//Profile
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index')->middleware('auth');
//Upload Profile Picture
Route::post('/profile/upload-picture', [UserProfileController::class, 'uploadProfilePicture'])->name('profile.upload-picture')->middleware('auth');
