<?php
$titulo = "Resultados";
include '_header.php'; 
include 'validar.php';
include 'conexion.php';
$canTotal;
//select count(vu.id_votacion) as cantidad, vu.id_votacion, v.nom_voto from votacion_usuarios vu inner join votacion v on vu.id_votacion = v.id group by id_votacion;
//select count(*) from votacion_usuarios;
$stmt = $conexion->prepare("SELECT count(vu.id_votacion) as cantidad, vu.id_votacion, v.nom_voto from votacion_usuarios vu inner join votacion v on vu.id_votacion = v.id group by id_votacion;
");
$stmt->execute(); 
$votacion = $stmt->fetchAll();
//Buscar el total 
$stamt = $conexion->prepare("select count(*) as total from votacion_usuarios;");
$stamt->execute(); 
$total = $stamt->fetchAll();
// $count = $stamt->rowCount();
// if($count){
	foreach($total as $row){
		$canTotal = $row['total'];
	}	
// }
?>

<style type="text/css">
	.progress{
		margin: 10px;
	}
</style>
<br>
<div class="container shadow">
	<h3 class="text-center">Resultados de la Votación</h3>
	<?php 
	foreach($votacion as $row){
		$nombre = $row['nom_voto'];
		$cantidad = $row['cantidad'];
		?>
		<label for="Python"><?php echo $nombre.": ".$cantidad ?></label>
		<div class="progress">
		<div class="progress-bar progress-bar-striped" role="progressbar" name='<?php echo $nombre;?>' style="width: <?php echo $cantidad/$canTotal*100; ?>%" aria-valuenow="<?php echo $cantidad; ?>" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
		<?php
	}
	?>

	<!-- <label for="Python">Python: 10</label>
	<div class="progress">
	<div class="progress-bar progress-bar-striped" role="progressbar" name="Python" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	<label for="JavaScript">JavaScript: 25</label>
	<div class="progress">
	<div class="progress-bar progress-bar-striped bg-success" role="progressbar" name="JavaScript" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<label for="Ruby on Rails">Ruby on Rails: 50</label>
	<div class="progress">
	<div class="progress-bar progress-bar-striped bg-info" role="progressbar" name="Ruby on Rails" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<label for="Swift">Swift: 75</label>
	<div class="progress">
	<div class="progress-bar progress-bar-striped bg-warning" role="progressbar" name="Swift" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
		<label for="Cobol">Cobol: 100</label>
	<div class="progress">
	<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" name="Cobol" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div> -->
</div>

<?php 
include '_footer.php';
 ?>
