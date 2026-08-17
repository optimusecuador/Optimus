<?php
date_default_timezone_set('America/Guayaquil');
session_start();
include("../conectar.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
	$accion=$_GET['accion'];
  $query = "DELETE FROM transferencia WHERE id = $id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
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
