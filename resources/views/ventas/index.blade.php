@extends('layouts.app')

@section('content')
<h2>Lista de Ventas</h2>
<a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Nueva Venta</a>

<table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <td>{{ $venta->producto->nombre }}</td>
            <td>{{ $venta->cantidad }}</td>
            <td>${{ number_format($venta->precio_total, 2) }}</td>
            <td>{{ $venta->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection