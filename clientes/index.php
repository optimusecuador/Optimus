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
      <a href="index.php"><i data-lucide="users"></i> Clientes</a>
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
/*=========================================
TOTAL DE CLIENTES
=========================================*/
$sql_total = "SELECT COUNT(*) as total FROM clientes";
$query_total = mysqli_query($conn,$sql_total);
$row_total = mysqli_fetch_array($query_total);

$total_clientes = $row_total["total"];

/*=========================================
CLIENTES DEL MES EN CURSO
=========================================*/
$mes_actual = date("m");
$anio_actual = date("Y");

$sql_mes = "SELECT COUNT(*) as total_mes
FROM clientes
WHERE MONTH(fecha)='$mes_actual'
AND YEAR(fecha)='$anio_actual'";

$query_mes = mysqli_query($conn,$sql_mes);
$row_mes = mysqli_fetch_array($query_mes);

$total_mes = $row_mes["total_mes"];

/*=========================================
CONTRATOS ACTIVOS
=========================================*/
$sql_activos = "SELECT COUNT(*) as total_activos
FROM contratos
WHERE estado='activo'";

$query_activos = mysqli_query($conn,$sql_activos);
$row_activos = mysqli_fetch_array($query_activos);
$total_activos = $row_activos["total_activos"];

/*=========================================
CONTRATOS NO ACTIVOS
=========================================*/
$sql_inactivos = "SELECT COUNT(*) as total_inactivos
FROM contratos
WHERE estado!='activo'";

$query_inactivos = mysqli_query($conn,$sql_inactivos);
$row_inactivos = mysqli_fetch_array($query_inactivos);
$total_inactivos = $row_inactivos["total_inactivos"];

/*=========================================
BUSCADOR DE CLIENTES
=========================================*/
$buscar = isset($_GET['buscar']) ? mysqli_real_escape_string($conn, $_GET['buscar']) : '';

$where = " WHERE 1=1 ";

if($buscar != ''){
    $where .= " AND (
        id LIKE '%$buscar%' OR
        codigo LIKE '%$buscar%' OR
        nombres LIKE '%$buscar%' OR
        apellidos LIKE '%$buscar%' OR
        direccion LIKE '%$buscar%' OR
        telefono1 LIKE '%$buscar%' OR
        telefono2 LIKE '%$buscar%' OR
        mail LIKE '%$buscar%'
    )";
}

$sql_clientes = "SELECT * FROM clientes $where ORDER BY unico DESC";
$query_clientes = mysqli_query($conn, $sql_clientes);
$total_resultados = mysqli_num_rows($query_clientes);
?>

<div class="isp-dashboard">

    <!-- BUSCADOR -->
    <div class="isp-panel">

        <div class="isp-title">
            Buscar clientes
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
                                placeholder="Buscar por nombre, email, teléfono, ID o dirección..."
                            >
                        </div>
                    </td>

                    <td width="15%">
                        <button type="submit" class="primary boton-buscar" style="width:100%;">
                            🔎 Buscar
                        </button>
                    </td>

                    <td width="15%">
                        <a href="index.php">
                            <button type="button" class="icon-text" style="width:100%;">
                                ↻ Limpiar
                            </button>
                        </a>
                    </td>

                </tr>
          </table>

        </form>
        <div class="table-scroll" >
          <table width="100%" border="0" cellspacing="10">
            <tr>
              <td><a href="nuevo.php">
                <button type="submit" class="btn-action btn-edit" style="width:100%;"><img src="../images/sistema/44.png" width="64" height="38" alt=""/><br> Nuevo Cliente </button>
              </a></td>
              <td><a href="importador.php">
                <button type="submit" class="btn-action btn-contrato" style="width:100%;"><img src="../images/sistema/46.png" width="64" height="38" alt=""/><br> Importar clientes </button>
                </a></td>
              
              <td><a href="migrar_contrato.php">
                <button type="submit" class="btn-action btn-proforma" style="width:100%;"><img src="../images/sistema/13.png" width="64" height="38" alt=""/><br> Crear Contratos y Carpetas </button>
                </a></td>
              </tr>
            </table>
        </div>
    </div>
<br>
    <!-- TARJETAS -->
    <div class="isp-cards">

        <div class="isp-card isp-purple">
            <div class="isp-card-icon"><img src="../images/sistema/14.png" width="64" height="38" alt=""/></div>
            <div class="isp-card-title">Total clientes</div>
            <div class="isp-card-value"><?php echo $total_clientes?></div>
            <div class="isp-card-footer">Clientes registrados</div>
        </div>

        <div class="isp-card isp-blue">
            <div class="isp-card-icon">✔</div>
            <div class="isp-card-title">Clientes activos</div>
            <div class="isp-card-value"><?php echo $total_activos?></div>
            <div class="isp-card-footer">Con servicio activo</div>
        </div>

        <div class="isp-card isp-green">
            <div class="isp-card-icon">⏸</div>
            <div class="isp-card-title">Clientes inactivos</div>
            <div class="isp-card-value"><?php echo $total_inactivos?></div>
            <div class="isp-card-footer">Sin servicio</div>
        </div>

        <div class="isp-card isp-orange">
            <div class="isp-card-icon"><img src="../images/sistema/31.png" width="64" height="38" alt=""/></div>
            <div class="isp-card-title">Nuevos este mes</div>
            <div class="isp-card-value"><?php echo $total_mes?></div>
            <div class="isp-card-footer">Nuevos contratos</div>
        </div>

    </div>

    <!-- TABLA -->
    <div class="isp-panel">

        <div class="panel-head">

            <h2>
                Resultados (<?php echo $total_resultados; ?> clientes)
            </h2>

        </div>

        <div class="table-scroll">

            <table>

                <thead>

                    <tr>
                        <th>Cliente</th>
                        <th>Contacto</th>
                        <th>Dirección</th>
                        <th>Código</th>
                        <th>Fecha</th>
                        <th>Saldo</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php
                if($total_resultados > 0){

                    while($row_cliente = mysqli_fetch_array($query_clientes)){
                ?>

                    <tr>
                        <td>
                            <strong>
                                <?php
$inicial_nombre = strtoupper(substr($row_cliente['nombres'],0,1));
$inicial_apellido = strtoupper(substr($row_cliente['apellidos'],0,1));
?>

<div style="display:flex; align-items:center; gap:12px;">

    <div class="avatar-cliente">
        <?php echo $inicial_nombre.$inicial_apellido; ?>
    </div>

    <div>
        <strong>
            <?php echo $row_cliente['nombres'].' '.$row_cliente['apellidos']; ?>
        </strong>
        <br>
        ID: <?php echo $row_cliente['id']; ?>
    </div>

</div>
                            </strong>
                            <br>
                            ID: <?php echo $row_cliente['id']; ?>
                        </td>

                        <td>
                            <?php echo $row_cliente['telefono1']; ?>
                            <br>
                            <?php echo $row_cliente['mail']; ?>
                        </td>

                        <td>
                            <?php echo $row_cliente['direccion']; ?>
                        </td>

                        <td>
                            <?php echo $row_cliente['codigo']; ?>
                        </td>

                        <td>
                            <?php echo $row_cliente['fecha']; ?>
                        </td>

                        <td>
                            $ <?php
// 1. Definir el código del cliente que viene de tu consulta previa
$codigo_cliente = $row_cliente['codigo'];

// 2. Preparar la consulta SQL
// Usamos SUM() para sumar el total y WHERE para filtrar por cliente y estado
$sql_suma = "SELECT SUM(total) AS total_pendiente 
             FROM ventas 
             WHERE cliente = '" . mysqli_real_escape_string($con, $codigo_cliente) . "' 
             AND estado = 'pendiente'";

$resultado_suma = mysqli_query($con, $sql_suma);

// 3. Obtener el resultado
if ($resultado_suma) {
    $fila_suma = mysqli_fetch_assoc($resultado_suma);
    
    // Si el resultado es NULL (no hay pendientes), asignamos 0
    $total_final = $fila_suma['total_pendiente'] ?? 0;
    
    // 4. Imprimir el resultado
    echo number_format($total_final, 2);
} else {
    // Manejo de error en caso de que la consulta falle
    echo "Error en la consulta: " . mysqli_error($con);
}
?>
                        </td>

                        <td>
    <form action="../clientes/historial.php" method="GET">
        <input type="hidden" name="codigo" value="<?php echo $row_cliente['id']; ?>">
        
        <button type="submit" class="btn-action btn-edit">
            Ir a cliente
        </button>
    </form>
</td>
                    </tr>

                <?php
                    }

                }else{
                ?>

                    <tr>
                        <td colspan="7" align="center">
                            No se encontraron clientes.
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
