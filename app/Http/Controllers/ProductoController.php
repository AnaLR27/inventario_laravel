<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view("productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete(); // Elimina el producto de la base de datos

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    // Este método solo va a devolver la vista con el formulario de búsqueda.

    public function buscarForm()
    {
        return view('productos.buscar'); // Aquí se devolverá la vista con el formulario
    }


    /*
    *Este método va a manejar la lógica de búsqueda, tomando el nombre ingresado por el usuario y mostrando los productos que coincidan.
     */
    public function buscar(Request $request)
    {
        $searchTerm = $request->input('nombre'); // Recibe el término de búsqueda del formulario
        $productos = Producto::where('nombre', 'like', '%' . $searchTerm . '%')->get(); // Busca productos por nombre

        return view('productos.resultados', compact('productos')); // Muestra los resultados de la búsqueda
    }
}
