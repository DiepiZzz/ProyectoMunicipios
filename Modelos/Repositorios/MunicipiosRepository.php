<?php
require_once(__DIR__ . '/../Entidades/Municipios.php');

class MunicipiosRepository
{
    public function crear($datos)
    {
        return Municipios::create($datos);
    }

    public function obtenerTodos()
    {
        return Municipios::all();
    }

    public function obtenerPorId($id_municipios)
    {
        return Municipios::find($id_municipios);
    }

    public function actualizar($id_municipios, $datos)
    {
        $municipio = Municipios::find($id_municipios);
        if ($municipio) {
            $municipio->update($datos);
            return $municipio;
        }
        return null;
    }

    public function eliminar($id_municipios)
    {
        $municipio = Municipios::find($id_municipios);
        if ($municipio) {
            $municipio->delete();
            return true;
        }
        return false;
    }
}