<?php
$titulo = "Votación";
include '_header.php'; 
include 'validar.php';
include 'conexion.php';
    $sugerencia = $_POST['sugerencia'];
    $id = $_SESSION['id'];
    if(isset($_POST['btnSubmit'])){
    try{
            $sql ="INSERT INTO sugerencias (id_usuario, sugerencia, fecha_sugerencia) values ('$id','$sugerencia',now());";
            $conexion->query($sql);
            header('Location: resultados.php');
        }
    catch(Exception $e){
            throw $e;
        }
    }else{
        header('Location: resultados.php');
    }
   
?>