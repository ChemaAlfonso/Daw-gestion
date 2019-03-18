<?php

session_start();

require_once('biblioteca/biblioteca.inc.php');

/************************************
 Comprobacion de acceso de usuario
************************************/

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

/*******************************
             Head
*******************************/

require_once 'shared/head.php';

//Alerta de bienvenida
if (!empty($usuario) && isset($_SESSION['contador']) && $_SESSION['contador'] < 1){
    echo "<script>swal('Bienvenido $usuario!','Me alegra verte por aquí!', 'success')</script>";
    $_SESSION['contador']++;
}

/*******************************
            Header
*******************************/

require_once 'shared/header.php';

//Panel de bienvenida
require_once 'shared/bienvenida.php';



/*******************************
     Controlador frontal
*******************************/


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
    


/*******************************
        Info de errores
*******************************/

$sessionError = !empty($_SESSION['error']) ? filter_var($_SESSION['error'], FILTER_SANITIZE_STRING) : '';

if ($sessionError){
    echo "<script>swal('Ups...','Error, $sessionError', 'error')</script>";
    $_SESSION['error'] = null;

}


/*******************************
            footer
*******************************/

require_once 'shared/footer.php';

