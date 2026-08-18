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
/* ===================================================
   JELLYFIN ADMIN ISP ULTRA
===================================================*/

/* CONFIG DESDE BD */
$sqljf="SELECT * FROM jellyfin LIMIT 1";
$resjf=mysqli_query($con,$sqljf);
$rowjf=mysqli_fetch_assoc($resjf);

$server=$rowjf['ip'];
$apikey=$rowjf['api'];


/* API */
function jf($url,$method="GET",$data=null){
    global $server,$apikey;

    $ch=curl_init($server.$url);

    curl_setopt_array($ch,[
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_CUSTOMREQUEST=>$method,
        CURLOPT_HTTPHEADER=>[
            "X-Emby-Token: $apikey",
            "Content-Type: application/json"
        ]
    ]);

    if($data)
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));

    $r=curl_exec($ch);
    curl_close($ch);

    return json_decode($r,true);
}


/* SERVIDOR ONLINE */
if(!jf("/System/Info")){
    echo "<script>
    confirm('Servidor Jellyfin fuera de línea');
    window.location='../menu_principal/panel.php';
    </script>";
    exit;
}


/* EXPULSAR SESION */
if(isset($_GET['kick'])){
    jf("/Sessions/".$_GET['kick'],"DELETE");
}


/* DATOS */
$users=jf("/Users") ?? [];
$libs=jf("/Library/VirtualFolders") ?? [];
$sessions=jf("/Sessions") ?? [];

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
/* ===================================================
   JELLYFIN ADMIN ISP ULTRA
===================================================*/

/* CONFIG DESDE BD */
$sqljf="SELECT * FROM jellyfin LIMIT 1";
$resjf=mysqli_query($con,$sqljf);
$rowjf=mysqli_fetch_assoc($resjf);

$server=$rowjf['ip'];
$apikey=$rowjf['api'];


/* API */
function jf($url,$method="GET",$data=null){
    global $server,$apikey;

    $ch=curl_init($server.$url);

    curl_setopt_array($ch,[
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_CUSTOMREQUEST=>$method,
        CURLOPT_HTTPHEADER=>[
            "X-Emby-Token: $apikey",
            "Content-Type: application/json"
        ]
    ]);

    if($data)
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));

    $r=curl_exec($ch);
    curl_close($ch);

    return json_decode($r,true);
}


/* SERVIDOR ONLINE */
if(!jf("/System/Info")){
    echo "<script>
    confirm('Servidor Jellyfin fuera de línea');
    window.location='../menu_principal/panel.php';
    </script>";
    exit;
}


/* EXPULSAR SESION */
if(isset($_GET['kick'])){
    jf("/Sessions/".$_GET['kick'],"DELETE");
}


/* DATOS */
$users=jf("/Users") ?? [];
$libs=jf("/Library/VirtualFolders") ?? [];
$sessions=jf("/Sessions") ?? [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Jellyfin Admin ISP</title>
<style>
/*=========================================
ESTILOS IMPORTADOS DESDE STYLES.CSS
=========================================*/
:root {
  --bg: #021220;
  --bg-soft: #061b2d;
  --panel: #071d31;
  --panel-2: #082239;
  --line: rgba(118, 168, 207, 0.12);
  --text: #e8f3ff;
  --muted: #8da4bc;
  --blue: #1558ff;
  --cyan: #00b5ff;
  --green: #0faf76;
  --red: #ff2f65;
  --orange: #ff8a12;
  --purple: #6424f4;
  --violet: #7207d8;
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
  background-repeat: no-repeat;
  background-attachment: fixed;
  color: var(--text);
  font-family: "Inter", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

/* COMPONENTES PANEL - ANCHO COMPLETO */
.panel-dark {
    background: linear-gradient(180deg, rgba(8,31,52,.98), rgba(5,25,43,.98));
    border: 1px solid rgba(255,255,255,.05);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 12px 34px rgba(0,0,0,.18);
    margin: 0 auto;
    width: 100%;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 20px;
}

.clientes-title {
    font-size: 28px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
}

.cliente-table-title {
    font-size: 22px;
    color: #fff;
    font-weight: 700;
    margin-bottom: 20px;
}

.clientes-input {
    width: 100%;
    height: 46px;
    background: #081f34;
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 12px;
    padding: 0 14px;
    color: #ffffff;
    font-size: 14px;
    outline: none;
    transition: .3s;
}

.clientes-input:focus {
    border-color: #fff;
    box-shadow: 0 0 0 3px rgba(122,23,255,.18);
}

.info-card {
    background: #081f34;
    border: 1px solid rgba(255,255,255,.05);
    border-radius: 14px;
    padding: 18px;
    transition: background 0.3s ease;
}

.info-card:hover {
    background: #0a2640;
}

.info-label {
    font-size: 12px;
    color: #8ca5bd;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.info-value {
    font-size: 15px;
    color: #fff;
    font-weight: 600;
    word-break: break-word;
}

.panel {
    background: linear-gradient(180deg, rgba(8, 31, 52, 0.98), rgba(5, 25, 43, 0.98));
    border: 1px solid var(--line);
    border-radius: 8px;
    padding: 18px;
    box-shadow: 0 12px 34px rgba(0, 0, 0, 0.18);
}

.boton-azul {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    border: none;
    padding: 12px 24px;
    border-radius: 14px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(37, 99, 235, 0.35);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.boton-azul:hover {
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
    transform: translateY(-2px);
}

.estado-cortado {
    background: #ff2f6530;
    color: #ff5a86;
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 700;
    display: inline-block;
    transition: .3s;
}

.estado-cortado:hover {
    background: #ff2f6550;
    color: #ff85a3;
}

.checkbox-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 12px;
    margin-bottom: 20px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #d5e2ef;
    font-size: 14px;
    cursor: pointer;
}
</style>

<script>
function toggle(id){
    let e=document.getElementById(id);
    e.style.display=(e.style.display=="block")?"none":"block";
}

function buscar(){
    let f=document.getElementById("buscar").value.toLowerCase();
    document.querySelectorAll(".user").forEach(u=>{
        u.style.display=u.innerText.toLowerCase().includes(f)?"block":"none";
    });
}
</script>
</head>
<body>

<div class="panel-dark">

    <div class="header-container">
        <h2 class="clientes-title">🔥 JELLYFIN ADMIN ISP ULTRA</h2>
        
        <a href="reproducir.php" class="boton-azul">
            🎬 Abrir Reproductor
        </a>
    </div>

    <div style="margin-bottom: 20px;">
        <input type="text" id="buscar" class="clientes-input" onkeyup="buscar()" placeholder="🔎 Buscar usuario...">
    </div>

    <?php foreach($users as $u):
        $policy=jf("/Users/".$u['Id']."/Policy");
        $enabled=$policy['EnabledFolders'] ?? [];
    ?>

    <div class="user info-card" style="cursor:pointer; margin-bottom:10px; display:flex; align-items:center; gap:12px;" onclick="toggle('u<?=$u['Id']?>')">
        <span style="font-size:20px;">👤</span> 
        <span class="info-value" style="font-size:16px;"><?=$u['Name']?></span>
    </div>

    <div id="u<?=$u['Id']?>" class="panel" style="display:none; margin-bottom:15px; margin-top:-5px;">
        <form method="post">
            <input type="hidden" name="userid" value="<?=$u['Id']?>">

            <h4 style="color:#fff; font-size:16px; margin-top:0; margin-bottom:15px;">Bibliotecas Permitidas</h4>

            <div class="checkbox-grid">
                <?php foreach($libs as $l): ?>
                <label class="checkbox-label">
                    <input type="checkbox"
                    name="folders[]"
                    value="<?=$l['ItemId']?>"
                    <?=in_array($l['ItemId'],$enabled)?'checked':''?>>
                    <?=$l['Name']?>
                </label>
                <?php endforeach; ?>
            </div>

            <button name="guardar" class="boton-azul">Guardar permisos</button>
        </form>
    </div>

    <?php endforeach; ?>

    <hr style="border: 0; height: 1px; background: rgba(255,255,255,0.05); margin: 30px 0;">

    <h3 class="cliente-table-title">📡 Sesiones Activas</h3>

    <?php foreach($sessions as $s):
        $user=$s['UserName'] ?? '';
        $device=$s['DeviceName'] ?? '';
        $ip=$s['RemoteEndPoint'] ?? '';
        $item=$s['NowPlayingItem']['Name'] ?? 'Navegando';
    ?>

    <div class="session info-card" style="margin-bottom:15px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
        
        <div>
            <span class="info-value" style="font-size:18px; color:#00b5ff;">👤 <?=$user?></span><br>
            <span class="info-label">📱 Dispositivo: <span style="color:#d5e2ef;"><?=$device?></span></span><br>
            <span class="info-label">🌐 IP: <span style="color:#d5e2ef;"><?=$ip?></span></span><br>
            <span class="info-label">🎬 Estado: <span style="color:#32ffae;"><?=$item?></span></span>
        </div>

        <a href="?kick=<?=$s['Id']?>" class="estado-cortado" style="text-decoration:none;" onclick="return confirm('¿Expulsar usuario?')">
            🚫 Expulsar
        </a>

    </div>

    <?php endforeach; ?>

    <?php
    /* GUARDAR PERMISOS */
    if(isset($_POST['guardar'])){

        $id=$_POST['userid'];
        $folders=$_POST['folders'] ?? [];

        $policy=jf("/Users/$id/Policy");
        $policy['EnabledFolders']=$folders;

        jf("/Users/$id/Policy","POST",$policy);

        echo "<script>
        confirm('Permisos actualizados');
        window.location='../menu_principal/panel.php';
        </script>";
    }
    ?>

</div>

</body>
</html><!-- InstanceEndEditable --></main>
  </div>

  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../js/app.js"></script>
</body>
<!-- InstanceEnd --></html>
