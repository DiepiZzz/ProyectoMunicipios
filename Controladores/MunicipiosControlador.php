<?php
require_once(__DIR__ . '/../Modelos/Repositorios/MunicipiosRepository.php');

class MunicipioControlador
{
    private $repositorio;

    public function __construct()
    {
        $this->repositorio = new MunicipiosRepository();
    }

    public function crear($datos)
    {
        return $this->repositorio->crear($datos);
    }

    public function listar()
    {
        return $this->repositorio->obtenerTodos();
    }

    public function ver($id)
    {
        return $this->repositorio->obtenerPorId($id);
    }

    public function editar($id, $datos)
    {
        return $this->repositorio->actualizar($id, $datos);
    }

    public function eliminar($id)
    {
        return $this->repositorio->eliminar($id);
    }
}