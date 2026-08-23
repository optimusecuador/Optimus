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
      <a href="index.php"><i data-lucide="badge-check"></i> Estado Contrato</a>
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
		
		
    <style>
        
      

        .dashboard {
            background: var(--panel-bg);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px;
            text-align: center;
            border: 1px solid #27272a;
        }

        /* DISEÑO DEL GAUGE (MEDIDOR ANALÓGICO) */
        .gauge-container {
            position: relative;
            width: 300px;
            height: 150px;
            margin: 0 auto 30px;
            overflow: hidden;
        }

        .gauge-bg {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: conic-gradient(from 270deg, #10b981 0%, #f59e0b 25%, #ef4444 50%, transparent 50%);
            position: absolute;
            top: 0;
            left: 0;
        }

        .gauge-center {
            width: 220px;
            height: 220px;
            background: var(--panel-bg);
            border-radius: 50%;
            position: absolute;
            bottom: -110px;
            left: 40px;
            box-shadow: inset 0 10px 20px rgba(0,0,0,0.5);
        }

        .gauge-needle {
            width: 4px;
            height: 120px;
            background: #ffffff;
            position: absolute;
            bottom: 0;
            left: 148px;
            transform-origin: bottom center;
            transform: rotate(-90deg);
            transition: transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 4px 4px 0 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 10;
        }

        .gauge-needle::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: -6px;
            width: 16px;
            height: 16px;
            background: #ffffff;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0,0,0,0.5);
        }

        .gauge-data {
    position: absolute;
    bottom: 10px;
    left: 0;
    width: 100%;
    z-index: 20;
    text-align: center; /* Centra el contenido horizontalmente */
}

        .gauge-value {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            margin: 0;
        }

        .gauge-unit {
            font-size: 0.9rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .gauge-label {
            font-size: 0.85rem;
            color: var(--accent-dl);
            margin-top: 5px;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* TARJETAS DE RESULTADOS */
        .metrics-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .metric-card {
            background: #27272a;
            padding: 15px;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .metric-card.ping-card {
            grid-column: span 2;
            flex-direction: row;
            justify-content: space-between;
            padding: 12px 25px;
        }

        .label {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: var(--text-muted);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .ping-card .label { margin-bottom: 0; }

        .value {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 0;
        }

        .ping-card .value { font-size: 1.3rem; }

        #ping-val { color: var(--accent-ping); }
        #dl-val { color: var(--accent-dl); }
        #ul-val { color: var(--accent-ul); }

        button {
            background: #ffffff;
            color: #000000;
            border: none;
            width: 100%;
            padding: 16px;
            font-size: 1.1rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.1);
        }

        button:disabled {
            background: #3f3f46;
            color: #71717a;
            cursor: not-allowed;
        }
    </style>

    <div class="panel-dark">
        <h1>Velocímetro de Red (Extendido)</h1>
        
        <div class="gauge-container">
            <div class="gauge-bg"></div>
            <div class="gauge-center"></div>
            <div class="gauge-needle" id="needle"></div>
            
            <div class="gauge-data">
                <p class="gauge-value" id="gauge-speed">0.0</p>
                <span class="gauge-unit">Mbps</span>
              <div class="gauge-label" id="gauge-label">Listo</div>
            </div>
        </div>
        
        <div class="metrics-container">
            <div class="metric-card ping-card">
                <span class="label">Latencia (Ping)</span>
                <div class="value"><span id="ping-val">--</span> <span style="font-size: 0.8rem">ms</span></div>
            </div>
            <div class="metric-card">
                <span class="label">⬇ Descarga</span>
                <div class="value"><span id="dl-val">--</span></div>
            </div>
            <div class="metric-card">
                <span class="label">⬆ Subida</span>
                <div class="value"><span id="ul-val">--</span></div>
            </div>
        </div>

        <button id="start-btn" onclick="iniciarPrueba()">Iniciar Prueba</button>
    </div>

    <script>
        const CF_API = "https://speed.cloudflare.com";
        
        // ¡Variables duplicadas para el doble de tiempo de medición!
        const DL_SIZE_MB = 30; // 30 Megabytes para descarga
        const UL_SIZE_MB = 10; // 10 Megabytes para subida

        const needle = document.getElementById('needle');
        const gaugeSpeed = document.getElementById('gauge-speed');
        const gaugeLabel = document.getElementById('gauge-label');
        
        function actualizarGauge(velocidad, tipo) {
            const maxSpeed = 1000; 
            let velocidadSegura = Math.max(0, Math.min(velocidad, maxSpeed));
            
            let logSpeed = Math.log10(velocidadSegura + 1);
            let grados = (logSpeed / 3) * 180 - 90; 
            
            needle.style.transform = `rotate(${grados}deg)`;
            gaugeSpeed.textContent = velocidad.toFixed(1);
            
            if (tipo) {
                gaugeLabel.textContent = tipo;
                gaugeLabel.style.color = tipo === 'Descarga' ? '#0ea5e9' : '#8b5cf6';
            }
        }

        function medirVelocidad(url, metodo, datos, etiqueta) {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open(metodo, url, true);
                
                if (metodo === 'POST') {
                    xhr.setRequestHeader('Content-Type', 'application/octet-stream');
                } else {
                    xhr.responseType = 'arraybuffer'; 
                }
                
                let startTime = performance.now();
                
                const onProgress = (event) => {
                    if (event.loaded) {
                        let duration = (performance.now() - startTime) / 1000;
                        if (duration > 0.1) {
                            let speedMbps = ((event.loaded * 8) / duration / 1000000);
                            actualizarGauge(speedMbps, etiqueta);
                        }
                    }
                };

                if (metodo === 'POST') {
                    xhr.upload.onprogress = onProgress;
                } else {
                    xhr.onprogress = onProgress;
                }

                xhr.onload = () => {
                    let duration = (performance.now() - startTime) / 1000;
                    let totalBytes = metodo === 'POST' ? datos.length : (event ? event.loaded : DL_SIZE_MB * 1024 * 1024);
                    let finalSpeed = ((totalBytes * 8) / duration / 1000000);
                    resolve(finalSpeed);
                };

                xhr.onerror = () => reject(new Error('Error de red'));
                xhr.send(datos);
            });
        }

        async function iniciarPrueba() {
            const btn = document.getElementById('start-btn');
            const pingVal = document.getElementById('ping-val');
            const dlVal = document.getElementById('dl-val');
            const ulVal = document.getElementById('ul-val');

            btn.disabled = true;
            pingVal.textContent = "--";
            dlVal.textContent = "--";
            ulVal.textContent = "--";
            actualizarGauge(0, 'Calculando Ping...');

            try {
                // 1. PING
                const pingStart = performance.now();
                await fetch(`${CF_API}/__down?bytes=0`, { cache: 'no-store' });
                const pingEnd = performance.now();
                pingVal.textContent = Math.round(pingEnd - pingStart);

                // 2. DESCARGA
                const dlBytes = DL_SIZE_MB * 1024 * 1024;
                const dlSpeed = await medirVelocidad(`${CF_API}/__down?bytes=${dlBytes}`, 'GET', null, 'Descarga');
                dlVal.textContent = dlSpeed.toFixed(1);
                actualizarGauge(0, 'Preparando Subida...');
                
                await new Promise(r => setTimeout(r, 500)); 

                // 3. SUBIDA
                const ulBytes = UL_SIZE_MB * 1024 * 1024;
                const uploadData = new Uint8Array(ulBytes); 
                const ulSpeed = await medirVelocidad(`${CF_API}/__up`, 'POST', uploadData, 'Subida');
                ulVal.textContent = ulSpeed.toFixed(1);

                actualizarGauge(0, 'Completado');

            } catch (error) {
                console.error(error);
                actualizarGauge(0, 'Error de Conexión');
            } finally {
                btn.disabled = false;
                btn.textContent = "Repetir Prueba";
            }
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
