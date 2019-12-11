<?php

//Definición de variables
define("BD_NOM",     "educon");
define("BD_USER",    "root");
define("BD_PASS",    "");
define("BD_HOST", "localhost");
// define("BD_NOM",     "edu_cont1");
// define("BD_USER",    "econtinua1");
// define("BD_PASS",    "db.educont_2019");
// define("BD_HOST", "mysql.econtinua1.ds507.online");


// conexión a la base de datos
try {
    $dsn = "mysql:host=" . BD_HOST . ";dbname=" . BD_NOM;
    $conexion = new PDO($dsn, BD_USER, BD_PASS);
} catch (PDOException $e) {
    echo $e->getMessage();
}
