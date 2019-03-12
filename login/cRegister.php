<?php

require_once('../db/cbd.php');
require_once('../biblioteca/ccrypt.php');

class CRegister extends CBD
{
    private $usuario;
    private $contrasena;
    private $nombre;
    private $email;
    
    public function __construct($usr, $pwd, $nombre, $email)
    {
        // Primero llamaremos al constructor de CBD.
        parent::__construct();
        
        $this->usuario    = $usr;
        $this->contrasena = $pwd;
        $this->nombre     = $nombre;
        $this->email      = $email;
    }
    
    public function Register()
    {
         
        $crypt = new CCrypt(); 
    
        $contrasena = $crypt->Encriptar($this->contrasena);

        $sql = "INSERT INTO usuarios (`usuario_id`, `usuario`, `contrasena`, `nombre`, `email`) 
        VALUES (NULL, '$this->usuario', '$contrasena', '$this->nombre', '$this->email');"  ;                                   

        try {
            $this->Ejecutar($sql);

        } catch (exception $e){

            $_SESSION['error'] = "Error al registrar: " . $e->getMessage();

            return false;

        }

        return true;

    }
}

?>