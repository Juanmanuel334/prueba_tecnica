@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Crear Nuevo Trayecto</h5>
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

                    <form method="POST" action="{{ route('trayectos.store') }}">
                        @csrf
                        <div class="mb-3">
                                <i class="fa-solid fa-compass"></i>
                            <label for="origen" class="form-label">Origen</label>
                            <input type="text" class="form-control" id="origen" name="origen" value="{{ old('origen') }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="destino" class="form-label">Destino</label>
                            <input type="text" class="form-control" id="destino" name="destino" value="{{ old('destino') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kms" class="form-label">Distancia (kms)</label>
                            <input type="number" class="form-control" id="kms" name="kms" value="{{ old('kms') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tiempo_aprox" class="form-label">Tiempo Estimado</label>
                            <input type="text" class="form-control" id="tiempo_aprox" name="tiempo_aprox" value="{{ old('tiempo_aprox') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora_salida" class="form-label">Hora de salida</label>
                            <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ old('hora_salida') }}" required>


                        </div>
                        <div class="mb-3">
                            <label for="hora_llegada" class="form-label">Hora de llegada estimada</label>
                            <input type="time" class="form-control" id="hora_llegada" name="hora_llegada" value="{{ old('hora_llegada') }}" required step="60">
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ old('fecha') }}" required  >
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio') }}" required  >
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('trayectos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar Trayecto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
