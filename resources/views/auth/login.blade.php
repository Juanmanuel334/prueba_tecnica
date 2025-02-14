<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransRail - Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a56db;
            --secondary-color: #e2e8f0;
            --accent-color: #f59e0b;
            --dark-color: #1e293b;
        }

        body {
            background: linear-gradient(135deg, #f6f9fc 0%, #e2e8f0 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .login-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            background: white;
        }

        .login-sidebar {
            background: var(--primary-color);
            padding: 40px 30px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100%;
        }

        .login-sidebar .logo {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .login-sidebar .testimonial {
            margin-top: 60px;
            font-style: italic;
        }

        .form-area {
            padding: 40px 30px;
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group .input-group-text {
            background-color: #f8fafc;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #0e49b5;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .register-link {
            margin-top: 30px;
            color: var(--dark-color);
        }

        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 767.98px) {
            .login-sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Login Container -->
    <div class="container login-container">
        <div class="row w-100 justify-content-center">
            <div class="col-md- col-lg-8 col-xl-7">
                <div class="login-card">
                    <div class="row g-0">
                        <!-- Sidebar Section -->
                        <div class="col-md-5 d-none d-md-block">
                            <div class="login-sidebar">
                                <div class="sidebar-top">
                                    <div class="logo">
                                        <i class="fas fa-train me-2"></i>TrainLine
                                    </div>
                                    <p>Conectando destinos, uniendo experiencias.</p>
                                </div>

                                <div class="sidebar-bottom">
                                    <div class="testimonial">
                                        <p>"La mejor experiencia en viajes ferroviarios. Siempre a tiempo, siempre cómodo."</p>
                                        <small>— María G., viajera frecuente</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Section -->
                        <div class="col-md-7">
                            <div class="form-area">
                                <div class="d-md-none text-center mb-4">
                                    <i class="fas fa-train text-primary" style="font-size: 3rem;"></i>
                                    <h1 class="mt-2" style="font-size: 1.5rem;">TransRail</h1>
                                </div>

                                <h2 class="form-title">Iniciar Sesión</h2>

                                <!-- Session Status -->
                                @if (session('status'))
                                    <div class="alert alert-success mb-3" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <!-- Validation Errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-3">
                                        <ul class="mb-0 ps-3">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope text-muted"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <!-- Password -->
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock text-muted"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required autocomplete="current-password">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>

                                    <!-- Forgot Password -->
                                    @if (Route::has('password.request'))
                                        <ahref="{{ route('password.request') }}" class="forgot-password">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    @endif

                                    <!-- Remember Me -->
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">Mantener sesión iniciada</label>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            Iniciar Sesión
                                        </button>
                                    </div>
                                </form>

                                <div class="register-link text-center">
                                    <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Crear cuenta</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">&copy; 2025 TrainLine. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts -->
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
    </script>
</body>
</html>
