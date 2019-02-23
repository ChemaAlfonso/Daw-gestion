<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="autor" content="Chema Alfonso" >

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    <!-- Font-awesome --> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- estilos -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Gestión</title>
</head>
<body>
    
<header class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron text-center bg-primary text-white mb-5">
                     <h1><i class="fas fa-strikethrough display-4"></i>GPDO - Sistema de Gestión con PDO</h1>
                </div>
            </div>
        </div>
    </header>

<?php

    if (isset($_GET['P'])){
        require_once "productos/productos.php";
    } elseif (isset($_GET['U'])){
        require_once "usuarios/usuarios.php";
    } elseif (isset($_GET['C'])){
        require_once "clientes/clientes.php";
    } else {
        require_once "main.php";
    }
?>

<div class="row">
    <div class="col-12 text-right text-primary px-5">
        <p>Por: Chema Alfonso</p>
    </div>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

