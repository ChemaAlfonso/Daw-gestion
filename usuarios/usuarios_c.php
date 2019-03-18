<?php
require_once('../config/constantes.inc.php');
require_once('../usuarios/cusuariosbd.php');
require_once('../biblioteca/ccrypt.php');

$option     = FILTER_INPUT(INPUT_GET, 'opt');
$usuario_id = FILTER_INPUT(INPUT_GET, 'id');

$usr = new CUsuariosBD;

if ($option == BORRAR)
{
    $usr->Borrar($usuario_id);
}
else
{
    $usr->usuario_id = $usuario_id;
    $usr->usuario    = FILTER_INPUT(INPUT_POST, 'usuario');
    $usr->contrasena = FILTER_INPUT(INPUT_POST, 'contrasena');
    $usr->nombre     = FILTER_INPUT(INPUT_POST, 'nombre');
    $usr->email      = FILTER_INPUT(INPUT_POST, 'email');
    
    $crypt = new CCrypt;
    
    $usr->contrasena = $crypt->Encriptar($usr->contrasena);
    
    if ($option == INSERTAR)
    {
        $usr->Insertar();
    }
    elseif ($option == MODIFICAR)
    {
        $usr->Modificar();
    }
    
}

header('location: ../index.php?route=U');

?>