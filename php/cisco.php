<?php
$titulo = "";
include '_header.php'; 
?>

<div class="container">
    <h1 class="display-4 text-center mt-3">Academia CISCO</h1>
    <div class="card">
        <div class="card-body">
            <p><h2>Descripción de la academia CISCO</h2></p>
            <p>Los cursos de Networking Academy están diseñados para ayudar a los alumnos a prepararse para oportunidades profesionales básicas y avanzadas, formación continua y obtener certificaciones reconocidas a nivel mundial. Los cursos están respaldados por contenido en línea, clases presenciales, evaluaciones y quices online, laboratorios y actividades prácticas, y herramientas de aprendizaje interactivas para ayudar a los alumnos a desarrollar el conocimiento y habilidades necesarias para interactuar en campos relacionados con redes y nuevas tecnologías de información (TICs).</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                Ver más información
            </button>
        </div>
    </div>

        <!-- Modal -->
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

    <div class="card-deck p-4">
        <div class="card mt-3 ">
            <img src="../img/redes.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Redes Básicas</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus. </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">CCNA Routing and Switching
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>
                </li>
                <li class="list-group-item">Networking Essentials
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>           
                </li>
            </ul>

        </div>
        <div class="card mt-3 ">
            <img src="../img/redes2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Redes Avanzadas</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">CCNP Routing and Switching
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>
                </li>
                <li class="list-group-item">Switching
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>          
                </li>
                <li class="list-group-item">Troubleshooting
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>        
            </li>
            </ul>
        </div>
        <div class="card mt-3 ">
            <img src="../img/redes3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Seguridad en Redes</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Introducción a la Ciberseguridad
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>
                </li>
                <li class="list-group-item">Fundamentos de Ciberseguridad
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>         
                </li>
                <li class="list-group-item">Cibersecurity Operations
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>           
                </li>
                <li class="list-group-item">CCNA Security
                        <<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>           
                </li>
            </ul>
        </div>
    </div>

    <div class="card-deck p-4">
        <div class="card mt-3">
            <img src="../img/linux.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Sistemas Operativos</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus. </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Linux Unhatched
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>
                </li>
                <li class="list-group-item"> Linux Essentials
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>          
                </li>
                <li class="list-group-item"> Linux I
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>          
                </li>
                <li class="list-group-item"> Linux II
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>           
                </li>
            </ul>

        </div>
        <div class="card mt-3">
            <img src="../img/iot.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nuevas Tecnologías</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">IT Essentials (Hardware & Software)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>                </li>
                <li class="list-group-item">Get Conected
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>                </li>
                <li class="list-group-item">Internet de las Cosas
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>                </li>
            </ul>
        </div>
        <div class="card mt-3">
            <img src="../img/redes3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Alineado con Negocios</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellat animi. Fugit, ratione! Consequatur vero distinctio libero perspiciatis accusamus.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Sea su propio Jefe
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>                </li>
                <li class="list-group-item">Emprendimiento
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        INSCRIBIRSE
                        </button>
                </li>
            </ul>
        </div>
    </div>





    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
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
          <!-- BOTON DE PAGO -->
          <button type="buttons" class="btn btn-secondary">INSCRIBIRSE</button>
      </div>
    </div>
  </div>
  </div>

    
</div>





<?php 
include '_footer.php';
 ?>
