<?php

namespace Modelos\Repositorios;


use Modelos\Entidades\Municipios;

class MunicipioRepositorio
{
    public function obtenerTodos()
    {
        return Municipios::all();
    }

    public function obtenerPorId($id)
    {
        return Municipios::find($id);
    }

    public function crear(array $datos)
    {
        return Municipios::create($datos);
    }

    public function actualizar($id, array $datos)
    {
        $municipio = Municipios::find($id);
        if ($municipio) {
            $municipio->update($datos);
            return $municipio;
        }
        return null;
    }

    public function eliminar($id)
    {
        $municipio = Municipios::find($id);
        return $municipio ? $municipio->delete() : false;
    }
}