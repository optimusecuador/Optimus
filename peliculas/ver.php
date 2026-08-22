<?php
// ==============================================================================
// 1. CONEXIÓN Y CONSULTA DE LA PELÍCULA SELECCIONADA
// ==============================================================================
require('../conectar.php');

$id_pelicula = isset($_GET['id']) ? intval($_GET['id']) : 0;
$pelicula = null;

if ($id_pelicula > 0) {
    // Consulta con Prepared Statement para mayor seguridad
    $stmt = mysqli_prepare($conexion, "SELECT * FROM peliculas WHERE id = ?");
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

// Si la película no existe en la BD
if (!$pelicula) {
    header("Location: index.php");
    exit();
}

$nombre = $pelicula['nombre'] ?? 'Sin título';
$portada = !empty($pelicula['portada_url']) ? $pelicula['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
$video = !empty($pelicula['video_url']) ? $pelicula['video_url'] : '';
$audio = !empty($pelicula['audio']) ? $pelicula['audio'] : 'No especificado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nombre); ?> - Reproductor</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            width: 100%;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .contenedor-reproductor {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .btn-volver {
            display: inline-block;
            background: #6c757d;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            margin-bottom: 20px;
            transition: background 0.2s ease;
        }

        .btn-volver:hover {
            background: #5a6268;
        }

        .reproductor-header {
            margin-bottom: 20px;
        }

        .reproductor-header h1 {
            margin: 0 0 10px 0;
            color: #333;
            font-size: 24px;
        }

        .info-extra {
            font-size: 14px;
            color: #666;
        }

        .reproductor-contenido {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .reproductor-portada-box {
            position: relative;
            width: 100%;
            max-width: 320px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .reproductor-portada-box img {
            width: 100%;
            aspect-ratio: 2 / 3;
            object-fit: cover;
            display: block;
        }

        .btn-play {
            background: #28a745;
            color: #ffffff;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 30px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 6px rgba(40, 167, 69, 0.3);
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .btn-play:hover {
            background: #218838;
            transform: scale(1.05);
        }

        .video-box {
            width: 100%;
            display: none;
            margin-top: 15px;
            background: #000000;
            border-radius: 8px;
            overflow: hidden;
        }

        .video-box video {
            width: 100%;
            max-height: 500px;
            display: block;
        }
    </style>
</head>
<body>

    <div class="contenedor-reproductor">
        <a href="index.php" class="btn-volver">← Volver al catálogo</a>

        <div class="reproductor-header">
            <h1><?php echo htmlspecialchars($nombre); ?></h1>
            <div class="info-extra">
                <span>🔊 Audio: <strong><?php echo htmlspecialchars($audio); ?></strong></span>
            </div>
        </div>

        <div class="reproductor-contenido">
            <!-- PORTADA INICIAL -->
            <div class="reproductor-portada-box" id="boxPortada">
                <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada de <?php echo htmlspecialchars($nombre); ?>">
            </div>

            <!-- BOTÓN REPRODUCIR -->
            <button class="btn-play" id="btnPlay" onclick="iniciarReproduccion()">
                ▶ Reproducir Película
            </button>

            <!-- CONTENEDOR Y REPRODUCTOR DE VIDEO -->
            <div class="video-box" id="boxVideo">
                <video id="reproductorVideo" controls controlsList="nodownload">
                    <source src="<?php echo htmlspecialchars($video); ?>" type="video/mp4">
                    Tu navegador no soporta la reproducción de video HTML5.
                </video>
            </div>
        </div>
    </div>

    <script>
        function iniciarReproduccion() {
            document.getElementById('boxPortada').style.display = 'none';
            document.getElementById('btnPlay').style.display = 'none';
            document.getElementById('boxVideo').style.display = 'block';

            const video = document.getElementById('reproductorVideo');
            video.play();
        }
    </script>
</body>
</html>