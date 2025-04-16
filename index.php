<?php
require_once __DIR__ . '/Controladores/LoginControlador.php';
require_once __DIR__ . '/Controladores/RegistroControlador.php';
require_once __DIR__ . '/Controladores/PasswordControlador.php';
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/Controladores/MunicipiosControlador.php';

$controlador = $_GET['controlador'] ?? 'login';
$accion = $_GET['accion'] ?? 'index';

if ($controlador === 'login') {
    $controladorObj = new \Controladores\LoginControlador();
    if ($accion === 'index') {
        $controladorObj->index();
    } elseif ($accion === 'autenticar') {
        $controladorObj->autenticar();
    }elseif ($accion === 'cerrarSesion') { 
        $controladorObj->cerrarSesion();
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
} elseif ($controlador === 'municipios') {
    $controladorObj = new \MunicipiosControlador();

    if ($accion === 'index') {
        $controladorObj->index();
    } elseif ($accion === 'formularioCrear') {
        $controladorObj->crear();
    } elseif ($accion === 'guardar') {
        $controladorObj->guardar();
    } elseif ($accion === 'formularioEditar') {
        $controladorObj->editar();
    } elseif ($accion === 'actualizar') {
        $controladorObj->actualizar();
    } elseif ($accion === 'eliminar') {
        $controladorObj->eliminar();
    }

}

