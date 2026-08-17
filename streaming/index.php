<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Streaming Móvil</title>
<link rel="stylesheet" href="../css/styles.css" />
<style>
    /* --- ESTILOS OPTIMIZADOS PARA MÓVILES --- */
    body {
        background-color: #0b0f19;
        color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        margin: 0;
        padding: 10px;
    }

    /* --- ESTILO PARA EL LOGOTIPO SUPERIOR --- */
    .app-header {
        display: flex;
        align-items: center;
        padding: 5px 5px 15px 5px;
    }

    .app-logo {
        height: 35px;
        width: auto;
        object-fit: contain;
    }

    .panel-dark {
        background: #111827;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .isp-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 12px;
        color: #f3f4f6;
    }

    /* Contenedores de desplazamiento táctil (Swipe) */
    .mobile-scroll-container {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding-bottom: 10px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }
    .mobile-scroll-container::-webkit-scrollbar {
        display: none;
    }

    /* Tarjetas de películas optimizadas para pantallas pequeñas */
    .movie-card-mobile {
        flex: 0 0 130px;
        max-width: 130px;
        background: #1f2937;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .movie-card-mobile img {
        width: 130px;
        height: 190px;
        object-fit: cover;
    }

    .movie-title-mobile {
        font-size: 11px;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 2px;
    }

    .movie-meta-mobile {
        font-size: 10px;
        color: #9ca3af;
        margin-bottom: 6px;
    }

    /* Botones adaptados al toque (Touch-friendly) */
    .btn-play {
        width: 100%;
        background: #2563eb;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px;
        cursor: pointer;
        font-size: 11px;
        font-weight: bold;
    }

    /* Formularios y Buscadores móviles */
    .search-form {
        display: flex;
        gap: 8px;
        margin-bottom: 15px;
    }

    .clientes-input {
        flex: 1;
        background: #1f2937;
        border: 1px solid #374151;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
    }

    .primary-btn {
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px 14px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    /* Categorías y Géneros superiores en horizontal */
    .categories-bar {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        margin-bottom: 10px;
        padding-bottom: 5px;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }
    .categories-bar::-webkit-scrollbar {
        display: none;
    }
    .category-chip {
        padding: 6px 12px;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        white-space: nowrap;
        font-size: 12px;
        font-weight: 500;
    }

    /* Contador y avisos de paginación o registros */
    .pagination-info {
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination-controls {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 15px;
        align-items: center;
    }

    .pagination-btn {
        background: #1f2937;
        color: white;
        border: 1px solid #374151;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 12px;
        text-decoration: none;
        cursor: pointer;
    }

    .pagination-btn:hover {
        background: #374151;
    }

    .pagination-btn.disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    /* --- ESTILOS PARA LA BURBUJA / MODAL DE DETALLES --- */
    .movie-detail-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.85);
        z-index: 99999;
        justify-content: center;
        align-items: center;
        padding: 15px;
        box-sizing: border-box;
    }

    .movie-detail-content {
        background: #111827;
        width: 100%;
        max-width: 400px;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        border: 1px solid #374151;
        max-height: 90vh;
        overflow-y: auto;
    }

    .detail-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #f3f4f6;
    }

    .detail-overview {
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 15px;
        line-height: 1.4;
        max-height: 100px;
        overflow-y: auto;
    }

    .detail-label {
        font-size: 12px;
        font-weight: bold;
        color: #e5e7eb;
        margin-bottom: 5px;
        display: block;
    }

    .detail-select {
        width: 100%;
        background: #1f2937;
        border: 1px solid #374151;
        color: white;
        padding: 10px;
        border-radius: 8px;
        font-size: 13px;
        margin-bottom: 12px;
        outline: none;
    }

    /* --- MARCA DE AGUA EN REPRODUCTOR (Incrementada un 50% adicional -> 120px) --- */
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
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

// Obtener películas recientes
$recentMovies = fetchJellyfin("$server/Items?IncludeItemTypes=Movie&Recursive=true&SortBy=DateCreated&SortOrder=Descending&Limit=20&Fields=MediaSources,MediaStreams,ProductionYear,Overview,Genres", $apikey);

// Obtener Usuario y Librerías
$userData = fetchJellyfin("$server/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';
$libraries = !empty($userId) ? fetchJellyfin("$server/Users/".$userId."/Views", $apikey) : [];
$libraryId = $_GET['library'] ?? '';
$genreFilter = $_GET['genre'] ?? '';

// Paginación a 200 elementos por página
$limitPerPage = 200;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$startIndex = ($page - 1) * $limitPerPage;

// Lista fija de géneros permitidos
$allowedGenres = [
    'Accion', 'Animacion', 'Aventura', 'Belica', 'Ciencia Ficcion', 
    'Comedia', 'Crimen', 'Documental', 'Drama', 'Familia', 
    'Fantasia', 'Horror', 'Misterio', 'Romance', 'Terror', 'War'
];
?>

<!-- ENCABEZADO CON LOGO -->
<div class="app-header">
    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="app-logo">
</div>

<!-- SECCIÓN: ÚLTIMAS PELÍCULAS -->
<div class="panel-dark">
    <div class="isp-title">Últimas películas</div>
    <div class="mobile-scroll-container">
        <?php
        if(isset($recentMovies['Items'])) {
            foreach($recentMovies['Items'] as $m) {
                $res = "HD";
                $year = $m['ProductionYear'] ?? '----';

                if(isset($m['MediaStreams'])) {
                    foreach($m['MediaStreams'] as $s) {
                        if(($s['Type'] ?? '') == 'Video') {
                            $res = ($s['Width'] >= 3840) ? '4K' : (($s['Width'] >= 1920) ? '1080p' : '720p');
                        }
                    }
                }

                $movieId = $m['Id'];
                $movieName = htmlspecialchars($m['Name'], ENT_QUOTES);
                $movieOverview = htmlspecialchars($m['Overview'] ?? 'No hay resumen disponible.', ENT_QUOTES);

                $audioOptions = '<option value="">Predeterminado</option>';
                $subOptions = '<option value="-1">Desactivados</option>';

                if(isset($m['MediaSources'][0]['MediaStreams'])) {
                    foreach($m['MediaSources'][0]['MediaStreams'] as $stream) {
                        $sType = $stream['Type'] ?? '';
                        $sIndex = $stream['Index'] ?? 0;
                        $sLang = $stream['Language'] ?? $stream['DisplayTitle'] ?? 'Idioma';
                        $sCodec = isset($stream['Codec']) ? strtoupper($stream['Codec']) : '';

                        if($sType === 'Audio') {
                            $audioOptions .= '<option value="'.$sIndex.'">'.$sLang.' ('.$sCodec.')</option>';
                        } else if($sType === 'Subtitle') {
                            $subOptions .= '<option value="'.$sIndex.'">'.$sLang.'</option>';
                        }
                    }
                }

                echo '
                <div class="movie-card-mobile">
                    <div>
                        <img src="'.$server.'/Items/'.$movieId.'/Images/Primary?Format=jpg&MaxWidth=300">
                        <div style="padding: 6px 8px 0 8px;">
                            <div class="movie-title-mobile">'.$movieName.'</div>
                            <div class="movie-meta-mobile">'.$year.' • '.$res.'</div>
                        </div>
                    </div>
                    <div style="padding: 0 8px 8px 8px;">
                        <button class="btn-play" onclick="openMovieDetail(\''.$movieId.'\', \''.$movieName.'\', \''.$movieOverview.'\', `'.base64_encode($audioOptions).'`, `'.base64_encode($subOptions).'`)">▶ Ver</button>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>

<!-- SECCIÓN: BIBLIOTECA COMPLETA -->
<div class="panel-dark">
    <div class="isp-title">Biblioteca Completa</div>

    <!-- Pestañas de librerías -->
    <div class="categories-bar">
        <a href="?" class="category-chip" style="background: <?= (empty($libraryId) && empty($genreFilter)) ? '#2563eb' : '#1f2937' ?>;">Todas</a>
        <?php
        if(isset($libraries['Items'])) {
            foreach($libraries['Items'] as $lib) {
                if (($lib['CollectionType'] ?? 'folder') === 'boxsets') continue;
                $active = ($libraryId == $lib['Id']) ? 'background:#2563eb;' : 'background:#1f2937;';
                echo '<a href="?library='.$lib['Id'].'" class="category-chip" style="'.$active.'">'.$lib['Name'].'</a>';
            }
        }
        ?>
    </div>

    <!-- Pestañas de géneros filtrados -->
    <div class="categories-bar" style="margin-top: 8px;">
        <span style="font-size: 11px; color: #9ca3af; align-self: center; white-space: nowrap;">Género:</span>
        <?php
        foreach($allowedGenres as $gName) {
            $activeGenre = ($genreFilter === $gName) ? 'background:#ea580c;' : 'background:#374151;';
            $libraryParam = !empty($libraryId) ? '&library='.$libraryId : '';
            echo '<a href="?genre='.urlencode($gName).$libraryParam.'" class="category-chip" style="'.$activeGenre.'">'.$gName.'</a>';
        }
        ?>
    </div>

    <!-- Buscador móvil -->
    <form method="GET" class="search-form">
        <?php 
        if(!empty($libraryId)) echo '<input type="hidden" name="library" value="'.$libraryId.'">'; 
        if(!empty($genreFilter)) echo '<input type="hidden" name="genre" value="'.htmlspecialchars($genreFilter).'">'; 
        ?>
        <input type="text" name="search" class="clientes-input" placeholder="Buscar película..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="primary-btn">Buscar</button>
    </form>

    <?php
    // Construir parámetros base para las consultas a la API de Jellyfin
    $baseUrlParams = "Recursive=true&Fields=MediaSources,MediaStreams,ProductionYear,Overview,Genres";
    if(!empty($libraryId)) {
        $baseUrlParams .= "&ParentId=".$libraryId."&IncludeItemTypes=Movie,Series";
    } else {
        $baseUrlParams .= "&IncludeItemTypes=Movie";
    }
    if(!empty($genreFilter)) {
        $baseUrlParams .= "&Genres=".urlencode($genreFilter);
    }
    if(!empty($_GET['search'])) {
        $baseUrlParams .= "&SearchTerm=".urlencode(trim($_GET['search']));
    }

    // Solicitud para obtener el conteo total correcto de registros
    $countUrl = $server."/Items?".$baseUrlParams."&Limit=0";
    $countData = fetchJellyfin($countUrl, $apikey);
    $totalRecords = isset($countData['TotalRecordCount']) ? intval($countData['TotalRecordCount']) : 0;

    // Solicitud paginada para los elementos actuales
    $pagedUrl = $server."/Items?".$baseUrlParams."&StartIndex=".$startIndex."&Limit=".$limitPerPage;
    $bibData = fetchJellyfin($pagedUrl, $apikey);

    $itemsList = $bibData['Items'] ?? [];
    $currentShownCount = count($itemsList);
    
    // Si el conteo total vino en 0 pero la API devolvió elementos, usamos el respaldo del tamaño devuelto
    if ($totalRecords === 0 && $currentShownCount > 0) {
        $totalRecords = isset($bibData['TotalRecordCount']) ? intval($bibData['TotalRecordCount']) : $currentShownCount;
    }

    $endRecord = min($startIndex + $currentShownCount, $totalRecords);
    $startRecord = $totalRecords > 0 ? $startIndex + 1 : 0;
    
    $hasMore = $endRecord < $totalRecords;
    $totalPages = max(1, ceil($totalRecords / $limitPerPage));
    ?>

    <!-- Control de registro e indicación de resultados -->
    <div class="pagination-info">
        <span>Mostrando registros <strong><?= $startRecord ?> - <?= $endRecord ?></strong> de un total de <strong><?= $totalRecords ?></strong></span>
        <?php if($hasMore || $totalPages > 1): ?>
            <span style="color: #3b82f6; font-weight: bold;">Hay más hojas y resultados disponibles ➔</span>
        <?php else: ?>
            <span style="color: #10b981;">Fin de los resultados</span>
        <?php endif; ?>
    </div>

    <!-- Listado de la Biblioteca -->
    <div class="mobile-scroll-container" style="flex-wrap: wrap; justify-content: center; gap: 10px; overflow-x: visible;">
        <?php
        if($currentShownCount > 0) {
            foreach($itemsList as $m) {
                $res = "SD";
                if(isset($m['MediaSources'][0]['MediaStreams'])) {
                    foreach($m['MediaSources'][0]['MediaStreams'] as $stream) {
                        if(($stream['Type'] ?? '') == 'Video') {
                            $w = $stream['Width'] ?? 0;
                            $res = ($w >= 3840) ? "4K" : (($w >= 1920) ? "1080p" : (($w >= 1280) ? "720p" : "SD"));
                            break;
                        }
                    }
                }

                $movieId = $m['Id'];
                $movieName = htmlspecialchars($m['Name'], ENT_QUOTES);
                $movieOverview = htmlspecialchars($m['Overview'] ?? 'No hay resumen disponible.', ENT_QUOTES);
                $year = $m['ProductionYear'] ?? 'N/A';

                $audioOptions = '<option value="">Predeterminado</option>';
                $subOptions = '<option value="-1">Desactivados</option>';

                if(isset($m['MediaSources'][0]['MediaStreams'])) {
                    foreach($m['MediaSources'][0]['MediaStreams'] as $stream) {
                        $sType = $stream['Type'] ?? '';
                        $sIndex = $stream['Index'] ?? 0;
                        $sLang = $stream['Language'] ?? $stream['DisplayTitle'] ?? 'Idioma';
                        $sCodec = isset($stream['Codec']) ? strtoupper($stream['Codec']) : '';

                        if($sType === 'Audio') {
                            $audioOptions .= '<option value="'.$sIndex.'">'.$sLang.' ('.$sCodec.')</option>';
                        } else if($sType === 'Subtitle') {
                            $subOptions .= '<option value="'.$sIndex.'">'.$sLang.'</option>';
                        }
                    }
                }

                $poster = $server."/Items/".$movieId."/Images/Primary?MaxWidth=300";
                echo '
                <div class="movie-card-mobile" style="flex: 0 0 45%; max-width: 48%;">
                    <div>
                        <img src="'.$poster.'" style="width:100%; height:170px;">
                        <div style="padding: 6px 8px 0 8px;">
                            <div class="movie-title-mobile">'.$movieName.'</div>
                            <div class="movie-meta-mobile">'.$year.' • '.$res.'</div>
                        </div>
                    </div>
                    <div style="padding: 0 8px 8px 8px;">
                        <button class="btn-play" onclick="openMovieDetail(\''.$movieId.'\', \''.$movieName.'\', \''.$movieOverview.'\', `'.base64_encode($audioOptions).'`, `'.base64_encode($subOptions).'`)">▶ Ver</button>
                    </div>
                </div>';
            }
        } else {
            echo '<div style="color:#9ca3af; text-align:center; padding:20px; width:100%;">No se encontraron resultados.</div>';
        }
        ?>
    </div>

    <!-- Botones de Navegación / Paginación -->
    <?php if($totalPages > 1): ?>
    <div class="pagination-controls">
        <?php 
        $queryParams = [];
        if(!empty($libraryId)) $queryParams['library'] = $libraryId;
        if(!empty($genreFilter)) $queryParams['genre'] = $genreFilter;
        if(!empty($_GET['search'])) $queryParams['search'] = $_GET['search'];
        
        $prevParams = $queryParams;
        $prevParams['page'] = $page - 1;
        $prevUrl = '?' . http_build_query($prevParams);


        $nextParams = $queryParams;
        $nextParams['page'] = $page + 1;
        $nextUrl = '?' . http_build_query($nextParams);
        ?>

        <a href="<?= $prevUrl ?>" class="pagination-btn <?= ($page <= 1) ? 'disabled' : '' ?>">◀ Anterior</a>
        <span style="font-size: 13px; color: #e5e7eb;">Página <?= $page ?> de <?= $totalPages ?> (Total: <?= $totalRecords ?>)</span>
        <a href="<?= $nextUrl ?>" class="pagination-btn <?= ($page >= $totalPages) ? 'disabled' : '' ?>">Siguiente ➔</a>
    </div>
    <?php endif; ?>
</div>

<!-- BURBUJA / MODAL DE DETALLES Y OPCIONES -->
<div id="movieDetailModal" class="movie-detail-modal">
    <div class="movie-detail-content">
        <div id="modalTitle" class="detail-title">Cargando...</div>
        <div id="modalOverview" class="detail-overview">Cargando sinopsis...</div>

        <label class="detail-label">Idioma de Audio:</label>
        <select id="audioStreamSelect" class="detail-select">
            <option value="">Predeterminado</option>
        </select>

        <label class="detail-label">Subtítulos:</label>
        <select id="subtitleStreamSelect" class="detail-select">
            <option value="-1">Desactivados</option>
        </select>

        <div style="display: flex; gap: 10px; margin-top: 15px;">
            <button onclick="startPlayback()" class="primary-btn" style="flex: 1;">▶ Reproducir</button>
            <button onclick="closeMovieDetail()" style="background: #374151; color: white; border: none; padding: 10px 14px; border-radius: 8px; font-weight: bold; cursor: pointer;">Cancelar</button>
        </div>
    </div>
</div>

<!-- MODAL REPRODUCTOR DE VIDEO HTML5 -->
<div id="moviePlayerModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.98); z-index:999999;">
    <button onclick="closeMoviePlayer()" style="position:absolute; top:15px; right:15px; background:red; color:white; border:none; padding:8px 12px; cursor:pointer; border-radius:6px; z-index:1000000; font-weight:bold;">
        ✖ Cerrar
    </button>
    
    <!-- Contenedor del reproductor con la marca de agua aumentada un 50% extra (120px) -->
    <div style="position:relative; width:100%; height:100%; display:flex; justify-content:center; align-items:center;">
        <video id="moviePlayer" controls autoplay playsinline style="width:100%; height:100%; background:black;"></video>
        <img src="../images/empresa/logo.png" alt="Watermark" class="video-watermark">
    </div>
</div>

<script>
let currentMovieId = '';
const serverUrl = '<?= $server ?>';
const apiKey = '<?= $apikey ?>';

function openMovieDetail(itemId, title, overview, base64Audio, base64Sub) {
    currentMovieId = itemId;
    document.getElementById('modalTitle').innerText = title;
    document.getElementById('modalOverview').innerText = overview;
    
    document.getElementById('audioStreamSelect').innerHTML = atob(base64Audio);
    document.getElementById('subtitleStreamSelect').innerHTML = atob(base64Sub);
    
    document.getElementById('movieDetailModal').style.display = 'flex';
}

function closeMovieDetail() {
    document.getElementById('movieDetailModal').style.display = 'none';
}

function startPlayback() {
    let audioIndex = document.getElementById('audioStreamSelect').value;
    let subIndex = document.getElementById('subtitleStreamSelect').value;

    let player = document.getElementById('moviePlayer');
    
    let streamUrl = `${serverUrl}/Videos/${currentMovieId}/stream.mp4?api_key=${apiKey}`;
    if (audioIndex !== "") {
        streamUrl += `&AudioStreamIndex=${audioIndex}`;
    }
    if (subIndex !== "-1") {
        streamUrl += `&SubtitleStreamIndex=${subIndex}`;
    } else {
        streamUrl += `&SubtitleStreamIndex=-1`;
    }

    closeMovieDetail();

    player.src = streamUrl;
    document.getElementById('moviePlayerModal').style.display = 'block';
    player.load();
    player.play().catch(error => {
        console.log("Autoplay bloqueado o requiere interacción:", error);
    });
}

function closeMoviePlayer() {
    let player = document.getElementById('moviePlayer');
    player.pause();
    player.src = '';
    document.getElementById('moviePlayerModal').style.display = 'none';
}
</script>
</body>
</html>