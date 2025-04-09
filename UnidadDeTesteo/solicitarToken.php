<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../bootstrap.php';

use Modelos\Servicios\passwordService;

$servicio = new passwordService();
$email = 'dposadag1@unicartagena.edu.co';
$resultado = $servicio->enviarTokenRecuperacion($email);

echo "<pre>";
print_r($resultado);
echo "</pre>";