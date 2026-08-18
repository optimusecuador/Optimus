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
require('../../conectar.php');
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
    <link rel="icon" type="image/x-icon" href="../../images/ico.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../images/ico.png">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/styles.css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head> 
<body>
  <div class="app-shell">
    <aside class="sidebar">
  <a class="brand" href="../../resumen/index.php">
    <img src="../../img/logo.png" width="186" height="69" alt="Nexus ISP"/>
  </a>

  <nav class="main-nav">
    <details class="menu-section">
      <summary class="menu-label">GESTIÓN</summary>
      <a href="../../resumen/index.php"><i data-lucide="home"></i> Resumen</a>
      <a href="../../clientes/index.php"><i data-lucide="users"></i> Clientes</a>
      <a href="../../cuentas/index.php"><i data-lucide="landmark"></i> Cuentas Bancarias</a>
      <a href="../../reportes/index.php"><i data-lucide="bar-chart-3"></i> Reportes</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">OPERACIONES</summary>
      <a href="../../productos/productos.php"><i data-lucide="boxes"></i> Inventario</a>
      <a href="../../personal/productos.php"><i data-lucide="user-round-cog"></i> Personal</a>
      <a href="../../serviciotecnico/index.php"><i data-lucide="wrench"></i> Servicio Técnico</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">INFRAESTRUCTURA</summary>
      <a href="../../mikrotik/listado.php"><i data-lucide="shield-check"></i> MikroTik</a>
      <a href="https://192.168.8.100/action/login.html" target="new"><i data-lucide="shield-check"></i> OLT</a>
      <a href="http://10.7.0.254:15178/ViewPower/monitor?319" target="new"><i data-lucide="shield-check"></i> Ups</a>
      <a href="../../truenas/truenas.php"><i data-lucide="hard-drive"></i> NAS</a>
      <a href="../../traccar/traccar.php"><i data-lucide="map-pin"></i> Rastreo</a>
      <a href="../../streaming/index.php"><i data-lucide="play-circle"></i> Streaming</a>
      <a href="../../zkteco/index.php"><i data-lucide="fingerprint"></i> ZKTeco</a>
	  <a href="../../red/index.php"><i data-lucide="shield-check"></i> Mapeo Red</a>
	  <a href="../../redvirtual/index.php"><i data-lucide="shield-check"></i> Red Virtual</a>
    </details>

    <details class="menu-section">
      <summary class="menu-label">SISTEMA</summary>
      <a href="../../estado/index.php"><i data-lucide="badge-check"></i> Estado Contrato</a>
      <a href="#"><i data-lucide="calculator"></i> Contabilidad</a>
      <a href="../index.php"><i data-lucide="settings"></i> Configuración</a>
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

// Lógica de Guardar
if (isset($_POST['guardar'])) {
    $c = $_POST['codigo']; $p = $_POST['puesto']; 
    $prov = $_POST['provincia']; $can = $_POST['canton']; $parr = $_POST['parroquia'];
    $conn->query("INSERT INTO nodo (codigo, puesto, provincia, canton, parroquia) VALUES ('$c', '$p', '$prov', '$can', '$parr')");
    echo "<script>alert('Nodo guardado correctamente'); window.location.href='nodo_nuevo.php';</script>";
}

// Lógica de Eliminar
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $conn->query("DELETE FROM nodo WHERE id=$id");
    echo "<script>alert('Nodo eliminado correctamente'); window.location.href='nodo_nuevo.php';</script>";
}
?>

<div class="content">
    <div class="topbar">
        <h1>Gestión de Nodos</h1>
    </div>

    <button class="primary" onclick="document.getElementById('modal').style.display='block'">+ Nuevo Nodo</button>
	<br>
	<br>
    <div id="modal" class="modal" style="display:none; position:fixed; top:10%; left:30%; width:40%; z-index:1000; background:#071d31; padding:20px; border-radius:14px; border:1px solid var(--line);">
        <h2 style="margin-bottom:20px;">Registrar Nuevo Nodo</h2>
        <form method="POST">
            <input type="text" name="codigo" placeholder="Código" required class="clientes-input" style="margin-bottom:15px;"><br>
            <input type="text" name="puesto" placeholder="Puesto" required class="clientes-input" style="margin-bottom:15px;"><br>
            
            <select id="provincia" name="provincia" onchange="actualizarSelecciones()" required class="clientes-input" style="margin-bottom:15px;">
                <option value="">Seleccione Provincia</option>
            </select><br>
            
            <select id="canton" name="canton" onchange="actualizarParroquias()" required class="clientes-input" style="margin-bottom:15px;">
                <option value="">Seleccione Cantón</option>
            </select><br>
            
            <select id="parroquia" name="parroquia" required class="clientes-input" style="margin-bottom:15px;">
                <option value="">Seleccione Parroquia</option>
            </select><br>
            
            <button type="submit" name="guardar" class="primary">Guardar</button>
            <button type="button" class="icon-text" onclick="document.getElementById('modal').style.display='none'">Cancelar</button>
        </form>
    </div>

    <div class="cliente-table-panel">
        <table class="table-dark">
            <thead>
                <tr><th>ID</th><th>Código</th><th>Puesto</th><th>Provincia</th><th>Cantón</th><th>Parroquia</th><th>Acciones</th></tr>
            </thead>
            <tbody>
            <?php
            $res = $conn->query("SELECT * FROM nodo");
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['codigo']}</td>
                        <td>{$row['puesto']}</td>
                        <td>{$row['provincia']}</td>
                        <td>{$row['canton']}</td>
                        <td>{$row['parroquia']}</td>
                        <td><a href='?eliminar={$row['id']}' style='color:var(--red); text-decoration:none;' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a></td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const geo = {

    "AZUAY": {

        "CUENCA": [
            "BELLAVISTA",
            "CAÑARIBAMBA",
            "EL BATÁN",
            "EL SAGRARIO",
            "EL VECINO",
            "GIL RAMÍREZ DÁVALOS",
            "HUAYNACÁPAC",
            "MACHÁNGARA",
            "MONAY",
            "SAN BLAS",
            "SAN SEBASTIÁN",
            "SUCRE",
            "TOTORACOCHA",
            "YANUNCAY",
            "HERMANO MIGUEL",
            "CUENCA",
            "BAÑOS",
            "CHAUCHA",
            "CHECA",
            "CHIQUINTAD",
            "CUMBE",
            "LLACAO",
            "MOLLETURO",
            "NULTI",
            "OCTAVIO CORDERO PALACIOS",
            "PACCHA",
            "QUINGEO",
            "RICAURTE",
            "SANTA ANA",
            "SAYAUSÍ",
            "SIDCAY",
            "SININCAY",
            "TARQUI",
            "TURI",
            "VALLE",
            "VICTORIA DEL PORTETE"
        ],

        "CAMILO PONCE ENRÍQUEZ": [
            "CAMILO PONCE ENRÍQUEZ",
            "EL CARMEN DE PIJILÍ"
        ],

        "CHORDELEG": [
            "CHORDELEG",
            "DELEGSOL",
            "LA UNIÓN",
            "LUIS GALARZA ORELLANA",
            "PRINCIPAL",
            "SAN MARTÍN DE PUZHIO"
        ],

        "EL PAN": [
            "EL PAN",
            "AMALUZA",
            "PALMAS"
        ],

        "GIRÓN": [
            "GIRÓN",
            "ASUNCIÓN",
            "SAN GERARDO"
        ],

        "GUACHAPALA": [
            "GUACHAPALA"
        ],

        "GUALACEO": [
            "GUALACEO",
            "DANIEL CÓRDOVA",
            "JADÁN",
            "LUIS CORDERO VEGA",
            "MARIANO MORENO",
            "REMIGIO CRESPO",
            "SAN JUAN",
            "ZHIDMAD"
        ],

        "NABÓN": [
            "NABÓN",
            "COCHAPATA",
            "EL PROGRESO",
            "LAS NIEVES"
        ],

        "OÑA": [
            "SAN FELIPE DE OÑA",
            "SUSUDEL"
        ],

        "PAUTE": [
            "PAUTE",
            "AMALUZA",
            "BULÁN",
            "CHICÁN",
            "EL CABO",
            "GUARAINAG",
            "SAN CRISTÓBAL",
            "TOMEBAMBA"
        ],

        "PUCARÁ": [
            "PUCARÁ"
        ],

        "SAN FERNANDO": [
            "SAN FERNANDO",
            "CHUMBLÍN"
        ],

        "SANTA ISABEL": [
            "SANTA ISABEL",
            "ABDÓN CALDERÓN",
            "EL CARMEN DE PIJILÍ",
            "SHAGLLI",
            "ZHAGLLI"
        ],

        "SEVILLA DE ORO": [
            "SEVILLA DE ORO",
            "AMALUZA",
            "PALMAS"
        ],

        "SÍGSIG": [
            "SÍGSIG",
            "CUCHIL",
            "GIMA",
            "GUEL",
            "LUDO",
            "SAN BARTOLOMÉ",
            "SAN JOSÉ DE RARANGA"
        ]
    },

    "CAÑAR": {

        "AZOGUES": [
            "AZOGUES",
            "AURELIO BAYAS",
            "BORRERO",
            "COJITAMBO",
            "GUAPÁN",
            "JAVIER LOYOLA",
            "LUIS CORDERO",
            "PINDILIG",
            "RIVERA",
            "SAN MIGUEL",
            "TADAY"
        ],

        "BIBLIÁN": [
            "BIBLIÁN",
            "JERUSALÉN",
            "NAZÓN",
            "SAN FRANCISCO DE SAGEO",
            "TURUPAMBA"
        ],

        "CAÑAR": [
            "CAÑAR",
            "CHONTAMARCA",
            "CHOROCOPTE",
            "DUCUR",
            "GENERAL MORALES",
            "GUALLETURO",
            "HONORATO VÁSQUEZ",
            "INGAPIRCA",
            "JUNCAL",
            "SAN ANTONIO",
            "ZHUD",
            "VENTURA"
        ],

        "DÉLEG": [
            "DÉLEG",
            "SOLANO"
        ],

        "EL TAMBO": [
            "EL TAMBO"
        ],

        "LA TRONCAL": [
            "LA TRONCAL",
            "MANUEL DE J. CALLE",
            "PANCHO NEGRO"
        ],

        "SUSCAL": [
            "SUSCAL"
        ]
    }

};

    const selProv = document.getElementById('provincia');
    const selCanton = document.getElementById('canton');
    const selParroquia = document.getElementById('parroquia');

    Object.keys(geo).forEach(p => selProv.innerHTML += `<option value="${p}">${p}</option>`);

    function actualizarSelecciones() {
        selCanton.innerHTML = '<option value="">Seleccione Cantón</option>';
        selParroquia.innerHTML = '<option value="">Seleccione Parroquia</option>';
        if(geo[selProv.value]) {
            Object.keys(geo[selProv.value]).forEach(c => selCanton.innerHTML += `<option value="${c}">${c}</option>`);
        }
    }

    function actualizarParroquias() {
        selParroquia.innerHTML = '<option value="">Seleccione Parroquia</option>';
        const parroquias = (geo[selProv.value] && geo[selProv.value][selCanton.value]) ? geo[selProv.value][selCanton.value] : [];
        parroquias.forEach(p => selParroquia.innerHTML += `<option value="${p}">${p}</option>`);
    }
</script>


		
		
		
		<!-- InstanceEndEditable --></main>
  </div>

  <!--<script src="https://unpkg.com/lucide@latest"></script>-->
  <script src="../../js/lucide%40latest.js"></script>
  <!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
  <script src="../../js/chart.js"></script>
  <script src="../../js/app.js"></script>

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
