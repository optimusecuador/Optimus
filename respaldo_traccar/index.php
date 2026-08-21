<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Optimus_plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//setlocale(LC_TIME, 'es_ES', 'esp_esp');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, 'es_ES.UTF-8'); //Linux
/* ===============================
   CONEXION BD  
=================================*/
require('../conectar.php');
$oltconfiguracion = "no";
$mikrotikconfiguracion = "no";
	//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$colorfondo = $crowem['colorfondo'];
			$carpeta = $crowem['carpeta'];
			$tipoempresacontrol = $crowem['tipoempresa'];
			$ip = $crowem['ip'];
			$actualizacionanterior = $crowem['actualizacion'];
			$ivadecimal =(100+$crowem['iva'])/100;
			//#24a5dd
		}
	
	if(isset($_SESSION['password']))
	{

		//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$colorfondo = $crowem['colorfondo'];
			$carpeta = $crowem['carpeta'];
			$tipoempresacontrol = $crowem['tipoempresa'];
			$ip = $crowem['ip'];
			$oltconfiguracion = $crowem['olt'];
			$mikrotikconfiguracion = $crowem['mikrotik'];
			$actualizacionanterior = $crowem['actualizacion'];
			$ivadecimal =(100+$crowem['iva'])/100;
			//#24a5dd
		}

//--BUSCO ACTUALIZACION NUEVA
		$sqlac = "SELECT * from `actualizacion` order by fecha ASC";
		$resultac = mysqli_query($conactualizacion, $sqlac);
		while($crowac = mysqli_fetch_assoc($resultac))
        {
			$actualizacionnueva = $crowac['fecha'];
			
		}
	
	$personal = $_SESSION['password']; 
	
	$contrasenapersonal = $_SESSION['password'];
	$sqlp = "SELECT * from `personal` WHERE `contrasena` LIKE '$contrasenapersonal' order by codigo DESC";
	$resultp = mysqli_query($con, $sqlp);
	while($crowp = mysqli_fetch_assoc($resultp))
    {	
		$sistema = "software";
		$menu = $crowp['puesto'];	
		if ($crowp['puesto'] == "instalador")
		{
			$sistema = "tecnico";
		}
		$puesto_personal=$crowp['puesto'];
		$usuarionombre=$crowp['nombres']." ".$crowp['apellidos'];
		$usuarionombre2=$crowp['nombres'];
		$foto=$crowp['foto'];
		$uno=$crowp['uno'];
		$dos=$crowp['dos'];
		$tres=$crowp['tres'];
		$cuatro=$crowp['cuatro'];
		$cinco 	=$crowp['cinco'];
		$seis 	=$crowp['seis'];
		$siete=$crowp['siete'];
		$ocho=$crowp['ocho'];
		$nueve 	=$crowp['nueve'];
		$diez =$crowp['diez'];
		$once =$crowp['once'];
		$doce =$crowp['doce'];
		$trece=$crowp['trece'];
		$catorce =$crowp['catorce'];
		$quince=$crowp['quince'];
		$diezyseis =$crowp['diezyseis'];
		$diezysiete=$crowp['diezysiete'];
		$diezyocho =$crowp['diezyocho'];
		$diezynueve =$crowp['diezynueve'];
		$veinte =$crowp['veinte'];
		$veinteyuno=$crowp['veinteyuno'];
		$veinteydos=$crowp['veinteydos'];
		$veinteytres=$crowp['veinteytres'];
		$veinteycuatro=$crowp['veinteycuatro'];
		$veinteycinco =$crowp['veinteycinco'];
		$veinteyseis =$crowp['veinteyseis'];
		$veinteysiete=$crowp['veinteysiete'];
		$veinteyocho =$crowp['veinteyocho'];
		$veinteynueve =$crowp['veinteynueve'];
		$treinta =$crowp['treinta'];
		$treintayuno =$crowp['treintayuno'];
		$treintaydos =$crowp['treintaydos'];
		$treintaytres=$crowp['treintaytres'];
		$treintaycuatro=$crowp['treintaycuatro'];
		$treintaycinco=$crowp['treintaycinco'];
		$treintayseis=$crowp['treintayseis'];
		$treintaysiete=$crowp['treintaysiete'];
		$treintayocho =$crowp['treintayocho'];
		$treintaynueve =$crowp['treintaynueve'];
		$cuarenta =$crowp['cuarenta'];

		$cuarentayuno=$crowp['cuarentayuno'];
		$cuarentaydos =$crowp['cuarentaydos'];
		$cuarentaytres =$crowp['cuarentaytres'];
		$cuarentaycuatro =$crowp['cuarentaycuatro'];
		$cuarentaycinco =$crowp['cuarentaycinco'];
		$cuarentayseis =$crowp['cuarentayseis'];
		$cuarentaysiete =$crowp['cuarentaysiete'];
		$cuarentayocho =$crowp['cuarentayocho'];
		$cuarentaynueve =$crowp['cuarentaynueve'];
		$cincuenta =$crowp['cincuenta'];
		$cincuentayuno =$crowp['cincuentayuno'];
		$cincuentaydos =$crowp['cincuentaydos'];
		$cincuentaytres =$crowp['cincuentaytres'];
		$exportar =$crowp['exportar'];
		$cambiarprecio =$crowp['cambiarprecio'];
	}
	// PHP program to get IP address of client
	$IP = $_SERVER['REMOTE_ADDR'];
	// PHP code to get the MAC address of Client
	$MAC = exec('getmac');
	$nombre = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  	// Storing 'getmac' value in $MAC
	$MAC = strtok($MAC, ' ');
	$fecha = date("Y-m-d (H:i:s)", time());
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "s") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//$sql = " INSERT INTO `acceso` ( `usuario`, `fecha`, `url`, `ip`, `mac`, `nombre`) VALUES ( '$personal', '$fecha', '$url', '$IP', '$MAC', '$nombre')"; 
	//mysqli_query($con, $sql);

	}
	else
	{
		echo "no existe variable de sesion iniciada";
	}
	
	
	?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>Global Net</title>
	<!-- Aquí colocas tu icono -->
    <link rel="icon" type="image/x-icon" href="../images/ico.png">
    <link rel="shortcut icon" type="image/x-icon" href="../images/ico.png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head> 
<body>
  <div class="app-shell">
    <aside class="sidebar">
  <a class="brand" href="../resumen/index.php">
    <img src="../img/logo.png" width="186" height="69" alt="Nexus ISP"/>
  </a>

  <nav class="main-nav">
    <details class="menu-section">
      <summary class="menu-label">GESTIÓN</summary>
      <a href="../resumen/index.php"><i data-lucide="home"></i> Resumen</a>
      <a href="../clientes/index.php"><i data-lucide="users"></i> Clientes</a>
      <a href="../cuentas/index.php"><i data-lucide="landmark"></i> Cuentas Bancarias</a>
      <a href="../reportes/index.php"><i data-lucide="bar-chart-3"></i> Reportes</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">OPERACIONES</summary>
      <a href="../productos/productos.php"><i data-lucide="boxes"></i> Inventario</a>
      <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i> Personal</a>
      <a href="../serviciotecnico/index.php"><i data-lucide="wrench"></i> Servicio Técnico</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">INFRAESTRUCTURA</summary>
      <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i> MikroTik</a>
      <a href="https://192.168.8.100/action/login.html" target="new"><i data-lucide="shield-check"></i> OLT</a>
      <a href="http://10.7.0.254:15178/ViewPower/monitor?319" target="new"><i data-lucide="shield-check"></i> Ups</a>
      <a href="../truenas/truenas.php"><i data-lucide="hard-drive"></i> NAS</a>
      <a href="../traccar/traccar.php"><i data-lucide="map-pin"></i> Rastreo</a>
      <a href="../streaming/index.php"><i data-lucide="play-circle"></i> Streaming</a>
      <a href="../peliculas/index.php"><i data-lucide="play-circle"></i> Peliculas</a>
      <a href="../zkteco/index.php"><i data-lucide="fingerprint"></i> ZKTeco</a>
	  <a href="../red/index.php"><i data-lucide="shield-check"></i> Mapeo Red</a>
	  <a href="../redvirtual/index.php"><i data-lucide="shield-check"></i> Red Virtual</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">SISTEMA</summary>
      <a href="../estado/index.php"><i data-lucide="badge-check"></i> Estado Contrato</a>
      <a href="#"><i data-lucide="calculator"></i> Contabilidad</a>
      <a href="../configuracion/index.php"><i data-lucide="settings"></i> Configuración</a>
    </details>
  </nav>
</aside>

<style>
  /* Animación de apertura suave */
  .menu-section[open] {
    animation: fadeIn 0.3s ease-out;
  }
  @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

  .menu-section summary {
    list-style: none;
    cursor: pointer;
    padding: 12px 20px;
    font-size: 0.75rem;
    color: var(--muted);
    font-weight: 800;
    letter-spacing: 0.1em;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: color 0.3s;
  }

  .menu-section summary:hover { color: var(--cyan); }

  .menu-section summary::after {
    content: "chevron-down"; /* Si usas lucide, podrías incluso inyectar un icono aquí */
    content: "▼";
    font-size: 8px;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .menu-section[open] summary::after { transform: rotate(180deg); color: var(--cyan); }

  /* Estilo de los enlaces con efecto de deslizamiento */
  .menu-section a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 20px;
    margin: 2px 10px;
    color: var(--text);
    font-size: 14px;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    border-left: 2px solid transparent;
  }

  /* Efecto llamativo al pasar el ratón */
  .menu-section a:hover {
    background: var(--bg-soft);
    border-left: 2px solid var(--cyan);
    padding-left: 25px; /* Efecto de empuje hacia la derecha */
    color: var(--cyan);
  }

  .menu-section a i {
    transition: transform 0.3s;
  }
  
  .menu-section a:hover i {
    transform: scale(1.2); /* El icono crece un poco */
  }

/* ==== MENU PREMIUM ==== */
.sidebar{background:linear-gradient(180deg,#111827,#0b1220);}
.menu-section{border:1px solid rgba(255,255,255,.05);border-radius:12px;margin:8px;overflow:hidden;transition:.3s}
.menu-section summary{list-style:none;cursor:pointer;padding:14px 18px;font-weight:700;letter-spacing:.08em}
.menu-section summary::-webkit-details-marker{display:none}
.menu-section summary::after{content:"▼";float:right;transition:.3s}
.menu-section[open] summary::after{transform:rotate(180deg)}
.menu-section a{display:flex;gap:12px;padding:11px 18px;margin:4px 8px;border-radius:8px;transition:.25s;text-decoration:none}
.menu-section a:hover{transform:translateX(6px);background:rgba(0,255,255,.08)}

</style>

    <main class="content">
      
      <section class="metric-grid"></section>
      <!-- InstanceBeginEditable name="principal" -->
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
// GENERACIÓN DE RESPALDO (SOLO AL HACER CLICK)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generar_respaldo'])) {
    
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
    <div class="acciones-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Respaldos Traccar 1.2.33 (TrueNAS 25.10.4 Goldeye: <?= htmlspecialchars($truenas_url) ?>:30206)</h1>
        
        <!-- Botón para generar respaldo manualmente -->
        <form method="POST" style="margin: 0;">
            <button type="submit" name="generar_respaldo" class="boton-azul">Generar Respaldo Ahora</button>
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
		<!-- InstanceEndEditable --></main>
  </div>

  <!--<script src="https://unpkg.com/lucide@latest"></script>-->
  <script src="../js/lucide%40latest.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="../js/chart.js"></script>
  <script src="../js/app.js"></script>

<script>
document.querySelectorAll('.menu-section a').forEach(a=>{
 if(a.href===location.href){
   a.style.background='rgba(0,255,255,.12)';
   a.style.color='#00e5ff';
   let d=a.closest('details'); if(d)d.open=true;
 }
});
document.querySelectorAll('.menu-section').forEach(function(menu){
    menu.open = false;
});
</script>

</body>
<!-- InstanceEnd --></html>
