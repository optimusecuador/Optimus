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
      <a href="../streaming/index.php"><i data-lucide="play-circle"></i> Jellyfin</a>
      <a href="../peliculas/index.php"><i data-lucide="play-circle"></i> Streamin local</a>
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
/*=========================================
HACER PING SEGUN SO
=========================================*/
function obtenerPing($ip){

    // Detectar sistema operativo
    $sistema = strtoupper(substr(PHP_OS, 0, 3));

    // Comando según sistema
    if($sistema == 'WIN'){

        // WINDOWS
        $comando = "ping -n 1 ".$ip;

    }else{

        // LINUX
        $comando = "ping -c 1 ".$ip." 2>&1";
    }

    // Ejecutar ping
    $salida = shell_exec($comando);

    // Buscar tiempo en diferentes formatos
    if(preg_match('/time[=<]?\s*([0-9\.]+)/i', $salida, $coincidencia)){

        return $coincidencia[1]." ms";

    }elseif(preg_match('/tiempo[=<]?\s*([0-9\.]+)/i', $salida, $coincidencia)){

        // Algunos Windows en español
        return $coincidencia[1]." ms";

    }else{

        // Mostrar salida para depuración
        return "Sin respuesta";
    }
}

// Obtener pings
$ping1 = obtenerPing("8.8.8.8");
$ping2 = obtenerPing("8.8.4.4");

// Mostrar resultados
//echo "8.8.8.8 → ".$ping1."<br>";
//echo "8.8.4.4 → ".$ping2."<br>";

?>
<?php

/*=========================================
  BUSCAR TODOS LOS NODOS
=========================================*/

$sqlnodos = "SELECT * FROM nodo";
$resultadonodos = $conn->query($sqlnodos);

/*=========================================
  RECORRER NODOS
=========================================*/

while($filanodo = $resultadonodos->fetch_assoc()){

    $puesto = $filanodo['puesto'];
    $codigo = $filanodo['codigo'];

    /*=========================================
      MOSTRAR VARIABLES SIMPLES
    =========================================*/
	?>
	<div class="isp-card isp-purple">
    <div class="isp-card-value">NODO <?php echo $puesto;?></div>
	<div class="isp-card-icon"><img src="../images/sistema/41.png" width="64" height="38" alt=""/></div>
    </div>
	<br>
	<?php 
/*=========================================
CONSULTA
=========================================*/

/*=========================================
RANGO 12 MESES
6 ANTES Y 6 DESPUES
=========================================*/

$meses_grafico = array();

for($i=-6; $i<=6; $i++){

    $timestamp = strtotime($i." month");

    $numero_mes = date("n",$timestamp);
    $anio_mes   = date("Y",$timestamp);

    $clave = $anio_mes."-".$numero_mes;

    $meses_grafico[$clave] = array(
        "mes"   => $numero_mes,
        "anio"  => $anio_mes,
        "total" => 0
    );

}

/*=========================================
CONSULTA CONTRATOS POR MES
=========================================*/

$sqlgrafico = "
SELECT 
    MONTH(fecha) AS mes,
    YEAR(fecha) AS anio,
    COUNT(id) AS total_mes
FROM contratos
WHERE estado='activo'
AND nodo='$codigo'
GROUP BY YEAR(fecha), MONTH(fecha)
";

$resultadografico = $conn->query($sqlgrafico);

/*=========================================
LLENAR MESES
=========================================*/

while($fila_mes = $resultadografico->fetch_assoc()){

    $mes  = $fila_mes['mes'];
    $anio = $fila_mes['anio'];

    $clave = $anio."-".$mes;

    if(isset($meses_grafico[$clave])){

        $meses_grafico[$clave]['total'] = $fila_mes['total_mes'];

    }

}

/*=========================================
CALCULAR ESCALA MAXIMA
=========================================*/

$maximo = 10;

foreach($meses_grafico as $dato){

    if($dato['total'] > $maximo){

        $maximo = $dato['total'];

    }

}

/*=========================================
REDONDEAR ESCALA
=========================================*/

$maximo = ceil($maximo / 10) * 10;

/*=========================================
GENERAR LINEAS
=========================================*/

$polyline = "";
$polygon  = "";
$labels   = "";
$tooltip  = "";

$x = 100;

$meses_nombre = array(
    1=>"ENE",
    2=>"FEB",
    3=>"MAR",
    4=>"ABR",
    5=>"MAY",
    6=>"JUN",
    7=>"JUL",
    8=>"AGO",
    9=>"SEP",
    10=>"OCT",
    11=>"NOV",
    12=>"DIC"
);

foreach($meses_grafico as $dato){

    $mes   = $dato['mes'];
    $anio  = $dato['anio'];
    $total = $dato['total'];

    /*=========================================
    POSICION Y
    =========================================*/

    $altura_util = 250;

    $y = 320 - (($total / $maximo) * $altura_util);

    /*=========================================
    LINEAS
    =========================================*/

    $polyline .= $x.",".$y." ";
    $polygon  .= $x.",".$y." ";

    /*=========================================
    LABELS
    =========================================*/

    $labels .= '

    <text
        x="'.$x.'"
        y="355"
        fill="#dcecff"
        font-size="13"
        font-family="Arial"
        font-weight="700"
        text-anchor="middle">

        '.$meses_nombre[$mes].'

    </text>

    <text
        x="'.$x.'"
        y="372"
        fill="#7f95ad"
        font-size="11"
        font-family="Arial"
        text-anchor="middle">

        '.$anio.'

    </text>

    ';

    /*=========================================
    TOOLTIPS VISUALES
    =========================================*/

    $tooltip .= '

    <g>

        <title>
            '.$meses_nombre[$mes].' '.$anio.'
            | Contratos: '.$total.'
        </title>

        <circle
            cx="'.$x.'"
            cy="'.$y.'"
            r="16"
            fill="transparent">
        </circle>

    </g>

    ';

    $x = $x + 70;

}
/*=========================================
    BUSCAR CUANTOS CONTRATOS EN TOTAL EXISTEN
    =========================================*/
	$sql = "
SELECT 
    COUNT(contratos.id) AS cantidad_activos,
    SUM(productos.preciouno) AS total
FROM contratos
INNER JOIN productos 
ON contratos.producto = productos.id
WHERE contratos.estado='activo'
AND contratos.nodo='$codigo'
";

$resultado = $conn->query($sql);

/*=========================================
VARIABLES
=========================================*/

$total = 0;
$cantidad_activos = 0;

if($resultado){

    $fila = $resultado->fetch_assoc();

    /*=========================================
    TOTAL DINERO
    =========================================*/

    $total = $fila['total'];

    /*=========================================
    TOTAL CONTRATOS ACTIVOS DEL NODO
    =========================================*/

    $cantidad_activos = $fila['cantidad_activos'];

}
?>
		
<?php

/*=========================================
OBTENER FECHAS SEMANA ACTUAL
LUNES A DOMINGO
=========================================*/

$lunes = date('Y-m-d', strtotime('monday this week'));
$domingo = date('Y-m-d', strtotime('sunday this week'));

/*=========================================
CONSULTA
=========================================*/

$sql = "
SELECT COUNT(id) AS total_semana
FROM clienteasignar
WHERE fecha BETWEEN '$lunes' AND '$domingo'
";

/*=========================================
EJECUTAR CONSULTA
=========================================*/

$resultado = $conn->query($sql);

/*=========================================
VARIABLE
=========================================*/

$total_semana = 0;

if($resultado){

    $fila = $resultado->fetch_assoc();

    $total_semana = $fila['total_semana'];

}

/*=========================================
IMPRIMIR VARIABLE
=========================================*/

//echo $total_semana;


/*=========================================
VERIFICAR INTERNET DEL SERVIDOR
SCRIPT LIVIANO
=========================================*/

/*
HOST RAPIDO Y ESTABLE
*/

$host = "8.8.8.8";

/*=========================================
INTENTAR CONEXION
=========================================*/

$conexion = @fsockopen($host, 53, $error_codigo, $error_texto, 1);

/*=========================================
ESTADO
=========================================*/

$estado_internet = "SIN INTERNET";

if($conexion){

    $estado_internet = "CONECTADO";

    fclose($conexion);

}

/*=========================================
IMPRIMIR
=========================================*/

//echo $estado_internet;

?>	
<?php
	/*=========================================
    BUSCAR CUANTOS CONTRATOS EN TOTAL EXISTEN
    =========================================*/
	$sql = "
SELECT 
    COUNT(contratos.id) AS cantidad_activos,
    SUM(productos.preciouno) AS total
FROM contratos
INNER JOIN productos 
ON contratos.producto = productos.id
WHERE contratos.estado!='activo'
AND contratos.nodo='$codigo'
";

$resultado = $conn->query($sql);

/*=========================================
VARIABLES
=========================================*/

$total = 0;
$cantidad_incompletos = 0;

if($resultado){

    $fila = $resultado->fetch_assoc();

    /*=========================================
    TOTAL DINERO
    =========================================*/

    $total = $fila['total'];

    /*=========================================
    TOTAL CONTRATOS ACTIVOS DEL NODO
    =========================================*/

    $cantidad_incompletos = $fila['cantidad_activos'];

}

?>
		
<div class="isp-dashboard">

    <!-- TARJETAS -->
    <div class="isp-cards">

        <div class="isp-card isp-purple">
            <div class="isp-card-title">Clientes activos </div>
            <div class="isp-card-value"><?php echo $cantidad_activos;?></div>
            <div class="isp-card-footer">↗ 8.5% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-purple">
            <div class="isp-card-title">Contratos Incompletos </div>
            <div class="isp-card-value"><?php echo $cantidad_incompletos;?></div>
            <div class="isp-card-footer">↗ 8.5% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>

        <div class="isp-card isp-blue">
            <div class="isp-card-title">Ingresos del mes</div>
            <div class="isp-card-value"><?php echo $total;?></div>
            <div class="isp-card-footer">↗ 12.4% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>

        <div class="isp-card isp-green">
            <div class="isp-card-title">Red uptime</div>
            <div class="isp-card-value">En Construccion</div>
            <div class="isp-card-footer">↗ 0.02% vs mes anterior</div>
            <div class="isp-card-icon"></div>
        </div>

        <div class="isp-card isp-orange">
            <div class="isp-card-title">Tikets de la Semana</div>
            <div class="isp-card-value"><?php echo $total_semana;?></div>
            <div class="isp-card-footer">↘ 25% vs ayer</div>
            <div class="isp-card-icon"><img src="../images/sistema/10.png" width="64" height="38" alt=""/></div>
        </div>

    </div>

    <!-- GRAFICOS -->

	<?php
// =====================================
// CONTRATOS POR MES
// =====================================

$anio = date("Y");
$datos = array();

for($mes=1;$mes<=12;$mes++){

    $mes2 = str_pad($mes,2,"0",STR_PAD_LEFT);

    $sql = "
        SELECT COUNT(*) AS total
        FROM contratos
        WHERE fecha LIKE '".$anio."-".$mes2."-%'
    ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $datos[] = intval($row['total']);
}

// TOTAL CONTRATOS
$sqlTotal = "SELECT COUNT(*) total FROM contratos";
$resTotal = mysqli_query($con,$sqlTotal);
$rowTotal = mysqli_fetch_assoc($resTotal);
$totalContratos = $rowTotal['total'];

// CONTRATOS ACTIVOS
$sqlActivos = "
SELECT COUNT(*) total
FROM contratos
WHERE estado LIKE 'ACTIVO'
";
$resActivos = mysqli_query($con,$sqlActivos);
$rowActivos = mysqli_fetch_assoc($resActivos);
$activos = $rowActivos['total'];
?>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="contenedor-grafico">
	<div id="grafico_contratos"></div>

    <div class="estadisticas">

        <div class="item-estadistica">
            Nodo: <span>GENERAL</span>
        </div>

        <div class="item-estadistica">
            Clientes activos:
            <span><?php echo $activos; ?></span>
        </div>

        <div class="item-estadistica">
            Total:
            <span><?php echo $totalContratos; ?></span>
        </div>

    </div>

</div>

<script>

var options = {

    series: [{
        name: 'Contratos',
        data: [<?php echo implode(",",$datos); ?>]
    }],

    chart: {
        type: 'line',
        height: 320,
        toolbar: {
            show: false
        },
        background: 'transparent'
    },

    colors: ['#8b5cf6'],

    stroke: {
        width: 5,
        curve: 'smooth'
    },

    markers: {
        size: 7,
        strokeWidth: 3
    },

    dataLabels: {
        enabled: false
    },

    grid: {
        borderColor: 'rgba(255,255,255,0.08)'
    },

    title: {
        text: 'CONTRATOS ACTIVOS POR MES',
        align: 'left',
        style: {
            color: '#ffffff',
            fontSize: '20px'
        }
    },

    subtitle: {
        text: 'Visualización comparativa de contratos',
        align: 'left',
        style: {
            color: '#cccccc'
        }
    },

    xaxis: {
        categories: [
            'ENE <?php echo $anio;?>',
            'FEB <?php echo $anio;?>',
            'MAR <?php echo $anio;?>',
            'ABR <?php echo $anio;?>',
            'MAY <?php echo $anio;?>',
            'JUN <?php echo $anio;?>',
            'JUL <?php echo $anio;?>',
            'AGO <?php echo $anio;?>',
            'SEP <?php echo $anio;?>',
            'OCT <?php echo $anio;?>',
            'NOV <?php echo $anio;?>',
            'DIC <?php echo $anio;?>'
        ],
        labels: {
            style: {
                colors: '#ffffff'
            }
        }
    },

    yaxis: {
        labels: {
            style: {
                colors: '#ffffff'
            }
        }
    },

    tooltip: {
        theme: 'dark'
    }
};

var chart = new ApexCharts(
    document.querySelector("#grafico_contratos"),
    options
);

chart.render();

</script>

<style>

.contenedor-grafico{
    width:100%;
    padding:20px;
    border-radius:15px;
    background:linear-gradient(135deg,#021524,#04233f,#08164e);
    color:#fff;
    box-shadow:0 0 20px rgba(0,0,0,.4);
}

#grafico_contratos{
    width:100%;
    min-height:320px;
}

.estadisticas{
    display:flex;
    gap:15px;
    margin-top:15px;
    flex-wrap:wrap;
}

.item-estadistica{
    background:rgba(255,255,255,.06);
    padding:10px 15px;
    border-radius:10px;
}

.item-estadistica span{
    color:#9d4edd;
    font-weight:bold;
}

</style>
	<br>
<?php
// =====================================
// SERVICIOS TÉCNICOS POR MES
// =====================================

$anio = date("Y");

$meses = array(
    "ENE","FEB","MAR","ABR","MAY","JUN",
    "JUL","AGO","SEP","OCT","NOV","DIC"
);

$datos = array();

for($m=1;$m<=12;$m++){

    $mes = str_pad($m,2,"0",STR_PAD_LEFT);

    $sql = "
    SELECT COUNT(*) total
    FROM serviciotecnico
    WHERE fecha LIKE '".$anio."-".$mes."-%'
    ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $datos[] = (int)$row['total'];
}
?>

<div id="grafico_serviciotecnico"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

var options = {

    series: [{
        name: 'Servicios',
        data: [<?php echo implode(",",$datos); ?>]
    }],

    chart: {
        type: 'line',
        height: 350,
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
        background: 'transparent'
    },

    stroke: {
        curve: 'smooth',
        width: 5
    },

    markers: {
        size: 7,
        strokeWidth: 3
    },

    colors: ['#8B5CF6'],

    title: {
        text: 'SERVICIOS TÉCNICOS POR MES',
        align: 'left',
        style: {
            color: '#FFFFFF',
            fontSize: '20px'
        }
    },

    subtitle: {
        text: 'Visualización comparativa de órdenes de servicio',
        align: 'left',
        style: {
            color: '#B0B0B0'
        }
    },

    xaxis: {
        categories: [
            'ENE <?php echo $anio; ?>',
            'FEB <?php echo $anio; ?>',
            'MAR <?php echo $anio; ?>',
            'ABR <?php echo $anio; ?>',
            'MAY <?php echo $anio; ?>',
            'JUN <?php echo $anio; ?>',
            'JUL <?php echo $anio; ?>',
            'AGO <?php echo $anio; ?>',
            'SEP <?php echo $anio; ?>',
            'OCT <?php echo $anio; ?>',
            'NOV <?php echo $anio; ?>',
            'DIC <?php echo $anio; ?>'
        ],
        labels: {
            style: {
                colors: '#FFFFFF'
            }
        }
    },

    yaxis: {
        labels: {
            style: {
                colors: '#FFFFFF'
            }
        }
    },

    grid: {
        borderColor: 'rgba(255,255,255,0.1)'
    },

    dataLabels: {
        enabled: false
    },

    tooltip: {
        theme: 'dark'
    }
};

var chart = new ApexCharts(
    document.querySelector("#grafico_serviciotecnico"),
    options
);

chart.render();

</script>
	<br>
<?php
// =====================================
// SERVICIOS TECNICOS PENDIENTES POR MES
// TABLA: clienteasignar
// =====================================

$anio = date("Y");
$datos = array();

for($mes=1;$mes<=12;$mes++){

    $mes2 = str_pad($mes,2,"0",STR_PAD_LEFT);

    $sql = "
        SELECT COUNT(*) total
        FROM clienteasignar
        WHERE fecha LIKE '".$anio."-".$mes2."-%'
    ";

    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $datos[] = intval($row['total']);
}

// TOTAL SERVICIOS
$sqlTotal = "SELECT COUNT(*) total FROM clienteasignar";
$resTotal = mysqli_query($con,$sqlTotal);
$rowTotal = mysqli_fetch_assoc($resTotal);
$totalServicios = $rowTotal['total'];

// SERVICIOS PENDIENTES
$sqlPendientes = "
SELECT COUNT(*) total
FROM clienteasignar
WHERE estado LIKE 'PENDIENTE'
";

$resPendientes = mysqli_query($con,$sqlPendientes);
$rowPendientes = mysqli_fetch_assoc($resPendientes);
$pendientes = $rowPendientes['total'];

?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="contenedor-grafico">
	<div id="grafico_pendientes"></div>

    <div class="estadisticas">

        <div class="item-estadistica">
            Pendientes:
            <span><?php echo $pendientes; ?></span>
        </div>

        <div class="item-estadistica">
            Total servicios:
            <span><?php echo $totalServicios; ?></span>
        </div>

        <div class="item-estadistica">
            Año:
            <span><?php echo $anio; ?></span>
        </div>

    </div>

</div>

<script>

var options = {

    series: [{
        name: 'Servicios',
        data: [<?php echo implode(",",$datos); ?>]
    }],

    chart: {
        type: 'line',
        height: 320,
        toolbar: {
            show: false
        },
        background: 'transparent'
    },

    colors: ['#8B5CF6'],

    stroke: {
        width: 5,
        curve: 'smooth'
    },

    markers: {
        size: 7,
        strokeWidth: 3
    },

    dataLabels: {
        enabled: false
    },

    grid: {
        borderColor: 'rgba(255,255,255,0.08)'
    },

    title: {
        text: 'SERVICIOS TECNICOS PENDIENTES POR MES',
        align: 'left',
        style: {
            color: '#FFFFFF',
            fontSize: '20px'
        }
    },

    subtitle: {
        text: 'Visualización mensual de tickets pendientes',
        align: 'left',
        style: {
            color: '#CCCCCC'
        }
    },

    xaxis: {
        categories: [
            'ENE <?php echo $anio;?>',
            'FEB <?php echo $anio;?>',
            'MAR <?php echo $anio;?>',
            'ABR <?php echo $anio;?>',
            'MAY <?php echo $anio;?>',
            'JUN <?php echo $anio;?>',
            'JUL <?php echo $anio;?>',
            'AGO <?php echo $anio;?>',
            'SEP <?php echo $anio;?>',
            'OCT <?php echo $anio;?>',
            'NOV <?php echo $anio;?>',
            'DIC <?php echo $anio;?>'
        ],
        labels:{
            style:{
                colors:'#FFFFFF'
            }
        }
    },

    yaxis:{
        labels:{
            style:{
                colors:'#FFFFFF'
            }
        }
    },

    tooltip:{
        theme:'dark'
    }

};

var chart = new ApexCharts(
    document.querySelector("#grafico_pendientes"),
    options
);

chart.render();

</script>

<style>

.contenedor-grafico{
    width:100%;
    padding:20px;
    border-radius:15px;
    background:linear-gradient(135deg,#021524,#04233f,#08164e);
    color:#fff;
    box-shadow:0 0 20px rgba(0,0,0,.4);
}

#grafico_pendientes{
    width:100%;
    min-height:320px;
}

.estadisticas{
    display:flex;
    gap:15px;
    margin-top:15px;
    flex-wrap:wrap;
}

.item-estadistica{
    background:rgba(255,255,255,.06);
    padding:10px 15px;
    border-radius:10px;
}

.item-estadistica span{
    color:#8B5CF6;
    font-weight:bold;
}

</style>
<style>

#grafico_serviciotecnico{
    width:100%;
    min-height:350px;
    padding:20px;
    border-radius:20px;
    background:linear-gradient(
        135deg,
        #081a33 0%,
        #0b1e48 50%,
        #25185f 100%
    );
    box-shadow:0 0 30px rgba(0,0,0,.3);
}

</style>
	<br>
    <!-- PARTE INFERIOR -->
    <div class="isp-bottom">

        <!-- ESTADO RED -->
        <div class="isp-panel">

            <div class="isp-title">
                Estado de la red
            </div>

            <div class="isp-network">

                <div class="isp-network-item">
                    <div class="isp-network-icon"><img src="../images/sistema/9.png" width="155" height="116" alt=""/></div>
                    <div>Internet</div>
                    <div class="isp-online"><?php echo $estado_internet;?></div>
                </div>

                <div class="isp-network-item">
                    <div class="isp-network-icon"><img src="../images/sistema/41.png" width="155" height="116" alt=""/></div>
                    <div>Red principal</div>
                    <div class="isp-online">
						<?php echo "8.8.8.8 → ".$ping1."<br>";
						echo "8.8.4.4 → ".$ping2."<br>";?>
					</div>
                </div>

                <div class="isp-network-item">
                    <div class="isp-network-icon"><img src="../images/sistema/10.png" width="155" height="116" alt=""/></div>
                    <div>Clientes</div>
                    <div class="isp-online"><?php echo $cantidad_activos;?></div>
                </div>

            </div>

        </div>

        <!-- INCIDENTES -->
        <div class="isp-panel">

            <div class="isp-title">
                Incidencias recientes
            </div>

            <div class="isp-incident">
                <div>🔴 EN CONSTRUCCION</div>
                <div class="isp-badge isp-high">Alta</div>
            </div>

            <div class="isp-incident">
                <div>🟡 EN CONSTRUCCION</div>
                <div class="isp-badge isp-medium">Media</div>
            </div>

            <div class="isp-incident">
                <div>🔵 EN CONSTRUCCION</div>
                <div class="isp-badge isp-low">Baja</div>
            </div>

        </div>

    </div>

</div>
<br>

<?php

}

/*=========================================
  CERRAR CONEXION
=========================================*/

$conn->close();

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
