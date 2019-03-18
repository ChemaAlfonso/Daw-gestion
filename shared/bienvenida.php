<div class="container-fluid">
    <div class="row">

        <div class="col-3 offset-9 text-center">
            <?= !empty($usuario) ?  "Bienvenido <span class='text-primary'>".$usuario."</span>" : "Bienvenido <span class='text-primary'>Desconocido</span>" ;?>
        </div>

        <div class="col-3 offset-9 text-center">
            <a href="login/logout.php" class="text-white d-block mt-3"> <?= !empty($usuario) ?  "<span class=' btn btn-danger'>Cerrar sesión</span>" : '' ;?> </a>
        </div>

    </div>
</div>