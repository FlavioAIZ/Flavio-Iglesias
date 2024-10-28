CREATE DATABASE MusicDB;

CREATE TABLE MusicDB.artista
(
	artno SMALLINT(2),
    nombre VARCHAR(50) NOT NULL,
    clasificacion CHAR(1),
    bio TEXT,
    foto BLOB,
    UNIQUE (nombre),
    PRIMARY KEY (artno)    
);

CREATE TABLE MusicDB.concierto
(
	artno SMALLINT(2),
    fecha DATETIME,
    ciudad VARCHAR(25) NOT NULL,
    PRIMARY KEY (artno, fecha),
	CONSTRAINT artnoConcierto FOREIGN KEY (artno) REFERENCES artista(artno)
);

CREATE TABLE MusicDB.album
(
	itemno SMALLINT(2),
    Titulo VARCHAR(50) NOT NULL,
    artno SMALLINT(2),
    PRIMARY KEY (itemno),
    CONSTRAINT artnoAlbum FOREIGN KEY (artno) REFERENCES artista(artno)
);

CREATE TABLE MusicDB.stock
(
	itemno SMALLINT(2),
    tipo CHAR(1) NOT NULL,
    precio DECIMAL(5,2) NOT NULL,
    cantidad INT(4),
    PRIMARY KEY (itemno),
    CONSTRAINT itemnoStock FOREIGN KEY (itemno) REFERENCES album(itemno)
);

CREATE TABLE MusicDB.Orden
(
	itemno SMALLINT(2),
    timestamp TIMESTAMP,
    PRIMARY KEY (itemno),
    CONSTRAINT itemnoOrden FOREIGN KEY (itemno) REFERENCES stock(itemno)
);

INSERT INTO MusicDB.artista (artno, nombre, clasificacion,bio)
VALUES (1,"Ricardo Arjona", "C","Cantautor de baladas y pop latino.");
INSERT INTO MusicDB.artista (artno, nombre, clasificacion,bio)
VALUES (2,"Soda Stereo", "A", "Soda Stereo fue una banda de rock argentina formada en 1982.");
INSERT INTO MusicDB.artista (artno, nombre, clasificacion,bio)
VALUES (3, "Soledad PAstorutti", "B", "Valeria Lynch​, es una cantante y compositora argentina.");
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (1,"Doble vida",2);
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (2,"Sin daños a terceros",1);
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (3,"Si el norte fuera el Sur",1);
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (4,"Un poco mas de mi",3);
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (5,"A cualquier precio",3);
INSERT INTO MusicDB.album (itemno, Titulo, artno)
VALUES (6,"Signos",2);
INSERT INTO MusicDB.concierto (artno, fecha, ciudad )
VALUES (2,"19971130","Buenos Aires");
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (1,"A",299.00,5);
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (2,"B",265.30,8);
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (3,"A",272.10,2);
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (4,"D",265.45,4);
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (5,"B",270.00,0);
INSERT INTO MusicDB.stock (itemno, tipo, precio, cantidad)
VALUES (6,"E",289.00,7);

ALTER TABLE musicdb.stock ADD COLUMN stockMinimo INT DEFAULT -1;
ALTER TABLE musicdb.artista ADD COLUMN noMatricula VARCHAR(11) NOT NULL;
ALTER TABLE musicdb.album MODIFY COLUMN Titulo VARCHAR(60);
ALTER TABLE musicdb.album ADD COLUMN FechaFinEdicion DATETIME DEFAULT NULL;

SELECT * FROM musicdb.album where artno<10;

