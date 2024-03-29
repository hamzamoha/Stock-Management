<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CommonController::class, "home"]);

Route::get('/dashboard', [CommonController::class, 'dashboard']);

Route::get('/stock', [StockController::class, 'index']);

Route::post('/stock', [StockController::class, 'store']);

Route::get('/stock/search', [StockController::class, 'search']);

Route::get('/clients/search', [ReceiptController::class, 'search_clients']);

Route::get('/withdraw', [StockController::class, 'withdraw_index']);

Route::post('/withdraw', [StockController::class, 'withdraw']);

Route::get('/receipts', [ReceiptController::class, 'index']);

Route::get('/receipts/{receipt_id}', [ReceiptController::class, 'show']);

Route::get('/withdraw/{receipt_id}', [ReceiptController::class, 'pay']);

Route::post('/withdraw/{receipt_id}', [ReceiptController::class, 'store']);

Route::get('/cc_transactions', [ReceiptController::class, 'cc_transactions_index']);

Route::get('/checks', [ReceiptController::class, 'checks_index']);
