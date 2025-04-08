<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Librerias/orm/ConexionBaseDeDatos.php';

use Modelos\Servicios\passwordService;

$service = new passwordService();

$response = $service->cambiarPassword(12, [
    'password_actual' => '12345678',
    'password_nueva' => 'nuevaSegura123',
    'password_nueva_confirmation' => 'nuevaSegura123',
]);

print_r($response);