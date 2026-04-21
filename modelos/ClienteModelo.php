<?php

namespace Modelos;

use Modelos\Modelo;

class ClienteModelo extends Modelo
{
    public function __construct($conexion)
    {
        parent::__construct($conexion);
    }

    public function registrarCliente($usuario_id)
    {
        $sql = "INSERT INTO clientes (id)
                VALUES (:usuario_id)";

        $parametros = [
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarPerfil($usuario_id)
    {
        $sql = "INSERT INTO clientes_perfiles (id)
                VALUES (:usuario_id)";

        $parametros = [
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function actualizarPerfil($datos)
    {
        $sql = "UPDATE clientes_perfiles
                SET nombre = :nombre, apellidos = :apellidos, email = :email, telefono = :telefono, ciudad = :ciudad
                WHERE id = :usuario_id";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':nombre' => $datos['nombre'],
            ':apellidos' => $datos['apellidos'],
            ':email' => $datos['email'],
            ':telefono' => $datos['telefono'],
            ':ciudad' => $datos['ciudad']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarExperiencia($datos)
    {
        $sql = "INSERT INTO clientes_experiencias (usuario_id, empresa, puesto, fecha_inicio, fecha_fin, descripcion)
                VALUES (:usuario_id, :empresa, :puesto, :fecha_inicio, :fecha_fin, :descripcion)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':empresa' => $datos['empresa'],
            ':puesto' => $datos['puesto'],
            ':fecha_inicio' => $datos['fecha_inicio'],
            ':fecha_fin' => $datos['fecha_fin'],
            ':descripcion' => $datos['descripcion']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function eliminarExperiencia($experiencia_id, $usuario_id)
    {
        $sql = "DELETE FROM clientes_experiencias
                WHERE id = :experiencia_id
                    AND usuario_id = :usuario_id";

        $parametros = [
            ':experiencia_id' => $experiencia_id,
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarFormacion($datos)
    {
        $sql = "INSERT INTO clientes_formaciones (usuario_id, institucion, titulo, fecha_inicio, fecha_fin, descripcion)
                VALUES (:usuario_id, :institucion, :titulo, :fecha_inicio, :fecha_fin, :descripcion)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':institucion' => $datos['institucion'],
            ':titulo' => $datos['titulo'],
            ':fecha_inicio' => $datos['fecha_inicio'],
            ':fecha_fin' => $datos['fecha_fin'],
            ':descripcion' => $datos['descripcion']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function eliminarFormacion($formacion_id, $usuario_id)
    {
        $sql = "DELETE FROM clientes_formaciones
                WHERE id = :formacion_id AND usuario_id = :usuario_id";

        $parametros = [
            ':formacion_id' => $formacion_id,
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarHabilidad($datos)
    {
        $sql = "INSERT INTO clientes_habilidades (usuario_id, habilidad, nivel)
                VALUES (:usuario_id, :habilidad, :nivel)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':habilidad' => $datos['habilidad'],
            ':nivel' => $datos['nivel']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function eliminarHabilidad($habilidad_id, $usuario_id)
    {
        $sql = "DELETE FROM clientes_habilidades
                WHERE id = :habilidad_id AND usuario_id = :usuario_id";

        $parametros = [
            ':habilidad_id' => $habilidad_id,
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarIdioma($datos)
    {
        $sql = "INSERT INTO clientes_idiomas (usuario_id, idioma, nivel)
                VALUES (:usuario_id, :idioma, :nivel)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':idioma' => $datos['idioma'],
            ':nivel' => $datos['nivel']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function eliminarIdioma($idioma_id, $usuario_id)
    {
        $sql = "DELETE FROM clientes_idiomas
                WHERE id = :idioma_id AND usuario_id = :usuario_id";

        $parametros = [
            ':idioma_id' => $idioma_id,
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarPlantilla($datos)
    {
        $sql = "INSERT INTO clientes_plantillas (usuario_id, nombre, contenido)
                VALUES (:usuario_id, :nombre, :contenido)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':nombre' => $datos['nombre'],
            ':contenido' => $datos['contenido']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function registrarCurriculum($datos)
    {
        $sql = "INSERT INTO clientes_curriculums (usuario_id, plantilla_id, nombre)
                VALUES (:usuario_id, :plantilla_id, :nombre)";

        $parametros = [
            ':usuario_id' => $datos['usuario_id'],
            ':plantilla_id' => $datos['plantilla_id'],
            ':nombre' => $datos['nombre']
        ];

        return $this->ejecutar($sql, $parametros);
    }

    public function eliminarCurriculum($curriculum_id, $usuario_id)
    {
        $sql = "DELETE FROM clientes_curriculums
                WHERE id = :curriculum_id AND usuario_id = :usuario_id";

        $parametros = [
            ':curriculum_id' => $curriculum_id,
            ':usuario_id' => $usuario_id
        ];

        return $this->ejecutar($sql, $parametros);
    }
}
