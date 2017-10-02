create database wintig;
create schema if not exists wintig;

-- -----------------------------------------------------
-- Table wintig.tipo_de_usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_de_usuario (
  id_tipo_de_usuario serial primary key not null, 
  tipo_de_usuario varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.usuario (
  id_usuario serial primary key not null,
  nombre varchar(45) not null,
  apellido varchar(45) not null,
  id_tipo_de_usuario integer not null,
  tel_usuario varchar(45) not null,
  correo_usuario varchar(45) not null,
  nom_usuario varchar(45) not null,
  password varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.tipo_fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_fuente_hidrica (
 id_tipo_fuente_hidrica serial primary key not null, 
 nom_tipo_fuente_hidrica varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.capacidad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.capacidad (
  id_capacidad serial primary key not null, 
  capacidad_fuente varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.calidad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.calidad (
  id_calidad serial primary key not null,
  oxigeno_disuelto integer not null,
  solidos_suspendidos integer not null,
  demanda_quimica_oxigeno integer not null,
  conductividad_electrica integer not null,
  ph integer not null,
  nitrogeno integer not null,
  fosforo integer not null);

-- -----------------------------------------------------
-- Table wintig.accesibilidad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.accesibilidad (
  id_accesibilidad serial primary key not null,
  poblacion_acceso_agua_limpia integer not null,
  poblacion_acceso_sanidad integer not null,
  poblacion_acceso_agua_per_capita integer not null,
  uso_fuente_hidrica varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.departamento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.departamento (
  id_departamento serial primary key not null, 
  nom_departamento varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.municipio
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.municipio (
  id_municipio serial primary key not null, 
  nom_municipio varchar(45) not null,
  id_departamento integer not null);

-- -----------------------------------------------------
-- Table wintig.rancheria
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.rancheria (
  id_rancheria serial primary key not null,
  id_municipio integer not null,
  nom_rancheria VARCHAR(45) NOT NULL,
  cantidad_personas integer NOT NULL,
  representante VARCHAR(45) NOT NULL,
  latitud_r Float NOT NULL,
  longitud_r Float NOT NULL);

-- -----------------------------------------------------
-- Table wintig.fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.fuente_hidrica (
  id_fuente_hidrica serial primary key,
  id_tipo_fuente_hidrica integer not null,
  id_capacidad serial not null,
  id_ubicacion serial not null,
  id_calidad serial not null,
  id_accesibilidad serial not null,
  id_rancheria serial not null,
  latitud_fh Float NOT NULL,
  longitud_fh Float NOT NULL);

-- -----------------------------------------------------
-- Foreign Keys
-- -----------------------------------------------------

alter table wintig.municipio add constraint municipio_departamento_fk foreign key (id_departamento) references wintig.departamento (id_departamento);
alter table wintig.usuario add constraint usuario_tipo_de_usuario_fk foreign key (id_tipo_de_usuario) references wintig.tipo_de_usuario (id_tipo_de_usuario);

alter table wintig.fuente_hidrica add constraint fuente_hidrica_tipo_fuente_hidrica_fk foreign key (id_tipo_fuente_hidrica) references wintig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_capacidad_fk foreign key (id_capacidad) references wintig.capacidad (id_capacidad);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_calidad_fk foreign key (id_calidad) references wintig.calidad (id_calidad);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_accesibilidad_fk foreign key (id_accesibilidad) references wintig.accesibilidad (id_accesibilidad);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_rancheria_fk foreign key (id_rancheria) references wintig.rancheria (id_rancheria);

alter table wintig.rancheria add constraint rancheria_municipio_fk foreign key (id_municipio) references wintig.municipio (id_municipio);

-- -----------------------------------------------------
-- Insert test data
-- -----------------------------------------------------

INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) values ('Administrador');
INSERT INTO wintig.tipo_de_usuario (tipo_de_usuario) values ('Recolector');

INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Ramiro', 'Briceño', 1, '3208809703', 'rbricenoq@unbosque.edu.co', 'rbricenoq', 'ramiro1234');  
INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Sergio', 'Barrero', 1, '3212290107', 'sbarrerof@unbosque.edu.co', 'sbarrerof', 'sergio1234');
INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Daniela', 'Pico', 1, '3166190924', 'dpico@unbosque.edu.co', 'dpico', 'dpico1234');

INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Pozo');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Jagüey');
INSERT INTO wintig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Reservorio');

INSERT INTO wintig.departamento (nom_departamento) VALUES ('Guajira');  

INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Manaure', 1);  
INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Maicao', 1); 
 
INSERT INTO wintig.capacidad (capacidad_fuente) VALUES (5000);  
INSERT INTO wintig.calidad (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph, nitrogeno, fosforo ) VALUES (11,12,13,14,15,16,17);
INSERT INTO wintig.accesibilidad (poblacion_acceso_agua_limpia, poblacion_acceso_sanidad, poblacion_acceso_agua_per_capita, uso_fuente_hidrica) VALUES (15, 25, 30, 'Aseo');   
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'rancheria-test1', 14, 'Martina', -72794138888, 105058056);

INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, latitud_fh, longitud_fh) VALUES (1, -72794138888, 105058056);