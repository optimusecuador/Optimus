<?php
// =========================================================================
// SECCIÓN DE VERIFICACIÓN / REGISTRO POR CORREO (AL INICIAR TODO)
// =========================================================================
require('../conectar.php');

// IMPORTAR PHPMAILER USANDO RUTAS RELATIVAS (CON ../ AL INICIO)
require_once '../generar_automatico/PHPMailer/src/Exception.php';
require_once '../generar_automatico/PHPMailer/src/PHPMailer.php';
require_once '../generar_automatico/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Función helper para obtener la IP del cliente (alternativa a MAC en la web)
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'] ?? '';
}

// Intentar recuperar el identificador local guardado en la cookie del navegador
$dispositivoId = $_COOKIE['dispositivo_mac_token'] ?? '';
$verificado = false;
$mensajeAuth = '';

// Si existe un identificador guardado, validar contra la tabla peliculas_usuarios
if (!empty($dispositivoId)) {
    $stmtCheck = $conexion->prepare("SELECT * FROM peliculas_usuarios WHERE identificador = ? AND verificado = 1 LIMIT 1");
    if ($stmtCheck) {
        $stmtCheck->bind_param("s", $dispositivoId);
        $stmtCheck->execute();
        $resCheck = $stmtCheck->get_result();
        if ($resCheck && $resCheck->num_rows > 0) {
            $verificado = true;
        }
        $stmtCheck->close();
    }
}

// Procesar el envío del formulario de registro de correo
if (!$verificado && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_registro_email'])) {
    $correoIngresado = filter_var($_POST['email_registro'] ?? '', FILTER_VALIDATE_EMAIL);
    
    if ($correoIngresado) {
        // --- RECUPERAR CREDENCIALES DE YAHOO Y SERVIDOR DE LA BD ---
        $mailenviar = "";
        $contrasena = "";
        $logo_mail = "";
        
        // Se usa $conexion (variable de conectar.php)
        $sql69 = "SELECT * FROM mail ORDER BY mail ASC";
        $result69 = mysqli_query($conexion, $sql69); 
        if ($result69) {
            while($crow69 = mysqli_fetch_assoc($result69)) {
                $cuentas = $crow69['cuentas'];
                $cuentas2 = substr($cuentas, 2); 
                $cuentastexto = $crow69['ip'].$cuentas2;
                $logo_mail = $crow69['logo']; 
                $mailenviar = $crow69['mail'];
                $contrasena = $crow69['contrasena'];
            }
        }

        // --- DETECCIÓN DINÁMICA DE SERVIDOR (PÚBLICO VS LOCAL) ---
        $clientIP = getClientIP();
        $httpHost = $_SERVER['HTTP_HOST'] ?? '';

        // Validar si la petición proviene de un rango IP privado o si se accedió vía IP local
        if (
            filter_var($clientIP, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false ||
            strpos($httpHost, '10.') === 0 || 
            strpos($httpHost, '192.168.') === 0 || 
            strpos($httpHost, '172.') === 0 ||
            strpos($httpHost, 'localhost') !== false
        ) {
            // Acceso por Red Local / IP Privada
            $ip_servidor = "10.9.0.250";
        } else {
            // Acceso por IP Pública / Dominio Externo
            $ip_servidor = "sistema-ubuntu.netbird.cloud";
        }

        // Generar un token único temporal de verificación
        $tokenVerificacion = bin2hex(random_bytes(16));
        
        // Generar un id temporal para identificar este dispositivo
        if (empty($dispositivoId)) {
            $dispositivoId = 'DEV_' . md5(getClientIP() . $_SERVER['HTTP_USER_AGENT'] . microtime());
            setcookie('dispositivo_mac_token', $dispositivoId, time() + (86400 * 365), "/");
        }

        // --- CORRECCIÓN Y CONSTRUCCIÓN DE LA URL DE VERIFICACIÓN ---
        $dominioHost = $ip_servidor;
        if (!empty($ip_servidor)) {
            $parsedHost = parse_url($ip_servidor, PHP_URL_HOST);
            if ($parsedHost) {
                $dominioHost = $parsedHost;
            } else {
                $dominioHost = preg_replace('#^https?://#', '', strtok($ip_servidor, '/'));
            }
        }

        // Construcción limpia de la URL final
        $linkVerificacion = "http://" . $dominioHost . "/optimus/peliculas/verificacion.php?token=" . urlencode($tokenVerificacion) . "&email=" . urlencode($correoIngresado) . "&mac=" . urlencode($dispositivoId);

        // CONFIGURACIÓN Y ENVÍO MEDIANTE PHPMAILER (SERVICIO YAHOO)
        $mail = new PHPMailer(true);

        try {
            // Configuración Servidor SMTP Yahoo
            $mail->isSMTP();
            $mail->Host       = 'smtp.mail.yahoo.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $mailenviar;                          // Correo extraído de la BD
            $mail->Password   = $contrasena;                          // Contraseña extraída de la BD
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // SSL requerido por Yahoo
            $mail->Port       = 465;                                  // Puerto SSL para Yahoo
            $mail->CharSet    = 'UTF-8';

            // Destinatarios
            $mail->setFrom($mailenviar, 'Streaming App');
            $mail->addAddress($correoIngresado);

            // Contenido del Correo
            $mail->isHTML(true);
            $mail->Subject = 'Verificación de Dispositivo - Streaming';
            
            // Imagen del logo si se recuperó de la BD
            $imgLogoHtml = !empty($logo_mail) ? "<img src='{$logo_mail}' alt='Logo' style='max-height: 50px; margin-bottom: 15px;'><br>" : "";

            $mail->Body    = "
                <div style='font-family: Arial, sans-serif; background-color: #0b0f19; color: #ffffff; padding: 20px; border-radius: 8px;'>
                    {$imgLogoHtml}
                    <h2 style='color: #38bdf8;'>Verificación de Dispositivo</h2>
                    <p>Hola,</p>
                    <p>Para verificar tu dispositivo e ingresar a la plataforma, haz clic en el siguiente botón:</p>
                    <p style='margin: 25px 0;'>
                        <a href='{$linkVerificacion}' style='background-color: #2563eb; color: #ffffff; padding: 12px 20px; text-decoration: none; border-radius: 6px; font-weight: bold;'>Verificar mi Dispositivo</a>
                    </p>
                    <p style='font-size: 12px; color: #9ca3af;'>Si no puedes hacer clic en el botón, copia y pega este enlace en tu navegador:<br>{$linkVerificacion}</p>
                </div>
            ";
            $mail->AltBody = "Hola,\n\nPara verificar tu dispositivo e ingresar a la plataforma, haz clic en el siguiente enlace:\n\n" . $linkVerificacion;

            $mail->send();
            $mensajeAuth = '<div style="background: #065f46; color: #a7f3d0; padding: 12px; border-radius: 8px; margin-bottom: 15px;">Se ha enviado un correo de verificación a <strong>'.htmlspecialchars($correoIngresado).'</strong>. Por favor revisa tu bandeja de entrada o spam y haz clic en el enlace.</div>';
        } catch (Exception $e) {
            $mensajeAuth = '<div style="background: #991b1b; color: #fecaca; padding: 12px; border-radius: 8px; margin-bottom: 15px;">Error al enviar el correo: '.htmlspecialchars($mail->ErrorInfo).'</div>';
        }
    } else {
        $mensajeAuth = '<div style="background: #991b1b; color: #fecaca; padding: 12px; border-radius: 8px; margin-bottom: 15px;">Por favor, ingresa un correo electrónico válido.</div>';
    }
}
?>
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

    .app-container {
        max-width: 1400px;
        margin: 0 auto;
        width: 100%;
    }

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

    .count-badge {
        position: absolute;
        bottom: 28px;
        left: 6px;
        background-color: #ef4444;
        color: #ffffff;
        font-size: 11px;
        font-weight: bold;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 3;
        pointer-events: none;
        box-shadow: 0 2px 6px rgba(0,0,0,0.6);
        border: 1.5px solid #ffffff;
    }

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

<!-- SECCIÓN INICIAL DE VERIFICACIÓN SI EL DISPOSITIVO NO ESTÁ REGISTRADO -->
<?php if (!$verificado): ?>
<div class="panel-dark" style="border: 2px solid #eab308; background: #0f172a;">
    <div class="isp-title" style="color: #facc15; margin-bottom: 8px;">
        ⚠️ Modo Limitado (Dispositivo no verificado)
    </div>
    <p style="font-size: 13px; color: #9ca3af; margin-top: 0; margin-bottom: 15px;">
        Actualmente estás viendo una demo limitada a <strong>50 películas</strong>. Para acceder a todo el catálogo sin restricción, ingresa tu correo y verifica tu dispositivo.
    </p>

    <?= $mensajeAuth ?>

    <form method="POST" action="" class="search-form">
        <input type="hidden" name="action_registro_email" value="1">
        <input type="email" name="email_registro" class="clientes-input" placeholder="Correo Electrónico para verificación..." required style="max-width: 400px;">
        <button type="submit" class="primary-btn">Enviar Verificación</button>
    </form>
</div>
<?php endif; ?>

<?php
/* --- FUNCIÓN DEFINITIVA PARA RUTAS DE IMÁGENES MANTENIENDO EL PUERTO ORIGINAL --- */
function fixImageUrl($url) {
    if (empty($url)) return $url;
    
    $clientHost = $_SERVER['HTTP_HOST'];
    if (strpos($clientHost, ':') !== false) {
        $clientHost = explode(':', $clientHost)[0];
    }
    
    $parsed = parse_url($url);
    if (!$parsed || !isset($parsed['host'])) {
        return $url;
    }
    
    $scheme = isset($parsed['scheme']) ? $parsed['scheme'] . '://' : 'http://';
    $port = isset($parsed['port']) ? ':' . $parsed['port'] : '';
    $path = isset($parsed['path']) ? $parsed['path'] : '';
    $query = isset($parsed['query']) ? '?' . $parsed['query'] : '';
    
    return $scheme . $clientHost . $port . $path . $query;
}

/* --- FUNCIÓN PARA AGRUPAR PELÍCULAS DUPLICADAS POR NOMBRE --- */
function groupMoviesByName($moviesArray) {
    $grouped = [];
    foreach ($moviesArray as $movie) {
        $key = mb_strtolower(trim($movie['nombre']));
        if (!isset($grouped[$key])) {
            $grouped[$key] = [
                'main' => $movie,
                'items' => [$movie]
            ];
        } else {
            $grouped[$key]['items'][] = $movie;
        }
    }
    return $grouped;
}

/* --- 1. CAPTURA DE FILTROS DE URL --- */
$libraryId = $_GET['library'] ?? '';
$genreFilter = $_GET['genre'] ?? '';
$langFilter = $_GET['lang'] ?? '';
$searchTerm = $_GET['search'] ?? '';
$collectionFilter = $_GET['collection'] ?? '';
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

// CONTROL DE LÍMITE DE PELÍCULAS SEGÚN VERIFICACIÓN
$limitPerPage = $verificado ? 200 : 50; 
$startIndex = 0;

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

if (!empty($collectionFilter) && $collectionFilter !== 'all') {
    $whereClauses[] = "colecciones LIKE ?";
    $params[] = "%" . $collectionFilter . "%";
    $types .= "s";
} elseif ($collectionFilter === 'all') {
    $whereClauses[] = "colecciones IS NOT NULL AND colecciones != ''";
}

$sqlWhereString = implode(" AND ", $whereClauses);

/* --- 4. OBTENER PELÍCULAS PARA SEGUIR VIENDO --- */
$continueWatchingMovies = [];
$limitContinue = $verificado ? 20 : 5;
$resContinue = $conexion->query("SELECT * FROM peliculas WHERE CAST(reproduccion AS UNSIGNED) > 0 ORDER BY CAST(reproduccion AS UNSIGNED) DESC LIMIT " . $limitContinue);
if ($resContinue) {
    while ($rowC = $resContinue->fetch_assoc()) {
        $continueWatchingMovies[] = $rowC;
    }
}

/* --- 5. OBTENER PELÍCULAS RECIENTES --- */
$recentMovies = [];
$limitRecent = $verificado ? 20 : 10;
$resRecent = $conexion->query("SELECT * FROM peliculas ORDER BY RAND() LIMIT " . $limitRecent);
if ($resRecent) {
    while ($row = $resRecent->fetch_assoc()) {
        $recentMovies[] = $row;
    }
}

/* --- 6. MANEJO ESPECIAL DE MODO VISTA DE COLECCIONES --- */
$isCollectionView = ($collectionFilter === 'all');
$collectionsListGrouped = [];

if ($isCollectionView) {
    $sqlCols = "SELECT * FROM peliculas WHERE colecciones IS NOT NULL AND colecciones != '' ORDER BY id_peliculas DESC";
    $resCols = $conexion->query($sqlCols);
    if ($resCols) {
        while ($cRow = $resCols->fetch_assoc()) {
            $rawCols = explode(',', $cRow['colecciones']);
            foreach ($rawCols as $colName) {
                $cName = trim($colName);
                if (!empty($cName)) {
                    if (!isset($collectionsListGrouped[$cName])) {
                        $collectionsListGrouped[$cName] = [
                            'nombre_coleccion' => $cName,
                            'main' => $cRow,
                            'count' => 0,
                            'peliculas' => []
                        ];
                    }
                    $collectionsListGrouped[$cName]['count']++;
                    $collectionsListGrouped[$cName]['peliculas'][] = $cRow;
                }
            }
        }
    }
    
    // Si no está verificado, limitar también el total de colecciones mostradas
    if (!$verificado) {
        $collectionsListGrouped = array_slice($collectionsListGrouped, 0, 50, true);
    }
    
    $totalRecords = count($collectionsListGrouped);
    $totalPages = 1;
    $startIndex = 0;
} else {
    /* --- 7. CONTAR Y OBTENER RESULTADOS PAGINADOS --- */
    $countSql = "SELECT COUNT(*) as total FROM peliculas WHERE " . $sqlWhereString;
    $stmtCount = $conexion->prepare($countSql);
    if (!empty($params)) {
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $rawTotal = $stmtCount->get_result()->fetch_assoc()['total'] ?? 0;
    $stmtCount->close();

    // Restringir el máximo total de registros según el estado de verificación
    $totalRecords = $verificado ? $rawTotal : min(50, $rawTotal);

    $totalPages = max(1, ceil($totalRecords / $limitPerPage));
    $page = min($page, $totalPages);
    $startIndex = ($page - 1) * $limitPerPage;

    /* --- OBTENER LISTADO PAGINADO DE LA BIBLIOTECA --- */
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
}

$currentShownCount = $isCollectionView ? count($collectionsListGrouped) : count($itemsList);
$endRecord = min($startIndex + $limitPerPage, $totalRecords);
$startRecord = $totalRecords > 0 ? $startIndex + 1 : 0;

$queryParamsNav = [];
if(!empty($libraryId)) $queryParamsNav['library'] = $libraryId;
if(!empty($genreFilter)) $queryParamsNav['genre'] = $genreFilter;
if(!empty($langFilter)) $queryParamsNav['lang'] = $langFilter;
if(!empty($searchTerm)) $queryParamsNav['search'] = $searchTerm;
if(!empty($collectionFilter)) $queryParamsNav['collection'] = $collectionFilter;

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
    <div class="isp-title">
        <?php 
        if (!empty($collectionFilter) && $collectionFilter !== 'all') {
            echo 'Colección: ' . htmlspecialchars($collectionFilter);
        } elseif ($isCollectionView) {
            echo 'Todas las Colecciones';
        } else {
            echo 'Biblioteca Completa';
        }
        ?>
    </div>

    <!-- Categorías de Librerías y Colecciones -->
    <div class="categories-bar">
        <?php 
        $langParam = !empty($langFilter) ? '&lang='.urlencode($langFilter) : '';
        $isAllActive = empty($libraryId) && empty($collectionFilter);
        $isColActive = ($collectionFilter === 'all');
        ?>
        <a href="?<?= !empty($langFilter) ? 'lang='.urlencode($langFilter) : '' ?>" class="category-chip" style="<?= $isAllActive ? 'background:#2563eb;' : 'background:#1f2937;' ?>">Todas</a>
        
        <a href="?collection=all<?= $langParam ?>" class="category-chip" style="<?= $isColActive ? 'background:#8b5cf6;' : 'background:#4c1d95;' ?>">Colecciones</a>

        <?php
        foreach($libraries as $libCat) {
            $active = ($libraryId == $libCat && empty($collectionFilter)) ? 'background:#2563eb;' : 'background:#1f2937;';
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
        if(!empty($collectionFilter)) echo '<input type="hidden" name="collection" value="'.htmlspecialchars($collectionFilter).'">'; 
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
            $groupedContinue = groupMoviesByName($continueWatchingMovies);
            foreach($groupedContinue as $group) {
                $m = $group['main'];
                $count = count($group['items']);
                $allIds = implode(',', array_column($group['items'], 'id_peliculas'));
                
                $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                $year = htmlspecialchars($m['fecha'] ?: '----', ENT_QUOTES);
                $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

                $urlParams = 'id='.$movieId;
                if ($count > 1) {
                    $urlParams .= '&ids='.urlencode($allIds);
                }

                $countBadgeHtml = ($count > 1) ? '<div class="count-badge">'.$count.'</div>' : '';

                echo '
                <div class="movie-card-mobile">
                    <div>
                        <a href="index_sistema.php?'.$urlParams.'" class="poster-container" style="display:block;">
                            <div class="watermark-badge">
                                <img src="../images/empresa/logo.png" alt="Logo">
                            </div>
                            <img src="'.$poster.'" class="poster-img" alt="'.$movieName.'">
                            '.$countBadgeHtml.'
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
            $groupedRecent = groupMoviesByName($recentMovies);
            foreach($groupedRecent as $group) {
                $m = $group['main'];
                $count = count($group['items']);
                $allIds = implode(',', array_column($group['items'], 'id_peliculas'));

                $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                $year = htmlspecialchars($m['fecha'] ?: '----', ENT_QUOTES);
                $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

                $urlParams = 'id='.$movieId;
                if ($count > 1) {
                    $urlParams .= '&ids='.urlencode($allIds);
                }

                $countBadgeHtml = ($count > 1) ? '<div class="count-badge">'.$count.'</div>' : '';

                echo '
                <div class="movie-card-mobile">
                    <div>
                        <a href="index_sistema.php?'.$urlParams.'" class="poster-container" style="display:block;">
                            <div class="watermark-badge">
                                <img src="../images/empresa/logo.png" alt="Logo">
                            </div>
                            <img src="'.$poster.'" class="poster-img" alt="'.$movieName.'">
                            '.$countBadgeHtml.'
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
        <span>Mostrando registros <strong><?= $startRecord ?> - <?= $endRecord ?></strong> de un total de <strong><?= $totalRecords ?></strong> <?= !$verificado ? '(Límite sin verificación)' : '' ?></span>
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
        if ($isCollectionView) {
            if (!empty($collectionsListGrouped)) {
                foreach ($collectionsListGrouped as $colGroup) {
                    $cName = htmlspecialchars($colGroup['nombre_coleccion'], ENT_QUOTES);
                    $m = $colGroup['main'];
                    $count = $colGroup['count'];
                    $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);

                    echo '
                    <div class="movie-card-grid">
                        <div>
                            <a href="?collection='.urlencode($colGroup['nombre_coleccion']).'" class="poster-container" style="display:block;">
                                <div class="watermark-badge">
                                    <img src="../images/empresa/logo.png" alt="Logo">
                                </div>
                                <img src="'.$poster.'" class="poster-img" alt="'.$cName.'">
                                <div class="count-badge">'.$count.'</div>
                                <div class="lang-badge">Colección</div>
                            </a>
                            <div style="padding: 6px 8px 8px 8px;">
                                <div class="movie-title-mobile" title="'.$cName.'">'.$cName.'</div>
                                <div class="movie-meta-mobile">'.$count.' películas</div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<div style="color:#9ca3af; text-align:center; padding:30px; grid-column: 1 / -1;">No hay colecciones disponibles.</div>';
            }
        } else {
            if ($currentShownCount > 0) {
                $groupedItems = groupMoviesByName($itemsList);
                foreach ($groupedItems as $group) {
                    $m = $group['main'];
                    $count = count($group['items']);
                    $allIds = implode(',', array_column($group['items'], 'id_peliculas'));

                    $movieId = htmlspecialchars($m['id_peliculas'], ENT_QUOTES);
                    $movieName = htmlspecialchars($m['nombre'], ENT_QUOTES);
                    $year = htmlspecialchars($m['fecha'] ?: 'N/A', ENT_QUOTES);
                    $poster = htmlspecialchars(fixImageUrl($m['portada_url']), ENT_QUOTES);
                    $languages = htmlspecialchars($m['audio'] ?: 'Desconocido', ENT_QUOTES);

                    $urlParams = 'id='.$movieId;
                    if ($count > 1) {
                        $urlParams .= '&ids='.urlencode($allIds);
                    }

                    $countBadgeHtml = ($count > 1) ? '<div class="count-badge">'.$count.'</div>' : '';

                    echo '
                    <div class="movie-card-grid">
                        <div>
                            <a href="index_sistema.php?'.$urlParams.'" class="poster-container" style="display:block;">
                                <div class="watermark-badge">
                                    <img src="../images/empresa/logo.png" alt="Logo">
                                </div>
                                <img src="'.$poster.'" class="poster-img" alt="'.$movieName.'">
                                '.$countBadgeHtml.'
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