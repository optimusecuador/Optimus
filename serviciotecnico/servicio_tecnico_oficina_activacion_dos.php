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
      <a href="index.php"><i data-lucide="wrench"></i> Servicio Técnico</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">INFRAESTRUCTURA</summary>
      <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i> MikroTik</a>
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
									
if (isset($_POST['ip'])) 
{
	$codigo_contrato=$_POST['contrato_manual'];
	$numero=$_POST['numero'];
	$codigo=$_POST['codigo'];
	$tarjeta['tarjeta'];
	$service_port=$_POST['service_port'];
	$ip=$_POST['ip'];
	$nombre_cliente=$_POST['nombre_cliente'];
	$subida=$_POST['subida'];
	$bajada=$_POST['bajada'];
	$vlan=$_POST['vlan'];
	$interface=$_POST['interface'];
	$tarjeta=$_POST['tarjeta'];
	$posicion=$_POST['posicion'];
	$serial=$_POST['serial'];
	$nodo=$_POST['nodo'];
}
	//$port = 22;
//	$connectionmikrotik = ssh2_connect($host, $port);
//	if (!$connectionmikrotik) {
//		die("No se pudo establecer la conexión SSH.");
//	}
//	if (!ssh2_auth_password($connectionmikrotik, $u, $p)) {
//		die("La autenticación SSH falló.");
//	}
//		else
//	{
//	$okmikrotik="ONLINE.png";
//		//echo "la coneccin se ha establesido mikrotik ";
//	}
$clientemostrar = "0";
$olt = "0";
$ponmostrar =  "0";
$plan = "0";
$numerocliente = "0";
$vlan = "0";
$puerto = "0";
$puertoimprimir = "0";
$plan = "0";
$megas = "0";
//-- buscar planes
$estado = "mensual";
$sql = "SELECT * from `productos` WHERE `periodo` LIKE '$estado' order by fechaing DESC";
$result2 = mysqli_query($con, $sql);
//-- BUSCAR IP
		


//-- BUSCAR PON PARA CODIGO DE ELIMINACION
		$sqlbbe = "SELECT * from `servicio_alta_nuevo` WHERE `pon` LIKE '$ponmostrar' order by unico ASC";
			$codigobbe = mysqli_query($con, $sqlbbe);
			
			while($crowbbe = mysqli_fetch_assoc($codigobbe))
        {	
				$poneliminar = $crowbbe['pon'];
		}
		
//se saca el ultimo clente da la olt
		$sqlbb = "SELECT * from `servicio_alta_nuevo` WHERE `olt` LIKE '$olt' order by unico ASC";
			$codigobb = mysqli_query($con, $sqlbb);
			
			while($crowbb = mysqli_fetch_assoc($codigobb))
        {	
				$numerocliente = $crowbb['numerocliente']+1;
		}
//-- sacar la vlande la tarjeta
		$sqlbf = "SELECT * from `olt` WHERE `olt` LIKE '$olt' order by unico ASC";
			$codigobf = mysqli_query($con, $sqlbf);
			
			while($crowbf = mysqli_fetch_assoc($codigobf))
        {	
				$vlan = $crowbf['vlan'];
		}
		
		
	
//--SACAR EL USUARIIO
		//$usuario = $_SESSION['password'];
//		$sqlu = "SELECT * from `personal` WHERE `codigo` LIKE '$usuario' order by fecha DESC";
//		$codigou = mysqli_query($con, $sqlu);
//		while($crowu = mysqli_fetch_assoc($codigou))
//        {	
//			$nombreu = $crowu['nombres']." ".$crowu['apellidos'];
//		}
		//-- busquda para mostrar registro
		$sqlss= "SELECT * from `servicio_alta_nuevo` order by unico ASC";
		$codigoss = mysqli_query($con, $sqlss);
		//-- busquda para ultimo registro
		$sqlS = "SELECT * from `servicio_alta_nuevo` order by unico ASC";
		$codigoS = mysqli_query($con, $sqlS);
		while($crowS = mysqli_fetch_assoc($codigoS))
        {	
			//$vlan = $crowS['vlan'];
			$puerto = $crowS['puerto']+1;
			$puerto2 = $puerto +1;
			$ipgestion = $crowS['ipgestion'];
			$ipgestionac = $crowS['ipgestion'];
			$pon = $crowS['pon'];
			$unico = $crowS['unico'];
			$cliente = $crowS['cliente'];
			
			
		}
		////-- buscar para ver elpuertolibre y asignar
//		$sqlu = "SELECT * from `servicio_alta_nuevo` order by puerto ASC";
//		$codigou = mysqli_query($con, $sqlu);
//		$puertocontrol="0";
//		while($crowu = mysqli_fetch_assoc($codigou))
//        {	
//			//$vlan = $crowS['vlan'];
//			$puerto = $crowS['puerto']+1;
//			$puerto2 = $puerto +1;
//			$ipgestion = $crowS['ipgestion'];
//			$ipgestionac = $crowS['ipgestion'];
//			$pon = $crowS['pon'];
//			$unico = $crowS['unico'];
//			$cliente = $crowS['cliente'];
//			
//			
//		}
		
		//-- busquda para autocompletado
		$sqlcom = "SELECT * from `clienteasignar` order by fecha DESC";
		$codigocomp = mysqli_query($con, $sqlcom);
		while($crowa = mysqli_fetch_assoc($codigocomp))
        {	
			$equipo = $crowa['cliente'];
			array_push($array, $equipo);
			$equipo2 = $crowa['codigo'];
			array_push($array2, $equipo2);
		}
		//-- busquda para autocompletado olt
		$sqlolt = "SELECT * from `olt` order by olt DESC";
		$codigoolt = mysqli_query($con, $sqlolt);
		while($crowolt = mysqli_fetch_assoc($codigoolt))
        {	
			$equipo3 = $crowolt['olt'];
			//array_push($array3, $equipo3);
			
		}
		//-- busquda para autocompletado pasa seriales o pon
		$sqlse = "SELECT * from `series` order by fecha DESC";
		$codigose = mysqli_query($con, $sqlse);
		while($crowse = mysqli_fetch_assoc($codigose))
        {	
			$equipo2 = $crowse['serie'];
			//array_push($array2, $equipo2);
			
		}?>
      <div>
        <table width="100%"  align="center">
          <tbody>
            <tr>
              <td align="center"><div class="esquinas_redondeadas">
                &nbsp;
                <h2  id="optimus">ACTIVACION DE CLIENTES </h2>
              </div></td>
            </tr>
            <tr>
              
            </tr>
            <tr>
              <td align="center"><?php 
			$codigo_contrato="vacio";
			$puerto_manual="vacio";
			$producto_manual="vacio";
				  
			if (isset($_POST['codigo']) OR isset($_POST['contrato_manual'])) 
                        {
                            
				if (isset($_POST['contrato_manual'])) 
                {
					$codigo_contrato=$_POST['contrato_manual'];
					$puerto_manual=$_POST['puerto_manual'];
					$producto_manual=$_POST['producto_manual'];
				}
				else
				{
					$codigo_contrato=$_POST['codigo'];
				}
                            
                            $sqlcontratos = "SELECT * from `contratos` WHERE `numero` LIKE '$codigo_contrato' order by fecha DESC";
                            $resultcontratos = mysqli_query($con, $sqlcontratos);
                            while ($crowcontratos = mysqli_fetch_assoc($resultcontratos)) 
                            {
                                $nombre_contrato = $crowcontratos['nombres'];
                                $nombre_contrato  =str_replace(' ', '-', $nombre_contrato);
                                $nombre_contrato  = "ONT-".$nombre_contrato;
                                $producto = $crowcontratos['producto'];
								$cliente = $crowcontratos['cliente'];
								$nodo = $crowcontratos['nodo'];
                            }
                            $sqlproducto = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
                            $resultproducto = mysqli_query($con, $sqlproducto);
                            while ($crowproducto = mysqli_fetch_assoc($resultproducto)) 
                            {
                                $subida = $crowproducto['megass'];
                                $bajada = $crowproducto['megasb'];
                            }
                        
			
			
			
			?>
	
                  <div class="grilla_listado">
                    <table width="95%" align="center" class="tabla-comic">
                      <tbody>
                        
                        <tr>
                          <td valign="middle">
							  <?php
				// SELECCIONO OLT
						$port = 22;
						$sqlolt = "SELECT * from `olt_conexion` WHERE `nodo` LIKE '$nodo'";
						$resultolt = mysqli_query($con, $sqlolt);
						while($crowolt = mysqli_fetch_assoc($resultolt))
						{
							$host_olt=$crowolt['ip'];
							$u_olt=$crowolt['usuario'];
							$p_olt=$crowolt['contrasena'];
						}	
				// EJECUTAR COMANDOS DE ACTIVACION DE OLT 
                    $connection = ssh2_connect($host_olt, $port);
					if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
							die("La autenticación SSH falló.");
					}else
                    {
					if (isset($_POST['codigo'])) 
                	{
						
					
					// SACAR INFORMACION DE OLT
					// Ejecutar un comando remoto recuperacion informacion olt para saber si existe una olt por activar
					$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display ont autofind all'."\n";
					$stream = ssh2_exec($connection, $command);
					stream_set_blocking($stream, true);
					$output = stream_get_contents($stream);
					$output;
					$cadena_buscada   = 'ONTs do not exist';
					$posicion_coincidencia = strpos($output, $cadena_buscada);
					}
					else
					{
					$output ="ffff";
					$cadena_buscada   = 'ONTs do not exist';
					$posicion_coincidencia = strpos($output, $cadena_buscada);	
					}
					if ($posicion_coincidencia === false) 
					{
    					if (isset($_POST['codigo'])) 
                	{
						$output;
                        // saco ytarjeta y puerto
                        $separador = "F/S/P";
                        $separada = explode($separador, $output);
                        $separada[1]; 
                        $separador = "Ont";
                        $control = $separada[1];
                        $separadaf = explode($separador, $control);
                        $puertoytarjeta = $separadaf[0];
						$puertoytarjetapuestooriginal = $separadaf[0];
                        $puertoytarjeta  =str_replace(' ', '', $puertoytarjeta);
					}
                        echo "TARJETA Y PUERTO : ";echo $puertoytarjeta = substr($puertoytarjeta, 1);	
                        $puertoytarjetapuestooriginal  = preg_replace('(0-9 /)', '', $puertoytarjetapuestooriginal);
						$puertoytarjetapuestooriginal =str_replace(' ', '-', $puertoytarjetapuestooriginal);
						$puertoytarjetapuestooriginal =str_replace(':', '-', $puertoytarjetapuestooriginal);
						$puertoytarjetapuestooriginal =str_replace('-', '', $puertoytarjetapuestooriginal);
						$mi_matriz1 = str_split($puertoytarjetapuestooriginal);
						//print_r ($mi_matriz1);
						$longitud = $count = count($mi_matriz1);
						$puertoytarjetapuestooriginal = "";
						for ($u = 0; $u < $longitud; $u++) 
                        {
							if($mi_matriz1[$u] == "1" OR $mi_matriz1[$u] == "2" OR $mi_matriz1[$u] == "3" OR $mi_matriz1[$u] == "4" OR $mi_matriz1[$u] == "5" OR $mi_matriz1[$u] == "6" OR $mi_matriz1[$u] == "7" OR $mi_matriz1[$u] == "8" OR $mi_matriz1[$u] == "9" OR $mi_matriz1[$u] == "0" OR $mi_matriz1[$u] == "/")
							{
								$u;
								$puertoytarjetapuestooriginal = $puertoytarjetapuestooriginal.$mi_matriz1[$u];
							}
							else
							{
								
							}
						}
						
						
						$puertoytarjetapuestooriginal;
							  	?>
                                        <br>
                                        <?php
                                        // saco posicion de la ont
                                        $separador = "Number";
                                        $separada = explode($separador, $output);
                                        $separada[1]; 
                                        $separador = "F/S/P";
                                        $control = $separada[1];
                                        $separadaf = explode($separador, $control);
                                        $posicion = $separadaf[0];
                                        $posicion  =str_replace(' ', '', $posicion);
                                        echo "ONT DISPONIBLE POR ACTIVAR : ";echo $posicion = substr($posicion, 1);
                                         ?>
                                        <br>
                                        <?php
                                        // saco numero de serie del equipo
                                        $separador = "SN";
                                        $separada = explode($separador, $output);
                                        $separada[1]; 
                                        $separador = "Password";
                                        $control = $separada[1];
                                        $separadaf = explode($separador, $control);
                                        $serie = $separadaf[0];
                                        $serie  =str_replace(' ', '', $serie);
                                        echo "SERIE DE LA ONT : ";echo $serie = substr($serie, 1);
                                         
                                        //separar serie
                                        $separador = "(";
                                        $separadaserie = explode($separador, $serie);
                                        //separar terjeta y puerto
                                        $separador = "/";
                                        $separadaf = explode($separador, $puertoytarjeta);
                                        //echo $separadaf[0];echo $separadaf[1];
                                        $puerto_puesto =$separadaf[2]; 
                                        $separadafdos = (int)$separadaf[2];
                                        //$separadaf[2] = substr($separadaf[2], 0, 1);
                                        // BUSCAMOS EL RANGO DE IP Y EL VLAN EN LA BASE DE DATOS
                                        $puertoytarjeta = substr($puertoytarjeta, 0, -2);
                                        $sqlolt = "SELECT * from `olt` WHERE `olt` LIKE '$puertoytarjeta' order by olt DESC";
            							$resultolt = mysqli_query($con, $sqlolt);
                                        while ($crowolt = mysqli_fetch_assoc($resultolt)) 
                                        {
                                            $olt_olt = $crowolt['olt'];
                                            $ip_base = $crowolt['ipinicio'];
                                            $vlan_base = $crowolt['vlan'];
                                        }
                                        $olt_olt_olt = $separadaf[0]."/".$separadaf[1];
                                        
                                        // Ejecutar un comando remoto recuperacion service port
                                        $connection = ssh2_connect($host_olt, $port);
					if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
							die("La autenticación SSH falló.");
					}else
                                        {
					$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display service-port all'."\n";
					?>
                                        <br>
                                        <?php
                                        $stream = ssh2_exec($connection, $command);
					stream_set_blocking($stream, true);
					$output = stream_get_contents($stream);
					$output;
                                        $separador = "-----------------------------------------------------------------------------";
                                        $divicion = explode($separador, $output);
                                        $divicion[5];
                                        $divicion2  =str_replace(' ', '-', $divicion[5]);
                                        $divicion2;
                                        
                                        $separador = "\r\n";
                                        $divicion3 = explode($separador, $divicion[5]);
                                        $divicion3[8];
                                        $count = count($divicion3);
                                        $j = 1;
                                        for ($i = 1; $i < $count; $i++) 
                                        {
                                        	$divicion3[$i];
                                        	$divicion2  =str_replace(' ', '-', $divicion3[$i]);
                                        	$divicion2;
                                        	$separador = "-";
                                        	$divicion2 = explode($separador, $divicion2);
                                        	//$divicion2[6];
                                        	for ($u = 0; $u <= 1000; $u++) 
                                       		{
                                       		if (isset($divicion2[$u])) 
                                       		{
                                        	if($divicion2[$u] != "")
                                        	{
                                           		$divicion2[$u];
                                           		$service_port_a[$j] = $divicion2[$u];
                                           		$j = $j+1;
                                           		$u = 1000;
                                        	}
                                        	}
                                        	}
                                        }
                                        
                                        $service_port_a[0] = 0;
                                        $l=0;
                                        
                                        }
                                        for ($u = 0; $u <= 10000; $u++) 
                                       		{
                                           		$comparacion = $service_port_a[$u]+1;
                                           		$l=$u+1;
                                           		if ($comparacion == $service_port_a[$l])
                                           		{
                                           		}
                                           		else
                                           		{
                                           		$service_port_a[$u];
                                           		echo "SERVICE PORT DISPONIBLE: "; echo $serviceportfinal = $comparacion;
                                           		$u = 10000;
                                           		}
                                        	
                                        	}
						
                                       //ORDENAR Y SACAR EL SERVICE PORT FALTANTE
                                       //SACAR LA POSICION PARA ARMAR LA IP
                                        // Ejecutar un comando remoto recuperacion service port
                                        $connection = ssh2_connect($host_olt, $port);
					if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
							die("La autenticación SSH falló.");
					}else
                                        {
					//$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display service-port port 0/1/4'"\n";
					$command = 'enable'."\n".'config'."\n".'scroll 512'."\n".'display service-port port '.$puertoytarjetapuestooriginal."\n";
					?>
                                        <br>
                                        <?php
										echo "EQUIPOS CONFIGURADOS EN ESTA TARJETA: ";
										?>
										<br />
										<?php
										echo "-------------------------------------------------------------";
										?>
										<br />
										<?php
                                        $stream = ssh2_exec($connection, $command);
										stream_set_blocking($stream, true);
										$output = stream_get_contents($stream);
										$output;
										$separadap = explode("\r\n", $output);
										$count = count($separadap);
										$k = 0;
										for($i = 0; $i < $count; $i++)
										{
										if (isset($separadap[$i])) 
										{
											//VERIFICO SI EL ARRAY TIENE LA PALABRA ACTIVE DE LA ONT
											//$pop = strpos($separada[$i], "active");
											
											if (strpos($separadap[$i], "common") == true)
											{
												echo $separadap[$i];
												$separadapuesto = explode("/" , $puertoytarjetapuestooriginal);
												$puertoytarjetapuesto = $separadapuesto[0]."/".$separadapuesto[1]." "."/".$separadapuesto[2];
												$puestotarjeta = explode($puertoytarjetapuesto , $separadap[$i]);
												$puestotarjeta[1];
												$temp =str_replace(' ', '-', $puestotarjeta[1]);
												$temp;
												$separador = "-";
                                          		$temparray = explode($separador, $temp);
												$ll=0;
												for ($p = 0; $p < 999; $p = $p +1) 
												{
													if($temparray[$p] == "")
													{
														
													}else
													{
														$temparray[$p];
														$imprimir_puesto[$k] = $temparray[$p];
														$p = 1000;
													}
												}
												
                                          		$k++;
												?>
										<br />
										<?php
											}
										}
										
										
										}
										echo "-------------------------------------------------------------";
										?>
										<br />
										<?php
                                        $puerto_puesto = substr($puerto_puesto, 0, 1);
                                        $separador = "/".$puerto_puesto;
                                        $divicion = explode($separador, $output);
                                        $puesto = $count = count($divicion);
                                        //$k = 1;
                                        //for ($p = 4; $p < $puesto; $p = $p +2) 
//                                        {
//                                          $divicion[$p]; 
//                                          $divicion[$p] = str_replace(' ', '-', $divicion[$p]);
//                                          $separador = "-";
//                                          $puestodos = explode($separador, $divicion[$p]);
//                                          $imprimir_puesto[$k] = $puestodos[1];
//                                          $k++;
//                                        }
                                        if (isset($imprimir_puesto)) 
											{
    										
											//$imprimir_puesto[0]=0;
											sort($imprimir_puesto);
												
											}
                                       if (isset($imprimir_puesto[1])) 
											{
    										 for ($u = 0; $u <= 10000; $u++) 
                                       			{
                                           		//echo $imprimir_puesto[$u];echo "/";
												$comparacion = (int)$imprimir_puesto[$u]+1;
                                           		$l=$u+1;
                                           		if ($comparacion == $imprimir_puesto[$l])
                                           		{
                                           		}
                                           		else
                                           		{
                                           		$imprimir_puesto[$u];
                                           		$imprimirfinal = $comparacion;
                                                        echo "SEGMENTO DE RED : ";echo $ip_mikrotik = $ip_base.".".$imprimirfinal;
                                           		$u = 10000;
                                           		}
                                                }
										   
											}
											else
									   		{
										   		$imprimirfinal = 1;
                                                echo "SEGMENTO DE RED : ";echo $ip_mikrotik = $ip_base.".".$imprimirfinal;
                                           		$u = 10000;
									   		}
                                        //$divicion2  =str_replace(' ', '-', $divicion[5]);
                                        //$divicion2;
                                        }     
                                                
                                        ?>
                                        <br>
                                        <?php
						//MOSTRAR NODO PARA CTIVACION
						 
						echo "NODO A SER ACTIVADO: "; echo $nodo;
						 ?>
					  <script>alert('!!!!!!!!!!!!!!!!!!!! El nodo en que va activar su equipo es: <?php echo $nodo?> , Verificar el nodo antes de continuar !!!!!!!!!!!!!!!!!!!!!!!!');</script>
					  <?php
						?>
                         <br>
                         <?php
						//FIN DE MOSTRAR NODO PARA ACTIVACION
										echo "COMANDOS A SER EJECUTADOS";
							  			?>
                                        <br>
                                        <?php
                                        // EJECUTAR COMANDOS DE ACTIVACION DE OLT UNO
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                            echo $command = 'enable'."\n".'config'."\n".'interface gpon '.$separadaf[0]."/".$separadaf[1]."\n".'ont add '.$separadafdos.' '.$imprimirfinal.' sn-auth '.'"'.$separadaserie[0].'"'.' omci ont-lineprofile-id 1 ont-srvprofile-id 1 desc '.'"'.$nombre_contrato.'"'."\n"."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        }
                                            
                                          ?>
                                        <br>
                                        <?php
										// EJECUTAR COMANDOS DE ACTIVACION DE OLT DOS
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                             echo $command = 'enable'."\n".'config'."\n".'interface gpon '.$separadaf[0]."/".$separadaf[1]."\n".'ont port native-vlan '.$separadafdos.' '.$imprimirfinal.' eth 1 vlan '.'101'."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        }
                                           
                                        ?>
                                        <br>
                                        <?php
                                        // EJECUTAR COMANDOS DE ACTIVACION DE OLT TRES
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                            echo $command = 'enable'."\n".'config'."\n".'service-port '.$serviceportfinal.' vlan '.$vlan_base.' gpon '.$puertoytarjeta.' ont '.$imprimirfinal.' gemport 1 multi-service user-vlan '.'101'.' tag-transform translate'."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        }
                                            
                                        ?>
                                        <br>
                                        <?php
                        				// EJECUTAR COMANDOS DE ACTIVACION DE OLT CUATRO
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                            echo $command = 'enable'."\n".'config'."\n".'service-port desc '.$serviceportfinal.' description "'.$nombre_contrato.'"'."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        }                   
						
                                       ?>
                                        <br>
                                        <?php
                        				// EJECUTAR COMANDOS DE ACTIVACION DE OLT CINCO
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                            echo $command = 'enable'."\n".'config'."\n".'service-port '.$serviceportfinal.' inbound traffic-table index '.$subida.' outbound traffic-table index '.$bajada."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        }               
						
                                       ?>
                                        <br>
                                        <?php
										// EJECUTAR COMANDOS DE ACTIVACION DE OLT SEIS
                                        
                                        $connection = ssh2_connect($host_olt, $port);
										if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {
										die("La autenticación SSH falló.");
										}else
                                        {
                                            
                                            echo $command = 'enable'."\n".'config'."\n".'save'."\n";
                                            $stream = ssh2_exec($connection, $command);
                                            stream_set_blocking($stream, true);
                                            $output = stream_get_contents($stream);
                                            $output;
                                            $posicion_coincidencia = strpos($output, "exists ");
 
                                            //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                                            if ($posicion_coincidencia === false) {
                                                
                                            } 
                           
                                            //if(se encuentra SN already exists )
                                            //{
                                              //  borro ont y vuelvo a activar
                                            //}
                                            
                                           
                                            ?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                        <img src="../images/<?php echo $okrespaldo; ?>" alt="" width="84" height="60"/>
                                        <br>
                                        <?php
                                            
                                        } 
                                            
                                      ?>
                                        <br>
                                        <?php
										// SELECCIONO MIKROTIK
										$sqlem = "SELECT * from `mikrotik` WHERE `nodo` LIKE '$nodo'";
										$resultem = mysqli_query($con, $sqlem);
										while($crowem = mysqli_fetch_assoc($resultem))
										{
											$host=$crowem['ip'];
											$u=$crowem['usuario'];
											$p=$crowem['contrasena'];
										}
										$port = 22;
										$connectionmikrotik = ssh2_connect($host, $port);
										if (!$connectionmikrotik) {
											die("No se pudo establecer la conexión SSH.");
										}
										if (!ssh2_auth_password($connectionmikrotik, $u, $p)) {
											die("La autenticación SSH falló.");
										}
											else
										{
										$okmikrotik="ONLINE.png";
											//echo "la coneccin se ha establesido mikrotik ";
										}
                                        echo "CREAR MIKROTIK : ";
                                        echo $command = 'ip firewall address-list add list="clientes_cuenca" address='.$ip_mikrotik.' comment="'.$nombre_contrato.'"'."\n";
                                        // Ejecutar un comando remoto recuperacion informacion mikrotik
                                        //$command = 'ip firewall address-list print where list~"clientes_cuenca"';
                                        $stream = ssh2_exec($connectionmikrotik, $command);
                                        stream_set_blocking($stream, true);
                                        $output = stream_get_contents($stream);
                                        $output;
										// SE ADICIONA EL CONYTRATO PARA MONITOREO
										$connectionmikrotik = ssh2_connect($host, $port);
										if (!$connectionmikrotik) {
											die("No se pudo establecer la conexión SSH.");
										}
										if (!ssh2_auth_password($connectionmikrotik, $u, $p)) {
											die("La autenticación SSH falló.");
										}
											else
										{
										$okmikrotik="ONLINE.png";
											//echo "la coneccin se ha establesido mikrotik ";
										}
                                        echo "CREAR MONITOREO MIKROTIK : ";
                                        echo $command = '/tool netwatch add host='.$ip_mikrotik.' timeout=1s interval=00:01:00 up-script="/log error \"'.$nombre_contrato.' El host está UP\"" down-script="/log error \"'.$nombre_contrato.' El host está DOWN\""'."\n";
                                        $stream = ssh2_exec($connectionmikrotik, $command);
                                        stream_set_blocking($stream, true);
                                        $output = stream_get_contents($stream);
                                        $output;
					?>
                                        <br>
                                        <?php
                                            echo "Comando ejecutado correctamente";
                                            ?>
                                                <img src="../images/ONLINE.png" alt="" width="84" height="60"/>
							  <?php
                                        echo "CREAR MIKROTIK : ";
                                        echo $commandsiete = 'ip firewall address-list add list="clientes_cuenca" address='.$ip_mikrotik.' comment="'.$nombre_contrato.'"'."\n";
           
						
						$estadoserie = "noencontrado";
						$sql = "SELECT * from `series` WHERE `serie` LIKE '$separadaserie[0]'";
						$resultpa = mysqli_query($con, $sql);
						while($crowp = mysqli_fetch_assoc($resultpa))
						{	
							//ACTUALIZAR TABLA SERIES
							$estadoserie = "encontrado";
							$sqlip = "UPDATE series SET contrato='$codigo_contrato', asignado='$cliente', bodega='$usuario', fecha='$fecha' WHERE serie='$separadaserie[0]'";
							$Result1 = mysqli_query($con, $sqlip);
						}
						if ($estadoserie == "noencontrado")
						{
							//SI NO ENCUENTRA EL EQUIPO HAY QUE CREARLO PARA QUE DE ADVERTENCIA DE EQUIPO DESCONOCIDO
							$sql = " INSERT INTO `series` ( `producto`, `fecha`, `serie`, `bodega`, `estado`, `asignado`, `contrato`, `documento` ) VALUES ( 'no_disponible', '$fecha', '$separadaserie[0]', '$usuario', 'sin_existencia', '$cliente', '$codigo_contrato', 'sin_documento')"; 
							mysqli_query($con, $sql);
						}
						//ACTUALIZO CONTRATO CON IP PUERTO Y SERIAL
						$puerto_gestion = "9090";
						$monitoreo = "si";
						$sqlip = "UPDATE contratos SET ip='$ip_mikrotik', puerto_gestion='$puerto_gestion', router='$separadaserie[0]', monitoreo='$monitoreo' WHERE numero='$codigo_contrato'";
						mysqli_query($con, $sqlip);
    				} 
					else 
					{
	 					echo "NO Existe ont para ser activada!!!!";
                        ?>
                        <img src="../images/ONLINE.png" alt="" width="84" height="60"/>
							  
						<?php
                     }
					}
							  
					//$separador = "time";
					//$separada = explode($separador, $output);
					//$separador = "second";
					//$separadat = explode($separador, $separada[2]);
							?>
							</td>
                          <td valign="middle">&nbsp;</td>
                          <input type="hidden" name="procesar" value="procesar"> 
                        </tr>
                        <tr>
                          <td valign="middle">&nbsp;</td>
                          <td valign="middle">&nbsp;</td>
                        </tr>
                      </tbody>
                  </table>
                    <p>&nbsp;</p>
                  </div>
				  <?php }?></td>
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
