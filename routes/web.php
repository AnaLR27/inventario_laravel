<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;

//use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('inicio');
});



Route::get("/productos", [ProductoController::class, "index"]);

//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//registro usuario
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
});
