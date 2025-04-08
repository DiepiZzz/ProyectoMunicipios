<?php

namespace Modelos\Servicios;

use Illuminate\Hashing\BcryptHasher;
use Modelos\Repositorios\UsuarioRepositorio;

class passwordService {

    public function cambiarPassword($id_usuario, $datos) {

        $repositorio = new UsuarioRepositorio();
        $usuario = $repositorio->buscarPorId($id_usuario);

        if (!$usuario) {
            return [
                'status' => 404,
                'message' => 'Usuario no encontrado.'
            ];
        }

        $hasher = new BcryptHasher();

        // Verificar contraseña actual
        if (!$hasher->check($datos['password_actual'], $usuario->password)) {
            return [
                'status' => 401,
                'message' => 'La contraseña actual es incorrecta.'
            ];
        }

        // Hashear nueva contraseña
        $usuario->password = $hasher->make($datos['nueva_password']);
        $usuario->save();

        return [
            'status' => 200,
            'message' => 'Contraseña actualizada correctamente.'
        ];
    }
}