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
      <a href="listado.php"><i data-lucide="shield-check"></i> MikroTik</a>
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
      <!-- InstanceBeginEditable name="principal" --><?php
$filacolor="0";

/* ==========================================
   DATOS MIKROTIK
========================================== */

$sqlolt = "SELECT * FROM mikrotik LIMIT 1";
$resultolt = mysqli_query($con, $sqlolt);

$crowolt = mysqli_fetch_assoc($resultolt);

$ip     = $crowolt['ip'];
$user   = $crowolt['usuario'];
$pass   = $crowolt['contrasena'];
$nodo   = $crowolt['nodo'];

$puerto_remoto = 9090;

// Optimización del ping: 
// -c 1: Envía un solo paquete para que sea inmediato.
// -W 1: Tiempo máximo de espera (timeout) de 1 segundo para evitar bloqueos largos.
// Redirección de salida a /dev/null para mantener el rendimiento limpio.
$os = PHP_OS_FAMILY;
if ($os === 'Windows') {
    $comando = "ping -n 1 -w 1000 " . escapeshellarg($ip) . " > nul 2>&1";
} else {
    $comando = "ping -c 1 -W 1 " . escapeshellarg($ip) . " > /dev/null 2>&1";
}

// Ejecutar comando y capturar estado de salida (0 = éxito, otro = fallo)
system($comando, $status);

if ($status !== 0) {
    echo "<script>
        alert('El MikroTik parece desconectado o con IP errónea.');
        window.location.href = '../configuracion/mikrotik.php';
    </script>";
    exit;
}

/* ==========================================
   SSH
========================================== */

$conn = ssh2_connect($ip,22);

if(!$conn)
{
	die("No conecta");
}

if(!ssh2_auth_password($conn,$user,$pass))
{
    die("Login incorrecto");
}

/* ==========================================
   FUNCION SSH
========================================== */

function mk($c,$cmd)
{
    $s = ssh2_exec($c,$cmd);

    stream_set_blocking($s,true);

    $out = stream_get_contents($s);

    fclose($s);

    return $out;
}

/* ==========================================
   RECUPERAR ADDRESS LIST
========================================== */

$address = mk(
    $conn,
    "/ip firewall address-list print detail without-paging"
);

/* ==========================================
   CARGAR CONTRATOS UNA SOLA VEZ
========================================== */

$contratos = [];

$sqlcontratos = "
SELECT ip,nombres
FROM contratos
";

$rescontratos = mysqli_query($con,$sqlcontratos);

while($rowc = mysqli_fetch_assoc($rescontratos))
{
    $contratos[$rowc['ip']] = $rowc['nombres'];
}

/* ==========================================
   PROCESAR ADDRESS LIST
========================================== */

$clientes = [];

/* ==========================================
   DIVIDIR BLOQUES
========================================== */

$bloques = preg_split('/\n\s*\d+\s+/', $address);

foreach($bloques as $bloque)
{
    if(strpos($bloque,"address=")!==false)
    {
        /* =====================================
           IP
        ===================================== */

        preg_match('/address=([^\s]+)/',$bloque,$addr);

        $ipcli = $addr[1] ?? '';

        /* =====================================
           LISTA
        ===================================== */

        preg_match('/list=([^\s]+)/',$bloque,$list);

        $lista = $list[1] ?? '';

        /* =====================================
           COMMENT
        ===================================== */

        $coment = "-";

        if(preg_match('/comment=(.*)/s',$bloque,$comment))
        {
            $coment = trim($comment[1]);

            $coment = str_replace("\n"," ",$coment);

            $coment = str_replace("\r"," ",$coment);
        }

        /* =====================================
           ESTADO
           OPTIMIZADO
        ===================================== */

        $estado = "INACTIVO";

        $fp = @fsockopen(
            $ipcli,
            $puerto_remoto,
            $errno,
            $errstr,
            0.2
        );

        if($fp)
        {
            $estado = "ACTIVO";

            fclose($fp);
        }

        /* =====================================
           VALIDACION CONTRATO
        ===================================== */

        $color = "red";

        $leyenda = "NO EXISTE EN CONTRATOS";

        $nombre_html = "
        <form method='POST' action='../mikrotik/asignacioncontrato.php' style='margin:0'>
            <input type='hidden' name='ip' value='$ipcli'>

            <button type='submit' class='boton-azul'>
                Asignar Contrato
            </button>
        </form>";

        /* =====================================
           BUSQUEDA RAPIDA EN ARRAY
        ===================================== */

        if(isset($contratos[$ipcli]))
        {
            $color = "lightgreen";

            $leyenda = "OK";

            $nombre_html = "
                ".$contratos[$ipcli]."
                <br>
                <small style='color:#8ca5bd'>
                    ".$coment."
                </small>
            ";
        }

        $clientes[] = [
            'ip'=>$ipcli,
            'nombre'=>$nombre_html,
            'lista'=>$lista,
            'comentario'=>$coment,
            'estado'=>$estado,
            'leyenda'=>$leyenda,
            'color'=>$color
        ];
    }
}
?>

<br>

<div class="cliente-table-panel">

    <div class="cliente-info-header">

        <div>

            <div class="cliente-info-title">
                LISTADO DE CLIENTES ISP
            </div>

            <div class="cliente-id">
                Clientes registrados en el router
            </div>

        </div>

        <div class="estado estado-activo">
            TOTAL:
            <?php echo count($clientes); ?>
        </div>

    </div>

    <br>

    <div style="overflow-x:auto;">

        <table 
            align="center"
            class="table-dark"
            id="tablaISP"
        >

            <thead>

                <tr align="center">

                    <th onclick="ordenarTabla(0)" style="cursor:pointer;">
                        IP ROUTER
                    </th>

                    <th>
                        NOMBRE CLIENTE
                    </th>

                    <th onclick="ordenarTabla(2)" style="cursor:pointer;">
                        LISTA
                    </th>

                    <th onclick="ordenarTabla(3)" style="cursor:pointer;">
                        COMENTARIO
                    </th>

                    <th onclick="ordenarTabla(4)" style="cursor:pointer;">
                        ESTADO
                    </th>

                    <th onclick="ordenarTabla(5)" style="cursor:pointer;">
                        VALIDACION CONTRATO
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php foreach($clientes as $c): ?>

                <tr class="alternar">

                    <td align="center">
                        <?php echo $c['ip']; ?>
                    </td>

                    <td align="center">
                        <?php echo $c['nombre']; ?>
                    </td>

                    <td align="center">
                        <?php echo $c['lista']; ?>
                    </td>

                    <td align="center">
                        <?php echo $c['comentario']; ?>
                    </td>

                    <td align="center">

                        <?php 
                        if(
                            strtolower($c['estado']) == "activo" ||
                            strtolower($c['estado']) == "online"
                        )
                        {
                        ?>

                            <div class="estado estado-activo">
                                <?php echo strtoupper($c['estado']); ?>
                            </div>

                        <?php
                        }
                        else
                        {
                        ?>

                            <div class="estado estado-cortado">
                                <?php echo strtoupper($c['estado']); ?>
                            </div>

                        <?php
                        }
                        ?>

                    </td>

                    <td align="center">
                        <?php echo $c['leyenda']; ?>
                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<script>

let direccionOrden = {};

function ordenarTabla(col)
{
    let tabla = document.getElementById("tablaISP");

    let filas = Array.from(tabla.rows).slice(1);

    direccionOrden[col] = !direccionOrden[col];

    filas.sort(function(a,b)
    {
        let A = a.cells[col].innerText.toLowerCase();

        let B = b.cells[col].innerText.toLowerCase();

        let numA = parseFloat(A);

        let numB = parseFloat(B);

        if(!isNaN(numA) && !isNaN(numB))
        {
            return direccionOrden[col]
                ? numA-numB
                : numB-numA;
        }

        return direccionOrden[col]
            ? A.localeCompare(B)
            : B.localeCompare(A);
    });

    filas.forEach(f => tabla.tBodies[0].appendChild(f));
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
