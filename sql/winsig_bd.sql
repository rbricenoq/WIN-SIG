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
   latitud varchar(45) not null,
   longitud varchar(45) not null,
   id_municipio integer);

  create table if not exists winsig.calidad (
    id_calidad serial primary key not null,
    oxigeno_disuelto varchar(45) not null,
    solidos_suspendidos varchar(45) not null,
    demanda_quimica_oxigeno varchar(45) not null,
    conductividad_electrica varchar(45) not null,
    ph varchar(45) not null,
    nitrogeno varchar(45) not null,
    fosforo varchar(45) not null);

  create table if not exists winsig.accesibilidad (
    id_accesibilidad serial primary key not null,
    poblacion_acceso_agua_limpia varchar(45) not null,
    poblacion_acceso_sanidad varchar(45) not null,
    poblacion_acceso_agua_per_capita varchar(45) not null,
    uso_fuente_hidrica varchar(45) not null);

  create table if not exists winsig.comunidad (
    id_comunidad serial primary key not null,
    nom_comunidad varchar(45) not null,
    cantidad_personas varchar(45) not null,
    representante varchar(45) not null);

  create table if not exists winsig.fuente_hidrica (
    id_fuente_hidrica serial primary key,
    id_tipo_fuente_hidrica integer not null,
    id_capacidad integer not null,
    id_ubicacion integer not null,
    id_calidad integer not null,
    id_accesibilidad integer not null,
    id_comunidad integer not null);

  create table if not exists winsig.usuario (
    id_usuario serial primary key not null,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    id_tipo_de_usuario integer not null,
    tel_usuario varchar(45) not null,
    correo_usuario varchar(45) not null,
    nom_usuario varchar(45) not null,
    password varchar(45) not null,
    id_fuente_hidrica integer not null);

  alter table winsig.municipio add constraint municipio_departamento_fk foreign key (id_departamento) references winsig.departamento (id_departamento);
  alter table winsig.ubicacion add constraint ubicacion_municipio_fk foreign key (id_municipio) references winsig.municipio (id_municipio);

  alter table winsig.fuente_hidrica add constraint fuente_hidrica_tipo_fuente_hidrica_fk foreign key (id_tipo_fuente_hidrica) references winsig.tipo_fuente_hidrica (id_tipo_fuente_hidrica);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_capacidad_fk foreign key (id_capacidad) references winsig.capacidad (id_capacidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_ubicacion_fk foreign key (id_ubicacion) references winsig.ubicacion (id_ubicacion);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_calidad_fk foreign key (id_calidad) references winsig.calidad (id_calidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_accesibilidad_fk foreign key (id_accesibilidad) references winsig.accesibilidad (id_accesibilidad);
  alter table winsig.fuente_hidrica add constraint fuente_hidrica_comunidad_fk foreign key (id_comunidad) references winsig.comunidad (id_comunidad);

  alter table winsig.usuario add constraint usuario_tipo_de_usuario_fk foreign key (id_tipo_de_usuario) references winsig.tipo_de_usuario (id_tipo_de_usuario);
  --alter table winsig.usuario add constraint usuario_fuente_hidrica_fk foreign key (id_fuente_hidrica) references winsig.fuente_hidrica (id_fuente_hidrica);
