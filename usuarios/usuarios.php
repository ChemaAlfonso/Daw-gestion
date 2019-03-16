<div class="container">

    <h1 class="display-3 mb-3">Usuarios</h1>

    <div class="row">
        <div class="col-12 text-center  table-responsive">
            <table class="table table-striped">

                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <?php
                if (is_file($web = '../usuarios/cusuariosbd.php')){
                    require_once($web);
                }else {
                    require_once('./usuarios/cusuariosbd.php');
                }
                
                $usuario = new CUsuariosBD;
                
                if ($usuario->Usuarios())
                {
                    
                    foreach($usuario->filas as $fila)
                    {
                        
                ?>

                <tr>
                    <td scope="row"><?php echo $fila->usuario; ?></td>
                    <td><?php echo $fila->contrasena; ?></td>
                    <td><?php echo $fila->nombre; ?></td>
                    <td><?php echo $fila->email; ?></td>
                    <td>
                        <a class="far fa-edit h5 modificado" href="usuarios/usuarios_v.php?id=<?php echo $fila->usuario_id; ?>&opt=2">
                            &nbsp;
                        </a>
                        <a class="text-danger borrado far fa-trash-alt h5" href="usuarios/usuarios_c.php?id=<?php echo $fila->usuario_id; ?>&opt=3">
                            
                        </a>
                    
                    </td>
                </tr>

                <?php
                    }
                }
                else
                {
                ?>

                    <tr>
                        <td colspan="12">No hay usuarios.</td>
                    </tr>

                <?php
                } // if Usuarios.    
                ?>    

                    <tr>
                        <td colspan="12"><a class="text-success" href="usuarios/usuarios_v.php?id=0&opt=1">Nuevo</td>
                    </tr>

            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-2 offset-5 text-center mt-5 py-3  bg-primary rounded-pill">
            <a class="text-white" href="./index.php">Volver</a>
        </div>
    </div>
</div>