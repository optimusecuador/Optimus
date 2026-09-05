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

    .panel-sub {
        background: #161e2e;
        border-radius: 10px;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #243044;
    }

    .isp-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 12px;
        color: #f3f4f6;
    }

    .isp-subtitle {
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #e5e7eb;
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
        background-color: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(2px);
        border: 1px solid rgba(255, 255, 255, 0.1);
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
        max-width: 800px;
        flex-wrap: wrap;
    }

    .clientes-input {
        flex: 1;
        min-width: 160px;
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
        margin: 15px 0;
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

/* --- FUNCIÓN DEFINITIVA PARA RUTAS DE IMÁGENES MANTENIENDO EL PUERTO ORIGINAL --- */
function fixImageUrl($url) {
    if (empty($url)) return $url;
    
    // Obtener la IP o Dominio del cliente, descartando el puerto si viniera pegado a $_SERVER['HTTP_HOST']
    $clientHost = $_SERVER['HTTP_HOST'];
    if (strpos($clientHost, ':') !== false) {
        $clientHost = explode(':', $clientHost)[0];
    }
    
    // Analizar la URL guardada en la base de datos (portada_url)
    $parsed = parse_url($url);
    if (!$parsed || !isset($parsed['host'])) {
        return $url; // Devuelve original si no tiene formato válido
    }
    
    $scheme = isset($parsed['scheme']) ? $parsed['scheme'] . '://' : 'http://';
    
    // AQUÍ ESTABA EL ERROR: Necesitamos mantener el puerto original guardado en BD (ej: :30013 o :8096)
    $port = isset($parsed['port']) ? ':' . $parsed['port'] : '';
    
    $path = isset($parsed['path']) ? $parsed['path'] : '';
    $query = isset($parsed['query']) ? '?' . $parsed['query'] : '';
    
    // Ensamblar la URL combinando: Protocolo + IP_DEL_CLIENTE + PUERTO_DE_LA_BD + RUTA
    return $scheme . $clientHost . $port . $path . $query;
}

/* --- 1. CAPTURA DE FILTROS DE URL --- */
$libraryId = $_GET['library'] ?? '';
$genreFilter = $_GET['genre'] ?? '';
$langFilter = $_GET['lang'] ?? '';
$searchTerm = $_GET['search'] ?? '';
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limitPerPage = 200;

/* --- 2. OBTENER LIBRERÍAS / CATEGORÍAS DESDE LA BD --- */
$libraries = [];
$resLib = $conexion->query("SELECT DISTINCT id_categoria FROM peliculas WHERE id_categoria IS NOT NULL AND id_categoria != ''");
if ($resLib) {
    while ($rowLib = $resLib->fetch_assoc()) {
        $libraries[] = $rowLib['id_categoria'];
    }
}

/* --- 3. CONSTRUCCIÓN DE CONSULTA SQL DINÁMICA --- */
$whereClauses = ["1=1"];
$params = [];
$types = "";

if (!empty($libraryId)) {
    $whereClauses[] = "id_categoria = ?";
    $params[] = $libraryId;
    $types .= "s";
}

if (!empty($genreFilter)) {
    $whereClauses[] = "generos LIKE ?";
    $params[] = "%" . $genreFilter . "%";
    $types .= "s";
}

if (!empty($langFilter)) {
    $whereClauses[] = "audio LIKE ?";
    $params[] = "%" . $langFilter . "%";
    $types .= "s";
}

if (!empty($searchTerm)) {
    $whereClauses[] = "nombre LIKE ?";
    $params[] = "%" . $searchTerm . "%";
    $types .= "s";
}

$sqlWhereString = implode(" AND ", $whereClauses);

/* --- 4. OBTENER PELÍCULAS PARA SEGUIR VIENDO (REPRODUCCIÓN > 0) --- */
$continueWatchingMovies = [];
$resContinue = $conexion->query("SELECT * FROM peliculas WHERE CAST(reproduccion AS UNSIGNED) > 0 ORDER BY CAST(reproduccion AS UNSIGNED) DESC LIMIT 20");
if ($resContinue) {
    while ($rowC = $resContinue->fetch_assoc()) {
        $continueWatchingMovies[] = $rowC;
    }
}

/* --- 5. OBTENER PELÍCULAS RECIENTES DE FORMA ALEATORIA --- */
$recentMovies = [];
$resRecent = $conexion->query("SELECT * FROM peliculas ORDER BY RAND() LIMIT 20");
if ($resRecent) {
    while ($row = $resRecent->fetch_assoc()) {
        $recentMovies[] = $row;
    }
}

/* --- 6. CONTAR TOTAL DE REGISTROS PARA PAGINACIÓN --- */
$countSql = "SELECT COUNT(*) as total FROM peliculas WHERE " . $sqlWhereString;
$stmtCount = $conexion->prepare($countSql);
if (!empty($params)) {
    $stmtCount->bind_param($types, ...$params);
}
$stmtCount->execute();
$totalRecords = $stmtCount->get_result()->fetch_assoc()['total'] ?? 0;
$stmtCount->close();

$totalPages = max(1, ceil($totalRecords / $limitPerPage));
$page = min($page, $totalPages);
$startIndex = ($page - 1) * $limitPerPage;

/* --- 7. OBTENER LISTADO PAGINADO DE LA BIBLIOTECA DE FORMA ALEATORIA --- */
$dataSql = "SELECT * FROM peliculas WHERE " . $sqlWhereString . " ORDER BY RAND() LIMIT ?, ?";
$stmtData = $conexion->prepare($dataSql);

$queryParamsData = $params;
$queryParamsData[] = $startIndex;
$queryParamsData[] = $limitPerPage;
$currentTypes = $types . "ii";

$stmtData->bind_param($currentTypes, ...$queryParamsData);
$stmtData->execute();
$resultData = $stmtData->get_result();
$itemsList = [];
while ($row = $resultData->fetch_assoc()) {
    $itemsList[] = $row;
}
$stmtData->close();

$currentShownCount = count($itemsList);
$endRecord = min($startIndex + $limitPerPage, $totalRecords);
$startRecord = $totalRecords > 0 ? $startIndex + 1 : 0;

$queryParamsNav = [];
if(!empty($libraryId)) $queryParamsNav['library'] = $libraryId;
if(!empty($genreFilter)) $queryParamsNav['genre'] = $genreFilter;
if(!empty($langFilter)) $queryParamsNav['lang'] = $langFilter;
if(!empty($searchTerm)) $queryParamsNav['search'] = $searchTerm;

$prevParams = $queryParamsNav;
$prevParams['page'] = $page - 1;
$prevUrl = '?' . http_build_query($prevParams);

$nextParams = $queryParamsNav;
$nextParams['page'] = $page + 1;
$nextUrl = '?' . http_build_query($nextParams);
?>

<div class="app-header">
    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="app-logo">
</div>

<!-- SECCIÓN PRINCIPAL: BIBLIOTECA Y CONTENIDOS -->
<div class="panel-dark">
    <div class="isp-title">Biblioteca Completa</div>

    <!-- Categorías de Librerías -->
    <div class="categories-bar">
        <?php 
        $langParam = !empty($langFilter) ? '&lang='.urlencode($langFilter) : '';
        $isAllActive = empty($libraryId);
        ?>
        <a href="?<?= !empty($langFilter) ? 'lang='.urlencode($langFilter) : '' ?>" class="category-chip" style="<?= $isAllActive ? 'background:#2563eb;' : 'background:#1f2937;' ?>">Todas</a>
        
        <?php
        foreach($libraries as $libCat) {
            $active = ($libraryId == $libCat) ? 'background:#2563eb;' : 'background:#1f2937;';
            echo '<a href="?library='.urlencode($libCat).$langParam.'" class="category-chip" style="'.$active.'">'.htmlspecialchars($libCat).'</a>';
        }
        ?>
    </div>

    <!-- Géneros Fijos -->
    <div class="categories-bar">
        <span style="font-size: 11px; color: #9ca3af; align-self: center; white-space: nowrap;">Género:</span>
        <?php
        $allowedGenres = ['Accion', 'Animacion', 'Aventura', 'Belica', 'Ciencia Ficcion', 'Comedia', 'Crimen', 'Documental', 'Drama', 'Familia', 'Fantasia', 'Horror', 'Misterio', 'Romance', 'Terror', 'War'];
        foreach($allowedGenres as $gName) {
            $activeGenre = ($genreFilter === $gName) ? 'background:#ea580c;' : 'background:#374151;';
            $libraryParam = !empty($libraryId) ? '&library='.urlencode($libraryId) : '';
            echo '<a href="?genre='.urlencode($gName).$libraryParam.$langParam.'" class="category-chip" style="'.$activeGenre.'">'.$gName.'</a>';
        }
        ?>
    </div>

    <!-- Buscador y Selección de Idiomas -->
    <form method="GET" class="search-form">
        <?php 
        if(!empty($libraryId)) echo '<input type="hidden" name="library" value="'.htmlspecialchars($libraryId).'">'; 
        if(!empty($genreFilter)) echo '<input type="hidden" name="genre" value="'.htmlspecialchars($genreFilter).'">'; 
        ?>
        
        <select name="lang" class="clientes-input" onchange="this.form.submit()" style="max-width: 200px;">
            <option value="">Todos los idiomas</option>
            <?php
            $masterLanguages = [
                'Español' => 'Español',
                'Inglés' => 'Inglés',
                'Francés' => 'Francés',
                'Alemán' => 'Alemán',
                'Italiano' => 'Italiano',
                'Portugués' => 'Portugués',
                'Japonés' => 'Japonés',
                'Chino' => 'Chino',
                'Ruso' => 'Ruso',
                'Coreano' => 'Coreano',
                'Catalán' => 'Catalán'
            ];
            foreach ($masterLanguages as $isoCode => $langLabel) {
                $selected = ($langFilter === $isoCode) ? 'selected' : '';
                echo '<option value="'.htmlspecialchars($isoCode).'" '.$selected.'>'.htmlspecialchars($langLabel).'</option>';
            }
            ?>
        </select>

        <input type="text" name="search" class="clientes-input" placeholder="Buscar película..." value="<?= htmlspecialchars($searchTerm) ?>">
        <button type="submit" class="primary-btn">Buscar</button>
    </form>

    <!-- SUB-SECCIÓN: SEGUIR VIENDO -->
    <?php if (!empty($continueWatchingMovies)): ?>
    <div class="panel-sub">
        <div class="isp-subtitle">Seguir viendo</div>
        <div class="mobile-scroll-container">
            <?php
            foreach($continueWatchingMovies as $m) {
                $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                $year = htmlspecialchars($m['fecha'] ?: '----', ENT_QUOTES);
                $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

                echo '
                <div class="movie-card-mobile">
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
                            <div class="movie-meta-mobile">'.$year.'</div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- SUB-SECCIÓN: ÚLTIMAS PELÍCULAS -->
    <div class="panel-sub">
        <div class="isp-subtitle">Últimas películas</div>
        <div class="mobile-scroll-container">
            <?php
            foreach($recentMovies as $m) {
                $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                $year = htmlspecialchars($m['fecha'] ?: '----', ENT_QUOTES);
                $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

                echo '
                <div class="movie-card-mobile">
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
                            <div class="movie-meta-mobile">'.$year.'</div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

    <!-- INFORMACIÓN DE REGISTROS -->
    <div class="pagination-info">
        <span>Mostrando registros <strong><?= $startRecord ?> - <?= $endRecord ?></strong> de un total de <strong><?= $totalRecords ?></strong></span>
        <?php if($page < $totalPages): ?>
            <span style="color: #3b82f6; font-weight: bold;">Página <?= $page ?> de <?= $totalPages ?></span>
        <?php else: ?>
            <span style="color: #10b981;">Fin de los resultados</span>
        <?php endif; ?>
    </div>

    <!-- PAGINACIÓN SUPERIOR -->
    <?php if($totalPages > 1): ?>
    <div class="pagination-controls" style="margin-top: 5px; margin-bottom: 15px;">
        <a href="<?= $prevUrl ?>" class="pagination-btn <?= ($page <= 1) ? 'disabled' : '' ?>">◀ Anterior</a>
        <span style="font-size: 13px; color: #e5e7eb;">Página <?= $page ?> de <?= $totalPages ?></span>
        <a href="<?= $nextUrl ?>" class="pagination-btn <?= ($page >= $totalPages) ? 'disabled' : '' ?>">Siguiente ➔</a>
    </div>
    <?php endif; ?>

    <!-- GRID DE RESULTADOS -->
    <div class="movies-grid-container">
        <?php
        if($currentShownCount > 0) {
            foreach($itemsList as $m) {
                $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                $year = htmlspecialchars($m['fecha'] ?: 'N/A', ENT_QUOTES);
                $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

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
                            <div class="movie-meta-mobile">'.$year.'</div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div style="color:#9ca3af; text-align:center; padding:30px; grid-column: 1 / -1;">No se encontraron resultados para el filtro seleccionado.</div>';
        }
        ?>
    </div>

    <!-- PAGINACIÓN INFERIOR -->
    <?php if($totalPages > 1): ?>
    <div class="pagination-controls" style="margin-top: 25px;">
        <a href="<?= $prevUrl ?>" class="pagination-btn <?= ($page <= 1) ? 'disabled' : '' ?>">◀ Anterior</a>
        <span style="font-size: 13px; color: #e5e7eb;">Página <?= $page ?> de <?= $totalPages ?></span>
        <a href="<?= $nextUrl ?>" class="pagination-btn <?= ($page >= $totalPages) ? 'disabled' : '' ?>">Siguiente ➔</a>
    </div>
    <?php endif; ?>
</div>

</div>

</body>
</html>