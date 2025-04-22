<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Registrate a</h3>
                        <img src="{{ asset('SVG/GitHub_Wordmark_Light.svg') }}" alt="GitHub Logo">
                        <form action="{{ route('hacerRegistro') }}" method="POST">
                            @csrf
                            <br>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="alias" class="form-label">Alias</label>
                                <input type="text" class="form-control" id="alias" name="alias" placeholder="Ingresa tu alias" required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasenia" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
                            </div>
                            <div class="mb-3">
                                <label for="contrasenia_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="contrasenia_confirmation" name="contrasenia_confirmation" placeholder="Confirmar Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-secondary w-100">Continuar ></button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">Ya tienes una cuenta? Sign in.</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
