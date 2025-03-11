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

// RUTAS PÚBLICAS
//login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//registro usuario
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// RUTAS PRIVADAS
Route::middleware(['auth'])->group(function () {
    // PRODUCTOS
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    // Ruta para editar las caracteristicas del producto. Muestra el formulario
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit'); 
    // Ruta para editar las caracteristicas del producto. Actualizar los cambios
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update'); // Ruta para actualizar producto

    // Ruta para mostrar el formulario de búsqueda
    Route::get('/buscar-producto', [ProductoController::class, 'buscarForm'])->name('productos.buscarForm');
    // Ruta para procesar la búsqueda de productos
    Route::get('/buscar-producto/resultados', [ProductoController::class, 'buscar'])->name('productos.buscar');
    // Ruta para eliminar un producto
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    // Ruta para crear un producto, mostrar el form
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    // Ruta para editar el stock, muestra el select
    Route::get('/productos/editar-stock', [ProductoController::class, 'editStock'])->name('productos.editStock');
    // Actualizar stock de un producto específico
    Route::post('/productos/{producto}/actualizar-stock', [ProductoController::class, 'updateStock'])->name('productos.updateStock');

    // VENTAS
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/crear', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
});
