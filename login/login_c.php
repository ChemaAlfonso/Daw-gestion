<?php
session_start();

require_once('clogin.php');

$usuario    = FILTER_INPUT(INPUT_POST, 'usuario');
$contrasena = FILTER_INPUT(INPUT_POST, 'contrasena');
$recordar   = (bool)FILTER_INPUT(INPUT_POST, 'recordar');


$login = new CLogin($usuario, $contrasena);

if ($login->Logueado())
{   
    $_SESSION['logedin']  = true;
    $_SESSION['logstart'] = time();
    $_SESSION['usuario']  = $usuario;

    if ($recordar){
        $_SESSION['recordar'] = true;
    } else {
        $_SESSION['recordar'] = false;
    }

    $_SESSION['contador'] = 0;
    
    

    header('location:../index.php');
    die();
}

$_SESSION['error'] = 'Datos de inicio de sesión incorrectos';

header('location:../index.php');

?>