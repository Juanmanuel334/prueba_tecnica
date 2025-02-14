@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Dashboard</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-building me-2"></i>
                        Empresas
                    </h5>
                    <p class="card-text">Gestiona las empresas registradas en el sistema.</p>
                    <div class="text-end">
                        <a href="{{ route('empresas.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nueva Empresa
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-truck me-2"></i>
                        Trayectos
                    </h5>
                    <p class="card-text">Administra los trayectos disponibles.</p>
                    <div class="text-end">
                        <a href="{{ route('trayectos.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nuevo Trayecto
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-cash-coin me-2"></i>
                        Precios
                    </h5>
                    <p class="card-text">Gestiona los precios de los trayectos.</p>
                    <div class="text-end">
                        <a href="{{ route('trayectos.index') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nuevo Precio
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-person-fill"></i>
                        Usuarios
                    </h5>
                    <p class="card-text">Administra los clientes registrados en el sistema.</p>
                    <div class="text-end">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nuevo Usuario
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
