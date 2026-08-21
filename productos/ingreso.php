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
      <a href="productos.php"><i data-lucide="boxes"></i> Inventario</a>
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
// 1. Manejo de alertas y sesiones iniciales
if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] != "0") {
    echo '<script type="text/javascript">'; 
    echo 'alert("¡NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSFERENCIA!");';
    echo '</script>';
    $_SESSION['mensaje'] = "0";
}                    

// 2. Definición de variables y consultas principales
$numero = "0";
$tabla = "productos";
$tabla2 = "bodegas";
$tabla3 = "task";
$tabla4 = "registro";

$accion = isset($_GET['accion']) ? $_GET['accion'] : '';

// Obtener número de documento
$sql4 = "SELECT * FROM `$tabla4` WHERE `accion` LIKE '$accion' ORDER BY fecha ASC";
$result4 = mysqli_query($con, $sql4);
while ($crowp = mysqli_fetch_assoc($result4)) {
    $numero = $crowp['unico'] + 1;
}

// Obtener productos
$periodo = "normal";
$sql = "SELECT * FROM `$tabla` WHERE `periodo` LIKE '$periodo' ORDER BY producto ASC";
$result = mysqli_query($con, $sql);

// Obtener bodegas principales
$principal = "si";
$sql2 = "SELECT * FROM `$tabla2` WHERE `principal` LIKE '$principal'";
$result2 = mysqli_query($con, $sql2);
?>

<!-- ENCABEZADO PRINCIPAL -->
<div class="clientes-header panel-dark" style="margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--line); padding-bottom: 15px;">
    <div>
        <h2 style="color: var(--cyan); text-transform: uppercase; margin: 0; font-size: 1.75rem; font-weight: 700; letter-spacing: 0.5px;">
            <?php echo strtoupper($accion); ?> DE PRODUCTOS
        </h2>
        <p style="color: var(--muted); margin: 5px 0 0 0; font-size: 0.9rem;">Gestión y control de transacciones de inventario</p>
    </div>
</div>

<!-- CONTENEDOR GENERAL HORIZONTAL -->
<div style="display: flex; flex-direction: row; gap: 20px; align-items: flex-start; flex-wrap: wrap;">
    
    <!-- COLUMNA IZQUIERDA: ACCIONES Y FORMULARIOS -->
    <div style="display: flex; flex-direction: column; gap: 20px; flex: 1; min-width: 320px; max-width: 400px;">
        
        <!-- FORMULARIO 1: AÑADIR REGISTRO -->
        <div class="panel-dark" style="background: var(--bg-card, #1e293b); border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
                <span style="background: var(--cyan); color: #000; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem;">1</span>
                <h3 style="color: var(--text); font-size: 1.1rem; margin: 0;">Añadir Registro</h3>
            </div>
            
            <form action="save_task.php" method="POST">
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    
                    <div class="clientes-field">
                        <label for="documento" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">DOCUMENTO Nro:</label>
                        <input name="documento" type="text" id="documento" value="<?php echo $numero; ?>" class="clientes-input" readonly style="background: rgba(255,255,255,0.05); cursor: not-allowed;">
                        <input id="accion" name="accion" type="hidden" value="<?php echo $accion; ?>">
                    </div>

                    <div class="clientes-field">
                        <label for="producto" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">PRODUCTO:</label>
                        <select name="producto" id="producto" class="clientes-input">
                            <?php 
                            while ($crowp = mysqli_fetch_assoc($result)) {    
                                $selected = (isset($producto) && $producto == $crowp['codigo']) ? "selected" : "";
                                echo '<option ' . $selected . ' value="' . $crowp['codigo'] . '">' . $crowp['producto'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <div class="clientes-field" style="flex: 1;">
                            <label for="title" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">CANTIDAD:</label>
                            <input name="title" id="title" type="text" autofocus required class="clientes-input" placeholder="Ej. 10">
                        </div>
                        <div class="clientes-field" style="flex: 1.5;">
                            <label for="personal" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">BODEGA:</label>
                            <select name="personal" id="personal" class="clientes-input">
                                <?php 
                                while ($crowp = mysqli_fetch_assoc($result2)) {    
                                    $selected = (isset($producto) && $producto == $crowp['codigo']) ? "selected" : "";
                                    echo '<option ' . $selected . ' value="' . $crowp['numero'] . '">' . $crowp['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <?php if ($accion == "egreso") { 
                        $sqls = "SELECT * FROM `series` WHERE `bodega` LIKE '$producto' ORDER BY serie ASC";
                        $results = mysqli_query($con, $sqls);
                    ?>
                        <div class="clientes-field">
                            <label for="serie" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">SERIE:</label>
                            <select name="serie" id="serie" class="clientes-input">
                                <?php 
                                while ($crows = mysqli_fetch_assoc($results)) {    
                                    $selected = (isset($producto) && $producto == $crowp['codigo']) ? "selected" : "";
                                    echo '<option ' . $selected . ' value="' . $crows['serie'] . '">' . $crows['serie'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    <?php } ?>

                    <div class="clientes-field">
                        <label for="description" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">DESCRIPCIÓN:</label>
                        <textarea name="description" id="description" rows="2" required class="clientes-input" placeholder="Breve detalle de la tarea..." style="font-family: inherit; padding: 10px; resize: vertical;"></textarea>
                    </div>

                </div>

                <div style="margin-top: 20px;">
                    <input type="submit" name="save_task" class="boton-azul" value="+ Agregar a la Lista" style="width: 100%; cursor: pointer; padding: 10px; font-weight: bold;">
                </div>
            </form>
        </div>

        <!-- FORMULARIO 2: PROCESAR TRANSACCIÓN -->
        <div class="panel-dark" style="background: var(--bg-card, #1e293b); border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
                <span style="background: var(--green); color: #000; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem;">2</span>
                <h3 style="color: var(--text); font-size: 1.1rem; margin: 0;">Finalizar Proceso</h3>
            </div>

            <form action="procesar_transferencia.php" method="POST">
                <?php if ($accion == "egreso") { ?>
                    <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 20px;">
                        <div class="clientes-field">
                            <label for="motivo" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">MOTIVO DEL EGRESO:</label>
                            <input name="motivo" type="text" required class="clientes-input" id="motivo" placeholder="Motivo de Suspensión" maxlength="255">
                        </div>

                        <div class="clientes-field">
                            <label for="codigo" style="font-weight: 600; font-size: 0.85rem; margin-bottom: 5px; display: block;">CLAVE DE AUTORIZACIÓN:</label>
                            <input name="codigo" type="password" required class="clientes-input" id="codigo" placeholder="••••••••" maxlength="255">
                        </div>
                    </div>
                <?php } ?>
                
                <div>
                    <input type="submit" name="Procesar" class="boton-azul" value="Procesar Transacción" style="width: 100%; background: var(--green); color: #000; font-weight: bold; cursor: pointer; padding: 12px;">
                    <input name="accion" type="hidden" id="accion_trans" value="<?php echo $accion; ?>">
                </div>
            </form>
        </div>

    </div>

    <!-- COLUMNA DERECHA: TABLA DE REGISTROS PENDIENTES -->
    <div style="flex: 2; min-width: 450px;">
        <?php 
        $sql3 = "SELECT * FROM `$tabla3` ORDER BY created_at DESC";
        $result3 = mysqli_query($con, $sql3);
        ?>
        
        <div class="panel-dark" style="background: var(--bg-card, #1e293b); border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <div style="margin-bottom: 15px; border-bottom: 1px solid var(--line); padding-bottom: 10px;">
                <h3 style="color: var(--text); font-size: 1.1rem; margin: 0;">Registros Agregados</h3>
            </div>

            <div class="table-container" style="overflow-x: auto;">
                <table class="table-dark" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid var(--line);">
                            <th style="padding: 10px;">Documento</th>
                            <th style="padding: 10px;">Descripción</th>
                            <th style="padding: 10px;">Serie</th>
                            <th style="padding: 10px;">Producto</th>
                            <th style="padding: 10px;">Cantidad</th>
                            <th style="padding: 10px;">Bodega</th>
                            <th style="padding: 10px;">Fecha</th>
                            <th style="padding: 10px; text-align: center;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $has_rows = false;
                        while ($crowt = mysqli_fetch_assoc($result3)) { 
                            $has_rows = true;
                        ?>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td style="padding: 12px 10px;"><strong><?php echo $crowt['title']; ?></strong></td>
                                <td style="padding: 12px 10px; color: var(--muted);"><?php echo $crowt['description']; ?></td>
                                <td style="padding: 12px 10px;"><span class="badge" style="background: var(--bg-soft); color: var(--cyan); padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;"><?php echo $crowt['serie']; ?></span></td>
                                <td style="padding: 12px 10px;"><?php echo $crowt['producto']; ?></td>
                                <td style="padding: 12px 10px;"><span style="color: var(--orange); font-weight: 600;"><?php echo $crowt['cantidad']; ?></span></td>
                                <td style="padding: 12px 10px;"><?php echo $crowt['personal']; ?></td>
                                <td style="padding: 12px 10px; font-size: 0.85rem; color: var(--muted);"><?php echo $crowt['created_at']; ?></td>
                                <td style="padding: 12px 10px; text-align: center;">
                                    <a href="delete_task.php?id=<?php echo $crowt['id']; ?>&accion=<?php echo $accion; ?>" style="color: var(--red); text-decoration: none; font-size: 1.2rem; font-weight: bold;" title="Eliminar">
                                        &times;
                                    </a>
                                </td>
                            </tr>
                        <?php } 
                        if (!$has_rows) {
                            echo '<tr><td colspan="8" style="text-align: center; padding: 30px; color: var(--muted);">No hay registros añadidos todavía.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- VALIDACIÓN DE PRODUCTOS CONFIGURADOS -->
<?php
$verificacion = "0";
$sqlcontrol = "SELECT * FROM productos";
$resultcontrol = mysqli_query($con, $sqlcontrol); 
while ($crowcontrol = mysqli_fetch_assoc($resultcontrol)) {
    $verificacion = 1;
}
if ($verificacion == "0") {
    echo "<script>alert('No tiene Productos Configurados -----> Inventario/Nuevo Producto');</script>";
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
