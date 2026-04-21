<?php

namespace Modelos;

use Modelos\Modelo;

class UsuarioModelo extends Modelo
{
    public function __construct($conexion)
    {
        parent::__construct($conexion);
    }

    public function registrarUsuarioCliente($usuario_id)
    {
        $sql = "INSERT INTO usuarios_clientes (usuario_id)
                VALUES (:usuario_id)";

        $parametros = [
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }
}
