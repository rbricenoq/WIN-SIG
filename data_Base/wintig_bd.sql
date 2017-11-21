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
-- Table wintig.registro_muestra
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.registro_muestra (
	id_registro_muestra SERIAL PRIMARY KEY,
	id_fuente_hidrica INTEGER NOT NULL,
	fecha DATE,
	estado_ica VARCHAR(45),
	calculo_ica INTEGER,
	estado_irca VARCHAR(45),
	calculo_irca INTEGER);

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

CREATE TABLE IF NOT EXISTS wintig.registro_muestra (
	id_registro_muestra SERIAL PRIMARY KEY,
	codigo_fh VARCHAR(45) NOT NULL,
	fecha DATE NOT NULL,
	estado_ica VARCHAR(45) NOT NULL,
	calculo_ica INTEGER NOT NULL,
	estado_irca VARCHAR(45) NOT NULL,
	calculo_irca INTEGER NOT NULL);

CREATE OR REPLACE function insertar_trigger_muestra() 
returns trigger as $$

declare
codigo_fh_old INTEGER;
fecha_old DATE;
estado_ica_old VARCHAR(45);
calculo_ica_old INTEGER;
estado_irca_old VARCHAR(45);
calculo_irca_old INTEGER;
begin

SELECT wintig.fuente_hidrica.codigo_fh, fecha, estado_ica, calculo_ica, estado_irca, calculo_irca INTO codigo_fh_old, fecha_old, estado_ica_old, calculo_ica_old, estado_irca_old, calculo_irca_old
from wintig.fuente_hidrica, wintig.muestra, wintig.ica, wintig.irca 
where wintig.muestra.id_muestra=1 and wintig.muestra.id_ica = wintig.ica.id_ica and wintig.muestra.id_irca = wintig.irca.id_irca and wintig.fuente_hidrica.id_muestra = wintig.muestra.id_muestra;

INSERT INTO wintig.registro_muestra (codigo_fh, fecha, estado_ica, calculo_ica, estado_irca, calculo_irca) 
VALUES (codigo_fh_old, fecha_old, estado_ica_old, calculo_ica_old, estado_irca_old, calculo_irca_old );

return null;
END;
$$ language 'plpgsql';

create TRIGGER AU_MUESTRAS 
	before update on wintig.muestra 
	for each row
	execute procedure insertar_trigger_muestra();


INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Hurashi', 75, 'JOSE GOMEZ JUSAYU', 11.759962, -72.425952); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Taradurimahana', 120, 'ROSA EPIEYU', 11.752231, -72.415137); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Kasushi', 68, 'FRANCO EPIAYU', 1.760718, -72.398744);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Casusi', 208, 'ADALCIMENES GALVAN', 11.753491, -72.394109);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Curijary', 300, 'LUIS ALEXANDER RODRIGUEZ', 11.502866, -72.442700);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Panyu', 450, 'CATALINA MONTIEL URIANA', 11.510104, -72.418540);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Joyuyamahana', 500, 'LORENZO PUSHAINA', 11.515234, -72.412875);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Maguatero', 345, 'BERNARDO IPUANA URIANA', 11.518805, -72.442187);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Piurachunt', 89, 'WILLIAN RAFAEL EPIEYU', 11.638668, -72.568646);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1 , 'Tronjamahana', 64, 'GENARO URIANA BONIVENTO', 11.785759, -72.406580);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Hurarachon', 510, 'LUIS GONZALEZ IPUANA', 11.411988, -72.315274);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Mienchiqui', 462, 'PALASANAY JUSAYU', 11.438909, -72.293301);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Canasumana', 300, 'RAFAEL ARPUSHANA', 11.461754, -72.296659);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Arakachom', 245, 'LUIS AGUILAR URIANA', 11.470410, -72.313075);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Cariguanaso', 150, 'SAMUEL JUSAYU', 11.416805, -72.382318);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Sirroshirra', 198, 'NELSON ENRIQUE EPIAYU FERNANDEZ', 11.389039, -72.409614);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Kasutoru', 641, 'LUIS EPIAYU', 11.335454, -72.364039);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Kurit', 238, 'MARIA JACINTA RODRIGUEZ', 11.347063, -72.353015);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Camuya', 480, 'LUIS BONIVENTO', 11.216237, -72.398248);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Botoy', 326, 'PEDRO ANTONIO EPIEYU', 11.478698, -72.292425);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Panyu', 450, 'RAUL PUSHAINA', 11.509753, -72.418984); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Epehin', 356, 'RAFAEL ROSADO VELASQUEZ', 11.499633, -72.446615); 
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Cabra', 478, 'CONCHITA JUSAYU', 11.483058, -72.683569);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Aipruparain', 268, 'ELIATA EPIEYU', 11.534219, -72.516617);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Motin', 462, 'MANUEL EPIAYU', 11.468655, -72.624816);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Japuqu', 165, 'BERNARDO ROSADO MARQUEZ', 11.529972, -72.40379);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Urapa', 640, 'DEIVIS EPIEYU GONZALEZ', 11.660945, -72.444443);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Ajarajaona', 760, 'REINALDO EPIEYU', 11.564026, -72.516058);

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Carianguaso', 1450, 'LUIS GONZALEZ IPUANA', 11.416768, -72.384047);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Carianguaso', 563, 'PALASANAY JUSAYU', 11.416768, -72.384047);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Papaluz', 340, 'RAFAEL ARPUSHANA', 11.474534, -72.241284);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Sirroshirra', 840, 'LUIS AGUILAR URIANA', 11.390261, -72.409859);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Sirroshirra', 486, 'SAMUEL JUSAYU', 11.390261, -72.409859);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Patillita', 980, 'NELSON ENRIQUE EPIAYU FERNANDEZ', 11.484326, -72.197691);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Patillita', 468, 'LUIS EPIAYU', 11.484326, -72.197691);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Yotojoroin', 650, 'MARIA JACINTA RODRIGUEZ', 11.598099, -72.017825);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Kashure', 700, 'LUIS BONIVENTO', 11.566083, -72.116574);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Matajuna', 455, 'PEDRO ANTONIO EPIEYU', 11.642587, -71.975509);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Huamayo', 980, 'ANTONIO GOMEZ URIANA', 11.505008, -72.225657);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (2, 'Masicar', 648, 'DAVID AGUILAR URIANA', 11.518439, -72.253959);



