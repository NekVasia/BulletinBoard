<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;
use App\Http\Controllers\HomeController;

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


Route::get('/', [HomeController::class, 'index'])->name('login');

Auth::routes();

Route::get('/product', [BbsController::class, 'index'])->name('product');

Route::get('/my_product', [HomeController::class, 'show'])->name('my_product');

Route::get('/my_product/create', [HomeController::class, 'create'])->name('bb.create');

Route::post('/my_product', [HomeController::class, 'store'])->name('bb.store');

Route::get('/my_product/{bb}/edit', [HomeController::class, 'edit'])->name('bb.edit')->middleware('can:update,bb');

Route::patch('/my_product/{bb}', [HomeController::class, 'update'])->name('bb.update')->middleware('can:update,bb');

Route::get('/my_product/{bb}/delete', [HomeController::class, 'delete'])->name('bb.delete')->middleware('can:destroy,bb');

Route::delete('/my_product/{bb}', [HomeController::class, 'destroy'])->name('bb.destroy')->middleware('can:destroy,bb');
