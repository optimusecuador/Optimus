<?php
require('../conectar.php');

/* --- 1. CONFIGURACIÓN E INICIALIZACIÓN RÁPIDA --- */
$resultado = $conexion->query("SELECT api, ip FROM jellyfin LIMIT 1");

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $apikey = trim($fila['api']);
} else {
    echo '<script>alert("No se encontró configuración de Jellyfin."); window.location.href="index.php";</script>';
    exit;
}

// Obtener el host actual desde donde navega el usuario de forma optimizada
$clientHost = $_SERVER['HTTP_HOST'];
if (($pos = strpos($clientHost, ':')) !== false) {
    $clientHost = substr($clientHost, 0, $pos);
}

// Detectar si el acceso es público o local (evaluación estricta de subredes)
$es_publico = (
    $clientHost === '100.117.94.55' || 
    (!preg_match('/^(10\.|192\.168\.|127\.|172\.(1[6-9]|2[0-9]|3[0-1])\.)/', $clientHost) && $clientHost !== 'localhost')
);

// Servidor base dinámico para llamadas auxiliares a la API de Jellyfin (Metadatos/Imágenes)
$server = $es_publico ? "http://100.117.35.226:30013" : "http://" . (trim(preg_replace('#^https?://|:\d+.*#', '', $fila['ip'])) ?: "10.9.0.250") . ":30013";

function fetchJellyfin($url, $apiKey) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ["X-Emby-Token: $apiKey", "Accept: application/json"],
        CURLOPT_TIMEOUT => 8,
        CURLOPT_CONNECTTIMEOUT => 3
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function getLanguages($streams) {
    $langs = [];
    if (is_array($streams)) {
        foreach ($streams as $s) {
            if (($s['Type'] ?? '') === 'Audio' && !empty($s['Language'])) {
                $lang = strtoupper(substr($s['Language'], 0, 3));
                if (!in_array($lang, $langs)) $langs[] = $lang;
            }
        }
    }
    return !empty($langs) ? implode(' • ', $langs) : 'UND';
}

$idLocal = trim($_GET['id'] ?? '');

if (empty($idLocal)) {
    echo '<script>alert("No se especificó ninguna película."); window.location.href="index.php";</script>';
    exit;
}

/* --- 2. RECUPERAR DATOS DE LA PELÍCULA DESDE LA BASE DE DATOS LOCAL --- */
$stmt_db = $conexion->prepare("SELECT * FROM peliculas WHERE id_peliculas = ? LIMIT 1");
$stmt_db->bind_param("s", $idLocal);
$stmt_db->execute();
$pelicula_db = $stmt_db->get_result()->fetch_assoc();
$stmt_db->close();

if (!$pelicula_db) {
    echo '<script>alert("La película no existe en la base de datos local."); window.location.href="index.php";</script>';
    exit;
}

$movieId = $pelicula_db['id_peliculas'] ?? $idLocal;
$poster = !empty($pelicula_db['portada_url']) ? $pelicula_db['portada_url'] : "$server/Items/$movieId/Images/Primary?MaxWidth=400";

// Seleccionar la URL de reproducción óptima según el tipo de red (Local vs Público)[cite: 4]
$streamUrlConfigurada = $es_publico ? ($pelicula_db['pelicula_url_publico'] ?? '') : ($pelicula_db['pelicula_url'] ?? '');

// Consulta optimizada a Jellyfin solo para metadatos complementarios en vista de detalles
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
foreach ($mediaStreams as $s) {
    if (($s['Type'] ?? '') == 'Video') {
        $w = $s['Width'] ?? 0;
        $res = ($w >= 3840) ? '4K' : (($w >= 1920) ? '1080p' : (($w >= 1280) ? '720p' : 'SD'));
        break;
    }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detalles de la Película</title>
<link rel="stylesheet" href="../css/styles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.7.11/controls.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/shaka-player/4.7.11/shaka-player.ui.min.js" defer></script>

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
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        margin: 0; padding: 20px 15px; line-height: 1.5;
    }
    .app-header { display: flex; align-items: center; justify-content: space-between; padding-bottom: 20px; max-width: 600px; margin: 0 auto; }
    .app-logo { height: 40px; width: auto; object-fit: contain; }
    .btn-back {
        background: var(--bg-input); color: var(--text-main); text-decoration: none; padding: 8px 16px;
        border-radius: 8px; font-size: 14px; font-weight: 600; border: 1px solid var(--border-color);
        display: flex; align-items: center; gap: 6px; transition: background 0.2s;
    }
    .btn-back:hover { background: #374151; }
    .movie-detail-card {
        background: var(--bg-card); border-radius: 16px; padding: 25px; border: 1px solid var(--border-color);
        max-width: 600px; margin: 0 auto; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    .poster-container { position: relative; text-align: center; margin: 0 auto 20px auto; max-width: 260px; border-radius: 12px; overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.6); }
    .poster-container img.poster-img { width: 100%; display: block; }
    .watermark-badge {
        position: absolute; top: 10px; right: 10px; background: rgba(17, 24, 39, 0.65);
        backdrop-filter: blur(5px); border-radius: 8px; padding: 6px 12px; z-index: 2; pointer-events: none;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .watermark-badge img { height: 24px; width: auto; object-fit: contain; opacity: 0.9; }
    .lang-badge {
        position: absolute; bottom: 0; left: 0; width: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0) 100%);
        padding: 20px 10px 10px 10px; font-size: 11px; font-weight: 700; color: #38bdf8;
        text-transform: uppercase; text-align: center; z-index: 2; pointer-events: none;
    }
    .movie-title { font-size: 24px; font-weight: 800; margin-bottom: 6px; text-align: center; letter-spacing: -0.5px; }
    .movie-meta { font-size: 13px; color: var(--text-muted); text-align: center; margin-bottom: 20px; font-weight: 500; }
    .detail-label { font-size: 13px; font-weight: 600; color: #e5e7eb; margin-bottom: 8px; display: block; }
    .detail-overview { font-size: 14px; color: #d1d5db; margin-bottom: 20px; background: var(--bg-input); padding: 15px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.05); }
    .detail-select {
        width: 100%; background: var(--bg-input); border: 1px solid var(--border-color); color: white;
        padding: 12px 15px; border-radius: 10px; font-size: 14px; margin-bottom: 20px; outline: none; cursor: pointer;
    }
    .btn-play-big {
        width: 100%; background: var(--primary-color); color: white; border: none; padding: 14px;
        border-radius: 10px; font-weight: 700; font-size: 16px; cursor: pointer; display: flex;
        align-items: center; justify-content: center; gap: 10px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
    }
    .btn-play-big:hover { background: var(--primary-hover); }
    #moviePlayerModal {
        display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
        background: rgba(0,0,0,0.98); z-index: 999999;
    }
    .btn-close-modal {
        position: absolute; top: 20px; right: 20px; background: rgba(31, 41, 55, 0.7); 
        backdrop-filter: blur(4px); color: white; border: 1px solid rgba(255,255,255,0.2); 
        padding: 10px 16px; cursor: pointer; border-radius: 8px; z-index: 1000000; font-weight: 600;
        display: flex; align-items: center; gap: 6px;
    }
    .btn-close-modal:hover { background: rgba(220, 38, 38, 0.9); }
    .video-watermark {
        position: absolute; bottom: 60px; right: 35px; height: 100px; width: auto; 
        opacity: 0.6; pointer-events: none; z-index: 1000001;
    }
    .shaka-video-container { width: 100%; height: 100%; }
</style>
</head>
<body>

<div class="app-header">
    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="app-logo">
    <a href="index.php" class="btn-back">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Volver
    </a>
</div>

<div class="movie-detail-card">
    <div class="poster-container">
        <div class="watermark-badge"><img src="../images/empresa/logo.png" alt="Logo"></div>
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
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
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
// URL base de streaming obtenida de la base de datos local (Local o Pública según la conexión detectada)
const baseStreamUrl = '<?= $streamUrlConfigurada ?>';
const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);

let shakaPlayer = null;
let shakaUI = null;
let isPlayingIntro = false;

function resetVideoElement(video) {
    video.pause();
    video.removeAttribute('src');
    video.load();
}

function requestFullScreen(element, videoElement) {
    if (isIOS && videoElement?.webkitEnterFullscreen) {
        videoElement.webkitEnterFullscreen();
        return;
    }
    const requestFn = element.requestFullscreen || element.webkitRequestFullscreen || element.mozRequestFullScreen || element.msRequestFullscreen;
    if (requestFn) requestFn.call(element).catch(err => console.warn("Fullscreen no permitido:", err));
}

function exitFullScreen() {
    if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
        const exitFn = document.exitFullscreen || document.webkitExitFullscreen || document.mozCancelFullScreen || document.msExitFullscreen;
        if (exitFn) exitFn.call(document).catch(err => console.warn("Error al salir de Fullscreen:", err));
    }
}

function startPlayback() {
    const modal = document.getElementById('moviePlayerModal');
    const wrapper = document.getElementById('playerWrapper');
    const video = document.getElementById('moviePlayer');

    modal.style.display = 'block';
    requestFullScreen(wrapper, video);

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
    
    video.onended = () => {
        if (isPlayingIntro) {
            isPlayingIntro = false;
            playMainMovie();
        }
    };

    video.play().catch(error => {
        console.warn("No se pudo reproducir la intro, saltando...", error);
        isPlayingIntro = false;
        playMainMovie();
    });
}

async function initShakaPlayer() {
    if (shakaPlayer) return;
    const video = document.getElementById('moviePlayer');
    const videoContainer = document.getElementById('shaka-container');
    
    shakaPlayer = new shaka.Player(video);
    shakaUI = new shaka.ui.Overlay(shakaPlayer, videoContainer, video);

    shakaPlayer.configure({
        streaming: { rebufferingGoal: 2, bufferingGoal: 8, bufferBehind: 10, jumpLargeGaps: true, stallEnabled: true }
    });
}

async function playMainMovie() {
    const video = document.getElementById('moviePlayer');
    resetVideoElement(video);
    video.onended = null;

    const audioIndex = document.getElementById('audioStreamSelect').value;
    const subIndex = document.getElementById('subtitleStreamSelect').value;
    
    // Construir los parámetros adicionales limpios sobre la URL obtenida de la base de datos
    let streamParams = new URLSearchParams();
    if (audioIndex !== "") streamParams.append('AudioStreamIndex', audioIndex);
    if (subIndex !== "-1") streamParams.append('SubtitleStreamIndex', subIndex);

    let finalVideoUrl = baseStreamUrl;
    const queryString = streamParams.toString();
    if (queryString) {
        finalVideoUrl += (baseStreamUrl.includes('?') ? '&' : '?') + queryString;
    }

    if (isIOS || video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = finalVideoUrl;
        video.load();
        video.play().catch(e => {
            console.error("Error crítico en reproducción:", e);
            alert("Error al reproducir la película.");
        });
    } else {
        await initShakaPlayer();
        try {
            await shakaPlayer.load(finalVideoUrl);
            await video.play();
        } catch (e) {
            console.error("Error crítico con Shaka Player:", e);
            alert("Error al reproducir la película.");
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (window.shaka) shaka.polyfill.installAll();
});

function closeMoviePlayer() {
    const video = document.getElementById('moviePlayer');
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