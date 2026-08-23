<?php
// ==============================================================================
// 1. CONEXIÓN A LA BASE DE DATOS Y CONSULTAS
// ==============================================================================
require('../conectar.php');

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
            -webkit-tap-highlight-color: transparent; /* Quita el cuadro azul al tocar en Android */
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
            border-radius: 25px; /* Aspecto más moderno */
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
            scrollbar-width: none; /* Oculta scrollbar en Firefox */
        }
        .contenedor-botones::-webkit-scrollbar {
            display: none; /* Oculta scrollbar en Chrome/Safari/Webview */
        }

        .btn-filtro {
            flex: 0 0 auto; /* Evita que los botones se encojan */
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
           CARRUSEL DE ESTRENOS (Horizontal)
           --------------------------------------------------- */
        .seccion-estrenos {
            margin-bottom: 25px;
        }

        .seccion-estrenos h2 {
            margin: 0 0 12px 5px;
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }

        .carrusel-estrenos {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 10px;
            padding-left: 5px; /* Margen estético */
        }

        .carrusel-estrenos::-webkit-scrollbar { display: none; }
        
        /* Tarjetas más angostas en el carrusel para que se vea que hay más */
        .carrusel-estrenos .pelicula-card {
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
            aspect-ratio: 2 / 3; /* Mantiene proporción de póster perfecta */
            object-fit: cover;
            background-color: #2c2c2c;
            display: block;
        }

        /* Overlays adaptados a móvil */
        .logo-empresa-overlay {
            position: absolute;
            top: 8px;
            right: 8px;
            max-width: 50px; /* Más pequeño para no tapar portadas */
            max-height: 25px;
            object-fit: contain;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 3px;
            border-radius: 4px;
            pointer-events: none;
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

        /* Textos inferiores de la tarjeta */
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

        /* ---------------------------------------------------
           SECCIÓN DE ACTORES / ARTISTAS EN BÚSQUEDA
           --------------------------------------------------- */
        .seccion-actores-resultado {
            margin-top: 30px;
            display: none; /* Se activa mediante JS si hay resultados de búsqueda */
        }

        .seccion-actores-resultado h2 {
            margin: 0 0 12px 5px;
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }

        .grid-actores {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 10px;
            padding-left: 5px;
        }
        .grid-actores::-webkit-scrollbar { display: none; }

        .actor-card {
            background: #ffffff;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            flex: 0 0 110px;
            min-width: 110px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .actor-img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 8px auto;
            background-color: #ddd;
            display: block;
        }

        .actor-nombre {
            font-size: 12px;
            font-weight: 600;
            color: #333;
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

    <!-- CATÁLOGO GENERAL -->
    <div class="grid-peliculas" id="contenedorPeliculas">
        <?php foreach ($peliculas as $peli): ?>
            <?>
            <?php 
                $id_peli = intval($peli['id_peliculas'] ?? 0);
                $cats_array = array_map('trim', explode(',', $peli['id_categoria']));
                $cats_lower = array_map(function($c) { return mb_strtolower($c, 'UTF-8'); }, $cats_array);
                $cats_atributo = implode(',', $cats_lower);
                
                $nombre = $peli['nombre'] ?? 'Sin nombre';
                $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                $audio = !empty($peli['audio']) ? $peli['audio'] : 'LAT';
                
                // Procesar actores almacenados en el campo correspondiente
                $actores_raw = $peli['actores'] ?? '';
            ?>
            <a href="ver.php?id=<?php echo $id_peli; ?>" 
               class="pelicula-card" 
               data-titulo="<?php echo htmlspecialchars(mb_strtolower($nombre, 'UTF-8')); ?>" 
               data-categorias="<?php echo htmlspecialchars($cats_atributo); ?>"
               data-actores="<?php echo htmlspecialchars(mb_strtolower($actores_raw, 'UTF-8')); ?>">
               
                <div class="portada-link">
                    <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada" loading="lazy" class="pelicula-portada">
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
            No encontramos películas o actores con ese término de búsqueda. 🍿
        </div>
    </div>

    <!-- SECCIÓN DE ACTORES ENCONTRADOS (DINÁMICA VÍA JS) -->
    <div class="seccion-actores-resultado" id="seccionActoresResultado">
        <h2>⭐ Actores</h2>
        <div class="grid-actores" id="contenedorActoresResultado">
            <!-- Se inyectarán dinámicamente aquí los actores coincidentes -->
        </div>
    </div>

    <!-- SCRIPT DE FILTRADO Y BÚSQUEDA DE ACTORES -->
    <script>
        let categoriaSeleccionada = 'todas';

        function seleccionarCategoria(categoria, elementoBoton) {
            document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('activo'));
            elementoBoton.classList.add('activo');

            categoriaSeleccionada = categoria.toLowerCase().trim();
            
            // Limpiar buscador de texto si cambia de categoría para una mejor experiencia visual combinada opcional
            filtrarCatalogo();
            
            elementoBoton.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
        }

        function filtrarCatalogo() {
            const textoBusqueda = document.getElementById('inputBuscador').value.toLowerCase().trim();
            const tarjetas = document.querySelectorAll('#contenedorPeliculas .pelicula-card');
            const seccionEstrenos = document.getElementById('seccionEstrenosContainer');
            let visiblesPeliculas = 0;

            // Control visual de sección de estrenos (se oculta si hay texto de búsqueda activo)
            if (seccionEstrenos) {
                seccionEstrenos.style.display = (textoBusqueda !== '') ? 'none' : 'block';
            }

            // Almacén temporal para evitar actores repetidos en los resultados de búsqueda
            let actoresEncontradosUnicos = new Map();

            tarjetas.forEach(card => {
                const titulo = card.getAttribute('data-titulo');
                const categorias = card.getAttribute('data-categorias').split(',');
                const actoresTexto = card.getAttribute('data-actores'); // ej: "Tom Holland, Zendaya"

                // Coincidencia por texto (ahora evalúa tanto título como el campo actores)
                const coincideTextoTitulo = titulo.includes(textoBusqueda);
                const coincideTextoActores = actoresTexto.includes(textoBusqueda);
                const coincideTexto = (textoBusqueda === '') || coincideTextoTitulo || coincideTextoActores;

                const coincideCategoria = (categoriaSeleccionada === 'todas') || categorias.includes(categoriaSeleccionada);

                if (coincideTexto && coincideCategoria) {
                    card.style.display = 'flex';
                    visiblesPeliculas++;

                    // Si se está buscando activamente y coincide por el campo actor, extraemos los actores
                    if (textoBusqueda !== '' && coincideTextoActores) {
                        let listaActoresPeli = actoresTexto.split(',');
                        listaActoresPeli.forEach(actorCrudo => {
                            let nombreActor = actorCrudo.trim();
                            if (nombreActor.toLowerCase().includes(textoBusqueda) && nombreActor !== '') {
                                // Capitalizar nombre correctamente
                                let nombreFormateado = nombreActor.replace(/\w\S*/g, (txt) => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase());
                                
                                if (!actoresEncontradosUnicos.has(nombreFormateado)) {
                                    // Ruta de imagen de actor (ajustable según tu estructura de carpetas, con fallback a imagen genérica)
                                    let imgActor = `../images/actores/${encodeURIComponent(nombreFormateado)}.jpg`;
                                    actoresEncontradosUnicos.set(nombreFormateado, imgActor);
                                }
                            }
                        });
                    }
                } else {
                    card.style.display = 'none';
                }
            });

            // Renderizar la sección de actores si hay texto de búsqueda y actores coincidentes
            const contenedorActores = document.getElementById('contenedorActoresResultado');
            const seccionActoresDiv = document.getElementById('seccionActoresResultado');
            contenedorActores.innerHTML = '';

            if (textoBusqueda !== '' && actoresEncontradosUnicos.size > 0) {
                seccionActoresDiv.style.display = 'block';
                actoresEncontradosUnicos.forEach((imgUrl, nombre) => {
                    let tarjetaActorHTML = `
                        <div class="actor-card">
                            <img src="${imgUrl}" alt="${nombre}" class="actor-img" onerror="this.src='https://via.placeholder.com/70?text=Actor'">
                            <div class="actor-nombre" title="${nombre}">${nombre}</div>
                        </div>
                    `;
                    contenedorActores.innerHTML += tarjetaActorHTML;
                });
            } else {
                seccionActoresDiv.style.display = 'none';
            }

            // Gestionar mensaje de "Sin resultados"
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