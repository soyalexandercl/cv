<?php

namespace Controladores;

use Controladores\Controlador;
use Servicios\AuthServicio;

class AuthControlador extends Controlador
{
    private $auth_servicio;

    public function __construct()
    {
        parent::__construct();

        $this->auth_servicio = new AuthServicio($this->conexion);
    }

    public function mostrarInicioSesion()
    {
        echo "Mostrar inicio de sesión";
    }

    public function mostrarRegistroUsuario()
    {
        echo "Mostrar registro";
    }

    public function iniciarSesion()
    {
        $datos_entrada = json_decode(file_get_contents('php://input'), true);

        $resultado = $this->auth_servicio->iniciarSesion($datos_entrada);

        echo json_encode($resultado);
    }

    public function registrarUsuario()
    {
        $datos_entrada = json_decode(file_get_contents('php://input'), true);

        $resultado = $this->auth_servicio->registrarUsuario($datos_entrada);

        echo json_encode($resultado);
    }
}