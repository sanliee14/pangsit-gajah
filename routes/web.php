<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    // return view('welcome');
    return view('customer.home');
    // return view('customer.order');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/kasir', function () {
        return view('kasir.dashboard');
    });
});

// Customer
Route::get('/cust/home', [CustomerController::class, 'dashboard'])->name('cust.home');
Route::get('/customer/data', [CustomerController::class, 'data'])->name('customer.data');
Route::get('/customer/order', [CustomerController::class, 'order'])->name('customer.order');
Route::get('/customer/fav', [CustomerController::class, 'fav'])->name('customer.fav');
Route::get('/customer/makanan', [CustomerController::class, 'makanan'])->name('customer.makanan');
Route::get('/customer/minuman', [CustomerController::class, 'minuman'])->name('customer.minuman');
Route::get('/customer/checkout', [CustomerController::class, 'checkout'])->name('customer.checkout');
Route::get('/customer/qris', [CustomerController::class, 'qris'])->name('customer.qris');
Route::POST('/customer/proses', [CustomerController::class, 'proses'])->name('customer.proses');


// Kasir
Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])->name('kasir.dashboard');
Route::get('/kasir/transaksi', [KasirController::class, 'transaksi'])->name('kasir.transaksi');

// Owner
Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
Route::get('/owner/laporan', [OwnerController::class, 'laporan'])->name('owner.laporan');