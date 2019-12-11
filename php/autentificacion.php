<?php session_start();
//Iniciar la sesión 
session_start();
// verifica la sesión

$user = $_POST['user'];
//$pass =md5($_POST['password']);
//$pass = md5($_POST['password']);
$pass = md5($_POST['password']);
include 'conexion.php';
//select u.id, u.nombre, u.apellido, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? 

// echo $user.$pass;
// $stmt = $conexion->prepare("select * from usuarios where correo = ? and password ?");
//              $stmt->execute([$user, $pass]); 
//                 $data = $stmt->fetchAll();
//                 echo $user.$pass;
//                 foreach ($data as $row) {
//                     echo $user.$pass. " asdasd";
//                     echo $row['nombre']." ".$row['apellido']." ".$row['correo'];
//              }

$stmt = $conexion->prepare("SELECT u.id, u.nombre, u.apellido, u.cedula, u.correo, u.fecha_nacimiento, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? LIMIT 1");
$stmt->execute([$user, $pass]);
$data = $stmt->fetchAll();
$count = $stmt->rowCount();
if ($count) {
    foreach ($data as $row) {
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['cedula'] = $row['cedula'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['fecha_nacimiento'] = $row['fecha_nacimiento'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['id_rol'] = $row['id_rol'];
        $_SESSION['rol'] = $row['rol'];
        echo "<script>window.location='../index.php';</script>";
    }
} else {
    echo "<script>alert('Usuario o Contraseña incorrecto.'); window.location='login.php';</script>";
}
?>