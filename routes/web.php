<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;

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


