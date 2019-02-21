<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras By Chema Alfonso" />
    <meta charset="utf-8" />
    
	<title>Mantenimiento productos</title>
</head>

<?php

require_once('../config/constantes.inc.php');

$option     = filter_input(INPUT_GET, 'opt');
$producto_id = filter_input(INPUT_GET, 'id'); 

$codigo    = '';
$nombre = '';
$stock     = '';
$precio      = '';

// Si estamos modificando
if ($option == MODIFICAR)
{
    require_once('../productos/cproductosbd.php');
    require_once('../biblioteca/ccrypt.php');
    
    $prd   = new CProductosBD;
    
    if ($prd->Producto($producto_id))
    {
        $crypt = new CCrypt;
        
        $codigo      = $prd->codigo; 
        $nombre      = $prd->nombre; 
        $stock       = $prd->stock; 
        $precio      = $prd->precio;
    } 
}

?>

<body>
<form action="productos_c.php?id=<?php echo $producto_id; ?>&opt=<?php echo $option; ?>" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
    <br />
    <label for="codigo">Codigo</label>
    <input type="number" name="codigo" value="<?php echo $codigo; ?>" />
    <br />
    <label for="precio">Precio</label>
    <input type="number" name="precio" value="<?php echo $precio; ?>" />
    <br />
    <label for="stock">Stock</label>
    <input type="number" name="stock" value="<?php echo $stock; ?>" />
    <br />
    <input type="submit" value="Aceptar" />
    
    <input type="button" 
           value="Cancelar" 
           onclick="location.href='productos.php'" />
            
</form>

</body>
</html>