<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';
require_once __DIR__ . '/../Modelos/Entidades/Usuario.php';
require_once __DIR__ . '/../Modelos/Servicios/loginService.php';

require_once __DIR__ . '/../Bootstrap.php';

use Modelos\Servicios\LoginService;

// Datos del usuario a probar
$usernameOrEmail = 'prueba_usuario';         // o también puedes probar con el email
$password = 'contraseña123';                 // contraseña usada al registrar

// Crear instancia del servicio de login
$loginService = new loginService();
$resultado = $loginService->login($usernameOrEmail, $password);

// Mostrar resultado
print_r($resultado);