<style>
	.printx {
		page-break-after: always
	}
</style>
<style type="text/css" media="screen">
	body {
		background-color: #eee;
	}

	#two {
		width: 640px;
		height: 840px;
		margin: 0 auto;
		padding: 10px 15px;
		background-color: #FFFFFF;
		margin-top: 10px;
		position: relative;
		z-index: 1;
	}

	#two-bg img {
		display: none;
	}
</style>
<style media="print">
	#two-bg {
		position: absolute;
		top: 0;
		right: 0;
		left: 0;
		z-index: 0;
		width: 100%;
		height: 100%;
	}

	#two-bg img {
		/*display: block;*/
		width: 600px;
		opacity: .3;
		/*transform: rotate(-20deg);
			-ms-transform: rotate(-20deg);
			-moz-transform: rotate(-20deg);
			-webkit-transform: rotate(-20deg);
			-o-transform: rotate(-20deg);*/
		margin-left: center;
		margin-right: center;
		/*vertical-align: middle*/
	}
</style><?php
		date_default_timezone_set('America/Guayaquil');
		session_start();
		//include connection
		include("../conectar.php");

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

	


		if (isset($_POST['element_1'])) {
			$accion = $_POST['accion'];
			$password = $_POST['element_1'];
			$cantidad = "0";
			$estado = "activo";
			$cantidad_transaccion = "0";
			$saldo_anterior = "0";
			$usuario = $_SESSION['password'];
			$id = $_POST['element_1'];
			$codigo = $_POST['element_1'];
			$nombre = $_POST['cliente'];
			$producto = $_POST['producto'];
			$direccion = $_POST['direccion'];
			$telefono = $_POST['telefono'];
			$telefono2 = "0";
			$mail = $_POST['mail'];
			$corte = $_POST['corte'];
			$vendedor = $_POST['vendedor'];
			$ubicacion = $_POST['ubicacion'];
			$caja = $_POST['caja'];
			$puerto = $_POST['puerto'];
			$nodo = $_POST['nodo'];
			//$proporcional = $_POST['proporcional'];
			//$instalacion = $_POST['instalacion'];
			$longitud = "0";
			$latitud = "0";
			$fecha = date("Y-m-d (H:i:s)", time());
			$tabla2 = "productos";
			$tabla3 = "clientes";
			//$diapro = date("d");



			//--buscar logo
				
			}
// ASIGNAR SERIE
if(isset($_POST['serie']))
{
	$contrato = $_POST['element_1'];
	$serie = $_POST['serie'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$bodega = "Externa";
	$estado = "Existencia";
	$asignado = $_POST['textfield'];
	$producto = $_POST['producto'];
	$ip = $_POST['ip'];
	$sqlse = "SELECT * from `series` WHERE `serie` LIKE '$serie'";
	$resultse = mysqli_query($con, $sqlse); 
	while($crowse = mysqli_fetch_assoc($resultse))
    {	
		$serieanterior = $crowse['serie'];
	}
//--INSERTO EL NUEVO PON EN SERIES
	if ($serie == $serieanterior)
	{
	}
	else
	{
		
		$sql = " INSERT INTO `series` ( `producto`, `fecha` , `serie`,`bodega`, `estado`, `asignado`, `contrato`) VALUES ( '$producto', '$fecha', '$serie', '$bodega', '$estado', '$asignado', '$contrato')"; 
		mysqli_query($con, $sql);
	}
}
		
//--ACTUALIZO EL CONTRATO
				$sql = "UPDATE contratos SET producto='$producto',fecha='$fecha',dia_corte='$corte', caja='$caja', puerto='$puerto', absoluta='$ubicacion', ip='$ip', nodo='$nodo' WHERE numero='$id'";
				mysqli_query($con, $sql);

		
		$stmt = $con->prepare("INSERT INTO registro ( id, codigo, fecha, accion , cantidad, saldo_anterior, saldo, usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssssss', $password, $password, $fecha, $accion, $cantidad_transaccion, $saldo_anterior, $cantidad, $usuario);
		$stmt->execute();



		?>

<p>&nbsp;</p>
<table width="100%">
	<tbody>
		<tr>
			<td><p>&nbsp;</p></td>
		</tr>
		<tr>
			<td align="center">CONTRATO MODIFICADO</td>
		</tr>
		<tr>
			<td><p>&nbsp;</p>
				<p><a href="../serviciotecnico/agendar.php">...</a></p>
			</td>
		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
<center>
	
</center>
