CREATE DATABASE Biblioteca;
USE Biblioteca;

CREATE TABLE Editoriales
(
	id_editorial INT AUTO_INCREMENT PRIMARY KEY,
    edi_nombre VARCHAR(30) NOT NULL,
    edi_cuit INT(11),
    edi_direccion VARCHAR(30)
);

CREATE TABLE Titulos
(
	isbn INT(13) PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    tipo VARCHAR(30),
    id_editorial INT NOT NULL,
    fecha_publicacion DATE,
    idioma VARCHAR(15),
    FOREIGN KEY (id_editorial) REFERENCES Editoriales(id_editorial)
);

CREATE TABLE Autores
(
	id_autor INT AUTO_INCREMENT PRIMARY KEY,
    autor VARCHAR(30) NOT NULL,
    pais VARCHAR(20)
);

CREATE TABLE Tit_Aut
(
	isbn INT(13) NOT NULL,
    autor INT NOT NULL,
    categoria VARCHAR(30),
    FOREIGN KEY (isbn) REFERENCES Titulos(isbn),
    FOREIGN KEY (autor) REFERENCES Autores(id_autor)
);

CREATE TABLE Pedidos_Cab
(
	id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    fecha_pedido DATE NOT NULL,
    descuento FLOAT(4,2),
    IVA FLOAT NOT NULL,
    importe_total FLOAT NOT NULL
);

CREATE TABLE Pedidos_Lin
(
	id_pedido INT PRIMARY KEY,
    isbn INT(13) UNIQUE NOT NULL,
    cantidad INT NOT NULL,
    precio_unidad FLOAT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES Pedidos_Cab(id_pedido),
    FOREIGN KEY (isbn) REFERENCES Titulos(isbn)
);