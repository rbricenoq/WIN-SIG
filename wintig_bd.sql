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
-- Table wintig.ica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.ica (
  id_ica serial primary key not null,
  oxigeno_disuelto integer not null,
  solidos_suspendidos integer not null,
  demanda_quimica_oxigeno integer not null,
  conductividad_electrica integer not null,
  ph_ica integer not null,
  nitrogeno_ica integer not null,
  fosforo_ica integer not null,
  calculo_ica float not null,
  estado_ica varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.accesibilidad
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.accesibilidad (
  id_accesibilidad serial primary key not null,
  id_tipo_acceso integer not null,
  num_dias_buscar_agua integer not null,
  num_viajes integer not null,
  cantidad_agua float not null,
  timepo_viaje time not null,
  distancia float not null,
  poblacion_acceso integer not null);

-- -----------------------------------------------------
-- Table wintig.tipo_acceso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_acceso (
 id_tipo_acceso serial primary key not null, 
 nom_tipo_acceso varchar(45) not null);

-- -----------------------------------------------------
-- Table wintig.uso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.uso (
  id_uso serial primary key not null,
  id_tipo_uso integer not null);

-- -----------------------------------------------------
-- Table wintig.tipo_uso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.tipo_uso (
 id_tipo_uso serial primary key not null, 
 nom_tipo_uso varchar(45) not null);

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
  latitud_r float NOT NULL,
  longitud_r float NOT NULL);

-- -----------------------------------------------------
-- Table wintig.fuente_hidrica
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS wintig.fuente_hidrica (
  id_fuente_hidrica serial primary key,
  id_tipo_fuente_hidrica integer not null,
  id_accesibilidad serial not null,
  id_uso serial not null,
  id_ica serial not null,
  id_irca serial not null,
  id_rancheria serial not null,
  nom_fh varchar(45) not null,
  latitud_fh float NOT NULL,
  longitud_fh float NOT NULL);

-- -----------------------------------------------------
-- Foreign Keys
-- -----------------------------------------------------

alter table wintig.municipio add constraint municipio_departamento_fk foreign key (id_departamento) references wintig.departamento (id_departamento);

alter table wintig.usuario add constraint usuario_tipo_de_usuario_fk foreign key (id_tipo_de_usuario) references wintig.tipo_de_usuario (id_tipo_de_usuario);

alter table wintig.accesibilidad add constraint accesibilidad_tipo_acceso_fk foreign key (id_tipo_acceso) references wintig.tipo_acceso (id_tipo_acceso);

alter table wintig.uso add constraint uso_tipo_uso_fk foreign key (id_tipo_uso) references wintig.tipo_uso (id_tipo_uso);

alter table wintig.rancheria add constraint rancheria_municipio_fk foreign key (id_municipio) references wintig.municipio (id_municipio);

alter table wintig.fuente_hidrica add constraint fuente_hidrica_tipo_fuente_hidrica_fk foreign key (id_tipo_fuente_hidrica) references wintig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_ica_fk foreign key (id_ica) references wintig.ica (id_ica);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_irca_fk foreign key (id_irca) references wintig.irca (id_irca);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_accesibilidad_fk foreign key (id_accesibilidad) references wintig.accesibilidad (id_accesibilidad);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_uso_fk foreign key (id_uso) references wintig.uso (id_uso);
alter table wintig.fuente_hidrica add constraint fuente_hidrica_rancheria_fk foreign key (id_rancheria) references wintig.rancheria (id_rancheria);

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

INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) values ('En la rancheria');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) values ('En el terreno');
INSERT INTO wintig.tipo_acceso (nom_tipo_acceso) values ('Fuera del terreno');

INSERT INTO wintig.tipo_uso (nom_tipo_uso) values ('Domestico');
INSERT INTO wintig.tipo_uso (nom_tipo_uso) values ('Economico');
INSERT INTO wintig.tipo_uso (nom_tipo_uso) values ('Agropecuario');

INSERT INTO wintig.departamento (nom_departamento) VALUES ('Guajira');  

INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Manaure', 1);  
INSERT INTO wintig.municipio (nom_municipio, id_departamento) VALUES ('Maicao', 1); 
 
INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (11,12,13,14,15,16,17, 181 'malo');

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, timepo_viaje, distancia, poblacion_acceso) VALUES (1, 2, 3, 4, '02:00', 6, 7);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);   


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
