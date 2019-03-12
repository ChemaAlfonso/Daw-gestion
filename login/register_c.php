<?php
session_start();

require_once('cRegister.php');

$usuario    = FILTER_INPUT(INPUT_POST, 'usuario');
$contrasena = FILTER_INPUT(INPUT_POST, 'contrasena');
$nombre     = FILTER_INPUT(INPUT_POST, 'nombre');
$email      = FILTER_INPUT(INPUT_POST, 'email');


$register = new CRegister($usuario, $contrasena, $nombre, $email);

if ($register->Register()){

    //Login automatico tras registro

    require_once('clogin.php');

    $login = new CLogin($usuario, $contrasena);

    if ($login->Logueado())
    {
        $_SESSION['logedin']  = true;
        $_SESSION['logstart'] = time();
        $_SESSION['usuario']  = $usuario;
        
        header('location:../index.php');
        die();
    }
    else 
    {
        $_SESSION['error'] = 'No se ha podido iniciar sesión intentelo de nuevo...';

        header('location:../index.php');        
    }
};

header('location:../index.php?reg=true');

?>