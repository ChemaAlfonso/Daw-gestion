<?php

 if (is_file($web = '../db/cbd.php')){
    require_once($web);
}else {
    require_once('./db/cbd.php');
}

class CProveedoresBD extends CBD
{
    public $proveedor_id;
    public $nombre;
    public $cif;
    public $direccion;
    public $poblacion;
    public $provincia;
    public $cp;
    public $telefono;
    public $email;
    
    
    public function Proveedores()
    {
        return $this->Seleccionar('SELECT * FROM proveedores');
    }
    
    public function Proveedor($id)
    {
        $this->nombre        = '';
        $this->cif           = '';
        $this->direccion     = '';
        $this->poblacion     = '';
        $this->provincia     = '';
        $this->cp            = '';
        $this->telefono      = '';
        $this->email         = '';
        
        if ($this->Seleccionar("SELECT * FROM proveedores WHERE proveedor_id=$id"))
        {
            $this->nombre       = $this->filas[0]->nombre;
            $this->cif          = $this->filas[0]->cif;
            $this->direccion    = $this->filas[0]->direccion;
            $this->poblacion    = $this->filas[0]->poblacion;
            $this->provincia    = $this->filas[0]->provincia;
            $this->cp           = $this->filas[0]->cp;
            $this->telefono     = $this->filas[0]->telefono;
            $this->email        = $this->filas[0]->email;
            
            return true;
        }
        
        return false;
    }
    
    public function Borrar($id)
    {
        return $this->Ejecutar("DELETE FROM proveedores WHERE proveedor_id=$id");
    }
    
    public function Insertar()
    {
        $sql = "INSERT INTO proveedores 
                VALUES (null, 
                        '$this->nombre',
                        '$this->cif',
                        '$this->direccion',
                        '$this->poblacion',
                        '$this->provincia',
                        '$this->cp',
                        '$this->telefono',
                        '$this->email')";
        
        return $this->Ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE proveedores SET 
                nombre='$this->nombre',
                cif='$this->cif',
                direccion='$this->direccion',
                poblacion='$this->poblacion',
                provincia='$this->provincia',
                cp='$this->cp',
                telefono='$this->telefono',
                email='$this->email'
                WHERE proveedor_id=$this->proveedor_id";
        return $this->Ejecutar($sql);
    }    
}

?>