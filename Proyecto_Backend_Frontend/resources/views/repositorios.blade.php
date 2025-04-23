@if(!session('is_logged_in'))
    @php
        header("Location: " . route('landingPage'));
        exit();
    @endphp
@endif

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Repositorios - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Mis Repositorios</h2>
                        <a href="{{ route('inicio') }}" class="btn btn-secondary">Volver al Inicio</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @forelse($repositorios as $repositorio)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-1">{{ $repositorio->nombre_repositorio }}</h5>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 