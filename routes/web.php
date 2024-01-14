<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PasienController;

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

Route::get('/', [InvoiceController::class,'index']);

Route::group([ 'prefix'=>'invoice'], function() {
    Route::get('index', [InvoiceController::class,'index'])->name('invoice.index');
    Route::get('datatable', [InvoiceController::class,'datatable'])->name('invoice.datatable');

});
Route::group([ 'prefix'=>'invoice-detail'], function() {
    Route::get('index/{id}', [InvoiceDetailController::class,'index'])->name('invoice-detail.index');
    Route::get('datatable/{id}', [InvoiceDetailController::class,'datatable'])->name('invoice-detail.datatable');

});

Route::group([ 'prefix'=>'pasien'], function() {
    Route::get('create', [PasienController::class,'create'])->name('pasien.create');
    Route::get('edit/{id}', [PasienController::class,'edit'])->name('pasien.edit');
    Route::get('index', [PasienController::class,'index'])->name('pasien.index');
    Route::get('datatable', [PasienController::class,'datatable'])->name('pasien.datatable');
    Route::post('update/{id}', [PasienController::class,'update'])->name('pasien.update');
    Route::post('store', [PasienController::class,'store'])->name('pasien.store');
    Route::post('delete/{id}', [PasienController::class,'delete'])->name('pasien.delete');


});

Route::group([ 'prefix'=>'barang'], function() {
    Route::get('create', [BarangController::class,'create'])->name('barang.create');
    Route::get('edit/{id}', [BarangController::class,'edit'])->name('barang.edit');
    Route::get('index', [BarangController::class,'index'])->name('barang.index');
    Route::get('datatable', [BarangController::class,'datatable'])->name('barang.datatable');
    Route::post('update/{id}', [BarangController::class,'update'])->name('barang.update');
    Route::post('store', [BarangController::class,'store'])->name('barang.store');
    Route::post('delete/{id}', [BarangController::class,'delete'])->name('barang.delete');


});


