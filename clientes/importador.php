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
      <!-- InstanceBeginEditable name="principal" --><div class="panel-dark">

    <div class="clientes-header-top">
        <div>
            <h2 class="clientes-title">IMPORTAR CLIENTES</h2>
            <p class="clientes-subtitle">
                Importa clientes desde un archivo CSV y valida duplicados y cédulas automáticamente.
            </p>
        </div>
    </div>

<?php

// =======================
// VALIDAR CÉDULA
// =======================
function validarCedula($cedula) {

    if (strlen($cedula) != 10) return false;

    $provincia = substr($cedula, 0, 2);

    if ($provincia < 1 || $provincia > 24) return false;

    $coef = [2,1,2,1,2,1,2,1,2];

    $suma = 0;

    for ($i = 0; $i < 9; $i++) {

        $valor = $cedula[$i] * $coef[$i];

        if ($valor >= 10) $valor -= 9;

        $suma += $valor;
    }

    $verificador = (10 - ($suma % 10)) % 10;

    return $verificador == $cedula[9];
}

?>

<div class="clientes-form-panel">

    <div style="margin-bottom:25px;text-align:center;">

        <a href="plantilla_clientes.csv">
            <button type="button" class="btn-action btn-edit">
                Descargar plantilla CSV
            </button>
        </a>

    </div>

    <form method="post" enctype="multipart/form-data">

        <div class="clientes-form-grid">

            <div class="clientes-field clientes-full">

                <label>Seleccionar Archivo CSV</label>

                <input 
                    type="file" 
                    name="archivo" 
                    accept=".csv" 
                    required
                    class="clientes-input"
                >

            </div>

        </div>

        <br>

        <button name="preview" class="btn-action btn-edit">
            Generar Vista Previa
        </button>

    </form>

</div>

<?php

// =======================
// PREVIEW
// =======================
if (isset($_POST['preview'])) {

    $file = $_FILES['archivo']['tmp_name'];

    if (!$file) {

        echo "
        <div class='cliente-table-panel'>
            <div class='estado estado-cortado'>
                Seleccione un archivo
            </div>
        </div>";

    } else {

        echo "
        <div class='cliente-table-panel'>

            <h2 class='cliente-table-title'>
                VISTA PREVIA
            </h2>

            <div class='table-scroll'>

            <table class='table-dark'>

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Cedula</th>
                        <th>Validación</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>
        ";

        $handle = fopen($file, "r");

        fgetcsv($handle);

        $validos = 0;
        $invalidos = 0;

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $id        = $data[0] ?? '';
            $codigo    = $data[1] ?? '';
            $nombres   = $data[2] ?? '';
            $apellidos = $data[3] ?? '';
            $cedula    = $data[8] ?? '';

            $cedulaValida = validarCedula($cedula);

            $stmt = $con->prepare("SELECT codigo FROM clientes WHERE codigo=?");

            $stmt->bind_param("s", $codigo);

            $stmt->execute();

            $result = $stmt->get_result();

            $duplicado = $result->num_rows > 0;

            $estado = "Válido";
            $claseEstado = "estado-activo";

            if (!$cedulaValida) {

                $estado = "Cédula inválida";
                $claseEstado = "estado-cortado";
            }

            if ($duplicado) {

                $estado = "Duplicado";
                $claseEstado = "estado-cortado";
            }

            if ($estado === "Válido") {
                $validos++;
            } else {
                $invalidos++;
            }

            echo "

            <tr>

                <td>$id</td>

                <td>$codigo</td>

                <td>$nombres</td>

                <td>$apellidos</td>

                <td>$cedula</td>

                <td>";

                    if ($cedulaValida) {

                        echo "<span class='estado estado-activo'>✅ Válida</span>";

                    } else {

                        echo "<span class='estado estado-cortado'>❌ Inválida</span>";
                    }

            echo "</td>

                <td>
                    <span class='estado $claseEstado'>
                        $estado
                    </span>
                </td>

            </tr>
            ";
        }

        fclose($handle);

        if (!is_dir("../temp")) {

            mkdir("../temp");
        }

        move_uploaded_file($_FILES['archivo']['tmp_name'], "../temp/temp.csv");

        echo "
                </tbody>

            </table>

            </div>

        </div>
        ";

        echo "

        <div class='isp-cards'>

            <div class='isp-card isp-green'>

                <div class='isp-card-title'>
                    Clientes Válidos
                </div>

                <div class='isp-card-value'>
                    $validos
                </div>

                <div class='isp-card-footer'>
                    Registros listos para importar
                </div>

            </div>

            <div class='isp-card isp-orange'>

                <div class='isp-card-title'>
                    Clientes Inválidos
                </div>

                <div class='isp-card-value'>
                    $invalidos
                </div>

                <div class='isp-card-footer'>
                    Registros con errores
                </div>

            </div>

        </div>
        ";

        echo "<div style='margin-top:20px;'>";

        if ($invalidos > 0) {

            echo "
            <button style='background:transparent;border:none;cursor:pointer;'>

               <img src='../images/sistema/no_se_puede_importar.png'>

            </button>
            ";

        } else {

            echo "

            <form method='post'>

                <button name='importar' class='btn-action btn-edit'>
                    Confirmar Importacion
                </button>

            </form>

            ";
        }

        echo "</div>";
    }
}

?>

<?php

// =======================
// IMPORTAR
// =======================
if (isset($_POST['importar'])) {

    $archivo = "../temp/temp.csv";

    $handle = fopen($archivo, "r");

    $conn = $con;

    $conn->begin_transaction();

    fgetcsv($handle);

    $errores = [];

    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        $id         = $conn->real_escape_string($data[0]);
        $codigo     = $conn->real_escape_string($data[1]);
        $nombres    = $conn->real_escape_string($data[2]);
        $apellidos  = $conn->real_escape_string($data[3]);
        $direccion  = $conn->real_escape_string($data[4] ?? '');
        $telefono1  = $conn->real_escape_string($data[5] ?? '');
        $telefono2  = $conn->real_escape_string($data[6] ?? '');
        $mail       = $conn->real_escape_string($data[7] ?? '');
        $cedula     = $conn->real_escape_string($data[8] ?? '');

        if (!validarCedula($cedula)) {

            $errores[] = "Cédula inválida: $cedula";

            continue;
        }

        $stmt = $conn->prepare("SELECT codigo FROM clientes WHERE codigo=?");

        $stmt->bind_param("s", $codigo);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $errores[] = "Duplicado: $codigo";

            continue;
        }

        $sqlClientes = "

        INSERT INTO clientes
        (
            id,
            codigo,
            nombres,
            apellidos,
            direccion,
            telefono1,
            telefono2,
            mail
        )

        VALUES
        (
            '$id',
            '$codigo',
            '$nombres',
            '$apellidos',
            '$direccion',
            '$telefono1',
            '$telefono2',
            '$mail'
        )

        ";

        if ($conn->query($sqlClientes)) {

            $nombreCompleto = $nombres . " " . $apellidos;

            $conn->query("
                INSERT INTO migrar (codigo, nombre)
                VALUES ('$codigo','$nombreCompleto')
            ");

        } else {

            $errores[] = "Error cliente: $codigo";
        }
    }

    fclose($handle);

    if (count($errores) > 0) {

        $conn->rollback();

        file_put_contents("../temp/errores.txt", implode("\n", $errores));

        echo "

        <div class='cliente-table-panel'>

            <div class='estado estado-cortado' style='margin-bottom:20px;'>
                Se encontraron errores durante la importación
            </div>

            <a href='../temp/errores.txt' download>
                <button class='btn-action btn-edit'>
                    Descargar errores
                </button>
            </a>

        </div>

        ";

    } else {

        $conn->commit();

?>

<script>

let respuesta = confirm("✅ Importacion Exitosa\n\n¿Desea crear los contratos para los Clientes Importados?");

if(respuesta){

    window.location.href="migrar_contrato.php";

}else{

    window.location.href="../menu_principal/clientes.php";
}

</script>

<?php

    }
}

?>

</div><!-- InstanceEndEditable --></main>
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
