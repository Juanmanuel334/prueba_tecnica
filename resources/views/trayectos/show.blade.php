<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransRail - Descubre Nuestros Trayectos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .route-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        .search-box {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-train me-2"></i>TrainLine
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                    </li>
                    @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                    {{ Auth::user()->name }}
                                    </a>
                                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa-duotone fa-solid fa-user"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-pen-to-square"></i>     Register</a>
                        @endif
                        @endauth

                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>Detalles del Trayecto</h1>
        <div class="card">
            <div class="card-body">


                <h5 class="card-title">Origen y Destino: {{ $trayecto->origen }}-{{ $trayecto->destino }}</h5>
                <p></p>
                <p class="card-text"><i class="fas fa-calendar me-2"></i>Distancia: <b>{{ $trayecto->kms }} Kilometros</b></p>
                <p class="card-text"><i class="fas fa-clock me-2"></i>Tiempo Aproximado:<b> {{ $trayecto->tiempo_aprox }}</b></p>
                <p class="card-text"><i class="fas fa-clock me-2"></i>Hora de salida: <b>{{ $trayecto->hora_salida  }}</b></p>
                <p class="card-text"><i class="fas fa-clock me-2"></i>Hora de llegada: <b>{{ $trayecto->hora_llegada  }}</b></p>
                <p class="card-text"><i class="fas fa-calendar me-2"></i>Fecha: <b>{{ $trayecto->fecha }}</b></p>
                <h4 class="text-primary m b-2">Precio: €{{ $trayecto->precio }} Por persona</h4>
                <div class="mt-3">
                </div>
                <a href="/" class="btn btn-secondary mt-3">Volver</a>
                <a href="#" class="btn btn-primary mt-3">Reservar</a>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>TransRail</h5>
                    <p>Tu compañía de confianza para viajar por España.</p>
                </div>
                <div class="col-md-4">
                    <h5>Atención al Cliente</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone me-2"></i>900 123 456</li>
                        <li><i class="fas fa-envelope me-2"></i>info@transrail.es</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2025 TransRail. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
