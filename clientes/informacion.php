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
// INICIALES AVATAR
// ==========================================

$palabras = explode(" ", trim($nombres));

$inicial1 = strtoupper(substr($palabras[0],0,1));

$inicial2 = "";

if(isset($palabras[1])){

    $inicial2 = strtoupper(substr($palabras[1],0,1));
}

$iniciales = $inicial1.$inicial2;

$dbmretorno = 0;
$tabla = "clientes";
$filacolor="0";
if (isset($_GET['codigo'])) {
   			$codigo=$_GET['codigo'];
			$codigogps=$_GET['codigo'];
			$sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$codigo = $crow['codigo'];
						$producto = $crow['nombres'];
						$apellidos = $crow['apellidos'];
						$direccion = $crow['direccion'];
						$telefono = $crow['telefono1'];
						$telefono2 = $crow['telefono2'];
						$mail = $crow['mail'];
						$foto1 = $crow['foto1'];
						$foto2 = $crow['foto2'];
						$foto3 = $crow['foto3'];
						$foto4 = $crow['foto4'];
						$cedula1 = $crow['cedula1'];
						$cedula2 = $crow['cedula2'];
						$planilla = $crow['planilla'];
				
						$accion="editar";
						}
						if($cedula1 == 0)
						{
							$cedula1 = "../images/frontal.png";
						}
						if($cedula2 == 0)
						{
							$cedula2 = "../images/posterior.png";
						}
						if($planilla == 0)
						{
							$planilla = "../images/planilla.png";
						}
	
// Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  						$resultg = mysqli_query($con, "SELECT * FROM `clientegps` WHERE `codigo` LIKE '$codigogps'");
						while ($crowg = mysqli_fetch_array($resultg)) 
						{
     	 				$lat = $crowg['lat'];
		 				$lng = $crowg['lng'];
		 				$ip = $crowg['ip'];
  						}
///-- buscamos historial de facturas
	
						$sql2 = "SELECT * from `ventas` WHERE `cliente` LIKE '$codigogps' order by fecha DESC";
						$result2 = mysqli_query($con, $sql2); 
//---buscamos historial de servicios tecnicos
						$sql22 = "SELECT * from `serviciotecnico` WHERE `cliente` LIKE '$codigogps' order by fecha DESC";
						$result22 = mysqli_query($con, $sql22); 
						
						
		}
		else
		{
   			$mail ="";
			$codigo ="";
			$producto ="";
			$apellidos ="";
			$direccion ="";
			$telefono ="";
			$telefono2 ="";
			$accion='nuevo';
			
		}
$codigocontrato = $codigo;
$nombremensaje = $producto;
		?>
 
          <tr>
            <td align="center" valign="top">
                  
                      
				
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
                        action="../clientes/historial.php"
                        method="GET"
                        style="display:inline;"
                    >

                        <input
                            name="codigo" 
                            type="hidden" id="codigo"
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

                            Regresar

                        </button>

                    </form>

                    <!-- NUEVO CONTRATO --><!-- PROFORMA -->

                    <button class="btn-action btn-proforma">

                        <img 
                            src="../images/sistema/10.png"
                            width="64"
                            height="38"
                            alt=""
                        >
                        <br>

                        Documentos (En Construccion)

                    </button>

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

                            Auditoria (En Construccion)

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
			  <div class="info-value" style="display:flex;justify-content:center;align-items:center;text-align:center;">

                    <div class="info-value">

                    <img src="<?php echo $cedula1; ?>"
                         width="70"
                         height="70"
                         
                         alt=""/>
                    </div>

                </div>
				<div class="info-value" style="display:flex;justify-content:center;align-items:center;text-align:center;">

                    <div class="info-value">
                        
						
                    <img src="<?php echo $cedula2; ?>"
                         width="70"
                         height="70"
                         
                         alt=""/>

               
                    </div>

                </div>
				<div class="info-value" style="display:flex;justify-content:center;align-items:center;text-align:center;">

                    <div class="info-value">
                      
                    <img src="<?php echo $planilla; ?>"
                         width="70"
                         height="70"
                         
                         alt=""/>

                    </div>

                </div>

            </div>

        </div>

    </div>
				
				
				
										   </td>
            <td>            
          </tr>
          <tr>
            <td align="center" valign="top">
			<br>
            <div class="table-scroll">
              <table class="panel-dark"
       style="width:100%;
              border-collapse:separate;
              border-spacing:0;
              border-radius:16px;
              overflow:hidden;">
                
                <tr align="center"
        valign="top">
                  
                  <td colspan="7"
            class="clientes-form-title"
            style="padding-top:22px;
                   padding-bottom:22px;">
                    
                    HISTORIAL FACTURACION
                    
                  </td>
                  
                </tr>
                
                <tr align="center"
        valign="top"
        class="label">
                  
                  <td>CREACION</td>
                  
                  <td>VALOR</td>
                  
                  <td>SAL</td>
                  
                  <td>ESTADO</td>
                  
                  <td>IMAGEN</td>
                  
                  <td>NRO RECIBO</td>
                  
                  <td>DOC</td>
                  
                </tr>
                
                <?php while($crow2 = mysqli_fetch_assoc($result2))
    {

        if($filacolor =="0")
        {
            $color="#0f172a";
            $filacolor="1";
        }

        else
        {
            $color="";
            $filacolor="0";
        }

        $control =$crow2['id'];

        $sql24 = "SELECT * from `ventas`
        WHERE `id` LIKE '$control'
        order by fecha DESC";

        $result24 = mysqli_query($con, $sql24); 

        $numfilas = $result24->num_rows;

        $numfilas;

        if ($numfilas == 1)
        {

    ?>
                
                <tr class="valor"
        bgcolor="<?php echo $color;?>"
        style="text-align:center;">
                  
                  <td>
                    
                    <?php echo $fecha =$crow2['fecha'];?>
                    
                  </td>
                  
                  <td>
                    
                    <?php
            echo $total =$crow2['total'];

            $abono =$crow2['abono'];
            ?>
                    
                  </td>
                  
                  <td>
                    
                    <?php

            if ($crow2['estado'] == "anular")
            {
                echo "0";
            }
            else
            {
                echo $saldo =$total- $abono;
            }

            ?>
                    
                  </td>
                  
                  <td>
                    
                    <?php echo $estado =$crow2['estado'];?>
                    
                  </td>
                  
                  <td>
                    
                    <?php 

            $imagen = $crow2['recibo'];

            if($imagen == "../images/sin_documento.png")
            {

            }
            else
            {

            ?>
                    
                    <a href="<?php echo $imagen;?>"
               target="_blank">
                      
                      <img src="<?php echo $imagen;?>"
                     width="120"
                     height="120"
                     style="border-radius:14px;
                            object-fit:cover;
                            border:1px solid rgba(255,255,255,.08);
                            box-shadow:0 10px 22px rgba(0,0,0,.25);"
                     alt=""/>
                      
                    </a>
                    
                    <?php }?>  
                    
                  </td>
                  
                  <td>
                    
                    <?php echo $recibo =$crow2['numerorecibo'];?>
                    
                  </td>
                  
                  <td>
                    
                    <?php

            $tipodocumento =$crow2['tipodocumento'];

            if($tipodocumento == "Sin_documento")
            {

            }
            else
            {
                echo $tipodocumento ;
            }

            ?>
                    
                  </td>
                  
                  <?php if($estado == "pendiente")
        {
        ?>
                  
                  <?php
        }
        else
        {
        ?>
                  
                  <?php
        }
        ?>
                  
                  <?php if($estado == "pendiente")
        {
        ?>
                  
                  <?php
        }
        else
        {
        ?>
                  
                  <?php
        }
        ?>
                  
                </tr>
                
                <?php 

        $controlservicio=0;

        }
        else
        {

            if ($controlservicio ==  "0")
            {

    ?>
                
                <tr class="alternar"
        bgcolor="<?php echo $color;?>"
        style="text-align:center;">
                  
                  <td>
                    
                    <?php echo $fecha =$crow2['fecha'];?>
                    
                  </td>
                  
                  <td>
                    
                    <?php echo $total =$crow2['total'];?>
                    
                  </td>
                  
                  <td>
                    
                    <?php

            if ($crow2['estado'] == "anular")
            {
                echo "0";
            }
            else
            {
                echo $saldo =$total- $abono;
            }

            ?>
                    
                  </td>
                  
                  <td>
                    
                    <?php echo $estado =$crow2['estado'];?>
                    
                  </td>
                  
                  <td>&nbsp;</td>
                  
                  <td>&nbsp;</td>
                  
                  <td>
                    
                    <?php echo $tipodocumento =$crow2['tipodocumento'];?>
                    
                  </td>
                  
                  <?php if($estado == "pendiente")
        {
        ?>
                  
                  <?php
        }
        else
        {
        ?>
                  
                  <?php
        }
        ?>
                  
                  <?php if($estado == "pendiente")
        {
        ?>
                  
                  <?php
        }
        else
        {
        ?>
                  
                  <?php
        }
        ?>
                  
                </tr>
                
                <?php 

            }

            $controlservicio= $controlservicio+1;

        }

    }?>
                
  </table>
            </div>
             
              <br>
              <div class="table-scroll">
                <table align="center"
       class="panel-dark"
       style="width:100%;
              border-collapse:separate;
              border-spacing:0;
              border-radius:16px;
              overflow:hidden;">
                  
                  <!-- TITULO -->
                  <tr align="center"
        valign="top">
                    
                    <td colspan="3"
            class="clientes-form-title"
            style="padding-top:22px;
                   padding-bottom:22px;">
                      
                      NUMEROS DE SERIE
                      
                    </td>
                    
                  </tr>
                  
                  <!-- LABELS -->
                  <tr align="center"
        valign="top"
        class="label">
                    
                    <td>PRODUCTO</td>
                    
                    <td>FECHA</td>
                    
                    <td>SERIE</td>
                    
                  </tr>
                  
                  <?php 

    $sql22 = "SELECT * from `registro`
    WHERE `cliente` LIKE '$codigo'
    order by fecha DESC";

    $result22 = mysqli_query($con, $sql22);

    while($crow2 = mysqli_fetch_assoc($result22))
    {

        $serie =$crow2['serie'];

        $sqlse = "SELECT * from `series`
        WHERE `serie` LIKE '$serie'
        order by serie DESC";

        $resultse = mysqli_query($con, $sqlse);

        while($crowse = mysqli_fetch_assoc($resultse))
        {

            if($filacolor =="0")
            {
                $color="#0f172a";
                $filacolor="1";
            }

            else
            {
                $color="";
                $filacolor="0";
            }

            $control =$crow2['id'];

    ?>
                  
                  <!-- FILA -->
                  <tr class="alternar"
        bgcolor="<?php echo $color;?>"
        style="text-align:center;">
                    
                    <td class="valor"
            style="padding:14px;">
                      
                      <?php echo $crow2['codigo'];?>
                      
                    </td>
                    
                    <td class="valor"
            style="padding:14px;">
                      
                      <?php echo $fecha =$crow2['fecha'];?>
                      
                    </td>
                    
                    <td class="valor"
            style="padding:14px;">
                      
                      <?php echo $serie?>
                      
                    </td>
                    
                    <?php if($estado == "pendiente")
        {
        ?>
                    
                    <?php
        }
        else
        {
        ?>
                    
                    <?php
        }

        ?>
                    
                    <?php if($estado == "pendiente")
        {
        ?>
                    
                    <?php
        }
        else
        {
        ?>
                    
                    <?php
        }

        ?>
                    
                  </tr>
                  
                  <?php 

        //$controlservicio= $controlservicio+1;

    }}

    ?>
                  
  </table>
              </div>
				<?php 
				//if ($tipoempresacontrol == "isp")
//				{
				?>
             <br>
             <div class="table-scroll">
               <table align="center"
       class="panel-dark"
       style="width:100%;
              border-collapse:separate;
              border-spacing:0;
              border-radius:16px;
              overflow:hidden;">
                 
                 <!-- TITULO -->
                 <tr align="center"
        valign="top"
        class="titulo-tabla">
                   
                   <td colspan="7"
            class="clientes-form-title"
            style="padding-top:22px;
                   padding-bottom:22px;">
                     
                     SERVICIO TECNICO
                     
                   </td>
                   
                 </tr>
                 
                 <!-- LABELS -->
                 <tr align="center"
        valign="top"
        class="label">
                   
                   <td>CON</td>
                   
                   <td>IP</td>
                   
                   <td>FECHA</td>
                   
                   <td>PLAN</td>
                   
                   <td>TECNICO</td>
                   
                   <td>MOTIVO</td>
                   
                   <td>OBSERVACION</td>
                   
                 </tr>
                 
                 <?php while($crow2 = mysqli_fetch_assoc($result22))
    {

        if($filacolor =="0")
        {
            $color="#0f172a";
            $filacolor="1";
        }

        else
        {
            $color="";
            $filacolor="0";
        }

        $control =$crow2['id'];

        $sql24 = "SELECT * from `ventas`
        WHERE `id` LIKE '$control'
        order by fecha DESC";

        $result24 = mysqli_query($con, $sql24); 

        $numfilas = $result24->num_rows;

        $numfilas;

        if ($numfilas == 1)
        {

    ?>
                 
                 <!-- FILA -->
                 <tr class="alternar"
        bgcolor="<?php echo $color;?>"
        style="text-align:center;">
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $numero =$crow2['numero'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $total =$crow2['ip'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $fecha =$crow2['fecha'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $abono =$crow2['plan'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['personal'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['motivo'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['observacion'];?>
                     
                   </td>
                   
                   <?php if($estado == "pendiente")
        {
        ?>
                   
                   <?php
        }
        else
        {
        ?>
                   
                   <?php
        }

        ?>
                   
                   <?php if($estado == "pendiente")
        {
        ?>
                   
                   <?php
        }
        else
        {
        ?>
                   
                   <?php
        }

        ?>
                   
                 </tr>
                 
                 <?php 

        $controlservicio=0;

        }
        else
        {

            if ($controlservicio ==  "0")
            {

    ?>
                 
                 <!-- FILA -->
                 <tr class="alternar"
        bgcolor="<?php echo $color;?>"
        style="text-align:center;">
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $numero =$crow2['numero'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $total =$crow2['ip'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $fecha =$crow2['fecha'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $abono =$crow2['plan'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['personal'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['motivo'];?>
                     
                   </td>
                   
                   <td class="valor"
            style="padding:14px;">
                     
                     <?php echo $tipodocumento =$crow2['observacion'];?>
                     
                   </td>
                   
                   <?php if($estado == "pendiente")
        {
        ?>
                   
                   <?php
        }
        else
        {
        ?>
                   
                   <?php
        }

        ?>
                   
                   <?php if($estado == "pendiente")
        {
        ?>
                   
                   <?php
        }
        else
        {
        ?>
                   
                   <?php
        }

        ?>
                   
                 </tr>
                 
                 <?php 

            }

            $controlservicio= $controlservicio+1;

        }

    }?>
                 
  </table>
             </div>
             <br>
		
<?php

$sqlc = "SELECT * from `contratos`
         WHERE `cliente` LIKE '$codigocontrato'
         order by numero DESC";

$resultc = mysqli_query($con, $sqlc);

?>

<div class="table-scroll">

<?php

if(mysqli_num_rows($resultc)>0){

    while($rowc = mysqli_fetch_array($resultc)){

        $router    = $rowc['router'];
        $ip        = $rowc['ip'];
        $gps1      = $rowc['gps1'];
        $gps2      = $rowc['gps2'];
        $cortado   = strtolower(trim($rowc['cortado']));

?>

    <div class="cliente-table-panel">

        <div class="cliente-info-title">
            CONTRATO #<?php echo $rowc['numero']; ?>
        </div>

        <br>

        <table class="table-dark" width="100%">

            <tr>

                <th>IP</th>
                <th>MAPA</th>
                <th>ESTADO</th>

            </tr>

            <tr>

                <td>

                    <a href="http://<?php echo $ip; ?>:9090"
                       target="_blank"
                       class="btn-action btn-edit">

                        <?php echo $ip; ?>

                    </a>
                    <br>
                    <br>
					
				<span class="estado estado-activo">
                            <?php echo $router; ?>
                        </span>
                </td>

                <td>

                    <a href="https://www.google.com/maps?q=<?php echo $gps2; ?>,<?php echo $gps1; ?>"
                       target="_blank"
                       class="btn-action btn-contrato">

                        VER MAPA

                    </a>

                </td>

                <td>

                    <?php if($cortado=="si"){ ?>

                        <button class="btn-action btn-proforma">
                            ACTIVACION
                        </button>

                    <?php }else{ ?>

                        <button class="btn-action btn-general">
                            ACTIVACION
                        </button>

                    <?php } ?>

                </td>

            </tr>

            <tr>

                <th>LONGITUD</th>
                <th>LATITUD</th>
                <th>ESTADO</th>

            </tr>

            <tr>

                <td><?php echo $gps1; ?></td>

                <td><?php echo $gps2; ?></td>

                <td>

                    <?php if($cortado=="si"){ ?>

                        <span class="estado estado-cortado">
                            CORTADO
                        </span>

                    <?php }else{ ?>

                        <span class="estado estado-activo">
                            ACTIVO
                        </span>

                    <?php } ?>

                </td>

            </tr>

            <tr>

                <th colspan="3">
                    DOCUMENTOS
                </th>

            </tr>

            <tr>

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        CEDULA 1
                    </div>

                    <?php if($rowc['cedula1']!=""){ ?>

                        <img src="<?php echo $rowc['cedula1']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        CEDULA 2
                    </div>

                    <?php if($rowc['cedula2']!=""){ ?>

                        <img src="<?php echo $rowc['cedula2']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        PLANILLA
                    </div>


                    <?php if($rowc['planilla']!=""){ ?>

                        <img src="<?php echo $rowc['planilla']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

            </tr>

            <tr>

                <th colspan="3">
                    FOTOGRAFIAS
                </th>

            </tr>

            <tr align="center">

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        FOTO 1
                    </div>

                    <?php if($rowc['foto1']!=""){ ?>

                        <img src="<?php echo $rowc['foto1']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        FOTO 2
                    </div>

                    <?php if($rowc['foto2']!=""){ ?>

                        <img src="<?php echo $rowc['foto2']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

                <td style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        FOTO 3
                    </div>

                    <?php if($rowc['foto3']!=""){ ?>

                        <img src="<?php echo $rowc['foto3']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

            </tr>

            <tr align="center">

                <td colspan="3"
					style="
        text-align:center;
        vertical-align:middle;
        justify-content:center;
        align-items:center;
    ">

                    <div class="info-label">
                        FOTO 4
                    </div>

                    <?php if($rowc['foto4']!=""){ ?>

                        <img src="<?php echo $rowc['foto4']; ?>"
                             style="
                             width:140px;
                             height:110px;
                             object-fit:cover;
                             border-radius:10px;">

                    <?php } ?>

                </td>

            </tr>
            <tr align="center">
              <td colspan="3">
		
				</td>
            </tr>

        </table>

    </div>

<?php

    }

}else{

?>

    <div class="cliente-table-panel">

        <div class="cliente-info-title">
            NO SE ENCONTRARON CONTRATOS
        </div>

    </div>

<?php

}

?>

</div>
	
                  
              <?php 
				  
				  $procesado = "si";
				  $estado_contrato = "activo";
				  //echo $codigo;
				  $sqlc2 = "SELECT * from `contratos` WHERE (`cliente` LIKE '$codigocontrato') AND (`procesados` LIKE '$procesado')AND (`estado` LIKE '$estado_contrato')order by fecha DESC";
                  $resultc2 = mysqli_query($con, $sqlc2);
                  $Resultados= "1";
                 while ($crowc2 = mysqli_fetch_assoc($resultc2)) 
                 {
				 $graficartemp ="0";
				 $graficartemp2 ="0";
                 $ip_cliente = $crowc2['ip'];
                 $serieurl = $crowc2['router'];
					 
                 $nodo = $crowc2['nodo'];
					 
                 list($ipuno, $ipdos, $iptres, $ipcuatro) = explode(".", $ip_cliente);
                 if($iptres <= 15)
                 {
                 	$tarjeta1 = "0/1";
                 	$t1 = 0;
                 	$t2 = 1;
                 }
                 if($iptres >= 16)
                 {
                 	$tarjeta1 = "0/2";
                 	$t1 = 0;
                 	$t2 = 2;
                 }
                 $tarjeta = "0/".$iptres;
                 $puerto_tarjeta = $iptres;
                 if($puerto_tarjeta == 16 )
                 {
                  $puerto_tarjeta = 0;
                 }
                 if($puerto_tarjeta == 17 )
                 {
                  $puerto_tarjeta = 1;
                 }
                 if($puerto_tarjeta == 18 )
                 {
                  $puerto_tarjeta = 2;
                 }
                 if($puerto_tarjeta == 19 )
                 {
                  $puerto_tarjeta = 3;
                 }
                 if($puerto_tarjeta == 20 )
                 {
                  $puerto_tarjeta = 4;
                 }
                 if($puerto_tarjeta == 21 )
                 {
                  $puerto_tarjeta = 5;
                 }
                 if($puerto_tarjeta == 22 )
                 {
                  $puerto_tarjeta = 6;
                 }
                 if($puerto_tarjeta == 23 )
                 {
                  $puerto_tarjeta = 7;
                 }
                 if($puerto_tarjeta == 24 )
                 {
                  $puerto_tarjeta = 8;
                 }
                 if($puerto_tarjeta == 25 )
                 {
                  $puerto_tarjeta = 9;
                 }
                 if($puerto_tarjeta == 26 )
                 {
                  $puerto_tarjeta = 10;
                 }
                 if($puerto_tarjeta == 27 )
                 {
                  $puerto_tarjeta = 11;
                 }
                 if($puerto_tarjeta == 28 )
                 {
                  $puerto_tarjeta = 12;
                 }
                 if($puerto_tarjeta == 29 )
                 {
                  $puerto_tarjeta = 13;
                 }
                 if($puerto_tarjeta == 30 )
                 {
                  $puerto_tarjeta = 14;
                 }
                 if($puerto_tarjeta == 31 )
                 {
                  $puerto_tarjeta = 15;
                 }
                 $ubicacion_puerto = $ipcuatro;
                 $imagen_olt = "../images/equipos/tarjeta_huawei".$puerto_tarjeta.".jpg"; 
                 ?>
                
                
              <?php
				if ($oltconfiguracion === 'si') {
					
				//EJECUTAR COMANDO PARA RECUPERACION DE INFORMACION DE LA ONT
				$port = 22;
				$sqlolt = "SELECT * from `olt_conexion` WHERE `nodo` LIKE '$nodo'";
				$resultolt = mysqli_query($con, $sqlolt);
				while($crowolt = mysqli_fetch_assoc($resultolt))
				{
					$host_olt=$crowolt['ip'];
					$u_olt=$crowolt['usuario'];
					$p_olt=$crowolt['contrasena'];
				}	
				$connection = ssh2_connect($host_olt, $port);
				if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
				die("La autenticación SSH falló.");
					}else
				// Ejecutar un comando remoto recuperacion informacion olt para saacr distancia y ortros
				$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display ont info '.$t1." ".$t2."\n".' '.$puerto_tarjeta." ".$ubicacion_puerto."\n"."\n";
				$stream = ssh2_exec($connection, $command);
				stream_set_blocking($stream, true);
				$output = stream_get_contents($stream);
				$output;
				////////imprimo distancia
				$separador = "distance(m)";
				$separada = explode($separador, $output);
				$separada[2]; 
				$separador = "ONT";
				$control = $separada[2];
				$separadaf = explode($separador, $control);
				$distanciaimprimir=$separadaf[0];
				?>
                
                <?php
				/////////imprimo numero de serie
				$separador = "SN";
				$separada = explode($separador, $output);
				$separada[2]; 
				$separador = "Management";
				$control = $separada[2];
				$separadaf = explode($separador, $control);
				$serieimprimir=$separadaf[0];
					
				  ?>
                
                <?php
				///////////////////imprimir descripcion
				$separador = "Description";
				$separada = explode($separador, $output);
				$separada[1]; 
				$separador = "Last";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$descripcionimprimir=$separadaf[0];
				?>
                
                <?php
				///////////////////imprimir duracion prendida
				$separador = "duration";
				$separada = explode($separador, $output);
				$separada[1]; 
				$separador = "ONT";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$duracionimprimir=$separadaf[0];
				?>
                
                <?php
				///////////////////ultimo apagado
				$separador = "cause";
				$separada = explode($separador, $output);
				$separada[1]; 
				$separador = "Last";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$lastimprimir=$separadaf[0];
				?>
               
                <?php
				///////////////////hora de prendido
				$separador = "time";
				$separada = explode($separador, $output);
				$separada[1]; 
				$separador = "Last";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$ultimoprendido=$separadaf[0];
				?>
                
                
                <?php
				///////////////////hora de apagado
				$separador = "time";
				$separada = explode($separador, $output);
				$separada[2]; 
				$separador = "Last";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$apagadoimprimir=$separadaf[0];
				?>
                
                
                <?php
				///////////////////hora de apagado repentino
				$separador = "time";
				$separada = explode($separador, $output);
				$separada[3]; 
				$separador = "Last";
				$control = $separada[1];
				$separadaf = explode($separador, $control);
				$ultioapagadoimprimir=$separadaf[0];
				?>
                
                
                <?php
					 
					?>
                 
					<br>
					
                <?php
				// Ejecutar un comando remoto recuperacion informacion olt para sacar las potencias
				$connection = ssh2_connect($host_olt, $port);
					if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
							die("La autenticación SSH falló.");
					}else
					
				$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'interface gpon '.$tarjeta1."\n".'display ont optical-info '.$puerto_tarjeta." ".$ubicacion_puerto."\n"."\n";
				$stream = ssh2_exec($connection, $command);
				stream_set_blocking($stream, true);
				$output = stream_get_contents($stream);
				$output;
				
				$separador = "(dBm)";
				$separada = explode($separador, $output);
				$separador = "power";
				if (isset($separada[2])) 
				{
    			
				
				$control = $separada[2];
				$separadaf = explode($separador, $control);
				
				//GRAFICO POTENCIA DE IDA
				
				$separador = "optical";
				$control = $separada[8];
				$separadaf2 = explode($separador, $control);
				$graficartemp = $separadaf[0];
				list($userw) = explode("CATV", $graficartemp);
				//echo $userw;
				list($userq, $userq) = explode(":", $userw);
				//echo $userq;
				$usere =str_replace(' ', '', $userw);
				list($useru, $useri) = explode("-", $usere);
				$useri;
				$dbm = $useri;
				$nummax = 30;
				$porcentaje = round(((int)$dbm * 100) / (int)$nummax);

?>


                
  <?php


$graficartemp2 = $separadaf2[0];
					
if ($useri >= 25)
{
	echo "<script>
                alert('Potencia muy alta realizar revicion');
                window.location= '#'
    </script>";

}
else
{

}
				}
				else
				{
					echo "<script>
                alert('Este equipo esta apagado o con fibra rota');
                window.location= '#'
				</script>";
	
				}					
?>
	
	<div class="table-scroll">
                <table class="panel-dark"
       style="width:100%;
              border-collapse:separate;
              border-spacing:0;
              border-radius:16px;
              overflow:hidden;">
                    
                  <!-- TITULO -->
                  <tr>
                      
                    <td colspan="4"
            class="clientes-form-title"
            style="text-align:center;
                   padding-top:22px;
                   padding-bottom:22px;">
                        
                      INFORMACION DE LA CONEXION
					<br>
						CONTRATO N° <?php echo $crowc2['numero'];?>
					<br>
                     <form action="../clientes/confirmacion_eliminar.php" method="GET" style="margin:0;">
					<input type="hidden" name="numero" value="<?php echo $serieurl; ?>">
					<input type="hidden" name="nodo" value="<?php echo $nodo; ?>">
					<button class="btn-action btn-edit" type="submit">
					BORRADO COMPLETO
					</button>
					</form>
                    </td>
                      
                  </tr>
                    
                  <!-- IMAGEN OLT -->
                  <tr>
                      
                    <td colspan="4"
            align="center"
            class="label"
            style="text-align:center;
                   padding-top:22px;
                   padding-bottom:22px;">
                        
                      <img src=<?php echo $imagen_olt; ?>
                 width="500"
                 height="120"s>
                        
                      <br />
                        
                    </td>
                      
                  </tr>
                    
                  <!-- TARJETA -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      TARJETA
                        
                    </td>
                      
                    <td class="valor">
                        
                      <span class="badge-info">
                          
                        <?php echo $tarjeta1; ?>
                          
                      </span>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      PUERTO TARJETA
                        
                    </td>
                      
                    <td class="valor">
                        
                      <span class="badge-info">
                          
                        <?php echo $puerto_tarjeta; ?>
                          
                      </span>
                        
                    </td>
                      
                  </tr>
                    
                  <!-- ONT -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      NUMERO DE ONT
                        
                    </td>
                      
                    <td class="valor">
                        
                      <span class="badge-ok">
                          
                        <?php echo $ubicacion_puerto; ?>
                          
                      </span>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      IP CLIENTE
                        
                    </td>
                      
                    <td class="valor">
                        
                      <span class="badge-alert">
                          
                        <?php echo $ip_cliente; ?>
                          
                      </span>
                        
                    </td>
                      
                  </tr>
                    
                  <!-- SERIE -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      NUMERO DE SERIE
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $serieimprimir; ?>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      DESCRIPCION
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $descripcionimprimir; ?>
                        
                    </td>
                      
                  </tr>
                    
                  <!-- DURACION -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      DURACION PRENDIDA
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $duracionimprimir; ?>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      LAST DOWN CAUSE
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $lastimprimir; ?>
                        
                    </td>
                      
                  </tr>
                    
                  <!-- ULTIMO PRENDIDO -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      ULTIMO PRENDIDO
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $ultimoprendido; ?>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      ULTIMO APAGADO REPENTINO
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $ultioapagadoimprimir; ?>
                        
                    </td>
                      
                  </tr>
                    
                  <!-- ULTIMO APAGADO -->
                  <tr>
                      
                    <td class="label"
            align="right">
                        
                      ULTIMO APAGADO
                        
                    </td>
                      
                    <td class="valor">
                        
                      <?php echo $apagadoimprimir; ?>
                        
                    </td>
                      
                    <td class="label"
            align="right">
                        
                      DISTANCIA
                        
                    </td>
                      
                    <td class="valor">
                        
                      <span class="badge-ok">
                          
                        <?php echo $distanciaimprimir; ?>
                          
                      </span>
                        
                    </td>
                      
                  </tr>
                    
  </table>
</div>
	  
		<br>		  
<table align="center" style="margin:auto;">
  <tbody>
    <tr>
      <td align="center" valign="middle">

        <table align="center" style="margin:auto;">
          <tbody>
            <tr>
              <td align="center" valign="middle">

<?php
/* =====================================================
   DOBLE GAUGE PHP EMBEBIDO
   AGUJAS CORREGIDAS
===================================================== */

/* =====================================================
   VALORES
===================================================== */

$graficartemp  = limpiar_valor($graficartemp);
$graficartemp2 = limpiar_valor($graficartemp2);



$aguja1 = generar_aguja($graficartemp);
$aguja2 = generar_aguja($graficartemp2);

?>



<div class="gauge-wrapper">

<div class="gauge-container">

    <!-- =====================================================
         GAUGE 1
    ====================================================== -->

    <div class="gauge-box">

    <svg width="300" height="220">

        <!-- FONDO -->
        <path d="M30 150 A120 120 0 0 1 270 150"
              fill="none"
              stroke="#1e293b"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- VERDE -->
        <path d="M30 150 A120 120 0 0 1 110 46"
              fill="none"
              stroke="#22c55e"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- AMARILLO -->
        <path d="M110 46 A120 120 0 0 1 190 46"
              fill="none"
              stroke="#facc15"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- ROJO -->
        <path d="M190 46 A120 120 0 0 1 270 150"
              fill="none"
              stroke="#ef4444"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- AGUJA -->
        <line
            x1="150"
            y1="150"
            x2="<?php echo $aguja1['x']; ?>"
            y2="<?php echo $aguja1['y']; ?>"
            stroke="white"
            stroke-width="5"
            stroke-linecap="round"
        />

        <!-- CENTRO -->
        <circle
            cx="150"
            cy="150"
            r="10"
            fill="white"
        />

        <!-- ESCALA -->
        <text x="20" y="170" fill="white" font-size="18">0</text>
        <text x="126" y="25" fill="white" font-size="18">-15</text>
        <text x="228" y="170" fill="white" font-size="18">-30</text>

    </svg>

    <div class="gauge-valor">
        <?php echo number_format($graficartemp,1); ?>
    </div>

    <div class="gauge-label">
        Potencia que recibe cliente
        <br />
        Señal RX
    </div>

    </div>

    <!-- =====================================================
         GAUGE 2
    ====================================================== -->

    <div class="gauge-box">

    <svg width="300" height="220">

        <!-- FONDO -->
        <path d="M30 150 A120 120 0 0 1 270 150"
              fill="none"
              stroke="#1e293b"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- VERDE -->
        <path d="M30 150 A120 120 0 0 1 110 46"
              fill="none"
              stroke="#22c55e"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- AMARILLO -->
        <path d="M110 46 A120 120 0 0 1 190 46"
              fill="none"
              stroke="#facc15"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- ROJO -->
        <path d="M190 46 A120 120 0 0 1 270 150"
              fill="none"
              stroke="#ef4444"
              stroke-width="30"
              stroke-linecap="round"/>

        <!-- AGUJA -->
        <line
            x1="150"
            y1="150"
            x2="<?php echo $aguja2['x']; ?>"
            y2="<?php echo $aguja2['y']; ?>"
            stroke="white"
            stroke-width="5"
            stroke-linecap="round"
        />
        <!-- CENTRO -->
        <circle
            cx="150"
            cy="150"
            r="10"
            fill="white"
        />

        <!-- ESCALA -->
        <text x="20" y="170" fill="white" font-size="18">0</text>
        <text x="126" y="25" fill="white" font-size="18">-15</text>
        <text x="228" y="170" fill="white" font-size="18">-30</text>

    </svg>

    <div class="gauge-valor">
        <?php echo number_format($graficartemp2,1); ?>
    </div>

    <div class="gauge-label">
        Potencia que envia cliente
        <br />
        Señal TX
    </div>

    </div>

</div>

</div>

              </td>
            </tr>
          </tbody>
        </table>
		  
      </td>
    </tr>
  </tbody>
</table>
	
	<?php 
				$Resultados = $Resultados +1;
				//$separador = "PARA";
				//$separada = explode($separador, $separada[0]);
				//$pal = explode(" ",$separada[1]);
				//$a = count($pal);
				//echo <br/>;
              	
					
				}
				  
				//}
	?>
                <br />
	
	<?php 
	
/* =====================================================
   LIMPIAR VALORES
===================================================== */



	function limpiar_valor($valor){

    preg_match('/-?\d+(\.\d+)?/', $valor, $coincidencia);

    $valor = isset($coincidencia[0])
        ? floatval($coincidencia[0])
        : 0;

    /* LIMITAR */
    if($valor < -30){ $valor = -30; }
    if($valor > 0){ $valor = 0; }

    return $valor;
}
	
/* =====================================================
   FUNCION AGUJA
===================================================== */

function generar_aguja($valor){

    /*
        ESCALA:

        0    = IZQUIERDA
        -15  = CENTRO
        -30  = DERECHA
    */

    $progreso = abs($valor) / 30;

    /*
        -180 = izquierda
        -90  = arriba
        0    = derecha
    */

    $angulo = -180 + ($progreso * 180);

    $radio   = 120;
    $centroX = 150;
    $centroY = 150;

    $x = $centroX + cos(deg2rad($angulo)) * $radio;
    $y = $centroY + sin(deg2rad($angulo)) * $radio;

    return array(
        "x" => $x,
        "y" => $y
    );
}
			} 
			if ($oltconfiguracion === 'no') {
				?>
				<div class="panel-dark">No existe OLT configurada.</div>
<?php 
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
