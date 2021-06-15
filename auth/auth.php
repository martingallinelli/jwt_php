<?php

//! incluir libreria JWT
use Firebase\JWT\JWT;

class Auth
{
    // llave secreta
    private static $secret_key = 'example_key';
    // algoritmo de codificacion
    private static $encrypt = ['HS256'];
        
    //! generar token
    public static function createToken($data)
    {
        // fecha y hora actual en segundos
        $time = time();
        // fecha y hora de expiracion del token (+1 hora)
        $expires = $time + (60 * 60);
        
        $token = array(
            // issued at: fecha y hora que se genero el token
            'iat' => $time,
            // expiration time: tiempo de expiracion del token (+1 hora)
            'exp' => $expires,
            // audience: identifica la audiencia o receptores para lo que fue emitido
            'aud' => self::aud(),
            // informacion que guarda el token
            'data' => $data
        );

        // codificar token y devolverlo
        return JWT::encode($token, self::$secret_key);
    }
    
    //! decodificar y mostrar informacion del token
    public static function checkAndGet($token)
    {
        // si el token esta vacio
        if(empty($token))
        {
            // error - token invalido
            throw new Exception("Invalid token supplied.");
        // si el token contiene algo
        } else {
            // decodifico el token
            $decode = self::getData($token);
            // si el token no fue generado en este navegador 
            if($decode->aud !== self::aud())
            {
                throw new Exception("Invalid user logged in.");
            // si el token fue generado en este navegador 
            } else {
                // devuelvo solamente los datos del token
                return $decode->data;
            }
        }                
    }
    
    //! decodificar el token
    private static function getData($token)
    {
        // decode(tokenCodificado, secretKey, algoritmoCodificacion)
        // decodifica el token y muestra solo los datos
        return JWT::decode(
            $token,
            self::$secret_key,
            self::$encrypt
        );
    }
    
    //! control de uso de token en otro navegador
    private static function aud()
    {
        $aud = '';
        
        // si no esta vacio el ip del cliente
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        // si no esta vacio el ip del cliente (deteccion)
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else 
        {
            // direccion ip desde la cual está viendo la página actual el usuario
            $aud = $_SERVER['REMOTE_ADDR'];
        }
        
        // el agente del usuario (ej. mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586))
        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        // obtener el nombre de host
        $aud .= gethostname();
        
        return sha1($aud);
    }
}