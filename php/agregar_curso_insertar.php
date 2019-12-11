<?php
include 'Conexion.php';

$nombreCurso = $_POST['nombrecurso'];
// $fotoCurso = $_POST['foto'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$cantMiniEstudiante = $_POST['minestudiante'];
$cantMaxEstudiante = $_POST['maxestudiante'];
$tipoCapacitacion = $_POST['capatipo'];
$organizador = $_POST['organizador'];
$perfilIngreso = $_POST['perfilIngreso'];
// $planContenido = $_POST['planContenido'];
$criteriosEvaluacion = $_POST['criteriosEvaluacion'];
$responsable = $_POST['responsable'];
$profesor = $_POST['escoprofesores'];
$salon = $_POST['escosalon'];
//$planCosto = $_POST['planCosto'];
$fechaini  = $_POST['fechaini'];
$fechafin = $_POST['fechafin'];
$pago = $_POST['contenidopago'];
$fechaactual = date("Y") . "-" . date("m") . "-" . date("d");
$numero = count($fechaini);



if ($tipoCapacitacion == 4) {
    echo("entro");
    $sqlcapacitacion ="insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', ' ' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
    $conexion->query($sqlcapacitacion);
    $last_id = $conexion->lastInsertId();
    $sqlusuario_capacitacion = "insert into usuarios_capacitaciones (id_usuario,id_capacitacion) values ('$profesor','$last_id')";
    $conexion->query($sqlusuario_capacitacion);
    for ($i = 0; $i < $numero; $i++) {
        $ini = $fechaini[$i];
        $fin = $fechafin[$i];
        $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
        $conexion->query($sqlhorario);
    }
 }else{
    if($tipoCapacitacion == 1){ 
        $cisco = $_POST['cisco'];
        $sqlcapacitacion ="insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', ' ' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
        $conexion->query($sqlcapacitacion);
        $last_id = $conexion->lastInsertId();
        $sqlusuario_capacitacion = "insert into usuarios_capacitaciones (id_usuario,id_capacitacion) values ('$profesor','$last_id')";
        $conexion->query($sqlusuario_capacitacion);
    for ($i = 0; $i < $numero; $i++) {
            $ini = $fechaini[$i];
            $fin = $fechafin[$i];
            $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
            $conexion->query($sqlhorario);
        }
        echo "cisco";
        $sqlcisco = "insert into cisco (id,id_clasificacion) values ('$last_id',' $cisco')";
        $conexion->query($sqlcisco);
    }else{
        if ($tipoCapacitacion == 2) {
            $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', ' ' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
            $conexion->query($sqlcapacitacion);
            $last_id = $conexion->lastInsertId();
            $sqlusuario_capacitacion = "insert into usuarios_capacitaciones (id_usuario,id_capacitacion) values ('$profesor','$last_id')";
            $conexion->query($sqlusuario_capacitacion);
            for ($i = 0; $i < $numero; $i++) {
                $ini = $fechaini[$i];
                $fin = $fechafin[$i];
                $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
                $conexion->query($sqlhorario);
            }
            echo "techacademy";
            $sqltechacademy = "insert into techacademy (id,responsable) values ('$last_id',' $responsable')";
            $conexion->query($sqltechacademy);
        }else{
            if ($tipoCapacitacion == 3) {
                $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', ' ' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
                $conexion->query($sqlcapacitacion);
                $last_id = $conexion->lastInsertId();
                $sqlusuario_capacitacion = "insert into usuarios_capacitaciones (id_usuario,id_capacitacion) values ('$profesor','$last_id')";
                $conexion->query($sqlusuario_capacitacion);
                for ($i = 0; $i < $numero; $i++) {
                    $ini = $fechaini[$i];
                    $fin = $fechafin[$i];
                    $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
                    $conexion->query($sqlhorario);
                }
                echo "diplomado";
                $sqldiplomado = "insert into diplomados (id,organizador, perfil_ingreso,plan_costo,plan_contenido,criterio_evaluacion) values ('$last_id',' $organizador','$perfilIngreso','','','$criteriosEvaluacion')";
                $conexion->query($sqldiplomado);
            }
        }
    }
 }
header("Location: agregarcurso.php");

 ?>
