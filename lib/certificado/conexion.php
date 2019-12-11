<?php

//Verifico si puede acceder a este include
// if(!$acceso)
// 	header('Location: index.php');
/*
// Conexión con los datos mysqli_connect('host','usuario','password','dbname')
$connection = mysqli_connect('localhost','root','','user'); 

// Si la conexión falla, aparece el error 
	if($connection === false) { 
	echo 'Ha habido un error <br>'.mysqli_connect_error(); 
	} else {
	echo 'Conectado a la base de datos';
	}
	*/
$dbname="educon";
$usuario="root";
$password="";
try{
    $dsn = "mysql:host=localhost; dbname=$dbname";
    $conexion =  new PDO ($dsn,$usuario,$password);
}
catch(PDOException $e){
    echo $e-> getMessage();
}

?>
