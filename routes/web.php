<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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
Route::get('/category/edit/{slug}',[CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{slug}',[CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{slug}',[CategoryController::class, 'destroy'])->name('category.delete');

//admin product

Route::get('/product',[ProductController::class, 'index'])->name('product.index');
Route::get('/product/create',[productController::class, 'create'])->name('product.create');
Route::post('/product/create',[productController::class, 'store'])->name('product.store');
Route::get('/product/edit/{slug}',[productController::class, 'edit'])->name('product.edit');
Route::put('/product/update/{slug}',[productController::class, 'update'])->name('product.update');
Route::get('/product/delete/{slug}',[productController::class, 'destroy'])->name('product.delete');
