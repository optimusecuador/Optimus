<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Optimus_plantilla.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- INICIO DE CODIGO PHP QUE TIENE QUE SER FIJO -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
date_default_timezone_set('America/Guayaquil');
session_start();
//setlocale(LC_TIME, 'es_ES', 'esp_esp');
setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, 'es_ES.UTF-8'); //Linux
/* ===============================
   CONEXION BD  
=================================*/
require('../conectar.php');
$oltconfiguracion = "no";
$mikrotikconfiguracion = "no";
	//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$colorfondo = $crowem['colorfondo'];
			$carpeta = $crowem['carpeta'];
			$tipoempresacontrol = $crowem['tipoempresa'];
			$ip = $crowem['ip'];
			$actualizacionanterior = $crowem['actualizacion'];
			$ivadecimal =(100+$crowem['iva'])/100;
			//#24a5dd
		}
	
	if(isset($_SESSION['password']))
	{

		//--BUSCO EL NOMBRE DE LA EMPRESA Y EL LOGO
		$sqlem = "SELECT * from `configuracion` order by ruc DESC";
		$resultem = mysqli_query($con, $sqlem);
		while($crowem = mysqli_fetch_assoc($resultem))
        {
			$_SESSION['empresamail']=$crowem['empresa'];
			$empresa = $crowem['empresa'];
			$logo = $crowem['logo'];
			$colorfondo = $crowem['colorfondo'];
			$carpeta = $crowem['carpeta'];
			$tipoempresacontrol = $crowem['tipoempresa'];
			$ip = $crowem['ip'];
			$oltconfiguracion = $crowem['olt'];
			$mikrotikconfiguracion = $crowem['mikrotik'];
			$actualizacionanterior = $crowem['actualizacion'];
			$ivadecimal =(100+$crowem['iva'])/100;
			//#24a5dd
		}

//--BUSCO ACTUALIZACION NUEVA
		$sqlac = "SELECT * from `actualizacion` order by fecha ASC";
		$resultac = mysqli_query($conactualizacion, $sqlac);
		while($crowac = mysqli_fetch_assoc($resultac))
        {
			$actualizacionnueva = $crowac['fecha'];
			
		}
	
	$personal = $_SESSION['password']; 
	
	$contrasenapersonal = $_SESSION['password'];
	$sqlp = "SELECT * from `personal` WHERE `contrasena` LIKE '$contrasenapersonal' order by codigo DESC";
	$resultp = mysqli_query($con, $sqlp);
	while($crowp = mysqli_fetch_assoc($resultp))
    {	
		$sistema = "software";
		$menu = $crowp['puesto'];	
		if ($crowp['puesto'] == "instalador")
		{
			$sistema = "tecnico";
		}
		$puesto_personal=$crowp['puesto'];
		$usuarionombre=$crowp['nombres']." ".$crowp['apellidos'];
		$usuarionombre2=$crowp['nombres'];
		$foto=$crowp['foto'];
		$uno=$crowp['uno'];
		$dos=$crowp['dos'];
		$tres=$crowp['tres'];
		$cuatro=$crowp['cuatro'];
		$cinco 	=$crowp['cinco'];
		$seis 	=$crowp['seis'];
		$siete=$crowp['siete'];
		$ocho=$crowp['ocho'];
		$nueve 	=$crowp['nueve'];
		$diez =$crowp['diez'];
		$once =$crowp['once'];
		$doce =$crowp['doce'];
		$trece=$crowp['trece'];
		$catorce =$crowp['catorce'];
		$quince=$crowp['quince'];
		$diezyseis =$crowp['diezyseis'];
		$diezysiete=$crowp['diezysiete'];
		$diezyocho =$crowp['diezyocho'];
		$diezynueve =$crowp['diezynueve'];
		$veinte =$crowp['veinte'];
		$veinteyuno=$crowp['veinteyuno'];
		$veinteydos=$crowp['veinteydos'];
		$veinteytres=$crowp['veinteytres'];
		$veinteycuatro=$crowp['veinteycuatro'];
		$veinteycinco =$crowp['veinteycinco'];
		$veinteyseis =$crowp['veinteyseis'];
		$veinteysiete=$crowp['veinteysiete'];
		$veinteyocho =$crowp['veinteyocho'];
		$veinteynueve =$crowp['veinteynueve'];
		$treinta =$crowp['treinta'];
		$treintayuno =$crowp['treintayuno'];
		$treintaydos =$crowp['treintaydos'];
		$treintaytres=$crowp['treintaytres'];
		$treintaycuatro=$crowp['treintaycuatro'];
		$treintaycinco=$crowp['treintaycinco'];
		$treintayseis=$crowp['treintayseis'];
		$treintaysiete=$crowp['treintaysiete'];
		$treintayocho =$crowp['treintayocho'];
		$treintaynueve =$crowp['treintaynueve'];
		$cuarenta =$crowp['cuarenta'];

		$cuarentayuno=$crowp['cuarentayuno'];
		$cuarentaydos =$crowp['cuarentaydos'];
		$cuarentaytres =$crowp['cuarentaytres'];
		$cuarentaycuatro =$crowp['cuarentaycuatro'];
		$cuarentaycinco =$crowp['cuarentaycinco'];
		$cuarentayseis =$crowp['cuarentayseis'];
		$cuarentaysiete =$crowp['cuarentaysiete'];
		$cuarentayocho =$crowp['cuarentayocho'];
		$cuarentaynueve =$crowp['cuarentaynueve'];
		$cincuenta =$crowp['cincuenta'];
		$cincuentayuno =$crowp['cincuentayuno'];
		$cincuentaydos =$crowp['cincuentaydos'];
		$cincuentaytres =$crowp['cincuentaytres'];
		$exportar =$crowp['exportar'];
		$cambiarprecio =$crowp['cambiarprecio'];
	}
	// PHP program to get IP address of client
	$IP = $_SERVER['REMOTE_ADDR'];
	// PHP code to get the MAC address of Client
	$MAC = exec('getmac');
	$nombre = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  	// Storing 'getmac' value in $MAC
	$MAC = strtok($MAC, ' ');
	$fecha = date("Y-m-d (H:i:s)", time());
	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "s") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//$sql = " INSERT INTO `acceso` ( `usuario`, `fecha`, `url`, `ip`, `mac`, `nombre`) VALUES ( '$personal', '$fecha', '$url', '$IP', '$MAC', '$nombre')"; 
	//mysqli_query($con, $sql);

	}
	else
	{
		echo "no existe variable de sesion iniciada";
	}
	
	
	?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title>Global Net</title>
	<!-- Aquí colocas tu icono -->
    <link rel="icon" type="image/x-icon" href="../images/ico.png">
    <link rel="shortcut icon" type="image/x-icon" href="../images/ico.png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head> 
<body>
  <div class="app-shell">
    <aside class="sidebar">
  <a class="brand" href="../resumen/index.php">
    <img src="../img/logo.png" width="186" height="69" alt="Nexus ISP"/>
  </a>

  <nav class="main-nav">
    <details class="menu-section">
      <summary class="menu-label">GESTIÓN</summary>
      <a href="../resumen/index.php"><i data-lucide="home"></i> Resumen</a>
      <a href="../clientes/index.php"><i data-lucide="users"></i> Clientes</a>
      <a href="../cuentas/index.php"><i data-lucide="landmark"></i> Cuentas Bancarias</a>
      <a href="../reportes/index.php"><i data-lucide="bar-chart-3"></i> Reportes</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">OPERACIONES</summary>
      <a href="../productos/productos.php"><i data-lucide="boxes"></i> Inventario</a>
      <a href="../personal/productos.php"><i data-lucide="user-round-cog"></i> Personal</a>
      <a href="../serviciotecnico/index.php"><i data-lucide="wrench"></i> Servicio Técnico</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">INFRAESTRUCTURA</summary>
      <a href="../mikrotik/listado.php"><i data-lucide="shield-check"></i> MikroTik</a>
      <a href="https://192.168.8.100/action/login.html" target="new"><i data-lucide="shield-check"></i> OLT</a>
      <a href="http://10.7.0.254:15178/ViewPower/monitor?319" target="new"><i data-lucide="shield-check"></i> Ups</a>
      <a href="../truenas/truenas.php"><i data-lucide="hard-drive"></i> NAS</a>
      <a href="../traccar/traccar.php"><i data-lucide="map-pin"></i> Rastreo</a>
      <a href="../streaming/index.php"><i data-lucide="play-circle"></i> Streaming</a>
      <a href="../zkteco/index.php"><i data-lucide="fingerprint"></i> ZKTeco</a>
	  <a href="../red/index.php"><i data-lucide="shield-check"></i> Mapeo Red</a>
	  <a href="../redvirtual/index.php"><i data-lucide="shield-check"></i> Red Virtual</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">SISTEMA</summary>
      <a href="../estado/index.php"><i data-lucide="badge-check"></i> Estado Contrato</a>
      <a href="#"><i data-lucide="calculator"></i> Contabilidad</a>
      <a href="../configuracion/index.php"><i data-lucide="settings"></i> Configuración</a>
    </details>
  </nav>
</aside>

<style>
  /* Animación de apertura suave */
  .menu-section[open] {
    animation: fadeIn 0.3s ease-out;
  }
  @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

  .menu-section summary {
    list-style: none;
    cursor: pointer;
    padding: 12px 20px;
    font-size: 0.75rem;
    color: var(--muted);
    font-weight: 800;
    letter-spacing: 0.1em;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: color 0.3s;
  }

  .menu-section summary:hover { color: var(--cyan); }

  .menu-section summary::after {
    content: "chevron-down"; /* Si usas lucide, podrías incluso inyectar un icono aquí */
    content: "▼";
    font-size: 8px;
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .menu-section[open] summary::after { transform: rotate(180deg); color: var(--cyan); }

  /* Estilo de los enlaces con efecto de deslizamiento */
  .menu-section a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 20px;
    margin: 2px 10px;
    color: var(--text);
    font-size: 14px;
    text-decoration: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    border-left: 2px solid transparent;
  }

  /* Efecto llamativo al pasar el ratón */
  .menu-section a:hover {
    background: var(--bg-soft);
    border-left: 2px solid var(--cyan);
    padding-left: 25px; /* Efecto de empuje hacia la derecha */
    color: var(--cyan);
  }

  .menu-section a i {
    transition: transform 0.3s;
  }
  
  .menu-section a:hover i {
    transform: scale(1.2); /* El icono crece un poco */
  }

/* ==== MENU PREMIUM ==== */
.sidebar{background:linear-gradient(180deg,#111827,#0b1220);}
.menu-section{border:1px solid rgba(255,255,255,.05);border-radius:12px;margin:8px;overflow:hidden;transition:.3s}
.menu-section summary{list-style:none;cursor:pointer;padding:14px 18px;font-weight:700;letter-spacing:.08em}
.menu-section summary::-webkit-details-marker{display:none}
.menu-section summary::after{content:"▼";float:right;transition:.3s}
.menu-section[open] summary::after{transform:rotate(180deg)}
.menu-section a{display:flex;gap:12px;padding:11px 18px;margin:4px 8px;border-radius:8px;transition:.25s;text-decoration:none}
.menu-section a:hover{transform:translateX(6px);background:rgba(0,255,255,.08)}

</style>

    <main class="content">
      
      <section class="metric-grid"></section>
      <!-- InstanceBeginEditable name="principal" -->
						<?php  
$tabla3 = "contratos";
$tabla = "clientes";
$tabla2 = "productos";
//-- BUSCAR NODO
$sql55 = "SELECT * from `nodo` order by puesto DESC";				
$result55 = mysqli_query($con, $sql55);
		
		
$sql = "SELECT * from `".$tabla."` order by nombres DESC";
$result = mysqli_query($con, $sql);
$resul = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($resul))
{
	$equipo = $row['nombres'];
	//array_push($array, $equipo);
}

	
$estado = "mensual";
$sql = "SELECT * from `".$tabla2."` WHERE `periodo` LIKE '$estado' order by fechaing DESC";
$result2 = mysqli_query($con, $sql);
		
//--verifica si es nuevo o modificar
if (isset($_GET['codigo'])) {
    			$codigo=$_GET['codigo'];
			$nuevocontrato=$_GET['codigo'];
			$sql = "SELECT * from `".$tabla3."` WHERE `numero` LIKE '$codigo' order by fecha DESC";
			$resulte = mysqli_query($con, $sql); 
			while($crowe = mysqli_fetch_assoc($resulte))
            			{	
						

						$codigo = $crowe['numero'];
						$productomostrar = $crowe['producto'];
						$cliente = $crowe['cliente'];
						$vendedor2 = $crowe['vendedor'];
						$ip = $crowe['ip'];
						
						
						$direccion = $crowe['direccion'];
						$telefono = $crowe['telefono'];
						
						$gps1 = $crowe['gps1'];
						$gps2 = $crowe['gps2'];
						$mail = $crowe['mail'];
						$corte = $crowe['dia_corte'];
						$ubicacion = $crowe['absoluta'];
						$accion="editar";
				
						$sqln = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$cliente' order by fecha DESC";
						$resultn = mysqli_query($con, $sqln); 
						while($crown = mysqli_fetch_assoc($resultn))
            			{
							$nombres = $crown['nombres'];
						}
						}
		}
		else
		{
			//--BUSCAR CONTRATO Y SUMAR 1
			$sqlg = "SELECT * from `".$tabla3."` order by numero ASC";
			$resultg = mysqli_query($con, $sqlg);
			while($crowg = mysqli_fetch_assoc($resultg))
			{
				$nuevocontrato = $crowg['numero']+ 1;
			}
			
    			$accion="nuevo";
			$codigo ="";
			$cliente ="";
			$producto = "";
			$serie = "";
			$apellidos = "";
			$direccion = "";
			$telefono = "";
			
			$mail = "";
			$gps1 = "";
			$gps2 = "";
			$nombres = "";
			$ubicacion = "";
			
		}
		if (isset($_GET['nombres'])) { $nombres=$_GET['nombres'];}
		
			$sqlv = "SELECT * from `personal` order by apellidos ASC";
			$resultv = mysqli_query($con, $sqlv);

?>
<div class="cliente-wrapper">
    <div class="panel-dark">
        <div class="clientes-header-top">
            <div>
                <h2 class="clientes-title">MODIFICAR CONTRATO</h2>
                <p class="clientes-subtitle">Actualiza los datos del contrato y la red del cliente</p>
            </div>
        </div>

        <form action="confirmacion_modificar.php" method="post" name="form1" id="form1">
            <div class="clientes-form-grid">
                
                <!-- CONTRATO N -->
                <div class="clientes-field">
                    <label for="element_1">Contrato N:</label>
                    <input name="element_1" type="text" required class="clientes-input" id="element_1" value="<?php echo $nuevocontrato;?>" maxlength="255"/>
                </div>

                <!-- VENDEDOR -->
                <div class="clientes-field">
                    <label for="vendedor">Vendedor:</label>
                    <select name="vendedor" id="vendedor" class="clientes-input">
                        <?php  
              while($crowv = mysqli_fetch_assoc($resultv))
            			{	
                		
                		if($vendedor2 == $crowv['codigo'])
							{
						
						?>
                        <option selected value=<?php echo $codigo = $crowv['codigo'];?>><?php echo $producto = $crowv['nombres']." ".$crowv['apellidos']; ?></option>
                        <?php
							}
                	else
							{
							?>
                        <option value=<?php echo $codigo = $crowv['codigo'];?>><?php echo $producto = $crowv['nombres']." ".$crowv['apellidos']; ?></option>
                        <?php
							}
						}
                
              ?>
                    </select>
                </div>

                <!-- CLIENTE -->
                <div class="clientes-field">
                    <label for="tag">Cliente:</label>
                    <input name="cliente" required id="tag" value="<?php echo $nombres;?>" class="clientes-input">
                    <script type="text/javascript">
						$(document).ready(function () {
							var items = <?= json_encode($array) ?>

							$("#tag").autocomplete({
								source: items,
								select: function (event, item) {
									var params = {
										equipo: item.item.value
									};
									$.get("getEquipo.php", params, function (response) {
										var json = JSON.parse(response);
										if (json.status == 200){
											$("#nombre").html(json.nombre);
											$("#avatar").attr("src", json.icono);
										}
									});
								}
							});
						});
                    </script>
                </div>

                <!-- PRODUCTOS -->
                <div class="clientes-field">
                    <label for="producto">Productos:</label>
                    <select name="producto" id="producto" class="clientes-input">
                        <?php  
              while($crowp = mysqli_fetch_assoc($result2))
            			{	
                		if($productomostrar == $crowp['codigo'])
							{
						
						?>
                        <option selected value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                        <?php
							}
                	else
							{
							?>
                        <option value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['producto']; ?></option>
                        <?php
							}
						}
                
              ?>
                    </select>
                </div>

                <!-- DIRECCION Y NODO -->
                <div class="clientes-field">
                    <label for="direccion">Dirección / Nodo:</label>
                    <div class="clientes-inline">
                        <input name="direccion" type="text" required class="clientes-input" id="direccion" value="<?php echo $direccion;?>" maxlength="255"/>
                        <select name="nodo" id="nodo" class="clientes-input">
                            <?php  
              while($crowp = mysqli_fetch_assoc($result55))
            			{	
                		if($nodomostrar == $crowp['codigo'])
							{
						
						?>
                            <option selected value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['puesto']; ?></option>
                            <?php
							}
                	else
							{
							?>
                            <option value=<?php echo $codigo = $crowp['codigo'];?>><?php echo $producto = $crowp['puesto']; ?></option>
                            <?php
							}
						}
                
              ?>
                        </select>
                    </div>
                </div>

                <!-- TELEFONO -->
                <div class="clientes-field">
                    <label for="telefono">Teléfono:</label>
                    <input name="telefono" type="text" id="telefono" required value="<?php echo $telefono;?>" class="clientes-input">
                </div>

                <!-- MAIL -->
                <div class="clientes-field">
                    <label for="mail">Mail:</label>
                    <input name="mail" type="text" class="clientes-input" id="mail" value="<?php echo $mail;?>" maxlength="255"/>
                </div>

                <!-- DIA DE CORTE -->
                <div class="clientes-field">
                    <label for="corte">Día de Corte:</label>
                    <input name="corte" type="text" required="required" class="clientes-input" id="corte" value="<?php echo $corte;?>" maxlength="255"/>
                </div>

                <!-- CAJA -->
                <div class="clientes-field">
                    <label for="caja">Caja:</label>
                    <select name="caja" id="caja" class="clientes-input">
                        <?php
													$sqlcaja = "SELECT * from `dispositivos_empresa` order by nombre DESC";
                                    										$resultcaja = mysqli_query($con, $sqlcaja);
                                    									  while ($crowcaja = mysqli_fetch_assoc($resultcaja)) {
                                    									    if ($caja == $crowcaja['id']) {

                                    									  ?>
                        <option selected value=<?php echo $crowcaja['id']; ?>><?php echo $crowcaja['nombre']; ?></option>
                        <?php
                                    									    } else {
                                    									    ?>
                        <option value=<?php echo $crowcaja['id']; ?>><?php echo $crowcaja['nombre']; ?></option>
                        <?php
                                    									    }
                                    									  }

                                    									  ?>
                    </select>
                </div>

                <!-- PUERTO -->
                <div class="clientes-field">
                    <label for="puerto">Puerto:</label>
                    <select name="puerto" id="puerto" class="clientes-input">
                        <?php for($p=0; $p<=32; $p++){ echo "<option value=\"$p\">$p</option>"; } ?>
                    </select>
                </div>

                <!-- SERIE -->
                <?php  
                    $serie = "Sin_Serie";
                    $sqlse = "SELECT * from `series` WHERE `contrato` LIKE '$nuevocontrato'";
                    $resultse = mysqli_query($con, $sqlse); 
                    while($crowse = mysqli_fetch_assoc($resultse)) {	
                        $serie = $crowse['serie'];
                    }
                    if ($serie == "Sin_Serie") {
                ?>
                <div class="clientes-field clientes-full">
                    <label for="serie">Serie del Equipo:</label>
                    <div class="clientes-inline">
                        <select name="producto2" id="producto2" class="clientes-input">
                            <?php
                                $sqlp = "SELECT * from `productos` WHERE `serie` LIKE 'si' order by producto DESC";
                                $resultp = mysqli_query($con, $sqlp);
                                while ($crowp = mysqli_fetch_assoc($resultp)) {
                            ?>
                            <option value=<?php echo $crowp['codigo']; ?>><?php echo $crowp['producto']; ?></option>
                            <?php } ?>
                        </select>
                        <input name="serie" type="text" class="clientes-input" id="serie" value="<?php echo $serie; ?>" maxlength="255"/>
                    </div>
                </div>
                <?php } ?>

                <!-- UBICACION -->
                <div class="clientes-field">
                    <label for="ubicacion">Ubicación:</label>
                    <input name="ubicacion" type="text" class="clientes-input" id="ubicacion" value="<?php echo $ubicacion;?>" maxlength="255"/>
                </div>

                <!-- IP -->
                <div class="clientes-field">
                    <label for="ip">IP:</label>
                    <input name="ip" type="text" class="clientes-input" id="ip" value="<?php echo $ip;?>" maxlength="255"/>
                </div>

                <!-- CAMPOS OCULTOS -->
                <input id="accion" name="accion" type="hidden" value="<?php echo $accion;?>"/>
                <input name="textfield" type="hidden" id="textfield" value="<?php echo $cliente;?>">
                <input name="accion" type="hidden" id="accion" value="editar">

                <!-- BOTON GUARDAR -->
                <div class="clientes-field clientes-full" style="align-items: flex-end; margin-top: 10px;">
                    <button name="submit" type="submit" id="submit" class="boton-azul">Guardar Cambios</button>
                </div>

            </div>
        </form>
    </div>
</div>
									<!-- InstanceEndEditable --></main>
  </div>

  <!--<script src="https://unpkg.com/lucide@latest"></script>-->
  <script src="../js/lucide%40latest.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="../js/chart.js"></script>
  <script src="../js/app.js"></script>

<script>
document.querySelectorAll('.menu-section a').forEach(a=>{
 if(a.href===location.href){
   a.style.background='rgba(0,255,255,.12)';
   a.style.color='#00e5ff';
   let d=a.closest('details'); if(d)d.open=true;
 }
});
document.querySelectorAll('.menu-section').forEach(function(menu){
    menu.open = false;
});
</script>

</body>
<!-- InstanceEnd --></html>
