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
                                        Dashboard
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

    <!-- Buscador de Trayectos -->
    <div class="bg-primary text-white py-5">
        <div class="container">
            <h1 class="text-center mb-4">Encuentra tu próximo viaje</h1>
            <div class="search-box">
                <form class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label text-dark">Origen</label>
                        <select class="form-select">
                            <option selected>Selecciona origen...</option>
                            <option>Madrid</option>
                            <option>Barcelona</option>
                            <option>Valencia</option>
                            <option>Sevilla</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-dark">Destino</label>
                        <select class="form-select">
                            <option selected>Selecciona destino...</option>
                            <option>Madrid</option>
                            <option>Barcelona</option>
                            <option>Valencia</option>
                            <option>Sevilla</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-dark">Fecha</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label text-dark">Pasajeros</label>
                        <select class="form-select">
                            <option selected>1 Pasajero</option>
                            <option>2 Pasajeros</option>
                            <option>3 Pasajeros</option>
                            <option>4+ Pasajeros</option>
                        </select>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Buscar Trayectos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Trayectos Disponibles -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Trayectos Disponibles</h2>

            <!-- Filtros -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary">Más Rápidos</button>
                        <button type="button" class="btn btn-outline-primary">Más Baratos</button>
                        <button type="button" class="btn btn-outline-primary">Mejor Valorados</button>
                    </div>
                </div>
            </div>

            <!-- Lista de Trayectos -->
            <div class="row g-4">
                <!-- Trayecto 1 -->
                <div class="col-md-6">
                    <div class="card route-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Madrid - Barcelona</h5>
                                <span class="badge bg-success">Disponible</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-1"><i class="fas fa-clock me-2"></i>Duración: 2h 30min</p>
                                    <p class="mb-1"><i class="fas fa-train me-2"></i>AVE</p>
                                    <p class="mb-1"><i class="fas fa-calendar me-2"></i>Lun-Dom</p>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 class="text-primary mb-2">89,90 €</h4>
                                    <small class="text-muted">por persona</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-wifi me-2"></i>
                                    <i class="fas fa-utensils me-2"></i>
                                    <i class="fas fa-wheelchair me-2"></i>
                                </div>
                                <a href="#" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trayecto 2 -->
                <div class="col-md-6">
                    <div class="card route-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Madrid - Valencia</h5>
                                <span class="badge bg-warning">Últimos asientos</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-1"><i class="fas fa-clock me-2"></i>Duración: 1h 45min</p>
                                    <p class="mb-1"><i class="fas fa-train me-2"></i>AVE</p>
                                    <p class="mb-1"><i class="fas fa-calendar me-2"></i>Lun-Vie</p>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 class="text-primary mb-2">59,90 €</h4>
                                    <small class="text-muted">por persona</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-wifi me-2"></i>
                                    <i class="fas fa-utensils me-2"></i>
                                    <i class="fas fa-wheelchair me-2"></i>
                                </div>
                                <a href="#" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trayecto 3 -->
                <div class="col-md-6">
                    <div class="card route-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Barcelona - Sevilla</h5>
                                <span class="badge bg-info">Oferta</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-1"><i class="fas fa-clock me-2"></i>Duración: 5h 30min</p>
                                    <p class="mb-1"><i class="fas fa-train me-2"></i>AVE</p>
                                    <p class="mb-1"><i class="fas fa-calendar me-2"></i>Mar-Dom</p>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 class="text-primary mb-2">129,90 €</h4>
                                    <small class="text-muted">por persona</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-wifi me-2"></i>
                                    <i class="fas fa-utensils me-2"></i>
                                    <i class="fas fa-wheelchair me-2"></i>
                                </div>
                                <a href="#" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Trayecto 4 -->
                <div class="col-md-6">
                    <div class="card route-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">Valencia - Barcelona</h5>
                                <span class="badge bg-success">Disponible</span>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <p class="mb-1"><i class="fas fa-clock me-2"></i>Duración: 3h 15min</p>
                                    <p class="mb-1"><i class="fas fa-train me-2"></i>AVE</p>
                                    <p class="mb-1"><i class="fas fa-calendar me-2"></i>Lun-Dom</p>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 class="text-primary mb-2">79,90 €</h4>
                                    <small class="text-muted">por persona</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-wifi me-2"></i>
                                    <i class="fas fa-utensils me-2"></i>
                                    <i class="fas fa-wheelchair me-2"></i>
                                </div>
                                <a href="#" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paginación -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Siguiente</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
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
