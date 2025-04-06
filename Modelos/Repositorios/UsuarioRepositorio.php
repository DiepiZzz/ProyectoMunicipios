<?php

require_once __DIR__ . '/../Entidades/Usuario.php';

class UsuarioRepositorio
{
    public function obtenerTodos()
    {
        return Usuario::all();
    }

    public function buscarPorId($id)
    {
        return Usuario::find($id);
    }

    public function crear($datos)
    {
        return Usuario::create($datos);
    }

    public function actualizar($id, $datos)
    {
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->update($datos);
            return $usuario;
        }
        return null;
    }

    public function eliminar($id)
    {
        return Usuario::destroy($id);
    }
}

?>
