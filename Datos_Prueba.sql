-- 1. tipos_usuarios
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (1, 'Admin');
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (2, 'Developer');
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usu, nombre_tipo) VALUES (3, 'Guest');
commit;
-- 2. tamanio_proyecto
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (1, 'Small', 'Less than 3 months');
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (2, 'Medium', '3 to 6 months');
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre, descripcion) VALUES (3, 'Large', 'More than 6 months');
commit;
-- 3. roles
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (1, 'Owner');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (2, 'Maintainer');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (3, 'Contributor');
INSERT INTO tbl_roles (codigo_rol, rol) VALUES (4, 'Reader');
commit;
-- 4. tipos_estados_pull
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (1, 'Open', 'The pull request is open');
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (2, 'Closed', 'The pull request is closed');
INSERT INTO tbl_tipos_estados_pull (codigo_estado_pull, nombre, descripcion) VALUES (3, 'Merged', 'The pull request has been merged');
commit;
-- 5. tbl_usuarios
-- Ensure codigo_tipo_usu exists in tipos_usuarios (using 1, 2)
INSERT INTO tbl_usuarios (codigo_usuario, codigo_tipo_usu, nombre_usuario, apellido_usuario, contrasenia, alias, correo_electronico, fecha_creacion) VALUES (101, 1, 'John', 'Doe', 'hashed_password_1', 'johndoe', 'john.doe@example.com', SYSDATE);
INSERT INTO tbl_usuarios (codigo_usuario, codigo_tipo_usu, nombre_usuario, apellido_usuario, contrasenia, alias, correo_electronico, fecha_creacion) VALUES (102, 2, 'Jane', 'Smith', 'hashed_password_2', 'janesmith', 'jane.smith@example.com', SYSDATE);
INSERT INTO tbl_usuarios (codigo_usuario, codigo_tipo_usu, nombre_usuario, apellido_usuario, contrasenia, alias, correo_electronico, fecha_creacion) VALUES (103, 2, 'Peter', 'Jones', 'hashed_password_3', 'peterj', 'peter.jones@example.com', SYSDATE);
commit;
-- 6. proyectos
-- Ensure codigo_usuario exists in tbl_usuarios (using 101) and codigo_tamanio exists in tamanio_proyecto (using 1, 2)
INSERT INTO tbl_proyectos (codigo_proyecto, codigo_usuario, nombre, descripcion, fecha_inicio, fecha_fin, codigo_tamanio) VALUES (201, 101, 'Project Alpha', 'A new web application', SYSDATE, SYSDATE + INTERVAL '3' MONTH, 2);
INSERT INTO tbl_proyectos (codigo_proyecto, codigo_usuario, nombre, descripcion, fecha_inicio, fecha_fin, codigo_tamanio) VALUES (202, 101, 'Project Beta', 'Mobile app development', SYSDATE, SYSDATE + INTERVAL '6' MONTH, 3);
commit;
-- 7. repositorios
-- Ensure codigo_usuario exists in tbl_usuarios (using 101, 102)
INSERT INTO tbl_repositorios (codigo_repositorio, codigo_usuario, nombre_repositorio, descripcion, visibilidad, fecha_creacion) VALUES (301, 101, 'repo-alpha-web', 'Code for Project Alpha web', 'P', SYSDATE); -- P for Private
INSERT INTO tbl_repositorios (codigo_repositorio, codigo_usuario, nombre_repositorio, descripcion, visibilidad, fecha_creacion) VALUES (302, 102, 'repo-beta-mobile', 'Code for Project Beta mobile', 'U', SYSDATE); -- U for Public by Jane
commit;
-- 8. commits
-- Ensure codigo_usuario exists in tbl_usuarios (using 102) and codigo_repositorio exists in repositorios (using 301, 302)
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_repositorio, mensaje, fecha) VALUES (401, 102, 301, 'Initial commit for web app', SYSDATE);
INSERT INTO tbl_commits (codigo_commit, codigo_usuario, codigo_repositorio, mensaje, fecha) VALUES (402, 102, 302, 'Setup mobile project structure', SYSDATE);
commit;
-- 9. tags
-- Ensure codigo_repositorio exists in repositorios (using 301) and codigo_commit exists in commits (using 401)
INSERT INTO tbl_tags (codigo_tag, codigo_repositorio, codigo_commit, nombre) VALUES (501, 301, 401, 'v1.0.0');
commit;
-- 10. pull_requests
-- Ensure codigo_usuario exists in tbl_usuarios (using 102), codigo_estado_pull exists in tipos_estados_pull (using 1), and codigo_repositorio exists in repositorios (using 301)
INSERT INTO tbl_pull_requests (codigo_pull_request, codigo_usuario, codigo_estado_pull, codigo_repositorio, titulo, descripcion) VALUES (601, 102, 1, 301, 'Add user authentication', 'Implement user login and registration.');
commit;
-- 11. issues
-- Ensure codigo_estado_pull exists in tipos_estados_pull (using 1), codigo_usuario exists in tbl_usuarios (using 103), and codigo_repositorio exists in repositorios (using 301)
INSERT INTO tbl_issues (codigo_issues, titulo, descripcion, codigo_estado_pull, codigo_usuario, codigo_repositorio) VALUES (701, 'Bug: Login button not working', 'Clicking the login button does nothing.', 1, 103, 301);
commit;
-- 12. branches
-- Ensure codigo_repositorio exists in repositorios (using 301) and codigo_ultimo_commit exists in commits (using 401)
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio, codigo_ultimo_commit) VALUES (801, 'main', 301, 401);
INSERT INTO tbl_branches (codigo_branch, nombre, codigo_repositorio, codigo_ultimo_commit) VALUES (802, 'development', 301, 401);
commit;
-- 13. colaboradores
-- Ensure codigo_usuario exists in tbl_usuarios (using 102, 103), codigo_repositorio exists in repositorios (using 301, 302), and codigo_rol exists in roles (using 2, 3)
INSERT INTO tbl_colaboradores (codigo_colaborador, codigo_usuario, codigo_repositorio, codigo_rol) VALUES (901, 102, 301, 2); -- Jane is a Maintainer on repo-alpha-web
INSERT INTO tbl_colaboradores (codigo_colaborador, codigo_usuario, codigo_repositorio, codigo_rol) VALUES (902, 103, 301, 3); -- Peter is a Contributor on repo-alpha-web
commit;