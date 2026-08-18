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
// Se asume que ya existe la conexión en la variable $con

$sql = "SELECT id FROM tipoproducto LIMIT 1";
$resultado = mysqli_query($con, $sql);

if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($con));
}

if (mysqli_num_rows($resultado) == 0) {
    echo "<script>
            alert('No existen tipos de productos registrados. Primero debe crear al menos un tipo de producto.');
            window.location.href='../productos/categorias.php';
          </script>";
    exit;
}
?>
		
		<?php 
$tabla = "productos";

$sql555 = "SELECT * from `tipoproducto` order by puesto DESC";				
$result555 = mysqli_query($con, $sql555);
if (isset($_GET['codigo'])) {
    $codigo=$_GET['codigo'];
    $sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
    $result = mysqli_query($con, $sql); 
    while($crow = mysqli_fetch_assoc($result)) {	
        $codigo = $crow['codigo'];
        $precio = $crow['preciouno'];
        $metraje = $crow['metraje'];
        $producto = $crow['producto'];
        $serie = $crow['serie'];
        $megasb = $crow['megass'];
        $megas = $crow['megass'];
        $accion="editar";
        $pct = $crow['pct'];
        $producto_unico = $crow['producto_unico'];
        $periodo = $crow['periodo'];
        $facturar = $crow['facturar'];
        $tipo = $crow['tipo'];
        $contabilidad = $crow['contabilidad'];
        $preciocompra = $crow['preciocompra'];
        $minimo = $crow['minimo'];
        $maximo = $crow['maximo'];
    }
} else {
    $accion="nuevo";
    $codigo ="";
    $producto = "";
    $serie = "0";
    $precio="0";
    $metraje="0";
    $megas="0";
    $pct = 0;
    $producto_unico = 0;
    $periodo = 0;
    $facturar = 0;
    $contabilidad = 0;
    $preciocompra = 0;
    $minimo = 0;
    $maximo = 0;
}
?>
<div class="clientes-header panel-dark">

        <div class="clientes-header-top">

            <div>

                <h2 class="clientes-title">
                    
                    Registro de Productos
                    
                </h2>

                <p class="clientes-subtitle">
                    Administración de datos de Productos
                </p>

            </div>

        </div>

    </div>
<div class="panel-dark">
    <form action="confirmacion_nuevo.php" method="post" name="form1" id="form1">
        <div class="clientes-form-grid">
            
            <div class="clientes-field">
                <label for="element_1">CÓDIGO ID :</label>
                <input id="element_1" name="element_1" class="clientes-input" type="text" maxlength="255" value="<?php echo $codigo;?>"/>
            </div>

            <div class="clientes-field">
                <label for="element_2">NOMBRE DEL PRODUCTO :</label>
                <input id="element_2" name="element_2" class="clientes-input" type="text" maxlength="255" value="<?php echo $producto;?>"/>
            </div>

            <div class="clientes-field">
                <label for="preciocompra">VALOR DE COMPRA (SIN IVA) :</label>
                <input id="preciocompra" name="preciocompra" class="clientes-input" type="text" maxlength="255" value="<?php echo $preciocompra;?>"/>
            </div>

            <div class="clientes-field">
                <label for="precio">VALOR COMPRA MENSUAL (SIN IVA) :</label>
                <input id="precio" name="precio" class="clientes-input" type="text" maxlength="255" value="<?php echo $precio;?>"/>
            </div>

            <div class="clientes-field">
                <label for="contabilidad">CONTABILIDAD :</label>
                <select name="contabilidad" id="contabilidad" class="clientes-input">
                    <option value="0" <?php if($contabilidad == "0") echo "selected"; ?>>Ninguno</option>
                    <option value="gastofijo" <?php if($contabilidad == "gastofijo") echo "selected"; ?>>Gasto Fijo</option>
                    <option value="gastovariable" <?php if($contabilidad == "gastovariable") echo "selected"; ?>>Gasto Variable</option>
                    <option value="gastoinesperados" <?php if($contabilidad == "gastoinesperados") echo "selected"; ?>>Gasto Inesperados</option>
                    <option value="activocirculante" <?php if($contabilidad == "activocirculante") echo "selected"; ?>>Activo Circulante</option>
                    <option value="activofijo" <?php if($contabilidad == "activofijo") echo "selected"; ?>>Activo Fijo</option>
                    <option value="activodiferido" <?php if($contabilidad == "activodiferido") echo "selected"; ?>>Activo Diferido</option>
                </select>
            </div>

            <div class="clientes-field">
                <label for="periodo">PERIODO DE FACTURACION :</label>
                <select name="periodo" id="periodo" class="clientes-input">
                    <option value="normal" <?php if($periodo == "normal" || $periodo == "0") echo "selected"; ?>>Normal</option>
                    <option value="mensual" <?php if($periodo == "mensual") echo "selected"; ?>>Mensual</option>
                </select>
            </div>

            <div class="clientes-field">
                <label for="serie">NUMERO DE SERIE :</label>
                <select name="serie" id="serie" class="clientes-input">
                    <option value="no" <?php if($serie == "no" || $serie == "0") echo "selected"; ?>>No</option>
                    <option value="si" <?php if($serie == "si") echo "selected"; ?>>Si</option>
                </select>
            </div>

            <div class="clientes-field">
                <label for="serie_unica">SERIE UNICA :</label>
                <select name="serie_unica" id="serie_unica" class="clientes-input">
                    <option value="no" <?php if($producto_unico == "no" || $producto_unico == "0") echo "selected"; ?>>No</option>
                    <option value="si" <?php if($producto_unico == "si") echo "selected"; ?>>Si</option>
                </select>
            </div>

            <div class="clientes-field">
                <label for="tipo">TIPO DE PRODUCTO :</label>
                <select name="tipo" id="tipo" class="clientes-input">
                    <?php 
                    while($crow555 = mysqli_fetch_assoc($result555)) {	
                        $selected = ($tipo == $crow555['codigo']) ? "selected" : "";
                        echo '<option '.$selected.' value="'.$crow555['codigo'].'">'.$crow555['puesto'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="clientes-field">
                <label for="minimo">STOCK MINIMO :</label>
                <input id="minimo" name="minimo" class="clientes-input" type="text" maxlength="255" value="<?php echo $minimo;?>"/>
            </div>

            <div class="clientes-field">
                <label for="maximo">STOCK MAXIMO :</label>
                <input id="maximo" name="maximo" class="clientes-input" type="text" maxlength="255" value="<?php echo $maximo;?>"/>
            </div>

            <div class="clientes-field"></div>

            <?php if($tipoempresacontrol == "isp") { ?>
                
                <div class="clientes-field">
                    <label for="megas">MEGAS :</label>
                    <input name="megas" type="text" required="required" class="clientes-input" id="megas" value="<?php echo $megas;?>" maxlength="255"/>
                </div>

                <div class="clientes-field">
                    <label for="pct">PLAN CONVENIO TOTAL :</label>
                    <select name="pct" id="pct" class="clientes-input">
                        <option value="no" <?php if($pct == "no" || $pct == "0") echo "selected"; ?>>No</option>
                        <option value="si" <?php if($pct == "si") echo "selected"; ?>>Si</option>
                    </select>
                </div>

                <div class="clientes-field"></div>

                <div class="clientes-field clientes-full" style="margin-top: 15px; border-bottom: 1px solid var(--line); padding-bottom: 5px;">
                    <label style="color: var(--cyan); font-size: 13px;">DATOS DE SERVICIO TECNICO</label>
                </div>

                <div class="clientes-field">
                    <label for="facturar">FACTURAR :</label>
                    <select name="facturar" id="facturar" class="clientes-input">
                        <option value="no" <?php if($facturar == "no" || $facturar == "0") echo "selected"; ?>>No</option>
                        <option value="si" <?php if($facturar == "si") echo "selected"; ?>>Si</option>
                    </select>
                </div>

                <div class="clientes-field">
                    <label for="metraje">METRAJE GRATIS :</label>
                    <input id="metraje" name="metraje" class="clientes-input" type="text" maxlength="255" value="<?php echo $metraje;?>"/>
                </div>

                <div class="clientes-field"></div>

            <?php } ?>

            <?php if($tipoempresacontrol == "produccioninstaladores") { ?>
                <input name="megas" type="hidden" id="megas" value="<?php echo $megas;?>">
                <input name="pct" type="hidden" id="pct" value="no">
                <input name="facturar" type="hidden" id="facturar" value="no">
                <input name="metraje" type="hidden" id="metraje" value="0">
            <?php } ?>

            <input id="accion" name="accion" type="hidden" value="<?php echo $accion;?>"/>
        </div>

        <div style="text-align: center; margin-top: 35px;">
            <button type="submit" id="submit" class="boton-azul" style="min-width: 240px; padding: 12px 30px;">
                Guardar Producto
            </button>
        </div>
    </form>
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
