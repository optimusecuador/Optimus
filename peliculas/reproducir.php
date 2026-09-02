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
      <a href="../jellyfin/index.php"><i data-lucide="play-circle"></i> Jellyfin</a>
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
/* =====================================
   MEDIA SERVER TITAN MODE (FULL INTEGRATED)
=====================================*/
error_reporting(0);

/* CONFIG DESDE BD */
$sqljf = "SELECT * FROM jellyfin LIMIT 1";
$resjf = mysqli_query($con, $sqljf);
$rowjf = mysqli_fetch_assoc($resjf);

$server = $rowjf['ip'] ?? '';
$apikey = $rowjf['api'] ?? '';
$m3u = "canales.m3u";

function fetch_jellyfin($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res ? json_decode($res, true) : [];
}

$user_data = fetch_jellyfin($server . "/Users?api_key=" . $apikey);
$user_id = $user_data[0]['Id'] ?? null;

$seguirviendo = [];
if ($user_id) {
    $resume_data = fetch_jellyfin($server . "/Users/$user_id/Items/Resume?Limit=20&api_key=" . $apikey);
    $seguirviendo = $resume_data['Items'] ?? [];
}

$genres_data = fetch_jellyfin($server . "/Genres?Recursive=true&IncludeItemTypes=Movie&api_key=" . $apikey);
$generos = $genres_data['Items'] ?? [];

$libraries = fetch_jellyfin($server . "/Library/VirtualFolders?api_key=" . $apikey);
$librerias = [];
if (is_array($libraries)) {
    foreach ($libraries as $lib) {
        if (isset($lib['Name']) && strtolower($lib['Name']) != "colecciones") $librerias[] = $lib;
    }
}

$buscar_global = isset($_GET['buscar']) ? trim($_GET['buscar']) : "";
$library_id    = isset($_GET['lib']) ? $_GET['lib'] : "";
$genre_id      = isset($_GET['genre']) ? $_GET['genre'] : ($generos[0]['Id'] ?? "");

$limite = 100;
$page = max(1, isset($_GET['page']) ? intval($_GET['page']) : 1);
$inicio = ($page - 1) * $limite;

if ($buscar_global != "") {
    $url = $server . "/Items?SearchTerm=" . urlencode($buscar_global) . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} elseif ($library_id != "") {
    $url = $server . "/Items?ParentId=" . $library_id . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} else {
    $genre_param = $genre_id ? "&GenreIds=" . $genre_id : "";
    $url = $server . "/Items?Recursive=true&IncludeItemTypes=Movie,Series" . $genre_param . "&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
}

$data = fetch_jellyfin($url);
$items = $data['Items'] ?? [];
$total = $data['TotalRecordCount'] ?? 0;
$total_paginas = ceil($total / $limite);

$canales = [];
if (file_exists($m3u)) {
    $lineas = file($m3u);
    foreach ($lineas as $i => $linea) {
        if (strpos($linea, '#EXTINF') !== false && isset($lineas[$i+1])) {
            $canales[] = ["nombre" => trim(substr($linea, strpos($linea, ',') + 1)), "url" => trim($lineas[$i+1])];
        }
    }
}
?>

<style>
:root { --bg: #021220; --text: #e8f3ff; }
body { margin: 0; padding: 20px; background: var(--bg); color: var(--text); font-family: sans-serif; }
.panel-dark { background: linear-gradient(180deg, #081f34, #05192b); border-radius: 16px; padding: 24px; border: 1px solid rgba(255,255,255,.05); }
.menu-container { background: rgba(8, 31, 52, 0.5); padding: 20px; border-radius: 16px; margin-bottom: 30px; }
.menu-section { display: flex; align-items: center; gap: 15px; margin-bottom: 10px; }
.menu-label { min-width: 90px; color: #8da4bc; font-size: 13px; text-transform: uppercase; }
.menu-scroll { display: flex; flex-wrap: wrap; gap: 8px; }
.btn-category { background: #0d2a45; border: 1px solid rgba(255,255,255,.1); color: #e8f3ff; padding: 6px 14px; border-radius: 6px; font-size: 12px; cursor: pointer; }
.btn-category:hover { background: #1558ff; }
.btn-action { background: #0faf76; border: none; color: #fff; padding: 6px 14px; border-radius: 6px; font-size: 12px; cursor: pointer; }
.media-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 20px; }
.poster { aspect-ratio: 2/3; border-radius: 12px; overflow: hidden; cursor: pointer; position: relative; }
.poster img { width: 100%; height: 100%; object-fit: cover; }
.title { font-size: 13px; margin-top: 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 9999; }
.modal video { width: 90%; height: 85%; margin: 5% auto; display: block; }
.banner { height: 250px; background: #081f34; display: flex; align-items: flex-end; padding: 30px; margin-bottom: 20px; border-radius: 16px; font-size: 24px; font-weight: bold; }
</style>

<div class="panel-dark">
    <div class="menu-container">
        <div class="menu-section">
            <h4 class="menu-label">🎭 Géneros</h4>
            <div class="menu-scroll">
                <?php foreach($generos as $g): ?><button class="btn-category" onclick="location.href='?genre=<?=$g['Id']?>'"><?=$g['Name']?></button><?php endforeach; ?>
            </div>
        </div>
        <div class="menu-section">
            <h4 class="menu-label">📂 Bibliotecas</h4>
            <div class="menu-scroll">
                <?php foreach($librerias as $lib): ?><button class="btn-category" onclick="location.href='?lib=<?=$lib['ItemId']?>'"><?=$lib['Name']?></button><?php endforeach; ?>
                <button class="btn-action" onclick="mostrar('iptv')">📺 TV EN VIVO</button>
            </div>
        </div>
    </div>
    
    <div id="banner" class="banner"><span>Escoja una Pelicula</span></div>
    
    <div id="peliculas">
        <div class="media-grid">
            <?php foreach($items as $item): 
                $id=$item['Id']; $name=htmlspecialchars($item['Name']);
                $img=$server."/Items/$id/Images/Primary?maxHeight=400&api_key=".$apikey;
                $video=$server."/Videos/$id/stream?Static=true&api_key=".$apikey;
            ?>
            <div>
                <div class="poster" onclick="playVideo('<?=$video?>','<?=addslashes($name)?>','<?=$img?>')"><img src="<?=$img?>"></div>
                <div class="title"><?=$name?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="iptv" style="display:none">
        <div class="media-grid">
            <?php foreach($canales as $c): ?>
            <div>
                <div class="poster" onclick="playVideo('<?=$c['url']?>','<?=addslashes($c['nombre'])?>','')"><div style="background:#1558ff;height:100%;display:flex;align-items:center;justify-content:center">📺</div></div>
                <div class="title"><?=$c['nombre']?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="player" class="modal" onclick="cerrar()">
    <video id="video" controls autoplay onclick="event.stopPropagation()"></video>
</div>

<script>
function playVideo(url, title, img) {
    document.getElementById("player").style.display = "block";
    document.getElementById("video").src = url;
    document.getElementById("banner").innerHTML = "<span>" + title + "</span>";
}
function cerrar() { document.getElementById("player").style.display = "none"; document.getElementById("video").pause(); document.getElementById("video").src = ""; }
function mostrar(sec) { document.getElementById("peliculas").style.display = (sec=='peliculas')?'block':'none'; document.getElementById("iptv").style.display = (sec=='iptv')?'block':'none'; }
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
