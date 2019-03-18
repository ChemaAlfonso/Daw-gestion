<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
        
            <form action="login/register_c.php" method="post">
            
                <div class="form-group">
                    <label>Usuario <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="usuario" required />
                </div>
                    
                <div class="form-group">
                    <label>Contraseña <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="contrasena" required />
                </div>
                    
                <div class="form-group">
                    <label>Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nombre" required/>
                </div>
                    
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" required />
                </div>
                    
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" value="Registrarse" />
                </div>

                <a href="index.php">¿ Ya tienes cuenta? Inicia Sesión</a>

            </form>
            
        </div>
    </div>
</div>