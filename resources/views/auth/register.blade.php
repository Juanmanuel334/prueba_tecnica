<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - RailExpress</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/api/placeholder/1920/1080') no-repeat center center fixed; background-size: cover;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-train-front me-2"></i>
                TrainLine
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light text-white" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-primary text-white p-4">
                        <div class="text-center">
                            <i class="bi bi-train-front display-4 mb-3"></i>
                            <h3 class="card-title mb-0">Únete a TrainLine</h3>
                            <p class="mb-0">Crea tu cuenta y comienza a viajar</p>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <!-- Mostrar errores de validación -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" class="needs-validation">
                            @csrf

                            <!-- Nombre -->
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="bi bi-person me-2"></i>Nombre Completo
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       value="{{ old('name') }}"
                                       required
                                       autocomplete="name"
                                       autofocus
                                       placeholder="Ingresa tu nombre">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="bi bi-envelope me-2"></i>Correo Electrónico
                                </label>
                                <input type="email"
                                       class="form-control form-control-lg @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       placeholder="ejemplo@correo.com">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="bi bi-lock me-2"></i>Contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                                           id="password"
                                           name="password"
                                           required
                                           autocomplete="new-password"
                                           placeholder="Mínimo 8 caracteres">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">
                                    <i class="bi bi-lock-check me-2"></i>Confirmar Contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password"
                                           class="form-control form-control-lg"
                                           id="password_confirmation"
                                           name="password_confirmation"
                                           required
                                           autocomplete="new-password"
                                           placeholder="Repite tu contraseña">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Términos y Condiciones -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('terms') is-invalid @enderror"
                                           type="checkbox"
                                           id="terms"
                                           name="terms"
                                           required>
                                    <label class="form-check-label" for="terms">
                                        Acepto los <a href="#" class="text-decoration-none">términos y condiciones</a> y la <a href="#" class="text-decoration-none">política de privacidad</a>
                                    </label>
                                    @error('terms')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Newsletter Opcional -->
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="newsletter"
                                           name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Deseo recibir ofertas y novedades por email
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-person-plus me-2"></i>Crear Cuenta
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="mb-0">
                                    ¿Ya tienes una cuenta?
                                    <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">
                                        Inicia sesión
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Beneficios -->
                <div class="card mt-4 border-0 bg-transparent text-white">
                    <div class="card-body">
                        <h5 class="text-center mb-4">Beneficios de registrarte</h5>
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                <i class="bi bi-ticket-perforated display-6 mb-2"></i>
                                <h6>Reservas Rápidas</h6>
                                <p class="small">Guarda tus preferencias de viaje</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-gift display-6 mb-2"></i>
                                <h6>Ofertas Exclusivas</h6>
                                <p class="small">Accede a descuentos especiales</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <i class="bi bi-star display-6 mb-2"></i>
                                <h6>Programa de Puntos</h6>
                                <p class="small">Acumula puntos en cada viaje</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white py-3 flow-bottom">
        <div class="container text-center flow-bottom">
            <p class="mb-0">&copy; 2025 TrainLine. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const password = document.getElementById('password_confirmation');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>
