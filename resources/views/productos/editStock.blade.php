@extends('layouts.app')

@section('content')
<h2>Seleccionar Producto para Actualizar Stock</h2>

<form method="GET" action="{{ route('productos.editStock') }}">
    <div class="mb-3">
        <label for="producto_id" class="form-label">Selecciona un Producto</label>
        <select class="form-control" id="producto_id" name="producto_id" required>
            <option value="">Selecciona un producto</option>
            @foreach($productos as $productoItem)
            <option value="{{ $productoItem->id }}" {{ isset($producto) && $producto->id == $productoItem->id ? 'selected' : '' }}>
                {{ $productoItem->nombre }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Seleccionar Producto</button>
</form>

@if($producto)
<h3>Actualizar Stock de: {{ $producto->nombre }}</h3>

<form method="POST" action="{{ route('productos.updateStock', $producto->id) }}">
    @csrf
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad Actual: {{ $producto->cantidad }}</label>
    </div>

    <div class="mb-3">
        <label for="incrementar" class="form-label">Cantidad a Incrementar</label>
        <input type="number" class="form-control" id="incrementar" name="incrementar" value="0" min="0">
    </div>

    <div class="mb-3">
        <label for="disminuir" class="form-label">Cantidad a Disminuir</label>
        <input type="number" class="form-control" id="disminuir" name="disminuir" value="0" min="0">
    </div>

    <button type="submit" class="btn btn-success">Actualizar Stock</button>
</form>
@endif
@endsection