create schema if not exists winsig;

  create table if not exists winsig.tipo_de_usuario (
    id_tipo_de_usuario serial primary key not null, 
    tipo_de_usuario varchar(45) not null);

  create table if not exists winsig.tipo_fuente_hidrica (
   id_tipo_fuente_hidrica serial primary key not null, 
   nom_tipo_fuente_hidrica varchar(45) not null);

  create table if not exists winsig.capacidad (
   id_capacidad serial primary key not null, 
   capacidad_fuente varchar(45) not null);

  create table if not exists winsig.departamento (
   id_departamento serial primary key not null, 
   nom_departamento varchar(45) not null);

  create table if not exists winsig.municipio (
   id_municipio serial primary key not null, 
   nom_municipio varchar(45) not null,
   id_departamento integer not null);

  create table if not exists winsig.ubicacion (
   id_ubicacion serial primary key not null, 
   geom GEOMETRY(point, 26913),
   id_municipio integer);

  create table if not exists winsig.calidad (
    id_calidad serial primary key not null,
    oxigeno_disuelto integer(45) not null,
    solidos_suspendidos integer(45) not null,
    demanda_quimica_oxigeno integer(45) not null,
    conductividad_electrica integer(45) not null,
    ph integer(45) not null,
    nitrogeno integer(45) not null,
    fosforo integer(45) not null);

  create table if not exists winsig.accesibilidad (
    id_accesibilidad serial primary key not null,
    poblacion_acceso_agua_limpia integer(45) not null,
    poblacion_acceso_sanidad integer(45) not null,
    poblacion_acceso_agua_per_capita integer(45) not null,
    uso_fuente_hidrica varchar(45) not null);

  create table if not exists winsig.comunidad (
    id_comunidad serial primary key not null,
    nom_comunidad varchar(45) not null,
    cantidad_personas integer(45) not null,
    representante varchar(45) not null);

  create table if not exists winsig.fuente_hidrica (
    id_fuente_hidrica serial primary key,
    id_tipo_fuente_hidrica integer not null,
    id_capacidad serial not null,
    id_ubicacion serial not null,
    id_calidad serial not null,
    id_accesibilidad serial not null,
    id_comunidad serial not null);

  create table if not exists winsig.usuario (
    id_usuario serial primary key not null,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    id_tipo_de_usuario integer not null,
    tel_usuario varchar(45) not null,
    correo_usuario varchar(45) not null,
    nom_usuario varchar(45) not null,
    password varchar(45) not null);

  alter table winsig.municipio add constraint municipio_departamento_fk foreign key (id_departamento) references winsig.departamento (id_departamento);
  alter table winsig.ubicacion add constraint ubicacion_municipio_fk foreign key (id_municipio) references winsig.municipio (id_municipio);

  alter table winsig.fuente_hidrica add constraint fuente_hidrica_tipo_fuente_hidrica_fk foreign key (id_tipo_fuente_hidrica) references winsig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_capacidad_fk foreign key (id_capacidad) references winsig.capacidad (id_capacidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_ubicacion_fk foreign key (id_ubicacion) references winsig.ubicacion (id_ubicacion);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_calidad_fk foreign key (id_calidad) references winsig.calidad (id_calidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_accesibilidad_fk foreign key (id_accesibilidad) references winsig.accesibilidad (id_accesibilidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_comunidad_fk foreign key (id_comunidad) references winsig.comunidad (id_comunidad);

  alter table winsig.usuario add constraint usuario_tipo_de_usuario_fk foreign key (id_tipo_de_usuario) references winsig.tipo_de_usuario (id_tipo_de_usuario);


  INSERT INTO winsig.tipo_de_usuario (tipo_de_usuario) values ('Administrador');
  INSERT INTO winsig.tipo_de_usuario (tipo_de_usuario) values ('Recolector');

  INSERT INTO winsig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Ramiro', 'Briceño', 1, '3208809703', 'rbricenoq@unbosque.edu.co', 'rbricenoq', 'ramiro1234');  
  INSERT INTO winsig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Sergio', 'Barrero', 1, '3212290107', 'sbarrerof@unbosque.edu.co', 'sbarrerof', 'sergio1234');
  INSERT INTO winsig.usuario (nombre, apellido, id_tipo_de_usuario, tel_usuario, correo_usuario, nom_usuario, password) VALUES ('Daniela', 'Pico', 1, '3166190924', 'dpico@unbosque.edu.co', 'dpico', 'dpico1234');

  INSERT INTO winsig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Pozo');
  INSERT INTO winsig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Jagüey');
  INSERT INTO winsig.tipo_fuente_hidrica (nom_tipo_fuente_hidrica) values ('Reservorio');

  INSERT INTO winsig.departamento (nom_departamento) VALUES ('Guajira');  

  INSERT INTO winsig.municipio (nom_municipio, id_departamento) VALUES ('Manaure', 1);  
  INSERT INTO winsig.municipio (nom_municipio, id_departamento) VALUES ('Maicao', 1);  

  INSERT INTO winsig.capacidad (capacidad_fuente) VALUES (5000);  
  INSERT INTO winsig.ubicacion (id_municipio, geom) VALUES (1, ST_Geom_FromText('POINT(-72794138888 105058056)',4326));
  INSERT INTO winsig.calidad (oxigeno_disuelto, solidos_suspendidos, demanda_quimica_oxigeno, conductividad_electrica, ph, nitrogeno, fosforo ) VALUES (11,12,13,14,15,16,17);
  INSERT INTO winsig.accesibilidad (poblacion_acceso_agua_limpia, poblacion_acceso_sanidad, poblacion_acceso_agua_per_capita, uso_fuente_hidrica) VALUES (15, 25, 30, 'Aseo');   
  INSERT INTO winsig.comunidad (nom_comunidad, cantidad_personas, representante) VALUES ('comunidad-test1', 14, 'Martina');

  INSERT INSERT winsig.fuente_hidrica (id_tipo_fuente_hidrica) VALUES (1);





