<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\ProductoController;
//use GuzzleHttp\Psr7\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('inicio');
});



Route::get("/productos", [ProductoController::class, "index"]);
