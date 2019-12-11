<?php
$titulo = "Academia CISCO";
include '_header.php';
include 'conexion.php';
$ClasificacionCisco = $conexion->prepare("select COUNT(*) as 'total' from clasificacion_cisco");
$ClasificacionCisco->execute();
$ClasificacionCisco = $ClasificacionCisco->fetch();
$totalClasificacionCisco = $ClasificacionCisco["total"];
$contClasificacionCisco = $totalClasificacionCisco - $totalClasificacionCisco;

?>

<div class="container">
    <h1 class="display-4 text-center mt-3"><?php echo $titulo ?></h1>

    <div class="card">
        <div class="card-body">
            <p><h2>Descripción de la academia CISCO</h2></p>
            <p>Los cursos de Networking Academy están diseñados para ayudar a los alumnos a prepararse para oportunidades profesionales básicas y avanzadas, formación continua y obtener certificaciones reconocidas a nivel mundial. Los cursos están respaldados por contenido en línea, clases presenciales, evaluaciones y quices online, laboratorios y actividades prácticas, y herramientas de aprendizaje interactivas para ayudar a los alumnos a desarrollar el conocimiento y habilidades necesarias para interactuar en campos relacionados con redes y nuevas tecnologías de información (TICs).</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                Ver más información
            </button>
        </div>
    </div>

    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
    </div>
<?php 
    $numCeil = $totalClasificacionCisco/3;
    if(strpos($numCeil,".") !== false){
         $numCeil = ceil($numCeil);
}
        while($numCeil > 0 and $totalClasificacionCisco > 0){ ?>
        <div class="card-deck p-4">
        <?php $cards = 3;
        while($cards > 0){
            $contClasificacionCisco = $contClasificacionCisco + 1;
            $clasf = $conexion->prepare("select ca.id, ca.nombre, ca.foto, ca.descripcion, ca.costo, ca.duracion, clci.clasificacion from capacitaciones ca
            INNER JOIN cisco ci on ci.id = ca.id
            INNER JOIN clasificacion_cisco clci on clci.id = ci.id_clasificacion
            WHERE clci.id = ?");
            $clasf->execute([$contClasificacionCisco]);
            $resultados = $clasf->fetch();
            $totalRegistro = $clasf->rowCount();
            if($totalRegistro!=0){
?>
                <div class="card mt-3 ">
                    <img src="../img/<?php echo $resultados["foto"] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $resultados["clasificacion"]?></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus. </p>
                    </div>      
                    <ul class="list-group list-group-flush">
                    <?php
                    while($totalRegistro > 0) {        
                    ?> 
                        <li class="list-group-item"><?php echo $resultados["nombre"] ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=<?php echo "#".$resultados["id"] ?>>
                                INSCRIBIRSE
                            </button>
                        </li>
                    </ul>
                    <div class="modal fade" id=<?php echo $resultados["id"] ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
                    <?php $totalRegistro = $totalRegistro - 1;
                        $resultados = $clasf->fetch();
                        }
                    }
                    else
                        $cards = -100;
                    ?>
                </div>
<?php 
        $cards = $cards - 1;
        $totalClasificacionCisco = $totalClasificacionCisco - 1; }
?>
            </div>

<?php 
        $numCeil = $numCeil - 1; }
?>

</div>
<?php 
include '_footer.php';?>
