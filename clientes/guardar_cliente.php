<?php

header('Content-Type: application/json');

require_once "conexion.php";

/* =========================================
   VALIDAR CEDULA
========================================= */

function validarCedula($cedula){

    if(strlen($cedula) != 10){
        return false;
    }

    $provincia = intval(substr($cedula,0,2));

    if($provincia < 1 || $provincia > 24){
        return false;
    }

    $suma = 0;

    for($i=0; $i<9; $i++){

        $num = intval($cedula[$i]);

        if($i % 2 == 0){

            $num *= 2;

            if($num > 9){
                $num -= 9;
            }
        }

        $suma += $num;
    }

    $digito = (10 - ($suma % 10)) % 10;

    return $digito == intval($cedula[9]);
}

/* =========================================
   VALIDAR RUC
========================================= */

function validarRUC($ruc){

    if(strlen($ruc) != 13){
        return false;
    }

    if(substr($ruc,10,3) != "001"){
        return false;
    }

    return validarCedula(substr($ruc,0,10));
}

/* =========================================
   RECIBIR DATOS
========================================= */

$codigo        = trim($_POST['codigo']);
$nombres       = strtoupper(trim($_POST['nombres']));
$representante = strtoupper(trim($_POST['representante']));
$fuente        = $_POST['fuente'];
$iva           = $_POST['iva'];
$juridica      = $_POST['juridica'];
$multimedia    = $_POST['multimedia'];
$direccion     = $_POST['direccion'];
$telefono1     = $_POST['telefono1'];
$telefono2     = $_POST['telefono2'];
$mail          = $_POST['mail'];
$usuario       = $_POST['usuario'];
$contrasena    = $_POST['contrasena'];
$isp           = $_POST['isp'];
$proveedorisp  = $_POST['proveedorisp'];

/* =========================================
   VALIDAR DOCUMENTO
========================================= */

if(strlen($codigo) == 10){

    if(!validarCedula($codigo)){

        echo json_encode([
            "estado" => "ERROR",
            "mensaje" => "La cédula no es válida"
        ]);

        exit;
    }

}elseif(strlen($codigo) == 13){

    if(!validarRUC($codigo)){

        echo json_encode([
            "estado" => "ERROR",
            "mensaje" => "El RUC no es válido"
        ]);

        exit;
    }

}else{

    echo json_encode([
        "estado" => "ERROR",
        "mensaje" => "Documento inválido"
    ]);

    exit;
}

/* =========================================
   VALIDAR DUPLICADO
========================================= */

$sql = "SELECT id FROM clientes WHERE codigo=?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s",$codigo);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

    echo json_encode([
        "estado" => "ERROR",
        "mensaje" => "El cliente ya existe"
    ]);

    exit;
}

/* =========================================
   INSERTAR
========================================= */

$sql = "INSERT INTO clientes
(
codigo,
nombres,
representante,
fuente,
iva,
juridica,
multimedia,
direccion,
telefono1,
telefono2,
mail,
usuario,
contrasena,
isp,
proveedorisp
)
VALUES
(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
"sssssssssssssss",
$codigo,
$nombres,
$representante,
$fuente,
$iva,
$juridica,
$multimedia,
$direccion,
$telefono1,
$telefono2,
$mail,
$usuario,
$contrasena,
$isp,
$proveedorisp
);

if($stmt->execute()){

    echo json_encode([
        "estado" => "OK"
    ]);

}else{

    echo json_encode([
        "estado" => "ERROR",
        "mensaje" => "Error al guardar"
    ]);
}

?>