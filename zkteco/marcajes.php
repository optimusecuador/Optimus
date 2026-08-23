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
      <a href="index.php"><i data-lucide="fingerprint"></i> ZKTeco</a>
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

// Validar que se reciba obligatoriamente el código del empleado por la URL
if (!isset($_GET['emp_code']) || trim($_GET['emp_code']) === '') {
    die("<h3 style='color:orange; font-family:Arial;'>⚠️ Error: No se ha especificado ningún código de empleado válido para consultar.</h3>");
}

$emp_code = urlencode($_GET['emp_code']);

// =========================================
// CONFIGURACIÓN DE CONEXIÓN
// =========================================
$biotime_ip   = "10.8.0.11";
$biotime_port = "80";
$biotime_user = "nelo416";
$biotime_pass = "Optimus2023";

$base_url = "http://" . $biotime_ip . ":" . $biotime_port;

// =========================================
// AUTENTICACIÓN
// =========================================
$auth_url = $base_url . "/api-token-auth/";

$auth_payload = json_encode([
    "username" => $biotime_user,
    "password" => $biotime_pass
]);

$ch = curl_init($auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $auth_payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$auth_response = curl_exec($ch);
$auth_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($auth_http_code !== 200) {
    die("<span style='color:red;'>❌ Error de Autenticación en Consulta. Código HTTP: $auth_http_code</span>");
}

$auth_data = json_decode($auth_response, true);
$biotime_token = $auth_data['token'] ?? null;

if (!$biotime_token) {
    die("<span style='color:red;'>❌ No se pudo obtener el Token para los marcajes.</span>");
}

// =========================================
// CONSULTAR MARCAJES
// =========================================
$transactions_url = $base_url . "/iclock/api/transactions/?emp_code=" . $emp_code . "&page_size=1000";

$ch = curl_init($transactions_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token ' . $biotime_token
]);

$trans_response = curl_exec($ch);
$trans_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($trans_http_code !== 200) {
    die("<span style='color:red;'>❌ Error al obtener los marcajes. Código HTTP: $trans_http_code</span>");
}

$trans_data = json_decode($trans_response, true);

// =========================================
// DESEMPAQUETAR MARCAJES
// =========================================
$marcajes = [];

if (isset($trans_data['results']) && is_array($trans_data['results'])) {
    $marcajes = $trans_data['results'];
} elseif (isset($trans_data['data']['results']) && is_array($trans_data['data']['results'])) {
    $marcajes = $trans_data['data']['results'];
} elseif (isset($trans_data['data']) && is_array($trans_data['data'])) {
    $marcajes = $trans_data['data'];
} elseif (is_array($trans_data)) {
    $marcajes = $trans_data;
}

// =========================================
// ESTADOS ZKTECO
// =========================================
$estados_marcaje = [
    '0' => 'Entrada',
    '1' => 'Salida',
    '2' => 'Salida a Almuerzo',
    '3' => 'Entrada de Almuerzo',
    '4' => 'Horas Extra Ent.',
    '5' => 'Horas Extra Sal.',
    'i' => 'Entrada',
    'o' => 'Salida'
];

// =========================================
// RESUMEN DIARIO DE HORAS
// =========================================
$resumen_dias = [];

foreach ($marcajes as $log) {

    if (!is_array($log) || empty($log['punch_time'])) {
        continue;
    }

    $timestamp = strtotime($log['punch_time']);

    if (!$timestamp) {
        continue;
    }

    $fecha = date('Y-m-d', $timestamp);
    $estado = strtolower((string)($log['punch_state'] ?? ''));

    if (!isset($resumen_dias[$fecha])) {
        $resumen_dias[$fecha] = [
            'entrada' => null,
            'salida'  => null
        ];
    }

    // Primera entrada del día
    if ($estado == '0' || $estado == 'i') {

        if (
            $resumen_dias[$fecha]['entrada'] === null ||
            $timestamp < $resumen_dias[$fecha]['entrada']
        ) {
            $resumen_dias[$fecha]['entrada'] = $timestamp;
        }
    }

    // Última salida del día
    if ($estado == '1' || $estado == 'o') {

        if (
            $resumen_dias[$fecha]['salida'] === null ||
            $timestamp > $resumen_dias[$fecha]['salida']
        ) {
            $resumen_dias[$fecha]['salida'] = $timestamp;
        }
    }
}

krsort($resumen_dias);

?>

<div class="cliente-wrapper">

    <div class="clientes-header-top">
        <div>
            <h2 class="clientes-title">
                Historial de Marcajes
            </h2>

            <p class="clientes-subtitle">
                Empleado Código:
                <?php echo htmlspecialchars($_GET['emp_code']); ?>
            </p>
        </div>
		<?php $total_horas_mes = 0; foreach ($resumen_dias as $datos) { if ( !empty($datos['entrada']) && !empty($datos['salida']) && $datos['salida'] > $datos['entrada'] ) { $total_horas_mes += ($datos['salida'] - $datos['entrada']) / 3600; } } $total_horas_mes = round($total_horas_mes,2); ?>
		
       
    </div>

<?php if (empty($marcajes)): ?>

    <div class="panel-dark" style="padding:20px;">
        ℹ️ No se encontraron marcajes registrados para este empleado en BioTime.
    </div>

<?php else: ?>

    
<?php

/*=====================================================
  CALENDARIO DE MARCAJES CON COLORES Y GPS
=====================================================*/

$mes = isset($_GET['mes']) ? intval($_GET['mes']) : date('n');
$anio = isset($_GET['anio']) ? intval($_GET['anio']) : date('Y');

$dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

$primer_dia_semana = date('N', strtotime($anio . '-' . $mes . '-01'));
$primer_dia_semana--;

$marcajes_por_dia = [];

foreach($marcajes as $log)
{
    if(!is_array($log)){
        continue;
    }

    $fecha_hora = $log['punch_time'] ?? '';

    if(empty($fecha_hora)){
        continue;
    }

    $timestamp = strtotime($fecha_hora);

    if(date('Y', $timestamp) != $anio){
        continue;
    }

    if(date('n', $timestamp) != $mes){
        continue;
    }

    $dia = date('j', $timestamp);

    $state_key = strtolower(trim((string)($log['punch_state'] ?? '')));

    $estado_texto =
        $estados_marcaje[$state_key]
        ?? ucfirst($state_key);

    $lat = $log['latitude'] ?? $log['lat'] ?? '';
    $lng = $log['longitude'] ?? $log['lng'] ?? '';

    if(empty($lat) || empty($lng))
    {
        $gps = $log['gps_location'] ?? '';

        if(!empty($gps) && strpos($gps, ',') !== false)
        {
            $tmp = explode(',', $gps);

            $lat = trim($tmp[0]);
            $lng = trim($tmp[1]);
        }
    }

    $dispositivo =
        $log['terminal_alias']
        ?? $log['terminal_sn']
        ?? 'Web / App Móvil';

    /*=====================================================
  COLOR DEL EVENTO
=====================================================*/

$clase_color = 'evento salida';

if(
    stripos($estado_texto,'entrada') !== false ||
    stripos($estado_texto,'entry') !== false ||
    stripos($estado_texto,'check in') !== false ||
    stripos($state_key,'checkin') !== false ||
    stripos($state_key,'in') !== false
){
    $clase_color = 'evento entrada';
}
else
{
    $clase_color = 'evento salida';
}

$marcajes_por_dia[$dia][] = [

    'hora'        => date('H:i', $timestamp),
    'estado'      => $estado_texto,
    'dispositivo' => $dispositivo,
    'lat'         => $lat,
    'lng'         => $lng,
    'clase'       => $clase_color

];
}

$meses = [
    1=>"Enero",
    2=>"Febrero",
    3=>"Marzo",
    4=>"Abril",
    5=>"Mayo",
    6=>"Junio",
    7=>"Julio",
    8=>"Agosto",
    9=>"Septiembre",
    10=>"Octubre",
    11=>"Noviembre",
    12=>"Diciembre"
];

?>


<div class="calendario-panel">

    <div class="cal-header">

        <h1><?php echo strtoupper($meses[$mes]); ?></h1>

        <h2><?php echo $anio; ?></h2>
<a href="rol_pagos.php? emp_code=<?php echo urlencode($_GET['emp_code']); ?> &horas=<?php echo urlencode($total_horas_mes); ?>" class="btn-action btn-contrato" style="text-decoration:none;"> 💵 Rol de Pagos </a>
    </div>

    <div class="cal-grid">

        <div class="cal-dia-titulo">Lunes</div>
        <div class="cal-dia-titulo">Martes</div>
        <div class="cal-dia-titulo">Miércoles</div>
        <div class="cal-dia-titulo">Jueves</div>
        <div class="cal-dia-titulo">Viernes</div>
        <div class="cal-dia-titulo">Sábado</div>
        <div class="cal-dia-titulo">Domingo</div>

        <?php

        for($i=0;$i<$primer_dia_semana;$i++)
        {
            echo '<div class="cal-celda cal-vacio"></div>';
        }

        for($dia=1;$dia<=$dias_mes;$dia++)
        {
            echo '<div class="cal-celda">';

            echo '<div class="numero-dia">'.$dia.'</div>';

            if(isset($marcajes_por_dia[$dia]))
            {
                foreach($marcajes_por_dia[$dia] as $evento)
                {
                    echo '

                    <div class="'.$evento['clase'].'"

                        onclick="mostrarGPS(
                            \''.htmlspecialchars($evento['hora'],ENT_QUOTES).'\',
                            \''.htmlspecialchars($evento['estado'],ENT_QUOTES).'\',
                            \''.htmlspecialchars($evento['dispositivo'],ENT_QUOTES).'\',
                            \''.htmlspecialchars($evento['lat'],ENT_QUOTES).'\',
                            \''.htmlspecialchars($evento['lng'],ENT_QUOTES).'\'
                        )"

                    >

                        <strong>'.$evento['hora'].'</strong><br>

                        '.$evento['estado'].'

                        <small>
                            '.$evento['dispositivo'].'
                        </small>

                    </div>

                    ';
                }
            }

            echo '</div>';
        }

        $total_celdas = $primer_dia_semana + $dias_mes;
        $faltantes = 7 - ($total_celdas % 7);

        if($faltantes < 7)
        {
            for($i=0;$i<$faltantes;$i++)
            {
                echo '<div class="cal-celda cal-vacio"></div>';
            }
        }

        ?>

    </div>

</div>

<div id="modalGPS" class="modal-gps">

    <div class="modal-contenido">

        <div class="modal-header">

            Detalle de Marcación

            <span
                class="cerrar-modal"
                onclick="cerrarGPS()">
                ×
            </span>

        </div>

        <div class="modal-body">

            <div id="detalleMarcacion"></div>

        </div>

    </div>

</div>

<script>

function mostrarGPS(
    hora,
    estado,
    dispositivo,
    lat,
    lng
)
{
    let html = '';

    html += '<div class="info-marcacion">';

    html += '<p><b>Hora:</b> '+hora+'</p>';
    html += '<p><b>Estado:</b> '+estado+'</p>';
    html += '<p><b>Dispositivo:</b> '+dispositivo+'</p>';

    if(lat !== '' && lng !== '')
    {
        html += '<p><b>Latitud:</b> '+lat+'</p>';
        html += '<p><b>Longitud:</b> '+lng+'</p>';

        html += '<a class="btn-maps" target="_blank" href="https://www.google.com/maps?q='
                +lat+','+lng+'">📍 Abrir en Google Maps</a>';

        html += '<iframe '
            +'width="100%" '
            +'height="450" '
            +'src="https://maps.google.com/maps?q='
            +lat+','+lng+
            '&z=17&output=embed"></iframe>';
    }
    else
    {
        html += '<p style="color:#000;"><b>GPS:</b> No disponible.</p>';
    }

    html += '</div>';

    document.getElementById('detalleMarcacion').innerHTML = html;
    document.getElementById('modalGPS').style.display = 'block';
}

function cerrarGPS()
{
    document.getElementById('modalGPS').style.display = 'none';
}

window.onclick = function(event)
{
    let modal = document.getElementById('modalGPS');

    if(event.target == modal)
    {
        modal.style.display = 'none';
    }
}

</script>
    <br><br>

    <!-- RESUMEN DE HORAS -->

    <?php

$mes = isset($_GET['mes']) ? intval($_GET['mes']) : date('n');
$anio = isset($_GET['anio']) ? intval($_GET['anio']) : date('Y');

$dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

$primer_dia_semana = date('N', strtotime($anio.'-'.$mes.'-01'));
$primer_dia_semana--;

$meses = [
    1=>"Enero",
    2=>"Febrero",
    3=>"Marzo",
    4=>"Abril",
    5=>"Mayo",
    6=>"Junio",
    7=>"Julio",
    8=>"Agosto",
    9=>"Septiembre",
    10=>"Octubre",
    11=>"Noviembre",
    12=>"Diciembre"
];

?>

<style>

.calendario-horas{
    background:#fff;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 2px 10px rgba(0,0,0,.15);
}

.cal-header{
    background:#343a40;
    color:#fff;
    padding:20px;
    display:flex;
    justify-content:space-between;
}

.cal-header h1,
.cal-header h2{
    margin:0;
}

.cal-grid{
    display:grid;
    grid-template-columns:repeat(7,1fr);
}

.cal-dia{
    background:#212529;
    color:#fff;
    text-align:center;
    padding:10px;
    font-weight:bold;
    border:1px solid #444;
}

.cal-celda{
    min-height:170px;
    border:1px solid #ddd;
    padding:8px;
    position:relative;
    overflow:auto;
}

.cal-vacio{
    background:#efefef;
}

.numero-dia{
    position:absolute;
    right:8px;
    top:5px;
    font-weight:bold;
    font-size:14px;
}

.resumen-dia{
    margin-top:25px;
    padding:8px;
    border-radius:6px;
    color:#fff;
    font-size:12px;
}

.horas-completo{
    background:#28a745;
}

.horas-medio{
    background:#ffc107;
    color:#000;
}

.horas-bajo{
    background:#dc3545;
}

.horas-vacio{
    background:#6c757d;
}

.resumen-dia strong{
    display:block;
    margin-bottom:5px;
}

</style>

<div class="calendario-horas">

    <div class="cal-header">
        <h1><?php echo strtoupper($meses[$mes]); ?></h1>
        <h2><?php echo $anio; ?></h2>
    </div>

    <div class="cal-grid">

        <div class="cal-dia">Lunes</div>
        <div class="cal-dia">Martes</div>
        <div class="cal-dia">Miércoles</div>
        <div class="cal-dia">Jueves</div>
        <div class="cal-dia">Viernes</div>
        <div class="cal-dia">Sábado</div>
        <div class="cal-dia">Domingo</div>

        <?php

        for($i=0;$i<$primer_dia_semana;$i++)
        {
            echo '<div class="cal-celda cal-vacio"></div>';
        }

        for($dia=1;$dia<=$dias_mes;$dia++)
        {
            $fecha_actual = sprintf(
                "%04d-%02d-%02d",
                $anio,
                $mes,
                $dia
            );

            echo '<div class="cal-celda">';

            echo '<div class="numero-dia">'.$dia.'</div>';

            if(isset($resumen_dias[$fecha_actual]))
            {
                $entrada = $resumen_dias[$fecha_actual]['entrada'];
                $salida  = $resumen_dias[$fecha_actual]['salida'];

                $horas_texto = "Pendiente";
                $clase = "horas-vacio";

                if(
                    $entrada &&
                    $salida &&
                    $salida > $entrada
                )
                {
                    $segundos = $salida - $entrada;

                    $horas = floor($segundos / 3600);
                    $minutos = floor(($segundos % 3600)/60);

                    $horas_decimal =
                        $horas + ($minutos / 60);

                    $horas_texto =
                        str_pad($horas,2,'0',STR_PAD_LEFT)
                        . ':'
                        . str_pad($minutos,2,'0',STR_PAD_LEFT);

                    if($horas_decimal >= 8)
                    {
                        $clase = "horas-completo";
                    }
                    elseif($horas_decimal >= 4)
                    {
                        $clase = "horas-medio";
                    }
                    else
                    {
                        $clase = "horas-bajo";
                    }

                    echo '
                    <div class="resumen-dia '.$clase.'">

                        <strong>Horas</strong>

                        '.$horas_texto.'

                        <hr>

                        Entrada:
                        '.date('H:i',$entrada).'

                        <br><br>

                        Salida:
                        '.date('H:i',$salida).'

                    </div>';
                }
                else
                {
                    echo '
                    <div class="resumen-dia horas-vacio">

                        Sin registros completos

                    </div>';
                }
            }

            echo '</div>';
        }

        $total_celdas = $primer_dia_semana + $dias_mes;

        $faltantes = 7 - ($total_celdas % 7);

        if($faltantes < 7)
        {
            for($i=0;$i<$faltantes;$i++)
            {
                echo '<div class="cal-celda cal-vacio"></div>';
            }
        }

        ?>

    </div>

</div>

<?php endif; ?>

</div>
		<?php
/*
|--------------------------------------------------------------------------
| EJEMPLO COMPLETO
| TABLA + GRAFICA DE HORAS TRABAJADAS POR DIA
|--------------------------------------------------------------------------
| Requiere que $resumen_dias ya contenga:
|
| $resumen_dias = [
|   '2026-06-01' => [
|       'entrada' => 1748761200,
|       'salida'  => 1748790000
|   ]
| ];
|
*/

/*=====================================================
  PREPARAR DATOS PARA LA GRAFICA
=====================================================*/

$datos_grafica = [];
$maximo = 0;
$total_horas = 0;

foreach ($resumen_dias as $fecha => $info)
{
    $entrada = $info['entrada'];
    $salida  = $info['salida'];

    $horas_decimal = 0;

    if (
        $entrada &&
        $salida &&
        $salida > $entrada
    ) {
        $segundos = $salida - $entrada;
        $horas_decimal = round($segundos / 3600, 2);
    }

    $datos_grafica[] = [
        'fecha' => $fecha,
        'horas' => $horas_decimal
    ];

    $total_horas += $horas_decimal;

    if ($horas_decimal > $maximo)
    {
        $maximo = $horas_decimal;
    }
}

$total_dias = count($datos_grafica);
?>




<div class="titulo-grafica">
    HORAS TRABAJADAS POR DÍA
</div>

<div class="resumen">
    Total Días:
    <?php echo number_format($total_dias); ?>

    &nbsp;&nbsp;|&nbsp;&nbsp;

    Total Horas:
    <?php echo number_format($total_horas,2); ?>
</div>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    if(empty($datos_grafica))
    {
        echo "<h3>No existen registros para mostrar.</h3>";
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

        foreach($datos_grafica as $i => $fila)
        {
            $altura = ($maximo > 0)
                ? (($fila['horas'] / $maximo) * 350)
                : 20;

            echo '
            <div class="barra-item">

                <div class="valor">
                    '.number_format($fila['horas'],2).' h
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
                    '.date('d/m/Y', strtotime($fila['fecha'])).'
                </div>

            </div>';
        }
    }

    ?>

</div>
		<?php
/*
|--------------------------------------------------------------------------
| REPORTE DE ASISTENCIA
| - Horas Trabajadas
| - Horas Normales (máximo 8 por día)
| - Horas Extras (sobre 8 horas)
| - Horas Faltantes (menos de 8 horas)
|--------------------------------------------------------------------------
|
| Requiere:
| $resumen_dias = [
|     '2026-06-01' => [
|         'entrada' => 1748761200,
|         'salida'  => 1748797200
|     ]
| ];
|
*/

/*=====================================================
  PROCESAR INFORMACIÓN
=====================================================*/

$datos_grafica = [];

$maximo_extras = 0;

$total_horas_trabajadas = 0;
$total_horas_normales   = 0;
$total_horas_extras     = 0;
$total_horas_faltantes  = 0;

foreach($resumen_dias as $fecha => $info)
{
    $entrada = $info['entrada'];
    $salida  = $info['salida'];

    $horas_trabajadas = 0;
    $horas_normales   = 0;
    $horas_extras     = 0;
    $horas_faltantes  = 8;

    if(
        !empty($entrada) &&
        !empty($salida) &&
        $salida > $entrada
    )
    {
        $segundos = $salida - $entrada;

        $horas_trabajadas = $segundos / 3600;

        if($horas_trabajadas >= 8)
        {
            $horas_normales = 8;
            $horas_extras = $horas_trabajadas - 8;
            $horas_faltantes = 0;
        }
        else
        {
            $horas_normales = $horas_trabajadas;
            $horas_extras = 0;
            $horas_faltantes = 8 - $horas_trabajadas;
        }
    }

    $datos_grafica[] = [
        'fecha'            => $fecha,
        'trabajadas'       => $horas_trabajadas,
        'normales'         => $horas_normales,
        'extras'           => $horas_extras,
        'faltantes'        => $horas_faltantes
    ];

    $total_horas_trabajadas += $horas_trabajadas;
    $total_horas_normales   += $horas_normales;
    $total_horas_extras     += $horas_extras;
    $total_horas_faltantes  += $horas_faltantes;

    if($horas_extras > $maximo_extras)
    {
        $maximo_extras = $horas_extras;
    }
}

$total_dias = count($datos_grafica);

/*=====================================================
  FUNCION FORMATO HH:MM
=====================================================*/

function formatoHora($decimal)
{
    $h = floor($decimal);
    $m = round(($decimal - $h) * 60);

    if($m == 60)
    {
        $h++;
        $m = 0;
    }

    return
        str_pad($h,2,'0',STR_PAD_LEFT)
        . ':'
        . str_pad($m,2,'0',STR_PAD_LEFT);
}
?>



<div class="titulo">
    REPORTE DE ASISTENCIA Y HORAS EXTRAS
</div>

<div class="resumen">

    Días Procesados:
    <?php echo number_format($total_dias); ?>

    &nbsp;&nbsp;|&nbsp;&nbsp;

    Horas Trabajadas:
    <?php echo number_format($total_horas_trabajadas,2); ?>

    &nbsp;&nbsp;|&nbsp;&nbsp;

    Horas Normales:
    <?php echo number_format($total_horas_normales,2); ?>

    &nbsp;&nbsp;|&nbsp;&nbsp;

    Horas Extras:
    <?php echo number_format($total_horas_extras,2); ?>

    &nbsp;&nbsp;|&nbsp;&nbsp;

    Horas Faltantes:
    <?php echo number_format($total_horas_faltantes,2); ?>

</div>
<div class="cliente-table-panel">
<table class="table-dark">

    <thead>
        <tr>
            <th>Fecha</th>
            <th>Primera Entrada</th>
            <th>Última Salida</th>
            <th>Horas Trabajadas</th>
            <th>Horas Normales</th>
            <th>Horas Extras</th>
            <th>Horas Faltantes</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($resumen_dias as $fecha => $datos): ?>

        <?php

        $entrada = $datos['entrada'];
        $salida  = $datos['salida'];

        $trabajadas = 0;
        $normales = 0;
        $extras = 0;
        $faltantes = 8;

        if(
            !empty($entrada) &&
            !empty($salida) &&
            $salida > $entrada
        )
        {
            $trabajadas = ($salida - $entrada) / 3600;

            if($trabajadas >= 8)
            {
                $normales = 8;
                $extras = $trabajadas - 8;
                $faltantes = 0;
            }
            else
            {
                $normales = $trabajadas;
                $faltantes = 8 - $trabajadas;
            }
        }

        ?>

        <tr>

            <td>
                <?php echo date('d/m/Y', strtotime($fecha)); ?>
            </td>

            <td>
                <?php echo $entrada ? date('H:i:s',$entrada) : '-'; ?>
            </td>

            <td>
                <?php echo $salida ? date('H:i:s',$salida) : '-'; ?>
            </td>

            <td>
                <strong><?php echo formatoHora($trabajadas); ?></strong>
            </td>

            <td class="normal">
                <?php echo formatoHora($normales); ?>
            </td>

            <td class="extra">
                <?php echo formatoHora($extras); ?>
            </td>

            <td class="faltante">
                <?php echo formatoHora($faltantes); ?>
            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>
</div>

<h2 style="text-align:center;margin-bottom:20px;">
    GRÁFICA DE HORAS EXTRAS POR DÍA
</h2>

<div class="grafica-contenedor">

    <div class="linea-base"></div>

    <?php

    $colores = [
        '#F05368',
        '#FF9800',
        '#FFC107',
        '#76C04E',
        '#00BCD4',
        '#9C27B0',
        '#3F51B5',
        '#8BC34A',
        '#E91E63',
        '#FF5722'
    ];

    foreach($datos_grafica as $i => $fila)
    {
        $altura = ($maximo_extras > 0)
            ? (($fila['extras'] / $maximo_extras) * 320)
            : 5;

        echo '
        <div class="barra-item">

            <div class="valor">
                '.number_format($fila['extras'],2).' h
            </div>

            <div class="barra"
                style="
                    height:'.$altura.'px;
                    background:'.$colores[$i % count($colores)].';
                ">
            </div>

            <div class="base">
                '.date('d/m', strtotime($fila['fecha'])).'
            </div>

        </div>';
    }

    ?>

</div>

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
