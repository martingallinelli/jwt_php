# **JWT**

## **INSTALACION**

Ejecutar el siguiente comando dentro de la carpeta del proyecto:

> composer require firebase/php-jwt

## **EXPLICACION**

### **Configuración del token**

~~~
// fecha y hora actual en segundos
$time = time();
// fecha y hora de expiracion del token (+1 hora)
$expires = $time + (60 * 60);
// llave privada
$key = 'key_private';
// token
$token = array(
    // fecha y hora que se genero el token
    'iat' => $time,
    // tiempo de expiracion del token (+1 hora)
    'exp' => $expires,
    // informacion que guarda el token
    $data = array(
        'id' => 1,
        'name' => 'Martin'
    )
);
~~~

### **JWT::encode(datosAguardar, secretKey)**

Permite codificar el token

    $jwt = JWT::encode($token, $key);

### **JWT::decode(tokenCodificado, secretKey, algoritmoCodificacion)**

Permite decodificar el token

    $jwt = JWT::decode($jwt, $key, array('HS256'));