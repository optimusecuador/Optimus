<?php
// ==========================================
// CONFIGURACIÓN DE LA BASE DE DATOS
// ==========================================
$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = 'Optimus2023';     
//$db_name = 'optimus_global_telecom';

$db_name = '';

$stmt = mysqli_prepare(
    $conpersonal,
    "SELECT base_datos FROM usuarios WHERE contrasena = ? LIMIT 1"
);

mysqli_stmt_bind_param($stmt, "s", $personal);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if ($fila = mysqli_fetch_assoc($resultado)) {

    $db_name = $fila['base_datos'];

}


// Ahora la variable $db_name contiene el valor recuperado
//echo $db_name;
// Ruta del directorio de respaldos
$backup_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'respaldo' . DIRECTORY_SEPARATOR;

// Crear el directorio si no existe y asignar permisos
if (!file_exists($backup_dir)) {
    mkdir($backup_dir, 0755, true);
}

// Conexión mediante MySQLi (Debe estar descomentada para que funcionen las consultas)
//$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

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
// LÓGICA DE RESTAURACIÓN DE RESPALDO
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['restaurar_respaldo'])) {
    set_time_limit(0);
    
    $archivo_restaurar = basename($_POST['archivo_restaurar']);
    $ruta_restaurar = $backup_dir . $archivo_restaurar;

    if (file_exists($ruta_restaurar)) {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $letra_disco = substr(__DIR__, 0, 2); 
            $ejecutable_mysql = '"' . $letra_disco . '\\xampp\\mysql\\bin\\mysql.exe"';
        } else {
            // En Ubuntu, usualmente 'mysql' es accesible globalmente si está instalado
            $ejecutable_mysql = 'mysql'; 
        }

        $pass_param = empty($db_pass) ? '' : "--password=" . escapeshellarg($db_pass);
        $comando_restaurar = "{$ejecutable_mysql} --user={$db_user} {$pass_param} --host={$db_host} {$db_name} < " . escapeshellarg($ruta_restaurar) . " 2>&1";

        exec($comando_restaurar, $output, $return_var);

        if ($return_var !== 0) {
            $error_sistema = implode("<br>", $output);
            // Si el error es solo un warning de la contraseña, no siempre es fatal, pero lo capturamos
            $mensaje = "<div class='alert error'>
                            <strong>Error al restaurar la base de datos:</strong><br><br>
                            <strong>Código de salida:</strong> $return_var<br>
                            <strong>Mensaje del servidor:</strong> <code>$error_sistema</code>
                        </div>";
        } else {
            $mensaje = "<div class='alert success'>La base de datos ha sido restaurada con éxito desde el archivo: <strong>{$archivo_restaurar}</strong></div>";
        }
    } else {
        $mensaje = "<div class='alert error'>El archivo de respaldo seleccionado no existe en el disco.</div>";
    }
}

// ==========================================
// LÓGICA DE CREACIÓN DE RESPALDO Y ROTACIÓN
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_respaldo'])) {
    
    $fecha_actual = date('Y-m-d_H-i-s');
    $nombre_archivo = $db_name . '_' . $fecha_actual . '.sql';
    $ruta_completa = $backup_dir . $nombre_archivo;
    
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $letra_disco = substr(__DIR__, 0, 2); 
        $ejecutable = '"' . $letra_disco . '\\xampp\\mysql\\bin\\mysqldump.exe"';
    } else {
        $ejecutable = 'mysqldump';
    }
    
    $pass_param = empty($db_pass) ? '' : "--password=" . escapeshellarg($db_pass);
    
    // IMPORTANTE: Se usa --result-file en lugar de ">" para que las advertencias no corrompan el archivo .sql
    $comando = "{$ejecutable} --user={$db_user} {$pass_param} --host={$db_host} {$db_name} --result-file=" . escapeshellarg($ruta_completa) . " 2>&1";
    
    exec($comando, $output, $return_var);
    
    // Ignoramos el return_var si el archivo se creó correctamente, ya que mysqldump suele devolver error en Ubuntu solo por usar la contraseña en texto.
    if (!file_exists($ruta_completa) || filesize($ruta_completa) === 0) {
        $error_sistema = implode("<br>", $output);
        $mensaje = "<div class='alert error'><strong>Error crítico al generar el respaldo:</strong><br><code>$error_sistema</code></div>";
        if (file_exists($ruta_completa)) unlink($ruta_completa);
    } else {
        $fecha_registro = date('d-m-Y H:i:s');
        $stmt = $conn->prepare("INSERT INTO respaldo (archivo, fecha) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $nombre_archivo, $fecha_registro);
            $stmt->execute();
            $stmt->close();
        }
        
        $result_count = $conn->query("SELECT COUNT(*) FROM respaldo");
        $total_respaldos = $result_count->fetch_row()[0];
        
        if ($total_respaldos > 30) {
            $excedente = $total_respaldos - 30;
            $stmt_old = $conn->prepare("SELECT id, archivo FROM respaldo ORDER BY id ASC LIMIT ?");
            $stmt_old->bind_param("i", $excedente);
            $stmt_old->execute();
            $result_old = $stmt_old->get_result();
            
            while ($viejo = $result_old->fetch_assoc()) {
                $archivo_a_borrar = $backup_dir . $viejo['archivo'];
                if (file_exists($archivo_a_borrar)) unlink($archivo_a_borrar);
                $conn->query("DELETE FROM respaldo WHERE id = " . $viejo['id']);
            }
            $stmt_old->close();
            $mensaje = "<div class='alert success'>Respaldo creado con éxito. Se eliminaron archivos antiguos (Límite 30).</div>";
        } else {
            $mensaje = "<div class='alert success'>Respaldo creado con éxito. Total actual: $total_respaldos de 30.</div>";
        }
    }
}

// Obtener la lista actual de respaldos para la tabla
$result_lista = $conn->query("SELECT * FROM respaldo ORDER BY id DESC");
?>

<div class="panel-dark">
    <div class="acciones-header">
        <h1>Respaldos del Sistema (Máximo 30)</h1>
        <form method="POST">
            <button type="submit" name="crear_respaldo" class="boton-azul">Generar Nuevo Respaldo</button>
        </form>
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
                            <form method="POST" style="margin: 0;" onsubmit="return confirm('ATENCIÓN: ¿Estás seguro de que deseas restaurar este respaldo? \n\n¡Esto sobrescribirá toda la base de datos actual y los datos no guardados se perderán permanentemente!');">
                                <input type="hidden" name="archivo_restaurar" value="<?= htmlspecialchars($row['archivo']) ?>">
                                <button type="submit" name="restaurar_respaldo" class="boton-azul">Restaurar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align: center;">No hay respaldos registrados en la base de datos.</td>
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