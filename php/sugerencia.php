<?php
$titulo = "Sugerencias";
include '_header.php'; 
include 'validar.php';
include 'conexion.php';
?>

<!------ Include the above in your HEAD tag ---------->

	<div class="container shadow text-center" >
		<div class="alert alert-warning alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        Solo puedes votar una sola ves. Una ves has votado se desabilitara el boton de votar, solo podras ver los resultados. Se volvera a habilitar la opcion de votar apenas se empiece una nueva lista de votacion. Puedes realizar 3 sugerencias cada semestre.
	    </div>
		<div class="row">
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        ¿Que otros cursos desearias que se dieran?
                    </h3>
                </div>
                <form action="votar.php" method="POST">
                <div class="panel-body">
                    <ul class="list-group">
                    <?php 
                    $stmt = $conexion->prepare("SELECT * from votacion;");
                    $stmt->execute([$_SESSION['id']]); 
                    $votacion = $stmt->fetchAll();
                    foreach ($votacion as $row){
                        ?>
                            <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" value="<?php  echo $row['id'] ?>">
                                    <?php echo $row['nom_voto'] ?>
                                </label>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                    </ul>
                </div>
                <div class="panel-footer">
                    <button type="submit" name="btnSubmit" class="btn btn-primary btn-sm mt-1">Votar</button>
                    <button type="button" class="btn btn-primary btn-sm mt-1"><a href="resultados.php">Ver Resultados</a></button>
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-4">
        		<div class="panel-heading">
                    <h3 class="panel-title">
                            ¡Sugiere un curso!
                    </h3>
                </div>
                <form action="sugerir.php" method="POST">
                    <label for="sugerencia">Nueva Sugerencia</label>
                    <input type="text" name="sugerencia" size="30" id="sugerencia" class="form-control" aria-describedby="passwordHelpBlock">
                    <small class="form-text text-muted">
                    Su sugerencia debe ser corto y conciso Ej: <i> Configuracion de Machine Learning con Pythong </i>. <br> Recuerde que solamente se puede sugerir 3 veces por semestre.
                    </small>
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Enviar</button>
			</form>
    	</div>
    </div>
</div>
<?php 
include '_footer.php';
 ?>
