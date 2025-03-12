@extends('layouts.auth')

@section('content')
<div class="col-md-4">
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Registro de Usuario</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>

            <p class="text-center mt-3">
                ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection
