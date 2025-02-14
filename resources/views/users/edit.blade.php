@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>

    <div class="card p-4 mt-3">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="role" class="form-select">
                    <option value="user" {{ $user->rol == 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
