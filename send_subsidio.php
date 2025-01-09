<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaSolicitud = htmlspecialchars($_POST['fechaSolicitud']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $nacionalidad = htmlspecialchars($_POST['nacionalidad']);
    $rut = htmlspecialchars($_POST['rut']);
    $domicilio = htmlspecialchars($_POST['domicilio']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $lugarNacimiento = htmlspecialchars($_POST['lugarNacimiento']);
    $paisNacimiento = htmlspecialchars($_POST['paisNacimiento']);
    $fechaNacimiento = htmlspecialchars($_POST['fechaNacimiento']);

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

        // Configuración del charset y codificación
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        // Remitente y destinatario
        $mail->setFrom('informatica@ecosa.cl', 'Solicitud de Subsidio');
        $mail->addAddress('nicolascarmonarioseco@gmail.com');

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Solicitud de Subsidio';
        $mail->Body = "
            Fecha de Solicitud: $fechaSolicitud<br>
            Nombre: $nombre<br>
            Nacionalidad: $nacionalidad<br>
            RUT: $rut<br>
            Domicilio: $domicilio<br>
            Teléfono: $telefono<br>
            Lugar de Nacimiento: $lugarNacimiento<br>
            País de Nacimiento: $paisNacimiento<br>
            Fecha de Nacimiento: $fechaNacimiento
        ";

        $mail->send();
        echo "Correo enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>