<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoSocio = htmlspecialchars($_POST['tipoSocio']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $nombres = htmlspecialchars($_POST['nombres']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $rut = htmlspecialchars($_POST['rut']);
    $calle = htmlspecialchars($_POST['calle']);
    $ciudad = htmlspecialchars($_POST['ciudad']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $mail = htmlspecialchars($_POST['mail']);
    $patrocinante1 = htmlspecialchars($_POST['patrocinante1']);
    $patrocinante2 = htmlspecialchars($_POST['patrocinante2']);

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor de correo
        $mail->isSMTP();
        $mail->Host = 'mail.ecosa.cl'; // Reemplaza con tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'informatica@ecosa.cl'; // Reemplaza con tu correo
        $mail->Password = 'Mcpt14a12'; // Reemplaza con tu contraseña
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom($mail, $nombres);
        $mail->addAddress('informatica@ecosa.cl');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Solicitud de Socio';
        $mail->Body = "Tipo de Socio: $tipoSocio<br>Fecha: $fecha<br>Nombres: $nombres<br>Apellidos: $apellidos<br>RUT: $rut<br>Calle: $calle<br>Ciudad: $ciudad<br>Teléfono: $telefono<br>Mail: $mail<br>Nombre socio patrocinante 1: $patrocinante1<br>Nombre socio patrocinante 2: $patrocinante2";

        $mail->send();
        echo "Correo enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>