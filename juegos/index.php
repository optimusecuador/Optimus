<?php
// Procesar y recibir la puntuación cuando el jugador presiona "Guardar Puntuación"
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['score'])) {
    $puntos = intval($_POST['score']);
    $jugador = htmlspecialchars($_POST['player'] ?? 'Anónimo');
    
    // Aquí puedes conectar a tu base de datos MySQL para guardar $jugador y $puntos
    $mensaje = "¡Puntuación guardada con éxito! Jugador: $jugador | Puntos: $puntos";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Estilo Mario Bros - Bruja</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #1a1a1a;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        h1 {
            margin-bottom: 10px;
            color: #9b59b6; /* Color morado bruja */
            text-shadow: 2px 2px 4px #000;
        }

        .alert {
            background-color: #2e7d32;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        canvas {
            background-color: #2c3e50; /* Color oscuro noche/bosque */
            border: 4px solid #ffffff;
            box-shadow: 0 8px 16px rgba(0,0,0,0.5);
            border-radius: 4px;
        }

        .controls-info {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #ccc;
        }

        form {
            margin-top: 20px;
            background-color: #2a2a2a;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            display: flex;
            gap: 10px;
            align-items: center;
        }

        input[type="text"] {
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid #555;
            background-color: #333;
            color: #fff;
            outline: none;
        }

        button {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #8e44ad; /* Morado bruja */
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background-color: #732d91;
        }
    </style>
</head>
<body>

    <h1>Super Witch World</h1>

    <?php if ($mensaje): ?>
        <div class="alert"><?= $mensaje ?></div>
    <?php endif; ?>

    <canvas id="gameCanvas" width="800" height="400"></canvas>

    <div class="controls-info">
        Controles: <strong>A / D</strong> o <strong>Flechas Izquierda/Derecha</strong> para moverte. <strong>Espacio / W / Flecha Arriba</strong> para saltar.
    </div>

    <form method="POST" action="">
        <input type="hidden" name="score" id="scoreInput" value="0">
        <label for="player">Nombre:</label>
        <input type="text" name="player" id="player" required placeholder="Tu nombre o Nick">
        <button type="submit">Guardar Puntuación</button>
    </form>

    <script>
        const canvas = document.getElementById("gameCanvas");
        const ctx = canvas.getContext("2d");

        // --- Cargar la Imagen de la Bruja ---
        const brujaImg = new Image();
        brujaImg.src = 'bruja.png'; // Asegúrate de que esta imagen exista en la misma carpeta

        // Configuración del Jugador (La Bruja)
        const player = {
            x: 50,
            y: 300,
            width: 60,  // Ajusta el ancho según la proporción de tu imagen
            height: 60, // Ajusta el alto según la proporción de tu imagen
            velocityX: 0,
            velocityY: 0,
            speed: 5,
            jumpForce: 12,
            grounded: false,
            facingRight: true
        };

        // Gravedad y Variables Generales
        const gravity = 0.6;
        let score = 0;

        // Plataformas del Nivel [x, y, ancho, alto]
        const platforms = [
            { x: 0, y: 360, width: 800, height: 40 },  // Suelo principal
            { x: 150, y: 270, width: 100, height: 20 }, // Bloque flotante 1
            { x: 320, y: 210, width: 120, height: 20 }, // Bloque flotante 2
            { x: 500, y: 150, width: 100, height: 20 }, // Bloque flotante 3
            { x: 650, y: 260, width: 100, height: 20 }  // Bloque flotante 4
        ];

        // Monedas/Estrellas recolectables
        const coins = [
            { x: 190, y: 230, collected: false },
            { x: 370, y: 170, collected: false },
            { x: 540, y: 110, collected: false },
            { x: 690, y: 220, collected: false }
        ];

        // Control de Teclado
        const keys = {};
        window.addEventListener("keydown", (e) => keys[e.code] = true);
        window.addEventListener("keyup", (e) => keys[e.code] = false);

        // Bucle Principal del Juego
        function update() {
            // Movimiento Horizontal
            if (keys["ArrowRight"] || keys["KeyD"]) {
                player.velocityX = player.speed;
                player.facingRight = true;
            } else if (keys["ArrowLeft"] || keys["KeyA"]) {
                player.velocityX = -player.speed;
                player.facingRight = false;
            } else {
                player.velocityX = 0;
            }

            // Salto (solo si toca el suelo o plataforma)
            if ((keys["Space"] || keys["ArrowUp"] || keys["KeyW"]) && player.grounded) {
                player.velocityY = -player.jumpForce;
                player.grounded = false;
            }

            // Aplicar Gravedad
            player.velocityY += gravity;

            // Actualizar Posiciones
            player.x += player.velocityX;
            player.y += player.velocityY;

            // Detección de Colisiones con Plataformas
            player.grounded = false;
            platforms.forEach(plat => {
                if (
                    player.x < plat.x + plat.width &&
                    player.x + player.width > plat.x &&
                    player.y + player.height > plat.y &&
                    player.y + player.height - player.velocityY <= plat.y
                ) {
                    player.grounded = true;
                    player.velocityY = 0;
                    player.y = plat.y - player.height;
                }
            });

            // Recolección de Monedas
            coins.forEach(coin => {
                if (!coin.collected &&
                    player.x < coin.x + 15 &&
                    player.x + player.width > coin.x &&
                    player.y < coin.y + 15 &&
                    player.y + player.height > coin.y) {
                    
                    coin.collected = true;
                    score += 100;
                    document.getElementById("scoreInput").value = score;
                }
            });

            // Limitar personaje dentro de los bordes laterales del canvas
            if (player.x < 0) player.x = 0;
            if (player.x + player.width > canvas.width) player.x = canvas.width - player.width;

            // Renderizar frame
            render();

            // Llamar al siguiente frame
            requestAnimationFrame(update);
        }

        // Función para dibujar a la bruja usando la imagen
        function drawPlayer(x, y, width, height, facingRight) {
            // Si la imagen aún no ha cargado, no intentar dibujarla
            if (!brujaImg.complete) return; 

            ctx.save();
            if (!facingRight) {
                // Voltear la imagen horizontalmente para mirar a la izquierda
                ctx.translate(x + width, y);
                ctx.scale(-1, 1);
                ctx.drawImage(brujaImg, 0, 0, width, height);
            } else {
                // Dibujar normal mirando a la derecha
                ctx.drawImage(brujaImg, x, y, width, height);
            }
            ctx.restore();
        }

        // Dibujar Elementos en Pantalla
        function render() {
            // Limpiar Lienzo
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Dibujar Plataformas
            platforms.forEach(plat => {
                ctx.fillStyle = "#2c3e50"; // Gris oscuro para plataformas
                ctx.fillRect(plat.x, plat.y, plat.width, plat.height);
                
                // Pasto morado o borde superior
                ctx.fillStyle = "#8e44ad"; 
                ctx.fillRect(plat.x, plat.y, plat.width, 5);
            });

            // Dibujar Monedas/Estrellas
            coins.forEach(coin => {
                if (!coin.collected) {
                    ctx.fillStyle = "#f1c40f"; // Dorado
                    ctx.beginPath();
                    ctx.arc(coin.x + 7.5, coin.y + 7.5, 8, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.strokeStyle = "#f39c12";
                    ctx.stroke();
                }
            });

            // Dibujar a la Bruja
            drawPlayer(player.x, player.y, player.width, player.height, player.facingRight);

            // Dibujar Puntuación
            ctx.fillStyle = "#ffffff";
            ctx.font = "bold 18px sans-serif";
            ctx.fillText("PUNTOS: " + score, 15, 30);
        }

        // Iniciar bucle del juego
        update();
    </script>
</body>
</html>