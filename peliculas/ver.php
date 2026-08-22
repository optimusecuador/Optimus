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
$audio = !empty($pelicula['audio']) ? $pelicula['audio'] : 'No especificado';
$anio = !empty($pelicula['fecha']) ? date('Y', strtotime($pelicula['fecha'])) : 'N/A';
$cats_array = !empty($pelicula['id_categoria']) ? array_map('trim', explode(',', $pelicula['id_categoria'])) : [];

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nombre); ?> - Ver Película</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #141414; color: #ffffff; }
        .container { max-width: 1000px; margin: 0 auto; }
        .btn-volver { display: inline-block; margin-bottom: 20px; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .btn-volver:hover { background-color: #0056b3; }
        
        /* REPRODUCTOR */
        .reproductor-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000; border-radius: 8px; margin-bottom: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.5); }
        .reproductor-container video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; }
        .poster-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-position: center; display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.6); background-blend-mode: darken; z-index: 2; }
        .btn-reproducir { background-color: #e50914; color: white; border: none; padding: 15px 30px; font-size: 18px; font-weight: bold; border-radius: 5px; cursor: pointer; }
        
        /* INFO PELÍCULA */
        .pelicula-detalle { display: flex; gap: 25px; background: #1f1f1f; padding: 25px; border-radius: 8px; }
        .portada-col { flex: 0 0 220px; }
        .portada-img { width: 100%; border-radius: 6px; aspect-ratio: 2 / 3; object-fit: cover; }
        .info-col { flex: 1; }
        .header-info { display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; border-bottom: 1px solid #333; padding-bottom: 20px; }
        .main-details { flex: 1; }
        .rotten-right { display: flex; flex-direction: column; gap: 10px; min-width: 140px; }
        .score-box { background: #2a2a2a; padding: 8px; border-radius: 6px; border-left: 4px solid #e50914; text-align: center; }
        .score-val { font-size: 20px; font-weight: bold; display: block; }
        .meta-item { background: #2a2a2a; padding: 4px 10px; border-radius: 4px; display: inline-block; margin-right: 10px; font-size: 14px; }
        .badge-categoria { display: inline-block; background: #007bff; color: #ffffff; padding: 4px 10px; font-size: 13px; border-radius: 4px; margin: 0 5px 5px 0; }
        
        @media (max-width: 768px) {
            .pelicula-detalle { flex-direction: column; }
            .header-info { flex-direction: column; }
            .rotten-right { flex-direction: row; width: 100%; }
        }
    </style>
</head>
<body>

    <div class="container">
        <a href="index.php" class="btn-volver">← Volver al Catálogo</a>

        <div class="reproductor-container" id="videoContainer">
            <div id="posterOverlay" class="poster-overlay" style="background-image: url('<?php echo htmlspecialchars($portada); ?>');">
                <button class="btn-reproducir" onclick="iniciarReproduccion()">▶ Reproducir Película</button>
            </div>
            <video id="videoPlayer" controls preload="none"></video>
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
                            <span class="meta-item">🔊 <?php echo htmlspecialchars($audio); ?></span>
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
                            <small>Crítica</small>
                        </div>
                        <div class="score-box">
                            <span class="score-val">🍿 <?php echo htmlspecialchars($rotten_audiencia); ?>%</span>
                            <small>Audiencia</small>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;">
                    <strong>Descripción:</strong>
                    <p style="line-height: 1.6; color: #ddd;"><?php echo nl2br(htmlspecialchars($sinopsis)); ?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const urlPelicula = "<?php echo htmlspecialchars($link_video); ?>";
        const urlIntro = "../descripcion/intro.mp4";
        function iniciarReproduccion() {
            const video = document.getElementById('videoPlayer');
            const container = document.getElementById('videoContainer');
            document.getElementById('posterOverlay').style.display = 'none';
            
            if (container.requestFullscreen) container.requestFullscreen();
            
            video.src = urlIntro;
            video.play();
            video.onended = () => { video.src = urlPelicula; video.play(); };
        }
    </script>
</body>
</html>