<?php
$titulo = "Lista de Estudiantes";
include '_header.php'; 
include 'conexion.php';
include 'validar.php';
$idCurso = $_GET['idCurso'];
// select u.id, u.nombre, u.apellido, u.cedula from usuarios u inner join usuarios_capacitaciones uc on u.id = id_usuario inner join capacitaciones c on c.id = uc.id_capacitacion where uc.id_capacitacion = 5;

?>
<div class="container shadow">
  <style type="text/css">
    td + td + td{
      border-left: 1px solid;
      text-align: center;
      vertical-align: center;
    }
    th + th + th + th{
      border-left: 1px solid;
      text-align: center;
      vertical-align: center; 	
    }
  </style>
  <br>

    <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            Luego de haber culminado el curso debe se le habilitara el boton de Certificar, que automaticamente enviara el certificado en formato pdf a los correos registrados dentro del sistema segun los estudiantes seleccionados mediante el checkbox.
        </div>
  <form action="../lib/certificado/certificar.php" method="post">
  <input type="hidden" name="curso" value="<?php echo $idCurso ?>">
  <table class="table">
  <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre del Estudiante</th>
        <th scope="col">Cedula</th>
        <th scope="col"><input type="checkbox" name="estudiante" onchange="checkAll(this)"></th>
      </tr>
    </thead>
  <?php 
    				$stmt = $conexion->prepare("select u.id, u.nombre, u.apellido, u.cedula from usuarios u inner join usuarios_capacitaciones uc on u.id = id_usuario inner join capacitaciones c on c.id = uc.id_capacitacion where uc.id_capacitacion = ?;
            ");
            $stmt->execute([$idCurso]); 
            $est = $stmt->fetchAll();
            $cont = 1;
            foreach ($est as $row) {
                // echo $row['nombre']." ".$row['apellido'];
                ?>
                <tbody>
                <tr>
                  <th><?php echo $cont; ?></th>
                  <td><?php echo $row['nombre']." ".$row['apellido']; ?></td>
                  <td><?php echo $row['cedula']; ?></td>
                  <td><input type="checkbox" name="estudiante[]" value="<?php echo $row['id']; ?>"></td>
                </tr>
              </tbody>
                <?php
                $cont++;
              }
  ?>
    <!-- <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre del Estudiante</th>
        <th scope="col">Cedula</th>
        <th scope="col"><input type="checkbox" name="estudiante" onchange="checkAll(this)"></th>
      </tr>
    </thead>
    <tbody>
      <tr id="row_1">
        <th>1</th>
        <td>Ernesto</td>
        <td>8-246-1234</td>
        <td><input type="checkbox" name="estudiante[]" value="1"></td>
      </tr>
      <tr id="row_2">
        <th>2</th>
        <td>Chan</td>
        <td>8-246-1234</td>
        <td><input type="checkbox" name="estudiante[]" value="1"></td>
      </tr>
      <tr id="row_3">
        <th>3</th>
        <td>Ernesto</td>
        <td>8-246-1234</td>
        <td><input type="checkbox" name="estudiante[]" value="1"></td>
      </tr>
    </tbody> -->
  </table>
    <button type="submit" name="btnCertificar" class="btn btn-secondary float-right ml-1">Certificar Estudiantes</button>
    <button type="submit" name="btnListar" class="btn btn-secondary float-right">Imprimir Lista</button>
    <br>
    </form>
  <script type='text/javascript'>

  // Set check or unchecked all checkboxes
  function checkAll(e) {
    var checkboxes = document.getElementsByName('estudiante[]');
  
    if (e.checked) {
      for (var i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = true;
      }
    } else {
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
      }
    }
  }
  
  // Hide Checked rows
  function hideChecked(){
    var checkboxes = document.getElementsByName('estudiante[]');
  
    for (var i = 0; i < checkboxes.length; i++) {
      var checkid = checkboxes[i].id;
      var split_id = checkid.split("_");
      var rowno = split_id[1];
      if(checkboxes[i].checked){
        document.getElementById("tr_"+rowno).style.display="none";
      } 
    }
  
  }
  
  // Reset layout
  function reset(){
      var checkboxes = document.getElementsByName('estudiante[]');
      document.getElementsByName("showhide")[0].checked=false;
  
      for (var i = 0; i < checkboxes.length; i++) {
        var checkid = checkboxes[i].id;
        var split_id = checkid.split("_");
        var rowno = split_id[1];
        document.getElementById("tr_"+rowno).style.display="table-row";
        checkboxes[i].checked = false;
      }
  
  }
  </script>
  </div>
<?php 
include '_footer.php';
 ?>
