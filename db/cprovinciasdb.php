<?php
 if (is_file($web = '../db/cbd.php')){
    require_once($web);
}else {
    require_once('./db/cbd.php');
}

class CProvinciasDB extends CBD {

    public $id_provincia;
    public $provincia;

    public function Provincias()
    {
        return $this->Seleccionar('SELECT * FROM provincias');
    }

    public function Provincia($id)
    {
        $this->$id_provincia  = '';
        $this->$provincia     = '';
        
        if ($this->Seleccionar("SELECT * FROM clientes WHERE provincia_id=$id"))
        {
            $this->$id_provincia = $this->filas[0]->id_provincia;
            $this->$provincia    = $this->filas[0]->provincia;
            
            return true;
        }
        
        return false;
    }

}