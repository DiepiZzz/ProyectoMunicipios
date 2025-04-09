<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';
require_once __DIR__ . '/../Modelos/Servicios/signUpServices.php';

use Modelos\Entidades\Usuario;
use Modelos\Servicios\signUpServices;

// Crear usuario de prueba
$usuario = new Usuario();
$usuario->username = 'olas123'; // Nombre de usuario
$usuario->password = '12345678';
$usuario->nombre   = 'ola';
$usuario->email    = 'ola' . rand(1, 1000) . '@example.com'; // evitar duplicados

// Crear servicio y registrar usuario
$signupService = new signUpServices();
$resultado = $signupService->validateAndRegisterUser($usuario);

// Mostrar resultado
print_r($resultado);