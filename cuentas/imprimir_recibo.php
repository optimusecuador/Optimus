<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>
<?php 
	date_default_timezone_set('America/Guayaquil');
	require('../conectar.php');
session_start();
	//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
		}
	?>
<body>
<table width="100%">
  <tbody>
    <tr>
      <td width="25" colspan="2"><img src="<?php echo $logo;?>" width="52" height="55" alt=""/></td>
      <td width="25" colspan="3"><h1>&nbsp;</h1></td>
      <td width="25" colspan="3"><img src="<?php echo $logo;?>" width="52" height="55" alt=""/></td>
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
      <td align="left">&nbsp;</td>
      <td colspan="4" align="left">&nbsp;</td>
      <td align="right" style="color: #FFFFFF">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Fecha</td>
      <td colspan="4" align="left">:<?php echo $_SESSION['fecha'];?></td>
      <td align="right" style="color: #FFFFFF">......</td>
      <td align="left">Fecha</td>
      <td colspan="4" align="left">:<?php echo $_SESSION['fecha'];?></td>
    </tr>
    <tr>
      <td align="left">Caja:</td>
      <td align="left">:<?php $ci = $_SESSION['caja'];
		  
		  $sql = "SELECT * from cuentas WHERE `numero` LIKE '$ci'";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						echo $nombre =$crow['institucion'];
					
						}
		  
		  ?></td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">Caja</td>
      <td align="left">:
      <?php $ci = $_SESSION['caja'];
		  
		  $sql = "SELECT * from cuentas WHERE `numero` LIKE '$ci'";
			$result = mysqli_query($con, $sql); 
			while($crow = mysqli_fetch_assoc($result))
            			{	
						

						echo $nombre =$crow['institucion'];
					
						}
		  
		  ?></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td>Cant</td>
      <td>Descripcion</td>
      <td>P. Unit</td>
      <td colspan="2">Total</td>
      <td>&nbsp;</td>
      <td>Cant</td>
      <td>Descripcion</td>
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
      <td>1</td>
      <td><?php echo $_SESSION['producto'];?></td>
      <td><?php $cantidad = $_SESSION['cantidad'];echo $format_number1 = number_format($cantidad, 2); //echo $_SESSION['cantidad'];?></td>
      <td colspan="2"><?php $cantidad = $_SESSION['cantidad'];echo $format_number1 = number_format($cantidad, 2); //echo $_SESSION['cantidad'];?></td>
      <td>&nbsp;</td>
      <td>1</td>
      <td><?php echo $_SESSION['producto'];?></td>
      <td><?php $cantidad = $_SESSION['cantidad'];echo $format_number1 = number_format($cantidad, 2); //echo $_SESSION['cantidad'];?></td>
      <td colspan="2"><?php $cantidad = $_SESSION['cantidad'];echo $format_number1 = number_format($cantidad, 2); //echo $_SESSION['cantidad'];?></td>
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
      <td><?php $subtotal = $_SESSION['cantidad'];echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['subtotal'];?></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">Subtotal:</td>
      <td><?php $subtotal = $_SESSION['cantidad'];echo $format_number2 = number_format($subtotal, 2); //echo $_SESSION['subtotal'];?></td>
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
      <td align="right">Total:</td>
      <td><?php $total = $_SESSION['cantidad'];echo $format_number3 = number_format($total, 2); //echo $_SESSION['total'];?></td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">Total:</td>
      <td><?php $total = $_SESSION['cantidad'];echo $format_number3 = number_format($total, 2); //echo $_SESSION['total'];?></td>
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
      <td colspan="2">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>

<tr>
      <td colspan="2" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
    </tr>



    <tr>
      <td colspan="2" align="center">f) Autorizada</td>
      <td colspan="3" align="center">f) Cliente</td>
      <td colspan="3" align="center">f) Autorizada</td>
      <td colspan="3" align="center">f) Cliente</td>
    </tr>
  </tbody>
</table>
<a href="productos.php">... </a>
</body>
</html>