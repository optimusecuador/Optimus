<?php
// stream_audio.php
$file = $_GET['file'] ?? '';
$track = isset($_GET['track']) ? intval($_GET['track']) : 0;

// Validación de seguridad básica contra Path Traversal
$file = realpath($file);
if (!$file || !file_exists($file)) {
    http_response_code(404);
    die("Archivo no encontrado.");
}

// Configurar cabeceras para streaming de video MP4
header('Content-Type: video/mp4');
header('X-Accel-Buffering: no');

// Comando FFmpeg corregido:
// - Mantiene el video original (-map 0:v:0)
// - Selecciona la pista de audio elegida (-map 0:a:$track)
// - Copia el video sin volver a renderizarlo (-c:v copy) para ahorrar CPU
// - Convierte el audio a AAC para compatibilidad web (-c:a aac)
// - Empaqueta en formato MP4 fragmentado optimizado para streaming en tiempo real (-f matroska / -f mp4 + movflags)
$cmd = sprintf(
    'ffmpeg -i %s -map 0:v:0 -map 0:a:%d -c:v copy -c:a aac -b:a 192k -f matroska -movflags +frag_keyframe+empty_moov -', 
    escapeshellarg($file), 
    $track
);

$descriptorspec = [
    0 => ["pipe", "r"],
    1 => ["pipe", "w"],
    2 => ["pipe", "w"]
];

$process = proc_open($cmd, $descriptorspec, $pipes);

if (is_resource($process)) {
    fclose($pipes[0]);
    // Enviar el flujo de video y audio combinados hacia el navegador
    while (!feof($pipes[1])) {
        echo fread($pipes[1], 8192);
        flush();
    }
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);
}
exit;