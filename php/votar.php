<?php
$titulo = "Votación";
include '_header.php'; 
include 'validar.php';
include 'conexion.php';
    $opcion = $_POST['optionsRadios'];
    $id = $_SESSION['id'];
    if(isset($_POST['btnSubmit'])){
        echo $opcion. $id;
    try{
            // $stmt = $conexion->prepare("INSERT INTO votacion_usuarios (id_votacion, id_usuario) values (?,?);");
            // $stmt->execute([$opcion,$id]); 
            // $data = $stmt->fetchAll();
            $sql ="INSERT INTO votacion_usuarios (id_votacion, id_usuario) values ($opcion,$id)";
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