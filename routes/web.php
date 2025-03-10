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
En web.php, reemplaza todas las rutas de productos por esta línea:

*/
Route::resource('productos', ProductoController::class);
/*
✅ Esto generará automáticamente todas las rutas CRUD, incluyendo:

productos.index → Listar productos
productos.destroy → Eliminar productos
productos.create, productos.store, productos.edit, productos.update, etc.
*/