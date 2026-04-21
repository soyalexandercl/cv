<?php

namespace Controladores;

class PaginaControlador
{
    public function mostrarPagina($pagina)
    {
        include_once __DIR__ . "/../vistas/componentes/head.php";
        include_once __DIR__ . "/../vistas/plataforma/" . $pagina . ".php";
        include_once __DIR__ . "/../vistas/componentes/footer.php";
    }
}