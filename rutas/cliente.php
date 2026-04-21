<?php

if ($ruta['metodo_http'] == 'GET') {
    switch ($ruta['ruta'][0]) {
        case 'perfil':
            $pagina_controlador->mostrarPagina('cliente/perfil');
            break;
        case 'plantillas':
            if (isset($ruta['ruta'][1])) {
                $pagina_controlador->mostrarPagina('cliente/plantilla');
            } else {
                $pagina_controlador->mostrarPagina('cliente/plantillas');
            }
            break;
        case 'mis-plantillas':
            $pagina_controlador->mostrarPagina('cliente/misPlantillas');
            break;
        case 'facturacion':
            $pagina_controlador->mostrarPagina('cliente/facturacion');
            break;
        default:
            http_response_code(404);
            echo "Página del modulo cliente no encontrada";
    }
} elseif ($ruta['metodo_http'] == 'POST') {

}