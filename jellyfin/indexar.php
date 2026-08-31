<?php
require('../conectar.php');

/* --- 1. CONFIGURACIÓN E INICIALIZACIÓN --- */
$resultado = $conexion->query("SELECT api, ip FROM jellyfin LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $apikey = $fila['api'];
    $ip_db = trim($fila['ip']);

    $host_ping = preg_replace('#^https?://#', '', $ip_db);
    if (strpos($host_ping, ':') !== false) {
        $partes_host = explode(':', $host_ping);
        $host_ping = $partes_host[0];
    }
    $host_ping = rtrim($host_ping, '/');

    $ping_cmd = "ping -c 1 -W 1 " . escapeshellarg($host_ping);
    exec($ping_cmd, $output, $status);

    if ($status === 0) {
        $server = rtrim($ip_db, "/");
    } else {
        $ip_limpia = preg_replace('#^https?://#', '', $ip_db);
        if (strpos($ip_limpia, ':') !== false) {
            $partes_limpias = explode(':', $ip_limpia);
            $ip_limpia = $partes_limpias[0];
        }
        $ip_limpia = rtrim($ip_limpia, '/');
        if (empty($ip_limpia)) { $ip_limpia = "127.0.0.1"; }
        
        $server = "http://" . $ip_limpia . ":30013";
        echo '<script>
            alert("No se puede conectar al equipo Jellyfin. Redirigiendo...");
            window.location.href = "../configuracion/streaming.php";
        </script>';
        exit;
    }
} else {
    echo '<script>
        alert("No se encontró configuración de Jellyfin.");
        window.location.href = "../configuracion/streaming.php";
    </script>';
    exit;
}

$server = "http://" . $server . ":30013";

/* --- FUNCIÓN API --- */
function fetchJellyfin($url, $apiKey) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-Emby-Token: $apiKey"]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120); 
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

/* --- TRADUCCIÓN DE CÓDIGOS ISO --- */
function getLanguageName($code) {
    $c = mb_strtolower(trim($code), 'UTF-8');
    $map = [
        'es' => 'Español', 'spa' => 'Español', 'spanish' => 'Español', 'español' => 'Español', 'espanol' => 'Español', 'castellano' => 'Español', 'lat' => 'Español', 'latam' => 'Español', 'mx' => 'Español', 'es-es' => 'Español', 'es-mx' => 'Español', 'es-la' => 'Español',
        'en' => 'Inglés', 'eng' => 'Inglés', 'english' => 'Inglés', 'inglés' => 'Inglés', 'ingles' => 'Inglés', 'en-us' => 'Inglés', 'en-gb' => 'Inglés', 'en-uk' => 'Inglés',
        'fr' => 'Francés', 'fra' => 'Francés', 'fre' => 'Francés', 'french' => 'Francés', 'francés' => 'Francés', 'frances' => 'Francés', 'français' => 'Francés', 'francais' => 'Francés', 'vf' => 'Francés', 'fr-fr' => 'Francés', 'fr-ca' => 'Francés',
        'de' => 'Alemán', 'deu' => 'Alemán', 'ger' => 'Alemán', 'german' => 'Alemán', 'alemán' => 'Alemán', 'aleman' => 'Alemán', 'deutsch' => 'Alemán',
        'it' => 'Italiano', 'ita' => 'Italiano', 'italian' => 'Italiano', 'italiano' => 'Italiano',
        'pt' => 'Portugués', 'por' => 'Portugués', 'portuguese' => 'Portugués', 'portugués' => 'Portugués', 'portugues' => 'Portugués', 'pt-br' => 'Portugués', 'pt-pt' => 'Portugués',
        'ja' => 'Japonés', 'jpn' => 'Japonés', 'japanese' => 'Japonés', 'japonés' => 'Japonés', 'japones' => 'Japonés',
        'zh' => 'Chino', 'zho' => 'Chino', 'chi' => 'Chino', 'chinese' => 'Chino', 'chino' => 'Chino',
        'ru' => 'Ruso', 'rus' => 'Ruso', 'russian' => 'Ruso', 'ruso' => 'Ruso',
        'ko' => 'Coreano', 'kor' => 'Coreano', 'korean' => 'Coreano', 'coreano' => 'Coreano',
        'cat' => 'Catalán', 'ca' => 'Catalán', 'catalan' => 'Catalán', 'catalán' => 'Catalán'
    ];
    return $map[$c] ?? strtoupper($c);
}

/* --- EXTRACTOR DE STREAMS MULTIMEDIA --- */
function extractStreams($movie) {
    $streams = [];
    if (!empty($movie['MediaStreams']) && is_array($movie['MediaStreams'])) {
        $streams = array_merge($streams, $movie['MediaStreams']);
    }
    if (!empty($movie['MediaSources']) && is_array($movie['MediaSources'])) {
        foreach ($movie['MediaSources'] as $source) {
            if (!empty($source['MediaStreams']) && is_array($source['MediaStreams'])) {
                $streams = array_merge($streams, $source['MediaStreams']);
            }
        }
    }
    return $streams;
}

/* --- OBTENER ETIQUETA DE IDIOMAS --- */
function getLanguages($movie) {
    $streams = extractStreams($movie);
    $langs = [];
    foreach ($streams as $s) {
        if (($s['Type'] ?? '') === 'Audio' && !empty($s['Language'])) {
            $name = getLanguageName($s['Language']);
            if (!in_array($name, $langs)) {
                $langs[] = $name;
            }
        }
    }
    return !empty($langs) ? implode(' • ', $langs) : 'Desconocido';
}

/* --- OBTENER ID DE USUARIO Y LIBRERÍA --- */
$userData = fetchJellyfin("$server/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';
$libraries = !empty($userId) ? fetchJellyfin("$server/Users/".$userId."/Views", $apikey) : [];
$libraryId = '';

if (isset($libraries['Items'])) {
    foreach ($libraries['Items'] as $lib) {
        if (($lib['CollectionType'] ?? '') === 'movies') {
            $libraryId = $lib['Id'];
            break;
        }
    }
    if (empty($libraryId) && isset($libraries['Items'][0])) {
        $libraryId = $libraries['Items'][0]['Id'];
    }
}

/* --- CARGA PAGINADA DESDE JELLYFIN PARA EVITAR CORTES POR LÍMITE --- */
$allMoviesList = [];
$startIndex = 0;
$limitPerBatch = 500;
$totalRecordsFromAPI = 0;

do {
    $queryParams = [
        'Recursive' => 'true',
        'IncludeItemTypes' => 'Movie',
        'Fields' => 'MediaSources,MediaStreams,ProductionYear,Overview,Genres',
        'StartIndex' => $startIndex,
        'Limit' => $limitPerBatch
    ];

    if (!empty($libraryId)) {
        $queryParams['ParentId'] = $libraryId;
    }

    $batchUrl = $server . "/Items?" . http_build_query($queryParams);
    $batchData = fetchJellyfin($batchUrl, $apikey);
    
    $items = $batchData['Items'] ?? [];
    $totalRecordsFromAPI = $batchData['TotalRecordCount'] ?? count($items);

    if (!empty($items)) {
        $allMoviesList = array_merge($allMoviesList, $items);
    }

    $startIndex += $limitPerBatch;

} while ($startIndex < $totalRecordsFromAPI && count($items) > 0);

$sincronizados = 0;

/* --- SINCRONIZACIÓN AUTOMÁTICA Y MASIVA CON LA BASE DE DATOS --- */
if (!empty($allMoviesList)) {
    $sqlSync = "INSERT INTO peliculas (
                    id_peliculas, id_categoria, nombre, descripcion, generos, 
                    fecha, pelicula_url, portada_url, estreno, audio, reproduccion
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    id_categoria = VALUES(id_categoria),
                    nombre = VALUES(nombre),
                    descripcion = VALUES(descripcion),
                    generos = VALUES(generos),
                    fecha = VALUES(fecha),
                    pelicula_url = VALUES(pelicula_url),
                    portada_url = VALUES(portada_url),
                    estreno = VALUES(estreno),
                    audio = VALUES(audio),
                    reproduccion = VALUES(reproduccion)";

    if ($stmt = $conexion->prepare($sqlSync)) {
        foreach ($allMoviesList as $m) {
            $idPel = $m['Id'] ?? '';
            $idCat = $libraryId ?: 'general';
            $nombre = $m['Name'] ?? '';
            $desc = $m['Overview'] ?? '';
            
            $generosArr = $m['Genres'] ?? [];
            $generos = implode(', ', $generosArr);

            $fecha = $m['ProductionYear'] ?? '';
            $estreno = !empty($m['PremiereDate']) ? substr($m['PremiereDate'], 0, 10) : ($fecha ?: '');
            
            $peliculaUrl = $server . "/Items/" . $idPel . "/Download";
            $portadaUrl = $server . "/Items/" . $idPel . "/Images/Primary?Format=jpg&MaxWidth=300";
            
            $audioLangs = getLanguages($m);
            $reproduccion = '0';

            $stmt->bind_param(
                "sssssssssss", 
                $idPel, $idCat, $nombre, $desc, $generos, 
                $fecha, $peliculaUrl, $portadaUrl, $estreno, $audioLangs, $reproduccion
            );
            
            if ($stmt->execute()) {
                $sincronizados++;
            }
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sincronización Completa de Películas</title>
<style>
    body { font-family: Arial, sans-serif; background: #0b0f19; color: #fff; padding: 20px; }
    .container { max-width: 900px; margin: 0 auto; background: #111827; padding: 20px; border-radius: 10px; border: 1px solid #1f2937; }
    h2 { color: #38bdf8; margin-top: 0; }
    .stats { background: #161e2e; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 16px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #374151; }
    th { background: #1f2937; color: #f3f4f6; }
    tr:hover { background: rgba(255, 255, 255, 0.02); }
</style>
</head>
<body>
<div class="container">
    <h2>Sincronización Finalizada</h2>
    <div class="stats">
        Se han procesado y guardado correctamente <strong><?= $sincronizados ?></strong> películas en la base de datos de un total de <strong><?= count($allMoviesList) ?></strong> obtenidas desde Jellyfin.
    </div>

    <h3>Vista previa de registros guardados:</h3>
    <table>
        <thead>
            <tr>
                <th>ID Jellyfin</th>
                <th>Nombre</th>
                <th>Año</th>
                <th>Audio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Muestra los últimos 20 registros procesados en una tabla limpia al finalizar
            $previewItems = array_slice($allMoviesList, -20);
            foreach ($previewItems as $m) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($m['Id'] ?? '') . '</td>';
                echo '<td>' . htmlspecialchars($m['Name'] ?? '') . '</td>';
                echo '<td>' . htmlspecialchars($m['ProductionYear'] ?? 'N/A') . '</td>';
                echo '<td>' . htmlspecialchars(getLanguages($m)) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>