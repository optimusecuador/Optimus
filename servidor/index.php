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
        <a href="#"><i data-lucide="ticket"></i>Tickets</a>-->
        <a href="../reportes/index.php"><i data-lucide="bar-chart-3"></i>Reportes</a>
        <a href="../productos/productos.php"><i data-lucide="boxes"></i>Inventario</a>
        <!--<a href="#"><i data-lucide="warehouse"></i>Bodegas</a>-->
        <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i>Personal</a>
		<a href="../serviciotecnico/index.php"><i data-lucide="user-round-cog"></i>Servicio Tecnico</a>
        <a href="../olt/listado.php"><i data-lucide="shield-check"></i>OLT</a>
        <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i>MikroTik</a>
        <a href="../truenas/truenas.php"><i data-lucide="shield-check"></i>NAS </a>
        <a href="../traccar/traccar.php"><i data-lucide="shield-check"></i>Rastreo </a>
        <a href="../streaming/index.php"><i data-lucide="shield-check"></i>Sreaming</a>
        <a href="../zkteco/index.php"><i data-lucide="shield-check"></i>ZKTeco</a>
        <a href="../arcotel/index.php"><i data-lucide="handshake"></i>Arcotel</a>
        <!--<a href="#"><i data-lucide="badge-check"></i>Estado del Contrato</a>-->
        <a href="#"><i data-lucide="calculator"></i>Contabilidad</a>
        <a href="#"><i data-lucide="settings"></i>Configuración</a>
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
      <!-- InstanceBeginEditable name="principal" -->
		
		<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function formatBytes($size, $precision = 2) {
    if ($size <= 0) return '0 B';
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

$os = PHP_OS_FAMILY; // Detecta 'Windows' o 'Linux'
$hostname = gethostname();
$php_version = phpversion();
$server_ip = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1';
$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido';

// Variables iniciales
$uptime = "N/A";
$load = ["N/A"];
$ram_percent = 0; $ram_total = 0; $ram_used = 0; $ram_free = 0;
$disk_total = disk_total_space(".");
$disk_free = disk_free_space(".");
$disk_used = $disk_total - $disk_free;
$disk_percent = round(($disk_used / $disk_total) * 100, 2);
$cpu_model = "Desconocido";
$procesos = 0;
$usuarios = 1;
$temperatura = "No disponible";

if ($os === 'Windows') {
    // Lógica para Windows
    $uptime = "Check System Info";
    $cpu_model = php_uname('m');
    $procesos = count(explode("\n", shell_exec("tasklist"))) - 3;
    $mem = shell_exec("wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value");
    if ($mem) {
        preg_match_all('/(\d+)/', $mem, $matches);
        $ram_total = round($matches[0][1] / 1024);
        $ram_free = round($matches[0][0] / 1024);
        $ram_used = $ram_total - $ram_free;
        $ram_percent = round(($ram_used / $ram_total) * 100, 2);
    }
} else {
    // Lógica para Linux
    $uptime = trim(shell_exec("uptime -p"));
    $load = sys_getloadavg();
    $cpu_model = trim(shell_exec("grep 'model name' /proc/cpuinfo | head -1 | cut -d ':' -f2"));
    $procesos = trim(shell_exec("ps aux | wc -l"));
    $usuarios = trim(shell_exec("who | wc -l"));
    $mem = shell_exec("free -m");
    if($mem) {
        $lineas = explode("\n", $mem);
        $datos = preg_split('/\s+/', trim($lineas[1]));
        $ram_total = $datos[1]; $ram_used = $datos[2]; $ram_free = $datos[3];
        $ram_percent = ($ram_total > 0) ? round(($ram_used/$ram_total)*100, 2) : 0;
    }
    $temp = @file_get_contents("/sys/class/thermal/thermal_zone0/temp");
    $temperatura = ($temp) ? round($temp/1000, 1)." °C" : "No disponible";
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
        <a href="../respaldos/index.php"><i data-lucide="monitor"></i>Respaldos</a>
        <!--<a href="#"><i data-lucide="wifi"></i>Red</a>
        <a href="#"><i data-lucide="circle-dollar-sign"></i>Facturación</a>
        <a href="#"><i data-lucide="file-signature"></i>Contratos</a>
        <a href="#"><i data-lucide="ticket"></i>Tickets</a>-->
        <a href="../reportes/index.php"><i data-lucide="bar-chart-3"></i>Reportes</a>
        <a href="../productos/productos.php"><i data-lucide="boxes"></i>Inventario</a>
        <!--<a href="#"><i data-lucide="warehouse"></i>Bodegas</a>-->
        <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i>Personal</a>
		<a href="../serviciotecnico/index.php"><i data-lucide="user-round-cog"></i>Servicio Tecnico</a>
        <a href="../olt/listado.php"><i data-lucide="shield-check"></i>OLT</a>
        <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i>MikroTik</a>
        <a href="../truenas/truenas.php"><i data-lucide="shield-check"></i>NAS </a>
        <a href="../traccar/traccar.php"><i data-lucide="shield-check"></i>Rastreo </a>
        <a href="../streaming/index.php"><i data-lucide="shield-check"></i>Sreaming</a>
        <a href="../zkteco/index.php"><i data-lucide="shield-check"></i>ZKTeco</a>
        <a href="../arcotel/index.php"><i data-lucide="handshake"></i>Arcotel</a>
        <!--<a href="#"><i data-lucide="badge-check"></i>Estado del Contrato</a>-->
        <a href="#"><i data-lucide="calculator"></i>Contabilidad</a>
        <a href="#"><i data-lucide="settings"></i>Configuración</a>
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
      <!-- InstanceBeginEditable name="principal" -->
		
		<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function formatBytes($size, $precision = 2) {
    if ($size <= 0) return '0 B';
    $base = log($size, 1024);
    $suffixes = array('B', 'KB', 'MB', 'GB', 'TB');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

$os = PHP_OS_FAMILY; // Detecta 'Windows' o 'Linux'
$hostname = gethostname();
$php_version = phpversion();
$server_ip = $_SERVER['SERVER_ADDR'] ?? '127.0.0.1';
$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'Desconocido';

// Variables iniciales
$uptime = "N/A";
$load = ["N/A"];
$ram_percent = 0; $ram_total = 0; $ram_used = 0; $ram_free = 0;
$disk_total = disk_total_space(".");
$disk_free = disk_free_space(".");
$disk_used = $disk_total - $disk_free;
$disk_percent = round(($disk_used / $disk_total) * 100, 2);
$cpu_model = "Desconocido";
$procesos = 0;
$usuarios = 1;
$temperatura = "No disponible";

if ($os === 'Windows') {
    // Lógica para Windows
    $uptime = "Check System Info";
    $cpu_model = php_uname('m');
    $procesos = count(explode("\n", shell_exec("tasklist"))) - 3;
    $mem = shell_exec("wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value");
    if ($mem) {
        preg_match_all('/(\d+)/', $mem, $matches);
        $ram_total = round($matches[0][1] / 1024);
        $ram_free = round($matches[0][0] / 1024);
        $ram_used = $ram_total - $ram_free;
        $ram_percent = round(($ram_used / $ram_total) * 100, 2);
    }
} else {
    // Lógica para Linux
    $uptime = trim(shell_exec("uptime -p"));
    $load = sys_getloadavg();
    $cpu_model = trim(shell_exec("grep 'model name' /proc/cpuinfo | head -1 | cut -d ':' -f2"));
    $procesos = trim(shell_exec("ps aux | wc -l"));
    $usuarios = trim(shell_exec("who | wc -l"));
    $mem = shell_exec("free -m");
    if($mem) {
        $lineas = explode("\n", $mem);
        $datos = preg_split('/\s+/', trim($lineas[1]));
        $ram_total = $datos[1]; $ram_used = $datos[2]; $ram_free = $datos[3];
        $ram_percent = ($ram_total > 0) ? round(($ram_used/$ram_total)*100, 2) : 0;
    }
    $temp = @file_get_contents("/sys/class/thermal/thermal_zone0/temp");
    $temperatura = ($temp) ? round($temp/1000, 1)." °C" : "No disponible";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="30">
    <title>Dashboard <?php echo $os; ?></title>
    <style>
        body{background:#0f172a;color:#fff;padding:20px;font-family:sans-serif;}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:20px;}
        .card{background:#1e293b;border-radius:12px;padding:20px;box-shadow:0 0 15px rgba(0,0,0,.3);}
        .valor{font-size:28px;font-weight:bold;}
        .barra{width:100%;background:#334155;border-radius:10px;height:20px;margin-top:10px;}
        .progreso{height:100%;background:#22c55e;border-radius:10px;}
        table{width:100%;border-collapse:collapse;margin-top:20px;}
        td{padding:8px;border-bottom:1px solid #334155;}
    </style>
</head>
<body>
    <h1>🖥 Dashboard: <?php echo $os; ?></h1>
    <div class="grid">
        <div class="card"><h3>RAM</h3><div class="valor"><?php echo $ram_percent; ?>%</div>
            <div class="barra"><div class="progreso" style="width:<?php echo $ram_percent; ?>%"></div></div>
        </div>
        <div class="card"><h3>Procesos</h3><div class="valor"><?php echo $procesos; ?></div></div>
        <div class="card"><h3>CPU Load</h3><div class="valor"><?php echo is_array($load) ? $load[0] : $load; ?></div></div>
    </div>
    <div class="card" style="margin-top:20px;">
        <h2>Información del Sistema</h2>
        <table>
            <tr><td>SO</td><td><?php echo PHP_OS; ?></td></tr>
            <tr><td>Hostname</td><td><?php echo $hostname; ?></td></tr>
            <tr><td>CPU</td><td><?php echo $cpu_model; ?></td></tr>
            <tr><td>Uptime</td><td><?php echo $uptime; ?></td></tr>
        </table>
    </div>
</body>
</html>
		
		<!-- InstanceEndEditable --></main>
  </div>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/app.js"></script>
</body>
<!-- InstanceEnd --></html>
