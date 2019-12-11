<?php session_start();
$titulo = "Cursos";
include '_header.php';
include 'conexion.php';
// $cursosBasicos = $conexion->prepare("SELECT ca.id
// FROM capacitaciones ca
//     LEFT JOIN techacademy tec ON ca.id = tec.id
//     LEFT JOIN cisco cs ON ca.id = cs.id
//     LEFT JOIN diplomados dip ON ca.id = dip.id
// WHERE tec.id IS NULL and cs.id IS NULL and dip.id IS NULL;");


$cursosBasicos = $conexion->prepare("SELECT ca.id as 'id_cap'
FROM capacitaciones ca
    LEFT JOIN techacademy tec ON ca.id = tec.id
    LEFT JOIN cisco cs ON ca.id = cs.id
    LEFT JOIN diplomados dip ON ca.id = dip.id
WHERE tec.id IS NULL and cs.id IS NULL and dip.id IS NULL");
$cursosBasicos->execute();
$totalCursosBasicos = $cursosBasicos->rowCount();
$contCursosBasicos = $totalCursosBasicos;
$numCeil = $totalCursosBasicos/2;?>
    <div class="container">
        <h1 class="display-4 text-center mt-3"><?php echo $titulo ?></h1>
<?php
if(strpos($numCeil,".") !== false){
      $numCeil = ceil($numCeil);
      $x = 1; 
      
}
    while($numCeil > 0 and $totalCursosBasicos > 0){ ?>
    <div class="row center  d-flex justify-content-center">
    <?php 
    if($numCeil != 1 or $totalCursosBasicos != 1){
        $cards = 2;
    }
    else{
       $cards = 1;
    }   
    while($cards > 0){
        $nextId = $cursosBasicos->fetch();
        $id_cap = $nextId["id_cap"];
        //$contCursosBasicos = $contCursosBasicos + 1;
        $resultados = $conexion->prepare("select * from capacitaciones where id = ?");
        $resultados2 = $conexion->prepare("select ho.fecha, ho.hora_inicio, ho.hora_fin, sal.salon from capacitaciones ca 
        INNER JOIN horario ho on ca.id = ho.id_capacitacion
        INNER JOIN salones sal on ho.id_salon = sal.id 
        where ca.id = ?");
        $resultados->execute([$id_cap]);
        $resultados2->execute([$id_cap]);
        $resultados = $resultados->fetch();
        $resultados2 = $resultados2->fetch();
?>
        <div class="col-sm-5 mb-4">
            <div class="card">
                <div class="card-body">
                    <div style="height: 50px;"><h5 class="card-title h-100"><?php echo $resultados["nombre"] ?></h5></div>
                    <!-- <p class="card-text"><?php echo $resultados["descripcion"] ?></p> -->
                    <p class="card-text">Costo: <?php echo $resultados["costo"] ?></p>
                    <div class="col-md-12">
                        <img src="../img/<?php echo $resultados["foto"] ?>" class="card-img" alt="...">
                        <!-- <img src="../img/agile.jpg" class="card-img" alt="..."> -->
                    </div>
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=<?php echo "#".$resultados["id"]."info" ?>>
                        Ver más información
                    </button>
                    <div class="modal fade" id=<?php echo $resultados["id"]."info" ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Información General</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="lead"><strong>Descripción: </strong></h5>
                                        <p class="card-text pl-4"><?php echo $resultados["descripcion"] ?></p>                                                              
                                    <h5 class="lead"><strong>Costo:</strong></h5>
                                    <p class="card-text pl-4"><?php echo $resultados["costo"] ?></p>
                                    <h5 class="lead"><strong>Duración:</strong></h5>
                                    <p class="card-text pl-4"><?php echo $resultados["duracion"] ?></p>
                                    <h5 class="lead"><strong>Fecha inicio: </strong></h5>
                                    <p class="card-text pl-4"><?php echo $resultados2["fecha"] ?></p>
                                    <h5 class="lead"><strong>Hora inicio: </strong></h5>
                                    <p class="card-text pl-4"><?php echo $resultados2["hora_inicio"] ?></p>
                                    <h5 class="lead"><strong>Hora fin: </strong></h5>
                                    <p class="card-text pl-4"><?php echo $resultados2["hora_fin"] ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target=<?php echo "#".$resultados["id"]."fac" ?>>
                        INSCRIBIRSE
                    </button>
                </div>

                <div class="modal fade" id=<?php echo $resultados["id"]."fac" ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
                                                    if (!isset($_SESSION["nombre"])){ echo "";
                                                        } 
                                                    else    
                                                        echo $_SESSION['nombre']; ?></li>
                                                <li class="list-group-item">Apellido: <?php     
                                                    if (!isset($_SESSION["apellido"])){ echo "";
                                                        } 
                                                    else    
                                                        echo $_SESSION['apellido']; ?></li>
                                                <li class="list-group-item">Cedula: <?php     
                                                    if (!isset($_SESSION["cedula"])){ echo "";
                                                        } 
                                                    else    
                                                        echo $_SESSION['cedula']; ?></li>
                                                <li class="list-group-item">Email: <?php     
                                                    if (!isset($_SESSION["correo"])){ echo "";
                                                        } 
                                                    else    
                                                        echo $_SESSION['correo']; ?></li>
                                                <li class="list-group-item">Fecha de Nacimiento: <?php     
                                                    if (!isset($_SESSION["fecha_nacimiento"])){ echo "";
                                                        } 
                                                    else    
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
                                            <li class="list-group-item">Nombre del curso: <?php echo $resultados["nombre"] ?> </li>
                                            <li class="list-group-item">Descripción: <?php echo $resultados["descripcion"] ?> </li>
                                            <li class="list-group-item">Duración: <?php echo $resultados["duracion"] ?></li>
                                            </ul>
                                        </div>  
                                    </blockquote>
                                    <blockquote class="blockquote mb-0 mt-4">
                                        <div class="card" style="width: 100%;">
                                        <div class="card-header">
                                        Pago
                                        </div>
                                            <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Total: <?php echo $resultados["costo"] ?></li>
                                            </ul>
                                        </div>  
                                    </blockquote>
                                </div>
                                <form action="agregar_usuario_capacitacion.php" method="POST">
                                    <input type="hidden" name="id_curso" value="<?php echo $resultados["id"]; ?>"/>
                                    <button type="buttons" class="btn btn-secondary" >INSCRIBIRSE</button>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
<?php
    $cards--;
    $totalCursosBasicos--;
    }?>
    </div>
<?php 
    $numCeil--;
    }
?>



    <!-- <div class="card">
        <div class="card-body">
            <p><h2>Descripción de la academia CISCO</h2></p>
            <p>Los cursos de Networking Academy están diseñados para ayudar a los alumnos a prepararse para oportunidades profesionales básicas y avanzadas, formación continua y obtener certificaciones reconocidas a nivel mundial. Los cursos están respaldados por contenido en línea, clases presenciales, evaluaciones y quices online, laboratorios y actividades prácticas, y herramientas de aprendizaje interactivas para ayudar a los alumnos a desarrollar el conocimiento y habilidades necesarias para interactuar en campos relacionados con redes y nuevas tecnologías de información (TICs).</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                Ver más información
            </button>
        </div>
    </div> -->

    <!-- <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Información General</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="lead"><strong>Funciones: </strong></h5>
                        <ul>
                            <li><p class="card-text pl-1">En la asociación con escuelas y organizaciones de todo el mundo Cisco Networking Academy brinda una experiencia integral de aprendizaje para ayudar a los estudiantes a desarrollar habilidades de TIC con mira a oportunidades laborales, educación permanente y certificaciones profesionales de validez internacional.</p></li>
                            <li><p class="card-text pl-1">Que los estudiantes aprendan lo aspectos básico y las tecnologías avanzadas para prepararse a los exámenes de certificación.</p></li>
                            <li><p class="card-text pl-1">Los laboratorios de prácticas y las actividades de aprendizajes basadas en las simulaciones de Cisco Packet Tracer ayudan a los estudiantes a desarrollar el pensamiento crítico y las habilidades de resolución de problemas complejos.</p></li>
                        </ul>
                        <h5 class="lead"><strong>Requisitos:</strong></h5>
                        <ul>
                            <li><p class="card-text pl-1">Conocimientos básicos de computación y redes de computadoras.</p></li>
                            <li><p class="card-text pl-1">Experiencia en el uso de navegadores de Internet.</p></li>
                            <li><p class="card-text pl-1">TIngles Científico.</p></li>                    
                        </ul>
                        <h5 class="lead"><strong>Duración</strong></h5>
                        <p>Los módulos tienen una duración de 9 semanas.</p>
                        <h5 class="lead"><strong>Costos</strong></h5>
                        <ul>
                            <li><p class="card-text pl-1">Estudiantes de la UTP: B/. 225.00.</p></li>
                            <li><p class="card-text pl-1">Egresados de la UTP o estudiantes de otras universidades: B/.275.00.</p></li>
                            <li><p class="card-text pl-1">Profesionales: B/. 325.00.</p></li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
        </div>
    </div> -->


<!-- <div class="row center  d-flex justify-content-center">
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <div class="col-md-12">
            <img src="../img/agile.jpg" class="card-img" alt="...">
        </div>
        <a href="#" class="btn btn-primary mt-3">INSCRIBIRSE</a>
        <a href="#" class="btn btn-primary mt-3">Ver más información</a>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <div class="col-md-12">
            <img src="../img/agile.jpg" class="card-img" alt="...">
        </div>
        <a href="#" class="btn btn-primary mt-3">INSCRIBIRSE</a>
        <a href="#" class="btn btn-primary mt-3">Ver más información</a>
      </div>
    </div>
  </div>
</div> -->

<?php 
include '_footer.php';?>
