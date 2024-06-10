<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftsController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;

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
Route::get('/',[AuthController::class, 'register'])->name('index.register');
Route::get('/regalos',[GiftsController::class,'index'])->name('index.regalos');
Route::post('/auth/registrar',[AuthController::class,'saveUser'])->name('auth.register');
