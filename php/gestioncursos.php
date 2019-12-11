<?php
$titulo = "Gestion de Cursos";
include '_header.php'; 
include 'conexion.php';
include 'validar.php';

?>

<div class="container shadow">
	<br>
	<div class="alert alert-warning alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        Aqui apareceran los cursos que usted debe dar. Para ver o imprimir la lista de estudiantes debe presionar el link de <strong>Ver Estudiantes</strong>, Alli se le habilitara el boton de generar certificados una ves culmine el curso.
	 </div>

      <?php 
          // $id = $_SESSION['id_profesor'];
  				$stmt = $conexion->prepare("SELECT id, nombre, descripcion FROM capacitaciones WHERE id_profesor=?");
          $stmt->execute([$_SESSION['id']]); 
          $curso = $stmt->fetchAll();
          $cont = 0;
          foreach ($curso as $row) {
            $collapse = "collapse".$cont;
            $idCurso = $row['id'];
            // Store the cipher method 
            $ciphering = "AES-256-CTR"; 
              
            // Use OpenSSl Encryption method 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0; 
              
            // Non-NULL Initialization Vector for encryption 
            $encryption_iv = '0234789057295120'; 
              
            // Store the encryption key 
            $encryption_key = ",flmk.dnf2!#%/."; 
              
            // Use openssl_encrypt() function to encrypt the data 
            $encryption = openssl_encrypt($idCurso, $ciphering, 
            $encryption_key, $options, $encryption_iv);
            ?>
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="<?php echo "#".$collapse; ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $row['nombre'] ?>
                  </button>
                </h5>
              </div>

              <div id="<?php echo $collapse; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                <?php echo $row['descripcion'] ?>
                  <br><button class="btn btn-secondary m-2 float-right"><a href="listaestudiante.php?idCurso=<?php echo $encryption;?>">Ver Estudiantes</a></button>
                </div>
              </div>
            </div>
            
    <?php   
    $collapse = "";   
    $cont++;
    }
  ?>
 <!-- <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          CCNP Routing and Switching
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        <br><button class="btn btn-secondary m-2 float-right"><a href="listaestudiante.php?idCurso=">Ver Estudiantes</a></button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Sistemas Operativos
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        <br><button class="btn btn-secondary m-2 float-right"><a href="listaestudiante.php?idCurso=">Ver Estudiantes</a></button>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Linux Básico para Desarrolladores Web
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
        <br><button class="btn btn-secondary m-2 float-right"><a href="listaestudiante.php?idCurso=">Ver Estudiantes</a></button>
      </div>
    </div>
  </div>
</div>-->
</div>


<?php 
include '_footer.php';
 ?>