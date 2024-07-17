<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiftsController;
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

Route::get('/',[AuthController::class,'login'])->name('index.login.view');
Route::get('/registrar',[AuthController::class, 'register'])->name('index.register');
Route::post('/auth/login', [AuthController::class, 'loginValidate'])->name('auth.ingresar');
Route::post('/auth/registrar',[AuthController::class,'saveUser'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/users',[AdminController::class,'listUsers'])->name('admin.list.users');
Route::get('/regalos',[GiftsController::class,'index'])->name('index.regalos');
Route::post('/regalos/reservar',[GiftsController::class,'reservar']);
