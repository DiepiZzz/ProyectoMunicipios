<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Ajusta si tu path es distinto

use Modelos\Servicios\loginService;

// Instancia del servicio de login
$loginService = new loginService();

// Datos de prueba
$usernameOrEmail = 'olas123'; // O un correo registrado
$password = '12345678';         // Contraseña del usuario registrado

// Ejecutar el login
$resultado = $loginService->login($usernameOrEmail, $password);

// Mostrar el resultado
echo "<pre>";
print_r($resultado);
echo "</pre>";