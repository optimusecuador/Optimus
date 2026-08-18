
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
	$temp = 0;
	$codigor = $_GET['codigo'] ?? '';
	
	//-- BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
	$sqlem = "SELECT * from `configuracion` order by ruc DESC";
	$resultem = mysqli_query($con, $sqlem);
	$logo = "";
	while($crowem = mysqli_fetch_assoc($resultem))
	{
		$_SESSION['empresamail'] = $crowem['empresa'];
		$empresa = $crowem['empresa'];
		$logo = $crowem['logo'];
	}
	
	$tabla3 = "registro";
	$sql3 = "SELECT * from `".$tabla3."` WHERE `id` LIKE '$codigor' order by unico DESC";
	$result3 = mysqli_query($con, $sql3);

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
      if ($temp == "0" or $temp == "2" or $temp == "4" or $temp == "6" or $temp == "8" or $temp == "10" or $temp == "12" or $temp == "14" or $temp == "16" or $temp == "18" or $temp == "20" or $temp == "22" or $temp == "24" or $temp == "26" or $temp == "28" or $temp == "30" or $temp == "32" or $temp == "34" or $temp == "36" or $temp == "38" or $temp == "40" or $temp == "42" or $temp == "46" or $temp == "48" or $temp == "50")
      {
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
          echo $crow['producto'];
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
          echo $crow['producto'];
        }
      ?></td>
      <td><?php echo $cliente = $crowp['cliente'];?></td>
      <td><?php echo $cliente = $crowp['bodega'];?></td>
      <td colspan="2"><?php echo $fechat = $crowp['fecha'];?></td>
    </tr>
    <?php 
      }
      $temp = $temp + 1;
    } 
    ?>
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
      <td colspan="2" align="center">
        f) Autorizada<a href="transferencias.php">...</a>
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
