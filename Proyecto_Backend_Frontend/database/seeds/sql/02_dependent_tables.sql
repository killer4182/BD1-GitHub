-- Insert data into tbl_usuarios
INSERT INTO tbl_usuarios (codigo_usuario, nombre_usuario, correo_usuario, contrasena_usuario, codigo_tipo_usuario) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1),
(2, 'dev1', 'dev1@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2),
(3, 'pm1', 'pm1@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3),
(4, 'reviewer1', 'reviewer1@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4);

-- Insert data into tbl_proyectos
INSERT INTO tbl_proyectos (codigo_proyecto, nombre_proyecto, descripcion_proyecto, fecha_inicio, fecha_fin, codigo_tamanio) VALUES
(1, 'Sistema de Gestión', 'Sistema de gestión de proyectos', '2024-01-01', '2024-06-30', 2),
(2, 'E-commerce', 'Plataforma de comercio electrónico', '2024-02-01', '2024-08-31', 3),
(3, 'App Móvil', 'Aplicación móvil de servicios', '2024-03-01', '2024-05-31', 1);

-- Insert data into tbl_equipos
INSERT INTO tbl_equipos (codigo_equipo, nombre_equipo, codigo_proyecto) VALUES
(1, 'Equipo Backend', 1),
(2, 'Equipo Frontend', 1),
(3, 'Equipo Full Stack', 2),
(4, 'Equipo Móvil', 3);

-- Insert data into tbl_equipos_usuarios
INSERT INTO tbl_equipos_usuarios (codigo_equipo, codigo_usuario, codigo_rol) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 1),
(4, 2, 2);

-- Insert data into tbl_pull_requests
INSERT INTO tbl_pull_requests (codigo_pull, titulo_pull, descripcion_pull, fecha_creacion, codigo_estado, codigo_usuario_creador, codigo_usuario_revisor) VALUES
(1, 'Implementación de login', 'Se implementa el sistema de autenticación', '2024-01-15', 1, 2, 4),
(2, 'Diseño de interfaz', 'Se crea el diseño de la interfaz principal', '2024-01-16', 2, 2, 4),
(3, 'API de productos', 'Se desarrolla la API para gestión de productos', '2024-02-01', 3, 2, 4);

-- Insert data into tbl_archivos
INSERT INTO tbl_archivos (codigo_archivo, nombre_archivo, ruta_archivo, codigo_pull) VALUES
(1, 'LoginController.php', 'app/Http/Controllers/LoginController.php', 1),
(2, 'login.blade.php', 'resources/views/auth/login.blade.php', 1),
(3, 'ProductController.php', 'app/Http/Controllers/ProductController.php', 3);

-- Insert data into tbl_comentarios
INSERT INTO tbl_comentarios (codigo_comentario, contenido_comentario, fecha_comentario, codigo_pull, codigo_usuario) VALUES
(1, 'Buen trabajo en la implementación del login', '2024-01-15 10:30:00', 1, 4),
(2, 'Falta agregar validación de contraseña', '2024-01-15 11:15:00', 1, 4),
(3, 'El diseño se ve muy bien', '2024-01-16 09:45:00', 2, 4); 