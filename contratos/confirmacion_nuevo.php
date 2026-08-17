<?php

require('../conectar.php');

if($_SERVER['REQUEST_METHOD']=="POST"){

    date_default_timezone_set('America/Guayaquil');

    /* =========================================
       DATOS
    ========================================= */
    $cedula = mysqli_real_escape_string($conexion, $_POST['idcliente'] ?? ''); 
    
    $cliente = mysqli_real_escape_string($conexion, $_POST['cliente'] ?? '');
    $cliente = str_replace("Sin Asignar", "", $cliente);
    $cliente = trim($cliente);

    $telefono = mysqli_real_escape_string($conexion, $_POST['telefono'] ?? '');
    $mail = mysqli_real_escape_string($conexion, $_POST['mail'] ?? '');
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion'] ?? '');
    $producto = mysqli_real_escape_string($conexion, $_POST['producto'] ?? '');
    $corte = mysqli_real_escape_string($conexion, $_POST['corte'] ?? '');
    $terceraedad = mysqli_real_escape_string($conexion, $_POST['terceraedad'] ?? '');
    $nodo = mysqli_real_escape_string($conexion, $_POST['nodo'] ?? '');
    $longitud = mysqli_real_escape_string($conexion, $_POST['longitud'] ?? '');
    $latitud = mysqli_real_escape_string($conexion, $_POST['latitud'] ?? '');
    $absoluta = mysqli_real_escape_string($conexion, $_POST['absoluta'] ?? '');

    $vendedor = mysqli_real_escape_string($conexion, $_POST['busquedapersonal'] ?? '');
    preg_match('/\d+/', $vendedor, $coincidencia);
    $vendedor = $coincidencia[0] ?? '';

    $fecha = date("Y-m-d (H:i:s)");

    /* =========================================
       GENERAR NUMERO DE CONTRATO
    ========================================= */
    $sql_numero = mysqli_query($conexion,"
        SELECT numero 
        FROM contratos 
        ORDER BY CAST(numero AS UNSIGNED) DESC 
        LIMIT 1
    ");

    $numero = 1;

    if(mysqli_num_rows($sql_numero) > 0){
        $row_numero = mysqli_fetch_assoc($sql_numero);
        $numero = intval($row_numero['numero']) + 1;
    }

    /* =========================================
       CREAR CARPETA DEL CLIENTE (POR CÉDULA)
    ========================================= */
    $nombre_carpeta = !empty($cedula) ? $cedula : "contrato_" . $numero;
    $ruta_destino = "../contratos/" . $nombre_carpeta . "/";

    if (!file_exists($ruta_destino)) {
        mkdir($ruta_destino, 0777, true);
    }

    /* =========================================
       SUBIR IMAGENES Y GUARDAR RUTAS
    ========================================= */
    $cedula1 = "";
    $cedula2 = "";
    $planilla = "";

    /* CEDULA 1 */
    if(isset($_FILES['cedula1']) && $_FILES['cedula1']['name']!=""){
        $nombre_archivo1 = time()."_".$_FILES['cedula1']['name'];
        if(move_uploaded_file($_FILES['cedula1']['tmp_name'], $ruta_destino . $nombre_archivo1)){
            $cedula1 = $ruta_destino . $nombre_archivo1; // Guarda la ruta completa
        }
    }

    /* CEDULA 2 */
    if(isset($_FILES['cedula2']) && $_FILES['cedula2']['name']!=""){
        $nombre_archivo2 = time()."_".$_FILES['cedula2']['name'];
        if(move_uploaded_file($_FILES['cedula2']['tmp_name'], $ruta_destino . $nombre_archivo2)){
            $cedula2 = $ruta_destino . $nombre_archivo2; // Guarda la ruta completa
        }
    }

    /* PLANILLA */
    if(isset($_FILES['planilla']) && $_FILES['planilla']['name']!=""){
        $nombre_archivo3 = time()."_".$_FILES['planilla']['name'];
        if(move_uploaded_file($_FILES['planilla']['tmp_name'], $ruta_destino . $nombre_archivo3)){
            $planilla = $ruta_destino . $nombre_archivo3; // Guarda la ruta completa
        }
    }

    /* =========================================
       INSERTAR CONTRATO
    ========================================= */
    $sql = mysqli_query($conexion,"
        INSERT INTO contratos(
            numero,
            cliente,
            telefono,
            mail,
            direccion,
            producto,
            dia_corte,
            dia_corte_actual,
            terceraedad,
            nodo,
            gps1,
            gps2,
            absoluta,
            vendedor,
            cedula1,
            cedula2,
            planilla,
            nombres,
            fecha
        ) VALUES (
            '$numero',
            '$cedula',
            '$telefono',
            '$mail',
            '$direccion',
            '$producto',
            '$corte',
            '$corte',
            '$terceraedad',
            '$nodo',
            '$longitud',
            '$latitud',
            '$absoluta',
            '$vendedor',
            '$cedula1',
            '$cedula2',
            '$planilla',
            '$cliente',
            '$fecha'
        )
    ");

    /* =========================================
       RESPUESTA
    ========================================= */
    if($sql){
        echo "
        <script>
            alert('CONTRATO CREADO CORRECTAMENTE');
            window.location='../clientes/index.php';
        </script>
        ";
    }else{
        echo "
        <script>
            alert('ERROR AL CREAR CONTRATO');
            window.history.back();
        </script>
        ";
    }
}

?>