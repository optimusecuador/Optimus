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
// Configuración de errores y tiempo límite de ejecución ilimitado para segundo plano
ini_set('display_errors', 0);
error_reporting(E_ALL);
set_time_limit(0); 
ignore_user_abort(true); // Permite que PHP siga corriendo aunque el usuario cierre el navegador

// Reutilizar la conexión a la base de datos existente
require_once __DIR__ . '/../conectar.php';

// Directorios del sistema
$dir_base = '/var/www/ALMACENAMIENTO';
$dir_portadas = realpath(__DIR__ . '/../peliculas') ? realpath(__DIR__ . '/../peliculas') . '/portadas' : __DIR__ . '/../peliculas/portadas';

// Carpetas a ignorar dentro de $dir_base
$carpeta_excluida = 'PRINCIPAL';

// Crear carpeta de portadas local si no existe
if (!file_exists($dir_portadas)) {
    @mkdir($dir_portadas, 0755, true);
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
 * Obtiene los primeros N actores del reparto principal de una película
 */
function obtenerActoresTmdb($idPeliculaTmdb, $apiKey, $bearerToken, $limiteActores = 10) {
    $params = ['language' => 'es-MX'];
    if (!empty($apiKey)) {
        $params['api_key'] = trim($apiKey);
    }

    $urlCredits = "https://api.themoviedb.org/3/movie/{$idPeliculaTmdb}/credits?" . http_build_query($params);
    $json = ejecutarCurlTmdb($urlCredits, $bearerToken);

    if ($json) {
        $data = json_decode($json, true);
        if (isset($data['cast']) && is_array($data['cast'])) {
            $actores = [];
            foreach (array_slice($data['cast'], 0, $limiteActores) as $castItem) {
                if (!empty($castItem['name'])) {
                    $actores[] = $castItem['name'];
                }
            }
            return implode(', ', $actores);
        }
    }
    return 'Sin Actores Registrados';
}

/**
 * Busca la película en TMDb y retorna [URL Portada, Categorías, Resumen, Actores, Estreno]
 */
function buscarInfoPeliculaTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias) {
    $titulo = $nombreArchivo;
    $anioDetectadoNombre = '';

    if (preg_match('/^(.*?)\s*[\(\.\[\_\-]?\s*(19\d{2}|20\d{2})\s*[\)\.\]\_\-]?/i', $nombreArchivo, $coincidencias)) {
        $titulo = trim($coincidencias[1]);
        $anioDetectadoNombre = $coincidencias[2];
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

    if (!empty($anioDetectadoNombre)) {
        $params['year'] = $anioDetectadoNombre;
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

    if (!$resultadoPelicula && !empty($anioDetectadoNombre)) {
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
    $cadenaActores = 'Sin Actores Registrados';
    $anioEstreno = !empty($anioDetectadoNombre) ? $anioDetectadoNombre : 'N/A';

    if ($resultadoPelicula) {
        if (!empty($resultadoPelicula['poster_path'])) {
            $urlPortada = "https://image.tmdb.org/t/p/w500" . $resultadoPelicula['poster_path'];
        }

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

        if (!empty($resultadoPelicula['overview'])) {
            $resumenPelicula = trim($resultadoPelicula['overview']);
        }

        if (isset($resultadoPelicula['id'])) {
            $cadenaActores = obtenerActoresTmdb($resultadoPelicula['id'], $apiKey, $bearerToken, 10);
        }

        $fechaTmdb = $resultadoPelicula['release_date'] ?? $resultadoPelicula['first_air_date'] ?? '';
        if (!empty($fechaTmdb) && strlen($fechaTmdb) >= 4) {
            $anioEstreno = substr($fechaTmdb, 0, 4);
        }
    }

    return [$urlPortada, $cadenaCategorias, $resumenPelicula, $cadenaActores, $anioEstreno];
}

/**
 * Procesar archivo local e información remota
 */
function procesarMedia($nombreArchivo, $dirPortadas, $apiKey, $bearerToken, $mapaCategorias) {
    list($urlRemota, $categorias, $descripcion, $actores, $estreno) = buscarInfoPeliculaTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias);

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

    return [$urlRemota, $categorias, $descripcion, $actores, $estreno];
}

// Cargar registros existentes en la BD para mostrar en la tabla inicial
$listaPeliculas = [];
if (isset($pdo) && $pdo instanceof PDO) {
    $stmtResultados = $pdo->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50");
    $listaPeliculas = $stmtResultados ? $stmtResultados->fetchAll(PDO::FETCH_ASSOC) : [];
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $resResultados = $conn->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50");
    if ($resResultados) {
        while ($row = $resResultados->fetch_assoc()) {
            $listaPeliculas[] = $row;
        }
    }
}

// Iniciar captura del búfer de salida para responder inmediatamente al cliente
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Indexación</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; position: relative; }
        h1, h2 { color: #2c3e50; }
        .success { color: #27ae60; font-weight: bold; }
        
        .toast-burbuja {
            position: fixed;
            top: 25px;
            right: 25px;
            background-color: #2c3e50;
            color: #ffffff;
            padding: 16px 24px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            font-weight: 600;
            z-index: 9999;
            animation: fadeIn 0.4s ease-out;
            border-left: 5px solid #3498db;
        }

        .toast-burbuja .spinner {
            width: 18px;
            height: 18px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #3498db;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; table-layout: fixed; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: top; }
        th { background-color: #34495e; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        
        .col-id { width: 40px; }
        .col-portada { width: 100px; }
        .col-nombre { width: 12%; }
        .col-cat { width: 12%; }
        .col-desc { width: 24%; }
        .col-actores { width: 15%; }
        .col-estreno { width: 75px; text-align: center; }
        .col-fecha { width: 95px; }
        .col-ruta { width: 12%; }

        .img-poster { width: 90px; height: 135px; object-fit: cover; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        .no-img { width: 90px; height: 135px; background: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #777; font-size: 12px; border-radius: 6px; text-align: center; }
        .badge-cat { display: inline-block; background: #e1f5fe; color: #0288d1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .badge-estreno { display: inline-block; background: #fff3e0; color: #e65100; padding: 4px 8px; border-radius: 4px; font-size: 13px; font-weight: bold; border: 1px solid #ffe0b2; }

        .desc-text, .actores-text { 
            font-size: 13px; 
            color: #555; 
            line-height: 1.5; 
            white-space: normal; 
            word-wrap: break-word; 
            overflow-wrap: break-word; 
            word-break: break-word; 
        }

        .actores-text { color: #2c3e50; font-weight: 500; }
        .ruta-text { font-size: 11px; color: #666; word-break: break-all; }
    </style>
</head>
<body>

    <div class="toast-burbuja" id="burbuja-notificacion">
        <div class="spinner"></div>
        <span>Indexación iniciada (Carpeta 'PRINCIPAL' excluida)...</span>
    </div>

    <div class="container">
        <h1>Escaneo de Películas con TMDb</h1>
        <p class="success">El escaneo ha sido iniciado correctamente.</p>
        <p>Se procesarán los archivos disponibles ignorando la carpeta <strong>/ALMACENAMIENTO/PRINCIPAL</strong>.</p>
    </div>

    <h2>Últimos Registros en la Base de Datos (`peliculas`)</h2>
    <table>
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-portada">Portada</th>
                <th class="col-nombre">Nombre</th>
                <th class="col-cat">Categorías</th>
                <th class="col-desc">Descripción</th>
                <th class="col-actores">Actores</th>
                <th class="col-estreno">Estreno</th>
                <th class="col-fecha">Fecha</th>
                <th class="col-ruta">Ruta Película</th>
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
                        <td><div class="actores-text"><?php echo htmlspecialchars($pelicula['actores'] ?? 'N/A'); ?></div></td>
                        <td style="text-align: center;">
                            <span class="badge-estreno"><?php echo htmlspecialchars(!empty($pelicula['estreno']) ? $pelicula['estreno'] : 'N/A'); ?></span>
                        </td>
                        <td><?php echo htmlspecialchars($pelicula['fecha']); ?></td>
                        <td><div class="ruta-text"><?php echo htmlspecialchars($pelicula['pelicula_url']); ?></div></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" style="text-align:center;">No se encontraron registros previos.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        setTimeout(() => {
            const burbuja = document.getElementById('burbuja-notificacion');
            if(burbuja) {
                burbuja.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                burbuja.style.opacity = "0";
                burbuja.style.transform = "translateY(-20px)";
                setTimeout(() => burbuja.remove(), 600);
            }
        }, 6000);
    </script>
</body>
</html>
<?php
// Enviar respuesta inmediata al navegador y cerrar conexión HTTP
$size = ob_get_length();
header("Content-Length: $size");
header('Connection: close');
ob_end_flush();
@ob_flush();
flush();

if (session_id()) {
    session_write_close();
}

if (function_exists('fastcgi_finish_request')) {
    fastcgi_finish_request();
}

// =========================================================================
// CONTINUACIÓN DEL PROCESO EN SEGUNDO PLANO
// =========================================================================

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($dir_base, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

$rutaExcluida = rtrim(str_replace('\\', '/', $dir_base), '/') . '/' . $carpeta_excluida . '/';

if (isset($pdo) && $pdo instanceof PDO) {
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, actores, estreno, fecha, pelicula_url, portada_url) 
            VALUES (NULL, :id_categoria, :nombre, :descripcion, :actores, :estreno, :fecha, :pelicula_url, :portada_url)";
    $stmt = $pdo->prepare($sql);

    foreach ($iterator as $item) {
        if ($item->isFile()) {
            $ruta_completa = str_replace('\\', '/', $item->getPathname());

            // Omitir cualquier archivo dentro de la carpeta PRINCIPAL
            if (stripos($ruta_completa, $rutaExcluida) === 0 || stripos($ruta_completa, '/' . $carpeta_excluida . '/') !== false) {
                continue;
            }

            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());

                // Omitir si la película ya existe en la base de datos
                $chk = $pdo->prepare("SELECT id_peliculas FROM peliculas WHERE pelicula_url = :url LIMIT 1");
                $chk->execute([':url' => $ruta_completa]);
                if ($chk->fetch()) {
                    continue;
                }

                list($portada_url, $categoria, $descripcion, $actores, $estreno) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias);

                $stmt->execute([
                    ':id_categoria' => $categoria,
                    ':nombre'       => $nombre,
                    ':descripcion'  => $descripcion,
                    ':actores'      => $actores,
                    ':estreno'      => $estreno,
                    ':fecha'        => $fecha,
                    ':pelicula_url' => $ruta_completa,
                    ':portada_url'  => $portada_url
                ]);
            }
        }
    }

} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $sql = "INSERT INTO peliculas (id_peliculas, id_categoria, nombre, descripcion, actores, estreno, fecha, pelicula_url, portada_url) 
            VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    foreach ($iterator as $item) {
        if ($item->isFile()) {
            $ruta_completa = str_replace('\\', '/', $item->getPathname());

            // Omitir cualquier archivo dentro de la carpeta PRINCIPAL
            if (stripos($ruta_completa, $rutaExcluida) === 0 || stripos($ruta_completa, '/' . $carpeta_excluida . '/') !== false) {
                continue;
            }

            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());

                // Omitir si la película ya existe en la base de datos
                $chk = $conn->prepare("SELECT id_peliculas FROM peliculas WHERE pelicula_url = ? LIMIT 1");
                $chk->bind_param('s', $ruta_completa);
                $chk->execute();
                $res = $chk->get_result();
                if ($res && $res->num_rows > 0) {
                    continue;
                }

                list($portada_url, $categoria, $descripcion, $actores, $estreno) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias);

                $stmt->bind_param('ssssssss', $categoria, $nombre, $descripcion, $actores, $estreno, $fecha, $ruta_completa, $portada_url);
                $stmt->execute();
            }
        }
    }
    $stmt->close();
}
exit;
	?>
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
