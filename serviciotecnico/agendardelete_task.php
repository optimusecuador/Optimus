<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include("../conectar.php");


	//--ACTUALIZO EL CODIGO DE ADMINISTRADOR A OCUPADO SI
			{
	if(isset($_SESSION['id'])) 
	{
		echo $codigo = $_SESSION['codigo'];
		
		$sqlu = "SELECT * from `generar_codigo` WHERE `codigo` LIKE '$codigo'";
		$resultu = mysqli_query($con, $sqlu);
		$numfilasu = $resultu->num_rows;
		$numfilasu;
		if ($numfilasu == 0) 
		{
			echo "EL CODIGO ES INVALIDO";
		}
		else
		{
			while($crowem = mysqli_fetch_assoc($resultu))
        	{
				$ocupado = $crowem['ocupado'];
			}
		}
		
		if ($ocupado == "no")
		{
			  echo $id = $_SESSION['id'];
			  echo $accion=$_SESSION['accion'];
			  $query = "DELETE FROM clienteasignar WHERE id = $id";
			  $result = mysqli_query($con, $query);
			  $ocupado ="si";
			  $sql = "UPDATE generar_codigo SET ocupado='$ocupado' WHERE codigo='$codigo'";
			  mysqli_query($con, $sql);
		}
		else
		{
			echo "EL CODIGO ya ha sido utilizado";
		}
		
	}
  
  header('Location: agendar.php?accion=agendar');
	
}

?>
