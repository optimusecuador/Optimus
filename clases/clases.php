<?php 
class asientocontable {
public static function asientos($asiento,$descripcion,$valoruno,$valordos,$valortres,$valorcuatro,$valorcinco,$valorseis,$valorsiete,$valorocho,$valornueve,$valordiez,$valoronce,$valordoce)
{
	require('../conectar.php');	
	$fecha = date("Y-m-d (H:i:s)", time());
//--buscar la transaccion
	$sql = "SELECT * from `asientos` WHERE `asiento` LIKE '$asiento'";
	$result = mysqli_query($con, $sql);
	$numfilasr = $result->num_rows;
	if($numfilasr >= 1)
	{
	while($crow = mysqli_fetch_assoc($result))
				{
					$debeuno = $crow['debeuno'];
					$debedos = $crow['debedos'];
					$debetres = $crow['debetres'];
					$debecuatro = $crow['debecuatro'];
					$debecinco = $crow['debecinco'];
					$debeseis = $crow['debeseis'];
					$haberuno = $crow['haberuno'];
					$haberdos = $crow['haberdos'];
					$habertres = $crow['habertres'];
					$habercuatro = $crow['habercuatro'];
					$habercinco = $crow['habercinco'];
					$haberseis = $crow['haberseis'];	
				}
//-- buscar cada cuenta y sumar valor debe
	$sqluno = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debeuno'";
	$resultuno = mysqli_query($con, $sqluno);
	while($crowuno = mysqli_fetch_assoc($resultuno))
				{
				$debe=$crowuno['debe'];
				if ($debe == "si")
				{
				$sumadebeuno = $crowuno['saldo'] + $valoruno;
				}
				if ($debe == "no")
				{
				$sumadebeuno = $crowuno['saldo'] - $valoruno;
				}
				}
//-- actualizar cuenta contable
	$sql = "UPDATE cuentascontable SET saldo='$sumadebeuno' WHERE id='$debeuno'";
	mysqli_query($con, $sql);
	
	$sqldos = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debedos'";
	$resultdos = mysqli_query($con, $sqldos);
	while($crowdos = mysqli_fetch_assoc($resultdos))
				{
				$debe=$crowdos['debe'];
				if ($debe == "si")
				{
				$sumadebedos = $crowdos['saldo'] + $valordos;
				}
				if ($debe == "no")
				{
				$sumadebedos = $crowdos['saldo'] - $valordos;
				}			
		
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumadebedos' WHERE id='$debedos'";
	mysqli_query($con, $sql);
	$sqltres = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debetres'";
	$resultres = mysqli_query($con, $sqltres);
	while($crowtres = mysqli_fetch_assoc($resultres))
				{
				$debe=$crowtres['debe'];
				if ($debe == "si")
				{
				$sumadebetres = $crowtres['saldo'] + $valortres;
				}
				if ($debe == "no")
				{
				$sumadebetres = $crowtres['saldo'] - $valortres;
				}	
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumadebetres' WHERE id='$debetres'";
	mysqli_query($con, $sql);
	$sqlcuatro = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debecuatro'";
	$resultcuatro = mysqli_query($con, $sqlcuatro);
	while($crowcuatro = mysqli_fetch_assoc($resultcuatro))
				{
					$debe=$crowcuatro['debe'];
				if ($debe == "si")
				{
				$sumadebecuatro = $crowcuatro['saldo'] + $valorcuatro;
				}
				if ($debe == "no")
				{
				$sumadebecuatro = $crowcuatro['saldo'] - $valorcuatro;
				}	
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumadebecuatro' WHERE id='$debecuatro'";
	mysqli_query($con, $sql);
	$sqlcinco = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debecinco'";
	$resultcinco = mysqli_query($con, $sqlcinco);
	while($crowcinco = mysqli_fetch_assoc($resultcinco))
				{
					$debe=$crowcinco['debe'];
				if ($debe == "si")
				{
				$sumadebecinco = $crowcinco['saldo'] + $valorcinco;
				}
				if ($debe == "no")
				{
				$sumadebecinco = $crowcinco['saldo'] - $valorcinco;
				}	
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumadebecinco' WHERE id='$debecinco'";
	mysqli_query($con, $sql);
	$sqlseis = "SELECT * from `cuentascontable` WHERE `id` LIKE '$debeseis'";
	$resultseis = mysqli_query($con, $sqlseis);
	while($crowseis = mysqli_fetch_assoc($resultseis))
				{
					$debe=$crowseis['debe'];
				if ($debe == "si")
				{
				$sumadebeseis = $crowseis['saldo'] + $valorseis;
				}
				if ($debe == "no")
				{
				$sumadebeseis = $crowseis['saldo'] - $valorseis;
				}	
						
				}
	//-- buscar cada cuenta y sumar valor haber
	$sqluno = "SELECT * from `cuentascontable` WHERE `id` LIKE '$haberuno'";
	$resultuno = mysqli_query($con, $sqluno);
	while($crowuno = mysqli_fetch_assoc($resultuno))
				{
					$debe=$crowuno['haber'];
				if ($debe == "si")
				{
				$sumahaberuno = $crowuno['saldo'] + $valorsiete;
				}
				if ($debe == "no")
				{
				$sumahaberuno = $crowuno['saldo'] - $valorsiete;
				}	
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahaberuno' WHERE id='$haberuno'";
	mysqli_query($con, $sql);
	$sqldos = "SELECT * from `cuentascontable` WHERE `id` LIKE '$haberdos'";
	$resultdos = mysqli_query($con, $sqldos);
	while($crowdos = mysqli_fetch_assoc($resultdos))
				{
					$debe=$crowdos['haber'];
				if ($debe == "si")
				{
				$sumahaberdos = $crowdos['saldo'] + $valorocho;
				}
				if ($debe == "no")
				{
				$sumahaberdos = $crowdos['saldo'] - $valorocho;
				}
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahaberdos' WHERE id='$haberdos'";
	mysqli_query($con, $sql);
	$sqltres = "SELECT * from `cuentascontable` WHERE `id` LIKE '$habertres'";
	$resultres = mysqli_query($con, $sqltres);
	while($crowtres = mysqli_fetch_assoc($resultres))
				{
					$debe=$crowtres['haber'];
				if ($debe == "si")
				{
				$sumahabertres = $crowtres['saldo'] + $valornueve;
				}
				if ($debe == "no")
				{
				$sumahabertres = $crowtres['saldo'] - $valornueve;
				}
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahabertres' WHERE id='$habertres'";
	mysqli_query($con, $sql);
	$sqlcuatro = "SELECT * from `cuentascontable` WHERE `id` LIKE '$habercuatro'";
	$resultcuatro = mysqli_query($con, $sqlcuatro);
	while($crowcuatro = mysqli_fetch_assoc($resultcuatro))
				{
					$debe=$crowcuatro['haber'];
				if ($debe == "si")
				{
				$sumahabercuatro = $crowcuatro['saldo'] + $valordiez;
				}
				if ($debe == "no")
				{
				$sumahabercuatro = $crowcuatro['saldo'] - $valordiez;
				}
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahabercuatro' WHERE id='$habercuatro'";
	mysqli_query($con, $sql);
	$sqlcinco = "SELECT * from `cuentascontable` WHERE `id` LIKE '$habercinco'";
	$resultcinco = mysqli_query($con, $sqlcinco);
	while($crowcinco = mysqli_fetch_assoc($resultcinco))
				{
					$debe=$crowcinco['haber'];
				if ($debe == "si")
				{
				$sumahabercinco = $crowcinco['saldo'] + $valoronce;
				}
				if ($debe == "no")
				{
				$sumahabercinco = $crowcinco['saldo'] - $valoronce;
				}
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahabercinco' WHERE id='$habercinco'";
	mysqli_query($con, $sql);
	$sqlseis = "SELECT * from `cuentascontable` WHERE `id` LIKE '$haberseis'";
	$resultseis = mysqli_query($con, $sqlseis);
	while($crowseis = mysqli_fetch_assoc($resultseis))
				{
					$debe=$crowseis['haber'];
				if ($debe == "si")
				{
				$sumahaberseis = $crowseis['saldo'] + $valordoce;
				}
				if ($debe == "no")
				{
				$sumahaberseis = $crowseis['saldo'] - $valordoce;
				}
						
				}
	$sql = "UPDATE cuentascontable SET saldo='$sumahaberseis' WHERE id='$haberseis'";
	mysqli_query($con, $sql);

	//-- gravar el diario de transacciones
	$sql = "INSERT INTO diario (asiento, fecha, descripcion, debeuno, debedos, debetres, debecuatro, debecinco, debeseis, haberuno, haberdos, habertres,habercuatro, habercinco, haberseis, sumadebeuno, sumadebedos, sumadebetres, sumadebecuatro, sumadebecinco, sumadebeseis, sumahaberuno, sumahaberdos, sumahabertres, sumahabercuatro, sumahabercinco, sumahaberseis) VALUES ('$asiento', '$fecha','$descripcion', '$debeuno', '$debedos', '$debetres', '$debecuatro', '$debecinco', '$debeseis', '$haberuno', '$haberdos', '$habertres', '$habercuatro', '$habercinco', '$haberseis', '$valoruno', '$valordos', '$valortres', '$valorcuatro', '$valorcinco', '$valorseis', '$valorsiete', '$valorocho', '$valornueve', '$valordiez', '$valoronce', '$valordoce')";
	mysqli_query($con, $sql);
}
}
}
	
?>