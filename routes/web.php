<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;


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
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    // Mostrar productos para seleccionar
    Route::get('/productos/editar-stock', [ProductoController::class, 'editStock'])->name('productos.editStock');

    // Actualizar stock de un producto específico
    Route::post('/productos/{producto}/actualizar-stock', [ProductoController::class, 'updateStock'])->name('productos.updateStock');
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/crear', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
});
