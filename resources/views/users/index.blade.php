@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Usuarios</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge bg-{{ $user->rol == 'admin' ? 'danger' : 'primary' }}" id="role-badge-{{ $user->id }}">
                            {{ $user->rol }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-info change-role-btn"
                            data-user-id="{{ $user->id }}">
                            Cambiar Rol
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".change-role-btn").forEach(button => {
            button.addEventListener("click", function () {
                let userId = this.getAttribute("data-user-id");
                let url = `/users/${userId}/change-role`;

                fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let badge = document.getElementById(`role-badge-${userId}`);
                        badge.innerText = data.newRole;
                        badge.className = `badge bg-${data.newRole === 'admin' ? 'danger' : 'primary'}`;
                        alert(data.message);
                    }
                })
                .catch(error => console.error("Error:", error));
            });
        });
    });
</script>

@endsection
