# **JWT**

Aplicación de JWT en PHP nativo.

<br>

---
### **INSTALACION**
---

<br>

Ejecutar el siguiente comando dentro de la carpeta del proyecto:

> composer require firebase/php-jwt

<br>

---
### **CONFIGURACION TOKEN**
---

<br>

- Fecha y hora actual en segundos
~~~    
    $time = time();
~~~

- Fecha y hora de expiracion del token (+1 hora)
~~~
    $expires = $time + (60 * 60);
~~~

- Llave privada
~~~
    $key = 'key_private';
~~~

- Token
~~~
    $token = array(
        // fecha de creación
        'iat' => $time,
        // fecha de expiración
        'exp' => $expires,
        // informacion que guarda 
        $data = array(
            'id' => 1,
            'name' => 'Martin'
        )
    );
~~~

<br>

---
### **CODIFICAR TOKEN**
---

<br>

JWT::encode(datosAguardar, secretKey)

~~~
    $jwt = JWT::encode($token, $key);
~~~

<br>

---
### **DECODIFICAR TOKEN**
---

<br>

JWT::decode(tokenCodificado, secretKey, algoritmoCodificacion)

~~~
    $jwt = JWT::decode($jwt, $key, array('HS256'));
~~~