<?php
// Configuración de credenciales y URL de Traccar
$TRACCAR_URL  = "http://127.0.0.1:9050";
$TRACCAR_USER = "soldaniela416@gmail.com";
$TRACCAR_PASS = "Optimus2023";

$userId = isset($_GET['userId']) ? intval($_GET['userId']) : 0;
if ($userId <= 0) {
    die("Error: No se especificó un ID de usuario válido.");
}

$dispositivos = [];
$dispositivo_seleccionado = null;
$deviceId = isset($_GET['deviceId']) ? intval($_GET['deviceId']) : 0;
$error_msg = "";
$success_msg = "";

// 1. Obtener la lista de dispositivos asignados a este usuario
$ch_dev = curl_init("$TRACCAR_URL/api/devices?userId=$userId");
curl_setopt($ch_dev, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_dev, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch_dev, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
curl_setopt($ch_dev, CURLOPT_SSL_VERIFYPEER, false);
$res_dev = curl_exec($ch_dev);
$http_dev = curl_getinfo($ch_dev, CURLINFO_HTTP_CODE);
curl_close($ch_dev);

if ($http_dev == 200) {
    $dispositivos = json_decode($res_dev, true);
} else {
    $error_msg = "Error al recuperar los dispositivos del usuario de la API.";
}

// 2. Si hay un dispositivo seleccionado de la lista, extraer su información actual
if ($deviceId > 0) {
    foreach ($dispositivos as $d) {
        if ($d['id'] === $deviceId) {
            $dispositivo_seleccionado = $d;
            break;
        }
    }
}

// 3. Procesar el formulario de actualización cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar_config'])) {
    $deviceId = intval($_POST['device_id']);
    $nombre = $_POST['name'];
    $uniqueId = $_POST['uniqueId'];
    $phone = $_POST['phone'];
    $model = $_POST['model'];
    $contact = $_POST['contact'];
    $category = $_POST['category']; // Icono por defecto de la interfaz
    
    // Configuraciones extendidas personalizadas (Imagen URL y otros)
    $device_image = $_POST['device_image']; 
    $brand = $_POST['brand'];
    $notes = $_POST['notes'];

    // Buscar el payload original para no corromper otros atributos existentes (ej. geocercas, comandos)
    $current_device = null;
    foreach ($dispositivos as $d) {
        if ($d['id'] === $deviceId) {
            $current_device = $d;
            break;
        }
    }

    if ($current_device) {
        // Combinamos atributos antiguos con los clientes-input-small modificados
        $attributes = $current_device['attributes'] ?? [];
        $attributes['device_image'] = $device_image;
        $attributes['brand'] = $brand;
        $attributes['notes'] = $notes;

        $payload = json_encode([
            'id' => $current_device['id'],
            'name' => $nombre,
            'uniqueId' => $uniqueId,
            'phone' => $phone,
            'model' => $model,
            'contact' => $contact,
            'category' => $category,
            'disabled' => $current_device['disabled'] ?? false,
            'attributes' => $attributes
        ]);

        // Traccar 6.x requiere PUT para actualizar un elemento específico con su ID en el cuerpo
        $ch_update = curl_init("$TRACCAR_URL/api/devices/" . $deviceId);
        curl_setopt($ch_update, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_update, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch_update, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
        curl_setopt($ch_update, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch_update, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch_update, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch_update, CURLOPT_SSL_VERIFYPEER, false);

        $res_update = curl_exec($ch_update);
        $http_update = curl_getinfo($ch_update, CURLINFO_HTTP_CODE);
        curl_close($ch_update);

        if ($http_update == 200) {
            $success_msg = "¡Configuración del dispositivo actualizada correctamente!";
            // Recargar datos actualizados de la API
            header("Location: config_dispositivo.php?userId=$userId&deviceId=$deviceId&success=1");
            exit;
        } else {
            $error_msg = "Error al actualizar en Traccar ($http_update): " . htmlspecialchars($res_update);
        }
    }
}

if (isset($_GET['success'])) {
    $success_msg = "¡Configuración del dispositivo actualizada correctamente!";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Dispositivo - Traccar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f6f9; color: #333; }
        header { background-color: #e0a800; color: #212529; padding: 15px 20px; font-size: 18px; font-weight: bold; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-volver { background-color: #343a40; color: white; border: none; padding: 8px 14px; font-size: 13px; font-weight: bold; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-volver:hover { background-color: #23272b; }
        
        .container { max-width: 750px; margin: 30px auto; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-top: 4px solid #e0a800; }
        h3 { margin-top: 0; color: #212529; border-bottom: 1px solid #dee2e6; padding-bottom: 10px; }
        
        .error-box { background-color: #dc3545; color: white; padding: 12px; border-radius: 4px; font-weight: bold; margin-bottom: 15px; font-size: 14px; }
        .success-box { background-color: #28a745; color: white; padding: 12px; border-radius: 4px; font-weight: bold; margin-bottom: 15px; font-size: 14px; }
        
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-weight: bold; font-size: 13px; color: #495057; margin-bottom: 6px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; font-size: 14px; transition: border-color 0.15s; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: #e0a800; outline: none; }
        
        .row-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        
        .btn-guardar { background-color: #28a745; color: white; border: none; padding: 12px 20px; font-size: 15px; font-weight: bold; border-radius: 4px; cursor: pointer; display: inline-block; width: 100%; transition: background 0.2s; }
        .btn-guardar:hover { background-color: #218838; }
        
        .preview-box { display: flex; align-items: center; gap: 15px; background: #f8f9fa; padding: 12px; border-radius: 4px; border: 1px dashed #ccc; margin-top: 8px; }
        .preview-img { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; background: #eee; border: 1px solid #ddd; }
        .no-data-info { text-align: center; padding: 40px; color: #6c757d; font-style: italic; }
    </style>
</head>
<body>

<header>
    <span>🔧 Panel de Configuración Avanzada del Dispositivo</span>
    <a href="index.php" class="btn-volver">⬅️ Volver al Monitor</a>
</header>

<div class="container">
    <?php if(!empty($error_msg)): ?><div class="error-box"><?php echo $error_msg; ?></div><?php endif; ?>
    <?php if(!empty($success_msg)): ?><div class="success-box"><?php echo $success_msg; ?></div><?php endif; ?>

    <div class="form-group">
        <label for="deviceSelector">Seleccionar Vehículo a Modificar</label>
        <select id="deviceSelector" onchange="window.location.href='config_dispositivo.php?userId=<?php echo $userId; ?>&deviceId=' + this.value;">
            <option value="">-- Elija un dispositivo registrado --</option>
            <?php foreach ($dispositivos as $dev): ?>
                <option value="<?php echo $dev['id']; ?>" <?php if($deviceId == $dev['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($dev['name']); ?> [<?php echo htmlspecialchars($dev['uniqueId']); ?>]
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if ($dispositivo_seleccionado === null): ?>
        <p class="no-data-info">Seleccione un vehículo del menú desplegable superior para cargar y modificar sus configuraciones.</p>
    <?php else: 
        // Extraer configuraciones personalizadas de attributes para evitar fallas en Traccar 6
        $attrs = $dispositivo_seleccionado['attributes'] ?? [];
        $current_image = $attrs['device_image'] ?? '';
        $current_brand = $attrs['brand'] ?? '';
        $current_notes = $attrs['notes'] ?? '';
    ?>
        <form method="POST">
            <h3>Editar Parámetros de: <?php echo htmlspecialchars($dispositivo_seleccionado['name']); ?></h3>
            <input type="hidden" name="device_id" value="<?php echo $dispositivo_seleccionado['id']; ?>">
            
            <div class="row-grid">
                <div class="form-group">
                    <label>Nombre del Vehículo / Dispositivo</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($dispositivo_seleccionado['name']); ?>" required>
                </div>
                <div class="form-group">
                    <label>Identificador Único (IMEI / ID)</label>
                    <input type="text" name="uniqueId" value="<?php echo htmlspecialchars($dispositivo_seleccionado['uniqueId']); ?>" required>
                </div>
            </div>

            <div class="row-grid">
                <div class="form-group">
                    <label>Número de Teléfono (SIM interna)</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($dispositivo_seleccionado['phone'] ?? ''); ?>" placeholder="+5939999999">
                </div>
                <div class="form-group">
                    <label>Persona / Contacto a Cargo</label>
                    <input type="text" name="contact" value="<?php echo htmlspecialchars($dispositivo_seleccionado['contact'] ?? ''); ?>" placeholder="Nombre del chofer">
                </div>
            </div>

            <div class="row-grid">
                <div class="form-group">
                    <label>Marca del Vehículo</label>
                    <input type="text" name="brand" value="<?php echo htmlspecialchars($current_brand); ?>" placeholder="Ej: Chevrolet, Toyota">
                </div>
                <div class="form-group">
                    <label>Modelo / Versión del Dispositivo GPS</label>
                    <input type="text" name="model" value="<?php echo htmlspecialchars($dispositivo_seleccionado['model'] ?? ''); ?>" placeholder="Ej: Coban 303, Suntech">
                </div>
            </div>

            <div class="form-group">
                <label>Categoría / Icono Estándar (Traccar)</label>
                <select name="category">
                    <option value="default" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'default') echo 'selected'; ?>>Por defecto</option>
                    <option value="car" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'car') echo 'selected'; ?>>Automóvil 🚗</option>
                    <option value="truck" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'truck') echo 'selected'; ?>>Camión 🚛</option>
                    <option value="motorcycle" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'motorcycle') echo 'selected'; ?>>Motocicleta 🏍️</option>
                    <option value="bus" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'bus') echo 'selected'; ?>>Autobús 🚌</option>
                    <option value="van" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'van') echo 'selected'; ?>>Furgoneta 🚐</option>
                    <option value="person" <?php if(($dispositivo_seleccionado['category'] ?? '') == 'person') echo 'selected'; ?>>Persona 🚶</option>
                </select>
            </div>

            <div class="form-group">
                <label>Enlace URL de la Imagen Personalizada</label>
                <input type="url" id="img_url_input" name="device_image" value="<?php echo htmlspecialchars($current_image); ?>" placeholder="https://ejemplo.com/imagenes/mi-camion.png" oninput="actualizarVistaPrevia(this.value)">
                
                <div class="preview-box">
                    <img id="img_preview" class="preview-img" src="<?php echo !empty($current_image) ? htmlspecialchars($current_image) : 'data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'60\' height=\'60\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%23ccc\' stroke-width=\'2\'><rect x=\'3\' y=\'3\' width=\'18\' height=\'18\' rx=\'2\'/><circle cx=\'8.5\' cy=\'8.5\' r=\'1.5\'/><path d=\'M21 15l-5-5L5 21\'/></svg>'; ?>" alt="Previa">
                    <div>
                        <span style="font-size:12px; font-weight:bold; display:block; color:#555;">Vista previa del icono</span>
                        <span style="font-size:11px; color:#777;">Se cargará la imagen suministrada si la URL es válida.</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Notas Técnicas / Detalles de Instalación</label>
                <textarea name="notes" rows="3" placeholder="Ubicación del GPS en el auto, fecha de instalación, tipo de corte de corriente..."><?php echo htmlspecialchars($current_notes); ?></textarea>
            </div>

            <button type="submit" name="actualizar_config" class="btn-guardar">💾 Guardar Cambios en Traccar</button>
        </form>
    <?php endif; ?>
</div>

<script>
    function actualizarVistaPrevia(url) {
        const img = document.getElementById('img_preview');
        if(url.trim() !== "") {
            img.src = url;
        } else {
            img.src = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 24 24' fill='none' stroke='%23ccc' stroke-width='2'><rect x='3' y='3' width='18' height='18' rx='2'/><circle cx='8.5' cy='8.5' r='1.5'/><path d='M21 15l-5-5L5 21'/></svg>";
        }
    }
</script>
</body>
</html>