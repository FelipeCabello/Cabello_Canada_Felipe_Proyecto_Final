drop database wikicarnaval;

create database wikicarnaval;

use wikicarnaval;

create table usuario(
  codUsuario INTEGER NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(25) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(50) NOT NULL,
  rol VARCHAR(25) NOT NULL,
  foto VARCHAR(100),
  primary key (codUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table comentario(
  codUsuario INTEGER NOT NULL,
  codLetra INTEGER NOT NULL,
  comentario VARCHAR(500),
  puntuacion VARCHAR(2),
  primary key (codUsuario, codLetra)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table letra(
  codLetra INTEGER NOT NULL AUTO_INCREMENT,
  codAgrupacion INTEGER NOT NULL,
  pase VARCHAR(25),
  presentacion TEXT,
  pasodobleUno TEXT,
  pasodobleDos TEXT,
  cuples TEXT,
  popurri TEXT,
  primary key (codLetra, codAgrupacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table agrupacion(
  codAgrupacion INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(40),
  tipo VARCHAR(25),
  musica VARCHAR(40),
  director VARCHAR(40),
  clasificacion VARCHAR(25),
  localidad VARCHAR(25),
  foto VARCHAR(100),
  primary key (codAgrupacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table fecha(
  codAutor INTEGER NOT NULL,
  codAgrupacion INTEGER NOT NULL,
  fecha DATE,
  primary key (codAutor, codAgrupacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table autor(
  codAutor INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(40),
  apellidos VARCHAR(40),
  apodo VARCHAR(40),
  fechaNacimiento DATE,
  biografia TEXT,
  premios VARCHAR(100),
  foto VARCHAR(100),
  primary key (codAutor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE comentario
ADD CONSTRAINT com_fk_codUs FOREIGN KEY(codUsuario) REFERENCES usuario(codUsuario)
ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT com_fk_codLe FOREIGN KEY(codLetra) REFERENCES letra(codLetra)
ON DELETE CASCADE;

ALTER TABLE fecha
ADD CONSTRAINT fe_fk_codAu FOREIGN KEY(codAutor) REFERENCES autor(codAutor)
ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fe_fk_codAg FOREIGN KEY(codAgrupacion) REFERENCES agrupacion(codAgrupacion)
ON DELETE CASCADE;

ALTER TABLE letra
ADD CONSTRAINT le_fk_codAg FOREIGN KEY(codAgrupacion) REFERENCES agrupacion(codAgrupacion)
ON DELETE CASCADE;
