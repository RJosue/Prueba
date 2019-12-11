<?php
$titulo = "Agregar Curso";
include '_header.php';
include 'validar.php';
include "conexion.php";
?>
<html>

<?php

// FETCH_ASSOC
$consultaSalones = $conexion->prepare("SELECT * FROM salones");
$consultaProfesores = $conexion->prepare("SELECT * FROM usuarios u INNER JOIN usuarios_rol ur ON u.id= ur.id_usuario where ur.id_rol = 2");
$consultaCiscoClasificacioens = $conexion->prepare("SELECT * FROM clasificacion_cisco");

// Especificamos el fetch mode antes de llamar a fetch()
$consultaSalones->setFetchMode(PDO::FETCH_ASSOC);
$consultaProfesores->setFetchMode(PDO::FETCH_ASSOC);
$consultaCiscoClasificacioens->setFetchMode(PDO::FETCH_ASSOC);

// Ejecutamos
$consultaSalones->execute();
$consultaProfesores->execute();
$consultaCiscoClasificacioens->execute();
?>




<link rel="stylesheet" type="text/css" href="../css/sombras.css">


<div class="container shadow mt-3">

    <h2 class="text-center">Registrar Curso</h2>
    <form class="form-horizontal" action="agregar_curso_insertar.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="nombrecurso">Nombre del curso:</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="nombrecurso" name="nombrecurso" placeholder="Introduzca su nombre" required>
            </div>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Advertencia:</strong> Solo se aceptan imagenes en formato: <strong>png, jpeg, pjpeg, jpg</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="foto">Foto</label>
            <div class="col-sm-12"></label>
                <div class="col-sm-12">
                    <div class="mb-3">
                        <input type="file" class="" id="foto" name="fileFoto" required accept="image/png">
                        <label class="" for="foto"></label>
                        <label id="errorFoto"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="descripcion">Descripcion del curso:</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Escriba una breve descripcion del curso"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="duracion">Duracion:</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" min="1" name="duracion" id="duracion" placeholder="N° de Horas" required>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia:</strong> La cantidad maxima de estudiantes permitidos por capacitacion sera de: <strong>25</strong> estudiantes
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="minestudiante">Cantidad Minima de Estudiante:</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" min="1" name="minestudiante" id="minestudiante" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="maxestudiante">Cantidad maxima de Estudiante:</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" max="25" name="maxestudiante" id="maxestudiante" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="esctipo">Tipo de capacitacion:</label>
                <div class="col-sm-12">
                    <select class="custom-select" id="esctipo" name="capatipo" required>
                        <option selected disabled value="">Escoga el tipo de capacitacion</option>
                        <option value="4">Curso</option>
                        <option value="1">Cisco</option>
                        <option value="2">TechAcademy</option>
                        <option value="3">Diplomados</option>
                    </select>
                </div>
            </div>

            <div id="contenidocisco" class="px-4">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ciscoClasificacion">Clasificacion:</label>
                    <div class="col-sm-12">
                        <select class="custom-select" id="ciscoClasificacion" name="cisco">
                            <option selected disabled value="0">Escoga la Clasificacion</option>
                            <?php
                            while ($row = $consultaCiscoClasificacioens->fetch()) {
                                ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["clasificacion"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>

            <div id="contenidodiplo" class="px-4">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="descripcion">Objetivos Generales:</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="obejetivosGenerales" name="obejetivosGenerales" rows="3" placeholder="Escriba una los objetivos del diplomado"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="organizador">Organizador:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="organizador" id="organizador" placeholder="Persona o institucion que Organiza">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="perfilIngreso">Perfil de ingreso:</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="perfilIngreso" id="perfilIngreso" rows="3" placeholder="Introduzca el Perfil de ingreso del estudiante"></textarea>
                    </div>
                </div>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Advertencia:</strong> Subir los archivos de Plan de contenido y plan de costo en formato <strong>pdf</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="planContenido">Plan de Contenido</label>
                    <div class="col-sm-12">
                        <div class="">
                            <input type="file" class="-input" name="planContenido" id="planContenido" accept="application/pdf">
                            <label class="-label" for="planContenido"></label>
                            <label id="errorPlanContenido"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="planCosto">Plan de costo</label>
                    <div class="col-sm-12">
                        <div class="">
                            <input type="file" class="-input" name="planCosto" id="planCosto" accept="application/pdf">
                            <label class="-label" for="planCosto"></label>
                            <label id="errorPlanCosto"></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="criteriosEvaluacion">Criterios de evaluacion:</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="criteriosEvaluacion" id="criteriosEvaluacion" rows="3" placeholder="Introduzca los criterios de evaluacion"></textarea>
                    </div>
                </div>
            </div>

            <div id="contenidotech" class="px-4">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="responsable">Responsables:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="responsable" id="responsable" placeholder="Persona responsable">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="escprofesor">Profesor:</label>
                <div class="col-sm-12">
                    <select class="custom-select" name="escoprofesores" id="escprofesor" onchange="ValidacionProSal()" required>
                        <option selected disabled value="" id="escprofesorselect">Escoga el profesor</option>
                        <?php
                        while ($row = $consultaProfesores->fetch()) {
                            ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["nombre"] . " " . $row["apellido"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Advertencia:</strong> Antes de introducir las fechas del curso debe seleccionar un salon y su profesor.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form-group" id="diviniciofin">
                <label class="control-label col-sm-6" for="escsalon">Escoga un salon:</label>
                <label class=" control-label col-sm-5" for="escsalon">Hora de inicio y fin:</label>
                <div class="row" style="margin-left:0px;">
                    <div class="col-sm-3">
                        <select class="custom-select" name="escosalon" id="escsalon" onchange="ValidacionProSal()" required>
                            <option selected disabled value="">Salon:</option>
                            <?php
                            while ($row = $consultaSalones->fetch()) {
                                ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["salon"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class=" col-sm-4">
                        <input type="datetime-local" class="form-control" id="11" name="fechaini[]" onchange="ValidacionFecha(11,21)" disabled required>
                    </div>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="21" name="fechafin[]" onchange="ValidacionFecha(11,21)" disabled required>
                    </div>
                    <div class="col-sm-1">
                        <input type="button" onclick="AgregrarHorario()" disabled class="form-control" placeholder="+" id="btninifin">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="modalidad"> Modalidad:</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rdnpago" value="1">
                        <label class="form-check-label" for="modalidad">Pago</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="rdnpago1" value="0">
                        <label class="form-check-label" for="modalidad1">Gratuito</label>
                    </div>
                </div>
            </div>
            <div id="contenidocosto" style="display: none">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="contenidopago">Costo:</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" name="contenidopago" id="contenidopago" min="1" placeholder="$ 1,000">
                    </div>
                </div>
            </div>
            <button type="submit" onclick="liberar()" class="btn btn-primary mx-3" id="botonimagen" style="width:250px; margin-right:60px;">Enviar</button>
    </form>
</div>
<script src="../js/agregar_curso.js"></script>

</html>
<?php
include '_footer.php';
?>