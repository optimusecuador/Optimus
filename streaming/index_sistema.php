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
      <a href="index.php"><i data-lucide="play-circle"></i> Streaming</a>
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
/* --- 1. CONFIGURACIÓN E INICIALIZACIÓN --- */
$resultado = $conexion->query("SELECT api, ip FROM jellyfin LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $apikey = $fila['api'];
    $ip_db = trim($fila['ip']);

    // Limpieza profunda: Remover esquemas (http://, https://) y puertos para aislar puramente la IP o dominio
    $host_ping = $ip_db;
    $host_ping = preg_replace('#^https?://#', '', $host_ping);
    // Si la IP incluye puerto (ej. 192.168.1.50:8096), extraemos solo la parte de la IP
    if (strpos($host_ping, ':') !== false) {
        $partes_host = explode(':', $host_ping);
        $host_ping = $partes_host[0];
    }
    $host_ping = rtrim($host_ping, '/');

    // 2. Comando de ping optimizado para Ubuntu / Linux
    $ping_cmd = "ping -c 1 -W 1 " . escapeshellarg($host_ping);
    exec($ping_cmd, $output, $status);

    // 3. Lógica de verificación y respuesta
    if ($status === 0) {
        // Si hay respuesta exitosa, almacenar el campo ip directamente en $server
        $server = rtrim($ip_db, "/");
        
        echo '<script>
            console.log("Jellyfin en ' . htmlspecialchars($server) . ' está en línea y responde.");
        </script>';
    } else {
        // Si no responde, estructurar la variable $server con la IP recuperada y el puerto 30013
        $ip_limpia = preg_replace('#^https?://#', '', $ip_db);
        if (strpos($ip_limpia, ':') !== false) {
            $partes_limpias = explode(':', $ip_limpia);
            $ip_limpia = $partes_limpias[0];
        }
        $ip_limpia = rtrim($ip_limpia, '/');
        
        if (empty($ip_limpia)) {
            $ip_limpia = "127.0.0.1";
        }

        // Reasignamos el puerto por defecto si no venía especificado
        $server = "http://" . $ip_limpia . ":30013";

        echo '<script>
            alert("No se puede conectar al equipo Jellyfin (' . htmlspecialchars($host_ping) . '). Será redirigido a la configuración.");
            window.location.href = "../configuracion/streaming.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de Jellyfin en la base de datos.");
        window.location.href = "../configuracion/streaming.php";
    </script>';
    exit;
}

$server = "http://" . $server . ":30013";
$ip_db = "http://" . $ip_db . ":30013";
/* --- 2. DEFINICIÓN DE LA FUNCIÓN API (Indispensable) --- */
function jf($url, $method="GET", $data=null) {
    global $server, $apikey;
    $ch = curl_init($server . $url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => [
            "X-Emby-Token: $apikey",
            "Content-Type: application/json"
        ]
    ]);
    if ($data) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $r = curl_exec($ch);
    curl_close($ch);
    return json_decode($r, true);
}

/* --- 3. OBTENCIÓN Y CONTEO DE GÉNEROS --- */
// Consultamos el endpoint /Genres
$generosResponse = jf("/Genres");
// Contamos los elementos recibidos. Si falla, devolvemos 0.
$totalGeneros = isset($generosResponse['Items']) ? count($generosResponse['Items']) : 0;
?>

<?php
function fetchJellyfin($url, $apiKey) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Emby-Token: $apiKey"]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

/* --- OBTENCIÓN Y CONTEO DE LIBRERÍAS --- */
// Consultamos el endpoint de carpetas virtuales (Librerías)
$libsResponse = jf("/Library/VirtualFolders");

// Contamos los elementos recibidos. 
// Si la respuesta es un array, simplemente contamos sus elementos.
$totalLibrerias = is_array($libsResponse) ? count($libsResponse) : 0;

// --- 2. OBTENCIÓN DE DATOS ---
$itemsData = fetchJellyfin("$server/Items/Counts", $apikey);
$totalMovies = $itemsData['MovieCount'] ?? 0;
$genres = fetchJellyfin("$server/Genres?IncludeItemTypes=Movie", $apikey);
$totalGenres = $genres['TotalRecordCount'] ?? 0;

$userData = fetchJellyfin("$server/Users", $apikey);
$userID = (!empty($userData)) ? $userData[0]['Id'] : null;
$libraries = ($userID) ? fetchJellyfin("$server/Users/$userID/Views", $apikey) : null;

// Obtener películas recientes
$recentMovies = fetchJellyfin("$server/Items?IncludeItemTypes=Movie&Recursive=true&SortBy=DateCreated&SortOrder=Descending&Limit=50&Fields=MediaSources,MediaStreams,ProductionYear", $apikey);

// Obtener biblioteca para la tabla
$allMovies = fetchJellyfin("$server/Items?IncludeItemTypes=Movie&Recursive=true&Limit=12&Fields=MediaSources,MediaStreams,ProductionYear", $apikey);

$totalHours = number_format(floor($totalMovies * 1.8)); 
// Nuevos datos requeridos
$users = fetchJellyfin("$server/Users", $apikey);
$totalUsers = is_array($users) ? count($users) : 0;

$libraries = fetchJellyfin("$server/Library/SelectableMediaFolders", $apikey);
$totalLibraries = is_array($libraries) ? count($libraries) : 0;

$sessions = fetchJellyfin("$server/Sessions", $apikey);
$connectedUsers = is_array($sessions) ? count($sessions) : 0;

$userID = (!empty($users)) ? $users[0]['Id'] : null;
$totalHours = number_format(floor($totalMovies * 1.8)); 
?>

<div>
    <div class="metric-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px; margin-bottom: 20px;">
    
    <div class="metric purple" onclick="window.location.href='reproducir.php'" style="cursor: pointer; transition: transform 0.2s;">
        <div>
            <span>Peliculas</span>
            <strong><?php echo number_format($totalMovies); ?></strong>
        </div>
    </div>
    
    <div class="metric blue" onclick="window.location.href='usuarios.php'" style="cursor: pointer; transition: transform 0.2s;">
        <div>
            <span>Usuarios</span>
            <strong><?php echo $totalUsers; ?></strong>
        </div>
    </div>

    <div class="metric green">
        <div>
            <span>Generos</span>
            <strong><?php echo $totalGeneros; ?></strong>
        </div>
    </div>

    <div class="metric orange">
        <div>
            <span>Conectados</span>
            <strong><?php echo $connectedUsers; ?></strong>
        </div>
    </div>
</div>
    
    </div>
<div>
    <div class="metric-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 20px;">
        <div class="metric purple"><div><span>Total películas</span><strong><?php echo number_format($totalMovies); ?></strong></div></div>
        <div class="metric blue"><div><span>Duración Est.</span><strong><?php echo $totalHours; ?> h</strong></div></div>
        <div class="metric green"><div><span>Librerias</span><strong><?php echo $totalLibrerias; ?></strong></div></div>
        <div class="metric orange"><div><span>Estado</span><strong>Online</strong></div></div>
    </div>

    <div class="panel-dark" style="position: relative; margin-bottom: 20px;">

    <div class="isp-title" style="margin-bottom: 20px;">
        Últimas 50 películas
    </div>

    <button onclick="scrollGrid('left')"
        style="position:absolute;left:0;top:50%;z-index:10;background:rgba(0,0,0,.5);border:none;color:white;padding:15px;cursor:pointer;border-radius:0 5px 5px 0;">
        ❮
    </button>

    <button onclick="scrollGrid('right')"
        style="position:absolute;right:0;top:50%;z-index:10;background:rgba(0,0,0,.5);border:none;color:white;padding:15px;cursor:pointer;border-radius:5px 0 0 5px;">
        ❯
    </button>

    <div id="movie-scroll-grid"
         style="display:flex;gap:15px;overflow-x:hidden;scroll-behavior:smooth;padding:0 40px;">

        <?php

        if(isset($recentMovies['Items']))
        {
            foreach($recentMovies['Items'] as $m)
            {
                $res = "HD";
                $lang = "N/A";
                $year = $m['ProductionYear'] ?? '----';

                if(isset($m['MediaStreams']))
                {
                    foreach($m['MediaStreams'] as $s)
                    {
                        if(($s['Type'] ?? '') == 'Video')
                        {
                            $res = ($s['Width'] >= 3840)
                                ? '4K'
                                : (($s['Width'] >= 1920) ? '1080p' : '720p');
                        }

                        if(($s['Type'] ?? '') == 'Audio' && $lang == "N/A")
                        {
                            $lang = strtoupper($s['Language'] ?? 'DUAL');
                        }
                    }
                }

                echo '

                <div style="flex:0 0 140px;">

                    <img
                        src="'.$server.'/Items/'.$m['Id'].'/Images/Primary?Format=jpg&MaxWidth=300"
                        style="
                            width:140px;
                            height:210px;
                            border-radius:8px;
                            object-fit:cover;
                        "
                    >

                    <div style="
                        font-size:11px;
                        margin-top:5px;
                        font-weight:bold;
                        overflow:hidden;
                        white-space:nowrap;
                        text-overflow:ellipsis;
                    ">
                        '.htmlspecialchars($m['Name']).'
                    </div>

                    <div style="
                        font-size:10px;
                        color:var(--muted);
                        margin-bottom:8px;
                    ">
                        '.$year.' • '.$res.' • '.$lang.'
                    </div>

                    <button
                        onclick="playMovie(\''.$m['Id'].'\')"
                        style="
                            width:100%;
                            background:#2563eb;
                            color:#fff;
                            border:none;
                            border-radius:6px;
                            padding:8px;
                            cursor:pointer;
                            font-size:12px;
                            font-weight:bold;
                        "
                    >
                        ▶ Ver
                    </button>

                </div>

                ';
            }
        }

        ?>

    </div>

</div>

<!-- MODAL REPRODUCTOR -->

<div id="moviePlayerModal"
     style="
        display:none;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,.95);
        z-index:999999;
     ">

    <button
        onclick="closeMoviePlayer()"
        style="
            position:absolute;
            top:15px;
            right:15px;
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            cursor:pointer;
            border-radius:6px;
            z-index:9999999;
        ">
        ✖ Cerrar
    </button>

    <video
        id="moviePlayer"
        controls
        autoplay
        style="
            width:100%;
            height:100%;
            background:black;
        ">
    </video>

</div>

<script>

function playMovie(itemId)
{
    let player = document.getElementById('moviePlayer');

    player.src =
        '<?php echo $server; ?>/Videos/' +
        itemId +
        '/stream.mp4?api_key=<?php echo $apikey; ?>';

    document.getElementById('moviePlayerModal').style.display = 'block';

    player.load();
    player.play();
}

function closeMoviePlayer()
{
    let player = document.getElementById('moviePlayer');

    player.pause();
    player.src = '';

    document.getElementById('moviePlayerModal').style.display = 'none';
}

function scrollGrid(direction)
{
    const grid = document.getElementById('movie-scroll-grid');

    grid.scrollBy({
        left: direction === 'left' ? -1000 : 1000,
        behavior: 'smooth'
    });
}

</script>

<script>
function scrollContinue(dir) {
    document.getElementById('continue-grid').scrollBy({ left: dir === 'left' ? -800 : 800, behavior: 'smooth' });
}
</script>




<script>

function scrollContinue(direction)
{
    const grid = document.getElementById('continue-grid');

    if(direction === 'left')
    {
        grid.scrollBy({
            left:-1000,
            behavior:'smooth'
        });
    }
    else
    {
        grid.scrollBy({
            left:1000,
            behavior:'smooth'
        });
    }
}

</script>
    <style>

#movieGrid{
    display:flex;
    gap:15px;
    overflow-x:auto;
    scroll-behavior:smooth;
    padding:10px 60px;

    /* Ocultar barra de desplazamiento */
    scrollbar-width:none;
    -ms-overflow-style:none;
}

#movieGrid::-webkit-scrollbar{
    display:none;
}

.movie-card{
    min-width:220px;
    max-width:220px;
    background:#111827;
    border-radius:12px;
    overflow:hidden;
    flex-shrink:0;
    transition:all .3s ease;
}

.movie-card:hover{
    transform:scale(1.05);
}

.movie-poster{
    width:100%;
    height:320px;
    object-fit:cover;
}

.movie-info{
    padding:12px;
}

.movie-title{
    color:#fff;
    font-weight:bold;
    height:50px;
    overflow:hidden;
}

.movie-meta{
    margin-top:10px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.movie-year{
    color:#9ca3af;
}

.nav-btn{
    position:absolute;
    top:40%;
    z-index:10;
    width:45px;
    height:45px;
    border:none;
    border-radius:50%;
    cursor:pointer;
    font-size:22px;
    background:#1f2937;
    color:#fff;
}

.nav-btn:hover{
    background:#374151;
}

.nav-left{
    left:0;
}

.nav-right{
    right:0;
}

</style>

<?php

/* ==========================================
   BIBLIOTECA JELLYFIN CON CATEGORÍAS
   BÚSQUEDA + REPRODUCCIÓN LOCAL
========================================== */

/* USUARIO */
$userData = fetchJellyfin($server."/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';

/* LIBRERÍAS */
$libraries = [];

if(!empty($userId))
{
    $libraries = fetchJellyfin(
        $server."/Users/".$userId."/Views",
        $apikey
    );
}

$libraryId = $_GET['library'] ?? '';

?>

<div class="panel-dark">

    <div class="isp-title" style="margin-bottom:20px;">
        Biblioteca Completa
    </div>

    <div style="
        display:flex;
        gap:10px;
        overflow-x:auto;
        margin-bottom:20px;
        padding-bottom:5px;
        scrollbar-width:none;
    ">
        <a href="?"
           style="
                padding:10px 15px;
                background:#2563eb;
                color:#fff;
                text-decoration:none;
                border-radius:8px;
                white-space:nowrap;
           ">
            Todas
        </a>

        <?php
        if(isset($libraries['Items'])) {
            foreach($libraries['Items'] as $lib) {
                // FILTRO: Excluir 'boxsets'
                $type = $lib['CollectionType'] ?? 'folder';
                if ($type === 'boxsets') continue; 

                $active = ($libraryId == $lib['Id']) ? 'background:#2563eb;' : 'background:#1f2937;';

                echo '
                <a href="?library='.$lib['Id'].'"
                   style="
                        '.$active.'
                        color:white;
                        text-decoration:none;
                        padding:10px 15px;
                        border-radius:8px;
                        white-space:nowrap;
                   ">
                    '.$lib['Name'].'
                </a>';
            }
        }
        ?>
    </div>

    <form method="GET" style="display:flex; gap:10px; margin-bottom:20px;">
        <?php if(!empty($libraryId)) echo '<input type="hidden" name="library" value="'.$libraryId.'">'; ?>
        <input type="text" name="search" class="clientes-input" style="flex:1;" placeholder="Buscar película..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="primary">Buscar</button>
        <a href="?" class="primary" style="text-decoration:none; padding:10px 15px;">Limpiar</a>
    </form>

    <div style="position:relative;">
        <button class="nav-btn nav-left" onclick="scrollLeftMovies()">◀</button>
        <div id="movieGrid">
        <?php
        $url = $server."/Items?Recursive=true&Fields=MediaSources,MediaStreams,ProductionYear";

        if(!empty($libraryId)) {
            $url .= "&ParentId=".$libraryId;
            // Forzamos tipo de contenido según la librería
            $url .= "&IncludeItemTypes=Movie,Series";
        } else {
            $url .= "&IncludeItemTypes=Movie";
        }

        if(!empty($_GET['search'])) {
            $url .= "&SearchTerm=".urlencode(trim($_GET['search']));
        }

        $bibData = fetchJellyfin($url, $apikey);

        if(isset($bibData['Items'])) {
            foreach($bibData['Items'] as $m) {
                $res = "SD";
                if(isset($m['MediaSources'][0]['MediaStreams'])) {
                    foreach($m['MediaSources'][0]['MediaStreams'] as $stream) {
                        if(($stream['Type'] ?? '') == 'Video') {
                            $w = $stream['Width'] ?? 0;
                            if($w >= 3840) $res = "4K";
                            elseif($w >= 1920) $res = "1080p";
                            elseif($w >= 1280) $res = "720p";
                            break;
                        }
                    }
                }

                $poster = $server."/Items/".$m['Id']."/Images/Primary?MaxWidth=300";
                echo '
                <div class="movie-card">
                    <img src="'.$poster.'" class="movie-poster">
                    <div class="movie-info">
                        <div class="movie-title">'.htmlspecialchars($m['Name']).'</div>
                        <div class="movie-meta">
                            <span class="movie-year">'.($m['ProductionYear'] ?? 'N/A').'</span>
                            <span class="estado-activo">'.$res.'</span>
                        </div>
                        <button class="primary" onclick="playMovie(\''.$m['Id'].'\')" style="width:100%; margin-top:10px;">▶ Ver</button>
                    </div>
                </div>';
            }
        } else {
            echo '<div style="color:white; width:100%; text-align:center; padding:30px;">No se encontraron resultados.</div>';
        }
        ?>
        </div>
        <button class="nav-btn nav-right" onclick="scrollRightMovies()">▶</button>
    </div>
</div>

<!-- REPRODUCTOR -->

<div id="moviePlayerModal"
     style="
        display:none;
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,.95);
        z-index:999999;
     ">

    <button
        onclick="closeMoviePlayer()"
        style="
            position:absolute;
            top:15px;
            right:15px;
            background:red;
            color:white;
            border:none;
            padding:10px 15px;
            cursor:pointer;
            border-radius:6px;
            z-index:9999999;
        ">
        ✖ Cerrar
    </button>

    <video
        id="moviePlayer"
        controls
        autoplay
        style="
            width:100%;
            height:100%;
            background:black;
        ">
    </video>

</div>

<script>

function playMovie(itemId)
{
    let player = document.getElementById('moviePlayer');

    player.src =
        '<?= $server ?>/Videos/' +
        itemId +
        '/stream.mp4?api_key=<?= $apikey ?>';

    document.getElementById('moviePlayerModal').style.display = 'block';

    player.load();
    player.play();
}

function closeMoviePlayer()
{
    let player = document.getElementById('moviePlayer');

    player.pause();
    player.src = '';

    document.getElementById('moviePlayerModal').style.display = 'none';
}

function scrollLeftMovies()
{
    document.getElementById('movieGrid').scrollBy({
        left:-1000,
        behavior:'smooth'
    });
}

function scrollRightMovies()
{
    document.getElementById('movieGrid').scrollBy({
        left:1000,
        behavior:'smooth'
    });
}

</script>

<script>

function scrollLeftMovies()
{
    document.getElementById('movieGrid').scrollBy({
        left:-1000,
        behavior:'smooth'
    });
}

function scrollRightMovies()
{
    document.getElementById('movieGrid').scrollBy({
        left:1000,
        behavior:'smooth'
    });
}

</script>
</div>

<script>
function scrollGrid(d) {
    document.getElementById('movie-scroll-grid').scrollBy({ left: d === 'left' ? -300 : 300, behavior: 'smooth' });
}
</script>
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
