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

    public function iniciarSesion()
    {
        echo "Iniciar sesión";
    }

    public function registrarUsuario()
    {
        echo "Registrar usuario";
    }
}