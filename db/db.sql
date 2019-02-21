use basedatos;

CREATE TABLE productos(
    producto_id int(11) auto_increment,
    codigo      char(8),
    nombre      varchar(32),
    stock       decimal(10,3),
    precio      decimal(10,3),
    CONSTRAINT pk_pkproductos PRIMARY KEY (producto_id)
)Engine=InnoDB;