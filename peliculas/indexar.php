<?php
// Configuración de registros de errores para depuración en segundo plano
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errores_escaneo.log'); // Si algo falla, el error se escribirá en este archivo
error_reporting(E_ALL);
set_time_limit(0); 
ignore_user_abort(true);

// Reutilizar la conexión a la base de datos existente
require_once __DIR__ . '/../conectar.php';

// Directorios del sistema
$dir_base = '/var/www/ALMACENAMIENTO';
$dir_portadas = realpath(__DIR__ . '/../peliculas') ? realpath(__DIR__ . '/../peliculas') . '/portadas' : __DIR__ . '/../peliculas/portadas';
$carpeta_excluida = 'PRINCIPAL';

// Crear carpeta de portadas local si no existe
if (!file_exists($dir_portadas)) {
    @mkdir($dir_portadas, 0755, true);
}

if (!is_dir($dir_base)) {
    error_log("Error: La ruta base '$dir_base' no existe o no se tienen permisos.");
    die("Error: La ruta '$dir_base' no existe o el servidor web no tiene permisos de lectura.");
}

$extensiones_permitidas = ['mp4', 'mkv', 'avi', 'mov', 'wmv', 'flv', 'webm', 'm4v'];

// =========================================================================
// OBTIENE CREDENCIALES DE TMDb Y OMDb DESDE LA BASE DE DATOS
// =========================================================================
$tmdb_api_key = '';
$tmdb_bearer_token = '';
$omdb_api_key = ''; 

if (isset($pdo) && $pdo instanceof PDO) {
    // TMDb
    $stmt_tmdb = $pdo->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($row_tmdb = $stmt_tmdb->fetch(PDO::FETCH_ASSOC)) {
        $tmdb_api_key = $row_tmdb['api'] ?? '';
        $tmdb_bearer_token = $row_tmdb['token'] ?? '';
    }
    // OMDb
    $stmt_omdb = $pdo->query("SELECT api FROM omdb LIMIT 1");
    if ($row_omdb = $stmt_omdb->fetch(PDO::FETCH_ASSOC)) {
        $omdb_api_key = $row_omdb['api'] ?? ''; 
    }
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    // TMDb
    $res_tmdb = $conn->query("SELECT api, token FROM tmdb LIMIT 1");
    if ($res_tmdb && $row_tmdb = $res_tmdb->fetch_assoc()) {
        $tmdb_api_key = $row_tmdb['api'] ?? '';
        $tmdb_bearer_token = $row_tmdb['token'] ?? '';
    }
    // OMDb
    $res_omdb = $conn->query("SELECT api FROM omdb LIMIT 1");
    if ($res_omdb && $row_omdb = $res_omdb->fetch_assoc()) {
        $omdb_api_key = $row_omdb['api'] ?? '';
    }
}

if (empty($tmdb_api_key) && empty($tmdb_bearer_token)) {
    error_log("Error: No se encontraron las credenciales de TMDb en la base de datos.");
    die("Error: No se encontraron las credenciales de TMDb en la tabla 'tmdb'.");
}

// =========================================================================
// FUNCIONES DE APOYO
// =========================================================================

if (!function_exists('ejecutarCurl')) {
    function ejecutarCurl($url, $headers = []) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $respuesta = curl_exec($ch);
        curl_close($ch);
        return $respuesta;
    }
}

if (!function_exists('descargarImagenDirecta')) {
    function descargarImagenDirecta($urlImagen) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlImagen);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $data !== false) {
            return $data;
        }
        return false;
    }
}

if (!function_exists('obtenerIdiomasAudio')) {
    function obtenerIdiomasAudio($rutaArchivo) {
        // Verifica si hay funciones habilitadas para ejecutar comandos
        if (!function_exists('shell_exec') && !function_exists('exec')) {
            return 'Funciones exec deshabilitadas';
        }

        // Comando ffprobe robusto para obtener información en JSON
        $comando = 'ffprobe -v quiet -print_format json -show_streams -select_streams a ' . escapeshellarg($rutaArchivo);
        
        $salida = '';
        if (function_exists('shell_exec')) {
            $salida = @shell_exec($comando);
        } else {
            @exec($comando, $output);
            if (!empty($output)) {
                $salida = implode("\n", $output);
            }
        }

        if (!$salida || stripos($salida, 'command not found') !== false || stripos($salida, 'not recognized') !== false) {
            return 'Audio N/A (Sin ffprobe)';
        }

        $data = json_decode($salida, true);
        $idiomasDetectados = [];

        if (json_last_error() !== JSON_ERROR_NONE || !isset($data['streams'])) {
            return 'Audio N/A';
        }

        if (count($data['streams']) === 0) {
            return 'Sin audio';
        }

        foreach ($data['streams'] as $stream) {
            $lang = 'und'; // Default: undefined
            
            // Buscar etiquetas, ignorando si están en mayúsculas o minúsculas
            if (isset($stream['tags']) && is_array($stream['tags'])) {
                $tagsLower = array_change_key_case($stream['tags'], CASE_LOWER);
                if (!empty($tagsLower['language'])) {
                    $lang = strtolower(trim($tagsLower['language']));
                }
            }
            
            $mapaIdiomas = [
                'spa' => 'Español', 'es' => 'Español',
                'eng' => 'Inglés',  'en' => 'Inglés',
                'fre' => 'Francés', 'fr' => 'Francés',
                'ita' => 'Italiano','it' => 'Italiano',
                'jpn' => 'Japonés', 'ja' => 'Japonés',
                'por' => 'Portugués','pt' => 'Portugués',
                'ger' => 'Alemán',  'de' => 'Alemán',
                'und' => 'Desconocido'
            ];

            $idiomasDetectados[] = $mapaIdiomas[$lang] ?? strtoupper($lang);
        }

        if (empty($idiomasDetectados)) {
            return 'Sin audio';
        }

        return implode(', ', array_unique($idiomasDetectados));
    }
}

if (!function_exists('obtenerMapaCategoriasTmdb')) {
    function obtenerMapaCategoriasTmdb($apiKey, $bearerToken) {
        $params = ['language' => 'es-MX'];
        if (!empty($apiKey)) {
            $params['api_key'] = trim($apiKey);
        }
        $urlGenres = "https://api.themoviedb.org/3/genre/movie/list?" . http_build_query($params);
        $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
        $json = ejecutarCurl($urlGenres, $headers);
        
        $mapa = [];
        if ($json) {
            $data = json_decode($json, true);
            if (isset($data['genres']) && is_array($data['genres'])) {
                foreach ($data['genres'] as $genre) {
                    $mapa[$genre['id']] = $genre['name'];
                }
            }
        }
        return $mapa;
    }
}

$mapaCategorias = obtenerMapaCategoriasTmdb($tmdb_api_key, $tmdb_bearer_token);

if (!function_exists('obtenerActoresTmdb')) {
    function obtenerActoresTmdb($idPeliculaTmdb, $apiKey, $bearerToken, $limiteActores = 10) {
        $params = ['language' => 'es-MX'];
        if (!empty($apiKey)) {
            $params['api_key'] = trim($apiKey);
        }
        $urlCredits = "https://api.themoviedb.org/3/movie/{$idPeliculaTmdb}/credits?" . http_build_query($params);
        $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
        $json = ejecutarCurl($urlCredits, $headers);

        if ($json) {
            $data = json_decode($json, true);
            if (isset($data['cast']) && is_array($data['cast'])) {
                $actores = [];
                foreach (array_slice($data['cast'], 0, $limiteActores) as $castItem) {
                    if (!empty($castItem['name'])) {
                        $actores[] = $castItem['name'];
                    }
                }
                return implode(', ', $actores);
            }
        }
        return 'Sin Actores Registrados';
    }
}

if (!function_exists('buscarInfoPeliculaTmdb')) {
    function buscarInfoPeliculaTmdb($nombreArchivo, $apiKey, $bearerToken, $mapaCategorias) {
        $titulo = $nombreArchivo;
        $anioDetectadoNombre = '';

        if (preg_match('/^(.*?)\s*[\(\.\[\_\-]?\s*(19\d{2}|20\d{2})\s*[\)\.\]\_\-]?/i', $nombreArchivo, $coincidencias)) {
            $titulo = trim($coincidencias[1]);
            $anioDetectadoNombre = $coincidencias[2];
        } else {
            $titulo = preg_replace('/[._-]/', ' ', $nombreArchivo);
            $titulo = preg_replace('/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl|x264|x265)\b/i', '', $titulo);
            $titulo = trim($titulo);
        }

        $params = ['query' => $titulo, 'language' => 'es-MX', 'include_adult' => 'false'];
        if (!empty($anioDetectadoNombre)) $params['year'] = $anioDetectadoNombre;
        if (!empty($apiKey)) $params['api_key'] = trim($apiKey);

        $headers = !empty($bearerToken) ? ['Authorization: Bearer ' . trim($bearerToken), 'Accept: application/json'] : [];
        
        $urlTmdb = "https://api.themoviedb.org/3/search/movie?" . http_build_query($params);
        $jsonTmdb = ejecutarCurl($urlTmdb, $headers);
        $resultadoPelicula = null;

        if ($jsonTmdb) {
            $data = json_decode($jsonTmdb, true);
            if (isset($data['results'][0])) $resultadoPelicula = $data['results'][0];
        }

        if (!$resultadoPelicula && !empty($anioDetectadoNombre)) {
            unset($params['year']);
            $urlTmdbSimple = "https://api.themoviedb.org/3/search/movie?" . http_build_query($params);
            $jsonTmdbSimple = ejecutarCurl($urlTmdbSimple, $headers);
            if ($jsonTmdbSimple) {
                $dataSimple = json_decode($jsonTmdbSimple, true);
                if (isset($dataSimple['results'][0])) $resultadoPelicula = $dataSimple['results'][0];
            }
        }

        $urlPortada = '0';
        $cadenaCategorias = 'Sin Categoría';
        $resumenPelicula = 'Sin descripción disponible';
        $cadenaActores = 'Sin Actores Registrados';
        $anioEstreno = !empty($anioDetectadoNombre) ? $anioDetectadoNombre : 'N/A';
        $audienciaTmdb = 'N/A';
        $imdbId = '';

        if ($resultadoPelicula) {
            if (!empty($resultadoPelicula['poster_path'])) {
                $urlPortada = "https://image.tmdb.org/t/p/w500" . $resultadoPelicula['poster_path'];
            }
            if (isset($resultadoPelicula['genre_ids']) && is_array($resultadoPelicula['genre_ids'])) {
                $nombresGeneros = [];
                foreach ($resultadoPelicula['genre_ids'] as $idGenero) {
                    if (isset($mapaCategorias[$idGenero])) {
                        $nombresGeneros[] = $mapaCategorias[$idGenero];
                    }
                }
                if (!empty($nombresGeneros)) $cadenaCategorias = implode(', ', $nombresGeneros);
            }
            if (!empty($resultadoPelicula['overview'])) {
                $resumenPelicula = trim($resultadoPelicula['overview']);
            }
            
            if (isset($resultadoPelicula['vote_average']) && $resultadoPelicula['vote_average'] > 0) {
                $audienciaTmdb = round($resultadoPelicula['vote_average'] * 10) . '%';
            }

            if (isset($resultadoPelicula['id'])) {
                $cadenaActores = obtenerActoresTmdb($resultadoPelicula['id'], $apiKey, $bearerToken, 10);
                
                $urlExternal = "https://api.themoviedb.org/3/movie/{$resultadoPelicula['id']}/external_ids?" . http_build_query($params);
                $jsonExternal = ejecutarCurl($urlExternal, $headers);
                if ($jsonExternal) {
                    $extData = json_decode($jsonExternal, true);
                    if (!empty($extData['imdb_id'])) {
                        $imdbId = $extData['imdb_id'];
                    }
                }
            }

            $fechaTmdb = $resultadoPelicula['release_date'] ?? $resultadoPelicula['first_air_date'] ?? '';
            if (!empty($fechaTmdb) && strlen($fechaTmdb) >= 4) {
                $anioEstreno = substr($fechaTmdb, 0, 4);
            }
        }

        return [$urlPortada, $cadenaCategorias, $resumenPelicula, $cadenaActores, $anioEstreno, $audienciaTmdb, $imdbId];
    }
}

if (!function_exists('buscarInfoPeliculaOmdb')) {
    function buscarInfoPeliculaOmdb($nombreArchivo, $omdbApiKey, $imdbId = '') {
        $rottenTomatoes = 'N/A';
        $audiencia = 'N/A';
        $urlPortada = '0';
        $cadenaCategorias = 'Sin Categoría';
        $resumenPelicula = 'Sin descripción disponible';
        $cadenaActores = 'Sin Actores Registrados';
        $anioEstreno = 'N/A';

        if (empty($omdbApiKey)) {
            return [$urlPortada, $cadenaCategorias, $resumenPelicula, $cadenaActores, $anioEstreno, $rottenTomatoes, $audiencia];
        }

        if (!empty($imdbId)) {
            $urlOmdb = "http://www.omdbapi.com/?i=" . urlencode($imdbId) . "&apikey=" . urlencode(trim($omdbApiKey));
        } else {
            $titulo = $nombreArchivo;
            $anioDetectadoNombre = '';
            if (preg_match('/^(.*?)\s*[\(\.\[\_\-]?\s*(19\d{2}|20\d{2})/i', $nombreArchivo, $coincidencias)) {
                $titulo = trim($coincidencias[1]);
                $anioDetectadoNombre = $coincidencias[2];
            } else {
                $titulo = preg_replace('/[._-]/', ' ', $nombreArchivo);
                $titulo = trim(preg_replace('/\b(1080p|720p|4k|2160p|bluray|brrip|web-dl)\b/i', '', $titulo));
            }
            $urlOmdb = "http://www.omdbapi.com/?t=" . urlencode($titulo) . "&apikey=" . urlencode(trim($omdbApiKey));
            if (!empty($anioDetectadoNombre)) {
                $urlOmdb .= "&y=" . urlencode($anioDetectadoNombre);
            }
        }

        $jsonOmdb = ejecutarCurl($urlOmdb);

        if ($jsonOmdb) {
            $data = json_decode($jsonOmdb, true);
            if (isset($data['Response']) && $data['Response'] === 'True') {
                $urlPortada = (!empty($data['Poster']) && $data['Poster'] !== 'N/A') ? $data['Poster'] : '0';
                $cadenaCategorias = (!empty($data['Genre']) && $data['Genre'] !== 'N/A') ? $data['Genre'] : 'Sin Categoría';
                $resumenPelicula = (!empty($data['Plot']) && $data['Plot'] !== 'N/A') ? $data['Plot'] : 'Sin descripción disponible';
                $cadenaActores = (!empty($data['Actors']) && $data['Actors'] !== 'N/A') ? $data['Actors'] : 'Sin Actores Registrados';
                $anioEstreno = (!empty($data['Year']) && $data['Year'] !== 'N/A') ? substr($data['Year'], 0, 4) : 'N/A';

                if (isset($data['Ratings']) && is_array($data['Ratings'])) {
                    foreach ($data['Ratings'] as $rating) {
                        if ($rating['Source'] === 'Rotten Tomatoes') {
                            $rottenTomatoes = $rating['Value'];
                        }
                    }
                }
                if (!empty($data['imdbRating']) && $data['imdbRating'] !== 'N/A') {
                    $audiencia = $data['imdbRating'] . ' / 10';
                }
            }
        }

        return [$urlPortada, $cadenaCategorias, $resumenPelicula, $cadenaActores, $anioEstreno, $rottenTomatoes, $audiencia];
    }
}

if (!function_exists('procesarMedia')) {
    function procesarMedia($nombreArchivo, $dirPortadas, $tmdbApi, $tmdbBearer, $mapaCat, $omdbApi) {
        list($urlRemota, $categorias, $descripcion, $actores, $estreno, $audienciaTmdb, $imdbId) = buscarInfoPeliculaTmdb($nombreArchivo, $tmdbApi, $tmdbBearer, $mapaCat);
        
        $rottenTomatoes = ($audienciaTmdb !== 'N/A') ? $audienciaTmdb : 'N/A';
        $audiencia = ($audienciaTmdb !== 'N/A') ? $audienciaTmdb : 'N/A';

        if (!empty($omdbApi)) {
            list($urlOmdb, $catOmdb, $descOmdb, $actOmdb, $estrOmdb, $rtOmdb, $audOmdb) = buscarInfoPeliculaOmdb($nombreArchivo, $omdbApi, $imdbId);
            
            if ($rtOmdb !== 'N/A') {
                $rottenTomatoes = $rtOmdb;
            }

            if ($urlRemota === '0' && $urlOmdb !== '0') $urlRemota = $urlOmdb;
            if ($categorias === 'Sin Categoría' && $catOmdb !== 'Sin Categoría') $categorias = $catOmdb;
            if ($descripcion === 'Sin descripción disponible' && $descOmdb !== 'Sin descripción disponible') $descripcion = $descOmdb;
            if ($actores === 'Sin Actores Registrados' && $actOmdb !== 'Sin Actores Registrados') $actores = $actOmdb;
            if ($estreno === 'N/A' && $estrOmdb !== 'N/A') $estreno = $estrOmdb;
            if ($audiencia === 'N/A' && $audOmdb !== 'N/A') $audiencia = $audOmdb;
        }

        if ($urlRemota !== '0') {
            $nombreImagenLocal = preg_replace('/[^a-zA-Z0-9_-]/', '_', $nombreArchivo) . '.jpg';
            $rutaImagenLocal = $dirPortadas . '/' . $nombreImagenLocal;

            $contenidoImagen = descargarImagenDirecta($urlRemota);

            if ($contenidoImagen && strlen($contenidoImagen) > 2000) {
                file_put_contents($rutaImagenLocal, $contenidoImagen);
            } else {
                $urlRemota = '0';
            }
        }

        return [$urlRemota, $categorias, $descripcion, $actores, $estreno, $rottenTomatoes, $audiencia];
    }
}

// =========================================================================
// OBTENER LISTA DE PELÍCULAS PARA MOSTRAR
// =========================================================================

$listaPeliculas = [];
if (isset($pdo) && $pdo instanceof PDO) {
    $stmtResultados = $pdo->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50");
    $listaPeliculas = $stmtResultados ? $stmtResultados->fetchAll(PDO::FETCH_ASSOC) : [];
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $resResultados = $conn->query("SELECT * FROM peliculas ORDER BY id_peliculas DESC LIMIT 50");
    if ($resResultados) {
        while ($row = $resResultados->fetch_assoc()) {
            $listaPeliculas[] = $row;
        }
    }
}

ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Indexación</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 20px; position: relative; }
        h1, h2 { color: #2c3e50; }
        .success { color: #27ae60; font-weight: bold; }
        
        .toast-burbuja {
            position: fixed; top: 25px; right: 25px; background-color: #2c3e50; color: #ffffff;
            padding: 16px 24px; border-radius: 50px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            display: flex; align-items: center; gap: 12px; font-size: 15px; font-weight: 600;
            z-index: 9999; animation: fadeIn 0.4s ease-out; border-left: 5px solid #3498db;
        }
        .toast-burbuja .spinner {
            width: 18px; height: 18px; border: 3px solid rgba(255, 255, 255, 0.3); border-radius: 50%;
            border-top-color: #3498db; animation: spin 1s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; table-layout: fixed; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: top; }
        th { background-color: #34495e; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        
        .col-id { width: 35px; }
        .col-portada { width: 90px; }
        .col-nombre { width: 11%; }
        .col-cat { width: 9%; }
        .col-desc { width: 18%; }
        .col-actores { width: 11%; }
        .col-estreno { width: 65px; text-align: center; }
        .col-rt { width: 70px; text-align: center; }
        .col-aud { width: 70px; text-align: center; }
        .col-audio { width: 75px; }
        .col-fecha { width: 85px; }
        .col-ruta { width: 9%; }

        .img-poster { width: 90px; height: 135px; object-fit: cover; border-radius: 6px; box-shadow: 0 2px 6px rgba(0,0,0,0.2); }
        .no-img { width: 90px; height: 135px; background: #e0e0e0; display: flex; align-items: center; justify-content: center; color: #777; font-size: 12px; border-radius: 6px; text-align: center; }
        .badge-cat { display: inline-block; background: #e1f5fe; color: #0288d1; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; }
        .badge-estreno { display: inline-block; background: #fff3e0; color: #e65100; padding: 4px 8px; border-radius: 4px; font-size: 13px; font-weight: bold; border: 1px solid #ffe0b2; }
        .badge-rt { display: inline-block; background: #ffebee; color: #c62828; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; border: 1px solid #ffcdd2; }
        .badge-aud { display: inline-block; background: #ede7f6; color: #512da8; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; border: 1px solid #d1c4e9; }
        .badge-audio { display: inline-block; background: #e8f5e9; color: #2e7d32; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: bold; border: 1px solid #c8e6c9; margin-bottom: 3px;}
        .desc-text, .actores-text { font-size: 13px; color: #555; line-height: 1.5; white-space: normal; word-wrap: break-word; overflow-wrap: break-word; word-break: break-word; }
        .actores-text { color: #2c3e50; font-weight: 500; }
        .ruta-text { font-size: 11px; color: #666; word-break: break-all; }
    </style>
</head>
<body>
    <div class="toast-burbuja" id="burbuja-notificacion">
        <div class="spinner"></div>
        <span>Escaneo en proceso (Máximo 50 nuevos registros)...</span>
    </div>
    <div class="container">
        <h1>Escaneo de Películas y Análisis de Audio</h1>
        <p class="success">El escaneo ha sido iniciado correctamente.</p>
        <p>El sistema obtendrá datos de TMDb/OMDb, analizará el audio y procesará un <strong>lote máximo de 50 archivos nuevos</strong> en segundo plano.</p>
    </div>
    <h2>Últimos Registros en la Base de Datos</h2>
    <table>
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-portada">Portada</th>
                <th class="col-nombre">Nombre</th>
                <th class="col-cat">Categorías</th>
                <th class="col-desc">Descripción</th>
                <th class="col-actores">Actores</th>
                <th class="col-estreno">Estreno</th>
                <th class="col-rt">Rotten T.</th>
                <th class="col-aud">Audiencia</th>
                <th class="col-audio">Audio</th>
                <th class="col-fecha">Fecha</th>
                <th class="col-ruta">Ruta Película</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($listaPeliculas)): ?>
                <?php foreach ($listaPeliculas as $pelicula): ?>
                    <?php 
                        $nombreImagenLocal = preg_replace('/[^a-zA-Z0-9_-]/', '_', $pelicula['nombre']) . '.jpg';
                        $rutaRelativaLocal = '../peliculas/portadas/' . $nombreImagenLocal;
                        $rutaAbsolutaLocal = $dir_portadas . '/' . $nombreImagenLocal;

                        if (file_exists($rutaAbsolutaLocal) && filesize($rutaAbsolutaLocal) > 2000) {
                            $srcImagen = $rutaRelativaLocal;
                        } elseif (!empty($pelicula['portada_url']) && $pelicula['portada_url'] !== '0') {
                            $srcImagen = $pelicula['portada_url'];
                        } else {
                            $srcImagen = null;
                        }
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($pelicula['id_peliculas']); ?></strong></td>
                        <td>
                            <?php if ($srcImagen): ?>
                                <img src="<?php echo htmlspecialchars($srcImagen); ?>" alt="Portada" class="img-poster">
                            <?php else: ?>
                                <div class="no-img">Sin Portada</div>
                            <?php endif; ?>
                        </td>
                        <td><strong><?php echo htmlspecialchars($pelicula['nombre']); ?></strong></td>
                        <td><span class="badge-cat"><?php echo htmlspecialchars($pelicula['id_categoria']); ?></span></td>
                        <td><div class="desc-text"><?php echo htmlspecialchars($pelicula['descripcion']); ?></div></td>
                        <td><div class="actores-text"><?php echo htmlspecialchars($pelicula['actores'] ?? 'N/A'); ?></div></td>
                        <td style="text-align: center;">
                            <span class="badge-estreno"><?php echo htmlspecialchars(!empty($pelicula['estreno']) ? $pelicula['estreno'] : 'N/A'); ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span class="badge-rt"><?php echo htmlspecialchars(!empty($pelicula['rotten_tomatoes']) ? $pelicula['rotten_tomatoes'] : 'N/A'); ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span class="badge-aud"><?php echo htmlspecialchars(!empty($pelicula['audiencia']) ? $pelicula['audiencia'] : 'N/A'); ?></span>
                        </td>
                        <td>
                            <?php 
                            $idiomas_db = !empty($pelicula['audio']) ? explode(',', $pelicula['audio']) : ['N/A'];
                            foreach($idiomas_db as $idioma_db) {
                                echo '<span class="badge-audio">' . htmlspecialchars(trim($idioma_db)) . '</span><br>';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($pelicula['fecha']); ?></td>
                        <td><div class="ruta-text"><?php echo htmlspecialchars($pelicula['pelicula_url']); ?></div></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="12" style="text-align:center;">No se encontraron registros previos.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script>
        setTimeout(() => {
            const burbuja = document.getElementById('burbuja-notificacion');
            if(burbuja) {
                burbuja.style.transition = "opacity 0.6s ease, transform 0.6s ease";
                burbuja.style.opacity = "0";
                burbuja.style.transform = "translateY(-20px)";
                setTimeout(() => burbuja.remove(), 600);
            }
        }, 6000);
    </script>
</body>
</html>
<?php
// Enviar respuesta rápida al navegador para permitir que el escaneo continúe en segundo plano
$size = ob_get_length();
header("Content-Length: $size");
header('Connection: close');
ob_end_flush();
@ob_flush();
flush();

if (session_id()) session_write_close();
if (function_exists('fastcgi_finish_request')) fastcgi_finish_request();

// =========================================================================
// CONTINUACIÓN DEL PROCESO EN SEGUNDO PLANO (Con límite de 50 registros)
// =========================================================================

try {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir_base, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
} catch (Exception $e) {
    error_log("Error al leer directorio base: " . $e->getMessage());
    exit;
}

$rutaExcluida = rtrim(str_replace('\\', '/', $dir_base), '/') . '/' . $carpeta_excluida . '/';
$contador_procesados = 0; 
$limite_lote = 50;        

if (isset($pdo) && $pdo instanceof PDO) {
    $sql = "INSERT INTO peliculas (id_categoria, nombre, descripcion, actores, estreno, rotten_tomatoes, audiencia, fecha, pelicula_url, portada_url, audio) 
            VALUES (:id_categoria, :nombre, :descripcion, :actores, :estreno, :rotten_tomatoes, :audiencia, :fecha, :pelicula_url, :portada_url, :audio)";
    $stmt = $pdo->prepare($sql);

    foreach ($iterator as $item) {
        if ($contador_procesados >= $limite_lote) break; 

        if ($item->isFile()) {
            $ruta_completa = str_replace('\\', '/', $item->getPathname());

            if (stripos($ruta_completa, $rutaExcluida) === 0 || stripos($ruta_completa, '/' . $carpeta_excluida . '/') !== false) {
                continue;
            }

            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());

                $chk = $pdo->prepare("SELECT id_peliculas FROM peliculas WHERE pelicula_url = :url LIMIT 1");
                $chk->execute([':url' => $ruta_completa]);
                if ($chk->fetch()) continue;

                list($portada_url, $categoria, $descripcion, $actores, $estreno, $rotten_tomatoes, $audiencia) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias, $omdb_api_key);
                $audio_detectado = obtenerIdiomasAudio($ruta_completa);

                try {
                    $stmt->execute([
                        ':id_categoria'    => $categoria,
                        ':nombre'          => $nombre,
                        ':descripcion'     => $descripcion,
                        ':actores'         => $actores,
                        ':estreno'         => $estreno,
                        ':rotten_tomatoes' => $rotten_tomatoes,
                        ':audiencia'       => $audiencia,
                        ':fecha'           => $fecha,
                        ':pelicula_url'    => $ruta_completa,
                        ':portada_url'     => $portada_url,
                        ':audio'           => $audio_detectado
                    ]);
                    $contador_procesados++; 
                } catch (PDOException $e) {
                    error_log("Error insertando en PDO: " . $e->getMessage());
                }
            }
        }
    }
} elseif (isset($conn) && ($conn instanceof mysqli || is_resource($conn))) {
    $sql = "INSERT INTO peliculas (id_categoria, nombre, descripcion, actores, estreno, rotten_tomatoes, audiencia, fecha, pelicula_url, portada_url, audio) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Error preparando MySQLi stmt: " . $conn->error);
        exit;
    }

    foreach ($iterator as $item) {
        if ($contador_procesados >= $limite_lote) break; 

        if ($item->isFile()) {
            $ruta_completa = str_replace('\\', '/', $item->getPathname());

            if (stripos($ruta_completa, $rutaExcluida) === 0 || stripos($ruta_completa, '/' . $carpeta_excluida . '/') !== false) {
                continue;
            }

            $extension = strtolower(pathinfo($item->getFilename(), PATHINFO_EXTENSION));

            if (in_array($extension, $extensiones_permitidas)) {
                $nombre = pathinfo($item->getFilename(), PATHINFO_FILENAME);
                $fecha = date('Y-m-d H:i:s', $item->getMTime());

                $chk = $conn->prepare("SELECT id_peliculas FROM peliculas WHERE pelicula_url = ? LIMIT 1");
                $chk->bind_param('s', $ruta_completa);
                $chk->execute();
                $res = $chk->get_result();
                if ($res && $res->num_rows > 0) continue;

                list($portada_url, $categoria, $descripcion, $actores, $estreno, $rotten_tomatoes, $audiencia) = procesarMedia($nombre, $dir_portadas, $tmdb_api_key, $tmdb_bearer_token, $mapaCategorias, $omdb_api_key);
                $audio_detectado = obtenerIdiomasAudio($ruta_completa);

                $stmt->bind_param('sssssssssss', $categoria, $nombre, $descripcion, $actores, $estreno, $rotten_tomatoes, $audiencia, $fecha, $ruta_completa, $portada_url, $audio_detectado);
                
                if (!$stmt->execute()) {
                    error_log("Error insertando registro MySQLi: " . $stmt->error);
                } else {
                    $contador_procesados++; 
                }
            }
        }
    }
    $stmt->close();
}

exit;
?>