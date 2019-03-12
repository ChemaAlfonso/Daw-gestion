<?php
if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
    setlocale(LC_ALL, 'es-ES');
else
    setlocale(LC_ALL, 'es_ES');

function Date2Fecha($date)
{
    return date('d/m/Y', strtotime($date));
}

function Fecha2Cabecera($date)
{
    return strftime('%d de %B de %Y', strtotime($date));
}

function Mostrar($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

function ConsoleLog($a)
{
    echo "<script>console.log('$a');</script>";
}

function Maximo()
{
    $max = -PHP_INT_MAX;

    foreach (func_get_args() as $arg) 
    {
        if ($arg > $max) 
        {
            $max = $arg;
        }
    }

    return $max;
}

function Minimo()
{
    $min = -PHP_INT_MIN;

    foreach (func_get_args() as $arg) 
    {
        if ($arg < $min) 
        {
            $min = $arg;
        }
    }
    
    return $min;
}


?>