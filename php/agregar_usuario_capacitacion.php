<?php 
include '_header.php';
include 'conexion.php';
include 'validar.php'; 

$id_curso = $_POST['id_curso'];
$id_usuario = $_SESSION['id'];
$cantUsuarioEnCapacitacion = $conexion->prepare("SELECT COUNT(*) FROM capacitaciones ca INNER JOIN usuarios_capacitaciones uc on ca.id = uc.id_capacitacion where  ca.id = ?");
$cantUsuarioEnCapacitacion->execute([$id_curso]);
//$resultados = $cantUsuarioEnCapacitacion->fetch();
$cantUsuarioEnCapacitacion = $cantUsuarioEnCapacitacion->fetchColumn();
if($cantUsuarioEnCapacitacion == 0)
{
    $sql = "insert into usuarios_capacitaciones (id_usuario, id_capacitacion) values ('$id_usuario','$id_curso')";
    //INSERT INTO `usuarios_capacitaciones` (`id_usuario`, `id_capacitacion`) VALUES ('2', '13');
    $conexion->query($sql);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('La inscripción se ha completado exitosamente.');
    window.location.href='miscursos.php';
    </script>");   
}
else{
$verifica = $conexion->prepare("SELECT COUNT(*) FROM capacitaciones ca INNER JOIN usuarios_capacitaciones uc on ca.id = uc.id_capacitacion where ca.id = ? and uc.id_usuario = ?");
$verifica->execute([$id_curso,$id_usuario]);
$verifica = $verifica->fetchColumn();
    if($verifica != 0){
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Usted ya se ha matriculado para este curso previamente');
        window.location.href='../index.php';
        </script>");
    }
    
    else{
        $validarCupos = $conexion->prepare("SELECT min_cupo, max_cupo FROM capacitaciones WHERE id = ?");
        $validarCupos->setFetchMode(PDO::FETCH_ASSOC);
        $validarCupos->execute([$id_curso]);
        $validarCupos = $validarCupos->fetch();
        $minCupo = $validarCupos["min_cupo"];
        $maxCupo = $validarCupos["max_cupo"];
        if ($maxCupo>$cantUsuarioEnCapacitacion)
        {
            $sql = "insert into usuarios_capacitaciones (id_usuario, id_capacitacion) values ('$id_usuario','$id_curso')";
            $conexion->query($sql);
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('La inscripción se ha completado exitosamente.');
            window.location.href='miscursos.php';
            </script>");            
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Ya no hay cupo para este curso.');
            window.location.href='../index.php';
            </script>");
        }
    }
}

?>

<?php include '_footer.php'; ?>