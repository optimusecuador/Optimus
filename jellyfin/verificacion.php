<?php
// Incluir la conexión a la base de datos
require_once('../conectar.php');

// Capturar los parámetros de la URL
$token = $_GET['token'] ?? '';
$email = urldecode($_GET['email'] ?? '');
$mac   = $_GET['mac'] ?? '';

$estadoMensaje = '';
$tipoAlerta = 'error'; // 'success' o 'error'

if (!empty($token) && !empty($email) && !empty($mac)) {
    
    // 1. Guardar la cookie en el navegador para mantener la sesión del dispositivo por 1 año
    setcookie('dispositivo_mac_token', $mac, time() + (86400 * 365), "/");

    // 2. Verificar si este dispositivo específico ya existe en la base de datos
    $stmtDevice = $conexion->prepare("SELECT id FROM peliculas_usuarios WHERE identificador = ? LIMIT 1");
    if ($stmtDevice) {
        $stmtDevice->bind_param("s", $mac);
        $stmtDevice->execute();
        $resDevice = $stmtDevice->get_result();
        $existeDispositivo = ($resDevice && $resDevice->num_rows > 0);
        $stmtDevice->close();

        if ($existeDispositivo) {
            // El dispositivo ya está registrado, simplemente se actualiza a verificado
            $stmtUpdate = $conexion->prepare("UPDATE peliculas_usuarios SET verificado = 1, mail = ? WHERE identificador = ?");
            $stmtUpdate->bind_param("ss", $email, $mac);
            
            if ($stmtUpdate->execute()) {
                $estadoMensaje = "¡Dispositivo verificado con éxito! Ya puedes acceder a la plataforma.";
                $tipoAlerta = "success";
            } else {
                $estadoMensaje = "Error al actualizar la verificación en la base de datos.";
            }
            $stmtUpdate->close();
        } else {
            // Es un dispositivo nuevo. Contar cuántos dispositivos verificados tiene asociados este correo
            $stmtCount = $conexion->prepare("SELECT COUNT(*) as total FROM peliculas_usuarios WHERE mail = ? AND verificado = 1");
            if ($stmtCount) {
                $stmtCount->bind_param("s", $email);
                $stmtCount->execute();
                $resCount = $stmtCount->get_result()->fetch_assoc();
                $totalDispositivos = $resCount['total'] ?? 0;
                $stmtCount->close();

                if ($totalDispositivos >= 5) {
                    // Se alcanzó el límite permitido
                    $estadoMensaje = "Este correo electrónico ya tiene el límite máximo de 5 dispositivos registrados.";
                    $tipoAlerta = "error";
                } else {
                    // Registrar el nuevo dispositivo
                    $verificado = 1;
                    $contrato = 'VIP'; // Valor por defecto del contrato

                    $stmtInsert = $conexion->prepare("INSERT INTO peliculas_usuarios (mail, identificador, verificado, contrato) VALUES (?, ?, ?, ?)");
                    $stmtInsert->bind_param("ssis", $email, $mac, $verificado, $contrato);

                    if ($stmtInsert->execute()) {
                        $estadoMensaje = "¡Registro y verificación completados con éxito! Dispositivo (" . ($totalDispositivos + 1) . " de 5).";
                        $tipoAlerta = "success";
                    } else {
                        $estadoMensaje = "Error al guardar los datos de verificación: " . $conexion->error;
                    }
                    $stmtInsert->close();
                }
            } else {
                $estadoMensaje = "Error al consultar la cantidad de dispositivos.";
            }
        }
    } else {
        $estadoMensaje = "Error en la consulta a la base de datos.";
    }
} else {
    $estadoMensaje = "Enlace inválido o parámetros incompletos en la URL.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Dispositivo</title>
    <style>
        * { box-sizing: border-box; }
        body {
            background-color: #0b0f19;
            color: #ffffff;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }
        .icon {
            font-size: 50px;
            margin-bottom: 15px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .message {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 25px;
            padding: 12px;
            border-radius: 8px;
        }
        .message.success {
            background-color: #065f46;
            color: #a7f3d0;
            border: 1px solid #047857;
        }
        .message.error {
            background-color: #991b1b;
            color: #fecaca;
            border: 1px solid #b91c1c;
        }
        .btn {
            display: inline-block;
            background-color: #2563eb;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.2s;
        }
        .btn:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="icon">
        <?= $tipoAlerta === 'success' ? '✅' : '⚠️' ?>
    </div>
    
    <div class="title">
        <?= $tipoAlerta === 'success' ? 'Verificación Completada' : 'Error de Verificación' ?>
    </div>

    <div class="message <?= $tipoAlerta ?>">
        <?= htmlspecialchars($estadoMensaje) ?>
    </div>

    <?php if ($tipoAlerta === 'success'): ?>
        <a href="index.php" class="btn">Ir al Catálogo de Películas</a>
    <?php else: ?>
        <a href="index.php" class="btn" style="background-color: #374151;">Volver al Inicio</a>
    <?php endif; ?>
</div>

</body>
</html>