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
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable',
            'cantidad' => 'required|integer'
        ]);

        Producto::create($request->all());
        return redirect()->route('productos')->with('success', 'Producto creado exitosamente');
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
        //
    }


    public function editStock(Request $request)
    {
        $producto = null;
        if ($request->has('producto_id')) {
            $producto = Producto::find($request->producto_id);
        }

        $productos = Producto::all();

        return view('productos.editStock', compact('productos', 'producto'));
    }

    public function updateStock(Request $request, $producto_id)
    {
        $producto = Producto::find($producto_id);

        if (!$producto) {
            return redirect()->route('productos.editStock')->with('error', 'Producto no encontrado.');
        }

        $incrementar = $request->input('incrementar', 0);
        $disminuir = $request->input('disminuir', 0);

        if ($disminuir > $producto->cantidad) {
            return redirect()->route('productos.editStock', ['producto_id' => $producto->id])
                ->with('error', 'La cantidad a disminuir no puede ser mayor que la cantidad actual.');
        }

        $nuevaCantidad = $producto->cantidad + $incrementar - $disminuir;

        $producto->cantidad = $nuevaCantidad;
        $producto->save();

        return redirect()->route('productos.editStock', ['producto_id' => $producto->id])
            ->with('success', 'Stock actualizado correctamente.');
    }
}
