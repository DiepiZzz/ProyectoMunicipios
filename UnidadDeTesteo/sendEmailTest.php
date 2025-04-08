<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Modelos\Servicios\SendEmailService;

// Crear el servicio
$servicio = new SendEmailService();

// Enviar correo a destinatario real
$resultado = $servicio->enviarCorreo(
    'dposadag1@unicartagena.edu.co',  // 📩 Destinatario
    '📧 Prueba de Envío desde PHP Municipios', // 📨 Asunto
    '<h2>Hola 👋</h2><p>Este es un correo de prueba enviado desde la app <strong>PHP Municipios</strong>.</p><p>🚀 Todo funcionando correctamente.</p>' // ✉️ Cuerpo HTML
);

// Imprimir el resultado
print_r($resultado);