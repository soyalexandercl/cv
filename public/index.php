<?php

session_start();

// session_destroy();

require_once __DIR__ . '/../vendor/autoload.php';

use Nucleo\Enrutador;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$enrutador = new Enrutador();
$ruta = $enrutador->procesarRuta();

$modulo = $_SESSION['modulo'] ?? 'plataforma';

require_once __DIR__ . '/../rutas/' . $modulo . '.php';