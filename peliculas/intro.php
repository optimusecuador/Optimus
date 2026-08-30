<?php
$id_pelicula = isset($_GET['id']) ? intval($_GET['id']) : 0;
$url_stream = isset($_GET['url']) ? $_GET['url'] : '';
$tiempo = isset($_GET['tiempo']) ? floatval($_GET['tiempo']) : 0;

if ($id_pelicula <= 0 || empty($url_stream)) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproduciendo Intro...</title>
    <style>
        body { margin: 0; padding: 0; background-color: #000; overflow: hidden; display: flex; justify-content: center; align-items: center; height: 100vh; }
        video { width: 100vw; height: 100vh; object-fit: contain; }
    </style>
</head>
<body>

    <video id="introVideo" autoplay playsinline webkit-playsinline src="../descripcion/intro.mp4"></video>

    <script>
        const idPelicula = <?php echo $id_pelicula; ?>;
        const urlStream = "<?php echo urlencode($url_stream); ?>";
        const tiempo = <?php echo $tiempo; ?>;
        const video = document.getElementById('introVideo');

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

        function irAReproduccion() {
            window.location.href = `reproduccion.php?id=${idPelicula}&url=${urlStream}&tiempo=${tiempo}`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            solicitarPantallaCompleta();
            
            video.play().catch(() => {
                irAReproduccion();
            });
        });

        // Intentar activar pantalla completa también al tocar/hacer clic si fue bloqueado por el navegador
        document.body.addEventListener('click', solicitarPantallaCompleta, { once: true });

        video.addEventListener('ended', irAReproduccion);
    </script>
</body>
</html>