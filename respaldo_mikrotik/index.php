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


/* ==========================================
   DASHBOARD MIKROTIK
========================================== */

$identity      = "Desconocido";
$version       = "-";
$uptime        = "-";
$cpu_load      = "-";
$free_memory   = "-";
$total_memory  = "-";

$conn_dash = @ssh2_connect($ip,22);

if($conn_dash)
{
    if(@ssh2_auth_password($conn_dash,$user,$pass))
    {

        $cmd = '
:put [/system identity get name];
:put [/system resource get version];
:put [/system resource get uptime];
:put [/system resource get cpu-load];
:put [/system resource get free-memory];
:put [/system resource get total-memory];
';

        $stream = ssh2_exec($conn_dash,$cmd);

        stream_set_blocking($stream,true);

        $output = trim(stream_get_contents($stream));

        fclose($stream);

        $datos = preg_split("/\r\n|\n|\r/",$output);

        if(isset($datos[0])) $identity     = trim($datos[0]);
        if(isset($datos[1])) $version      = trim($datos[1]);
        if(isset($datos[2])) $uptime       = trim($datos[2]);
        if(isset($datos[3])) $cpu_load     = trim($datos[3])."%";
        if(isset($datos[4])) $free_memory  = round(trim($datos[4])/1024/1024,2)." MB";
        if(isset($datos[5])) $total_memory = round(trim($datos[5])/1024/1024,2)." MB";

    }
}
?>

<style>

.mk-dashboard{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
    margin-bottom:25px;
}

.mk-card{
    position:relative;
    overflow:hidden;
    border-radius:16px;
    padding:20px;
    transition:.3s;
    text-align:center;
}

.mk-card:hover{
    transform:translateY(-4px);
}

.mk-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:#2196f3;
}

.mk-icon{
    font-size:34px;
    margin-bottom:10px;
}

.mk-title{
    font-size:13px;
    opacity:.8;
    text-transform:uppercase;
    letter-spacing:1px;
}

.mk-value{
    font-size:26px;
    font-weight:bold;
    margin-top:8px;
    word-break:break-word;
}

.mk-header{
    margin-bottom:15px;
}

.mk-header h2{
    margin:0;
}

</style>

<div class="panel-dark mk-header">

    <h2>Respaldo MikroTik</h2>
</div>

<div class="mk-dashboard">

    <div class="panel-dark mk-card">
        <div class="mk-icon">🖥️</div>
        <div class="mk-title">Equipo</div>
        <div class="mk-value">
            <?php echo $identity; ?>
        </div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">⚙️</div>
        <div class="mk-title">Versión RouterOS</div>
        <div class="mk-value">
            <?php echo $version; ?>
        </div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">🔥</div>
        <div class="mk-title">CPU</div>
        <div class="mk-value">
            <?php echo $cpu_load; ?>
        </div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">⏱️</div>
        <div class="mk-title">Uptime</div>
        <div class="mk-value">
            <?php echo $uptime; ?>
        </div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">💾</div>
        <div class="mk-title">RAM Libre</div>
        <div class="mk-value">
            <?php echo $free_memory; ?>
        </div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">📊</div>
        <div class="mk-title">RAM Total</div>
        <div class="mk-value">
            <?php echo $total_memory; ?>
        </div>
    </div>

</div>
<?php
$carpeta_respaldo = "../respaldo_mikrotik";

if(!is_dir($carpeta_respaldo))
{
    mkdir($carpeta_respaldo,0777,true);
}

/* ==========================================
   GENERAR RESPALDO SCRIPT (.RSC)
========================================== */

if(isset($_POST['respaldar']))
{

    $conn = ssh2_connect($ip,22);

    if(!$conn)
    {
        die("No conecta al MikroTik");
    }

    if(!ssh2_auth_password($conn,$user,$pass))
    {
        die("Login incorrecto");
    }

    $fecha_archivo = date("Ymd_His");

    $nombre_backup = "mikrotik_".$fecha_archivo;

    $stream = ssh2_exec(
        $conn,
        '/export file="'.$nombre_backup.'"'
    );

    stream_set_blocking($stream,true);
    stream_get_contents($stream);
    fclose($stream);

    sleep(5);

    $archivo_local = $carpeta_respaldo."/".$nombre_backup.".rsc";

    if(
        ssh2_scp_recv(
            $conn,
            $nombre_backup.".rsc",
            $archivo_local
        )
    )
    {

        mysqli_query(
            $con,
            "INSERT INTO respaldo_mikrotik(archivo,fecha)
             VALUES(
             '".$nombre_backup.".rsc',
             NOW()
             )"
        );

        $sqlTotal = mysqli_query(
            $con,
            "SELECT COUNT(*) total
             FROM respaldo_mikrotik"
        );

        $rowTotal = mysqli_fetch_assoc($sqlTotal);

        if($rowTotal['total'] > 30)
        {

            $sobran = $rowTotal['total'] - 30;

            $sqlViejos = mysqli_query(
                $con,
                "SELECT *
                 FROM respaldo_mikrotik
                 ORDER BY fecha ASC
                 LIMIT ".$sobran
            );

            while($viejo = mysqli_fetch_assoc($sqlViejos))
            {

                $rutaEliminar = $carpeta_respaldo.'/'.$viejo['archivo'];

                if(file_exists($rutaEliminar))
                {
                    unlink($rutaEliminar);
                }

                mysqli_query(
                    $con,
                    "DELETE FROM respaldo_mikrotik
                     WHERE id='".$viejo['id']."'"
                );

            }

        }

        echo "<script>
        alert('Respaldo generado y descargado correctamente');
        window.location.href='';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Error: No se pudo descargar el respaldo del MikroTik');
        window.location.href='';
        </script>";
    }
}

/* ==========================================
   RESTAURAR RESPALDO
========================================== */

if(isset($_POST['restaurar']))
{
    $archivo = $_POST['archivo'];

    $conn = ssh2_connect($ip,22);

    if(!$conn)
    {
        echo "<script>
        alert('No conecta al MikroTik');
        </script>";
    }
    elseif(!ssh2_auth_password($conn,$user,$pass))
    {
        echo "<script>
        alert('Login incorrecto');
        </script>";
    }
    else
    {

        $ruta_local = "../respaldo_mikrotik/".$archivo;

        if(file_exists($ruta_local))
        {

            if(
                ssh2_scp_send(
                    $conn,
                    $ruta_local,
                    $archivo,
                    0644
                )
            )
            {

                $stream = ssh2_exec(
                    $conn,
                    '/import file-name="'.$archivo.'"'
                );

                stream_set_blocking($stream,true);
                stream_get_contents($stream);
                fclose($stream);

                echo "<script>
                alert('Restauración ejecutada correctamente');
                window.location.href='';
                </script>";

            }
            else
            {
                echo "<script>
                alert('No se pudo subir el archivo al MikroTik');
                </script>";
            }

        }
        else
        {
            echo "<script>
            alert('No existe el archivo de respaldo');
            </script>";
        }

    }
}

?>

<div class="panel-dark">

<h2>Respaldo MikroTik</h2>

<p>
Nodo:
<b><?php echo $nodo; ?></b>
</p>

<form method="post">
<br>

<button
type="submit"
name="respaldar"
class="boton-azul">
Generar Respaldo
</button>

<br>
</form>

<h3>Historial de Respaldos</h3>

<table>

<tr>
<th>ID</th>
<th>Archivo</th>
<th>Fecha</th>
<th>Acciones</th>
</tr>

<?php

$sql = mysqli_query(
$con,
"SELECT *
 FROM respaldo_mikrotik
 ORDER BY fecha DESC"
);

while($row = mysqli_fetch_assoc($sql))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['archivo']; ?></td>

<td><?php echo $row['fecha']; ?></td>

<td>

<br>

<a
class="boton-azul"
href="../respaldo_mikrotik/<?php echo $row['archivo']; ?>"
target="_blank">
Descargar
</a>

&nbsp;

<form method="post" style="display:inline;">

<input
type="hidden"
name="archivo"
value="<?php echo $row['archivo']; ?>">

<button
type="submit"
name="restaurar"
class="boton-azul"
onclick="return confirm('¿Desea restaurar este respaldo en el MikroTik?');">
Restaurar
</button>

</form>

<br>

</td>

</tr>

<?php
}
?>

</table>

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
