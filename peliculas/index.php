<?php
// ==============================================================================
// 1. CONEXIÓN A LA BASE DE DATOS Y CONSULTA
// ==============================================================================
require('../conectar.php');

// Obtener todas las películas
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
    // Ordenar categorías alfabéticamente
    ksort($conteo_categorias);
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

        /* Rejilla 100% fluida que adapta las columnas según el ancho de la pantalla */
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

        /* Contenedor de la portada con posicionamiento relativo */
        .portada-container {
            position: relative;
            width: 100%;
        }

        .pelicula-portada {
            width: 100%;
            aspect-ratio: 2 / 3;
            object-fit: cover;
            background-color: #eee;
            display: block;
        }

        /* Logo superpuesto: Reducido un 25% (max-width: 120px) manteniendo el fondo con 50% de transparencia */
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
        <!-- BUSCADOR EN TEXTO PLANO -->
        <div class="buscador-box">
            <input 
                type="text" 
                id="inputBuscador" 
                placeholder="Buscar película por nombre..." 
                onkeyup="filtrarCatalogo()"
            >
        </div>

        <!-- BOTONES DE CATEGORÍA CON CONTADOR -->
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

    <!-- LISTADO DE PELÍCULAS -->
    <div class="grid-peliculas" id="contenedorPeliculas">
        <?php foreach ($peliculas as $peli): ?>
            <?php 
                // Normalizar categorías para data-attribute (ej: "drama, terror")
                $cats_array = array_map('trim', explode(',', $peli['id_categoria']));
                $cats_atributo = implode(',', $cats_array);
                
                // Mapeo con los campos requeridos
                $nombre = $peli['nombre'] ?? 'Sin nombre';
                $portada = !empty($peli['portada_url']) ? $peli['portada_url'] : 'https://via.placeholder.com/300x450?text=Sin+Portada';
            ?>
            <div 
                class="pelicula-card" 
                data-titulo="<?php echo htmlspecialchars(mb_strtolower($nombre, 'UTF-8')); ?>" 
                data-categorias="<?php echo htmlspecialchars($cats_atributo); ?>"
            >
                <!-- PORTADA CON LOGO SUPERPUESTO (REDUCIDO 25%) -->
                <div class="portada-container">
                    <img src="<?php echo htmlspecialchars($portada); ?>" alt="Portada de <?php echo htmlspecialchars($nombre); ?>" class="pelicula-portada">
                    <img src="../images/empresa/logo.png" alt="Logo Empresa" class="logo-empresa-overlay">
                </div>

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

    <!-- SCRIPT DE FILTRADO COMBINADO -->
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
            const tarjetas = document.querySelectorAll('.pelicula-card');
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