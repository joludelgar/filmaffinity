drop table if exists peliculas cascade;

create table peliculas (
    id       bigserial   constraint pk_peliculas primary key,
    titulo   varchar(80) not null,
    sinopsis text        not null,
    duracion numeric(3)  not null,
    anio     numeric(4)  not null
);

drop table if exists etiquetas cascade;

create table etiquetas (
    id       bigserial   constraint pk_etiquetas primary key,
    nombre   varchar(80) not null
);

drop table if exists etiquetas_peliculas cascade;

create table etiquetas_peliculas (
    id          bigserial    constraint pk_etiquetas_peliculas primary key,
    etiqueta_id bigint       not null constraint fk_etiquetas_peliculas_etiquetas
                             references etiquetas (id)
                             on delete no action on update cascade,
    pelicula_id bigint       not null constraint fk_etiquetas_peliculas_peliculas
                             references peliculas (id)
                             on delete no action on update cascade,
    constraint uq_etiquetas_peliculas unique (etiqueta_id, pelicula_id)
);

drop table if exists usuarios cascade;

create table usuarios (
    id       bigserial   constraint pk_usuarios primary key,
    nombre   varchar(15) not null constraint uq_usuarios_nombre unique,
    email    varchar(60) not null constraint uq_usuarios_email unique,
    password varchar(60) not null,
    token    varchar(32),
    -- activacion varchar(32),
    created_at timestamptz  default current_timestamp
);

-- create index idx_usuarios_activacion on usuarios (activacion);
create index idx_usuarios_created_at on usuarios (created_at);
