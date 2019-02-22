<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras by Chema Alfonso" />
    <meta charset="utf-8" />
    
	<title>Mantenimiento clientes</title>
</head>

<?php

require_once('../config/constantes.inc.php');

$option     = filter_input(INPUT_GET, 'opt');
$cliente_id = filter_input(INPUT_GET, 'id'); 

$nombre    = '';
$cif    = '';
$direccion    = '';
$poblacion    = '';
$provincia    = '';
$cp    = '';
$telefono    = '';
$email    = '';

// Si estamos modificando
if ($option == MODIFICAR)
{
    require_once('../clientes/cclientesbd.php');
    
    $cli   = new CClientesBD;
    if ($cli->Cliente($cliente_id))
    {
        $nombre     = $cli->nombre;
        $cif        = $cli->cif;
        $direccion  = $cli->direccion;
        $poblacion  = $cli->poblacion;
        $provincia  = $cli->provincia;
        $cp         = $cli->cp;
        $telefono   = $cli->telefono;
        $email      = $cli->email;
    } 
}

?>

<body>
<form action="clientes_c.php?id=<?php echo $cliente_id; ?>&opt=<?php echo $option; ?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
    <br />
    <label for="cif">cif</label>
    <input type="text" name="cif" value="<?php echo $cif; ?>" />
    <br />
    <label for="direccion">direccion</label>
    <input type="text" name="direccion" value="<?php echo $direccion; ?>" />
    <br />
    <label for="poblacion">poblacion</label>
    <input type="text" name="poblacion" value="<?php echo $poblacion; ?>" />
    <br />
    <label for="provincia">provincia</label>
    <input type="text" name="provincia" value="<?php echo $provincia; ?>" />
    <br />
    <label for="cp">cp</label>
    <input type="text" name="cp" value="<?php echo $cp; ?>" />
    <br />
    <label for="telefono">telefono</label>
    <input type="text" name="telefono" value="<?php echo $telefono; ?>" />
    <br />
    <label for="email">email</label>
    <input type="email" name="email" value="<?php echo $email; ?>" />
    <br />
    <input type="submit" value="Aceptar" />
    
    <input type="button" 
           value="Cancelar" 
           onclick="location.href='clientes.php'" />
            
</form>

</body>
</html>