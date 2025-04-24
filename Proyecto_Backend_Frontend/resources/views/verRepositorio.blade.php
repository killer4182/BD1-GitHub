@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $repositorio->nombre_repositorio }}</h1>
                <a href="{{ route('agregarColaborador', ['codigo' => $repositorio->codigo_repositorio]) }}" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Agregar Colaboradores
                </a>
            </div>
            <p class="text-muted">{{ $repositorio->descripcion }}</p>
            
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Branches</h5>
                    <a href="{{ route('crearBranch', ['codigo_repositorio' => $repositorio->codigo_repositorio]) }}" class="btn btn-primary btn-sm">
                        Crear Nueva Rama
                    </a>
                </div>
                <div class="card-body">
                    @foreach($repositorio->branches as $branch)
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">{{ $branch->nombre }}</h6>
                                <a href="{{ route('crearArchivo', ['codigo_branch' => $branch->codigo_branch]) }}" class="btn btn-primary btn-sm">
                                    Agregar Documento
                                </a>
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
                                            @foreach($branch->files as $file)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('verArchivo', ['codigo' => $file->codigo_file]) }}" class="text-decoration-none">
                                                            {{ $file->nombre_file }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $file->extension_name_file }}</td>
                                                    <td>
                                                        @if($file->commit && $file->commit->fecha)
                                                            {{ $file->commit->fecha->format('Y-m-d H:i:s') }}
                                                        @else
                                                            No disponible
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
