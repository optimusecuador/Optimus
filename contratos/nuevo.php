<?php
/* =========================================
   BLOQUE AJAX (Debe ir en la Línea 1, antes del HTML)
========================================= */
if(isset($_GET['ac_buscar_cliente']) || isset($_GET['ac_idcliente']) || isset($_GET['ac_buscar_personal']) || isset($_GET['ac_idpersonal'])){
    require_once('../conectar.php');
    $conexion = isset($conexion) ? $conexion : (isset($con) ? $con : null);
    header("Content-Type: application/json; charset=UTF-8");
    
    // 1. Buscar Cliente
    if(isset($_GET['ac_buscar_cliente'])){
        $buscar = mysqli_real_escape_string($conexion, $_GET['ac_buscar_cliente']);
        $sql = mysqli_query($conexion,"SELECT id, nombres, apellidos FROM clientes WHERE nombres LIKE '%$buscar%' OR apellidos LIKE '%$buscar%' OR id LIKE '%$buscar%' LIMIT 10");
        $datos = array();
        while($row = mysqli_fetch_assoc($sql)){
            $datos[] = array("id"=>$row['id'], "texto"=>$row['id']." - ".$row['nombres']." ".$row['apellidos']);
        }
        echo json_encode($datos);
        exit;
    }

    // 2. Traer datos exactos Cliente
    if(isset($_GET['ac_idcliente'])){
        $idcliente = mysqli_real_escape_string($conexion, $_GET['ac_idcliente']);
        $sql = mysqli_query($conexion,"SELECT nombres, apellidos, mail, telefono1, telefono2, direccion FROM clientes WHERE id='$idcliente' LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        echo json_encode($row);
        exit;
    }

    // 3. Buscar Personal (Consultando la tabla personal y la columna codigo)
    if(isset($_GET['ac_buscar_personal'])){
        $buscar = mysqli_real_escape_string($conexion, $_GET['ac_buscar_personal']);
        $sql = mysqli_query($conexion,"SELECT codigo, nombres, apellidos FROM personal WHERE nombres LIKE '%$buscar%' OR apellidos LIKE '%$buscar%' OR codigo LIKE '%$buscar%' LIMIT 10");
        $datos = array();
        while($row = mysqli_fetch_assoc($sql)){
            $datos[] = array("id"=>$row['codigo'], "texto"=>$row['codigo']." - ".$row['nombres']." ".$row['apellidos']);
        }
        echo json_encode($datos);
        exit;
    }

    // 4. Traer datos exactos Personal (Usando codigo y tabla personal)
    if(isset($_GET['ac_idpersonal'])){
        $idpersonal = mysqli_real_escape_string($conexion, $_GET['ac_idpersonal']);
        $sql = mysqli_query($conexion,"SELECT nombres, apellidos, mail, telefono1, direccion FROM personal WHERE codigo='$idpersonal' LIMIT 1");
        $row = mysqli_fetch_assoc($sql);
        echo json_encode($row);
        exit;
    }
}
?>
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
if (!isset($conexion) && isset($con)) {
    $conexion = $con;
}

// Verificaciones previas
$sql_nodo = "SELECT id FROM nodo LIMIT 1";
$resultado_nodo = mysqli_query($conexion, $sql_nodo);
if ($resultado_nodo && mysqli_num_rows($resultado_nodo) == 0) {
    echo "<script>
            alert('No existen nodos registrados. Primero debe crear al menos un nodo.');
            window.location.href='../configuracion/nodo_nuevo.php';
          </script>";
    exit;
}

$sql_pers = "SELECT codigo FROM personal LIMIT 1";
$resultado_pers = mysqli_query($conexion, $sql_pers);
if ($resultado_pers && mysqli_num_rows($resultado_pers) == 0) {
    echo "<script>
            alert('No existe personal registrado. Primero debe registrar al menos un empleado.');
            window.location.href='../personal/nuevo.php';
          </script>";
    exit;
}

$sql_prod = "SELECT id FROM productos WHERE periodo = 'mensual' LIMIT 1";
$resultado_prod = mysqli_query($conexion, $sql_prod);
if ($resultado_prod && mysqli_num_rows($resultado_prod) == 0) {
    echo "<script>
            alert('No existe ningún producto con período Mensual.');
            window.location.href='../productos/nuevo.php';
          </script>";
    exit;
}
?>

<style>
.ac_cto_box {
    position:absolute;
    top:100%;
    left:0;
    width:100%;
    background:#071d31;
    border:1px solid rgba(255,255,255,.08);
    border-radius:14px;
    overflow:visible !important;
    z-index:999999 !important;
    margin-top:8px;
    box-shadow:0 12px 30px rgba(0,0,0,.5);
}

.ac_cto_item {
    padding:14px 18px;
    cursor:pointer;
    color:#ffffff;
    border-bottom:1px solid rgba(255,255,255,.04);
    transition:.2s;
}

.ac_cto_item:hover {
    background:linear-gradient(90deg,#6017e8,#7522ff);
}

.ac_cto_wrapper {
    position:relative;
    width:280px;
}

.panel-dark, .clientes-header-top, .grilla_listado {
    overflow: visible !important;
}
</style>

<div class="grilla_listado">

    <!-- HEADER PRINCIPAL -->
    <div class="panel-dark">
        <div class="clientes-header-top">
            <div>
                <h2 class="clientes-title">NUEVO CONTRATO</h2>
                <div class="clientes-subtitle">Sistema inteligente de registro y activación de contratos</div>
            </div>
            
            <div class="clientes-inline">
                <!-- BUSCADOR CLIENTE -->
                <div class="ac_cto_wrapper">
                    <input name="busqueda" type="text" class="clientes-input" id="ac_cto_input_buscar_cli" placeholder="Buscar cliente..." autocomplete="off">
                    <div id="ac_cto_resultados_cli" class="ac_cto_box" style="display:none;"></div>
                </div>
                <input type="button" value="Buscar" id="ac_cto_btn_buscar_cli" class="boton-azul">
            </div>
        </div>
    </div>

    <form id="ac_cto_form_contrato" action="confirmacion_nuevo.php" method="post" enctype="multipart/form-data">

        <!-- CLIENTE HIDDENS -->
        <input type="hidden" name="idcliente" id="ac_cto_idcliente_hidden">
        <input type="hidden" name="idpersonal" id="ac_cto_idpersonal_hidden">

        <!-- CLIENTE -->
        <div class="panel-dark">
            <h3 class="clientes-form-title">👤 DATOS DEL CLIENTE</h3>
            <div class="clientes-form-grid">
                <div class="clientes-field">
                    <label>Nombre Cliente</label>
                    <input type="text" name="cliente" id="ac_cto_cliente" class="clientes-input" placeholder="Nombre completo">
                </div>
                <div class="clientes-field">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" id="ac_cto_telefono" class="clientes-input" placeholder="0999999999">
                </div>
                <div class="clientes-field">
                    <label>Correo Electrónico</label>
                    <input type="text" name="mail" id="ac_cto_mail" class="clientes-input" placeholder="cliente@email.com">
                </div>
                <div class="clientes-field">
                    <label>Dirección</label>
                    <input type="text" name="direccion" id="ac_cto_direccion" class="clientes-input" placeholder="Dirección exacta">
                </div>
            </div>
        </div>

        <!-- PERSONAL -->
        <div class="panel-dark">
            <h3 class="clientes-form-title">👨‍💼 DATOS DEL PERSONAL</h3>
            
            <div class="clientes-inline">
                <div class="ac_cto_wrapper">
                    <input name="busquedapersonal" type="text" class="clientes-input" id="ac_cto_input_buscar_per" placeholder="Buscar personal..." autocomplete="off">
                    <div id="ac_cto_resultados_per" class="ac_cto_box" style="display:none;"></div>
                </div>
                <input type="button" value="Buscar" id="ac_cto_btn_buscar_per" class="boton-azul">
            </div>
            <br>
            
            <div class="clientes-form-grid">
                <div class="clientes-field">
                    <label>Nombre Personal</label>
                    <input type="text" name="personal" id="ac_cto_personal" class="clientes-input" placeholder="Nombre completo">
                </div>
                <div class="clientes-field">
                    <label>Teléfono Personal</label>
                    <input type="text" name="telefono_personal" id="ac_cto_telefono_personal" class="clientes-input" placeholder="0999999999">
                </div>
                <div class="clientes-field">
                    <label>Correo Personal</label>
                    <input type="text" name="mail_personal" id="ac_cto_mail_personal" class="clientes-input" placeholder="personal@email.com">
                </div>
                <div class="clientes-field">
                    <label>Dirección Personal</label>
                    <input type="text" name="direccion_personal" id="ac_cto_direccion_personal" class="clientes-input" placeholder="Dirección exacta">
                </div>
            </div>
        </div>

        <!-- PLAN -->
        <div class="panel-dark">
            <h3 class="clientes-form-title">📡 DATOS DEL PLAN</h3>
            <div class="clientes-form-grid">
                <div class="clientes-field">
                    <label>Plan Internet</label>
                    <select name="producto" class="clientes-input">
                        <?php
                        $sql_productos = mysqli_query($conexion,"SELECT id, producto, megass FROM productos WHERE periodo='mensual' ORDER BY producto ASC");
                        while($row_producto = mysqli_fetch_assoc($sql_productos)){
                        ?>
                        <option value="<?php echo $row_producto['id']; ?>">
                            <?php echo $row_producto['producto']; ?> - <?php echo $row_producto['megass']; ?> MB
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clientes-field">
                    <label>Día de Corte</label>
                    <input type="text" name="corte" value="10" class="clientes-input">
                </div>
                <div class="clientes-field">
                    <label>Contrato Tercera Edad</label>
                    <select name="terceraedad" class="clientes-input">
                        <option value="no">NO</option>
                        <option value="si">SI</option>
                    </select>
                </div>
                <div class="clientes-field">
                    <label>Instalación</label>
                    <select name="instalacion" class="clientes-input">
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- UBICACION -->
        <div class="panel-dark">
            <h3 class="clientes-form-title">📍 UBICACIÓN DEL CONTRATO</h3>
            <div class="clientes-form-grid">
                <div class="clientes-field">
                    <label>Nodo</label>
                    <select name="nodo" class="clientes-input">
                        <?php
                        $sql_nodos = mysqli_query($conexion,"SELECT codigo, puesto, provincia, canton, parroquia FROM nodo ORDER BY puesto ASC");
                        while($row_nodo = mysqli_fetch_assoc($sql_nodos)){
                        ?>
                        <option value="<?php echo $row_nodo['codigo']; ?>">
                            <?php echo $row_nodo['puesto']; ?> - <?php echo $row_nodo['provincia']; ?> / <?php echo $row_nodo['canton']; ?> / <?php echo $row_nodo['parroquia']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="clientes-field">
                    <label>Longitud</label>
                    <input type="text" name="longitud" class="clientes-input" placeholder="-79.00000">
                </div>
                <div class="clientes-field">
                    <label>Latitud</label>
                    <input type="text" name="latitud" class="clientes-input" placeholder="-2.00000">
                </div>
                <div class="clientes-field">
                    <label>Ubicación Absoluta</label>
                    <input name="absoluta" type="text" required="required" class="clientes-input" placeholder="Referencia exacta">
                </div>
            </div>
        </div>

        <!-- DOCUMENTOS -->
        <div class="panel-dark">
            <h3 class="clientes-form-title">📄 DOCUMENTOS DEL CLIENTE</h3>
            <div style="display:flex; justify-content:center; gap:25px; flex-wrap:wrap; margin-top:20px;">
                <!-- FOTO 1 -->
                <label class="cliente-profile" style="cursor:pointer; width:220px; padding:20px;">
                    <img src="../images/frontal.png" class="imgRedonda" width="110" height="110" alt="" id="ac_cto_preview_ced1">
                    <div class="cliente-name" style="font-size:16px; margin-top:15px;">CEDULA FRONTAL</div>
                    <div style="margin-top:15px;"><span class="badge badge-premium">📤 SUBIR FOTO</span></div>
                    <input type="file" name="cedula1" id="ac_cto_cedula1" accept="image/*" style="display:none;">
                </label>

                <!-- FOTO 2 -->
                <label class="cliente-profile" style="cursor:pointer; width:220px; padding:20px;">
                    <img src="../images/posterior.png" class="imgRedonda" width="110" height="110" alt="" id="ac_cto_preview_ced2">
                    <div class="cliente-name" style="font-size:16px; margin-top:15px;">CEDULA POSTERIOR</div>
                    <div style="margin-top:15px;"><span class="badge badge-premium">📤 SUBIR FOTO</span></div>
                    <input type="file" name="cedula2" id="ac_cto_cedula2" accept="image/*" style="display:none;">
                </label>

                <!-- FOTO 3 -->
                <label class="cliente-profile" style="cursor:pointer; width:220px; padding:20px;">
                    <img src="../images/planilla.png" class="imgRedonda" width="110" height="110" alt="" id="ac_cto_preview_plan">
                    <div class="cliente-name" style="font-size:16px; margin-top:15px;">PLANILLA DE LUZ</div>
                    <div style="margin-top:15px;"><span class="badge badge-premium">📤 SUBIR FOTO</span></div>
                    <input type="file" name="planilla" id="ac_cto_planilla" accept="image/*" capture="environment" style="display:none;">
                </label>
            </div>
        </div>

        <!-- BOTONES -->
        <div style="display:flex; justify-content:center; gap:20px; flex-wrap:wrap; margin-top:30px;">
            <input type="submit" value="🚀 CREAR CONTRATO" class="boton-azul" style="font-size:20px; padding:16px 40px;">
            <input type="reset" value="🧹 LIMPIAR FORMULARIO" class="btn-action btn-general" style="font-size:18px; padding:16px 40px; border:none;">
        </div>
    </form>
</div>

<script>
(function() {
    'use strict';

    /* =========================================
       LOGICA CLIENTE
    ========================================= */
    const buscadorCli = document.getElementById("ac_cto_input_buscar_cli");
    const resultadosCli = document.getElementById("ac_cto_resultados_cli");
    const botonBuscarCli = document.getElementById("ac_cto_btn_buscar_cli");
    let clienteSel = "";

    if (buscadorCli) {
        buscadorCli.addEventListener("input", function(){
            let texto = this.value.trim();
            if(texto.length < 1){
                resultadosCli.style.display = "none";
                resultadosCli.innerHTML = "";
                return;
            }

            let urlBusqueda = window.location.pathname + "?ac_buscar_cliente=" + encodeURIComponent(texto);

            fetch(urlBusqueda)
            .then(res => res.json())
            .then(data => {
                resultadosCli.innerHTML = "";
                if(data && data.length > 0){
                    resultadosCli.style.display = "block";
                    data.forEach(cliente => {
                        let item = document.createElement("div");
                        item.classList.add("ac_cto_item");
                        item.innerHTML = cliente.texto;

                        item.addEventListener("mousedown", function(e){ e.preventDefault(); });
                        item.addEventListener("click", function(){
                            buscadorCli.value = cliente.texto;
                            clienteSel = cliente.id;
                            document.getElementById("ac_cto_idcliente_hidden").value = cliente.id;
                            resultadosCli.style.display = "none";
                        });
                        resultadosCli.appendChild(item);
                    });
                } else {
                    resultadosCli.style.display = "block";
                    resultadosCli.innerHTML = '<div class="ac_cto_item">No se encontraron resultados</div>';
                }
            })
            .catch(err => console.log("Error autocompletado cliente:", err));
        });
    }

    if (botonBuscarCli) {
        botonBuscarCli.addEventListener("click", function(){
            if(clienteSel === ""){
                alert("Seleccione un cliente del autocompletado");
                return;
            }

            let urlIdCliente = window.location.pathname + "?ac_idcliente=" + encodeURIComponent(clienteSel);

            fetch(urlIdCliente)
            .then(res => res.json())
            .then(data => {
                if(data){
                    document.getElementById("ac_cto_cliente").value = (data.nombres || "") + " " + (data.apellidos || "");
                    document.getElementById("ac_cto_telefono").value = data.telefono1 || "";
                    document.getElementById("ac_cto_mail").value = data.mail || "";
                    document.getElementById("ac_cto_direccion").value = data.direccion || "";
                }
            })
            .catch(err => console.log("Error detalle cliente:", err));
        });
    }

    /* =========================================
       LOGICA PERSONAL (Corregida para consultar la tabla personal)
    ========================================= */
    const buscadorPer = document.getElementById("ac_cto_input_buscar_per");
    const resultadosPer = document.getElementById("ac_cto_resultados_per");
    const botonBuscarPer = document.getElementById("ac_cto_btn_buscar_per");
    let personalSel = "";

    if (buscadorPer) {
        buscadorPer.addEventListener("input", function(){
            let texto = this.value.trim();
            if(texto.length < 1){
                resultadosPer.style.display = "none";
                resultadosPer.innerHTML = "";
                return;
            }

            let urlBusquedaPer = window.location.pathname + "?ac_buscar_personal=" + encodeURIComponent(texto);

            fetch(urlBusquedaPer)
            .then(res => res.json())
            .then(data => {
                resultadosPer.innerHTML = "";
                if(data && data.length > 0){
                    resultadosPer.style.display = "block";
                    data.forEach(personal => {
                        let item = document.createElement("div");
                        item.classList.add("ac_cto_item");
                        item.innerHTML = personal.texto;

                        item.addEventListener("mousedown", function(e){ e.preventDefault(); });
                        item.addEventListener("click", function(){
                            buscadorPer.value = personal.texto;
                            personalSel = personal.id;
                            document.getElementById("ac_cto_idpersonal_hidden").value = personal.id;
                            resultadosPer.style.display = "none";
                        });
                        resultadosPer.appendChild(item);
                    });
                } else {
                    resultadosPer.style.display = "block";
                    resultadosPer.innerHTML = '<div class="ac_cto_item">No se encontraron resultados</div>';
                }
            })
            .catch(err => console.log("Error autocompletado personal:", err));
        });
    }

    if (botonBuscarPer) {
        botonBuscarPer.addEventListener("click", function(){
            if(personalSel === ""){
                alert("Seleccione un personal");
                return;
            }

            let urlIdPersonal = window.location.pathname + "?ac_idpersonal=" + encodeURIComponent(personalSel);

            fetch(urlIdPersonal)
            .then(res => res.json())
            .then(data => {
                if(data){
                    document.getElementById("ac_cto_personal").value = (data.nombres || "") + " " + (data.apellidos || "");
                    document.getElementById("ac_cto_telefono_personal").value = data.telefono1 || "";
                    document.getElementById("ac_cto_mail_personal").value = data.mail || "";
                    document.getElementById("ac_cto_direccion_personal").value = data.direccion || "";
                }
            })
            .catch(err => console.log("Error detalle personal:", err));
        });
    }

    /* =========================================
       PREVISUALIZAR IMAGENES LOCAL
    ========================================= */
    function renderPreview(inputFile, imgPreviewElement) {
        const archivo = inputFile.files[0];
        if(archivo){
            const lector = new FileReader();
            lector.onload = function(e){
                imgPreviewElement.src = e.target.result;
            };
            lector.readAsDataURL(archivo);
        }
    }

    const inputCed1 = document.getElementById("ac_cto_cedula1");
    if (inputCed1) {
        inputCed1.addEventListener("change", function(){
            renderPreview(this, document.getElementById("ac_cto_preview_ced1"));
        });
    }

    const inputCed2 = document.getElementById("ac_cto_cedula2");
    if (inputCed2) {
        inputCed2.addEventListener("change", function(){
            renderPreview(this, document.getElementById("ac_cto_preview_ced2"));
        });
    }

    const inputPlanilla = document.getElementById("ac_cto_planilla");
    const previewPlanilla = document.getElementById("ac_cto_preview_plan");
    if (inputPlanilla) {
        inputPlanilla.addEventListener("change", function(){
            renderPreview(this, previewPlanilla);
        });
    }
    if (previewPlanilla) {
        previewPlanilla.addEventListener("click", function(){
            inputPlanilla.click();
        });
    }

    /* =========================================
       CERRAR AUTOCOMPLETADOS AL CLICKEAR FUERA
    ========================================= */
    document.addEventListener("click", function(e){
        if(!e.target.closest(".ac_cto_wrapper")){
            if(resultadosCli) resultadosCli.style.display = "none";
            if(resultadosPer) resultadosPer.style.display = "none";
        }
    });

    /* =========================================
       ENVIAR FORMULARIO
    ========================================= */
    const formContrato = document.getElementById("ac_cto_form_contrato");
    if (formContrato) {
        formContrato.addEventListener("submit", function(){
            document.getElementById("ac_cto_idcliente_hidden").value = clienteSel;
            document.getElementById("ac_cto_idpersonal_hidden").value = personalSel;
        });
    }

})(); 
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