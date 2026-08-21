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
      <a href="index.php"><i data-lucide="users"></i> Clientes</a>
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
      <a href="../peliculas/index.php"><i data-lucide="play-circle"></i> Peliculas</a>
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
      <!-- InstanceBeginEditable name="principal" --><?php

/* =========================================
   VALIDAR CEDULA
========================================= */

function validarCedula($cedula){

    if(strlen($cedula) != 10){
        return false;
    }

    $provincia = intval(substr($cedula,0,2));

    if($provincia < 1 || $provincia > 24){
        return false;
    }

    $suma = 0;

    for($i=0; $i<9; $i++){

        $num = intval($cedula[$i]);

        if($i % 2 == 0){

            $num *= 2;

            if($num > 9){
                $num -= 9;
            }
        }

        $suma += $num;
    }

    $digito = (10 - ($suma % 10)) % 10;

    return $digito == intval($cedula[9]);
}

/* =========================================
   VALIDAR RUC
========================================= */

function validarRUC($ruc){

    if(strlen($ruc) != 13){
        return false;
    }

    if(substr($ruc,10,3) != "001"){
        return false;
    }

    return validarCedula(substr($ruc,0,10));
}

/* =========================================
   VARIABLES
========================================= */

$mensaje = "";
$redireccionar = false;

$modo_edicion = false;

$id = "";

$codigo        = "";
$nombres       = "";
$representante = "";
$fuente        = "0";
$iva           = "0";
$juridica      = "NO";
$multimedia    = "NO";
$direccion     = "";
$telefono1     = "";
$telefono2     = "";
$mail          = "";
$usuario       = "";
$contrasena    = "";
$isp           = "NO";
$proveedorisp  = "SIN ASIGNAR";

/* =========================================
   RECUPERAR CLIENTE
========================================= */

if(isset($_POST["id"])){

    $id = $_POST["id"];

    if($id != ""){

        $sql = "SELECT * FROM clientes WHERE id=? LIMIT 1";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s",$id);

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();

            $modo_edicion = true;

            $codigo        = $row["codigo"];
            $nombres       = $row["nombres"];
            $representante = $row["representante"];
            $fuente        = $row["fuente"];
            $iva           = $row["iva"];
            $juridica      = $row["juridica"];
            $multimedia    = $row["multimedia"];
            $direccion     = $row["direccion"];
            $telefono1     = $row["telefono1"];
            $telefono2     = $row["telefono2"];
            $mail          = $row["mail"];
            $usuario       = $row["usuario"];
            $contrasena    = $row["contrasena"];
            $isp           = $row["isp"];
            $proveedorisp  = $row["proveedorisp"];
        }
    }
}

/* =========================================
   GUARDAR CLIENTE
========================================= */

if(isset($_POST["guardar"])){

    $id            = trim($_POST['id']);
    $codigo        = trim($_POST['codigo']);
    $nombres       = strtoupper(trim($_POST['nombres']));
    $representante = strtoupper(trim($_POST['representante']));
    $fuente        = $_POST['fuente'];
    $iva           = $_POST['iva'];
    $juridica      = $_POST['juridica'];
    $multimedia    = $_POST['multimedia'];
    $direccion     = $_POST['direccion'];
    $telefono1     = $_POST['telefono1'];
    $telefono2     = $_POST['telefono2'];
    $mail          = $_POST['mail'];
    $usuario       = $_POST['usuario'];
    $contrasena    = $_POST['contrasena'];
    $isp           = $_POST['isp'];
    $proveedorisp  = $_POST['proveedorisp'];

    $fecha = date("Y-m-d (H:i:s)");

    /* =========================
       VALIDAR DOCUMENTO
    ========================= */

    if(strlen($codigo) == 10){

        if(!validarCedula($codigo)){
            $mensaje = "La cédula ecuatoriana no es válida";
        }

    }elseif(strlen($codigo) == 13){

        if(!validarRUC($codigo)){
            $mensaje = "El RUC ecuatoriano no es válido";
        }

    }else{

        $mensaje = "Debe ingresar una cédula o RUC válido";
    }

    /* =========================
       VALIDAR DUPLICADO
    ========================= */

    if($mensaje == ""){

        if($id == ""){

            $sql = "SELECT id FROM clientes WHERE codigo=?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("s",$codigo);

        }else{

            $sql = "SELECT id FROM clientes WHERE codigo=? AND id<>?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("ss",$codigo,$id);
        }

        $stmt->execute();

        $result = $stmt->get_result();

        if($result->num_rows > 0){

            $mensaje = "El cliente ya existe";
        }
    }

    /* =========================
       INSERTAR O MODIFICAR
    ========================= */

    if($mensaje == ""){

        if($id == ""){

            $sql = "INSERT INTO clientes
            (
                id,
                codigo,
                nombres,
                representante,
                fuente,
                iva,
                juridica,
                multimedia,
                direccion,
                telefono1,
                telefono2,
                mail,
                usuario,
                contrasena,
                isp,
                proveedorisp,
                fecha
            )
            VALUES
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param(
            "sssssssssssssssss",
            $codigo,
            $codigo,
            $nombres,
            $representante,
            $fuente,
            $iva,
            $juridica,
            $multimedia,
            $direccion,
            $telefono1,
            $telefono2,
            $mail,
            $usuario,
            $contrasena,
            $isp,
            $proveedorisp,
            $fecha
            );

            if($stmt->execute()){

                $mensaje = "Cliente guardado correctamente";
                $redireccionar = true;

            }else{

                $mensaje = "Error al guardar cliente";
            }

        }else{

            $sql = "UPDATE clientes SET
                    codigo=?,
                    nombres=?,
                    representante=?,
                    fuente=?,
                    iva=?,
                    juridica=?,
                    multimedia=?,
                    direccion=?,
                    telefono1=?,
                    telefono2=?,
                    mail=?,
                    usuario=?,
                    contrasena=?,
                    isp=?,
                    proveedorisp=?
                    WHERE id=?";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param(
            "ssssssssssssssss",
            $codigo,
            $nombres,
            $representante,
            $fuente,
            $iva,
            $juridica,
            $multimedia,
            $direccion,
            $telefono1,
            $telefono2,
            $mail,
            $usuario,
            $contrasena,
            $isp,
            $proveedorisp,
            $id
            );

            if($stmt->execute()){

                $mensaje = "Registro modificado exitosamente";
                $redireccionar = true;

            }else{

                $mensaje = "Error al modificar registro";
            }
        }
    }
}
?>

<title>Registro Clientes</title>

<body>

<div class="clientes-dashboard">

    <!-- HEADER -->
    <div class="clientes-header panel-dark">

        <div class="clientes-header-top">

            <div>

                <h2 class="clientes-title">
                    <?php if($modo_edicion){ ?>
                    Editar Cliente
                    <?php }else{ ?>
                    Registro de Clientes
                    <?php } ?>
                </h2>

                <p class="clientes-subtitle">
                    Administración de datos personales, tributarios y multimedia
                </p>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <form method="POST">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="panel-dark clientes-form-panel">

            <div class="clientes-form-title">
                Datos del Cliente
            </div>

            <div class="clientes-form-grid">

                <!-- CODIGO -->
                <div class="clientes-field">

                    <label>Código</label>

                    <div class="clientes-inline">

                        <select class="clientes-input-small">

                            <option>Cédula</option>
                            <option>RUC</option>

                        </select>

                        <input type="text"
                               name="codigo"
                               id="codigo"
                               value="<?php echo $codigo; ?>"
                               class="clientes-input"
                               placeholder="Ingrese RUC o CI"
                               required>

                    </div>

                </div>

                <!-- FUENTE -->
                <div class="clientes-field">

                    <label>Fuente</label>

                    <select class="clientes-input"
                            name="fuente">

                        <option value="0" <?php if($fuente=="0"){ echo "selected"; } ?>>0</option>
                        <option value="1" <?php if($fuente=="1"){ echo "selected"; } ?>>1</option>

                    </select>

                </div>

                <!-- EMPRESA -->
                <div class="clientes-field">

                    <label>Nombre Empresa</label>

                    <input type="text"
                           name="nombres"
                           id="nombres"
                           value="<?php echo $nombres; ?>"
                           class="clientes-input"
                           placeholder="Ingrese nombres o apellidos"
                           onkeyup="this.value=this.value.toUpperCase();"
                           required>

                </div>

                <!-- IVA -->
                <div class="clientes-field">

                    <label>IVA</label>

                    <select class="clientes-input"
                            name="iva">

                        <option value="0" <?php if($iva=="0"){ echo "selected"; } ?>>0</option>
                        <option value="12" <?php if($iva=="12"){ echo "selected"; } ?>>12</option>
                        <option value="15" <?php if($iva=="15"){ echo "selected"; } ?>>15</option>

                    </select>

                </div>

                <!-- REPRESENTANTE -->
                <div class="clientes-field clientes-full">

                    <label>Representante Legal</label>

                    <input type="text"
                           name="representante"
                           id="representante"
                           value="<?php echo $representante; ?>"
                           class="clientes-input"
                           placeholder="Ingrese representante legal"
                           onkeyup="this.value=this.value.toUpperCase();">

                </div>

                <!-- JURIDICA -->
                <div class="clientes-field">

                    <label>Persona Jurídica</label>

                    <select class="clientes-input"
                            name="juridica">

                        <option value="NO" <?php if($juridica=="NO"){ echo "selected"; } ?>>No</option>
                        <option value="SI" <?php if($juridica=="SI"){ echo "selected"; } ?>>Sí</option>

                    </select>

                </div>

                <!-- MULTIMEDIA -->
                <div class="clientes-field">

                    <label>Multimedia</label>

                    <select class="clientes-input"
                            name="multimedia">

                        <option value="NO" <?php if($multimedia=="NO"){ echo "selected"; } ?>>No</option>
                        <option value="SI" <?php if($multimedia=="SI"){ echo "selected"; } ?>>Sí</option>

                    </select>

                </div>

                <!-- DIRECCION -->
                <div class="clientes-field clientes-full">

                    <label>Dirección</label>

                    <input type="text"
                           name="direccion"
                           value="<?php echo $direccion; ?>"
                           class="clientes-input"
                           placeholder="Ingrese dirección">

                </div>

                <!-- TELEFONOS -->
                <div class="clientes-field">

                    <label>Teléfono</label>

                    <div class="clientes-inline">

                        <input type="text"
                               name="telefono1"
                               value="<?php echo $telefono1; ?>"
                               class="clientes-input"
                               placeholder="Teléfono 1">

                        <input type="text"
                               name="telefono2"
                               value="<?php echo $telefono2; ?>"
                               class="clientes-input"
                               placeholder="Teléfono 2">

                    </div>

                </div>

                <!-- USUARIO -->
                <div class="clientes-field">

                    <label>Usuario</label>

                    <input type="text"
                           name="usuario"
                           value="<?php echo $usuario; ?>"
                           class="clientes-input"
                           placeholder="Ingrese usuario">

                </div>

                <!-- MAIL -->
                <div class="clientes-field">

                    <label>Mail</label>

                    <input type="email"
                           name="mail"
                           value="<?php echo $mail; ?>"
                           class="clientes-input"
                           placeholder="Ingrese mail">

                </div>

                <!-- PASSWORD -->
                <div class="clientes-field">

                    <label>Contraseña</label>

                    <input type="password"
                           name="contrasena"
                           value="<?php echo $contrasena; ?>"
                           class="clientes-input"
                           placeholder="Ingrese contraseña">

                </div>

            </div>

        </div>

        <!-- SUBDISTRIBUIDORES -->
        <div class="panel-dark clientes-sub-panel">

            <div class="clientes-form-title">
                Datos de Subdistribuidores
            </div>

            <div class="clientes-sub-grid">

                <div class="clientes-field">

                    <label>Subdistribuidor</label>

                    <select class="clientes-input"
                            name="isp">

                        <option value="NO" <?php if($isp=="NO"){ echo "selected"; } ?>>No</option>
                        <option value="SI" <?php if($isp=="SI"){ echo "selected"; } ?>>Sí</option>

                    </select>

                </div>

                <div class="clientes-field">

                    <label>Asignar Subdistribuidor</label>

                    <select class="clientes-input"
                            name="proveedorisp">

                        <option value="SIN ASIGNAR" <?php if($proveedorisp=="SIN ASIGNAR"){ echo "selected"; } ?>>
                            Sin Asignar
                        </option>

                    </select>

                </div>

            </div>

        </div>

        <!-- BOTON -->
        <div style="margin-top:20px;">

            <button type="submit"
                    name="guardar"
                    class="primary">

                <?php if($modo_edicion){ ?>
                Modificar Cliente
                <?php }else{ ?>
                Guardar Cliente
                <?php } ?>

            </button>

        </div>

    </form>

</div>

<?php if($mensaje != ""){ ?>

<script>
Swal.fire({
    title: 'Mensaje',
    text: "<?php echo addslashes($mensaje); ?>",
    icon: 'info',
    confirmButtonText: 'Aceptar',
    allowOutsideClick: false
}).then((result) => {
    <?php if($redireccionar){ ?>
        if (result.isConfirmed) {
            window.location.href = "../clientes/index.php";
        }
    <?php } ?>
});
</script>

<?php } ?>
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
