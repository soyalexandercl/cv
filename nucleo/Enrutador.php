<?php

namespace Nucleo;

class Enrutador {

    private $rutas = [];

    public function agregarRuta($metodo_http, $ruta, $controlador, $metodo) {
        $this->rutas[$metodo_http][$ruta] = [
            'controlador' => $controlador,
            'metodo' => $metodo
        ];
    }

    public function procesarRutas() {

        $metodo_http = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (isset($this->rutas[$metodo_http][$uri])) {
            
            $ruta = $this->rutas[$metodo_http][$uri];
            $controlador = $ruta['controlador'];
            $metodo = $ruta['metodo'];

            if (class_exists($controlador)) {
                $controlador = new $controlador();
                return $controlador->$metodo();
            } else {
                http_response_code(500);

                $parametros_respuesta = [
                    'success' => false,
                    'message' => 'Controlador no encontrado'
                ];
                
                echo json_encode($parametros_respuesta);
            }
        } else {
            http_response_code(404);

            $parametros_respuesta = [
                'success' => false,
                'message' => 'Ruta no encontrada'
            ];

            echo json_encode($parametros_respuesta);
        }
    }
}