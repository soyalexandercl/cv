<?php

use Controladores\PaginaControlador;
use Controladores\AuthControlador;

if ($ruta['metodo_http'] == 'GET') {
    $pagina_controlador = new PaginaControlador();

    if (isset($_SESSION['modulo'])) {
        switch ($_SESSION['modulo']) {
            case 'cliente':
                switch ($ruta['ruta'][0]) {
                    case 'perfil':
                        $pagina_controlador->mostrarPagina('cliente/perfil');
                        break;
                    case 'plantillas':
                        if (isset($ruta['ruta'][1])) {
                            // Logica (controlador) para extraer los datos de la plantilla y mostrarlos en la vista
                            $pagina_controlador->mostrarPagina('cliente/plantilla');
                        } else {
                            $pagina_controlador->mostrarPagina('cliente/plantillas');
                        }
                        break;
                    case 'mis-plantillas':
                        // Mis plantillas es diferente al listado de plantillas del cliente, esto es a las plantillas que
                        // el cliente ha comprado, mientras que el listado de plantillas del creador es a las plantillas
                        // que el creador ha subido a la plataforma

                        // Logica (controlador) para extraer los datos de las plantillas que el cliente ha comprado y
                        // mostrarlos en la vista
                        $pagina_controlador->mostrarPagina('cliente/misPlantillas');
                        break;
                    case 'facturacion':
                        // Logica (controlador) para extraer los datos de la facturación y mostrarlos en la vista
                        $pagina_controlador->mostrarPagina('cliente/facturacion');
                        break;
                    default:
                        http_response_code(404);
                        echo "Página del modulo cliente no encontrada";
                }
                break;
            case 'creador':
                switch ($ruta['ruta'][0]) {
                    case 'perfil':
                        $pagina_controlador->mostrarPagina('creador/perfil');
                        break;
                    case 'plantillas':
                        if (isset($ruta['ruta'][1])) {
                            // Logica (controlador) para extraer los datos de la plantilla y mostrarlos en la vista
                            $pagina_controlador->mostrarPagina('cliente/plantilla');
                        } else {
                            $pagina_controlador->mostrarPagina('cliente/plantillas');
                        }
                        break;
                    case 'mis-plantillas':
                        // Mis plantillas es diferente al listado de plantillas del cliente, esto es a las plantillas que
                        // el creador ha subido a la plataforma, mientras que el listado de plantillas del cliente es a
                        // las plantillas que el cliente ha comprado

                        // Logica (controlador) para extraer los datos de las plantillas que el creador ha subido a la
                        // plataforma y mostrarlos en la vista
                        $pagina_controlador->mostrarPagina('cliente/misPlantillas');
                        break;
                    case 'crear-plantilla':
                        $pagina_controlador->mostrarPagina('creador/crearPlantilla');
                        break;
                    case 'facturacion':
                        // Logica (controlador) para extraer los datos de la facturación y mostrarlos en la vista
                        $pagina_controlador->mostrarPagina('creador/facturacion');
                        break;
                    default:
                        http_response_code(404);
                        echo "Página del modulo creador no encontrada";
                }
                break;
            default:
                http_response_code(404);
                echo "Modulo no encontrado";
        }
    } else {
        switch ($ruta['ruta'][0]) {
            case 'iniciar-sesion':
                $pagina_controlador->mostrarPagina('plataforma/inicioSesion');
                break;
            case 'registrarse':
                $pagina_controlador->mostrarPagina('plataforma/registro');
                break;
            case 'planes':
                // Logica (controlador) para extraer los datos de los planes y mostrarlos en la vista
                $pagina_controlador->mostrarPagina('plataforma/planes');
                break;
            case 'creadores':
                $pagina_controlador->mostrarPagina('plataforma/creadores');
                break;
            default:
                http_response_code(404);
                echo "Página de la plataforma no encontrada";
        }
    }
} elseif ($ruta['metodo_http'] == 'POST') {
    if ($ruta['ruta'][0] == 'auth') {
        switch ($ruta['ruta'][1]) {
            case 'iniciar-sesion':
                $auth_controlador = new AuthControlador();
                $auth_controlador->iniciarSesion();
                break;
            case 'registrarse':
                $auth_controlador = new AuthControlador();
                $auth_controlador->registrarUsuario();
                break;
            default:
                http_response_code(404);
                echo "Página de autenticación no encontrada";
        }
    } else if ($ruta['ruta'][0] == 'cliente') {

    } else if ($ruta['ruta'][0] == 'creador') {

    } else {
        http_response_code(404);
        echo "Página de la plataforma no encontrada";
    }
} else {
    http_response_code(405);
    echo "Método HTTP no permitido";
}