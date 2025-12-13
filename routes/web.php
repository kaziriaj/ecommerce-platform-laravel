<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

// Admin login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Dashboards protected by role
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware('role:admin');
Route::get('/editor/dashboard', function(){ return "Editor Dashboard"; })->middleware('role:editor');
Route::get('/seller/dashboard', function(){ return "Seller Dashboard"; })->middleware('admin.role:seller');
Route::get('/receiver/dashboard', function(){ return "Receiver Dashboard"; })->middleware('admin.role:receiver');

//category

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

//Product

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
