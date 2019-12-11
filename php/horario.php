<?php session_start();
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
			<div class="container-fluid">
        		<div class="row">
            		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                		<div class="tile">
                    		<div class="wrapper">
                        		<div class="header" style="color:#FFFFFF;">'.$row["nombre"].'</div>
                        		<div class="dates" style="marging: 1%;">
                            		<div class="start" style="marging: 1%;">
										<strong style="marging: 1%; color:#FFFFFF;">Inicio</strong style="color:#000000;">'.$row["horai"].' '.$row["fechai"].'
										<span></span>
                            		</div>
									<div class="ends" style="marging: 1%;">
										<strong style="marging: 1%; color:#FFFFFF;">Fin</strong>'.$row["horaf"].' '.$row["fechaf"].' 
									</div>
								</div>
								<div style="marging: 1%; margin-botton: 5%; color:#FFFFFF;font-weight: bold;">Salon: '.$row["salon"].'</div>
                    		</div>
                		</div> 
            		</div> ';
		break;
		case 2:
			echo '
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					<div class="tile">
						<div class="wrapper">
							<div class="header" style="color:#FFFFFF;">'.$row["nombre"].'</div>
							<div class="dates" style="marging: 1%;">
								<div class="start" style="marging: 1%;">
									<strong style="marging: 1%; color:#FFFFFF;">Inicio</strong style="color:#000000;">'.$row["horai"].' '.$row["fechai"].'
									<span></span>
								</div>
								<div class="ends" style="marging: 1%;">
									<strong style="marging: 1%; color:#FFFFFF;">Fin</strong>'.$row["horaf"].' '.$row["fechaf"].' 
								</div>
							</div>
							<div style="marging: 1%; margin-botton: 5%; color:#FFFFFF;font-weight: bold;">Salon: '.$row["salon"].'</div>
						</div>
					</div> 
				</div> ';
		break;
		case 3:
			echo '
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="tile">
							<div class="wrapper">
								<div class="header" style="color:#FFFFFF;">'.$row["nombre"].'</div>
								<div class="dates" style="marging: 1%;">
									<div class="start" style="marging: 1%;">
										<strong style="marging: 1%; color:#FFFFFF;">Inicio</strong style="color:#000000;">'.$row["horai"].' '.$row["fechai"].'
										<span></span>
									</div>
									<div class="ends" style="marging: 1%;">
										<strong style="marging: 1%; color:#FFFFFF;">Fin</strong>'.$row["horaf"].' '.$row["fechaf"].' 
									</div>
								</div>
								<div style="marging: 1%; margin-botton: 5%; color:#FFFFFF;font-weight: bold;">Salon: '.$row["salon"].'</div>
							</div>
						</div> 
					</div> 
				</div>
			</div>';
			$cont=0;
		break;
	}
}
if($cont==1){
	echo '
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							
				</div>
			';

	echo '
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
	
	</div>
	';
}
else if ($cont==2){
	echo '
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    		
			</div>
			';
}
include '_footer.php';
 ?>
