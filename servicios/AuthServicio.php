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

    public function iniciarSesion($datos_entrada)
    {
        // Estructura
        // "email": "alexcardonal24@gmail.com",
        // "contrasena": "12345678"

        $obtener_usuario = $this->auth_modelo->obtenerEmail($datos_entrada['email']);

        if (!$obtener_usuario || !password_verify($datos_entrada['contrasena'], $obtener_usuario['contrasena'])) {
            
        }

        $token = $this->token->generarToken($obtener_usuario['id']);

        $parametros_respuesta = [
            'success' => true,
            'token' => $token
        ];

        return $parametros_respuesta;
    }

    public function registrarUsuario($datos_entrada)
    {
        // Estructura
        // "nombre": "Alex",
        // "apellidos": "Cardona",
        // "email": "alexcardonal24@gmail.com",
        // "telefono": "1234567890",
        // "contrasena": "12345678"

        $obtener_email = $this->auth_modelo->obtenerEmail($datos_entrada['email']);   
        
        if ($obtener_email) {
            
        }

        $obtener_telefono = $this->auth_modelo->obtenerTelefono($datos_entrada['telefono']);

        if ($obtener_telefono) {
            
        }

        $this->conexion->beginTransaction();

        $registrar_usuario = $this->auth_modelo->registrarUsuario($datos_entrada);

        $id_usuario = $this->auth_modelo->obtenerId();

        $this->conexion->commit();

        $token = $this->token->generarToken($id_usuario, $datos_entrada['rol']);

        $parametros_respuesta = [
            'success' => true,
            'token' => $token
        ];

        return $parametros_respuesta;
    }
}