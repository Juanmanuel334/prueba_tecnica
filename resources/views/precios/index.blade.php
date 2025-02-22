@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Precios</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th style="text-align:center">ID</th>
                <th style="text-align:center">Destino</th>
                <th style="text-align:center">Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($precios as $precio)
                <tr>
                    <td style="text-align:center">{{ $precio->id_trayecto}}</td>
                        <td style="text-align:center">{{ $precio->destino}}-{{ $precio->destino}}</td>
                        <td style="text-align:center">€ {{ $precio->precio }}</td>

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
