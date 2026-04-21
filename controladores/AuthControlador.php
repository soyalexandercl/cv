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

    public function vista($vista)
    {
        include_once __DIR__ . "/../vistas/componentes/head.php";
        include_once __DIR__ . "/../vistas/plataforma/" . $vista . ".php";
        include_once __DIR__ . "/../vistas/componentes/footer.php";
    }

    public function mostrarInicioSesion()
    {
        $this->vista('inicioSesion');
    }

    public function mostrarRegistroUsuario()
    {
        $this->vista('registroUsuario');
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