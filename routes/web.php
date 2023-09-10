<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/stock', [StockController::class, 'index']);

Route::post('/stock', [StockController::class, 'store']);

Route::get('/stock/search', [StockController::class, 'search']);

Route::get('/withdraw', [StockController::class, 'withdraw_index']);

Route::post('/withdraw', [StockController::class, 'withdraw']);

Route::get('/receipts', [ReceiptController::class, 'index']);

Route::get('/withdraw/{receipt_id}', [ReceiptController::class, 'pay']);
