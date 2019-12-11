<?php
$titulo = "Resultados";
include '_header.php';
include 'validar.php';
include 'conexion.php';
$canTotal;

$stmt = $conexion->prepare("SELECT count(vu.id_votacion) as cantidad, vu.id_votacion, v.nom_voto from votacion_usuarios vu inner join votacion v on vu.id_votacion = v.id group by id_votacion;");
$stmt->execute();
$votacion = $stmt->fetchAll();

$stamt = $conexion->prepare("select count(*) as total from votacion_usuarios;");
$stamt->execute();
$total = $stamt->fetchAll();

foreach ($total as $row) {
	$canTotal = $row['total'];
}

?>

<style type="text/css">
	.progress {
		margin: 10px;
	}
</style>
<br>
<div class="container shadow">
	<h3 class="text-center">Resultados de la Votación</h3>
	<?php
	foreach ($votacion as $row) {
		$nombre = $row['nom_voto'];
		$cantidad = $row['cantidad'];
		?>
		<label for="Python"><?php echo $nombre . ": " . $cantidad ?></label>
		<div class="progress">
			<div class="progress-bar progress-bar-striped" role="progressbar" name='<?php echo $nombre; ?>' style='width: <?php echo $cantidad / $canTotal * 100 . '%'; ?>' aria-valuenow="<?php echo $cantidad; ?>" aria-valuemin="0" aria-valuemax="100"></div>
		</div>
	<?php
	}
	?>
</div>
<?php
include '_footer.php';
?>