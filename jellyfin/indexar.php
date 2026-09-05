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
        $server_local = rtrim($ip_db, "/");
    } else {
        $ip_limpia = preg_replace('#^https?://#', '', $ip_db);
        if (strpos($ip_limpia, ':') !== false) {
            $partes_limpias = explode(':', $ip_limpia);
            $ip_limpia = $partes_limpias[0];
        }
        $ip_limpia = rtrim($ip_limpia, '/');
        if (empty($ip_limpia)) { $ip_limpia = "127.0.0.1"; }
        
        $server_local = "http://" . $ip_limpia . "}:30013";
        echo '<script>
            alert("No se puede conectar al equipo Jellyfin local. Redirigiendo...");
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

// Servidor Red Interna (extraído de la base de datos o IP local)
$server_local = "http://" . preg_replace('#^https?://#', '', rtrim($server_local, '/'));
if (substr_count($server_local, ':') < 2) {
    $server_local .= ":30013";
}

// Servidor IP Pública fijo solicitado
$server_publico = "http://100.117.35.226:30013";

// Servidor por defecto para consultas API internas de sincronización
$server = $server_local;

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

/* --- OBTENER ETIQUETA DE IDIOMAS (TEXTO PLANO) --- */
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

/* --- OBTENER URLS DE LAS PISTAS DE AUDIO (JSON) --- */
function getAudioTracksJson($movie, $apiKey, $serverBaseUrl) {
    $streams = extractStreams($movie);
    $tracks = [];
    foreach ($streams as $s) {
        if (($s['Type'] ?? '') === 'Audio') {
            $index = $s['Index'] ?? 0;
            $langCode = $s['Language'] ?? '';
            $langName = !empty($langCode) ? getLanguageName($langCode) : 'Desconocido';
            $title = $s['DisplayTitle'] ?? $langName;
            
            $audioUrl = $serverBaseUrl . "/Videos/" . ($movie['Id'] ?? '') . "/stream?AudioStreamIndex=" . $index . "&api_key=" . $apiKey;
            
            $tracks[] = [
                'idioma' => $langName,
                'titulo' => $title,
                'url' => $audioUrl
            ];
        }
    }
    return !empty($tracks) ? json_encode($tracks, JSON_UNESCAPED_UNICODE) : '';
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
        'Fields' => 'MediaSources,MediaStreams,ProductionYear,Overview,Genres,UserData',
        'StartIndex' => $startIndex,
        'Limit' => $limitPerBatch
    ];

    if (!empty($libraryId)) {
        $queryParams['ParentId'] = $libraryId;
    }

    $endpoint = !empty($userId) ? "$server/Users/$userId/Items" : "$server/Items";
    $batchUrl = $endpoint . "?" . http_build_query($queryParams);
    $batchData = fetchJellyfin($batchUrl, $apikey);
    
    $items = $batchData['Items'] ?? [];
    $totalRecordsFromAPI = $batchData['TotalRecordCount'] ?? count($items);

    if (!empty($items)) {
        $allMoviesList = array_merge($allMoviesList, $items);
    }

    $startIndex += $limitPerBatch;

} while ($startIndex < $totalRecordsFromAPI && count($items) > 0);

$sincronizados = 0;
$eliminados = 0;
$idsEnJellyfin = [];

/* --- CREAR CARPETA PARA PORTADAS LOCALES --- */
$directorio_portadas = __DIR__ . '/portada';
if (!is_dir($directorio_portadas)) {
    mkdir($directorio_portadas, 0777, true);
}

/* --- SINCRONIZACIÓN AUTOMÁTICA Y MASIVA CON LA BASE DE DATOS --- */
if (!empty($allMoviesList)) {
    $sqlSync = "INSERT INTO peliculas (
                    id_peliculas, id_categoria, nombre, descripcion, generos, 
                    fecha, pelicula_url, pelicula_url_publico, portada_url, estreno, audio, pelicula_audio, reproduccion
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    id_categoria = VALUES(id_categoria),
                    nombre = VALUES(nombre),
                    descripcion = VALUES(descripcion),
                    generos = VALUES(generos),
                    fecha = VALUES(fecha),
                    pelicula_url = VALUES(pelicula_url),
                    pelicula_url_publico = VALUES(pelicula_url_publico),
                    portada_url = VALUES(portada_url),
                    estreno = VALUES(estreno),
                    audio = VALUES(audio),
                    pelicula_audio = VALUES(pelicula_audio),
                    reproduccion = VALUES(reproduccion)";

    if ($stmt = $conexion->prepare($sqlSync)) {
        foreach ($allMoviesList as $m) {
            $idPel = $m['Id'] ?? '';
            if (empty($idPel)) continue;

            // Guardar ID activo de Jellyfin
            $idsEnJellyfin[] = $idPel;

            $idCat = $libraryId ?: 'general';
            $nombre = $m['Name'] ?? '';
            $desc = $m['Overview'] ?? '';
            
            $generosArr = $m['Genres'] ?? [];
            $generos = implode(', ', $generosArr);

            $fecha = $m['ProductionYear'] ?? '';
            $estreno = !empty($m['PremiereDate']) ? substr($m['PremiereDate'], 0, 10) : ($fecha ?: '');
            
            // --- GESTIÓN DE LA PORTADA LOCAL ---
            $portadaUrlRemota = $server . "/Items/" . $idPel . "/Images/Primary?Format=jpg&MaxWidth=300";
            $nombre_archivo_img = $idPel . ".jpg";
            $ruta_local_absoluta = $directorio_portadas . "/" . $nombre_archivo_img;
            
            if (!file_exists($ruta_local_absoluta)) {
                $ch_img = curl_init($portadaUrlRemota);
                $fp = fopen($ruta_local_absoluta, 'wb');
                curl_setopt($ch_img, CURLOPT_FILE, $fp);
                curl_setopt($ch_img, CURLOPT_HEADER, 0);
                curl_setopt($ch_img, CURLOPT_HTTPHEADER, ["X-Emby-Token: $apikey"]);
                curl_setopt($ch_img, CURLOPT_TIMEOUT, 60);
                curl_exec($ch_img);
                curl_close($ch_img);
                fclose($fp);
            }
            
            $portadaUrl = "portada/" . $nombre_archivo_img;
            
            // --- GESTIÓN DE URLs (INTERNA Y PÚBLICA) ---
            $peliculaUrl = $server_local . "/Items/" . $idPel . "/Download?api_key=" . $apikey;
            $peliculaUrlPublico = $server_publico . "/Items/" . $idPel . "/Download?api_key=" . $apikey;
            
            // --- GESTIÓN DE CAMPOS DE AUDIO ---
            $audioLangs = getLanguages($m);                              
            $peliculaAudio = getAudioTracksJson($m, $apikey, $server_local); 

            // EXTRAER TIEMPO DE REPRODUCCIÓN (SEGUNDOS DE DÓNDE QUEDÓ A MEDIAS)
            $playbackTicks = $m['UserData']['PlaybackPositionTicks'] ?? 0;
            $reproduccionSegundos = intval($playbackTicks / 10000000);
            $reproduccion = (string) $reproduccionSegundos;

            $stmt->bind_param(
                "sssssssssssss", 
                $idPel, $idCat, $nombre, $desc, $generos, 
                $fecha, $peliculaUrl, $peliculaUrlPublico, $portadaUrl, $estreno, $audioLangs, $peliculaAudio, $reproduccion
            );
            
            if ($stmt->execute()) {
                $sincronizados++;
            }
        }
        $stmt->close();
    }

    /* --- BORRAR ELEMENTOS OBSOLETOS QUE YA NO EXISTEN EN JELLYFIN --- */
    if (!empty($idsEnJellyfin)) {
        $placeholders = implode(',', array_fill(0, count($idsEnJellyfin), '?'));
        $types = str_repeat('s', count($idsEnJellyfin));
        
        $sqlDelete = "DELETE FROM peliculas WHERE id_peliculas NOT IN ($placeholders)";
        if ($stmtDel = $conexion->prepare($sqlDelete)) {
            $stmtDel->bind_param($types, ...$idsEnJellyfin);
            $stmtDel->execute();
            $eliminados = $stmtDel->affected_rows;
            $stmtDel->close();
        }
    }
} else {
    // Si la API no retorna ninguna película, se limpian las películas existentes
    $resDelAll = $conexion->query("DELETE FROM peliculas");
    if ($resDelAll) {
        $eliminados = $conexion->affected_rows;
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
    .container { max-width: 1000px; margin: 0 auto; background: #111827; padding: 20px; border-radius: 10px; border: 1px solid #1f2937; }
    h2 { color: #38bdf8; margin-top: 0; }
    .stats { background: #161e2e; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 16px; line-height: 1.6; }
    .highlight-del { color: #f87171; }
    .highlight-add { color: #4ade80; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 13px; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #374151; word-break: break-all; }
    th { background: #1f2937; color: #f3f4f6; }
    tr:hover { background: rgba(255, 255, 255, 0.02); }
</style>
</head>
<body>
<div class="container">
    <h2>Sincronización Finalizada</h2>
    <div class="stats">
        Se han procesado/sincronizado <strong class="highlight-add"><?= $sincronizados ?></strong> películas en la base de datos (obtenidas <?= count($allMoviesList) ?> desde Jellyfin).<br>
        Se han eliminado <strong class="highlight-del"><?= $eliminados ?></strong> películas de la base de datos que ya no existían en Jellyfin.
    </div>

    <h3>Vista previa de registros guardados:</h3>
    <table>
        <thead>
            <tr>
                <th>ID Jellyfin</th>
                <th>Nombre</th>
                <th>URL Interna (`pelicula_url`)</th>
                <th>URL Pública (`pelicula_url_publico`)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $previewItems = array_slice($allMoviesList, -10);
            foreach ($previewItems as $m) {
                $idPel = $m['Id'] ?? '';
                $nombre = $m['Name'] ?? '';
                $urlInt = $server_local . "/Items/" . $idPel . "/Download?api_key=" . $apikey;
                $urlPub = $server_publico . "/Items/" . $idPel . "/Download?api_key=" . $apikey;
                echo '<tr>';
                echo '<td>' . htmlspecialchars($idPel) . '</td>';
                echo '<td>' . htmlspecialchars($nombre) . '</td>';
                echo '<td><small>' . htmlspecialchars($urlInt) . '</small></td>';
                echo '<td><small>' . htmlspecialchars($urlPub) . '</small></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>