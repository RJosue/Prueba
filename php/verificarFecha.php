<?php
include 'Conexion.php';

$fechaini = $_POST['fechaInicial'];
$fechafin = $_POST['fechaFinal'];
$salon = $_POST['salon'];
$profesor = $_POST['profesor'];
// Verificamos si la fecha que se esta introduciendo esta en la base de datos y hace conflicto con el salon
$consultaSalones = $conexion->query("SELECT count(*) FROM ((((usuarios u INNER JOIN usuarios_capacitaciones uc ON u.id = uc.id_usuario) 
                 INNER JOIN capacitaciones c ON c.id = uc.id_capacitacion)
                 INNER JOIN horario h ON h.id_capacitacion=c.id)
                 INNER JOIN salones s ON s.id = h.id_salon)
                 where '$fechaini'< h.hora_fin && '$fechafin' > h.hora_inicio && s.id='$salon';");
// Verificamos si la fecha que se esta introduciendo esta en la base de datos y hace conflicto con el profesor
$consultaProfesores = $conexion->query("SELECT count(*)FROM (((((rol r INNER JOIN usuarios_rol ur ON r.id = ur.id_rol) 
                 INNER JOIN usuarios u ON u.id = ur.id_usuario)
                 INNER JOIN usuarios_capacitaciones uc ON uc.id_usuario = u.id)
                 INNER JOIN capacitaciones c ON c.id = uc.id_capacitacion)
                 INNER JOIN horario h ON h.id_capacitacion=c.id)
                 where '$fechaini'< h.hora_fin && '$fechafin' > h.hora_inicio && u.id='$profesor';");
// if($consultaSalones->fetchColumn()>0 || $consultaProfesores->fetchColumn()>0){
    if ($consultaProfesores->fetchColumn() > 0) {
        echo ("profesor");
    }
    if ($consultaSalones->fetchColumn() > 0) {
        echo ("salon");
    }
// }
// else {
//     echo("false");
// }


