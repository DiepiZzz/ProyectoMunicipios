<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Modelos\Servicios\SendEmailService;


$servicio = new SendEmailService();


$resultado = $servicio->enviarCorreo(
    'dposadag1@unicartagena.edu.co', 
    '📧 Prueba de Envío desde PHP Municipios',
    '<h2>Hola 👋</h2><p>Este es un correo de prueba enviado desde la app <strong>PHP Municipios</strong>.</p><p>🚀 Todo funcionando correctamente.</p>' // ✉️ Cuerpo HTML
);


print_r($resultado);