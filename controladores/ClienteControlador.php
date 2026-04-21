<?php

namespace Controladores;

use Controladores\Controlador;
use Servicios\ClienteServicio;
use Nucleo\ExcepcionPlataforma;
use Exception;

class ClienteControlador extends Controlador
{
    private $cliente_servicio;

    public function __construct()
    {
        parent::__construct();
        $this->cliente_servicio = new ClienteServicio($this->conexion);
    }

    public function actualizarPerfil()
    {
        try {
            $datos = json_decode(file_get_contents('php://input'), true);

            $resultado = $this->cliente_servicio->actualizarPerfil($datos);
            
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

    public function registrarExperiencia()
    {
        
    }

    public function eliminarExperiencia()
    {
        
    }

    public function registrarEducacion()
    {
        
    }

    public function eliminarEducacion()
    {
        
    }

    public function registrarHabilidad()
    {
        
    }

    public function eliminarHabilidad()
    {
        
    }

    public function registrarIdioma()
    {
        
    }

    public function eliminarIdioma()
    {
        
    }

    public function registrarPlantilla()
    {
        
    }

    public function registrarCurriculum()
    {
        
    }

    public function eliminarCurriculum()
    {
        
    }
}
