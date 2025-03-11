@extends('layouts.app')

@section('content')
<h2>Nueva Venta</h2>

{{-- Mostrar errores generales --}}
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

{{-- Mostrar los errores de validación --}}
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('ventas.store') }}">
    @csrf
    <div class="mb-3">
        <label for="producto_id" class="form-label">Producto</label>
        <select name="producto_id" id="producto_id" class="form-control" required>
            <option value="">Seleccione un producto</option>
            @foreach($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Registrar Venta</button>
</form>
@endsection