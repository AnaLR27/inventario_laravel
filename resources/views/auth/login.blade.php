@extends('layouts.auth')

@section('content')
<div class="col-md-4">
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre de usuario</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
            </form>

            <p class="text-center mt-3">¿No tienes cuenta? 
                <a href="{{ route('register') }}">Regístrate aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection
