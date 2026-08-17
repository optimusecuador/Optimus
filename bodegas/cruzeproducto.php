<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/sistema.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<?php
if(isset($_COOKIE['usuario']))
{
}
else
{
header("Location: https://45.236.151.150/acceso/accesodos.php?cerrar=cerrar");
//exit;
}
date_default_timezone_set('America/Guayaquil');
session_start(); 
//setlocale(LC_TIME, 'es_ES', 'esp_esp');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, 'es_ES.UTF-8'); //Linux
require('../conectar.php');
$pagina = $_SERVER['REQUEST_URI']; 
$dispositivo = $_SESSION['dispositivo'];
//-- ENCERAR VARIABLES DE USUARIO
$alerta = 0;
$verificarpago = "0";
//$uno="si";
//$dos="si";
//$tres="si";
//$cuatro="si";
//$cinco="si";
//$seis="si";
//$siete="si";
//$ocho="si";
//$nueve="si";
//$diez ="si";
//$once ="si";
//$doce ="si";
//$trece="si";
//$catorce ="si";
//$quince="si";
//$diezyseis ="si";
//$diezysiete="si";
//$diezyocho ="si";
//$diezynueve ="si";
//$veinte ="si";
//$veinteyuno="si";
//$veinteydos="si";
//$veinteytres="si";
//$veinteycuatro="si";
//$veinteycinco ="si";
//$veinteyseis ="si";
//$veinteysiete="si";
//$veinteyocho ="si";
//$veinteynueve ="si";
//$treinta ="si";
//$treintayuno ="si";
//$treintaydos ="si";
//$treintaytres="si";
//$treintaycuatro="si";
//$treintaycinco="si";
//$treintayseis="si";
//$treintaysiete="si";
//$treintayocho ="si";
//$treintaynueve ="si";
//$cuarenta ="si";
//$cuarentayuno="si";
//$cuarentaydos ="si";
//$cuarentaytres ="si";
//$cuarentaycuatro ="si";
//$cuarentaycinco ="si";
//$cuarentayseis ="si";
//$cuarentaysiete ="si";
//$cuarentayocho ="si";
//$cuarentaynueve ="si";
//$cincuenta ="si";
//$cincuentayuno ="si";
//$cincuentaydos ="si";
//$cincuentaytres ="si";
////-- SI NO INICIA SESION ENVIA A PAGUNA DE ACCESO DENEGADO
$ingresoexitoso='../images/ingresoexitoso.mp3';
$vacio= " Vacio";
$vacioint = 0;
$alerta = 0;
$notificacion_app;
$notificacion_asignar;
$notificacion_peliculas;
$notificacion_pagos;
$sistema = "Vacio";
$menu = "Vacio";
$personal_app = "0";
$verificarpago = "0";	 
$pagocierre = date("Y")."-".date("m");
$sql = "SELECT * from `pagos` WHERE `mes` LIKE '$pagocierre' order by mes DESC";
$resultpa = mysqli_query($con, $sql);
while($crowp = mysqli_fetch_assoc($resultpa))
{	
	$verificarpago = $crowp['mes'];
}

if(isset($_SESSION['app_cliente']))
	{
	$personal_app = $_SESSION['codigo_app'];
	$puesto_personal = "cliente";
	$sistema = "clienteapp";
	}
	else
	{
		//$_SESSION['app_cliente'] = "0";   
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
	
	//--BUSCAR DATOS DE CLIENTE PARA LA APP
	$sqlcl = "SELECT * from `clientes` WHERE `codigo` LIKE '$personal_app' order by codigo DESC";
	$resultcl = mysqli_query($con, $sqlcl);
	while($crowcl = mysqli_fetch_assoc($resultcl))
    {
		$clienteapp = $crowcl['nombres'];
		$clientecodigo = $crowcl['codigo'];
		$direccionapp = $crowcl['direccion'];
		$telefono1app = $crowcl['telefono1'];
		$telefono2app = $crowcl['telefono2'];
		$mailapp = $crowcl['mail'];
		$sistema = "clienteapp";
	}
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
		//$redireccionar = "https://".$ip."/acceso/acceso.php";
		//header('https://45.70.237.242/');
		?>
		<script>
		function redireccionar(){window.location="https://45.236.151.150:444";}
		setTimeout ("redireccionar()", 5);
		</script>
		<?php
		echo "no hay usuario";
	}
$array = array(); 
$array2 = array();
$array3 = array();
$cerrar = "https://".$ip."/acceso/accesodos.php?cerrar=cerrar";
$cerrarapp = "https://".$ip."/acceso/accesodos.php?cerrar=cerrar";
//SACAR FECHA DE PAGO
$sql = "SELECT * from `pagos` WHERE `mes` LIKE '$pagocierre' order by mes DESC";
$resultpa = mysqli_query($con, $sql);
while($crowp = mysqli_fetch_assoc($resultpa))
{	
	$verificarpago = $crowp['mes'];
}
$dia = date("d");

if ($puesto_personal != "admin" AND $puesto_personal != "instalador")
	
	?>
	<?php 
				$estado="pendiente";
				$sqlapp = "SELECT * from `app_cliente` WHERE `estado` LIKE '$estado' order by cliente DESC";
				$resultapp = mysqli_query($con, $sqlapp);
				$numfilas = $resultapp->num_rows;
				$alerta = $numfilas;
				$notificacion_app = $numfilas;
				$estado="pendiente";
				$sqlapp = "SELECT * from `clienteasignar` WHERE `estado` LIKE '$estado' order by cliente DESC";
				$resultapp = mysqli_query($con, $sqlapp);
				$numfilas = $resultapp->num_rows;
				$alerta = $numfilas + $alerta;
				$notificacion_asignar = $numfilas;
				$sqlpel = "SELECT * from `solicitud_peliculas`order by id_solicitud DESC";
				$resultpel = mysqli_query($con, $sqlpel);
				$numfilas = $resultpel->num_rows; 
				$alerta = $numfilas + $alerta;
				$notificacion_peliculas = $numfilas;
				$sqlpel = "SELECT * from `registro_pagos`order by id DESC";
				$resultpel = mysqli_query($con, $sqlpel);
				$numfilas = $resultpel->num_rows; 
				$notificacion_pagos = $numfilas;
				$alerta = $numfilas + $alerta;

				?>
    <meta charset="utf-8" />
	<link href="../complementos/estilos.css" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>OPTIMUS SOFTWARE 6.0</title>
	<script src="../excel/js/xlsx.full.min.js"></script>
	<script src="../excel/js/FileSaver.min.js"></script>
	<script src="../excel/js/tableexport.min.js"></script>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0%20" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
	<link href="../gps/style.css" rel="stylesheet">
	
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="https://optimusecuador.com" class="simple-text">
                    <img src="../images/android-chrome-192x192.png" width="32" height="42" alt=""/>Optimus software </a>
					(<?php echo $empresa;?>)
                </div>
                <ul class="nav">
					<?php if ($sistema == "tecnico")
						{?>  
					<li>
                        <a class="nav-link" href="clientes.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Clientes</p>
                        </a>
                    </li> 
					<li>
                        <a class="nav-link" href="solicitar_producto.php?cliente=<?php echo $personal;?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Sol. Product</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="devolucion_producto.php?cliente=<?php echo $personal;?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Dev. Product</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="reportecasos.php?cliente=<?php echo $personal;?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Formularios</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="../bodegas/kardex2.php?cliente=<?php echo $personal;?>">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Inventario</p>
                        </a>
                    </li>
                    
				  <?php 
					}
					else
					{
					?>
					
                    <li>
                        <a class="nav-link" href="../menu_principal/panel.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../menu_principal/clientes.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../menu_principal/proveerores.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Proveedores</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../menu_principal/inventario.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Inventario</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="../menu_principal/cuentas.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Cuentas</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../menu_principal/bodegas.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Bodegas</p>
                        </a>
                    </li>
					<li>
                      <a class="nav-link" href="../menu_principal/personal.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Personal</p>
                        </a>
                    </li>
                    <li>
						
                      <a class="nav-link" href="../menu_principal/servicio_tecnico.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Serv. Tecnico</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../menu_principal/reportes.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Reportes</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="../menu_principal/administrador.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Admin</p>
                        </a>
                    </li>
					<li>
                        <a class="nav-link" href="<?php echo $cerrar;?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Salir</p>
                        </a>
                    </li>
					
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="../menu_principal/configuraciones.php">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Configuracion</p>
                        </a>
                    </li>
					<?php 
					}
					
					?>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> <?php echo $usuarionombre2; ?> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
					
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="../menu_principal/panel.php" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            
                            
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $cerrar;?>">
                                    <span class="no-icon">Cuenta</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $cerrar;?>">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                   <!-- InstanceBeginEditable name="EditRegion1" -->
									<?php 	
		$_SESSION['mensaje'] ="0";
		$productorecuperado = "0";
				if ($_SESSION['mensaje'] != "0")
					{
						echo '<script type="text/javascript">'; 
						echo 'alert("!!!NO EXISTE PRODUCTO SUFICIENTE PARA REALIZAR LA TRANSFERENCIA");';
 						//echo 'alert("AHORA PUEDE CERRAR ESTA VENTANA");';
						/*echo 'window.location = "../PRODUCTOS/productos.php";';*/
						echo '</script>';
						$_SESSION['mensaje'] = "0";
    				}					
		  				
				$numero = "0";
				$tabla = "productos";
				$tabla2 = "bodegas";
				$tabla3 = "task";
				$tabla4 = "registro";
				$color="";
				$filacolor="0";
				//$accion=$_SESSION['accion'];
		  
		  
		  				if (isset($_GET['accion'])) 
				{
					$accion=$_GET['accion'];
				}
				  else
				  {
					  $accion="cruze";
				  }
				
					
				
				
				$sql4 = "SELECT * from `".$tabla4."` WHERE `accion` LIKE '$accion' order by fecha ASC";
				$result4 = mysqli_query($con, $sql4);
		 		while($crowp = mysqli_fetch_assoc($result4))
				{
					$numero = $crowp['unico'] + 1;
				}
				$tabla3 = "task";
				$periodo = "normal";
				$sql = "SELECT * from `".$tabla."` WHERE `periodo` LIKE '$periodo'order by fechaing DESC";
				$result = mysqli_query($con, $sql);
				$result22 = mysqli_query($con, $sql);
				$sql2 = "SELECT * from `".$tabla2."`";
				$result2 = mysqli_query($con, $sql2);
				?>
    
      <?php 	$numero = "0";
				$tabla = "productos";
				$tabla2 = "bodegas";
				$tabla3 = "task";
				$tabla4 = "registro";
				//$accion=$_SESSION['accion'];
				if (isset($_GET['accion'])) 
				{
					$accion=$_GET['accion'];
				}
				else
				  {
					  $accion="cruze";
				  }
				
				
				$sql4 = "SELECT * from `".$tabla4."` WHERE `accion` LIKE '$accion' order by fecha ASC";
				$result4 = mysqli_query($con, $sql4);
		 		while($crowp = mysqli_fetch_assoc($result4))
				{
					$numero = $crowp['unico'] + 1;
				}
				$tabla3 = "task";
				$periodo = "normal";
				$sql = "SELECT * from `".$tabla."` WHERE `periodo` LIKE '$periodo' order by producto ASC";
				$result = mysqli_query($con, $sql);
				$result22 = mysqli_query($con, $sql);
				
				$principal ="si";
				$sql2 = "SELECT * from `".$tabla2."` WHERE `principal` LIKE '$principal'";
				$result2 = mysqli_query($con, $sql2);
				  
//--almomento de cambiar elproducto y recarga la paguibna
				  if (isset($_GET['precio'])) 
				{
					$productorecuperado=$_GET['precio'];
					
				}
				  
				  
				?>
      </span>
      <table width="100%"  align="center">
        <tbody>
          <tr>
            <td align="center"><div class="esquinas_redondeadas">
              &nbsp;
              <h2 id="optimus"><?php echo $cadena_devuelta = strtoupper($accion);?> DE PRODUCTOS
              </h2>
            </div></td>
          </tr>
          <tr>
            <td align="center"><main class="container p-4">
              <div class="row">
                
                
                    <!-- MESSAGES -->
                    <div class="grilla_listado"><!-- ADD TASK FORM -->
                      <div>
                        <h3 id="optimus">ORIGEN</h3>
                        <form action="cruzeproducto.php" method="post" name="form1" id="form1">
                          <p>PRODUCTO:
                            <select name="producto" id="producto" onchange=location.href='cruzeproducto.php?precio='+this.value class="campos">
                              <?php 
				
			  while($crowp = mysqli_fetch_assoc($result))
            			{	
				  		if($producto == $crowp['codigo'])
							{
						
						?>
                              <option selected value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                              <?php
							}
				  	else
							{
							?>
                              <option value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                              <?php
							}
						}
				  
			  ?>
                              </select>
                            </p>
                          </form>
                        <form action="save_task.php" method="POST">
                          <div>
                            <p> DOCUMENTO Nro:
                              <input name="documento" type="text" id="documento" value="<?php echo $numero;?>" class="campos">
                              <input id="accion" name="accion" class="element text small" type="text" maxlength="255" value="<?php echo $accion;?>" style="visibility:hidden"/>
                              </p>
                            <p>BODEGA:
                              <select name="personal" id="personal" class="campos">
                                <?php 
				
			  while($crowp = mysqli_fetch_assoc($result2))
            			{	
				  		if($producto == $crowp['codigo'])
							{
						
						?>
                                <option selected value=<?php echo $codigo = $crowp['numero'];?>><?php echo $producto = $crowp['nombre']; ?></option>
                                <?php
							}
				  	else
							{
							?>
                                <option value=<?php echo $codigo = $crowp['numero'];?>><?php echo $producto = $crowp['nombre']; ?></option>
                                <?php
							}
						}
				  
			  ?>
                                </select>
                              </p>
                            <p>PRODUCTO:
                              <input name="producto" type="text" autofocus required="required" class="campos" id="producto" placeholder="Cantidad" value="<?php echo $productorecuperado;?>">
                              </p>
                            <p>CANTIDAD:
                              <input name="title" type="text" autofocus required="required" class="campos" placeholder="Cantidad" value="1">
                              </p>
                            </div>
                          <div class="form-group">
                            <p><?php if($accion == "cruze"){ ?>SERIE:
                              
                              <?php
							  $estado ="disponible";
							  $sqls = "SELECT * from `series`  WHERE `bodega` LIKE '$codigo' AND `asignado` LIKE '$estado' AND `producto` LIKE '$productorecuperado' order by serie ASC";
							$results = mysqli_query($con, $sqls);
							  
							  ?>
                              <select name="serie" id="serie" class="campos">
                                <?php 
				
						while($crows = mysqli_fetch_assoc($results))
            			{	
				  		if($producto == $crowp['codigo'])
							{
						
						?>
                                <option selected value=<?php echo $codigo = $crows['serie'];?>><?php echo $producto = $crows['serie']; ?></option>
                                <?php
							}
				  	else
							{
							?>
                                <option value=<?php echo $codigo = $crows['serie'];?>><?php echo $producto = $crows['serie']; ?></option>
                                <?php
							}
						}
				  
			  ?>
                                </select>
                              <?php }?></p>
                            <p>DESCRIPCION:
                              <textarea name="description" rows="2" required="required"  class="campos" placeholder="Task Description"></textarea>
                              </p>
                            </div>
                          <h3 id="optimus">DESTINO</h3>
                          <div>
                            <p>PRODUCTO:
                              <select name="destino" id="destino" class="campos">
                                <?php 
				
			  while($crowp = mysqli_fetch_assoc($result22))
            			{	
				  		if($producto == $crowp['codigo'])
							{
						
						?>
                                <option selected value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                                <?php
							}
				  	else
							{
							?>
                                <option value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                                <?php
							}
						}
				  
			  ?>
                                </select>
                              </p>
                            </div>
                          <p><span class="buttons">
                            <input name="submit" type="image" id="submit" src="../images/icons/guardar.png">
                            </span></p>
                          </form>
                        <form action="procesar_transferencia.php" method="POST">
                          <p>&nbsp;</p>
                          <p><strong>MOTIVO DEL CRUZE</strong>:</p>
                          <p>
                            <input name="motivo" type="text" required="required"  class="campos" id="motivo" placeholder="Motivo de Suspencion" maxlength="255"/>
                            </p>
                          <p> <strong>CLAVE DE AUTORIZACION:</strong></p>
                          <p>
                            <input name="codigo" type="text" required="required"  class="campos" id="codigo" placeholder="Clave de Autorizacion" maxlength="255"/>
                            </p>
                          <p>
                            <span class="buttons">
                              <input name="submit2" type="image" id="submit2" src="../images/icons/generar.png">
                              </span>
                            <input name="accion" type="hidden" id="accion" value="<?php echo $accion;?>">
                            </p>
                          </form>
                        </div>
                      </div>
               
            
                <?php $sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
			$result3 = mysqli_query($con, $sql3);?>
                
                  <div class="grilla_listado">
                      <table width="90%" align="center" class="clase_tabla">
                        <thead>
                          <tr>
                            <th>Documeto</th>
                            <th>Descripcion</th>
                            <th>Serie</th>
                            <th>Bodega</th>
                            <th>Cantidad</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                            <th>Eliminar</th>
                            </tr>
                          </thead>
                        <tbody>
                          <?php
			
			
			
			
			
          //$query3 = "SELECT * FROM task";
          //$result_tasks = mysqli_query($con, $query3);    
		  
          while($crowt = mysqli_fetch_assoc($result3)) { 
						  
						  if($filacolor =="0")
						{
							$color="#c3acfa";
							$filacolor="1";
						}
							
						else
						{
							$color="";
							$filacolor="0";
						}?>
                          <tr class="alternar"  bgcolor="<?php echo $color;?>" >
                            <td><?php echo $crowt['title']; ?></td>
                            <td><?php echo $crowt['description']; ?></td>
                            <td><?php echo $crowt['serie']; ?></td>
                            <td><?php echo $crowt['personal']; ?></td>
                            <td><?php echo $crowt['cantidad']; ?></td>
                            <td><?php echo $crowt['producto']; ?></td>
                            <td><?php echo $crowt['destino']; ?></td>
                            <td><?php echo $crowt['created_at']; ?></td>
                            <td><a href="delete_task.php?id=<?php echo $crowt['id']?> & accion=<?php echo $accion?>"><img src="../images/file-icons/64/004-folder-1.png" width="20" height="20" alt=""/> </a></td>
                            </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                    <p>&nbsp;</p>
                  </div>
               
              </div>
            </main></td>
          </tr>
        </tbody>
    </table>
      <p>&nbsp;</p>
		  <?php
					$verificacion="0";
				 	$sqlcontrol = "SELECT * from productos";
					$resultcontrol = mysqli_query($con, $sqlcontrol); 
					while($crowcontrol = mysqli_fetch_assoc($resultcontrol))
            		
					{
						$verificacion = 1;
						
					}
				if ($verificacion == "0")
				{
				  ?>
				  <script>alert('No tiene Productos Configuradas -----> Inventario/Nuevo Producto');</script>
				  <?php 	  
				  }
				  ?>
									<!-- InstanceEndEditable -->
                        </div>
                              
                        </div>
                      <p>&nbsp;</p>
                      </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="https://www.optimusecuador.com/">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Whatsapp
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portafolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Facebook
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="https://www.optimusecuador.com">Optimus Software</a>, Derechos Reservados 2025
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../gps/scriptgps.js"></script>
<script src="../excel/js/script.js"></script>
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0%20" rel="stylesheet" />
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<!-- InstanceEnd --></html>