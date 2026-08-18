<?php
require('../conectar.php');

// Carga manual de PHPMailer desde la ruta especificada
require '../generar_automatico/PHPMailer/src/Exception.php';
require '../generar_automatico/PHPMailer/src/PHPMailer.php';
require '../generar_automatico/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 0. Recibir las variables enviadas por AJAX (JavaScript)
$emailDestino  = $_POST['email'] ?? '';
$contenidoHTML = $_POST['contenido'] ?? '';

if (empty($emailDestino)) {
    die("Error: No se recibió ninguna dirección de correo.");
}

// 1. Obtener credenciales dinámicas de la tabla 'mail'
$sqlMail = "SELECT mail, contrasena FROM `mail` LIMIT 1";
$resultMail = mysqli_query($con, $sqlMail);

if ($resultMail && mysqli_num_rows($resultMail) > 0) {
    $rowMail = mysqli_fetch_assoc($resultMail);
    $smtpUser = $rowMail['mail'];
    $smtpPass = $rowMail['contrasena'];
} else {
    die("Error: No se configuraron las credenciales de correo en la tabla 'mail'.");
}

// 2. Obtener la ruta del logo desde la tabla 'configuracion'
$sqlConfig = "SELECT logo FROM `configuracion` ORDER BY ruc DESC LIMIT 1";
$resultConfig = mysqli_query($con, $sqlConfig);
$logoPath = '';

if ($resultConfig && mysqli_num_rows($resultConfig) > 0) {
    $rowConfig = mysqli_fetch_assoc($resultConfig);
    $logoPath = $rowConfig['logo'];
}

// 3. Envío del correo con PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del Servidor SMTP de Yahoo
    $mail->isSMTP();
    $mail->Host       = 'smtp.mail.yahoo.com';            // Servidor SMTP de Yahoo
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;                        // Tu correo @yahoo.com de la BD
    $mail->Password   = $smtpPass;                        // Contraseña de aplicación de Yahoo
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // TLS
    $mail->Port       = 587;                              // Puerto TLS (o 465 con ENCRYPTION_SMTPS)
    $mail->CharSet    = 'UTF-8';

    // Remitente y Destinatario
    $mail->setFrom($smtpUser, $empresa ?? 'Sistema Optimus');
    $mail->addAddress($emailDestino);

    // Adjuntar el logo en el correo si existe la ruta
    $logoHtml = '';
    if (!empty($logoPath)) {
        $absoluteLogoPath = realpath(__DIR__ . '/' . $logoPath);

        if ($absoluteLogoPath && file_exists($absoluteLogoPath)) {
            $mail->addEmbeddedImage($absoluteLogoPath, 'logo_img', basename($absoluteLogoPath));
            $logoHtml = '<div style="text-align: center; margin-bottom: 20px;"><img src="cid:logo_img" alt="Logo" style="max-width: 200px; height: auto;"></div>';
        }
    }

    // Contenido del Correo
    $mail->isHTML(true);
    $mail->Subject = 'Comprobante de Transferencia de Bodega';
    $mail->Body    = '
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { border-collapse: collapse; width: 100%; }
                td, th { border: 1px solid #ddd; padding: 8px; }
            </style>
        </head>
        <body>' . $logoHtml . '
            <h2>Detalle de Transferencia</h2>' . $contenidoHTML . '
        </body>
        </html>';

    $mail->send();
    echo "El comprobante se ha enviado exitosamente a " . htmlspecialchars($emailDestino);
} catch (Exception $e) {
    echo "No se pudo enviar el correo. Error de PHPMailer: {$mail->ErrorInfo}";
}
?>