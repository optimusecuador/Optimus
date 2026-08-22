<?php
// ==============================================================================
// 1. CONEXIÓN Y OBTENCIÓN DE LA PELÍCULA
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

// PROCESAR AUDIOS (Separar por comas para el Select)
$audio_str = !empty($pelicula['audio']) ? $pelicula['audio'] : 'LAT';
$audio_array = array_map('trim', explode(',', $audio_str));

$rotten_critica = $pelicula['rotten_tomates'] ?? '0';
$rotten_audiencia = $pelicula['rotten_audiencia'] ?? '0';

$link_video = trim($pelicula['pelicula_url'] ?? '');
if (strpos($link_video, '/var/www/') === 0) {
    $link_video = str_replace('/var/www', '', $link_video);
    $link_video = str_replace(' ', '%20', $link_video);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo htmlspecialchars($nombre); ?> - Ver Película</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 15px; background-color: #141414; color: #ffffff; overflow-x: hidden; }
        .container { max-width: 1000px; margin: 0 auto; }
        .btn-volver { display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        
        /* REPRODUCTOR BASE */
        .reproductor-container { 
            position: relative; 
            padding-bottom: 56.25%; 
            height: 0; 
            overflow: hidden; 
            background: #000; 
            border-radius: 8px; 
            margin-bottom: 25px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.5); 
            transition: all 0.3s ease;
        }

        /* 1. PANTALLA COMPLETA NORMAL */
        .app-fullscreen-normal {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            padding-bottom: 0 !important;
            z-index: 99999 !important;
            border-radius: 0 !important;
            background: #000 !important;
            transform: none !important;
        }

        /* 2. PANTALLA COMPLETA ROTADA */
        .app-fullscreen-rotated {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            width: 100vh !important;
            height: 100vw !important;
            padding-bottom: 0 !important;
            z-index: 99999 !important;
            border-radius: 0 !important;
            background: #000 !important;
            transform: translate(-50%, -50%) rotate(90deg) !important;
        }

        .reproductor-container video { 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            border: 0; 
            object-fit: contain; 
        }

        .poster-overlay { 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background-size: cover; 
            background-position: center; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            background-color: rgba(0, 0, 0, 0.7); 
            background-blend-mode: darken; 
            z-index: 2; 
        }

        /* NUEVOS ESTILOS PARA LA SELECCIÓN DE AUDIO */
        .controles-pre-play {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            z-index: 3;
        }

        .select-audio {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 2px solid #333;
            background: rgba(20, 20, 20, 0.9);
            color: #fff;
            font-weight: bold;
            outline: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-reproducir { 
            background-color: #e50914; 
            color: white; 
            border: none; 
            padding: 15px 30px; 
            font-size: 18px; 
            font-weight: bold; 
            border-radius: 5px; 
            cursor: pointer; 
            -webkit-tap-highlight-color: transparent; 
        }
        
        /* INFO PELÍCULA */
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
        }
    </style>
</head>
<body>

    <div class="container" id="mainContainer">
        <a href="index.php" class="btn-volver" id="btnVolver">← Volver al Catálogo</a>

        <div class="reproductor-container" id="videoContainer">
            <div id="posterOverlay" class="poster-overlay" style="background-image: url('<?php echo htmlspecialchars($portada); ?>');">
                
                <!-- SECCIÓN DE SELECCIÓN DE AUDIO Y PLAY -->
                <div class="controles-pre-play">
                    <select id="audioSelector" class="select-audio">
                        <?php foreach ($audio_array as $index => $idioma): ?>
                            <option value="<?php echo $index; ?>">🔊 Audio: <?php echo htmlspecialchars(ucfirst($idioma)); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn-reproducir" onclick="iniciarReproduccion()">▶ Reproducir Película</button>
                </div>

            </div>
            
            <video id="videoPlayer" controls playsinline webkit-playsinline preload="none"></video>
        </div>

        <div class="pelicula-detalle" id="detallePelicula">
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
        const urlPelicula = "<?php echo htmlspecialchars($link_video); ?>";
        const urlIntro = "../descripcion/intro.mp4";
        const video = document.getElementById('videoPlayer');
        let isFakeFullscreen = false;

        function ajustarOrientacion() {
            if (!isFakeFullscreen) return;
            const container = document.getElementById('videoContainer');
            
            if (window.innerHeight > window.innerWidth) {
                container.classList.remove('app-fullscreen-normal');
                container.classList.add('app-fullscreen-rotated');
            } else {
                container.classList.remove('app-fullscreen-rotated');
                container.classList.add('app-fullscreen-normal');
            }
        }

        // Esta función se encarga de cambiar la pista de audio internamente en el Video
        function aplicarPistaDeAudio() {
            const selector = document.getElementById('audioSelector');
            const trackIndex = parseInt(selector.value); // Obtiene 0, 1, 2, etc.

            // Verifica si el navegador soporta la API experimental de múltiples audios
            if (video.audioTracks && video.audioTracks.length > 0) {
                for (let i = 0; i < video.audioTracks.length; i++) {
                    // Solo habilita la pista que coincida con el índice seleccionado
                    video.audioTracks[i].enabled = (i === trackIndex);
                }
                console.log("Audio cambiado exitosamente a la pista:", trackIndex);
            } else {
                console.warn("El navegador/WebView actual no expone la API audioTracks para elegir idiomas nativamente.");
            }
        }

        function iniciarReproduccion() {
            const container = document.getElementById('videoContainer');
            
            document.getElementById('posterOverlay').style.display = 'none';
            
            isFakeFullscreen = true;
            ajustarOrientacion();
            window.addEventListener('resize', ajustarOrientacion);
            window.addEventListener('orientationchange', ajustarOrientacion);

            if (container.requestFullscreen) {
                container.requestFullscreen().catch(() => {});
            }

            // Escuchamos el momento exacto en el que el video carga su información (duración, audios, etc)
            video.onloadedmetadata = () => {
                // Solo cambiamos el audio si está cargando la película real y no el intro
                if (video.src.includes(urlPelicula)) {
                    aplicarPistaDeAudio();
                }
            };

            // 1. Iniciar video con intro
            video.src = urlIntro;
            video.play().catch(e => console.log("Error intro:", e));
            
            // 2. Al terminar el intro, pasamos a la película
            video.onended = () => {
                video.src = urlPelicula;
                video.play().catch(e => console.log("Error película:", e));
            };
        }

        // Detectar si sale de pantalla completa nativa para resetear todo
        document.addEventListener('fullscreenchange', () => {
            if (!document.fullscreenElement) {
                isFakeFullscreen = false;
                const container = document.getElementById('videoContainer');
                container.classList.remove('app-fullscreen-normal');
                container.classList.remove('app-fullscreen-rotated');
                window.removeEventListener('resize', ajustarOrientacion);
                window.removeEventListener('orientationchange', ajustarOrientacion);
            }
        });
    </script>
</body>
</html>