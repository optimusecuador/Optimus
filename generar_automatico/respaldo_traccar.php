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
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// Asegurar que exista la tabla para el historial de traccar
$conn->query("CREATE TABLE IF NOT EXISTS respaldo_traccar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    archivo VARCHAR(255) NOT NULL,
    fecha VARCHAR(50) NOT NULL
)");

// ==========================================
// CONFIGURACIÓN DE TRUENAS / TRACCAR (SSH)
// ==========================================
$truenas_ip   = '10.9.0.251';
$truenas_port = 22;
$truenas_user = 'nelo416';
$truenas_pass = 'Optimus2023';

$mensaje = '';

// ==========================================
// LÓGICA DE DESCARGA DE RESPALDOS
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
// LÓGICA DE RESTAURACIÓN DE RESPALDO EN TRUENAS
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restaurar_respaldo'])) {
    set_time_limit(0);
    
    $archivo_restaurar = basename($_POST['archivo_restaurar']);
    $ruta_restaurar = $backup_dir . $archivo_restaurar;

    if (file_exists($ruta_restaurar)) {
        $ssh_conn = @ssh2_connect($truenas_ip, $truenas_port);
        
        if (!$ssh_conn || !@ssh2_auth_password($ssh_conn, $truenas_user, $truenas_pass)) {
            $mensaje = "<div class='alert error'>Error: No se pudo establecer conexión SSH con TrueNAS ($truenas_ip). Verifique credenciales o servicio SSH.</div>";
        } else {
            // 1. Transferir el archivo SQL hacia TrueNAS (/tmp)
            $remote_file = "/tmp/" . $archivo_restaurar;
            if (ssh2_scp_send($ssh_conn, $ruta_restaurar, $remote_file, 0644)) {
                
                // 2. Comando para identificar el contenedor de la BD y ejecutar psql para restaurar
                $cmd_restaurar = 'POD_NAME=$(sudo k3s kubectl get pods -A -l app.kubernetes.io/name=traccar --no-headers -o custom-columns=":metadata.name" | grep -i db | head -n 1); ' .
                                 'NAMESPACE=$(sudo k3s kubectl get pods -A -l app.kubernetes.io/name=traccar --no-headers -o custom-columns=":metadata.namespace" | head -n 1); ' .
                                 'if [ -n "$POD_NAME" ]; then ' .
                                 '  sudo k3s kubectl exec -i -n $NAMESPACE $POD_NAME -- psql -U postgres -d traccar < ' . $remote_file . ' 2>&1; ' .
                                 'else ' .
                                 '  echo "Error: No se encontró el Pod/Contenedor de base de datos de Traccar en TrueNAS"; ' .
                                 'fi; ' .
                                 'rm -f ' . $remote_file;

                $stream = ssh2_exec($ssh_conn, $cmd_restaurar);
                stream_set_blocking($stream, true);
                $salida_restaurar = trim(stream_get_contents($stream));
                fclose($stream);

                if (strpos($salida_restaurar, 'Error') !== false) {
                    $mensaje = "<div class='alert error'><strong>Error al restaurar la BD en TrueNAS:</strong><br><code>$salida_restaurar</code></div>";
                } else {
                    $mensaje = "<div class='alert success'>La base de datos de Traccar ha sido restaurada con éxito desde: <strong>{$archivo_restaurar}</strong></div>";
                }
            } else {
                $mensaje = "<div class='alert error'>Error al subir el archivo de respaldo hacia el servidor TrueNAS.</div>";
            }
        }
    } else {
        $mensaje = "<div class='alert error'>El archivo de respaldo seleccionado no existe en el disco.</div>";
    }
}

// ==========================================
// LÓGICA DE CREACIÓN AUTOMÁTICA DE RESPALDO (SSH + TRUENAS)
// ==========================================
if (!isset($_GET['descargar']) && !isset($_POST['restaurar_respaldo'])) {
    
    $fecha_actual = date('Y-m-d_H-i-s');
    $nombre_archivo = 'traccar_' . $fecha_actual . '.sql';
    $ruta_completa = $backup_dir . $nombre_archivo;
    $remote_tmp_file = "/tmp/" . $nombre_archivo;
    
    $ssh_conn = @ssh2_connect($truenas_ip, $truenas_port);
    
    if (!$ssh_conn || !@ssh2_auth_password($ssh_conn, $truenas_user, $truenas_pass)) {
        $mensaje = "<div class='alert error'><strong>Error de conexión SSH:</strong> No se pudo conectar a TrueNAS ($truenas_ip).</div>";
    } else {
        // Comando SSH para buscar el Pod de Postgres en TrueNAS SCALE (Kubernetes/k3s) y volcar la BD
        $cmd_dump = 'POD_NAME=$(sudo k3s kubectl get pods -A -l app.kubernetes.io/name=traccar --no-headers -o custom-columns=":metadata.name" | grep -i db | head -n 1); ' .
                    'NAMESPACE=$(sudo k3s kubectl get pods -A -l app.kubernetes.io/name=traccar --no-headers -o custom-columns=":metadata.namespace" | head -n 1); ' .
                    'if [ -z "$POD_NAME" ]; then ' .
                    '  POD_NAME=$(sudo k3s kubectl get pods -A --no-headers -o custom-columns=":metadata.name" | grep traccar | grep db | head -n 1); ' .
                    '  NAMESPACE=$(sudo k3s kubectl get pods -A --no-headers -o custom-columns=":metadata.namespace" | grep traccar | head -n 1); ' .
                    'fi; ' .
                    'if [ -n "$POD_NAME" ]; then ' .
                    '  sudo k3s kubectl exec -n $NAMESPACE $POD_NAME -- pg_dump -U postgres traccar > ' . $remote_tmp_file . ' 2>&1; ' .
                    'else ' .
                    '  echo "Error: No se encontró el contenedor de PostgreSQL de Traccar en TrueNAS"; ' .
                    'fi;';

        $stream = ssh2_exec($ssh_conn, $cmd_dump);
        stream_set_blocking($stream, true);
        $salida_ssh = trim(stream_get_contents($stream));
        fclose($stream);

        // Descargar el archivo generado vía SCP a la carpeta local del servidor web
        if (ssh2_scp_recv($ssh_conn, $remote_tmp_file, $ruta_completa)) {
            
            // Limpiar el archivo temporal en TrueNAS
            $stream_clean = ssh2_exec($ssh_conn, "rm -f " . $remote_tmp_file);
            fclose($stream_clean);

            if (!file_exists($ruta_completa) || filesize($ruta_completa) === 0) {
                $mensaje = "<div class='alert error'><strong>Error crítico al generar el respaldo de Traccar:</strong> El archivo recibido está vacío.<br><code>$salida_ssh</code></div>";
                if (file_exists($ruta_completa)) unlink($ruta_completa);
            } else {
                $fecha_registro = date('d-m-Y H:i:s');
                $stmt = $conn->prepare("INSERT INTO respaldo_traccar (archivo, fecha) VALUES (?, ?)");
                if ($stmt) {
                    $stmt->bind_param("ss", $nombre_archivo, $fecha_registro);
                    $stmt->execute();
                    $stmt->close();
                }
                
                $result_count = $conn->query("SELECT COUNT(*) FROM respaldo_traccar");
                $total_respaldos = $result_count->fetch_row()[0];
                
                // Rotación de respaldos a máximo 30
                if ($total_respaldos > 30) {
                    $excedente = $total_respaldos - 30;
                    $stmt_old = $conn->prepare("SELECT id, archivo FROM respaldo_traccar ORDER BY id ASC LIMIT ?");
                    $stmt_old->bind_param("i", $excedente);
                    $stmt_old->execute();
                    $result_old = $stmt_old->get_result();
                    
                    while ($viejo = $result_old->fetch_assoc()) {
                        $archivo_a_borrar = $backup_dir . $viejo['archivo'];
                        if (file_exists($archivo_a_borrar)) unlink($archivo_a_borrar);
                        $conn->query("DELETE FROM respaldo_traccar WHERE id = " . $viejo['id']);
                    }
                    $stmt_old->close();
                    $mensaje = "<div class='alert success'>Respaldo automático de Traccar generado con éxito. Se eliminaron archivos antiguos (Límite 30).</div>";
                } else {
                    $mensaje = "<div class='alert success'>Respaldo automático de Traccar generado con éxito. Total actual: $total_respaldos de 30.</div>";
                }
            }
        } else {
            $mensaje = "<div class='alert error'><strong>Error SCP:</strong> No se pudo descargar el archivo de respaldo desde TrueNAS.<br><code>$salida_ssh</code></div>";
        }
    }
}

// Obtener la lista actual de respaldos para la tabla
$result_lista = $conn->query("SELECT * FROM respaldo_traccar ORDER BY id DESC");
?>

<div class="panel-dark">
    <div class="acciones-header">
        <h1>Respaldos de Traccar (TrueNAS 10.9.0.251) - Máximo 30</h1>
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
                            <a href="" class="boton-azul">Descargar</a>
                            <br><br><br>
                            <form method="POST" style="margin: 0;" onsubmit="return confirm('ATENCIÓN: ¿Estás seguro de que deseas restaurar la BD de Traccar en TrueNAS? \n\n¡Esto sobrescribirá toda la base de datos de Traccar actual!');">
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
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
?>