<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de inventario</title>
    <!-- Agregar el CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body>
    <div class="container mt-4">
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
            <div class="container-fluid">
                <!-- Nombre de la empresa alineado a la izquierda -->
                <span class="navbar-brand text-white fw-bold">Gestor de inventario</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces alineados a la derecha -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                   
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/buscar-producto">Buscar producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/productos/crear">Crear producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/productos/editar-stock">Editar Stock</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('ventas.index') }}">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/login">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contenedor principal -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="p-4 bg-light border rounded shadow-sm">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>