create database wintig;
	create schema if not exists wintig;

-- -----------------------------------------------------
-- Table wintig.tipo_de_usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_de_usuario (
	id_tipo_de_usuario SERIAL PRIMARY KEY NOT NULL, 
	tipo_de_usuario VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table wintig.usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.usuario (
	id_usuario SERIAL PRIMARY KEY NOT NULL,
	nombre VARCHAR(45) NOT NULL,
	apellido VARCHAR(45) NOT NULL,
	id_tipo_de_usuario INTEGER NOT NULL,
	tel_usuario VARCHAR(45) NOT NULL,
	correo_usuario VARCHAR(45) NOT NULL,
	nom_usuario VARCHAR(45) NOT NULL,
	password VARCHAR(45) NOT NULL,
	activate VARCHAR(32) NOT NULL,
	estado INTEGER NOT NULL);

-- -----------------------------------------------------
-- Table wintig.tipo_fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_fuente_hidrica (
	id_tipo_fuente_hidrica SERIAL PRIMARY KEY NOT NULL, 
	nom_tipo_fuente_hidrica VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table wintig.ica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.ica (
	id_ica SERIAL PRIMARY KEY NOT NULL,
	oxigeno_disuelto FLOAT,
	solidos_suspendidos FLOAT,
	demanda_quimica_oxigeno FLOAT,
	conductividad_electrica FLOAT,
	ph_ica FLOAT,
	nitrogeno_ica FLOAT,
	fosforo_ica FLOAT,
	calculo_ica FLOAT,
	estado_ica VARCHAR(45));

-- -----------------------------------------------------
-- Table wintig.irca
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS wintig.irca (
	id_irca SERIAL PRIMARY KEY NOT NULL,
	color_aparente FLOAT,
	olor VARCHAR(45),
	sabor VARCHAR(45),
	turbiedad FLOAT,
	conductividad FLOAT,
	ph_irca FLOAT,
	antimonio FLOAT,
	arsenico FLOAT,
	bario FLOAT,
	cadmio FLOAT,
	cianuro_libre_disociable FLOAT,
	cobre FLOAT,
	cromo FLOAT,
	mercurio FLOAT,
	niquel FLOAT,
	plomo FLOAT,
	selenio FLOAT,
	trihalometanos FLOAT,
	hap FLOAT,
	cot FLOAT,
	nitritos FLOAT,
	nitratos FLOAT,
	fluoruros FLOAT,
	calcio FLOAT,
	alcalinidad FLOAT,
	cloruros FLOAT,
	aluminio FLOAT,
	dureza FLOAT,
	hierro FLOAT,
	magnesio FLOAT,
	manganeso FLOAT,
	molibdeno FLOAT,
	sulfatos FLOAT,
	zinc FLOAT,
	fosfatos FLOAT,
	cmt FLOAT,
	plaguicidas FLOAT,
	escherichia_coli VARCHAR(45),
	coliformes VARCHAR(45),
	microorganismos_mesofilicos FLOAT,
	giardia FLOAT,
	cryptosporidium FLOAT,
	detergente FLOAT,
	coagulante_sales_hierro FLOAT,
	coagulante_aluminio FLOAT,
	calculo_irca FLOAT,
	estado_irca VARCHAR(45));

-- -----------------------------------------------------
-- Table wintig.accesibilidad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.accesibilidad (
	id_accesibilidad SERIAL PRIMARY KEY NOT NULL,
	id_tipo_acceso INTEGER NOT NULL,
	num_dias_buscar_agua INTEGER NOT NULL,
	num_viajes INTEGER NOT NULL,
	cantidad_agua FLOAT NOT NULL,
	tiempo_viaje TIME NOT NULL,
	distancia FLOAT NOT NULL,
	poblacion_acceso INTEGER NOT NULL);

-- -----------------------------------------------------
-- Table wintig.tipo_acceso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_acceso (
	id_tipo_acceso SERIAL PRIMARY KEY NOT NULL, 
	nom_tipo_acceso VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table wintig.uso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.uso (
	id_uso SERIAL PRIMARY KEY NOT NULL,
	id_tipo_uso INTEGER NOT NULL);

-- -----------------------------------------------------
-- Table wintig.tipo_uso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_uso (
	id_tipo_uso SERIAL PRIMARY KEY NOT NULL, 
	nom_tipo_uso VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table wintig.departamento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.departamento (
	id_departamento SERIAL PRIMARY KEY NOT NULL, 
	nom_departamento VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table wintig.municipio
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.municipio (
	id_municipio SERIAL PRIMARY KEY NOT NULL, 
	nom_municipio VARCHAR(45) NOT NULL,
	id_departamento INTEGER NOT NULL);

-- -----------------------------------------------------
-- Table wintig.rancheria
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.rancheria (
	id_rancheria SERIAL PRIMARY KEY NOT NULL,
	id_municipio INTEGER NOT NULL,
	nom_rancheria VARCHAR(45) NOT NULL,
	cantidad_personas INTEGER NOT NULL,
	representante VARCHAR(45) NOT NULL,
	latitud_r FLOAT NOT NULL,
	longitud_r FLOAT NOT NULL);

-- -----------------------------------------------------
-- Table wintig.fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.fuente_hidrica (
	id_fuente_hidrica SERIAL PRIMARY KEY,
	id_tipo_fuente_hidrica INTEGER NOT NULL,
	id_accesibilidad SERIAL NOT NULL,
	id_uso SERIAL NOT NULL,
	id_ica SERIAL,
	id_irca SERIAL,
	id_rancheria INTEGER,
	nom_fh VARCHAR(45) NOT NULL,
	latitud_fh FLOAT NOT NULL,
	longitud_fh FLOAT NOT NULL);

-- -----------------------------------------------------
-- FOREIGN KEYs
-- -----------------------------------------------------

ALTER TABLE wintig.municipio add CONSTRAINT municipio_departamento_fk FOREIGN KEY (id_departamento) REFERENCES wintig.departamento (id_departamento);

ALTER TABLE wintig.usuario add CONSTRAINT usuario_tipo_de_usuario_fk FOREIGN KEY (id_tipo_de_usuario) REFERENCES wintig.tipo_de_usuario (id_tipo_de_usuario);

ALTER TABLE wintig.accesibilidad add CONSTRAINT accesibilidad_tipo_acceso_fk FOREIGN KEY (id_tipo_acceso) REFERENCES wintig.tipo_acceso (id_tipo_acceso);

ALTER TABLE wintig.uso add CONSTRAINT uso_tipo_uso_fk FOREIGN KEY (id_tipo_uso) REFERENCES wintig.tipo_uso (id_tipo_uso);

ALTER TABLE wintig.rancheria add CONSTRAINT rancheria_municipio_fk FOREIGN KEY (id_municipio) REFERENCES wintig.municipio (id_municipio);

ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_tipo_fuente_hidrica_fk FOREIGN KEY (id_tipo_fuente_hidrica) REFERENCES wintig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_ica_fk FOREIGN KEY (id_ica) REFERENCES wintig.ica (id_ica);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_irca_fk FOREIGN KEY (id_irca) REFERENCES wintig.irca (id_irca);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_accesibilidad_fk FOREIGN KEY (id_accesibilidad) REFERENCES wintig.accesibilidad (id_accesibilidad);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_uso_fk FOREIGN KEY (id_uso) REFERENCES wintig.uso (id_uso);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_rancheria_fk FOREIGN KEY (id_rancheria) REFERENCES wintig.rancheria (id_rancheria);

-- -----------------------------------------------------
-- Insert test data
-- -----------------------------------------------------

INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) VALUES ('Administrador');
INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) VALUES ('Recolector');

INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password, activate, estado) VALUES ('Ramiro', 'Briceño', 1, '3208809703', 'rbricenoq@unbosque.edu.co', 'rbricenoq', 'ramiro1234',  'asdhashfgjahsdf', 1);  
INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password, activate, estado) VALUES ('Sergio', 'Barrero', 1, '3212290107', 'sbarrerof@unbosque.edu.co', 'sbarrerof', 'sergio1234',  'adfgadfggfdh', 1);
INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password, activate, estado) VALUES ('Daniela', 'Pico', 1, '3166190924', 'dpico@unbosque.edu.co', 'dpico', 'dpico1234', 'dfsghfdghgf', 1);

INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Pozo');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Jagüey');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Reservorio');

INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('En la rancheria');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('En el terreno');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('Fuera del terreno');

INSERT INTO wintig.tipo_uso (nom_tipo_uso) VALUES ('Domestico');
INSERT INTO wintig.tipo_uso (nom_tipo_uso) VALUES ('Economico');
INSERT INTO wintig.tipo_uso (nom_tipo_uso) VALUES ('Agropecuario');

INSERT INTO wintig.departamento (nom_departamento) VALUES ('Guajira');  

INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Manaure', 1);  
INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Maicao', 1); 

INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.05, 'Muy Mala');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.25, 'Muy Mala');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.34, 'Mala');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.58, 'Regular');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.69, 'Regular');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.85, 'Aceptable');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,0.74, 'Aceptable');
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300,1, 'Buena');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,4,'Sin Riesgo');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,4.9,'Sin Riesgo');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,7,'Riesgo Bajo');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,13.8,'Bajo');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,14.8,'Riesgo Medio');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,34.8,'Riesgo Medio');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,70,'Riesgo Alto');

INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
	arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
	trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
	dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
	plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
	detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,100,'Sanitariamente Inviable');

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (1, 2, 3, 4, '02:00', 6, 7);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);   

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (3, 4, 2, 8, '01:32', 9, 11);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (1); 

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (2, 2, 3, 8, '02:47', 7, 4);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (1);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (3, 1, 2, 5, '00:32', 9, 8);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (2, 1, 5, 7, '01:32', 3, 3);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (3);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (3, 5, 2, 9, '01:32', 4, 15);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (1, 4, 3, 1, '01:32', 1, 11);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (3);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia, poblacion_acceso) VALUES (3, 1, 2, 5, '00:47', 9, 8);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (1);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Hurashi', 22, 'Martina', 11.759962, -72.425952);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Taradurimahana', 14, 'Martina', 11.752231, -72.415137);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Kasushi', 12, 'Martina', 11.760718, -72.398744);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Casusi', 7, 'Martina', 11.753491, -72.394109);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Curijary', 28, 'Martina', 11.502866, -72.442700);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Panyu', 11, 'Martina', 11.510104, -72.418540);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Joyuyamaha', 13, 'Martina', 11.515234, -72.412875);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Maguatero', 4, 'Martina', 11.518805, -72.442187);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Piurachunt', 13, 'Martina', 11.638668, -72.568646);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Tronjamahana', 11, 'Martina', 11.785759, -72.406580);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Hurarachon', 13, 'José', 11.411988, -72.315274); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Mienchiqui', 4, 'Jose', 11.438909, -72.293301);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Canasumana', 13, 'José', 11.461754, -72.296659); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Arakachom', 4, 'Jose', 11.470410, -72.313075);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Curiguanaso', 13, 'José', 11.416805, -72.382318); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Sirroshirra', 4, 'Jose', 11.389039, -72.409614);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Kasutoru', 13, 'José', 11.335454, -72.364039); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Kurit', 4, 'Jose', 11.347063, -72.353015);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Camuya', 13, 'José', 11.216237, -72.398248); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Botoy', 4, 'Jose', 11.478698, -72.292425);

INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (1, 'Aremashain', 11.7650790499241, -72.4589270353317);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Epehuz', 11.497942, -72.428158);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Epehin', 11.498993, -72.438694);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Yamahain', 11.422820, -72.392875);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Yamaluria', 11.420548, -72.383820);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Fakimuhana', 11.456573, -72.252018);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Huaraurahu', 11.379048, -72.403278);
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, nom_fh, latitud_fh, longitud_fh) VALUES (2, 'Huayahu', 11.381298, -72.403278);




