<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalles de la Película</title>
<link rel="stylesheet" href="../css/styles.css" />

<!-- Shaka Player CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.7.11/controls.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.7.11/shaka-player.ui.min.js"></script>

<style>
    :root {
        --bg-main: #0b0f19;
        --bg-card: #111827;
        --bg-input: #1f2937;
        --text-main: #f3f4f6;
        --text-muted: #9ca3af;
        --primary-color: #2563eb;
        --primary-hover: #1d4ed8;
        --border-color: #374151;
    }

    * { box-sizing: border-box; }

    body {
        background-color: var(--bg-main);
        color: var(--text-main);
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        margin: 0;
        padding: 20px 15px;
        line-height: 1.5;
    }

    .app-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
        max-width: 600px;
        margin: 0 auto;
    }

    .app-logo {
        height: 40px;
        width: auto;
        object-fit: contain;
    }

    .btn-back {
        background: var(--bg-input);
        color: var(--text-main);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        border: 1px solid var(--border-color);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .btn-back:hover {
        background: #374151;
        transform: translateX(-2px);
    }

    .movie-detail-card {
        background: var(--bg-card);
        border-radius: 16px;
        padding: 25px;
        border: 1px solid var(--border-color);
        max-width: 600px;
        margin: 0 auto;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .poster-container {
        position: relative;
        text-align: center;
        margin: 0 auto 20px auto;
        max-width: 260px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.6);
    }

    .poster-container img.poster-img {
        width: 100%;
        display: block;
        transition: transform 0.3s ease;
    }

    .poster-container:hover img.poster-img {
        transform: scale(1.02);
    }

    .watermark-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(17, 24, 39, 0.65);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border-radius: 8px;
        padding: 6px 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
        pointer-events: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 4px 6px rgba(0,0,0,0.2);
    }

    .watermark-badge img {
        height: 24px;
        width: auto;
        object-fit: contain;
        opacity: 0.9;
    }

    .lang-badge {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 100%);
        padding: 20px 10px 10px 10px;
        font-size: 11px;
        font-weight: 700;
        color: #38bdf8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: center;
        z-index: 2;
        pointer-events: none;
    }

    .movie-title {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 6px;
        color: var(--text-main);
        text-align: center;
        letter-spacing: -0.5px;
    }

    .movie-meta {
        font-size: 13px;
        color: var(--text-muted);
        text-align: center;
        margin-bottom: 20px;
        font-weight: 500;
    }

    .detail-label {
        font-size: 13px;
        font-weight: 600;
        color: #e5e7eb;
        margin-bottom: 8px;
        display: block;
    }

    .detail-overview {
        font-size: 14px;
        color: #d1d5db;
        margin-bottom: 20px;
        background: var(--bg-input);
        padding: 15px;
        border-radius: 10px;
        border: 1px solid rgba(255,255,255,0.05);
    }

    .detail-select {
        width: 100%;
        background: var(--bg-input);
        border: 1px solid var(--border-color);
        color: white;
        padding: 12px 15px;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 20px;
        outline: none;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
        transition: border-color 0.2s;
    }

    .detail-select:focus {
        border-color: var(--primary-color);
    }

    .btn-play-big {
        width: 100%;
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 14px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }

    .btn-play-big:hover {
        background: var(--primary-hover);
        box-shadow: 0 6px 15px rgba(37, 99, 235, 0.4);
    }

    .btn-play-big:active {
        transform: scale(0.98);
    }

    @keyframes fadeIn {
        from { opacity: 0; backdrop-filter: blur(0px); }
        to { opacity: 1; backdrop-filter: blur(10px); }
    }

    #moviePlayerModal {
        display: none; 
        position: fixed; 
        top: 0; left: 0; 
        width: 100%; height: 100%; 
        background: rgba(0,0,0,0.98); 
        z-index: 999999;
        animation: fadeIn 0.3s ease-out forwards;
    }

    .btn-close-modal {
        position: absolute; 
        top: 20px; 
        right: 20px; 
        background: rgba(31, 41, 55, 0.7); 
        backdrop-filter: blur(4px);
        color: white; 
        border: 1px solid rgba(255,255,255,0.2); 
        padding: 10px 16px; 
        cursor: pointer; 
        border-radius: 8px; 
        z-index: 1000000; 
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
    }

    .btn-close-modal:hover {
        background: rgba(220, 38, 38, 0.9);
        border-color: rgba(220, 38, 38, 1);
        transform: scale(1.05);
    }

    .video-watermark {
        position: absolute;
        bottom: 60px;
        right: 35px;
        height: 100px;
        width: auto;
        object-fit: contain;
        opacity: 0.6;
        pointer-events: none;
        z-index: 1000001;
        filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.5));
    }
    
    .shaka-video-container {
        width: 100%;
        height: 100%;
    }
</style>
</head>
<body>

<?php
require('../conectar.php');

$resultado = $conexion->query("SELECT api, ip FROM jellyfin LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $apikey = trim($fila['api']);
    $ip_db = trim($fila['ip']);

    $host_limpio = preg_replace('#^https?://#', '', $ip_db);
    if (strpos($host_limpio, ':') !== false) {
        $partes = explode(':', $host_limpio);
        $host_limpio = $partes[0];
    }
    $host_limpio = trim(rtrim($host_limpio, '/'));
    if (empty($host_limpio)) { $host_limpio = "127.0.0.1"; }

    $server = "http://" . $host_limpio . ":30013";
} else {
    echo '<script>alert("No se encontró configuración de Jellyfin."); window.location.href="index.php";</script>';
    exit;
}

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

$movieId = trim($_GET['id'] ?? '');

if (empty($movieId)) {
    echo '<script>alert("No se especificó ninguna película."); window.location.href="index.php";</script>';
    exit;
}

$userData = fetchJellyfin("$server/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';

$movieUrl = !empty($userId) 
    ? "$server/Users/$userId/Items/$movieId" 
    : "$server/Items/$movieId?Fields=MediaSources,MediaStreams,ProductionYear,Overview,Genres";

$movieData = fetchJellyfin($movieUrl, $apikey);

if (!$movieData || !isset($movieData['Id'])) {
    $movieData = fetchJellyfin("$server/Items/$movieId", $apikey);
}

if (!$movieData || !isset($movieData['Id'])) {
    echo '
    <div style="text-align:center; padding: 40px 20px; background: #111827; border-radius: 12px; max-width: 500px; margin: 50px auto; border: 1px solid #374151;">
        <h3 style="color: #ef4444; margin-bottom: 10px;">Error al cargar la película</h3>
        <p style="color: #9ca3af; font-size: 13px;">No se pudo conectar con Jellyfin o el ID de la película no existe.</p>
        <p style="font-size:11px; color:#6b7280; background:#1f2937; padding:8px; border-radius:6px; word-break:break-all;">ID intentado: '.htmlspecialchars($movieId).'</p>
        <a href="index.php" class="btn-back" style="display:inline-block; margin-top:15px; justify-content:center;">◀ Volver al catálogo</a>
    </div>';
    exit;
}

$movieName = htmlspecialchars($movieData['Name'], ENT_QUOTES);
$movieOverview = htmlspecialchars($movieData['Overview'] ?? 'Sin resumen disponible.', ENT_QUOTES);
$year = $movieData['ProductionYear'] ?? '----';
$poster = "$server/Items/$movieId/Images/Primary?MaxWidth=400";

$audioStreams = [];
$subtitleStreams = [];

$mediaSources = $movieData['MediaSources'] ?? [];
$mediaStreams = $mediaSources[0]['MediaStreams'] ?? $movieData['MediaStreams'] ?? [];
$mediaSourceId = $mediaSources[0]['Id'] ?? $movieId;

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

$languages = getLanguages($mediaStreams);

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

<div class="app-header">
    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="app-logo">
    <a href="index.php" class="btn-back">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Volver
    </a>
</div>

<div class="movie-detail-card">
    <div class="poster-container">
        <div class="watermark-badge">
            <img src="../images/empresa/logo.png" alt="Logo">
        </div>
        <img src="<?= $poster ?>" alt="<?= $movieName ?>" class="poster-img">
        <div class="lang-badge"><?= $languages ?></div>
    </div>

    <div class="movie-title"><?= $movieName ?></div>
    <div class="movie-meta"><?= $year ?> &nbsp;•&nbsp; <?= $res ?></div>

    <label class="detail-label">Resumen</label>
    <div class="detail-overview"><?= $movieOverview ?></div>

    <label class="detail-label" for="audioStreamSelect">Idioma de Audio</label>
    <select id="audioStreamSelect" class="detail-select">
        <option value="">Automático (Predeterminado)</option>
        <?php foreach ($audioStreams as $audio): ?>
            <option value="<?= $audio['index'] ?>"><?= htmlspecialchars($audio['label']) ?></option>
        <?php endforeach; ?>
    </select>

    <label class="detail-label" for="subtitleStreamSelect">Subtítulos</label>
    <select id="subtitleStreamSelect" class="detail-select">
        <option value="-1">Desactivados</option>
        <?php foreach ($subtitleStreams as $sub): ?>
            <option value="<?= $sub['index'] ?>"><?= htmlspecialchars($sub['label']) ?></option>
        <?php endforeach; ?>
    </select>

    <button onclick="startPlayback()" class="btn-play-big">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
        Reproducir Película
    </button>
</div>

<!-- REPRODUCTOR DE VIDEO MODAL -->
<div id="moviePlayerModal">
    <button onclick="closeMoviePlayer()" class="btn-close-modal">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        Cerrar
    </button>
    
    <div id="playerWrapper" style="position:relative; width:100%; height:100%; display:flex; justify-content:center; align-items:center; overflow:hidden;">
        <div id="shaka-container" class="shaka-video-container">
            <video id="moviePlayer" controls playsinline autoplay style="width:100%; height:100%; background:black; outline:none;"></video>
        </div>
        <img src="../images/empresa/logo.png" alt="Watermark" class="video-watermark">
    </div>
</div>

<script>
const currentMovieId = '<?= $movieId ?>';
const mediaSourceId = '<?= $mediaSourceId ?>';
const serverUrl = '<?= $server ?>';
const apiKey = '<?= $apikey ?>';

let shakaPlayer = null;
let shakaUI = null;
let isPlayingIntro = false;

function resetVideoElement(video) {
    video.pause();
    video.removeAttribute('src');
    video.load();
}

function requestFullScreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen().catch(err => console.warn("Fullscreen no permitido:", err));
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

function exitFullScreen() {
    if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
        if (document.exitFullscreen) {
            document.exitFullscreen().catch(err => console.warn("Error al salir de Fullscreen:", err));
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}

function startPlayback() {
    const modal = document.getElementById('moviePlayerModal');
    const wrapper = document.getElementById('playerWrapper');
    const video = document.getElementById('moviePlayer');

    modal.style.display = 'block';

    // Activar pantalla completa al hacer clic en reproducir
    requestFullScreen(wrapper);

    if (shakaPlayer) {
        shakaPlayer.destroy().then(() => {
            shakaPlayer = null;
            shakaUI = null;
            playIntroFile(video);
        }).catch(() => {
            shakaPlayer = null;
            playIntroFile(video);
        });
    } else {
        playIntroFile(video);
    }
}

function playIntroFile(video) {
    isPlayingIntro = true;
    resetVideoElement(video);
    
    video.src = '../descripcion/intro.mp4';
    
    video.onended = function() {
        if (isPlayingIntro) {
            isPlayingIntro = false;
            playMainMovie();
        }
    };

    let playPromise = video.play();
    if (playPromise !== undefined) {
        playPromise.catch(error => {
            console.warn("No se pudo reproducir la intro, saltando a la película...", error);
            isPlayingIntro = false;
            playMainMovie();
        });
    }
}

async function initShakaPlayer() {
    if (shakaPlayer) return;
    const video = document.getElementById('moviePlayer');
    const videoContainer = document.getElementById('shaka-container');
    
    shakaPlayer = new shaka.Player(video);
    shakaUI = new shaka.ui.Overlay(shakaPlayer, videoContainer, video);

    shakaPlayer.configure({
        streaming: {
            rebufferingGoal: 2,           
            bufferingGoal: 8,             
            bufferBehind: 10,
            retryParameters: {
                maxAttempts: 3,
                baseDelay: 1000,
                backoffFactor: 1.5
            },
            jumpLargeGaps: true,
            stallEnabled: true
        },
        manifest: {
            retryParameters: {
                maxAttempts: 3
            }
        }
    });

    video.addEventListener('timeupdate', () => {
        if (shakaUI && video.currentTime > 0 && !video.paused) {
            const spinner = videoContainer.querySelector('.shaka-spinner-container');
            if (spinner) spinner.classList.remove('shaka-spinner-container-active');
        }
    });

    shakaPlayer.addEventListener('error', (event) => {
        console.error('Error de Shaka Player:', event.detail);
    });
}

async function playMainMovie() {
    const video = document.getElementById('moviePlayer');
    resetVideoElement(video);
    video.onended = null;

    const audioIndex = document.getElementById('audioStreamSelect').value;
    const subIndex = document.getElementById('subtitleStreamSelect').value;
    const sessionId = Math.random().toString(36).substring(2, 15);

    const streamParams = new URLSearchParams({
        'api_key': apiKey,
        'PlaySessionId': sessionId,
        'MediaSourceId': mediaSourceId,
        'VideoCodec': 'h264',
        'AudioCodec': 'aac',
        'maxStreamingBitrate': '6000000'
    });

    if (audioIndex !== "") streamParams.append('AudioStreamIndex', audioIndex);
    if (subIndex !== "-1") streamParams.append('SubtitleStreamIndex', subIndex);

    const hlsUrl = `${serverUrl}/Videos/${currentMovieId}/master.m3u8?${streamParams.toString()}`;

    await initShakaPlayer();

    try {
        await shakaPlayer.load(hlsUrl);
        await video.play();
    } catch (e) {
        console.warn("Fallo en HLS. Ejecutando fallback MP4...", e);
        
        const directStreamUrl = `${serverUrl}/Videos/${currentMovieId}/stream.mp4?${streamParams.toString()}`;
        video.src = directStreamUrl;
        video.load();
        video.play().catch(err => {
            console.error("Error crítico:", err);
            alert("Error al reproducir la película.");
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.shaka) {
        shaka.polyfill.installAll();
    }
});

function closeMoviePlayer() {
    const video = document.getElementById('moviePlayer');

    // Salir del modo pantalla completa al cerrar el reproductor
    exitFullScreen();

    resetVideoElement(video);
    video.onended = null;
    
    if (shakaPlayer) {
        shakaPlayer.destroy().then(() => {
            shakaPlayer = null;
            shakaUI = null;
        }).catch(() => {
            shakaPlayer = null;
        });
    }
    document.getElementById('moviePlayerModal').style.display = 'none';
}
</script>

</body>
</html>