/* Insertamos los autores */

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('1', 'Juan Carlos', 'Aragón', 'El Cabeza', '1967-05-26', '0000-00-00', 'Nacio, crecio, hizo comparsas', '4 primeros premios, 2 segundos y 2 terceros');

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('2' ,'Antonio', 'Martín García', 'El niño de San Vicente', '1950-00-00', '0000-00-00','Nacio, crecio, hizo comparsas', '16 primeros premios, 8 segundos y 12 terceros');

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('3' ,'José Luis', 'García Cossio', 'El Selu','1962-06-00', '0000-00-00', 'Nacio, crecio, hizo chirigotas', '5 primeros premios, 5 segundos y 6 terceros');

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('4' ,'Antonio', 'Martínez Ares', 'El Niño', '1967-02-08', '0000-00-00', 'Nacio, crecio, hizo comparsas', '6 primeros premios, 5 segundos y 3 terceros');

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('5' ,'Antonio Pedro', 'Serrano Álvarez','El Canijo de Carmona','1967-00-00', '0000-00-00','Nacio, crecio, hizo chirigotas', '3 primeros premios');

INSERT INTO autor (codautor,nombre, apellidos, apodo, fechaNacimiento, fechaMuerte, biografia, premios) VALUES
('6' ,'Constantino', 'Tovar Verdejo', 'Tino', '0000-00-00', '0000-00-00','Nacio, crecio, hizo comparsas', '10 primeros premios, 7 segundos y 7 terceros');

/* Insertamos las agrupaciones */
/* Juan Carlos */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('1', 'La Serenissima', 'Comparsa', 'Faly, Carlos, Kuko, Mawito, Moises, Keko, David Carame, Chema, Julian, Arturito, Sergio Payan, Javi, Javi Bohorquez y Ramoni', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('2', 'Los Ladrones', 'Comparsa', 'Faly, Carlos, Kuko, Mawito, Moises, Keko, David Carame, Chema, Julian, Arturito, Sergio Payan, Javi, Javi Bohorquez y Ramoni', 'No participó en el COAC');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('3', 'Las noches de Bohemia', 'Comparsa', 'Faly, Carlos, Kuko, Mawito, Moises, Keko, David Carame, Chema, Julian, Arturito, Sergio Payan, Javi, Javi Bohorquez y Ramoni', 'Primer accésit');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('4', 'Araka la kana', 'Comparsa', 'Faly, Carlos, Kuko, Mawito, Moises, Keko, David Carame, Chema, Julian, Arturito, Sergio Payan, Javi, Javi Bohorquez y Ramoni', 'Primer premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('5', 'Kadi City, Ciudad sin Ley', 'Chirigota', 'Faly, Carlos, Kuko, Mawito, Moises, Keko, David Carame, Chema, Julian, Arturito, Sergio Payan, Javi, Javi Bohorquez y Ramoni', 'Semifinalista');

/* Antonio Martin */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('6', 'Ley de vida', 'Comparsa', 'Jose Antonio, Ruben, Jesus Garcia, Jorge, Sebastian, Rafael, Francisco Javier, Francisco Pacoli, Antonio Caracol, Jesus Lucho, Manuel Buyo, Miguel Nandez, Oscar, Carli, Angel Subiela y Sergio', 'Semifinalista');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('7', 'Los hippytanos', 'Comparsa', 'Jose Antonio, Ruben, Jesus Garcia, Jorge, Sebastian, Rafael, Francisco Javier, Francisco Pacoli, Antonio Caracol, Jesus Lucho, Manuel Buyo, Miguel Nandez, Oscar, Carli, Angel Subiela y Sergio', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('8', 'Se acabó el cuento', 'Comparsa', 'Jose Antonio, Ruben, Jesus Garcia, Jorge, Sebastian, Rafael, Francisco Javier, Francisco Pacoli, Antonio Caracol, Jesus Lucho, Manuel Buyo, Miguel Nandez, Oscar, Carli, Angel Subiela y Sergio', 'Primer accésit');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('9', 'La comparsa del genio', 'Comparsa', 'Jose Antonio, Ruben, Jesus Garcia, Jorge, Sebastian, Rafael, Francisco Javier, Francisco Pacoli, Antonio Caracol, Jesus Lucho, Manuel Buyo, Miguel Nandez, Oscar, Carli, Angel Subiela y Sergio', 'Primer premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('10', 'Entre rejas', 'Comparsa', 'Jose Antonio, Ruben, Jesus Garcia, Jorge, Sebastian, Rafael, Francisco Javier, Francisco Pacoli, Antonio Caracol, Jesus Lucho, Manuel Buyo, Miguel Nandez, Oscar, Carli, Angel Subiela y Sergio', 'Primer premio');

/* Selu */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('11', 'Si me pongo pesao me lo dices', 'Chirigota', 'Sibón, Selu, Manuel, Antonio Rivas, Juan José, Juan Manuel, Rafael, Jose María, Juan Antonio, Jesús Padilla y Juan José Aguilar', 'Primer premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('12', 'Tó pa ella', 'Chirigota', 'Sibón, Selu, Manuel, Antonio Rivas, Juan José, Juan Manuel, Rafael, Jose María, Juan Antonio, Jesús Padilla y Juan José Aguilar', 'Semifinalista');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('13', 'Soltero y sin ComproPiso', 'Chirigota', 'Sibón, Selu, Manuel, Antonio Rivas, Juan José, Juan Manuel, Rafael, Jose María, Juan Antonio, Jesús Padilla y Juan José Aguilar', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('14', 'El que vale, vale', 'Chirigota', 'Sibón, Selu, Manuel, Antonio Rivas, Juan José, Juan Manuel, Rafael, Jose María, Juan Antonio, Jesús Padilla y Juan José Aguilar', 'Tercer premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('15', 'Las marujas', 'Chirigota', 'Sibón, Selu, Manuel, Antonio Rivas, Juan José, Juan Manuel, Rafael, Jose María, Juan Antonio, Jesús Padilla y Juan José Aguilar', 'Tercer premio');

/* Ares */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('16', 'La Eternidad', 'Comparsa', 'Ponce, Rafita, Juanin, Guille, Geni Cheza, Juandi, Faly, Cristian, Cristobal, Antonio, David y Manuel', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('17', 'Los Cobardes', 'Comparsa', 'Ponce, Rafita, Juanin, Guille, Geni Cheza, Juandi, Faly, Cristian, Cristobal, Antonio, David y Manuel', 'Primer premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('18', 'La Revolución', 'Comparsa', 'Ponce, Rafita, Juanin, Guille, Geni Cheza, Juandi, Faly, Cristian, Cristobal, Antonio, David y Manuel', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('19', 'El Brujo', 'Comparsa', 'Ponce, Rafita, Juanin, Guille, Geni Cheza, Juandi, Faly, Cristian, Cristobal, Antonio, David y Manuel', 'Segundo premio');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('20', 'Calabazas', 'Comparsa', 'Ponce, Rafita, Juanin, Guille, Geni Cheza, Juandi, Faly, Cristian, Cristobal, Antonio, David y Manuel', 'Segundo premio');

/* Canijo */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('21', '', 'Chirigota', 'Canijo, Lacio, David Carrasco, Benite, Paco, Mota, Miguel, Ardentia, Añoño, Juanmi del Pino, Pepito, Baena, Piru y Sergio el Miji', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('22', '', 'Chirigota', 'Canijo, Lacio, David Carrasco, Benite, Paco, Mota, Miguel, Ardentia, Añoño, Juanmi del Pino, Pepito, Baena, Piru y Sergio el Miji', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('23', '', 'Chirigota', 'Canijo, Lacio, David Carrasco, Benite, Paco, Mota, Miguel, Ardentia, Añoño, Juanmi del Pino, Pepito, Baena, Piru y Sergio el Miji', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('24', '', 'Chirigota', 'Canijo, Lacio, David Carrasco, Benite, Paco, Mota, Miguel, Ardentia, Añoño, Juanmi del Pino, Pepito, Baena, Piru y Sergio el Miji', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('25', '', 'Chirigota', 'Canijo, Lacio, David Carrasco, Benite, Paco, Mota, Miguel, Ardentia, Añoño, Juanmi del Pino, Pepito, Baena, Piru y Sergio el Miji', '');

/* tino */
INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('26', '', 'Comparsa', '', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('27', '', 'Comparsa', '', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('28', '', 'Comparsa', '', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('29', '', 'Comparsa', '', '');

INSERT INTO agrupacion (codAgrupacion, nombre, tipo, componentes, clasificacion) VALUES
('30', '', 'Comparsa', '', '');
