CREATE DATABASE Empresa;
USE Empresa;

CREATE TABLE Persona
(
	dni INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono INT(10)
);

CREATE TABLE Departamento
(
	codigo INT UNIQUE AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) UNIQUE NOT NULL,
    presupuesto DECIMAL(10,2)
);

CREATE TABLE Empleado
(
	dni_empleado INT PRIMARY KEY,
    fecha_alta DATE NOT NULL,
    fecha_consolidacion DATE NOT NULL,
    salario FLOAT,
    departamento INT UNIQUE,
    jefe INT(8) UNIQUE,
    CONSTRAINT dni_empleado FOREIGN KEY (dni_empleado) REFERENCES Persona(dni),
    CONSTRAINT departamento FOREIGN KEY (departamento) REFERENCES Departamento(codigo),
    CONSTRAINT jefe FOREIGN KEY (jefe) REFERENCES Persona(dni),
    CHECK (fecha_alta<fecha_consolidacion)
);