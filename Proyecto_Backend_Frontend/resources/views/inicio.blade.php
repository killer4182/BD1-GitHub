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
    <title>Bienvenido - Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                        <div class="mt-4">
                            <a href="{{ route('logout') }}" class="btn btn-secondary">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
