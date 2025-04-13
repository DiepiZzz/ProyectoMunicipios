<?php

namespace Modelos\Repositorios;

use Modelos\Entidades\Usuario;

class UsuarioRepositorio{
    public function obtenerTodos(){
        return Usuario::all();
    }

    public function buscarPorId($id){
        return Usuario::find($id);
    }

    public function crear($datos){
        return Usuario::create($datos);
    }

    public function actualizar($id, $datos){
        $usuario = Usuario::find($id);
        if ($usuario) {
            $usuario->update($datos);
            return $usuario;
        }
        return null;
    }

    public function eliminar($id){
        return Usuario::destroy($id);
    }

    public function obtenerPorUsernameOEmail($usernameOrEmail){
        return Usuario::where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();
    }

    public function obtenerPorEmail($email){

        return Usuario::where('email', $email)->first();
    }

    public function obtenerPorToken($token){
        return Usuario::where('password_reset_token', $token)->first();
    }
}
