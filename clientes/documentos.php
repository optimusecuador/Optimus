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
      <!-- InstanceBeginEditable name="principal" -->
		<?php

// ==========================================
// RECUPERAR VARIABLE GET
// ==========================================

$codigo = $_GET['codigo'];

// ==========================================
// CONSULTA CLIENTE
// ==========================================

$sql = "SELECT * FROM clientes WHERE id='$codigo'";

$query = mysqli_query($conexion,$sql);

// ==========================================
// VALIDAR CLIENTE
// ==========================================

if(mysqli_num_rows($query)>0){

    while($row = mysqli_fetch_assoc($query)){

        $id         = $row['id'];
        $nombres    = $row['nombres'];
        $direccion  = $row['direccion'];
        $telefono1  = $row['telefono1'];
        $telefono2  = $row['telefono2'];
        $mail       = $row['mail'];
        $fecha      = $row['fecha'];
    }

}else{

    echo "
    <div class='panel-dark'>
        <span class='estado estado-cortado'>
            No existe el cliente
        </span>
    </div>
    ";

}
// ==========================================
// SUMA DE PENDIENTES
// ==========================================
// Supongamos que $codigo y $conexion ya están definidos previamente en tu script
// $codigo = "0102917689"; 

// 1. Preparamos la consulta SQL
// Usamos SUM(total) para obtener la suma directamente desde la base de datos
$sql_suma = "SELECT SUM(total) as total_pendiente 
             FROM ventas 
             WHERE cliente = '$codigo' 
             AND estado = 'pendiente'";

$query_suma = mysqli_query($conexion, $sql_suma);

// 2. Obtenemos el resultado
if ($query_suma) {
    $row_suma = mysqli_fetch_assoc($query_suma);
    
    // Si no hay registros, el valor será null, por lo que usamos 0
    $valor_total = $row_suma['total_pendiente'] ?? 0;
    
    // 3. Imprimimos el valor formateado
    //echo "El valor total de las facturas pendientes es: $ " . number_format($valor_total, 2);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
$totalfactura=number_format($valor_total, 2);
// ==========================================
// INICIALES AVATAR
// ==========================================

$palabras = explode(" ", trim($nombres));

$inicial1 = strtoupper(substr($palabras[0],0,1));

$inicial2 = "";

if(isset($palabras[1])){

    $inicial2 = strtoupper(substr($palabras[1],0,1));
}

$iniciales = $inicial1.$inicial2;

?>

<div class="cliente-wrapper">

    <!-- ==========================================
         TOP
    ========================================== -->

    <div class="cliente-top">

        <!-- ==========================================
             PERFIL CLIENTE
        ========================================== -->

        <div class="cliente-profile">

            <div class="cliente-avatar">
                <?php echo $iniciales; ?>
            </div>

            <div class="cliente-name">
                <?php echo $nombres ?>
            </div>

            <div class="cliente-id">
                Cédula: <?php echo $id ?>
            </div>

            <div class="cliente-badges">

                <div class="badge badge-activo">
                    Cliente Activo
                </div>

                <div class="badge badge-premium">
                    Fibra Óptica
                </div>

            </div>
            <br>
			 <div class="cliente-name">
                Saldo:<?php echo $valor_total; ?>
            </div>

        </div>

        <!-- ==========================================
             INFORMACION GENERAL
        ========================================== -->

        <div class="cliente-info-panel">

            <div class="cliente-info-header">

                <div>

                    <div class="cliente-info-title">
                        Información General
                    </div>

                </div>

                <div class="cliente-actions">

                    <!-- EDITAR CLIENTE -->

                    <form 
                        action="../clientes/nuevo.php"
                        method="POST"
                        style="display:inline;"
                    >

                        <input 
                            type="hidden"
                            name="id"
                            value="<?php echo $id; ?>"
                        >

                        <button 
                            type="submit"
                            class="btn-action btn-edit"
                        >

                            <img 
                                src="../images/sistema/10.png"
                                width="64"
                                height="38"
                                alt=""
                            >
                            <br>

                            Editar Cliente

                        </button>

                    </form>

                   
                    <!-- WHATSAPP -->

                  <?php
// Tu enlace de la imagen
$url_imagen = "http://bit.ly/4vCTD83";

// Construimos el mensaje
$mensaje = "Estimado cliente $nombres, Usted mantiene valores pendientes con Global Net.\n\nPor favor, verifique nuestras cuentas oficiales aquí:\n" . $url_imagen;
$mensaje_url = urlencode($mensaje);
$wa_url = "https://wa.me/593" . ltrim($telefono1, '0') . "?text=" . $mensaje_url;

// Lógica de validación: si el total es mayor a 0, el botón funciona
$es_activo = ($totalfactura > 0);

// Estilos condicionales
$estilo_enlace = $es_activo ? "text-decoration: none; color: inherit; display: inline-block; text-align: center;" : "text-decoration: none; color: gray; display: inline-block; text-align: center; pointer-events: none; cursor: not-allowed; opacity: 0.5;";
$href = $es_activo ? $wa_url : "#";
?>

<a href="<?php echo $href; ?>" target="_blank" class="btn-action btn-proforma" style="<?php echo $estilo_enlace; ?>">
    <img src="../images/sistema/10.png" width="64" height="38" alt="WhatsApp" style="<?php echo !$es_activo ? 'filter: grayscale(100%);' : ''; ?>">
    <br>
    Enviar por Whatsapp
</a>
			 <!-- TELEGRAM -->		
					
					<?php
// Tu enlace de la imagen
$url_imagen = "http://bit.ly/4vCTD83";

// Construimos la URL de Telegram
// Usamos el mismo mensaje para consistencia
$mensaje_telegram = "Estimado cliente $nombres, Usted mantiene valores pendientes con Global Net. Verifique nuestras cuentas oficiales:";
$telegram_url = "https://t.me/share/url?url=" . urlencode($url_imagen) . "&text=" . urlencode($mensaje_telegram);

// Lógica de validación: si el total es mayor a 0, el botón funciona
$es_activo = ($totalfactura > 0);

// Estilos condicionales: si no está activo, añadimos opacidad y deshabilitamos el puntero
$estilo_enlace = $es_activo 
    ? "text-decoration: none; color: inherit; display: inline-block; text-align: center;" 
    : "text-decoration: none; color: gray; display: inline-block; text-align: center; pointer-events: none; cursor: not-allowed; opacity: 0.5;";

$href = $es_activo ? $telegram_url : "#";
?>

<a href="<?php echo $href; ?>" target="_blank" class="btn-action btn-proforma" style="<?php echo $estilo_enlace; ?>">
    <img src="../images/sistema/10.png" width="64" height="38" alt="Telegram" style="<?php echo !$es_activo ? 'filter: grayscale(100%);' : ''; ?>">
    <br>
    Enviar por Telegram
</a>
					
                    <!-- INFORMACION GENERAL -->

                    <form 
                        action="../clientes/informacion.php?codigo=<?php echo $codigo;?>"
                        method="post"
                        name="form2"
                        id="form4"
                    >

                        <input 
                            name="producto"
                            type="hidden"
                            id="producto"
                            value="<?php echo $producto;?>"
                        >

                        <button class="btn-action btn-general">

                            <img 
                                src="../images/sistema/23.png"
                                width="64"
                                height="38"
                                alt=""
                            >
                            <br>

                            Información General

                        </button>

                    </form>

                </div>

            </div>

            <!-- ==========================================
                 GRID INFORMACION
            ========================================== -->

            <div class="cliente-grid">

                <div class="info-card">

                    <div class="info-label">
                        Teléfono Principal
                    </div>

                    <div class="info-value">
                        <?php echo $telefono1 ?>
                    </div>

                </div>

                <div class="info-card">

                    <div class="info-label">
                        Teléfono Secundario
                    </div>

                    <div class="info-value">
                        <?php echo $telefono2 ?>
                    </div>

                </div>

                <div class="info-card">

                    <div class="info-label">
                        Correo Electrónico
                    </div>

                    <div class="info-value">
                        <?php echo $mail ?>
                    </div>

                </div>

                <div class="info-card">

                    <div class="info-label">
                        Dirección
                    </div>

                    <div class="info-value">
                        <?php echo $direccion ?>
                    </div>

                </div>

                <div class="info-card">

                    <div class="info-label">
                        Ciudad
                    </div>

                    <div class="info-value">
                        Cuenca - Ecuador
                    </div>

                </div>

                <div class="info-card">

                    <div class="info-label">
                        Fecha Registro
                    </div>

                    <div class="info-value">
                        <?php echo $fecha ?>
                    </div>

                </div>

            </div>

        </div>

    </div>

 
    <!-- ==========================================
         FACTURAS
    ========================================== -->

    <div class="cliente-table-panel">

    <div class="cliente-table-title">
        Facturas del Cliente
    </div>

    <div style="overflow:auto;">

<?php
// ==========================================
// FACTURAS / VENTAS
// ==========================================
$sql_ventas = "SELECT * FROM ventas WHERE cliente='$id' ORDER BY fecha DESC";
$query_ventas = mysqli_query($conexion, $sql_ventas);
?>

        <table class="table-dark">
            <thead>
                <tr>
                    <th>Acción</th>
                    <th># Factura</th>
                    <th>Fecha</th>
                    <th>Contrato</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Fecha Vencimiento</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
<?php
while($row_venta = mysqli_fetch_assoc($query_ventas)){

    $id_venta   = $row_venta['id']; // ID del registro para la redirección
    $numero     = $row_venta['numero'];
    $fecha      = $row_venta['fecha'];
    $producto   = $row_venta['producto'];
    $total      = $row_venta['total'];
    $estado     = $row_venta['estado'];
    $contrato   = $row_venta['contrato'];

    // ==========================================
    // PRODUCTO
    // ==========================================
    $sql_producto = "SELECT * FROM productos WHERE id='$producto'";
    $query_producto = mysqli_query($conexion, $sql_producto);
    $row_producto = mysqli_fetch_assoc($query_producto);

    $nombre_producto = $row_producto['producto'] ?? 'N/A';
    $megasb          = $row_producto['megasb'] ?? '0';
    $descripcion     = $nombre_producto." - ".$megasb." Mbps";

    // ==========================================
    // FECHA VENCIMIENTO
    // ==========================================
    $fecha_limpia = str_replace(["(",")"], " ", $fecha);
    $fecha_vencimiento = date("Y-m-d", strtotime($fecha_limpia . "+10 days"));

    // ==========================================
    // ESTADO VISUAL
    // ==========================================
    $clase_estado = "estado-activo";
    $texto_estado = $estado;

    if($estado == "PAGADO")   { $clase_estado = "estado-pagado";   $texto_estado = "Pagado"; }
    if($estado == "VENCIDO")  { $clase_estado = "estado-vencido";  $texto_estado = "Vencida"; }
    if($estado == "PENDIENTE"){ $clase_estado = "estado-activo";   $texto_estado = "Pendiente"; }
?>
                    <tr>
                        <td>
                            <a href="../ventas/detalle.php?codigo=<?php echo $id_venta;?>&cliente=<?php echo $id; ?>&contrato=<?php echo $contrato; ?>&url_image=../images/sin_documento.png&documento=<?php echo $estado;?>" 
                               class="btn btn-sm btn-info" 
                               style="padding: 5px 10px; text-decoration: none; background-color: #17a2b8; color: white; border-radius: 4px; font-size: 12px;">
                               Detalle
                            </a>
                        </td>
                        <td><?php echo $numero; ?></td>
                        <td><?php echo $fecha; ?></td>
                        <td><?php echo $contrato; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td>$ <?php echo number_format($total, 2); ?></td>
                        <td><?php echo $fecha_vencimiento; ?></td>
                        <td>
                            <span class="estado <?php echo $clase_estado; ?>">
                                <?php echo $texto_estado; ?>
                            </span>
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
