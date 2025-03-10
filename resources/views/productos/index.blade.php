@extends('layouts.app')

@section('content')
<h2>Lista de productos en la bbdd</h2>
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
            <td><button class="btn btn-danger">Eliminar</button></td>
        </tr>


        @endforeach
    </tbody>
</table>
@if (isset($resultado))
<h3>Resultado de la suma: {{ $resultado }}</h3>
@endif
@endsection