<?php

/**
 * 
 *  ! crear token
 * 
 */

// incluir arhivos
require_once '../vendor/autoload.php';
require_once '../auth/auth.php';

// usuario y password de prueba
$usuario  = 'Martin';
$password = '123456';

// crear token
$tkn = Auth::createToken([
    'id' => 1,
    'name' => $usuario,
    'password' => $password
]);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JWT</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-2 p-4 border border-gray-300">
        <div class="py-1 border border-green-500">
            <h1 class="text-center font-bold text-2xl md:text-4xl">Jason Web Token <br>- JWT -</h1>
        </div>

        <div class="my-5 max-w-md mx-auto">
            <div class="p-5 text-center border border-grey-700 shadow-md">
                <p class="font-bold uppercase">Token generado:</p>
                <p class="truncate"><?php echo $tkn; ?></i></p>
            </div>

            <div class="mt-5 p-5 text-center border border-grey-700 shadow-md">
                <p class="font-bold uppercase mb-3">Ver datos del token:</p>
                <a href="/index.php?p=data&t=<?php echo $tkn; ?>" class="px-4 py-2 border shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">Ver</a>
            </div>
        </div>

        <div class="py-3 text-center">
            <a href="/index.php" class="py-2 px-4 border shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">Volver</a>
        </div>
    </div>
</body>

</html>