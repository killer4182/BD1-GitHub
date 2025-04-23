-- Insert data into tbl_tipos_usuarios
INSERT INTO tbl_tipos_usuarios (codigo_tipo_usuario, nombre_tipo_usuario) VALUES
(1, 'Administrador'),
(2, 'Desarrollador'),
(3, 'Líder de Proyecto'),
(4, 'Revisor');

-- Insert data into tbl_tamanio_proyecto
INSERT INTO tbl_tamanio_proyecto (codigo_tamanio, nombre_tamanio) VALUES
(1, 'Pequeño'),
(2, 'Mediano'),
(3, 'Grande');

-- Insert data into tbl_roles
INSERT INTO tbl_roles (codigo_rol, nombre_rol) VALUES
(1, 'Desarrollador Backend'),
(2, 'Desarrollador Frontend'),
(3, 'Diseñador UI/UX'),
(4, 'Tester');

-- Insert data into tbl_tipos_estados_pull
INSERT INTO tbl_tipos_estados_pull (codigo_estado, nombre_estado) VALUES
(1, 'Abierto'),
(2, 'En Revisión'),
(3, 'Aprobado'),
(4, 'Rechazado'),
(5, 'Fusionado'); 