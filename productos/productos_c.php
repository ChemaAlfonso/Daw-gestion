<?php
require_once('../config/constantes.inc.php');
require_once('../productos/cproductosbd.php');

$option     = FILTER_INPUT(INPUT_GET, 'opt');
$producto_id = FILTER_INPUT(INPUT_GET, 'id');

$prd = new CProductosBD;

if ($option == BORRAR)
{
    $prd->Borrar($producto_id);
}
else
{
    $prd->producto_id = $producto_id;
    $prd->nombre    = FILTER_INPUT(INPUT_POST, 'nombre');
    $prd->codigo = FILTER_INPUT(INPUT_POST, 'codigo');
    $prd->stock     = FILTER_INPUT(INPUT_POST, 'stock');
    $prd->precio      = FILTER_INPUT(INPUT_POST, 'precio');

    if ($option == INSERTAR)
    {
        $prd->Insertar();
    }
    elseif ($option == MODIFICAR)
    {
        $prd->Modificar();
    }
    
}

header('location: ../index.php?P=true');

?>