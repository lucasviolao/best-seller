<?php

use App\Http\Controllers\Api\SellerController;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/sellers', [SellerController::class, 'index']);
Route::get('/sellers/{id}', [SellerController::class, 'show']);
Route::post('/sellers', [SellerController::class, 'store']);

Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/{id}', [SaleController::class, 'show']);
Route::get('/sales-sellers/{id}', [SaleController::class, 'showSalesToSellers']);
Route::post('/sales', [SaleController::class, 'store']);

Route::get('/', function () {
    return response()->json(['message' => 'ok']);
});
