<?php

namespace Nucleo;

use Exception;

class ExcepcionPlataforma extends Exception
{
    public function __construct($mensaje)
    {
        parent::__construct($mensaje);
    }
}