@if(session('is_logged_in'))
    @php
        header("Location: " . route('inicio'));
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
                        <h2 class="text-center">Bienvenido</h2>
                    </div>
                    <div class="card-body text-center">
                        <img src="SVG/GitHub_Wordmark_Light.svg" alt="GitHub Logo" class="mb-4">
                        <p class="lead mb-4">Por favor, seleccione una opción para continuar</p>
                        
                        <div class="d-grid gap-3">
                            <a href="{{ route('register') }}" class="btn btn-secondary">
                                Registrarse
                            </a>
                            
                            <a href="{{ route('login') }}" class="btn btn-success">
                                Iniciar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
