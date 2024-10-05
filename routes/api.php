<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-token-thiet-bi/{idThietBi}',[ApiController::class,'getToken'])->name('api.auth.getToken');

Route::middleware('verifyThietBi')->group(function(){
    Route::prefix('thiet-bi')->group(function(){
       Route::get('/get-all',[ApiController::class,'getAllThietBi'])->name('thietbi.danhsach');
    });
});
