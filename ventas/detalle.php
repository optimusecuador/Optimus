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
// Consultar si existen registros en la tabla cuentas
$sql = mysqli_query($conexion, "SELECT id FROM cuentas LIMIT 1");

// Verificar si existen cuentas
if(mysqli_num_rows($sql) == 0){
    ?>
    <script>
        var respuesta = confirm("No se encuentran cuentas para registrar el pago");

        if(respuesta){
            window.location.href = "../cuentas/nuevo.php";
        }else{
            window.location.href = "../menu_principal/clientes.php";
        }
    </script>
    <?php
    exit;
}

// Aqui continua el resto del codigo si existen cuentas
?>
										<?php  
$tabla = "ventas";
		$total = "0";
		$abono = "0";
		$tipofactura = "mensual";
		$ultimafactura="0";
		$url_image ="";
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
	
		
if (isset($_GET['codigo'])) {
   			$codigo=$_GET['codigo'];
   			$codigomenu=$_GET['cliente'];
   			$cliente=$_GET['cliente'];
   			$documentocontrol = 0;
			if (isset($_GET['documento'])) {
				$documentocontrol=$_GET['documento'];
			}
			$clientefac=$_GET['cliente'];
			$contratomenu=$_GET['contrato'];
			$_SESSION['contratodos']=$_GET['contrato'];
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
			$sql = "SELECT * from `ventas` WHERE `id` LIKE '$codigo' AND `cliente` LIKE '$clientefac' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			$numfilas = $result->num_rows;
			if ($numfilas >= 2)
					{
						$tipofactura = "normal";
					}
			
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$codigo = $crow['id'];
						$numero = $crow['id'];
						$cliente = $crow['cliente'];
						$total = $total + $crow['total'];
						$abono = $abono + $crow['abono'];
						$recibo = $crow['recibo'];
						$accion="pago";
						$producto = $crow['producto'];
						$estado = $crow['estado'];
						$numerocon = $crow['contrato'];
				
				
						}
		
	
		
		
	$sql2 = "SELECT * from `cuentas` order by numero ASC";
	$result2 = mysqli_query($con, $sql2);

?><div>
	<h2 style='color:white'>DETALLE <?php if ($contratomenu == "activo_isp") {?>CLIENTE SUBDISTRIBUIDOR <?php }?> <?php if ($documentocontrol == "pendiente") {?>DOCUMENTO PENDIENTE <?php }?><?php if ($documentocontrol == "cancelado") {?>DOCUMENTO PAGADO <?php }?><?php if ($documentocontrol == "Incobrable") {?>DOCUMENTO INCOBRABLE <?php }?></h2>
</div>
      <table width="100%"  align="center">
        <tbody>
          <tr>
            <td align="center">
			
			  <?php if($estado == "pendiente" ){?>
				<div class="cliente-table-panel">
              <table width="100%" align="center" class="table-dark">
               
                  <tr>
                    <td align="center">
					  <form action="../ventas/incobrable.php?codigo=<?php echo $numero; ?>&cliente=<?php echo $cliente; ?>" method="post" name="form2" id="form3">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="INCOBRABLE">
						  
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                    <td align="center">
					  <form action="../ventas/pago.php?codigo=<?php echo $numero;?>&cliente=<?php echo $cliente; ?>&contrato=<?php echo $numerocon; ?>&url_image=<?php echo $url_image; ?>" method="post" name="form2" id="form3">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="FACTURA">
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                    <td align="center">
					  <form action="../notas/pago.php?codigo=<?php echo $numero;?>&cliente=<?php echo $cliente; ?>&contrato=<?php echo $numerocon; ?>&url_image=<?php echo $url_image; ?>" method="post" name="form2" id="form4">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="PROFORMA">
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                    <td align="center">
					  <form action="../ventas/abono.php?codigo=<?php echo $numero;?>&cliente=<?php echo $cliente; ?>&url_image=<?php echo $url_image; ?>" method="post" name="form2" id="form4">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="ABONO">
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                    
                  </tr> 
              </table>
              </div>
				<?php }?>
				<?php if($estado == "cancelado")
							{
							if ($puesto_personal == "admin")
							{																		  
							?>
              <div class="cliente-table-panel">
				<table width="100%" align="center" class="table-dark">
          
                  <tr>
                    <td align="center">
					  <form action="../ventas/eliminar.php?codigo=<?php echo $numero; ?>&cliente=<?php echo $cliente; ?>" method="post" name="form2" id="form3">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="ANULAR">
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                    <td align="center">
					  <form action="../ventas/nota.php?codigo=<?php echo $numero; ?>" method="post" name="form2" id="form3">
                        <input name="submit2" type="submit" class="boton-azul" id="submit2" value="NOTA DE CREDITO">
                        <input name="producto" type="hidden" id="producto" value="<?php echo $producto;?>">
                      </form>
					  </td>
                  </tr>
                
              </table>
              </div>
			  <?php }
				}?></td>
          </tr>
			
          <tr>
            <td align="center">
    		
			<div class="cliente-table-panel">
			<h2 class="clientes-title">DATOS DE FACTURACIÓN</h2>
        	<table class="table-dark">

            <tr>
                <th colspan="2">DATOS FACTURA</th>
                <th colspan="2">DATOS PERSONALES</th>
            </tr>

            <tr>
                <td><strong>DOCUMENTO</strong></td>
                <td>
                    <input name="facturam" type="text" class="clientes-input-small" id="facturam" value="<?php echo $ultimafactura;?>" readonly>

                    <input name="seriem" type="text" class="clientes-input-small" id="seriem" value="<?php echo $serie;?>" readonly>

                    <input name="cajam" type="text" class="clientes-input-small" id="cajam" value="<?php echo $caja;?>" readonly>
                </td>

                <td><strong>CEDULA</strong></td>

                <td>
                    <input name="cliente" type="text" class="clientes-input" id="cliente" value="<?php echo $cliente;?>" readonly>
                </td>
            </tr>

            <tr>
                <td><strong>TOTAL</strong></td>

                <td>
                    <input name="precio" type="text" class="clientes-input-small" id="precio" value="<?php echo $total;?>" readonly>
                </td>

                <td><strong>NOMBRE</strong></td>

                <td>
                    <input name="element_2" type="text"  class="clientes-input" id="element_2" value="<?php 
					  
					  $sql3 = "SELECT * from clientes WHERE `codigo` LIKE '$cliente' order by fecha DESC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            			{	
						
						$nombres = $crow3['nombres']." ".$crow3['apellidos'];
						$mail = $crow3['mail'];
						$telefono = $crow3['telefono1'];
						$fuente = $crow3['fuente'];
						$ivar = $crow3['iva'];
						}
					  	$cadena_buscada="@";
					  		$posicion_coincidencia = strrpos($mail, $cadena_buscada);																						//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
if ($posicion_coincidencia === false)
	{
    //$mail = "";;
    }
					  
					  echo $nombres;?>"readonly="readonly"/>
                </td>
            </tr>

            <tr>
                <td><strong>SALDO</strong></td>

                <td>
                    <input name="saldo" type="text" class="clientes-input-small" id="saldo" value="<?php echo $saldo = $total-$abono;?>" readonly>
                </td>

                <td><strong>TELEFONO</strong></td>

                <td>
                    <input name="telefono" type="text" class="clientes-input" id="telefono" value="<?php echo $telefono;?>">
                </td>
            </tr>

            <tr>
                <td><strong>RET. FUENTE</strong></td>

                <td>
                    <input name="fuente" type="text" class="clientes-input-small" id="fuente" value="<?php echo $fuente;?>" readonly>
                </td>

                <td><strong>MAIL</strong></td>

                <td>
                    <input name="mail" type="text" class="clientes-input" id="mail" value="<?php echo $mail;?>">
                </td>
            </tr>

            <tr>
                <td><strong>RET. IVA</strong></td>

                <td>
                    <input name="iva" type="text" class="clientes-input-small" id="iva" value="<?php echo $ivar;?>" readonly>
                </td>

                <th colspan="2">DATOS PAGO</th>
            </tr>
<?php if ($documentocontrol != "pendiente") {?>
            <tr>
                <td></td>
                <td></td>

                <td><strong>INSTITUCIÓN</strong></td>

                <td>
                    <select name="institucion" id="institucion" class="clientes-input">
                        <?php
                        while($crowc = mysqli_fetch_assoc($result2))
                        {
                            $password = $_SESSION['password'];
                            $responsable = $crowc['responsable'];

                            if($password == $responsable)
                            {
                                ?>
                                <option selected value="<?php echo $crowc['id']; ?>">
                                    <?php echo $crowc['institucion']; ?>
                                </option>
                                <?php
                            }
                            else
                            {
                                ?>
                                <option value="<?php echo $crowc['id']; ?>">
                                    <?php echo $crowc['institucion']; ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <th colspan="2">DATOS DE PAGOS</th>
                <th colspan="2">DOCUMENTACIÓN</th>
            </tr>

            <tr>
                <td><strong>PRODUCTO</strong></td>

                <td>
                    <input id="precio2" name="precio2" class="clientes-input" type="text" value="<?php echo $producto;?>" readonly>
                </td>

                <td><strong>RECIBO DE PAGO Nº</strong></td>

                <td>
                    <input name="numerorecibo" type="text" class="clientes-input" id="numerorecibo" value="Sin_Recibo">
                </td>
            </tr>

            <tr>
                <td><strong>CANCELAR</strong></td>

                <td>
                    <input name="valor" type="text" class="clientes-input-small" id="valor" value="<?php echo $saldo;?>" required>
                </td>

                <td><strong>IMAGEN</strong></td>

                <td>
                    <img src="<?php echo $recibo; ?>" width="100" height="100">
                </td>
            </tr>

            <tr>
                <td><strong>DESCUENTO</strong></td>

                <td>
                    <select name="descuento" id="descuento" class="clientes-input">
                        <option value="<?php echo $saldo*0;?>">0%</option>
                        <option value="<?php echo $saldo*0.12;?>">12%</option>
                        <option value="<?php echo $saldo*0.25;?>">25%</option>
                        <option value="<?php echo $saldo*0.50;?>">50%</option>
                        <option value="<?php echo $saldo*0.75;?>">75%</option>
                        <option value="<?php echo $saldo;?>">100%</option>
                    </select>
                </td>

                <td colspan="2"></td>
            </tr>
<?php }?>
        </table>

    </div>

          </td>
          </tr>
        </tbody>
    </table>
   
	  <?php $codigo = $codigomenu;?>
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
