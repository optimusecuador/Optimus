<?php
// ==============================================================================
// 1. CONEXIÓN A LA BASE DE DATOS Y CONSULTAS
// ==============================================================================
require('../conectar.php');

// Función auxiliar para formatear el tiempo en segundos a HH:MM:SS o MM:SS
function formatearTiempo($segundos_totales) {
    $seg = floatval($segundos_totales);
    $horas = floor($seg / 3600);
    $minutos = floor(($seg / 60) % 60);
    $segundos = floor($seg % 60);
    
    if ($horas > 0) {
        return sprintf('%d:%02d:%02d', $horas, $minutos, $segundos);
    } else {
        return sprintf('%02d:%02d', $minutos, $segundos);
    }
}

// Consulta 1: Obtener todas las películas para el catálogo principal
$query = "SELECT * FROM peliculas";
$resultado = mysqli_query($conexion, $query);

$peliculas = [];
$conteo_categorias = [];
$total_peliculas = 0;

if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $peliculas[] = $fila;
        $total_peliculas++;
        
        // Procesar categorías compuestas (ej. "drama, terror")
        if (!empty($fila['id_categoria'])) {
            $lista = explode(',', $fila['id_categoria']);
            foreach ($lista as $cat) {
                $cat_limpia = trim($cat);
                if ($cat_limpia !== '') {
                    if (!isset($conteo_categorias[$cat_limpia])) {
                        $conteo_categorias[$cat_limpia] = 1;
                    } else {
                        $conteo_categorias[$cat_limpia]++;
                    }
                }
            }
        }
    }
    ksort($conteo_categorias);
}

// Consulta 2: Obtener los 20 estrenos más recientes por el campo 'fecha'
$query_estrenos = "SELECT * FROM peliculas ORDER BY fecha DESC LIMIT 20";
$resultado_estrenos = mysqli_query($conexion, $query_estrenos);

$ultimos_estrenos = [];
if ($resultado_estrenos) {
    while ($fila_estreno = mysqli_fetch_assoc($resultado_estrenos)) {
        $ultimos_estrenos[] = $fila_estreno;
    }
}

// Consulta 3: Obtener las películas donde la reproducción sea diferente a 0 (Continuar viendo)
$query_continuar = "SELECT * FROM peliculas WHERE reproduccion != 0 ORDER BY reproduccion DESC";
$resultado_continuar = mysqli_query($conexion, $query_continuar);

$continuar_viendo = [];
if ($resultado_continuar) {
    while ($fila_cont = mysqli_fetch_assoc($resultado_continuar)) {
        $continuar_viendo[] = $fila_cont;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Metadatos cruciales para WebView Android -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#ffffff">
    <title>Catálogo de Películas</title>
    <style>
        /* RESET BÁSICO Y OPTIMIZACIÓN WEBVIEW */
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 15px 10px;
            background-color: #f4f6f8;
            color: #333;
            overflow-x: hidden;
        }

        /* ---------------------------------------------------
           PANEL SUPERIOR (Buscador y Filtros)
           --------------------------------------------------- */
        .panel-control {
            background: #ffffff;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .buscador-box { margin-bottom: 15px; }

        .buscador-box input {
            width: 100%;
            padding: 12px 15px;
            font-size: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 25px;
            background-color: #f9f9f9;
            outline: none;
            transition: border-color 0.2s;
        }
        
        .buscador-box input:focus {
            border-color: #007bff;
            background-color: #ffffff;
        }

        /* Carrusel horizontal de botones para móvil */
        .contenedor-botones {
            display: flex;
            flex-wrap: nowrap;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 5px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }
        .contenedor-botones::-webkit-scrollbar {
            display: none;
        }

        .btn-filtro {
            flex: 0 0 auto;
            padding: 8px 16px;
            cursor: pointer;
            border: 1px solid #dcdcdc;
            background: #ffffff;
            color: #555;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-filtro.activo {
            background: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }

        /* ---------------------------------------------------
           CARRUSELES HORIZONTALES (Estrenos y Continuar Viendo)
           --------------------------------------------------- */
        .seccion-estrenos, .seccion-continuar {
            margin-bottom: 25px;
        }

        .seccion-estrenos h2, .seccion-continuar h2 {
            margin: 0 0 12px 5px;
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }

        .carrusel-estrenos, .carrusel-continuar {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 10px;
            padding-left: 5px;
        }

        .carrusel-estrenos::-webkit-scrollbar, .carrusel-continuar::-webkit-scrollbar { display: none; }
        
        .carrusel-estrenos .pelicula-card, .carrusel-continuar .pelicula-card {
            flex: 0 0 130px; 
            min-width: 130px;
        }

        /* ---------------------------------------------------
           GRILLA PRINCIPAL (2 Columnas en móvil)
           --------------------------------------------------- */
        .grid-peliculas {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            padding: 0 5px;
        }

        @media (min-width: 600px) {
            .grid-peliculas {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }

        /* ---------------------------------------------------
           DISEÑO DE LA TARJETA DE PELÍCULA (Compacto)
           --------------------------------------------------- */
        .pelicula-card {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex;
            flex-direction: column;
            text-decoration: none;
        }

        .portada-link {
            display: block;
            position: relative;
            width: 100%;
        }

        .pelicula-portada {
            width: 100%;
            aspect-ratio: 2 / 3;
            object-fit: cover;
            background-color: #2c2c2c;
            display: block;
        }

        .logo-empresa-overlay {
            position: absolute;
            top: 8px;
            right: 8px;
            max-width: 50px;
            max-height: 25px;
            object-fit: contain;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 3px;
            border-radius: 4px;
            pointer-events: none;
        }

        /* Novedad: Etiqueta de tiempo reproducido */
        .tiempo-overlay {
            position: absolute;
            top: 8px;
            left: 8px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 6px;
            border-radius: 4px;
            pointer-events: none;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .audio-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
            color: #ffffff;
            font-size: 11px;
            padding: 15px 8px 5px 8px;
            text-align: right;
            font-weight: bold;
        }

        .pelicula-info {
            padding: 10px 8px;
            display: flex;
            flex-direction: column;
        }

        .pelicula-card h3 {
            margin: 0 0 4px 0;
            color: #222;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .categorias-texto {
            font-size: 11px;
            color: #777;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sin-resultados {
            display: none;
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px 20px;
            color: #777;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="panel-control">
        <!-- BUSCADOR -->
        <div class="buscador-box">
            <input 
                type="text" 
                id="inputBuscador" 
                placeholder="🔍 Buscar película..." 
                onkeyup="filtrarCatalogo()"
            >
        </div>

        <!-- BOTONES DE CATEGORÍA (Carrusel deslizable) -->
        <div class="contenedor-botones">
            <button 
                class="btn-filtro activo" 
                data-categoria="todas" 
                onclick="seleccionarCategoria('todas', this)"
            >
                Todas (<?php echo $total_peliculas; ?>)
            </button>

            <?php foreach ($conteo_categorias as $categoria => $cantidad): ?>
                <button 
                    class="btn-filtro" 
                    data-categoria="<?php echo htmlspecialchars($categoria); ?>" 
                    onclick="seleccionarCategoria('<?php echo htmlspecialchars($categoria); ?>', this)"
                >
                    <?php echo ucfirst(htmlspecialchars($categoria)) . ' (' . $cantidad . ')'; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SECCIÓN ÚLTIMOS ESTRENOS -->
    <?php if (!empty($ultimos_estrenos)): ?>
        <div class="seccion-estrenos" id="seccionEstrenosContainer">
            <h2>🔥 Últimos Estrenos</h2>
            <div class="carrusel-estrenos">
                <?php foreach ($ultimos_estrenos as $peli_estreno): ?>
                    <?php 
                        $id_estreno = intval($peli_estreno['id_peliculas'] ?? 0);
                        $cats_estreno = array_map('trim', explode(',', $peli_estreno['id_categoria']));
                        $nombre_estreno = $peli_estreno['nombre'] ?? 'Sin nombre';
                        $portada_estreno = !empty($peli_estreno['portada_url']) ? $peli_estreno['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                        $audio_estreno = !empty($peli_estreno['audio']) ? $peli_estreno['audio'] : 'LAT';
                        $tiempo_estreno = floatval($peli_estreno['reproduccion'] ?? 0);
                    ?>
                    <a href="ver.php?id=<?php echo $id_estreno; ?>" class="pelicula-card">
                        <div class="portada-link">
                            <img src="<?php echo htmlspecialchars($portada_estreno); ?>" alt="Portada" class="pelicula-portada">
                            
                            <?php if ($tiempo_estreno > 0): ?>
                                <div class="tiempo-overlay">▶ <?php echo formatearTiempo($tiempo_estreno); ?></div>
                            <?php endif; ?>
                            
                            <img src="../images/empresa/logo.png" alt="Logo" class="logo-empresa-overlay" onerror="this.style.display='none'">
                            <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio_estreno); ?></div>
                        </div>
                        <div class="pelicula-info">
                            <h3><?php echo htmlspecialchars($nombre_estreno); ?></h3>
                            <div class="categorias-texto">
                                <?php echo htmlspecialchars(implode(', ', $cats_estreno)); ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- SECCIÓN CONTINUAR VIENDO -->
    <?php if (!empty($continuar_viendo)): ?>
        <div class="seccion-continuar" id="seccionContinuarContainer">
            <h2>▶ Continuar Viendo</h2>
            <div class="carrusel-continuar">
                <?php foreach ($continuar_viendo as $peli_cont): ?>
                    <?php 
                        $id_cont = intval($peli_cont['id_peliculas'] ?? 0);
                        $cats_cont = array_map('trim', explode(',', $peli_cont['id_categoria']));
                        $nombre_cont = $peli_cont['nombre'] ?? 'Sin nombre';
                        $portada_cont = !empty($peli_cont['portada_url']) ? $peli_cont['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                        $audio_cont = !empty($peli_cont['audio']) ? $peli_cont['audio'] : 'LAT';
                        $tiempo_cont = floatval($peli_cont['reproduccion'] ?? 0);
                    ?>
                    <a href="ver.php?id=<?php echo $id_cont; ?>" class="pelicula-card">
                        <div class="portada-link">
                            <img src="<?php echo htmlspecialchars($portada_cont); ?>" alt="Portada" class="pelicula-portada">
                            
                            <?php if ($tiempo_cont > 0): ?>
                                <div class="tiempo-overlay">▶ <?php echo formatearTiempo($tiempo_cont); ?></div>
                            <?php endif; ?>

                            <img src="../images/empresa/logo.png" alt="Logo" class="logo-empresa-overlay" onerror="this.style.display='none'">
                            <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio_cont); ?></div>
                        </div>
                        <div class="pelicula-info">
                            <h3><?php echo htmlspecialchars($nombre_cont); ?></h3>
                            <div class="categorias-texto">
                                <?php echo htmlspecialchars(implode(', ', $cats_cont)); ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- CATÁLOGO GENERAL -->
    <div class="grid-peliculas" id="contenedorPeliculas">
        <?php foreach ($peliculas as $peli): ?>
            <?php 
                $id_peli = intval($peli['id_peliculas'] ?? 0);
                $cats_array = array_map('trim', explode(',', $peli['id_categoria']));
                $cats_lower = array_map(function($c) { return mb_strtolower($c, 'UTF-8'); }, $cats_array);
                $cats_atributo = implode(',', $cats_lower);
                
                $nombre = $peli['nombre'] ?? 'Sin nombre';
                $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                $audio = !empty($peli['audio']) ? $peli['audio'] : 'LAT';
                $tiempo_general = floatval($peli['reproduccion'] ?? 0);
            ?>
            <a href="ver.php?id=<?php echo $id_peli; ?>" 
               class="pelicula-card" 
               data-titulo="<?php echo htmlspecialchars(mb_strtolower($nombre, 'UTF-8')); ?>" 
               data-categorias="<?php echo htmlspecialchars($cats_atributo); ?>">
               
                <div class="portada-link">
                    <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada" loading="lazy" class="pelicula-portada">
                    
                    <?php if ($tiempo_general > 0): ?>
                        <div class="tiempo-overlay">▶ <?php echo formatearTiempo($tiempo_general); ?></div>
                    <?php endif; ?>

                    <img src="../images/empresa/logo.png" alt="Logo" class="logo-empresa-overlay" onerror="this.style.display='none'">
                    <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio); ?></div>
                </div>

                <div class="pelicula-info">
                    <h3><?php echo htmlspecialchars($nombre); ?></h3>
                    <div class="categorias-texto">
                        <?php echo htmlspecialchars(implode(', ', $cats_array)); ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <div id="sinResultados" class="sin-resultados">
            No encontramos películas con ese término de búsqueda. 🍿
        </div>
    </div>

    <!-- SCRIPT DE FILTRADO OPTIMIZADO -->
    <script>
        let categoriaSeleccionada = 'todas';

        function seleccionarCategoria(categoria, elementoBoton) {
            document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('activo'));
            elementoBoton.classList.add('activo');

            categoriaSeleccionada = categoria.toLowerCase().trim();
            
            filtrarCatalogo();
            
            elementoBoton.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        }

        function filtrarCatalogo() {
            const textoBusqueda = document.getElementById('inputBuscador').value.toLowerCase().trim();
            const tarjetas = document.querySelectorAll('#contenedorPeliculas .pelicula-card');
            const seccionEstrenos = document.getElementById('seccionEstrenosContainer');
            const seccionContinuar = document.getElementById('seccionContinuarContainer');
            let visiblesPeliculas = 0;

            // Ocultar los carruseles especiales si el usuario está haciendo una búsqueda por texto
            if (seccionEstrenos) {
                seccionEstrenos.style.display = (textoBusqueda !== '') ? 'none' : 'block';
            }
            if (seccionContinuar) {
                seccionContinuar.style.display = (textoBusqueda !== '') ? 'none' : 'block';
            }

            tarjetas.forEach(card => {
                const titulo = card.getAttribute('data-titulo');
                const categorias = card.getAttribute('data-categorias').split(',');

                const coincideTexto = (textoBusqueda === '') || titulo.includes(textoBusqueda);
                const coincideCategoria = (categoriaSeleccionada === 'todas') || categorias.includes(categoriaSeleccionada);

                if (coincideTexto && coincideCategoria) {
                    card.style.display = 'flex';
                    visiblesPeliculas++;
                } else {
                    card.style.display = 'none';
                }
            });

            const sinResultados = document.getElementById('sinResultados');
            if (visiblesPeliculas === 0 && tarjetas.length > 0) {
                sinResultados.style.display = 'block';
            } else {
                sinResultados.style.display = 'none';
            }
        }
    </script>
</body>
</html>