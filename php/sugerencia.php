<?php
$titulo = "Sugerencias";
include '_header.php'; 
?>
}

<!------ Include the above in your HEAD tag ---------->

	<div class="container shadow text-center" >
		<div class="alert alert-warning alert-dismissible" role="alert">
	        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        Solo puedes votar una sola ves. Una ves has votado se desabilitara el boton de votar, solo podras ver los resultados. Se volvera a habilitar la opcion de votar apenas se empiece una nueva lista de votacion. Puedes realizar 3 sugerencias cada semestre.
	    </div>
		<div class="row">
        <div class="col-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-arrow-right"></span>¿Que otros cursos desearias que se dieran? <a href="http://www.jquery2dotnet.com" target="_blank"><span
                            class="glyphicon glyphicon-new-window"></span></a>
                    </h3>
                </div>
                <form action="POST">
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios">
                                    Python
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios">
                                    Javascript
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios">
                                    Ruby on Rails
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios">
                                    React Native
                                </label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios">
                                    Cobol
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </form>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary btn-sm mt-1"><a href="">Votar</a></button>
                    <button type="button" class="btn btn-primary btn-sm mt-1"><a href="resultados.php">Ver Resultados</a></button>
                </div>
            </div>
        </div>
        <div class="col-4">
        		<div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-arrow-right"></span>¡Sugiere un curso!<a href="http://www.jquery2dotnet.com" target="_blank"><span
                            class="glyphicon glyphicon-new-window"></span></a>
                    </h3>
                </div>
                <form method="POST">
                <label for="sugerencia">Nueva Sugerencia</label>
				<input type="text" name="sugerencia" class="form-control" aria-describedby="passwordHelpBlock">
				<small class="form-text text-muted">
				  Su sugerencia debe ser corto y conciso Ej: <i> Configuracion de Machine Learning con Pythong </i>. <br> Recuerde que solamente se puede sugerir 3 veces por semestre.
				</small>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>

    	</div>
    </div>
</div>
<?php 
include '_footer.php';
 ?>
