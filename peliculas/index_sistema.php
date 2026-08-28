<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalles de la Película</title>
<link rel="stylesheet" href="../css/styles.css" />
<style>
    body {
        background-color: #0b0f19;
        color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        margin: 0;
        padding: 15px;
    }

    .app-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 15px;
    }

    .app-logo {
        height: 35px;
        width: auto;
        object-fit: contain;
    }

    .btn-back {
        background: #1f2937;
        color: #fff;
        text-decoration: none;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: bold;
        border: 1px solid #374151;
    }

    .movie-detail-card {
        background: #111827;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid #374151;
        max-width: 600px;
        margin: 0 auto;
    }

    /* --- MARCA DE AGUA Y SUPERPOSICIONES SOBRE LA PORTADA --- */
    .poster-container {
        position: relative;
        text-align: center;
        margin: 0 auto 15px auto;
        max-width: 250px;
        border-radius: 10px;
        overflow: hidden;
    }

    .poster-container img.poster-img {
        width: 100%;
        max-width: 250px;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        display: block;
    }

    .watermark-badge {
        position: absolute;
        top: 6px;
        right: 6px;
        background-color: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(2px);
        border-radius: 6px;
        padding: 6px 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
        pointer-events: none;
    }

    .watermark-badge img {
        height: 28px;
        width: auto;
        object-fit: contain;
    }

    .lang-badge {
        position: absolute;
        bottom: 6px;
        left: 6px;
        right: 6px;
        background-color: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(2px);
        border-radius: 4px;
        padding: 4px 8px;
        font-size: 10px;
        font-weight: bold;
        color: #38bdf8;
        text-transform: uppercase;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: center;
        z-index: 2;
        pointer-events: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .movie-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #f3f4f6;
        text-align: center;
    }

    .movie-meta {
        font-size: 12px;
        color: #9ca3af;
        text-align: center;
        margin-bottom: 15px;
    }

    .detail-label {
        font-size: 13px;
        font-weight: bold;
        color: #e5e7eb;
        margin-bottom: 5px;
        display: block;
    }

    .detail-overview {
        font-size: 13px;
        color: #d1d5db;
        line-height: 1.5;
        margin-bottom: 20px;
        background: #1f2937;
        padding: 12px;
        border-radius: 8px;
    }

    .detail-select {
        width: 100%;
        background: #1f2937;
        border: 1px solid #374151;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 15px;
        outline: none;
    }

    .btn-play-big {
        width: 100%;
        background: #2563eb;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-play-big:hover {
        background: #1d4ed8;
    }

    /* Marca de Agua para el Reproductor */
    .video-watermark {
        position: absolute;
        bottom: 30px;
        right: 30px;
        height: 120px;
        width: auto;
        object-fit: contain;
        opacity: 0.75;
        pointer-events: none;
        z-index: 1000001;
    }
</style>
</head>
<body>

<?php
require('../conectar.php');

/* --- 1. OBTENER Y LIMPIAR CONFIGURACIÓN DE JELLYFIN --- */
$resultado = $conexion->query("SELECT api, ip FROM jellyfin LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $apikey = trim($fila['api']);
    $ip_db = trim($fila['ip']);

    // Extraer solo la IP o Host sin http, https ni puertos
    $host_limpio = preg_replace('#^https?://#', '', $ip_db);
    if (strpos($host_limpio, ':') !== false) {
        $partes = explode(':', $host_limpio);
        $host_limpio = $partes[0];
    }
    $host_limpio = trim(rtrim($host_limpio, '/'));
    if (empty($host_limpio)) { $host_limpio = "127.0.0.1"; }

    // Construcción limpia de la URL del servidor Jellyfin
    $server = "http://" . $host_limpio . ":30013";
} else {
    echo '<script>alert("No se encontró configuración de Jellyfin."); window.location.href="index.php";</script>';
    exit;
}

/* --- FUNCIÓN API MEJORADA --- */
function fetchJellyfin($url, $apiKey) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "X-Emby-Token: $apiKey",
        "Accept: application/json"
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

/* --- FUNCIÓN AUXILIAR PARA EXTRAER IDIOMAS --- */
function getLanguages($streams) {
    $langs = [];
    if(is_array($streams)) {
        foreach($streams as $s) {
            if(($s['Type'] ?? '') === 'Audio' && !empty($s['Language'])) {
                $lang = strtoupper(substr($s['Language'], 0, 3));
                if(!in_array($lang, $langs)) {
                    $langs[] = $lang;
                }
            }
        }
    }
    return !empty($langs) ? implode(' • ', $langs) : 'UND';
}

// Obtener ID recibido por GET
$movieId = trim($_GET['id'] ?? '');

if (empty($movieId)) {
    echo '<script>alert("No se especificó ninguna película."); window.location.href="index.php";</script>';
    exit;
}

// Obtener el primer Usuario para consultas de Items si es necesario
$userData = fetchJellyfin("$server/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';

// Intentar consultar el item directamente o mediante la ruta de usuario
$movieUrl = !empty($userId) 
    ? "$server/Users/$userId/Items/$movieId" 
    : "$server/Items/$movieId?Fields=MediaSources,MediaStreams,ProductionYear,Overview,Genres";

$movieData = fetchJellyfin($movieUrl, $apikey);

// Si falla la primera solicitud, intentamos con la ruta estándar de Items
if (!$movieData || !isset($movieData['Id'])) {
    $movieData = fetchJellyfin("$server/Items/$movieId", $apikey);
}

// Si sigue fallando, mostrar error detallado
if (!$movieData || !isset($movieData['Id'])) {
    echo '
    <div style="text-align:center; padding: 40px 20px; background: #111827; border-radius: 12px; max-width: 500px; margin: 50px auto; border: 1px solid #374151;">
        <h3 style="color: #ef4444; margin-bottom: 10px;">Error al cargar la película</h3>
        <p style="color: #9ca3af; font-size: 13px;">No se pudo conectar con Jellyfin o el ID de la película no existe.</p>
        <p style="font-size:11px; color:#6b7280; background:#1f2937; padding:8px; border-radius:6px; word-break:break-all;">ID intentado: '.htmlspecialchars($movieId).'</p>
        <a href="index.php" class="btn-back" style="display:inline-block; margin-top:15px;">◀ Volver al catálogo</a>
    </div>';
    exit;
}

$movieName = htmlspecialchars($movieData['Name'], ENT_QUOTES);
$movieOverview = htmlspecialchars($movieData['Overview'] ?? 'Sin resumen disponible.', ENT_QUOTES);
$year = $movieData['ProductionYear'] ?? '----';
$poster = "$server/Items/$movieId/Images/Primary?MaxWidth=400";

// Extraer opciones de Audio y Subtítulos
$audioStreams = [];
$subtitleStreams = [];

$mediaStreams = $movieData['MediaSources'][0]['MediaStreams'] ?? $movieData['MediaStreams'] ?? [];

foreach ($mediaStreams as $stream) {
    $sType = $stream['Type'] ?? '';
    $sIndex = $stream['Index'] ?? 0;
    $sLang = $stream['Language'] ?? $stream['DisplayTitle'] ?? 'Idioma';
    $sCodec = isset($stream['Codec']) ? strtoupper($stream['Codec']) : '';

    if ($sType === 'Audio') {
        $audioStreams[] = ['index' => $sIndex, 'label' => "$sLang ($sCodec)"];
    } else if ($sType === 'Subtitle') {
        $subtitleStreams[] = ['index' => $sIndex, 'label' => $sLang];
    }
}

// Obtener string de idiomas para el distintivo de la portada
$languages = getLanguages($mediaStreams);

// Determinar Resolución
$res = "HD";
if (!empty($mediaStreams)) {
    foreach ($mediaStreams as $s) {
        if (($s['Type'] ?? '') == 'Video') {
            $w = $s['Width'] ?? 0;
            $res = ($w >= 3840) ? '4K' : (($w >= 1920) ? '1080p' : (($w >= 1280) ? '720p' : 'SD'));
            break;
        }
    }
}
?>

<!-- CABECERA -->
<div class="app-header">
    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="app-logo">
    <a href="index.php" class="btn-back">◀ Volver</a>
</div>

<!-- TARJETA DE DETALLES -->
<div class="movie-detail-card">
    <div class="poster-container">
        <div class="watermark-badge">
            <img src="../images/empresa/logo.png" alt="Logo">
        </div>
        <img src="<?= $poster ?>" alt="<?= $movieName ?>" class="poster-img">
        <div class="lang-badge"><?= $languages ?></div>
    </div>

    <div class="movie-title"><?= $movieName ?></div>
    <div class="movie-meta"><?= $year ?> • <?= $res ?></div>

    <label class="detail-label">Resumen:</label>
    <div class="detail-overview"><?= $movieOverview ?></div>

    <!-- SELECCIÓN DE IDIOMA Y SUBTÍTULOS -->
    <label class="detail-label" for="audioStreamSelect">Idioma de Audio:</label>
    <select id="audioStreamSelect" class="detail-select">
        <option value="">Predeterminado</option>
        <?php foreach ($audioStreams as $audio): ?>
            <option value="<?= $audio['index'] ?>"><?= htmlspecialchars($audio['label']) ?></option>
        <?php endforeach; ?>
    </select>

    <label class="detail-label" for="subtitleStreamSelect">Subtítulos:</label>
    <select id="subtitleStreamSelect" class="detail-select">
        <option value="-1">Desactivados</option>
        <?php foreach ($subtitleStreams as $sub): ?>
            <option value="<?= $sub['index'] ?>"><?= htmlspecialchars($sub['label']) ?></option>
        <?php endforeach; ?>
    </select>

    <!-- BOTÓN REPRODUCIR -->
    <button onclick="startPlayback()" class="btn-play-big">▶ Reproducir Película</button>
</div>

<!-- REPRODUCTOR DE VIDEO MODAL -->
<div id="moviePlayerModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.98); z-index:999999;">
    <button onclick="closeMoviePlayer()" style="position:absolute; top:15px; right:15px; background:red; color:white; border:none; padding:8px 12px; cursor:pointer; border-radius:6px; z-index:1000000; font-weight:bold;">
        ✖ Cerrar
    </button>
    
    <div style="position:relative; width:100%; height:100%; display:flex; justify-content:center; align-items:center;">
        <video id="moviePlayer" controls playsinline style="width:100%; height:100%; background:black;"></video>
        <img src="../images/empresa/logo.png" alt="Watermark" class="video-watermark">
    </div>
</div>

<script>
const currentMovieId = '<?= $movieId ?>';
const serverUrl = '<?= $server ?>';
const apiKey = '<?= $apikey ?>';

function startPlayback() {
    let player = document.getElementById('moviePlayer');
    document.getElementById('moviePlayerModal').style.display = 'block';

    // Función para reproducir la película principal
    function playMovie() {
        let audioIndex = document.getElementById('audioStreamSelect').value;
        let subIndex = document.getElementById('subtitleStreamSelect').value;

        let movieStreamUrl = `${serverUrl}/Videos/${currentMovieId}/stream.mp4?api_key=${apiKey}`;
        if (audioIndex !== "") {
            movieStreamUrl += `&AudioStreamIndex=${audioIndex}`;
        }
        if (subIndex !== "-1") {
            movieStreamUrl += `&SubtitleStreamIndex=${subIndex}`;
        } else {
            movieStreamUrl += `&SubtitleStreamIndex=-1`;
        }

        player.onended = null;
        player.onerror = null;
        player.src = movieStreamUrl;
        player.load();
        player.play().catch(e => console.log("Error al reproducir película:", e));
    }

    // Configuración cuando termina o falla la intro
    player.onended = playMovie;
    player.onerror = function() {
        console.warn("No se encontró el archivo ../descripcion/intro.mp4 o falló su reproducción. Pasando a la película.");
        playMovie();
    };

    // Ruta corregida a ../descripcion/intro.mp4
    player.src = '../descripcion/intro.mp4';
    player.load();

    let playPromise = player.play();
    if (playPromise !== undefined) {
        playPromise.catch(error => {
            console.log("Error al iniciar la intro:", error);
            playMovie();
        });
    }
}

function closeMoviePlayer() {
    let player = document.getElementById('moviePlayer');
    player.pause();
    player.onended = null;
    player.onerror = null;
    player.src = '';
    document.getElementById('moviePlayerModal').style.display = 'none';
}
</script>

</body>
</html>