<?php
require_once('../config/constantes.inc.php');
require_once('../proveedores/cproveedoresbd.php');

$option     = FILTER_INPUT(INPUT_GET, 'opt');
$proveedor_id = FILTER_INPUT(INPUT_GET, 'id');

$pro = new CProveedoresBD;

if ($option == BORRAR)
{
    $pro->Borrar($proveedor_id);
}
else
{
    $pro->proveedor_id     = $proveedor_id;
    $pro->nombre         = FILTER_INPUT(INPUT_POST, 'nombre');
    $pro->cif            = FILTER_INPUT(INPUT_POST, 'cif');
    $pro->direccion      = FILTER_INPUT(INPUT_POST, 'direccion');
    $pro->poblacion      = FILTER_INPUT(INPUT_POST, 'poblacion');
    $pro->provincia      = FILTER_INPUT(INPUT_POST, 'provincia');
    $pro->cp             = FILTER_INPUT(INPUT_POST, 'cp');
    $pro->telefono       = FILTER_INPUT(INPUT_POST, 'telefono');
    $pro->email          = FILTER_INPUT(INPUT_POST, 'email');
    
    
    
    if ($option == INSERTAR)
    {
        $pro->Insertar();
    }
    elseif ($option == MODIFICAR)
    {
        $pro->Modificar();
    }
    
}

header('location: ../index.php?PROV=true');

?>