<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Streaming Móvil y PC</title>
<link rel="stylesheet" href="../css/styles.css" />
<style>
    /* --- RESET Y ESTILOS BASE --- */
    * {
        box-sizing: border-box;
        -webkit-tap-highlight-color: transparent;
    }

    body {
        background-color: #0b0f19;
        color: #fff;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        margin: 0;
        padding: 10px;
        -webkit-user-select: none;
        user-select: none;
    }

    /* Envoltorio principal para PC */
    .app-container {
        max-width: 1400px;
        margin: 0 auto;
        width: 100%;
    }

    /* --- ENCABEZADO Y LOGO --- */
    .app-header {
        display: flex;
        align-items: center;
        padding: 10px 5px 15px 5px;
    }

    .app-logo {
        height: 38px;
        width: auto;
        object-fit: contain;
    }

    /* --- PANELES --- */
    .panel-dark {
        background: #111827;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #1f2937;
    }

    .isp-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 12px;
        color: #f3f4f6;
    }

    /* --- CONTENEDORES HORIZONTALES (Swipe / Scroll) --- */
    .mobile-scroll-container {
        display: flex;
        gap: 12px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding-bottom: 10px;
        -webkit-overflow-scrolling: touch;
    }

    .mobile-scroll-container::-webkit-scrollbar,
    .categories-bar::-webkit-scrollbar {
        height: 6px;
    }
    .mobile-scroll-container::-webkit-scrollbar-track,
    .categories-bar::-webkit-scrollbar-track {
        background: #111827;
        border-radius: 10px;
    }
    .mobile-scroll-container::-webkit-scrollbar-thumb,
    .categories-bar::-webkit-scrollbar-thumb {
        background: #374151;
        border-radius: 10px;
    }

    /* --- MARCA DE AGUA Y SUPERPOSICIONES SOBRE LA PORTADA --- */
    .poster-container {
        position: relative;
        width: 100%;
        overflow: hidden;
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

    /* Badge para mostrar los idiomas en la parte inferior de la portada */
    .lang-badge {
        position: absolute;
        bottom: 6px;
        left: 6px;
        right: 6px;
        background-color: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(2px);
        border-radius: 4px;
        padding: 3px 6px;
        font-size: 9px;
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

    /* BARRA DE PROGRESO "CONTINUAR VIENDO" */
    .progress-bar-bg {
        width: 100%;
        height: 5px;
        background-color: rgba(255, 255, 255, 0.2);
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 3;
    }

    .progress-bar-fill {
        height: 100%;
        background-color: #2563eb;
    }

    /* --- TARJETAS MÓVILES / RECIENTES --- */
    .movie-card-mobile {
        flex: 0 0 130px;
        max-width: 130px;
        background: #1f2937;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .movie-card-mobile:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(0,0,0,0.4);
    }

    .movie-card-mobile img.poster-img {
        width: 100%;
        height: 190px;
        object-fit: cover;
        display: block;
        cursor: pointer;
    }

    .movie-title-mobile {
        font-size: 11px;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 2px;
        color: #f9fafb;
    }

    .movie-meta-mobile {
        font-size: 10px;
        color: #9ca3af;
        margin-bottom: 2px;
    }

    /* --- GRID ADAPTATIVO PARA BIBLIOTECA COMPLETA --- */
    .movies-grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        gap: 12px;
        width: 100%;
        margin-top: 10px;
    }

    .movie-card-grid {
        background: #1f2937;
        border-radius: 8px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .movie-card-grid:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.5);
    }

    .movie-card-grid img.poster-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        cursor: pointer;
    }

    /* --- BUSCADOR Y FORMULARIO --- */
    .search-form {
        display: flex;
        gap: 8px;
        margin-bottom: 15px;
        max-width: 600px;
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

    .clientes-input:focus {
        border-color: #2563eb;
    }

    .primary-btn {
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        cursor: pointer;
        transition: background 0.2s;
    }

    .primary-btn:hover {
        background: #1d4ed8;
    }

    /* --- BARRAS DE CATEGORÍAS Y GÉNEROS --- */
    .categories-bar {
        display: flex;
        gap: 8px;
        overflow-x: auto;
        margin-bottom: 10px;
        padding-bottom: 6px;
        -webkit-overflow-scrolling: touch;
    }

    .category-chip {
        padding: 7px 14px;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        white-space: nowrap;
        font-size: 12px;
        font-weight: 500;
        transition: opacity 0.2s ease;
    }

    .category-chip:hover {
        opacity: 0.85;
    }

    /* --- PAGINACIÓN --- */
    .pagination-info {
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 5px;
    }

    .pagination-controls {
        display: flex;
        justify-content: center;
        gap: 12px;
        margin-top: 20px;
        align-items: center;
    }

    .pagination-btn {
        background: #1f2937;
        color: white;
        border: 1px solid #374151;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 13px;
        text-decoration: none;
        cursor: pointer;
        transition: background 0.2s;
    }

    .pagination-btn:hover {
        background: #374151;
    }

    .pagination-btn.disabled {
        opacity: 0.4;
        pointer-events: none;
    }

    /* --- MEDIA QUERIES PARA PC / TABLET --- */
    @media (min-width: 768px) {
        body {
            padding: 20px;
        }

        .movies-grid-container {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 16px;
        }

        .movie-card-grid img.poster-img {
            height: 240px;
        }

        .movie-card-mobile {
            flex: 0 0 150px;
            max-width: 150px;
        }

        .movie-card-mobile img.poster-img {
            height: 220px;
        }

        .isp-title {
            font-size: 20px;
        }

        .movie-title-mobile {
            font-size: 12px;
        }

        .lang-badge {
            font-size: 10px;
            padding: 4px 8px;
        }
    }
</style>
</head>
<body>

<div class="app-container">

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

// Obtener películas recientes
$recentMovies = fetchJellyfin("$server/Items?IncludeItemTypes=Movie&Recursive=true&SortBy=DateCreated&SortOrder=Descending&Limit=20&Fields=MediaSources,MediaStreams,ProductionYear,Overview,Genres", $apikey);

// Obtener Usuario y Librerías
$userData = fetchJellyfin("$server/Users", $apikey);
$userId = $userData[0]['Id'] ?? '';

// OBTENER CONTENIDO EN PROGRESO (Ruta nativa Resume)
$continueWatching = [];
if (!empty($userId)) {
    $continueWatching = fetchJellyfin("$server/Users/$userId/Items/Resume?Limit=20&MediaTypes=Video&Fields=MediaSources,MediaStreams,ProductionYear,Overview", $apikey);
}

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
                $streams = $m['MediaStreams'] ?? [];

                if(isset($m['MediaStreams'])) {
                    foreach($m['MediaStreams'] as $s) {
                        if(($s['Type'] ?? '') == 'Video') {
                            $res = ($s['Width'] >= 3840) ? '4K' : (($s['Width'] >= 1920) ? '1080p' : '720p');
                        }
                    }
                }

                $movieId = $m['Id'];
                $movieName = htmlspecialchars($m['Name'], ENT_QUOTES);
                $languages = getLanguages($streams);

                echo '
                <div class="movie-card-mobile">
                    <div>
                        <a href="index_sistema.php?id='.$movieId.'" class="poster-container" style="display:block;">
                            <div class="watermark-badge">
                                <img src="../images/empresa/logo.png" alt="Logo">
                            </div>
                            <img src="'.$server.'/Items/'.$movieId.'/Images/Primary?Format=jpg&MaxWidth=300" class="poster-img" alt="'.$movieName.'">
                            <div class="lang-badge">'.$languages.'</div>
                        </a>
                        <div style="padding: 6px 8px 8px 8px;">
                            <div class="movie-title-mobile" title="'.$movieName.'">'.$movieName.'</div>
                            <div class="movie-meta-mobile">'.$year.' • '.$res.'</div>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>

<!-- SECCIÓN: CONTINUAR VIENDO -->
<?php if (!empty($continueWatching['Items'])): ?>
<div class="panel-dark">
    <div class="isp-title">Continuar viendo</div>
    <div class="mobile-scroll-container">
        <?php
        foreach ($continueWatching['Items'] as $cw) {
            $res = "HD";
            $year = $cw['ProductionYear'] ?? '----';
            $streams = $cw['MediaStreams'] ?? ($cw['MediaSources'][0]['MediaStreams'] ?? []);

            if(!empty($streams)) {
                foreach($streams as $s) {
                    if(($s['Type'] ?? '') == 'Video') {
                        $w = $s['Width'] ?? 0;
                        $res = ($w >= 3840) ? '4K' : (($w >= 1920) ? '1080p' : '720p');
                        break;
                    }
                }
            }

            $movieId = $cw['Id'];
            $movieName = htmlspecialchars($cw['Name'], ENT_QUOTES);
            $languages = getLanguages($streams);

            $playedPercent = 0;
            if (isset($cw['UserData']['PlayedPercentage'])) {
                $playedPercent = round($cw['UserData']['PlayedPercentage']);
            } elseif (isset($cw['UserData']['PlaybackPositionTicks']) && isset($cw['RunTimeTicks']) && $cw['RunTimeTicks'] > 0) {
                $playedPercent = round(($cw['UserData']['PlaybackPositionTicks'] / $cw['RunTimeTicks']) * 100);
            }

            echo '
            <div class="movie-card-mobile">

                <div>
                    <a href="index_sistema.php?id='.$movieId.'" class="poster-container" style="display:block;">
                        <div class="watermark-badge">
                            <img src="../images/empresa/logo.png" alt="Logo">
                        </div>
                        <img src="'.$server.'/Items/'.$movieId.'/Images/Primary?Format=jpg&MaxWidth=300" class="poster-img" alt="'.$movieName.'">
                        <div class="lang-badge">'.$languages.'</div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: '.$playedPercent.'%;"></div>
                        </div>
                    </a>
                    <div style="padding: 6px 8px 8px 8px;">
                        <div class="movie-title-mobile" title="'.$movieName.'">'.$movieName.'</div>
                        <div class="movie-meta-mobile">'.$year.' • '.$res.'</div>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>
<?php endif; ?>

<!-- SECCIÓN: BIBLIOTECA COMPLETA -->
<div class="panel-dark">
    <div class="isp-title">Biblioteca Completa</div>

    <!-- Categorías de Librerías -->
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

    <!-- Géneros con recuento dinámico de películas -->
    <div class="categories-bar">
        <span style="font-size: 11px; color: #9ca3af; align-self: center; white-space: nowrap;">Género:</span>
        <?php
        $parentParam = !empty($libraryId) ? "&ParentId=".$libraryId : "";
        foreach($allowedGenres as $gName) {
            // Consulta ligera a la API para obtener únicamente la cantidad por género
            $genreCountUrl = $server . "/Items?Recursive=true&IncludeItemTypes=Movie&Limit=0&Genres=" . urlencode($gName) . $parentParam;
            $genreCountData = fetchJellyfin($genreCountUrl, $apikey);
            $genreCount = $genreCountData['TotalRecordCount'] ?? 0;

            $activeGenre = ($genreFilter === $gName) ? 'background:#ea580c;' : 'background:#374151;';
            $libraryParam = !empty($libraryId) ? '&library='.$libraryId : '';
            echo '<a href="?genre='.urlencode($gName).$libraryParam.'" class="category-chip" style="'.$activeGenre.'">'.$gName.' ('.$genreCount.')</a>';
        }
        ?>
    </div>

    <!-- Buscador -->
    <form method="GET" class="search-form">
        <?php 
        if(!empty($libraryId)) echo '<input type="hidden" name="library" value="'.$libraryId.'">'; 
        if(!empty($genreFilter)) echo '<input type="hidden" name="genre" value="'.htmlspecialchars($genreFilter).'">'; 
        ?>
        <input type="text" name="search" class="clientes-input" placeholder="Buscar película..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <button type="submit" class="primary-btn">Buscar</button>
    </form>

    <?php
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

    $countUrl = $server."/Items?".$baseUrlParams."&Limit=0";
    $countData = fetchJellyfin($countUrl, $apikey);
    $totalRecords = isset($countData['TotalRecordCount']) ? intval($countData['TotalRecordCount']) : 0;

    $pagedUrl = $server."/Items?".$baseUrlParams."&StartIndex=".$startIndex."&Limit=".$limitPerPage;
    $bibData = fetchJellyfin($pagedUrl, $apikey);

    $itemsList = $bibData['Items'] ?? [];
    $currentShownCount = count($itemsList);
    
    if ($totalRecords === 0 && $currentShownCount > 0) {
        $totalRecords = isset($bibData['TotalRecordCount']) ? intval($bibData['TotalRecordCount']) : $currentShownCount;
    }

    $endRecord = min($startIndex + $currentShownCount, $totalRecords);
    $startRecord = $totalRecords > 0 ? $startIndex + 1 : 0;
    
    $hasMore = $endRecord < $totalRecords;
    $totalPages = max(1, ceil($totalRecords / $limitPerPage));
    ?>

    <div class="pagination-info">
        <span>Mostrando registros <strong><?= $startRecord ?> - <?= $endRecord ?></strong> de un total de <strong><?= $totalRecords ?></strong></span>
        <?php if($hasMore || $totalPages > 1): ?>
            <span style="color: #3b82f6; font-weight: bold;">Hay más páginas disponibles ➔</span>
        <?php else: ?>
            <span style="color: #10b981;">Fin de los resultados</span>
        <?php endif; ?>
    </div>

    <!-- LISTADO FLUIDO ADAPTATIVO CON CSS GRID -->
    <div class="movies-grid-container">
        <?php
        if($currentShownCount > 0) {
            foreach($itemsList as $m) {
                $res = "SD";
                $streams = $m['MediaSources'][0]['MediaStreams'] ?? ($m['MediaStreams'] ?? []);

                if(!empty($streams)) {
                    foreach($streams as $stream) {
                        if(($stream['Type'] ?? '') == 'Video') {
                            $w = $stream['Width'] ?? 0;
                            $res = ($w >= 3840) ? "4K" : (($w >= 1920) ? "1080p" : (($w >= 1280) ? "720p" : "SD"));
                            break;
                        }
                    }
                }

                $movieId = $m['Id'];
                $movieName = htmlspecialchars($m['Name'], ENT_QUOTES);
                $year = $m['ProductionYear'] ?? 'N/A';
                $poster = $server."/Items/".$movieId."/Images/Primary?MaxWidth=300";
                $languages = getLanguages($streams);

                echo '
                <div class="movie-card-grid">
                    <div>
                        <a href="index_sistema.php?id='.$movieId.'" class="poster-container" style="display:block;">
                            <div class="watermark-badge">
                                <img src="../images/empresa/logo.png" alt="Logo">
                            </div>
                            <img src="'.$poster.'" class="poster-img" alt="'.$movieName.'">
                            <div class="lang-badge">'.$languages.'</div>
                        </a>
                        <div style="padding: 6px 8px 8px 8px;">
                            <div class="movie-title-mobile" title="'.$movieName.'">'.$movieName.'</div>
                            <div class="movie-meta-mobile">'.$year.' • '.$res.'</div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div style="color:#9ca3af; text-align:center; padding:30px; grid-column: 1 / -1;">No se encontraron resultados.</div>';
        }
        ?>
    </div>

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

</div>

</body>
</html>