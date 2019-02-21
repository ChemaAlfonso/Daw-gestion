<?php

abstract class CConfiguracionBD
{
    // Son privadas para que no se puedan modificar.
    private $servidor   = 'localhost';
    private $basedatos  = 'basedatos';
    private $usuario    = 'root';
    private $contrasena = '';
    private $puerto     = '3306';
    
    // Métodos "getter" para acceder a las variables privadas.
    protected function getServidor()   { return $this->servidor; }
    protected function getBaseDatos()  { return $this->basedatos; }
    protected function getUsuario()    { return $this->usuario; }
    protected function getContrasena() { return $this->contrasena; }
    protected function getPuerto()     { return $this->puerto; }
}

?>