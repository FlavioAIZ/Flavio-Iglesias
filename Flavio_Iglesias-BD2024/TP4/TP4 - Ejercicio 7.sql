CREATE DATABASE Academia;

CREATE TABLE Academia.Profesores
(
    nombre VARCHAR(25) NOT NULL,
    apellido1 VARCHAR (20) NOT NULL,
    apellido2 VARCHAR (20),
    dni int(8) NOT NULL,
    direccion VARCHAR (50),
    titulo VARCHAR(25)NOT NULL,
    gana decimal(8,2) NOT NULL,
    PRIMARY KEY (dni),
    UNIQUE (nombre, apellido1, apellido2)
);

CREATE TABLE Academia.Cursos
(
    nombre_curso VARCHAR(25) NOT NULL,
    codigo INT NOT NULL,
    dni_profesor INT(8) NOT NULL,
    maximo_alumnos INT,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE,
    num_horas decimal(5,1) NOT NULL,
    PRIMARY KEY (codigo),
    FOREIGN KEY (dni_profesor) REFERENCES Academia.Profesores(dni),
    UNIQUE (nombre_curso),
    CHECK (fecha_inicio<fecha_fin)
);

CREATE TABLE Academia.Alumnos
(
    nombre VARCHAR(25) NOT NULL,
    apellido1 VARCHAR (20) NOT NULL,
    apellido2 VARCHAR (20),
    dni int(8) NOT NULL,
    direccion VARCHAR (50),
    sexo CHAR(1),
    fecha_nacimiento DATE,
    curso INT NOT NULL,
    CHECK (sexo="H" OR sexo="M"),
    PRIMARY KEY (dni),
    FOREIGN KEY (curso) REFERENCES Academia.Cursos(codigo)
);

INSERT INTO academia.profesores VALUES ("Juan", "Arch", "Lopez",32432455, "Puerta Negra 4", "Ing.Informática",7500);
INSERT INTO academia.profesores VALUES ("María","Oliva","Rubio",4321563,"Juan Alfonso 32","Lda.Fil.Inglesa", 5400);
SELECT * FROM academia.cursos WHERE (codigo<3);
UPDATE Academia.profesores SET dni=43215643 where dni=4321563;
ALTER TABLE academia.cursos MODIFY num_horas DECIMAL(5,1);

INSERT INTO academia.cursos (nombre_curso, codigo, dni_profesor, maximo_alumnos, fecha_inicio, fecha_fin, num_horas)
VALUES ("Inglés básico",1,43215643,15,20001101,20001201,120);
INSERT INTO academia.cursos (nombre_curso, codigo, dni_profesor, maximo_alumnos, fecha_inicio, fecha_fin, num_horas)
VALUES ("Administración Linux",2,32432455,NULL,20000901,NULL,80);
DELETE from academia.cursos where (codigo<3);

INSERT INTO academia.alumnos 
VALUES ("Lucas","Manilva","Lopez",123523,"Alhamar 3","H","19791101",1);
INSERT INTO academia.alumnos (nombre, apellido1, apellido2, dni, direccion, sexo, curso)
VALUES ("Antonia","López","Alcantara",2567567,"Maniqui 21","M",2);
INSERT INTO academia.alumnos (nombre, apellido1, apellido2, dni, direccion, curso)
VALUES ("Manuel","Alcantara","Pedrós",3123689,"Julian 2",2);
INSERT INTO academia.alumnos
VALUES ("José","Perez","Caballar",4896765,"Jarcha 5","H","19770203",1);

select * from academia.alumnos where (dni>1);

ALTER TABLE academia.profesores ADD COLUMN edad INT(2);
ALTER TABLE academia.profesores
ADD CONSTRAINT chk_edad_profesor
CHECK (TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 18 AND 65);

ALTER TABLE academia.cursos
ADD CONSTRAINT chk_alumnos_maximo
CHECK (maximo_alumnos>10);

ALTER TABLE academia.profesores
ADD CONSTRAINT chk_edad_profesor
CHECK (Edad BETWEEN 18 and 65);

ALTER TABLE academia.cursos
ADD CONSTRAINT chk_horas_curso
CHECK (num_horas>100);

ALTER TABLE academia.alumnos
DROP CONSTRAINT Constraint_1;



SHOW CREATE TABLE academia.cursos;

ALTER TABLE academia.profesores
MODIFY gana decimal(8,2);

ALTER TABLE academia.cursos
MODIFY fecha_inicio DATE NOT NULL;


ALTER TABLE academia.cursos DROP CONSTRAINT cursos_ibfk_1;
ALTER TABLE academia.profesores DROP PRIMARY KEY;
ALTER TABLE academia.profesores
ADD PRIMARY KEY (apellido1, apellido2, nombre);
ALTER TABLE academia.profesores MODIFY dni INT(8) UNIQUE NOT NULL;
ALTER TABLE academia.cursos
ADD CONSTRAINT dni_profe FOREIGN KEY (dni_profesor) REFERENCES academia.profesores(dni);

UPDATE Academia.alumnos SET fecha_nacimiento="19761223" WHERE dni=2567567;
UPDATE academia.alumnos SET curso=5 where dni=2567567;
SELECT * FROM academia.cursos WHERE codigo<10