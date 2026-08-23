<?php
require('../conectar.php');

if (isset($_POST['id']) && isset($_POST['tiempo'])) {
    $id = intval($_POST['id']);
    $tiempo = floatval($_POST['tiempo']);

    $stmt = mysqli_prepare($conexion, "UPDATE peliculas SET reproduccion = ? WHERE id_peliculas = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "di", $tiempo, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
?>