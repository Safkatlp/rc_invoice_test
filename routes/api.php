<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products',[ProductController::class,"index"])->name('products');
Route::get('/invoices',[InvoiceController::class,"index"])->name('invoices');
Route::post('/search/invoices',[InvoiceController::class,"searchInvoice"])->name('searchInvoice');
Route::get('/invoices/products/{InvId}',[InvoiceController::class,"showProducts"])->name('invoice_products');
Route::get('/invoice/{InvId}',[InvoiceController::class,"show"])->name('show');
Route::post('/create-invoice',[InvoiceController::class,"create"])->name('create_invoice');
Route::post('/update-invoice',[InvoiceController::class,"update"])->name('update_invoice');
Route::post('/delete-invoice',[InvoiceController::class,"delete"])->name('update_invoice');
Route::get('/share-invoice/{InvId}/{customer_name}',[InvoiceController::class,"shareInvoice"])->name('share_invoice');

Route::get('/invoice/generatePdf/{InvId}', [HomeController::class, 'generatePDF']);