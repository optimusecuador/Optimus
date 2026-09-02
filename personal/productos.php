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
      <a href="productos.php"><i data-lucide="user-round-cog"></i> Personal</a>
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
      <!-- InstanceBeginEditable name="principal" --><?php
/*=========================================
ESTADISTICAS PERSONAL
=========================================*/

$sql_total="SELECT COUNT(*) total FROM personal";
$q_total=mysqli_query($conn,$sql_total);
$r_total=mysqli_fetch_assoc($q_total);
$total_personal=$r_total['total'] ?? 0;

$mes_actual=date("m");
$anio_actual=date("Y");

$sql_mes="
SELECT COUNT(*) total
FROM personal
WHERE MONTH(fecha)='$mes_actual'
AND YEAR(fecha)='$anio_actual'
";
$q_mes=mysqli_query($conn,$sql_mes);
$r_mes=mysqli_fetch_assoc($q_mes);
$total_mes=$r_mes['total'] ?? 0;

/*=========================================
ESTADISTICAS OPCIONALES
=========================================*/

$total_marcaciones_hoy=0;
$total_multas=0;
$total_vacaciones=0;

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'marcaciones'"))>0){

    $sql="
    SELECT COUNT(*) total
    FROM marcaciones
    WHERE DATE(fecha)=CURDATE()
    ";

    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);

    $total_marcaciones_hoy=$r['total'];
}

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'multas'"))>0){

    $sql="
    SELECT COUNT(*) total
    FROM multas
    ";

    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);

    $total_multas=$r['total'];
}

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE 'vacaciones'"))>0){

    $sql="
    SELECT COUNT(*) total
    FROM vacaciones
    WHERE estado='ACTIVO'
    ";

    $q=mysqli_query($conn,$sql);
    $r=mysqli_fetch_assoc($q);

    $total_vacaciones=$r['total'];
}

/*=========================================
BUSCADOR
=========================================*/

$buscar=isset($_GET['buscar'])
? mysqli_real_escape_string($conn,$_GET['buscar'])
: '';

$where=" WHERE 1=1 ";

if($buscar!=''){

    $where.=" AND (

        id LIKE '%$buscar%' OR
        codigo LIKE '%$buscar%' OR
        nombres LIKE '%$buscar%' OR
        apellidos LIKE '%$buscar%' OR
        direccion LIKE '%$buscar%' OR
        telefono1 LIKE '%$buscar%' OR
        telefono2 LIKE '%$buscar%' OR
        mail LIKE '%$buscar%' OR
        puesto LIKE '%$buscar%'

    )";
}

$sql_personal="
SELECT *
FROM personal
$where
ORDER BY id DESC
";

$query_personal=mysqli_query($conn,$sql_personal);
$total_resultados=mysqli_num_rows($query_personal);
?>

<div class="isp-dashboard">

    <!-- PANEL BUSQUEDA -->
    <div class="isp-panel">

        <div class="isp-title">
            Gestión de Personal
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
                                placeholder="Buscar empleado, correo, teléfono, cargo..."
                            >

                        </div>

                    </td>

                    <td width="15%">

                        <button
                            type="submit"
                            class="primary boton-buscar"
                            style="width:100%;"
                        >
                            🔎 Buscar
                        </button>

                    </td>

                    <td width="15%">

                        <a href="index.php">

                            <button
                                type="button"
                                class="icon-text"
                                style="width:100%;"
                            >
                                ↻ Limpiar
                            </button>

                        </a>

                    </td>

                </tr>

            </table>

        </form>

        <!-- BOTONES PRINCIPALES -->

        <div class="table-scroll">

            <table width="100%" border="0" cellspacing="10">

                <tr>

                    <td>
                        <a href="nuevo.php">
                            <button type="button" class="btn-action btn-edit" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Nuevo Empleado
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="marcaciones.php">
                            <button type="button" class="btn-action btn-contrato" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Marcaciones(En Construccion)
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="multas.php">
                            <button type="button" class="btn-action btn-proforma" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Multas(En Construccion)
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="permisos.php">
                            <button type="button" class="btn-action btn-general" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Permisos(En Construccion)
                            </button>
                        </a>
                    </td>

                </tr>

                <tr>

                    <td>
                        <a href="vacaciones.php">
                            <button type="button" class="btn-action btn-edit" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Vacaciones(En Construccion)
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="roles.php">
                            <button type="button" class="btn-action btn-contrato" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Roles de Pago(En Construccion)
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="asistencia.php">
                            <button type="button" class="btn-action btn-proforma" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Asistencia(En Construccion)
                            </button>
                        </a>
                    </td>

                    <td>
                        <a href="reportes.php">
                            <button type="button" class="btn-action btn-general" style="width:100%;">
                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Reportes RRHH(En Construccion)
                            </button>
                        </a>
                    </td>

                </tr>

            </table>

        </div>

    </div>

    <br>

    <!-- TARJETAS -->

    <div class="isp-cards">

        <div class="isp-card isp-purple">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Total Personal
            </div>

            <div class="isp-card-value">
                <?php echo $total_personal; ?>
            </div>

            <div class="isp-card-footer">
                Empleados registrados
            </div>

        </div>

        <div class="isp-card isp-blue">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Marcaciones Hoy
            </div>

            <div class="isp-card-value">
                <?php echo $total_marcaciones_hoy; ?>
            </div>

            <div class="isp-card-footer">
                Registros del día
            </div>

        </div>

        <div class="isp-card isp-green">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Vacaciones
            </div>

            <div class="isp-card-value">
                <?php echo $total_vacaciones; ?>
            </div>

            <div class="isp-card-footer">
                Personal ausente
            </div>

        </div>

        <div class="isp-card isp-orange">

            <div class="isp-card-icon"><img src="../images/sistema/44.png" width="64" height="38" alt=""/></div>

            <div class="isp-card-title">
                Multas
            </div>

            <div class="isp-card-value">
                <?php echo $total_multas; ?>
            </div>

            <div class="isp-card-footer">
                Pendientes
            </div>

        </div>

    </div>

    <!-- TABLA -->

    <div class="isp-panel">

        <div class="panel-head">

            <h2>
                Personal Registrado
                (<?php echo $total_resultados; ?>)
            </h2>

        </div>

        <div class="table-scroll">

            <table>

                <thead>

                    <tr>
                        <th>Empleado</th>
                        <th>Cargo</th>
                        <th>Contacto</th>
                        <th>Dirección</th>
                        <th>Código</th>
                        <th>Fecha Ingreso</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php while($row=mysqli_fetch_assoc($query_personal)){ ?>

                    <tr>

                        <td>

                            <div style="display:flex;align-items:center;gap:12px;">

                                <div class="avatar-cliente">

                                    <?php
                                    echo strtoupper(substr($row['nombres'],0,1)).
                                         strtoupper(substr($row['apellidos'],0,1));
                                    ?>

                                </div>

                                <div>

                                    <strong>
                                        <?php
                                        echo $row['nombres'].' '.$row['apellidos'];
                                        ?>
                                    </strong>

                                    <br>

                                    ID:
                                    <?php echo $row['id']; ?>

                                </div>

                            </div>

                        </td>

                        <td>
                            <?php echo $row['puesto']; ?>
                        </td>

                        <td>
                            <?php echo $row['telefono1']; ?>
                            <br>
                            <?php echo $row['mail']; ?>
                        </td>

                        <td>
                            <?php echo $row['direccion']; ?>
                        </td>

                        <td>
                            <?php echo $row['codigo']; ?>
                        </td>

                        <td>
                            <?php echo $row['fecha']; ?>
                        </td>

                        <td>

                            <a
                                href="../personal/nuevo.php?codigo=<?php echo $row['codigo'];?>"
                                class="btn-action btn-edit"
                            >
                                Editar
                            </a>

                        </td>

                    </tr>

                <?php } ?>

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
