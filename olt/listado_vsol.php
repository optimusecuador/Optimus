<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$ip = "192.168.8.100";
$usuario = "admin";
$password = "Optimus2023";

function puertoAbierto($ip, $puerto, $timeout = 3)
{
    $fp = @fsockopen($ip, $puerto, $errno, $errstr, $timeout);

    if ($fp) {
        fclose($fp);
        return true;
    }

    return false;
}

function obtenerModeloFirmware($texto)
{
    $modelo = "No identificado";
    $firmware = "No identificado";

    if (preg_match('/Device\s*Name\s*[:=]\s*(.+)/i', $texto, $m)) {
        $modelo = trim($m[1]);
    }

    if (preg_match('/Product\s*Model\s*[:=]\s*(.+)/i', $texto, $m)) {
        $modelo = trim($m[1]);
    }

    if (preg_match('/Model\s*[:=]\s*(.+)/i', $texto, $m)) {
        $modelo = trim($m[1]);
    }

    if (preg_match('/Software\s*Version\s*[:=]\s*(.+)/i', $texto, $m)) {
        $firmware = trim($m[1]);
    }

    if (preg_match('/Firmware\s*Version\s*[:=]\s*(.+)/i', $texto, $m)) {
        $firmware = trim($m[1]);
    }

    if ($firmware == "No identificado") {
        if (preg_match('/V\d+\.\d+\.\d+R/i', $texto, $m)) {
            $firmware = trim($m[0]);
        }
    }

    return [
        "modelo" => $modelo,
        "firmware" => $firmware
    ];
}

function probarSSH($ip, $usuario, $password)
{
    if (!function_exists("ssh2_connect")) {
        return [
            "ok" => false,
            "msg" => "La extensión SSH2 no está instalada."
        ];
    }

    $conn = @ssh2_connect($ip, 22);

    if (!$conn) {
        return [
            "ok" => false,
            "msg" => "No fue posible conectar por SSH."
        ];
    }

    if (!@ssh2_auth_password($conn, $usuario, $password)) {
        return [
            "ok" => false,
            "msg" => "Usuario o contraseña incorrectos."
        ];
    }

    $comandos = [
        "show version",
        "show system",
        "show device",
        "display version"
    ];

    $salida = "";

    foreach ($comandos as $cmd) {

        $stream = @ssh2_exec($conn, $cmd);

        if ($stream) {

            stream_set_blocking($stream, true);

            $tmp = stream_get_contents($stream);

            fclose($stream);

            if (trim($tmp) != "") {
                $salida = $tmp;
                break;
            }
        }
    }

    $info = obtenerModeloFirmware($salida);

    return [
        "ok" => true,
        "msg" => "Autenticación SSH correcta.",
        "salida" => $salida,
        "modelo" => $info["modelo"],
        "firmware" => $info["firmware"]
    ];
}

$ssh = puertoAbierto($ip,22);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Diagnóstico OLT VSOL</title>
</head>

<body>

<h2>Diagnóstico OLT VSOL</h2>

<p><b>IP:</b> <?php echo $ip; ?></p>
<p><b>Usuario:</b> <?php echo $usuario; ?></p>
<p><b>SSH:</b> <?php echo $ssh ? "ABIERTO" : "CERRADO"; ?></p>

<hr>

<?php

if($ssh){

    $r = probarSSH($ip,$usuario,$password);

    if($r["ok"]){

        echo "<p><b>".$r["msg"]."</b></p>";

        echo "<p><b>Modelo OLT:</b> ".$r["modelo"]."</p>";

        echo "<p><b>Firmware:</b> ".$r["firmware"]."</p>";

        echo "<h3>Respuesta del equipo</h3>";

        echo "<pre>".htmlspecialchars($r["salida"])."</pre>";

    }else{

        echo "<p>".$r["msg"]."</p>";

    }

}else{

    echo "<p>No responde por SSH.</p>";

}

?>

</body>
</html>