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
	  <a href="index.php"><i data-lucide="shield-check"></i> Mapeo Red</a>
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

// =========================================================================
// 1. PROCESAMIENTO AJAX / PHPMAILER Y RESPALDO (AL PRINCIPIO ABSOLUTO)
// =========================================================================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// A) RESPALDO AUTOMÁTICO (diagrama_guardado.json)
if (isset($_POST['action']) && $_POST['action'] === 'guardado_automatico') {
    while (ob_get_level()) { ob_end_clean(); }
    header('Content-Type: application/json; charset=utf-8');

    try {
        $jsonContent = $_POST['data_json'] ?? '';
        if (empty($jsonContent)) {
            echo json_encode(['status' => 'error', 'message' => 'No hay datos.']);
            exit;
        }

        $filepath = 'diagrama_guardado.json';

        if (file_put_contents($filepath, $jsonContent) !== false) {
            echo json_encode(['status' => 'success', 'message' => 'Guardado automático realizado']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al guardar diagrama_guardado.json']);
        }
    } catch (\Throwable $t) {
        echo json_encode(['status' => 'error', 'message' => $t->getMessage()]);
    }
    exit;
}

// B) RESPALDO MANUAL CON BOTÓN (Crea archivo con fecha en carpeta respaldo_red)
if (isset($_POST['action']) && $_POST['action'] === 'crear_respaldo') {
    while (ob_get_level()) { ob_end_clean(); }
    header('Content-Type: application/json; charset=utf-8');

    try {
        $dir = '../respaldo_red/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $jsonContent = $_POST['data_json'] ?? '';
        if (empty($jsonContent)) {
            echo json_encode(['status' => 'error', 'message' => 'No hay datos para respaldar.']);
            exit;
        }

        $filename = 'avance_red_ftth_' . date('Y-m-d_H-i-s') . '.json';
        $filepath = $dir . $filename;

        if (file_put_contents($filepath, $jsonContent) !== false) {
            echo json_encode([
                'status' => 'success', 
                'message' => 'Respaldo realizado satisfactoriamente: ' . $filename
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No se pudo escribir el archivo en el servidor.']);
        }
    } catch (\Throwable $t) {
        echo json_encode(['status' => 'error', 'message' => 'Error Fatal: ' . $t->getMessage()]);
    }
    exit;
}

// C) ENVÍO DE EMAIL
if (isset($_POST['action']) && $_POST['action'] === 'enviar_email') {
    while (ob_get_level()) { ob_end_clean(); }
    header('Content-Type: application/json; charset=utf-8');

    try {
        $phpmailer_path = '../generar_automatico/PHPMailer/src/';
        if (!file_exists($phpmailer_path . 'PHPMailer.php')) {
            echo json_encode([
                'status' => 'error', 
                'message' => 'Ruta de PHPMailer no encontrada en: ' . $phpmailer_path
            ]);
            exit;
        }

        require_once $phpmailer_path . 'Exception.php';
        require_once $phpmailer_path . 'PHPMailer.php';
        require_once $phpmailer_path . 'SMTP.php';

        $destinatario = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
        $htmlContent = urldecode($_POST['html'] ?? '');

        if (!$destinatario || empty($htmlContent)) {
            echo json_encode(['status' => 'error', 'message' => 'Email o contenido del gráfico está vacío.']);
            exit;
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = 'localhost'; 
        $mail->SMTPAuth   = false;
        $mail->Port       = 25;

        $mail->setFrom('notificaciones@redes-ftth.local', 'Sistema Diagrama FTTH');
        $mail->addAddress($destinatario);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Avance del Diagrama de Red FTTH - ' . date('d/m/Y');
        
        $mail->Body    = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; padding: 15px; }
                    .node-content { border: 1px solid #ccc; padding: 10px; margin: 5px 0; border-radius: 4px; }
                </style>
            </head>
            <body>
                <h2>Avance de Diagrama FTTH Generado</h2>
                <hr>
                {$htmlContent}
            </body>
            </html>";

        $mail->send();
        echo json_encode(['status' => 'success', 'message' => 'Correo enviado correctamente a ' . $destinatario]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error PHPMailer: ' . $e->getMessage()]);
    } catch (\Throwable $t) {
        echo json_encode(['status' => 'error', 'message' => 'Error Fatal PHP: ' . $t->getMessage()]);
    }
    exit;
}

// =========================================================================
// 2. CONEXIÓN A BASE DE DATOS Y CONSULTAS
// =========================================================================
if (file_exists('conexion.php')) {
    include_once('conexion.php');
} elseif (file_exists('../conexion.php')) {
    include_once('../conexion.php');
}

$data_contratos = [];
if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    $sql = "SELECT numero, nombres, router FROM contratos WHERE caja = 0";
    $result = $conn->query($sql);
    if ($result) {
        while($row = $result->fetch_assoc()) { $data_contratos[] = $row; }
    }
}

$data_personal = [];
if (isset($conn) && $conn instanceof mysqli && !$conn->connect_error) {
    $sql_p = "SELECT id, nombres, mail FROM personal WHERE mail IS NOT NULL AND mail != ''";
    $res_p = $conn->query($sql_p);
    if ($res_p) {
        while($row_p = $res_p->fetch_assoc()) { $data_personal[] = $row_p; }
    }
}
?>

<style>
    .toolbar {
        background: #1e293b;
        padding: 12px 20px;
        display: flex;
        gap: 12px;
        align-items: center;
        border-radius: 6px;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    .btn-action {
        background-color: #2563eb;
        color: white;
        border: none;
        padding: 8px 16px;
        font-size: 13px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s;
    }
    .btn-action:hover { background-color: #1d4ed8; }
    .btn-success { background-color: #16a34a; }
    .btn-success:hover { background-color: #15803d; }
    .btn-pdf { background-color: #dc2626; }
    .btn-pdf:hover { background-color: #b91c1c; }
    .btn-mail { background-color: #d97706; }
    .btn-mail:hover { background-color: #b45309; }
    .btn-respaldo { background-color: #8b5cf6; }
    .btn-respaldo:hover { background-color: #7c3aed; }

    /* ESTILOS DE LA BURBUJA */
    .mail-bubble-container {
        position: relative;
        display: inline-block;
    }
    .mail-bubble {
        display: none;
        position: absolute;
        top: 45px;
        right: 0;
        background-color: #232733;
        border: 1px solid #3b4252;
        padding: 18px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        z-index: 100;
        width: 310px;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }
    .mail-bubble label { 
        color: #f1f5f9; 
        font-size: 12px; 
        font-weight: bold; 
        margin-bottom: 6px; 
        display: flex; 
        align-items: center; 
        gap: 6px; 
    }
    .mail-bubble input, .mail-bubble select {
        width: 100%;
        background-color: #181b22;
        border: 1px solid #475569;
        color: #e2e8f0;
        padding: 8px 10px;
        font-size: 12px;
        border-radius: 6px;
        box-sizing: border-box;
        margin-bottom: 12px;
        outline: none;
    }
    .mail-bubble input:focus, .mail-bubble select:focus {
        border-color: #38bdf8;
    }
    .mail-bubble input::placeholder {
        color: #64748b;
    }
    .mail-bubble-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 5px;
    }
    .btn-modal-cancel {
        background-color: #64748b;
        color: white;
        border: none;
        padding: 6px 14px;
        font-size: 12px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-modal-cancel:hover { background-color: #475569; }
    .btn-modal-send {
        background-color: #22c55e;
        color: white;
        border: none;
        padding: 6px 16px;
        font-size: 12px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-modal-send:hover { background-color: #16a34a; }

    /* ESTILOS DE LA ESTRUCTURA PRINCIPAL */
    .panel-dark { width: 100%; overflow-x: auto; padding: 20px; box-sizing: border-box; }
    .branch { display: flex !important; align-items: center; position: relative; margin: 10px 0; }
    .children { display: flex !important; flex-direction: column !important; margin-left: 30px; padding-left: 30px; position: relative; justify-content: center; border-left: 3px solid #2c3e50; }
    .children:not(:empty)::after { content: ""; position: absolute; left: -33px; top: 50%; width: 30px; border-top: 3px solid #2c3e50; }
    .branch::before { content: ""; position: absolute; left: -30px; top: 50%; width: 30px; border-top: 3px solid #2c3e50; }
    .panel-dark > .branch::before { display: none; }
    .node-content { background: white; border: 2px solid #2c3e50; padding: 15px; border-radius: 8px; width: 260px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); position: relative; z-index: 2; }
    .root-node { background: #27ae60; color: white; border-color: #219150; }
    .root-node h3 { margin-top: 0; margin-bottom: 15px; text-align: center; font-size: 16px;}
    h4 { margin: 0 0 10px 0; font-size: 14px; display: flex; align-items: center;}
    .dot { width: 12px; height: 12px; border-radius: 50%; display: inline-block; margin-right: 8px; border: 1px solid rgba(0,0,0,0.3); }
    input, select { width: 100%; padding: 8px; margin: 5px 0; font-size: 12px; border: 1px solid #bdc3c7; border-radius: 4px; box-sizing: border-box; }
    input[readonly] { background-color: #e9ecef; color: #2c3e50; font-weight: bold; cursor: not-allowed; border: 1px solid #aab7c4; }
    .extra-fields { display: none; margin-top: 10px; padding-top: 10px; border-top: 1px dashed #ccc; }
    label { font-size: 11px; font-weight: bold; color: #333; margin-top: 5px; display: block; }
    .root-node label { color: white; }
    .power-grid { display: flex; gap: 10px; margin-bottom: 5px; }
    .power-grid > div { flex: 1; }
    .ac-wrapper { position: relative; }
    .ac-list { position: absolute; background: white; border: 1px solid #bdc3c7; width: 100%; z-index: 10; max-height: 120px; overflow-y: auto; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    .ac-item { padding: 5px; cursor: pointer; border-bottom: 1px solid #eee; font-size: 10px; color: black !important; }
    .ac-item:hover { background: #f0f0f0; }

    @media print {
        .toolbar, .ac-list, .mail-bubble { display: none !important; }
        body, html { margin: 0; padding: 0; background: #fff !important; }
        .panel-dark { overflow: visible !important; padding: 0 !important; width: 100% !important; }
        .node-content { box-shadow: none !important; break-inside: avoid; }
        input, select { border: 1px solid #999 !important; background: transparent !important; }
        @page { size: landscape; margin: 10mm; }
    }
</style>

<!-- BARRA DE HERRAMIENTAS -->
<div class="toolbar">
    <button class="btn-action btn-success" onclick="descargarAvance()">
        📥 Descargar Avance (.json)
    </button>
    <button class="btn-action" onclick="document.getElementById('file-input').click()">
        📤 Cargar Avance
    </button>
    <button class="btn-action btn-respaldo" onclick="respaldarEnServidor()">
        💾 Respaldo
    </button>
    <button class="btn-action btn-pdf" onclick="exportarPDF()">
        📄 Exportar a PDF
    </button>
    
    <!-- CONTENEDOR MODAL DE MAIL -->
    <div class="mail-bubble-container">
        <button class="btn-action btn-mail" onclick="toggleMailBubble()">
            ✉️ Enviar por Mail
        </button>
        <div class="mail-bubble" id="mail-bubble">
            <label>🔍 Buscar Personal:</label>
            <input type="text" id="search-personal" placeholder="Escriba nombres o apellidos..." oninput="filtrarPersonalSelect(this)">

            <label>👤 Seleccionar Destinatario:</label>
            <select id="select-personal" onchange="seleccionarDestinatario(this)">
                <option value="">-- Seleccione un destinatario --</option>
            </select>

            <label>✉️ Correo Destinatario:</label>
            <input type="email" id="email-target" placeholder="ejemplo@correo.com">

            <div class="mail-bubble-actions">
                <button class="btn-modal-cancel" onclick="toggleMailBubble()">Cancelar</button>
                <button class="btn-modal-send" onclick="procesarEnvioMail()">Enviar</button>
            </div>
        </div>
    </div>

    <input type="file" id="file-input" style="display:none" accept=".json" onchange="cargarArchivoAvance(event)">
</div>

<div class="panel-dark" id="main-panel">
    <div class="branch" id="root-branch">
        <div class="node-content root-node">
            <h3>OLT - PUERTO PRINCIPAL</h3>
            <label>Potencia de Salida OLT (dBm):</label>
            <input type="number" class="save-me" id="olt-potencia" value="3.0" step="0.1">
            <label>Nombre de Caja Principal:</label>
            <input type="text" class="save-me" id="nombre-raiz" placeholder="Ej. NAP-MASTER">
            <label>Tipo de Splitter Principal:</label>
            <select class="select-splitter save-me">
                <option value="0">Seleccionar...</option>
                <option value="1">Drop (1:1)</option><option value="2">Splitter 1:2</option>
                <option value="4">Splitter 1:4</option><option value="8">Splitter 1:8</option>
                <option value="16">Splitter 1:16</option><option value="32">Splitter 1:32</option>
                <option value="64">Splitter 1:64</option>
            </select>
        </div>
        <div class="children"></div>
    </div>
</div>

<script>
    const contratos = <?php echo json_encode($data_contratos); ?>;
    const personal = <?php echo json_encode($data_personal); ?>;
    const colores = ["Azul", "Naranja", "Verde", "Marrón", "Gris", "Blanco", "Rojo", "Negro"];
    const hexCol = ["#0000FF", "#FFA500", "#008000", "#8B4513", "#808080", "#E6E6E6", "#FF0000", "#000000"];
    const atenuacionSplitter = {'1': 0.5, '2': 3.5, '4': 7.0, '8': 10.5, '16': 14.0, '32': 17.5, '64': 21.0};

    // Función del Botón Respaldo (Guardar copia con fecha en carpeta ../respaldo_red/)
    function respaldarEnServidor() {
        const data = obtenerObjetoEstado();
        const jsonStr = JSON.stringify(data, null, 2);

        const dataForm = new FormData();
        dataForm.append('action', 'crear_respaldo');
        dataForm.append('data_json', jsonStr);

        fetch(window.location.href, {
            method: 'POST',
            body: dataForm
        })
        .then(async res => {
            const text = await res.text();
            try {
                return JSON.parse(text);
            } catch (err) {
                alert('El servidor no devolvió un JSON válido. Detalle:\n\n' + text.substring(0, 200));
                throw new Error('Formato de respuesta incorrecto.');
            }
        })
        .then(res => {
            if (res.status === 'success') {
                alert(res.message);
            } else {
                alert('Error: ' + res.message);
            }
        })
        .catch(err => {
            console.error(err);
        });
    }

    // Función de Guardado Automático Continuo (diagrama_guardado.json)
    function guardarEnServidorSilencioso() {
        const data = obtenerObjetoEstado();
        const jsonStr = JSON.stringify(data, null, 2);

        const dataForm = new FormData();
        dataForm.append('action', 'guardado_automatico');
        dataForm.append('data_json', jsonStr);

        fetch(window.location.href, {
            method: 'POST',
            body: dataForm
        }).catch(err => console.error(err));
    }

    function toggleMailBubble() {
        const bubble = document.getElementById('mail-bubble');
        const display = bubble.style.display === 'block' ? 'none' : 'block';
        bubble.style.display = display;
        if (display === 'block') {
            poblarSelectPersonal(personal);
        }
    }

    function poblarSelectPersonal(lista) {
        const select = document.getElementById('select-personal');
        select.innerHTML = '<option value="">-- Seleccione un destinatario --</option>';
        lista.forEach(p => {
            const opt = document.createElement('option');
            opt.value = p.mail || ''; 
            opt.textContent = p.nombres;
            select.appendChild(opt);
        });
    }

    function filtrarPersonalSelect(input) {
        const query = input.value.toUpperCase();
        const filtrados = personal.filter(p => p.nombres.toUpperCase().includes(query) || (p.mail && p.mail.toUpperCase().includes(query)));
        poblarSelectPersonal(filtrados);
    }

    function seleccionarDestinatario(select) {
        const emailInput = document.getElementById('email-target');
        emailInput.value = select.value;
    }

    function procesarEnvioMail() {
        const mailInput = document.getElementById('email-target').value;
        if (!mailInput) {
            alert('Por favor, ingresa o selecciona un correo destinatario.');
            return;
        }

        document.querySelectorAll('#root-branch input').forEach(el => {
            el.setAttribute('value', el.value);
        });

        const dataForm = new FormData();
        dataForm.append('action', 'enviar_email');
        dataForm.append('email', mailInput);
        
        const htmlLimpio = encodeURIComponent(document.getElementById('root-branch').innerHTML);
        dataForm.append('html', htmlLimpio);

        fetch(window.location.href, {
            method: 'POST',
            body: dataForm
        })
        .then(async res => {
            const text = await res.text();
            try {
                return JSON.parse(text);
            } catch (err) {
                console.error('Respuesta recibida:', text);
                alert('El servidor no devolvió un JSON válido. Detalle:\n\n' + text.substring(0, 200));
                throw new Error('Formato de respuesta incorrecto.');
            }
        })
        .then(res => {
            if (res.status === 'success') {
                alert(res.message);
                toggleMailBubble();
            } else {
                alert('Error: ' + res.message);
            }
        })
        .catch(err => {
            console.error(err);
        });
    }

    document.getElementById('main-panel').addEventListener('input', (e) => {
        if(e.target.tagName === 'INPUT' || e.target.tagName === 'SELECT') {
            e.target.classList.add('save-me'); 
            if(e.target.tagName === 'INPUT') {
                e.target.setAttribute('value', e.target.value);
            }
            if(e.target.classList.contains('select-splitter')) actualizarCaja(e.target);
            if(e.target.classList.contains('select-modo')) cambiarModo(e.target);
            
            recalcularPotencias();
            guardarEstado();
        }
    });

    document.getElementById('main-panel').addEventListener('change', (e) => {
        if(e.target.tagName === 'SELECT') {
            Array.from(e.target.options).forEach(opt => {
                if(opt.value === e.target.value) {
                    opt.setAttribute('selected', 'selected');
                } else {
                    opt.removeAttribute('selected');
                }
            });
            guardarEstado();
        }
    });

    function exportarPDF() {
        document.querySelectorAll('#root-branch input').forEach(el => {
            el.setAttribute('value', el.value);
        });
        window.print();
    }

    function obtenerObjetoEstado() {
        document.querySelectorAll('#root-branch input').forEach(el => {
            el.setAttribute('value', el.value);
        });
        
        const data = { 
            fecha_guardado: new Date().toLocaleString(),
            html: document.getElementById('root-branch').innerHTML, 
            inputs: {} 
        };
        
        document.querySelectorAll('.save-me').forEach((el, idx) => {
            el.setAttribute('data-idx', idx); 
            data.inputs[idx] = el.value; 
        });
        return data;
    }

    function guardarEstado() {
        const data = obtenerObjetoEstado();
        localStorage.setItem('config_red', JSON.stringify(data));
        // Se guarda en background en diagrama_guardado.json
        guardarEnServidorSilencioso();
    }

    function descargarAvance() {
        const data = obtenerObjetoEstado();
        const jsonStr = JSON.stringify(data, null, 2);
        const blob = new Blob([jsonStr], { type: "application/json" });
        const url = URL.createObjectURL(blob);
        
        const a = document.createElement('a');
        a.href = url;
        const fecha = new Date().toISOString().slice(0,10);
        a.download = `avance_red_ftth_${fecha}.json`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    function cargarArchivoAvance(event) {
        const file = event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            try {
                const data = JSON.parse(e.target.result);
                if (data && data.html && data.inputs) {
                    localStorage.setItem('config_red', JSON.stringify(data));
                    cargarEstado();
                    alert("¡Avance cargado correctamente!");
                } else {
                    alert("El archivo no tiene un formato válido.");
                }
            } catch (err) {
                alert("Error al leer el archivo JSON.");
            }
        };
        reader.readAsText(file);
    }

    function cargarEstado() {
        const data = JSON.parse(localStorage.getItem('config_red'));
        if(!data) return;
        
        document.getElementById('root-branch').innerHTML = data.html;
        
        document.querySelectorAll('.save-me').forEach((el, idx) => { 
            if(data.inputs[idx] !== undefined) {
                el.value = data.inputs[idx];
                if(el.tagName === 'INPUT') el.setAttribute('value', data.inputs[idx]);
            }
        });

        document.querySelectorAll('.select-modo').forEach(sel => cambiarModo(sel, false));
        recalcularPotencias();
    }

    function ejecutarBusqueda(input) {
        const val = input.value.toUpperCase();
        input.setAttribute('value', input.value);
        let list = input.nextElementSibling;
        if (!list || !list.classList.contains('ac-list')) { 
            list = document.createElement('div'); 
            list.className = 'ac-list'; 
            input.parentNode.appendChild(list); 
        }
        list.innerHTML = '';
        if (!val) return;
        
        contratos.filter(c => c.nombres.toUpperCase().includes(val) || c.numero.toString().includes(val)).forEach(c => {
            const item = document.createElement('div'); 
            item.className = 'ac-item'; 
            item.innerHTML = `<strong>${c.numero}</strong> - ${c.nombres}`;
            item.onclick = () => { 
                input.value = c.nombres; 
                input.setAttribute('value', c.nombres);
                const node = input.closest('.node-content'); 
                const serial = node.querySelector('.serial-input'); 
                if (serial) {
                    serial.value = c.router;
                    serial.setAttribute('value', c.router);
                }
                list.innerHTML = ''; 
                guardarEstado(); 
            };
            list.appendChild(item);
        });
    }

    function recalcularPotencias() {
        const rootBranch = document.getElementById('root-branch');
        let potenciaActual = parseFloat(document.getElementById('olt-potencia').value) || 0;
        propagarPotencia(rootBranch, potenciaActual);
    }

    function propagarPotencia(branch, powerIn) {
        const nodeContent = branch.querySelector(':scope > .node-content');
        if (!nodeContent) return;
        
        const potIngreso = nodeContent.querySelector('.pot-ingreso'); 
        if (potIngreso) {
            potIngreso.value = powerIn.toFixed(2);
            potIngreso.setAttribute('value', powerIn.toFixed(2));
        }
        
        const selectModo = nodeContent.querySelector('.select-modo');
        if (selectModo && selectModo.value === 'ONU') { 
            const potOnu = nodeContent.querySelector('.pot-onu'); 
            if (potOnu) {
                potOnu.value = powerIn.toFixed(2);
                potOnu.setAttribute('value', powerIn.toFixed(2));
            }
        }
        
        const splitterSelect = nodeContent.querySelector('.select-splitter');
        let powerOut = powerIn;
        if (splitterSelect && splitterSelect.value !== "0") { 
            powerOut = powerIn - (atenuacionSplitter[splitterSelect.value] || 0); 
            const potSalida = nodeContent.querySelector('.pot-salida'); 
            if (potSalida) {
                potSalida.value = powerOut.toFixed(2);
                potSalida.setAttribute('value', powerOut.toFixed(2));
            }
        }
        
        branch.querySelector(':scope > .children')?.querySelectorAll(':scope > .branch').forEach(b => propagarPotencia(b, powerOut));
    }

    function actualizarCaja(selectElement) {
        const childrenDiv = selectElement.closest('.branch').querySelector(':scope > .children');
        childrenDiv.innerHTML = '';
        const count = parseInt(selectElement.value);
        if (!isNaN(count) && count > 0) {
            for (let i = 0; i < count; i++) {
                const childBranch = document.createElement('div'); childBranch.className = 'branch';
                childBranch.innerHTML = `<div class="node-content" style="border-left: 6px solid ${hexCol[i % 8]};">
                    <h4 style="color: ${hexCol[i % 8] !== '#E6E6E6' ? hexCol[i % 8] : '#333'};"><span class="dot" style="background:${hexCol[i % 8]}"></span> Hilo ${i+1}: ${colores[i % 8]}</h4>
                    <select class="select-modo save-me"><option value="nada">Seleccionar destino...</option><option value="ONU">Hacia Cliente (ONU)</option><option value="SPL">Hacia Nueva Caja (Splitter)</option><option value="ROT">Fibra Rota</option></select>
                    <div class="extra-fields onu-fields"><div class="ac-wrapper"><label>Nombre del Cliente:</label><input type="text" class="save-me" placeholder="Buscar..." oninput="ejecutarBusqueda(this)"></div><label>Serial ONU:</label><input type="text" class="serial-input save-me" placeholder="Ej. HWTC12345"><label>Potencia Recibida (dBm):</label><input type="text" class="pot-onu" readonly></div>
                    <div class="extra-fields spl-fields"></div>

                </div><div class="children"></div>`;
                childrenDiv.appendChild(childBranch);
            }
        }
        guardarEstado();
    }

    function cambiarModo(selectElement, limpiarHijos = true) {
        const nodeContent = selectElement.closest('.node-content');
        const splFields = nodeContent.querySelector('.spl-fields');
        const onuFields = nodeContent.querySelector('.onu-fields');
        const childrenDiv = selectElement.closest('.branch').querySelector(':scope > .children');
        
        onuFields.style.display = (selectElement.value === 'ONU') ? 'block' : 'none';
        
        if (selectElement.value === 'SPL') {
            splFields.style.display = 'block';
            if (!splFields.innerHTML.trim()) {
                splFields.innerHTML = `<label>Nombre Nueva Caja:</label><input type="text" class="save-me" placeholder="Ej. NAP-02"><label>Color de Fibra:</label><select class="save-me">${colores.map(c => `<option value="${c}">${c}</option>`).join('')}</select><div class="power-grid"><div><label>Pot. Ingreso:</label><input type="text" class="pot-ingreso" readonly></div><div><label>Pot. Salida:</label><input type="text" class="pot-salida" readonly></div></div><label>Tipo de Splitter:</label><select class="select-splitter save-me"><option value="0">Seleccionar...</option><option value="2">Splitter 1:2</option><option value="4">Splitter 1:4</option><option value="8">Splitter 1:8</option><option value="16">Splitter 1:16</option><option value="32">Splitter 1:32</option><option value="64">Splitter 1:64</option></select>`;
            }
        } else { 
            splFields.style.display = 'none'; 
            if (limpiarHijos) {
                childrenDiv.innerHTML = ''; 
            }
        }
        if (limpiarHijos) guardarEstado();
    }

    window.onload = cargarEstado;
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
