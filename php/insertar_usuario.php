<?php 
include 'conexion.php';
if(isset($_POST['submit'])){
    $nombre =  $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $pass = md5($_POST['password']);
    $genero = $_POST['genero'];
    $celular = $_POST['celular'];
    $fechaNacimiento = $_POST['fechanacimiento'];
    $institucion = $_POST['institucion'];
    try{
    $stmt = $conexion->prepare("INSERT into usuarios (nombre,apellido,sexo,correo,cedula,fecha_nacimiento,password,fecha_creacion,institucion) values (?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$nombre,$apellido,$genero,$correo,$cedula,$fechaNacimiento,$pass,date("Y-m-d"),$institucion]); 
    $idstmt = $conexion->query("SELECT max(id) from usuarios");
    $lastId = $idstmt->fetchColumn();
    $query = $conexion->prepare("INSERT into usuarios_rol (id_usuario, id_rol) values (?,?)");
    $query->execute([$lastId, 3]);
    }
    catch(Exception $e){
        throw $e;
    }  
    header("Location: login.php");
    echo $lastId;
}else{
    header("Location: ../index.php");
}
