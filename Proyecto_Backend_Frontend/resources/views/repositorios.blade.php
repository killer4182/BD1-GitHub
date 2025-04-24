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
                    <h2 class="mb-0">Mis Repositorios</h2>
                    <div>
                        <a href="{{ route('mostrarFormularioCrear') }}" class="btn btn-primary me-2">
                            <i class="bi bi-plus-circle"></i> Nuevo Repositorio
                        </a>
                        <a href="{{ route('inicio') }}" class="btn btn-secondary">Volver al Inicio</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @forelse($repositorios as $repositorio)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('verRepositorio', ['codigo' => $repositorio->codigo_repositorio]) }}" 
                                       class="text-decoration-none">
                                        <h5 class="mb-1">{{ $repositorio->nombre_repositorio }}</h5>
                                    </a>
                                    <span class="badge bg-secondary">Propietario: {{ $repositorio->usuario->nombre_usuario }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">
                                No tienes repositorios asociados.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 