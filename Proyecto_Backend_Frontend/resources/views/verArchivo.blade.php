@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ $file->nombre_file }}.{{ $file->extension_name_file }}</h5>
                    <div>
                        <a href="{{ route('editarArchivo', ['codigo' => $file->codigo_file]) }}" class="btn btn-primary btn-sm me-2">
                            Editar
                        </a>
                        <a href="{{ route('verRepositorio', ['codigo' => $file->branch->codigo_repositorio]) }}" class="btn btn-secondary btn-sm">
                            Volver al Repositorio
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p><strong>Última modificación:</strong> 
                            @if($file->commit && $file->commit->fecha)
                                {{ $file->commit->fecha->format('Y-m-d H:i:s') }}
                            @else
                                No disponible
                            @endif
                        </p>
                        <p><strong>Autor:</strong> 
                            @if($file->commit && $file->commit->usuario)
                                {{ $file->commit->usuario->nombre_usuario }}
                            @else
                                No disponible
                            @endif
                        </p>
                    </div>
                    
                    <div class="file-content">
                        <pre class="bg-dark text-light p-3 rounded"><code>{{ $file->contenido }}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
