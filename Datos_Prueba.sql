-- Insert data into tbl_tipos_usuarios
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (1, 'Administrador');
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (2, 'Desarrollador');
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (3, 'Líder de Proyecto');
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (4, 'Revisor');
commit;

-- Insert data into tbl_tamanio_proyecto
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (1, 'Pequeño', 'Proyectos de pequeña escala');
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (2, 'Mediano', 'Proyectos de mediana escala');
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (3, 'Grande', 'Proyectos de gran escala');
commit;

-- Insert data into tbl_roles
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (1, 'Desarrollador Backend');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (2, 'Desarrollador Frontend');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (3, 'Diseñador UI/UX');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (4, 'Tester');
commit;

-- Insert data into tbl_tipos_estados_pull
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (1, 'Abierto', 'Pull request abierto');
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (2, 'En Revisión', 'Pull request en revisión');
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (3, 'Aprobado', 'Pull request aprobado');
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (4, 'Rechazado', 'Pull request rechazado');
commit;

-- Insert data into tbl_usuarios
INSERT INTO tbl_usuarios (codigo_usuario, codigo_tipo_usu, nombre_usuario, apellido_usuario, contrasenia, alias, correo_electronico, fecha_creacion) 
VALUES (1, 1, 'Admin', 'User', 'hashed_password', 'admin', 'admin@example.com', TO_DATE('2023-01-01', 'YYYY-MM-DD'));
INSERT INTO tbl_usuarios (codigo_usuario, codigo_tipo_usu, nombre_usuario, apellido_usuario, contrasenia, alias, correo_electronico, fecha_creacion) 
VALUES (2, 2, 'Dev', 'User', 'hashed_password', 'dev', 'dev@example.com', TO_DATE('2023-01-02', 'YYYY-MM-DD'));
commit;

-- Insert data into tbl_proyectos
INSERT INTO tbl_proyectos (codigo_proyecto, codigo_usuario, nombre, descripcion, fecha_inicio, fecha_fin, codigo_tamanio) 
VALUES (1, 1, 'Proyecto A', 'Descripción del Proyecto A', TO_DATE('2023-01-01', 'YYYY-MM-DD'), TO_DATE('2023-12-31', 'YYYY-MM-DD'), 2);
INSERT INTO tbl_proyectos (codigo_proyecto, codigo_usuario, nombre, descripcion, fecha_inicio, fecha_fin, codigo_tamanio) 
VALUES (2, 2, 'Proyecto B', 'Descripción del Proyecto B', TO_DATE('2023-02-01', 'YYYY-MM-DD'), TO_DATE('2023-11-30', 'YYYY-MM-DD'), 1);
commit;

-- Insert data into tbl_repositorios
INSERT INTO tbl_repositorios (codigo_repositorio, codigo_usuario, nombre_repositorio, descripcion, visibilidad, fecha_creacion) 
VALUES (1, 1, 'Repo A', 'Repositorio del Proyecto A', 'P', TO_DATE('2023-01-01', 'YYYY-MM-DD'));
INSERT INTO tbl_repositorios (codigo_repositorio, codigo_usuario, nombre_repositorio, descripcion, visibilidad, fecha_creacion) 
VALUES (2, 2, 'Repo B', 'Repositorio del Proyecto B', 'P', TO_DATE('2023-02-01', 'YYYY-MM-DD'));
commit;

-- Insert data into tbl_branches
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio) VALUES (1, 'main', 1);
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio) VALUES (2, 'develop', 1);
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio) VALUES (3, 'main', 2);
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio) VALUES (4, 'feature/login', 2);
commit;

-- Insert data into tbl_commits
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_branch, mensaje, fecha) 
VALUES (1, 1, 1, 'Initial commit', TO_DATE('2023-01-01', 'YYYY-MM-DD'));
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_branch, mensaje, fecha) 
VALUES (2, 2, 2, 'Added new feature', TO_DATE('2023-02-01', 'YYYY-MM-DD'));
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_branch, mensaje, fecha) 
VALUES (3, 1, 3, 'Project setup', TO_DATE('2023-02-15', 'YYYY-MM-DD'));
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_branch, mensaje, fecha) 
VALUES (4, 2, 4, 'Login implementation', TO_DATE('2023-03-01', 'YYYY-MM-DD'));
commit;

-- Insert data into tbl_files
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (1, 1, 1, 'index', 'html', '<html>...</html>');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (2, 1, 1, 'styles', 'css', 'body { margin: 0; }');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (3, 1, 1, 'main', 'js', 'console.log("Main script");');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (4, 1, 1, 'config', 'json', '{"debug": true}');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (5, 1, 1, 'README', 'md', '# Project Documentation');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (6, 2, 2, 'app', 'js', 'console.log("Hello World");');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (7, 3, 3, 'README', 'md', '# Project B');
INSERT INTO tbl_files (codigo_file, codigo_branch, codigo_commit, nombre_file, extension_name_file, contenido) 
VALUES (8, 4, 4, 'login', 'php', '<?php // Login logic ?>');
commit;

-- Insert data into tbl_pull_requests
INSERT INTO tbl_pull_requests (codigo_pull_request, codigo_usuario, codigo_estado_pull, codigo_repositorio, titulo, descripcion) 
VALUES (1, 2, 1, 1, 'Fix Bug', 'Fixes a critical bug');
INSERT INTO tbl_pull_requests (codigo_pull_request, codigo_usuario, codigo_estado_pull, codigo_repositorio, titulo, descripcion) 
VALUES (2, 1, 2, 2, 'Add Feature', 'Adds a new feature');
commit;

-- Insert data into tbl_issues
INSERT INTO tbl_issues (codigo_issues, titulo, descripcion, codigo_estado_pull, codigo_usuario, codigo_repositorio) 
VALUES (1, 'Bug in Login', 'Fix login issue', 1, 2, 1);
INSERT INTO tbl_issues (codigo_issues, titulo, descripcion, codigo_estado_pull, codigo_usuario, codigo_repositorio) 
VALUES (2, 'Feature Request', 'Add dark mode', 2, 1, 2);
commit;

-- Insert data into tbl_tags
INSERT INTO tbl_tags (codigo_tag, codigo_repositorio, codigo_commit, nombre) VALUES (1, 1, 1, 'v1.0');
INSERT INTO tbl_tags (codigo_tag, codigo_repositorio, codigo_commit, nombre) VALUES (2, 2, 3, 'v1.1');
commit;

-- Insert data into tbl_colaboradores
INSERT INTO tbl_colaboradores (codigo_usuario, codigo_repositorio, codigo_rol) VALUES (1, 1, 1);
INSERT INTO tbl_colaboradores (codigo_usuario, codigo_repositorio, codigo_rol) VALUES (2, 2, 2);
commit;