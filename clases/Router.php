<?php

class Router {

    private $destRoute;
    private $home;
    private $err;

    public function __construct( $route, $usr = false ){

        //Seteo página de inicio
        $this->setHome( 'main.php' );

        //Seteo página de error
        $this->setError( 'shared/error.php' );
        
        //Login y registro de usuario
        if ( empty( $usr ) && empty( $_GET['reg'] ) )
        {
            $this->setDestRoute('login/login.php');
        }
        elseif ( !empty($_GET['reg']) )
        {
            $this->setDestRoute('login/register.php');
        }
        elseif ( isset( $_GET['route'] ) ){

            //Rutas de la App
            switch ( $route ){

                case 'P':
                $this->setDestRoute('productos/productos.php');
                break;

                case 'U':
                $this->setDestRoute('usuarios/usuarios.php');
                break;

                case 'C':
                $this->setDestRoute('clientes/clientes.php');
                break;

                case 'PROV':
                $this->setDestRoute('proveedores/proveedores.php');
                break;
               
            }
            
        } 
        else
        {
            //Si no hay rutas especificadas vamos al home
            $this->setDestRoute( $this->home );
        }
        
        $this->goToPage( $this->destRoute );

    } 

    public function setHome( $home ){
        $this->home = $home;
    }

    public function setError( $err ){
        $this->err = $err;
    }

    public function setDestRoute( $destRoute ){
        $this->destRoute = $destRoute;
    }

    public function getError(){
        return $this->err;
    }
    
    public function showError(){
        require_once ($this->err);
    }

    public function goToPage( $src ){

        if ( is_file( $src ) ){
            require_once $src;
        } else {
            $this->showError();
        }
    }

}
