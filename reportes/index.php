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
      <a href="index.php"><i data-lucide="bar-chart-3"></i> Reportes</a>
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
/**
 * Realizamos la consulta:
 * 1. CAST(total AS DECIMAL(10,2)) convierte el texto a número.
 * 2. SUM() suma esos valores.
 * 3. WHERE estado = 'pendiente' filtra los registros.
 */
		
$sql = "SELECT SUM(CAST(total AS DECIMAL(10,2))) as suma_pendientes 
        FROM ventas 
        WHERE estado = 'pendiente'";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    // Si no hay resultados, suma_pendientes será NULL, lo igualamos a 0
    $total_sumado = $row['suma_pendientes'] ?? 0;
    
    //echo "Reporte de Ventas Pendientes: \n";
//    echo "------------------------------------------ \n";
//    echo "Suma total de registros pendientes: $" . number_format($total_sumado, 2) . "\n";
} else {
    echo "Error en la consulta: " . $conn->error;
}

//$conn->close();
?>
		<?php

// Fechas para comparación
$mes_actual = date('m');
$anio_actual = date('Y');
$mes_anterior = date('m', strtotime("-1 month"));

// Función para contar servicios técnicos por mes
function contarServicios($conn, $mes, $anio) {
    $sql = "SELECT COUNT(*) as total 
            FROM serviciotecnico 
            WHERE MONTH(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$mes'
            AND YEAR(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$anio'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'] ?? 0;
}

$servicios_actual = contarServicios($conn, $mes_actual, $anio_actual);
$servicios_anterior = contarServicios($conn, $mes_anterior, $anio_actual);

// Cálculo del porcentaje de variación
$porcentajese = 0;
if ($servicios_anterior > 0) {
    $porcentajese = (($servicios_actual - $servicios_anterior) / $servicios_anterior) * 100;
} elseif ($servicios_actual > 0) {
    $porcentajese = 100; // Incremento desde cero
}

//echo "Reporte de Servicios Técnicos: \n";
//echo "------------------------------------------ \n";
//echo "Servicios este mes: " . $servicios_actual . "\n";
//echo "Servicios mes anterior: " . $servicios_anterior . "\n";

//if ($servicios_actual > $servicios_anterior) {
//    echo "Variación: Aumento del " . number_format($porcentaje, 2) . "% \n";
//} elseif ($servicios_actual < $servicios_anterior) {
//    echo "Variación: Disminución del " . number_format(abs($porcentajese), 2) . "% \n";
//} else {
//    echo "Variación: Sin cambios (0%) \n";
//}

//$conn->close();
?>
		<?php
// Consulta para contar contratos activos
$sql = "SELECT COUNT(*) as total_activos 
        FROM contratos 
        WHERE estado = 'activo'";

$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $totalcontratos = $row['total_activos'];
    
    //echo "Reporte de Contratos: \n";
//    echo "------------------------------------------ \n";
//    echo "Total de contratos en estado 'activo': " . $totalcontratos . "\n";
//} else {
//    echo "Error al realizar la consulta: " . $conn->error;
}

//$conn->close();
?>
		<?php
// Ejecuta el comando de speedtest-cli
// --json convierte la salida a un formato fácil de leer por PHP
$bajada = "0";
$subida = "0";
$ping = "0";
$comando = "speedtest-cli --json";
$resultado = shell_exec($comando);

if ($resultado) {
    $datos = json_decode($resultado, true);

    // Convertir bytes a Megabits (Mbps)
    $bajada = ($datos['download'] / 1024 / 1024);
    $subida = ($datos['upload'] / 1024 / 1024);
    $ping = $datos['ping'];

    //echo "<h1>Resultado del Test de Velocidad del Servidor</h1>";
//    echo "<p><strong>Descarga:</strong> " . number_format($bajada, 2) . " Mbps</p>";
//    echo "<p><strong>Subida:</strong> " . number_format($subida, 2) . " Mbps</p>";
//    echo "<p><strong>Latencia (Ping):</strong> " . number_format($ping, 2) . " ms</p>";
} else {
    echo "Error: Asegúrate de que 'speedtest-cli' esté instalado en el servidor.";
}
?>
		
		<?php

$mes_actual = date('m');
$anio_actual = date('Y');
$mes_anterior = date('m', strtotime("-1 month"));

// Función para obtener ARPU (Suma de totales / Cantidad de clientes únicos)
function calcularARPU($conn, $mes, $anio) {
    $sql = "SELECT 
                SUM(CAST(total AS DECIMAL(10,2))) as ingresos_totales,
                COUNT(DISTINCT cliente) as clientes_unicos
            FROM ventas 
            WHERE MONTH(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$mes'
            AND YEAR(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$anio'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $ingresos = $row['ingresos_totales'] ?? 0;
    $usuarios = $row['clientes_unicos'] ?? 0;
    
    return ($usuarios > 0) ? ($ingresos / $usuarios) : 0;
}

$arpu_actual = calcularARPU($conn, $mes_actual, $anio_actual);
$arpu_anterior = calcularARPU($conn, $mes_anterior, $anio_actual);

// Cálculo de diferencia
$diferencia = $arpu_actual - $arpu_anterior;
$porcentajea = ($arpu_anterior > 0) ? ($diferencia / $arpu_anterior) * 100 : 0;

//echo "Análisis de ARPU (Ingreso Promedio por Usuario): \n";
//echo "-------------------------------------------------- \n";
//echo "ARPU Mes Actual: $" . number_format($arpu_actual, 2) . "\n";
//echo "ARPU Mes Anterior: $" . number_format($arpu_anterior, 2) . "\n";
//echo "Variación: " . number_format($porcentajea, 2) . "% \n";

// Análisis simple
//if ($arpu_actual > $arpu_anterior) {
//    echo "Análisis: El ingreso promedio por cliente ha SUBIDO. ¡Buen trabajo de monetización! \n";
//} elseif ($arpu_actual < $arpu_anterior) {
//    echo "Análisis: El ingreso promedio por cliente ha BAJADO. Se recomienda revisar planes o descuentos. \n";
//} else {
//    echo "Análisis: El ARPU se mantiene estable respecto al mes anterior. \n";
//}

//$conn->close();
?>
		<?php

// Obtenemos fechas para el mes actual y anterior
$mes_actual = date('m');
$anio_actual = date('Y');
$mes_anterior = date('m', strtotime("-1 month"));

// Función para contar contratos suspendidos en un mes específico
function contarContratosSuspendidos($conn, $mes, $anio) {
    // Asegúrate de que 'fecha' y 'estado' coincidan con tus nombres de columna en la tabla clientes
    $sql = "SELECT COUNT(*) as total 
            FROM contratos 
            WHERE estado = 'suspendido'
            AND MONTH(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$mes'
            AND YEAR(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$anio'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'] ?? 0;
}

$suspendidos_actual = contarContratosSuspendidos($conn, $mes_actual, $anio_actual);
$suspendidos_anterior = contarContratosSuspendidos($conn, $mes_anterior, $anio_actual);

// Cálculo del porcentaje de diferencia
// La fórmula calcula cuánto ha subido o bajado respecto al anterior
$porcentajes = 0;
if ($suspendidos_anterior > 0) {
    $porcentaje = (($suspendidos_actual - $suspendidos_anterior) / $suspendidos_anterior) * 100;
} elseif ($suspendidos_actual > 0) {
    $porcentajes = 100; // Si no hubo suspendidos antes y ahora sí, hay un incremento
}

//echo "Reporte de Contratos Suspendidos: \n";
//echo "------------------------------------------ \n";
//echo "Suspendidos este mes: " . $suspendidos_actual . "\n";
//echo "Suspendidos mes anterior: " . $suspendidos_anterior . "\n";



//$conn->close();
?>
		<?php


// Obtenemos fechas para el mes actual y anterior
$mes_actual = date('m');
$anio_actual = date('Y');
$mes_anterior = date('m', strtotime("-1 month"));

// Función para contar clientes nuevos en un mes específico
function contarClientesNuevos($conn, $mes, $anio) {
    // Ajusta 'fecha' al nombre real de la columna en tu tabla clientes
    $sql = "SELECT COUNT(*) as total 
            FROM clientes 
            WHERE MONTH(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$mes'
            AND YEAR(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$anio'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'] ?? 0;
}

$nuevos_actual = contarClientesNuevos($conn, $mes_actual, $anio_actual);
$nuevos_anterior = contarClientesNuevos($conn, $mes_anterior, $anio_actual);

// Cálculo del porcentaje de variación
$porcentajec = 0;
if ($nuevos_anterior > 0) {
    $porcentajec = (($nuevos_actual - $nuevos_anterior) / $nuevos_anterior) * 100;
} elseif ($nuevos_actual > 0) {
    $porcentajec = 100; // Si el mes anterior fue 0 y este hay nuevos, subió un 100%
}

//echo "Reporte de Clientes Nuevos: \n";
//echo "------------------------------------------ \n";
//echo "Clientes nuevos este mes: " . $nuevos_actual . "\n";
//echo "Clientes nuevos mes anterior: " . $nuevos_anterior . "\n";
//echo "Variación: " . number_format($porcentajec, 2) . "% \n";

//$conn->close();
?>
		
		<?php

// Obtenemos el mes y año actual
$mes_actual = date('m');
$anio_actual = date('Y');
$mes_anterior = date('m', strtotime("-1 month"));

// Función para obtener total por mes
function obtenerTotal($conn, $mes, $anio) {
    $sql = "SELECT SUM(CAST(total AS DECIMAL(10,2))) as total 
            FROM ventas 
            WHERE estado = 'cancelado' 
            AND MONTH(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$mes'
            AND YEAR(STR_TO_DATE(SUBSTRING(fecha, 1, 10), '%Y-%m-%d')) = '$anio'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'] ?? 0;
}

$total_actual = obtenerTotal($conn, $mes_actual, $anio_actual);
$total_anterior = obtenerTotal($conn, $mes_anterior, $anio_actual);

// Cálculo del porcentaje
$porcentaje = 0;
if ($total_anterior > 0) {
    $porcentaje = (($total_actual - $total_anterior) / $total_anterior) * 100;
}

//echo "Resultados de Ventas (Estado: Cancelado): \n";
//echo "------------------------------------------ \n";
//echo "Total mes actual: $" . number_format($total_actual, 2) . "\n";
//echo "Total mes anterior: $" . number_format($total_anterior, 2) . "\n";
//echo "Variación: " . number_format($porcentaje, 2) . "% \n";

//$conn->close();
?>
		<div class="metric-grid">
    	<div class="isp-card isp-purple">
            <div class="isp-card-title">Ingreso Mes </div>
            <div class="isp-card-value"><?php echo number_format($total_actual, 2)?></div>
            <div class="isp-card-footer">↗ <?php echo number_format($porcentaje, 2)?> % <span style="font-weight:normal; opacity:0.8;">vs. mes anterior <?php echo number_format($total_anterior, 2)?></div>
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
    
    <div class="isp-card isp-badge">
            <div class="isp-card-title">Clientes Nuevos </div>
            <div class="isp-card-value"><?php echo $nuevos_actual?></div>
            <div class="isp-card-footer">↗ <?php echo number_format($porcentajec, 2)?> % <span style="font-weight:normal; opacity:0.8;">vs. mes anterior <?php echo $nuevos_anterior?></div>
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
			<div class="isp-card isp-blue">
            <div class="isp-card-title">Bajas / Cancelaciones</div>
            <div class="isp-card-value"><?php echo $suspendidos_actual?></div>
            <div class="isp-card-footer">↗ <?php if ($porcentajes > 0) {
    echo "+ " . number_format($porcentajes, 2) . "% \n";
} elseif ($porcentajes < 0) {
    echo "- " . number_format(abs($porcentajes), 2) . "% \n";
} else {
    echo " = (0%) \n";
}?> vs mes anterior <?php echo $suspendidos_anterior?></div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-green">
            <div class="isp-card-title">ARPU (Promedio)</div>
            <div class="isp-card-value"><?php echo number_format($arpu_actual, 2)?></div>
            <div class="isp-card-footer">↗ <?php echo number_format($porcentajea, 2)?>% <span style="font-weight:normal; opacity:0.8;">vs. mes anterior <?php  echo number_format($arpu_anterior, 2)?> vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>	
<div class="isp-card isp-orange">
            <div class="isp-card-title">Test de Velocidad de Descarga</div>
            <div class="isp-card-value"><?php echo number_format($bajada, 2)?> Mb</div>
			<div class="isp-card-title">Test de Velocidad de Sescarga</div>
            <div class="isp-card-value"><?php echo number_format($subida, 2)?> Mb</div>
            <div class="isp-card-icon"><img src="../images/sistema/10.png" width="64" height="38" alt=""/></div>
        </div>
    

    

    
</div>
		
	<div class="isp-dashboard">

    <!-- TARJETAS -->

    

    <!-- INDICADORES -->

    <div class="metric-grid">
	<div class="isp-card isp-purple">
            <div class="isp-card-title">Contratos</div>
            <div class="isp-card-value"><?php echo $totalcontratos ?></div>
            
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-badge">
            <div class="isp-card-title">Servicio Tecnico </div>
            <div class="isp-card-value"><?php echo $servicios_actual?></div>
            <div class="isp-card-footer">↗ <?php echo number_format($porcentajese, 2)?>% <span style="font-weight:normal; opacity:0.8;">vs. mes anterior <?php  echo number_format($servicios_anterior, 2)?></div>
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
        <div class="isp-card isp-blue" onclick="window.location.href='carteravencida.php';" style="cursor:pointer;">
            <div class="isp-card-title">Cartera Vencida</div>
            <div class="isp-card-value"><?php echo number_format($total_sumado, 2)?></div>
            <div class="isp-card-footer">↗ 12.4% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
        <div class="isp-card isp-green" onclick="window.location.href='../arcotel/index.php';" style="cursor:pointer;">
            <div class="isp-card-title">Arcotel</div>
            <div class="isp-card-value">Arcotel</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-orange" onclick="window.location.href='../olt/listado.php';" style="cursor:pointer;">
            <div class="isp-card-title">Olt</div>
            <div class="isp-card-value">Olt</div>
            <div class="isp-card-footer">↘ 25% vs ayer</div>
            <div class="isp-card-icon"><img src="../images/sistema/10.png" width="64" height="38" alt=""/></div>
        </div>
        

        

        

    </div>
		<!-- INDICADORES -->

    <div class="metric-grid" >
	<div class="isp-card isp-purple"  onclick="window.location.href='reporte_por_deposito.php';" style="cursor:pointer;">
            <div class="isp-card-title">Reporte Deposito</div>
            <div class="isp-card-value">Reporte Deposito</div>
            
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-badge" onclick="window.location.href='../bodegas/transferencias.php';" style="cursor:pointer;">
            <div class="isp-card-title">Transferencias </div>
            <div class="isp-card-value">Transferencias</div>
            
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
        <div class="isp-card isp-blue" onclick="window.location.href='carteravencida.php';" style="cursor:pointer;">
            <div class="isp-card-title">-------</div>
            <div class="isp-card-value">--------</div>
            <div class="isp-card-footer">↗ 12.4% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
        <div class="isp-card isp-green" onclick="window.location.href='../arcotel/index.php';" style="cursor:pointer;">
            <div class="isp-card-title">---------</div>
            <div class="isp-card-value">----------</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-orange" onclick="window.location.href='../olt/listado.php';" style="cursor:pointer;">
            <div class="isp-card-title">---------</div>
            <div class="isp-card-value">---------</div>
            <div class="isp-card-footer">↘ 25% vs ayer</div>
            <div class="isp-card-icon"><img src="../images/sistema/10.png" width="64" height="38" alt=""/></div>
        </div>
        

        

        

    </div>
		<!-- INDICADORES 3 FILA-->

    <div class="metric-grid">

        <div class="isp-card isp-purple" onclick="window.location.href='../mikrotik/listado.php';" style="cursor:pointer;">
            <div class="isp-card-title">Mikrotik</div>
            <div class="isp-card-value">Mikrotik</div>
            
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-badge" onclick="window.location.href='../streaming/index.php';" style="cursor:pointer;">
            <div class="isp-card-title">Streaming </div>
			<br>
			<br>
            <div class="isp-card-value">Streaming</div>
            
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-blue" onclick="window.location.href='../traccar/traccar.php';" style="cursor:pointer;">
            <div class="isp-card-title">Rastreo</div>
            <div class="isp-card-value">Rastreo</div>
            <div class="isp-card-footer">↗ 12.4% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
        <div class="isp-card isp-green" onclick="window.location.href='../zkteco/index.php';" style="cursor:pointer;">
            <div class="isp-card-title">ZKteko</div>
            <div class="isp-card-value">ZKteko</div>
            <div class="isp-card-footer">↗ 12.4% vs mes anterior</div>
            <div class="isp-card-icon"><img src="../images/sistema/36.png" width="64" height="38" alt=""/></div>
        </div>
		<div class="isp-card isp-orange" onclick="window.location.href='../red/index.php';" style="cursor:pointer;">
            <div class="isp-card-title">Red</div>
            <div class="isp-card-value">Red</div>
            <div class="isp-card-footer">↘ 25% vs ayer</div>
            <div class="isp-card-icon"><img src="../images/sistema/10.png" width="64" height="38" alt=""/></div>
        </div>
        

        

        

    </div>

    <!-- GRAFICOS -->

    

        <div class="panel wide">

            
<?php
/*=====================================================
  GRAFICA DE CONTRATOS POR MES
  EXCLUYE ESTADO = SUSPENDIDO
=====================================================*/



$meses = [
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
];

$datos = [];
$maximo = 0;

$sql = "
SELECT
    MONTH(fecha) AS mes,
    COUNT(*) AS cantidad
FROM contratos
WHERE estado IS NOT NULL
AND UPPER(TRIM(estado)) <> 'SUSPENDIDO'
GROUP BY MONTH(fecha)
ORDER BY MONTH(fecha)
";

$result = $conn->query($sql);

if($result){
    while($row = $result->fetch_assoc())
    {
        $datos[] = $row;

        if($row['cantidad'] > $maximo)
        {
            $maximo = $row['cantidad'];
        }
    }
}

//$conn->close();
?>
<div class="titulo-grafica">
    CONTRATOS ACTIVOS POR MES
</div>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    if(empty($datos))
    {
        echo "<h3>No existen datos para mostrar.</h3>";
    }
    else
    {
        $colores = [
            "#F4E66B",
            "#FFB300",
            "#76C04E",
            "#F05368",
            "#00BCD4",
            "#9C27B0",
            "#3F51B5",
            "#8BC34A",
            "#E91E63",
            "#FF5722",
            "#607D8B",
            "#795548"
        ];

        foreach($datos as $i => $fila)
        {
            $altura = ($maximo > 0)
                ? (($fila['cantidad'] / $maximo) * 320)
                : 20;

            echo '
            <div class="barra-item">

                <div class="cantidad">
                    '.$fila['cantidad'].'
                </div>

                <div class="barra"
                    style="
                        height:'.$altura.'px;
                        background:linear-gradient(
                            to bottom,
                            '.$colores[$i % count($colores)].',
                            '.$colores[$i % count($colores)].'CC
                        );
                    ">
                </div>

                <div class="base">
                    
                </div>

                <div class="mes">
                    '.$meses[$fila['mes']].'
                </div>

            </div>';
        }
    }

    ?>

</div>
            <!--<div id="graficoIngresos"></div>-->
			

        </div>
        <br>

        <div class="panel donut-panel">

            
<?php
/*=====================================================
  GRAFICA DE VENTAS CANCELADAS POR MES
  SUMA DEL CAMPO TOTAL
=====================================================*/



$meses = [
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
];

$datos = [];
$maximo = 0;

$sql = "
SELECT
    MONTH(fecha) AS mes,
    ROUND(SUM(total),2) AS total_mes
FROM ventas
WHERE UPPER(TRIM(estado)) = 'CANCELADO'
GROUP BY MONTH(fecha)
ORDER BY MONTH(fecha)
";

$result = $conn->query($sql);

if($result){
    while($row = $result->fetch_assoc())
    {
        $datos[] = $row;

        if($row['total_mes'] > $maximo)
        {
            $maximo = $row['total_mes'];
        }
    }
}

//$conn->close();
?>



<div class="titulo-grafica">
    VENTAS CANCELADAS POR MES
</div>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    if(empty($datos))
    {
        echo "<h3>No existen ventas canceladas para mostrar.</h3>";
    }
    else
    {
        $colores = [
            "#F05368",
            "#FF9800",
            "#FFC107",
            "#76C04E",
            "#00BCD4",
            "#9C27B0",
            "#3F51B5",
            "#8BC34A",
            "#E91E63",
            "#FF5722",
            "#607D8B",
            "#795548"
        ];

        foreach($datos as $i => $fila)
        {
            $altura = ($maximo > 0)
                ? (($fila['total_mes'] / $maximo) * 320)
                : 20;

            echo '
            <div class="barra-item">

                <div class="valor">
                    $'.number_format($fila['total_mes'],2).'
                </div>

                <div class="barra"
                    style="
                        height:'.$altura.'px;
                        background:linear-gradient(
                            to bottom,
                            '.$colores[$i % count($colores)].',
                            '.$colores[$i % count($colores)].'CC
                        );
                    ">
                </div>

                <div class="base">
                    '.$meses[$fila['mes']].'
                </div>

            </div>';
        }
    }

    ?>

</div>
            <!--<div id="donutClientes"></div>-->

        </div>
        <br>

        <div class="panel summary-panel">

            <div class="panel-head">
                <h2>Resumen Ejecutivo</h2>
            </div>

            <dl class="summary-list">

                <div>
                    <dt>Clientes</dt>
                    <dd>3,248</dd>
                </div>

                <div>
                    <dt>Contratos</dt>
                    <dd>2,915</dd>
                </div>

                <div>
                    <dt>Activos</dt>
                    <dd>2,684</dd>
                </div>

                <div>
                    <dt>Pendientes</dt>
                    <dd>146</dd>
                </div>

                <div>
                    <dt>Facturación</dt>
                    <dd>$42,850</dd>
                </div>

            </dl>

        </div>

    
    <br>

    <!-- TABLAS -->


        <div class="panel two">

            <div class="panel-head">
                <h2>Últimos Contratos</h2>
            </div>

            <div class="table-scroll">

                <table>

                    <tr>
                        <th>Contrato</th>
                        <th>Cliente</th>
                        <th>Plan</th>
                        <th>Estado</th>
                    </tr>

                    <tr>
                        <td>CTR-1001</td>
                        <td>Juan Pérez</td>
                        <td>200 MB</td>
                        <td><span>ACTIVO</span></td>
                    </tr>

                    <tr>
                        <td>CTR-1002</td>
                        <td>María Gómez</td>
                        <td>300 MB</td>
                        <td><span>ACTIVO</span></td>
                    </tr>

                    <tr>
                        <td>CTR-1003</td>
                        <td>Carlos Vega</td>
                        <td>100 MB</td>
                        <td><span>ACTIVO</span></td>
                    </tr>

                    <tr>
                        <td>CTR-1004</td>
                        <td>Ana Torres</td>
                        <td>500 MB</td>
                        <td><span>ACTIVO</span></td>
                    </tr>

                </table>

            </div>

        </div>
        <br>

        <div class="panel two">


            <?php
/*=====================================================
  GRAFICA DE SALDOS POR INSTITUCION
  TABLA: cuentas
=====================================================*/

$datos = [];
$maximo = 0;

$sql = "
SELECT
    institucion,
    saldo
FROM cuentas
ORDER BY saldo DESC
";

$result = $conn->query($sql);

if($result){
    while($row = $result->fetch_assoc())
    {
        $datos[] = $row;

        if($row['saldo'] > $maximo)
        {
            $maximo = $row['saldo'];
        }
    }
}
?>



<div class="titulo-grafica">
    SALDOS POR INSTITUCIÓN
</div>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    if(empty($datos))
    {
        echo "<h3>No existen cuentas para mostrar.</h3>";
    }
    else
    {
        $colores = [
            "#F05368",
            "#FF9800",
            "#FFC107",
            "#76C04E",
            "#00BCD4",
            "#9C27B0",
            "#3F51B5",
            "#8BC34A",
            "#E91E63",
            "#FF5722",
            "#607D8B",
            "#795548"
        ];

        foreach($datos as $i => $fila)
        {
            $altura = ($maximo > 0)
                ? (($fila['saldo'] / $maximo) * 350)
                : 20;

            echo '
            <div class="barra-item">

                <div class="valor">
                    $ '.number_format($fila['saldo'],2).'
                </div>

                <div class="barra"
                    style="
                        height:'.$altura.'px;
                        background:linear-gradient(
                            to bottom,
                            '.$colores[$i % count($colores)].',
                            '.$colores[$i % count($colores)].'CC
                        );
                    ">
                </div>

                <div class="base">
                    '.htmlspecialchars($fila['institucion']).'
                </div>

            </div>';
        }
    }

    ?>

</div>

        </div>

  

    <!-- MODULOS ADICIONALES -->

    

        <div class="panel two">

            <div class="panel-head">
                <h2>Productos con Bajo Stock</h2>
            </div>

            <table>

                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                </tr>

                <tr><td>ONU Huawei HG8145X6</td><td>3</td></tr>
                <tr><td>Router TP-Link AX1500</td><td>5</td></tr>
                <tr><td>Patch Cord SC/APC</td><td>7</td></tr>
                <tr><td>Caja NAP 16 Puertos</td><td>2</td></tr>

            </table>

        </div>
        <br>

        <div class="panel two">

            <?php
/*=====================================================
  GRAFICA DE CONTRATOS POR PRODUCTO
  TABLA: contratos
=====================================================*/

$datos = [];
$maximo = 0;

$sql = "
SELECT
    producto,
    COUNT(*) AS cantidad
FROM contratos
GROUP BY producto
ORDER BY cantidad DESC
";

$result = $conn->query($sql);

if($result){
    while($row = $result->fetch_assoc())
    {
        $datos[] = $row;

        if($row['cantidad'] > $maximo)
        {
            $maximo = $row['cantidad'];
        }
    }
}
?>



<?php
$total_productos = count($datos);
$total_contratos = 0;

foreach($datos as $fila){
    $total_contratos += $fila['cantidad'];
}
?>

<div class="titulo-grafica">
    CONTRATOS POR PRODUCTO
</div>

<div class="resumen">
    Total Productos: <?php echo number_format($total_productos); ?>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    Total Contratos: <?php echo number_format($total_contratos); ?>
</div>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    if(empty($datos))
    {
        echo "<h3>No existen registros en la tabla contratos.</h3>";
    }
    else
    {
        $colores = [
            "#F05368",
            "#FF9800",
            "#FFC107",
            "#76C04E",
            "#00BCD4",
            "#9C27B0",
            "#3F51B5",
            "#8BC34A",
            "#E91E63",
            "#FF5722",
            "#607D8B",
            "#795548"
        ];

        foreach($datos as $i => $fila)
        {
            $altura = ($maximo > 0)
                ? (($fila['cantidad'] / $maximo) * 350)
                : 20;

            echo '
            <div class="barra-item">

                <div class="valor">
                    '.number_format($fila['cantidad']).'
                </div>

                <div class="barra"
                    style="
                        height:'.$altura.'px;
                        background:linear-gradient(
                            to bottom,
                            '.$colores[$i % count($colores)].',
                            '.$colores[$i % count($colores)].'CC
                        );
                    ">
                </div>

                <div class="base">
                    '.htmlspecialchars($fila['producto']).'
                </div>

            </div>';
        }
    }

    ?>

</div>

        </div>

    

</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

new ApexCharts(
document.querySelector("#graficoIngresos"),
{
    chart:{
        type:'area',
        height:350,
        toolbar:{show:false}
    },

    series:[{
        name:'Ingresos',
        data:[
            28000,
            31000,
            29500,
            34000,
            36000,
            39000,
            41000,
            42850,
            45000,
            47000,
            49000,
            52000
        ]
    }],

    colors:['#7a17ff'],

    xaxis:{
        categories:[
            'ENE','FEB','MAR','ABR',
            'MAY','JUN','JUL','AGO',
            'SEP','OCT','NOV','DIC'
        ]
    }
}).render();

new ApexCharts(
document.querySelector("#donutClientes"),
{
    chart:{
        type:'donut',
        height:320
    },

    series:[55,25,12,8],

    labels:[
        'Fibra',
        'Corporativo',
        'Residencial',
        'Empresarial'
    ]
}).render();

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
