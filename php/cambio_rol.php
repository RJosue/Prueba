<?php
include 'conexion.php';
$estado = $_POST["estado"];
$id = $_POST["id"];
$rol = $_POST["rol"];


    if($estado==1){
        $sql = "INSERT INTO usuarios_rol (id_usuario,id_rol) values ('$id','$rol')";
        $conexion->query($sql);
        echo "insertado";
    }
    else {
        $sql = "DELETE FROM usuarios_rol where (id_usuario = '$id' and id_rol = '$rol')";
        $conexion->query($sql);
        echo "borrado";
    }
?>