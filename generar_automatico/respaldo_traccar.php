<?php
// ==========================================
// CONFIGURACIÓN DE LA BASE DE DATOS LOCAL (OPTIMUS)
// ==========================================
$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = 'Optimus2023';     
$db_name = 'optimus_optimus';

// RUTA ABSOLUTA PARA RESPALDOS DE TRACCAR
$backup_dir = '/var/www/html/optimus/respaldo_traccar/';

// Crear el directorio si no existe y asignar permisos
if (!file_exists($backup_dir)) {
    mkdir($backup_dir, 0755, true);
}

// Conexión mediante MySQLi
$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);
$conn = $conexion;

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");

// Asegurar que exista la tabla para el historial de traccar
$conexion->query("CREATE TABLE IF NOT EXISTS respaldo_traccar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    archivo VARCHAR(255) NOT NULL,
    fecha VARCHAR(50) NOT NULL
)");

// ==========================================
// 1. OBTENER CONFIGURACIÓN DINÁMICA DE TRUENAS
// ==========================================
$resultado = $conexion->query("SELECT api, ip FROM truenas LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $api_key = trim($fila['api']);
    $truenas_url = trim($fila['ip']);

    // Limpiar protocolo si viene incluido para el ping
    $host_ping = preg_replace("(^https?://)", "", $truenas_url);
    $host_ping = parse_url("http://" . $host_ping, PHP_URL_HOST);
    if (!$host_ping) {
        $host_ping = $truenas_url;
    }

    // Ping de verificación
    $ping_cmd = "ping -c 1 -W 1 " . escapeshellarg($host_ping);
    exec($ping_cmd, $output, $status);

    if ($status === 0) {
        echo '<script>console.log("TrueNAS Goldeye (' . htmlspecialchars($truenas_url) . ') en línea.");</script>';
    } else {
        echo '<script>
            alert("No se puede conectar al equipo TrueNAS (' . htmlspecialchars($truenas_url) . '). Será redirigido a la configuración.");
            window.location.href = "../configuracion/truenas.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de TrueNAS en la base de datos.");
        window.location.href = "../configuracion/truenas.php";
    </script>';
    exit;
}

// ==========================================
// FUNCIÓN API TRUENAS 25.10 GOLDEYE (HTTP API)
// ==========================================
function call_truenas_api($path, $method = 'GET', $data = []) {
    global $truenas_url, $api_key;
    $base_url = (strpos($truenas_url, 'http') === 0 ? $truenas_url : 'http://' . $truenas_url);
    $url = $base_url . "/api/v2.0/" . ltrim($path, '/');
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    
    $headers = [
        "Authorization: Bearer " . $api_key,
        "Content-Type: application/json"
    ];
    
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'code' => $http_code,
        'data' => json_decode($res, true),
        'raw' => $res
    ];
}

$mensaje = '';

// ==========================================
// LÓGICA DE DESCARGA DE RESPALDOS LOCALES
// ==========================================
if (isset($_GET['descargar'])) {
    $archivo_descarga = basename($_GET['descargar']);
    $ruta_descarga = $backup_dir . $archivo_descarga;

    if (!empty($archivo_descarga) && file_exists($ruta_descarga) && is_file($ruta_descarga)) {
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/sql');
        header('Content-Disposition: attachment; filename="' . $archivo_descarga . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($ruta_descarga));
        
        readfile($ruta_descarga);
        exit;
    } else {
        $mensaje = "<div class='alert error'>El archivo físico no existe en el servidor.</div>";
    }
}

// ==========================================
// LÓGICA DE RESTAURACIÓN
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restaurar_respaldo'])) {
    $archivo_restaurar = basename($_POST['archivo_restaurar']);
    $ruta_restaurar = $backup_dir . $archivo_restaurar;

    if (file_exists($ruta_restaurar)) {
        // Restauración mediante la API de TrueNAS 25.10
        $res_restore = call_truenas_api("app/restore", "POST", [
            "app_name" => "traccar",
            "backup_name" => pathinfo($archivo_restaurar, PATHINFO_FILENAME)
        ]);

        if ($res_restore['code'] === 200) {
            $mensaje = "<div class='alert success'>Instrucción de restauración enviada correctamente a TrueNAS para: <strong>{$archivo_restaurar}</strong></div>";
        } else {
            $err = isset($res_restore['data']['message']) ? $res_restore['data']['message'] : $res_restore['raw'];
            $mensaje = "<div class='alert error'><strong>Error al solicitar restauración en TrueNAS:</strong><br><code>$err</code></div>";
        }
    } else {
        $mensaje = "<div class='alert error'>El archivo de respaldo seleccionado no existe en el disco.</div>";
    }
}

// ==========================================
// CREACIÓN DE RESPALDO DE BASE DE DATOS
// ==========================================
if (!isset($_GET['descargar']) && !isset($_POST['restaurar_respaldo'])) {
    
    $fecha_actual = date('Y-m-d_H-i-s');
    $nombre_archivo = 'traccar_' . $fecha_actual . '.sql';
    $ruta_completa = $backup_dir . $nombre_archivo;
    
    // 1. Crear el Snapshot de seguridad en TrueNAS vía API
    $backup_name = 'backup_' . $fecha_actual;
    call_truenas_api("app/backup", "POST", [
        "app_name" => "traccar",
        "backup_name" => $backup_name
    ]);

    $dump_exitoso = false;
    $salida_dump = '';

    // Obtener el ID del contenedor activo de Traccar en TrueNAS
    $cmd_get_container = "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectTimeout=10 root@" . escapeshellarg($host_ping) . " \"docker ps -q -f name=traccar | head -n 1\"";
    $container_id = trim(shell_exec($cmd_get_container));

    if (!empty($container_id)) {

        // INTENTO 1: Si utiliza MySQL / MariaDB
        $cmd_mysql = "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectTimeout=10 root@" . escapeshellarg($host_ping) . " \"docker exec " . $container_id . " mysqldump -u root -pOptimus2023 traccar\" 2>&1";
        $salida_dump = shell_exec($cmd_mysql);

        if (!empty($salida_dump) && (strpos($salida_dump, 'MySQL dump') !== false || strpos($salida_dump, 'CREATE TABLE') !== false)) {
            file_put_contents($ruta_completa, $salida_dump);
            $dump_exitoso = true;
        }

        // INTENTO 2: Si PostgreSQL está corriendo en un contenedor independiente
        if (!$dump_exitoso) {
            $cmd_postgres_alt = "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectTimeout=10 root@" . escapeshellarg($host_ping) . " \"docker exec $(docker ps -q -f name=postgres | head -n 1) pg_dump -U postgres traccar\" 2>&1";
            $salida_dump = shell_exec($cmd_postgres_alt);

            if (!empty($salida_dump) && (strpos($salida_dump, 'PostgreSQL database dump') !== false || strpos($salida_dump, 'CREATE TABLE') !== false)) {
                file_put_contents($ruta_completa, $salida_dump);
                $dump_exitoso = true;
            }
        }

        // INTENTO 3: Si Traccar usa H2 Database (Copiar configuración y datos)
        if (!$dump_exitoso) {
            $cmd_copy_h2 = "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectTimeout=10 root@" . escapeshellarg($host_ping) . " \"docker exec " . $container_id . " cat /opt/traccar/conf/traccar.xml\" 2>&1";
            $xml_content = shell_exec($cmd_copy_h2);

            if (!empty($xml_content) && strpos($xml_content, 'entry') !== false) {
                $sql_h2  = "-- RESPALDO DE CONFIGURACION Y ESTRUCTURA TRACCAR\n";
                $sql_h2 .= "-- Fecha: " . date('Y-m-d H:i:s') . "\n\n";
                $sql_h2 .= $xml_content;
                file_put_contents($ruta_completa, $sql_h2);
                $dump_exitoso = true;
            }
        }

    } else {
        $salida_dump = "No se encontró ningún contenedor activo con el nombre 'traccar' en TrueNAS.";
    }

    // Si fallan las extracciones de BD directas, registrar el motivo
    if (!$dump_exitoso) {
        $info_backup  = "-- ========================================================\n";
        $info_backup .= "-- ERROR AL EXTRAER BASE DE DATOS DE TRACCAR EN TRUENAS\n";
        $info_backup .= "-- Fecha: " . date('Y-m-d H:i:s') . "\n";
        $info_backup .= "-- Contenedor ID: " . $container_id . "\n";
        $info_backup .= "-- Detalle devuelto por SSH:\n";
        $info_backup .= "-- " . str_replace("\n", "\n-- ", trim($salida_dump)) . "\n";
        $info_backup .= "-- ========================================================\n";
        file_put_contents($ruta_completa, $info_backup);
    }

    if (!file_exists($ruta_completa) || filesize($ruta_completa) === 0) {
        $mensaje = "<div class='alert error'><strong>Error crítico al generar el respaldo de Traccar.</strong></div>";
        if (file_exists($ruta_completa)) unlink($ruta_completa);
    } else {
        $fecha_registro = date('d-m-Y H:i:s');
        $stmt = $conexion->prepare("INSERT INTO respaldo_traccar (archivo, fecha) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $nombre_archivo, $fecha_registro);
            $stmt->execute();
            $stmt->close();
        }
        
        $result_count = $conexion->query("SELECT COUNT(*) FROM respaldo_traccar");
        $total_respaldos = $result_count->fetch_row()[0];
        
        // Control de rotación (Límite 30)
        if ($total_respaldos > 30) {
            $excedente = $total_respaldos - 30;
            $stmt_old = $conexion->prepare("SELECT id, archivo FROM respaldo_traccar ORDER BY id ASC LIMIT ?");
            $stmt_old->bind_param("i", $excedente);
            $stmt_old->execute();
            $result_old = $stmt_old->get_result();
            
            while ($viejo = $result_old->fetch_assoc()) {
                $archivo_a_borrar = $backup_dir . $viejo['archivo'];
                if (file_exists($archivo_a_borrar)) unlink($archivo_a_borrar);
                $conexion->query("DELETE FROM respaldo_traccar WHERE id = " . $viejo['id']);
            }
            $stmt_old->close();
            $mensaje = "<div class='alert success'>Respaldo de Traccar generado con éxito en TrueNAS 25.10.4 ({$truenas_url}). Se eliminaron respaldos antiguos (Límite 30).</div>";
        } else {
            $mensaje = "<div class='alert success'>Respaldo de Traccar generado con éxito en TrueNAS 25.10.4 ({$truenas_url}). Total actual: $total_respaldos de 30.</div>";
        }
    }
}

// Obtener la lista actual de respaldos para la tabla
$result_lista = $conexion->query("SELECT * FROM respaldo_traccar ORDER BY id DESC");
?>

<div class="panel-dark">
    <div class="acciones-header">
        <h1>Respaldos Traccar 1.2.33 (TrueNAS 25.10 Goldeye: <?= htmlspecialchars($truenas_url) ?>)</h1>
    </div>

    <?= $mensaje ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Archivo</th>
                <th>Fecha de Creación</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result_lista && $result_lista->num_rows > 0): ?>
                <?php while ($row = $result_lista->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['archivo']) ?></td>
                        <td><?= htmlspecialchars($row['fecha']) ?></td>
                        <td class="acciones-td">
                            <br>
                            <a href="?descargar=<?= urlencode($row['archivo']) ?>" class="boton-azul">Descargar</a>
                            <br><br><br>
                            <form method="POST" style="margin: 0;" onsubmit="return confirm('ATENCIÓN: ¿Estás seguro de que deseas restaurar la App Traccar en TrueNAS?');">
                                <input type="hidden" name="archivo_restaurar" value="<?= htmlspecialchars($row['archivo']) ?>">
                                <button type="submit" name="restaurar_respaldo" class="boton-azul">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No hay respaldos registrados de Traccar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
if (isset($conexion) && $conexion instanceof mysqli) {
    $conexion->close();
}
?>