<?php

require_once('../db/cbd.php');

class CUsuariosBD extends CBD
{
    public $usuario_id;
    public $usuario;
    public $contrasena;
    public $nombre;
    public $email;
    
    public function Usuarios()
    {
        return $this->Seleccionar('SELECT * FROM usuarios');
    }
    
    public function Usuario($id)
    {
        $this->usuario    = '';
        $this->contrasena = '';
        $this->nombre     = '';
        $this->email      = '';
        
        if ($this->Seleccionar("SELECT * FROM usuarios WHERE usuario_id=$id"))
        {
            $this->usuario    = $this->filas[0]->usuario;
            $this->contrasena = $this->filas[0]->contrasena;
            $this->nombre     = $this->filas[0]->nombre;
            $this->email      = $this->filas[0]->email;
            
            return true;
        }
        
        return false;
    }
    
    public function Borrar($id)
    {
        return $this->Ejecutar("DELETE FROM usuarios WHERE usuario_id=$id");
    }
    
    public function Insertar()
    {
        $sql = "INSERT INTO usuarios 
                VALUES (null, 
                        '$this->usuario',
                        '$this->contrasena',
                        '$this->nombre',
                        '$this->email')";
        
        return $this->Ejecutar($sql);
    }

    public function Modificar()
    {
        $sql = "UPDATE usuarios SET 
                usuario='$this->usuario',
                contrasena='$this->contrasena',
                nombre='$this->nombre',
                email='$this->email'
                WHERE usuario_id=$this->usuario_id";
        
        return $this->Ejecutar($sql);
    }    
}

?>