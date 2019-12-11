<?php
session_start();

// Borra contenido de las sesiones
unset ($SESSION['nombre']);
unset ($_SESSION['nombre']);
unset ($_SESSION['id']);
unset ($_SESSION['id_rol']);
unset ($_SESSION['rol']);

//Destruye las sesiones
session_destroy();

header('Location: login.php');
?>