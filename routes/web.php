<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index'])->name('products');
Route::get('/categories', [\App\Http\Controllers\CategoryController::class,'index'])->name('categories');

Route::group(['middleware'=>'auth','prefix'=>'admin','as'=>'admin.'],function (){
    Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);
});

require __DIR__.'/auth.php';
