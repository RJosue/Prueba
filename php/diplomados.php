<?php
$titulo = "Diplomados";
include '_header.php';
include 'conexion.php';

$diplomados = $conexion->prepare("SELECT ca.id as 'id_cap', ca.nombre as 'nombre_capacitacion', ca.foto, ca.descripcion, ca.duracion, ca.costo, dip.id, dip.organizador, dip.perfil_ingreso, dip.plan_costo, dip.plan_contenido, dip.criterio_evaluacion, dip.objetivos, ho.fecha, sal.salon FROM diplomados dip INNER JOIN capacitaciones ca on dip.id = ca.id INNER JOIN horario ho on ho.id_capacitacion = ca.id INNER JOIN salones sal on ho.id_salon = sal.id");
$diplomados->execute();
$cantDiplomado = $diplomados->rowCount();?>
<h1 class="display-4 text-center mt-3"><?php echo $titulo ?></h1>
<?php
while($cantDiplomado > 0){
  $resultados = $diplomados->fetch();
?>
  <div class="container mt-3">
    <div class="card mb-3" style="max-width: 100%;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="../img/<?php echo $resultados["foto"];?>" class="card-img img-fluid p-4" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body mt-4">
            <h3 class="card-title"><?php echo $resultados["nombre_capacitacion"] ?></h3>
            <h5 class="lead"><strong>Descripción</strong></h5>
            <p class="card-text pl-4"><?php echo $resultados["descripcion"] ?></p>
            <h5 class="lead"><strong>Objetivo General</strong></h5>
            <p class="card-text pl-4"><?php echo $resultados["objetivos"] ?> </p>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=<?php echo "#".$resultados["id_cap"]."info" ?>>
              Ver más información
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=<?php echo "#".$resultados["id_cap"]."fac" ?>>
              INSCRIBIRSE
              </button>
            <div class="modal fade" id=<?php echo $resultados["id_cap"]."info" ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Información General</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="lead"><strong>Perfil de Ingreso:</strong></h5>
                            <p class="card-text pl-4"><?php echo $resultados["perfil_ingreso"] ?></p>
                        <h5 class="lead"><strong>Contenido del Diplomado</strong></h5>
                        <p class="card-text pl-4"><a href="../files/plan_contenido/<?php echo $resultados["plan_contenido"];?>" style="color:grey;">Descargar pdf</a></p>
                        <h5 class="lead"><strong>Criterios de Evaluación Académica</strong></h5>
                            <p class="card-text pl-4"><?php echo $resultados["criterio_evaluacion"] ?></p>
                        <h5 class="lead"><strong>Organizado por:</strong></h5>
                            <p class="card-text pl-4"><?php echo $resultados["organizador"] ?></p>                            
                        <h5 class="lead"><strong>Costo:</strong></h5>
                          <p class="card-text pl-4"><?php echo $resultados["costo"] ?></p>
                        <h5 class="lead"><strong>Duración:</strong></h5>
                          <p class="card-text pl-4"><?php echo $resultados["duracion"] ?></p>
                        <h5 class="lead"><strong>Fecha inicio: </strong></h5>
                          <p class="card-text pl-4"><?php echo $resultados["fecha"] ?></p>
                        <h5 class="lead"><strong>Lugar: </strong></h5>
                          <p class="card-text pl-4"><?php echo $resultados["salon"] ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                  </div>
              </div>
            </div> 
          </div>
        </div>
        <div class="modal fade" id=<?php echo $resultados["id_cap"]."fac" ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
                                  <li class="list-group-item">Nombre del curso: <?php echo $resultados["nombre_capacitacion"] ?> </li>
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
                          <input type="hidden" name="id_curso" value="<?php echo $resultados["id_cap"]; ?>"/>
                          <button type="buttons" class="btn btn-secondary" >INSCRIBIRSE</button>                                                                        
                      </form>
                  </div>
              </div>
          </div>
        </div> 
      </div>
    </div>
  </div>     
<?php 
$cantDiplomado--;
}
?>
<!-- <div class="container mt-3">
  <div class="card mb-3" style="max-width: 100%;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="../img/diplomado2.2.jpg" class="card-img img-fluid p-4" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body mt-4">
          <h3 class="card-title">Diplomado en Gestión de Proyectos Ágiles</h3>
          <h5 class="lead"><strong>Descripción</strong></h5>
          <p class="card-text pl-4">Las metodologías ágiles permiten al participante desarrollar habilidades para gestionar proyectos en los que las necesidades y soluciones evolucionan a través de una colaboración estrecha entre equipos multidisciplinarios, logrando entregas de valor, a través del desarrollo de producto iterativo incremental enfocado en mínimos productos viables, manteniendo la calidad y proporcionando ventaja competitiva a las organizaciones.</p>
          <h5 class="lead"><strong>Objetivo General</strong></h5>
          <p class="card-text pl-4">Este diplomado tiene como propósito preparar a las personas involucradas en la gestión de proyectos mediante metodologías ágiles. Reforzar los conocimientos de gestión de proyectos mediante métodos y técnicas ágiles basados en los requerimientos del usuario.</p>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          Ver más información
          </button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2">
          INSCRIBIRSE
          </button>
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
                  <h5 class="lead"><strong>Dirigido a:</strong></h5>
                      <p class="card-text pl-4">Este Diplomado está dirigido a profesionales en ingeniería, administración o líderes interdisciplinarios que deseen ejecutar un rol dentro de un proyecto ágil y/o deseen aprender sobre la gestión de proyectos.</p>
                  <h5 class="lead"><strong>Módulos</strong></h5>
                  <ul>
                      <li><p class="card-text pl-1">Fundamentos de Agilismo</p></li>
                      <li><p class="card-text pl-1">Scrum Master</p></li>
                      <li><p class="card-text pl-1">Product Owner</p></li>
                      <li><p class="card-text pl-1">Management 3.0</p></li>
                      <li><p class="card-text pl-1">DevOps</p></li>

                  </ul>
                  <h5 class="lead"><strong>Organizado por:</strong></h5>
                      <p class="card-text pl-4">Facultad de Ingeniería de Sistemas Computacionales (FISC), de la Universidad Tecnológica de Panamá (UTP) - Stefanini.</p>
                  <h5 class="lead"><strong>Costos:</strong></h5>
                      <ul>
                          <li><p class="card-text pl-1">Horario: Jueves  6:00 p.m. a 9:00 p.m. y Sábado 8:00 a.m. a 4:00 p.m.</p></li>
                          <li><p class="card-text pl-1">Lugar: Edificio No° 3 de la FISC</p></li>
                          <li><p class="card-text pl-1">Total de Horas: 100 horas</p></li>
                          <li><p class="card-text pl-1">Costos: $ 1,740.00</p></li>
                          <li><p class="card-text pl-1">Fecha de inicio:  3 de octubre de 2019</p></li>
                      </ul>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
              </div>
          </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
                    <li class="list-group-item">Nombre:</li>
                    <li class="list-group-item">Apellido:</li>
                    <li class="list-group-item">Cedula:</li>
                    <li class="list-group-item">Email:</li>
                    <li class="list-group-item">Fecha de Nacimiento:</li>
                  </ul>
              </div>  
            </blockquote>
            <blockquote class="blockquote mb-0 mt-4">
              <div class="card" style="width: 100%;">
                <div class="card-header">
                Datos del Curso
                </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Nombre del curso:</li>
                    <li class="list-group-item">Descripción:</li>
                    <li class="list-group-item">Duración:</li>
                  </ul>
              </div>  
            </blockquote>

            <blockquote class="blockquote mb-0 mt-4">
              <div class="card" style="width: 100%;">
                <div class="card-header">
                Pago
                </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">SubTotal:</li>
                    <li class="list-group-item">ITBMS:</li>
                    <li class="list-group-item">Total:</li>
                  </ul>
              </div>  
            </blockquote>          
          </div>
            <button type="buttons" class="btn btn-secondary">PAGAR</button>
        </div>
      </div>
    </div>
    </div>
  </div>
</div> -->


<?php 
include '_footer.php';
 ?>
