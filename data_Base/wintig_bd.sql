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
  oxigeno_disuelto float,
  solidos_suspendidos float,
  demanda_quimica_oxigeno float,
  conductividad_electrica float,
  ph_ica float,
  nitrogeno_ica float,
  fosforo_ica float,
  calculo_ica float,
  estado_ica varchar(45));

-- -----------------------------------------------------
-- Table wintig.irca
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS wintig.irca (
  id_irca serial primary key not null,
  color_aparente float,
  olor varchar(45),
  sabor varchar(45),
  turbiedad float,
  conductividad float,
  ph_irca float,
  antimonio float,
  arsenico float,
  bario float,
  cadmio float,
  cianuro_libre_disociable float,
  cobre float,
  cromo float,
  mercurio float,
  niquel float,
  plomo float,
  selenio float,
  trihalometanos float,
  hap float,
  cot float,
  nitritos float,
  nitratos float,
  fluoruros float,
  calcio float,
  alcalinidad float,
  cloruros float,
  aluminio float,
  dureza float,
  hierro float,
  magnesio float,
  manganeso float,
  molibdeno float,
  sulfatos float,
  zinc float,
  fosfatos float,
  cmt float,
  plaguicidas float,
  escherichia_coli varchar(45),
  coliformes varchar(45),
  microorganismos_mesofilicos float,
  giardia float,
  cryptosporidium float,
  detergente float,
  coagulante_sales_hierro float,
  coagulante_aluminio float,
  calculo_irca float,
  estado_irca varchar(45));

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
  id_ica serial,
  id_irca serial,
  id_rancheria integer,
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
INSERT INTO wintig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Recolector', 'Recolector', 2, '3125218427', 'Recolector@unbosque.edu.co', 'reco', 'reco1234');


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

INSERT INTO wintig.ica (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph_ica, nitrogeno_ica, fosforo_ica, calculo_ica, estado_ica) VALUES (5,6,10,20,7,9,300, 300, 'Regular');
INSERT INTO wintig.irca (color_aparente, olor,sabor, turbiedad, conductividad, ph_irca, antimonio, 
  arsenico, bario, cadmio, cianuro_libre_disociable, cobre, cromo, mercurio, niquel, plomo, selenio,
  trihalometanos, hap, cot, nitritos, nitratos, fluoruros, calcio, alcalinidad, cloruros, aluminio,
  dureza, hierro, magnesio, manganeso, molibdeno, sulfatos, zinc, fosfatos, cmt, 
  plaguicidas, escherichia_coli, coliformes, microorganismos_mesofilicos, giardia, cryptosporidium,
  detergente, coagulante_sales_hierro, coagulante_aluminio, calculo_irca, estado_irca) VALUES (1,'Aceptable','No Aceptable',4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,'Presencia en 100cm3','Ausencia en 100cm3',40,41,42,43,44,45,46,'Sin Riesgo');

INSERT INTO wintig.accesibilidad (id_tipo_acceso, num_dias_buscar_agua, num_viajes, cantidad_agua, timepo_viaje, distancia, poblacion_acceso) VALUES (1, 2, 3, 4, '02:00', 6, 7);  
INSERT INTO wintig.uso (id_tipo_uso) VALUES (2);   

INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Aremashain', 20, 'Martina', 11.7650790499241, -72.4589270353317);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Guaymaral', 15, 'Pedro', 11.7756873227519, -72.4290955066681);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Pushaina', 35, 'Andrea', 11.77, -72.4290955066681);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Arpushana', 41, 'Federico', 11.74105378, -72.46052468);
INSERT INTO wintig.rancheria (id_municipio, nom_rancheria, cantidad_personas, representante, latitud_r, longitud_r) VALUES (1, 'Warpushana', 62, 'Natalia', 11.75034567, -72.46976543);

INSERT INTO wintig.fuente_hidrica (id_tipo_fuente_hidrica, id_rancheria, nom_fh, latitud_fh, longitud_fh) VALUES (1, 1, 'Aremashain', 11.7650790499241, -72.4589270353317);



