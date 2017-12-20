
create database wikicarnaval;

use wikicarnaval;

create table usuario(
  codUsuario INTEGER NOT NULL AUTO_INCREMENT,
  usuario VARCHAR(25) NOT NULL,
  password VARCHAR(25) NOT NULL,
  rol VARCHAR(25) NOT NULL,
  primary key (codUsuario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table comentario(
  codUsuario INTEGER NOT NULL,
  codAgrupacion INTEGER NOT NULL,
  comentario VARCHAR(500),
  puntuacion VARCHAR(2),
  primary key (codUsuario, codAgrupacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table letra(
  codLetra INTEGER NOT NULL AUTO_INCREMENT,
  codAgrupacion INTEGER NOT NULL,
  pase VARCHAR(25),
  presentacion VARCHAR(2000),
  pasadobleUno VARCHAR(2000),
  pasodobleDos VARCHAR(2000),
  cuples VARCHAR(1000),
  popurri VARCHAR(2000),
  primary key (codLetra, codAgrupacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table agrupacion(
  codAgrupacion INTEGER NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(25),
  tipo VARCHAR(25),
  componentes VARCHAR(2000),
  clasificacion VARCHAR(25),
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
  nombre VARCHAR(25),
  apellidos VARCHAR(25),
  apodo VARCHAR(25),
  fechaNacimiento DATE,
  fechaMuerte DATE,
  biografia VARCHAR(10000),
  premios VARCHAR(25),
  primary key (codAutor)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE comentario
ADD CONSTRAINT com_fk_codUs FOREIGN KEY(codUsuario) REFERENCES usuario(codUsuario)
ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT com_fk_codAg FOREIGN KEY(codAgrupacion) REFERENCES agrupacion(codAgrupacion)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE fecha
ADD CONSTRAINT fe_fk_codAu FOREIGN KEY(codAutor) REFERENCES autor(codAutor)
ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT fe_fk_codAg FOREIGN KEY(codAgrupacion) REFERENCES agrupacion(codAgrupacion)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE letra
ADD CONSTRAINT le_fk_codAg FOREIGN KEY(codAgrupacion) REFERENCES agrupacion(codAgrupacion)
ON DELETE CASCADE ON UPDATE CASCADE;
