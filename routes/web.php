<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/admin', function (){
    return view('admin.dashboard');
});

//admin category

Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('/category/create',[CategoryController::class, 'store'])->name('category.store');