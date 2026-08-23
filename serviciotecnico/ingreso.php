<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
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
if (isset($_POST['estadousuario'])) 
{
   	$estadousuario = $_POST['estadousuario'];
	if ($estadousuario == "incompleto")
	{
	?>
	<div>
	<h2 style='color:white'>NO PODRA DESCARGAR INVENTARIO PARA ESTE USUARIO, SOLO PUEDE ACTIVAR EL CONTRATO </h2>
	</div>
	<?php
	}
}	
?>
<?php
if (isset($_POST['contratonumero'])) 
{
   $contratomostrar = $_POST['contratonumero'];
}
?>
	<a href="listadoontactivacion.php?codigo=<?php echo $contratomostrar; ?>">ACTIVAR ONT</a>
	
				<pre id="log"></pre>
			</div>
		</div>
	</main>			
  <br>
            <?php
            $array = array();
            $array2 = array();
            $array3 = array();
            $facturas = "0";
            $estado = "0";
            $total = "0";
            $ip = "0";
            $producto = 0;
            $producto = "0";
            $ipgestion = "0";
            $foto1 = "../images/silueta.jpg";
            $foto2 = "../images/silueta.jpg";
            $foto3 = "../images/silueta.jpg";
            $foto4 = "../images/silueta.jpg";
            $foto5 = "../images/silueta.jpg";
            $producto = "Sin_Producto";
            $preciouno = 0;
            $preciodos = 0;
            $preciotres = 0;
            $sqlse = "SELECT * from `series`  WHERE (`producto` LIKE '$producto')order by serie DESC";
            $resultse = mysqli_query($con, $sqlse);


            //--BUSCAR SERIALES DE PRODUCTOS
            $tecnico = $_SESSION['password'];
            $sqlte = "SELECT * from `bodegas` WHERE `responsable` LIKE '$tecnico'";
            $resultte = mysqli_query($con, $sqlte);
            while ($crowpte = mysqli_fetch_assoc($resultte)) {
              $bodega = $crowpte['id'];
            }
            if (isset($_POST['seriales'])) {
              $producto = $_POST['producto'];
              $estadoserie = "disponible";
              $sqlse = "SELECT * from `series`  WHERE (`producto` LIKE '$producto') 
              AND (`bodega` LIKE '$bodega') AND (`asignado` LIKE '$estadoserie')order by serie DESC";
              $resultse = mysqli_query($con, $sqlse);
            }
            ?>


            <?php
            if (isset($_SESSION['mensaje'])) {
            } else {
              $_SESSION['mensaje'] = "0";
            }
            //-- BUSCAR NODO
            $sql55 = "SELECT * from `nodo` order by puesto DESC";
            $result55 = mysqli_query($con, $sql55);
            if (isset($_POST['cliente'])) {
              $cliente = $_POST['cliente'];
              $_SESSION['cliente'] = $cliente;
            }

            $tecnico = $_SESSION['password'];
            if (isset($_SESSION['contrato'])) {
              $contrato = $_SESSION['contrato'];
              $cliente = $_SESSION['cliente'];
            } else {
              $contrato = $_POST['cliente'];
              $cliente = $_POST['cliente'];
              $_SESSION['contrato'] = $contrato;
              $_SESSION['cliente'] = $cliente;
            }
            if ($_SESSION['mensaje'] == "1") {
              echo '<script type="text/javascript">';
              echo 'alert("!!! PRODUCTO INSUFICIENTE!!!");';
              //echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
              /*echo 'window.location = "../PRODUCTOS/productos.php";';*/
              echo '</script>';
              $_SESSION['mensaje'] = "0";
            }
            if ($_SESSION['mensaje'] == "2") {
              echo '<script type="text/javascript">';
              echo 'alert("!!! SE REQUIERE NUMERO DE SERIE!!!");';
              //echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
              /*echo 'window.location = "../PRODUCTOS/productos.php";';*/
              echo '</script>';
              $_SESSION['mensaje'] = "0";
            }
            if ($_SESSION['mensaje'] == "3") {
              echo '<script type="text/javascript">';
              echo 'alert("!!! SE REQUIERE NUMERO DE SERIE!!!");';
              //echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
              /*echo 'window.location = "../PRODUCTOS/productos.php";';*/
              echo '</script>';
              $_SESSION['mensaje'] = "0";
            }


            echo '<script type="text/javascript">';
            echo 'alert("VERIFICAR TODOS LOS DATOS ANTES DE PROCESAR");';
            //echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
            /*echo 'window.location = "../PRODUCTOS/productos.php";';*/
            echo '</script>';
            ?>


            <!-- MESSAGES -->
            <p>

              <?php
              $usuario = $_SESSION['password'];
              
				if (isset($_GET['contrato'])) 
				{
              	$numero = $_GET['contrato'];
            	}
				else
				{
					$numero = $_POST['contratonumero'];
				}
				
              //$numero = "0";
              $tabla = "productos";
              $tabla2 = "bodegas";
              $tabla3 = "tempserviciotecnico";
              $tabla4 = "registro";
              //$accion=$_SESSION['accion'];
              //if (isset($_GET['accion'])) 
              //{
              //$accion=$_GET['accion'];
              $accion = "serviciotecnico";
              //}


              //--buscar en cliente asignar el motivo y datos

              $sql444 = "SELECT * from `clienteasignar` WHERE `codigo` LIKE '%$cliente%' order by fecha ASC";
              $result444 = mysqli_query($con, $sql444);
              while ($crowp444 = mysqli_fetch_assoc($result444)) {
                $motivo = $crowp444['novedades'];
                $contratomostrar = $crowp444['contrato'];
                $armadocaja = $crowp444['armadocaja'];
              }
              //$contrato = $_POST['cliente'];
              $sql44 = "SELECT * from `contratos` WHERE `numero` LIKE '$numero' order by fecha ASC";
              $result44 = mysqli_query($con, $sql44);
              while ($crowp4 = mysqli_fetch_assoc($result44)) {
                $numero = $crowp4['numero'];
                $plan = $crowp4['producto'];
                $absoluta = $crowp4['absoluta'];
                $nodobusqueda = $crowp4['nodo'];
                $ipcontratos = $crowp4['ip'];
              }
              //$tabla3 = "task";

              $sql2 = "SELECT * from `" . $tabla2 . "`";
              $result2 = mysqli_query($con, $sql2);
echo "estoy aqui";echo $usuario;
              $sql = "SELECT * FROM `bodegas` WHERE `responsable` LIKE '$usuario'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($crowe = mysqli_fetch_assoc($result)) {
        $bodega = $crowe['numero'];
        $nombrebodega = $crowe['nombre'];
    }


              $bodegabuscar = "bodega" . $bodega;
              $stock = "0";
              $sql8 = "SELECT * from `" . $bodegabuscar . "` WHERE `cantidad` NOT LIKE '$stock' order by producto DESC";
              $result8 = mysqli_query($con, $sql8);

              //-- busquda para cargar producto en categoria de producto
              $verificar = "si";
              $sqlt = "SELECT * from `tipoproducto` WHERE `serviciotecnico` LIKE '$verificar'";
              $codigot = mysqli_query($con, $sqlt);
              while ($crowt = mysqli_fetch_assoc($codigot)) {
                $tipo = $crowt['codigo'];
              }

              $asignado = "disponible";
              $sql44 = "SELECT * from `series` WHERE (`bodega` LIKE '$bodega') and (`asignado` LIKE '$asignado') order by fecha ASC";
              $result44 = mysqli_query($con, $sql44);
              ?>

            </p>
	<?php
            $sql99 = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente'";
            $result99 = mysqli_query($con, $sql99);
            while ($crowc = mysqli_fetch_assoc($result99)) {
              $clientenombre = $crowc['nombres'];
              $codigo = $crowc['codigo'];
              $mail = $crowc['mail'];
              $direccion = $crowc['direccion'];
              $foto1 = $crowc['foto1'];
              $foto2 = $crowc['foto2'];
              $foto3 = $crowc['foto3'];
              $foto4 = $crowc['foto4'];
              $foto5 = $crowc['foto5'];
              $foto6 = $crowc['foto6'];
              $foto7 = $crowc['foto7'];
            }

            $sqlret = "SELECT * from `series` WHERE `asignado` LIKE '$codigo'";
            $resultret = mysqli_query($con, $sqlret);
            while ($crowret = mysqli_fetch_assoc($resultret)) {
              $equipo = $crowret['producto'];
            }
            ?>
			<?php
			if ($estadousuario == "incompleto")
			{
			}
			else
			{
			?>
            <table width="100%" align="center" class="tabla-comic">
              <tbody>
                <tr>
                  <td align="center">
                    <form action="ingreso.php" method="post" name="form1" id="form1">
                      PRODUCTO:
                      <select name="producto" id="producto" class="clientes-input-small">
                        <?php
                        $sql9 = "SELECT * from `productos` WHERE `tipo` LIKE '$tipo'";
                        $result9 = mysqli_query($con, $sql9);
                        $result99 = mysqli_query($con, $sql9);
                        while ($crow9 = mysqli_fetch_assoc($result9)) {
                          echo $productod = $crow9['codigo'];
                          $cantidadinv = "0";
                          echo $bodegabuscar;
                          $sqlt = "SELECT * from `" . $bodegabuscar . "` WHERE (`codigo` LIKE '$productod') AND (`cantidad` NOT LIKE '$cantidadinv')";
                          $resultt = mysqli_query($con, $sqlt);
                        ?>
                          <?php
                          while ($crowt = mysqli_fetch_assoc($resultt)) {
                            $aa = $crowt['codigo'];
                            $bb = $crowt['producto'];
                          ?>
                            <option value=<?php echo $crowt['codigo']; ?>><?php echo $crowt['producto']; ?></option>
                        <?php

                          }
                        }
                        ?>
                      </select>
                      <input name="contratonumero" type="hidden" id="contratonumero" value=<?php echo $numero ?>>
					  <input name="seriales" type="submit" class="boton-azul" id="seriales" value="Asignar">
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
            <p>&nbsp;</p>


            <form action="save_task.php" method="post" class="tabla-comic">
              <?php
              $sql = "SELECT * from `productos` WHERE `codigo` LIKE '$producto'";
              $result = mysqli_query($con, $sql);
              while ($crowe = mysqli_fetch_assoc($result)) {
                echo $crowe['producto'];
                $producto = $crowe['codigo'];
                $preciouno = $crowe['preciouno'];
                $preciodos = $crowe['preciodos'];
                $preciotres = $crowe['preciotres'];
              }

              ?>

              <table width="95%" align="center">
                <tbody>
                  <tr>
                    <td>
                      <table width="95%" align="center" class="tabla-comic">
                        <tbody>
                          <tr>
                            <td align="left">PRODUCTO:</td>
                            <td align="left"><input name="producto" type="text" required="required" id="producto" class="clientes-input-small" value="<?php echo $producto; ?>" size="10"></td>
                          </tr>
                          <tr>
                            <td align="left">CANTIDAD:</td>
                            <td align="left"><input name="title" type="text" required="required" id="title" size="10" class="clientes-input-small">
                              (Metros o Unidades)</td>
                          </tr>
                          <tr>
                            <td align="left">DESCRIPCION:</td>
                            <td align="left"><textarea name="description" cols="35" rows="1" class="form-control" id="description" placeholder="Descripcion del Producto"></textarea></td>
                          </tr>
                          <tr>
                            <td align="left"><?php /*?><table width="200" align="center">
                <tbody>
                  <tr>
                    <td>PRODUCTO:</td>
                    <td><input name="tag" id="tag">
                      <br>
                      <img src="" id="avatar">
                    <script type="text/javascript">
		$(document).ready(function () {
			var items = <?= json_encode($array) ?>

			$("#tag").autocomplete({
				source: items,
				select: function (event, item) {
					var params = {
						equipo: item.item.value
					};
					$.get("getEquipo.php", params, function (response) {
						var json = JSON.parse(response);
						if (json.status == 200){
							$("#nombre").html(json.nombre);
							$("#avatar").attr("src", json.icono);
						}else{

						}
					}); // ajax
				}
			});
		});
	                  </script></td>
                  </tr>
                </tbody>
              </table><?php */ ?>
                              SERIES:</td>
                            <td align="left"><select name="series" id="series" class="clientes-input-small">
                                <?php
                                ?>
                                <option value=<?php echo $s = "Sin_serie"; ?>><?php echo $s = "Sin_serie"; ?></option>
                                <?php
                                //while($crow44 = mysqli_fetch_assoc($result44))
                                while ($crow44 = mysqli_fetch_assoc($resultse)) {

                                ?>
                                  <option value=<?php echo $serie = $crow44['serie']; ?>><?php echo $serie = $crow44['serie']; ?></option>
                                <?php

                                }

                                ?>
                              </select></td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                    <td align="center"><strong>PRECIO POR UNIDAD</strong>
                      <table width="95%" align="center" class="tabla-comic">
                        <tbody>
                          <tr>
                            <td>PRECIO 1</td>
                            <td><input name="preciouno" type="text" disabled="disabled" class="clientes-input-small" id="preciouno" value="<?php echo $preciouno; ?>" size="5">
                              <input name="checkbox1" type="checkbox" id="checkbox2">
                            </td>
                          </tr>
                          <tr>
                            <td>PRECIO 2</td>
                            <td><input name="preciodos" type="text" disabled="disabled" class="clientes-input-small" id="documento7" value="<?php echo $preciodos; ?>" size="5">
                              <input name="checkbox2" type="checkbox" id="checkbox5">
                            </td>
                          </tr>
                          <tr>
                            <td>PRECIO 3</td>
                            <td><input name="preciotres" type="text" disabled="disabled" class="clientes-input-small" id="documento8" value="<?php echo $preciotres; ?>" size="5">
                              <input name="checkbox3" type="checkbox" id="checkbox6">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <p>
                <select name="personal" id="personal" style="visibility:hidden" class="clientes-input-small">
                  <option selected value=<?php echo $bodega; ?>><?php echo $nombrebodega; ?></option>
                </select>
              </p>
              <p><span class="buttons">
				  <input name="contratonumero" type="hidden" id="contratonumero" value=<?php echo $numero ?>>
                  <input name="submit2" type="image" id="submit2" src="../images/icons/guardar.png">
                </span>
                <input name="documento" type="hidden" id="documento" value="<?php echo $numero; ?>">
                <input name="accion" type="hidden" id="accion" value="<?php echo $accion; ?>">
              </p>
            </form>
			
            
            <div>
              <p>
                <?php $sql3 = "SELECT * from `" . $tabla3 . "` order by created_at DESC";
                $result3 = mysqli_query($con, $sql3); ?>
              </p>
              <div>
                <div>
                  <div class="grilla_listado">
                    <table width="100%" align="center" class="tabla-comic">
                      <thead>
                        <tr>
                          <th>Serie</th>
                          <th>Descripcion</th>
                          <th>FACTURAR</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php





                        //$query3 = "SELECT * FROM task";
                        //$result_tasks = mysqli_query($con, $query3);    

                        while ($crowt = mysqli_fetch_assoc($result3)) {
                          if ($bodega == $crowt['personal']) {
                            $precio = $crowt['precio'];
                        ?>
                            <tr>
                              <td><?php echo $crowt['serie']; ?></td>
                              <td><?php echo $crowt['description']; ?></td>
                              <td rowspan="2">


                                <table width="100%" align="center" class="tabla-comic">
                                  <tbody>
                                    <tr>
                                      <td><input name="precio" type="text" disabled="disabled" class="clientes-input-small" id="precio" value="<?php echo $precio; ?>" size="5"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                              <?php /*?><td>
                <a href="edit.php?id=<?php echo $crowt['id']?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete_task.php?id=<?php echo $crowt['id']?> & accion=<?php echo $accion?>" class="btn btn-danger" >Eliminar<img src="../images/file-icons/64/004-folder-1.png" width="20" height="20" alt=""/>
                  <i class="far fa-trash-alt"></i>
                </a>
              </td><?php */ ?>
                            </tr>
                            <tr>
                              <td align="center"><strong>Cantidad</strong></td>
                              <td align="center"><strong>Producto</strong></td>
                            </tr>
                            <tr>
                              <td><?php echo $crowt['cantidad']; ?></td>
                              <td><?php echo $crowt['producto']; ?></td>
                              <td><a href="delete_task.php?id=<?php echo $crowt['id'] ?> & accion=<?php echo $accion ?> & contrato=<?php echo $numero ?>"><img src="../images/file-icons/64/004-folder-1.png" width="20" height="20" alt="" /><strong>Eliminar</strong></td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                    <p>&nbsp;</p>
                  </div>
                </div>
              </div> 
				<?php }?>
			  <form action="procesar_transferencia.php" method="POST">
                <div class="grilla_listado">
                  <table width="95%" align="center" class="tabla-comic">
                    <tbody>
                      <tr>
                        <td colspan="6" align="left" class="encabezado" >DATOS PERSONALES</td>
                      </tr>
                      <tr>
                        <td align="right">
							<br>
							Documento #:</td>
                        <td align="left">
							<br>
							<input name="registro" type="text" class="clientes-input-small" id="registro" value="<?php

                        $sqlre = "SELECT * from `registro` order by unico ASC";
                        $resultre = mysqli_query($con, $sqlre);
                        while ($crowpre = mysqli_fetch_assoc($resultre)) {
                        $registro = $crowpre['unico'] + 1;
                        }
							echo $registro; ?>" size="10"></td>
                        <td align="right">Contrato Nro:</td>
                        <td align="left"><input name="documento_contrato" type="text" id="documento_contrato" value="<?php echo $contratomostrar; ?>" size="10" class="clientes-input-small">                          <input name="documento" type="text" id="documento" value="<?php echo $numero; ?>" size="10" class="clientes-input-small"></td>
                        <td align="right"> Ruc/Ci: </td>
                        <td align="left"><input name="cliente" type="text" id="cliente" class="clientes-input-small" value="<?php echo $codigocontrato = $codigo; ?>"></td>
                      </tr>
                      <tr>
                        <td align="right">Cliente:</td>
                        <td align="left"><input name="nombre" class="clientes-input-small" type="text" id="nombre" value="<?php echo $clientenombre; ?>" size="20"></td>
                        <td align="right">Mail: </td>
                        <td align="left"><input name="mail" class="clientes-input-small" type="text" id="mail" value="<?php echo $mail; ?>"></td>
                        <td align="right">Direccion:</td>
                        <td align="left"><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=1">
                          <input name="direccion" type="text" class="clientes-input-small" id="direccion" value="<?php echo $direccion; ?>" size="20">
                        </a></td>
                      </tr>
                      <tr>
                        <td colspan="6" align="center" class="encabezado" >
							
						DATOS INSTALACION ANTERIOR</td>
                      </tr>
                      <tr>
                        <td align="center">
							<br>
						Foto Casa:</td>

                        <td align="center">
							<br>
						Foto Equipo:</td>
                        <td align="center">
							<br>
						Foto Caja:</td>
                        <td align="center">
							<br>
						Foto Potencia:</td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center">
                          <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=1"><img src="<?php echo $foto1; ?>" alt="" width="58" height="58" class="clientes-input-small" /></a></p>
                          <p>
                            <input name="foto1" type="text" id="foto1" value="<?php echo $foto1; ?>" style="visibility:hidden">
                          </p>
                        </td>
                        <td align="center">
                          <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=2"><img src="<?php echo $foto2; ?>" alt="" width="58" height="58" class="clientes-input-small" />
                            </a></p>
                          <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=2">
                              <input name="foto2" type="text" id="textfield7" value="<?php echo $foto2; ?>" style="visibility:hidden">
                            </a></p>
                        </td>
                        <td align="center">
						  <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=3"><img src="<?php echo $foto3; ?>" alt="" width="58" height="58" class="clientes-input-small" /> </a></p>
                          <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=3">
                              <input name="foto3" type="text" id="textfield8" value="<?php echo $foto3; ?>" style="visibility:hidden">
                            </a></p>
						  </td>
                        <td align="center">
						  <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=4../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=4"><img src="<?php echo $foto4; ?>" alt="" width="58" height="58" class="clientes-input-small" /></a></p>
                          <p><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=4../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>& numero=4">
                              <input name="foto4" type="text" id="textfield9" value="<?php echo $foto4; ?>" style="visibility:hidden">
                            </a></p>
					    </td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                      </tr>
						<?php
                        $sql5 = "SELECT * from `ventas` WHERE `cliente` LIKE '$codigo' order by fecha ASC";
                        $result5 = mysqli_query($con, $sql5);
						$numfacturacion = $result5->num_rows;
						if ($numfacturacion == "0")
						{
						}
						else
						{
						?>
                      <tr>
                        <td colspan="6" align="center" class="encabezado" >FACTURACION PENDIENTE</td>
                      </tr>
                      <tr>
                        <td align="center" bgcolor="#E58082">
                          
                        </td>
                        <td colspan="5" align="center" bgcolor="#E58082">
                          
                        </td>
                      </tr>
                      <tr>
                        <td align="right">
							<br>
							Facturas pendiente:</td>
                        <td align="left" valign="middle">
							<br>
						  

                          <select name="factura" id="factura" class="clientes-input-small">
                            <?php
                            while ($crowpp = mysqli_fetch_assoc($result5)) {
                              $facturas = $crowpp['numero'];
                              $estado = $crowpp['estado'];
                              $total = $crowpp['total'];

                              if ($estado == "pendiente") {
                            ?>
                                <option selected value=<?php echo $facturas; ?>><?php echo $facturas . "(" . $total . ")"; ?></option>
                            <?php }
                            } ?>
                          </select>
                        </td>
                        <td align="right">
							<br>
							Valor Pagado:</td>
                        <td align="left" valign="middle">
							<br>
					    <input type="text" name="valor" id="textfield6" class="clientes-input-small"></td>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr>
					  <?php 
						}
						?>
                        <td align="left">&nbsp;</td>
                        <td colspan="5" align="left"></td>
                      </tr>
                      <?php 
						if ($estadousuario == "incompleto")
						{
						}
						else
						{
						?>
						<tr>
                        <td align="left" bgcolor="#E58082">
                          <p>Costo Servicio Tecnico</p>
                          <p>(Adicional al Material Ocupado Mano de Obra)</p>
                        </td>
                        <td colspan="5" align="left" bgcolor="#E58082"><input name="valor2" type="text" id="valor2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="" maxlength="9" class="clientes-input-small"> </td>
                      </tr>
                      <tr>
                        <td align="left">Motivo del Servicio Tecnico:</td>
                        <td colspan="5" align="left"><textarea name="motivo" cols="35" rows="5" class="clientes-input-small" id="motivo" placeholder="Descripcion del Producto"><?php echo $motivo; ?>
                    </textarea></td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#E58082">Retiro de Equipo 1:</td>
                        <td colspan="5" align="left" bgcolor="#E58082"><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>&numero=5"><img src="<?php echo $foto5; ?>" alt="" width="58" height="58" class="clientes-input-small" /></a>

                          <select name="productoretiro" id="productoretiro">
                            <?php
                            $sql9 = "SELECT * from `productos` WHERE `tipo` LIKE '$tipo'";
                            $result9 = mysqli_query($con, $sql9);
                            $result99 = mysqli_query($con, $sql9);
                            while ($crow9 = mysqli_fetch_assoc($result9)) {
                              echo $productod = $crow9['codigo'];
                              $cantidadinv = "0";
                              echo $bodegabuscar;
                              //$sqlt = "SELECT * from `".$bodegabuscar."` WHERE (`codigo` LIKE '$productod') AND (`cantidad` NOT LIKE '$cantidadinv')";
                              $sqlt = "SELECT * from `" . $bodegabuscar . "` WHERE (`codigo` LIKE '$productod')";
                              $resultt = mysqli_query($con, $sqlt);
                            ?>
                              <?php
                              while ($crowt = mysqli_fetch_assoc($resultt)) {
                                $aa = $crowt['codigo'];
                                $bb = $crowt['producto'];
                              ?>
                                <option value=<?php echo $crowt['codigo']; ?>><?php echo $crowt['producto']; ?></option>
                            <?php


                              }
                            }
                            ?>
                          </select>
                          <input name="retiro" type="text" id="retiro" value="" maxlength="25">
                          <input name="foto5" type="text" id="foto5" value="<?php echo $foto5; ?>" style="visibility:hidden">
                        </td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#E58082">Retiro de Equipo 2:</td>
                        <td colspan="5" align="left" bgcolor="#E58082"><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>&numero=6"><img src="<?php echo $foto6; ?>" alt="" width="58" height="58" class="clientes-input-small" /></a>

                          <select name="productoretiro2" id="productoretiro2">
                            <?php
                            $sql9 = "SELECT * from `productos` WHERE `tipo` LIKE '$tipo'";
                            $result9 = mysqli_query($con, $sql9);
                            $result99 = mysqli_query($con, $sql9);
                            while ($crow9 = mysqli_fetch_assoc($result9)) {
                              echo $productod = $crow9['codigo'];
                              $cantidadinv = "0";
                              echo $bodegabuscar;
                              //$sqlt = "SELECT * from `".$bodegabuscar."` WHERE (`codigo` LIKE '$productod') AND (`cantidad` NOT LIKE '$cantidadinv')";
                              $sqlt = "SELECT * from `" . $bodegabuscar . "` WHERE (`codigo` LIKE '$productod')";
                              $resultt = mysqli_query($con, $sqlt);
                            ?>
                              <?php
                              while ($crowt = mysqli_fetch_assoc($resultt)) {
                                $aa = $crowt['codigo'];
                                $bb = $crowt['producto'];
                              ?>
                                <option value=<?php echo $crowt['codigo']; ?>><?php echo $crowt['producto']; ?></option>
                            <?php


                              }
                            }
                            ?>
                          </select>
                          <input name="retiro2" type="text" id="retiro2" value="" maxlength="25">
                          <input name="foto6" type="text" id="foto2" value="<?php echo $foto6; ?>" style="visibility:hidden">
                        </td>
                      </tr>
                      <tr>
                        <td align="left" bgcolor="#E58082">Retiro de Equipo 3:</td>
                        <td colspan="5" align="left" bgcolor="#E58082"><a href="../serviciotecnico/subir_foto.php?codigo=<?php echo $codigo; ?>&numero=7"><img src="<?php echo $foto7; ?>" alt="" width="58" height="58" class="clientes-input-small" /></a>

                          <select name="productoretiro3" id="productoretiro3">
                            <?php
                            $sql9 = "SELECT * from `productos` WHERE `tipo` LIKE '$tipo'";
                            $result9 = mysqli_query($con, $sql9);
                            $result99 = mysqli_query($con, $sql9);
                            while ($crow9 = mysqli_fetch_assoc($result9)) {
                              echo $productod = $crow9['codigo'];
                              $cantidadinv = "0";
                              echo $bodegabuscar;
                              //$sqlt = "SELECT * from `".$bodegabuscar."` WHERE (`codigo` LIKE '$productod') AND (`cantidad` NOT LIKE '$cantidadinv')";
                              $sqlt = "SELECT * from `" . $bodegabuscar . "` WHERE (`codigo` LIKE '$productod')";
                              $resultt = mysqli_query($con, $sqlt);
                            ?>
                              <?php
                              while ($crowt = mysqli_fetch_assoc($resultt)) {
                                $aa = $crowt['codigo'];
                                $bb = $crowt['producto'];
                              ?>
                                <option value=<?php echo $crowt['codigo']; ?>><?php echo $crowt['producto']; ?></option>
                            <?php


                              }
                            }
                            ?>
                          </select>
                          <input name="retiro3" type="text" id="retiro3" value="" maxlength="25">
                          <input name="foto7" type="text" id="foto3" value="<?php echo $foto7; ?>" style="visibility:hidden">
                        </td>
                      </tr>
                      <tr>
                        <td align="left">Tecnicos:</td>
                        <?php $cargo = "instalador";
                        $sql2 = "SELECT * from `personal` WHERE `puesto` LIKE '$cargo'";
                        //$sql2 = "SELECT * from `".$tabla2."`";
                        $result2 = mysqli_query($con, $sql2); ?>
                        <td colspan="5" align="left">
                          <?php while ($crowp = mysqli_fetch_assoc($result2)) { ?>

                            <input name="<?php echo $id = $crowp['id']; ?>" type="checkbox" id="checkbox" value="<?php echo $id = $crowp['id']; ?>">
                            <label for="checkbox2"><?php echo $producto = $crowp['nombres'] . " " . $crowp['apellidos']; ?> </label>
                            <p></p>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php }?>
						<tr>
						  <td colspan="6" align="center" bgcolor="#E58082" class="encabezado" >DATOS CONTRATO</td>
					  </tr>
						<tr>
                        <td align="left"> 
							<br>
						  Nodo:</td>
                        <td align="left"><span style="text-align: center">
                            <br>
							<select name="nodo" id="nodo" class="clientes-input-small">
                              <?php

                              while ($crowp = mysqli_fetch_assoc($result55)) {
                                if ($nodobusqueda == $crowp['codigo']) {

                              ?>
                                  <option selected value=<?php echo $codigo = $crowp['codigo']; ?>><?php echo $producto = $crowp['puesto']; ?></option>
                                <?php
                                } else {
                                ?>
                                  <option value=<?php echo $codigo = $crowp['codigo']; ?>><?php echo $producto = $crowp['puesto']; ?></option>
                              <?php
                                }
                              }

                              ?>
                            </select>
                          <?php if ($armadocaja == "si") 
							{
							?>
							<input name="caja" type="hidden" id="caja" value="Sin_Caja">
							<input name="puerto" type="hidden" id="puerto" value="Sin_Puerto">
							<?php
							}
							else
							{
							?>
							Caja:
                        <select name="caja" id="caja" class="clientes-input-small">
                            <?php
													$sqlcaja = "SELECT * from `dispositivos_empresa` order by nombre DESC";
            										$resultcaja = mysqli_query($con, $sqlcaja);
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
Puerto:
<select name="puerto" class="clientes-input-small" id="puerto">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
                          <option value="31">31</option>
                          <option value="32">32</option>
                        </select>
                        <?php }?>
							</span></td>
                        <td align="left">
							<br>
							Potencia:</td>
                        <td align="left">
							<br>
							<input name="potencia" type="text" required="required" id="potencia" class="clientes-input-small"></td>
                        <td align="left">&nbsp;</td>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left">Direccion ip:</td>
                        <td align="left"><input name="ip" type="text" required="required" id="valor" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $ipcontratos ; ?>" maxlength="15" class="clientes-input-small"></td>
                        <td align="left"> ip Gestion: </td>
                        <td align="left"><input name="ipgestion" type="text" required="required" id="ipgestion" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $ipgestion; ?>" maxlength="15" class="clientes-input-small"></td>
                        <td align="left">Plan:</td>
                        <td align="left"><input name="plan" class="clientes-input-small" type="text" required="required" id="plan" value="
							<?php
							$sql7 = "SELECT * from `productos` WHERE `codigo` LIKE '$plan'";
                            $result7 = mysqli_query($con, $sql7);
                            while ($crow7 = mysqli_fetch_assoc($result7)) {
                            echo $plandesc = $crow7['producto'];
                            } ?>"></td>
                      </tr>
                      <tr>
                        <td align="left">Cordenadas:</button></td>
                        <td align="left">
                        <input name="longitud" type="text" required="required" value="" class="clientes-input-small" id="latitud">
						<input name="latitud" type="text" required="required" value="" class="clientes-input-small"></td>
                        <td align="left">Cordenada Absoluta:</td>
                        <td align="left">
					<textarea name="absoluta" maxlength="" required="required" class="clientes-input-small" id="absoluta" placeholder="Ingrese Ubicacon"><?php echo $absoluta; ?></textarea>
					</td>
                        <td align="left">Observaciones</td>
                        <td align="left"><textarea name="observaciones" cols="10" rows="5" required="required" class="clientes-input-small" id="observaciones" placeholder="Descripcion del Servicio Tecnico"></textarea></td>
                      </tr>
                      <tr>
                        <td colspan="6" align="center">
                          <p>&nbsp;
                          </p>
                          <p>
                            <input type="hidden" name="tecniconombre" id="tecniconombre" value="
							<?php
                            $sqll = "SELECT * from `personal` WHERE `codigo` LIKE '$tecnico'";
                            $resultl = mysqli_query($con, $sqll);
                            while ($crowl = mysqli_fetch_assoc($resultl)) {
                            echo $tecniconombre = $crowl['nombres'] . " " . $crowl['apellidos'];
                            } ?>">
                            <input name="bodega" type="hidden" id="bodega" value="<?php echo $bodega; ?>">
                            <input name="documento5" type="hidden" id="documento5" value="<?php echo $numero; ?>">
                          </p>
                          <p>
                            <input name="accion" type="hidden" id="accion" value="<?php echo $accion; ?>">
                          </p>
							<input name="submit2" type="submit" class="boton-azul" id="submit2" value="GUARDAR Y ACTIVAR">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <p>&nbsp;</p>
                </div>

              </form>
	<?php } else {

    echo "<div style='color:red;font-weight:bold;'>
            No existe bodega para este Usuario
          </div>";

}?>
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
