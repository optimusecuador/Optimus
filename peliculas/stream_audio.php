<?php
// stream_audio.php
$file = $_GET['file'] ?? '';
$track = isset($_GET['track']) ? intval($_GET['track']) : 0;

// Validaciones básicas de seguridad para evitar Warner/Path Traversal básico
$file = realpath($file);
if (!$file || !file_exists($file)) {
    http_response_code(404);
    die("Archivo no encontrado.");
}

// Configurar cabeceras para streaming de audio
header('Content-Type: audio/aac');
header('X-Accel-Buffering: no');

// Comando FFmpeg para extraer la pista de audio seleccionada al vuelo y enviarla por salida estándar (pipe)
$cmd = sprintf('ffmpeg -i %s -map 0:a:%d -f adts -', escapeshellarg($file), $track);

$descriptorspec = [
    0 => ["pipe", "r"], // stdin
    1 => ["pipe", "w"], // stdout
    2 => ["pipe", "w"]  // stderr
];

$process = proc_open($cmd, $descriptorspec, $pipes);

if (is_resource($process)) {
    fclose($pipes[0]);
    // Leer el flujo de audio generado por FFmpeg y pasarlo al navegador en streaming
    while (!feof($pipes[1])) {
        echo fread($pipes[1], 8192);
        flush();
    }
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);
}
exit;