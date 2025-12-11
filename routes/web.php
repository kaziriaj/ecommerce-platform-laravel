<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);
Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');
Route::get('/register', [UserRegisterController::class, 'showRegisterForm'])->name('register');

// Handle registration
Route::post('/register', [UserRegisterController::class, 'register']);
// Example protected user dashboard
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth');


Route::get('/', function () {
    return view('frontend.index');
});




