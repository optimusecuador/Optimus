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
$reporte_datos = [];
$buscar = false;
$error_msg = "";

// 1. Obtener los dispositivos vinculados a este usuario
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
    $error_msg = "No se pudieron recuperar los vehículos del usuario.";
}

// 2. Si se envía la consulta de fechas, solicitar la ruta histórica
$deviceIdSelected = isset($_GET['deviceId']) ? intval($_GET['deviceId']) : 0;
$fecha_desde = isset($_GET['desde']) ? $_GET['desde'] : date('Y-m-d\T00:00');
$fecha_hasta = isset($_GET['hasta']) ? $_GET['hasta'] : date('Y-m-d\T23:59');

if (isset($_GET['filtrar']) && $deviceIdSelected > 0) {
    $buscar = true;
    
    // TRACCAR 6.x requiere formato ISO 8601 exacto con milisegundos o la Z limpia. 
    // Aseguramos que vaya en formato UTC puro.
    $from_iso = urlencode(date('Y-m-d\TH:i:s\Z', strtotime($fecha_desde)));
    $to_iso = urlencode(date('Y-m-d\TH:i:s\Z', strtotime($fecha_hasta)));
    
    $url_reporte = "$TRACCAR_URL/api/reports/route?deviceId=$deviceIdSelected&from=$from_iso&to=$to_iso";
    
    $ch_rep = curl_init($url_reporte);
    curl_setopt($ch_rep, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch_rep, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch_rep, CURLOPT_USERPWD, "$TRACCAR_USER:$TRACCAR_PASS");
    curl_setopt($ch_rep, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    curl_setopt($ch_rep, CURLOPT_SSL_VERIFYPEER, false);
    
    $res_rep = curl_exec($ch_rep);
    $http_rep = curl_getinfo($ch_rep, CURLINFO_HTTP_CODE);
    curl_close($ch_rep);
    
    if ($http_rep == 200) {
        $reporte_datos = json_decode($res_rep, true);
    } else {
        $error_msg = "Error al consultar la ruta histórica ($http_rep). Verifique el rango de fechas o los permisos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Recorrido - Traccar</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f6f9; display: flex; flex-direction: column; height: 100vh; }
        header { background-color: #6f42c1; color: white; padding: 12px 20px; font-size: 18px; font-weight: bold; display: flex; justify-content: space-between; align-items: center; }
        .btn-volver { background-color: #343a40; color: white; border: none; padding: 8px 14px; font-size: 13px; font-weight: bold; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-volver:hover { background-color: #23272b; }
        
        .workspace { display: flex; flex: 1; overflow: hidden; }
        .panel-busqueda { width: 340px; background: white; border-right: 1px solid #dee2e6; padding: 15px; overflow-y: auto; display: flex; flex-direction: column; gap: 14px; }
        .panel-busqueda h3 { margin: 0 0 5px 0; color: #6f42c1; font-size: 18px; border-bottom: 2px solid #eee; padding-bottom: 8px;}
        
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group label { font-weight: bold; font-size: 13px; color: #555; }
        .form-group input, .form-group select { padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 13px; }
        
        .btn-filtrar { background-color: #6f42c1; color: white; border: none; padding: 10px; font-size: 14px; font-weight: bold; border-radius: 4px; cursor: pointer; transition: background 0.2s; margin-top: 5px;}
        .btn-filtrar:hover { background-color: #59359a; }
        
        .contenedor-visual { flex: 1; display: flex; flex-direction: column; height: 100%; }
        #map { flex: 1; background-color: #e5e3df; min-height: 400px; }
        
        .panel-tabla { height: 250px; background: white; border-top: 2px solid #dee2e6; overflow-y: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; text-align: left; }
        th { background-color: #f4f6f9; position: sticky; top: 0; color: #333; padding: 10px; border-bottom: 2px solid #dee2e6; }
        td { padding: 9px 10px; border-bottom: 1px solid #eee; }
        tr:hover { background-color: #f9f9f9; }
        
        .error-box { background-color: #dc3545; color: white; padding: 10px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .no-data { text-align: center; padding: 30px; color: #777; font-style: italic; font-size: 14px; }
    </style>
</head>
<body>

<header>
    <span>📊 Módulo de Historial Gráfico y Escrito</span>
    <a href="index.php" class="btn-volver">⬅️ Regresar al Mapa</a>
</header>

<div class="workspace">
    <div class="panel-busqueda">
        <h3>Filtros de Ruta</h3>
        
        <?php if(!empty($error_msg)): ?>
            <div class="error-box"><?php echo $error_msg; ?></div>
        <?php endif; ?>

        <form method="GET">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            
            <div class="form-group">
                <label>Seleccionar Dispositivo</label>
                <select name="deviceId" required>
                    <option value="">-- Elija un vehículo --</option>
                    <?php foreach ($dispositivos as $dev): ?>
                        <option value="<?php echo $dev['id']; ?>" <?php if($deviceIdSelected == $dev['id']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($dev['name']); ?> [<?php echo htmlspecialchars($dev['uniqueId']); ?>]
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Desde Fecha / Hora</label>
                <input type="datetime-local" name="desde" value="<?php echo htmlspecialchars($fecha_desde); ?>" required>
            </div>

            <div class="form-group">
                <label>Hasta Fecha / Hora</label>
                <input type="datetime-local" name="hasta" value="<?php echo htmlspecialchars($fecha_hasta); ?>" required>
            </div>

            <button type="submit" name="filtrar" class="btn-filtrar">🔍 Buscar Historial</button>
        </form>
    </div>

    <div class="contenedor-visual">
        <div id="map"></div>
        
        <div class="panel-tabla">
            <?php if (!$buscar): ?>
                <p class="no-data">Seleccione un vehículo y rango de tiempo para generar el reporte escrito.</p>
            <?php elseif (empty($reporte_datos)): ?>
                <p class="no-data">❌ No existen registros de geolocalización o movimiento para este dispositivo en las horas seleccionadas.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha y Hora (Dispositivo)</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Velocidad</th>
                            <th>Altitud</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $index = 1;
                        foreach (array_reverse($reporte_datos) as $pos): 
                            $velKmh = ( $pos['speed'] * 1.852 ); 
                            $fechaFormateada = date('d/m/Y H:i:s', strtotime($pos['deviceTime']));
                        ?>
                            <tr>
                                <td><strong><?php echo $index++; ?></strong></td>
                                <td><?php echo $fechaFormateada; ?></td>
                                <td><?php echo number_format($pos['latitude'], 6); ?></td>
                                <td><?php echo number_format($pos['longitude'], 6); ?></td>
                                <td><span style="color: <?php echo $velKmh > 0 ? '#28a745':'#777'; ?>; font-weight:bold;"><?php echo number_format($velKmh, 1); ?> km/h</span></td>
                                <td><?php echo round($pos['altitude']); ?> m</td>
                                <td><?php echo round($pos['course']); ?>°</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Inicializar mapa limpio
    const map = L.map('map').setView([0, 0], 2);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '© OpenStreetMap contributors' }).addTo(map);

    // Inyectar la data histórica de PHP a JavaScript de forma segura
    const datosRuta = <?php echo json_encode($reporte_datos); ?>;

    if (datosRuta && datosRuta.length > 0) {
        let latLngs = [];

        datosRuta.forEach((punto, i) => {
            // Traccar 6.x a veces envía coordenadas vacías o en 0 en reportes corruptos, validamos:
            if(punto.latitude && punto.longitude) {
                const coord = [parseFloat(punto.latitude), parseFloat(punto.longitude)];
                latLngs.push(coord);

                // Marcador especial solo para el inicio (Salida) y el fin (Última parada)
                if (i === 0 || i === datosRuta.length - 1) {
                    const esInicio = (i === 0);
                    const colorTexto = esInicio ? 'green' : 'red';
                    const titulo = esInicio ? '🏁 Punto de Inicio' : '🛑 Última Posición';
                    const fechaPunto = new Date(punto.deviceTime).toLocaleString();
                    const velPunto = (punto.speed * 1.852).toFixed(1);

                    L.marker(coord).addTo(map).bindPopup(`
                        <b style="color:${colorTexto};">${titulo}</b><br>
                        <b>Hora:</b> ${fechaPunto}<br>
                        <b>Velocidad:</b> ${velPunto} km/h
                    `);
                }
            }
        });

        if (latLngs.length > 0) {
            // Dibujar la línea de recorrido en color morado
            const polilinea = L.polyline(latLngs, {
                color: '#6f42c1',
                weight: 4,
                opacity: 0.8
            }).addTo(map);

            // Autoajustar zoom
            map.fitBounds(polilinea.getBounds(), { padding: [40, 40] });
        }

    } else {
        map.setView([0, 0], 2);
    }
</script>
</body>
</html>