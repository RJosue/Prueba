<?php
$titulo = "Cursos de Tech Academy";
include '_header.php'; 
?>
    <div class="container mt-4">
        <h1 class="display-4 text-center mt-3">Tech Academy</h1>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-7">
                <img src="../img/python.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-5">
                    <div class="card-body">
                        <h3 class="card-title">Seminario Python</h3>
                        <div class="row p-2">
                            <div class="col">
                                <ul>
                                    <li> Profesor Responsable: Sergio Cotes.</li>
                                    <li> Instructores: Bruno Franco Salamín / Kevin González.</li>
                                    <li> Fecha: 11 al 22 de Febrero del 2019.</li>
                                    <li> Lugar: Campus Víctor Levi Sasso, Edificio 3.</li>
                                    <li> Salón: 3-410.</li>
                                    <li> Duración: 40 Horas.</li>
                                    <li> Costo: Gratis.</li>
                                </ul>
                            </div>                    
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
                        Pagar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
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
                        Pagar
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
                        Pagar
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
                        Pagar
                        </button>

                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="../img/vulnerabilidad.jpg" class="card-img" alt="...">
                    </div>
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
          <button type="buttons" class="btn btn-secondary">PAGAR</button>
      </div>
    </div>
  </div>
  </div>


    </div>
<?php 
include '_footer.php';
 ?>
