<?php
require_once('../config/constantes.inc.php');
require_once('../clientes/cclientesbd.php');

$option     = FILTER_INPUT(INPUT_GET, 'opt');
$cliente_id = FILTER_INPUT(INPUT_GET, 'id');

$cli = new CClientesBD;

if ($option == BORRAR)
{
    $cli->Borrar($cliente_id);
}
else
{
    $cli->cliente_id     = $cliente_id;
    $cli->nombre         = FILTER_INPUT(INPUT_POST, 'nombre');
    $cli->cif            = FILTER_INPUT(INPUT_POST, 'cif');
    $cli->direccion      = FILTER_INPUT(INPUT_POST, 'direccion');
    $cli->poblacion      = FILTER_INPUT(INPUT_POST, 'poblacion');
    $cli->provincia      = FILTER_INPUT(INPUT_POST, 'provincia');
    $cli->cp             = FILTER_INPUT(INPUT_POST, 'cp');
    $cli->telefono       = FILTER_INPUT(INPUT_POST, 'telefono');
    $cli->email          = FILTER_INPUT(INPUT_POST, 'email');
    
    
    
    if ($option == INSERTAR)
    {
        $cli->Insertar();
    }
    elseif ($option == MODIFICAR)
    {
        $cli->Modificar();
    }
    
}

header('location: ../index.php?route=C');

?>