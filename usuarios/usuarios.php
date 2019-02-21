<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras" />
    <meta charset="utf-8" />

	<title>Usuarios</title>
</head>

<body>

<table>
    <tr>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Nombre</th>
        <th>Email</th>
        <th></th>
    </tr>
    <?php
    require_once('../usuarios/cusuariosbd.php');
    
    $usuario = new CUsuariosBD;
    
    if ($usuario->Usuarios())
    {
        
        foreach($usuario->filas as $fila)
        {
            
    ?>
    <tr>
        <td><?php echo $fila->usuario; ?></td>
        <td><?php echo $fila->contrasena; ?></td>
        <td><?php echo $fila->nombre; ?></td>
        <td><?php echo $fila->email; ?></td>
        <td>
            <a href="usuarios_v.php?id=<?php echo $fila->usuario_id; ?>&opt=2">
            Modificar</a>
            <a href="usuarios_c.php?id=<?php echo $fila->usuario_id; ?>&opt=3"
               onclick="return confirm('¿Deseas borrar el usuario seleccionado?');">
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
            <td colspan="5">No hay usuarios.</td>
        </tr>
    <?php
    } // if Usuarios.    
    ?>    
        <tr>
            <td colspan="5"><a href="usuarios_v.php?id=0&opt=1">Nuevo</td>
        </tr>
</table>


</body>
</html>