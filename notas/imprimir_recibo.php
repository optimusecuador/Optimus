<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php 
date_default_timezone_set('America/Guayaquil');
setlocale(LC_ALL, 'spanish');
$mesw = strftime('%B');
$mesw = strtoupper($mesw);
require('../conectar.php');
session_start();
$tipofactura =$_SESSION['tipofactura'];
$id =$_SESSION['id'];
$tipo ="mensual";
$preciounitario = 0;
	
	//-----buscarsi elcontrato esta cortado para sacar el mensaje de activacion
if (isset($_SESSION['cortado'])) 
{
	$cortado = $_SESSION['cortado'];
	$contrato = $_SESSION['contratodos'];
	$sqlco = "SELECT * from contratos WHERE `numero` LIKE '$contrato'";
	$resultco = mysqli_query($con, $sqlco); 
	while($crowco = mysqli_fetch_assoc($resultco))
           {	
				$service_port = $crowco['service_port'];
			}
	if($cortado == "si" )
	{
		?>
		
		<?php
		echo "<script> alert('CLIENTE PARA REACTIVACION (service-port ".$service_port." adminstatus enable)'); </script>";
		
	}
	
   			
}
	
if (isset($_SESSION['producto'])) 
{
   			
}
	else
{
		$_SESSION['producto'] = "";
}
$sqlem = "SELECT * from `configuracion` order by ruc DESC";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$_SESSION['empresamail']=$crowem['empresa'];
	$empresa = $crowem['empresa'];
	$logo = $crowem['logo'];
	$telefonooficina = $crowem['telefono'];
	$logoimprecionhojacompleta = $crowem['logoimprecionhojacompleta'];
	$firmasrecibo = $crowem['firmasrecibo'];
}
$sqlem = "SELECT * from `mail`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$imagen = $crowem['ip'].$crowem['nota'];
	
}
	$sqlwa = "SELECT * from `apis`";
$resulwa = mysqli_query($con, $sqlwa);
while($crowwa = mysqli_fetch_assoc($resulwa))
{
	$token = $crowwa['tokenwhatsapp'];
	
}
	?>
<body>
<table width="100%">
  <tbody>
    <tr>
      <td width="25" colspan="2">&nbsp;</td>
      <td width="25" colspan="3"><h1>&nbsp;</h1></td>
      <td width="25" colspan="3">&nbsp;</td>
      <td width="25" colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td colspan="4" align="left">&nbsp;</td>
      <td align="right" style="color: #FFFFFF">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Fecha:</td>
      <td colspan="4" align="left">:<?php echo $_SESSION['fecha'];?></td>
      <td align="right" style="color: #FFFFFF">......</td>
      <td align="left">Fecha:</td>
      <td colspan="4" align="left">:<?php echo $_SESSION['fecha'];?></td>
    </tr>
    <tr>
      <td align="left">Cliente:</td>
      <td colspan="4" align="left">:<?php $ci = $_SESSION['cliente'];
		  
		  $sql = "SELECT * from clientes WHERE `codigo` LIKE '$ci' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$nombre =$crow['nombres'];
						$direccion =$crow['direccion'];
						$ruc =$crow['codigo'];
						}
		  echo $nombre;
		  
		  ?></td>
      <td align="right">&nbsp;</td>
      <td align="left">Cliente:</td>
      <td colspan="4" align="left">:<?php $ci = $_SESSION['cliente'];
		  
		  $sql = "SELECT * from clientes WHERE `codigo` LIKE '$ci' order by fecha DESC";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						$nombre =$crow['nombres'];
						$telefono =$crow['telefono1'];
						$telefono ="+593".ltrim($telefono, "0");
						$direccion =$crow['direccion'];
						$ruc =$crow['codigo'];

						
						}
		  echo $nombre;
		  
		  ?></td>
    </tr>
    <tr>
      <td align="left">Dir:</td>
      <td colspan="4" align="left">:<?php echo $direccion; ?></td>
      <td align="right">&nbsp;</td>
      <td align="left">Dir:</td>
      <td colspan="4" align="left">:<?php echo $direccion; ?></td>
    </tr>
    <tr>
      <td align="left">Ci/Ruc:</td>
      <td align="left">:<?php echo $ci; ?></td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">Ci/Ruc:</td>
      <td align="left">:<?php echo $ci; ?></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>Cajera:</td>
      <td><?php $cajera = $_SESSION['password'];
		  
		  $sqlc = "SELECT * from personal WHERE `codigo` LIKE '$cajera' order by fecha DESC";
			$resultc = mysqli_query($con, $sqlc); 
			while($crowc = mysqli_fetch_assoc($resultc))
            {	
				$cadena = $crowc['nombres']." ".$crowc['apellidos'];
				list($palabra1, $palabra2, $palabra3, $palabra4) = explode(' ', $cadena);
				$frase1 = substr($palabra1,0,1);
				$frase2 = substr($palabra2,0,1);
				$frase3 = substr($palabra3,0,1);
				$frase4 = substr($palabra4,0,1);
				$frase5 = substr($ci,0,3);
				echo $frase1.$frase2.$frase3.$frase4.$frase5;
			}
		  
		  ?></td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
      <td>Cajera:</td>
      <td><?php $cajera = $_SESSION['password'];
		  
		  $sqlc = "SELECT * from personal WHERE `codigo` LIKE '$cajera' order by fecha DESC";
			$resultc = mysqli_query($con, $sqlc); 
			while($crowc = mysqli_fetch_assoc($resultc))
            {	
				$cadena = $crowc['nombres']." ".$crowc['apellidos'];
				list($palabra1, $palabra2, $palabra3, $palabra4) = explode(' ', $cadena);
				$frase1 = substr($palabra1,0,1);
				$frase2 = substr($palabra2,0,1);
				$frase3 = substr($palabra3,0,1);
				$frase4 = substr($palabra4,0,1);
				$frase5 = substr($ci,0,3);
				echo $frase1.$frase2.$frase3.$frase4.$frase5;
			}
		  
		  ?></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>Cant</td>
      <td>DESCRIPCION</td>
      <td>P. Unit</td>
      <td colspan="2">Total</td>
      <td>&nbsp;</td>
      <td>Cant</td>
      <td>DESCRIPCION</td>
      <td>P. Unit</td>
      <td colspan="2">Total</td>
    </tr>
	<tr>
      <td>------------------</td>
      <td>----------------------------</td>
      <td>-----------------</td>
      <td>------------</td>
      <td></td>
      <td>&nbsp;</td>
      <td>------------------</td>
      <td>----------------------------</td>
      <td>-----------------</td>
      <td>------------</td>


    </tr>
    <tr>
      <td>
		
		
		<?php 
		  //if($tipofactura == "normal")
		  //{
		  $id;
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 echo $crow3['cantidad']."<br>";
			}
		  //}
		  //else
		  //{
		  //echo "1"."<br>";
		  //}
		  
		  ?>
		
		
		
		</td>
      <td><?php 
		 
			  //--buscar en ventas y sacar productos
		    $id;
			 $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 //$producto = $crow3['producto'];
				 $producto = $crow3['producto'];
			}
			 //-- buscar en productos para saber si es mensual u otra cosa
			$sql33 = "SELECT * from productos WHERE `producto` LIKE '$producto' order by producto DESC";
			$result33 = mysqli_query($con, $sql33); 
			while($crow33 = mysqli_fetch_assoc($result33))
            {
				$tipo = $crow33['periodo'];
				echo $productoimprimir = $crow33['producto']."<br>";
			}
			  
			 /*if($tipo == "normal")
			{
				 echo  $producto."<br>";
			}
			  else
			{
				  echo $_SESSION['producto']."<br>";
			}*/
				  
		 
		  
		  
		  ?></td>
      <td>
		  
		  <?php 
		  //if($tipofactura == "normal")
		 // {
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 echo $preciounitario = $crow3['preciounitario']."<br>";
			}
		  //}
		  //else
		  //{
			  
		  //$subtotal = $_SESSION['subtotal']/1.12;echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['cantidad'];."<br>";
		  //}
		  
		  ?>
		  
		  
		  
		  
		  </td>
      <td colspan="2">
		  
		  
		  
		  <?php 
		  //if($tipofactura == "normal")
		  //{
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				$crow3['preciounitario']."<br>";
				$iva = $crow3['iva'];
				echo $subtotalindividual = $crow3['preciounitario']*$crow3['cantidad']."<br>";
				
			}
		  //}
		  //else
		  //{
		  //$subtotal = $_SESSION['subtotal']/1.12;echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['cantidad'];
		  //}
		  
		  ?>
		  
		  
		</td>
      <td>&nbsp;</td>
      <td><?php 
		  //if($tipofactura == "normal")
		  //{
		  $id;
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 echo $crow3['cantidad']."<br>";
			}
		  //}
		  //else
		  //{
		  //echo "1"."<br>";
		  //}
		  
		  ?></td>
      <td><?php 
		 
			  //--buscar en ventas y sacar productos
		    $id;
			 $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 //echo $producto = $crow3['producto']."<br>";
				$producto = $crow3['producto'];
			}
			 //-- buscar en productos para saber si es mensual u otra cosa
			$sql33 = "SELECT * from productos WHERE `producto` LIKE '$producto' order by producto DESC";
			$result33 = mysqli_query($con, $sql33); 
			while($crow33 = mysqli_fetch_assoc($result33))
            {
				$tipo = $crow33['periodo'];
				echo $productoimprimir = $crow33['producto']."<br>";
			}
			  
			 /*if($tipo == "normal")
			{
				 echo  $producto."<br>";
			}
			  else
			{
				  echo $_SESSION['producto']."<br>";
			}*/
				  
		 
		  
		  
		  ?></td>
      <td><?php 
		  //if($tipofactura == "normal")
		 // {
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				 echo $preciounitario = $crow3['subtotal']."<br>";
			}
		  //}
		  //else
		  //{
			  
		  //$subtotal = $_SESSION['subtotal']/1.12;echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['cantidad'];."<br>";
		  //}
		  
		  ?></td>
      <td colspan="2"><?php 
		  //if($tipofactura == "normal")
		  //{
		  $sql3 = "SELECT * from ventas WHERE `id` LIKE '$id' order by numero ASC";
			$result3 = mysqli_query($con, $sql3); 
			while($crow3 = mysqli_fetch_assoc($result3))
            {
				$crow3['preciounitario']."<br>";
				$iva = $crow3['iva'];
				echo $crow3['preciounitario']*$crow3['cantidad']."<br>";
			}
		  //}
		  //else
		  //{
		  //$subtotal = $_SESSION['subtotal']/1.12;echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['cantidad'];
		  //}
		  
		  ?></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><?php if($tipo == "normal")
			{
				// echo  $producto."<br>";
			}
			  else
			{
				  echo $_SESSION['producto']."<br>";
			}?></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php if($tipo == "normal")
			{
				// echo  $producto."<br>";
			}
			  else
			{
				  echo $_SESSION['producto']."<br>";
			}?></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">Subtotal:</td>
      <td><?php echo $preciounitario; //echo $_SESSION['subtotal'];?></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">Subtotal:</td>
      <td><?php echo $preciounitario; //echo $_SESSION['subtotal'];?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">Iva 12%:</td>
      <td><?php 
		  
		  //if($tipofactura == "normal")
		  //{
		  	  echo $iva;
			  //echo $format_number4 = number_format($iva, 2); 
		  //}
		 // else
		  //{
		  	//$ivaimprecion = $subtotal * $ivadecimal;
			//echo $format_number4 = number_format($ivaimprecion, 2); //echo $_SESSION['iva'];
		  //}
		  
		  
		  
		  
		  ?></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">Iva 12%:</td>
      <td><?php 
		  
		  //if($tipofactura == "normal")
		  //{
		  	  echo $iva;
			  //echo $format_number4 = number_format($iva, 2); 
		  //}
		 // else
		  //{
		  	//$ivaimprecion = $subtotal * $ivadecimal;
			//echo $format_number4 = number_format($ivaimprecion, 2); //echo $_SESSION['iva'];
		  //}
		  
		  
		  
		  
		  ?></td>

      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">Total:</td>
      <td>
		  
		  
		  <?php 
		  
		  if($tipofactura == "normal")
		  {
		  $total = $subtotal + $iva ;echo $format_number4 = number_format($total, 2); 
		  }
		  else
		  {
		  $total = $_SESSION['total'];echo $format_number3 = number_format($total, 2); //echo $_SESSION['total'];
		  
		  }
		  
		  
		  ?>
		  </td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">Total:</td>
      <td>
		
		
		 <?php 
		  
		  if($tipofactura == "normal")
		  {
		  $total = $subtotal + $iva ;echo $format_number4 = number_format($total, 2); 
		  }
		  else
		  {
		  $total = $_SESSION['total'];echo $format_number3 = number_format($total, 2); //echo $_SESSION['total'];
		  
		  }
		  
		  
		  ?>
		
		
		</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
<tr>
      <td height="22" colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>

<?php  if($firmasrecibo == "si")
		  {
		  
?>
<tr>
      <td align="center">&nbsp;</td>
      <td>_______________</td>
      <td colspan="3">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
    </tr>



    <tr>
      <td align="center">&nbsp;</td>
      <td>f) Autorizada</td>
      <td align="center">f) Cliente</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">f) Autorizada</td>
      <td colspan="3" align="center">f) Cliente</td>
    </tr>
	  <?php }?>
  </tbody>
</table>
	<?php 
$sqlem = "SELECT * from `mail`";
$resultem = mysqli_query($con, $sqlem);
while($crowem = mysqli_fetch_assoc($resultem))
{
	$logow = substr($crowem['pago'], 2);
	$logow = "/images/pago.png";
	$imagen = $crowem['ip'].$logow;
	
}
$sqlwa = "SELECT * from `apis`";
$resulwa = mysqli_query($con, $sqlwa);
while($crowwa = mysqli_fetch_assoc($resulwa))
{
	$token = $crowwa['tokenwhatsapp'];
	
}
	
$texto = "Estimado cliente su ".$_SESSION['producto']." se ha registrado satisfactoriamente , A nombre de ".$nombre.", Por un valor de ".$format_number3.", Para mayor informacion Comunicarse al  ".$telefonooficina." NO RESPONDER ESTE MENSAJE";

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
  CURLOPT_POSTFIELDS => "token=$token&to=$telefono&image=$imagen&caption=$texto&referenceId=hh&nocache=hh",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

	
	
	?>
	<a href="../clientes/index.php">...</a>

	
	
	<?php 
	//
//$texto = "Estimado cliente su Pago de ".$_SESSION['producto']." se ha registrado satisfactoriamente , A nombre de ".$nombre.", por un ".$producto." Por un valor de ".$format_number3.", Para mayor informacion Comunicarse al  ".$telefonooficina." NO RESPONDER ESTE MENSAJE";
//
//$curl = curl_init();
//
//curl_setopt_array($curl, array(
//  CURLOPT_URL => "https://api.ultramsg.com/instance16295/messages/image",
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_ENCODING => "",
//  CURLOPT_MAXREDIRS => 10,
//  CURLOPT_TIMEOUT => 30,
//  CURLOPT_SSL_VERIFYHOST => 0,
//  CURLOPT_SSL_VERIFYPEER => 0,
//  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//  CURLOPT_CUSTOMREQUEST => "POST",
//  CURLOPT_POSTFIELDS => "token=$token&to=$telefono&image=$imagen&caption=$texto&referenceId=hh&nocache=hh",
//  CURLOPT_HTTPHEADER => array(
//    "content-type: application/x-www-form-urlencoded"
//  ),
//));
//
//$response = curl_exec($curl);
//$err = curl_error($curl);

	
	
	?>

</body>
</html>