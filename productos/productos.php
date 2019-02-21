<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras By Chema Alfonso" />
    <meta charset="utf-8" />

	<title>Productos</title>
</head>

<body>

<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Stock</th>
        <th>Precio</th>
        <th></th>
    </tr>
    <?php
    require_once('../productos/cproductosbd.php');
    
    $producto = new CProductosBD;
    
    if ($producto->Productos())
    {
        
        foreach($producto->filas as $fila)
        {
            
    ?>
    <tr>
        <td><?php echo $fila->codigo; ?></td>
        <td><?php echo $fila->nombre; ?></td>
        <td><?php echo $fila->stock; ?></td>
        <td><?php echo $fila->precio; ?></td>
        <td>
            <a href="productos_v.php?id=<?php echo $fila->producto_id; ?>&opt=2">
            Modificar</a>
            <a href="productos_c.php?id=<?php echo $fila->producto_id; ?>&opt=3"
               onclick="return confirm('¿Deseas borrar el producto seleccionado?');">
            Borrar</a>
        
        </td>
    </tr>
    <?php
        }
    }
    else
    {
    ?>
        <tr>
            <td colspan="5">No hay productos.</td>
        </tr>
    <?php
    } // if Usuarios.    
    ?>    
        <tr>
            <td colspan="5"><a href="productos_v.php?id=0&opt=1">Nuevo</td>
        </tr>
</table>


</body>
</html>