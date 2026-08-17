<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//include connection
include("../conectar.php");

if(isset($_POST['ip']))
{
	$accion       = $_POST['accion'];
	$traccar_url  = $_POST['ip'];
	$iporiginal   = $_POST['iporiginal'];
	$traccar_user = $_POST['api'];
	$traccar_pass = $_POST['contrasena'];
	
	if ($accion == 'nuevo')
	{
		$stmt = $con->prepare("INSERT INTO traccar (ip, api, contrasena) VALUES (?, ?, ?)");
		$stmt->bind_param('sss', $traccar_url, $traccar_user, $traccar_pass);
		$stmt->execute();
	}
	else
	{
		$stmt = $con->prepare("UPDATE traccar SET ip=?, api=?, contrasena=? WHERE ip=?");
		$stmt->bind_param('ssss', $traccar_url, $traccar_user, $traccar_pass, $iporiginal);
		$stmt->execute();
	}
} 

header('Location: traccar.php');
?>