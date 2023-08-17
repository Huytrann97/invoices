<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/invoices',[InvoicesController::class,'index']);
Route::get('/invoices/price',[InvoicesController::class,'filterByPrice']);
