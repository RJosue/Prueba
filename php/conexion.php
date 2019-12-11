<?php

//Definición de variables
define("BD_NOM",     "educon");
define("BD_USER",    "root");
define("BD_PASS",    "");
define("BD_HOST", "localhost");


// conexión a la base de datos
try {
    $dsn = "mysql:host=".BD_HOST.";dbname=".BD_NOM;
    $conexion = new PDO($dsn, BD_USER, BD_PASS);
} catch (PDOException $e){
    echo $e->getMessage();
}
    
?>
