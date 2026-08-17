<?php
// Configuración de credenciales y URL de Traccar
$TRACCAR_URL  = "http://127.0.0.1:9050";
$TRACCAR_USER = "soldaniela416@gmail.com";
$TRACCAR_PASS = "Optimus2023";

// Recuperar y validar el ID del usuario desde la URL
$userId = isset($_GET['userId']) ? intval($_GET['userId']) : 0;
if ($userId <= 0) {
    die("Error: No se especificó un ID de usuario válido.");
}

$error_msg = "";
$success_msg = "";
$usuario_nombre = "Usuario #".$userId;

// 1. Obtener los detalles del usuario seleccionado (Para saber su nombre)
$ch_user = curl_init("$TRACCAR_URL/api/users");
curl_setopt($ch_user, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_user, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch_user, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
curl_setopt($ch_user, CURLOPT_SSL_VERIFYPEER, false);
$res_users = curl_exec($ch_user);
$http_users = curl_getinfo($ch_user, CURLINFO_HTTP_CODE);
curl_close($ch_user);

if ($http_users == 200) {
    $lista_usuarios = json_decode($res_users, true);
    foreach ($lista_usuarios as $u) {
        if ($u['id'] == $userId) {
            $usuario_nombre = $u['name'] . " (" . $u['email'] . ")";
            break;
        }
    }
}

// 2. Procesar el formulario de creación del dispositivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear_dispositivo'])) {
    $name = $_POST['name'];
    $uniqueId = $_POST['uniqueId'];
    $phone = $_POST['phone'];
    $model = $_POST['model'];
    $category = $_POST['category'];

    // Estructura JSON requerida por Traccar
    $device_payload = json_encode([
        'name' => $name,
        'uniqueId' => $uniqueId,
        'phone' => $phone,
        'model' => $model,
        'category' => $category
    ]);

    // Paso A: Crear el dispositivo globalmente en Traccar
    $ch_dev = curl_init("$TRACCAR_URL/api/devices");
    curl_setopt($ch_dev, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_dev, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch_dev, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
    curl_setopt($ch_dev, CURLOPT_POST, true);
    curl_setopt($ch_dev, CURLOPT_POSTFIELDS, $device_payload);
    curl_setopt($ch_dev, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch_dev, CURLOPT_SSL_VERIFYPEER, false);

    $res_dev = curl_exec($ch_dev);
    $http_dev = curl_getinfo($ch_dev, CURLINFO_HTTP_CODE);
    curl_close($ch_dev);

    if ($http_dev == 200 || $http_dev == 201) {
        $nuevo_dispositivo = json_decode($res_dev, true);
        $deviceId = $nuevo_dispositivo['id'];

        // Paso B: Vincular los permisos del dispositivo al usuario específico
        $link_payload = json_encode([
            'userId' => $userId,
            'deviceId' => $deviceId
        ]);

        $ch_link = curl_init("$TRACCAR_URL/api/permissions");
        curl_setopt($ch_link, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch_link, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch_link, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
        curl_setopt($ch_link, CURLOPT_POST, true);
        curl_setopt($ch_link, CURLOPT_POSTFIELDS, $link_payload);
        curl_setopt($ch_link, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch_link, CURLOPT_SSL_VERIFYPEER, false);

        $res_link = curl_exec($ch_link);
        $http_link = curl_getinfo($ch_link, CURLINFO_HTTP_CODE);
        curl_close($ch_link);

        if ($http_link == 200 || $http_link == 204) {
            $success_msg = "¡Dispositivo '$name' (IMEI: $uniqueId) añadido y asignado con éxito a $usuario_nombre!";
        } else {
            $error_msg = "Dispositivo creado, pero falló la asignación de permisos al usuario (Código $http_link).";
        }
    } else {
        $error_msg = "Error de API al crear dispositivo ($http_dev): " . htmlspecialchars($res_dev);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Dispositivo - Traccar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f6f9; color: #333; }
        header { background-color: #17a2b8; color: white; padding: 15px 20px; font-size: 20px; font-weight: bold; display: flex; justify-content: space-between; align-items: center;}
        .btn-volver { background-color: #343a40; color: white; border: none; padding: 8px 15px; font-size: 14px; font-weight: bold; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-volver:hover { background-color: #23272b; }
        .container { max-width: 500px; margin: 40px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #17a2b8; border-bottom: 2px solid #f4f6f9; padding-bottom: 10px; font-size: 22px;}
        .user-box { background-color: #e2f0d9; padding: 10px 15px; border-radius: 4px; font-weight: bold; margin-bottom: 20px; font-size: 14px; border-left: 5px solid #28a745; }
        .form-field { margin-bottom: 16px; }
        .form-field label { display: block; margin-bottom: 6px; font-weight: bold; font-size: 14px; color: #555; }
        .form-field input, .form-field select { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        .form-field input:focus, .form-field select:focus { border-color: #17a2b8; outline: none; }
        .btn-submit { width: 100%; background-color: #28a745; color: white; border: none; padding: 12px; font-size: 16px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-top: 10px; transition: background 0.2s; }
        .btn-submit:hover { background-color: #218838; }
        .error-banner { background-color: #dc3545; color: white; padding: 15px; text-align: center; font-weight: bold; border-radius: 4px; margin-bottom: 20px; }
        .success-banner { background-color: #28a745; color: white; padding: 15px; text-align: center; font-weight: bold; border-radius: 4px; margin-bottom: 20px; }
    </style>
</head>
<body>

<header>
    <span>Módulo de Registro de Equipos</span>
    <a href="index.php" class="btn-volver">⬅️ Volver al Mapa</a>
</header>

<div class="container">
    <h2>Nuevo Dispositivo</h2>
    
    <div class="user-box">
        Asignando a: <?php echo htmlspecialchars($usuario_nombre); ?>
    </div>

    <?php if (!empty($error_msg)): ?><div class="error-banner"><?php echo $error_msg; ?></div><?php endif; ?>
    <?php if (!empty($success_msg)): ?><div class="success-banner"><?php echo $success_msg; ?></div><?php endif; ?>

    <form method="POST">
        <div class="form-field">
            <label>Nombre del Dispositivo / Vehículo</label>
            <input type="text" name="name" required placeholder="Ej: Camioneta Placas AAA-123">
        </div>

        <div class="form-field">
            <label>Identificador Único (IMEI o ID de fábrica)</label>
            <input type="text" name="uniqueId" required placeholder="Ej: 869403029485712">
        </div>

        <div class="form-field">
            <label>Número de Teléfono SIM (Opcional)</label>
            <input type="text" name="phone" placeholder="Ej: +593999999999">
        </div>

        <div class="form-field">
            <label>Modelo del GPS (Opcional)</label>
            <input type="text" name="model" placeholder="Ej: Coban TK303G / Sinotrack ST-901">
        </div>

        <div class="form-field">
            <label>Categoría de Ícono</label>
            <select name="category">
                <option value="default">Por Defecto</option>
                <option value="car">Automóvil</option>
                <option value="truck">Camión</option>
                <option value="motorcycle">Motocicleta</option>
                <option value="person">Persona / Portátil</option>
                <option value="animal">Mascota / Animal</option>
            </select>
        </div>

        <button type="submit" name="crear_dispositivo" class="btn-submit">Guardar y Vincular Dispositivo</button>
    </form>
</div>

</body>
</html>