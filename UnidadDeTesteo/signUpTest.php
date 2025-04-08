<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';
require_once __DIR__ . '/../Modelos/Servicios/signUpServices.php';

use Modelos\Entidades\Usuario;
use Modelos\Servicios\signUpServices;

// Crear usuario de prueba
$usuario = new Usuario();
$usuario->username = 'prueba_usuario';
$usuario->password = 'contraseña123';
$usuario->nombre   = 'Prueba Registro';
$usuario->email    = 'registro_test_' . rand(1, 1000) . '@example.com'; // evitar duplicados

// Crear servicio y registrar usuario
$signupService = new signUpServices();
$resultado = $signupService->validateAndRegisterUser($usuario);

// Mostrar resultado
print_r($resultado);