<?php
// ==============================================================================
// 1. CONEXIÓN A LA BASE DE DATOS Y CONSULTAS CON FILTROS Y PAGINACIÓN
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

// Recoger filtros activos desde la URL (GET)
$filtro_idioma = isset($_GET['idioma']) ? trim($_GET['idioma']) : 'todos';
$filtro_categoria = isset($_GET['categoria']) ? trim($_GET['categoria']) : 'todas';
$filtro_busqueda = isset($_GET['busqueda']) ? trim($_GET['busqueda']) : '';

// Configuración de la paginación (200 resultados por página)
$resultados_por_pagina = 200;
$pagina_actual = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$offset = ($pagina_actual - 1) * $resultados_por_pagina;

// Construir la cláusula WHERE dinámica para las consultas SQL
$where_clauses = [];
$params = [];
$types = "";

if ($filtro_idioma !== '' && $filtro_idioma !== 'todos') {
    // Buscar el idioma dentro del campo 'audio' (ej. si el campo tiene "Español, Inglés")
    $where_clauses[] = "audio LIKE ?";
    $params[] = "%" . $filtro_idioma . "%";
    $types .= "s";
}

if ($filtro_categoria !== '' && $filtro_categoria !== 'todas') {
    // Buscar la categoría dentro del campo 'id_categoria'
    $where_clauses[] = "id_categoria LIKE ?";
    $params[] = "%" . $filtro_categoria . "%";
    $types .= "s";
}

if ($filtro_busqueda !== '') {
    $where_clauses[] = "nombre LIKE ?";
    $params[] = "%" . $filtro_busqueda . "%";
    $types .= "s";
}

$sql_where = "";
if (count($where_clauses) > 0) {
    $sql_where = " WHERE " . implode(" AND ", $where_clauses);
}

// 1. Consulta para contar el total de películas filtradas (para la paginación)
$query_total = "SELECT COUNT(*) as total FROM peliculas" . $sql_where;
if (count($params) > 0) {
    $stmt_total = mysqli_prepare($conexion, $query_total);
    mysqli_stmt_bind_param($stmt_total, $types, ...$params);
    mysqli_stmt_execute($stmt_total);
    $resultado_total = mysqli_stmt_get_result($stmt_total);
} else {
    $resultado_total = mysqli_query($conexion, $query_total);
}
$fila_total = mysqli_fetch_assoc($resultado_total);
$total_peliculas = intval($fila_total['total'] ?? 0);
$total_paginas = max(1, ceil($total_peliculas / $resultados_por_pagina));

if ($pagina_actual > $total_paginas) {
    $pagina_actual = $total_paginas;
    $offset = ($pagina_actual - 1) * $resultados_por_pagina;
}

// 2. Consulta principal de películas con límites de paginación y filtros
$query = "SELECT * FROM peliculas" . $sql_where . " LIMIT ? OFFSET ?";
$params_finales = $params;
$types_finales = $types . "ii";
$params_finales[] = $resultados_por_pagina;
$params_finales[] = $offset;

$stmt = mysqli_prepare($conexion, $query);
if (count($params_finales) > 0) {
    mysqli_stmt_bind_param($stmt, $types_finales, ...$params_finales);
}
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

$peliculas = [];
if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $peliculas[] = $fila;
    }
}

// 3. Consulta global para extraer todos los contadores de categorías e idiomas disponibles (sin filtros de paginación)
$conteo_categorias = [];
$idiomas_disponibles = [];
$query_globales = "SELECT id_categoria, audio FROM peliculas";
$resultado_globales = mysqli_query($conexion, $query_globales);
if ($resultado_globales) {
    while ($fila_g = mysqli_fetch_assoc($resultado_globales)) {
        if (!empty($fila_g['id_categoria'])) {
            $lista = explode(',', $fila_g['id_categoria']);
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
        if (!empty($fila_g['audio'])) {
            $sub_idiomas = explode(',', $fila_g['audio']);
            foreach ($sub_idiomas as $idioma_item) {
                $idioma_limpio = trim($idioma_item);
                if ($idioma_limpio !== '') {
                    $idiomas_disponibles[$idioma_limpio] = true;
                }
            }
        }
    }
    ksort($conteo_categorias);
    $lista_idiomas = array_keys($idiomas_disponibles);
    sort($lista_idiomas);
}

// Consulta de Estrenos recientes
$query_estrenos = "SELECT * FROM peliculas ORDER BY fecha DESC LIMIT 20";
$resultado_estrenos = mysqli_query($conexion, $query_estrenos);
$ultimos_estrenos = [];
if ($resultado_estrenos) {
    while ($fila_estreno = mysqli_fetch_assoc($resultado_estrenos)) {
        $ultimos_estrenos[] = $fila_estreno;
    }
}

// Consulta de Continuar viendo
$query_continuar = "SELECT * FROM peliculas WHERE reproduccion != 0 ORDER BY reproduccion DESC";
$resultado_continuar = mysqli_query($conexion, $query_continuar);
$continuar_viendo = [];
if ($resultado_continuar) {
    while ($fila_cont = mysqli_fetch_assoc($resultado_continuar)) {
        $continuar_viendo[] = $fila_cont;
    }
}

// Función auxiliar para mantener parámetros actuales al paginar
function obtenerUrlPaginacion($nueva_pagina) {
    $_GET['pagina'] = $nueva_pagina;
    return '?' . http_build_query($_GET);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#121212">
    <title>Catálogo de Películas</title>
    <style>
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 15px 10px;
            background-color: #121212;
            color: #e0e0e0;
            overflow-x: hidden;
        }

        .panel-control {
            background: #1e1e1e;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            margin-bottom: 20px;
            border: 1px solid #2c2c2c;
        }

        .filtros-superiores {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .buscador-box {
            flex: 2;
            margin-bottom: 0;
        }

        .select-idioma-box {
            flex: 1;
        }

        .buscador-box input, .select-idioma-box select {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid #333;
            border-radius: 25px;
            background-color: #2c2c2c;
            color: #ffffff;
            outline: none;
            transition: border-color 0.2s, background-color 0.2s;
        }
        
        .buscador-box input::placeholder {
            color: #888;
        }

        .buscador-box input:focus, .select-idioma-box select:focus {
            border-color: #007bff;
            background-color: #1a1a1a;
        }

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
            border: 1px solid #333;
            background: #252525;
            color: #b0b0b0;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
            white-space: nowrap;
            text-decoration: none;
            display: inline-block;
        }

        .btn-filtro:hover {
            background: #333;
            color: #fff;
        }

        .btn-filtro.activo {
            background: #007bff;
            color: #ffffff;
            border-color: #007bff;
        }

        .paginacion-contenedor {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1e1e1e;
            padding: 12px 15px;
            border-radius: 10px;
            margin: 15px 0;
            border: 1px solid #2c2c2c;
            font-size: 13px;
            color: #aaa;
        }

        .paginacion-botones {
            display: flex;
            gap: 8px;
        }

        .btn-pag {
            background: #2c2c2c;
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            border: 1px solid #444;
            transition: background 0.2s;
        }

        .btn-pag:hover:not(.disabled) {
            background: #007bff;
            border-color: #007bff;
        }

        .btn-pag.disabled {
            opacity: 0.4;
            pointer-events: none;
        }

        .seccion-estrenos, .seccion-continuar {
            margin-bottom: 25px;
        }

        .seccion-estrenos h2, .seccion-continuar h2 {
            margin: 0 0 12px 5px;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
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

        .pelicula-card {
            background: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.4);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            border: 1px solid #2c2c2c;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .pelicula-card:hover {
            border-color: #444;
            transform: translateY(-2px);
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
            background-color: #1a1a1a;
            display: block;
        }

        .logo-empresa-overlay {
            position: absolute;
            top: 8px;
            right: 8px;
            max-width: 50px;
            max-height: 25px;
            object-fit: contain;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 3px;
            border-radius: 4px;
            pointer-events: none;
        }

        .tiempo-overlay {
            position: absolute;
            top: 8px;
            left: 8px;
            background-color: rgba(0, 0, 0, 0.85);
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 6px;
            border-radius: 4px;
            pointer-events: none;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .audio-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.95), transparent);
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
            color: #f0f0f0;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .categorias-texto {
            font-size: 11px;
            color: #999;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sin-resultados {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px 20px;
            color: #888;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <div class="panel-control">
        <!-- FORMULARIO DE FILTRADO Y BÚSQUEDA -->
        <form method="GET" action="" id="formFiltros">
            <!-- Mantener la categoría actual si se busca o cambia idioma -->
            <input type="hidden" name="categoria" value="<?php echo htmlspecialchars($filtro_categoria); ?>">
            
            <div class="filtros-superiores">
                <div class="buscador-box">
                    <input 
                        type="text" 
                        name="busqueda" 
                        id="inputBuscador" 
                        placeholder="🔍 Buscar película..." 
                        value="<?php echo htmlspecialchars($filtro_busqueda); ?>"
                    >
                </div>
                
                <div class="select-idioma-box">
                    <select name="idioma" id="selectIdioma" onchange="document.getElementById('formFiltros').submit()">
                        <option value="todos">🌐 Todos los idiomas</option>
                        <?php foreach ($lista_idiomas as $idioma): ?>
                            <option value="<?php echo htmlspecialchars($idioma); ?>" <?php echo ($filtro_idioma === $idioma) ? 'selected' : ''; ?>>
                                🔊 <?php echo htmlspecialchars($idioma); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>

        <!-- BOTONES DE CATEGORÍA -->
        <div class="contenedor-botones">
            <?php 
                $url_todas = "?idioma=" . urlencode($filtro_idioma) . "&busqueda=" . urlencode($filtro_busqueda);
            ?>
            <a href="<?php echo $url_todas; ?>" class="btn-filtro <?php echo ($filtro_categoria === 'todas') ? 'activo' : ''; ?>">
                Todas
            </a>

            <?php foreach ($conteo_categorias as $cat => $cantidad): ?>
                <?php 
                    $url_cat = "?categoria=" . urlencode($cat) . "&idioma=" . urlencode($filtro_idioma) . "&busqueda=" . urlencode($filtro_busqueda);
                ?>
                <a href="<?php echo $url_cat; ?>" class="btn-filtro <?php echo ($filtro_categoria === $cat) ? 'activo' : ''; ?>">
                    <?php echo ucfirst(htmlspecialchars($cat)) . ' (' . $cantidad . ')'; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SECCIÓN ÚLTIMOS ESTRENOS (Se oculta si hay filtros activos) -->
    <?php if (empty($filtro_busqueda) && $filtro_idioma === 'todos' && $filtro_categoria === 'todas' && !empty($ultimos_estrenos)): ?>
        <div class="seccion-estrenos">
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
                            <div class="categorias-texto"><?php echo htmlspecialchars(implode(', ', $cats_estreno)); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- SECCIÓN CONTINUAR VIENDO (Se oculta si hay filtros activos) -->
    <?php if (empty($filtro_busqueda) && $filtro_idioma === 'todos' && $filtro_categoria === 'todas' && !empty($continuar_viendo)): ?>
        <div class="seccion-continuar">
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
                            <div class="categorias-texto"><?php echo htmlspecialchars(implode(', ', $cats_cont)); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- PAGINACIÓN SUPERIOR -->
    <div class="paginacion-contenedor">
        <span>Página <strong><?php echo $pagina_actual; ?></strong> de <strong><?php echo $total_paginas; ?></strong> (Total: <?php echo $total_peliculas; ?> películas)</span>
        <div class="paginacion-botones">
            <a href="<?php echo obtenerUrlPaginacion($pagina_actual - 1); ?>" class="btn-pag <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">⬅ Anterior</a>
            <a href="<?php echo obtenerUrlPaginacion($pagina_actual + 1); ?>" class="btn-pag <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">Siguiente ➡</a>
        </div>
    </div>

    <!-- CATÁLOGO GENERAL -->
    <div class="grid-peliculas" id="contenedorPeliculas">
        <?php if (!empty($peliculas)): ?>
            <?php foreach ($peliculas as $peli): ?>
                <?php 
                    $id_peli = intval($peli['id_peliculas'] ?? 0);
                    $cats_array = array_map('trim', explode(',', $peli['id_categoria']));
                    $nombre = $peli['nombre'] ?? 'Sin nombre';
                    $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                    $audio = !empty($peli['audio']) ? $peli['audio'] : 'LAT';
                    $tiempo_general = floatval($peli['reproduccion'] ?? 0);
                ?>
                <a href="ver.php?id=<?php echo $id_peli; ?>" class="pelicula-card">
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
                        <div class="categorias-texto"><?php echo htmlspecialchars(implode(', ', $cats_array)); ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="sin-resultados">
                No encontramos películas con esos criterios de búsqueda o filtro. 🍿
            </div>
        <?php endif; ?>
    </div>

    <!-- PAGINACIÓN INFERIOR -->
    <div class="paginacion-contenedor">
        <span>Página <strong><?php echo $pagina_actual; ?></strong> de <strong><?php echo $total_paginas; ?></strong></span>
        <div class="paginacion-botones">
            <a href="<?php echo obtenerUrlPaginacion($pagina_actual - 1); ?>" class="btn-pag <?php echo ($pagina_actual <= 1) ? 'disabled' : ''; ?>">⬅ Anterior</a>
            <a href="<?php echo obtenerUrlPaginacion($pagina_actual + 1); ?>" class="btn-pag <?php echo ($pagina_actual >= $total_paginas) ? 'disabled' : ''; ?>">Siguiente ➡</a>
        </div>
    </div>

    <script>
        // Enviar el buscador automáticamente al presionar Enter o escribir (con un pequeño retraso opcional)
        let timerBusqueda;
        const inputBuscador = document.getElementById('inputBuscador');
        if (inputBuscador) {
            inputBuscador.addEventListener('input', function() {
                clearTimeout(timerBusqueda);
                timerBusqueda = setTimeout(() => {
                    document.getElementById('formFiltros').submit();
                }, 600); // Espera 600ms de inactividad para enviar el formulario de búsqueda
            });
        }
    </script>
</body>
</html>