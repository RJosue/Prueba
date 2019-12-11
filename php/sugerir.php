<?php
$titulo = "Votación";
include '_header.php';
include 'validar.php';
include 'conexion.php';
$sugerencia = $_POST['sugerencia'];
$id = $_SESSION['id'];
if (isset($_POST['btnSubmit'])) {
    try {
        $sql = "INSERT INTO sugerencias (id_usuario, sugerencia, fecha_sugerencia) values ('$id','$sugerencia',now());";
        $conexion->query($sql);
        echo "<script>alert('Sugerencia Guardada.')</script>";
        echo "<script>window.location='sugerencia.php'</script>";
    } catch (Exception $e) {
        throw $e;
    }
} else {
    echo "<script>alert('Ocurrio un error con la sugerencia.')</script>";
    echo "<script>window.location='sugerencia.php'</script>";
}
