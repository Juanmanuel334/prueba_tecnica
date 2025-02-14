@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Trayectos</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('trayectos.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nuevo Trayecto
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Origen</style=>
                <th style="text-align:center">Destino</th>
                <th style="text-align:center">Distancia</th>
                <th style="text-align:center">Tiempo aprox</th>
                <th style="text-align:center">Hora de Salida</th>
                <th style="text-align:center">Hora de Llegada</th>
                <th style="text-align:center">Fecha</th>
                <th style="text-align:center">Precio</th>
                <th style="text-align:center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trayectos as $trayecto)
                <tr>
                    <td style="text-align: center">{{ $trayecto->id_trayecto}}</td>
                    <td style="text-align: center">{{ $trayecto->origen}}</td>
                    <td style="text-align: center">{{ $trayecto->destino}}</td>
                    <td style="text-align: center">{{ $trayecto->kms}} kms</td>
                    <td style="text-align: center">{{ $trayecto->tiempo_aprox}}</td>
                    <td style="text-align: center">{{ $trayecto->hora_salida}}</td>
                    <td style="text-align: center">{{ $trayecto->hora_llegada}}</td>
                    <td style="text-align: center">{{ $trayecto->fecha}}</td>
                    <td style="text-align: center">{{ $trayecto->precio}}</td>

                    <td style="text-align: center">
                        <a href="{{ route('trayectos.edit', $trayecto->id_trayecto) }}" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('trayectos.destroy',$trayecto->id_trayecto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">No hay empresas registradas</td>
                </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
