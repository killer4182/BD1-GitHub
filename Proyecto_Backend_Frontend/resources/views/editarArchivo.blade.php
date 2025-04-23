@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $file->nombre_file }}.{{ $file->extension_name_file }}</h5>
                    <div>
                        <a href="{{ route('verArchivo', ['codigo' => $file->codigo_file]) }}" class="btn btn-secondary btn-sm">
                            Cancelar
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p><strong>Última modificación:</strong> {{ $file->commit->fecha->format('Y-m-d H:i:s') }}</p>
                        <p><strong>Autor:</strong> {{ $file->commit->usuario->nombre_usuario }}</p>
                    </div>
                    
                    <form action="{{ route('actualizarArchivo', ['codigo' => $file->codigo_file]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="contenido" class="form-label">Contenido del archivo</label>
                            <textarea class="form-control font-monospace" id="contenido" name="contenido" rows="20" style="background-color: #1a1a1a; color: #ffffff;">{{ $file->contenido }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje del commit</label>
                            <input type="text" class="form-control" id="mensaje" name="mensaje" required placeholder="Describe los cambios realizados">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 