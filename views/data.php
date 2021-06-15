<?php

/**
 * 
 *  ! mostrar contenido del token
 * 
 */

// incluir archivos
require_once '../vendor/autoload.php';
require_once '../auth/auth.php';

// capturo el token
$token = $_GET['t'];

echo '<h3>DATOS: </h3>';

// convierto a json e imprimo el contenido del data del token
print_r(
    json_encode(Auth::checkAndGet(
        $token
    ))
);

echo '<br><br>';
echo '<a href="../index.php">VOLVER</a>';