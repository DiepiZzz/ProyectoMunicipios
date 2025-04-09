<?php

namespace Controladores;

use Modelos\Entidades\Usuario;
use Modelos\Servicios\signUpServices;

class RegistroControlador{
    public function index(){
        require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosRegistro.php';
    }

    public function registrar(){
        $usuario = new Usuario();
        $usuario->username = $_POST['username'] ?? '';
        $usuario->password = $_POST['password'] ?? '';
        $usuario->nombre   = $_POST['nombre'] ?? '';
        $usuario->email    = $_POST['email'] ?? '';

        $servicio = new signUpServices();
        $resultado = $servicio->validateAndRegisterUser($usuario);

        if ($resultado['status'] === 200) {
            $mensaje = $resultado['message'];
            require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosLogin.php';
        } else {
            $errores = $resultado['errors'];
            require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosRegistro.php';
        }
    }
}