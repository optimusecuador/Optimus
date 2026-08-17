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

<link href="../complementos/estilos.css" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif}

body{
	
  background:url('../images/logintransparente.png') no-repeat center center fixed;
  background-size:cover;
}


}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<!-- AQUI EMPIEZA EL CODIGO DE PHP PARA EL SISTEMA -->
<style>

/* =========================
   MENU GLOBALNET PRO
========================= */

.menu-lateral{
    width:240px;
    background:#1f4e94;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    overflow:auto;
    font-family:Arial, Helvetica, sans-serif;
}

/* LOGO */
.menu-logo{
    text-align:center;
    padding:15px;
    border-bottom:1px solid rgba(255,255,255,.2);
}

.menu-logo img{
    max-width:90%;
}

/* ITEMS */
.menu-lateral ul{
    list-style:none;
    margin:0;
    padding:0;
}

.menu-lateral li{
    width:100%;
}
.menu-lateral a{
    display:flex;
    align-items:center;
    gap:12px;
    color:#fff;
    text-decoration:none;
    padding:14px 18px;
    transition:.3s;
    font-size:15px;
}

/* ICONO */
.menu-lateral a img{
    width:28px;
}

/* HOVER */
.menu-lateral a:hover{
    background:#2c67c1;
    padding-left:25px;
}

/* ACTIVO */
.menu-activo{
    background:#163e7a;
}

/* CONTENIDO */
.contenido-principal{
    margin-left:240px;
    padding:20px;
}

/* RESPONSIVE */
@media(max-width:900px){

.menu-lateral{
    width:70px;
}

.menu-lateral span{
    display:none;
}

.contenido-principal{
    margin-left:70px;
}

}

</style>
</head>
	
<body>

<!--<div class="overlay"></div>-->

<!-- MENU PRINCIPAL PARA TODO -->
<div class="menu-lateral">

<div class="menu-logo">
    <img src="../images/logo.png">
</div>

<ul>
<li>
<a href="panel.php">
<img src="../images/sistema/1.png" width="64">
<span>Inicio</span>
</a>
</li>
	
<li>
<a href="clientes.php">
<img src="../images/sistema/1.png" width="64">
<span>Clientes</span>
</a>
</li>

<li>
<a href="proveedores.php">
<img src="../images/sistema/2.png">
<span>Proveedores</span>
</a>
</li>

<li>
<a href="inventario.php">
<img src="../images/sistema/3.png">
<span>Inventario</span>
</a>
</li>

<li>
<a href="cuentas.php">
<img src="../images/sistema/4.png">
<span>Cuentas</span>
</a>
</li>

<li>
<a href="../bodegas/index.php">
<img src="../images/sistema/5.png">
<span>Bodegas</span>
</a>
</li>

<li>
<a href="personal.php">
<img src="../images/sistema/6.png">
<span>Personal</span>
</a>
</li>

<?php if($sistema=="tecnico"){ ?>
<li>
<a href="servicio_tecnico.php">
<img src="../images/sistema/53.png">
<span>Servicio Técnico</span>
</a>
</li>
<?php } ?>
<li>
<a href="servicio_tecnico.php">
<img src="../images/sistema/53.png">
<span>Servicio Técnico</span>
</a>
</li>
<li>
<a href="streaming.php">
<img src="../images/sistema/21.png">
<span>Streaming</span>
</a>
</li>
<li>
<a href="../truenas/truenas.php">
<img src="../images/sistema/21.png">
<span>Truenas</span>
</a>
</li>
<li>
<a href="../traccar/usuarios.php">
<img src="../images/sistema/21.png">
<span>Traccar</span>
</a>
</li>
<li>
<a href="reportes.php">
<img src="../images/sistema/7.png">
<span>Reportes</span>
</a>
</li>

<li>
<a href="administrador.php">
<img src="../images/sistema/8.png">
<span>Admin</span>
</a>
</li>

<li>
<a href="configuraciones.php">
<img src="../images/sistema/9.png">
<span>Configuración</span>
</a>
</li>

</ul>

</div>


<div class="main">

<div class="topbar">
  <div style="color:#333"><?php echo $usuarionombre ?><?php echo " | " ?> <?php echo $puesto_personal ?> <img src="../images/ico.png" width="24" height="24" alt=""/></div>
  <div style="color:#333">Cuenta | Log out</div>

	</div>
<!-- InstanceBeginEditable name="principal" -->
	<div>
    <h2 style='color:white'>OLT</h2>
</div>
	<?php 
//--BUSCO NODOS
		$sqlen = "SELECT * from `nodo` order by puesto DESC";
		$resulten = mysqli_query($con, $sqlen);
		while($crowen = mysqli_fetch_assoc($resulten))
        {
			
?>
	

<div class="grid">
	<div class="card">
    	<h5>LISTADO OLT <?php echo $crowen['puesto']?> </h5>
    	<a href="../olt/listado.php?nodo=<?php echo $crowen['codigo']?>"><img src="../images/sistema/4.png" width="150" height="107" alt=""/></a>
    </div>
	<!--<div class="card">
        <h5>NUEVO CLIENTE</h5>
        <a href="../clientes/nuevo.php"><img src="../images/sistema/44.png" width="150" height="107" alt=""/></a>
    </div>-->
	<!--<div class="card">
       <h5>1.- IMPORTAR CLIENTES</h5>
       <a href="../clientes/importador.php"><img src="../images/sistema/51.png" width="150" height="107" alt=""/></a>
    </div>
	<div class="card">
      <h5>2.- CREAR CONTRATOS Y CARPETAS</h5>
        <a href="../clientes/migrar_contrato.php"><img src="../images/sistema/14.png" width="150" height="107" alt=""/></a>
    </div>-->
</div>
	<br>
	<?php 
		}
	?>
	
<br>
<div class="grid">
	
	
</div>
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

