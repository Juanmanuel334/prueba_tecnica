@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Crear Precio</h5>
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

                    <form method="POST" action="{{ route('precios.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="precio" class="form-label">precio</label>
                            <input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio')}}" required  >
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Precio Empresa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
