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
// Configuración de errores y tiempo límite de ejecución
ini_set('display_errors', 1);
error_reporting(E_ALL);
set_time_limit(600); // 10 minutos máximo

// Reutilizar la conexión a la base de datos existente
require_once __DIR__ . '/../conectar.php';

// Directorios del sistema
$dir_base = '/var/www/ALMACENAMIENTO';
$dir_portadas = realpath(__DIR__ . '/../peliculas') ? realpath(__DIR__ . '/../peliculas') . '/portadas' : __DIR__ . '/../peliculas/portadas';

// Límite máximo de archivos a procesar
$limite_maximo = 10;

// Crear carpeta de portadas local si no existe
if (!file_exists($dir_portadas)) {
    mkdir($dir_portadas, 0755, true);
}

if (!is_dir($dir_base)) {
    die("Error: La ruta '$dir_base' no existe o el servidor web no tiene permisos de lectura.");
}

// Extensiones de video permitidas (en minúsculas)
$extensiones_permitidas = ['mp4', 'mkv', 'avi', 'mov', 'wmv', 'flv', 'webm', 'm4v'];

/**
 * Limpia el nombre del archivo quitando términos técnicos para mejorar las búsquedas
 */
function limpiarNombrePelicula($nombre) {
    // Reemplazar puntos, guiones e infi
    $limpio = preg_replace('/[._-]/', ' ', $nombre);
    // Quitar resoluciones, códigos y etiquetas comunes de lanzamientos
    $patrones = '/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl|webrip|hdrip|x264|x265|hevc|aac|dvdrip)\b/i';
    $limpio = preg_replace($patrones, '', $limpio);
    // Quitar años encerrados o sueltos si están al final (ej: 2021)
    $limpio = preg_replace('/\b(19|20)\d{2}\b/', '', $limpio);
    return trim(preg_replace('/\s+/', ' ', $limpio));
}

/**
 * Busca la película en internet, descarga la imagen localmente y retorna la URL remota de la portada
 */
function procesarPortada($nombreArchivo, $dirPortadas) {
    $nombreLimpio = limpiarNombrePelicula($nombreArchivo);
    
    // Si la limpieza dejó el nombre vacío, usar el original
    $query = !empty($nombreLimpio) ? $nombreLimpio : $nombreArchivo;
    
    // API de iTunes (Búsqueda en español e internacional)
    $urlApi = "https://itunes.apple.com/search?term=" . urlencode($query) . "&media=movie&limit=1";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlApi);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Evitar bloqueos de certificado SSL
    curl_setopt($ch, CURLOPT_TIMEOUT, 6);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $data = json_decode($response, true);
        if (isset($data['results'][0]['artworkUrl100'])) {
            // URL original remota de la portada (en resolución 600x600 px)
            $urlPortadaRemota = str_replace('100x100bb', '600x600bb', $data['results'][0]['artworkUrl100']);
            
            // 1. Descargar la imagen a la carpeta local ../peliculas/portadas
            $nombreImagenLocal = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nombreArchivo) . '.jpg';
            $rutaImagenLocal = $dirPortadas . '/' . $nombreImagenLocal;

            $chImg = curl_init($urlPortadaRemota);
            $fp = fopen($rutaImagenLocal, 'wb');
            curl_setopt($chImg, CURLOPT_FILE, $fp);
            curl_setopt($chImg, CURLOPT_HEADER, 0);
            curl_setopt($chImg, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($chImg, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($chImg, CURLOPT_TIMEOUT, 10);
            curl_exec($chImg);
            curl_close($chImg);
            fclose($fp);

            // 2. Retornar la URL directa de la portada en internet para guardar en la BD
            return $urlPortadaRemota;
        }
    }

    return '0'; // Valor predeterminado en la base de datos si no encuentra portada
}

$archivos_procesados = 0;
$portadas_encontradas = 0;

// Recorrido recursivo del directorio
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir_base, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

// Detección del motor de base de datos ($pdo o $conn)
if (isset($pdo) && $pdo instanceof PDO) {
    // === Conexión vía PDO ===
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, fecha, pelicula_url, portada_url) 
            VALUES (NULL, :id_categoria, :nombre, :descripcion, :fecha, :pelicula_url, :portada_url)";
    $stmt = $pdo->prepare($sql);

    foreach ($iterator as $item) {
        if ($archivos_procesados >= $limite_maximo) {
            break; // Detener el bucle al alcanzar el límite de 10
        }

        if ($item->isFile()) {
            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $categoria = basename($item->getPath());
                $fecha = date('Y-m-d H:i:s', $item->getMTime());
                $ruta_completa = str_replace('\\', '/', $item->getPathname());

                // Procesar la portada y obtener su URL en internet
                $portada_url = procesarPortada($nombre, $dir_portadas);
                if ($portada_url !== '0') {
                    $portadas_encontradas++;
                }

                $stmt->execute([
                    ':id_categoria' => $categoria,
                    ':nombre'       => $nombre,
                    ':descripcion'  => 'Archivo escaneado automáticamente',
                    ':fecha'        => $fecha,
                    ':pelicula_url' => $ruta_completa,
                    ':portada_url'  => $portada_url
                ]);

                $archivos_procesados++;
            }
        }
    }
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    // === Conexión vía MySQLi ===
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, fecha, pelicula_url, portada_url) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($iterator as $item) {
        if ($archivos_procesados >= $limite_maximo) {
            break; // Detener el bucle al alcanzar el límite de 10
        }

        if ($item->isFile()) {
            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $categoria = basename($item->getPath());
                $fecha = date('Y-m-d H:i:s', $item->getMTime());
                $ruta_completa = str_replace('\\', '/', $item->getPathname());
                $descripcion = 'Archivo escaneado automáticamente';

                // Procesar la portada y obtener su URL en internet
                $portada_url = procesarPortada($nombre, $dir_portadas);
                if ($portada_url !== '0') {
                    $portadas_encontradas++;
                }

                $stmt->bind_param('ssssss', $categoria, $nombre, $descripcion, $fecha, $ruta_completa, $portada_url);
                $stmt->execute();

                $archivos_procesados++;
            }
        }
    }
    $stmt->close();
} else {
    die("Error: No se encontró la variable de conexión ($pdo o $conn) desde ../conectar.php.");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Indexación</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; }
        .success { color: #27ae60; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Escaneo de películas finalizado</h1>
        <p class="success">Se insertaron <?php echo $archivos_procesados; ?> películas en la tabla <code>peliculas</code> (límite alcanzado).</p>
        <p><strong>Portadas obtenidas:</strong> <?php echo $portadas_encontradas; ?> / <?php echo $archivos_procesados; ?></p>
        <p><strong>URL de portada:</strong> Se guardó la dirección web pública de la imagen en la tabla <code>peliculas.portada_url</code>.</p>
        <p><strong>Copia local guardada en:</strong> <?php echo htmlspecialchars($dir_portadas); ?></p>
    </div>
</body>
</html>
		<!-- InstanceEndEditable --></main>
  </div>

  <!--<script src="https://unpkg.com/lucide@latest"></script>-->
  <script src="../js/lucide@latest.js"></script>
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
