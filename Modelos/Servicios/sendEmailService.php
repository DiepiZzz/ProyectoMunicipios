<?php

namespace Modelos\Servicios;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class sendEmailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        // Configuración del servidor SMTP
        $this->mailer->isSMTP();
        $this->mailer->Host       = 'smtp.gmail.com';   // Cambia según tu servidor
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = 'diepiposa007@gmail.com'; // Tu correo
        $this->mailer->Password   = 'zofhprbsazbqpnmq';      // Tu contraseña o app password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = 587;

        $this->mailer->setFrom('diepiposa007@gmail.com', 'PHP Municipios');
    }

    public function enviarCorreo($para, $asunto, $mensaje)
    {
        try {
            $this->mailer->addAddress($para);
            $this->mailer->Subject = $asunto;
            $this->mailer->Body    = $mensaje;
            $this->mailer->isHTML(true);

            $this->mailer->send();

            return ['status' => 200, 'message' => 'Correo enviado con éxito.'];
        } catch (Exception $e) {
            return ['status' => 500, 'message' => "Error al enviar el correo: {$this->mailer->ErrorInfo}"];
        }
    }
}