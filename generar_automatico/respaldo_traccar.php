<?php
// ==========================================
// CONFIGURACIÓN DE LA BASE DE DATOS LOCAL (OPTIMUS)
// ==========================================
$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = 'Optimus2023';     
$db_name = 'optimus_optimus';

// CREDENCIALES DIRECTAS DE TRACCAR
$traccar_user = 'soldaniela416@gmail.com';
$traccar_pass = 'Optimus2023';
$traccar_port = '30206';

// RUTA ABSOLUTA PARA RESPALDOS DE TRACCAR
$backup_dir = '/var/www/html/optimus/respaldo_traccar/';

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

    $host_ping = preg_replace("(^https?://)", "", $truenas_url);
    $host_ping = parse_url("http://" . $host_ping, PHP_URL_HOST);
    if (!$host_ping) {
        $host_ping = $truenas_url;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de TrueNAS en la base de datos.");
        window.location.href = "../configuracion/truenas.php";
    </script>';
    exit;
}

// FUNCIÓN DE LLAMADA A TRUENAS API
function call_truenas_api($path, $method = 'GET', $data = []) {
    global $truenas_url, $api_key;
    $base_url = (strpos($truenas_url, 'http') === 0 ? $truenas_url : 'http://' . $truenas_url);
    $url = $base_url . "/api/v2.0/" . ltrim($path, '/');
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
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
// LÓGICA DE DESCARGA
// ==========================================
if (isset($_GET['descargar'])) {
    $archivo_descarga = basename($_GET['descargar']);
    $ruta_descarga = $backup_dir . $archivo_descarga;

    if (!empty($archivo_descarga) && file_exists($ruta_descarga) && is_file($ruta_descarga)) {
        if (ob_get_level()) {
            ob_end_clean();
        }
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
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
// GENERACIÓN RÁPIDA DE RESPALDO EN PUERTO 30206
// ==========================================
if (!isset($_GET['descargar']) && !isset($_POST['restaurar_respaldo'])) {
    
    $fecha_actual = date('Y-m-d_H-i-s');
    $nombre_archivo = 'traccar_' . $fecha_actual . '.zip';
    $ruta_completa = $backup_dir . $nombre_archivo;
    
    // 1. Snapshot de TrueNAS vía API Goldeye
    $backup_name = 'backup_' . $fecha_actual;
    call_truenas_api("app/backup", "POST", [
        "app_name" => "traccar",
        "backup_name" => $backup_name
    ]);

    // 2. Extraer datos directamente por API REST de Traccar en el puerto 30206
    $traccar_api_base = "http://" . $host_ping . ":" . $traccar_port . "/api";
    
    // Consultar dispositivos
    $ch = curl_init($traccar_api_base . "/devices");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERPWD, "$traccar_user:$traccar_pass");
    curl_setopt($ch, CURLOPT_TIMEOUT, 4);
    $devices_json = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Consultar posiciones
    $ch2 = curl_init($traccar_api_base . "/positions");
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_USERPWD, "$traccar_user:$traccar_pass");
    curl_setopt($ch2, CURLOPT_TIMEOUT, 4);
    $positions_json = curl_exec($ch2);
    curl_close($ch2);

    $dump_exitoso = false;

    if ($http_code === 200 && !empty($devices_json)) {
        // Guardar respaldo JSON completo en archivo ZIP
        $zip = new ZipArchive();
        if ($zip->open($ruta_completa, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $zip->addFromString('devices.json', $devices_json);
            if (!empty($positions_json)) {
                $zip->addFromString('positions.json', $positions_json);
            }
            $zip->addFromString('backup_info.txt', "Backup Traccar 1.2.33 / Puerto " . $traccar_port . " generado el " . date('Y-m-d H:i:s'));
            $zip->close();
            $dump_exitoso = true;
        }
    } else {
        // Fallback rápido por SSH sin bloqueos
        $cmd_quick = "ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null -o ConnectTimeout=2 root@" . escapeshellarg($host_ping) . " \"docker exec \$(docker ps -q -f name=traccar | head -n 1) cat /opt/traccar/data/database.mv.db 2>/dev/null | base64\"";
        $b64_data = shell_exec($cmd_quick);

        if (!empty($b64_data)) {
            $clean_b64 = preg_replace('/[^A-Za-z0-9+\/=]/', '', $b64_data);
            $binary_db = base64_decode($clean_b64);
            if ($binary_db !== false && strlen($binary_db) > 50) {
                $zip = new ZipArchive();
                if ($zip->open($ruta_completa, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                    $zip->addFromString('database.mv.db', $binary_db);
                    $zip->close();
                    $dump_exitoso = true;
                }
            }
        }
    }

    if (!$dump_exitoso) {
        $mensaje = "<div class='alert error'><strong>Snapshot API TrueNAS creado.</strong> No se pudo conectar al puerto {$traccar_port}. Verifica que la IP/Host sea accesible desde este servidor.</div>";
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
            $mensaje = "<div class='alert success'>Respaldo comprimido (.ZIP) generado en puerto {$traccar_port}. Limpieza aplicada (Máximo 30).</div>";
        } else {
            $mensaje = "<div class='alert success'>Respaldo comprimido (.ZIP) generado con éxito desde TrueNAS puerto {$traccar_port}. Total: $total_respaldos de 30.</div>";
        }
    }
}

// Obtener lista para la tabla
$result_lista = $conexion->query("SELECT * FROM respaldo_traccar ORDER BY id DESC");
?>

<div class="panel-dark">
    <div class="acciones-header">
        <h1>Respaldos Traccar 1.2.33 (TrueNAS 25.10.4 Goldeye: <?= htmlspecialchars($truenas_url) ?>:30206)</h1>
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