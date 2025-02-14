@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Precios</h1>
    <a href="{{ route('precios.create') }}" class="btn btn-primary mb-3">Crear Precio</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($precios as $precio)
                <tr>
                    <td>{{ $precio->precio }}</td>
                    <td>
                        <a class="btn btn-info btn-sm">Ver</a>
                        <a class="btn btn-warning btn-sm">Editar</a>

                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
