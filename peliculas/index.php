<?php
// ==============================================================================
// 1. CONEXIÓN A LA BASE DE DATOS Y CONSULTAS
// ==============================================================================
require('../conectar.php');[cite: 4]

// Consulta 1: Obtener todas las películas para el catálogo principal
$query = "SELECT * FROM peliculas";[cite: 4]
$resultado = mysqli_query($conexion, $query);[cite: 4]

$peliculas = [];[cite: 4]
$conteo_categorias = [];[cite: 4]
$total_peliculas = 0;[cite: 4]

if ($resultado) {[cite: 4]
    while ($fila = mysqli_fetch_assoc($resultado)) {[cite: 4]
        $peliculas[] = $fila;[cite: 4]
        $total_peliculas++;[cite: 4]
        
        // Procesar categorías compuestas (ej. "drama, terror")
        if (!empty($fila['id_categoria'])) {[cite: 4]
            $lista = explode(',', $fila['id_categoria']);[cite: 4]
            foreach ($lista as $cat) {[cite: 4]
                $cat_limpia = trim($cat);[cite: 4]
                if ($cat_limpia !== '') {[cite: 4]
                    if (!isset($conteo_categorias[$cat_limpia])) {[cite: 4]
                        $conteo_categorias[$cat_limpia] = 1;[cite: 4]
                    } else {[cite: 4]
                        $conteo_categorias[$cat_limpia]++;[cite: 4]
                    }
                }
            }
        }
    }
    ksort($conteo_categorias);[cite: 4]
}

// Consulta 2: Obtener los 20 estrenos más recientes por el campo 'fecha'
$query_estrenos = "SELECT * FROM peliculas ORDER BY fecha DESC LIMIT 20";[cite: 4]
$resultado_estrenos = mysqli_query($conexion, $query_estrenos);[cite: 4]

$ultimos_estrenos = [];[cite: 4]
if ($resultado_estrenos) {[cite: 4]
    while ($fila_estreno = mysqli_fetch_assoc($resultado_estrenos)) {[cite: 4]
        $ultimos_estrenos[] = $fila_estreno;[cite: 4]
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">[cite: 4]
    <meta name="theme-color" content="#ffffff">[cite: 4]
    <title>Catálogo de Películas</title>[cite: 4]
    <style>
        /* RESET BÁSICO Y OPTIMIZACIÓN WEBVIEW */
        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;[cite: 4]
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;[cite: 4]
            margin: 0;[cite: 4]
            padding: 15px 10px;[cite: 4]
            background-color: #f4f6f8;[cite: 4]
            color: #333;[cite: 4]
            overflow-x: hidden;[cite: 4]
        }

        /* ---------------------------------------------------
           PANEL SUPERIOR (Buscador y Filtros)
           --------------------------------------------------- */
        .panel-control {
            background: #ffffff;[cite: 4]
            padding: 15px;[cite: 4]
            border-radius: 12px;[cite: 4]
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);[cite: 4]
            margin-bottom: 20px;[cite: 4]
        }

        .buscador-box { margin-bottom: 15px; }[cite: 4]

        .buscador-box input {
            width: 100%;[cite: 4]
            padding: 12px 15px;[cite: 4]
            font-size: 15px;[cite: 4]
            border: 1px solid #e0e0e0;[cite: 4]
            border-radius: 25px;[cite: 4]
            background-color: #f9f9f9;[cite: 4]
            outline: none;[cite: 4]
            transition: border-color 0.2s;[cite: 4]
        }
        
        .buscador-box input:focus {
            border-color: #007bff;[cite: 4]
            background-color: #ffffff;[cite: 4]
        }

        /* Carrusel horizontal de botones para móvil */
        .contenedor-botones {
            display: flex;[cite: 4]
            flex-wrap: nowrap;[cite: 4]
            gap: 8px;[cite: 4]
            overflow-x: auto;[cite: 4]
            padding-bottom: 5px;[cite: 4]
            -webkit-overflow-scrolling: touch;[cite: 4]
            scrollbar-width: none;[cite: 4]
        }
        .contenedor-botones::-webkit-scrollbar {
            display: none;[cite: 4]
        }

        .btn-filtro {
            flex: 0 0 auto;[cite: 4]
            padding: 8px 16px;[cite: 4]
            cursor: pointer;[cite: 4]
            border: 1px solid #dcdcdc;[cite: 4]
            background: #ffffff;[cite: 4]
            color: #555;[cite: 4]
            border-radius: 20px;[cite: 4]
            font-size: 13px;[cite: 4]
            font-weight: 600;[cite: 4]
            transition: all 0.2s ease;[cite: 4]
            white-space: nowrap;[cite: 4]
        }

        .btn-filtro.activo {
            background: #007bff;[cite: 4]
            color: #ffffff;[cite: 4]
            border-color: #007bff;[cite: 4]
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
            display: grid;[cite: 4]
            grid-template-columns: repeat(2, 1fr);[cite: 4]
            gap: 12px;[cite: 4]
            padding: 0 5px;[cite: 4]
        }

        @media (min-width: 600px) {
            .grid-peliculas {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));[cite: 4]
            }
        }

        /* ---------------------------------------------------
           DISEÑO DE LA TARJETA DE PELÍCULA (Compacto)
           --------------------------------------------------- */
        .pelicula-card {
            background: #ffffff;[cite: 4]
            border-radius: 10px;[cite: 4]
            overflow: hidden;[cite: 4]
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);[cite: 4]
            display: flex;[cite: 4]
            flex-direction: column;[cite: 4]
            text-decoration: none;[cite: 4]
        }

        .portada-link {
            display: block;[cite: 4]
            position: relative;[cite: 4]
            width: 100%;[cite: 4]
        }

        .pelicula-portada {
            width: 100%;[cite: 4]
            aspect-ratio: 2 / 3;[cite: 4]
            object-fit: cover;[cite: 4]
            background-color: #2c2c2c;[cite: 4]
            display: block;[cite: 4]
        }

        .logo-empresa-overlay {
            position: absolute;[cite: 4]
            top: 8px;[cite: 4]
            right: 8px;[cite: 4]
            max-width: 50px;[cite: 4]
            max-height: 25px;[cite: 4]
            object-fit: contain;[cite: 4]
            background-color: rgba(255, 255, 255, 0.7);[cite: 4]
            padding: 3px;[cite: 4]
            border-radius: 4px;[cite: 4]
            pointer-events: none;[cite: 4]
        }

        .audio-overlay {
            position: absolute;[cite: 4]
            bottom: 0;[cite: 4]
            left: 0;[cite: 4]
            width: 100%;[cite: 4]
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);[cite: 4]
            color: #ffffff;[cite: 4]
            font-size: 11px;[cite: 4]
            padding: 15px 8px 5px 8px;[cite: 4]
            text-align: right;[cite: 4]
            font-weight: bold;[cite: 4]
        }

        .pelicula-info {
            padding: 10px 8px;[cite: 4]
            display: flex;[cite: 4]
            flex-direction: column;[cite: 4]
        }

        .pelicula-card h3 {
            margin: 0 0 4px 0;[cite: 4]
            color: #222;[cite: 4]
            font-size: 13px;[cite: 4]
            font-weight: 600;[cite: 4]
            white-space: nowrap;[cite: 4]
            overflow: hidden;[cite: 4]
            text-overflow: ellipsis;[cite: 4]
        }

        .categorias-texto {
            font-size: 11px;[cite: 4]
            color: #777;[cite: 4]
            white-space: nowrap;[cite: 4]
            overflow: hidden;[cite: 4]
            text-overflow: ellipsis;[cite: 4]
        }

        /* ---------------------------------------------------
           SECCIÓN DE ACTORES / ARTISTAS EN BÚSQUEDA
           --------------------------------------------------- */
        .seccion-actores-resultado {
            margin-top: 30px;[cite: 4]
            display: none;[cite: 4]
        }

        .seccion-actores-resultado h2 {
            margin: 0 0 12px 5px;[cite: 4]
            font-size: 18px;[cite: 4]
            font-weight: bold;[cite: 4]
            color: #222;[cite: 4]
        }

        .grid-actores {
            display: flex;[cite: 4]
            gap: 15px;[cite: 4]
            overflow-x: auto;[cite: 4]
            scroll-behavior: smooth;[cite: 4]
            -webkit-overflow-scrolling: touch;[cite: 4]
            padding-bottom: 10px;[cite: 4]
            padding-left: 5px;[cite: 4]
        }
        .grid-actores::-webkit-scrollbar { display: none; }[cite: 4]

        .actor-card {
            background: #ffffff;[cite: 4]
            border-radius: 10px;[cite: 4]
            padding: 10px;[cite: 4]
            text-align: center;[cite: 4]
            flex: 0 0 110px;[cite: 4]
            min-width: 110px;[cite: 4]
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);[cite: 4]
        }

        .actor-img {
            width: 70px;[cite: 4]
            height: 70px;[cite: 4]
            border-radius: 50%;[cite: 4]
            object-fit: cover;[cite: 4]
            margin: 0 auto 8px auto;[cite: 4]
            background-color: #ddd;[cite: 4]
            display: block;[cite: 4]
        }

        .actor-nombre {
            font-size: 12px;[cite: 4]
            font-weight: 600;[cite: 4]
            color: #333;[cite: 4]
            white-space: nowrap;[cite: 4]
            overflow: hidden;[cite: 4]
            text-overflow: ellipsis;[cite: 4]
        }

        .sin-resultados {
            display: none;[cite: 4]
            grid-column: 1 / -1;[cite: 4]
            text-align: center;[cite: 4]
            padding: 40px 20px;[cite: 4]
            color: #777;[cite: 4]
            font-size: 16px;[cite: 4]
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
                placeholder="🔍 Buscar película o actor..." 
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
                Todas (<?php echo $total_peliculas; ?>)[cite: 4]
            </button>

            <?php foreach ($conteo_categorias as $categoria => $cantidad): ?>
                <button 
                    class="btn-filtro" 
                    data-categoria="<?php echo htmlspecialchars($categoria); ?>" 
                    onclick="seleccionarCategoria('<?php echo htmlspecialchars($categoria); ?>', this)"
                >
                    <?php echo ucfirst(htmlspecialchars($categoria)) . ' (' . $cantidad . ')'; ?>[cite: 4]
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
                    ?>
                    <a href="ver.php?id=<?php echo $id_estreno; ?>" class="pelicula-card">
                        <div class="portada-link">
                            <img src="<?php echo htmlspecialchars($portada_estreno); ?>" alt="Portada" class="pelicula-portada">
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
                    ?>
                    <a href="ver.php?id=<?php echo $id_cont; ?>" class="pelicula-card">
                        <div class="portada-link">
                            <img src="<?php echo htmlspecialchars($portada_cont); ?>" alt="Portada" class="pelicula-portada">
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
                
                $nombre = $peli['nombre'] ?? 'Sin nombre';[cite: 4]
                $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';[cite: 4]
                $audio = !empty($peli['audio']) ? $peli['audio'] : 'LAT';[cite: 4]
                
                $actores_raw = $peli['actores'] ?? '';[cite: 4]
            ?>
            <a href="ver.php?id=<?php echo $id_peli; ?>" 
               class="pelicula-card" 
               data-titulo="<?php echo htmlspecialchars(mb_strtolower($nombre, 'UTF-8')); ?>" 
               data-categorias="<?php echo htmlspecialchars($cats_atributo); ?>"
               data-actores="<?php echo htmlspecialchars(mb_strtolower($actores_raw, 'UTF-8')); ?>">[cite: 4]
               
                <div class="portada-link">
                    <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada" loading="lazy" class="pelicula-portada">[cite: 4]
                    <img src="../images/empresa/logo.png" alt="Logo" class="logo-empresa-overlay" onerror="this.style.display='none'">[cite: 4]
                    <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio); ?></div>[cite: 4]
                </div>

                <div class="pelicula-info">
                    <h3><?php echo htmlspecialchars($nombre); ?></h3>[cite: 4]
                    <div class="categorias-texto">
                        <?php echo htmlspecialchars(implode(', ', $cats_array)); ?>[cite: 4]
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <div id="sinResultados" class="sin-resultados">
            No encontramos películas o actores con ese término de búsqueda. 🍿[cite: 4]
        </div>
    </div>

    <!-- SECCIÓN DE ACTORES ENCONTRADOS (DINÁMICA VÍA JS) -->
    <div class="seccion-actores-resultado" id="seccionActoresResultado">
        <h2>⭐ Actores</h2>[cite: 4]
        <div class="grid-actores" id="contenedorActoresResultado">
            <!-- Se inyectarán dinámicamente aquí los actores coincidentes -->[cite: 4]
        </div>
    </div>

    <!-- SCRIPT DE FILTRADO Y BÚSQUEDA DE ACTORES -->
    <script>
        let categoriaSeleccionada = 'todas';[cite: 4]

        function seleccionarCategoria(categoria, elementoBoton) {
            document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('activo'));[cite: 4]
            elementoBoton.classList.add('activo');[cite: 4]

            categoriaSeleccionada = categoria.toLowerCase().trim();[cite: 4]
            
            filtrarCatalogo();[cite: 4]
            
            elementoBoton.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });[cite: 4]
        }

        function filtrarCatalogo() {
            const textoBusqueda = document.getElementById('inputBuscador').value.toLowerCase().trim();[cite: 4]
            const tarjetas = document.querySelectorAll('#contenedorPeliculas .pelicula-card');[cite: 4]
            const seccionEstrenos = document.getElementById('seccionEstrenosContainer');[cite: 4]
            const seccionContinuar = document.getElementById('seccionContinuarContainer');
            let visiblesPeliculas = 0;[cite: 4]

            // Ocultar los carruseles especiales si el usuario está haciendo una búsqueda por texto
            if (seccionEstrenos) {
                seccionEstrenos.style.display = (textoBusqueda !== '') ? 'none' : 'block';[cite: 4]
            }
            if (seccionContinuar) {
                seccionContinuar.style.display = (textoBusqueda !== '') ? 'none' : 'block';
            }

            let actoresEncontradosUnicos = new Map();[cite: 4]

            tarjetas.forEach(card => {
                const titulo = card.getAttribute('data-titulo');[cite: 4]
                const categorias = card.getAttribute('data-categorias').split(',');[cite: 4]
                const actoresTexto = card.getAttribute('data-actores');[cite: 4]

                const coincideTextoTitulo = titulo.includes(textoBusqueda);[cite: 4]
                const coincideTextoActores = actoresTexto.includes(textoBusqueda);[cite: 4]
                const coincideTexto = (textoBusqueda === '') || coincideTextoTitulo || coincideTextoActores;[cite: 4]

                const coincideCategoria = (categoriaSeleccionada === 'todas') || categorias.includes(categoriaSeleccionada);[cite: 4]

                if (coincideTexto && coincideCategoria) {
                    card.style.display = 'flex';[cite: 4]
                    visiblesPeliculas++;[cite: 4]

                    if (textoBusqueda !== '' && coincideTextoActores) {
                        let listaActoresPeli = actoresTexto.split(',');[cite: 4]
                        listaActoresPeli.forEach(actorCrudo => {
                            let nombreActor = actorCrudo.trim();[cite: 4]
                            if (nombreActor.toLowerCase().includes(textoBusqueda) && nombreActor !== '') {[cite: 4]
                                let nombreFormateado = nombreActor.replace(/\w\S*/g, (txt) => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());[cite: 4]
                                
                                if (!actoresEncontradosUnicos.has(nombreFormateado)) {
                                    let imgActor = `../images/actores/${encodeURIComponent(nombreFormateado)}.jpg`;[cite: 4]
                                    actoresEncontradosUnicos.set(nombreFormateado, imgActor);[cite: 4]
                                }
                            }
                        });
                    }
                } else {
                    card.style.display = 'none';[cite: 4]
                }
            });

            const contenedorActores = document.getElementById('contenedorActoresResultado');[cite: 4]
            const seccionActoresDiv = document.getElementById('seccionActoresResultado');[cite: 4]
            contenedorActores.innerHTML = '';[cite: 4]

            if (textoBusqueda !== '' && actoresEncontradosUnicos.size > 0) {
                seccionActoresDiv.style.display = 'block';[cite: 4]
                actoresEncontradosUnicos.forEach((imgUrl, nombre) => {
                    let tarjetaActorHTML = `
                        <div class="actor-card">
                            <img src="${imgUrl}" alt="${nombre}" class="actor-img" onerror="this.src='https://via.placeholder.com/70?text=Actor'">
                            <div class="actor-nombre" title="${nombre}">${nombre}</div>
                        </div>
                    `;[cite: 4]
                    contenedorActores.innerHTML += tarjetaActorHTML;[cite: 4]
                });
            } else {
                seccionActoresDiv.style.display = 'none';[cite: 4]
            }

            const sinResultados = document.getElementById('sinResultados');[cite: 4]
            if (visiblesPeliculas === 0 && tarjetas.length > 0) {
                sinResultados.style.display = 'block';[cite: 4]
            } else {
                sinResultados.style.display = 'none';[cite: 4]
            }
        }
    </script>
</body>
</html>