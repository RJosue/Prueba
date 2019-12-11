<?php
$titulo = "Administracion de Roles";
include '_header.php'; 
include 'validar.php';
?>
    <div class="container ">
    <!-- BARRA DE BUSQUEDA -->
        <nav class="navbar navbar-light bg-light mt-3">
            <form class="form-inline mx-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Cedula" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>



      <!--  RESULTADOS  -->
      <table class="table table-striped mt-3 mx-auto">
  <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Cedula</th>
        <th scope="col">Rol</th>
      </tr>
    </thead>
    <tbody style="cursor:pointer">
      <tr onclick="seleccionar(this,1)">
        <th scope="row">1</th>
        <td>Luis</td>
        <td>Munguia</td>
        <td>8-954-585</td>
        <td> <div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Cambiar Rol
  </button>
  <div class="dropdown-menu">
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Estudiante</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Facilitador</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Administrativo</a>
  </div>
</div></td>
      </tr>
    </tbody>
</table>
      <!-- RESULTADOS -->
<?php 
include '_footer.php';
 ?>
