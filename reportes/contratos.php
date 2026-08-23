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
$numerocontratos = 0;

// Obtención del personal registrado con correo para el menú de la burbuja
$personal_list = [];
$sql_personal = "SELECT nombres, mail FROM `personal` WHERE mail IS NOT NULL AND mail != '' ORDER BY nombres ASC";
$res_personal = mysqli_query($con, $sql_personal);
if ($res_personal) {
    while ($row_p = mysqli_fetch_assoc($res_personal)) {
        $personal_list[] = $row_p;
    }
}

if (isset($_GET['nodo'])) {
    $nodo = $_GET['nodo'];
}
if (isset($_GET['codigo'])) {
    $clientecodigo = $_GET['codigo'];
}
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
    $sqlcl = "SELECT * from `clientes` WHERE `nombres` LIKE '%$producto%' order by fecha DESC";
    $resultcl = mysqli_query($con, $sqlcl);
    while ($crowcl = mysqli_fetch_assoc($resultcl)) {
        $clientecodigo = $crowcl['codigo'];
    }
    $sql = "SELECT * from `contratos` WHERE `cliente` LIKE '$clientecodigo' order by fecha DESC";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql);
} else {
    $estado = "activo";
    $sql = "SELECT * from `contratos` WHERE `estado` LIKE '$estado' order by fecha DESC";
    $result = mysqli_query($con, $sql); 
    $result2 = mysqli_query($con, $sql); 
    $serie = "Ingrese Valor";
    $producto = "Ingrese Valor";
    $codigo = "Ingrese Valor";
    $apellidos = "Ingrese Valor";
}

if (isset($_GET['codigo'])) {
    $clientecodigo = $_GET['codigo'];
    $sql = "SELECT * from `contratos` WHERE (`numero` LIKE '$clientecodigo') AND (`nodo` LIKE '$nodo') order by fecha DESC";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql);
}

while ($crow = mysqli_fetch_assoc($result2)) {   
    $numerocontratos = $numerocontratos + 1; 
}
?>

<!-- Estilos específicos ajustados al tema oscuro de styles.css -->
<style>
    .header-panel-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .acciones-panel {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        position: relative;
    }

    /* Burbuja de correo integrada con variables del archivo styles.css */
    .burbuja-email {
        display: none;
        position: absolute;
        top: 110%;
        right: 0;
        background: var(--panel, #071d31);
        border: 1px solid var(--line, rgba(118, 168, 207, 0.12));
        padding: 16px;
        border-radius: 12px;
        box-shadow: var(--shadow, 0 18px 42px rgba(0, 0, 0, 0.34));
        z-index: 1000;
        width: 310px;
        color: var(--text, #e8f3ff);
        text-align: left;
        box-sizing: border-box;
    }

    .burbuja-email label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 6px;
        color: var(--muted, #8da4bc);
        text-transform: uppercase;
    }

    .burbuja-email input[type="email"],
    .burbuja-email input[type="text"],
    .burbuja-email select {
        width: 100%;
        height: 38px;
        padding: 0 10px;
        margin-bottom: 12px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background-color: #081f34;
        color: var(--text, #e8f3ff);
        box-sizing: border-box;
        font-size: 13px;
        outline: none;
    }

    .burbuja-email-acciones {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 6px;
    }

    .btn-burbuja-cancelar {
        background-color: #68727d;
        border: none;
        color: #ffffff;
        padding: 8px 16px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
    }

    .btn-burbuja-enviar {
        background: linear-gradient(135deg, var(--green, #0faf76), #067a53);
        border: none;
        color: #ffffff;
        padding: 8px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 13px;
    }

    /* Ocultar elementos en la impresión de reporte */
    @media print {
        .no-print, .burbuja-email, form {
            display: none !important;
        }
    }
</style>

<div class="panel-dark">
    <!-- Encabezado del Panel -->
    <div class="header-panel-container">
        <div>
            <h2 class="clientes-title">LISTADO DE CONTRATOS</h2>
            <div class="clientes-subtitle">Contratos Activos: <strong><?php echo $numerocontratos; ?></strong></div>
        </div>

        <!-- Botón y Burbuja Flotante -->
        <div class="acciones-panel no-print">
            <button type="button" onclick="toggleBurbujaMail();" class="boton-azul" style="padding: 10px 18px; font-size: 14px;">
                📧 Enviar por Mail
            </button>

            <div id="burbujaMail" class="burbuja-email">
                <label>🔍 Buscar Personal:</label>
                <input type="text" id="buscar_personal" placeholder="Escriba nombres..." onkeyup="filtrarSelectPersonal();">
                
                <label>👤 Destinatario:</label>
                <select id="select_personal" onchange="seleccionarCorreoSelect();">
                    <option value="">-- Seleccionar destinatario --</option>
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

    <!-- Acciones de Exportación -->
    <?php if (isset($puesto_personal) && ($puesto_personal == "admin" OR (isset($exportar) && $exportar == "si"))) { ?>
        <div class="acciones no-print" style="justify-content: flex-start; margin-bottom: 20px;">
            <button id="btnExportar" class="icon-text">Hoja de Cálculo</button>
            <button id="btnExportar" class="icon-text">Acrobat Reader</button>
            <button id="btnExportar" class="primary">Reporte Administrador</button>
        </div>
    <?php } ?>

    <!-- Tabla con estilos table-dark de styles.css -->
    <div class="table-scroll">
        <table class="table-dark" id="tabla">
            <thead>
                <tr>
                    <th style='width:50px'>CONTRATO</th>
                    <th>
                        NOMBRES
                        <form action="productos.php" method="post" name="form1" id="form2" class="no-print" style="margin-top: 5px;">
                            <input name="producto" id="tag2" class="clientes-input" style="height: 30px; font-size: 12px;" placeholder="Buscar cliente...">
                            <img src="" id="avatar2">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    var items = <?= json_encode($array ?? []) ?>;

                                    $("#tag").autocomplete({
                                        source: items,
                                        select: function (event, item) {
                                            var params = { equipo: item.item.value };
                                            $.get("getEquipo.php", params, function (response) {
                                                var json = JSON.parse(response);
                                                if (json.status == 200){
                                                    $("#nombre").html(json.nombre);
                                                    $("#avatar").attr("src", json.icono);
                                                }
                                            });
                                        }
                                    });
                                });
                            </script>
                        </form>
                    </th>
                    <th>MEGAS</th>
                    <th>IP</th>
                    <th>TELÉFONO</th>
                    <th>ESTADO</th>
                    <th>FECHA</th>
                    <th>TIEMPO MÍNIMO</th>
                    <th>CORTADO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($crow = mysqli_fetch_assoc($result)) {   
                ?>
                    <tr>
                        <td align="center"><strong><?php echo $crow['numero']; ?></strong></td>
                        <td><?php echo $crow['cliente'] . " / " . $crow['nombres']; ?></td>
                        <td align="center">
                            <?php 
                            $productobuscar = $crow['producto'];
                            $sqlcl = "SELECT * from `productos` WHERE `codigo` LIKE '$productobuscar'";
                            $resultcl = mysqli_query($con, $sqlcl);
                            while ($crowcl = mysqli_fetch_assoc($resultcl)) {
                                echo $crowcl['megass'] . " / " . $crowcl['megasb'];
                            }
                            ?>
                        </td>
                        <td><?php echo $crow['ip']; ?></td>
                        <td><?php echo $crow['telefono']; ?></td>
                        <td>
                            <span class="estado estado-activo"><?php echo $crow['estado']; ?></span>
                        </td>
                        <td align="center"><?php echo $crow['fecha']; ?></td>
                        <?php 
                        $cadena = $crow['fecha'];
                        list($fecha_actual) = explode('(', $cadena);
                        $fechavencimiento = date("Y-m-d", strtotime($fecha_actual . "+ 1 year"));
                        $fecha = date("Y-m-d ", time());
                        $firstDate = $fecha;
                        $secondDate = $fechavencimiento;
                        $dateDifference = abs(strtotime($secondDate) - strtotime($firstDate));
                        $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                        $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

                        $clase_estado_venc = ($years <= 0 && $months <= 0 && $days <= 0) ? "estado-pagado" : "estado-vencido";
                        ?>
                        <td>
                            <span class="estado <?php echo $clase_estado_venc; ?>">
                                <?php echo "Vencimiento: " . $fechavencimiento . '<br>'; echo "Faltan: " . $years . " Años, " . $months . " Meses y " . $days . " Días"; ?>
                            </span>
                        </td>
                        <?php 
                        $clase_estado_cortado = ($crow['cortado'] == "no") ? "estado-activo" : "estado-cortado";
                        ?>
                        <td>
                            <span class="estado <?php echo $clase_estado_cortado; ?>">
                                <?php echo $crow['cortado']; ?>
                            </span>
                        </td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Lógica JavaScript -->
<script>
function toggleBurbujaMail() {
    var burbuja = document.getElementById('burbujaMail');
    if (burbuja.style.display === 'block') {
        burbuja.style.display = 'none';
    } else {
        burbuja.style.display = 'block';
        document.getElementById('buscar_personal').focus();
    }
}

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

function seleccionarCorreoSelect() {
    var select = document.getElementById('select_personal');
    var emailInput = document.getElementById('email_destinatario');
    emailInput.value = select.value;
}

function procesarEnvioMail() {
    var email = document.getElementById('email_destinatario').value.trim();
    if (email === "") {
        alert("Por favor, ingrese un correo electrónico válido.");
        return;
    }

    var tabla = document.getElementById('tabla');
    if (!tabla) {
        alert("No se encontró la tabla de datos para enviar.");
        return;
    }

    var tablaClonada = tabla.cloneNode(true);
    
    // Limpia elementos interactivos e insumos de filtro no requeridos en el Mail
    var elementosOcultar = tablaClonada.querySelectorAll('.no-print, form, script');
    elementosOcultar.forEach(function(el) {
        el.remove();
    });

    var htmlEnviar = `
        <h3 style="font-family: Arial, sans-serif; color: #333;">Reporte - Listado de Contratos Activos</h3>
        <table border="1" cellpadding="6" cellspacing="0" style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 12px; color: #333;">
            ${tablaClonada.innerHTML}
        </table>
    `;

    var formData = new FormData();
    formData.append('email', email);
    formData.append('contenido', htmlEnviar);

    toggleBurbujaMail();
    alert("Enviando correo, por favor espere...");

    fetch('../bodegas/enviar_mail.php', {
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
