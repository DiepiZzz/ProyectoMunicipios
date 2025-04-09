<?php

namespace Controladores;

use Modelos\Servicios\passwordService;

class PasswordControlador{
    public function solicitar(){
        require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosSolicitarRecuperacion.php';
    }

    public function enviarToken()
    {
        $email = $_POST['email'] ?? '';
        $servicio = new passwordService();
        $respuesta = $servicio->enviarTokenRecuperacion($email);
        $mensaje = $respuesta['message'];
        require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosSolicitarRecuperacion.php';
    }

    public function mostrarFormularioCambio(){
    // Recibe el token por la URL
    $token = $_GET['token'] ?? '';

    // Puedes pasarlo a la vista si querés hacer debug o validación previa
    require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosCambiarPassword.php';
}

public function actualizarPassword(){
    $token = $_POST['token'] ?? '';
    $nuevaPassword = $_POST['nueva_password'] ?? '';

    $servicio = new \Modelos\Servicios\passwordService();
    $respuesta = $servicio->cambiarPasswordConToken($token, $nuevaPassword);

    $mensaje = $respuesta['message'];
    require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosSolicitarRecuperacion.php';
}
}