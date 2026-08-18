<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Transferencia de Productos</title>
<style>
/* Estilos para el Modal / Burbuja */
.modal-overlay {
  display: none;
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.6);
  z-index: 9999;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: #ffffff;
  padding: 20px 25px;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  width: 360px;
  font-family: Arial, sans-serif;
  text-align: center;
}
.modal-content h3 { margin-top: 0; color: #333; }
.modal-content select,
.modal-content input[type="email"] {
  width: 100%;
  padding: 8px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.btn-mail {
  background-color: #007bff;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  font-size: 13px;
  display: inline-block;
}
.btn-mail:hover { background-color: #0056b3; }
.btn-cancel {
  background-color: #6c757d;
  color: white;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 5px;
}
</style>
</head>
<?php 
	date_default_timezone_set('America/Guayaquil');
	require('../conectar.php');
	session_start();
	$tabla3 = "transferencia";
	$tabla2 = "registro";
	$tabla = "productos";
	$accion = $_SESSION['accion'] ?? '';
	$vacioint = 0;
	$vacio = "Vacio";
	$sql3 = "SELECT * from `".$tabla3."` order by created_at DESC";
	$result3 = mysqli_query($con, $sql3);
	$sqle = "SELECT * from `configuracion` order by empresa DESC";				
	$resulte = mysqli_query($con, $sqle); 
	$logo = "";
	while($crowe = mysqli_fetch_assoc($resulte)) {
		$logo = $crowe['logo'];
	}

	// Consulta para cargar la lista del personal con su correo
	$sqlPersonal = "SELECT nombres, mail FROM `personal` WHERE mail IS NOT NULL AND mail != '' ORDER BY nombres ASC";
	$resultPersonal = mysqli_query($con, $sqlPersonal);
?>
<body>
<div id="contenido-imprimible">
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
      <td colspan="5" align="left">:<?php echo date("Y-m-d (H:i:s)", time()); ?></td>
      <td align="right" style="color: #FFFFFF">......</td>
      <td align="left">Fecha</td>
      <td colspan="5" align="left">:<?php echo date("Y-m-d (H:i:s)", time()); ?></td>
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
    <?php 
    $codigoborrar = 0;
    while($crowp = mysqli_fetch_assoc($result3)) {
		$codigo = $crowp['producto'];
		$codigoborrar = $crowp['id'];
		$serie = $crowp['serie'];
		$serieproducto = $crowp['serie'];
		$bodegaorigen = "bodega".$crowp['personal'];
		$bodegadestino = "bodega".$crowp['bodegadestino'];
		$bodegaserie = $crowp['bodegadestino'];
		$id = $crowp['title'];
		$fecha = $crowp['created_at'];
		$cantidad_transaccion = $crowp['cantidad'];
		$cantidad = $crowp['cantidad'];
		$producto = $crowp['producto'];
		$usuario = $_SESSION['password'] ?? '';
		$description = "(transferencia )".$crowp['description'];

		$sql33 = "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		$result33 = mysqli_query($con, $sql33);
		$cantidadorigen = 0;
		while($crow33 = mysqli_fetch_assoc($result33)) {
			$cantidadorigen = $crow33['cantidad'];
		}

		if($cantidadorigen >= $cantidad) {
			$cliente = $crowp['personal'];
    ?>
    <tr>
      <td><?php echo $crowp['cantidad'];?></td>
      <td><?php 
		  $sql = "SELECT * from `productos` WHERE `codigo` LIKE '$producto' order by fechaing DESC";
		  $result = mysqli_query($con, $sql);
		  $nombre = "";
		  while($crow = mysqli_fetch_assoc($result)) {
			  echo $crow['producto']."<br>".$crowp['serie'];
			  $nombre = $crow['producto'];
		  }
	  ?></td>
      <td><?php 
		  $sql = "SELECT * from `bodegas` WHERE `numero` LIKE '".$crowp['personal']."'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result)) { echo $crow['nombre']; }
	  ?></td>
      <td><?php 
		  $sql = "SELECT * from `bodegas` WHERE `numero` LIKE '".$crowp['bodegadestino']."'";
		  $result = mysqli_query($con, $sql);
		  while($crow = mysqli_fetch_assoc($result)) { echo $crow['nombre']; }
	  ?></td>
      <td colspan="2"><?php echo $crowp['created_at'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $crowp['cantidad'];?></td>
      <td><?php 
		  $result = mysqli_query($con, "SELECT * from `productos` WHERE `codigo` LIKE '$producto' order by fechaing DESC");
		  while($crow = mysqli_fetch_assoc($result)) { echo $crow['producto']."<br>".$crowp['serie']; }
	  ?></td>
      <td><?php 
		  $result = mysqli_query($con, "SELECT * from `bodegas` WHERE `numero` LIKE '".$crowp['personal']."'");
		  while($crow = mysqli_fetch_assoc($result)) { echo $crow['nombre']; }
	  ?></td>
      <td><?php 
		  $result = mysqli_query($con, "SELECT * from `bodegas` WHERE `numero` LIKE '".$crowp['bodegadestino']."'");
		  while($crow = mysqli_fetch_assoc($result)) { echo $crow['nombre']; }
	  ?></td>
      <td colspan="2"><?php echo $crowp['created_at'];?></td>
    </tr>
    <?php 
		// Procesamiento de BD
		mysqli_query($con, "UPDATE `series` SET bodega = '$bodegaserie' WHERE serie='$serie'");
		
		$result = mysqli_query($con, "SELECT * from `".$bodegaorigen."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC");
		$cantidadrestada = 0; $saldo_anterior = 0;
		while($crow = mysqli_fetch_assoc($result)) {	
			$cantidadrestada = $crow['cantidad'] - $cantidad;
			$saldo_anterior = $crow['cantidad'];
			$periodo = $crow['periodo'];
		}
		mysqli_query($con, "UPDATE `".$bodegaorigen."` SET cantidad='$cantidadrestada' WHERE codigo='$codigo'");
		
		$accione = "egreso";		
		$sql = "INSERT INTO `registro` (`id`, `producto`, `fecha`, `accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ('$id', '$codigo', '$fecha', '$accione', '$cantidad_transaccion', '$saldo_anterior', '$cantidadrestada', '$usuario', '$bodegadestino', '$bodegaorigen', '$vacio', '$vacio', '$vacio', '$serieproducto', '$vacio', '$vacioint', '$vacio', '$bodegaorigen', '$description')"; 
		mysqli_query($con, $sql);	

		$result5 = mysqli_query($con, "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC");
		if ($result5->num_rows == 0) {
			$stock = "0";
			$stmt = $con->prepare("INSERT INTO `".$bodegadestino."` (id, producto, serie, fechaing, codigo, periodo, cantidad) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param('sssssss', $codigo, $nombre, $serie, $fecha, $codigo, $periodo, $stock);
			$stmt->execute();
		}
		
		$result = mysqli_query($con, "SELECT * from `".$bodegadestino."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC");
		$cantidad2 = 0;
		while($crow = mysqli_fetch_assoc($result)) {	
			$cantidad2 = $crow['cantidad'] + $cantidad_transaccion;
			$saldo_anterior = $crow['cantidad'];
		}
		mysqli_query($con, "UPDATE `".$bodegadestino."` SET cantidad='$cantidad2', producto='$nombre' WHERE id='$codigo'");

		$accioni = "ingreso";		
		$sql = "INSERT INTO `registro` (`id`, `producto`, `fecha`, `accion`, `cantidad`, `saldo_anterior`, `saldo`, `usuario`, `cliente`, `bodega`, `codigo`, `hora`, `numerorecibo`, `serie`, `caja`, `serviciotecnico`, `proveedor`, `seccion`, `observacion`) VALUES ('$id', '$codigo', '$fecha', '$accioni', '$cantidad_transaccion', '$saldo_anterior', '$cantidad2', '$usuario', '$bodegaorigen', '$bodegadestino', '$vacio', '$vacio', '$vacio', '$serieproducto', '$vacio', '$vacioint', '$vacio', '$bodegadestino', '$description')"; 
		mysqli_query($con, $sql);
		}   
    }
    if($codigoborrar > 0) {
      mysqli_query($con, "TRUNCATE TABLE transferencia");	
      mysqli_query($con, "DELETE FROM transferencia WHERE id = $codigoborrar");
    }
    ?>
    <tr>
      <td colspan="2" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
      <td colspan="3" align="center">_______________</td>
      <td colspan="4" align="center">_______________</td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        f) Autorizada<a href="productos.php">...</a>
        <button type="button" class="btn-mail" onclick="abrirModalMail()">Enviar por mail</button>
      </td>
      <td colspan="4" align="center">f) Responsable</td>
      <td colspan="3" align="center">f) Autorizada</td>
      <td colspan="4" align="center">f) Responsable</td>
    </tr>
  </tbody>
</table>
</div>

<div id="modalMail" class="modal-overlay">
  <div class="modal-content">
    <h3>Enviar Transferencia</h3>
    
    <label style="font-size: 13px; color: #555;">Seleccionar del personal:</label>
    <select id="select_personal" onchange="seleccionarPersonal(this)">
      <option value="">-- Buscar / Seleccionar Personal --</option>
      <?php 
      if ($resultPersonal && mysqli_num_rows($resultPersonal) > 0) {
        while($rowP = mysqli_fetch_assoc($resultPersonal)) {
          echo '<option value="'.htmlspecialchars($rowP['mail']).'">'.htmlspecialchars($rowP['nombre']).' ('.htmlspecialchars($rowP['mail']).')</option>';
        }
      }
      ?>
    </select>

    <p style="margin: 8px 0; font-size: 12px; color: #777;">O ingrese manualmente el correo:</p>
    <input type="email" id="email_destino" placeholder="correo@ejemplo.com" required>

    <div style="margin-top: 10px;">
      <button type="button" class="btn-mail" onclick="enviarCorreo()">Enviar</button>
      <button type="button" class="btn-cancel" onclick="cerrarModalMail()">Cancelar</button>
    </div>
  </div>
</div>

<script>
function abrirModalMail() {
  document.getElementById('modalMail').style.display = 'flex';
}

function cerrarModalMail() {
  document.getElementById('modalMail').style.display = 'none';
}

function seleccionarPersonal(selectElement) {
  const mailSeleccionado = selectElement.value;
  if (mailSeleccionado) {
    document.getElementById('email_destino').value = mailSeleccionado;
  }
}

function enviarCorreo() {
  const email = document.getElementById('email_destino').value;
  if (!email) {
    alert("Por favor, ingrese o seleccione un correo válido.");
    return;
  }

  // Captura el HTML visible del documento
  const contenidoHTML = document.getElementById('contenido-imprimible').innerHTML;

  const formData = new FormData();
  formData.append('email', email);
  formData.append('contenido', contenidoHTML);

  fetch('enviar_mail.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    alert(data);
    cerrarModalMail();
  })
  .catch(error => {
    alert("Error al intentar enviar el correo.");
    console.error(error);
  });
}
</script>
</body>
</html>