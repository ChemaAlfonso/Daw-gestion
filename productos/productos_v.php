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
        
        $codigo      = $prd->codigo; 
        $nombre      = $prd->nombre; 
        $stock       = $prd->stock; 
        $precio      = $prd->precio;
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

                    <div class="form-group">
                        <label for="codigo">Codigo</label>
                        <input type="number" class="form-control" name="codigo" value="<?php echo $codigo; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>" required />
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" value="<?php echo $stock; ?>" required />
                    </div>

                        <input class="btn btn-success" role="button" type="submit" value="Aceptar" />
                        
                        <input type="button" 
                            class="btn btn-danger" 
                            value="Cancelar" 
                            onclick="location.href='../index.php?P=true'" />
                                
                    </form>
                
                <div class="row">
                    <div class="col-2 offset-5 text-center mt-5 py-3  bg-primary rounded-pill">
                        <a class="text-white" href="../index.php?P=true">Volver</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


</body>
</html>