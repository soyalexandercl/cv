<?php

namespace Nucleo;

class Enrutador {

    public function procesarRuta()
    {
        $metodo_http = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $ruta = trim($uri, "/");
        $ruta = explode("/", $ruta);

        return [
            'metodo_http' => $metodo_http,
            'ruta' => $ruta
        ];
    }
}