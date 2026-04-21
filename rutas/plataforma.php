<?php

use Controladores\PaginaControlador;
use Controladores\AuthControlador;

$enrutador->agregarRuta('GET', '/iniciar-sesion', PaginaControlador::class, 'mostrarPagina("inicioSesion")');
$enrutador->agregarRuta('GET', '/registrarse', PaginaControlador::class, 'mostrarPagina("registrarse")');

$enrutador->agregarRuta('POST', '/iniciar-sesion', AuthControlador::class, 'iniciarSesion');
$enrutador->agregarRuta('POST', '/registrarse', AuthControlador::class, 'registrarUsuario');