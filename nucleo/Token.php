<?php

namespace Nucleo;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Token
{
    public function generarToken($usuario_id)
    {
        $clave_secreta = $_ENV['JWT_CLAVE_SECRETA'];
        
        $payload = [
            'iss' => 'cv',
            'iat' => time(),
            'exp' => time() + (60 * 60),
            'sub' => $usuario_id
        ];

        return JWT::encode($payload, $clave_secreta, 'HS256');
    }

    public function comprobarToken()
    {
        if (!isset($_COOKIE['token_acceso'])) {
            
        }

        $token = $_COOKIE['token_acceso'];
        $clave_secreta = $_ENV['JWT_CLAVE_SECRETA'];

        return JWT::decode($token, new Key($clave_secreta, 'HS256'));
    }
}