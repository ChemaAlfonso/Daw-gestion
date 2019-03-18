DROP DATABASE IF EXISTS basedatos;
CREATE DATABASE IF NOT EXISTS basedatos;

use basedatos;

/**************************
      Tabla usuarios 
**************************/

DROP TABLE IF EXISTS usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
    usuario_id      int(10) auto_increment,
    usuario         varchar(50),
    contrasena      varchar(255),
    nombre          varchar(125),
    email           varchar(150) UNIQUE,
    CONSTRAINT pk_pkusuarios PRIMARY KEY (usuario_id)
)Engine=InnoDB DEFAULT CHARSET=latin1;

/**************************
      Tabla proveedores 
**************************/

DROP TABLE IF EXISTS proveedores;
CREATE TABLE IF NOT EXISTS proveedores(
proveedor_id int(11) auto_increment,
nombre      varchar(32),
cif         char(9) UNIQUE,
direccion   varchar(32),
poblacion   varchar(32),
provincia   varchar(32),
cp          char(5),
telefono    char(11),
email       varchar(64) UNIQUE,
CONSTRAINT pk_proveedores PRIMARY KEY (proveedor_id)
)Engine=InnoDB DEFAULT CHARSET=latin1;


/* Inserts de proveedores */
INSERT INTO `proveedores` (`proveedor_id`, `nombre`, `cif`, `direccion`, `poblacion`, `provincia`, `cp`, `telefono`, `email`) VALUES 
    (NULL, 'Proveedor mayorista', '12345678Q', 'Calle al por mayor 23', 'Mostoles', 'Madrid', '28935', '654987987', 'mayorista@alpormayor.com');

INSERT INTO `proveedores` (`proveedor_id`, `nombre`, `cif`, `direccion`, `poblacion`, `provincia`, `cp`, `telefono`, `email`) VALUES 
    (NULL, 'Proveedor minorista', '23541232Q', 'Calle al por menor 23', 'Mostoles', 'Madrid', '28935', '654987987', 'minorista@alpormenor.com');

INSERT INTO `proveedores` (`proveedor_id`, `nombre`, `cif`, `direccion`, `poblacion`, `provincia`, `cp`, `telefono`, `email`) VALUES 
    (NULL, 'Proveedor especial', '75841232Q', 'Calle especial 8', 'Mostoles', 'Madrid', '28935', '654117987', 'especial@especial.com');



/**************************
      Tabla productos 
**************************/

DROP TABLE IF EXISTS productos;
CREATE TABLE IF NOT EXISTS productos(
    producto_id int(11) auto_increment,
    proveedor_id int(11),
    codigo      char(8),
    nombre      varchar(32),
    stock       decimal(10,3),
    precio      decimal(10,3),
    CONSTRAINT pk_pkproductos PRIMARY KEY (producto_id),
    CONSTRAINT fk_productos_proveedores FOREIGN KEY (proveedor_id) REFERENCES proveedores(proveedor_id) ON DELETE CASCADE ON UPDATE CASCADE
)Engine=InnoDB DEFAULT CHARSET=latin1;



/* Inserts de productos */
INSERT INTO `productos` (`producto_id`, `proveedor_id`, `codigo`, `nombre`, `stock`, `precio`) VALUES 
(NULL, '1', '1', 'Zapatos negros', '200', '23.99'),
(NULL, '2', '1', 'Gorro verde', '300', '12.99'),
(NULL, '2', '2', 'Camiseta Azul', '100', '19.99');


/**************************
      Tabla clientes 
**************************/

DROP TABLE IF EXISTS clientes;
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
)Engine=InnoDB DEFAULT CHARSET=latin1;


/* Inserts de clientes */
INSERT INTO `clientes` (`cliente_id`, `nombre`, `cif`, `direccion`, `poblacion`, `provincia`, `cp`, `telefono`, `email`) VALUES 
(NULL, 'Un buen cliente', '12245678Q', 'Calle la mejor 18', 'Málaga', 'Málaga', '29014', '789456123', 'buencliente@gmail.com'), 
(NULL, 'El mejor cliente', '54345678Q', 'Calle la otra 26', 'Málaga', 'Málaga', '29014', '789456523', 'mejorcliente@gmail.com');


/**************************
     Tabla provincias 
**************************/

DROP TABLE IF EXISTS provincias;
CREATE TABLE IF NOT EXISTS `provincias` (
  `id_provincia` smallint(6) DEFAULT NULL,
  `provincia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


/* Inserts de provincias */
INSERT INTO `provincias` (`id_provincia`, `provincia`)
VALUES
	(2,'Albacete'),
	(3,'Alicante/Alacant'),
	(4,'Almería'),
	(1,'Araba/Álava'),
	(33,'Asturias'),
	(5,'Ávila'),
	(6,'Badajoz'),
	(7,'Balears, Illes'),
	(8,'Barcelona'),
	(48,'Bizkaia'),
	(9,'Burgos'),
	(10,'Cáceres'),
	(11,'Cádiz'),
	(39,'Cantabria'),
	(12,'Castellón/Castelló'),
	(51,'Ceuta'),
	(13,'Ciudad Real'),
	(14,'Córdoba'),
	(15,'Coruña, A'),
	(16,'Cuenca'),
	(20,'Gipuzkoa'),
	(17,'Girona'),
	(18,'Granada'),
	(19,'Guadalajara'),
	(21,'Huelva'),
	(22,'Huesca'),
	(23,'Jaén'),
	(24,'León'),
	(27,'Lugo'),
	(25,'Lleida'),
	(28,'Madrid'),
	(29,'Málaga'),
	(52,'Melilla'),
	(30,'Murcia'),
	(31,'Navarra'),
	(32,'Ourense'),
	(34,'Palencia'),
	(35,'Palmas, Las'),
	(36,'Pontevedra'),
	(26,'Rioja, La'),
	(37,'Salamanca'),
	(38,'Santa Cruz de Tenerife'),
	(40,'Segovia'),
	(41,'Sevilla'),
	(42,'Soria'),
	(43,'Tarragona'),
	(44,'Teruel'),
	(45,'Toledo'),
	(46,'Valencia/València'),
	(47,'Valladolid'),
	(49,'Zamora'),
	(50,'Zaragoza');