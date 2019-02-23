<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras by Chema Alfonso" />
    <meta charset="utf-8" />

	<title>Clientes</title>
</head>

<body>
<div class="container">
    
    <h1 class="display-3 mb-3">Clientes</h1>

        <div class="row">
            <div class="col-12 text-center table-responsive">
                <table class="table table-striped">
                    
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">CIF</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Poblacion</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Cod Postal</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    if (is_file($web = '../clientes/cclientesbd.php')){
                        require_once($web);
                    }else {
                        require_once('./clientes/cclientesbd.php');
                    }
                    
                    $cliente = new CclientesBD;
                    
                    if ($cliente->Clientes())
                    {
                        
                        foreach($cliente->filas as $fila)
                        {
                            
                    ?>
                    <tr>
                        <td scope="row"><?php echo $fila->nombre; ?></td>
                        <td><?php echo $fila->cif; ?></td>
                        <td><?php echo $fila->direccion; ?></td>
                        <td><?php echo $fila->poblacion; ?></td>
                        <td><?php echo $fila->provincia; ?></td>
                        <td><?php echo $fila->cp; ?></td>
                        <td><?php echo $fila->telefono; ?></td>
                        <td><?php echo $fila->email; ?></td>
                        <td>
                            <a href="clientes/clientes_v.php?id=<?php echo $fila->cliente_id; ?>&opt=2">
                            Modificar</a>
                            <a class="text-danger" href="clientes/clientes_c.php?id=<?php echo $fila->cliente_id; ?>&opt=3"
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
                            <td colspan="12"><a class="text-success px-1 rounded" href="clientes/clientes_v.php?id=0&opt=1">Nuevo</td>
                        </tr>
                </table>
            </div>
        </div>


    <div class="row">
        <div class="col-2 offset-5 text-center mt-5 py-3  bg-primary rounded">
            <a class="text-white" href="./index.php">Volver</a>
        </div>
    </div>
</div>


</body>
</html>