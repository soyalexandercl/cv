<?php

use Controladores\PaginaControlador;

if ($ruta['metodo_http'] == 'GET') {
    $pagina_controlador = new PaginaControlador();

    switch ($ruta['ruta'][0]) {
        case 'perfil':
            $pagina_controlador->mostrarPagina('creador/perfil');
            break;
        case 'plantillas':
            if (isset($ruta['ruta'][1])) {
                $pagina_controlador->mostrarPagina('creador/plantilla');
            } else {
                $pagina_controlador->mostrarPagina('creador/plantillas');
            }
            break;
        case 'mis-plantillas':
            $pagina_controlador->mostrarPagina('creador/misPlantillas');
            break;
        case 'crear-plantilla':
            $pagina_controlador->mostrarPagina('creador/crearPlantilla');
            break;
        case 'facturacion':
            $pagina_controlador->mostrarPagina('creador/facturacion');
            break;
        default:
            http_response_code(404);
            echo "Página del modulo creador no encontrada";
    }
} elseif ($ruta['metodo_http'] == 'POST') {

}