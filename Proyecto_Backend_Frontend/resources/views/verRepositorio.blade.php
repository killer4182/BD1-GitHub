@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $repositorio->nombre_repositorio }}</h1>
            <p class="text-muted">{{ $repositorio->descripcion }}</p>
            
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Main Branch</h5>
                </div>
                <div class="card-body">
                    @php
                        $mainBranch = $repositorio->branches->where('nombre', 'main')->first();
                        $lastCommit = $mainBranch ? $mainBranch->commits->sortByDesc('fecha')->first() : null;
                    @endphp

                    @if($lastCommit)
                        <div class="mb-4">
                            <h6>Último Commit</h6>
                            <div class="commit-info">
                                <p><strong>Mensaje:</strong> {{ $lastCommit->mensaje }}</p>
                                <p><strong>Fecha:</strong> {{ $lastCommit->fecha->format('Y-m-d H:i:s') }}</p>
                                <p><strong>Autor:</strong> {{ $lastCommit->usuario->nombre_usuario }}</p>
                            </div>
                        </div>

                        <div>
                            <h6>Archivos</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Extensión</th>
                                            <th>Última modificación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lastCommit->files as $file)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('verArchivo', ['codigo' => $file->codigo_file]) }}" class="text-decoration-none">
                                                        {{ $file->nombre_file }}
                                                    </a>
                                                </td>
                                                <td>{{ $file->extension_name_file }}</td>
                                                <td>{{ $lastCommit->fecha->format('Y-m-d H:i:s') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No hay commits en la rama main.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
