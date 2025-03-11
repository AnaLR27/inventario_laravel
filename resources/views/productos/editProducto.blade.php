@extends('layouts.app')

@section('content')
<h2>Editar Producto</h2>

<form method="POST" action="{{ route('productos.update', $producto->id) }}">
    @csrf
    @method('PUT')  <!-- Se utiliza PUT para actualizar el producto -->
    
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
</form>
@endsection
