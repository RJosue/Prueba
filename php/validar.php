<?php session_start();
// verifica si la sesion existe
    if (!isset($_SESSION["nombre"])){ 
        echo "<script>window.location='login.php';</script>";
    }

?>