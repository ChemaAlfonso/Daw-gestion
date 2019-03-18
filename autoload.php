<?php

function app_autoloader( $class ){

    require 'clases/'. $class .'.php';

}

spl_autoload_register( 'app_autoloader' );