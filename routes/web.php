<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\CategoryController;
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

Route::get('/logout',[LoginController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard.index');

Route::get('/test',[DashboardController::class,'test']);

// PRODUK


Route::get('/dashboard/produk',[ProductsController::class,'index'])->middleware('auth')->name('produk.index');

Route::get('/dashboard/produk/{product}/edit',[ProductsController::class,'edit'])->middleware('auth')->name('produk.edit');

Route::get('/dashboard/produk/form',[ProductsController::class,'form'])->middleware('auth')->name('produk.form');

Route::post('dashboard/produk/savedata',[ProductsController::class,'create'])->middleware('auth')->name('produk.save');

Route::delete('/dashboard/produk/{product}/delete',[ProductsController::class,'destroy'])->middleware('auth')->name('produk.delete');


// END PRODUK

// Pelanggan

Route::get('/dashboard/pelanggan',[PelangganController::class,'index'])->middleware('auth')->name('pelanggan.index');

Route::delete('/dashboard/pelanggan/{pelanggan}/delete',[PelangganController::class,'destroy'])->middleware('auth')->name('pelanggan.delete');

Route::get('/dashboard/pelanggan/form',[PelangganController::class,'form'])->middleware('auth')->name('pelanggan.form');

Route::post('/dashboard/pelanggan/savedata',[PelangganController::class,'create'])->middleware('auth')->name('pelanggan.savedata');

Route::get('/dashboard/pelanggan/{pelanggan}/edit',[PelangganController::class,'edit'])->middleware('auth')->name('pelanggan.edit');

// END PELANGGAN

// ADMIN

Route::get('/dashboard/admin',[AdminController::class,'index'])->middleware('auth')->name('admin.index');

Route::get('/dashboard/admin/form',[AdminController::class,'form'])->middleware('auth')->name('admin.form');

Route::post('/dashboard/admin/savedata',[AdminController::class,'create'])->middleware('auth')->name('admin.savedata');

Route::get('/dashboard/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::put('/dashboard/admin/{admin}', [AdminController::class, 'update'])->middleware('auth')->name('admin.update');



// END ADMIN

// RENTAL

Route::get('/dashboard/rental',[RentalController::class,'index'])->middleware('auth')->name('rental.index');

Route::get('/dashboard/rental/form',[RentalController::class,'form'])->middleware('auth')->name('rental.form');

Route::post('/dashboard/rental/savedata',[RentalController::class,'store'])->middleware('auth')->name('rental.store');

Route::delete('/dashboard/rental/{rental}/delete',[RentalController::class,'destroy'])->middleware('auth')->name('rental.delete');

// END RENTAL

// CATEGORY 

Route::get('/dashboard/produk/category/form',[CategoryController::class,'form'])->middleware('auth')->name('categories.form');

Route::post('dashboard/produk/category/savedata',[CategoryController::class,'create'])->middleware('auth')->name('categories.store');
// END CATEGORY