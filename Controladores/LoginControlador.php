<?php

namespace Controladores;

use Modelos\Servicios\LoginService;

class LoginControlador
{
    public function index()
    {
        require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosLogin.php';
    }

    public function autenticar()
    {
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        $servicio = new loginService();
        $resultado = $servicio->login($usuario, $password);

        if ($resultado['status'] === 200) {
            session_start();
            $_SESSION['usuario'] = $resultado['usuario'];
            $mensaje = 'Bienvenido ' . $resultado['usuario']['nombre'] . ', Redirigiendo al formulario de municipios...';

            echo '<script>
            setTimeout(function() {
                window.location.href = "index.php?controlador=municipios&accion=index";
            }, 3000);
        </script>';

            require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosLogin.php';
            return;
        } else {
            $mensaje = $resultado['message'] ?? implode(', ', $resultado['errors']);
            require_once __DIR__ . '/../Vista/forms/Usuarios/UsuariosLogin.php';
        }
    }

 
    public function cerrarSesion() {
        session_start();
        session_unset(); 
        session_destroy(); 
    
        header('Location: index.php?controlador=login&accion=index');
        exit;
    }
}
