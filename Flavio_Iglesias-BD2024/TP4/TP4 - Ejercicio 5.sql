CREATE DATABASE Empresa;
USE Empresa;

CREATE TABLE Persona
(
	dni INT(8) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(50),
    telefono INT(10)
);

CREATE TABLE Departamento
(
	codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) UNIQUE NOT NULL,
    presupuesto FLOAT
);

CREATE TABLE Empleado
(
	dni_empleado INT(8) UNIQUE NOT NULL,
    fecha_alta DATE NOT NULL,
    fecha_consolidacion DATE NOT NULL,
    salario FLOAT,
    departamento INT UNIQUE,
    jefe INT(8) UNIQUE,
    FOREIGN KEY (departamento) REFERENCES Departamento(codigo),
    FOREIGN KEY (jefe) REFERENCES Empleado(dni_empleado)
);
 