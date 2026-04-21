<?php

namespace Servicios;

use Nucleo\Token;
use Modelos\ClienteModelo;

use Nucleo\ExcepcionPlataforma;

class ClienteServicio
{
    private $conexion;
    private $cliente_modelo;
    private $token;

    public function __construct($conexion)
    {
        $this->conexion = $conexion;
        $this->cliente_modelo = new ClienteModelo($conexion);
        $this->token = new Token();
    }

    public function registrarPerfil($datos)
    {
        $datos_token = $this->token->comprobarToken();

        $datos['usuario_id'] = $datos_token->sub;

        if (!$this->cliente_modelo->registrarPerfil($datos)) {
            throw new ExcepcionPlataforma('Error al registrar el perfil');
        }

        return [
            'success' => true,
            'message' => 'Perfil registrado correctamente'
        ];
    }

    public function actualizarPerfil($datos)
    {
        $datos_token = $this->token->comprobarToken();

        $datos['usuario_id'] = $datos_token->sub;
        
        if (!$this->cliente_modelo->actualizarPerfil($datos)) {
            throw new ExcepcionPlataforma('No se pudo actualizar el perfil');
        }

        return [
            'success' => true,
            'message' => 'Perfil actualizado correctamente'
        ];
    }

    public function registrarExperiencia($datos)
    {
        $datos_token = $this->token->comprobarToken();

        $datos['usuario_id'] = $datos_token->sub;
        
        if (!$this->cliente_modelo->registrarExperiencia($datos)) {
            throw new ExcepcionPlataforma('Error al registrar experiencia');
        }

        return [
            'success' => true,
            'message' => 'Experiencia registrada correctamente'
        ];
    }
}
