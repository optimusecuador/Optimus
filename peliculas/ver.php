<?php
// ==============================================================================
// 1. CONEXIÓN Y OBTENCIÓN DE LA PELÍCULA DESDE LA BD
// ==============================================================================
require('../conectar.php');

$id_pelicula = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pelicula = null;

if ($id_pelicula > 0) {
    $stmt = mysqli_prepare($conexion, "SELECT * FROM peliculas WHERE id_peliculas = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_pelicula);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $pelicula = mysqli_fetch_assoc($resultado);
        }
        mysqli_stmt_close($stmt);
    }
}

if (!$pelicula) {
    header("Location: index.php");
    exit();
}

$nombre = $pelicula['nombre'] ?? 'Sin título';
$sinopsis = $pelicula['descripcion'] ?? 'Sin descripción disponible.';
$portada = !empty($pelicula['portada_url']) ? $pelicula['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
$anio = !empty($pelicula['fecha']) ? date('Y', strtotime($pelicula['fecha'])) : 'N/A';
$cats_array = !empty($pelicula['id_categoria']) ? array_map('trim', explode(',', $pelicula['id_categoria'])) : [];

// Tiempo guardado
$tiempo_guardado = floatval($pelicula['reproduccion'] ?? 0);
$minutos_guardados = floor($tiempo_guardado / 60);
$segundos_guardados = floor($tiempo_guardado % 60);
$tiempo_formateado = sprintf('%02d:%02d', $minutos_guardados, $segundos_guardados);

/**
 * Función que extrae la extensión real del archivo de video de la URL,
 * ignorando scripts como .php o parámetros query.
 */
function obtenerExtensionVideo($url) {
    $clean_url = strtok($url, '?');
    $clean_url = strtok($clean_url, '#');

    $ext = strtoupper(pathinfo($clean_url, PATHINFO_EXTENSION));

    $extensiones_validas = ['MP4', 'MKV', 'AVI', 'WEBM', 'MOV', 'M3U8', 'TS', 'FLV', 'WMV', 'MPD'];

    if (!empty($ext) && in_array($ext, $extensiones_validas)) {
        return $ext;
    }

    foreach ($extensiones_validas as $ext_posible) {
        if (preg_match('/' . preg_quote($ext_posible, '/') . '/i', $url)) {
            return $ext_posible;
        }
    }

    return 'VIDEO';
}

// PROCESAR AUDIOS Y URLS MÚLTIPLES DESDE pelicula_audio
$pelicula_audio_str = !empty($pelicula['pelicula_audio']) ? $pelicula['pelicula_audio'] : '';
$audio_opciones = [];

if (!empty($pelicula_audio_str)) {
    $tracks_db = explode('|', $pelicula_audio_str);
    foreach ($tracks_db as $track_info) {
        $partes = explode(':', $track_info, 2);
        if (count($partes) === 2) {
            $nombre_idioma = trim($partes[0]);
            $url_stream = trim($partes[1]);
            $extension = obtenerExtensionVideo($url_stream);

            $audio_opciones[] = [
                'idioma' => $nombre_idioma,
                'url' => $url_stream,
                'ext' => $extension
            ];
        }
    }
}

if (empty($audio_opciones)) {
    $url_defecto = trim($pelicula['pelicula_url'] ?? '');
    $extension = obtenerExtensionVideo($url_defecto);

    $audio_opciones[] = [
        'idioma' => 'Español (Por defecto)',
        'url' => $url_defecto,
        'ext' => $extension
    ];
}

// Generar texto visible con idioma y formato de archivo (ej: Español [MP4])
$audio_detalles = [];
foreach ($audio_opciones as $op) {
    $audio_detalles[] = $op['idioma'] . " [" . $op['ext'] . "]";
}
$audio_str = implode(', ', $audio_detalles);

$rotten_critica = $pelicula['rotten_tomatoes'] ?? '0';
$rotten_audiencia = $pelicula['audiencia'] ?? '0';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo htmlspecialchars($nombre); ?> - Ver Película</title>
    
    <!-- Librería Hls.js de alto rendimiento -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hls.js/1.5.8/hls.min.js"></script>

    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 15px; background-color: #141414; color: #ffffff; overflow-x: hidden; }
        .container { max-width: 1000px; margin: 0 auto; }
        .btn-volver { display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        
        .reproductor-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000; border-radius: 8px; margin-bottom: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        .reproductor-container video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; object-fit: contain; background: #000; }
        
        .poster-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.7); background-blend-mode: darken; z-index: 10; }
        .controles-pre-play { display: flex; flex-direction: column; align-items: center; gap: 15px; z-index: 11; }
        .select-audio { padding: 10px 15px; font-size: 16px; border-radius: 5px; border: 2px solid #333; background: rgba(20, 20, 20, 0.9); color: #fff; font-weight: bold; outline: none; cursor: pointer; text-align: center; max-width: 380px; width: 100%; }
        
        .grupo-botones { display: flex; gap: 10px; flex-wrap: wrap; justify-content: center; }
        .btn-reproducir { background-color: #e50914; color: white; border: none; padding: 12px 20px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; }
        .btn-continuar { background-color: #28a745; color: white; border: none; padding: 12px 20px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; }
        
        .pelicula-detalle { display: flex; gap: 25px; background: #1f1f1f; padding: 20px; border-radius: 8px; }
        .portada-col { flex: 0 0 180px; }
        .portada-img { width: 100%; border-radius: 6px; aspect-ratio: 2 / 3; object-fit: cover; }
        .info-col { flex: 1; }
        .header-info { display: flex; justify-content: space-between; align-items: flex-start; gap: 15px; border-bottom: 1px solid #333; padding-bottom: 15px; }
        .main-details { flex: 1; }
        .rotten-right { display: flex; flex-direction: column; gap: 10px; min-width: 120px; }
        .score-box { background: #2a2a2a; padding: 6px; border-radius: 6px; border-left: 4px solid #e50914; text-align: center; }
        .score-val { font-size: 18px; font-weight: bold; display: block; }
        .meta-item { background: #2a2a2a; padding: 4px 8px; border-radius: 4px; display: inline-block; margin-right: 8px; font-size: 13px; }
        .badge-categoria { display: inline-block; background: #007bff; color: #ffffff; padding: 4px 8px; font-size: 12px; border-radius: 4px; margin: 0 4px 4px 0; }

        @media (max-width: 768px) {
            body { padding: 10px; }
            .pelicula-detalle { flex-direction: column; gap: 15px; padding: 15px; }
            .portada-col { flex: 1; max-width: 140px; margin: 0 auto; }
            .header-info { flex-direction: column; }
            .rotten-right { flex-direction: row; width: 100%; justify-content: space-between; }
            .score-box { flex: 1; }
            .grupo-botones { flex-direction: column; width: 100%; }
            .btn-reproducir, .btn-continuar { width: 100%; }
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="index.php" class="btn-volver">← Volver al Catálogo</a>

        <div class="reproductor-container" id="videoContainer">
            <div id="posterOverlay" class="poster-overlay" style="background-image: url('<?php echo htmlspecialchars($portada); ?>');">
                <div class="controles-pre-play">
                    <select id="audioSelector" class="select-audio">
                        <?php foreach ($audio_opciones as $opcion): ?>
                            <option value="<?php echo htmlspecialchars($opcion['url']); ?>">
                                🎬 <?php echo htmlspecialchars($opcion['idioma']); ?> ( Formato: .<?php echo strtolower($opcion['ext']); ?> )
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="grupo-botones">
                        <button class="btn-reproducir" onclick="iniciarExperiencia(false)">▶ Reproducir desde el inicio</button>
                        
                        <?php if ($tiempo_guardado > 5): ?>
                            <button class="btn-continuar" onclick="iniciarExperiencia(true)">⏭ Continuar (<?php echo $tiempo_formateado; ?>)</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <video id="videoPlayer" controls playsinline webkit-playsinline crossorigin="anonymous" preload="metadata"></video>
        </div>

        <div class="pelicula-detalle">
            <div class="portada-col">
                <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada" class="portada-img">
            </div>
            
            <div class="info-col">
                <div class="header-info">
                    <div class="main-details">
                        <h1><?php echo htmlspecialchars($nombre); ?></h1>
                        <div class="meta-data" style="margin-bottom: 10px;">
                            <span class="meta-item">📅 <?php echo htmlspecialchars($anio); ?></span>
                            <span class="meta-item">🔊 <?php echo htmlspecialchars($audio_str); ?></span>
                        </div>
                        <div>
                            <?php foreach ($cats_array as $cat): ?>
                                <span class="badge-categoria"><?php echo htmlspecialchars(ucfirst($cat)); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="rotten-right">
                        <div class="score-box">
                            <span class="score-val">🍅 <?php echo htmlspecialchars($rotten_critica); ?>%</span>
                            <small style="font-size:11px;">Crítica</small>
                        </div>
                        <div class="score-box">
                            <span class="score-val">🍿 <?php echo htmlspecialchars($rotten_audiencia); ?>%</span>
                            <small style="font-size:11px;">Audiencia</small>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <strong style="font-size: 14px;">Descripción:</strong>
                    <p style="line-height: 1.5; color: #ddd; font-size: 14px;"><?php echo nl2br(htmlspecialchars($sinopsis)); ?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const idPelicula = <?php echo $id_pelicula; ?>;
        const urlIntro = "../descripcion/intro.mp4";
        const tiempoGuardadoServidor = <?php echo $tiempo_guardado; ?>;
        
        const video = document.getElementById('videoPlayer');
        const videoContainer = document.getElementById('videoContainer');
        
        let urlStreamPelicula = "";
        let tiempoInicioPelicula = 0;
        let ultimoTiempoEnviado = 0;
        let reproduciendoPelicula = false;
        let hlsInstance = null;

        async function solicitarWakeLock() {
            if ('wakeLock' in navigator) {
                try { await navigator.wakeLock.request('screen'); } catch (e) {}
            }
        }

        function solicitarPantallaCompleta() {
            if (videoContainer.requestFullscreen) {
                videoContainer.requestFullscreen().catch(() => {});
            } else if (videoContainer.webkitRequestFullscreen) {
                videoContainer.webkitRequestFullscreen();
            } else if (video.webkitEnterFullscreen) {
                video.webkitEnterFullscreen();
            }
        }

        function guardarProgreso(tiempoActual, forzar = false) {
            if (!reproduciendoPelicula) return;
            if (!forzar && Math.abs(tiempoActual - ultimoTiempoEnviado) < 5) return;
            ultimoTiempoEnviado = tiempoActual;

            navigator.sendBeacon('guardar_progreso.php', new URLSearchParams({
                id: idPelicula,
                tiempo: Math.floor(tiempoActual)
            }));
        }

        function iniciarExperiencia(continuar) {
            const selector = document.getElementById('audioSelector');
            urlStreamPelicula = selector.value;
            tiempoInicioPelicula = continuar ? tiempoGuardadoServidor : 0;

            document.getElementById('posterOverlay').style.display = 'none';

            solicitarPantallaCompleta();
            solicitarWakeLock();

            // Cargar Intro Nativamente
            video.src = urlIntro;
            video.play().catch(() => {
                iniciarPelicula();
            });

            video.onended = () => {
                iniciarPelicula();
            };
        }

        function destruirHls() {
            if (hlsInstance) {
                hlsInstance.destroy();
                hlsInstance = null;
            }
        }

        function iniciarPelicula() {
            reproduciendoPelicula = true;
            video.onended = null;

            destruirHls();

            // Limpieza profunda del elemento HTML5
            video.pause();
            video.removeAttribute('src');
            video.load();

            const esHLS = /\.m3u8($|\?)/i.test(urlStreamPelicula);

            if (esHLS && Hls.isSupported()) {
                // Configuración Anti-Cortes y Anti-Stall en HLS
                hlsInstance = new Hls({
                    maxBufferLength: 60,            // Almacena hasta 60 segundos de video en buffer
                    maxMaxBufferLength: 120,        // Máximo buffer absoluto (120s)
                    maxBufferSize: 60 * 1024 * 1024,// Limite de memoria 60MB
                    maxBufferHole: 0.5,             // Auto-resuelve pequeños saltos o vacíos de fragmentos
                    highBufferWatchdogPeriod: 2,    // Monitorea congelamientos de pantalla cada 2s
                    nudgeOffset: 0.1,               // Avance automático en caso de congelamiento
                    nudgeMaxRetry: 5,
                    manifestLoadingTimeOut: 10000,
                    manifestLoadingMaxRetry: 4,
                    fragLoadingTimeOut: 20000,
                    fragLoadingMaxRetry: 6,
                    enableWorker: true              // Decodificación multihilo sin congelar interfaz
                });

                hlsInstance.loadSource(urlStreamPelicula);
                hlsInstance.attachMedia(video);

                hlsInstance.on(Hls.Events.MANIFEST_PARSED, () => {
                    if (tiempoInicioPelicula > 0) {
                        video.currentTime = tiempoInicioPelicula;
                    }
                    video.play().catch(e => console.log("Autoplay bloqueado:", e));
                });

                // Gestor de recuperación automática ante congelamiento/cortes de red
                hlsInstance.on(Hls.Events.ERROR, (event, data) => {
                    if (data.fatal) {
                        switch (data.type) {
                            case Hls.ErrorTypes.NETWORK_ERROR:
                                console.warn("Error de red detectado, reintentando descarga...");
                                hlsInstance.startLoad();
                                break;
                            case Hls.ErrorTypes.MEDIA_ERROR:
                                console.warn("Error en fragmento de medios, autorecuperando...");
                                hlsInstance.recoverMediaError();
                                break;
                            default:
                                console.error("Error fatal irrecuperable. Pasando a nativo.");
                                destruirHls();
                                reproducirDirectoNativo();
                                break;
                        }
                    }
                });

            } else {
                reproducirDirectoNativo();
            }
        }

        function reproducirDirectoNativo() {
            video.src = urlStreamPelicula;

            const aplicarSeekYPlay = () => {
                if (tiempoInicioPelicula > 0 && Math.abs(video.currentTime - tiempoInicioPelicula) > 1) {
                    video.currentTime = tiempoInicioPelicula;
                }
                video.play().catch(e => console.log("Error al reproducir en nativo:", e));
            };

            video.addEventListener('loadedmetadata', aplicarSeekYPlay, { once: true });

            if (video.readyState >= 1) {
                aplicarSeekYPlay();
            }
        }

        // Recuperación ante congelamiento nativo (Safari / MP4 directo)
        video.addEventListener('stalled', () => {
            if (reproduciendoPelicula && !video.paused) {
                console.warn("Detección de congelamiento nativo: re-sincronizando posición");
                video.currentTime = video.currentTime + 0.1;
            }
        });

        video.addEventListener('timeupdate', () => {
            guardarProgreso(video.currentTime);
        });

        window.addEventListener('beforeunload', () => {
            guardarProgreso(video.currentTime, true);
        });
    </script>
</body>
</html>