<?php
include 'Conexion.php';

$fechaini = $_POST['fechaInicial'];
$fechafin = $_POST['fechaFinal'];
$salon = $_POST['salon'];
$profesor = $_POST['profesor'];
$cont = 0;
// Verificamos si la fecha que se esta introduciendo esta en la base de datos y hace conflicto con el salon
$consultaSalones = $conexion->query("SELECT count(*) FROM (( capacitaciones c 
                 INNER JOIN horario h ON h.id=c.id)
                 INNER JOIN salones s ON s.id = h.id_salon)
                 where '$fechaini' < h.hora_fin && '$fechafin' > h.hora_inicio && s.id='$salon';");
// Verificamos si la fecha que se esta introduciendo esta en la base de datos y hace conflicto con el profesor
$consultaProfesores = $conexion->query(" SELECT count(*) FROM ((((rol r 
				 INNER JOIN usuarios_rol ur ON r.id = ur.id_rol) 
                 INNER JOIN usuarios u ON ur.id_usuario = u.id)
                 INNER JOIN capacitaciones c ON u.id = c.id_profesor)
                 INNER JOIN horario h ON h.id=c.id) 
                 where '$fechaini'< h.hora_fin && '$fechafin' > h.hora_inicio && u.id= '$profesor';");
if ($consultaProfesores->fetchColumn() > 0) {
    echo ("profesor");
} else {
    if ($consultaSalones->fetchColumn() > 0) {
        echo ("salon");
    } else {
        echo "";
    }
}
