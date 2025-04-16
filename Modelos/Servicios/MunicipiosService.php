<?php

namespace Modelos\Servicios;

use Modelos\Repositorios\MunicipioRepositorio;
require_once __DIR__ . '/../Repositorios/MunicipiosRepositorio.php';

class MunicipiosService
{
    private $repositorio;

    public function __construct()
    {
        $this->repositorio = new MunicipioRepositorio();
    }

    public function listarMunicipios()
    {
        return $this->repositorio->obtenerTodos();
    }

    public function obtenerMunicipio($id)
    {
        return $this->repositorio->obtenerPorId($id);
    }

    public function registrarMunicipio(array $datos)
    {
        return $this->repositorio->crear($datos);
    }

    public function editarMunicipio($id, array $datos)
    {
        return $this->repositorio->actualizar($id, $datos);
    }

    public function eliminarMunicipio($id)
    {
        return $this->repositorio->eliminar($id);
    }
}