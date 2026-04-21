<?php

use Controladores\PaginaControlador;
use Controladores\AuthControlador;

if ($ruta['metodo_http'] == 'GET') {
    $pagina_controlador = new PaginaControlador();

    switch ($ruta['ruta'][0]) {
        case '':
            $pagina_controlador->mostrarPagina('plataforma/inicio');
            break;
        case 'inicio-sesion':
            $pagina_controlador->mostrarPagina('plataforma/inicioSesion');
            break;
        case 'registro':
            $pagina_controlador->mostrarPagina('plataforma/registro');
            break;
        case 'planes':
            $pagina_controlador->mostrarPagina('plataforma/planes');
            break;
        case 'creadores':
            $pagina_controlador->mostrarPagina('plataforma/creadores');
            break;
        default:
            http_response_code(404);
            echo "Página de la plataforma no encontrada";
    }
} elseif ($ruta['metodo_http'] == 'POST') {
    if ($ruta['ruta'][0] == 'auth') {
        switch ($ruta['ruta'][1]) {
            case 'inicio-sesion':
                $auth_controlador = new AuthControlador();
                $auth_controlador->iniciarSesion();
                break;
            case 'registro':
                $auth_controlador = new AuthControlador();
                $auth_controlador->registrarUsuario();
                break;
            default:
                http_response_code(404);
                echo "Página de autenticación no encontrada";
        }
    }
}