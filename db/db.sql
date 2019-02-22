CREATE DATABASE IF NOT EXISTS basedatos;

use basedatos;


/* Tabla usuarios */
CREATE TABLE IF NOT EXISTS usuarios(
    usuario_id      int(10) auto_increment,
    usuario         varchar(50),
    contrasena      varchar(255),
    nombre          varchar(125),
    email           varchar(150),
    CONSTRAINT pk_pkusuarios PRIMARY KEY (usuario_id)
)Engine=InnoDB;


/* Tabla productos */
CREATE TABLE IF NOT EXISTS productos(
    producto_id int(11) auto_increment,
    codigo      char(8),
    nombre      varchar(32),
    stock       decimal(10,3),
    precio      decimal(10,3),
    CONSTRAINT pk_pkproductos PRIMARY KEY (producto_id)
)Engine=InnoDB;


/* Tabla clientes */
CREATE TABLE IF NOT EXISTS clientes(
    cliente_id  int(11) auto_increment,
    nombre      varchar(32),
    cif         char(9) UNIQUE,
    direccion   varchar(32),
    poblacion   varchar(32),
    provincia   varchar(32),
    cp          char(5),
    telefono    char(11),
    email       varchar(64) UNIQUE,
    CONSTRAINT pk_pkclientes PRIMARY KEY (cliente_id)
)Engine=InnoDB;

