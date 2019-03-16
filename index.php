<?php
session_start();

require_once('biblioteca/biblioteca.inc.php');

if (isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'];
} else {
    $usuario = null;
}

/* Seteo de la cookie de sesion si se requiere */
if (isset($usuario) && isset($_SESSION['recordar'])){
     
    if ($_SESSION['recordar'] === true){

        setcookie("userLogin",$usuario, $_SESSION['logstart']+604800);

    } elseif ($_SESSION['recordar'] === false)  {

        setcookie("userLogin",$usuario, $_SESSION['logstart']-604800);
        unset($_COOKIE['userLogin']);

    }
    
    unset($_SESSION['recordar']);
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="autor" content="Chema Alfonso" >
    <meta charset="UTF-8">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    <!-- Font-awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- estilos -->
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
        
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    
    <title>Gestión SGPDO</title>
</head>
<body>
<?php

if (!empty($usuario) && isset($_SESSION['contador']) && $_SESSION['contador'] < 1){
    echo "<script>swal('Bienvenido $usuario!','Me alegra verte por aquí!', 'success')</script>";
    $_SESSION['contador']++;
}

?>

<!-- Main Header -->
<header class="container-fluid">
    <div class="row">
        <div class="col-12">
        
            <div class="jumbotron text-center bg-primary text-white mb-5">
                <div class="row">
                    <div class="col-12">
                        <a id="mainTitle" href="index.php"><h1><i class="fas fa-strikethrough display-4"></i>GPDO - Sistema de Gestión con PDO</h1></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-right">
                        <a class="text-white pt-4 d-block" target="_blank" href="https://github.com/ChemaAlfonso/Daw-gestion.git">Por: Chema Alfonso</a>    
                    </div>
                </div>
            </div> 

        </div>
    </div>
</header>

<!-- Panel bienvenida -->
<div class="container-fluid">
    <div class="row">

        <div class="col-3 offset-9 text-center">
            <?= !empty($usuario) ?  "Bienvenido <span class='text-primary'>".$usuario."</span>" : "Bienvenido <span class='text-primary'>Desconocido</span>" ;?>
        </div>

        <div class="col-3 offset-9 text-center">
            <a href="login/logout.php" class="text-white d-block mt-3"> <?= !empty($usuario) ?  "<span class=' btn btn-danger'>Cerrar sesión</span>" : '' ;?> </a>
        </div>

    </div>
</div>

<?php

//Controlador frontal

if (empty($usuario) && empty($_GET['reg']))
{
    require_once "login/login.php";
}
elseif (!empty($_GET['reg']))
{
    require_once "login/register.php";
}
elseif (isset($_GET['P']))
{
    require_once "productos/productos.php";
}
elseif (isset($_GET['U']))
{
    require_once "usuarios/usuarios.php";
}
elseif (isset($_GET['C']))
{
    require_once "clientes/clientes.php";
}
elseif (isset($_GET['PROV']))
{
    require_once "proveedores/proveedores.php";
}
else {
    require_once "main.php";
}
    


//Info de errores
$sessionError = !empty($_SESSION['error']) ? filter_var($_SESSION['error'], FILTER_SANITIZE_STRING) : '';

if ($sessionError){
    echo "<script>swal('Ups...','Error, $sessionError', 'error')</script>";
    $_SESSION['error'] = null;

}
?>

    <!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
    <!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    

    <!-- Main Scripts -->
<script src="assets/js/mainScripts.js"></script>

</body>
</html>

