<?php
$id_pelicula = isset($_GET['id']) ? intval($_GET['id']) : 0;
$url_stream = isset($_GET['url']) ? urldecode($_GET['url']) : '';
$tiempo_inicio = isset($_GET['tiempo']) ? floatval($_GET['tiempo']) : 0;

if ($id_pelicula <= 0 || empty($url_stream)) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Reproduciendo Película</title>
    
    <!-- Librería ultrarrápida Hls.js -->
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; background-color: #000; overflow: hidden; width: 100vw; height: 100vh; }
        .video-container { width: 100vw; height: 100vh; position: relative; background-color: #000; }
        video { width: 100%; height: 100%; object-fit: contain; background-color: #000; }
        .btn-volver { position: absolute; top: 15px; left: 15px; z-index: 999; background: rgba(0,0,0,0.7); color: white; border: 1px solid #555; padding: 8px 15px; border-radius: 4px; text-decoration: none; font-weight: bold; font-family: Arial, sans-serif; }
    </style>
</head>
<body>

    <a href="ver.php?id=<?php echo $id_pelicula; ?>" class="btn-volver">← Volver</a>

    <div class="video-container">
        <video id="videoPlayer" controls autoplay playsinline webkit-playsinline crossorigin="anonymous"></video>
    </div>

    <script>
        const idPelicula = <?php echo $id_pelicula; ?>;
        const urlStream = "<?php echo $url_stream; ?>";
        const tiempoInicio = <?php echo $tiempo_inicio; ?>;

        const video = document.getElementById('videoPlayer');
        let ultimoTiempoEnviado = 0;
        let wakeLockSentinel = null;

        document.addEventListener('DOMContentLoaded', () => {
            solicitarWakeLock();
            solicitarPantallaCompleta();
            iniciarReproductorVeloz();
        });

        function solicitarPantallaCompleta() {
            const elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen().catch(() => {});
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE/Edge */
                elem.msRequestFullscreen();
            }
        }

        async function solicitarWakeLock() {
            if ('wakeLock' in navigator) {
                try {
                    wakeLockSentinel = await navigator.wakeLock.request('screen');
                } catch (err) {
                    console.log("Wake Lock error:", err);
                }
            }
        }

        function guardarProgreso(tiempoActual, forzar = false) {
            if (!forzar && Math.abs(tiempoActual - ultimoTiempoEnviado) < 5) return;
            ultimoTiempoEnviado = tiempoActual;

            navigator.sendBeacon('guardar_progreso.php', new URLSearchParams({
                id: idPelicula,
                tiempo: Math.floor(tiempoActual)
            }));
        }

        function iniciarReproductorVeloz() {
            const esMp4 = urlStream.toLowerCase().includes('.mp4');

            if (esMp4) {
                video.src = urlStream;
                if (tiempoInicio > 0) video.currentTime = tiempoInicio;
                video.play().catch(e => console.log("Error al reproducir MP4:", e));
            
            } else if (Hls.isSupported()) {
                const hls = new Hls({
                    maxBufferLength: 10,
                    maxMaxBufferLength: 30,
                    enableWorker: true,
                    lowLatencyMode: true,
                    backBufferLength: 10
                });

                hls.loadSource(urlStream);
                hls.attachMedia(video);

                hls.on(Hls.Events.MANIFEST_PARSED, () => {
                    if (tiempoInicio > 0) {
                        video.currentTime = tiempoInicio;
                    }
                    video.play().catch(e => console.log("Error autoplay HLS:", e));
                });

                hls.on(Hls.Events.ERROR, (event, data) => {
                    if (data.fatal) {
                        console.warn("Fallo fatal en HLS.js, intentando recuperación nativa...");
                        video.src = urlStream;
                        if (tiempoInicio > 0) video.currentTime = tiempoInicio;
                        video.play();
                    }
                });

            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = urlStream;
                video.addEventListener('loadedmetadata', () => {
                    if (tiempoInicio > 0) video.currentTime = tiempoInicio;
                    video.play();
                });
            }
        }

        document.body.addEventListener('click', solicitarPantallaCompleta, { once: true });

        video.addEventListener('timeupdate', () => {
            guardarProgreso(video.currentTime);
        });

        window.addEventListener('beforeunload', () => {
            guardarProgreso(video.currentTime, true);
        });
    </script>
</body>
</html>