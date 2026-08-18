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
$documentocontrol = "0";
$color = "";
$documento = "";
$cantidad = "";
$filacolor = "0";
$bodega = isset($_SESSION['bodega']) ? $_SESSION['bodega'] : '';
$id = 0;
$tabla = "productos";
$tabla2 = "registro";
$accion = "Revisar Kardex";
$producto = "";
$codigofecha = "";

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $codigofecha = $_GET['codigo'];
    $sql = "SELECT * from `" . $tabla . "` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
    $result = mysqli_query($con, $sql); 
    while ($crow = mysqli_fetch_assoc($result)) {   
        $codigo = $crow['codigo'];
        $producto = $crow['producto'];
    }
    $sql = "SELECT * from `" . $tabla2 . "` WHERE (`producto` LIKE '$codigo') and (`seccion` LIKE '$bodega') order by unico DESC";     
    $result2 = mysqli_query($con, $sql); 
}

// Búsqueda por fecha
if (isset($_POST['fecha1'])) {
    $codigofecha = $_POST['codigo'];
    $bodega = $_POST['bodega'];
    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    $sql = "SELECT * from `productos` WHERE `codigo` LIKE '$codigofecha' order by fechaing DESC";
    $result = mysqli_query($con, $sql); 
    while ($crow = mysqli_fetch_assoc($result)) {   
        $codigo = $crow['codigo'];
        $producto = $crow['producto'];
    }
    $sqlreg = "SELECT * from registro WHERE (`fecha` BETWEEN '$fecha1' AND '$fecha2') AND (`producto` LIKE '$codigofecha') and (`seccion` LIKE '$bodega') order by unico DESC";
    $result2 = mysqli_query($con, $sqlreg);
}

$nombre_producto_export = !empty($producto) ? $producto : 'General';

// Obtención de registros de la tabla personal para el menú desplegable
$personal_list = [];
$sql_personal = "SELECT nombres, mail FROM `personal` WHERE mail IS NOT NULL AND mail != '' ORDER BY nombres ASC";
$res_personal = mysqli_query($con, $sql_personal);
if ($res_personal) {
    while ($row_p = mysqli_fetch_assoc($res_personal)) {
        $personal_list[] = $row_p;
    }
}
?>

<!-- Librería CDN para la exportación a Excel nativa -->
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

<!-- Estilos CSS para Pantalla e Impresión Limpia -->
<style>
    /* Estructura adaptable del encabezado principal */
    .header-kardex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        padding: 10px 0;
        width: 100%;
        box-sizing: border-box;
    }

    .acciones-kardex {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        position: relative;
    }

    /* Burbuja desplegable para Envío de Correo (Diseño exacto de la imagen) */
    .burbuja-email {
        display: none;
        position: absolute;
        top: 110%;
        right: 0;
        background-color: #2b2a3a;
        border: 1px solid #3c3a50;
        padding: 16px;
        border-radius: 8px;
        box-shadow: 0px 6px 16px rgba(0,0,0,0.6);
        z-index: 1000;
        width: 310px;
        color: #ffffff;
        text-align: left;
        box-sizing: border-box;
    }

    .burbuja-email label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #ffffff;
    }

    .burbuja-email input[type="email"],
    .burbuja-email input[type="text"],
    .burbuja-email select {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 14px;
        border-radius: 6px;
        border: 1px solid #48455e;
        background-color: #1c1b26;
        color: #e0e0e0;
        box-sizing: border-box;
        font-size: 13px;
        outline: none;
    }

    .burbuja-email input::placeholder {
        color: #8c88a5;
    }

    .burbuja-email select {
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
        background-repeat: no-repeat;
        background-position: right 8px center;
        background-size: 18px;
        padding-right: 28px;
    }

    .burbuja-email-acciones {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 4px;
    }

    .btn-burbuja-cancelar {
        background-color: #68727d;
        border: none;
        color: #ffffff;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-burbuja-enviar {
        background-color: #27ad52;
        border: none;
        color: #ffffff;
        padding: 8px 18px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-mail {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 18px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Estructura adaptable del Filtro de Fechas */
    .filtro-fechas-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px;
        width: 100%;
        padding: 10px 0;
        box-sizing: border-box;
    }

    .filtro-campo {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        font-size: 14px;
        color: #ffffff;
    }

    .filtro-campo input[type="date"] {
        max-width: 160px;
        width: 100%;
        padding: 6px 10px;
        border-radius: 4px;
        border: 1px solid #444;
        box-sizing: border-box;
    }

    .filtro-boton {
        display: flex;
        align-items: center;
    }

    /* Control de desbordamiento de tabla */
    .tabla-responsive-container {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    @media print {
        @page {
            size: auto;
            margin: 10mm;
        }

        body * {
            visibility: hidden !important;
        }

        #area-imprimible-kardex, #area-imprimible-kardex * {
            visibility: visible !important;
        }

        #area-imprimible-kardex {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #ffffff !important;
        }

        .no-print, .btn-print, .btn-excel, .btn-mail, .burbuja-email, .boton-azul, form, script {
            display: none !important;
        }

        body {
            background-color: #ffffff !important;
            color: #000000 !important;
            font-family: Arial, sans-serif !important;
        }

        .panel-dark {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            margin-bottom: 10px !important;
            padding: 0 !important;
        }

        .clientes-title {
            color: #000000 !important;
            font-size: 16pt !important;
            margin-bottom: 5px !important;
        }

        .tabla-responsive-container {
            overflow: visible !important;
        }

        .table-dark {
            width: 100% !important;
            border-collapse: collapse !important;
            color: #000000 !important;
            margin-bottom: 15px !important;
        }

        .table-dark th {
            background-color: #f0f0f0 !important;
            color: #000000 !important;
            border: 1px solid #000000 !important;
            padding: 6px !important;
            font-size: 9pt !important;
            text-transform: uppercase;
        }

        .table-dark td {
            border: 1px solid #000000 !important;
            padding: 5px !important;
            font-size: 8pt !important;
            color: #000000 !important;
        }

        tr {
            background-color: transparent !important;
            page-break-inside: avoid !important;
        }
    }
</style>

<!-- Envoltura para aislamiento de impresión -->
<div id="area-imprimible-kardex">

    <table width="100%" align="center">
        <tbody>
            <tr>
                <td align="center">
                    <div class="clientes-header panel-dark" style="width: 100%;">
                        <div class="clientes-header-top">
                            <div>
                                <h2 id="optimus" class="clientes-title" style="margin: 0;">
                                    KARDEX: <?php echo $_SESSION['productoregresar'] = $producto; ?>
                                </h2>
                            </div>
                            <!-- Botones de Acción -->
                            <div class="acciones-kardex no-print">
                                <button type="button" onclick="exportarExcelKardex();" class="boton-azul btn-excel" style="cursor: pointer; padding: 10px 18px; font-weight: bold; background-color: #1e7e34; border: none; color: #fff; display: flex; align-items: center; gap: 8px;">
                                    📊 Exportar a Excel
                                </button>
                                <button type="button" onclick="window.print();" class="boton-azul btn-print" style="cursor: pointer; padding: 10px 18px; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                                    🖨️ Imprimir Kardex
                                </button>

                                <!-- Botón Enviar por Mail -->
                                <button type="button" onclick="toggleBurbujaMail();" class="boton-azul btn-mail">
                                    📧 Enviar por Mail
                                </button>

                                <!-- Burbuja flotante -->
                                <div id="burbujaMail" class="burbuja-email">
                                    <label>🔍 Buscar Personal:</label>
                                    <input type="text" id="buscar_personal" placeholder="Escriba nombres o apellidos..." onkeyup="filtrarSelectPersonal();">
                                    
                                    <label>👤 Seleccionar Destinatario:</label>
                                    <select id="select_personal" onchange="seleccionarCorreoSelect();">
                                        <option value="">-- Seleccione un destinatario --</option>
                                        <?php foreach ($personal_list as $p): ?>
                                            <option value="<?php echo htmlspecialchars($p['mail']); ?>" data-nombre="<?php echo htmlspecialchars(mb_strtolower($p['nombres'])); ?>">
                                                <?php echo htmlspecialchars($p['nombres']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <label>✉️ Correo Destinatario:</label>
                                    <input type="email" id="email_destinatario" placeholder="ejemplo@correo.com" required>

                                    <div class="burbuja-email-acciones">
                                        <button type="button" class="btn-burbuja-cancelar" onclick="toggleBurbujaMail();">Cancelar</button>
                                        <button type="button" class="btn-burbuja-enviar" onclick="procesarEnvioMail();">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td align="center">
                    <div class="grilla_listado" style="width: 100%;">
                        <!-- Filtro de fechas -->
                        <div class="panel-dark no-print" style="padding: 10px; margin-bottom: 15px;">
                            <form action="kardex.php" method="post" name="form2" id="form2" style="margin: 0;">
                                <div class="filtro-fechas-container">
                                    <div class="filtro-campo">
                                        <label for="fecha1">Desde:</label>
                                        <input name="fecha1" type="date" id="fecha1" class="clientes-input" value="<?php echo isset($_POST['fecha1']) ? $_POST['fecha1'] : ''; ?>">
                                    </div>
                                    <div class="filtro-campo">
                                        <label for="fecha2">Hasta:</label>
                                        <input name="fecha2" type="date" id="fecha2" class="clientes-input" value="<?php echo isset($_POST['fecha2']) ? $_POST['fecha2'] : ''; ?>">
                                    </div>
                                    <div class="filtro-boton">
                                        <input class="boton-azul" name="Generar" type="submit" id="Generar" title="Generar" value="Generar" style="cursor: pointer; padding: 7px 16px;">
                                    </div>
                                    <input name="bodega" type="hidden" id="bodega" value="<?php echo $bodega; ?>">
                                    <input name="codigo" type="hidden" id="codigo" value="<?php echo $codigofecha; ?>">
                                </div>
                            </form>
                        </div>

                        <!-- Grilla de Movimientos del Kardex -->
                        <div class="panel-dark">
                            <div class="tabla-responsive-container">
                                <table width="100%" align="center" class="table-dark" id="tabla-kardex-data" style="border-collapse: collapse;">
                                    <thead>
                                        <tr>
                                            <th align="center"><strong>REF</strong></th>
                                            <th align="center"><strong>FECHA</strong></th>
                                            <th align="center"><strong>BODEGA</strong></th>
                                            <th align="center"><strong>ACCIÓN</strong></th>
                                            <th align="center"><strong>SERIE</strong></th>
                                            <th align="center"><strong>CAN</strong></th>
                                            <th align="center"><strong>USUARIO</strong></th>
                                            <th align="center"><strong>EXIS</strong></th>
                                            <th align="center"><strong>UBICACIÓN</strong></th>
                                            <th align="center"><strong>FACTURADO</strong></th>
                                            <th align="center" class="no-print"><strong>DETALLE</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($result2) && $result2) {
                                            while ($crow2 = mysqli_fetch_assoc($result2)) {
                                                if ($crow2['bodega'] == $bodega or $crow2['cliente'] == $bodega) {
                                                    if ($filacolor == "0") {
                                                        $color = "#c3acfa";
                                                        $filacolor = "1";
                                                    } else {
                                                        $color = "";
                                                        $filacolor = "0";
                                                    }

                                                    if ($documento == $crow2['id'] AND $cantidad == $crow2['cantidad'] AND isset($serie) AND $serie == $crow2['serie']) {
                                                        // Duplicado omitido
                                                    } else {
                                        ?>
                                                        <tr>
                                                            <td align="center"><?php echo $documento = $crow2['id']; ?></td>
                                                            <td align="center"><?php echo $crow2['fecha']; ?></td>
                                                            <td align="left">
                                                                <?php 
                                                                $bodegabuscar = $crow2['bodega']; 
                                                                $observacion = $crow2['observacion']; 
                                                                
                                                                $sqlpb = "SELECT * from `bodegas` WHERE `tabla` LIKE '$bodegabuscar'";
                                                                $resultpb = mysqli_query($con, $sqlpb); 
                                                                while ($crowpb = mysqli_fetch_assoc($resultpb)) {   
                                                                    echo $crowpb['nombre'];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center"><abbr title="<?php echo $observacion; ?>"><?php echo $crow2['accion']; ?></abbr></td>
                                                            <td align="center">
                                                                <?php 
                                                                $serie = $crow2['serie']; 
                                                                if ($serie == "Vacio") {
                                                                    echo $serie = $crow2['serieproducto']; 
                                                                } else {
                                                                    echo $serie; 
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center"><?php echo $crow2['cantidad']; ?></td>
                                                            <td align="left">
                                                                <?php  
                                                                $usuario = $crow2['usuario'];
                                                                $sqlp = "SELECT * from personal WHERE `codigo` LIKE '$usuario'";
                                                                $resultp = mysqli_query($con, $sqlp); 
                                                                while ($crowp = mysqli_fetch_assoc($resultp)) {   
                                                                    echo $crowp['nombres'];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center"><?php echo $crow2['saldo']; ?></td>
                                                            <td align="left">
                                                                <?php 
                                                                $clientebuscar = $crow2['cliente'];
                                                                $sqlpc = "SELECT * from clientes WHERE `codigo` LIKE '$clientebuscar'";
                                                                $resultpc = mysqli_query($con, $sqlpc); 
                                                                while ($crowpc = mysqli_fetch_assoc($resultpc)) {   
                                                                    echo $crowpc['nombres'] . " " . $crowpc['apellidos'];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td align="center">
                                                                <?php
                                                                $valor = "GRATIS";
                                                                $sqlf = "SELECT * from ventas WHERE `id` LIKE '$documento'";
                                                                $resultf = mysqli_query($con, $sqlf); 
                                                                while ($crowf = mysqli_fetch_assoc($resultf)) {   
                                                                    $valor = $crowf['total'];
                                                                }
                                                                echo $valor;
                                                                ?>
                                                            </td>
                                                            <td align="center" class="no-print">
                                                                <?php if ($crow2['accion'] == "compra") { ?>
                                                                    <a href="../productos/serie_disponible.php?documento=<?php echo $documento; ?>" class="btn-action btn-general" style="padding: 5px 10px; font-size: 11px;">Seriales</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                        <?php 
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</div> <!-- Fin #area-imprimible-kardex -->

<!-- Scripts JS de Exportación y Funciones de la Burbuja -->
<script>
function exportarExcelKardex() {
    var tabla = document.getElementById('tabla-kardex-data');
    if (!tabla) {
        alert("No existen datos cargados para exportar.");
        return;
    }

    var wb = XLSX.utils.book_new();
    var datosExportar = [];

    datosExportar.push(["REPORTE DE KARDEX - PRODUCTO: <?php echo addslashes($nombre_producto_export); ?>"]);
    datosExportar.push([]);
    datosExportar.push(["REF", "FECHA", "BODEGA", "ACCIÓN", "SERIE", "CAN", "USUARIO", "EXIS", "UBICACIÓN", "FACTURADO"]);

    var filas = tabla.querySelectorAll('tbody tr');
    filas.forEach(function(fila) {
        var celdas = fila.querySelectorAll('td');
        if (celdas.length >= 10) {
            datosExportar.push([
                celdas[0].innerText.trim(),
                celdas[1].innerText.trim(),
                celdas[2].innerText.trim(),
                celdas[3].innerText.trim(),
                celdas[4].innerText.trim(),
                celdas[5].innerText.trim(),
                celdas[6].innerText.trim(),
                celdas[7].innerText.trim(),
                celdas[8].innerText.trim(),
                celdas[9].innerText.trim()
            ]);
        }
    });

    var ws = XLSX.utils.aoa_to_sheet(datosExportar);
    XLSX.utils.book_append_sheet(wb, ws, "Kardex");

    var nombreProductoLimpio = "<?php echo preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombre_producto_export); ?>";
    var nombreArchivo = "kardex_" + nombreProductoLimpio + ".xlsx";

    XLSX.writeFile(wb, nombreArchivo);
}

// Alterna la visibilidad de la burbuja flotante
function toggleBurbujaMail() {
    var burbuja = document.getElementById('burbujaMail');
    if (burbuja.style.display === 'block') {
        burbuja.style.display = 'none';
    } else {
        burbuja.style.display = 'block';
        document.getElementById('buscar_personal').focus();
    }
}

// Filtra las opciones del menú desplegable según la búsqueda realizada
function filtrarSelectPersonal() {
    var filtro = document.getElementById('buscar_personal').value.toLowerCase().trim();
    var select = document.getElementById('select_personal');
    var opciones = select.getElementsByTagName('option');

    for (var i = 1; i < opciones.length; i++) {
        var nombre = opciones[i].getAttribute('data-nombre') || "";
        var email = opciones[i].value.toLowerCase();
        if (nombre.indexOf(filtro) > -1 || email.indexOf(filtro) > -1) {
            opciones[i].style.display = "";
        } else {
            opciones[i].style.display = "none";
        }
    }
}

// Completa automáticamente el correo destinatario según el usuario seleccionado
function seleccionarCorreoSelect() {
    var select = document.getElementById('select_personal');
    var emailInput = document.getElementById('email_destinatario');
    emailInput.value = select.value;
}

// Procesa el envío del correo mediante AJAX enviando únicamente el HTML de la tabla limpia
function procesarEnvioMail() {
    var email = document.getElementById('email_destinatario').value.trim();
    if (email === "") {
        alert("Por favor, ingrese un correo electrónico válido.");
        return;
    }

    var tablaKardex = document.getElementById('tabla-kardex-data');
    if (!tablaKardex) {
        alert("No se encontró la tabla de datos para enviar.");
        return;
    }

    var tablaClonada = tablaKardex.cloneNode(true);
    
    var elementosOcultar = tablaClonada.querySelectorAll('.no-print');
    elementosOcultar.forEach(function(el) {
        el.remove();
    });

    var htmlEnviar = `
        <h3 style="font-family: Arial, sans-serif; color: #333;">Reporte de Kardex - Producto: <?php echo addslashes($nombre_producto_export); ?></h3>
        <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 12px; color: #333;">
            ${tablaClonada.innerHTML}
        </table>
    `;

    var formData = new FormData();
    formData.append('email', email);
    formData.append('contenido', htmlEnviar);

    toggleBurbujaMail();
    alert("Enviando correo, por favor espere...");

    fetch('enviar_mail.php', {
        method: 'POST',
        body: formData
    })
    .then(function(response) { return response.text(); })
    .then(function(data) {
        alert(data);
    })
    .catch(function(error) {
        alert("Ocurrió un error al intentar enviar el correo: " + error);
    });
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
