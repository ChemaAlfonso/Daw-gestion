<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras" />
    <meta charset="utf-8" />
    
	<title>Mantenimiento usuario</title>
</head>

<?php

require_once('../config/constantes.inc.php');

$option     = filter_input(INPUT_GET, 'opt');
$usuario_id = filter_input(INPUT_GET, 'id'); 

$usuario    = '';
$contrasena = '';
$nombre     = '';
$email      = '';

// Si estamos modificando
if ($option == MODIFICAR)
{
    require_once('../usuarios/cusuariosbd.php');
    require_once('../biblioteca/ccrypt.php');
    
    $usr   = new CUsuariosBD;
    
    if ($usr->Usuario($usuario_id))
    {
        $crypt = new CCrypt;
        
        $usuario    = $usr->usuario; 
        $contrasena = $crypt->Desencriptar($usr->contrasena); 
        $nombre     = $usr->nombre; 
        $email      = $usr->email;
    } 
}

?>

<body>
<form action="usuarios_c.php?id=<?php echo $usuario_id; ?>&opt=<?php echo $option; ?>" method="post">
    <label for="usuario">Usuario</label>
    <input type="text" name="usuario" value="<?php echo $usuario; ?>" />
    <br />
    <label for="contrasena">Contraseña</label>
    <input type="password" name="contrasena" value="<?php echo $contrasena; ?>" />
    <br />
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
    <br />
    <label for="email">Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>" />
    <br />
    <input type="submit" value="Aceptar" />
    
    <input type="button" 
           value="Cancelar" 
           onclick="location.href='usuarios.php'" />
            
</form>

</body>
</html>