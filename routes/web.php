<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');


Route::post('/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');

Route::patch('/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');

Route::delete('/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
