<?php
// verifica si la sesion existe
    if (!isset($_SESSION['nombre'])){ 
        header('Location: login.php');
    }

?>