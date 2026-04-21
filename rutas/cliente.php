<?php

use Controladores\PaginaControlador;
use Controladores\ClienteControlador;

if ($ruta['metodo_http'] == 'GET') {
    $pagina_controlador = new PaginaControlador();

    switch ($ruta['ruta'][0]) {
        case '':
            $pagina_controlador->mostrarPagina('cliente/inicio');
            break;
        case 'perfil':
            $pagina_controlador->mostrarPagina('cliente/perfil');
            break;
        case 'experiencia':
            $pagina_controlador->mostrarPagina('cliente/experiencia');
            break;
        case 'educacion':
            $pagina_controlador->mostrarPagina('cliente/educacion');
            break;
        case 'habilidades':
            $pagina_controlador->mostrarPagina('cliente/habilidades');
            break;
        case 'idiomas':
            $pagina_controlador->mostrarPagina('cliente/idiomas');
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
            echo "Página del modulo cliente no encontrada";
    }
} elseif ($ruta['metodo_http'] == 'POST') {
    if ($ruta['ruta'][0] == 'cliente') {
        $cliente_controlador = new ClienteControlador();
        switch ($ruta['ruta'][1]) {
            case 'modificar-perfil':
                $cliente_controlador->modificarPerfil();
                break;
            case 'registrar-experiencia':
                $cliente_controlador->registrarExperiencia();
                break;
            case 'eliminar-experiencia':
                $cliente_controlador->eliminarExperiencia();
                break;
            case 'registrar-educacion':
                $cliente_controlador->registrarEducacion();
                break;
            case 'eliminar-educacion':
                $cliente_controlador->eliminarEducacion();
                break;
            case 'registrar-habilidad':
                $cliente_controlador->registrarHabilidad();
                break;
            case 'eliminar-habilidad':
                $cliente_controlador->eliminarHabilidad();
                break;
            case 'registrar-idioma':
                $cliente_controlador->registrarIdioma();
                break;
            case 'eliminar-idioma':
                $cliente_controlador->eliminarIdioma();
                break;  
            case 'registrar-plantilla':
                $cliente_controlador->registrarPlantilla();
                break;
            case 'registrar-curriculum':
                $cliente_controlador->registrarCurriculum();
                break;
            case 'eliminar-curriculum':
                $cliente_controlador->eliminarCurriculum();
                break;
            default:
                echo "Página de acciones del cliente no encontrada";
        }
    }
}