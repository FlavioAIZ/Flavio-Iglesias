CREATE DATABASE Agenda;
USE Agenda;
CREATE TABLE persona (
	dni INT(8) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL
);
CREATE TABLE telefono (
	dni_persona INT(8) PRIMARY KEY,
	telefono INT(12) NOT NULL,
	FOREIGN KEY (dni_persona) REFERENCES persona(dni)
);
CREATE TABLE provincia (
	id INT AUTO_INCREMENT PRIMARY KEY,
	descripcion VARCHAR(30) NOT NULL
);
CREATE TABLE localidad (
	id INT AUTO_INCREMENT PRIMARY KEY,
	descripcion VARCHAR(30) NOT NULL,
	id_provincia INT NOT NULL,
	FOREIGN KEY (id_provincia) REFERENCES provincia(id)
);
CREATE TABLE direccion (
	dni_persona INT(8) PRIMARY KEY,
	calle VARCHAR(30) NOT NULL,
	numero INT(5) NOT NULL,
	id_localidad INT NOT NULL,
	FOREIGN KEY (dni_persona) REFERENCES persona(dni),
	FOREIGN KEY (id_localidad) REFERENCES localidad(id)
);
ALTER TABLE direccion
ADD piso INT(3) AFTER numero,
ADD dpto VARCHAR(3) AFTER piso;

