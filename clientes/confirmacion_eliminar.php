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
      <a href="index.php"><i data-lucide="users"></i> Clientes</a>
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
if(isset($_POST['numero']))
{	
	$numero = $_POST['numero'];
	$nodo = $_POST['nodo'];
}
if(isset($_GET['numero']))
{	
	$numero = $_GET['numero'];
	$nodo = $_GET['nodo'];
}									
?>
<table width="100%">
  <tbody>
    <tr>
      <td align="center"><div class="esquinas_redondeadas">
        &nbsp;
        <h2  id="optimus">ELIMINACION DE EQUIPO</h2>
		  <h2  id="optimus">NODO DE <?php echo $nodo;?></h2>
        </div>
        </td>
    </tr>
    <tr>
      <td align="center"><?php

if (function_exists('ssh2_connect')) {
    //echo "La extensión SSH2 está habilitada.";
	//echo "<br>";
} else {
    echo "La extensión SSH2 no está habilitada.";
}
?>
        <?php
// SELECCIONO MIKROTIK
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `mikrotik` WHERE `nodo` LIKE '$nodo'";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$host=$crowem['ip'];
	$username=$crowem['usuario'];
	$password=$crowem['contrasena'];
	
}
//$host = '192.168.2.123';
$port = 22;
//$username = 'admin';
//$password = 'Megalink2020';


$sqlolt = "SELECT * from `olt_conexion` WHERE `nodo` LIKE '$nodo'";
$resultolt = mysqli_query($con, $sqlolt);
while($crowolt = mysqli_fetch_assoc($resultolt))
{
$host_olt=$crowolt['ip'];
$u_olt=$crowolt['usuario'];
$p_olt=$crowolt['contrasena'];
}	
// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display ont info by-sn '.$numero."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
$separador = "F/S/P";
$separadaf = explode($separador, $output);
$posicion = $separadaf[1];
$separador = "Control";
$separadaff = explode($separador, $separadaf[1]);
?>
        <br>
        <?php
$posicion = $separadaff[0];
$separador = "ONT-ID";
$separadafff = explode($separador, $separadaff[0]);
$tarjeta  =str_replace(' ', '.', $separadafff[0]);
$tarjeta  =str_replace(':', '.', $tarjeta);
$tarjeta  =str_replace('.', '', $tarjeta);
$tarjeta = substr($tarjeta, 0, -1);
$ontid  =str_replace(' ', '.', $separadafff[1]);
$ontid  =str_replace(':', '.', $ontid);
$ontid  =str_replace('.', '', $ontid);
$ontid = substr($ontid, 0, -1);
$tarjeta ;
//echo "-";
$ontid  =str_replace(["\r\n", "\n", "\r"], '', $ontid);
$ontid = (int)$ontid;
//echo "-";
}
// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display service-port port '.$tarjeta.'ont '.$ontid."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
$output  =str_replace(["\r\n", "\n", "\r"], '*', $output);
$separador = "*";
$separado = explode($separador, $output);
$separador = " ";
//$separadoa = explode($separador, $separado[35]);
$index = substr($separado[35],0,8);
$indexentero = (int)$index;
//echo $rellenado  =str_replace(' ', '*', $separado[35]);

}

// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{
?>
        <br>
        <?php
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'undo service-port '.$indexentero."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
}

// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{
?>
        <br>
        <?php
$separador = "/";
$puertoont = explode($separador, $tarjeta);
$puertoontarmado= $puertoont[0]."/".$puertoont[1];	
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'interface gpon '.$puertoontarmado."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
}
// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{
?>
        <br>
        <?php
$separador = "/";
$puertoont = explode($separador, $tarjeta);
$puertoontuno = (int)$puertoont[1];
$puertoontdos = (int)$puertoont[2];	
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'interface gpon '.$puertoontarmado."\n".'ont delete '.$puertoontdos." ".$ontid."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
}
// EJECUTAR CONEXION DE OLT 
$connection = ssh2_connect($host_olt, $port);
if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
die("La autenticación SSH falló.");
}else
{

$separador = "/";
$puertoont = explode($separador, $tarjeta);
$puertoontarmado= $puertoont[1]."/".$puertoont[2];	
// SACAR INFORMACION DE OLT
// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
echo $command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'save '."\n";
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
$output;
}
?>
        <br>
        <?php
//ELIMINAR CLIENTE DE MIKROTIK DE LOS LISTADOS DE SUSPENDIDOS Y NACTIVOS
//BUSCAR IP EN CONTRATROS
//echo $numero;
$sqlc = "SELECT * from `contratos` WHERE `router` LIKE '$numero'";
$resultc = mysqli_query($con, $sqlc);
while ($crowc = mysqli_fetch_assoc($resultc)) 
{
	$ipcliente = $crowc['ip'];
	$nodo = $crowc['nodo'];
}
// SELECCIONO MIKROTIK
$sqlem = "SELECT * from `mikrotik`  WHERE `nodo` LIKE '$nodo'";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$host=$crowem['ip'];
	$username=$crowem['usuario'];
	$password=$crowem['contrasena'];
	
}
$port = 22;
$connection = ssh2_connect($host, $port);
if (!$connection) {
    die("No se pudo establecer la conexión SSH.");
}

// Autenticación
if (!ssh2_auth_password($connection, $username, $password)) {
    die("La autenticación SSH falló.");
}

// ELIMINAR DE MIKROTIK QUE DA SERVICIO
//$command = '/ip/hotspot/print';
echo $command = '/ip firewall address-list remove [/ip firewall address-list find list="clientes_cuenca" address='.$ipcliente.']';
?>
<br>
<?php
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
//ELIMINAR DE EL LISTADO DE CORTES
$connection = ssh2_connect($host, $port);
if (!$connection) {
    die("No se pudo establecer la conexión SSH.");
}

// Autenticación
if (!ssh2_auth_password($connection, $username, $password)) {
    die("La autenticación SSH falló.");
}

// ELIMINAR DE MIKROTIK QUE SUSPENDE SERVICIO
//$command = '/ip/hotspot/print';
echo $command = '/ip firewall address-list remove [/ip firewall address-list find list="Suspendido" address='.$ipcliente.']';
?>
<br>
<?php
$stream = ssh2_exec($connection, $command);
stream_set_blocking($stream, true);
$output = stream_get_contents($stream);
//ACTIUALIZAR CONTRATO PARA ELIMINAR ROUTER
$nuevorouter = "Sin_Asignar";
$sql = "UPDATE contratos SET router='$nuevorouter' WHERE router='$numero'";
mysqli_query($con, $sql);
//ACTIUALIZAR SERIES PARA DEJAR LIBRE EL EQUIPO
$asignado = "disponible";
$contrato = "0";
$sql = "UPDATE series SET asignado='$asignado', contrato='$contrato' WHERE serie='$numero'";
mysqli_query($con, $sql);


//echo "--------------fin--------------";



//header('Location: ../clientes/productos.php');

?></td>
    </tr>
  </tbody>
</table>
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
