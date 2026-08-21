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
/* ==========================================
   TITAN DATALIST CLIENTES (EMBEBIDO)
========================================== */

/* ---------- RECUPERAR IP POST ---------- */

$ip = isset($_POST['ip']) ? $_POST['ip'] : "";

/* ---------- VALIDAR SI EXISTEN CONTRATOS ---------- */

$mostrar_tabla2=false;

$sqlValidar = "
    SELECT id
    FROM contratos
    WHERE (estado = 'activo' OR estado = 'Sin_Asignar')
    AND ip = '0'
    LIMIT 1
";

$resValidar=mysqli_query($con,$sqlValidar);

if(mysqli_num_rows($resValidar)>0)
{
    $mostrar_tabla2=true;
}

/* =============================
   ASIGNAR CONTRATO
============================= */

if(isset($_POST['asignar_contrato']))
{
    $ip2=mysqli_real_escape_string($con,$_POST['ip2']);

    $contrato=mysqli_real_escape_string(
        $con,
        $_POST['codigo_cliente2']
    );

    $sqlUpdate = "
    UPDATE contratos
    SET ip = '$ip2',
        estado = 'activo'
    WHERE numero = '$contrato'
    LIMIT 1
";
    mysqli_query($con,$sqlUpdate);

    echo "
    <script>

        alert('Contrato asignado satisfactoriamente');

        window.location.href='../resumen/index.php';

    </script>
    ";
}

/* =============================
   BUSQUEDA AJAX TABLA CLIENTES
============================= */

if(isset($_GET['buscar']))
{
    $buscar=mysqli_real_escape_string($con,$_GET['buscar']);

    $sql="
        SELECT 
            CONCAT(nombres,' ',apellidos) AS cliente,
            codigo
        FROM clientes
        WHERE nombres LIKE '%$buscar%'
           OR apellidos LIKE '%$buscar%'
        ORDER BY nombres ASC
        LIMIT 10
    ";

    $res=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        echo "<option value='".$row['cliente']." | ".$row['codigo']."'>";
    }

    exit;
}

/* =============================
   BUSQUEDA AJAX TABLA CONTRATOS
============================= */

if(isset($_GET['buscar2']))
{
    $buscar=mysqli_real_escape_string($con,$_GET['buscar2']);

    $sql = "
    SELECT 
        nombres,
        cliente,
        producto,
        numero
    FROM contratos
    WHERE (
        nombres LIKE '%$buscar%'
        OR cliente LIKE '%$buscar%'
        OR producto LIKE '%$buscar%'
        OR numero LIKE '%$buscar%'
    )
    AND estado IN ('activo', 'Sin_Asignar')
    AND ip = '0'
    ORDER BY nombres ASC
    LIMIT 10
";

    $res=mysqli_query($con,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        echo "<option value='"
            .$row['nombres']
            ." | "
            .$row['cliente']
            ." | "
            .$row['producto']
            ." | "
            .$row['numero']
            ."'>";
    }

    exit;
}
?>

<br>

<!-- =========================================
     PANEL CLIENTES
========================================= -->

<div class="cliente-table-panel">

    <div class="cliente-info-header">

        <div>

            <div class="cliente-info-title">
                CREAR NUEVO CONTRATO
            </div>

            <div class="cliente-id">
                Buscar cliente para crear contrato
            </div>

        </div>

        <div class="estado estado-activo">
            CLIENTES
        </div>

    </div>

    <br>

    <form method="POST">

        <div class="cliente-grid">

            <!-- IP -->

            <div class="info-card">

                <div class="info-label">
                    IP MIKROTIK
                </div>

                <div class="info-value">

                    <input
                    name="ip"
                    type="text"
                    class="clientes-input-small"
                    placeholder="IP"
                    style="width:100%;"
                    value="<?php echo htmlspecialchars($ip); ?>">

                </div>

            </div>

            <!-- CLIENTE -->

            <div class="info-card">

                <div class="info-label">
                    CLIENTE
                </div>

                <div class="info-value">

                    <input
                    name="cliente"
                    type="text"
                    class="clientes-input-small"
                    id="cliente"
                    placeholder="Buscar cliente..."
                    style="width:100%;"
                    list="listaClientes"
                    autocomplete="off"
                    onchange="capturarCodigo()"
                    onkeyup="buscarCliente()">

                    <datalist id="listaClientes"></datalist>

                    <input type="hidden" id="codigo_cliente">

                </div>

            </div>

            <!-- BOTON -->

            <div class="info-card">

                <div class="info-label">
                    ACCION
                </div>

                <div class="info-value">

                    <button 
                        class="btn-action btn-contrato"
                        type="button"
                        onclick="irNuevoContrato()"
                    >

                        <img 
                            src="../images/sistema/6.png"
                            width="64"
                            height="38"
                            alt=""
                        >

                        <br>

                        Nuevo Contrato

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<?php if($mostrar_tabla2){ ?>

<br>

<!-- =========================================
     PANEL CONTRATOS
========================================= -->

<div class="cliente-table-panel">

    <div class="cliente-info-header">

        <div>

            <div class="cliente-info-title">
                ASIGNAR CONTRATO ACTIVO
            </div>

            <div class="cliente-id">
                Asociar IP Mikrotik a contrato existente
            </div>

        </div>

        <div class="estado estado-premium">
            CONTRATOS
        </div>

    </div>

    <br>

    <form method="POST">

        <div class="cliente-grid">

            <!-- IP -->

            <div class="info-card">

                <div class="info-label">
                    IP MIKROTIK
                </div>

                <div class="info-value">

                    <input
                    name="ip2"
                    type="text"
                    class="clientes-input-small"
                    id="ip2"
                    placeholder="IP"
                    style="width:100%;"
                    value="<?php echo htmlspecialchars($ip); ?>">

                </div>

            </div>

            <!-- CONTRATO -->

            <div class="info-card">

                <div class="info-label">
                    CONTRATO
                </div>

                <div class="info-value">

                    <input
                    name="cliente2"
                    type="text"
                    class="clientes-input-small"
                    id="cliente2"
                    placeholder="Buscar contrato activo..."
                    style="width:100%;"
                    list="listaClientes2"
                    autocomplete="off"
                    onchange="capturarCodigo2()"
                    onkeyup="buscarCliente2()">

                    <datalist id="listaClientes2"></datalist>

                    <input 
                        type="hidden"
                        id="codigo_cliente2"
                        name="codigo_cliente2"
                    >

                </div>

            </div>

            <!-- BOTON -->

            <div class="info-card">

                <div class="info-label">
                    ACCION
                </div>

                <div class="info-value">

                    <button 
                        class="btn-action btn-edit"
                        type="submit"
                        name="asignar_contrato"
                    >

                        <img 
                            src="../images/sistema/10.png"
                            width="64"
                            height="38"
                            alt=""
                        >

                        <br>

                        Asignar Contrato

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

<?php } ?>

<script>

/* =============================
   TABLA 1 (CLIENTES)
============================= */

function buscarCliente()
{
    let texto=document.getElementById("cliente").value;

    let xhr=new XMLHttpRequest();

    xhr.open(
        "GET",
        "<?=basename(__FILE__)?>?buscar="+encodeURIComponent(texto),
        true
    );

    xhr.onreadystatechange=function()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            document.getElementById("listaClientes").innerHTML=xhr.responseText;
        }
    };

    xhr.send();
}

function capturarCodigo()
{
    let valor=document.getElementById("cliente").value;

    if(valor.includes("|"))
    {
        let partes=valor.split("|");

        document.getElementById("codigo_cliente").value=partes[1].trim();
    }
}

function irNuevoContrato()
{
    let codigo=document.getElementById("codigo_cliente").value;

    if(codigo=="")
    {
        alert("Seleccione un cliente primero");

        return;
    }

    window.location.href=
    "../contratos/nuevo.php?nombres="
    +encodeURIComponent(codigo)
    +"&id=nuevo";
}

/* =============================
   TABLA 2 (CONTRATOS)
============================= */

function buscarCliente2()
{
    let texto=document.getElementById("cliente2").value;

    let xhr=new XMLHttpRequest();

    xhr.open(
        "GET",
        "<?=basename(__FILE__)?>?buscar2="+encodeURIComponent(texto),
        true
    );

    xhr.onreadystatechange=function()
    {
        if(xhr.readyState==4 && xhr.status==200)
        {
            if(document.getElementById("listaClientes2"))
            {
                document.getElementById("listaClientes2").innerHTML=xhr.responseText;
            }
        }
    };

    xhr.send();
}

function capturarCodigo2()
{
    let campo=document.getElementById("cliente2");

    if(!campo)
    {
        return;
    }

    let valor=campo.value;

    if(valor.includes("|"))
    {
        let partes=valor.split("|");

        document.getElementById("codigo_cliente2").value=partes[3].trim();
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
