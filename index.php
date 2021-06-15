<?php
// si existe el parametro pagina (p)
if (isset($_GET['p'])) {
    // convierto el contenido del parametro a letras minusculas
    $page = strtolower($_GET['p']);
    // si el parametro pagina (p) es autentica
    if ($_GET['p'] == 'autentica') {
        // redirecciono a la vista segun el parametro
        header('Location: views/' . $page . '.php');
    // si el parametro pagina (p) es data
    } elseif ($_GET['p'] == 'data') {
        // si existe el parametro token (t) y no esta vacio
        if (isset($_GET['t']) && $_GET['t'] != '') {
            // redirecciono a la vista segun el parametro
            header('Location: views/' . $page . '.php?t=' . $_GET['t']);
        // si no existe el parametro token (t) y esta vacio
        } else {
            die('No ha definido el token!');
        }
    // si el parametro pagina (p) no es autentica ni data
    } else {
        die('No ha definido la página!');
    }
}

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

        <div class="grid grid-cols-2 gap-4 my-5 mx-20">
            <div class="p-5 text-center border border-grey-700 shadow-md">
                <p class="font-bold uppercase">Crear token:</p>
                <p><b>GET</b> /index.html?p=<i>{pagina}</i></p>
                <small>p = autentica / data</small>
            </div>

            <div class="p-5 text-center border border-grey-700 shadow">
                <p class="font-bold uppercase">Ver datos del token:</p>
                <p><b>GET</b> /index.html?p=<i>data</i>&t=<i>{token}</i></p>
                <small>token = generado en el paso anterior</small>
            </div>
        </div>
    </div>
</body>

</html>