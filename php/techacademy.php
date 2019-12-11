<?php
$titulo = "Cursos de Tech Academy";
include '_header.php';
include 'conexion.php';
$query1 = $conexion->prepare("SELECT ca.nombre as 'nombre_curso', ca.id as 'id_cap', ca.descripcion as 'descripcion', ca.foto, ta.responsable, usu.nombre, usu.apellido, ca.duracion FROM capacitaciones ca INNER JOIN techacademy ta on ca.id = ta.id INNER JOIN usuarios usu on usu.id = ca.id_profesor");
$query2 = $conexion->prepare("SELECT ho.fecha, ho.hora_inicio, ho.hora_fin, sa.salon FROM capacitaciones ca INNER JOIN techacademy tcha on ca.id = tcha.id INNER JOIN horario ho on ca.id = ho.id_capacitacion INNER JOIN salones sa on ho.id_salon = sa.id");
$totalRegistro = $conexion->query("SELECT COUNT(*) as total FROM capacitaciones ca INNER JOIN techacademy ta on ca.id = ta.id INNER JOIN usuarios usu on usu.id = ca.id_profesor");

$query1->setFetchMode(PDO::FETCH_ASSOC);
$query1->execute();

$query2->setFetchMode(PDO::FETCH_ASSOC);
$query2->execute();

$totalRegistro = $totalRegistro->fetchColumn();
?>
<div class="container mt-4">
    <h1 class="display-4 text-center mt-3"><?php echo $titulo ?></h1>
    <?php
    while ($totalRegistro > 0) {
        $resulQuery1 = $query1->fetch();
        $resulQuery2 = $query2->fetch();
        ?>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-7">
                    <img src="../img/<?php echo $resulQuery1["foto"] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-5">
                    <div class="card-body mt-5">
                        <h3 class="card-title"><?php echo $resulQuery1["nombre_curso"] ?></h3>
                        <div class="row p-2">
                            <div class="col">
                                <ul>
                                    <li> Profesor Responsable: <?php echo $resulQuery1["responsable"] ?></li>
                                    <li> Instructor(es): <?php echo $resulQuery1["nombre"] . " " . $resulQuery1["apellido"] ?></li>
                                    <li> Fecha: <?php echo $resulQuery2["fecha"] ?></li>
                                    <li> Salón: <?php echo $resulQuery2["salon"] ?></li>
                                    <li> Duración: <?php echo $resulQuery1["duracion"] ?></li>
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=<?php echo "#" . $resulQuery1["id_cap"] ?>>
                            INSCRIBIRSE
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id=<?php echo $resulQuery1["id_cap"] ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4>Facturación</h4>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <div class="card" style="width: 100%;">
                                    <div class="card-header">
                                        Datos del usuario
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Nombre: <?php
                                                                                if (!isset($_SESSION["nombre"])) {
                                                                                    echo "";
                                                                                } else
                                                                                    echo $_SESSION['nombre']; ?></li>
                                        <li class="list-group-item">Apellido: <?php
                                                                                    if (!isset($_SESSION["apellido"])) {
                                                                                        echo "";
                                                                                    } else
                                                                                        echo $_SESSION['apellido']; ?></li>
                                        <li class="list-group-item">Cedula: <?php
                                                                                if (!isset($_SESSION["cedula"])) {
                                                                                    echo "";
                                                                                } else
                                                                                    echo $_SESSION['cedula']; ?></li>
                                        <li class="list-group-item">Email: <?php
                                                                                if (!isset($_SESSION["correo"])) {
                                                                                    echo "";
                                                                                } else
                                                                                    echo $_SESSION['correo']; ?></li>
                                        <li class="list-group-item">Fecha de Nacimiento: <?php
                                                                                                if (!isset($_SESSION["fecha_nacimiento"])) {
                                                                                                    echo "";
                                                                                                } else
                                                                                                    echo $_SESSION['fecha_nacimiento']; ?></li>
                                    </ul>
                                </div>
                            </blockquote>
                            <blockquote class="blockquote mb-0 mt-4">
                                <div class="card" style="width: 100%;">
                                    <div class="card-header">
                                        Datos del Curso
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Nombre del curso: <?php echo $resulQuery1["nombre_curso"] ?> </li>
                                        <li class="list-group-item">Descripción: <?php echo $resulQuery1["descripcion"] ?> </li>
                                        <li class="list-group-item">Duración: <?php echo $resulQuery1["duracion"] ?></li>
                                    </ul>
                                </div>
                            </blockquote>
                        </div>
                        <form action="agregar_usuario_capacitacion.php" method="POST">
                            <input type="hidden" name="id_curso" value="<?php echo $resulQuery1["id_cap"]; ?>"/>
                            <button type="buttons" class="btn btn-secondary" >INSCRIBIRSE</button>                                                                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $totalRegistro--;
    }

    ?>

    <!-- <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <div class="card-body">
                            <h3 class="card-title">Linux Básico para Desarrolladores Web</h3>
                            <div class="row p-2">
                                <div class="col">
                                    <ul>
                                        <li> Profesor Responsable: Sergio Cotes.</li>
                                        <li> Instructor: Roberto Rubio.</li>
                                        <li> Fecha: 22 de Febrero del 2019</li>
                                        <li> Lugar: Campus Víctor Levi Sasso, Edificio 3.</li>
                                        <li> Salón: 3-410.</li>
                                        <li> Duración: 15 horas reloj.</li>
                                        <li> Costo: Gratis.</li>
                                    </ul>
                                </div>                    
                            </div>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="../img/linux.jpg" class="card-img" alt="...">
                    </div>
                </div>
        </div>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-7">
                <img src="../img/angular.png" class="card-img" alt="...">
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h3 class="card-title">Principios Básicos de Angular 5</h3>
                        <div class="row p-2">
                            <div class="col">
                                <ul>
                                    <li> Instructor: Regis Rivera.</li>
                                    <li> Fecha:  19, 20 y 21 de Febrero del 2019.</li>
                                    <li> Lugar: Campus Víctor Levi Sasso, Edificio 3.</li>
                                    <li> Salón: 3-410.</li>
                                    <li> Duración: 12 Horas.</li>
                                    <li> Costo: Gratis.</li>
                                </ul>
                            </div>                    
                        </div>
                    
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>

                        </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <div class="card-body">
                            <h3 class="card-title">Gestión de Vulnerabilidades de Red</h3>
                            <div class="row p-2">
                                <div class="col">
                                    <ul>
                                        <li> Profesor Responsable: Eduardo Snape.</li>
                                        <li> Instructor: Roberto Rubio.</li>
                                        <li> Fecha: 19 y 20 de Febrero del 2019</li>
                                        <li> Lugar: Campus Víctor Levi Sasso, Edificio 3.</li>
                                        <li> Salón: 3-301.</li>
                                        <li> Duración: 14 horas reloj.</li>
                                        <li> Horario: 9:00 a.m. a 5:00 p.m.</li>
                                        <li> Costo: Gratis.</li>
                                    </ul>
                                </div>                    
                            </div>
                            
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="../img/vulnerabilidad.jpg" class="card-img" alt="...">
                    </div>
                </div>
        </div>  -->

</div>
<?php include '_footer.php'; ?>