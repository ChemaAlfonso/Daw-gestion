<?php

if (is_file('../db/cbd.php')){
        
    require_once('../db/cbd.php');

}else {
    require_once('./db/cbd.php');

}

class CProductosBD extends CBD
{
    public $producto_id;
    public $proveedor_id;
    public $codigo;
    public $nombre;
    public $stock;
    public $precio;
    
    public function Productos()
    {
        //return $this->Seleccionar('SELECT * FROM productos');
        return $this->Seleccionar("SELECT p.*,prov.nombre AS 'proveedor' FROM productos p INNER JOIN proveedores prov WHERE p.proveedor_id=prov.proveedor_id");
    }
    
    public function Producto($id)
    {
        $this->proveedor_id  = '';
        $this->codigo        = '';
        $this->nombre        = '';
        $this->stock         = '';
        $this->precio        = '';
        
        if ($this->Seleccionar("SELECT * FROM productos WHERE producto_id=$id"))
        {
            $this->proveedor_id    = $this->filas[0]->proveedor_id;
            $this->codigo          = $this->filas[0]->codigo;
            $this->nombre          = $this->filas[0]->nombre;
            $this->stock           = $this->filas[0]->stock;
            $this->precio          = $this->filas[0]->precio;
            
            return true;
        }
        
        return false;
    }
    
    public function Borrar($id)
    {
        return $this->Ejecutar("DELETE FROM productos WHERE producto_id=$id");
    }
    
    public function Insertar()
    {
        $sql = "INSERT INTO productos 
                VALUES (null, 
                        '$this->proveedor_id',
                        '$this->codigo',
                        '$this->nombre',
                        '$this->stock',
                        '$this->precio')";
        
        return $this->Ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE productos SET 
                proveedor_id='$this->proveedor_id',
                codigo='$this->codigo',
                nombre='$this->nombre',
                stock='$this->stock',
                precio='$this->precio'
                WHERE producto_id=$this->producto_id";
        
        return $this->Ejecutar($sql);
    }    
}

?>