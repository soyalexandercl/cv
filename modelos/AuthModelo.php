<?php

namespace Modelos;

use Modelos\Modelo;

class AuthModelo extends Modelo
{
    public function __construct($conexion)
    {
        parent::__construct($conexion);
    }

    public function registrarUsuario($datos)
    {
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, contrasena)
                VALUES (:nombre, :apellidos, :email, :contrasena)";

        $parametros = [
            ':nombre' => $datos['nombre'],
            ':apellidos' => $datos['apellidos'],
            ':email' => $datos['email'],
            ':contrasena' => password_hash($datos['contrasena'], PASSWORD_BCRYPT)
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function obtenerEmail($email)
    {
        $sql = "SELECT *
                FROM usuarios
                WHERE email = :email
                LIMIT 1";

        $parametros = [':email' => $email];

        return $this->obtenerUno($sql, $parametros);
    }

    public function obtenerTelefono($telefono)
    {
        $sql = "SELECT *
                FROM usuarios
                WHERE telefono = :telefono
                LIMIT 1";

        $parametros = [':telefono' => $telefono];

        return $this->obtenerUno($sql, $parametros);
    }
}