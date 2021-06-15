<?php
/**
 * 
 *  ! crear token
 * 
 */

// incluir arhivos
require_once '../vendor/autoload.php';
require_once '../auth/auth.php';

$usuario  = 'eduardo';
$password = '123456';

echo '<h3>TOKEN: </h3>';

// crear token
print_r(
    Auth::createToken([
        'id' => 1,
        'name' => $usuario,
        'password' => $password
    ])
);

echo '<br><br>';
echo '<a href="../index.php">VOLVER</a>';