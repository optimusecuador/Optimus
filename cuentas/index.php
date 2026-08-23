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
      <a href="index.php"><i data-lucide="landmark"></i> Cuentas Bancarias</a>
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
TOTAL CUENTAS
=========================================*/
$sql_total = "SELECT COUNT(*) total FROM cuentas";
$query_total = mysqli_query($con,$sql_total);
$row_total = mysqli_fetch_assoc($query_total);
$total_cuentas = $row_total['total'];

/*=========================================
CUENTAS CON FONDOS (SALDO POSITIVO)
=========================================*/
$sql_stock = "
SELECT COUNT(*) total
FROM cuentas
WHERE CAST(saldo AS DECIMAL(10,2)) > 0
";
$query_stock = mysqli_query($con,$sql_stock);
$row_stock = mysqli_fetch_assoc($query_stock);
$total_con_fondos = $row_stock['total'];

/*=========================================
SALDO BAJO O CRÍTICO (Menor o igual a $50.00)
=========================================*/
$sql_bajo = "
SELECT COUNT(*) total
FROM cuentas
WHERE CAST(saldo AS DECIMAL(10,2)) <= 50.00
";
$query_bajo = mysqli_query($con,$sql_bajo);
$row_bajo = mysqli_fetch_assoc($query_bajo);
$total_bajo = $row_bajo['total'];

/*=========================================
CAPITAL TOTAL DISPONIBLE (VALOR TOTAL)
=========================================*/
$sql_valor = "
SELECT SUM(CAST(saldo AS DECIMAL(10,2))) total
FROM cuentas
";
$query_valor = mysqli_query($con,$sql_valor);
$row_valor = mysqli_fetch_assoc($query_valor);
$saldo_total = $row_valor['total'];

if($saldo_total == ""){
    $saldo_total = 0;
}

/*=========================================
BUSCADOR DE CUENTAS
=========================================*/
$buscar = isset($_GET['buscar']) ? 
mysqli_real_escape_string($con,$_GET['buscar']) : '';

$where = " WHERE 1=1 ";

if($buscar != '')
{
    $where .= " AND (
        numero LIKE '%$buscar%'
        OR institucion LIKE '%$buscar%'
        OR id LIKE '%$buscar%'
        OR responsable LIKE '%$buscar%'
    )";
}

$sql_cuentas = "
SELECT *
FROM cuentas
$where
ORDER BY institucion ASC
";

$query_cuentas = mysqli_query($con,$sql_cuentas);
$total_resultados = mysqli_num_rows($query_cuentas);

?>

<div class="isp-dashboard">

    <div class="isp-panel">

        <div class="isp-title">
            Control y Gestión de Cuentas Financieras
        </div>

        <form method="GET">

            <table width="100%" border="0" cellspacing="10">

                <tr>

                    <td width="70%">

                        <div class="search" style="width:100%;">
                            🔍
                            <input
                                type="text"
                                name="buscar"
                                value="<?php echo htmlspecialchars($buscar); ?>"
                                placeholder="Buscar por número de cuenta, institución, ID interno o responsable..."
                            >
                        </div>

                    </td>

                    <td width="15%">

                        <button
                            type="submit"
                            class="primary boton-buscar"
                            style="width:100%;">

                            🔎 Buscar

                        </button>

                    </td>

                    <td width="15%">

                        <a href="index.php">

                            <button
                                type="button"
                                class="icon-text"
                                style="width:100%;">

                                ↻ Limpiar

                            </button>

                        </a>

                    </td>

                </tr>

            </table>

        </form>

        <div class="table-scroll">

            <table width="100%" border="0" cellspacing="10">

                <tr>

                    <td>

                        <a href="nuevo.php">

                            <button
                                class="btn-action btn-edit"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Nueva Cuenta

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="../cuentas/transferencia.php?accion=cruze"">

                            <button
                                class="btn-action btn-contrato"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Transferencias

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="ingreso.php?accion=ingreso">

                            <button
                                class="btn-action btn-proforma"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Ingresos

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="ingreso.php?accion=egreso"">

                            <button
                                class="btn-action btn-factura"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Egresos

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="reportes.php">

                            <button
                                class="btn-action btn-corte"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Reportes Bancarios

                            </button>

                        </a>

                    </td>

                </tr>

            </table>

        </form>

        </div>

    </div>

    <br>

    <div class="isp-cards">

        <div class="isp-card isp-purple">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Total Cuentas
            </div>

            <div class="isp-card-value">
                <?php echo $total_cuentas; ?>
            </div>

            <div class="isp-card-footer">
                Entidades registradas
            </div>

        </div>

        <div class="isp-card isp-blue">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Con Fondos
            </div>

            <div class="isp-card-value">
                <?php echo $total_con_fondos; ?>
            </div>

            <div class="isp-card-footer">
                Saldos mayores a $0
            </div>

        </div>

        <div class="isp-card isp-green">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Capital Disponible
            </div>

            <div class="isp-card-value">
                $ <?php echo number_format($saldo_total, 2, '.', ','); ?>
            </div>

            <div class="isp-card-footer">
                Saldo total combinado
            </div>

        </div>

        <div class="isp-card isp-orange">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Saldos Bajos
            </div>

            <div class="isp-card-value">
                <?php echo $total_bajo; ?>
            </div>

            <div class="isp-card-footer">
                Cuentas críticas (≤ $50)
            </div>

        </div>

    </div>

    <div class="isp-panel">

        <div class="panel-head">

            <h2>
                Resultados (<?php echo $total_resultados; ?> cuentas financieras)
            </h2>

        </div>

        <div class="table-scroll">

            <table>

                <thead>

                    <tr>
                        <th>ID Sistema</th>
                        <th>Número de Cuenta</th>
                        <th>Institución Financiera</th>
                        <th>Responsable</th>
                        <th style="text-align: right;">Saldo Actual</th>
                        <th style="text-align: center;">Estado</th>
                        <th style="text-align: center;">Kardex</th>
                        <th style="text-align: center;">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php

                if($total_resultados > 0)
                {
                    while($row = mysqli_fetch_assoc($query_cuentas))
                    {
                        $saldo = (float)$row['saldo'];

                        // Alerta visual si los fondos bajan de los $50 dólares
                        if($saldo <= 50.00)
                        {
                            $estado = "⚠️ SALDO BAJO";
                        }
                        else
                        {
                            $estado = "✅ ESTABLE";
                        }
                ?>

                    <tr>

                        <td>
                            <code><?php echo htmlspecialchars($row['id']); ?></code>
                        </td>

                        <td>
                            <strong><?php echo htmlspecialchars($row['numero']); ?></strong>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['institucion']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['responsable']); ?>
                        </td>

                        <td style="text-align: right; font-weight: bold; color: #2ecc71;">
                            $ <?php echo number_format($saldo, 2, '.', ','); ?>
                        </td>

                        <td style="text-align: center; font-weight: auto;">
                            <?php echo $estado; ?>
                        </td>
                        <td style="text-align: center;">
						<form action="kardex.php" method="GET">

                                <input
                                    type="hidden"
                                    name="codigo"
                                    value="<?php echo $row['numero']; ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn-action btn-edit">
                                    Estado de cuenta
                                </button>

                            </form>
						
						</td>

                        <td style="text-align: center;">

                            <form action="nuevo.php" method="GET">

                                <input
                                    type="hidden"
                                    name="unico"
                                    value="<?php echo $row['unico']; ?>"
                                >

                                <button
                                    type="submit"
                                    class="btn-action btn-edit">
                                    Editar
                                </button>

                            </form>

                        </td>

                    </tr>

                <?php
                    }
                }
                else
                {
                ?>

                    <tr>

                        <td colspan="8" align="center" style="padding: 30px; color: var(--muted);">
                            No se encontraron cuentas financieras asociadas a los criterios de búsqueda.
                        </td>

                    </tr>

                <?php
                }
                ?>

                </tbody>

            </table>

        </div>

    </div>

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
