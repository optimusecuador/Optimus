<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/sistema.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->
	
<?php
date_default_timezone_set('America/Guayaquil');
session_start(); 
//setlocale(LC_TIME, 'es_ES', 'esp_esp');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, 'es_ES.UTF-8'); //Linux
require('../conectar.php');

//--------------EXPORTA REPORTE LORAM DE TERCERA EDAD-----------------------

/* ===============================
   CONEXION BD
=================================*/


/* ===============================
   VARIABLES
=================================*/
$mesSeleccionado = $_POST['mes'] ?? '';
$exportar = isset($_POST['exportar']);
$datos = [];

/* ===============================
   BUSCAR POR MES (SIN IMPORTAR DIA)
=================================*/

if($mesSeleccionado != ''){

    $stmt = $conexion->prepare("
        SELECT
            fecha,
            nodo,
            nombrecliente,
			cliente,
            fecha
        FROM ventas
        WHERE MONTH(fecha) = ?
    ");

    $stmt->bind_param("i",$mesSeleccionado);
    $stmt->execute();

    $resultado = $stmt->get_result();

    while($row = $resultado->fetch_assoc()){
        $datos[] = $row;
    }
}

/* ===============================
   EXPORTAR EXCEL
=================================*/

if($exportar && count($datos)>0){

    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=reporte_ventas.xls");

    echo "<table border='1'>";

    echo "<tr>
        <th>Mes</th>
        <th>Provincia</th>
        <th>Canton</th>
        <th>Parroquia</th>
        <th>Nombre Usuario</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>N° Usuarios</th>
        <th>Portador</th>
        <th>Tipo Enlace</th>
        <th>Up Link (Kbps)</th>
        <th>Down Link (Kbps)</th>
        <th>Tipo Cliente</th>
        <th>Nivel Compartición</th>
    </tr>";

    foreach($datos as $d){

// Fecha guardada en una variable
//$fecha = "2026-04-06 (11:22:11)";
$fecha = $d['fecha'];

/* ===============================
   LIMPIAR FORMATO
   (quitar hora entre paréntesis)
=================================*/
$fechaLimpia = substr($fecha, 0, 10);

/* ===============================
   OBTENER NUMERO DEL MES
=================================*/
$numeroMes = date("n", strtotime($fechaLimpia));

/* ===============================
   MESES EN TEXTO
=================================*/
$meses = [
1=>"Enero",
2=>"Febrero",
3=>"Marzo",
4=>"Abril",
5=>"Mayo",
6=>"Junio",
7=>"Julio",
8=>"Agosto",
9=>"Septiembre",
10=>"Octubre",
11=>"Noviembre",
12=>"Diciembre"
];

/* ===============================
   RESULTADO
=================================*/
$nombreMes = $meses[$numeroMes];

//echo $nombreMes;
//----buscar en clientes el resto de datos

	$cedula = $d['cliente'];
	$sqld = "SELECT * from `clientes` WHERE `codigo` LIKE '$cedula'";
	$resultd = mysqli_query($con, $sqld);
	while($crowd = mysqli_fetch_assoc($resultd))
	{	
		$direcciond = $crowd['direccion'];
		$telefonod = $crowd['telefono1'];
	}
	
        echo "<tr>
            <td>{$nombreMes}</td>
            <td>Cañar</td>
            <td>{$d['nodo']}</td>
            <td>{$d['nodo']}</td>
            <td>{$d['nombrecliente']}</td>
            <td>{$direcciond}</td>
            <td>{$telefonod}</td>
            <td>4</td>
            <td>UFINET NEDETEL</td>
            <td>FIBRA OPTICA</td>
            <td>200.000</td>
            <td>200.000</td>
            <td>RESIDENCIAL</td>
            <td>2:1</td>
        </tr>";
    }

    echo "</table>";
    exit;
}
//--------------FIN DE REPORTE DE VENTAS POR MES PARA ARCOTEL-----------------------
//--------------EXPORTA REPORTE LORAM DE TERCERA EDAD-----------------------
if(isset($_GET['exportar'])){

    if ($conn->connect_error) {
        die("Error de conexión");
    }

    $sql = "SELECT COUNT(*) as total 
            FROM contratos 
            WHERE estado LIKE '%activo%' 
            AND terceraedad LIKE '%si%'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total'];

    // LIMPIAR BUFFER (CLAVE PARA NO ROMPER HEADERS)
    if(ob_get_length()) ob_end_clean();

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=lopam.xls");

    echo '<!DOCTYPE html>
    <Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">
    <Worksheet ss:Name="Reporte">
    <Table>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">ABONADOS CON BENEFICIO POR LA LOPAM</Data></Cell>';
    echo '</Row>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">PROVINCIA</Data></Cell>';
    echo '<Cell><Data ss:Type="String">NÚMERO DE ABONADOS LOPAM</Data></Cell>';
    echo '</Row>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">CAÑAR</Data></Cell>';
    echo '<Cell><Data ss:Type="Number">'.$total.'</Data></Cell>';
    echo '</Row>';

    echo '</Table></Worksheet></Workbook>';
	exit;
		
}
//-----------FIN DE REPORTE LORAM DE TERCERA EDAD--------------
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

	<!-- FIN DE CODIGO PHP QUE TIENE QUE SER FIJO -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../images/ico.png" />
<!-- InstanceBeginEditable name="doctitle" --> 
<title>GlobalNET</title>
<!-- InstanceEndEditable -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="../complementos/estilos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif}

body{
	
  background:url('../images/logintransparente.png') no-repeat center center fixed;
  background-size:cover;
}

/* OVERLAY */
.overlay{
  position:fixed;
  width:100%;
  height:100%;
  background:rgba(0,0,0,0.5);
  z-index:0;
}

.sidebar{
  position:fixed;
  width:250px;
  height:100%;
  background:linear-gradient(180deg,#0b3c91,#1e63c6);
  color:#fff;
  display:flex;
  flex-direction:column;
  z-index:2;
}
.logo{padding:1px;font-size:22px;font-weight:bold}
.logo span{color:#4fc3f7}
.menu{list-style:none}
.menu li{
  padding:14px 20px;
  display:flex;
  align-items:center;
  gap:12px;
  cursor:pointer;
  opacity:.85;
  transition:all .3s ease;
  border-left:4px solid transparent;
}
.menu li:hover{
  background:rgba(255,255,255,0.1);
  transform:translateX(5px);
  opacity:1;
}
.menu li.active{
  background:rgba(255,255,255,0.15);
  border-left:4px solid #4fc3f7;
  opacity:1;
}

.main{
  margin-left:250px;
  padding:20px;
  position:relative;
  z-index:2;
}

.topbar{
  
  display:flex;
  justify-content:space-between;
  align-items:center;
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  padding:12px 20px;
  border-radius:8px;
}

h2{margin:20px 0;color:#fff}

.grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:18px;
}

.card{
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  border-radius:12px;
  padding:20px;
  text-align:center;
  transition:.3s;
}
.card:hover{
  transform:translateY(-6px) scale(1.02);
}
.card i{font-size:26px;color:#1e63c6;margin-bottom:10px}
.value{font-size:26px;font-weight:bold;color:#1e63c6}
.label{font-size:14px;color:#333}

.highlight{background:linear-gradient(135deg,#e3f2fd,#bbdefb)}
.green{color:#2e7d32}

@media(max-width:1000px){.grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:600px){.sidebar{display:none}.main{margin:0}.grid{grid-template-columns:1fr}}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<!-- AQUI EMPIEZA EL CODIGO DE PHP PARA EL SISTEMA -->

</head>
	
<body>

<div class="overlay"></div>

<div class="sidebar">
  <div class="logo"><img src="../images/logo.png" width="100%" alt=""/></span></div>
  <ul class="menu" id="menu">
    <li class="active"><a href="../menu_principal/panel.php"><img src="../images/menu_izquierdo/panel.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/clientes.php"><img src="../images/sistema/17.png" width="20%" alt=""/><img src="../images/menu_izquierdo/clientes.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/proveerores.php"><img src="../images/sistema/4.png" width="20%" alt=""/><img src="../images/menu_izquierdo/proveedores.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/inventario.php"><img src="../images/sistema/30.png" width="20%" alt=""/><img src="../images/menu_izquierdo/inventario.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/cuentas.php"><img src="../images/sistema/38.png" width="20%" alt=""/><img src="../images/menu_izquierdo/cuentas.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/bodegas.php"><img src="../images/sistema/3.png" width="20%" alt=""/><img src="../images/menu_izquierdo/bodegas.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/personal.php"><img src="../images/sistema/8.png" width="20%" alt=""/><img src="../images/menu_izquierdo/personal.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/servicio_tecnico.php"><img src="../images/sistema/53.png" width="20%" alt=""/><img src="../images/menu_izquierdo/servicio_tecnico.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/reportes.php"><img src="../images/sistema/34.png" width="20%" alt=""/><img src="../images/menu_izquierdo/reportes.png" width="50%" alt=""/></a></li>
	
	<li><a href="../menu_principal/administrador.php"><img src="../images/sistema/31.png" width="20%" alt=""/><img src="../images/menu_izquierdo/administrador.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/configuraciones.php"><img src="../images/sistema/5.png" width="20%" alt=""/><img src="../images/menu_izquierdo/configuracion.png" width="50%" alt=""/></a></li>
	  
  </ul>
</div>

<div class="main">

<div class="topbar">
  <div style="color:#333">demo demo 🐦</div>
  <div style="color:#333">Cuenta | Log out</div>

	</div>
<!-- InstanceBeginEditable name="principal" --><?php

$anio = date('Y');

$sql = "
SELECT 
    MONTH(fecha) AS mes,
    SUM(CASE WHEN DAY(fecha) <= 10 THEN 1 ELSE 0 END) AS antes10,
    SUM(CASE WHEN DAY(fecha) > 10 THEN 1 ELSE 0 END) AS despues10
FROM ventas
WHERE YEAR(fecha) = '$anio'
GROUP BY MONTH(fecha)
ORDER BY mes
";

$result = $conn->query($sql);

$antes = array_fill(1,12,0);
$despues = array_fill(1,12,0);

while($row=$result->fetch_assoc()){
    $mes = (int)$row['mes'];
    $antes[$mes] = (int)$row['antes10'];
    $despues[$mes] = (int)$row['despues10'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/sistema.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->

<?php
date_default_timezone_set('America/Guayaquil');
session_start(); 
//setlocale(LC_TIME, 'es_ES', 'esp_esp');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, 'es_ES.UTF-8'); //Linux
require('../conectar.php');

//--------------EXPORTA REPORTE LORAM DE TERCERA EDAD-----------------------

/* ===============================
   CONEXION BD
=================================*/


/* ===============================
   VARIABLES
=================================*/
$mesSeleccionado = $_POST['mes'] ?? '';
$exportar = isset($_POST['exportar']);
$datos = [];

/* ===============================
   BUSCAR POR MES (SIN IMPORTAR DIA)
=================================*/

if($mesSeleccionado != ''){

    $stmt = $conexion->prepare("
        SELECT
            fecha,
            nodo,
            nombrecliente,
			cliente,
            fecha
        FROM ventas
        WHERE MONTH(fecha) = ?
    ");

    $stmt->bind_param("i",$mesSeleccionado);
    $stmt->execute();

    $resultado = $stmt->get_result();

    while($row = $resultado->fetch_assoc()){
        $datos[] = $row;
    }
}

/* ===============================
   EXPORTAR EXCEL
=================================*/

if($exportar && count($datos)>0){

    header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
    header("Content-Disposition: attachment; filename=reporte_ventas.xls");

    echo "<table border='1'>";

    echo "<tr>
        <th>Mes</th>
        <th>Provincia</th>
        <th>Canton</th>
        <th>Parroquia</th>
        <th>Nombre Usuario</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>N° Usuarios</th>
        <th>Portador</th>
        <th>Tipo Enlace</th>
        <th>Up Link (Kbps)</th>
        <th>Down Link (Kbps)</th>
        <th>Tipo Cliente</th>
        <th>Nivel Compartición</th>
    </tr>";

    foreach($datos as $d){

// Fecha guardada en una variable
//$fecha = "2026-04-06 (11:22:11)";
$fecha = $d['fecha'];

/* ===============================
   LIMPIAR FORMATO
   (quitar hora entre paréntesis)
=================================*/
$fechaLimpia = substr($fecha, 0, 10);

/* ===============================
   OBTENER NUMERO DEL MES
=================================*/
$numeroMes = date("n", strtotime($fechaLimpia));

/* ===============================
   MESES EN TEXTO
=================================*/
$meses = [
1=>"Enero",
2=>"Febrero",
3=>"Marzo",
4=>"Abril",
5=>"Mayo",
6=>"Junio",
7=>"Julio",
8=>"Agosto",
9=>"Septiembre",
10=>"Octubre",
11=>"Noviembre",
12=>"Diciembre"
];

/* ===============================
   RESULTADO
=================================*/
$nombreMes = $meses[$numeroMes];

//echo $nombreMes;
//----buscar en clientes el resto de datos

	$cedula = $d['cliente'];
	$sqld = "SELECT * from `clientes` WHERE `codigo` LIKE '$cedula'";
	$resultd = mysqli_query($con, $sqld);
	while($crowd = mysqli_fetch_assoc($resultd))
	{	
		$direcciond = $crowd['direccion'];
		$telefonod = $crowd['telefono1'];
	}
	
        echo "<tr>
            <td>{$nombreMes}</td>
            <td>Cañar</td>
            <td>{$d['nodo']}</td>
            <td>{$d['nodo']}</td>
            <td>{$d['nombrecliente']}</td>
            <td>{$direcciond}</td>
            <td>{$telefonod}</td>
            <td>4</td>
            <td>UFINET NEDETEL</td>
            <td>FIBRA OPTICA</td>
            <td>200.000</td>
            <td>200.000</td>
            <td>RESIDENCIAL</td>
            <td>2:1</td>
        </tr>";
    }

    echo "</table>";
    exit;
}
//--------------FIN DE REPORTE DE VENTAS POR MES PARA ARCOTEL-----------------------
//--------------EXPORTA REPORTE LORAM DE TERCERA EDAD-----------------------
if(isset($_GET['exportar'])){

    if ($conn->connect_error) {
        die("Error de conexión");
    }

    $sql = "SELECT COUNT(*) as total 
            FROM contratos 
            WHERE estado LIKE '%activo%' 
            AND terceraedad LIKE '%si%'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total'];

    // LIMPIAR BUFFER (CLAVE PARA NO ROMPER HEADERS)
    if(ob_get_length()) ob_end_clean();

    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=lopam.xls");

    echo '<?xml version="1.0"?>
    <Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
     xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">
    <Worksheet ss:Name="Reporte">
    <Table>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">ABONADOS CON BENEFICIO POR LA LOPAM</Data></Cell>';
    echo '</Row>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">PROVINCIA</Data></Cell>';
    echo '<Cell><Data ss:Type="String">NÚMERO DE ABONADOS LOPAM</Data></Cell>';
    echo '</Row>';

    echo '<Row>';
    echo '<Cell><Data ss:Type="String">CAÑAR</Data></Cell>';
    echo '<Cell><Data ss:Type="Number">'.$total.'</Data></Cell>';
    echo '</Row>';

    echo '</Table></Worksheet></Workbook>';
	exit;
		
}
//-----------FIN DE REPORTE LORAM DE TERCERA EDAD--------------
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

	<!-- FIN DE CODIGO PHP QUE TIENE QUE SER FIJO -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="../images/ico.png" />
<!-- InstanceBeginEditable name="doctitle" --> 
<title>GlobalNET</title>
<!-- InstanceEndEditable -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="../complementos/estilos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif}

body{
	
  background:url('../images/logintransparente.png') no-repeat center center fixed;
  background-size:cover;
}

/* OVERLAY */
.overlay{
  position:fixed;
  width:100%;
  height:100%;
  background:rgba(0,0,0,0.5);
  z-index:0;
}

.sidebar{
  position:fixed;
  width:250px;
  height:100%;
  background:linear-gradient(180deg,#0b3c91,#1e63c6);
  color:#fff;
  display:flex;
  flex-direction:column;
  z-index:2;
}
.logo{padding:1px;font-size:22px;font-weight:bold}
.logo span{color:#4fc3f7}
.menu{list-style:none}
.menu li{
  padding:14px 20px;
  display:flex;
  align-items:center;
  gap:12px;
  cursor:pointer;
  opacity:.85;
  transition:all .3s ease;
  border-left:4px solid transparent;
}
.menu li:hover{
  background:rgba(255,255,255,0.1);
  transform:translateX(5px);
  opacity:1;
}
.menu li.active{
  background:rgba(255,255,255,0.15);
  border-left:4px solid #4fc3f7;
  opacity:1;
}

.main{
  margin-left:250px;
  padding:20px;
  position:relative;
  z-index:2;
}

.topbar{
  
  display:flex;
  justify-content:space-between;
  align-items:center;
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  padding:12px 20px;
  border-radius:8px;
}

h2{margin:20px 0;color:#fff}

.grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:18px;
}

.card{
  background:rgba(255,255,255,0.9);
  backdrop-filter:blur(10px);
  border-radius:12px;
  padding:20px;
  text-align:center;
  transition:.3s;
}
.card:hover{
  transform:translateY(-6px) scale(1.02);
}
.card i{font-size:26px;color:#1e63c6;margin-bottom:10px}
.value{font-size:26px;font-weight:bold;color:#1e63c6}
.label{font-size:14px;color:#333}

.highlight{background:linear-gradient(135deg,#e3f2fd,#bbdefb)}
.green{color:#2e7d32}

@media(max-width:1000px){.grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:600px){

    .sidebar{
        display:block;
        position:relative;
        width:100%;
        height:auto;
    }

    .main{
        margin-left:0;
        width:100%;
    }

    .grid{
        grid-template-columns:1fr;
    }
}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<!-- AQUI EMPIEZA EL CODIGO DE PHP PARA EL SISTEMA -->

</head>
	
<body>

<div class="overlay"></div>

<!-- MENU PRINCIPAL PARA TODO -->
<div class="sidebar">
  <div class="logo"><img src="../images/logo.png" width="100%" alt=""/></span></div>
  <ul class="menu" id="menu">
	  <?php 

if ($puesto_personal == "instalador")
{
	?><li><a href="../menu_principal/servicio_tecnico.php"><img src="../images/sistema/53.png" width="20%" alt=""/><img src="../images/menu_izquierdo/servicio_tecnico.png" width="50%" alt=""/></a></li>
	
	<?php
}
else
{

?>
	  
    <li class="active"><a href="../menu_principal/panel.php"><img src="../images/menu_izquierdo/panel.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/clientes.php"><img src="../images/sistema/17.png" width="20%" alt=""/><img src="../images/menu_izquierdo/clientes.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/proveerores.php"><img src="../images/sistema/4.png" width="20%" alt=""/><img src="../images/menu_izquierdo/proveedores.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/inventario.php"><img src="../images/sistema/30.png" width="20%" alt=""/><img src="../images/menu_izquierdo/inventario.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/cuentas.php"><img src="../images/sistema/38.png" width="20%" alt=""/><img src="../images/menu_izquierdo/cuentas.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/bodegas.php"><img src="../images/sistema/3.png" width="20%" alt=""/><img src="../images/menu_izquierdo/bodegas.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/personal.php"><img src="../images/sistema/8.png" width="20%" alt=""/><img src="../images/menu_izquierdo/personal.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/servicio_tecnico.php"><img src="../images/sistema/53.png" width="20%" alt=""/><img src="../images/menu_izquierdo/servicio_tecnico.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/reportes.php"><img src="../images/sistema/34.png" width="20%" alt=""/><img src="../images/menu_izquierdo/reportes.png" width="50%" alt=""/></a></li>
	
	<li><a href="../menu_principal/administrador.php"><img src="../images/sistema/31.png" width="20%" alt=""/><img src="../images/menu_izquierdo/administrador.png" width="50%" alt=""/></a></li>
	  
    <li><a href="../menu_principal/configuraciones.php"><img src="../images/sistema/5.png" width="20%" alt=""/><img src="../images/menu_izquierdo/configuracion.png" width="50%" alt=""/></a></li>
	<?php }?> 
  </ul>
</div>


<div class="main">

<div class="topbar">
  <div style="color:#333">demo demo 🐦</div>
  <div style="color:#333">Cuenta | Log out</div>

	</div>
<!-- InstanceBeginEditable name="principal" --><?php

$anio = date('Y');

$sql = "
SELECT 
    MONTH(fecha) AS mes,
    SUM(CASE WHEN DAY(fecha) <= 10 THEN 1 ELSE 0 END) AS antes10,
    SUM(CASE WHEN DAY(fecha) > 10 THEN 1 ELSE 0 END) AS despues10
FROM ventas
WHERE YEAR(fecha) = '$anio'
GROUP BY MONTH(fecha)
ORDER BY mes
";

$result = $conn->query($sql);

$antes = array_fill(1,12,0);
$despues = array_fill(1,12,0);

while($row=$result->fetch_assoc()){
    $mes = (int)$row['mes'];
    $antes[$mes] = (int)$row['antes10'];
    $despues[$mes] = (int)$row['despues10'];
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Comparativo Pagos</title>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<br>
<canvas id="grafico" class="tabla-comic" ></canvas>

<script>

const meses=[
"Ene","Feb","Mar","Abr","May","Jun",
"Jul","Ago","Sep","Oct","Nov","Dic"
];

const antes10 = <?= json_encode(array_values($antes)) ?>;
const despues10 = <?= json_encode(array_values($despues)) ?>;

new Chart(document.getElementById('grafico'),{
    type:'line',
    data:{
        labels:meses,
        datasets:[
            {
                label:'Antes del día 10',
                data:antes10,
                borderColor:'blue',
                backgroundColor:'rgba(0,0,255,0.2)',
                fill:true,
                tension:0.4
            },
            {
                label:'Después del día 10',
                data:despues10,
                borderColor:'red',
                backgroundColor:'rgba(255,0,0,0.2)',
                fill:true,
                tension:0.4
            }
        ]
    },
    options:{
        responsive:true,
        scales:{
            y:{
                beginAtZero:true,
                ticks:{
                    stepSize:1,     // ✅ SOLO ENTEROS
                    precision:0     // ✅ elimina decimales
                }
            }
        }
    }
});

</script>

</body>
</html>
	<!-- InstanceEndEditable -->

<br>
<br>
</div>

<script>
const items = document.querySelectorAll('#menu li');
items.forEach(item => {
  item.addEventListener('click', () => {
    items.forEach(i => i.classList.remove('active'));
    item.classList.add('active');
  });
});
</script>

</body>

<!-- InstanceEnd --></html>

