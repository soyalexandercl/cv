<?php

use Controladores\AuthControlador;

$enrutador->agregarRuta('GET', '/login', AuthControlador::class, 'iniciarSesion');
$enrutador->agregarRuta('GET', '/signup', AuthControlador::class, 'registrarUsuario');