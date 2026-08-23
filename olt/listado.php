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
      <a href="../streaming/index.php"><i data-lucide="play-circle"></i> Jellyfin</a>
      <a href="../peliculas/index.php"><i data-lucide="play-circle"></i> Streamin local</a>
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
      <!-- InstanceBeginEditable name="principal" --><div>  
		  
<?php
$filacolor="0";
$online=0;
$offline=0;


//-----------BUSCO TODO LO QUE ESTA EN EL MIKROTIK Y GUARDO EN BASE DE DATOS
// SELECCIONO OLT
$port = 22;

$sqlolt = "SELECT * from `olt_conexion`";
$resultolt = mysqli_query($con, $sqlolt);

while($crowolt = mysqli_fetch_assoc($resultolt))
{
	$host_olt=$crowolt['ip'];
	$u_olt=$crowolt['usuario'];
	$p_olt=$crowolt['contrasena'];
	$nodo=$crowolt['nodo'];
}	

?>
				
				
<p>&nbsp;</p>

<?php 
						
//-----------FIN DE BUSQUEDA DE MIKROTIK Y ASIGNACION
//--BUSCO TODAS LAS TARJETAS DE LA OLT
$sqlolt = "SELECT * from `olt` order by olt ASC";
$resultolt = mysqli_query($con, $sqlolt);

while($crowolt = mysqli_fetch_assoc($resultolt))
{
	$oltbuscar = $crowolt['olt'];

	$separador = "/";
	$separadaolt = explode($separador, $oltbuscar);

	//SACAR EQUIPOS DE LA OLT PARA SABER QUE HACER
	$connection = ssh2_connect($host_olt, $port);

	if (!ssh2_auth_password($connection, $u_olt, $p_olt)) {

		die("La autenticación SSH falló.");

	}else{

		$tarjeta = $separadaolt[0]."/".$separadaolt[1]."/".$separadaolt[2];

		$command = 'enable'."\n".
				   'config'."\n".
				   'scroll 512'."\n".
				   'display ont info '.$separadaolt[0]." ".$separadaolt[1]." ".$separadaolt[2]. ' all'."\n";

		$stream = ssh2_exec($connection, $command);

		stream_set_blocking($stream, true);

		$output = stream_get_contents($stream);

		$separada = explode("\r\n", $output);

		$count = count($separada);
		$count = $count -1;

		// RECORRO EL ARRAY DEL RESULTADO
		for($i = 0; $i < $count; $i++)
		{
			if (isset($separada[$i])) 
			{
				//VERIFICO SI EL ARRAY TIENE LA PALABRA ACTIVE DE LA ONT
				if (strpos($separada[$i], "active") == false)
				{
					//SACO NOMBRE DEL CLIENTE
					$cadenaConvert = strtr($separada[$i], " ", "*");
					$cadenaConvert2 = strtr($separada[$i], " ", "*");

					$cadenaConvert = substr($cadenaConvert, 0, 19);

					$nombreoriginal = substr($cadenaConvert2, 19);

					$tarjetaoriginal = str_replace("*","", $cadenaConvert);

					//BUSCO EN BASE DE DATOS PARA ACTUALIZAR NOMBRE
					$sql = "UPDATE equiposolt 
							SET nombre='$nombreoriginal' 
							WHERE tarjetaoriginal='$tarjetaoriginal'";

					mysqli_query($con, $sql);

				}else{

					//SACO LA INFORMACION 
					$cadenaConvert = strtr($separada[$i], " ", "*");

					$cadenaConvert = substr($cadenaConvert, 0, 15);

					$tarjetaoriginal = str_replace("*","", $cadenaConvert);

					//SACO EL NUMERO DE SERIE
					$cadenaConvert = strtr($separada[$i], " ", "*");

					$original = $cadenaConvert;

					$cadenaConvert = substr($cadenaConvert, 15);

					$serieseparada = explode("active", $cadenaConvert);

					$cadenaConvert = substr($serieseparada[0], 0, -2);

					//BUSCO EL ESTADO
					$estadoresultado = "no encontrado";

					if (strlen(stristr($original,'online'))>0) 
					{
						$estadoresultado= "online";
					}

					if (strlen(stristr($original,'offline'))>0) 
					{
						$estadoresultado= "offline";
					}

					//BUSCO EN SERIES
					$cliente="sin asignar";
					$contratoasignado = "sin asignar";

					$sql82 = "SELECT * from `series` WHERE `serie` LIKE '$cadenaConvert'";

					$busq = mysqli_query($con, $sql82);

					while($crowla = mysqli_fetch_assoc($busq))
					{
						$cliente = $crowla['asignado'];
						$contratoasignado = $crowla['contrato'];
					}

					//BUSCO EL NOMBRE
					$nombres = "sin asignar";

					$sql82 = "SELECT * from `clientes` WHERE `codigo` LIKE '$cliente'";

					$busq = mysqli_query($con, $sql82);

					while($crowla = mysqli_fetch_assoc($busq))
					{
						$nombres = $crowla['nombres'];
					}

					//GRABAMOS EN LA BASE DATOS
					$sql = "INSERT INTO `equiposolt`
							(`serie`,`cliente`,`contrato`,`nombre`,`estado`,`tarjeta`,`tarjetaoriginal`)
							VALUES
							('$cadenaConvert','$cliente','$contratoasignado','$nombres','$estadoresultado','$tarjeta','$tarjetaoriginal')";

					mysqli_query($con, $sql);
				}
			}
		}
	}
}

$tabla = "equiposolt";

$sql = "SELECT * from `".$tabla."`";

$result = mysqli_query($con, $sql); 

$resultados = $result->num_rows;
?>

<div class="cliente-table-panel">

    <!-- =========================================
    TITULO
    ========================================= -->

    <div class="cliente-info-header">

        <div>

            <div class="cliente-info-title">

                NODO DE <?php echo $nodo;?>

            </div>

            <div class="cliente-id">

                ESTADO DE <?php echo $resultados;?> DISPOSITIVOS

            </div>

        </div>

        <div class="estado estado-activo">

            ONLINE:
            <?php echo $online; ?>

            &nbsp;&nbsp;|&nbsp;&nbsp;

            OFFLINE:
            <?php echo $offline; ?>

        </div>

    </div>

    <br>

    <!-- =========================================
    TABLA
    ========================================= -->

    <div style="overflow-x:auto;">

        <table class="table-dark" id="tablaOrdenable">

            <thead>

                <tr align="center">

                    <th class="ordenable" style="cursor:pointer">
                        CONTRATO
                    </th>

                    <th class="ordenable" style="cursor:pointer">
                        CLIENTE
                    </th>

                    <th class="ordenable" style="cursor:pointer">
                        SERIE
                    </th>

                    <th class="ordenable" style="cursor:pointer">
                        IP
                    </th>

                    <th class="ordenable" style="cursor:pointer">
                        ESTADO
                    </th>

                    <th>
                        DESACTIVAR
                    </th>

                </tr>

            </thead>

            <tbody>

            <?php

            while($crow = mysqli_fetch_assoc($result))
            {	

                $seriebusqueda = "Sin Asignar";

                $clientebuscar ="Sin Asignar";

                $serieurl = $crow['serie'];

                $sql824 = "SELECT * from equiposolt";

                $busq4 = mysqli_query($con, $sql824);

                while($crowla4 = mysqli_fetch_assoc($busq4))
                {
                    $seriebusqueda = $crowla4['serie'];
                }

            ?>

                <tr class="alternar">

                    <!-- =====================================
                    CONTRATO
                    ===================================== -->

                    <td align="center">

                        <?php 

                        $serie = $crow['serie'];

                        $nombre_contrato = "sin nombre";

                        $ip_contrato = "sin ip";

                        $contrato = $crow['contrato'];

                        $sql826 = "SELECT * from contratos 
                        WHERE router LIKE '$serie'";

                        $busq6 = mysqli_query($con, $sql826);

                        while($crowla6 = mysqli_fetch_assoc($busq6))
                        {
                            $nombre_contrato = $crowla6['nombres'];

                            $ip_contrato = $crowla6['ip'];

                            $cliente = $crowla6['cliente'];

                            $numerocontrato = $crowla6['numero'];
                        }

                        if ($nombre_contrato == "sin nombre")
                        {

                        ?>

                            <form 
                                action="asignar_ont.php"
                                method="GET"
                                style="margin:0;"
                            >

                                <input 
                                    type="hidden"
                                    name="numero"
                                    value="<?php echo $serieurl; ?>"
                                >

                                <button 
                                    class="btn-action btn-contrato"
                                    type="submit"
                                >

                                    ASIGNAR

                                </button>

                            </form>

                        <?php

                        }
                        else
                        {
                            echo $contrato =
                            $numerocontrato.
                            "(".$nombre_contrato.")";
                        }

                        ?>

                    </td>

                    <!-- =====================================
                    CLIENTE
                    ===================================== -->

                    <td align="center">

                        <?php echo $nombre = $crow['nombre'];?>

                    </td>

                    <!-- =====================================
                    SERIE
                    ===================================== -->

                    <td align="center">

                        <?php 

                        if ($nombre_contrato == "sin nombre")
                        {
                            echo $crow['serie'];
                        }
                        else
                        {

                        ?>

                            <form 
                                action="../clientes/informacion.php"
                                method="GET"
                                style="margin:0;"
                            >

                                <input 
                                    type="hidden"
                                    name="codigo"
                                    value="<?php echo $cliente; ?>"
                                >

                                <button 
                                    class="btn-action btn-general"
                                    type="submit"
                                >

                                    <?php echo $crow['serie']?>

                                </button>

                            </form>

                        <?php 

                        }

                        ?>

                    </td>

                    <!-- =====================================
                    IP
                    ===================================== -->

                    <td align="center">

                        <?php echo $ip_contrato; ?>

                    </td>

                    <!-- =====================================
                    ESTADO
                    ===================================== -->

                    <td align="center">

                        <?php 

                        $estado = $crow['estado'];

                        if ($estado == "online")
                        {

                            $online = $online +1;

                        ?>

                            <div class="estado estado-activo">

                                EN LINEA

                            </div>

                        <?php 

                        }
                        else
                        {

                            $offline = $offline +1;

                        ?>

                            <div class="estado estado-cortado">

                                FUERA DE LINEA

                            </div>

                        <?php

                        }

                        ?>

                    </td>

                    <!-- =====================================
                    DESACTIVAR
                    ===================================== -->

                    <td align="center">

                        <form 
                            action="../clientes/confirmacion_eliminar.php"
                            method="GET"
                            style="margin:0;"
                        >

                            <input 
                                type="hidden"
                                name="numero"
                                value="<?php echo $serieurl; ?>"
                            >

                            <input 
                                type="hidden"
                                name="nodo"
                                value="<?php echo $nodo; ?>"
                            >

                            <button 
                                class="btn-action btn-proforma"
                                type="submit"
                            >

                                DESACTIVAR

                            </button>

                        </form>

                    </td>

                </tr>

            <?php

            }

            ?>

            </tbody>

        </table>

    </div>

</div>

</div>

<p>&nbsp;</p>

<?php

mysqli_query($con, "TRUNCATE TABLE equiposolt");

mysqli_query($con, "TRUNCATE TABLE mikrotikclientes");

?>

<!-- ========================================= -->
<!-- ORDENAR TABLA SIN RECARGAR LA PAGINA -->
<!-- ========================================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const tabla = document.getElementById("tablaOrdenable");

    const headers = tabla.querySelectorAll("th.ordenable");

    headers.forEach(function(header, index) {

        let asc = true;

        header.addEventListener("click", function () {

            const tbody = tabla.querySelector("tbody");

            const filas = Array.from(tbody.querySelectorAll("tr"));

            filas.sort(function(a, b) {

                const aText = a.children[index].innerText.trim().toLowerCase();
                const bText = b.children[index].innerText.trim().toLowerCase();

                return asc
                    ? aText.localeCompare(bText, undefined, {numeric:true})
                    : bText.localeCompare(aText, undefined, {numeric:true});

            });

            filas.forEach(function(fila) {
                tbody.appendChild(fila);
            });

            asc = !asc;

        });

    });

});

</script><!-- InstanceEndEditable --></main>
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
