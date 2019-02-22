<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras by Chema Alfonso" />
    <meta charset="utf-8" />

	<title>Clientes</title>
</head>

<body>

<table>
    <tr>
        <th>Nombre</th>
        <th>CIF</th>
        <th>Direccion</th>
        <th>Poblacion</th>
        <th>Provincia</th>
        <th>Cod Postal</th>
        <th>Telefono</th>
        <th>Email</th>
    </tr>
    <?php
    require_once('../clientes/cclientesbd.php');
    
    $cliente = new CclientesBD;
    
    if ($cliente->Clientes())
    {
        
        foreach($cliente->filas as $fila)
        {
            
    ?>
    <tr>
        <td><?php echo $fila->nombre; ?></td>
        <td><?php echo $fila->cif; ?></td>
        <td><?php echo $fila->direccion; ?></td>
        <td><?php echo $fila->poblacion; ?></td>
        <td><?php echo $fila->provincia; ?></td>
        <td><?php echo $fila->cp; ?></td>
        <td><?php echo $fila->telefono; ?></td>
        <td><?php echo $fila->email; ?></td>
        <td>
            <a href="clientes_v.php?id=<?php echo $fila->cliente_id; ?>&opt=2">
            Modificar</a>
            <a href="clientes_c.php?id=<?php echo $fila->cliente_id; ?>&opt=3"
               onclick="return confirm('¿Deseas borrar el cliente seleccionado?');">
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
            <td colspan="5">No hay clientes.</td>
        </tr>
    <?php
    } // if Clientes.    
    ?>    
        <tr>
            <td colspan="5"><a href="clientes_v.php?id=0&opt=1">Nuevo</td>
        </tr>
</table>


</body>
</html>