<?php

class Router {

    public $destRoute;
    public $home;


    public function __construct( $route, $usr = false ){

        //Pagina de inicio
        $this->home = 'main.php';
      
        //Login y registro de usuario
        if ( empty($usr) && empty($_GET['reg']) )
        {
            $this->setdestRoute('login/login.php');
            $this->goToPage( $this->destRoute );
        }
        elseif ( !empty($_GET['reg']) )
        {
            $this->setdestRoute('login/register.php');
            $this->goToPage( $this->destRoute );
        }
        elseif ( isset($_GET['route']) ){

            //Rutas de la App
            switch ($route){

                case 'P':
                $this->setdestRoute('productos/productos.php');
                break;

                case 'U':
                $this->setdestRoute('usuarios/usuarios.php');
                break;

                case 'C':
                $this->setdestRoute('clientes/clientes.php');
                break;

                case 'PROV':
                $this->setdestRoute('proveedores/proveedores.php');
                break;
               
            }
            
            $this->goToPage( $this->destRoute );
        } 
        else
        {
            //Si no hay rutas especificadas vamos al home
            $this->setdestRoute( $this->home );
            $this->goToPage( $this->destRoute );
        }

    } 

    public function setMain( $main ){
        $this->main = $main;
    }

    public function setdestRoute( $destRoute ){
        $this->destRoute = $destRoute;
    }

    public function goToPage( $src ){
        require_once $src;
    }

}
