@if(!session('is_logged_in'))
    @php
        header("Location: " . route('landingPage'));
        exit();
    @endphp
@endif

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Agregar Colaboradores a {{ $repositorio->nombre_repositorio }}</h2>
                    <a href="{{ route('verRepositorio', ['codigo' => $repositorio->codigo_repositorio]) }}" class="btn btn-secondary">Volver</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('guardarColaborador', ['codigo' => $repositorio->codigo_repositorio]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required 
                                   placeholder="Ingrese el nombre de usuario del colaborador">
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <select class="form-select" id="rol" name="rol" required>
                                <option value="">Seleccione un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Colaborador</option>
                                <option value="3">Lector</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Agregar Colaborador</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 