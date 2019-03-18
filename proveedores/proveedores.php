<div class="container">
    
    <h1 class="display-3 mb-3">Proveedores</h1>

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
                    if (is_file($web = '../proveedores/cproveedoresbd.php')){
                        require_once($web);
                    }else {
                        require_once('./proveedores/cproveedoresbd.php');
                    }
                    
                    $proveedor = new CProveedoresBD;
                    
                    if ($proveedor->Proveedores())
                    {
                        
                        foreach($proveedor->filas as $fila)
                        {
                            
                    ?>
                    <tr>
                        <td scope="row align-middle"><?php echo $fila->nombre; ?></td>
                        <td class="align-middle"><?php echo $fila->cif; ?></td>
                        <td class="align-middle"><?php echo $fila->direccion; ?></td>
                        <td class="align-middle"><?php echo $fila->poblacion; ?></td>
                        <td class="align-middle"><?php echo $fila->provincia; ?></td>
                        <td class="align-middle"><?php echo $fila->cp; ?></td>
                        <td class="align-middle"><?php echo $fila->telefono; ?></td>
                        <td class="align-middle"><?php echo $fila->email; ?></td>
                        <td class="align-middle">
                            <a class="far fa-edit h5 modificado" href="proveedores/proveedores_v.php?id=<?php echo $fila->proveedor_id; ?>&opt=2">
                                &nbsp;
                            </a>
                            <a class="text-danger borrado far fa-trash-alt h5" href="proveedores/proveedores_c.php?id=<?php echo $fila->proveedor_id; ?>&opt=3">
                                &nbsp;
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
                            <td colspan="12">No hay proveedores.</td>
                        </tr>
                    <?php
                    } // if proveedores.    
                    ?>    
                        <tr>
                            <td colspan="12"><a class="text-success px-1 rounded" href="proveedores/proveedores_v.php?id=0&opt=1">Nuevo</td>
                        </tr>
                </table>
            </div>
        </div>


    <div class="row">
        <div class="col-2 offset-5 text-center mt-5 bg-primary rounded-pill">
            <a class="text-white d-block py-3" href="./index.php">Volver</a>
        </div>
    </div>
</div>