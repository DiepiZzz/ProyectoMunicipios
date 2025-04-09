<?php

namespace Modelos\Servicios;

use Illuminate\Hashing\BcryptHasher;
use Modelos\Repositorios\UsuarioRepositorio;
use Modelos\Servicios\sendEmailService;

class passwordService{
    public function enviarTokenRecuperacion($email){
        $repositorio = new UsuarioRepositorio();
        $usuario = $repositorio->obtenerPorEmail($email);

        if (!$usuario) {
            return [
                'status' => 404,
                'message' => 'No existe un usuario con ese correo.'
            ];
        }

        $token = bin2hex(random_bytes(32));
        $expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $usuario->password_reset_token = $token;
        $usuario->token_expiracion = $expiracion;
        $usuario->save();

        $emailService = new sendEmailService();
        $mensaje = "Hola {$usuario->nombre},<br><br>"
            . "Haz clic en el siguiente enlace para cambiar tu contraseña:<br><br>"
            . "<a href='http://localhost/Php_Municipios/index.php?controlador=password&accion=formularioReset&token={$token}'>Cambiar contraseña</a><br><br>"
            . "Este enlace expirará en 1 hora.";

        return $emailService->enviarCorreo($usuario->email, 'Recuperar contraseña', $mensaje);
    }

    public function cambiarPasswordConToken($token, $nuevaPassword){
        $repositorio = new UsuarioRepositorio();
        $usuario = $repositorio->obtenerPorToken($token); // Este método lo definimos abajo

        if (!$usuario) {
            return [
                'status' => 404,
                'message' => 'Token inválido.'
            ];
        }

        // Verifica que el token no esté expirado
        if (strtotime($usuario->token_expiracion) < time()) {
            return [
                'status' => 410,
                'message' => 'El token ha expirado.'
            ];
        }

        $hasher = new BcryptHasher();
        $usuario->password = $hasher->make($nuevaPassword);
        $usuario->password_reset_token = null;
        $usuario->token_expiracion = null;
        $usuario->save();

        return [
            'status' => 200,
            'message' => 'Contraseña actualizada correctamente.'
        ];
    }
}
