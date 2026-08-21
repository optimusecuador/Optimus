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
set_time_limit(600); 

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

// Extensiones de video permitidas
$extensiones_permitidas = ['mp4', 'mkv', 'avi', 'mov', 'wmv', 'flv', 'webm', 'm4v'];

// =========================================================================
// OBTIENE API KEY Y TOKEN DESDE LA TABLA `tmdb`
// =========================================================================
$tmdb_api_key = '';
$tmdb_bearer_token = '';

if (isset($pdo) && $pdo instanceof PDO) {
    $stmt_tmdb = $pdo->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($row_tmdb = $stmt_tmdb->fetch(PDO::FETCH_ASSOC)) {
        $tmdb_api_key = $row_tmdb['api'] ?? '';
        $tmdb_bearer_token = $row_tmdb['token'] ?? '';
    }
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $res_tmdb = $conn->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($res_tmdb && $row_tmdb = $res_tmdb->fetch_assoc()) {
        $tmdb_api_key = $row_tmdb['api'] ?? '';
        $tmdb_bearer_token = $row_tmdb['token'] ?? '';
    }
}

if (empty($tmdb_api_key) && empty($tmdb_bearer_token)) {
    die("Error: No se encontraron las credenciales de TMDb en la tabla 'tmdb'.");
}

/**
 * Consulta la API JSON de TMDb
 */
function ejecutarCurlTmdb($url, $token = '') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);

    if (!empty($token)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . trim($token),
            'Accept: application/json'
        ]);
    }

    $respuesta = curl_exec($ch);
    curl_close($ch);
    return $respuesta;
}

/**
 * Descarga archivos binarios de imagen sin enviar Tokens de API
 */
function descargarImagenDirecta($urlImagen) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlImagen);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    
    $data = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $data !== false) {
        return $data;
    }
    return false;
}

/**
 * Obtiene el mapa completo de géneros/categorías desde TMDb en español
 */
function obtenerMapaCategoriasTmdb($apiKey, $bearerToken) {
    $params = ['language' => 'es-MX'];
    if (!empty($apiKey)) {
        $params['api_key'] = trim($apiKey);
    }
    $urlGenres = "https://api.themoviedb.org/3/genre/movie/list?" . http_build_query($params);
    $json = ejecutarCurlTmdb($urlGenres, $bearerToken);
    
    $mapa = [];
    if ($json) {
        $data = json_decode($json, true);
        if (isset($data['genres']) && is_array($data['genres'])) {
            foreach ($data['genres'] as $genre) {
                $mapa[$genre['id']] = $genre['name'];
            }
        }
    }
    return $mapa;
}

// Cargar el catálogo de categorías en memoria
$mapaCategorias = obtenerMapaCategoriasTmdb($tmdb_api_key, $tmdb_bearer_token);

/**
 * Busca la película en TMDb y retorna [URL Portada, Categorías, Resumen]
 */
function buscarInfoPeliculaTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias) {
    $titulo = $nombreArchivo;
    $anio = '';

    if (preg_match('/^(.*?)\s*\((19\d{2}|20\d{2})\)/', $nombreArchivo, $coincidencias)) {
        $titulo = trim($coincidencias[1]);
        $anio = $coincidencias[2];
    } else {
        $titulo = preg_replace('/[._-]/', ' ', $nombreArchivo);
        $titulo = preg_replace('/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl|x264|x265)\b/i', '', $titulo);
        $titulo = trim($titulo);
    }

    $params = [
        'query' => $titulo,
        'language' => 'es-MX',
        'include_adult' => 'false'
    ];

    if (!empty($anio)) {
        $params['year'] = $anio;
    }

    if (!empty($apiKey)) {
        $params['api_key'] = trim($apiKey);
    }

    $urlTmdb = "https://api.themoviedb.org/3/search/movie?" . http_build_query($params);
    $jsonTmdb = ejecutarCurlTmdb($urlTmdb, $bearerToken);
    $resultadoPelicula = null;

    if ($jsonTmdb) {
        $data = json_decode($jsonTmdb, true);
        if (isset($data['results'][0])) {
            $resultadoPelicula = $data['results'][0];
        }
    }

    // Reintento sin filtro de año si no devolvió resultados
    if (!$resultadoPelicula && !empty($anio)) {
        unset($params['year']);
        $urlTmdbSimple = "https://api.themoviedb.org/3/search/movie?" . http_build_query($params);
        $jsonTmdbSimple = ejecutarCurlTmdb($urlTmdbSimple, $bearerToken);

        if ($jsonTmdbSimple) {
            $dataSimple = json_decode($jsonTmdbSimple, true);
            if (isset($dataSimple['results'][0])) {
                $resultadoPelicula = $dataSimple['results'][0];
            }
        }
    }

    $urlPortada = '0';
    $cadenaCategorias = 'Sin Categoría';
    $resumenPelicula = 'Sin descripción disponible';

    if ($resultadoPelicula) {
        // 1. Obtener la portada
        if (!empty($resultadoPelicula['poster_path'])) {
            $urlPortada = "https://image.tmdb.org/t/p/w500" . $resultadoPelicula['poster_path'];
        }

        // 2. Mapear y convertir los IDs de género a nombres separados por coma
        if (isset($resultadoPelicula['genre_ids']) && is_array($resultadoPelicula['genre_ids'])) {
            $nombresGeneros = [];
            foreach ($resultadoPelicula['genre_ids'] as $idGenero) {
                if (isset($mapaCategorias[$idGenero])) {
                    $nombresGeneros[] = $mapaCategorias[$idGenero];
                }
            }
            if (!empty($nombresGeneros)) {
                $cadenaCategorias = implode(', ', $nombresGeneros);
            }
        }

        // 3. Obtener la descripción / resumen
        if (!empty($resultadoPelicula['overview'])) {
            $resumenPelicula = trim($resultadoPelicula['overview']);
        }
    }

    return [$urlPortada, $cadenaCategorias, $resumenPelicula];
}

/**
 * Descarga y guarda la imagen válida en disco, retornando portada, categorías y resumen
 */
function procesarMedia($nombreArchivo, $dirPortadas, $apiKey, $bearerToken, $mapaCategorias) {
    list($urlRemota, $categorias, $descripcion) = buscarInfoPeliculaTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias);

    if ($urlRemota !== '0') {
        $nombreImagenLocal = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nombreArchivo) . '.jpg';
        $rutaImagenLocal = $dirPortadas . '/' . $nombreImagenLocal;

        $contenidoImagen = descargarImagenDirecta($urlRemota);

        if ($contenidoImagen && strlen($contenidoImagen) > 2000) {
            file_put_contents($rutaImagenLocal, $contenidoImagen);
        } else {
            $urlRemota = '0';
        }
    }

    return [$urlRemota, $categorias, $descripcion];
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
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, fecha, pelicula_url, portada_url) 
            VALUES (NULL, :id_categoria, :nombre, :descripcion, :fecha, :pelicula_url, :portada_url)";
    $stmt = $pdo->prepare($sql);

    foreach ($iterator as $item) {
        if ($archivos_procesados >= $limite_maximo) {
            break;
        }

        if ($item->isFile()) {
            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());
                $ruta_completa = str_replace('\\', '/', $item->getPathname());

                list($portada_url, $categoria, $descripcion) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias);
                
                if ($portada_url !== '0') {
                    $portadas_encontradas++;
                }

                $stmt->execute([
                    ':id_categoria' => $categoria,
                    ':nombre'       => $nombre,
                    ':descripcion'  => $descripcion,
                    ':fecha'        => $fecha,
                    ':pelicula_url' => $ruta_completa,
                    ':portada_url'  => $portada_url
                ]);

                $archivos_procesados++;
            }
        }
    }

    $stmtResultados = $pdo->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT " . intval($limite_maximo));
    $listaPeliculas = $stmtResultados->fetchAll(PDO::FETCH_ASSOC);

} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, fecha, pelicula_url, portada_url) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($iterator as $item) {
        if ($archivos_procesados >= $limite_maximo) {
            break;
        }

        if ($item->isFile()) {
            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());
                $ruta_completa = str_replace('\\', '/', $item->getPathname());

                list($portada_url, $categoria, $descripcion) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias);
                
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

    $resResultados = $conn->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT " . intval($limite_maximo));
    $listaPeliculas = [];
    while ($row = $resResultados->fetch_assoc()) {
        $listaPeliculas[] = $row;
    }
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
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h1, h2 { color: #2c3e50; }
        .success { color: #27ae60; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: top; }
        th { background-color: #34495e; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .img-poster { width: 90px; height: 135px; object-fit: cover; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        .no-img { width: 90px; height: 135px; background: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #777; font-size: 12px; border-radius: 6px; text-align: center; }
        .badge-cat { display: inline-block; background: #e1f5fe; color: #0288d1; padding: 3px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .desc-text { font-size: 13px; color: #555; line-height: 1.4; max-width: 300px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Escaneo con TMDb finalizado</h1>
        <p class="success">Se insertaron <?php echo $archivos_procesados; ?> películas en la tabla <code>peliculas</code> (Límite: <?php echo $limite_maximo; ?>).</p>
        <p><strong>Portadas TMDb obtenidas:</strong> <?php echo $portadas_encontradas; ?> / <?php echo $archivos_procesados; ?></p>
        <p><strong>Idioma de búsqueda:</strong> Español Latino (es-MX)</p>
    </div>

    <h2>Registros en la Base de Datos (`peliculas`)</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Portada</th>
                <th>Nombre</th>
                <th>Categorías</th>
                <th>Descripción (Resumen)</th>
                <th>Fecha</th>
                <th>Ruta Película</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($listaPeliculas)): ?>
                <?php foreach ($listaPeliculas as $pelicula): ?>
                    <?php 
                        $nombreImagenLocal = preg_replace('/[^a-zA-Z0-9_-]/', '_', $pelicula['nombre']) . '.jpg';
                        $rutaRelativaLocal = '../peliculas/portadas/' . $nombreImagenLocal;
                        $rutaAbsolutaLocal = $dir_portadas . '/' . $nombreImagenLocal;

                        if (file_exists($rutaAbsolutaLocal) && filesize($rutaAbsolutaLocal) > 2000) {
                            $srcImagen = $rutaRelativaLocal;
                        } elseif (!empty($pelicula['portada_url']) && $pelicula['portada_url'] !== '0') {
                            $srcImagen = $pelicula['portada_url'];
                        } else {
                            $srcImagen = null;
                        }
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($pelicula['id_peliculas']); ?></strong></td>
                        <td>
                            <?php if ($srcImagen): ?>
                                <img src="<?php echo htmlspecialchars($srcImagen); ?>" alt="Portada" class="img-poster">
                            <?php else: ?>
                                <div class="no-img">Sin Portada</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo htmlspecialchars($pelicula['nombre']); ?></strong></td>
                        <td><span class="badge-cat"><?php echo htmlspecialchars($pelicula['id_categoria']); ?></span></td>
                        <td><div class="desc-text"><?php echo htmlspecialchars($pelicula['descripcion']); ?></div></td>
                        <td><?php echo htmlspecialchars($pelicula['fecha']); ?></td>
                        <td><small><?php echo htmlspecialchars($pelicula['pelicula_url']); ?></small></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No se encontraron registros en la tabla <code>peliculas</code>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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
