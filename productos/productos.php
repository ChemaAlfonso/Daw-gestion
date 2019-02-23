<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Javier Miras By Chema Alfonso" />
    <meta charset="utf-8" />

	<title>Productos</title>
</head>

<body>
<div class="container">

    <h1 class="display-3 mb-3">Productos</h1>

    <div class="row">
        <div class="col-12 text-center  table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <?php
                if (is_file($web = '../productos/cproductosbd.php')){
                    require_once($web);
                }else {
                    require_once('./productos/cproductosbd.php');
                }
                
                $producto = new CProductosBD;
                
                if ($producto->Productos())
                {
                    
                    foreach($producto->filas as $fila)
                    {
                        
                ?>

                <tr>
                    <td scope="row"><?php echo $fila->codigo; ?></td>
                    <td><?php echo $fila->nombre; ?></td>
                    <td><?php echo $fila->stock; ?></td>
                    <td><?php echo $fila->precio; ?></td>
                    <td>
                        <a href="productos/productos_v.php?id=<?php echo $fila->producto_id; ?>&opt=2">
                        Modificar</a>
                        <a class="text-danger" href="productos/productos_c.php?id=<?php echo $fila->producto_id; ?>&opt=3"
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
                    <td colspan="12"><a class="text-success" href="productos/productos_v.php?id=0&opt=1">Nuevo</td>
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