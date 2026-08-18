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
		$sql = "SELECT COUNT(*) as total 
            FROM contratos 
            WHERE estado LIKE '%activo%' 
            AND terceraedad LIKE '%si%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totallopam = $row['total'];?>
<div class="topbar">

    <div>
        <h1>Reportes ARCOTEL e ISP</h1>
        <p>Indicadores operativos, regulatorios y financieros del proveedor de internet.</p>
    </div>

    <div class="actions">

        <div class="search">
            <input type="text" placeholder="Buscar reporte...">
        </div>

        <button class="icon-text">Filtros</button>
        <button class="icon-text">Exportar</button>
        <button class="primary">Reporte Personalizado</button>

    </div>

</div>

<div class="isp-dashboard">

    <div class="isp-cards">

        <div class="isp-card isp-purple"
     onclick="window.location.href='lopam.php';"
     style="cursor:pointer;">
            <div class="isp-card-title">Reporte Lopam</div>
            <div class="isp-card-value"><?php echo $totallopam;?></div>
            <div class="isp-card-footer">▲ 12.6% vs semana anterior</div>
            <div class="isp-card-icon">💰</div>
        </div>

        <div class="isp-card isp-purple"
     onclick="window.location.href='cav.php';"
     style="cursor:pointer;">
            <div class="isp-card-title">Cuentas de Alta Velocidad</div>
            <div class="isp-card-value">86</div>
            <div class="isp-card-footer">▲ 8.3%</div>
            <div class="isp-card-icon">👥</div>
        </div>

        <div class="isp-card isp-green">
            <div class="isp-card-title">Bajas / Cancelaciones</div>
            <div class="isp-card-value">18</div>
            <div class="isp-card-footer">▼ 10%</div>
            <div class="isp-card-icon">📉</div>
        </div>

        <div class="isp-card isp-orange">
            <div class="isp-card-title">ARPU Promedio</div>
            <div class="isp-card-value">$24.50</div>
            <div class="isp-card-footer">▲ 6.7%</div>
            <div class="isp-card-icon">📈</div>
        </div>

    </div>

    <div class="isp-grid">

        <div class="isp-panel">

            <div class="isp-title">
                Ingresos Diarios
            </div>

            <div class="isp-chart">

                <svg viewBox="0 0 900 300" preserveAspectRatio="none">

                    <polyline
                        fill="none"
                        stroke="#8b4cff"
                        stroke-width="5"
                        points="
                        20,180
                        150,200
                        280,170
                        410,150
                        540,170
                        670,140
                        820,80"/>

                </svg>

                <div class="isp-tooltip">
                    22 Mayo 2026<br>
                    <strong>$27.650</strong>
                </div>

            </div>

        </div>

    </div>

    <div class="isp-bottom">

        <div class="isp-panel">

            <div class="isp-title">
                Clientes por Plan
            </div>

            <div class="isp-donut-wrap">
                <div class="isp-donut"></div>
            </div>

            <div class="isp-plan-list">

                <div class="isp-plan">
                    <div class="isp-plan-left">
                        <div class="isp-plan-dot" style="background:#7a17ff"></div>
                        100 Mbps
                    </div>
                    <strong>437</strong>
                </div>

                <div class="isp-plan">
                    <div class="isp-plan-left">
                        <div class="isp-plan-dot" style="background:#1558ff"></div>
                        200 Mbps
                    </div>
                    <strong>374</strong>
                </div>

                <div class="isp-plan">
                    <div class="isp-plan-left">
                        <div class="isp-plan-dot" style="background:#0faf76"></div>
                        300 Mbps
                    </div>
                    <strong>250</strong>
                </div>

            </div>

        </div>

        <div class="isp-panel">

            <div class="isp-title">
                Cumplimiento ARCOTEL
            </div>

            <div class="isp-network">

                <div class="isp-network-item">
                    <div class="isp-network-icon">🏛</div>
                    <h2 class="isp-online">96%</h2>
                    <small>Cumplimiento</small>
                </div>

                <div class="isp-network-item">
                    <div class="isp-network-icon">📡</div>
                    <h2 class="isp-online">99.82%</h2>
                    <small>Disponibilidad</small>
                </div>

                <div class="isp-network-item">
                    <div class="isp-network-icon">⚡</div>
                    <h2 class="isp-online">18 ms</h2>
                    <small>Latencia</small>
                </div>

            </div>

        </div>

    </div>

    <div class="isp-panel">

        <div class="isp-title">
            Resumen Operativo por Zona
        </div>

        <div class="table-scroll">

            <table>

                <thead>
                    <tr>
                        <th>ZONA</th>
                        <th>CLIENTES</th>
                        <th>INGRESOS</th>
                        <th>TRÁFICO</th>
                        <th>INCIDENCIAS</th>
                        <th>SLA</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>Zona Norte</td>
                        <td>428</td>
                        <td>$62.450</td>
                        <td>58.7 TB</td>
                        <td>12</td>
                        <td><span>95.2%</span></td>
                    </tr>

                    <tr>
                        <td>Zona Centro</td>
                        <td>356</td>
                        <td>$48.230</td>
                        <td>45.2 TB</td>
                        <td>8</td>
                        <td><span>96.8%</span></td>
                    </tr>

                    <tr>
                        <td>Zona Sur</td>
                        <td>289</td>
                        <td>$36.870</td>
                        <td>32.1 TB</td>
                        <td>15</td>
                        <td><span>93.1%</span></td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <div class="isp-panel">

        <div class="isp-title">
            Alertas e Incidentes ARCOTEL
        </div>

        <div class="isp-incident">
            <div>Alta utilización de enlace principal</div>
            <div class="isp-badge isp-high">ALTA</div>
        </div>

        <div class="isp-incident">
            <div>Mantenimiento programado POP Norte</div>
            <div class="isp-badge isp-medium">MEDIA</div>
        </div>

        <div class="isp-incident">
            <div>Nuevo firmware disponible MikroTik CCR</div>
            <div class="isp-badge isp-low">BAJA</div>
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
