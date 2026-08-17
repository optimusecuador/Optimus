<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include('../conectar.php');

if (isset($_POST['producto'])) {
  	$title = $_POST['title'];
	$producto = $_POST['producto'];
	$serie = $_POST['series'];
	$personal = $_POST['personal'];
	$bodegadestino = $_POST['bodegadestino'];
	$documento = $_POST['documento'];
  	$description = $_POST['description'];
  	$accion=$_POST['accion'];
	$fecha = date("Y-m-d (H:i:s)", time());
	$bodegaorigen = "bodega".$personal;
	//$bodegaorigen = strtolower($bodegaorigen);
	
	$sql3 = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$producto'order by fechaing DESC";
	$result3 = mysqli_query($con, $sql3);
	while($crow3 = mysqli_fetch_assoc($result3))
				{
					$cantidadorigen = $crow3['cantidad'];
				}
	echo $cantidadorigen; 
	echo $title;
	if($cantidadorigen < $title)
	{
		$_SESSION['mensaje'] = '1';
  	
	}
	else
	{
		
		$query = "INSERT INTO transferencia(cantidad, description, producto, personal, title, created_at, bodegadestino, serie) VALUES ('$title', '$description', '$producto', '$personal', '$documento', '$fecha', '$bodegadestino', '$serie')";
  		$result = mysqli_query($con, $query);
  		if(!$result) {
    	die("Query Failed.");
  		}

			
		
		
	}
	
  		if ($accion == "transferencia")
			{
					header('Location: ingreso.php?accion=transferencia');
			}
			if ($accion == "egreso")
			{
					header('Location: ingreso.php?accion=egreso');
			}
  

}

?>
