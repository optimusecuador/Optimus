<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

if(isset($_POST['ip']))
{
	$accion = $_POST['accion'];
	$truenas_url = $_POST['ip'];
	$iporiginal = $_POST['iporiginal'];
	$api_key = $_POST['api'];
	
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO truenas (ip, api) VALUES (?, ?)");
		$stmt->bind_param('ss', $truenas_url, $api_key);
		$stmt->execute();
	}
	else
	{
		$sql = "UPDATE truenas SET ip='$truenas_url', api='$api_key' WHERE ip='$iporiginal'";
		mysqli_query($con, $sql);
	}
} 

header('Location: truenas.php');
?>