<?php session_start();
include 'conexion.php';
include 'contador.php';

$nombreCurso = $_POST['nombrecurso'];
$descripcion = $_POST['descripcion'];
$duracion = $_POST['duracion'];
$cantMiniEstudiante = $_POST['minestudiante'];
$cantMaxEstudiante = $_POST['maxestudiante'];
$tipoCapacitacion = $_POST['capatipo'];
$organizador = $_POST['organizador'];
$perfilIngreso = $_POST['perfilIngreso'];
$criteriosEvaluacion = $_POST['criteriosEvaluacion'];
$responsable = $_POST['responsable'];
$profesor = $_POST['escoprofesores'];
$salon = $_POST['escosalon'];
$fechaini  = $_POST['fechaini'];
$fechafin = $_POST['fechafin'];
$pago = $_POST['contenidopago'];
$fechaactual = date("Y") . "-" . date("m") . "-" . date("d");
$numero = count($fechaini);
$objetivos = $_POST['obejetivosGenerales'];


if (file_exists("../img/" . $_FILES["fileFoto"]["name"])) {
    $imagenRuta = $num . $_FILES["fileFoto"]["name"];
} else {
    $imagenRuta = $_FILES["fileFoto"]["name"];
}
move_uploaded_file($_FILES["fileFoto"]["tmp_name"], "../img/" . $imagenRuta);
if ($tipoCapacitacion == 4) {
    $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', '$imagenRuta' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
    $conexion->query($sqlcapacitacion);
    $last_id = $conexion->lastInsertId();
    for ($i = 0; $i < $numero; $i++) {
        $ini = $fechaini[$i];
        $fin = $fechafin[$i];
        $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
        $conexion->query($sqlhorario);
    }
} else {
    if ($tipoCapacitacion == 1) {
        $cisco = $_POST['cisco'];
        $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', '$imagenRuta' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
        $conexion->query($sqlcapacitacion);
        $last_id = $conexion->lastInsertId();
        for ($i = 0; $i < $numero; $i++) {
            $ini = $fechaini[$i];
            $fin = $fechafin[$i];
            $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
            $conexion->query($sqlhorario);
        }
        echo "cisco";
        $sqlcisco = "insert into cisco (id,id_clasificacion) values ('$last_id',' $cisco')";
        $conexion->query($sqlcisco);
    } else {
        if ($tipoCapacitacion == 2) {
            $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', '$imagenRuta' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
            $conexion->query($sqlcapacitacion);
            $last_id = $conexion->lastInsertId();
            for ($i = 0; $i < $numero; $i++) {
                $ini = $fechaini[$i];
                $fin = $fechafin[$i];
                $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
                $conexion->query($sqlhorario);
            }
            echo "techacademy";
            $sqltechacademy = "insert into techacademy (id,responsable) values ('$last_id',' $responsable')";
            $conexion->query($sqltechacademy);
        } else {
            if ($tipoCapacitacion == 3) {
                $sqlcapacitacion = "insert into capacitaciones (nombre, fecha_creacion, foto, min_cupo, max_cupo, descripcion, duracion, id_profesor, costo) values ('$nombreCurso', '$fechaactual', '$imagenRuta' , '$cantMiniEstudiante', '$cantMaxEstudiante', '$descripcion', '$duracion','$profesor', '$pago')";
                $conexion->query($sqlcapacitacion);
                $last_id = $conexion->lastInsertId();
                for ($i = 0; $i < $numero; $i++) {
                    $ini = $fechaini[$i];
                    $fin = $fechafin[$i];
                    $sqlhorario = "insert into horario(id_capacitacion,id_salon,fecha,hora_inicio,hora_fin) values ('$last_id','$salon','$fechaactual','$ini','$fin')";
                    $conexion->query($sqlhorario);
                }
                if (file_exists("../files/plan_contenido/" . $_FILES['planContenido']["name"])) {
                    $planContenidoRuta = $num . $_FILES["planContenido"]["name"];
                } else {
                    $planContenidoRuta = $_FILES["planContenido"]["name"];
                }
                move_uploaded_file($_FILES["planContenido"]["tmp_name"], "../files/plan_contenido/" . $planContenidoRuta);
                if (file_exists("../files/plan_costo/" . $_FILES['planCosto']["name"])) {
                    $planCostoRuta = $num . $_FILES["planCosto"]["name"];
                } else {
                    $planCostoRuta = $_FILES["planCosto"]["name"];
                }
                move_uploaded_file($_FILES["planCosto"]["tmp_name"], "../files/plan_costo/" . $planCostoRuta);

                echo "diplomado";
                $sqldiplomado = "insert into diplomados (id,organizador, perfil_ingreso,plan_costo,plan_contenido,criterio_evaluacion,objetivos) values ('$last_id',' $organizador','$perfilIngreso','$planCostoRuta','$planContenidoRuta','$criteriosEvaluacion','$objetivos')";
                $conexion->query($sqldiplomado);
            }
        }
    }
}
echo "<script>alert('Curso Registrado Correctamente.')</script>";
echo "<script>window.location='agregarcurso.php';</script>";
