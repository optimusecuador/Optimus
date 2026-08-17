<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* CONFIGURACION */
$ip       = "192.168.88.1";
$usuario  = "Admin";
$password = "Optimus2023";
$puerto   = 22;

$conexion_ok = false;
$error = "";

function ejecutarComando($ssh, $comando)
{
    $stream = @ssh2_exec($ssh, $comando);

    if (!$stream) {
        return "No se pudo ejecutar: $comando";
    }

    stream_set_blocking($stream, true);
    $resultado = stream_get_contents($stream);
    fclose($stream);

    return trim($resultado);
}

if (!function_exists('ssh2_connect')) {
    $error = "La extensión SSH2 no está instalada en PHP.";
} else {

    $ssh = @ssh2_connect($ip, $puerto);

    if (!$ssh) {
        $error = "No se pudo conectar al MikroTik ($ip)";
    } else {

        if (!@ssh2_auth_password($ssh, $usuario, $password)) {
            $error = "Usuario o contraseña incorrectos.";
        } else {

            $conexion_ok = true;

            $identity     = ejecutarComando($ssh, "/system identity print");
            $resource     = ejecutarComando($ssh, "/system resource print");
            $routerboard  = ejecutarComando($ssh, "/system routerboard print");
            $interfaces   = ejecutarComando($ssh, "/interface print");
            $ipaddress    = ejecutarComando($ssh, "/ip address print");
            $routes       = ejecutarComando($ssh, "/ip route print");
            $packages     = ejecutarComando($ssh, "/system package print");
            $users        = ejecutarComando($ssh, "/user print");
            $clock        = ejecutarComando($ssh, "/system clock print");
            $health       = ejecutarComando($ssh, "/system health print");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard MikroTik</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0f172a;
    color:#fff;
    font-family:Segoe UI,Arial,sans-serif;
    padding:20px;
}

.header{
    background:linear-gradient(135deg,#2563eb,#7c3aed);
    padding:25px;
    border-radius:15px;
    margin-bottom:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
}

.header h1{
    font-size:30px;
}

.status{
    margin-top:10px;
    font-size:16px;
}

.ok{
    color:#22c55e;
    font-weight:bold;
}

.error{
    color:#ef4444;
    font-weight:bold;
}

.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(450px,1fr));
    gap:20px;
}

.card{
    background:#1e293b;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 15px rgba(0,0,0,.3);
}

.card-title{
    background:#334155;
    padding:15px;
    font-size:18px;
    font-weight:bold;
}

.card-body{
    padding:15px;
}

pre{
    color:#22c55e;
    white-space:pre-wrap;
    word-wrap:break-word;
    font-size:13px;
    line-height:1.5;
}

.footer{
    text-align:center;
    margin-top:30px;
    color:#94a3b8;
}

</style>
</head>

<body>

<div class="header">
    <h1>📡 Dashboard MikroTik SSH</h1>

    <?php if($conexion_ok){ ?>
        <div class="status ok">
            ✓ Conectado correctamente a <?php echo $ip; ?>
        </div>
    <?php } else { ?>
        <div class="status error">
            ✗ <?php echo $error; ?>
        </div>
    <?php } ?>
</div>

<?php if($conexion_ok){ ?>

<div class="grid">

    <div class="card">
        <div class="card-title">🖥 Identidad</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($identity); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">⚙ Recursos del Sistema</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($resource); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">📦 RouterBOARD</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($routerboard); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">🌐 Direcciones IP</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($ipaddress); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">🔌 Interfaces</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($interfaces); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">🛣 Rutas</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($routes); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">📋 Paquetes Instalados</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($packages); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">👥 Usuarios</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($users); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">🕒 Fecha y Hora</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($clock); ?></pre>
        </div>
    </div>

    <div class="card">
        <div class="card-title">❤️ Salud del Equipo</div>
        <div class="card-body">
            <pre><?php echo htmlspecialchars($health); ?></pre>
        </div>
    </div>

</div>

<?php } ?>

<div class="footer">
    Dashboard MikroTik SSH | PHP + SSH2
</div>

</body>
</html>