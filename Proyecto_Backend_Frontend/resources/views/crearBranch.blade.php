@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Nueva Rama</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guardarBranch') }}" method="POST">
                        @csrf
                        <input type="hidden" name="codigo_repositorio" value="{{ $codigo_repositorio }}">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre de la Rama</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                            <div class="form-text">Usa nombres descriptivos como 'feature/login' o 'bugfix/navbar'</div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Crear Rama</button>
                            <a href="{{ route('verRepositorio', ['codigo' => $codigo_repositorio]) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 