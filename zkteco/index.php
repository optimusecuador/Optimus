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
      <a href="index.php"><i data-lucide="fingerprint"></i> ZKTeco</a>
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
// =========================================
// CONFIGURACIÓN
// =========================================
$biotime_ip   = "10.8.0.11";
$biotime_port = "80";
$biotime_user = "nelo416";
$biotime_pass = "Optimus2023";

$base_url = "http://".$biotime_ip.":".$biotime_port;

// =========================================
// AUTENTICACIÓN
// =========================================
$auth_url = $base_url."/api-token-auth/";

$auth_payload = json_encode([
    "username" => $biotime_user,
    "password" => $biotime_pass
]);

$ch = curl_init($auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $auth_payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$auth_response = curl_exec($ch);
$auth_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($auth_http_code !== 200) {
    die("<div class='estado-cortado' style='padding:15px;border-radius:10px;margin:20px;font-weight:bold;'>❌ Error de Autenticación. Código HTTP: $auth_http_code</div>");
}

$auth_data = json_decode($auth_response, true);
$biotime_token = $auth_data['token'] ?? null;

if (!$biotime_token) {
    die("<div class='estado-cortado' style='padding:15px;border-radius:10px;margin:20px;font-weight:bold;'>❌ No se pudo obtener el Token.</div>");
}

// =========================================
// CREAR EMPLEADO
// =========================================
$mensaje_api = "";

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['action'])
    && $_POST['action'] === 'crear_empleado'
) {

    $new_emp_code   = trim($_POST['emp_code'] ?? '');
    $new_first_name = trim($_POST['first_name'] ?? '');
    $new_last_name  = trim($_POST['last_name'] ?? '');
    $new_identity   = trim($_POST['identity_card'] ?? '');
    $new_dept_id    = trim($_POST['department'] ?? '');
    $new_area_id    = trim($_POST['area'] ?? '');

    $create_payload = json_encode([
        "emp_code"      => $new_emp_code,
        "first_name"    => $new_first_name,
        "last_name"     => $new_last_name,
        "identity_card" => $new_identity,
        "department"    => (int)$new_dept_id,
        "area"          => [(int)$new_area_id]
    ]);

    $create_url = $base_url."/personnel/api/employees/";

    $ch = curl_init($create_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $create_payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Token '.$biotime_token
    ]);

    $create_response = curl_exec($ch);
    $create_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($create_http_code == 200 || $create_http_code == 201) {

        $mensaje_api = "
        <div class='estado-activo'
             style='padding:16px;border-radius:12px;margin-bottom:20px;font-size:15px;'>
             ✅ ¡Personal con código <strong>{$new_emp_code}</strong>
             creado exitosamente en BioTime!
        </div>";

    } else {

        $error_data = json_decode($create_response, true);
        $detalles_error = "";

        if (is_array($error_data)) {
            foreach ($error_data as $campo => $errores) {

                $detalles_error .= "<br>• <strong>"
                    . htmlspecialchars($campo)
                    . ":</strong> "
                    . htmlspecialchars(
                        is_array($errores)
                            ? implode(', ', $errores)
                            : $errores
                    );
            }
        } else {
            $detalles_error = htmlspecialchars($create_response);
        }

        $mensaje_api = "
        <div class='estado-cortado'
             style='padding:16px;border-radius:12px;margin-bottom:20px;font-size:15px;'>
             ❌ Error al crear personal
             (Código HTTP: {$create_http_code})
             {$detalles_error}
        </div>";
    }
}

// =========================================
// DEPARTAMENTOS
// =========================================
$dept_url = $base_url."/personnel/api/departments/?page_size=1000";

$ch = curl_init($dept_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token '.$biotime_token
]);

$dept_response = curl_exec($ch);
curl_close($ch);

$dept_data = json_decode($dept_response, true);

$departamentos =
    $dept_data['results']
    ?? $dept_data['data']['results']
    ?? $dept_data['data']
    ?? [];

// =========================================
// ÁREAS
// =========================================
$area_url = $base_url."/personnel/api/areas/?page_size=1000";

$ch = curl_init($area_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token '.$biotime_token
]);

$area_response = curl_exec($ch);
curl_close($ch);

$area_data = json_decode($area_response, true);

$areas =
    $area_data['results']
    ?? $area_data['data']['results']
    ?? $area_data['data']
    ?? [];

// =========================================
// EMPLEADOS
// =========================================
$employee_url = $base_url."/personnel/api/employees/?page_size=1000";

$ch = curl_init($employee_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token '.$biotime_token
]);

$employee_response = curl_exec($ch);
$employee_http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($employee_http_code !== 200) {
    die("<div class='estado-cortado' style='padding:15px;border-radius:10px;margin:20px;font-weight:bold;'>❌ Error al obtener empleados. Código HTTP: $employee_http_code</div>");
}

$employee_data = json_decode($employee_response, true);

$empleados = [];

if (isset($employee_data['results'])) {
    $empleados = $employee_data['results'];

} elseif (isset($employee_data['data']['results'])) {
    $empleados = $employee_data['data']['results'];

} elseif (isset($employee_data['data'])) {

    if (
        isset($employee_data['data']['emp_code'])
        || isset($employee_data['data']['pin'])
    ) {
        $empleados = [$employee_data['data']];
    } else {
        $empleados = $employee_data['data'];
    }

} elseif (is_array($employee_data)) {
    $empleados = $employee_data;
}
?>

<div class="cliente-wrapper">

    <?= $mensaje_api ?>

    <div class="clientes-header-top">
        <div>
            <h2 class="clientes-title">
                Personal Encontrado (<?= count($empleados) ?> registro/s)
            </h2>

            
        </div>

        <button onclick="abrirModalBurbuja()"
                class="btn-action btn-contrato">
            ➕ Personal Nuevo
        </button>
    </div>

<?php if (empty($empleados)): ?>

    <p style="color:#9eb4ca;font-size:14px;">
        No se encontraron empleados en el sistema.
    </p>

<?php else: ?>

    <div class="cliente-table-panel">

        <table class="table-dark">

            <thead>
                <tr>
                    <th>Código Empleado</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Departamento</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($empleados as $emp): ?>

                <?php
                if (!is_array($emp)) {
                    continue;
                }

                $codigo_actual =
                    (string)($emp['emp_code']
                    ?? $emp['pin']
                    ?? '');
                ?>

                <tr>

                    <td>
                        <strong><?= htmlspecialchars($codigo_actual) ?></strong>
                    </td>

                    <td>
                        <?= htmlspecialchars($emp['first_name'] ?? $emp['name'] ?? 'N/A') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($emp['last_name'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($emp['identity_card'] ?? 'N/A') ?>
                    </td>

                    <td>

                    <?php
                    if (isset($emp['department'])) {

                        if (is_array($emp['department'])) {

                            echo htmlspecialchars(
                                $emp['department']['department_name']
                                ?? $emp['department']['name']
                                ?? 'Asignado'
                            );

                        } else {

                            echo htmlspecialchars($emp['department']);
                        }

                    } else {

                        echo 'Sin asignar';
                    }
                    ?>

                    </td>

                    <td>

                    <?php if ($codigo_actual != ''): ?>

                        <a href="marcajes.php?emp_code=<?= urlencode($codigo_actual) ?>"
                        
                           class="btn-action btn-edit"
                           style="text-decoration:none;display:inline-block;">
                            Ver Marcajes
                        </a>

                    <?php else: ?>

                        <span style="color:#8ca5bd;font-size:12px;">
                            Sin Código
                        </span>

                    <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

<?php endif; ?>

</div>

<!-- MODAL -->

<div id="burbujaNuevoPersonal"
     style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,.7);backdrop-filter:blur(4px);">

    <div style="display:flex;justify-content:center;align-items:center;min-height:100vh;padding:20px;">

        <div class="panel-dark"
             style="width:100%;max-width:600px;position:relative;">

            <span onclick="cerrarModalBurbuja()"
                  style="position:absolute;top:20px;right:25px;font-size:26px;font-weight:bold;color:#8ca5bd;cursor:pointer;">
                &times;
            </span>

            <h3 class="clientes-form-title">
                Registrar Nuevo Personal
            </h3>

            <form method="POST">

                <input type="hidden"
                       name="action"
                       value="crear_empleado">

                <div class="clientes-form-grid">

                    <div class="clientes-field clientes-full">
                        <label>Código Empleado *</label>
                        <input type="text"
                               name="emp_code"
                               required
                               class="clientes-input">
                    </div>

                    <div class="clientes-field">
                        <label>Primer Nombre *</label>
                        <input type="text"
                               name="first_name"
                               required
                               class="clientes-input">
                    </div>

                    <div class="clientes-field">
                        <label>Apellido</label>
                        <input type="text"
                               name="last_name"
                               class="clientes-input">
                    </div>

                    <div class="clientes-field clientes-full">
                        <label>Cédula</label>
                        <input type="text"
                               name="identity_card"
                               class="clientes-input">
                    </div>

                    <div class="clientes-field">
                        <label>Departamento *</label>

                        <select name="department"
                                required
                                class="clientes-input">

                            <option value="">
                                -- Seleccione --
                            </option>

                            <?php foreach ($departamentos as $dept): ?>

                                <option value="<?= $dept['id'] ?? '' ?>">
                                    <?= htmlspecialchars($dept['department_name'] ?? $dept['name'] ?? '') ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="clientes-field">

                        <label>Área *</label>

                        <select name="area"
                                required
                                class="clientes-input">

                            <option value="">
                                -- Seleccione --
                            </option>

                            <?php foreach ($areas as $ar): ?>

                                <option value="<?= $ar['id'] ?? '' ?>">
                                    <?= htmlspecialchars($ar['area_name'] ?? $ar['name'] ?? '') ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div style="display:flex;gap:15px;justify-content:flex-end;margin-top:20px;">

                    <button type="button"
                            onclick="cerrarModalBurbuja()"
                            class="btn-action">
                        Cancelar
                    </button>

                    <button type="submit"
                            class="btn-action btn-contrato">
                        Guardar en BioTime
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
function abrirModalBurbuja(){
    document.getElementById('burbujaNuevoPersonal').style.display='block';
}

function cerrarModalBurbuja(){
    document.getElementById('burbujaNuevoPersonal').style.display='none';
}

window.onclick = function(event){
    let modal = document.getElementById('burbujaNuevoPersonal');

    if(event.target == modal){
        modal.style.display = 'none';
    }
}
</script><!-- InstanceEndEditable --></main>
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
