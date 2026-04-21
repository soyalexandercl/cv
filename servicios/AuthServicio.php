<?php

namespace Servicios;

use Firebase\JWT\JWT;
use Modelos\AuthModelo;
use Nucleo\Token;

class AuthServicio
{
    private $conexion;
    private $auth_modelo;
    private $token;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->auth_modelo = new AuthModelo($conexion);
        $this->token = new Token();
    }
}