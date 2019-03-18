<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta name="author" content="Javier Miras" />
    <meta name="author" content="Chema Alfonso" />
    <meta charset="UTF-8">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        
	<title>Mantenimiento clientes</title>
</head>

<?php

require_once('../config/constantes.inc.php');

$option     = filter_input(INPUT_GET, 'opt');
$cliente_id = filter_input(INPUT_GET, 'id'); 

$nombre       = '';
$cif          = '';
$direccion    = '';
$poblacion    = '';
$provincia    = '';
$cp           = '';
$telefono     = '';
$email        = '';

// Si estamos modificando
if ($option == MODIFICAR)
{
    require_once('../clientes/cclientesbd.php');
    
    $cli   = new CClientesBD;
    if ($cli->Cliente($cliente_id))
    {
        $nombre     = $cli->nombre;
        $cif        = $cli->cif;
        $direccion  = $cli->direccion;
        $poblacion  = $cli->poblacion;
        $provincia  = $cli->provincia;
        $cp         = $cli->cp;
        $telefono   = $cli->telefono;
        $email      = $cli->email;
    } 
}

?>

<body>
    <div class="container jumbotron mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-right text-primary mb-3">Cliente</h1>
                <form action="clientes_c.php?id=<?php echo $cliente_id; ?>&opt=<?php echo $option; ?>" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="cif">Cif</label>
                        <input type="text" class="form-control" name="cif" value="<?php echo $cif; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="poblacion">Poblacion</label>
                        <input type="text" class="form-control" name="poblacion" value="<?php echo $poblacion; ?>" />
                    </div>

                    <?php 
                        require_once('../db/cprovinciasdb.php');
                        $prov = new CProvinciasDB();
                        $prov->Provincias();
                    ?>

                    <div class="form-group">
                        <label for="provincia">Provincia</label>
                        <!--<input type="text" class="form-control" name="provincia" value="<?php echo $provincia; ?>" />-->
                        <select class="form-control" name="provincia" id="provincia">
                            <?php foreach($prov->filas as $index =>  $fila): ?>
                                <option value="<?= $fila->provincia ?>" <?= $provincia == $fila->provincia ? 'selected' : ''?>> <?= $fila->provincia ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cp">Código postal</label>
                        <input type="text" class="form-control" name="cp" value="<?php echo $cp; ?>"  required maxlength="5" minlength="5"/>
                    </div>

                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="tel" class="form-control" name="telefono" value="<?php echo $telefono; ?>"  required/>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required />
                    </div>

                    <input class="btn btn-success" role="button" type="submit" value="Aceptar" />
                    
                    <input type="button"
                    class="btn btn-danger" 
                    value="Cancelar" 
                    role="button"
                    onclick="location.href='../index.php?route=C'" />
                    
                </form>
                
                <div class="row">
                    <div class="col-2 offset-5 text-center mt-5 bg-primary rounded-pill">
                        <a class="text-white d-block py-3" href="../index.php?route=C">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>
</html>