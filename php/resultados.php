<?php
$titulo = "Resultados";
include '_header.php'; 
?>

<style type="text/css">
	.progress{
		margin: 10px;
	}
</style>

<div class="container">
	<br><br>
	<label for="Python">Python: 10</label>
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
</div>
</div>

<?php 
include '_footer.php';
 ?>
