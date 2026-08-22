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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
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

        .panel-control {
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .buscador-box {
            margin-bottom: 15px;
            width: 100%;
        }

        .buscador-box input {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contenedor-botones {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 100%;
        }

        .btn-filtro {
            padding: 8px 16px;
            cursor: pointer;
            border: 1px solid #007bff;
            background: #ffffff;
            color: #007bff;
            border-radius: 20px;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .btn-filtro:hover {
            background: #e6f0ff;
        }

        .btn-filtro.activo {
            background: #007bff;
            color: #ffffff;
        }

        .seccion-estrenos {
            margin-bottom: 25px;
            background: #ffffff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .seccion-estrenos h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 18px;
            color: #333;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        .carrusel-estrenos {
            display: flex;
            gap: 15px;
            overflow-x: auto;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 10px;
        }

        .carrusel-estrenos::-webkit-scrollbar {
            height: 6px;
        }
        .carrusel-estrenos::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        .carrusel-estrenos .pelicula-card {
            flex: 0 0 200px;
            min-width: 200px;
        }

        .grid-peliculas {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .pelicula-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .portada-link {
            display: block;
            position: relative;
            width: 100%;
            text-decoration: none;
        }

        .pelicula-portada {
            width: 100%;
            aspect-ratio: 2 / 3;
            object-fit: cover;
            background-color: #eee;
            display: block;
        }

        .logo-empresa-overlay {
            position: absolute;
            top: 10px;
            right: 10px;
            max-width: 120px;
            max-height: 60px;
            object-fit: contain;
            background-color: rgba(255, 255, 255, 0.5);
            padding: 5px 8px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
            pointer-events: none;
        }

        .audio-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            font-size: 11px;
            padding: 5px 8px;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            box-sizing: border-box;
        }

        .pelicula-info {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .pelicula-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #333;
            font-size: 16px;
        }

        .badge-categoria {
            display: inline-block;
            background: #e9ecef;
            color: #495057;
            padding: 3px 8px;
            font-size: 12px;
            border-radius: 4px;
            margin-right: 4px;
            margin-top: 4px;
        }

        .sin-resultados {
            display: none;
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
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
                placeholder="Buscar película por nombre..." 
                onkeyup="filtrarCatalogo()"
            >
        </div>

        <!-- BOTONES DE CATEGORÍA -->
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
                    <?php echo ucfirst(htmlspecialchars($categoria)) . " ($cantidad)"; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SECCIÓN ÚLTIMOS ESTRENOS -->
    <?php if (!empty($ultimos_estrenos)): ?>
        <div class="seccion-estrenos">
            <h2>Últimos Estrenos</h2>
            <div class="carrusel-estrenos">
                <?php foreach ($ultimos_estrenos as $peli_estreno): ?>
                    <?php 
                        $id_estreno = intval($peli_estreno['id_peliculas'] ?? 0);
                        $cats_estreno = array_map('trim', explode(',', $peli_estreno['id_categoria']));
                        $nombre_estreno = $peli_estreno['nombre'] ?? 'Sin nombre';
                        $portada_estreno = !empty($peli_estreno['portada_url']) ? $peli_estreno['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                        $audio_estreno = !empty($peli_estreno['audio']) ? $peli_estreno['audio'] : 'No especificado';
                    ?>
                    <div class="pelicula-card">
                        <a href="ver.php?id=<?php echo $id_estreno; ?>" class="portada-link">
                            <img src="<?php echo htmlspecialchars($portada_estreno); ?>" alt="Portada de <?php echo htmlspecialchars($nombre_estreno); ?>" class="pelicula-portada">
                            <img src="../images/empresa/logo.png" alt="Logo Empresa" class="logo-empresa-overlay">
                            <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio_estreno); ?></div>
                        </a>
                        <div class="pelicula-info">
                            <h3><?php echo htmlspecialchars($nombre_estreno); ?></h3>
                            <div>
                                <strong>Categorías:</strong><br>
                                <?php foreach ($cats_estreno as $c_estreno): ?>
                                    <span class="badge-categoria"><?php echo htmlspecialchars(ucfirst($c_estreno)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
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
                $cats_atributo = implode(',', $cats_array);
                
                $nombre = $peli['nombre'] ?? 'Sin nombre';
                $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
                $audio = !empty($peli['audio']) ? $peli['audio'] : 'No especificado';
            ?>
            <div 
                class="pelicula-card" 
                data-titulo="<?php echo htmlspecialchars(mb_strtolower($nombre, 'UTF-8')); ?>" 
                data-categorias="<?php echo htmlspecialchars($cats_atributo); ?>"
            >
                <a href="ver.php?id=<?php echo $id_peli; ?>" class="portada-link">
                    <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada de <?php echo htmlspecialchars($nombre); ?>" class="pelicula-portada">
                    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="logo-empresa-overlay">
                    <div class="audio-overlay">🔊 <?php echo htmlspecialchars($audio); ?></div>
                </a>

                <div class="pelicula-info">
                    <h3><?php echo htmlspecialchars($nombre); ?></h3>
                    <div>
                        <strong>Categorías:</strong><br>
                        <?php foreach ($cats_array as $c): ?>
                            <span class="badge-categoria"><?php echo htmlspecialchars(ucfirst($c)); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div id="sinResultados" class="sin-resultados">
            No se encontraron películas que coincidan con la búsqueda.
        </div>
    </div>

    <!-- SCRIPT DE FILTRADO -->
    <script>
        let categoriaSeleccionada = 'todas';

        function seleccionarCategoria(categoria, elementoBoton) {
            document.querySelectorAll('.btn-filtro').forEach(btn => btn.classList.remove('activo'));
            elementoBoton.classList.add('activo');

            categoriaSeleccionada = categoria;
            filtrarCatalogo();
        }

        function filtrarCatalogo() {
            const textoBusqueda = document.getElementById('inputBuscador').value.toLowerCase().trim();
            const tarjetas = document.querySelectorAll('#contenedorPeliculas .pelicula-card');
            let visibles = 0;

            tarjetas.forEach(card => {
                const titulo = card.getAttribute('data-titulo');
                const categorias = card.getAttribute('data-categorias').split(',');

                const coincideTexto = titulo.includes(textoBusqueda);
                const coincideCategoria = (categoriaSeleccionada === 'todas') || categorias.includes(categoriaSeleccionada);

                if (coincideTexto && coincideCategoria) {
                    card.style.display = 'flex';
                    visibles++;
                } else {
                    card.style.display = 'none';
                }
            });

            const sinResultados = document.getElementById('sinResultados');
            if (visibles === 0 && tarjetas.length > 0) {
                sinResultados.style.display = 'block';
            } else {
                sinResultados.style.display = 'none';
            }
        }
    </script>
</body>
</html>