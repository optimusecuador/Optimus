<?php
// =========================================================================
// CONFIGURACIÓN INICIAL
// =========================================================================
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errores_escaneo.log'); 
ini_set('memory_limit', '-1'); 
error_reporting(E_ALL);
set_time_limit(300); // 5 minutos máximo por lote

require_once __DIR__ . '/../conectar.php';

$dir_base = '/var/www/html/ALMACENAMIENTO';
$dir_portadas = realpath(__DIR__ . '/../peliculas') ? realpath(__DIR__ . '/../peliculas') . '/portadas' : __DIR__ . '/../peliculas/portadas';
$carpeta_excluida = 'PRINCIPAL';
$limite_por_lote = 25; // Cantidad de películas a procesar por cada recarga de página

if (!file_exists($dir_portadas)) @mkdir($dir_portadas, 0755, true);
if (!is_dir($dir_base)) die("Error: La ruta '$dir_base' no existe.");

// EXTENSIONES ESTRICTAS DE VIDEO (Cualquier otro archivo será ignorado por completo)
$extensiones_permitidas = ['mp4', 'mkv', 'avi', 'mov', 'wmv', 'flv', 'webm', 'm4v'];

// =========================================================================
// OBTENER CREDENCIALES
// =========================================================================
$tmdb_api_key = ''; $tmdb_bearer_token = ''; $omdb_api_key = ''; 
if (isset($pdo) && $pdo instanceof PDO) {
    $stmt_tmdb = $pdo->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($row_tmdb = $stmt_tmdb->fetch(PDO::FETCH_ASSOC)) { $tmdb_api_key = $row_tmdb['api'] ?? ''; $tmdb_bearer_token = $row_tmdb['token'] ?? ''; }
    $stmt_omdb = $pdo->query("SELECT api FROM omdb LIMIT 1");
    if ($row_omdb = $stmt_omdb->fetch(PDO::FETCH_ASSOC)) { $omdb_api_key = $row_omdb['api'] ?? ''; }
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $res_tmdb = $conn->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($res_tmdb && $row_tmdb = $res_tmdb->fetch_assoc()) { $tmdb_api_key = $row_tmdb['api'] ?? ''; $tmdb_bearer_token = $row_tmdb['token'] ?? ''; }
    $res_omdb = $conn->query("SELECT api FROM omdb LIMIT 1");
    if ($res_omdb && $row_omdb = $res_omdb->fetch_assoc()) { $omdb_api_key = $row_omdb['api'] ?? ''; }
}
if (empty($tmdb_api_key) && empty($tmdb_bearer_token)) die("Error: No se encontraron las credenciales de TMDb.");

// =========================================================================
// FUNCIONES DE APOYO
// =========================================================================
function ejecutarCurl($url, $headers = []) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    if (!empty($headers)) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $res = curl_exec($ch); curl_close($ch); return $res;
}

function descargarImagenDirecta($urlImagen) {
    $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $urlImagen); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); curl_setopt($ch, CURLOPT_TIMEOUT, 8);
    $data = curl_exec($ch); $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
    return ($httpCode === 200 && $data !== false) ? $data : false;
}

function obtenerIdiomasAudio($rutaArchivo) {
    $comando = 'timeout 4 ffprobe -v quiet -print_format json -show_streams -select_streams a ' . escapeshellarg($rutaArchivo);
    $salida = function_exists('shell_exec') ? @shell_exec($comando) : '';
    if (!$salida) { @exec($comando, $output); $salida = !empty($output) ? implode("\n", $output) : ''; }
    if (!$salida) return ['Sin Datos', ''];
    
    $data = json_decode($salida, true);
    if (json_last_error() !== JSON_ERROR_NONE || empty($data['streams'])) return ['Sin Datos', ''];

    $mapaIdiomas = ['spa'=>'Español','es'=>'Español','eng'=>'Inglés','en'=>'Inglés','fre'=>'Francés','fr'=>'Francés','ita'=>'Italiano','it'=>'Italiano','jpn'=>'Japonés','ja'=>'Japonés','por'=>'Portugués','pt'=>'Portugués','ger'=>'Alemán','de'=>'Alemán','und'=>'Desconocido'];
    $idiomasDetectados = []; $urlsAudio = [];

    foreach ($data['streams'] as $index => $stream) {
        $lang = 'und';
        if (isset($stream['tags'])) {
            $tagsLower = array_change_key_case($stream['tags'], CASE_LOWER);
            if (!empty($tagsLower['language'])) $lang = strtolower(trim($tagsLower['language']));
        }
        $nombreIdioma = $mapaIdiomas[$lang] ?? strtoupper($lang);
        $idiomasDetectados[] = $nombreIdioma;
        $urlsAudio[] = $nombreIdioma . ':stream_audio.php?file=' . urlencode($rutaArchivo) . '&track=' . $index;
    }
    return [implode(', ', array_unique($idiomasDetectados)), implode('|', $urlsAudio)];
}

function obtenerMapaCategoriasTmdb($apiKey, $bearerToken) {
    $params = ['language' => 'es-MX']; if (!empty($apiKey)) $params['api_key'] = trim($apiKey);
    $url = "https://api.themoviedb.org/3/genre/movie/list?" . http_build_query($params);
    $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
    $json = ejecutarCurl($url, $headers); $mapa = [];
    if ($json && $data = json_decode($json, true)) {
        if (!empty($data['genres'])) foreach ($data['genres'] as $genre) $mapa[$genre['id']] = $genre['name'];
    }
    return $mapa;
}
$mapaCategorias = obtenerMapaCategoriasTmdb($tmdb_api_key, $tmdb_bearer_token);

function obtenerActoresTmdb($idPelicula, $apiKey, $bearerToken) {
    $params = ['language' => 'es-MX']; if (!empty($apiKey)) $params['api_key'] = trim($apiKey);
    $url = "https://api.themoviedb.org/3/movie/{$idPelicula}/credits?" . http_build_query($params);
    $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
    $json = ejecutarCurl($url, $headers);
    if ($json && $data = json_decode($json, true)) {
        if (!empty($data['cast'])) {
            $actores = []; foreach (array_slice($data['cast'], 0, 10) as $c) if (!empty($c['name'])) $actores[] = $c['name'];
            return implode(', ', $actores);
        }
    }
    return 'Sin Datos';
}

function buscarInfoTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias) {
    $titulo = $nombreArchivo; $anio = '';
    if (preg_match('/^(.*?)\s*[\(\.\[\_\-]?\s*(19\d{2}|20\d{2})/i', $nombreArchivo, $m)) { $titulo = trim($m[1]); $anio = $m[2]; } 
    else { $titulo = trim(preg_replace('/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl|x264|x265)\b/i', '', preg_replace('/[._-]/', ' ', $nombreArchivo))); }

    $params = ['query' => $titulo, 'language' => 'es-MX', 'include_adult' => 'false'];
    if (!empty($anio)) $params['year'] = $anio;
    if (!empty($apiKey)) $params['api_key'] = trim($apiKey);
    $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
    
    $json = ejecutarCurl("https://api.themoviedb.org/3/search/movie?" . http_build_query($params), $headers);
    $res = null;
    if ($json && $data = json_decode($json, true)) $res = $data['results'][0] ?? null;

    if (!$res && !empty($anio)) {
        unset($params['year']);
        $json = ejecutarCurl("https://api.themoviedb.org/3/search/movie?" . http_build_query($params), $headers);
        if ($json && $data = json_decode($json, true)) $res = $data['results'][0] ?? null;
    }

    if (!$res) return ['0', 'Sin Datos', 'Sin Datos', 'Sin Datos', (!empty($anio)?$anio:'Sin Datos'), 'Sin Datos', ''];

    $portada = !empty($res['poster_path']) ? "https://image.tmdb.org/t/p/w500" . $res['poster_path'] : '0';
    $cat = []; if (!empty($res['genre_ids'])) foreach ($res['genre_ids'] as $id) if (isset($mapaCategorias[$id])) $cat[] = $mapaCategorias[$id];
    $estreno = (!empty($res['release_date']) && strlen($res['release_date']) >= 4) ? substr($res['release_date'], 0, 4) : (!empty($anio)?$anio:'Sin Datos');
    $audiencia = (!empty($res['vote_average']) && $res['vote_average'] > 0) ? round($res['vote_average'] * 10) . '%' : 'Sin Datos';
    
    return [$portada, (!empty($cat)?implode(', ', $cat):'Sin Datos'), (!empty($res['overview'])?trim($res['overview']):'Sin Datos'), obtenerActoresTmdb($res['id'], $apiKey, $bearerToken), $estreno, $audiencia, ''];
}

function buscarInfoOmdb($nombreArchivo, $omdbApi) {
    if (empty($omdbApi)) return ['0','Sin Datos','Sin Datos','Sin Datos','Sin Datos','Sin Datos','Sin Datos'];
    $titulo = $nombreArchivo; $anio = '';
    if (preg_match('/^(.*?)\s*[\(\.\[\_\-]?\s*(19\d{2}|20\d{2})/i', $nombreArchivo, $m)) { $titulo = trim($m[1]); $anio = $m[2]; } 
    else { $titulo = trim(preg_replace('/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl)\b/i', '', preg_replace('/[._-]/', ' ', $nombreArchivo))); }
    
    $url = "http://www.omdbapi.com/?t=" . urlencode($titulo) . "&apikey=" . urlencode(trim($omdbApi)) . (!empty($anio) ? "&y=$anio" : "");
    $json = ejecutarCurl($url);
    if ($json && $data = json_decode($json, true)) {
        if (isset($data['Response']) && $data['Response'] === 'True') {
            $rt = 'Sin Datos';
            if (!empty($data['Ratings'])) foreach ($data['Ratings'] as $r) if ($r['Source'] === 'Rotten Tomatoes') $rt = $r['Value'];
            return [
                (!empty($data['Poster']) && $data['Poster'] !== 'N/A' ? $data['Poster'] : '0'),
                (!empty($data['Genre']) && $data['Genre'] !== 'N/A' ? $data['Genre'] : 'Sin Datos'),
                (!empty($data['Plot']) && $data['Plot'] !== 'N/A' ? $data['Plot'] : 'Sin Datos'),
                (!empty($data['Actors']) && $data['Actors'] !== 'N/A' ? $data['Actors'] : 'Sin Datos'),
                (!empty($data['Year']) && $data['Year'] !== 'N/A' ? substr($data['Year'], 0, 4) : 'Sin Datos'),
                $rt,
                (!empty($data['imdbRating']) && $data['imdbRating'] !== 'N/A' ? $data['imdbRating'] . ' / 10' : 'Sin Datos')
            ];
        }
    }
    return ['0','Sin Datos','Sin Datos','Sin Datos','Sin Datos','Sin Datos','Sin Datos'];
}

function procesarMedia($nombre, $dirPortadas, $tmdbApi, $tmdbToken, $mapaCat, $omdbApi) {
    list($urlRem, $cat, $desc, $act, $estreno, $audTmdb, $imdbId) = buscarInfoTmdb($nombre, $tmdbApi, $tmdbToken, $mapaCat);
    usleep(150000); // Pausa de 150ms para la API
    $rt = $audTmdb; $aud = $audTmdb;

    if (!empty($omdbApi)) {
        list($urlO, $catO, $descO, $actO, $estrO, $rtO, $audO) = buscarInfoOmdb($nombre, $omdbApi);
        if ($rtO !== 'Sin Datos') $rt = $rtO;
        if ($urlRem === '0' && $urlO !== '0') $urlRem = $urlO;
        if ($cat === 'Sin Datos' && $catO !== 'Sin Datos') $cat = $catO;
        if ($desc === 'Sin Datos' && $descO !== 'Sin Datos') $desc = $descO;
        if ($act === 'Sin Datos' && $actO !== 'Sin Datos') $act = $actO;
        if ($estreno === 'Sin Datos' && $estrO !== 'Sin Datos') $estreno = $estrO;
        if ($aud === 'Sin Datos' && $audO !== 'Sin Datos') $aud = $audO;
    }

    if ($urlRem !== '0') {
        $rutaImg = $dirPortadas . '/' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $nombre) . '.jpg';
        $imgData = descargarImagenDirecta($urlRem);
        if ($imgData && strlen($imgData) > 2000) file_put_contents($rutaImg, $imgData);
        else $urlRem = '0';
    }
    return [$urlRem, $cat, $desc, $act, $estreno, $rt, $aud];
}

// =========================================================================
// PRECARGAR RUTAS EXISTENTES
// =========================================================================
$rutas_existentes = [];
if (isset($pdo) && $pdo instanceof PDO) {
    $res = $pdo->query("SELECT pelicula_url FROM peliculas");
    while ($r = $res->fetch(PDO::FETCH_ASSOC)) $rutas_existentes[$r['pelicula_url']] = true;
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $res = $conn->query("SELECT pelicula_url FROM peliculas");
    while ($r = $res->fetch_assoc()) $rutas_existentes[$r['pelicula_url']] = true;
}

// =========================================================================
// PROCESAMIENTO POR LOTES EXCLUSIVO DE VIDEOS
// =========================================================================
try {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir_base, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
} catch (Exception $e) { die("Error leyendo directorio: " . $e->getMessage()); }

$rutaExcluida = rtrim(str_replace('\\', '/', $dir_base), '/') . '/' . $carpeta_excluida . '/';
$procesados_este_lote = 0;
$nuevos_archivos_encontrados = false;

// Preparar query
if (isset($pdo)) {
    $stmt = $pdo->prepare("INSERT INTO peliculas (id_categoria, nombre, descripcion, actores, estreno, rotten_tomatoes, audiencia, fecha, pelicula_url, portada_url, audio, pelicula_audio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
} else {
    $stmt = $conn->prepare("INSERT INTO peliculas (id_categoria, nombre, descripcion, actores, estreno, rotten_tomatoes, audiencia, fecha, pelicula_url, portada_url, audio, pelicula_audio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
}

foreach ($iterator as $item) {
    if ($item->isFile()) {
        $ruta_completa = str_replace('\\', '/', $item->getPathname());
        
        // Validar si está dentro de la carpeta excluida
        if (stripos($ruta_completa, $rutaExcluida) === 0 || stripos($ruta_completa, '/' . $carpeta_excluida . '/') !== false) {
            continue;
        }

        // VALIDACIÓN ESTRICTA DE EXTENSIÓN DE VIDEO
        $ext = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));
        if (!in_array($ext, $extensiones_permitidas)) {
            continue; // Ignorar cualquier archivo que no sea video (ej. .txt, .srt, .jpg, .nfo, etc.)
        }

        // Si ya está indexado, continuar
        if (isset($rutas_existentes[$ruta_completa])) {
            continue;
        }

        $nuevos_archivos_encontrados = true;
        $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
        $fecha = date('Y-m-d H:i:s', $item->getMTime());

        list($portada, $cat, $desc, $act, $estreno, $rt, $aud) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias, $omdb_api_key);
        list($audio, $pelicula_audio) = obtenerIdiomasAudio($ruta_completa);

        if (isset($pdo)) {
            $stmt->execute([$cat ?: 'Sin Datos', $nombre ?: 'Sin Datos', $desc ?: 'Sin Datos', $act ?: 'Sin Datos', $estreno ?: 'Sin Datos', $rt ?: 'Sin Datos', $aud ?: 'Sin Datos', $fecha, $ruta_completa, $portada, $audio ?: 'Sin Datos', $pelicula_audio]);
        } else {
            $c=$cat?:'Sin Datos'; $n=$nombre?:'Sin Datos'; $d=$desc?:'Sin Datos'; $a=$act?:'Sin Datos'; $e=$estreno?:'Sin Datos'; $r=$rt?:'Sin Datos'; $au=$aud?:'Sin Datos'; $auD=$audio?:'Sin Datos';
            $stmt->bind_param('ssssssssssss', $c, $n, $d, $a, $e, $r, $au, $fecha, $ruta_completa, $portada, $auD, $pelicula_audio);
            $stmt->execute();
        }

        $procesados_este_lote++;
        if ($procesados_este_lote >= $limite_por_lote) break; // Detener cuando alcanza el límite del lote
    }
}
if (isset($conn) && !isset($pdo)) $stmt->close();

// =========================================================================
// OBTENER LISTA FINAL PARA MOSTRAR
// =========================================================================
$listaPeliculas = [];
if (isset($pdo)) {
    $listaPeliculas = $pdo->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50")->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($conn)) {
    $res = $conn->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50");
    while ($row = $res->fetch_assoc()) $listaPeliculas[] = $row;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Escaneo de Películas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; text-align: center; }
        .success { color: #27ae60; font-weight: bold; font-size: 1.2em; }
        .processing { color: #e67e22; font-weight: bold; font-size: 1.2em; }
        .spinner { display: inline-block; width: 20px; height: 20px; border: 3px solid rgba(0,0,0,0.1); border-radius: 50%; border-top-color: #e67e22; animation: spin 1s ease-in-out infinite; margin-right: 10px; vertical-align: middle; }
        @keyframes spin { to { transform: rotate(360deg); } }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; font-size: 13px;}
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #34495e; color: white; }
        .img-poster { width: 70px; border-radius: 4px; }
        .badge { display: inline-block; padding: 3px 6px; border-radius: 4px; font-weight: bold; font-size: 11px; background: #e1f5fe; color: #0288d1; margin-bottom: 2px;}
    </style>
    <?php if ($procesados_este_lote >= $limite_por_lote): ?>
        <!-- AUTO RECARGA LA PÁGINA PARA EL SIGUIENTE LOTE -->
        <meta http-equiv="refresh" content="2">
    <?php endif; ?>
</head>
<body>
    <div class="container">
        <?php if ($procesados_este_lote >= $limite_por_lote): ?>
            <p class="processing"><span class="spinner"></span> Procesando lote de videos... (Procesados <?php echo $procesados_este_lote; ?> nuevos). <br><br><strong>¡NO CIERRES ESTA VENTANA!</strong> La página se recargará automáticamente para continuar.</p>
        <?php elseif ($nuevos_archivos_encontrados): ?>
            <p class="success">¡Escaneo de videos finalizado con éxito! Se procesaron los últimos <?php echo $procesados_este_lote; ?> archivos.</p>
        <?php else: ?>
            <p class="success">¡Escaneo Completo al 100%! No se encontraron videos nuevos en el servidor.</p>
        <?php endif; ?>
    </div>

    <h2>Últimos 50 Registros Insertados</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th> <th>Portada</th> <th>Nombre</th> <th>Categorías</th> <th>Estreno</th> <th>Ruta</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaPeliculas as $pelicula): ?>
                <?php 
                    $rutaAbsoluta = $dir_portadas . '/' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $pelicula['nombre']) . '.jpg';
                    $src = (file_exists($rutaAbsoluta)) ? '../peliculas/portadas/' . basename($rutaAbsoluta) : (($pelicula['portada_url'] !== '0') ? $pelicula['portada_url'] : '');
                ?>
                <tr>
                    <td><?php echo $pelicula['id_peliculas']; ?></td>
                    <td><?php if($src): ?><img src="<?php echo htmlspecialchars($src); ?>" class="img-poster"><?php else: ?>Sin Imagen<?php endif; ?></td>
                    <td><strong><?php echo htmlspecialchars($pelicula['nombre']); ?></strong></td>
                    <td><span class="badge"><?php echo htmlspecialchars($pelicula['id_categoria']); ?></span></td>
                    <td><?php echo htmlspecialchars($pelicula['estreno']); ?></td>
                    <td style="word-break: break-all; font-size: 11px;"><?php echo htmlspecialchars($pelicula['pelicula_url']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>