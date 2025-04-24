@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Crear Nuevo Archivo</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('guardarArchivo') }}" method="POST">
                        @csrf
                        <input type="hidden" name="codigo_branch" value="{{ $codigo_branch }}">
                        
                        <div class="mb-3">
                            <label for="nombre_file" class="form-label">Nombre del Archivo</label>
                            <input type="text" class="form-control" id="nombre_file" name="nombre_file" required>
                        </div>

                        <div class="mb-3">
                            <label for="extension_name_file" class="form-label">Extensión</label>
                            <select class="form-select" id="extension_name_file" name="extension_name_file" required>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                                <option value="js">JavaScript</option>
                                <option value="php">PHP</option>
                                <option value="md">Markdown</option>
                                <option value="json">JSON</option>
                                <option value="txt">Texto</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contenido" class="form-label">Contenido</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="10" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje del Commit</label>
                            <input type="text" class="form-control" id="mensaje" name="mensaje" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Crear Archivo</button>
                            <a href="{{ route('verRepositorio', ['codigo' => session('selected_repository')]) }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 