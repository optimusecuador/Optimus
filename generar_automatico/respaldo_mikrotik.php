<?php

/* ==========================================
   CONEXIONES A BASE DE DATOS
========================================== */
$conexion = new mysqli("localhost", "root", "Optimus2023", "optimus_optimus");
$conn = new mysqli("localhost", "root", "Optimus2023", "optimus_optimus");
$con = mysqli_connect('localhost','root','Optimus2023','optimus_optimus');
$db = mysqli_connect('localhost','root','Optimus2023','optimus_optimus');
$conpersonal = mysqli_connect('localhost','root','Optimus2023','optimus_usuarios');
$conactualizacion = mysqli_connect('localhost','root','Optimus2023','optimus_actualizacion');

/* ==========================================
   DATOS MIKROTIK
========================================== */
$sqlolt = "SELECT * FROM mikrotik LIMIT 1";
$resultolt = mysqli_query($con, $sqlolt);
$crowolt = mysqli_fetch_assoc($resultolt);

$ip   = $crowolt['ip'];
$user = $crowolt['usuario'];
$pass = $crowolt['contrasena'];
$nodo = $crowolt['nodo'];


/* ==========================================
   DASHBOARD MIKROTIK
========================================== */
$identity      = "Desconocido";
$version       = "-";
$uptime        = "-";
$cpu_load      = "-";
$free_memory   = "-";
$total_memory  = "-";

$conn_dash = @ssh2_connect($ip,22);

if($conn_dash)
{
    if(@ssh2_auth_password($conn_dash,$user,$pass))
    {
        $cmd = '
:put [/system identity get name];
:put [/system resource get version];
:put [/system resource get uptime];
:put [/system resource get cpu-load];
:put [/system resource get free-memory];
:put [/system resource get total-memory];
';

        $stream = ssh2_exec($conn_dash,$cmd);
        stream_set_blocking($stream,true);
        $output = trim(stream_get_contents($stream));
        fclose($stream);

        $datos = preg_split("/\r\n|\n|\r/",$output);

        if(isset($datos[0])) $identity     = trim($datos[0]);
        if(isset($datos[1])) $version      = trim($datos[1]);
        if(isset($datos[2])) $uptime       = trim($datos[2]);
        if(isset($datos[3])) $cpu_load     = trim($datos[3])."%";
        if(isset($datos[4])) $free_memory  = round(trim($datos[4])/1024/1024,2)." MB";
        if(isset($datos[5])) $total_memory = round(trim($datos[5])/1024/1024,2)." MB";
    }
}

/* ==========================================
   DIRECTORIO DE RESPALDO
========================================== */
$carpeta_respaldo = "/var/www/html/optimus/respaldo_mikrotik";

if(!is_dir($carpeta_respaldo))
{
    mkdir($carpeta_respaldo,0777,true);
}

/* ==========================================
   GENERAR RESPALDO AUTOMÁTICO AL CARGAR LA PÁGINA
========================================== */
$conn_auto = ssh2_connect($ip,22);

if($conn_auto && ssh2_auth_password($conn_auto, $user, $pass))
{
    $fecha_archivo = date("Ymd_His");
    $nombre_backup = "mikrotik_".$fecha_archivo;

    // Exportar configuración en el router
    $stream = ssh2_exec($conn_auto, '/export file="'.$nombre_backup.'"');
    stream_set_blocking($stream,true);
    stream_get_contents($stream);
    fclose($stream);

    // Esperar a que el archivo sea escrito localmente en el MikroTik
    sleep(5);

    $archivo_local = $carpeta_respaldo."/".$nombre_backup.".rsc";

    // Descargar archivo vía SCP
    if(ssh2_scp_recv($conn_auto, $nombre_backup.".rsc", $archivo_local))
    {
        // Guardar registro en la base de datos
        mysqli_query($con, "INSERT INTO respaldo_mikrotik(archivo,fecha) VALUES('".$nombre_backup.".rsc', NOW())");

        // Limpiar respaldos viejos si superan los 30
        $sqlTotal = mysqli_query($con, "SELECT COUNT(*) total FROM respaldo_mikrotik");
        $rowTotal = mysqli_fetch_assoc($sqlTotal);

        if($rowTotal['total'] > 30)
        {
            $sobran = $rowTotal['total'] - 30;

            $sqlViejos = mysqli_query($con, "SELECT * FROM respaldo_mikrotik ORDER BY fecha ASC LIMIT ".$sobran);

            while($viejo = mysqli_fetch_assoc($sqlViejos))
            {
                $rutaEliminar = $carpeta_respaldo.'/'.$viejo['archivo'];

                if(file_exists($rutaEliminar))
                {
                    unlink($rutaEliminar);
                }

                mysqli_query($con, "DELETE FROM respaldo_mikrotik WHERE id='".$viejo['id']."'");
            }
        }
    }
}

/* ==========================================
   RESTAURAR RESPALDO
========================================== */
if(isset($_POST['restaurar']))
{
    $archivo = $_POST['archivo'];
    $conn_restaurar = ssh2_connect($ip,22);

    if(!$conn_restaurar)
    {
        echo "<script>alert('No conecta al MikroTik');</script>";
    }
    elseif(!ssh2_auth_password($conn_restaurar,$user,$pass))
    {
        echo "<script>alert('Login incorrecto');</script>";
    }
    else
    {
        $ruta_local = $carpeta_respaldo."/".$archivo;

        if(file_exists($ruta_local))
        {
            if(ssh2_scp_send($conn_restaurar, $ruta_local, $archivo, 0644))
            {
                $stream = ssh2_exec($conn_restaurar, '/import file-name="'.$archivo.'"');
                stream_set_blocking($stream,true);
                stream_get_contents($stream);
                fclose($stream);

                echo "<script>
                alert('Restauración ejecutada correctamente');
                window.location.href='';
                </script>";
            }
            else
            {
                echo "<script>alert('No se pudo subir el archivo al MikroTik');</script>";
            }
        }
        else
        {
            echo "<script>alert('No existe el archivo de respaldo');</script>";
        }
    }
}

?>

<style>
.mk-dashboard{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:15px;
    margin-bottom:25px;
}

.mk-card{
    position:relative;
    overflow:hidden;
    border-radius:16px;
    padding:20px;
    transition:.3s;
    text-align:center;
}

.mk-card:hover{
    transform:translateY(-4px);
}

.mk-card::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:4px;
    background:#2196f3;
}

.mk-icon{
    font-size:34px;
    margin-bottom:10px;
}

.mk-title{
    font-size:13px;
    opacity:.8;
    text-transform:uppercase;
    letter-spacing:1px;
}

.mk-value{
    font-size:26px;
    font-weight:bold;
    margin-top:8px;
    word-break:break-word;
}

.mk-header{
    margin-bottom:15px;
}

.mk-header h2{
    margin:0;
}
</style>

<div class="panel-dark mk-header">
    <h2>Respaldo MikroTik</h2>
</div>

<div class="mk-dashboard">

    <div class="panel-dark mk-card">
        <div class="mk-icon">🖥️</div>
        <div class="mk-title">Equipo</div>
        <div class="mk-value"><?php echo $identity; ?></div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">⚙️</div>
        <div class="mk-title">Versión RouterOS</div>
        <div class="mk-value"><?php echo $version; ?></div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">🔥</div>
        <div class="mk-title">CPU</div>
        <div class="mk-value"><?php echo $cpu_load; ?></div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">⏱️</div>
        <div class="mk-title">Uptime</div>
        <div class="mk-value"><?php echo $uptime; ?></div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">💾</div>
        <div class="mk-title">RAM Libre</div>
        <div class="mk-value"><?php echo $free_memory; ?></div>
    </div>

    <div class="panel-dark mk-card">
        <div class="mk-icon">📊</div>
        <div class="mk-title">RAM Total</div>
        <div class="mk-value"><?php echo $total_memory; ?></div>
    </div>

</div>

<div class="panel-dark">

<h2>Respaldo MikroTik</h2>

<p>Nodo: <b><?php echo $nodo; ?></b></p>
<p><i>Un respaldo automático se ha generado al ingresar a este módulo.</i></p>

<h3>Historial de Respaldos</h3>

<table>

<tr>
<th>ID</th>
<th>Archivo</th>
<th>Fecha</th>
<th>Acciones</th>
</tr>

<?php
$sql = mysqli_query($con, "SELECT * FROM respaldo_mikrotik ORDER BY fecha DESC");

while($row = mysqli_fetch_assoc($sql))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['archivo']; ?></td>
<td><?php echo $row['fecha']; ?></td>
<td>
<br>
<a class="boton-azul" href="../respaldo_mikrotik/<?php echo $row['archivo']; ?>" target="_blank">
Descargar
</a>

&nbsp;

<form method="post" style="display:inline;">
<input type="hidden" name="archivo" value="<?php echo $row['archivo']; ?>">
<button type="submit" name="restaurar" class="boton-azul" onclick="return confirm('¿Desea restaurar este respaldo en el MikroTik?');">
Restaurar
</button>
</form>
<br>
</td>
</tr>

<?php
}
?>

</table>

</div>