<?php

require_once('../db/cbd.php');
require_once('../biblioteca/ccrypt.php');

class CLogin extends CBD
{
    private $usuario;
    private $contrasena;
    
    public function __construct($usr, $pwd)
    {
        // Primero llamaremos al constructor de CBD.
        parent::__construct();
        
        $this->usuario    = $usr;
        $this->contrasena = $pwd;
    }
    
    public function Logueado()
    {
        if ($this->Seleccionar("SELECT contrasena 
                                FROM usuarios 
                                WHERE usuario='$this->usuario' 
                                OR email='$this->usuario'"))
        {
            
            $crypt = new CCrypt(); 
    
            $contrasena = $crypt->Encriptar($this->contrasena);   
            
            if ($contrasena == $this->filas[0]->contrasena)
                return true;
                
            return false;
        }
        
        return false;
    }
}

?>