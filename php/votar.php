<?php session_start();
$titulo = "Votación";
include '_header.php'; 
include 'validar.php';
include 'conexion.php';
    $opcion = $_POST['optionsRadios'];
    $id = $_SESSION['id'];
    if(isset($_POST['btnSubmit'])){
        echo $opcion. $id;
    try{
            $sql ="INSERT INTO votacion_usuarios (id_votacion, id_usuario) values ($opcion,$id)";
            $conexion->query($sql);
        echo "<script>alert('Voto Guardado.')</script>";
        echo "<script>window.location='sugerencia.php'</script>";
        }
    catch(Exception $e){
            throw $e;
        }
    }else{
        echo "<script>window.location='sugerencia.php'</script>";
    }
