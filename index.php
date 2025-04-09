<?php
require_once __DIR__ . '/Controladores/LoginControlador.php';
require_once __DIR__ . '/Controladores/RegistroControlador.php';
require_once __DIR__ . '/Controladores/PasswordControlador.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

$controlador = $_GET['controlador'] ?? 'login';
$accion = $_GET['accion'] ?? 'index';

if ($controlador === 'login') {
    $controladorObj = new \Controladores\LoginControlador();
    if ($accion === 'index') {
        $controladorObj->index();
    } elseif ($accion === 'autenticar') {
        $controladorObj->autenticar();
    }
} elseif ($controlador === 'registro') {
    $controladorObj = new \Controladores\RegistroControlador();
    if ($accion === 'index') {
        $controladorObj->index();
    } elseif ($accion === 'registrar') {
        $controladorObj->registrar();
    }
} elseif ($controlador === 'password') {
    $controladorObj = new \Controladores\PasswordControlador();
    if ($accion === 'solicitar') {
        $controladorObj->solicitar();
    } elseif ($accion === 'enviarToken') {
        $controladorObj->enviarToken();
    } elseif ($accion === 'formularioReset') {
        $controladorObj->mostrarFormularioCambio();
    } elseif ($accion === 'actualizarPassword') {
        $controladorObj->actualizarPassword();
    }
} else {
    echo "Controlador o acción no válida.";
}



