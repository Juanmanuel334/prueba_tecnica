@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Empresas</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('empresas.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Nueva Empresa
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Descripcion</th>
                            <th style="text-align:center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($empresas as $empresa)
                        <tr>
                            <td style="text-align: center">{{ $empresa->id_empresa}}</td>
                            <td style="text-align: center">{{ $empresa->nombre_empresa }}</td>
                            <td style="text-align: center">{{ $empresa->descripcion_empresa }}</td>
                            <td style="text-align: center">

                                <a href="{{ route('empresas.edit', $empresa->id_empresa) }}" class="btn btn_sm btn-primary"><i class="bi bi-pencil"></i></a>

                                </a>
                                 <form action="{{ route('empresas.destroy', $empresa) }}" method="POST" class="d-inline">
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
                            <td colspan="6" class="text-center">No hay empresas registradas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $empresas->links() }}
        </div>
    </div>
</div>
@endsection
