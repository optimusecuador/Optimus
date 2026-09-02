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
      <a href="index.php"><i data-lucide="settings"></i> Configuración</a>
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
// Lógica para actualizar los datos si se envía el formulario
$mensajeAlerta = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_configuracion'])) {
    $empresa = mysqli_real_escape_string($con, $_POST['empresa']);
    $telefono = mysqli_real_escape_string($con, $_POST['telefono']);
    $web = mysqli_real_escape_string($con, $_POST['web']);
    $ruc = mysqli_real_escape_string($con, $_POST['ruc']);
    $direccion = mysqli_real_escape_string($con, $_POST['direccion']);
    $iva = mysqli_real_escape_string($con, $_POST['iva']);
    $ice = mysqli_real_escape_string($con, $_POST['ice']);
    $representante = mysqli_real_escape_string($con, $_POST['representante']);
    $ip = mysqli_real_escape_string($con, $_POST['ip']);

    $update_sql = "UPDATE `configuracion` SET 
                    `empresa` = '$empresa', 
                    `telefono` = '$telefono', 
                    `web` = '$web', 
                    `ruc` = '$ruc', 
                    `direccion` = '$direccion', 
                    `iva` = '$iva', 
                    `ice` = '$ice', 
                    `representante` = '$representante', 
                    `ip` = '$ip' 
                    WHERE `unico` = 1"; // O el identificador correspondiente

    if (mysqli_query($con, $update_sql)) {
        $mensajeAlerta = "<script>alert('¡Los datos se cambiaron con éxito!'); window.location.href = window.location.href;</script>";
    } else {
        $mensajeAlerta = "<script>alert('Error al actualizar los datos: " . mysqli_error($con) . "');</script>";
    }
}

// Código original provisto para recuperar los campos de la tabla configuracion
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
$crowem = mysqli_fetch_assoc($resultem); // Tomamos el registro principal para rellenar el formulario

if ($crowem) {
    $_SESSION['empresamail'] = $crowem['empresa'];
    $empresa = $crowem['empresa'];
    $logo = $crowem['logo'];
    $colorfondo = $crowem['colorfondo'];
    $carpeta = $crowem['carpeta'];
    $tipoempresacontrol = $crowem['tipoempresa'];
    $ip = $crowem['ip'];
    $actualizacionanterior = $crowem['actualizacion'];
    $ivadecimal = (100 + $crowem['iva']) / 100;
}
echo $mensajeAlerta;
?>

    <style>
        /* Variables de color y tipografía */
        :root {
            --bg-main: #0b1120;
            --bg-card: #111827;
            --bg-input: #0b1120;
            --text-main: #ffffff;
            --text-muted: #94a3b8;
            --primary: #6d28d9;
            --primary-hover: #5b21b6;
            --border-color: rgba(255, 255, 255, 0.05);
            --success: #10b981;
            --danger: #ef4444;
        }

        * { box-sizing: border-box; }

        /* Encabezado Principal */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-title h1 { margin: 0; font-size: 24px; font-weight: 600; }
        .header-title p { margin: 4px 0 0; color: var(--text-muted); font-size: 14px; }

        .header-actions { display: flex; gap: 12px; align-items: center; }

        .search-bar {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            padding: 8px 16px;
            border-radius: 8px;
            color: var(--text-muted);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            width: 250px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid var(--border-color);
            background: var(--bg-card);
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-primary { background: var(--primary); border-color: var(--primary); }
        .btn-primary:hover { background: var(--primary-hover); }

        /* Navegación por Pestañas */
        .tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 10px;
            overflow-x: auto;
        }

        .tab {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            color: var(--text-muted);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .tab.active { background: var(--primary); color: white; }
        .tab:hover:not(.active) { background: rgba(255,255,255,0.05); color: white; }

        /* Layout Grid Principal */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .dashboard-grid.bottom {
            grid-template-columns: 1fr 1fr 1fr;
            margin-top: 20px;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 4px 0;
        }
        
        .card-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin: 0 0 20px 0;
        }

        /* Formularios y Inputs */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group label { font-size: 13px; color: var(--text-muted); }
        
        .input-field {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            color: var(--text-main);
            padding: 10px 12px;
            border-radius: 8px;
            font-size: 14px;
            width: 100%;
        }

        select.input-field { appearance: none; cursor: pointer; }

        /* Sección de Logo */
        .config-general-layout { display: flex; gap: 30px; }
        .config-forms { flex: 2; }
        .config-logo { flex: 1; display: flex; flex-direction: column; }
        .logo-preview {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }
        .logo-preview span { font-size: 24px; font-weight: bold; display: flex; align-items: center; gap: 10px;}
        .logo-preview span b { color: #3b82f6; font-size: 32px;}

        /* Estado del sistema (Lista y Barras) */
        .status-list { display: flex; flex-direction: column; gap: 14px; }
        .status-item { display: flex; justify-content: space-between; align-items: center; font-size: 13px; }
        .status-label { display: flex; align-items: center; gap: 8px; color: var(--text-muted); }
        .progress-bar-container { width: 60px; height: 4px; background: var(--bg-input); border-radius: 2px; overflow: hidden; margin-right: 10px;}
        .progress-bar { height: 100%; border-radius: 2px; }
        .progress-green { background: var(--success); width: 18%; }
        .progress-blue { background: #3b82f6; width: 42%; }
        .progress-teal { background: #14b8a6; width: 67%; }
        
        .flex-right { display: flex; align-items: center; }

        /* Módulos (Grid de Tarjetas pequeñas) */
        .modules-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
        
        .module-card {
            background: var(--bg-input);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .module-info { display: flex; align-items: center; gap: 12px; }
        .module-icon { width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px; }
        
        .ic-mikrotik { background: #1e3a8a; } .ic-truenas { background: #0c4a6e; } .ic-traccar { background: #064e3b; } .ic-jellyfin { background: #312e81; }
        .ic-inv { background: #14532d; } .ic-bod { background: #831843; } .ic-pers { background: #713f12; } .ic-prov { background: #14532d; }
        .ic-zk { background: #064e3b; } .ic-fact { background: #4c1d95; } .ic-tick { background: #312e81; } .ic-rep { background: #713f12; }

        .module-text h4 { margin: 0; font-size: 14px; font-weight: 500; }
        .module-text p { margin: 2px 0 0; font-size: 11px; color: var(--text-muted); }

        /* Switch (Interruptor) */
        .switch { position: relative; display: inline-block; width: 40px; height: 22px; flex-shrink: 0; }
        .switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #374151; transition: .3s; border-radius: 34px; }
        .slider:before { position: absolute; content: ""; height: 16px; width: 16px; left: 3px; bottom: 3px; background-color: white; transition: .3s; border-radius: 50%; }
        input:checked + .slider { background-color: var(--primary); }
        input:checked + .slider:before { transform: translateX(18px); }

        /* Listas Genéricas */
        .list-group { display: flex; flex-direction: column; gap: 16px; }
        .list-item { display: flex; justify-content: space-between; align-items: center; }
        .list-item-info { display: flex; align-items: center; gap: 12px; }
        .list-item-text h4 { margin: 0; font-size: 14px; font-weight: 500; }
        .list-item-text p { margin: 2px 0 0; font-size: 12px; color: var(--text-muted); }
        
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 500; background: rgba(16, 185, 129, 0.1); color: var(--success); }
        .badge.danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
        
        .inline-select { background: transparent; border: none; color: var(--text-muted); font-size: 13px; text-align: right; outline: none; appearance: none; cursor: pointer;}
    </style>

    <form method="POST" action="">
        <div class="panel-dark">
            <div class="header-title">
                <h1>Configuraciones</h1>
                <p>Personaliza y administra las preferencias del sistema, módulos y seguridad.</p>
            </div>
            <div class="header-actions">
                <div class="search-bar">🔍 Buscar configuración...</div>
                <button type="button" class="btn">⚡ Acciones rápidas</button>
                <button type="submit" name="actualizar_configuracion" class="btn btn-primary">✓ Guardar cambios</button>
            </div>
        </div>

        <div class="panel-dark">
            <a href="../configuracion/traccar.php" class="boton-azul">Rastreo</a>
            <a href="../configuracion/truenas.php" class="boton-azul">Truenas</a>
            <a href="../configuracion/mikrotik.php" class="boton-azul">Mikrotik</a>
            <a href="../configuracion/nodo/nodo_nuevo.php" class="boton-azul">Nodo</a>
            <a href="../respaldo/index.php" class="boton-azul">Respaldo Bd</a>
            <a href="../respaldo_mikrotik/index.php" class="boton-azul">Respaldo Mikrotik</a><a href="../respaldo_traccar/index.php" class="boton-azul">Respaldo Traccar</a>
            <a href="../respaldo_olt/index.php" class="boton-azul">Respaldo Olt</a>
        </div>

        <div class="dashboard-grid">
            
            <div class="card">
                <h2 class="card-title">Configuración general</h2>
                <p class="card-subtitle">Ajustes básicos de la plataforma recuperados desde la base de datos.</p>
                
                <div class="config-general-layout">
                    <div class="config-forms">
                        <div class="form-grid">
                            <div class="form-group">
                                <label>Nombre de la empresa</label>
                                <input type="text" name="empresa" class="input-field" value="<?php echo htmlspecialchars($crowem['empresa'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Zona horaria</label>
                                <select class="input-field"><option>(GMT-05:00) America/Guayaquil</option></select>
                            </div>
                            <div class="form-group">
                                <label>Correo de contacto (Web)</label>
                                <input type="text" name="web" class="input-field" value="<?php echo htmlspecialchars($crowem['web'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Formato de fecha</label>
                                <select class="input-field"><option>DD MMM YYYY</option></select>
                            </div>
                            <div class="form-group">
                                <label>Teléfono de contacto</label>
                                <input type="text" name="telefono" class="input-field" value="<?php echo htmlspecialchars($crowem['telefono'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Formato de hora</label>
                                <select class="input-field"><option>24 horas</option></select>
                            </div>
                            <div class="form-group">
                                <label>RUC</label>
                                <input type="text" name="ruc" class="input-field" value="<?php echo htmlspecialchars($crowem['ruc'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Dirección</label>
                                <input type="text" name="direccion" class="input-field" value="<?php echo htmlspecialchars($crowem['direccion'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>IVA (%)</label>
                                <input type="text" name="iva" class="input-field" value="<?php echo htmlspecialchars($crowem['iva'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>ICE</label>
                                <input type="text" name="ice" class="input-field" value="<?php echo htmlspecialchars($crowem['ice'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>Representante</label>
                                <input type="text" name="representante" class="input-field" value="<?php echo htmlspecialchars($crowem['representante'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>IP / Servidor</label>
                                <input type="text" name="ip" class="input-field" value="<?php echo htmlspecialchars($crowem['ip'] ?? ''); ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="config-logo">
                        <label style="font-size: 13px; color: var(--text-muted); margin-bottom: 6px;">Logo de la empresa</label>
                        <div class="logo-preview">
                            <span><img src="<?php echo htmlspecialchars($crowem['logo'] ?? ''); ?>" alt="Logo" style="max-height: 80px; max-width: 100%;"></span>
                        </div>
                        <div style="display: flex; gap: 8px;">
                            <button type="button" class="btn btn-primary" style="flex: 1; justify-content: center;">Cambiar logo</button>
                            <button type="button" class="btn">🗑️</button>
                        </div>
                        <p style="font-size: 11px; color: var(--text-muted); margin-top: 8px; text-align: center;">Formatos permitidos: PNG, JPG, SVG. Máx. 2MB.</p>
                    </div>
                </div>
                
                <div class="form-grid" style="margin-top: 16px; width: 65%;">
                    <div class="form-group">
                        <label>Moneda predeterminada</label>
                        <select class="input-field"><option>USD - Dólar estadounidense ($)</option></select>
                    </div>
                     <div class="form-group">
                        <label>Idioma</label>
                        <select class="input-field"><option>Español</option></select>
                    </div>
                    <div class="form-group">
                        <label>País</label>
                        <select class="input-field"><option>Ecuador</option></select>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="card-title">Estado del sistema</h2>
                <p class="card-subtitle">Información general de la aplicación.</p>
                
                <div class="status-list">
                    <div class="status-item"><span class="status-label">🟣 Versión actual</span> <span>v2.4.1</span></div>
                    <div class="status-item"><span class="status-label">🔵 Entorno</span> <span>Producción</span></div>
                    <div class="status-item"><span class="status-label">⏱️ Último reinicio</span> <span>25 May 2024, 08:15 AM</span></div>
                    <div class="status-item"><span class="status-label">🟢 Tiempo de actividad</span> <span>15 días, 4 horas</span></div>
                    <div class="status-item">
                        <span class="status-label">🟩 Uso de CPU</span>
                        <div class="flex-right"><div class="progress-bar-container"><div class="progress-bar progress-green"></div></div> 18%</div>
                    </div>
                    <div class="status-item">
                        <span class="status-label">🟨 Uso de memoria</span>
                        <div class="flex-right"><div class="progress-bar-container"><div class="progress-bar progress-blue"></div></div> 42%</div>
                    </div>
                    <div class="status-item">
                        <span class="status-label">🟥 Espacio en disco</span>
                        <div class="flex-right"><div class="progress-bar-container"><div class="progress-bar progress-teal"></div></div> 67%</div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="card-title">Módulos del sistema</h2>
                <p class="card-subtitle">Activa o desactiva los módulos disponibles.</p>
                
                <div class="modules-grid">
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-mikrotik">M</div>
                            <div class="module-text"><h4>MikroTik</h4><p>Gestión y auditoría</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-truenas">T</div>
                            <div class="module-text"><h4>TrueNAS</h4><p>Gestión y auditoría</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-traccar">Tr</div>
                            <div class="module-text"><h4>Traccar</h4><p>Gestión y auditoría</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-inv">I</div>
                            <div class="module-text"><h4>Inventario</h4><p>Gestión de inventario</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-bod">B</div>
                            <div class="module-text"><h4>Bodegas</h4><p>Gestión de bodegas</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-pers">P</div>
                            <div class="module-text"><h4>Personal</h4><p>Gestión de personal</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-zk">Z</div>
                            <div class="module-text"><h4>ZKTeco</h4><p>Auditoría de ZKTeco</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-fact">F</div>
                            <div class="module-text"><h4>Facturación</h4><p>Gestión de facturación</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="module-card">
                        <div class="module-info">
                            <div class="module-icon ic-tick">Ti</div>
                            <div class="module-text"><h4>Tickets</h4><p>Sistema de tickets</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 class="card-title">Configuración de notificaciones</h2>
                <p class="card-subtitle">Define cómo y cuándo recibir notificaciones.</p>
                
                <div class="list-group">
                    <div class="list-item">
                        <div class="list-item-info">
                            <div class="module-icon" style="background: #1e3a8a;">📧</div>
                            <div class="list-item-text"><h4>Notificaciones por correo</h4><p>Recibir notificaciones por email</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                    <div class="list-item">
                        <div class="list-item-info">
                            <div class="module-icon" style="background: #374151;">🔔</div>
                            <div class="list-item-text"><h4>Notificaciones en la app</h4><p>Mostrar alertas en el sistema</p></div>
                        </div>
                        <label class="switch"><input type="checkbox" checked><span class="slider"></span></label>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
