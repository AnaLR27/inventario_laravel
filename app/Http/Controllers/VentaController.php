<?php


namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->get();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->producto_id);
        
    // Verificar si hay suficiente stock
    if ($request->cantidad > $producto->cantidad) {
        return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
    }
        $precioTotal = $producto->precio * $request->cantidad;

        Venta::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_total' => $precioTotal,
        ]);

        $producto->cantidad -= $request->cantidad;
        $producto->save();

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

}
