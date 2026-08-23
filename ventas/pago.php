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
$tabla = "ventas";
$total = "0";
$url_image = "";
$codigo = "0";
$abono = "0";
$ultimafactura ="0";
$tipofactura = "mensual";
$estado = "cancelado";
$vacioint = 0;
$vacio = "vacio";
//$_SESSION['foto']="no";
if (isset($_SESSION['codigocliente'])) 
{
	$codigo = $_SESSION['codigocliente'];
}
//-- bbuscar personal para sacar serie y caja
	$personal = $_SESSION['password'];
	$sqlp = "SELECT * from personal WHERE `contrasena` LIKE '$personal' order by codigo DESC";
	$resultp = mysqli_query($con, $sqlp); 
	while($crowp = mysqli_fetch_assoc($resultp))
    {	
						
		$serie = $crowp['serie'];
		$caja = $crowp['caja'];
	}	
	
		  
//-- buscar si existe factura ya capturada	
	$tipodocumento = "Pago de Factura";
	$accion = "pago";
	$sqlf = "SELECT * from documento_reservado WHERE (`serie` LIKE '$serie') AND (`caja` LIKE '$caja') AND (`tipo` LIKE '$tipodocumento') AND (`usuario` LIKE '$personal') order by id ASC";
	$resultf = mysqli_query($con, $sqlf); 
	$numfilas = $resultf->num_rows;
	
	if($numfilas == 0)
	{//--si no existe para esa caja documentos reservados
		
//-- buscar la ultima factura emitieda con esa serie y caja
		$tipodocumento = "Pago de Factura";
		$sqluf = "SELECT * from registro WHERE (`hora` LIKE '$tipodocumento') AND (`serie` LIKE '$serie') AND (`caja` LIKE '$caja') AND (`accion` LIKE '$accion') order by unico ASC";
		$resultuf = mysqli_query($con, $sqluf); 
		while($crowuf = mysqli_fetch_assoc($resultuf))
    	{	
						
			$ultimafactura = (int)$crowuf['codigo'];

		}
		$ultimafactura = $ultimafactura + 1;
		$ultimafactura = sprintf('%09d', $ultimafactura);
		
		
//-- grabar en documentos temporales
		$stmt = $con->prepare("INSERT INTO documento_reservado ( documento, serie, caja, tipo, usuario) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('sssss', $ultimafactura, $serie, $caja, $tipodocumento, $personal);
		$stmt->execute();

	}
	else//-- si existe documento reservado se hace esto
	{
		while($crowf = mysqli_fetch_assoc($resultf))
    	{	
						
			$ultimafactura = (int)$crowf['documento'];
			$ultimafactura = sprintf('%09d', $ultimafactura);
//			
//			//$ultimoid = $crowuf['id'];
		}
//		//$ultimafactura = $ultimafactura + 1;
//			
//			if (isset($_SESSION['control'])) 
//			{
//			$foto = $_SESSION['control'];
//				
//				if($foto == "si")
//					{
//					$ultimafactura = $ultimafactura;
//					$ultimafactura = sprintf('%09d', $ultimafactura);
//					}
//				else
//				{
//			$ultimafactura = $ultimafactura + 1;
//			$ultimafactura = sprintf('%09d', $ultimafactura);
//			//-- grabar en documentos temporales el nuevo registro
//			$stmt = $con->prepare("INSERT INTO documento_reservado ( documento, serie, caja, tipo, usuario) VALUES (?, ?, ?, ?, ?)");
//			$stmt->bind_param('sssss', $ultimafactura, $serie, $caja, $tipodocumento, $personal);
//			$stmt->execute();
//				}
//					
//			}
//			else
//			{
//				
//				$ultimafactura = $ultimafactura + 1;
//				$ultimafactura = sprintf('%09d', $ultimafactura);
//			//-- grabar en documentos temporales el nuevo registro
//			$stmt = $con->prepare("INSERT INTO documento_reservado ( documento, serie, caja, tipo, usuario) VALUES (?, ?, ?, ?, ?)");
//			$stmt->bind_param('sssss', $ultimafactura, $serie, $caja, $tipodocumento, $personal);
//			$stmt->execute();
//			}

		
	}

		
		
		
if (isset($_GET['codigo'])) 
{
   			$codigo=$_GET['codigo'];
			//$url_image=$_GET['url_image'];
			//$image=$_GET['image'];
			if (isset($_GET['contrato'])) 
			{
				$_SESSION['contratodos']=$_GET['contrato'];
				$numero=$_GET['contrato'];
			}
			else
			{
				$numero=$_SESSION['contratodos'];
			}
			
			
			$clientefac=$_GET['cliente'];
			$_SESSION['codigocliente']=$_GET['codigo'];
	
			$sqlr = "SELECT * from `registro_pagos` WHERE `ruc_ci` LIKE '$clientefac'";
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
			$sql = "SELECT * from `ventas` WHERE (`id` LIKE '$codigo') AND (`cliente` LIKE '$clientefac') order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			$numfilas = $result->num_rows;
			if ($numfilas >= 2)
					{
						$tipofactura = "normal";
						
					}
			
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$codigo = $crow['id'];
						$codigoactualizar = $crow['id'];
						$cliente = $crow['cliente'];
						$total = $total + $crow['total'];
						$abono = $abono + $crow['abono'];
						$recibo = $crow['recibo'];
						$accion="pago";
						$producto = $crow['producto'];
						}
		
	
		
		
	$sql2 = "SELECT * from `cuentas` order by numero ASC";
	$result2 = mysqli_query($con, $sql2);

?>
				  
<?php
////--buscar la nueva factura version 2.0
//				  
//	//-- buscar la ultima factura emitieda con esa serie y caja
//		$tipodocumento = "Pago de Factura";
//		$sqluf = "SELECT * from registro WHERE (`hora` LIKE '$tipodocumento') AND (`serie` LIKE '$serie') AND (`caja` LIKE '$caja') order by unico ASC";
//		$resultuf = mysqli_query($con, $sqluf); 
//		while($crowuf = mysqli_fetch_assoc($resultuf))
//    	{	
//						
//			$ultimafactura = (int)$crowuf['codigo'];
//
//		}
//		$ultimafactura = $ultimafactura + 1;
//		$ultimafactura = sprintf('%09d', $ultimafactura);
//	//-- grabar en documentos temporales
//		$stmt = $con->prepare("INSERT INTO documento_reservado ( documento, serie, caja, tipo, usuario, cliente, fecha, valor, codigo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
//		$stmt->bind_param('sssssssss', $ultimafactura, $serie, $caja, $tipodocumento, $personal, $cliente, $fecha, $total, $codigo);
//		$stmt->execute();
//	
//	//-- actualizar ventas y registrar la factura
//				  
//		$sqli = "UPDATE ventas SET abono='$total',estado='$estado', numerorecibo='$ultimafactura', tipodocumento='$tipodocumento', serie='$serie', caja='$caja' WHERE id='$codigo'";
//		mysqli_query($con, $sqli);
//
//		$sql = " INSERT INTO `registro` ( `id`, `codigo`, `fecha`, `accion` , `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `proveedor`, `producto`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `bodega`, `seccion`, `observacion`) VALUES ( '$password', '$factura', '$fecha', '$accion', '$cantidad_transaccion', '$saldo_anterior', '$cantidad', '$usuario', '$codigo', '$institucion', '$factura', '$concepto', '$numerorecibo', '$serie', '$caja', '$vacioint', '$vacio', '$vacio', '$vacio')";
//		mysqli_query($con, $sqli);
//		//no se que pason buscar la nueva factura version 2.0					  
//				  
//?>
				  
				  
				  
				  
<?php //-- GENERAR CLAVE DE SRI?>				  
<?php  
//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
    {
  $_SESSION['empresamail']=$crowem['empresa'];
  $empresa = $crowem['empresa'];
  $ruc = $crowem['ruc'];//esto es nuevo ruc
  $logo = $crowem['logo'];
  $colorfondo = $crowem['colorfondo'];
 
  //#24a5dd

}
date_default_timezone_set("America/Guayaquil");
$dia= date("d");
$mes=date("m");
$año=date("Y");

    $unionSerie = $caja.$serie;
    $Calve_Acesso="";
    $fecha_Emision = $dia.$mes.$año;
    //  $Tipo_Comprobante ="10"; 
    $Tipo_Comprobante ="01"; // se debe crar una tabla para configurar el tipo
    $Ruc_Empresa =$ruc;
    $Tipo_Ambente = 1; // se debe crear una tabla para configurar crud factura
    // $Serie_Factura ="001001";
    $Serie_Factura =$unionSerie; // de 6 digitos
    $Numero_Comprobante = $ultimafactura; // es de 9 digitos y estan 6
    $Codigo_Numerico = 12345678;
    $Tipo_Emision =1;
    // $Digito_Verificador ="6";
  // echo "La Cave de Acceso es: ".$Calve_Acesso;
  //  echo"la fecha es".$Fecha_Prueba("d");
  // echo $ruc;
  
  // echo "   Numero_Comprobante ".$Numero_Comprobante;
  // echo "es el numero de documento".$doc;
  // echo "la serie es  $Serie_Factura "
  $param= $fecha_Emision .$Tipo_Comprobante .$Ruc_Empresa. $Tipo_Ambente
  .$Serie_Factura .$Numero_Comprobante. $Codigo_Numerico. $Tipo_Emision;
  // echo "parametro \n".$parametro;
  $parametro= strrev($param);
  // echo " esta alrevez ".$parametro;
  if (is_numeric($parametro) ) {
   "El numero de la clave es:".  strlen($parametro)."<br>";
  //  strlen($parametro);
  //  echo " es numerico";
   $a = strlen($parametro);
   $totalParametro = 0;
   $factor=2;
   $sum = 0;
   $factor = 2;
   for( $i=0;$i<strlen($parametro); $i++ )
   {
    // echo"se va sumando".$i."+".$parametro;
    // echo"substr".substr( $parametro,$i,1);
    // echo"substr multiplica".substr( $parametro,$i,1)* $factor;
    $sum = $sum + substr( $parametro,$i,1)* $factor;
    // echo" es la suma ".$sum ;
    if ( $factor == 7 ) {
      $factor =2;
    }else{
      $factor++;
    }
   }
  "El valor de modulo es: ". $validador = 11 - ($sum % 11). "<br>" ;

  if ($validador == 11) {
    $validador=0;
  }
  if ($validador == 10) {
    $validador=1;
  }

$Digito_Verificador = $validador;
" la clave de acseso es: ".$Calve_Acesso = $fecha_Emision .$Tipo_Comprobante .$Ruc_Empresa. $Tipo_Ambente
  .$Serie_Factura .$Numero_Comprobante. $Codigo_Numerico. $Tipo_Emision.$Digito_Verificador;
 
  }
  if (strpos($parametro,'.')) {
   echo"hay puntos";
  }
 
?>
<?php //crear html?>
<?php
/*"xml a probar";

crear(); //Creamos el archivo
// leer();  //Luego lo leemos

//Para crear el archivo
function crear(){
  $xml = new DomDocument('1.0', 'UTF-8');

  $xml_fac = $xml-> createElement('factura');
  $cabecera = $xml->createAttribute('id');
  $cabecera->value='comprobante';
  $cabecerav=$xml->createAttribute('version');
  $cabecerav->value='1.00';

  $xml_inf = $xml->createElement('infotributaria');
  $xml_amb = $xml->createElement('ambiente','1');
  $xml_tip = $xml->createElement('tipoEmision','1');
  $xml_raz = $xml->createElement('razonssocial','Accesnet');
  $xml_nom = $xml->createElement('nombrecomercial','Accesnet');
  $xml_ruc = $xml->createElement('ruc','0102917689001');

  $xml_cla = $xml->createElement('claveAcceso','12458547584521254584569632512458745215478523698969');
  $xml_doc = $xml->createElement('codDoc','01');
  $xml_est = $xml->createElement('estab','001');
  $xml_emi = $xml->createElement('ptoEmi','001');
  $xml_sec = $xml->createElement('secuencial','000001234');
  $xml_dir = $xml->createElement('DirreccionMatriz','Camino viejo a Baños');

/////////////////
  $xml_def = $xml->createElement('infoFactura');
  $xml_fec = $xml->createElement('fechaEmision','18/09/2022');
  $xml_des = $xml->createElement('dirEstablecimiento','via a baños');
  $xml_obl = $xml->createElement('obligadoContabilidad','SI');
  $xml_ide = $xml->createElement('tipoIdentificacionComprador','05');
  $xml_rco = $xml->createElement('razonSocialComprador','Jonathan Naula');
  $xml_idc = $xml->createElement('identificacionComprador','0105782320');
  $xml_tsi = $xml->createElement('totalSinImpuetos','200');
  $xml_tds = $xml->createElement('totalDescuentos','0.00');

///////////aqui estoy programando
  $xml_imp = $xml->createElement('totalConImpuesto');
  $xml_tim = $xml->createElement('totalImpuesto');
  $xml_tco = $xml->createElement('codigo','2');
  $xml_cpr = $xml->createElement('codigoPorcentaje','0');
  $xml_bas = $xml->createElement('BaseImponible','0.00');
  $xml_val = $xml->createElement('valor','2');

  $xml_pro = $xml->createElement('propina','0');
  $xml_imt = $xml->createElement('ImporteTotal','1.00');
  $xml_mon = $xml->createElement('moneda','DOLAR');

  $xml_pgs = $xml->createElement('pagos');
  $xml_pag = $xml->createElement('pago');
  $xml_fpa = $xml->createElement('formaPago','01');
  $xml_tot = $xml->createElement('total','1.00');
  $xml_pla = $xml->createElement('plazo','30');
  $xml_uti = $xml->createElement('unidadTiempo','dias');


  $xml_dts = $xml->createElement('detalles');
  $xml_det = $xml->createElement('detalle');
  $xml_cop = $xml->createElement('codigoPrincipal','plan1');
  $xml_dcr = $xml->createElement('descripcion','50mb');
  $xml_can = $xml->createElement('cantidad','1');
  $xml_pru = $xml->createElement('precioUnitario','35.00');
  $xml_dsc = $xml->createElement('descuento','0.00');
  $xml_tsm = $xml->createElement('precioTotalSinImpuetos','35.00');

  $xml_ips = $xml->createElement('impuestos');
  $xml_ipt = $xml->createElement('impuesto');
  $xml_cdg = $xml->createElement('codigo','2');
  $xml_cpt = $xml->createElement('codigoPorcentaje','2');
  $xml_ttrf = $xml->createElement('tarifa','0.00');
  $xml_bssi = $xml->createElement('baseImponible','1.00');
  $xml_vlr = $xml->createElement('valor','0.00');


  $xml_ifa = $xml->createElement('infoAdicional');
  $xml_cp1 = $xml->createElement('campoAdicional','prueba@gmail.com');
  $atributo = $xml->createAttribute('nombre');
   $atributo->value='email';

  
  





  $xml_inf = $xml_fac->appendChild( $xml_inf);
  $xml_amb = $xml_fac->appendChild( $xml_amb);
  $xml_tip = $xml_fac->appendChild( $xml_tip);
  $xml_raz = $xml_fac->appendChild( $xml_raz);
  $xml_nom = $xml_fac->appendChild( $xml_nom);
  $xml_ruc = $xml_fac->appendChild( $xml_ruc);


  $xml_cla = $xml_fac->appendChild( $xml_cla);
  $xml_doc = $xml_fac->appendChild( $xml_doc);
  $xml_est = $xml_fac->appendChild( $xml_est);
  $xml_emi = $xml_fac->appendChild( $xml_emi);
  $xml_sec = $xml_fac->appendChild( $xml_sec);
  $xml_dir = $xml_fac->appendChild( $xml_dir);


  $xml_def = $xml_fac->appendChild( $xml_def);
  $xml_fec = $xml_fac->appendChild( $xml_fec);
  $xml_des = $xml_fac->appendChild( $xml_des);
  $xml_obl = $xml_fac->appendChild( $xml_obl);
  $xml_ide = $xml_fac->appendChild( $xml_ide);
  $xml_rco = $xml_fac->appendChild( $xml_rco);
  $xml_idc = $xml_fac->appendChild( $xml_idc);
  $xml_tsi = $xml_fac->appendChild( $xml_tsi);
  $xml_tds = $xml_fac->appendChild( $xml_tds);

////////////////////////////////////////
  $xml_imp = $xml_fac->appendChild( $xml_imp);
  $xml_tim = $xml_fac->appendChild( $xml_imp);
  $xml_tco = $xml_fac->appendChild( $xml_tco);
  $xml_cpr = $xml_fac->appendChild( $xml_cpr);
  $xml_bas = $xml_fac->appendChild( $xml_bas);
  $xml_val = $xml_fac->appendChild( $xml_val);


  $xml_pro = $xml_fac->appendChild( $xml_pro);
  $xml_imt = $xml_fac->appendChild( $xml_imt);
  $xml_mon = $xml_fac->appendChild( $xml_mon);

  $xml_pgs = $xml_fac->appendChild( $xml_pgs);
  $xml_pag = $xml_fac->appendChild( $xml_pag);
  $xml_fpa = $xml_fac->appendChild( $xml_fpa);
  $xml_tot = $xml_fac->appendChild( $xml_tot);
  $xml_pla = $xml_fac->appendChild( $xml_pla);
  $xml_uti = $xml_fac->appendChild( $xml_uti);


  $xml_dts = $xml_fac->appendChild( $xml_dts);
  $xml_det = $xml_fac->appendChild( $xml_det);
  $xml_cop = $xml_fac->appendChild( $xml_cop);
  $xml_dcr = $xml_fac->appendChild( $xml_dcr);
  $xml_can = $xml_fac->appendChild( $xml_can);
  $xml_pru = $xml_fac->appendChild( $xml_pru);
  $xml_dsc = $xml_fac->appendChild( $xml_dsc);
  $xml_tsm = $xml_fac->appendChild( $xml_tsm);



  $xml_ips = $xml_fac->appendChild( $xml_ips);
  $xml_ipt = $xml_fac->appendChild( $xml_ipt);
  $xml_cdg = $xml_fac->appendChild( $xml_cdg);
  $xml_cpt = $xml_fac->appendChild( $xml_cpt);
  $xml_ttrf = $xml_fac->appendChild( $xml_ttrf);
  $xml_bssi = $xml_fac->appendChild( $xml_bssi);
  $xml_vlr = $xml_fac->appendChild( $xml_vlr);


$xml_fac->appendChild($xml_ifa);
$xml_ifa->appendChild($xml_cp1);
$xml_cp1->appendChild($atributo);


/////////////////////////////////////////
  $xml_fac->appendChild($cabecera);
  $xml_fac->appendChild($cabecerav);
  $xml->appendChild($xml_fac);


  $xml->formatOutput = true;
  $el_xml = $xml->saveXML();
  $xml->save('../no_firmado/factura001.xml');
  //Mostramos el XML puro
  "<p><b>El XML ha sido creado.... Mostrando en texto plano:</b></p>".
       htmlentities($el_xml)."
<hr>";

}*/

?>
				  
				  
				  
				  
				  
				  
	<div class="cliente-table-panel">	
		<div>
    <h2 style='color:white'>PAGO VENTAS</h2>
</div>
      <table width="100%"  align="center" class="table-dark">
        <tbody>
          <tr>
            <td align="center"></td>
          </tr>
          <tr>
            <td align="center">
			<!--<form action="../facturacionphp/controladores/ctr_venta.php" method="post" name="form1" id="form1">-->
				<form action="confirmacion_pago.php" method="post" name=	"form1" id="form1">
              <div class="grilla_listado">
                
                  <table width="95%" align="center" class="tabla-comic">
                    <tbody>
                      <tr>
                        <td colspan="2" style="text-align: center" class="encabezado">FACTURA</td>
                        <td colspan="2" style="text-align: center" class="encabezado">CLIENTE</td>
                      </tr>
                      <tr>
                        <td style="text-align: center"><strong>
							<br>
							DOCUMENTO:</strong></td>
                        <td style="text-align: center">
							<br>
							<input name="facturam" type="text" required  class="clientes-input-small" id="facturam" value="<?php echo $ultimafactura;?>" size="15" maxlength="255" readonly="readonly"/>
                          <input name="doc" type="hidden" id="doc" value="<?php echo $doc;?>">
                          <input name="factura" type="hidden" id="factura" value="<?php echo $ultimafactura;?>">
                          <input name="seriem" type="text" required  class="clientes-input-small" id="seriem" value="<?php echo $serie;?>" size="5" maxlength="10" readonly="readonly"/>
                          <input name="serie" type="hidden" id="serie" value="<?php echo $serie;?>">
                          <input name="cajam" type="text" required  class="clientes-input-small" id="cajam" value="<?php echo $caja;?>" size="5" maxlength="10" readonly="readonly"/>
                        <input name="caja" type="hidden" id="caja" value="<?php echo $caja;?>"></td>
                        <td style="text-align: center"><strong>
							<br>
							CEDULA : </strong></td>
                        <td style="text-align: center">
							<br>
							<input name="cliente" type="text" class="clientes-input-small" id="cliente" value="<?php echo $cliente;?>" size="15"readonly="readonly"></td>
                        </tr>
                      <tr>
                        <td style="text-align: center"><p><strong>TOTAL:</strong></p></td>
                        <td style="text-align: center"><input name="precio" type="text"  class="clientes-input-small" id="precio" value="<?php echo $total;?>" size="6" maxlength="255"readonly="readonly"/></td>
                        <td style="text-align: center"><p>CLIENTE:</p></td>
                        <td style="text-align: center"><input name="element_2" type="text"  class="clientes-input-small" id="element_2" value="<?php 
					  
					  $sql3 = "SELECT * from clientes WHERE `codigo` LIKE '$cliente' order by fecha DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            			{	
						
						$nombres = $crow3['nombres']." ".$crow3['apellidos'];
						$mail = $crow3['mail'];
						$telefono = $crow3['telefono1'];
						}																				$cadena_buscada="@";
					  		$posicion_coincidencia = strrpos($mail, $cadena_buscada);																						//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
if ($posicion_coincidencia === false)
	{
    $mail = "";;
    }
					  
					  echo $nombres;?>"readonly="readonly"/></td>
                        </tr>
                      <tr>
                        <td style="text-align: center"><strong>SALDO:</strong></td>
                        <td style="text-align: center"><input name="saldo" type="text"  class="clientes-input-small" id="saldo" value="<?php echo $saldo = $total-$abono;?>" size="6" maxlength="255"readonly="readonly"/></td>
                        <td style="text-align: center"><strong>TELEFONO:</strong></td>
                        <td style="text-align: center"><input name="telefono" type="text"class="clientes-input-small" id="telefono" value="<?php echo $telefono;?>" size="12"></td>
                        </tr>
                      <tr>
                        <td style="text-align: center"><strong>VALOR A CANCELAR :</strong></td>
                        <td style="text-align: center"><input name="valor" type="text" required class="clientes-input-small" id="valor" value="<?php echo $saldo = $total-$abono;?>" size="6"></td>
                        <td style="text-align: center"><strong>MAIL:</strong></td>
                        <td style="text-align: center"><input name="mail" type="text" required="required" class="clientes-input-small" id="mail" value="<?php echo $mail;?>"/>
                        <a href="https://www.verifyemailaddress.org/" target="_blank">Verificar</a></td>
                        </tr>
                      <tr>
                        <td style="text-align: center"><strong>PRODUCTO:</strong></td>
                        <td style="text-align: center"><input id="precio2" name="precio2"  class="clientes-input-small" type="text" maxlength="255" value="<?php echo $producto;?>"readonly="readonly"/></td>
                        <td colspan="2" style="text-align: center">&nbsp;</td>
                        </tr>
                      <tr>
                        <td colspan="4" style="text-align: center" class="encabezado">FORMA DE PAGO</td>
                        </tr>
                      <tr>
                        <td align="center" style="text-align: center"><strong>
							<br>
							RECIBO DE PAGO NROº</strong></td>
                        <td align="center" style="text-align: center">
							<br>
							<input name="numerorecibo" type="text" id="numerorecibo" value="Sin_Recibo" class="clientes-input-small"></td>
                        <td align="center" style="text-align: center"><strong>
							<br>
							INSTITUCION : </strong></td>
                        <td align="center" style="text-align: center">
							<br>
							<select name="institucion" id="institucion" class="clientes-input-small">
                          <?php 
			  while($crowc = mysqli_fetch_assoc($result2))
            		{	
				  		echo $password = $_SESSION['password'];
				  		echo $responsable = $crowc['responsable'];
						if ($password == $responsable)
						{
							?>
                          <option selected value=<?php echo $cuenta = $crowc['id'];?>><?php echo $institucion = $crowc['institucion']; ?></option>
                          <?php
							
						}
				  		else
						{
							?>
                          <option value=<?php echo $cuenta = $crowc['id'];?>><?php echo $institucion = $crowc['institucion']; ?></option>
                          <?php
						}
							
						
					}
			  ?>
                        </select></td>
                        </tr>
                      
                      <tr>
                        <td colspan="4" align="center" ><p>
                          
                          
                          <?php
						  if($url_image == "")
						  {
						  ?>
                          
                          <p><a href="subir_foto.php?codigo=<?php echo $codigo;?>"><img src="<?php  echo $recibo?>" width="99" height="99" alt=""/></a></p>
                          
                          <?php }else{
						  ?>
                          <p><img src="<?php  echo $url_image;?>" width="99" height="99" alt=""/></p>
                          <?php }?>
                          
                          </td>
                        </tr>
                      <tr>
                        <td colspan="4" style="text-align: center"><input id="element_1" name="element_1" class="element text small" type="text" maxlength="255" value="<?php echo $codigo;?>"  style="visibility:hidden"/>
                          <input id="accion" name="accion" class="element text small" type="text" maxlength="255" value="<?php echo $accion;?>" style="visibility:hidden"/>
                          <input id="tipofactura" name="tipofactura" class="element text small" type="text" maxlength="255" value="<?php echo $tipofactura;?>" style="visibility:hidden"/></td>
                        </tr>
                      <tr>
                        <td colspan="4" style="text-align: center"><p class="buttons">
                          <input name="ultimafactura" type="hidden" id="ultimafactura" value="<?php echo $ultimafactura;?>" />
                          <input name="image" type="hidden" id="image" value="<?php echo $image;?>" />
                          <input name="url_image" type="hidden" id="url_image" value="<?php echo $url_image;?>" />
                          <input type="hidden" name="form_id" value="<?php echo $codigo;?>" />
							<input name="numero" type="hidden" id="numero" value="<?php echo $numero;?>" />
                         
							<input name="submit2" type="submit" class="boton-azul" id="submit2" value="GUARDAR">
                          </p></td>
                        </tr>
                      </tbody>
                  </table>
                <p>&nbsp;</p>
            </div>
            </form></td>
          </tr>
        </tbody>
    </table>
    </div>
      <p>&nbsp;</p>
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
