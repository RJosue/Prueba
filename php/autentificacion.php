<?php
//Iniciar la sesión 
session_start();
// verifica la sesión

$user = $_POST['user'];
$pass = md5($_POST['password']);

include 'conexion.php';
//select u.id, u.nombre, u.apellido, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? 

$stmt = $conexion->prepare("SELECT u.id, u.nombre, u.apellido, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = ur.id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? LIMIT 1");
$stmt->execute([$user, $pass]);
$data = $stmt->fetchAll();
$count = $stmt->rowCount();
echo $count;
if ($count) {
    foreach ($data as $row) {
        echo $row['nombre'] . $row['id_rol'];
        $_SESSION['nombre'] = $row['nombre'] . " " . $row['apellido'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['id_rol'] = $row['id_rol'];
        $_SESSION['rol'] = $row['rol'];
        echo "<script>window.location='../index.php';</script>";
    }
} else {
    echo "<script>alert('Usuario o Contraseña incorrecto.'); window.location='login.php';</script>";
}
