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
<?php  
$control="0";
$controlservicio="0";
$color ="";
$total = 0;
$totalsub = 0;
$vencido = 0;
$codigoproveedor = 0;
$controlanterior = 0;
$codigoisp = 0;
//$documentoarray[0] = 0;
if (isset($_GET['contrato'])) {
    			$codigo=$_GET['contrato'];
    			$codigocontrato=$_GET['contrato'];
			$sql = "SELECT * from `contratos` WHERE `numero` LIKE '$codigo'";
			$result = mysqli_query($con, $sql);  
			while($crow = mysqli_fetch_assoc($result))
            			{	
						
						$codigo = $crow['cliente'];
						$codigob = $crow['cliente'];
						$nodo = $crow['nodo'];
						$producto = $crow['nombres'];
						$producto_contrato = $crow['producto']; // Campo producto de la tabla contratos
						$estado = $crow['estado'];
						$direccion = $crow['direccion'];
						$telefono = $crow['telefono'];
						$mail = $crow['mail'];
						$ip = $crow['ip'];
						
						$accion="editar";
						$direccion = $crow['direccion'];
						}
						$sql2 = "SELECT * from `ventas` WHERE `contrato` LIKE '$codigocontrato' order by numero DESC";
						$result2 = mysqli_query($con, $sql2);
		}
		else
		{
    			$mail ="";
			$codigo ="";
			$producto ="";
			$producto_contrato ="";
			$apellidos ="";
			$direccion ="";
			$telefono ="";
			$telefono2 ="";
			$accion='nuevo';
			$url_image='sin_imagen';
			
		}

?>
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

        $id        = $row['id'];
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
                        action="../crearfactura/generar.php?codigo=<?php echo $codigocontrato; ?>"
                        method="POST"
                        style="display:inline;"
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

                            Generar docoumento

                        </button>

                    </form>

                    <!-- NUEVO CONTRATO -->

                  <form 
                        action="../serviciotecnico/listadoontactivacion.php?codigo=<?php echo $codigocontrato; ?>"
                        method="POST"
                        style="display:inline;"
                    >

                        <button 
                            class="btn-action btn-contrato"
                            type="submit"
                        >

                            <img 
                                src="../images/sistema/6.png"
                                width="64"
                                height="38"
                                alt=""
                            >
                            <br>

                            Activar Ont

                        </button>

                    </form>

                    <!-- MODIFICAR CONTRATO -->

                  <form 
                        action="../contratos/editar.php?codigo=<?php echo $codigocontrato; ?>"
                        method="POST"
                        style="display:inline;"
                    >

                        <button 
                            class="btn-action btn-contrato"
                            type="submit"
                        >

                            <img 
                                src="../images/sistema/10.png"
                                width="64"
                                height="38"
                                alt=""
                            >
                            <br>

                            Modificar Contrato

                    </button>

                    </form>

                    <!-- INFORMACION GENERAL -->

                  <form 
                        action="../contratos/suspender.php?codigo=<?php echo $codigocontrato; ?>"
                        method="POST"
                        name="form2"
                        id="form4"
                    >

                        <button class="btn-action btn-general">

                            <img 
                                src="../images/sistema/23.png"
                                width="64"
                                height="38"
                                alt=""
                            >
                            <br>

                            Suspender Contrtrato

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
	
									
	<br>
      <div class="cliente-table-panel">

    <div class="cliente-table-title">
        CONTRATO: <?php echo $codigocontrato?>
    </div>
		  <div class="cliente-table-title">
        PRODUCTO: <?php echo strtoupper($producto_contrato); ?>
    </div>
<div class="cliente-table-title">
        ESTADO: <?php echo strtoupper($estado)?> - IP: <?php echo strtoupper($ip)?>
    </div>
    <table class="table-dark">

        <tbody>

            <tr>

                <th align="center">
                    CODIGO
                </th>

                <th align="center">
                    CLIENTE
                </th>

                <th align="center">
                    TELEFONO
                </th>

            </tr>

            <tr>

                <td align="center">

                    <?php  
                    
                    echo $codigoproveedor = $codigo;

                    $codigoisp = $codigo;
                    
                    ?>

                </td>

                <td align="center">

                    <?php echo $clientebuscar = $producto;?>

                </td>

                <td align="center">

                    <?php echo $telefono;?>

                </td>

            </tr>

            <tr>

                <th align="center">
                    MAIL
                </th>

                <th align="center">
                    DIRECCION
                </th>

                <th align="center">
                    NODO
                </th>

            </tr>

            <tr>

                <td align="center">

                    <?php  
                    
                    echo $mail;

                    $mensaje ="Estimado cliente usted mantiene una pendiente con la empresa OPTIMUS";
                    
                    ?>

                </td>

                <td align="center">

                    <?php echo $direccion;?>

                </td>

                <td align="center">

                    <?php echo $nodo;?>

                </td>

            </tr>

        </tbody>

    </table>

</div>
                <?php if($estado == "activo") 
				{
				?>
                <?php }
				if($estado == "suspendido") 
				{
				?>
				<table width="100%" align="center">
                    <tbody>
                      <tr>
                        <td align="center">
							<form action="../contratos/reactivar.php?codigo=<?php echo $codigocontrato; ?>" method="post">
							<input name="submit2" type="submit" class="boton-azul" id="submit2" value="REACTIVAR">
							</form>
							
					    </td>
                        
                      </tr>
                    <tbody>
      </table>
				<?php }
				?>
             	<?php
             	$procesado = "si";
				$sqlcontratos = "SELECT * from `contratos` WHERE (`cliente` LIKE '$codigo') AND (`procesados` LIKE '$procesado')order by fecha DESC";
             	$resultcontratos = mysqli_query($con, $sqlcontratos);	  
				?>
             	<div class="cliente-table-panel">

    <div class="cliente-info-header">

        <div class="cliente-info-title">
            Documentos del Contrato
        </div>

        <div>

            <span class="estado estado-vencido">
                Valor vencido:
                $<?php echo number_format($vencido,2); ?>
            </span>

        </div>

    </div>

    <div style="overflow-x:auto;">

        <table class="table-dark">

            <thead>

                <tr align="center">
                  <th>Acción</th>

                    <th>CONT</th>
                    <th>DOCUMENTO</th>
                    <th>CREACION</th>
                    <th>PAGADO</th>
                    <th>ABONO</th>
                    <th>SALDO</th>
                    <th>APP PAGO</th>
                    <th>DOC</th>

                </tr>

            </thead>

            <tbody>

            <?php

            while($crow2 = mysqli_fetch_assoc($result2))
            {

                $numero =$crow2['id'];

                $valormostrar = 0;

                $estado =$crow2['estado'];

                $color ="";

                $url_image ="";

                if ($estado ==  "pendiente")
                {
                    $vencido = $vencido + $crow2['total'];

                    $sqlr = "SELECT * from registro_pagos 
                    WHERE ruc_ci LIKE '$codigo'";

                    $resultr = mysqli_query($con, $sqlr);

                    $numfilasr = $resultr->num_rows;

                    if($numfilasr >= 1)
                    {
                        while($crowr = mysqli_fetch_assoc($resultr))
                        {
                            $url_image = $crowr['url_image'];
                            $image = $crowr['image'];
                        }
                    }
                }

                $control =$crow2['id'];

                if ($controlanterior == $control)
                {
                    $valormostrar = $valormostrar + $crow2['abono'];
                }
                else
                {

                $valormostrar = $valormostrar + $crow2['abono'];

            ?>

                <tr
                class="alternar"
                onclick="window.location.href='../ventas/detalle.php?codigo=<?php echo $crow2['id'];?>&cliente=<?php echo $codigo; ?>&contrato=<?php echo $crow2['contrato']; ?>&url_image=<?php echo $url_image;?>&documento=<?php echo $crow2['estado'];?>'"
                style="cursor:pointer;"
                title="Revisar Detalles">
                    <td>
                            <a href="../ventas/detalle.php?codigo=<?php echo $crow2['id'];?>&cliente=<?php echo $codigo; ?>&contrato=<?php echo $crow2['contrato']; ?>&url_image=<?php echo $url_image;?>&documento=<?php echo $crow2['estado'];?>" 
                               class="btn btn-sm btn-info" 
                               style="padding: 5px 10px; text-decoration: none; background-color: #17a2b8; color: white; border-radius: 4px; font-size: 12px;">
                                Ver Detalles
                            </a>
                        </td>

                    <!-- =====================================
                    CONTRATO
                    ===================================== -->

                    <td align="center">

                        <?php

                        echo $numerocon =$crow2['contrato'];

                        $numero =$crow2['id'];

                        ?>

                    </td>

                    <!-- =====================================
                    DOCUMENTO
                    ===================================== -->

                    <td align="center">

                        <?php

                        $accionc ="pago";

                        $sql7 = "SELECT * from registro
                        WHERE (id LIKE '$numero')
                        AND (accion LIKE '$accionc')
                        AND (cliente LIKE '$codigo')
                        order by fecha DESC";

                        $result7 = mysqli_query($con, $sql7);

                        while($crow7 = mysqli_fetch_assoc($result7))
                        {
                            echo $crow7['codigo']." . ";
                        }

                        if($crow2['estado'] == "anular")
                        {
                            $accionc ="anular";

                            $id2 =$crow2['id'];

                            $sql7 = "SELECT * from registro
                            WHERE (id LIKE '$id2')
                            AND (accion LIKE '$accionc')
                            AND (cliente LIKE '$clientecontrol')
                            order by fecha DESC";

                            $result7 = mysqli_query($con, $sql7);

                            while($crow7 = mysqli_fetch_assoc($result7))
                            {
                                echo $crow7['codigo']." . ";
                            }
                        }

                        ?>

                    </td>

                    <!-- =====================================
                    PRODUCTOS
                    ===================================== -->

                    <?php

                    $mensajeproducto = "";

                    $productot = "";

                    $can = "";

                    $producto =$crow2['producto'];

                    $sql77 = "SELECT * from productos
                    WHERE codigo LIKE '$producto'";

                    $result77 = mysqli_query($con, $sql77);

                    while($crow77 = mysqli_fetch_assoc($result77))
                    {
                        $producto = $crow77['producto'];

                        $productot = $crow77['producto'];
                    }

                    $accion ="venta";

                    $sql777 = "SELECT * from ventas
                    WHERE (id LIKE '$numero')
                    AND (cliente LIKE '$codigob')";

                    $result777 = mysqli_query($con, $sql777);

                    while($crow777 = mysqli_fetch_assoc($result777))
                    {

                        $productob = $crow777['producto'];

                        $can = $crow777['cantidad'];

                        $sql778 = "SELECT * from productos
                        WHERE codigo LIKE '$productob'";

                        $result778 = mysqli_query($con, $sql778);

                        while($crow778 = mysqli_fetch_assoc($result778))
                        {
                            $productot = $crow778['producto'];
                        }

                        $descuento = $crow777['descuento'];

                        if($descuento == "0" OR
                           $descuento == "1" OR
                           $descuento == "Sin_Asignar")
                        {
                            $total = $total + $crow777['total'];

                            $descuento = 0;
                        }
                        else
                        {
                            $descuento =
                            ($crow777['total'] * $descuento )/100;
                        }

                        $mensajeproducto =
                        $productot."(".$can.") \n ".$mensajeproducto;

                        $total = $total + $descuento;

                    }

                    ?>

                    <!-- =====================================
                    FECHA CREACION
                    ===================================== -->

                    <td align="center">

                        <?php

                        $fecha =$crow2['fecha'];

                        $separador = "(";

                        $fechaseparada = explode($separador, $fecha);

                        echo $fechaseparada[0];

                        ?>

                    </td>

                    <!-- =====================================
                    FECHA PAGADO
                    ===================================== -->

                    <td align="center">

                        <?php

                        $numero =$crow2['id'];

                        $pago ="pago";

                        $sql7789 = "SELECT * from registro
                        WHERE id LIKE '$numero'
                        AND accion LIKE '$pago'";

                        $result7789 = mysqli_query($con, $sql7789);

                        while($crow7789 = mysqli_fetch_assoc($result7789))
                        {
                            $fechapagado = $crow7789['fecha'];

                            $separador = "(";

                            $fechaseparada =
                            explode($separador, $fechapagado);

                            echo $fechaseparada[0];
                        }

                        ?>

                    </td>

                    <!-- =====================================
                    ABONO
                    ===================================== -->

                    <td align="center">

                        <abbr title="<?php echo $mensajeproducto; ?>">

                            $<?php echo number_format($valormostrar,2); ?>

                        </abbr>

                    </td>

                    <!-- =====================================
                    SALDO
                    ===================================== -->

                    <td align="center">

                        <?php

                        if($crow2['estado'] == "pendiente")
                        {
                            echo "$".number_format(
                                $total - $valormostrar,
                                2
                            );
                        }

                        if($crow2['estado'] == "cancelado")
                        {
                            echo "$0.00";
                        }

                        if($crow2['estado'] == "anular")
                        {
                            echo "$0.00";
                        }

                        ?>

                    </td>

                    <!-- =====================================
                    APP PAGO
                    ===================================== -->

                    <td align="center">

                        <?php if($url_image != "") { ?>

                            <img
                                src="<?php echo $url_image; ?>"
                                width="58"
                                height="58"
                                alt=""
                                style="
                                    border-radius:12px;
                                    object-fit:cover;
                                    border:2px solid rgba(255,255,255,.08);
                                "
                            >

                        <?php } ?>

                    </td>

                    <!-- =====================================
                    DOCUMENTO
                    ===================================== -->

                    <td align="center">

                        <?php

                        $tipodocumento =$crow2['tipodocumento'];

                        if($tipodocumento != "Sin_documento")
                        {
                            echo $tipodocumento;
                        }

                        ?>

                    </td>

                </tr>

            <?php

                $total = 0;

                }

                $controlanterior = $crow2['id'];

            }

            ?>

            </tbody>

        </table>

    </div>

</div>
	<?php 
	if (!filter_var($ip, FILTER_VALIDATE_IP)) {
    echo '
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
    icon: "warning",
    title: "Aviso",
    text: "La Ip no es valida. Solo se puede asignar una IP de MikroTik.",
    confirmButtonText: "Aceptar"
}).then(() => {
    window.location.href = "../mikrotik/listado.php";
});
</script>';
exit;
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
