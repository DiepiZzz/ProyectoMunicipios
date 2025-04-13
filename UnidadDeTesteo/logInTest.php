<?php
require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Ajusta si tu path es distinto

use Modelos\Servicios\loginService;


$loginService = new loginService();


$usernameOrEmail = 'olas123'; // O un correo registrado
$password = '12345678';         // Contraseña del usuario registrado


$resultado = $loginService->login($usernameOrEmail, $password);

echo "<pre>";
print_r($resultado);
echo "</pre>";
