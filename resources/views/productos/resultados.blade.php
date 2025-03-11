<!-- recursos/views/productos/resultados.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Resultados de la búsqueda</h2>

        @if ($productos->isEmpty())
            <p>No se encontraron productos que coincidan con tu búsqueda.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
