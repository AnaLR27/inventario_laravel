@extends('layouts.app')

@section('content')
<!-- Mensajes de error o éxito -->
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif <h2>Lista de productos en la bbdd</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->cantidad }}</td>
            <td class="d-flex gap-2">
                <!-- Botón de editar -->
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                    onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection