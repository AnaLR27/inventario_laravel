@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Buscar Producto</h2>
        <form action="{{ route('productos.buscar') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingresa el nombre del producto" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Buscar</button>
        </form>
    </div>
@endsection
