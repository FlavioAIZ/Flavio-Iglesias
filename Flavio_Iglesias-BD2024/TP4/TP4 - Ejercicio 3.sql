CREATE DATABASE Universidad;
USE Universidad;

CREATE TABLE Departamento
(
	codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL   
);

CREATE TABLE Area
(
	codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    codigo_departamento INT NOT NULL,
    FOREIGN KEY (codigo_departamento) REFERENCES Departamento(codigo)
);

CREATE TABLE Profesor
(
	codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    categoria VARCHAR(30) NOT NULL,
    codigo_area INT NOT NULL,
    FOREIGN KEY (codigo_area) REFERENCES Area(codigo)
);

CREATE TABLE Locall
(
	codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    capacidad INT(3),
    situacion VARCHAR(50)
);

CREATE TABLE Asignatura
(
	sigla VARCHAR(10) PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
	curso VARCHAR(10) NOT NULL,
    caracter VARCHAR(10),
    horas_teoria INT(3),
    horas_practica INT(3),
    alumnos INT(3)
);

CREATE TABLE Grupos
(
	siglas_asignatura VARCHAR(30) NOT NULL,
    clase VARCHAR(30) UNIQUE NOT NULL,
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (30),
    alumnos INT(3),
    FOREIGN KEY (siglas_asignatura) REFERENCES Asignatura(sigla)
);

CREATE TABLE Docencia
(
	codigo_profesor INT PRIMARY KEY,
    codigo_local INT NOT NULL,
    sigla_asignatura VARCHAR(10) NOT NULL,
    clase_grupo VARCHAR(30) NOT NULL,
    codigo_grupo INT NOT NULL,
    dia DATE,
    hora TIME,
    FOREIGN KEY (codigo_profesor) REFERENCES Profesor(codigo),
    FOREIGN KEY (codigo_local) REFERENCES Locall(codigo),
    FOREIGN KEY (sigla_asignatura) REFERENCES Asignatura(sigla),
    FOREIGN KEY (clase_grupo) REFERENCES Grupos(clase),
    FOREIGN KEY (codigo_grupo) REFERENCES Grupos(codigo)
);