<?php

namespace Controladores;

use Controladores\Controlador;
use Servicios\AuthServicio;

use Exception;
use Nucleo\ExcepcionPlataforma;

class AuthControlador extends Controlador
{
    private $auth_servicio;

    public function __construct()
    {
        parent::__construct();

        $this->auth_servicio = new AuthServicio($this->conexion);
    }
    public function iniciarSesion()
    {
        try {
            $datos_entrada = json_decode(file_get_contents('php://input'), true);

            $resultado = $this->auth_servicio->iniciarSesion($datos_entrada);

            echo json_encode($resultado);
        } catch (ExcepcionPlataforma $e) {
            $parametros_respuesta = [
                'success' => false,
                'message' => $e->getMessage()
            ];

            echo json_encode($parametros_respuesta);
        } catch (Exception $e) {
            $parametros_respuesta = [
                'success' => false,
                'message' => 'Error inesperado: ' . $e->getMessage()
            ];

            echo json_encode($parametros_respuesta);
        }
    }

    public function registrarUsuario()
    {
        try {
            $datos_entrada = json_decode(file_get_contents('php://input'), true);

            $resultado = $this->auth_servicio->registrarUsuario($datos_entrada);

            echo json_encode($resultado);
        } catch (ExcepcionPlataforma $e) {
            $parametros_respuesta = [
                'success' => false,
                'message' => $e->getMessage()
            ];

            echo json_encode($parametros_respuesta);
        } catch (Exception $e) {
            $parametros_respuesta = [
                'success' => false,
                'message' => 'Error inesperado: ' . $e->getMessage()
            ];

            echo json_encode($parametros_respuesta);
        }
    }
}