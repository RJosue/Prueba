<?php
$titulo = "Administracion de Roles";
include '_header.php';
include 'conexion.php';
include 'validar.php';
?>
<!-- DATA TABBLE -->
<link rel="stylesheet" type="text/css" href="../css/tabla.css">
<?php

// FETCH_ASSOC
$estudiantes = $conexion->query("SELECT u.id,u.nombre,u.apellido,u.cedula,ur.id_rol FROM usuarios u INNER JOIN usuarios_rol ur ON u.id = ur.id_usuario");
$estudiantes->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$estudiantes->execute();
?>

<div class="container ">
  <!--  RESULTADOS  -->
  <div class="tabla mt-3">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Cedula</th>
          <th>Rol</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = -1;
        for ($i = 1; $row = $estudiantes->fetch(); $i++) {
          if ($id != $row["id"]) {
            ?>
            <tr>
              <td><?php echo $row["nombre"] ?></td>
              <td><?php echo $row["apellido"] ?></td>
              <td><?php echo $row["cedula"] ?></td>
              <td><?php
                      $a = $row["id"];
                      $d = -1;
                      $estudiantesRol = $conexion->query("SELECT * FROM usuarios_rol where id_usuario ='+$a+'");
                      $estudiantesRol->setFetchMode(PDO::FETCH_ASSOC);
                      $estudiantesRol->execute();
                      $estu = false;
                      $admi = false;
                      $faci = false;
                      for ($i = 1; $row1 = $estudiantesRol->fetch(); $i++) {
                        if ($row1["id_rol"] == 1) {
                          $admi = true;
                        } else {
                          if ($row1["id_rol"] == 2) {
                            $faci = true;
                          } else {
                            if ($row1["id_rol"] == 3) {
                              $estu = true;
                            }
                          }
                        }
                      }
                      if ($admi) {
                        $x = $a . 1; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>,1)" checked>
                    <label class="form-check-label" for="materialUnchecked">Administrador</label>
                  </div>
                <?php } else {
                      $x = $a . 1; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>, 1)">
                    <label class="form-check-label" for="materialUnchecked">Administrador</label>
                  </div>
                <?php }
                    if ($faci) {
                      $x = $a . 2; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>,2)" checked>
                    <label class="form-check-label" for="materialUnchecked">Facilitador</label>
                  </div>
                <?php } else {
                      $x = $a . 2; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>,2)">
                    <label class="form-check-label" for="materialUnchecked">Facilitador</label>
                  </div>
                <?php }
                    if ($estu) {
                      $x = $a . 3; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>,3)" checked>
                    <label class="form-check-label" for="materialUnchecked">Estudiante</label>
                  </div>
                <?php } else {
                      $x = $a . 3; ?>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id=<?php echo $x; ?> onclick="cambio(<?php echo $a; ?>,3)">
                    <label class="form-check-label" for="materialUnchecked">Estudiante</label>
                  </div>
                <?php }
                    ?></td>
            </tr>
        <?php }
          $id = $row["id"];
        } ?>
      </tbody>
    </table>
  </div>
  <script src="../js/rol.js"></script>
  <?php
  include '_footer.php';
  ?>