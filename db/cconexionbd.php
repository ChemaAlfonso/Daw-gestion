<?php

abstract class CConexionBD
{
    // Son privadas para que no se puedan modificar.
    private $servidor   = 'localhost';
    private $basedatos  = 'basedatos';
    private $usuario    = 'root';
    private $contrasena = '';
    
    protected function Servidor()   { return $this->servidor; }
    protected function BaseDatos()  { return $this->basedatos; }
    protected function Usuario()    { return $this->usuario; }
    protected function Contrasena() { return $this->contrasena; }
}

?>