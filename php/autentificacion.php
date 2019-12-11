<?php
//Iniciar la sesión 
session_start(); 
// verifica la sesión

$user =$_POST['user'];
$pass =$_POST['password'];

include 'conexion.php';
//select u.id, u.nombre, u.apellido, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? 

// echo $user.$pass;
// $stmt = $conexion->prepare("select * from usuarios where correo = ? and password ?");
// 				$stmt->execute([$user, $pass]); 
//                 $data = $stmt->fetchAll();
//                 echo $user.$pass;
//                 foreach ($data as $row) {
//                     echo $user.$pass. " asdasd";
//                     echo $row['nombre']." ".$row['apellido']." ".$row['correo'];
// 				}

$stmt = $conexion->prepare("SELECT u.id, u.nombre, u.apellido, ur.id_rol, r.rol from usuarios u inner join usuarios_rol ur on u.id = id_usuario inner join rol r on r.id = ur.id_rol where u.correo = ? and u.password = ? LIMIT 1");
$stmt->execute([$user, $pass]); 
$data = $stmt->fetchAll();
$count = $stmt->rowCount();
echo $count;
if($count){
        foreach ($data as $row) {
        echo $row['nombre'].$row['id_rol'];
        $_SESSION['nombre'] = $row['nombre']." ".$row['apellido'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['id_rol'] = $row['id_rol'];
        $_SESSION['rol'] = $row['rol'];
        header('Location: ../index.php');
        }
    }
else{
    echo "<script>alert('Usuario o Contraseña incorrecto.'); window.location='login.php';</script>";
    }



// $conexion->close();

?>
