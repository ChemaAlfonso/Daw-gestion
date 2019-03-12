<div class="container">
    <div class="row">
        <div class="col-6 offset-3">

            <form action="login/login_c.php" method="post">
            
                <div class="form-group">
                    <label>Usuario/Email</label>
                    <input type="text" class="form-control" name="usuario" value="<?= !empty($_COOKIE['userLogin']) ? $_COOKIE['userLogin'] : '';  ?>"/>
                </div>
                    
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" />
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text"> Recordar &nbsp;
                            <input type="checkbox" value="true" name="recordar" <?= !empty($_COOKIE['userLogin']) ? 'checked' : '';  ?>>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="Iniciar sesión" />
                </div>

                <a href="index.php?reg=true">Registrarse</a>

            </form>
            

        </div>
    </div>
</div>