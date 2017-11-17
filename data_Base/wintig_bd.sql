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
	id_tipo_acceso INTEGER,
	num_dias_buscar_agua INTEGER,
	num_viajes INTEGER,
	cantidad_agua FLOAT,
	tiempo_viaje TIME,
	distancia FLOAT);

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
	id_tipo_uso INTEGER);

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
-- Table wintig.muestra
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.muestra (
	id_muestra SERIAL PRIMARY KEY NOT NULL,
	id_ica SERIAL,
	id_irca SERIAL,
	fecha DATE);

-- -----------------------------------------------------
-- Table wintig.fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.fuente_hidrica (
	id_fuente_hidrica SERIAL PRIMARY KEY,
	id_tipo_fuente_hidrica INTEGER NOT NULL,
	id_accesibilidad SERIAL,
	id_uso SERIAL,
	id_muestra SERIAL,
	id_rancheria INTEGER,
    id_usuario INTEGER,
    nom_fh VARCHAR(45) NOT NULL,
	latitud_fh FLOAT NOT NULL,
	longitud_fh FLOAT NOT NULL,
	codigo_fh VARCHAR(45));

-- -----------------------------------------------------
-- FOREIGN KEYs
-- -----------------------------------------------------

ALTER TABLE wintig.municipio add CONSTRAINT municipio_departamento_fk FOREIGN KEY (id_departamento) REFERENCES wintig.departamento (id_departamento);

ALTER TABLE wintig.usuario add CONSTRAINT usuario_tipo_de_usuario_fk FOREIGN KEY (id_tipo_de_usuario) REFERENCES wintig.tipo_de_usuario (id_tipo_de_usuario);

ALTER TABLE wintig.accesibilidad add CONSTRAINT accesibilidad_tipo_acceso_fk FOREIGN KEY (id_tipo_acceso) REFERENCES wintig.tipo_acceso (id_tipo_acceso);

ALTER TABLE wintig.uso add CONSTRAINT uso_tipo_uso_fk FOREIGN KEY (id_tipo_uso) REFERENCES wintig.tipo_uso (id_tipo_uso);

ALTER TABLE wintig.rancheria add CONSTRAINT rancheria_municipio_fk FOREIGN KEY (id_municipio) REFERENCES wintig.municipio (id_municipio);

ALTER TABLE wintig.muestra add CONSTRAINT muestra_ica_fk FOREIGN KEY (id_ica) REFERENCES wintig.ica (id_ica);
ALTER TABLE wintig.muestra add CONSTRAINT muestra_irca_fk FOREIGN KEY (id_irca) REFERENCES wintig.irca (id_irca);

ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_tipo_fuente_hidrica_fk FOREIGN KEY (id_tipo_fuente_hidrica) REFERENCES wintig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_accesibilidad_fk FOREIGN KEY (id_accesibilidad) REFERENCES wintig.accesibilidad (id_accesibilidad);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_uso_fk FOREIGN KEY (id_uso) REFERENCES wintig.uso (id_uso);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_rancheria_fk FOREIGN KEY (id_rancheria) REFERENCES wintig.rancheria (id_rancheria);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_muestra_fk FOREIGN KEY (id_muestra) REFERENCES wintig.muestra (id_muestra);
ALTER TABLE wintig.fuente_hidrica add CONSTRAINT fuente_hidrica_usuario_fk FOREIGN KEY (id_usuario) REFERENCES wintig.usuario (id_usuario);

-- -----------------------------------------------------
-- Insert test data
-- -----------------------------------------------------

INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) VALUES ('Administrador');
INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) VALUES ('Recolector');

INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Pozo');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Jagüey');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) VALUES ('Reservorio');

INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('En la rancheria');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('En el terreno');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) VALUES ('Fuera del terreno');

INSERT INTO wintig.tipo_uso (nom_tipo_uso) VALUES ('');
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

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (1, 2, 3, 4, '02:00', 6);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);   

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (3, 4, 2, 8, '01:32', 9);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (1); 

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (2, 2, 3, 8, '02:47', 7);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (1);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (3, 1, 2, 5, '00:32', 9);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (2, 1, 5, 7, '01:32', 3);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (3);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (3, 5, 2, 9, '01:32', 4);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (1, 4, 3, 1, '01:32', 1);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (3);

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, tiempo_viaje, distancia) VALUES (3, 1, 2, 5, '00:47', 9);  
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

INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (1,1,'2017-08-25');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (2,2,'2017-06-5');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (3,3,'2017-08-21');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (4,4,'2017-05-23');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (5,5,'2017-06-8');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (6,6,'2017-07-15');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (7,7,'2017-08-15');
INSERT INTO wintig.muestra (id_ica, id_irca, fecha) VALUES (8,8,'2017-10-20');



INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (1, 1, 1, 1, 2, 4, 'Aremashain', 11.7650790499241, -72.4589270353317, 'FH1PMN');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (1, 2, 2, 2, 4, 4, 'Epehuz', 11.497942, -72.428158, 'FH2PMN');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (2, 3, 3, 3, 7, 4, 'Epehin', 11.498993, -72.438694, 'FH3JMN');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (2, 4, 4, 4, 9, 4, 'Yamahain', 11.422820, -72.392875, 'FH4JMN');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (3, 5, 5, 5, 11, 4, 'Yamaluria', 11.420548, -72.383820, 'FH5RMC');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (3, 6, 6, 6, 13, 4, 'Fakimuhana', 11.456573, -72.252018, 'FH6RMC');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (1, 7, 7, 7, 15, 4, 'Huaraurahu', 11.379048, -72.403278, 'FH7PMC');
INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_accesibilidad, id_uso, id_muestra, id_rancheria, id_usuario, nom_fh, latitud_fh, longitud_fh, codigo_fh) VALUES (2, 8, 8, 8, 16, 4, 'Huayahu', 11.381298, -72.403278, 'FH8JMC');
