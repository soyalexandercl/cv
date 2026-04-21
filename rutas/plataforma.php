<?php

use Controladores\AuthControlador;

$enrutador->agregarRuta('GET', '/iniciar-sesion', AuthControlador::class, 'vistaInicioSesion');
$enrutador->agregarRuta('GET', '/registrarse', AuthControlador::class, 'vistaRegistroUsuario');

$enrutador->agregarRuta('POST', '/iniciar-sesion', AuthControlador::class, 'iniciarSesion');
$enrutador->agregarRuta('POST', '/registrarse', AuthControlador::class, 'registrarUsuario');