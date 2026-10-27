CREATE DATABASE servir_examen;

CREATE TABLE departamentos (
    iddepartamento INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_departamento VARCHAR(50) NOT NULL UNIQUE,
    nombre_departamento VARCHAR(100) NOT NULL,
    descripcion_departamento VARCHAR(255) NULL
);

CREATE TABLE empleados (
    idempleado INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codigo_empleado VARCHAR(50) NOT NULL UNIQUE,
    nombres_empleado VARCHAR(100) NOT NULL,
    apellidos_empleado VARCHAR(100) NOT NULL,
    fecha_nacimiento_empleado DATE NOT NULL,
    iddepartamento INT NOT NULL,
    CONSTRAINT fk_empleado_departamento 
        FOREIGN KEY (iddepartamento) 
        REFERENCES departamentos(iddepartamento)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);