<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

if(isset($_POST['ip']))
{
	$accion = $_POST['accion'];
	$ip = $_POST['ip'];
	$iporiginal = $_POST['iporiginal'];
	$corte = $_POST['corte'];
	$backup = $_POST['backup'];
	$creacion = $_POST['creacion'];
	$usuario = $_POST['usuario'];
	$reactivacion = $_POST['reactivacion'];
	$reinicio = $_POST['reinicio'];
	$eliminacion = $_POST['eliminacion'];
	$contrasena = $_POST['contrasena'];
	if ($accion == 'nuevo')
	{
		//$sql = "INSERT INTO mikrotik  (`ip`, `corte`, `backup`, `creacion`, `usuario`, `reactivacion`, `reinicio`,`eliminacion`, `eliminacion`, `lng`, `ipgestion`, `nodo`) VALUES ('$nombres2', '$direccion', '$pais', '$codigo', '$ip', '$modelo', '$serie', '$contrato', '$lat', '$lng', '$vacioip', '$vacioip')";
		//mysqli_query($con, $sql);
		
		$stmt = $con->prepare("INSERT INTO mikrotik (ip, corte, backup, creacion, usuario, reactivacion, reinicio, eliminacion, contrasena) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param('sssssssss', $ip, $corte, $backup, $creacion, $usuario, $reactivacion, $reinicio, $eliminacion, $contrasena);
		$stmt->execute();
		
	}
	else
	{
		
			$sql = "UPDATE mikrotik SET ip='$ip', corte='$corte', backup='$backup', creacion='$creacion', usuario='$usuario', reactivacion='$reactivacion', reinicio='$reinicio', eliminacion='$eliminacion', contrasena='$contrasena' WHERE ip='$iporiginal'";
			mysqli_query($con, $sql);
		
		

		
	}
} 

header('Location: mikrotik.php');
?>  