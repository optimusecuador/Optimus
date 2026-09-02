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
$tabla2 = "registro";
$accion = "Revisar Kardex";
$tabla = "";
$codigo = "";

// 1. Obtención y sanitización de la bodega activa
if (isset($_GET['cliente'])) {
    $codigo = $_GET['cliente'];
    $stmt56 = $con->prepare("SELECT tabla FROM `bodegas` WHERE `responsable` LIKE ?");
    $stmt56->bind_param("s", $codigo);
    $stmt56->execute();
    $result56 = $stmt56->get_result();
    if ($crow56 = $result56->fetch_assoc()) {
        $tabla = $crow56['tabla'];
    }
    $_SESSION['bodega'] = $tabla;
} elseif (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $stmt56 = $con->prepare("SELECT tabla FROM `bodegas` WHERE `id` LIKE ?");
    $stmt56->bind_param("s", $codigo);
    $stmt56->execute();
    $result56 = $stmt56->get_result();
    if ($crow56 = $result56->fetch_assoc()) {
        $tabla = $crow56['tabla'];
    }
    $_SESSION['bodega'] = $tabla;
}

// Resguardo si no se definió tabla de bodega
if (empty($tabla) && isset($_SESSION['bodega'])) {
    $tabla = $_SESSION['bodega'];
}

$nombre_bodega = !empty($codigo) ? $codigo : 'general';

// Obtención de personal con correo registrado utilizando la columna 'nombres'
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

<!-- Estilos para vista de pantalla e impresión -->
<style>
    .header-bodega-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .acciones-bodega {
        display: flex;
        gap: 10px;
        align-items: center;
        position: relative;
    }

    /* Modal / Burbuja para Correo y Búsqueda de Personal */
    .burbuja-email {
        display: none;
        position: absolute;
        top: 110%;
        right: 0;
        background-color: #2a2a3c;
        border: 1px solid #444;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.5);
        z-index: 1000;
        width: 320px;
        color: #fff;
    }

    .burbuja-email input[type="email"],
    .burbuja-email input[type="text"],
    .burbuja-email select {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 10px;
        border-radius: 4px;
        border: 1px solid #555;
        background-color: #1a1a24;
        color: #fff;
        box-sizing: border-box;
        font-size: 13px;
    }

    .burbuja-email-acciones {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
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

        .no-print, .btn-print, .btn-excel, .btn-mail, .burbuja-email, .boton-azul, script {
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
            font-size: 10pt !important;
            text-transform: uppercase;
        }

        .table-dark td {
            border: 1px solid #000000 !important;
            padding: 5px !important;
            font-size: 9pt !important;
            color: #000000 !important;
        }

        tr {
            background-color: transparent !important;
            page-break-inside: avoid !important;
        }
    }
</style>

<!-- Envoltura contenedora -->
<div id="area-imprimible-kardex">

    <div class="clientes-header panel-dark">
        <div class="clientes-header-top">
            <div class="header-bodega-container" style="width: 100%;">
                <div>
                    <h2 class="clientes-title" id="titulo_kardex_general">Registro de Kardex</h2>
                    <div class="clientes-subtitle">
                        <h2 id="optimus" class="clientes-title" style="margin: 0;">
                            BODEGA: <?php echo htmlspecialchars($_SESSION['bodegaregresar'] = $codigo); ?>
                        </h2>
                    </div>
                </div>
                <!-- Botones de Acción (Imprimir, Exportar a Excel y Enviar por Mail) -->
                <div class="acciones-bodega no-print">
                    <button type="button" onclick="exportarExcel();" class="boton-azul btn-excel" style="cursor: pointer; padding: 10px 18px; font-weight: bold; background-color: #1e7e34; border: none; color: #fff; display: flex; align-items: center; gap: 8px;">
                        📊 Exportar a Excel
                    </button>
                    <button type="button" onclick="window.print();" class="boton-azul btn-print" style="cursor: pointer; padding: 10px 18px; font-weight: bold; display: flex; align-items: center; gap: 8px;">
                        🖨️ Imprimir Listado
                    </button>

                    <!-- Botón Enviar por Mail -->
                    <button type="button" onclick="toggleBurbujaMail();" class="boton-azul btn-mail">
                        📧 Enviar por Mail
                    </button>

                    <!-- Burbuja flotante de Email con Búsqueda en Tabla Personal -->
                    <div id="burbujaMail" class="burbuja-email">
                        <label style="font-size: 12px; font-weight: bold;">🔍 Buscar Personal:</label>
                        <input type="text" id="buscar_personal" placeholder="Escriba nombres o apellidos..." onkeyup="filtrarPersonal();">
                        
                        <label style="font-size: 12px; font-weight: bold;">👤 Seleccionar Destinatario:</label>
                        <select id="select_personal" onchange="seleccionarCorreoPersonal();">
                            <option value="">-- Seleccione un destinatario --</option>
                            <?php foreach ($personal_list as $p): ?>
                                <option value="<?php echo htmlspecialchars($p['mail']); ?>" data-nombre="<?php echo htmlspecialchars(mb_strtolower($p['nombres'])); ?>">
                                    <?php echo htmlspecialchars($p['nombres'] . " (" . $p['mail'] . ")"); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label style="font-size: 12px; font-weight: bold;">✉️ Correo Destinatario:</label>
                        <input type="email" id="email_destinatario" placeholder="ejemplo@correo.com" required>

                        <div class="burbuja-email-acciones">
                            <button type="button" onclick="toggleBurbujaMail();" style="background:#6c757d; border:none; color:#fff; padding:5px 10px; border-radius:4px; cursor:pointer;">Cancelar</button>
                            <button type="button" onclick="procesarEnvioMail();" style="background:#28a745; border:none; color:#fff; padding:5px 10px; border-radius:4px; cursor:pointer; font-weight:bold;">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grilla_listado">
    <?php 
    $total_productos_renderizados = 0;

    if (!empty($tabla)) {
        $tabla_escapada = mysqli_real_escape_string($con, $tabla);
        
        // Consultar las categorías registradas
        $sql555 = "SELECT * FROM `tipoproducto` ORDER BY codigo DESC";
        $result555 = mysqli_query($con, $sql555);

        while ($crow555 = mysqli_fetch_assoc($result555)) {
            $tipo = $crow555['codigo'];

            // Consulta de productos vigentes en bodega
            $sql_prod = "SELECT p.codigo, p.producto, p.fechaing, b.cantidad 
                         FROM `productos` p 
                         INNER JOIN `$tabla_escapada` b 
                            ON p.codigo COLLATE utf8mb4_general_ci = b.codigo COLLATE utf8mb4_general_ci
                         WHERE p.tipo LIKE '" . mysqli_real_escape_string($con, $tipo) . "' 
                           AND b.cantidad IS NOT NULL 
                           AND b.cantidad != 'sin producto' 
                         ORDER BY p.producto ASC";

            $result_prod = mysqli_query($con, $sql_prod);

            // Omitir categoría sin inventario
            if (!$result_prod || mysqli_num_rows($result_prod) == 0) {
                continue;
            }

            $filacolor = 0;
    ?>
            <div class="panel-dark" style="margin-bottom: 20px;">
                <table width="100%" align="center" class="table-dark tabla-inventario-export" style="border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th colspan="6" align="center" class="titulo-categoria-export" style="padding: 10px; background-color: #1a1a1a;">
                                <strong>INVENTARIO: <?php echo htmlspecialchars($tipo); ?></strong>
                            </th>
                        </tr>
                        <tr style="background-color: #2a2a2a;">
                            <th align="center" style="padding: 8px;">FECHA</th>
                            <th align="left" style="padding: 8px;">CÓDIGO</th>
                            <th align="left" style="padding: 8px;">PRODUCTO</th>
                            <th align="center" style="padding: 8px;">CANTIDAD</th>
                            <th align="center" class="no-print" style="padding: 8px;">SERIES</th>
                            <th align="center" class="no-print" style="padding: 8px;">KARDEX</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($crow2 = mysqli_fetch_assoc($result_prod)) {
                            $total_productos_renderizados++;
                            $bg_color = ($filacolor == 0) ? "#2c2c3e" : "transparent";
                            $filacolor = ($filacolor == 0) ? 1 : 0;
                        ?>
                            <tr style="background-color: <?php echo $bg_color; ?>;">
                                <td align="center" style="padding: 8px;"><?php echo htmlspecialchars($crow2['fechaing']); ?></td>
                                <td align="left" style="padding: 8px;"><?php echo htmlspecialchars($crow2['codigo']); ?></td>
                                <td align="left" style="padding: 8px;"><?php echo htmlspecialchars($crow2['producto']); ?></td>
                                <td align="center" style="padding: 8px;"><?php echo htmlspecialchars($crow2['cantidad']); ?></td>
                                <td align="center" class="no-print" style="padding: 8px;">
                                    <a href="../productos/imprimir_series.php?producto=<?php echo urlencode($crow2['codigo']); ?>&bodegabuscar=<?php echo urlencode($codigo); ?>" 
                                       class="boton-azul">
                                        Seriales
                                    </a>
                                </td>
                                <td align="center" class="no-print" style="padding: 8px;">
                                    <a href="kardex.php?codigo=<?php echo urlencode($crow2['codigo']); ?>" style="text-decoration: none;">
                                        <input class="boton-azul" name="Kardex" type="button" value="Kardex" style="cursor: pointer;">
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    <?php 
        } 
    }

    // Mensaje cuando la bodega seleccionada no tiene inventarios cargados
    if ($total_productos_renderizados == 0 && !empty($tabla)) {
    ?>
        <div class="panel-dark" style="text-align: center; padding: 20px; margin: 20px 0;">
            <p style="color: #ccc; font-size: 14px;">No existen productos con existencias en la bodega seleccionada.</p>
        </div>
    <?php 
    }
    ?>
    </div>

</div> <!-- Fin de #area-imprimible-kardex -->

<!-- Script de Exportación a Excel, Búsqueda de Personal y Envío por Mail -->
<script>
// Función para armar la matriz de datos que usa la descarga a Excel
function construirEstructuraExcel() {
    var datosExportar = [];

    var tituloKardex = document.getElementById('titulo_kardex_general') ? document.getElementById('titulo_kardex_general').innerText.trim() : "REGISTRO DE KARDEX";
    var nombreBodega = "<?php echo addslashes($nombre_bodega); ?>";

    datosExportar.push([tituloKardex]);
    datosExportar.push(["BODEGA:", nombreBodega]);
    datosExportar.push([]); 

    var tablas = document.querySelectorAll('.tabla-inventario-export');

    tablas.forEach(function(tabla) {
        var tituloCatElem = tabla.querySelector('.titulo-categoria-export');
        var tituloCategoria = tituloCatElem ? tituloCatElem.innerText.trim() : "INVENTARIO";
        
        datosExportar.push([tituloCategoria]); 
        datosExportar.push(["FECHA", "CÓDIGO", "PRODUCTO", "CANTIDAD"]); 

        var filas = tabla.querySelectorAll('tbody tr');
        filas.forEach(function(fila) {
            var celdas = fila.querySelectorAll('td');
            if (celdas.length >= 4) {
                var fecha = celdas[0].innerText.trim();
                var codigo = celdas[1].innerText.trim();
                var producto = celdas[2].innerText.trim();
                var cantidad = celdas[3].innerText.trim();

                datosExportar.push([fecha, codigo, producto, cantidad]);
            }
        });

        datosExportar.push([]); 
    });

    return datosExportar;
}

// Descarga directa a Excel (.xlsx)
function exportarExcel() {
    var datosExportar = construirEstructuraExcel();
    if (datosExportar.length <= 3) {
        alert("No hay productos o datos suficientes para exportar.");
        return;
    }

    var wb = XLSX.utils.book_new();
    var ws = XLSX.utils.aoa_to_sheet(datosExportar);
    XLSX.utils.book_append_sheet(wb, ws, "Kardex_Inventario");

    var nombreBodegaLimpio = "<?php echo preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombre_bodega); ?>";
    var nombreArchivo = "kardex_inventario_" + nombreBodegaLimpio + ".xlsx";

    XLSX.writeFile(wb, nombreArchivo);
}

// Muestra u oculta la burbuja desplegable de envío de correo
function toggleBurbujaMail() {
    var burbuja = document.getElementById('burbujaMail');
    if (burbuja.style.display === 'block') {
        burbuja.style.display = 'none';
    } else {
        burbuja.style.display = 'block';
        document.getElementById('buscar_personal').focus();
    }
}

// Filtra la lista del select de personal en tiempo real usando el campo 'nombres'
function filtrarPersonal() {
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

// Copia el correo seleccionado al input de correo destino
function seleccionarCorreoPersonal() {
    var select = document.getElementById('select_personal');
    var emailInput = document.getElementById('email_destinatario');
    if (select.value !== "") {
        emailInput.value = select.value;
    }
}

// Genera el HTML exacto de la tabla e información de Bodega y lo envía en la variable POST 'contenido'
function procesarEnvioMail() {
    var email = document.getElementById('email_destinatario').value.trim();
    if (email === "") {
        alert("Por favor, ingrese un correo electrónico válido.");
        return;
    }

    // Clonar el contenedor para remover elementos no deseados (botones de acción, select) en el cuerpo del correo
    var areaClonada = document.getElementById('area-imprimible-kardex').cloneNode(true);
    
    // Eliminar botones y campos flotantes con la clase no-print en la copia enviada
    var elementosNoDeseados = areaClonada.querySelectorAll('.no-print, script');
    elementosNoDeseados.forEach(function(el) {
        el.remove();
    });

    var htmlEnviar = areaClonada.innerHTML;

    if (!htmlEnviar || htmlEnviar.trim() === "") {
        alert("No hay información en el reporte para enviar.");
        return;
    }

    // Se construye el FormData asegurando enviar la variable 'contenido' esperada por enviar_mail.php
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

<?php
// Verificación general de existencia de catálogo de productos
$verificacion = "0";
$sqlcontrol = "SELECT 1 FROM `productos` LIMIT 1";
$resultcontrol = mysqli_query($con, $sqlcontrol); 
if ($resultcontrol && mysqli_num_rows($resultcontrol) > 0) {
    $verificacion = "1";
}

if ($verificacion == "0") {
?>
    <script>
        alert('No tiene Productos Configurados -----> Inventario/Nuevo Producto');
    </script>
<?php 
}
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
