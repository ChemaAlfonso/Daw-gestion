<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="Javier Miras" />
    <meta name="author" content="Chema Alfonso" />
    <meta charset="utf-8" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
         
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
    <div class="container jumbotron mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-right text-primary mb-3">Usuario</h1>
                <form action="usuarios_c.php?id=<?php echo $usuario_id; ?>&opt=<?php echo $option; ?>" method="post">

                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" value="<?php echo $usuario; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" value="<?php echo $contrasena; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>

                    <input class="btn btn-success" role="button"  type="submit" value="Aceptar" />
                    
                    <input type="button"
                        class="btn btn-danger"  
                        value="Cancelar" 
                        onclick="location.href='usuarios.php'" />
                            
                </form>
                
            <div class="row">
                <div class="col-2 offset-5 text-center mt-5 py-3  bg-primary rounded">
                    <a class="text-white" href="../index.php?C=true">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>