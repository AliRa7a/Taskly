<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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
    return view('welcome');
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
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
