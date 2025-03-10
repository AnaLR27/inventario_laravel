<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
//use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('inicio');
});


/*
Laravel tiene una forma más sencilla de definir todas las rutas RESTful para un controlador con Route::resource(). 
Esto generará automáticamente todas las rutas CRUD, incluyendo:

productos.index → Listar productos
productos.destroy → Eliminar productos
productos.create, productos.store, productos.edit, productos.update, etc.
En web.php, reemplaza todas las rutas de productos por esta línea:

*/
Route::resource('productos', ProductoController::class);


// Ruta para mostrar el formulario de búsqueda
Route::get('/buscar-producto', [ProductoController::class, 'buscarForm'])->name('productos.buscarForm');

// Ruta para procesar la búsqueda de productos
Route::get('/buscar-producto/resultados', [ProductoController::class, 'buscar'])->name('productos.buscar');
