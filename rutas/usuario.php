<?php

use Controladores\PaginaControlador;

if ($ruta['metodo_http'] == 'GET') {
    $pagina_controlador = new PaginaControlador();

    switch ($ruta['ruta'][0]) {
        case '':
            $pagina_controlador->mostrarPagina('usuario/inicio');
            break;
        case 'cliente':
            $_SESSION['modulo'] = 'cliente';
            break;
        case 'creador':
            $_SESSION['modulo'] = 'creador';
            break;
        default:
            http_response_code(404);
            echo "Página del modulo usuario no encontrada";
    }
}