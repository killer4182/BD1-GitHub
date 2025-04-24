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
                <div class="card-header">
                    <h2 class="text-center">Bienvenido al Sistema</h2>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset('SVG/GitHub_Wordmark_Light.svg') }}" alt="GitHub Logo" class="mb-4">
                    <h3 class="mb-4">¡Hola, {{ session('user_name') }}!</h3>
                    <p class="lead">Has iniciado sesión correctamente en el sistema.</p>
                    <div class="mt-4 d-grid gap-3">
                        <a href="{{ route('repositorios') }}" class="btn btn-primary">
                            Ver Mis Repositorios
                        </a>
                        <a href="{{ route('logout') }}" class="btn btn-secondary">Cerrar Sesión</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            Borrar Cuenta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación de Cuenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas borrar tu cuenta?</p>
                <p class="text-danger"><strong>Esta acción no se puede deshacer y eliminará:</strong></p>
                <ul>
                    <li>Tu cuenta de usuario</li>
                    <li>Todos tus repositorios</li>
                    <li>Tus colaboraciones en otros repositorios</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ route('borrarCuenta') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sí, borrar mi cuenta</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
