<?php

use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('inventory', [InventoryController::class, 'store'])->name('inventory.store');

Route::get('pembelian', [PembelianController::class, 'create'])->name('pembelian.create');
Route::post('pembelian', [PembelianController::class, 'store'])->name('pembelian.store');

Route::get('penjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
