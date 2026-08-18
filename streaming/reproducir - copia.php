<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Optimus_plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->
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
      <a class="brand" href="#" aria-label="Nexus ISP">
      <img src="../img/logo.png" width="186" height="69" alt=""/></a>
      <nav class="main-nav" aria-label="Menu principal">
        <a href="../resumen/index.php"><i data-lucide="home"></i>Resumen</a>
        <a href="../clientes/index.php"><i data-lucide="users"></i>Clientes</a>
		<a href="../cuentas/index.php"><i data-lucide="landmark"></i>Cuentas Bancarias</a>
        <!--<a href="#"><i data-lucide="monitor"></i>Dispositivos</a>
        <a href="#"><i data-lucide="wifi"></i>Red</a>
        <a href="#"><i data-lucide="circle-dollar-sign"></i>Facturación</a>
        <a href="#"><i data-lucide="file-signature"></i>Contratos</a>
        <a href="#"><i data-lucide="ticket"></i>Tickets</a>
        <a href="#"><i data-lucide="bar-chart-3"></i>Reportes</a>-->
        <a href="../productos/productos.php"><i data-lucide="boxes"></i>Inventario</a>
        <!--<a href="#"><i data-lucide="warehouse"></i>Bodegas</a>-->
        <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i>Personal</a>
		<a href="../serviciotecnico/index.php"><i data-lucide="user-round-cog"></i>Servicio Tecnico</a>
        <a href="../olt/listado.php"><i data-lucide="shield-check"></i>Auditoría OLT</a>
        <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i>Auditoría MikroTik</a>
        <a href="../truenas/truenas.php"><i data-lucide="shield-check"></i>Auditoría TrueNAS </a>
        <a href="../traccar/traccar.php"><i data-lucide="shield-check"></i>Auditoría Traccar</a>
        <a href="usuarios.php"><i data-lucide="shield-check"></i>Auditoría Jellyfin</a>
        <a href="../zkteco/index.php"><i data-lucide="shield-check"></i>Auditoría ZKTeco</a>
        <!--<a href="#"><i data-lucide="handshake"></i>Proveedores</a>-->
        <!--<a href="#"><i data-lucide="badge-check"></i>Estado del Contrato</a>
        <a href="#"><i data-lucide="calculator"></i>Contabilidad</a>
        <a href="#"><i data-lucide="settings"></i>Configuración</a>-->
		  <div class="actions">
          <label class="search">
            <i data-lucide="search"></i>
            <input type="search" placeholder="Buscar en Global Net..." />
          </label>
          
        </div>
      </nav>
    </aside>

    <main class="content">
      
      <section class="metric-grid"></section>
      <!-- InstanceBeginEditable name="principal" --><?php
/* =====================================
   MEDIA SERVER TITAN MODE (Protegido)
=====================================*/

// 1. Forzar visualización de errores (Opcional: útil si vuelve a fallar)
ini_set('display_errors', 0); // Cambia a 1 si quieres ver los errores en pantalla
error_reporting(E_ALL);

/* CONFIG DESDE BD */
$sqljf = "SELECT * FROM jellyfin LIMIT 1";
$resjf = mysqli_query($con, $sqljf);
$rowjf = mysqli_fetch_assoc($resjf);

$server = $rowjf['ip'];
$apikey = $rowjf['api'];
$m3u = "canales.m3u";

/* ================= FUNCIÓN SEGURA DE CONEXIÓN ================= */
// Usamos cURL porque es mucho más rápido y seguro que file_get_contents()
function fetch_jellyfin($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Si Jellyfin no responde en 5 seg, no congela la web
    $res = curl_exec($ch);
    curl_close($ch);
    return $res ? json_decode($res, true) : [];
}

/* ================= USER JELLYFIN ================= */
$user_data = fetch_jellyfin($server . "/Users?api_key=" . $apikey);
$user_id = $user_data[0]['Id'] ?? null;

/* ================= CONTINUE WATCHING ================= */
$seguirviendo = [];
if ($user_id) {
    $resume_data = fetch_jellyfin($server . "/Users/$user_id/Items/Resume?Limit=20&api_key=" . $apikey);
    $seguirviendo = $resume_data['Items'] ?? [];
}

/* ================= GENEROS ================= */
$genres_data = fetch_jellyfin($server . "/Genres?Recursive=true&IncludeItemTypes=Movie&api_key=" . $apikey);
$generos = $genres_data['Items'] ?? [];

/* ================= LIBRERIAS ================= */
$libraries = fetch_jellyfin($server . "/Library/VirtualFolders?api_key=" . $apikey);
$librerias = [];
if (!empty($libraries) && is_array($libraries)) {
    foreach ($libraries as $lib) {
        if (isset($lib['Name']) && strtolower($lib['Name']) != "colecciones") {
            $librerias[] = $lib;
        }
    }
}

/* ================= BUSQUEDA & FILTROS ================= */
$buscar_global = isset($_GET['buscar']) ? trim($_GET['buscar']) : "";
$library_id    = isset($_GET['lib']) ? $_GET['lib'] : "";
$genre_id      = isset($_GET['genre']) ? $_GET['genre'] : ($generos[0]['Id'] ?? "");

/* PAGINACION */
$limite = 100;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page <= 0) $page = 1;
$inicio = ($page - 1) * $limite;

/* ================= ITEMS ================= */
if ($buscar_global != "") {
    $url = $server . "/Items?SearchTerm=" . urlencode($buscar_global) . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} elseif ($library_id != "") {
    $url = $server . "/Items?ParentId=" . $library_id . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} else {
    // Si no hay género seleccionado y la API no devolvió géneros, evitamos enviar el parámetro vacío
    $genre_param = $genre_id ? "&GenreIds=" . $genre_id : "";
    $url = $server . "/Items?Recursive=true&IncludeItemTypes=Movie,Series" . $genre_param . "&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
}

$data = fetch_jellyfin($url);
$items = $data['Items'] ?? [];
$total = $data['TotalRecordCount'] ?? 0;
$total_paginas = ceil($total / $limite);

/* ================= IPTV ================= */
$canales = [];
if (file_exists($m3u)) {
    $lineas = file($m3u);
    for ($i = 0; $i < count($lineas); $i++) {
        if (strpos($lineas[$i], '#EXTINF') !== false && isset($lineas[$i+1])) {
            $nombre = trim(substr($lineas[$i], strpos($lineas[$i], ',') + 1));
            $urlc = trim($lineas[$i+1]);
            $canales[] = ["nombre" => $nombre, "url" => $urlc];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Optimus_plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->
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
      <a class="brand" href="#" aria-label="Nexus ISP">
      <img src="../img/logo.png" width="186" height="69" alt=""/></a>
      <nav class="main-nav" aria-label="Menu principal">
        <a href="../resumen/index.php"><i data-lucide="home"></i>Resumen</a>
        <a href="../clientes/index.php"><i data-lucide="users"></i>Clientes</a>
		<a href="../cuentas/index.php"><i data-lucide="landmark"></i>Cuentas Bancarias</a>
        <!--<a href="#"><i data-lucide="monitor"></i>Dispositivos</a>
        <a href="#"><i data-lucide="wifi"></i>Red</a>
        <a href="#"><i data-lucide="circle-dollar-sign"></i>Facturación</a>
        <a href="#"><i data-lucide="file-signature"></i>Contratos</a>
        <a href="#"><i data-lucide="ticket"></i>Tickets</a>
        <a href="#"><i data-lucide="bar-chart-3"></i>Reportes</a>-->
        <a href="../productos/productos.php"><i data-lucide="boxes"></i>Inventario</a>
        <!--<a href="#"><i data-lucide="warehouse"></i>Bodegas</a>-->
        <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i>Personal</a>
		<a href="../serviciotecnico/index.php"><i data-lucide="user-round-cog"></i>Servicio Tecnico</a>
        <a href="../olt/listado.php"><i data-lucide="shield-check"></i>OLT</a>
        <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i>MikroTik</a>
        <a href="../truenas/truenas.php"><i data-lucide="shield-check"></i>NAS </a>
        <a href="../traccar/traccar.php"><i data-lucide="shield-check"></i>Rastreo </a>
        <a href="usuarios.php"><i data-lucide="shield-check"></i>Sreaming</a>
        <a href="../zkteco/index.php"><i data-lucide="shield-check"></i>ZKTeco</a>
        <!--<a href="#"><i data-lucide="handshake"></i>Proveedores</a>-->
        <!--<a href="#"><i data-lucide="badge-check"></i>Estado del Contrato</a>
        <a href="#"><i data-lucide="calculator"></i>Contabilidad</a>
        <a href="#"><i data-lucide="settings"></i>Configuración</a>-->
		  <div class="actions">
          <label class="search">
            <i data-lucide="search"></i>
            <input type="search" placeholder="Buscar en Global Net..." />
          </label>
          
        </div>
      </nav>
    </aside>

    <main class="content">
      
      <section class="metric-grid"></section>
      <!-- InstanceBeginEditable name="principal" --><?php
/* =====================================
   MEDIA SERVER TITAN MODE (Protegido)
=====================================*/

// 1. Forzar visualización de errores (Opcional: útil si vuelve a fallar)
ini_set('display_errors', 0); // Cambia a 1 si quieres ver los errores en pantalla
error_reporting(E_ALL);

/* CONFIG DESDE BD */
$sqljf = "SELECT * FROM jellyfin LIMIT 1";
$resjf = mysqli_query($con, $sqljf);
$rowjf = mysqli_fetch_assoc($resjf);

$server = $rowjf['ip'];
$apikey = $rowjf['api'];
$m3u = "canales.m3u";

/* ================= FUNCIÓN SEGURA DE CONEXIÓN ================= */
// Usamos cURL porque es mucho más rápido y seguro que file_get_contents()
function fetch_jellyfin($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Si Jellyfin no responde en 5 seg, no congela la web
    $res = curl_exec($ch);
    curl_close($ch);
    return $res ? json_decode($res, true) : [];
}

/* ================= USER JELLYFIN ================= */
$user_data = fetch_jellyfin($server . "/Users?api_key=" . $apikey);
$user_id = $user_data[0]['Id'] ?? null;

/* ================= CONTINUE WATCHING ================= */
$seguirviendo = [];
if ($user_id) {
    $resume_data = fetch_jellyfin($server . "/Users/$user_id/Items/Resume?Limit=20&api_key=" . $apikey);
    $seguirviendo = $resume_data['Items'] ?? [];
}

/* ================= GENEROS ================= */
$genres_data = fetch_jellyfin($server . "/Genres?Recursive=true&IncludeItemTypes=Movie&api_key=" . $apikey);
$generos = $genres_data['Items'] ?? [];

/* ================= LIBRERIAS ================= */
$libraries = fetch_jellyfin($server . "/Library/VirtualFolders?api_key=" . $apikey);
$librerias = [];
if (!empty($libraries) && is_array($libraries)) {
    foreach ($libraries as $lib) {
        if (isset($lib['Name']) && strtolower($lib['Name']) != "colecciones") {
            $librerias[] = $lib;
        }
    }
}

/* ================= BUSQUEDA & FILTROS ================= */
$buscar_global = isset($_GET['buscar']) ? trim($_GET['buscar']) : "";
$library_id    = isset($_GET['lib']) ? $_GET['lib'] : "";
$genre_id      = isset($_GET['genre']) ? $_GET['genre'] : ($generos[0]['Id'] ?? "");

/* PAGINACION */
$limite = 100;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page <= 0) $page = 1;
$inicio = ($page - 1) * $limite;

/* ================= ITEMS ================= */
if ($buscar_global != "") {
    $url = $server . "/Items?SearchTerm=" . urlencode($buscar_global) . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} elseif ($library_id != "") {
    $url = $server . "/Items?ParentId=" . $library_id . "&Recursive=true&IncludeItemTypes=Movie,Series&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
} else {
    // Si no hay género seleccionado y la API no devolvió géneros, evitamos enviar el parámetro vacío
    $genre_param = $genre_id ? "&GenreIds=" . $genre_id : "";
    $url = $server . "/Items?Recursive=true&IncludeItemTypes=Movie,Series" . $genre_param . "&StartIndex=$inicio&Limit=$limite&api_key=" . $apikey;
}

$data = fetch_jellyfin($url);
$items = $data['Items'] ?? [];
$total = $data['TotalRecordCount'] ?? 0;
$total_paginas = ceil($total / $limite);

/* ================= IPTV ================= */
$canales = [];
if (file_exists($m3u)) {
    $lineas = file($m3u);
    for ($i = 0; $i < count($lineas); $i++) {
        if (strpos($lineas[$i], '#EXTINF') !== false && isset($lineas[$i+1])) {
            $nombre = trim(substr($lineas[$i], strpos($lineas[$i], ',') + 1));
            $urlc = trim($lineas[$i+1]);
            $canales[] = ["nombre" => $nombre, "url" => $urlc];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Titan Media Server</title>
<style>
/*=========================================
ESTILOS TITAN UI (Ancho Completo)
=========================================*/
:root {
  --bg: #021220;
  --bg-soft: #061b2d;
  --text: #e8f3ff;
  --muted: #8da4bc;
  --blue: #1558ff;
  --cyan: #00b5ff;
  --shadow: 0 18px 42px rgba(0, 0, 0, 0.34);
}

* { box-sizing: border-box; }

body {
  margin: 0;
  padding: 20px;
  min-height: 100vh;
  background: linear-gradient(rgba(2,18,32,0.45), rgba(2,18,32,0.55)), #021220;
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  color: var(--text);
  font-family: "Inter", system-ui, -apple-system, sans-serif;
}

.panel-dark {
    background: linear-gradient(180deg, rgba(8,31,52,.98), rgba(5,25,43,.98));
    border: 1px solid rgba(255,255,255,.05);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 12px 34px rgba(0,0,0,.18);
    width: 100%;
    margin: 0 auto;
}

.clientes-title { font-size: 28px; font-weight: 700; color: #ffffff; margin: 0 0 20px 0; }
.section-title { font-size: 20px; color: #fff; font-weight: 700; margin: 30px 0 15px 0; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 10px; }

/* Menú */
.menu-scroll { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
.btn-category { background: #081f34; border: 1px solid rgba(255,255,255,.08); color: #b8cce0; padding: 10px 18px; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: 0.3s; }
.btn-category:hover { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #fff; border-color: transparent; transform: translateY(-2px); }
.btn-action { background: linear-gradient(135deg, #0faf76, #067a53); border: none; color: #fff; padding: 10px 18px; border-radius: 20px; font-size: 13px; font-weight: 700; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(15, 175, 118, 0.3); }
.btn-action:hover { transform: translateY(-2px); box-shadow: 0 6px 14px rgba(15, 175, 118, 0.45); }

/* Buscador */
.search-container { display: flex; gap: 12px; margin-bottom: 25px; flex-wrap: wrap; }
.clientes-input { flex: 1; min-width: 250px; height: 46px; background: #081f34; border: 1px solid rgba(255,255,255,.08); border-radius: 12px; padding: 0 16px; color: #ffffff; font-size: 15px; outline: none; transition: .3s; }
.clientes-input:focus { border-color: #fff; box-shadow: 0 0 0 3px rgba(122,23,255,.18); }
.boton-azul { background: linear-gradient(135deg, #2563eb, #1d4ed8); color: #ffffff; border: none; padding: 0 24px; height: 46px; border-radius: 12px; font-size: 15px; font-weight: 600; cursor: pointer; transition: 0.3s; }
.boton-azul:hover { background: linear-gradient(135deg, #1d4ed8, #1e40af); }

/* Banner */
.banner { height: 350px; background: #081f34; display: flex; align-items: flex-end; padding: 30px; margin-bottom: 30px; border-radius: 16px; font-size: 32px; font-weight: 800; color: #fff; position: relative; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5); transition: background 0.5s ease; }
.banner::after { content: ""; position: absolute; bottom: 0; left: 0; width: 100%; height: 60%; background: linear-gradient(to top, rgba(2, 18, 32, 0.9), transparent); z-index: 1; }
.banner span { position: relative; z-index: 2; text-shadow: 2px 2px 10px rgba(0,0,0,0.8); }

/* Media Grid */
.media-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 20px; }
.media-card { background: transparent; }
.poster { width: 100%; aspect-ratio: 2 / 3; border-radius: 12px; overflow: hidden; cursor: pointer; position: relative; box-shadow: 0 8px 20px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.05); }
.poster img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
.poster:hover img { transform: scale(1.1); }
.poster::after { content: "▶"; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%) scale(0.5); background: rgba(0, 181, 255, 0.8); color: white; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; opacity: 0; transition: all 0.3s ease; }
.poster:hover::after { opacity: 1; transform: translate(-50%, -50%) scale(1); }
.title { font-size: 14px; margin-top: 10px; height: 40px; overflow: hidden; color: #dcecff; font-weight: 600; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; }

/* Paginación */
.paginacion { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; gap: 8px; margin-top: 40px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05); }
.paginacion span { color: #9eb4ca; font-size: 14px; margin-right: 10px; }
.paginacion a { background: #081f34; border: 1px solid rgba(255,255,255,0.08); padding: 8px 14px; border-radius: 8px; color: #dcecff; text-decoration: none; font-weight: 600; font-size: 13px; transition: 0.3s; }
.paginacion a:hover { background: rgba(255,255,255,0.1); }
.paginacion a.active { background: linear-gradient(135deg, #7a17ff, #1558ff); color: #fff; border-color: transparent; }

/* Reproductor Modal */
.modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(2, 18, 32, 0.95); backdrop-filter: blur(5px); z-index: 9999; }
.modal-close { position: absolute; top: 20px; right: 30px; color: #fff; font-size: 40px; cursor: pointer; font-weight: bold; z-index: 10000; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }
.modal video { width: 90%; height: 85%; margin: 5% auto; display: block; border-radius: 12px; box-shadow: 0 20px 50px rgba(0,0,0,0.8); background: #000; }
</style>
</head>
<body>

<div class="panel-dark">

    <h2 class="clientes-title">☢️ MEDIA SERVER TITAN MODE</h2>

    <div class="menu-scroll">
        <?php foreach($generos as $g): ?>
            <button class="btn-category" onclick="location.href='?genre=<?=$g['Id']?>'">🎭 <?=$g['Name']?></button>
        <?php endforeach; ?>

        <div style="width: 2px; background: rgba(255,255,255,0.1); margin: 0 5px;"></div>

        <?php foreach($librerias as $lib): ?>
            <button class="btn-category" onclick="location.href='?lib=<?=$lib['ItemId']?>'">📂 <?=$lib['Name']?></button>
        <?php endforeach; ?>

        <button class="btn-action" onclick="mostrar('iptv')">📺 TV EN VIVO</button>
    </div>

    <?php if(count($seguirviendo) > 0): ?>
        <h3 class="section-title">▶ Seguir viendo</h3>
        <div class="media-grid">
            <?php foreach($seguirviendo as $sv): 
                $id=$sv['Id'] ?? '';
                $name=htmlspecialchars($sv['Name'] ?? 'Desconocido');
                $img=$server."/Items/$id/Images/Primary?maxHeight=400&api_key=".$apikey;
                $video=$server."/Videos/$id/stream?Static=true&api_key=".$apikey;
            ?>
            <div class="media-card">
                <div class="poster" onclick="playVideo('<?=$video?>','<?=addslashes($name)?>','<?=$img?>')">
                    <img src="<?=$img?>" alt="Poster" onerror="this.src='https://dummyimage.com/200x300/000/fff&text=Sin+Imagen'">
                </div>
                <div class="title"><?=$name?></div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <h3 class="section-title">🔍 Explorar Catálogo</h3>
    <form method="GET" class="search-container">
        <input type="text" name="buscar" class="clientes-input" value="<?=htmlspecialchars($buscar_global)?>" placeholder="Buscar películas, series, actores...">
        <button class="boton-azul">Buscar</button>
    </form>

    <div id="banner" class="banner">
        <span>Bienvenido a TITAN MODE</span>
    </div>

    <div id="peliculas">
        <?php if (count($items) > 0): ?>
            <div class="media-grid">
                <?php foreach($items as $item): 
                    $id=$item['Id'] ?? '';
                    $name=htmlspecialchars($item['Name'] ?? 'Desconocido');
                    $img=$server."/Items/$id/Images/Primary?maxHeight=400&api_key=".$apikey;
                    $video=$server."/Videos/$id/stream?Static=true&api_key=".$apikey;
                ?>
                <div class="media-card">
                    <div class="poster" onclick="playVideo('<?=$video?>','<?=addslashes($name)?>','<?=$img?>')">
                        <img src="<?=$img?>" alt="Poster" onerror="this.src='https://dummyimage.com/200x300/000/fff&text=Sin+Imagen'">
                    </div>
                    <div class="title"><?=$name?></div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div style="padding: 30px; text-align: center; color: #8da4bc;">
                No se encontraron resultados para mostrar.
            </div>
        <?php endif; ?>

        <?php if ($total_paginas > 1): ?>
        <div class="paginacion">
            <?php
            function linkPagina($p, $buscar_global, $genre_id, $library_id){
                $link="?page=".$p;
                if($buscar_global!="") $link.="&buscar=".urlencode($buscar_global);
                elseif($library_id!="") $link.="&lib=".$library_id;
                else $link.="&genre=".$genre_id;
                return $link;
            }

            echo "<span>Página <b>$page</b> de <b>$total_paginas</b></span>";

            if($page > 1){
                echo "<a href='".linkPagina(1,$buscar_global,$genre_id,$library_id)."'>⏮ Primero</a>";
                echo "<a href='".linkPagina($page-1,$buscar_global,$genre_id,$library_id)."'>◀ Anterior</a>";
            }

            $mostrar=10;
            $inicio_pag=max(1, $page - floor($mostrar/2));
            $fin_pag=min($total_paginas, $inicio_pag + $mostrar - 1);

            for($i=$inicio_pag; $i<=$fin_pag; $i++){
                $active_class = ($i == $page) ? "class='active'" : "";
                echo "<a $active_class href='".linkPagina($i,$buscar_global,$genre_id,$library_id)."'>$i</a>";
            }

            if($page < $total_paginas){
                echo "<a href='".linkPagina($page+1,$buscar_global,$genre_id,$library_id)."'>Siguiente ▶</a>";
                echo "<a href='".linkPagina($total_paginas,$buscar_global,$genre_id,$library_id)."'>Último ⏭</a>";
            }
            ?>
        </div>
        <?php endif; ?>
    </div>

    <div id="iptv" style="display:none">
        <h3 class="section-title">📺 Canales en Vivo</h3>
        <?php if (count($canales) > 0): ?>
            <div class="media-grid">
                <?php foreach($canales as $c): ?>
                <div class="media-card">
                    <div class="poster" onclick="playVideo('<?=$c['url']?>','<?=addslashes($c['nombre'])?>','')">
                        <div style="width:100%; height:100%; background:linear-gradient(135deg, #1558ff, #7a17ff); display:flex; align-items:center; justify-content:center; color:white; font-size:40px;">
                            📺
                        </div>
                    </div>
                    <div class="title"><?=$c['nombre']?></div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div style="padding: 30px; text-align: center; color: #8da4bc;">
                No se encontró el archivo canales.m3u o no hay canales configurados.
            </div>
        <?php endif; ?>
    </div>

</div>

<div id="player" class="modal" onclick="cerrar()">
    <span class="modal-close">&times;</span>
    <video id="video" controls autoplay onclick="event.stopPropagation()"></video>
</div>

<script>
function playVideo(url, title, img) {
    document.getElementById("player").style.display = "block";
    document.getElementById("video").src = url;
    
    let banner = document.getElementById("banner");
    if (img != "") {
        banner.style.background = "url('" + img + "') center/cover no-repeat";
    } else {
        banner.style.background = "linear-gradient(135deg, #0f8064, #074f3f)";
    }
    banner.innerHTML = "<span>" + title + "</span>";
}

function cerrar() {
    document.getElementById("player").style.display = "none";
    document.getElementById("video").pause();
    document.getElementById("video").src = "";
}

function mostrar(sec) {
    document.getElementById("peliculas").style.display = "none";
    document.getElementById("iptv").style.display = "none";
    document.getElementById(sec).style.display = "block";
}
</script>

</body>
</html>
	<!-- InstanceEndEditable --></main>
  </div>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/app.js"></script>
</body>
<!-- InstanceEnd --></html>
