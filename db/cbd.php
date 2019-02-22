<?php

require_once('cconfiguracionbd.php');

class CBD extends CConfiguracionBD
{
    private $con   = null; // Conexión a la Base de datos. 
    private $error = '';   // Variable para indicar si hay error.
    
    public $filas = null;  // Variable con las filas resultados de una consulta.
    
    public function __construct()
    {
        // Abrimos la conexión a la Base de datos.
        try 
        {
            // Creamos la cadena de conexión.
            $cadena = 'mysql:host=' . $this->getServidor() . 
                      ';dbname=' . $this->getBaseDatos() .
                      ';port=' . $this->getPuerto();
                      
            // Nos conectamos al servidor de base de datos (MySQL).
            $this->con = new PDO($cadena, $this->getUsuario(), $this->getContrasena());
            
            // Ponemos el modo de erro de PDO a exception.
            $this->con->setAttribute(PDO::ATTR_ERRMODE, 
                                     PDO::ERRMODE_EXCEPTION);
            
            // Indicamos que no hay error.       
            $this->error = ''; 
        }
        catch(PDOException $e)
        {
            $this->error = 'No se ha podido establecer la conexión: ' . 
                           $e->getMessage();
        }        
    }
    
    public function __destruct()
    {
        // Cerramos la conexión a la Base de datos.
        $this->con = null;
    }
    
    public function Error()
    {
        // Si la variable $error es distinta de la cadena vacía,
        // devolvemos true (indicando que es un error).
        return ($this->error != '');
    }
    
    public function getError()
    {
        // Devolvemos el error producido.
        return $this->error;
    }
    
    public function Seleccionar($sql)
    {
        // Creamos la sentencia a ejecutar.
        // Realmente no sería necesario.
        $stmt = $this->con->prepare($sql);
        
        // Ejecutamos las sentencia.
        $stmt->execute();
        
        // Obtenemos las filas en formato "OBJETO".
        $this->filas = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        // Si no hay filas devolvemos false.
        if ($this->filas == null) 
            return false;
        
        // En caso contrario devolvemos true.
        return true;
    }
    
    public function Ejecutar($sql)
    {
        
        // Creamos la sentencia a ejecutar.
        // Realmente no sería necesario.
        $stmt = $this->con->prepare($sql);

        // Ejecutamos las sentencia.
        return $stmt->execute();
    }
}

?>