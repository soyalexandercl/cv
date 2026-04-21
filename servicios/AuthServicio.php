<?php

namespace Servicios;

use Modelos\AuthModelo;
use Modelos\UsuarioModelo;

use Nucleo\Token;

use Nucleo\ExcepcionPlataforma;

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
            throw new ExcepcionPlataforma('Credenciales inválidas');
        }

        $token = $this->token->generarToken($obtener_usuario['id']);

        if (!$token) {
            throw new ExcepcionPlataforma('Error al generar el token');
        }

        $_COOKIE['token_acceso'] = $token;

        $_SESSION['modulo'] = 'cliente';

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
        // "email": "alexcardonal24@gmail.com"
        // "contrasena": "12345678"

        $obtener_email = $this->auth_modelo->obtenerEmail($datos_entrada['email']);   
        
        if ($obtener_email) {
            throw new ExcepcionPlataforma('El correo electrónico ya está registrado');
        }

        $this->conexion->beginTransaction();

        $registrar_usuario = $this->auth_modelo->registrarUsuario($datos_entrada);

        if (!$registrar_usuario) {
            $this->conexion->rollBack();

            throw new ExcepcionPlataforma('Error en el registro');
        }

        $usuario_id = $this->auth_modelo->obtenerId();

        $usuario_modelo = new UsuarioModelo($this->conexion);
        $registrar_cliente = $usuario_modelo->registrarUsuarioCliente($usuario_id);

        if (!$registrar_cliente) {
            $this->conexion->rollBack();

            throw new ExcepcionPlataforma('Error en el registro');
        }

        $token = $this->token->generarToken($usuario_id);

        if (!$token) {
            $this->conexion->rollBack();

            throw new ExcepcionPlataforma('Error en el registro');
        }

        $this->conexion->commit();

        $_COOKIE['token_acceso'] = $token;
        
        $_SESSION['modulo'] = 'cliente';
        
        $parametros_respuesta = [
            'success' => true,
            'token' => $token
        ];

        return $parametros_respuesta;
    }
}