<?php

use App\Http\Controllers\Web\ApplicationController;
use App\Mail\AdminMail;
use App\Mail\SellerMail;
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

Route::get('/', [ApplicationController::class, 'index']);
Route::get('/endDay', [ApplicationController::class, 'endDaySellers'])->name('endday-report');
Route::get('/sellers', [ApplicationController::class, 'showSellers'])->name('sellers.show');
Route::get('/sales', [ApplicationController::class, 'showSales'])->name('sales.show');
Route::get('/sales-seller', [ApplicationController::class, 'showSalesToSeller'])->name('salestoseller.show');
Route::post('/sales-seller', [ApplicationController::class, 'showSalesToSeller'])->name('salestoseller.show-post');


Route::get('/sellerMail', [SellerMail::class, 'build']);
Route::get('/adminMail', [AdminMail::class, 'build']);