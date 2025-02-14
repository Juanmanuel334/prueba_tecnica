@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Crear Nueva Empresa</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('empresas.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre_empresa" class="form-label">Nombre de la empresa</label>
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion_empresa" class="form-label">Descripción de la empresa</label>
                            <input type="text" class="form-control" id="descripcion_empresa" name="descripcion_empresa" value="{{ old('descripcion_empresa') }}" required>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar Empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

