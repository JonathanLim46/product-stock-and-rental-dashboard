<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;

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

Route::get('/',[LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/',[LoginController::class,'authenticate']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard.index');

Route::get('/test',[DashboardController::class,'test']);

// PRODUK

Route::post('/dashboard/produk/save',[ProductsController::class,'create'])->middleware('auth')->name('produk.save');

Route::get('/dashboard/produk',[ProductsController::class,'index'])->middleware('auth')->name('produk.index');

Route::get('/dashboard/produk/{product}/edit',[ProductsController::class,'edit'])->middleware('auth')->name('produk.edit');

Route::delete('/dashboard/produk/{product}/delete',[ProductsController::class,'destroy'])->middleware('auth')->name('produk.delete');

// END PRODUK

// Pelanggan

Route::get('/dashboard/pelanggan',[PelangganController::class,'index'])->middleware('auth')->name('pelanggan.index');

Route::delete('/dashboard/pelanggan/{pelanggan}/delete',[PelangganController::class,'destroy'])->middleware('auth')->name('pelanggan.delete');

// END PELANGGAN

// ADMIN

Route::get('/dashboard/admin',[AdminController::class,'index'])->middleware('auth')->name('admin.index');


// END ADMIN