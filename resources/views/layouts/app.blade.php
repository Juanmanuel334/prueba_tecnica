<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            transition: width 0.3s ease-in-out;
            overflow: hidden;
            white-space: nowrap;
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar.hidden {
            width: 0;
            padding: 0;
        }
        .sidebar h4 {
            text-align: center;
            transition: opacity 0.3s;
        }
        .sidebar.collapsed h4 span, .sidebar.hidden h4 span {
            display: none;
        }
        .sidebar .nav-link {
            color: #ffffff;
            display: flex;
            align-items: center;
            padding: 10px;
            transition: padding 0.3s;
        }
        .sidebar .nav-link i {
            font-size: 1.5rem;
            margin-right: 10px;
            transition: margin-right 0.3s;
        }
        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 10px 15px;
        }
        .sidebar.collapsed .nav-link i {
            margin-right: 0;}

    .sidebar .nav-link:hover, .sidebar .nav-link:focus {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .sidebar.collapsed .nav-link span, .sidebar.hidden .nav-link span {
            display: none;
        }
        .toggle-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #343a40;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            z-index: 1000;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
            transition: width 0.3s ease-in-out;
            width: calc(100% - 250px);
        }
        .sidebar.collapsed + .content {
            width: calc(100% - 80px);
        }
        .sidebar.hidden + .content {
            width: 100%;
        }
        @media (max-width: 768px), (min-resolution: 2dppx) {
            .sidebar {
                width: 80px;
            }
            .sidebar h4 span,
            .sidebar .nav-link span {
                display: none;
            }
            .content {
                width: calc(100% - 80px);
            }
        }
        @media (min-width: 769px) {
            .toggle-btn {
                display: block;
            }
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
    <div class="sidebar d-flex flex-column text-white" id="sidebar">
        <a class="navbar-brand" href="/"><h4><i class="bi bi-train-front"></i><span> TrainLine</span></h4></a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Gestion</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="bi bi-people"></i> <span>Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('empresas.index') }}">
                    <i class="bi bi-building"></i> <span>Empresas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('trayectos.index') }}">
                    <i class="bi bi-map"></i> <span>Trayectos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('precios.index') }}">
                    <i class="bi bi-currency-dollar"></i> <span>Precios</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="content" id="content">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            if (sidebar.classList.contains('collapsed')) {
                sidebar.classList.remove('collapsed');
                content.style.width = 'calc(100% - 250px)';
            } else {
                sidebar.classList.add('collapsed');
                content.style.width = 'calc(100% - 80px)';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
