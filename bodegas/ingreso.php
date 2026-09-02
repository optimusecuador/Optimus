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
									<div class="content">
    <div class="panel-dark">
        <div>
            <h1>TRANSFERENCIA ENTRE BODEGAS</h1>
            <p>Gestión y control de movimientos de inventario entre sucursales</p>
        </div>
    </div>

    <?php 	
    $numero = "0";
    $tabla = "productos";
    $tabla2 = "bodegas";
    $tabla3 = "transferencia";
    $tabla4 = "registro";
    $producto_serie = "0";
    $personal = "0";
    $_SESSION['personal'] = " ";
    $_SESSION['bodegadestino'] = " ";
    $encontrado = "0";
    
    if (isset($_GET['accion'])) {
        $accion =$_GET['accion'];
        $_SESSION['accion'] =$accion;
    }
    if (isset($_POST['producto_serie'])) {
        $producto_serie =$_POST['producto_serie'];
        $personal =$_POST['personal'];
        $destino =$_POST['bodegadestino'];
        $accion =$_SESSION['accion'];
        $_SESSION['personal'] =$_POST['personal'];
        $_SESSION['bodegadestino'] =$_POST['bodegadestino'];
        $_SESSION['producto_serie'] =$_POST['producto_serie'];
    }
    if (isset($_SESSION['producto_serie'])) {
        $producto_serie =$_SESSION['producto_serie'];
    }
    $asignado = "disponible";
    $sql44 = "SELECT * from `series` WHERE (`producto` LIKE '$producto_serie') and (`asignado` LIKE '$asignado') and (`bodega` LIKE '$personal') order by fecha ASC";
    $result44 = mysqli_query($con, $sql44);$sql4 = "SELECT * from `".$tabla4."` order by unico ASC";
    $result4 = mysqli_query($con,$sql4);
    while($crowp = mysqli_fetch_assoc($result4)) {$numero = $crowp['unico'] + 1;     }$tabla3 = "transferencia";
    $periodo = "normal";
    $sql = "SELECT * from `".$tabla."` WHERE `periodo` LIKE '$periodo' order by producto ASC";
    $result = mysqli_query($con, $sql);$sql2 = "SELECT * from `".$tabla2."`";
    $result2 = mysqli_query($con, $sql2);$result22 = mysqli_query($con,$sql2);
    ?>

    <div class="dashboard-grid">
        <!-- PANEL DE SELECCIÓN DE ORIGEN, DESTINO Y PRODUCTO -->
        <div class="panel wide" style="grid-column: span 12;">
            <div class="panel-head">
                <h2>Configuración de la Transferencia</h2>
            </div>
            <div class="grilla_listado">
                <form action="ingreso.php" method="post" name="form1" id="form1">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label style="display:block; font-size:12px; color:var(--muted); margin-bottom:5px;">BODEGA ORIGEN:</label>
                            <select name="personal" id="personal" class="search" style="width: 150px; height: 38px;">
                                <?php while($crowp = mysqli_fetch_assoc($result2)) {	
                                    $bodegaprincipal =$crowp['principal'];
                                    if($bodegaprincipal == "si") { $seriebuscar =$crowp['numero']; }
                                    if($personal ==$crowp['numero']) {
                                        echo '<option selected value="'.$crowp['numero'].'">'.$crowp['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$crowp['numero'].'">'.$crowp['nombre'].'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; color:var(--muted); margin-bottom:5px;">BODEGA DESTINO:</label>
                            <select name="bodegadestino" id="bodegadestino" class="search" style="width: 150px; height: 38px;">
                                <?php while($crowpp = mysqli_fetch_assoc($result22)) {	
                                    if($destino ==$crowpp['numero']) {
                                        echo '<option selected value="'.$crowpp['numero'].'">'.$crowpp['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$crowpp['numero'].'">'.$crowpp['nombre'].'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                        <div>
                            <label style="display:block; font-size:12px; color:var(--muted); margin-bottom:5px;">PRODUCTO:</label>
                            <select name="producto_serie" id="producto_serie" class="search" style="width: 150px; height: 38px;">
                                <?php while($crowp = mysqli_fetch_assoc($result)) {	
                                    if($producto_serie ==$crowp['codigo']) {
                                        echo '<option selected value="'.$crowp['codigo'].'">'.$crowp['producto'].'</option>';
                                    } else {
                                        echo '<option value="'.$crowp['codigo'].'">'.$crowp['producto'].'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <input id="accion2" name="accion2" type="text" value="<?php echo $accion;?>" style="display:none;" />
                    <div style="margin-top: 15px;">
                        <button name="submit2" type="submit" id="submit2" class="primary">Asignar / Filtrar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- PANEL DE REGISTRO DE TAREAS / DETALLES -->
        <div class="panel" style="grid-column: span 12; margin-top: 20px;">
            <div class="panel-head">
                <h2>Detalle de Registro y Stock</h2>
            </div>
            <div class="grilla_listado">
                <form action="save_task.php" method="POST">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">DOCUMENTO Nro:</label>
                            <input name="documento" type="text" required id="documento" value="<?php echo $numero;?>" class="search" style="width:100%;">
                            <input name="accion" type="hidden" id="accion" value="<?php echo $accion;?>">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">PRODUCTO (Cód):</label>
                            <input name="producto" type="text" required id="producto" value="<?php echo $producto_serie;?>" class="search" style="width:100%;">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">STOCK:</label>
                            <input name="producto2" type="text" class="search" required id="producto2" style="width:100%;" value="<?php 
                                if ($_SESSION['personal'] != " ") {
                                    $bodegaorigen2 = "bodega".$_SESSION['personal'];$sqlst = "SELECT * from `".$bodegaorigen2."` WHERE `codigo` LIKE '$producto_serie' order by fechaing DESC";
                                    $resultst = mysqli_query($con,$sqlst);
                                    while($crowst = mysqli_fetch_assoc($resultst)) {
                                        echo $crowst['cantidad'];
                                    }
                                }
                            ?>">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">ORIGEN:</label>
                            <input name="personal" type="text" required id="personal" value="<?php echo $_SESSION['personal'];?>" class="search" style="width:100%;">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">DESTINO:</label>
                            <input name="bodegadestino" type="text" required id="bodegadestino" value="<?php echo $_SESSION['bodegadestino'];?>" class="search" style="width:100%;">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">CANTIDAD:</label>
                            <input name="title" type="text" required id="title" value="1" class="search" style="width:100%;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">SERIES:</label>
                            <select name="series" id="series" class="search" style="width:100%; height:38px;">
                                <option value="Sin_serie">Sin_serie</option>
                                <?php while($crow44 = mysqli_fetch_assoc($result44)) {	
                                    echo '<option value="'.$crow44['serie'].'">'.$crow44['serie'].'</option>';
                                } ?>
                            </select>
                        </div>
                        <div>
                            <label style="font-size: 12px; color: var(--muted);">DESCRIPCIÓN:</label>
                            <textarea name="description" required rows="2" class="search" style="width:100%; height:38px; resize:none;" placeholder="Task Description"></textarea>
                        </div>
                    </div>

                    <div style="margin-top: 15px;">
                        <button name="submit" type="submit" id="submit" class="primary"><i class="fas fa-save"></i> Guardar</button>
                    </div>
                </form>

                <form action="procesar_transferencia.php" method="POST" style="margin-top: 15px;">
                    <input name="accion" type="hidden" value="<?php echo $accion;?>">
                    <input type="submit" name="Procesar" class="boton-azul" value="Procesar Transferencia">
					<?php //echo $accion;?>
                </form>
            </div>
        </div>

        <!-- SOLICITUDES DE TRANSFERENCIAS PENDIENTES -->
        <div class="panel" style="grid-column: span 12; margin-top: 20px;">
            <div class="panel-head">
                <h2>SOLICITUDES DE TRANSFERENCIAS PENDIENTes</h2>
            </div>
            <div class="table-scroll">
                <?php
                $tabla = "sulicitudproducto";
                if (isset($_POST['codigo'])) {$codigo = $_POST['codigo'];$sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
                } elseif (isset($_POST['producto'])) {$producto = $_POST['producto'];$sql = "SELECT * from `".$tabla."` WHERE `producto` LIKE '%$producto%' order by fechaing DESC";
                } elseif (isset($_POST['serie'])) {$serie = $_POST['serie'];$sql = "SELECT * from `".$tabla."` WHERE `serie` LIKE '%$serie%' order by fechaing DESC";
                } else {
                    $autorizado = "si";
                    $sql = "SELECT * from `".$tabla."` WHERE `autorizado` LIKE '$autorizado' order by bodegadestino DESC";
                }
                $result = mysqli_query($con,$sql);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th style="text-align:center;">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($crow = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $crow['personal'];?></td>
                            <td style="text-align:center;"><?php echo $crow['bodegadestino'];?></td>
                            <td><?php echo $crow['producto'];?></td>
                            <td style="text-align:center;"><?php echo $crow['cantidad'];?></td>
                            <td style="text-align:center;"><?php echo $crow['created_at'];?></td>
                            <td style="text-align:center;">
                                <a href="../bodegas/procesarsolicitudtransferencia.php?codigo=<?php echo $crow['bodegadestino'];?>" class="primary" style="padding: 4px 10px; font-size: 11px; text-decoration:none;">PROCESAR</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- LISTADO GENERAL DE TRANSFERENCIAS -->
        <div class="panel" style="grid-column: span 12; margin-top: 20px;">
            <div class="panel-head">
                <h2>Transferencias Registradas</h2>
            </div>
            <div class="table-scroll">
                <?php 
                $sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
                $result3 = mysqli_query($con,$sql3);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Disponible</th>
                            <th>Serie</th>
                            <th>Descripción</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>B. Origen</th>
                            <th>B. Destino</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($crowt = mysqli_fetch_assoc($result3)) { ?>
                        <tr>
                            <td>
                                <form action="modificar_serie.php" method="post">
                                    <input name="id_modificar" type="hidden" value="<?php echo $crowt['id'];?>">
                                    <select name="serie_actualizar2" onchange="this.form.submit()" class="search" style="height:30px; font-size:11px;">
                                        <option value="Sin_serie">Sin_serie</option>
                                        <?php
                                        $productotr = $crowt['producto'];$asignadotr = "disponible";
                                        $sqlpro = "SELECT * from `series` WHERE (`bodega` LIKE '$seriebuscar') and (`producto` LIKE '$productotr') and (`asignado` LIKE '$asignadotr') order by fecha ASC";
                                        $resultpro = mysqli_query($con, $sqlpro);
                                        while($crowpro = mysqli_fetch_assoc($resultpro)) {
                                            echo '<option value="'.$crowpro['serie'].'">'.$crowpro['serie'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <form action="ingreso.php" method="post">
                                    <input name="registro2" type="hidden" value="<?php echo $crowt['id'];?>">
                                    <input name="serie_actualizar" type="text" class="search" value="<?php echo $crowt['serie'];?>" style="width:110px; height:30px;">
                                </form>
                            </td>
                            <td><?php echo $crowt['description']; ?></td>
                            <td><?php echo $crowt['producto']; ?></td>
                            <td><?php echo $crowt['cantidad']; ?></td>
                            <td><?php echo $crowt['personal']; ?></td>
                            <td><?php echo $crowt['bodegadestino']; ?></td>
                            <td>
                                <a href="delete_task.php?id=<?php echo $crowt['id']?> & accion=<?php echo$accion?>">
                                    <img src="../images/file-icons/64/004-folder-1.png" width="20" height="20" alt="Eliminar"/>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$verificacion="0";
$sqlcontrol = "SELECT * from productos";
$resultcontrol = mysqli_query($con,$sqlcontrol); 
while($crowcontrol = mysqli_fetch_assoc($resultcontrol)) {$verificacion = 1;
}
if ($verificacion == "0") {
    echo "<script>alert('No tiene Productos Configuradas -----> Inventario/Nuevo Producto');</script>";
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
