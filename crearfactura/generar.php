<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection

include("../conectar.php");
include('../clases/clases.php');
$tabla = "clientes";
$tabla2 = "productos";
$tabla3 = "contratos";
$estado = "activo";
$vacioint = 0;
$vacio = "0";
$codigorecuperado = $_GET['codigo'];

//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
    {
  $_SESSION['empresamail']=$crowem['empresa'];
  $empresa = $crowem['empresa'];
  $ruc = $crowem['ruc'];//esto es nuevo ruc
  $logo = $crowem['logo'];
  $direccion = $crowem['direccion'];
  $iva = $crowem['iva'];
  $ivadecimal=$iva/100;
  $web = $crowem['web'];
  $tipoAmbiente= $crowem['ambiente'];
  $tipoemision = $crowem['tipoemision'];
  $codigodocumento = $crowem['codigodocumento'];
  $establecimiento = $crowem['establesimiento'];
  $Oblicontabilidad = $crowem['contabilidad'];
  $colorfondo = $crowem['colorfondo'];
  //#24a5dd

}




$empresamail = $_SESSION['empresamail'];

//-- buscar mail e imagenes para el mail
$sql69 = "SELECT * from mail order by mail ASC";
$result69 = mysqli_query($con, $sql69); 
while($crow69 = mysqli_fetch_assoc($result69))
{
	$cuentas = $crow69['cuentas'];
	$cuentas2 = substr($cuentas, 2);	
	$cuentastexto = $crow69['ip'].$cuentas2;
	$logo = $crow69['logo'];
	$mailenviar = $crow69['mail'];
	$contrasena = $crow69['contrasena'];
}
//-- busca el contato
$sql = "SELECT * from `".$tabla3."` WHERE `numero` LIKE '$codigorecuperado' order by fecha DESC";
$resulte = mysqli_query($con, $sql); 
while($crowe = mysqli_fetch_assoc($resulte))
{	
						

	$contrato = $crowe['numero'];
	$codigo = $crowe['numero'];
	$producto = $crowe['producto'];
	$cliente = $crowe['cliente'];
	$direccion = $crowe['direccion'];
	$telefono = $crowe['telefono'];
	$gps1 = $crowe['gps1'];
	$gps2 = $crowe['gps2'];
	$mail = $crowe['mail'];
	$nodo = $crowe['nodo'];
	$cliente;
	
	//busqueda de cliente
	
	$sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$codigocliente = $crow['codigo'];
						$nombrescliente = $crow['nombres'];
						$apellidoscliente = $crow['apellidos'];
						$direccioncliente = $crow['direccion'];
						$telefonocliente = $crow['telefono1'];
						$telefono2cliente = $crow['telefono2'];
						$mailcliente = $crow['mail'];
						$nombrecliente2 = $crow['nombres']." ".$crow['apellidos'];
				$nombrescliente;
				$mailcliente;
						}
	//busqueda de producto
	$sql = "SELECT * from `".$tabla2."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
			$resultp = mysqli_query($con, $sql); 
			while($crowp = mysqli_fetch_assoc($resultp))
            			{	
						

						$codigoproducto = $crowp['codigo'];
						$producto = $crowp['producto'];
						$valor = $crowp['preciouno'];
						//echo $valor ="20
				$valor;
				$producto;
						}
	//registro de factura nueva
	//$id ="1";
	//$numero ="1";
	$serie ="1";
	$numero ="0";
	$caja ="1";
	$fecha = date("Y-m-d (H:i:s)", time());
	$propietario ="1";
	$ruc ="1";
	$autorizacion ="1";
	$cantidad ="1";
	$preciototal =$cantidad * $valor;
	$subtotal =$preciototal;
	$iva =$subtotal * $ivadecimal;
	$iva = number_format($iva, 2);
	$iva = str_replace ( ",", '', $iva);
	$total =$subtotal + $iva;
	$total = number_format($total, 2);
	$total = str_replace ( ",", '', $total);
	$vencimiento ="1";
	$descuento ="1";
	//$facturapdf="../facturaspdf/facturapdf.pdf";
	//$logo="../images/logo.png";
	
	//--buscar ultima factura del cliente

	$sql6 = "SELECT * from `ventas` WHERE `contrato` LIKE '$codigorecuperado' order by numero ASC";
	$result6 = mysqli_query($con, $sql6); 
	while($crow6 = mysqli_fetch_assoc($result6))
	{
		$cadena =$crow6['fecha'];
		$estado =$crow6['estado'];
		$estadodos =$crow6['estadodos'];
		list($fecha_actual) = explode('(', $cadena);
//-- si la factura esta anuladada
		
		if ($estado == "anular") 
		{
			$nuevafecha = strtotime ( '+0 month' , strtotime ( $fecha_actual ) ) ;
			$hora = date('h:i:s');
			$anio = date("Y", $nuevafecha);
			$mes = date("m", $nuevafecha);
			$nuevafecha = $anio."-".$mes."-"."01";
			$fecha = $nuevafecha."(".$hora.")";

			
		}
		else//--  si la factura no esta amnulada
		{
			$nuevafecha = strtotime ( '+1 month' , strtotime ( $fecha_actual ) ) ;
			$hora = date('h:i:s');
			$anio = date("Y", $nuevafecha);
			$mes = date("m", $nuevafecha);
			$nuevafecha = $anio."-".$mes."-"."01";
			$fecha = $nuevafecha."(".$hora.")";
		
		}
	}
	
	$sql6 = "SELECT * from ventas order by numero ASC";
	$result6 = mysqli_query($con, $sql6); 
			while($crow6 = mysqli_fetch_assoc($result6))
            			{
						$numero = $crow6['numero'];
						}
	$numero = $numero+1;
	$id = $numero;
	
	
	$stmt = $con->prepare("INSERT INTO ventas ( id, serie, caja, fecha, propietario, ruc, autorizacion, cliente, producto, cantidad, preciounitario, preciototal, subtotal, iva, total, vencimiento, descuento, nombrecliente, contrato, nodo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param('ssssssssssssssssssss', $id, $serie, $caja, $fecha, $propietario, $ruc, $autorizacion, $codigocliente, $codigoproducto, $cantidad, $valor, $preciototal, $subtotal, $iva, $total, $vencimiento, $descuento, $nombrecliente2, $codigo, $nodo);
	$stmt->execute();
	
	
}
		// registro en registro de acciones
		$accion = "crear_factura";
		//echo "acceso concedido";


		$sql = " INSERT INTO `registro` ( `accion` ,`cliente`, `fecha`, `id`, `producto`,  `cantidad`, `saldo_anterior`, `saldo`, `usuario`,  `bodega`, `codigo`, `proveedor`, `hora`, `seccion`, `numerorecibo`, `serviciotecnico`, `observacion`, `serie`, `caja`) VALUES ( '$accion', '$cliente', '$fecha', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacio', '$vacioint', '$vacio', '$vacio', '$vacio')"; 
		mysqli_query($con, $sql);




		//$stmt = $con->prepare("INSERT INTO registro ( accion, cliente, fecha) VALUES (?, ?, ?)");
//		$stmt->bind_param('sss', $accion, $cliente  , $fecha);
//		$stmt->execute();
		


$subtotalcon = $subtotal/1.12;
$subtotalfin = number_format($subtotalcon, 2);
$ivacon = $subtotalfin * $ivadecimal;
$ivacon = number_format($ivacon, 2);
//--------------------CONTABILIZAR
$serie="000";
$caja = "000";
$factura="Sin Documento";
$asiento = "ventaspendientes";
$valoruno=$subtotal;
$valordos=$iva;
$valortres="0";
$valorcuatro="0";
$valorcinco="0";
$valorseis="0";
$valorsiete=$total;
$valorocho="0";
$valornueve="0";
$valordiez="0";
$valoronce="0";
$valordoce="0";
$descripcion="GENERAR MENSUALIDAD/".$nombrescliente."/".$factura."/".$serie."/".$caja;
asientocontable::asientos($asiento,$descripcion,$valoruno,$valordos,$valortres,$valorcuatro,$valorcinco,$valorseis,$valorsiete,$valorocho,$valornueve,$valordiez,$valoronce,$valordoce);

//-------------------- FIN CONTABILIZAR
//--PONER CONTRATO EN CORTE AUTOMATICO
$corte = "si";
$sqlcon = "UPDATE `contratos` SET cortado='$corte' WHERE numero='$contrato'";
mysqli_query($con, $sqlcon);
?>
<script type="text/javascript">
window.location="../clientes/index.php";
</script>