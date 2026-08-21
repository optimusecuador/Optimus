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
      <a href="truenas.php"><i data-lucide="hard-drive"></i> NAS</a>
      <a href="../traccar/traccar.php"><i data-lucide="map-pin"></i> Rastreo</a>
      <a href="../streaming/index.php"><i data-lucide="play-circle"></i> Streaming</a>
      <a href="../peliculas/index.php"><i data-lucide="play-circle"></i> Peliculas</a>
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
$resultado = $conexion->query("SELECT api, ip FROM truenas LIMIT 1");
if ($resultado && $fila = $resultado->fetch_assoc()) {
    $api_key = $fila['api'];
    $truenas_url = $fila['ip'];

    // 2. Comando de ping optimizado para Ubuntu / Linux
    $ping_cmd = "ping -c 1 -W 1 " . escapeshellarg($truenas_url);
    exec($ping_cmd, $output, $status);

    // 3. Lógica de verificación y respuesta
    if ($status === 0) {
        echo '<script>
            console.log("TrueNAS en ' . htmlspecialchars($truenas_url) . ' está en línea y responde.");
        </script>';
    } else {
        echo '<script>
            alert("No se puede conectar al equipo TrueNAS (' . htmlspecialchars($truenas_url) . '). Será redirigido a la configuración.");
            window.location.href = "../configuracion/truenas.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de TrueNAS en la base de datos.");
        window.location.href = "../configuracion/truenas.php";
    </script>';
    exit;
}

function get_api($path) {
    global $truenas_url, $api_key;
    $ch = curl_init($truenas_url . "/api/v2.0/" . $path);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer " . $api_key]);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

$datasets  = get_api("pool/dataset");
$pools     = get_api("pool/");
$disks     = get_api("disk/");
$vms       = get_api("vm/"); 
$vm_stats  = get_api("vm/status/");
$apps      = get_api("app/");

$disk_info = [];
if(is_array($disks)) foreach ($disks as $d) $disk_info[$d['name']] = $d;

$pool_data = [];
if(is_array($pools)) foreach ($pools as $p) $pool_data[$p['name']] = $p;

$grouped = [];
if(is_array($datasets)) foreach ($datasets as $ds) $grouped[$ds['pool']][] = $ds;

$vm_states = [];
if(is_array($vm_stats)) foreach ($vm_stats as $vs) $vm_states[$vs['id']] = $vs['state'];
?>
<style>
    .pool-section { margin-bottom: 40px; }
    h2 { display: flex; align-items: center; gap: 15px; color: #333; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 20px; }
    .card { background: white; padding: 25px; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
    .name { font-size: 1.1rem; font-weight: bold; color: #1a73e8; }
    .percent { font-size: 1.4rem; font-weight: 800; }
    .progress-bar { height: 12px; background: #e9ecef; border-radius: 6px; margin: 15px 0; overflow: hidden; }
    .progress-fill { height: 100%; border-radius: 6px; background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%); transition: width 1s; }
    .badge { padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; }
    .healthy { background: #d4edda; color: #155724; }
    .degraded { background: #fff3cd; color: #856404; }
    .error { background: #f8d7da; color: #721c24; }
    .disk-info { font-size: 0.8rem; background: #fdfdfd; padding: 12px; border-radius: 8px; margin-top: 10px; border-left: 4px solid #1a73e8; }
    .app-header { display: flex; align-items: center; gap: 15px; }
    .app-icon { width: 40px; height: 40px; object-fit: contain; border-radius: 8px; }
    .btn-app { display: inline-block; margin-top: 15px; padding: 6px 14px; background-color: #1a73e8; color: white; border-radius: 6px; text-decoration: none; font-size: 0.85rem; font-weight: bold; }
    .btn-app:hover { background-color: #1557b0; }
</style>

<h1>Dashboard de Almacenamiento</h1>

<?php foreach ($grouped as $pool_name => $ds_list): 
    $p = $pool_data[$pool_name] ?? null;
    $status = $p['status'] ?? 'UNKNOWN';
    $badge = ($status === 'ONLINE') ? 'healthy' : (($status === 'DEGRADED') ? 'degraded' : 'error');
?>
    <div class="pool-section">
        <h2>Pool: <?= htmlspecialchars($pool_name) ?> <span class="badge <?= $badge ?>"><?= $status ?></span></h2>
        
        <?php if($p && isset($p['topology']['data'])): ?>
            <div class="disk-info">
                <strong>Detalle Físico de Discos:</strong>
                <?php foreach($p['topology']['data'] as $disk): 
                    $dev_name = $disk['device'];
                    $info = $disk_info[$dev_name] ?? null;
                    $err = $disk['stats']['read_errors'] + $disk['stats']['write_errors'] + $disk['stats']['checksum_errors'];
                    $ops = array_sum($disk['stats']['ops']);
                    $rate = ($ops > 0) ? ($err / $ops) * 100 : 0;
                    $temp = $info['temperature'] ?? 'N/A';
                    $serial = $info['serial'] ?? 'N/A';
                ?>
                    <div style="margin-top: 6px; border-bottom: 1px solid #ddd; padding-bottom: 2px;">
                        • <strong><?= $dev_name ?></strong> | SN: <code><?= $serial ?></code> | Temp: <strong><?= $temp ?>°C</strong> | Errores: <?= $err ?> (<?= number_format($rate, 4) ?>%)
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="grid" style="margin-top: 20px;">
            <?php foreach ($ds_list as $ds): 
                $used = (float)($ds['properties']['used']['rawvalue'] ?? $ds['used']['rawvalue'] ?? 0);
                $avail = (float)($ds['properties']['available']['rawvalue'] ?? $ds['available']['rawvalue'] ?? 0);
                $perc = (($used + $avail) > 0) ? round(($used / ($used + $avail)) * 100, 1) : 0;
                $usedGB = round($used / 1073741824, 2);
            ?>
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="name"><?= htmlspecialchars($ds['name']) ?></div>
                    <div class="percent"><?= $perc ?>%</div>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: <?= $perc ?>%;"></div>
                </div>
                <div style="font-size: 0.85rem; color: #666;">Uso: <strong><?= number_format($usedGB, 2) ?> GB</strong></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<div class="pool-section">
    <h2>Máquinas Virtuales</h2>
    <div class="grid">
        <?php if(is_array($vms) && count($vms) > 0): foreach ($vms as $vm): 
            $status = $vm_states[$vm['id']] ?? 'STOPPED';
            $status_class = (strtoupper($status) === 'RUNNING') ? 'healthy' : 'error';
            $total_cores = (isset($vm['vcpus']['sockets']) ? $vm['vcpus']['sockets'] : 1) * (isset($vm['vcpus']['cores']) ? $vm['vcpus']['cores'] : 1);
            $mem_gb = round(($vm['memory'] ?? 0) / 1073741824, 2);
        ?>
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="name"><?= htmlspecialchars($vm['name'] ?? 'N/A') ?></div>
                    <span class="badge <?= $status_class ?>"><?= strtoupper($status) ?></span>
                </div>
                <div style="margin-top: 15px; font-size: 0.9rem;">
                    <div>CPU: <strong><?= $total_cores ?> Núcleos</strong> | RAM: <strong><?= $mem_gb ?> GB</strong></div>
                    <div style="margin-top:5px; color: #666;">Bootloader: <?= htmlspecialchars($vm['bootloader'] ?? 'N/A') ?></div>
                </div>
            </div>
        <?php endforeach; else: ?>
            <p>No se encontraron máquinas virtuales configuradas.</p>
        <?php endif; ?>
    </div>
</div>

<div class="pool-section">
    <h2>Aplicaciones (Apps)</h2>
    <div class="grid">
        <?php if(is_array($apps) && count($apps) > 0): foreach ($apps as $app): 
            $app_name = $app['name'] ?? 'N/A';
            $app_status = $app['state'] ?? 'UNKNOWN';
            $app_version = $app['version'] ?? 'N/A';

            $app_catalog = $app['catalog'] ?? 'N/A';
            $app_status_class = (strtoupper($app_status) === 'RUNNING') ? 'healthy' : 'error';
            
            $app_icon = $app['icon'] ?? $app['metadata']['icon'] ?? '';
            if (!empty($app_icon) && strpos($app_icon, 'http') !== 0) {
                $app_icon = $truenas_url . (strpos($app_icon, '/') === 0 ? '' : '/') . $app_icon;
            }

            $app_web_url = $app['web_url'] ?? $app['metadata']['web_url'] ?? $app['portal'] ?? '';
            if (empty($app_web_url) && isset($app['upgrade_summary']['ui_url'])) {
                $app_web_url = $app['upgrade_summary']['ui_url'];
            }
        ?>
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div class="app-header">
                        <?php if (!empty($app_icon)): ?>
                            <img src="<?= htmlspecialchars($app_icon) ?>" class="app-icon" alt="Icon">
                        <?php endif; ?>
                        <div class="name"><?= htmlspecialchars($app_name) ?></div>
                    </div>
                    <span class="badge <?= $app_status_class ?>"><?= strtoupper($status_class = $app_status) ?></span>
                </div>
                <div style="margin-top: 15px; font-size: 0.9rem;">
                    <div>Versión: <strong><?= htmlspecialchars($app_version) ?></strong></div>
                    <div style="margin-top:5px; color: #666;">Catálogo: <?= htmlspecialchars($app_catalog) ?></div>
                    <div><a href="<?= !empty($app_web_url) ? htmlspecialchars($app_web_url) : 'http://' . $truenas_url ?>" target="_blank" class="btn-app">Abrir App</a></div>
                </div>
            </div>
        <?php endforeach; else: ?>
            <p>No se encontraron aplicaciones instaladas.</p>
        <?php endif; ?>
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
