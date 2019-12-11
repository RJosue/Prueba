<?php
$db_host="localhost";
$db_usuario="testuser";
$db_password="testuser";
$db_nombre="db_ven01";
$conexion = @mysql_connect($db_host, $db_usuario, $db_password) or die(mysql_error());
$db = @mysql_select_db($db_nombre, $conexion) or die(mysql_error());
?> 
