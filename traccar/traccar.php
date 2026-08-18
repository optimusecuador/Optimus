<?php
// Configuración de credenciales y URL de Traccar
//$TRACCAR_URL  = "http://10.8.0.10:30206";
//$TRACCAR_USER = "soldaniela416@gmail.com";
//$TRACCAR_PASS = "Optimus2023";
require('../conectar.php');
$resultado = $conexion->query("SELECT api, ip, contrasena FROM traccar LIMIT 1");
if ($resultado && $fila = $resultado->fetch_assoc()) {
    $TRACCAR_USER = $fila['api'];
    $TRACCAR_URL  = $fila['ip'];
    $TRACCAR_PASS = $fila['contrasena'];
    // 2. Comando de ping optimizado para Ubuntu / Linux
    $ping_cmd = "ping -c 1 -W 1 " . escapeshellarg($TRACCAR_URL);
    exec($ping_cmd, $output, $status);
 
    // 3. Lógica de verificación y respuesta
    if ($status === 0) {
        echo '<script>
            console.log("Traccar en ' . htmlspecialchars($TRACCAR_URL) . ' está en línea y responde.");
        </script>';
    } else {
        echo '<script>
            alert("No se puede conectar al equipo Traccar (' . htmlspecialchars($TRACCAR_URL) . '). Será redirigido a la configuración.");
            window.location.href = "../configuracion/traccar.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de Traccar en la base de datos.");
        window.location.href = "../configuracion/traccar.php";
    </script>';
    exit;
}

// 1. Limpiamos cualquier "http://", "https://" o espacio que traiga previamente
$ip_limpia = preg_replace('#^https?://#', '', trim($TRACCAR_URL));

// 2. Si ya trae un puerto (ej. 10.8.0.10:8080), nos quedamos solo con la IP
$ip_limpia = explode(':', $ip_limpia)[0];

// 3. Reconstruimos la URL completa con el protocolo y el puerto solicitado
$TRACCAR_URL = "http://" . $ip_limpia . ":30206";


// --- MANEJADOR AJAX PARA EVITAR ERRORES DE CORS EN TRACCAR 6.x ---
if (isset($_GET['ajax_user_id'])) {
    header('Content-Type: application/json');
    $userId = intval($_GET['ajax_user_id']);
    
    $ch_ajax = curl_init();
    curl_setopt($ch_ajax, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_ajax, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch_ajax, CURLOPT_USERPWD, $TRACCAR_USER . ":" . $TRACCAR_PASS);
    curl_setopt($ch_ajax, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch_ajax, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch_ajax, CURLOPT_URL, $TRACCAR_URL . "/api/devices?userId=" . $userId);
    $res_devices = curl_exec($ch_ajax);
    
    echo $res_devices;
    curl_close($ch_ajax);
    exit;
}

// --- MANEJADOR PARA ENVÍO DE COMANDOS MASIVOS ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type'])) {
    header('Content-Type: application/json');
    $targetUserId = intval($_POST['target_user_id']);
    $actionType = $_POST['action_type'];

    // 1. Obtener los dispositivos vinculados al usuario seleccionado
    $ch_get_dev = curl_init($TRACCAR_URL . "/api/devices?userId=" . $targetUserId);
    curl_setopt($ch_get_dev, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_get_dev, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch_get_dev, CURLOPT_USERPWD, $TRACCAR_USER . ":" . $TRACCAR_PASS);
    curl_setopt($ch_get_dev, CURLOPT_SSL_VERIFYPEER, false);
    $dev_res = json_decode(curl_exec($ch_get_dev), true);
    curl_close($ch_get_dev);

    if (empty($dev_res) || !is_array($dev_res)) {
        echo json_encode(['status' => 'error', 'message' => 'El usuario no tiene dispositivos asignados.']);
        exit;
    }

    $enviados = 0;
    $errores = 0;

    // 2. Ejecutar comando sobre cada dispositivo del usuario
    foreach ($dev_res as $device) {
        $deviceId = $device['id'];
        
        $payload = [
            'deviceId' => $deviceId,
            'type' => $actionType,
            'attributes' => new stdClass() 
        ];

        if ($actionType === 'rebootDevice') {
            $payload['type'] = 'deviceCellular';
        }

        $ch_cmd = curl_init($TRACCAR_URL . "/api/commands/send");
        curl_setopt($ch_cmd, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_cmd, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch_cmd, CURLOPT_USERPWD, $TRACCAR_USER . ":" . $TRACCAR_PASS);
        curl_setopt($ch_cmd, CURLOPT_POST, true);
        curl_setopt($ch_cmd, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch_cmd, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch_cmd, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch_cmd, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_exec($ch_cmd);
        $http_code = curl_getinfo($ch_cmd, CURLINFO_HTTP_CODE);
        curl_close($ch_cmd);

        if ($http_code == 200 || $http_code == 202) {
            $enviados++;
        } else {
            $errores++;
        }
    }

    echo json_encode([
        'status' => 'success', 
        'message' => "Comando procesado de manera remota. Éxitos: $enviados | Fallidos: $errores."
    ]);
    exit;
}

$usuarios = [];
$posiciones = [];
$error_msg = "";
$success_msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_usuario'])) {
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_email = $_POST['email'];
    $nuevo_password = $_POST['password'];

    $payload = json_encode([
        'name' => $nuevo_nombre,
        'email' => $nuevo_email,
        'password' => $nuevo_password
    ]);

    $ch_create = curl_init($TRACCAR_URL . "/api/users");
    curl_setopt($ch_create, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_create, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch_create, CURLOPT_USERPWD, $TRACCAR_USER . ":" . $TRACCAR_PASS);
    curl_setopt($ch_create, CURLOPT_POST, true);
    curl_setopt($ch_create, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch_create, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch_create, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch_create, CURLOPT_SSL_VERIFYPEER, false);

    $res_create = curl_exec($ch_create);
    $http_create = curl_getinfo($ch_create, CURLINFO_HTTP_CODE);
    curl_close($ch_create);

    if ($http_create == 200 || $http_create == 201) {
        $success_msg = "¡Usuario '$nuevo_nombre' creado con éxito!";
    } else {
        $error_msg = "Error al crear usuario ($http_create): " . htmlspecialchars($res_create);
    }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, $TRACCAR_USER . ":" . $TRACCAR_PASS);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

curl_setopt($ch, CURLOPT_URL, $TRACCAR_URL . "/api/users");
$res_users = curl_exec($ch);
$http_users = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_setopt($ch, CURLOPT_URL, $TRACCAR_URL . "/api/positions");
$res_pos = curl_exec($ch);
$http_pos = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    $error_msg = "Error de cURL: " . curl_error($ch);
} else {
    if ($http_users == 200 && $http_pos == 200) {
        $usuarios = json_decode($res_users, true);
        $posiciones = json_decode($res_pos, true);
    } else {
        $error_msg = "Error de API. Códigos HTTP -> Usuarios: $http_users | Posiciones: $http_pos.";
    }
}
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Net - Usuarios, Dispositivos y Mapa</title>
    <link rel="icon" type="image/x-icon" href="../images/ico.png">
    <link rel="shortcut icon" type="image/x-icon" href="../images/ico.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f6f9; height: 100vh; display: flex; flex-direction: column; }
        header { background-color: #343a40; color: white; padding: 15px 20px; font-size: 20px; font-weight: bold; }
        
        /* --- BARRA SUPERIOR DE COMANDOS --- */
        .command-bar {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .command-bar-title {
            font-size: 13px;
            font-weight: bold;
            color: #495057;
            text-transform: uppercase;
        }
        .btn-cmd {
            color: white; border: none; padding: 8px 14px;
            font-size: 12px; font-weight: bold; border-radius: 4px; cursor: pointer;
            display: flex; align-items: center; gap: 6px; transition: background 0.2s, opacity 0.2s;
            text-decoration: none;
        }
        .btn-cmd:disabled { opacity: 0.5; cursor: not-allowed; }
        
        /* Estilo específico para el botón de Regresar */
        .btn-back { background-color: #6c757d; }
        .btn-back:hover { background-color: #5a6268; }
        
        .btn-lock { background-color: #dc3545; }
        .btn-lock:hover:not(:disabled) { background-color: #bd2130; }
        .btn-unlock { background-color: #28a745; }
        .btn-unlock:hover:not(:disabled) { background-color: #218838; }
        .btn-restart { background-color: #ffc107; color: #212529; }
        .btn-restart:hover:not(:disabled) { background-color: #e0a800; }
        .btn-locate { background-color: #007bff; }
        .btn-locate:hover:not(:disabled) { background-color: #0069d9; }

        .main-container { display: flex; flex: 1; overflow: hidden; }
        .sidebar { width: 360px; background: white; border-right: 1px solid #dee2e6; overflow-y: auto; padding: 10px; display: flex; flex-direction: column; }
        .sidebar h3 { margin-top: 10px; padding-bottom: 10px; border-bottom: 2px solid #007bff; color: #333; }
        .usuarios-lista { flex: 1; overflow-y: auto; }
        
        .usuario-item { 
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 15px; border-bottom: 1px solid #f1f1f1;
            cursor: pointer; transition: background 0.2s; border-radius: 4px; margin-bottom: 5px; 
        }
        .usuario-item:hover { background-color: #e9ecef; }
        .usuario-item.active { background-color: #007bff; color: white; }
        .usuario-info { flex: 1; padding-right: 5px; }
        .usuario-item .email { font-size: 12px; color: #6c757d; }
        .usuario-item.active .email { color: #e9ecef; }
        
        .usuario-acciones { display: flex; flex-direction: column; gap: 4px; }
        
        .btn-gestionar-dispositivos, .btn-historial-dispositivos, .btn-config-dispositivos {
            color: white; border: none; padding: 5px 8px;
            font-size: 11px; font-weight: bold; border-radius: 4px; cursor: pointer;
            text-decoration: none; transition: background 0.2s; text-align: center;
            white-space: nowrap; display: inline-block;
        }
        .btn-gestionar-dispositivos { background-color: #17a2b8; }
        .btn-gestionar-dispositivos:hover { background-color: #138496; color: white; }
        .btn-historial-dispositivos { background-color: #6f42c1; }
        .btn-historial-dispositivos:hover { background-color: #59359a; color: white; }
        .btn-config-dispositivos { background-color: #e0a800; color: #212529; }
        .btn-config-dispositivos:hover { background-color: #d39e00; color: #212529; }
        
        .usuario-item.active .btn-gestionar-dispositivos { background-color: white; color: #17a2b8; }
        .usuario-item.active .btn-historial-dispositivos { background-color: white; color: #6f42c1; }
        .usuario-item.active .btn-config-dispositivos { background-color: white; color: #d39e00; }

        #map { flex: 1; height: 100%; background-color: #e5e3df; }
        .error-banner { background-color: #dc3545; color: white; padding: 15px; text-align: center; font-weight: bold; }
        .success-banner { background-color: #28a745; color: white; padding: 15px; text-align: center; font-weight: bold; }
        .no-data { text-align: center; padding: 20px; color: #6c757d; }
        .btn-crear-usuario { background-color: #28a745; color: white; border: none; padding: 10px; font-size: 14px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-bottom: 10px; text-align: center; }
        
        .modal-background { display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center; }
        .modal-content { background-color: white; padding: 20px; border-radius: 6px; width: 300px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .form-field { margin-bottom: 12px; }
        .form-field label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 13px; }
        .form-field input { width: 100%; padding: 6px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        .modal-buttons { display: flex; justify-content: flex-end; gap: 8px; margin-top: 15px; }
        .btn-close { background-color: #6c757d; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; }
        .btn-submit { background-color: #007bff; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; }
        
        .map-custom-marker {
            background: #ffffff; border: 3px solid #007bff; border-radius: 50%;
            box-shadow: 0 3px 8px rgba(0,0,0,0.4); overflow: hidden;
            display: flex; align-items: center; justify-content: center; width: 44px; height: 44px;
        }
        .map-custom-marker img { width: 85%; height: 85%; object-fit: contain; }

        .device-label-tooltip {
            background-color: rgba(33, 37, 41, 0.9) !important; color: #ffffff !important;
            border: 1px solid #007bff !important; border-radius: 4px !important;
            padding: 4px 8px !important; font-size: 12px !important; font-weight: bold !important;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3) !important; white-space: nowrap;
        }
        .device-label-tooltip::before { border-top-color: transparent !important; border-bottom-color: transparent !important; }
    </style>
</head>
<body>

<header> Panel de Monitoreo por Usuarios </header>

<div class="command-bar">
    <a href="../resumen/index.php" class="btn-cmd btn-back">⬅️ Regresar a Sistema</a>
    
    <div style="border-left: 1px solid #dee2e6; height: 24px; margin: 0 8px;"></div>
    
    <span class="command-bar-title">Comandos de Flota:</span>
    <button class="btn-cmd btn-lock" id="cmd-stop" onclick="enviarComandoFlota('engineStop')" disabled>🛑 Bloquear Motor</button>
    <button class="btn-cmd btn-unlock" id="cmd-resume" onclick="enviarComandoFlota('engineResume')" disabled>🔑 Habilitar Motor</button>
    <button class="btn-cmd btn-restart" id="cmd-reboot" onclick="enviarComandoFlota('rebootDevice')" disabled>🔄 Reiniciar GPS</button>
    <button class="btn-cmd btn-locate" id="cmd-pos" onclick="enviarComandoFlota('positionSingle')" disabled>📍 Posición Actual</button>
    <span id="txt-selected-user" style="font-size: 12px; color: #6c757d; margin-left: auto; font-style: italic;">Selecciona un usuario para activar acciones</span>
</div>

<?php if (!empty($error_msg)): ?><div class="error-banner"><?php echo $error_msg; ?></div><?php endif; ?>
<?php if (!empty($success_msg)): ?><div class="success-banner"><?php echo $success_msg; ?></div><?php endif; ?>

<div class="main-container">
    <div class="sidebar">
        <button class="btn-crear-usuario" onclick="mostrarModal()">➕ Crear Usuario</button>
        <h3>Usuarios</h3>
        <div class="usuarios-lista">
            <?php if (empty($usuarios)): ?>
                <p class="no-data">No se cargaron usuarios.</p>
            <?php else: ?>
                <?php foreach ($usuarios as $user): ?>
                    <div class="usuario-item" id="user-<?php echo $user['id']; ?>" onclick="seleccionarUsuario(<?php echo $user['id']; ?>, event)">
                        <div class="usuario-info">
                            <strong id="name-string-<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['name'] ?? 'Usuario sin nombre'); ?></strong>
                            <div class="email"><?php echo htmlspecialchars($user['email']); ?></div>
                        </div>
                        <div class="usuario-acciones">
                            <a href="dispositivos.php?userId=<?php echo $user['id']; ?>" class="btn-gestionar-dispositivos">⚙️ Gestionar</a>
                            <a href="historial.php?userId=<?php echo $user['id']; ?>" class="btn-historial-dispositivos">📊 Historial</a>
                            <a href="config_dispositivo.php?userId=<?php echo $user['id']; ?>" class="btn-config-dispositivos">🔧 Configuración</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div id="map"></div>
</div>

<div id="modalNuevoUsuario" class="modal-background">
    <div class="modal-content">
        <h4>Nuevo Usuario</h4>
        <form method="POST">
            <div class="form-field"><label>Nombre Completo</label><input type="text" name="nombre" required placeholder="Juan Pérez"></div>
            <div class="form-field"><label>Correo Electrónico</label><input type="email" name="email" required placeholder="correo@ejemplo.com"></div>
            <div class="form-field"><label>Contraseña</label><input type="password" name="password" required placeholder="Mínimo 6 caracteres"></div>
            <div class="modal-buttons">
                <button type="button" class="btn-close" onclick="ocultarModal()">Cancelar</button>
                <button type="submit" name="crear_usuario" class="btn-submit">Guardar</button>
            </div>
        </form>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const listaPosiciones = <?php echo json_encode($posiciones); ?>;
    let map, capaMarcadores = L.layerGroup(); 
    let usuarioSeleccionadoId = null;

    map = L.map('map').setView([0, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap contributors' }).addTo(map);
    capaMarcadores.addTo(map);

    function mostrarModal() { document.getElementById('modalNuevoUsuario').style.display = 'flex'; }
    function ocultarModal() { document.getElementById('modalNuevoUsuario').style.display = 'none'; }

    async function enviarComandoFlota(tipoComando) {
        if (!usuarioSeleccionadoId) return;

        let confirmacion = confirm(`¿Está seguro de enviar este comando a todos los vehículos vinculados a este usuario?`);
        if (!confirmacion) return;

        let formData = new FormData();
        formData.append('target_user_id', usuarioSeleccionadoId);
        formData.append('action_type', tipoComando);

        try {
            let res = await fetch('', { method: 'POST', body: formData });
            let data = await res.json();
            alert(data.message);
        } catch (e) {
            alert("Error de comunicación al procesar el envío de comandos.");
        }
    }

    async function seleccionarUsuario(userId, event) {
        if (event.target.tagName === 'A' || event.target.closest('.usuario-acciones')) {
            return;
        }

        usuarioSeleccionadoId = userId;
        
        document.querySelectorAll('.btn-cmd').forEach(btn => {
            if (!btn.classList.contains('btn-back')) {
                btn.disabled = false;
            }
        });
        const nombreU = document.getElementById('name-string-' + userId).innerText;
        document.getElementById('txt-selected-user').innerText = "Monitoreando a: " + nombreU;

        document.querySelectorAll('.usuario-item').forEach(item => item.classList.remove('active'));
        const elemento = document.getElementById('user-' + userId);
        if(elemento) elemento.classList.add('active');

        capaMarcadores.clearLayers();

        try {
            const response = await fetch(`?ajax_user_id=${userId}`);
            if (!response.ok) throw new Error("Error en la respuesta del servidor.");

            const dispositivosUsuario = await response.json();
            if (!Array.isArray(dispositivosUsuario)) throw new Error("Respuesta inválida.");

            let idsDispositivos = dispositivosUsuario.map(d => d.id);
            let coordenadasDispositivos = [];

            listaPosiciones.forEach(disp => {
                if (idsDispositivos.includes(disp.deviceId)) {
                    const infoDisp = dispositivosUsuario.find(d => d.id === disp.deviceId);
                    const nombreDisp = infoDisp ? infoDisp.name : "ID: " + disp.deviceId;
                    const velocidadKmh = (disp.speed * 1.852).toFixed(1);
                    const fechaActualizacion = new Date(disp.deviceTime).toLocaleString();
                    
                    let markerOptions = {};
                    let imageUrl = null;

                    if (infoDisp && infoDisp.attributes) {
                        if (infoDisp.attributes.deviceImage) {
                            imageUrl = infoDisp.attributes.deviceImage;
                        } else if (infoDisp.attributes.device_image) {
                            imageUrl = infoDisp.attributes.device_image;
                        }
                    }

                    if (imageUrl) {
                        if (imageUrl.startsWith('/')) {
                            const baseUrl = "<?php echo $TRACCAR_URL; ?>";
                            imageUrl = baseUrl + imageUrl;
                        }

                        markerOptions.icon = L.divIcon({
                            html: `<div class="map-custom-marker"><img src="${imageUrl}"></div>`,
                            className: '', 
                            iconSize: [44, 44],
                            iconAnchor: [22, 22],
                            popupAnchor: [0, -22]
                        });
                    }
                    
                    const marker = L.marker([disp.latitude, disp.longitude], markerOptions)
                        .bindPopup(`<b>Dispositivo: ${nombreDisp}</b><br><b>Velocidad:</b> ${velocidadKmh} km/h<br><b>Último reporte:</b> ${fechaActualizacion}`);
                    
                    marker.bindTooltip(nombreDisp, {
                        permanent: true, direction: 'top', offset: [0, -25], className: 'device-label-tooltip'
                    });
                    
                    capaMarcadores.addLayer(marker);
                    coordenadasDispositivos.push([disp.latitude, disp.longitude]);
                }
            });

            if (coordenadasDispositivos.length === 0) {
                let respuesta = confirm("Este usuario no tiene dispositivos en línea activos.\n\n¿Desea ir a la sección de administración para agregar uno nuevo?");
                if (respuesta) {
                    window.location.href = "dispositivos.php?userId=" + userId;
                }
            } else {
                const bounds = L.latLngBounds(coordenadasDispositivos);
                map.fitBounds(bounds, { padding: [50, 50] });
                if (coordenadasDispositivos.length === 1) map.setZoom(15);
            }
        } catch (error) {
            console.error(error);
            alert("No se pudo conectar con el servicio de Traccar.");
        }
    }
</script>
</body>
</html>