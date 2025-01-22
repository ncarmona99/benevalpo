<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptchaSecret = '6Lcw17IqAAAAANxnoOLOCyfn57ABglAsdkfIW1JU';
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "Error: reCAPTCHA verification failed.";
        exit;
    }
    $fechaSolicitud = htmlspecialchars($_POST['fechaSolicitud']);
    $nombre = htmlspecialchars($_POST['nombre']);
    $nacionalidad = htmlspecialchars($_POST['nacionalidad']);
    $rut = htmlspecialchars($_POST['rut']);
    $domicilio = htmlspecialchars($_POST['domicilio']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $lugarNacimiento = htmlspecialchars($_POST['lugarNacimiento']);
    $paisNacimiento = htmlspecialchars($_POST['paisNacimiento']);
    $fechaNacimiento = htmlspecialchars($_POST['fechaNacimiento']);
    $escolaridad = htmlspecialchars($_POST['escolaridad']);
    $idiomaAleman = htmlspecialchars($_POST['idiomaAleman']);
    $comoSupo = htmlspecialchars($_POST['comoSupo']);
    $parteColectividad = htmlspecialchars($_POST['parteColectividad']);
    $descendenciaAlemana = htmlspecialchars($_POST['descendenciaAlemana']);
    $sueldo = htmlspecialchars($_POST['sueldo']);
    $jubilacion = htmlspecialchars($_POST['jubilacion']);
    $honorarios = htmlspecialchars($_POST['honorarios']);
    $montepio = htmlspecialchars($_POST['montepio']);
    $otraAyuda = htmlspecialchars($_POST['otraAyuda']);
    $ingresoEsporadico1 = htmlspecialchars($_POST['ingresoEsporadico1']);
    $ingresoEsporadico2 = htmlspecialchars($_POST['ingresoEsporadico2']);
    $ingresoEsporadico3 = htmlspecialchars($_POST['ingresoEsporadico3']);
    $arriendo = htmlspecialchars($_POST['arriendo']);
    $servicios = htmlspecialchars($_POST['servicios']);
    $telefonoGastos = htmlspecialchars($_POST['telefonoGastos']);
    $alimentacion = htmlspecialchars($_POST['alimentacion']);
    $medicamentos = htmlspecialchars($_POST['medicamentos']);
    $otrosGastos = htmlspecialchars($_POST['otrosGastos']);
    $totalGastos = htmlspecialchars($_POST['totalGastos']);
    $parientesVivos = htmlspecialchars($_POST['parientesVivos']);
    $hijos = htmlspecialchars($_POST['hijos']);
    $esposo = htmlspecialchars($_POST['esposo']);
    

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
        $mail->setFrom('noreply@benevalpo.cl', 'Solicitud de Subsidio');
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
            Fecha de Nacimiento: $fechaNacimiento<br>
            Nivel de Escolaridad: $escolaridad<br>
            Idioma Alemán: $idiomaAleman<br>
            ¿Cómo supo de nuestra institución?: $comoSupo<br>
            ¿Es o fue parte de la colectividad alemana?: $parteColectividad<br>
            Especifique su descendencia alemana: $descendenciaAlemana<br>
            Sueldo: $sueldo<br>
            Jubilación: $jubilacion<br>
            Honorarios: $honorarios<br>
            Montepío: $montepio<br>
            Otra ayuda: $otraAyuda<br>
            Ingreso esporádico 1: $ingresoEsporadico1<br>
            Ingreso esporádico 2: $ingresoEsporadico2<br>
            Ingreso esporádico 3: $ingresoEsporadico3<br>
            Arriendo: $arriendo<br>
            Servicios: $servicios<br>
            Teléfono: $telefonoGastos<br>
            Alimentación: $alimentacion<br>
            Medicamentos: $medicamentos<br>
            Otros gastos: $otrosGastos<br>
            Total de gastos: $totalGastos<br>
            Parientes vivos: $parientesVivos<br>
            Hijos: $hijos<br>
            Esposo/Esposa/Pareja: $esposo<br>
        ";
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['archivo']['tmp_name'];
            $fileName = $_FILES['archivo']['name'];
            $fileSize = $_FILES['archivo']['size'];
            $fileType = $_FILES['archivo']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('pdf', 'png', 'jpg');
            if (in_array($fileExtension, $allowedfileExtensions) && $fileSize <= 5242880) { // 5 MB
                $mail->addAttachment($fileTmpPath, $fileName);
            } else {
                echo "Error: Archivo no permitido o excede el tamaño máximo.";
                exit;
            }
        }
        if (isset($_FILES['archivoDescendencia']) && $_FILES['archivoDescendencia']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['archivoDescendencia']['tmp_name'];
            $fileName = $_FILES['archivoDescendencia']['name'];
            $fileSize = $_FILES['archivoDescendencia']['size'];
            $fileType = $_FILES['archivoDescendencia']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $allowedfileExtensions = array('pdf', 'png', 'jpg');
            if (in_array($fileExtension, $allowedfileExtensions) && $fileSize <= 5242880) { // 5 MB
                $mail->addAttachment($fileTmpPath, $fileName);
            } else {
                echo "Error: Archivo no permitido o excede el tamaño máximo.";
                exit;
            }
        }

        $mail->send();
        echo "Correo enviado exitosamente.";
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>