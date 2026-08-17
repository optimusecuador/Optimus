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
	$temp = 0;
	$codigor = $_GET['codigo'];
	//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
		}
	$tabla3 = "registro";
	$sql3 = "SELECT * from `".$tabla3."` WHERE `id` LIKE '$codigor' order by unico DESC";
	$result3 = mysqli_query($con, $sql3);
	
	?>
<body>
<table width="100%">
  <tbody>
    <tr>
      <td width="25" colspan="2"><img src="<?php echo $logo;?>" width="52" height="55" alt=""/></td>
      <td width="25" colspan="4"><h1>&nbsp;</h1></td>
      <td width="25" colspan="3" align="center"><img src="<?php echo $logo;?>" width="52" height="55" alt=""/></td>
      <td width="25" colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td align="left">Fecha</td>
      <td colspan="5" align="left">:<?php echo $fecha = date("Y-m-d (H:i:s)", time()); ?></td>
      <td align="right" style="color: #FFFFFF">......</td>
      <td align="left">Fecha</td>
      <td colspan="5" align="left">:<?php echo $fecha = date("Y-m-d (H:i:s)", time()); ?></td>
    </tr>
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>Cant</td>
      <td>Descripcion</td>
      <td>B.Origen</td>
      <td>B.Destino</td>
      <td colspan="2">Fecha</td>
      <td>&nbsp;</td>
      <td>Cant</td>
      <td>Descripcion</td>
      <td>B.Origen</td>
      <td>B.Destino</td>
      <td colspan="2">Fecha</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>


    </tr>
	  <?php 
	  while($crowp = mysqli_fetch_assoc($result3))
    {
		  if ($temp == "0" or $temp == "2" or $temp == "4" or $temp == "6" or $temp == "8"  or $temp == "10" or $temp == "12" or $temp == "14" or $temp == "16" or $temp == "18" or $temp == "20" or $temp == "22" or $temp == "24" or $temp == "26" or $temp == "28" or $temp == "30" or $temp == "32" or $temp == "34" or $temp == "36" or $temp == "38" or $temp == "40" or $temp == "42" or $temp == "46"or $temp == "48" or $temp == "50")
		  {
		//$cliente = $crowp['personal'];
	?>
    <tr>
      <td><?php echo $cliente = $crowp['cantidad'];?></td>
      <td><?php 
		  
		  $tabla = "productos";
		  $producto = $crowp['producto'];
		  $sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['producto'];
		  }
		  
		  ?></td>
      <td><?php echo $cliente = $crowp['cliente'];?></td>
      <td><?php echo $cliente = $crowp['bodega'];?></td>
      <td colspan="2"><?php echo $fechat = $crowp['fecha'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $cliente = $crowp['cantidad'];?></td>
      <td><?php 
		  
		  $tabla = "productos";
		  $producto = $crowp['producto'];
		  $sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result))
          {
			  echo  $crow['producto'];
		  }
		  
		  ?></td>
      <td><?php echo $cliente = $crowp['cliente'];?></td>
      <td><?php echo $cliente = $crowp['bodega'];?></td>
      <td colspan="2"><?php echo $fechat = $crowp['fecha'];?></td>
    </tr>
	  <?php  }
	  $temp = $temp  +1;
	  }?>
    
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td align="right">&nbsp;</td>
      <td>.</td>

      <td>&nbsp;</td>
    </tr>

<tr>
      <td colspan="2" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
    </tr>



    <tr>
      <td colspan="2" align="center">f) Autorizada<a href="transferencias.php">...</a></td>
      <td colspan="4" align="center">f) Responsable</td>
      <td colspan="3" align="center">f) Autorizada</td>
      <td colspan="4" align="center">f) Responsable</td>
    </tr>
  </tbody>
</table>
</body>
</html>