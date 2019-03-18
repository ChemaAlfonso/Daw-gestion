<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="Javier Miras" />
    <meta name="author" content="Chema Alfonso" />
    <meta charset="utf-8" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        
	<title>Mantenimiento productos</title>
</head>

<?php

require_once('../config/constantes.inc.php');

$option      = filter_input(INPUT_GET, 'opt');
$producto_id = filter_input(INPUT_GET, 'id'); 

$proveedor_id  = '';
$codigo        = '';
$nombre        = '';
$stock         = '';
$precio        = '';

// Si estamos modificando
if ($option == MODIFICAR)
{
    require_once('../productos/cproductosbd.php');
    require_once('../biblioteca/ccrypt.php');
    
    $prd   = new CProductosBD;
    
    if ($prd->Producto($producto_id))
    {
        
        $proveedor_id    = $prd->proveedor_id; 
        $codigo          = $prd->codigo; 
        $nombre          = $prd->nombre; 
        $stock           = $prd->stock; 
        $precio          = $prd->precio;
    } 
}

?>

<body>
<div class="container jumbotron mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-right text-primary mb-3">Producto</h1>
                    <form action="productos_c.php?id=<?php echo $producto_id; ?>&opt=<?php echo $option; ?>" method="post">

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" required />
                    </div>

                    <?php 
                        require_once('../proveedores/cproveedoresbd.php');
                        $prov = new CProveedoresBD();
                        $prov->Proveedores();
                    ?>

                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <!--<input type="text" class="form-control" name="provincia" value="<?php echo $proveedor; ?>" />-->
                        <select class="form-control" name="proveedor_id" id="proveedor" required>
                            <?php foreach($prov->filas as $index =>  $fila): ?>
                                <option value="<?= $fila->proveedor_id ?>" <?= $proveedor_id == $fila->proveedor_id ? 'selected' : ''?>> <?= $fila->nombre ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="number" class="form-control" name="codigo" value="<?php echo $codigo; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" step="0.01" name="precio" value="<?php echo $precio; ?>" required max="100000" />
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" step="0.01" name="stock" value="<?php echo $stock; ?>" required max="100000" />
                    </div>

                        <input class="btn btn-success" role="button" type="submit" value="Aceptar" />
                        
                        <input type="button" 
                            class="btn btn-danger" 
                            value="Cancelar" 
                            onclick="location.href='../index.php?route=P'" />
                                
                    </form>
                
                <div class="row">
                    <div class="col-2 offset-5 text-center mt-5 bg-primary rounded-pill">
                        <a class="text-white d-block py-3" href="../index.php?route=P">Volver</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>
</html>