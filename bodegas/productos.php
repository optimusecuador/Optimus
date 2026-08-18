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
		$color="";
		$filacolor="0";
	  $tabla = "bodegas";
        if (isset($_POST['codigo'])) {
   			$codigo = $_POST['codigo'];
			$serie = "Ingrese Valor";
			$producto = "";
			$sql = "SELECT * from `".$tabla."` WHERE `codigo` LIKE '$codigo' order by fechaing DESC";
		}
		else
		{
   			
			if (isset($_POST['producto'])) {
   			$producto = $_POST['producto'];
			$serie = "Ingrese Valor";
			$codigo = "Ingrese Valor";
			$sql = "SELECT * from `".$tabla."` WHERE `producto` LIKE '%$producto%' order by fechaing DESC";
			}
			else
			{
   				
				if (isset($_POST['serie'])) {
   				$serie = $_POST['serie'];
				$producto = "";
				$codigo = "Ingrese Valor";
				$sql = "SELECT * from `".$tabla."` WHERE `serie` LIKE '%$serie%' order by fechaing DESC";
				}
				else
				{
   					
					$sql = "SELECT * from `".$tabla."` order by numero DESC";
					$serie = "Ingrese Valor";
					$producto = "";
					$codigo = "Ingrese Valor";
					
				}
			}
		}
		  
		$result = mysqli_query($con, $sql); 
		?>
		<div class="isp-dashboard">

    <!-- BUSCADOR -->
    <div class="isp-panel">

        <div class="isp-title">
            Gestión de Bodegas
        </div>

        

        <div class="table-scroll">

            <table width="100%" border="0" cellspacing="10">

                <tr>

                    <td>

                        <a href="nuevo.php">

                            <button
                                class="btn-action btn-edit"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Nueva Bodega

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="../bodegas/transferencias.php">

                            <button
                                class="btn-action btn-contrato"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Transferencia(Busqueda)

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="ingreso.php?accion=ingreso">

                            <button
                                class="btn-action btn-proforma"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Pedidos (En Construccion)

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="../bodegas/ingreso.php?accion=transferencia">

                            <button
                                class="btn-action btn-proforma"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                Transferencias

                            </button>

                        </a>

                    </td>

                    <td>

                        <a href="../bodegas/productos.php">

                            <button
                                class="btn-action btn-contrato"
                                style="width:100%;">

                                <img src="../images/sistema/44.png" width="64" height="38" alt=""/><br>
                                (En Construccion)

                            </button>

                        </a>

                    </td>

                </tr>

            </table>

        </div>

    </div>

    <br>

    <!-- TARJETAS -->

    

    <!-- TABLA -->

    
</div>
      <table width="100%"  align="center">
        <tbody>
         
          <tr>
            <td align="center"><div class="grilla_listado">
              <div class="panel-dark">
                <table width="95%" align="center" class="table-dark">
                  <br>
                  
                  <br>
                  <thead>
                    <tr>
                      <th align="center" valign="top">NOMBRE</th>
                      <th align="center" valign="top"><center>
                        RESPONSABLE
                        
                      </center></th>
                      <th align="center" valign="top">SERIALES</th>
                      <th align="center" valign="top">KARDEX</th>
                      <th align="center" valign="top"><center>
                        EDITAR
                        </center></th>
                      </tr>
                    </thead>
                  <tbody>
                    <?php

while($crow = mysqli_fetch_assoc($result))
{	
						if($filacolor =="0")
						{
							$color="#c3acfa";
							$filacolor="1";
						}
							
						else
						{
							$color="";
							$filacolor="0";
						}
?>
                    <tr>
                      <td><?php echo $crow['nombre'];
					  if ($crow['principal'] == "si")
					  {
						  echo ' <span class="estado estado-activo">(Principal)</span>';
					  }
					  ?></td>
                      <td><center>
                        <?php 
						 $responsable = $crow['responsable']; 
						 $sql9 = "SELECT * from `personal` WHERE `codigo` LIKE '$responsable' order by fecha DESC";
						 $result9 = mysqli_query($con, $sql9);
						 while($crow9 = mysqli_fetch_assoc($result9))
{
							 echo $nom = $crow9['nombres']." ".$crow9['apellidos'];
						 }
	
	?>
                        </center></td>
                      <td align="center"><a href="../productos/imprimir_series.php?codigo=<?php echo $crow['numero'];?>" > 
						  <center>
						  <input name="Series" type="button" class="boton-azul" id="Series" title="Series" value="Series">
							  </center>
						  </a></td>
                      <td align="center"><a href="../bodegas/kardex2.php?codigo=<?php echo $crow['numero'];?>" >
                        <center>
							<input name="Kardex" type="button" class="boton-azul" id="Kardex" title="Kardex" value="Kardex">
                        
                          </center>
                        </a></td>
                      <td align="center"><a href="../bodegas/nuevo.php?codigo=<?php echo $crow['numero'];?>" >
                        <center>
                          <input name="Editar" type="button" class="boton-azul" id="Editar" title="Editar" value="Editar">
                          </center>
                        </a></td>
                      </tr>
                    <?php
 	}		
?>
                    </tbody>
                  </table>
                </div>
              <p>&nbsp;</p>
            </div></td>
          </tr>
        </tbody>
    </table>
      <p>&nbsp;</p>
				<?php
					$verificacion="0";
				 	$sqlcontrol = "SELECT * from bodegas";
					$resultcontrol = mysqli_query($con, $sqlcontrol); 
					while($crowcontrol = mysqli_fetch_assoc($resultcontrol))
   		
					{
						$verificacion = 1;
						$controlprincipal = "si"; 
						$sqlprincipal = "SELECT * from `bodegas` WHERE `principal` LIKE '$controlprincipal'";
						$resultprincipal = mysqli_query($con, $sqlprincipal);
						$controlprincipal = "no"; 
						while($crowprincipal = mysqli_fetch_assoc($resultprincipal))
   			{
							 $controlprincipal  = $crowprincipal['principal'];
						}
						if ($controlprincipal == "no")
						{
				  		?>
				  		<script>alert('No tiene Bodegas Principal -----> Bodegas/Bodegas/Editar');</script>
				  		<?php 	  
				  		}
				  		?>
						<?php
						}
				  		
				if ($verificacion == "0")
				{
				  ?>
				  <script>alert('No tiene Bodegas Configuradas -----> Bodegas/Bodegas');</script>
				  <?php 	  
				  }
				  ?>
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
