<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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
    return redirect()->route('get.login');
});
Route::get('/login',[LoginController::class,'login'])->name('auth.login');
Route::post('/login',[LoginController::class,'verify'])->name('auth.login.veriry');
Route::get('/log-out',[LoginController::class,'logout'])->name('auth.logout');

Route::middleware('admins')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});
