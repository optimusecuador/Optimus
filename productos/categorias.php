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
      <a href="productos.php"><i data-lucide="boxes"></i> Inventario</a>
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
// Establecer el conjunto de caracteres a utf8mb4
if (isset($conn)) {
    $conn->set_charset("utf8mb4");
}

// Variables para el manejo del formulario de edición
$id_editar = null;
$codigo_editar = '';
$puesto_editar = '';
$serviciotecnico_editar = 'no';
$modo_edicion = false;

// 2. PROCESAR ACCIONES (CRUD)

// Acción: Eliminar
if (isset($_GET['eliminar'])) {
    $id_eliminar = (int)$_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM tipoproducto WHERE id = ?");
    $stmt->bind_param("i", $id_eliminar);
    $stmt->execute();
    $stmt->close();
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Acción: Cargar datos para Editar
if (isset($_GET['editar'])) {
    $id_editar = (int)$_GET['editar'];
    $stmt = $conn->prepare("SELECT * FROM tipoproducto WHERE id = ?");
    $stmt->bind_param("i", $id_editar);
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    $registro = $resultado->fetch_assoc();
    
    if ($registro) {
        $codigo_editar = $registro['codigo'];
        $puesto_editar = $registro['puesto'];
        $serviciotecnico_editar = $registro['serviciotecnico'];
        $modo_edicion = true;
    }
    $stmt->close();
}

// Acción: Guardar (Insertar o Actualizar)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? 'vacio';
    $puesto = $_POST['puesto'] ?? 'vacio';
    $serviciotecnico = $_POST['serviciotecnico'] ?? 'no';

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // ACTUALIZAR REGISTRO
        $id_actualizar = (int)$_POST['id'];
        $stmt = $conn->prepare("UPDATE tipoproducto SET codigo = ?, puesto = ?, serviciotecnico = ? WHERE id = ?");
        $stmt->bind_param("sssi", $codigo, $puesto, $serviciotecnico, $id_actualizar);
        $stmt->execute();
        $stmt->close();
    } else {
        // CREAR NUEVO REGISTRO
        $stmt = $conn->prepare("INSERT INTO tipoproducto (codigo, puesto, serviciotecnico) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $codigo, $puesto, $serviciotecnico);
        $stmt->execute();
        $stmt->close();
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// 3. OBTENER TODOS LOS REGISTROS PARA LA TABLA
$resultado_tabla = $conn->query("SELECT * FROM tipoproducto ORDER BY id ASC");
$productos = [];

if ($resultado_tabla) {
    while ($fila = $resultado_tabla->fetch_assoc()) {
        $productos[] = $fila;
    }
    $resultado_tabla->free();
}

// Cerrar la conexión al final del procesamiento
$conn->close();
?>

    <style>
        /* Capa oscura de fondo para el modal */
        .burbuja-modal {
            display: <?php echo $modo_edicion ? 'block' : 'none'; ?>; 
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(2, 18, 32, 0.8);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            overflow-y: auto; /* Permite scroll si la pantalla es muy pequeña */
        }
        
        /* Contenedor central de la burbuja flotante (CORREGIDO) */
        .burbuja-contenido {
            background: linear-gradient(180deg, rgba(8, 31, 52, 0.98), rgba(5, 25, 43, 0.98));
            border: 1px solid var(--line);
            border-radius: 16px;
            margin: 8% auto; /* Centrado vertical y horizontal */
            padding: 28px;
            width: 90%; /* Ajuste responsivo para móviles */
            max-width: 460px; /* Ancho máximo ideal de la burbuja */
            box-shadow: var(--shadow);
            color: var(--text);
            box-sizing: border-box;
        }

        .burbuja-acciones {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 25px;
        }

        /* Botón de eliminación con tus variables de color */
        .btn-delete {
            background: linear-gradient(135deg, var(--red), #c71540);
        }
        .btn-delete:hover {
            box-shadow: 0 0 12px rgba(255, 47, 101, 0.4);
        }
    </style>

    <div class="clientes-header panel-dark">
        <div class="clientes-header-top">
            <div>
                <h2 class="clientes-title">
                    <?php if($modo_edicion){ ?>
                        Editar Categoría
                    <?php }else{ ?>
                        Registro de Categorías
                    <?php } ?>
                </h2>
                <p class="clientes-subtitle">
                    Administración de tipos de productos, insumos y servicios de hardware/software
                </p>
            </div>
            <div>
                <button type="button" class="primary" onclick="abrirBurbuja()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Nueva Categoría
                </button>
            </div>
        </div>
    </div>

    <div class="cliente-wrapper">
        
        <div id="miBurbuja" class="burbuja-modal">
            <div class="burbuja-contenido">
                <h3 class="clientes-form-title" style="margin-top: 0; margin-bottom: 20px;">
                    <?php echo $modo_edicion ? "Editar Categoría" : "Agregar Nueva Categoría"; ?>
                </h3>
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="clientes-form-panel" style="background:transparent; border:none; padding:0; box-shadow:none;">
                    <?php if ($modo_edicion): ?>
                        <input type="hidden" name="id" value="<?php echo $id_editar; ?>">
                    <?php endif; ?>

                    <div class="clientes-form-grid" style="grid-template-columns: 1fr; gap: 16px;">
                        
                        <div class="clientes-field">
                            <label for="codigo">Código:</label>
                            <input type="text" name="codigo" id="codigo" class="clientes-input" value="<?php echo htmlspecialchars($codigo_editar); ?>" placeholder="Ej: EQUIPOSINFORMATICOS" required>
                        </div>

                        <div class="clientes-field">
                            <label for="puesto">Puesto / Nombre de Descripción:</label>
                            <input type="text" name="puesto" id="puesto" class="clientes-input" value="<?php echo htmlspecialchars($puesto_editar); ?>" placeholder="Ej: Materiales Informáticos" required>
                        </div>

                        <div class="clientes-field">
                            <label for="serviciotecnico">Requiere Servicio Técnico:</label>
                            <select name="serviciotecnico" id="serviciotecnico" class="clientes-input">
                                <option value="no" <?php echo $serviciotecnico_editar === 'no' ? 'selected' : ''; ?>>No</option>
                                <option value="si" <?php echo $serviciotecnico_editar === 'si' ? 'selected' : ''; ?>>Sí</option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="burbuja-acciones">
                        <?php if ($modo_edicion): ?>
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn-action btn-proforma" style="text-decoration:none; text-align:center; line-height:34px; height:36px; padding:0 16px;">Cancelar</a>
                        <?php else: ?>
                            <button type="button" class="btn-action btn-proforma" onclick="cerrarBurbuja()">Cancelar</button>
                        <?php endif; ?>
                        
                        <button type="submit" class="btn-action btn-contrato"><?php echo $modo_edicion ? "Guardar Cambios" : "Registrar"; ?></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="cliente-table-panel">
            <table class="table-dark">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Código</th>
                        <th>Puesto / Descripción</th>
                        <th style="text-align: center; width: 150px;">Servicio Técnico</th>
                        <th style="text-align: center; width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($productos) > 0): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><b style="color: var(--muted);">#<?php echo $producto['id']; ?></b></td>
                                <td><code><?php echo htmlspecialchars($producto['codigo']); ?></code></td>
                                <td><?php echo htmlspecialchars($producto['puesto']); ?></td>
                                <td style="text-align: center;">
                                    <?php if ($producto['serviciotecnico'] === 'si'): ?>
                                        <span class="estado estado-activo">Sí</span>
                                    <?php else: ?>
                                        <span class="estado estado-suspendido">No</span>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align: center;">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" style="display: inline;">
                                        <button type="submit" name="editar" value="<?php echo $producto['id']; ?>" class="btn-action btn-edit" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;">Editar</button>
                                    </form>

                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" style="display: inline;">
                                        <button type="submit" name="eliminar" value="<?php echo $producto['id']; ?>" class="btn-action btn-delete" style="padding: 6px 14px; font-size: 12px; border-radius: 8px;" onclick="return confirm('¿Estás seguro de eliminar este registro?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--muted); padding: 30px;">No hay registros en la tabla de inventario.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function abrirBurbuja() {
            document.getElementById('miBurbuja').style.display = 'block';
        }

        function cerrarBurbuja() {
            document.getElementById('miBurbuja').style.display = 'none';
        }
    </script>
		
		
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
