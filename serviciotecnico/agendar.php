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
	<div class="panel-dark">
    <h2 class="clientes-title">AGENDAMIENTO</h2>
</div>
									<?php
            $descripcion = " ";
            $caso = 0;
            $colora = "";
            $filacolora = "0";
            $clientecodigo = 0;
            $contratoagendar = 0;
			$accion="ninguna";
            //--BUSCAR CAJA

            $sqlcaja = "SELECT * from `dispositivos_empresa` order by nombre DESC";
            $resultcaja = mysqli_query($con, $sqlcaja);
            //--recuperar reagendar

            //$accion=$_SESSION['accion'];
            if (isset($_GET['accion'])) {
              $accion = $_GET['accion'];
            }

            if (isset($_GET['reagendar'])) {
              //$documento3 =$_POST['documento3'];
              $variable = $_GET['reagendar'];
              list($tecnico, $id) = explode("/", $variable);
              $tecnico; // Imprime 11
              $id; // Imprime 02
              $sql6 = "UPDATE clienteasignar SET bodega='$tecnico' WHERE id='$id'";
              mysqli_query($con, $sql6);

              $sqlste = "SELECT * from `clienteasignar` WHERE `id` LIKE '$id'";
              $resulste = mysqli_query($con, $sqlste);
              while ($crowste = mysqli_fetch_assoc($resulste)) {
                $novedades = $crowste['novedades'];
                $nombrescliente = $crowste['cliente'];
                $fecha = $crowste['fecha'];
                $codigocli = $crowste['codigo'];
                $bodegacli = $crowste['bodega'];
              }
              $sqlpa = "SELECT * from `bodegas` WHERE `numero` LIKE '$bodegacli'";
              $resulpa = mysqli_query($con, $sqlpa);
              while ($crowpa = mysqli_fetch_assoc($resulpa)) {

                //$telefonowa = $crowpa['telefono'];
                $responsable = $crowpa['responsable'];
              }
              $sqlpaa = "SELECT * from `personal` WHERE `codigo` LIKE '$responsable'";
              $resulpaa = mysqli_query($con, $sqlpaa);
              while ($crowpaa = mysqli_fetch_assoc($resulpaa)) {

                //$telefonowa = $crowpa['telefono'];
                $telefonowat = $crowpaa['telefono1'];
                echo $telefonowat = "+593" . ltrim($telefonowat, "0");
              }
              $sqlcli = "SELECT * from `clientes` WHERE `codigo` LIKE '$codigocli'";
              $resulcli = mysqli_query($con, $sqlcli);
              while ($crowcli = mysqli_fetch_assoc($resulcli)) {
                $direccionwa = $crowcli['direccion'];
                $telefonowa = $crowcli['telefono1'] . " / " . $crowcli['telefono2'];
              }


              $sqlwa = "SELECT * from `apis`";
              $resulwa = mysqli_query($con, $sqlwa);
              while ($crowwa = mysqli_fetch_assoc($resulwa)) {
                $token = $crowwa['tokenwhatsapp'];
              }

              $sqlem = "SELECT * from `mail`";
              $resultem = mysqli_query($con, $sqlem);
              while ($crowem = mysqli_fetch_assoc($resultem)) {
                $logow = substr($crowem['logo'], 2);
                $imagent = $crowem['ip'] . $logow;
              }
              $texto = "Estimado instalador su Agendamiento de: " . $novedades . " se ha registrado satisfactoriamente , A nombre de: " . $nombrescliente . ", en la Direccion: " . $direccionwa . " Con Telefono: " . $telefonowa . ", Con Fecha: " . $fecha . ", Para mayor informacion Comunicarse al  NO RESPONDER ESTE MENSAJE";

              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.ultramsg.com/instance16295/messages/image",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "token=$token&to=$telefonowat&image=$imagent&caption=$texto&referenceId=hh&nocache=hh",
                CURLOPT_HTTPHEADER => array(
                  "content-type: application/x-www-form-urlencoded"
                ),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);
            }
            //--recuprar cliente de contrato instalacion nueva
            if (isset($_SESSION['direccioncontrato'])) {

              //$direccion = $_SESSION['direccioncontrato'];
              //$clientecodigo = $_SESSION['cedula'];
            } else {
              $direccion = "";
            }
            if (isset($_SESSION['nombrecontrato'])) {
              $nombrecontrato = $_SESSION['nombrecontrato'];
              $contratoagendar = $_SESSION['contratoagendar'];
              //$direccion = $_SESSION['direccioncontrato'];
              $accion = "agendar";
              $descripcion = "Instalacion Nueva";
              //$clientecodigo = $_SESSION['cedula'];
              $sqlaa = "SELECT * from `clientes` WHERE `nombres` LIKE '$nombrecontrato' order by fecha DESC";
              $resultaa = mysqli_query($con, $sqlaa);
              while ($crowaa = mysqli_fetch_assoc($resultaa)) {
                $clientecodigo = $crowaa['codigo'];
                $direccion = $crowaa['direccion'];
              }
            } else {
              $nombrecontrato = "";
            }

            //--SERVICIO TECNICO TEEFONICO
            if (isset($_GET['agendar'])) {
              $accion = "agendar";
              $descripcion = $_GET['descripcion'];
              $clienteagendar = $_GET['agendar'];
              $sqlaa = "SELECT * from `clientes` WHERE `nombres` LIKE '$clienteagendar' order by fecha DESC";
              $resultaa = mysqli_query($con, $sqlaa);
              while ($crowaa = mysqli_fetch_assoc($resultaa)) {
                $nombrecontrato = $crowaa['nombres'];
                $direccion = $crowaa['direccion'];
              }
            }
            if (isset($_GET['app'])) 
			{
              $accion = "agendar";
              $descripcion = $_GET['descripcion'];
              $clienteagendar = $_GET['app'];
              $clientecodigo = $_GET['app'];
              $sqlaa = "SELECT * from `clientes` WHERE `codigo` LIKE '$clienteagendar' order by fecha DESC";
              $resultaa = mysqli_query($con, $sqlaa);
              while ($crowaa = mysqli_fetch_assoc($resultaa)) 
			  {
                $nombrecontrato = $crowaa['nombres'];
                $direccion = $crowaa['direccion'];
                $contrasena = $crowaa['contrasena'];
              }
              $query22 = "DELETE FROM app_cliente WHERE cliente = '$contrasena'";
              $result22 = mysqli_query($con, $query22);
            }

            //-- REAGENDAR TODO
            if (isset($_GET['id'])) {
              $nombrecontrato = $_GET['id'];
              $registro = $_GET['registro'];
              $sqlr = "SELECT * from `clienteasignar` WHERE `id` LIKE '$registro'";
              $resultr = mysqli_query($con, $sqlr);
              while ($crowr = mysqli_fetch_assoc($resultr)) {

                $descripcion = $crowr['novedades'];
                $tecnico = $crowr['bodega'];
                //$codigobuscar = $crowr['codigo']; 
                $clientecodigo = $crowr['codigo'];
                $prioridad = $crowr['prioridad'];
                $contratoagendar = $crowr['contrato'];
                $accion = "reagendartodo";
              }
              $sqlaa = "SELECT * from `clientes` WHERE `codigo` LIKE '$clientecodigo' order by fecha DESC";
              //$sqlaa = "SELECT * from `clientes` WHERE `codigo` LIKE '$codigobuscar' order by fecha DESC";
              $resultaa = mysqli_query($con, $sqlaa);
              while ($crowaa = mysqli_fetch_assoc($resultaa)) {
                //$nombrecontrato = $crowaa['nombres'];
                $direccion = $crowaa['direccion'];
              }
            }
            //-*- CAMBIO DE DOMICILIO
            if (isset($_GET['numero_contrato'])) {

              $numerocontrato = $_GET['numero_contrato'];
              $contratoagendar = $_GET['contrato'];
              //					$sqlcd = "SELECT * from `contratos` WHERE `numero` LIKE '$numerocontrato'";
              //					$resultcd= mysqli_query($con, $sqlcd);
              //					while($crowcd = mysqli_fetch_assoc($resultcd))
              //					{	

              $clientecodigo = $numerocontrato;
              $sqlccc = "SELECT * from `clientes` WHERE `codigo` LIKE '$numerocontrato'";
              $resultccc = mysqli_query($con, $sqlccc);
              while ($crowccc = mysqli_fetch_assoc($resultccc)) {

                $nombrecontrato = $crowccc['nombres'];
                $direccion = $crowccc['direccion'];
                $descripcion = "Cambio de Domicilio";
              }
              //}

            }

            //-*- PON ROJO
            if (isset($_GET['numero_contrato_pon'])) {

              $numerocontrato = $_GET['numero_contrato_pon'];
              //$sqlcd = "SELECT * from `contratos` WHERE `numero` LIKE '$numerocontrato'";
              //					$resultcd= mysqli_query($con, $sqlcd);
              //					while($crowcd = mysqli_fetch_assoc($resultcd))
              //					{	

              $clientecodigo = $numerocontrato;
              $sqlccc = "SELECT * from `clientes` WHERE `codigo` LIKE '$numerocontrato'";
              $resultccc = mysqli_query($con, $sqlccc);
              while ($crowccc = mysqli_fetch_assoc($resultccc)) {

                $nombrecontrato = $crowccc['nombres'];
                $direccion = $crowccc['direccion'];
                $descripcion = "Pon Rojo";
              }
              //}

            }
            //-*- baaja velocidad
            if (isset($_GET['numero_contrato_velocidad'])) {

              $numerocontrato = $_GET['numero_contrato_velocidad'];
              $contratoagendar = $_GET['contrato'];
              //$sqlcd = "SELECT * from `contratos` WHERE `numero` LIKE '$numerocontrato'";
              //					$resultcd= mysqli_query($con, $sqlcd);
              //					while($crowcd = mysqli_fetch_assoc($resultcd))
              //					{	
              //						
              $clientecodigo = $numerocontrato;
              $sqlccc = "SELECT * from `clientes` WHERE `codigo` LIKE '$numerocontrato'";
              $resultccc = mysqli_query($con, $sqlccc);
              while ($crowccc = mysqli_fetch_assoc($resultccc)) {

                $nombrecontrato = $crowccc['nombres'];
                $direccion = $crowccc['direccion'];
                $descripcion = "Baja Velocidad";
              }
              //}

            }
            //-- varios
            if (isset($_GET['numero_contrato_varios'])) {

              $numerocontrato = $_GET['numero_contrato_varios'];
              $contratoagendar = $_GET['contrato'];
              //$sqlcd = "SELECT * from `contratos` WHERE `numero` LIKE '$numerocontrato'";
              //					$resultcd= mysqli_query($con, $sqlcd);
              //					while($crowcd = mysqli_fetch_assoc($resultcd))
              //					{	
              //						
              $clientecodigo = $numerocontrato;
              $sqlccc = "SELECT * from `clientes` WHERE `codigo` LIKE '$numerocontrato'";
              $resultccc = mysqli_query($con, $sqlccc);
              while ($crowccc = mysqli_fetch_assoc($resultccc)) {

                $nombrecontrato = $crowccc['nombres'];
                $direccion = $crowccc['direccion'];
                $descripcion = "";
              }
              //}

            }
            //-- agendar
            if (isset($_GET['accion'])) {

              $numerocontrato = $_GET['accion'];
              $nombrecontrato = "";
              $direccion = "";
              $descripcion = "";
            }



            //-*- susspeender 
            if (isset($_GET['retiro'])) {

              $numerocontrato = $_GET['retiro'];
              //$sqlcd = "SELECT * from `contratos` WHERE `numero` LIKE '$numerocontrato'";
              //					$resultcd= mysqli_query($con, $sqlcd);
              //					while($crowcd = mysqli_fetch_assoc($resultcd))
              //					{	
              //						
              $clientecodigo = $numerocontrato;
              $sqlccc = "SELECT * from `clientes` WHERE `codigo` LIKE '$numerocontrato'";
              $resultccc = mysqli_query($con, $sqlccc);
              while ($crowccc = mysqli_fetch_assoc($resultccc)) {

                $nombrecontrato = $crowccc['nombres'];
                $direccion = $crowccc['direccion'];
                $descripcion = "Retiro de Equipo";
              }
              //}

            }
            //}
            ?>
           
                      <?php $numero = "0";
                      $tabla = "clientes";
                      $tabla2 = "bodegas";
                      $tabla3 = "clienteasignar";
                      $tabla4 = "registro";
                      //-- busquda para autocompletado
                      $sqlcom = "SELECT * from `clientes` order by fecha DESC";
                      $codigocomp = mysqli_query($con, $sqlcom);
                      while ($crowa = mysqli_fetch_assoc($codigocomp)) {
                        $equipo = $crowa['nombres'];
                        //array_push($array, $equipo);
                        $equipo2 = $crowa['codigo'];
                        //array_push($array2, $equipo2);
                      }
                      //-buscar documento siguiente
                      $sqlst = "SELECT * from `serviciotecnico` order by fecha ASC";
                      $codigost = mysqli_query($con, $sqlst);
                      while ($crowst = mysqli_fetch_assoc($codigost)) {
                        $caso = $crowst['unico'] + 1;
                      }
					  
                      //$accion=$_SESSION['accion'];
                      if (isset($_GET['accion'])) {
                        $accion = $_GET['accion'];
                      }

                      $sql4 = "SELECT * from `" . $tabla4 . "` WHERE `accion` LIKE '$accion' order by fecha ASC";
                      $result4 = mysqli_query($con, $sql4);



                      while ($crowp = mysqli_fetch_assoc($result4)) {
                        $numero = $crowp['unico'] + 1;
                      }
                      $sql = "SELECT * from `" . $tabla . "` order by nombres ASC";
                      $result = mysqli_query($con, $sql);
                      $sql2 = "SELECT * from `bodegas`";
                      $result2 = mysqli_query($con, $sql2);
                      $result25 = mysqli_query($con, $sql2);
                      $result22 = mysqli_query($con, $sql2);
                      if (isset($_GET['nombres'])) {
                        $nombrecontrato = $_GET['nombres'];
                      }
                      ?>
                 




                

                      
                            
                             
                                  <p>
                                    <!-- MESSAGES --><!-- ADD TASK FORM -->
                                    <?php $sql3 = "SELECT * from `" . $tabla3 . "` order by fecha DESC";
                                    $result3 = mysqli_query($con, $sql3); ?>
                                  </p>
                                  <div>
                                    <div class="grilla_listado"></div>
                                      <div class="cliente-table-panel">
    <form action="agendarsave_task.php" method="post">
        <table width="100%" align="center" class="table-dark">
            <tbody>
                <tr>
                    <th align="center"><strong>CASO Nro:</strong></th>
                    <th align="center"><strong>CONTRATO: </strong></th>
                    <th align="center"><strong>CLIENTE:</strong></th>
                    <th align="center"><strong>DIRECCION:</strong></th>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <input name="documentov" type="text" disabled="disabled" required="required" class="clientes-input" id="documentov" value="<?php echo $caso; ?>" size="3">
                        <input name="productodos" type="hidden" id="productodos" value="<?php echo $nombrecontrato; ?>">
                        <input name="documento2" type="hidden" id="documento2" value="<?php echo $caso; ?>">
                    </td>
                    <td align="center" valign="top">
                        <input name="contrato" type="text" required="required" class="clientes-input" id="contrato" value="<?php echo $contratoagendar; ?>" size="3" readonly="readonly">
                    </td>
                    <td align="center" valign="top">
                        <input name="tag" disabled="disabled" required="required" id="tag2" value="<?php echo $nombrecontrato; ?>" size="20" class="clientes-input">
                        <br>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            var items = <?= json_encode($array) ?>

                            $("#tag").autocomplete({
                                source: items,
                                select: function(event, item) {
                                    var params = {
                                        equipo: item.item.value
                                    };
                                    $.get("getEquipo.php", params, function(response) {
                                        var json = JSON.parse(response);
                                        if (json.status == 200) {
                                            $("#nombre").html(json.nombre);
                                            $("#avatar").attr("src", json.icono);
                                        } else {

                                        }
                                    }); // ajax
                                }
                            });
                        });
                        </script>
                    </td>
                    <td align="center" valign="top">
                        <input name="direccion" type="hidden" id="direccion" value="<?php echo $direccion; ?>">
                        <input name="direccionv" type="text" disabled="disabled" required="required" id="direccionv" value="<?php echo $direccion; ?>" size="20" class="clientes-input">
                    </td>
                </tr>
                <tr>
                    <th align="center"><strong>MENSAJE:</strong></th>
                    <th align="center"><strong>PRIORIDAD:</strong></th>
                    <th align="center"><strong>FECHA Y HORA:</strong></th>
                    <th align="center"><strong>TECNICO:</strong></th>
                </tr>
                <tr>
                    <td align="center">
                        <select name="mensaje" id="mensaje" class="clientes-input">
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td align="center">
                        <select name="prioridad" id="prioridad" class="clientes-input">
                            <?php if ($prioridad == "1") { ?>
                            <option selected value="1">Urgente</option>
                            <option value="2">Medio</option>
                            <option value="3">Normal</option>
                            <?php
                            } else {
                            ?>
                            <option value="1">Urgente</option>
                            <option value="2">Medio</option>
                            <option value="3">Normal</option>
                            <?php
                            }
                            ?>
                            <?php if ($prioridad == "2") { ?>
                            <option selected value="2">Medio</option>
                            <option value="1">Urgente</option>
                            <option value="3">Normal</option>
                            <?php
                            }
                            ?>
                            <?php if ($prioridad == "3") { ?>
                            <option selected value="3">Normal</option>
                            <option value="2">Medio</option>
                            <option value="1">Urgente</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td align="center">
                        <input name="fecha" type="datetime-local" required class="clientes-input" id="fecha" >
                    </td>
                    <td align="center">
                        <select name="personal" id="personal" class="clientes-input">
                            <?php
                            while ($crowp = mysqli_fetch_assoc($result2)) {
                                $responsable = $crowp['responsable'];
                                $sqlreg = "SELECT * from `personal` WHERE `codigo` LIKE '$responsable'";
                                $resultreg = mysqli_query($con, $sqlreg);
                                while ($crowreg = mysqli_fetch_assoc($resultreg)) {
                                    $puestoinstalador = 0;
                                    $puestoinstalador =  $crowreg['puesto'];
                                }
                                if ($puestoinstalador == "instalador") {
                                    if ($tecnico == $crowp['numero']) {

                            ?>
                            <option selected value=<?php echo $codigo = $crowp['numero']; ?>><?php echo $producto = $crowp['nombre']; ?></option>
                            <?php
                                    } else {
                            ?>
                            <option value=<?php echo $codigo = $crowp['numero']; ?>><?php echo $producto = $crowp['nombre']; ?></option>
                            <?php
                                    }
                                }
                            }

                            ?>
                        </select>
                    </td>
                </tr>
                <?php  //if (isset($_GET['numero_contrato'])) 
                //{
                ?>
                <tr>
                    <th align="center"><strong>CAJA:</strong></th>
                    <th align="center"><strong>TRABAJO INTERNO:</strong></th>
                    <th align="center"><strong>DESCRIPCION:</strong></th>
                    <th align="center"><strong>UBICACION:</strong></th>
                </tr>
                <tr>
                    <td align="center" valign="middle">
                        <span style="text-align: center">
                            <select name="caja" id="caja" class="clientes-input">
                                <?php

                                while ($crowcaja = mysqli_fetch_assoc($resultcaja)) {
                                    if ($caja == $crowcaja['id']) {

                                ?>
                                <option selected value=<?php echo $crowcaja['id']; ?>><?php echo $crowcaja['nombre']; ?></option>
                                <?php
                                    } else {
                                ?>
                                <option value=<?php echo $crowcaja['id']; ?>><?php echo $crowcaja['nombre']; ?></option>
                                <?php
                                    }
                                }

                                ?>
                            </select>
                        </span>
                    </td>
                    <td align="center" valign="middle">
                        <select name="armadocaja" id="armadocaja" class="clientes-input">
                            <option value="no">No</option>
                            <option value="si">Si</option>
                        </select>
                    </td>
                    <td align="center" valign="middle">
                        <p>
                            <textarea name="description" required rows="2" class="clientes-input" id="description" placeholder="Ingrece Descripcion del Servicio Tecnico"><?php echo $descripcion; ?></textarea>
                        </p>
                    </td>
                    <td align="center" valign="middle">
                        <input name="ubicacion" type="text" disabled="disabled" required="required" id="ubicacion" value="<?php

                            $sqlub = "SELECT * from `contratos` WHERE `numero` LIKE '$contratoagendar'";
                            $resultub = mysqli_query($con, $sqlub);
                            while ($crowub = mysqli_fetch_assoc($resultub)) {

                            echo $absoluta = $crowub['absoluta'];
                             }
                            ?>" class="clientes-input">
                    </td>
                </tr>
                <?php //}
                ?>
                <tr>
                    <td colspan="4" align="center" style="padding-top: 20px;">
                        <p>
                            <input name="accion" type="hidden" id="accion" value="<?php echo $accion; ?>">
                            <input name="clientecodigo" type="hidden" id="clientecodigo" value="<?php echo $clientecodigo; ?>">
                        </p>
                        <p>
                            <span class="buttons">
                                <input name="submit2" type="submit" class="boton-azul" id="submit2" value="AGENDAR">
                            </span>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
									  </br>
                                    <p><!--//---SEPARAR POR TECNICO LOS SOPORTES-->
                                      <?php

                                      while ($crow22 = mysqli_fetch_assoc($result22)) {
										 $puesto = "Sin Puesto";

                                        $bodegacomparar = $crow22['responsable'];
                                        $sqlh = "SELECT * from `personal` WHERE `codigo` LIKE '$bodegacomparar'";
                                        $resulth = mysqli_query($con, $sqlh);
                                        while ($crowh = mysqli_fetch_assoc($resulth)) {
                                          $puesto = $crowh['puesto'];
                                        }
                                        //if ($puesto == "instalador" or $puesto == "admin") {
                                        if ($puesto == "instalador") {


                                      ?>
                                    </p>
                                    <div class="grilla_listado cliente-table-panel">
    <table width="100%" align="center" class="table-dark">
        <thead>
            <tr>
                <th colspan="6" align="center"></th>
            </tr>
            <tr>
                <th align="center" colspan="6">
                    <h2 class="cliente-table-title">
                        <?php $n = $crow22['nombre'];
                        echo strtoupper($n) ?>
                    </h2>
                </th>
            </tr>
            <tr>
                <th align="center" valign="top">ACCIONES</th>
                <th align="center" valign="top">PRIORIDAD</th>
                <th align="center" valign="top">CONT</th>
                <th align="center" valign="top">DESCRIPCION</th>
                <th align="center" valign="top">CLIENTE</th>
                <th align="center" valign="top">FECHA</th>
            </tr>
        </thead>
        <tbody>
            <?php





            // $query33 = "SELECT * FROM `bodegas`";
            //          $result33 = mysqli_query($con, $query33);   
            //          
            //          while($crow33 = mysqli_fetch_assoc($result33))   
            //        { 
            $crow22['numero'];
            $bodeganumero = $crow22['numero'];
            $sql4 = "SELECT * from `clienteasignar` WHERE `bodega` LIKE '$bodeganumero' order by fecha ASC";
            $result4 = mysqli_query($con, $sql4);
            while ($crowt = mysqli_fetch_assoc($result4)) {


                $crow22['numero'];

                if ($crowt['prioridad'] == "1") {
                    $color = "#FF0004";
                    $prioridadtexto  = "Urgente";
                }
                if ($crowt['prioridad'] == "2") {
                    $color = "#ffff00";
                    $prioridadtexto  = "Medio";
                }
                if ($crowt['prioridad'] == "3") {
                    $color = "#11b824";
                    $prioridadtexto  =  "Normal";
                }

                $foo = $crowt['novedades'];

                if (strpos($foo, 'Instalacion Nueva') !== false) {
                    $color = "#7371f0";
                    $prioridadtexto  = "Instalacion Nueva";
                }

                if (strpos($foo, 'Cambio de Domicilio') !== false) {
                    $color = "#fcf921";
                    $prioridadtexto  = "Cambio de Domicilio";
                }

                //if ($crowt['novedades'] == "Instalacion Nueva")
                //{
                //$color= "#7371f0";
                //$prioridadtexto  = "Instalacon Nueva";
                //}
                if ($filacolora == "0") {
                    $colora = "#c3acfa";
                    $filacolora = "1";
                } else {
                    $colora = "";
                    $filacolora = "0";
                }
                $clientecodigo = $crowt['cliente'];
            ?>
                <tr class="alternar" bgcolor="<?php echo $colora; ?>">
                    <td align="center" valign="top" bgcolor="<?php echo $color ?>"><ul>
                        <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle"> Acciones <b class="caret"></b> </a>
                            <ul class="dropdown-menu">
                                <?php /*?><li><a href="https://api.whatsapp.com/send?phone=+593984540102&text=Cliente,<?php
                                $clientecodigo = $crowt['cliente'];
                                $sql444 = "SELECT * from `clientes` WHERE `nombres` LIKE '%$clientecodigo%' order by fecha ASC";
                                $result444 = mysqli_query($con, $sql444);
                                while ($crowppp = mysqli_fetch_assoc($result444)) {
                                echo $n = $crowppp['nombres'] . "Direccion," . $crowppp['direccion'] . ",";
                                echo $crowppp['telefono1'] . ",";
                                 } ?>,
                                
            <?php echo $crowt['novedades']; ?>,
            Fecha <?php echo $crowt['fecha']; ?>" target="_blank">Whatsapp jefe</a></li><?php */?>
                                <?php /*?><li><a href="https://api.whatsapp.com/send?phone=+<?php echo $numerotecnico ?>&text=Cliente,<?php


                                $clientecodigo = $crowt['cliente'];
                                $sql444 = "SELECT * from `clientes` WHERE `nombres` LIKE '%$clientecodigo%' order by fecha ASC";
                                $result444 = mysqli_query($con, $sql444);
                                while ($crowppp = mysqli_fetch_assoc($result444)) {
                                echo $n = $crowppp['nombres'] . "Direccion," . $crowppp['direccion'] . ",";
                                echo $crowppp['telefono1'] . ",";
                                } ?>,
                                
            <?php echo $crowt['novedades']; ?>,
            Fecha <?php echo $crowt['fecha']; ?>" target="_blank">Watsapp Tecnico</a></li><?php */
                                
                                 ?>
                                <form action="agendar.php?id=<?php echo $clientecodigo ?>& registro=<?php echo $crowt['id'] ?>" method="POST" style="display:inline;"><button type="submit" class="boton-azul" >REAGENDAR</button>
                                </form>
                                <form action="confirmar_codigo.php?id=<?php echo $crowt['id'] ?> & accion=<?php echo $accion ?>" method="POST" style="display:inline;"><button type="submit" class="boton-azul" >ELIMINAR</button>
                                </form>
                              
                            </ul></td>
                    <td align="center" valign="top" bgcolor="<?php echo $color ?>"><?php echo $prioridadtexto; ?></td>
                    <td align="center" valign="top" class="alternar"><?php echo $contrato = $crowt['contrato']; ?></td>
                    <td align="center" valign="top" class="alternar"><?php echo $crowt['novedades']; ?></td>
                    <td align="center" valign="top" class="alternar"><?php
                     echo $clientecodigo = $crowt['cliente'];
                     $sql44 = "SELECT * from `clientes` WHERE `nombres` LIKE '%$clientecodigo%' order by fecha ASC";
                     $result44 = mysqli_query($con, $sql44);
                      while ($crowpp = mysqli_fetch_assoc($result44)) {
                      //$nombre = $crowpp['nombres'];
                      $codigoc = $crowpp['codigo'];
                      $telefono = $crowpp['telefono1'];
                       }
                       ?>
                    <p><?php echo $telefono; ?></p>
                    </td>
                    <td align="center" valign="top" class="alternar"><?php


                      $cadena = $crowt['fecha'];
                      $pieces = explode("T", $cadena);
                      $pieces[0]; // piece1
                      $pieces[1]; // piece2
                       echo $pieces[0];
                      echo "<br>";
                      echo "(" . $pieces[1] . ")";


                       //echo $fechaordenada; 
                       ?></td>
                </tr>
                <?php } //} 
            ?>
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>
                                <?php }
                                      } ?>
                                <p><span class="alternar">
                                    <?php  ?>
                                  </span></p>
                                 
                                <script type="text/javascript" src="../total/js_calendar/calendar.js"></script>
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
