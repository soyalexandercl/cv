<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Nucleo\Enrutador;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$enrutador = new Enrutador();
$ruta = $enrutador->procesarRuta();

require_once __DIR__ . '/../rutas/plataforma.php';