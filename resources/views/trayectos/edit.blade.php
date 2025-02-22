@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Editar Trayecto</h5>
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

                    <form action="{{route('trayectos.update', $trayecto->id_trayecto)}}" method="POST">
                        @csrf
                        @method ('PUT')

                        <div class="mb-3">
                                <i class="fa-solid fa-compass"></i>
                            <label for="origen" class="form-label">Origen</label>
                            <input type="text" class="form-control" id="origen" name="origen" value="{{ $trayecto->origen }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="destino" class="form-label">Destino</label>
                            <input type="text" class="form-control" id="destino" name="destino" value="{{ $trayecto->destino }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kms" class="form-label">Distancia (kms)</label>
                            <input type="number" class="form-control" id="kms" name="kms" value="{{ $trayecto->kms }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tiempo_aprox" class="form-label">Tiempo Estimado</label>
                            <input type="text" class="form-control" id="tiempo_aprox" name="tiempo_aprox" value="{{ $trayecto->tiempo_aprox }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora_salida" class="form-label">Hora de salida</label>
                            <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="{{ $trayecto->hora_salida }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="hora_llegada" class="form-label">Hora de llegada estimada</label>
                            <input type="time" class="form-control" id="hora_llegada" name="hora_llegada" value="{{ $trayecto->hora_llegada }}" required step="60">

                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $trayecto->fecha }}" required  >
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" value="{{ $trayecto->precio }}" required  >
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('trayectos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Modificar Trayecto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
