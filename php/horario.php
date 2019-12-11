<?php
$titulo = "Horario";
include '_header.php';
include 'validar.php'; 
include 'conexion.php';
$query1 = $conexion->prepare("select c.nombre, s.salon, date(h.hora_inicio) fechai,time(h.hora_inicio) horai,date(h.hora_fin) fechaf,time(h.hora_fin) horaf from usuarios_capacitaciones uc 
inner join capacitaciones c on uc.id_capacitacion=c.id
inner join usuarios u on uc.id_usuario = u.id
inner join horario h on uc.id_capacitacion = h.id_capacitacion
inner join salones s on h.id_salon=s.id
where uc.id_usuario=? and date(h.hora_inicio)>=CURDATE()");
$query1->setFetchMode(PDO::FETCH_ASSOC);
$query1->execute([$_SESSION['id']]);
$cont=0;
while($row = $query1->fetch()){
	$cont++;
	switch($cont){
		case 1:
			echo '
			<div class="container" style="margin-top: 5%;">
			<div class="row">
			  <div class="col-md">
						<div class="card text-white bg-primary mb-3" style="max-width: 90%; width: 90%;">
						   <div class="card-header" style="text-align: center; font-weight: bold;">'.$row["nombre"].'</div>
								   <div class="card-body">
									   <h5 class="card-title">Salon: '.$row["salon"].'</h5>
									   <p class="card-text">Inicio: <br>'.$row["fechai"].' '.$row["horai"].'</p>
									   <p class="card-text">Fin: <br>'.$row["fechaf"].''.$row["horaf"].'</p>
								   </div>
					  </div>
			  </div>  ';
		break;
		case 2:
			echo '
			  <div class="col-md">
						<div class="card text-white bg-primary mb-3" style="max-width: 90%; width: 90%;">
						   <div class="card-header" style="text-align: center; font-weight: bold;">'.$row["nombre"].'</div>
								   <div class="card-body">
										<h5 class="card-title">Salon: '.$row["salon"].'</h5>
										<p class="card-text">Inicio: <br>'.$row["fechai"].' '.$row["horai"].'</p>
										<p class="card-text">Fin: <br>'.$row["fechaf"].''.$row["horaf"].'</p>
								   </div>
					  </div>
			  </div>  ';
		break;
		case 3:
			echo '
			  <div class="col-md">
						<div class="card text-white bg-primary mb-3" style="max-width: 90%; width: 90%;">
						   <div class="card-header" style="text-align: center; font-weight: bold;">'.$row["nombre"].'</div>
								   <div class="card-body">
										<h5 class="card-title">Salon: '.$row["salon"].'</h5>
										<p class="card-text">Inicio: <br>'.$row["fechai"].' '.$row["horai"].'</p>
										<p class="card-text">Fin: <br>'.$row["fechaf"].''.$row["horaf"].'</p>
								   </div>
					  </div>
			  </div>  
			  </div> </div>';
			$cont=0;
		break;
	}
}
if($cont==1){
	echo '
				<div class="col-md">
							
				</div>
			';

	echo '
	<div class="col-md">
	
	</div>
	';
}
else if ($cont==2){
	echo '
			<div class="col-md">
    		
			</div>
			';
}
include '_footer.php';
 ?>
