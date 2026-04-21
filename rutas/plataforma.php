<?php

use Controladores\AuthControlador;

$enrutador->agregarRuta('GET', '/iniciar-sesion', AuthControlador::class, 'mostrarInicioSesion');
$enrutador->agregarRuta('GET', '/registrarse', AuthControlador::class, 'mostrarRegistroUsuario');

$enrutador->agregarRuta('POST', '/iniciar-sesion', AuthControlador::class, 'iniciarSesion');
$enrutador->agregarRuta('POST', '/registrarse', AuthControlador::class, 'registrarUsuario');