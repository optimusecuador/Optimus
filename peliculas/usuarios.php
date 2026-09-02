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
      <a href="../jellyfin/index.php"><i data-lucide="play-circle"></i> Jellyfin</a>
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
/* ===================================================
   JELLYFIN ADMIN ISP ULTRA
===================================================*/

/* CONFIG DESDE BD */
$sqljf="SELECT * FROM jellyfin LIMIT 1";
$resjf=mysqli_query($con,$sqljf);
$rowjf=mysqli_fetch_assoc($resjf);

$server=$rowjf['ip'];
$apikey=$rowjf['api'];


/* API */
function jf($url,$method="GET",$data=null){
    global $server,$apikey;

    $ch=curl_init($server.$url);

    curl_setopt_array($ch,[
        CURLOPT_RETURNTRANSFER=>true,
        CURLOPT_CUSTOMREQUEST=>$method,
        CURLOPT_HTTPHEADER=>[
            "X-Emby-Token: $apikey",
            "Content-Type: application/json"
        ]
    ]);

    if($data)
        curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($data));

    $r=curl_exec($ch);
    curl_close($ch);

    return json_decode($r,true);
}


/* SERVIDOR ONLINE */
if(!jf("/System/Info")){
    echo "<script>
    confirm('Servidor Jellyfin fuera de línea');
    window.location='../menu_principal/panel.php';
    </script>";
    exit;
}


/* EXPULSAR SESION */
if(isset($_GET['kick'])){
    jf("/Sessions/".$_GET['kick'],"DELETE");
}

/* ELIMINAR USUARIO */
if(isset($_POST['eliminar_user'])){
    jf("/Users/".$_POST['userid'],"DELETE");
    echo "<script>alert('Usuario eliminado'); window.location='?';</script>";
}

/* DATOS */
$users=jf("/Users") ?? [];
$libs=jf("/Library/VirtualFolders") ?? [];
$sessions=jf("/Sessions") ?? [];

?>

<script>
function toggle(id){
    let e=document.getElementById(id);
    e.style.display=(e.style.display=="block")?"none":"block";
}

function buscar(){
    let f=document.getElementById("buscar").value.toLowerCase();
    document.querySelectorAll(".user").forEach(u=>{
        u.style.display=u.innerText.toLowerCase().includes(f)?"block":"none";
    });
}
</script>


<div class="panel-dark">

    <div class="header-container">
    <h2 class="clientes-title">Usuarios</h2>
    <a href="reproducir.php" class="boton-azul">🎬 Abrir Reproductor</a>
    
    <button type="button" class="boton-azul" onclick="document.getElementById('modalNuevoUser').style.display='block'" style="background:#28a745; margin-left:10px; border:none; cursor:pointer;">
        ➕ Usuario Nuevo
    </button>
</div>

<div id="modalNuevoUser" style="display:none; position:fixed; z-index:999; left:0; top:0; width:100%; height:100%; background:rgba(0,0,0,0.7);">
    <div style="background:#1a1a1a; margin:10% auto; padding:20px; width:300px; border-radius:10px; color:white; border:1px solid #444;">
        <h3 style="margin-top:0;">Crear Nuevo Usuario</h3>
        <form method="post">
            <input type="text" name="new_name" placeholder="Nombre de usuario" required style="width:100%; padding:8px; margin-bottom:10px; background:#333; border:1px solid #555; color:white;">
            <input type="password" name="new_pass" placeholder="Contraseña" required style="width:100%; padding:8px; margin-bottom:10px; background:#333; border:1px solid #555; color:white;">
            <button type="submit" name="crear_user" class="boton-azul" style="width:100%; border:none; cursor:pointer; padding:10px;">Guardar Usuario</button>
            <button type="button" onclick="document.getElementById('modalNuevoUser').style.display='none'" style="width:100%; margin-top:10px; padding:10px; cursor:pointer;">Cancelar</button>
        </form>
    </div>
</div>

<?php
if(isset($_POST['crear_user'])){
    $data = ["Name" => $_POST['new_name'], "Password" => $_POST['new_pass']];
    $resultado = jf("/Users/New", "POST", $data);
    echo $resultado ? "<script>alert('Usuario creado'); window.location='?';</script>" : "<script>alert('Error');</script>";
}
?>
<br>
    <div style="margin-bottom: 20px;">
        <input type="text" id="buscar" class="clientes-input" onkeyup="buscar()" placeholder="🔎 Buscar usuario...">
    </div>

    <?php foreach($users as $u):
        $policy=jf("/Users/".$u['Id']."/Policy");
        $enabled=$policy['EnabledFolders'] ?? [];
    ?>

    <div class="user info-card" style="cursor:pointer; margin-bottom:10px; display:flex; align-items:center; gap:12px;" onclick="toggle('u<?=$u['Id']?>')">
        <span style="font-size:20px;">👤</span> 
        <span class="info-value" style="font-size:16px;"><?=$u['Name']?></span>
    </div>

    <div id="u<?=$u['Id']?>" class="panel" style="display:none; margin-bottom:15px; margin-top:-5px;">
        <form method="post">
            <input type="hidden" name="userid" value="<?=$u['Id']?>">

            <h4 style="color:#fff; font-size:16px; margin-top:0; margin-bottom:15px;">Bibliotecas Permitidas</h4>

            <div class="checkbox-grid">
                <?php foreach($libs as $l): ?>
                <label class="checkbox-label">
                    <input type="checkbox" name="folders[]" value="<?=$l['ItemId']?>" <?=in_array($l['ItemId'],$enabled)?'checked':''?>>
                    <?=$l['Name']?>
                </label>
                <?php endforeach; ?>
            </div>
            <br>
            <button name="guardar" class="boton-azul">Guardar permisos</button>
            <button name="eliminar_user" class="boton-azul" style="background:#dc3545;" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar Usuario</button>
        </form>
    </div>

    <?php endforeach; ?>

    <hr style="border: 0; height: 1px; background: rgba(255,255,255,0.05); margin: 30px 0;">

    <h3 class="cliente-table-title">📡 Sesiones Activas</h3>

    <?php foreach($sessions as $s):
        $user=$s['UserName'] ?? '';
        $device=$s['DeviceName'] ?? '';
        $ip=$s['RemoteEndPoint'] ?? '';
        $item=$s['NowPlayingItem']['Name'] ?? 'Navegando';
    ?>

    <div class="session info-card" style="margin-bottom:15px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:15px;">
        <div>
            <span class="info-value" style="font-size:18px; color:#00b5ff;">👤 <?=$user?></span><br>
            <span class="info-label">📱 Dispositivo: <?=$device?></span><br>
            <span class="info-label">🌐 IP: <?=$ip?></span><br>
            <span class="info-label">🎬 Estado: <?=$item?></span>
        </div>
        <a href="?kick=<?=$s['Id']?>" class="estado-cortado" style="text-decoration:none;" onclick="return confirm('¿Expulsar usuario?')">🚫 Expulsar</a>
    </div>

    <?php endforeach; ?>

    <?php
    if(isset($_POST['guardar'])){
        $id=$_POST['userid'];
        $folders=$_POST['folders'] ?? [];
        $policy=jf("/Users/$id/Policy");
        $policy['EnabledFolders']=$folders;
        jf("/Users/$id/Policy","POST",$policy);
        echo "<script>alert('Permisos actualizados'); window.location='?';</script>";
    }
    ?>
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
