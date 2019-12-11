<?php
$titulo = "Estadisticas";
include '_header.php'; 
include 'validar.php'; 
include 'conexion.php';
$query1 = $conexion->prepare("select count(*) total from usuarios");
$query2 = $conexion->prepare("select count(*) woman from usuarios where sexo='F'");
$query3 = $conexion->prepare("select count(*) man from usuarios where sexo='M'");
$query4= $conexion->prepare("select count(*) cant, monthname(fecha_creacion) mes from usuarios group by monthname(fecha_creacion) and year(fecha_creacion) order by month(fecha_creacion) asc");
$query5= $conexion->prepare("select count(*) cant, monthname(fecha_creacion) mes from capacitaciones group by monthname(fecha_creacion) and year(fecha_creacion) order by month(fecha_creacion) asc");
$query1->execute();
$r1=$query1->fetch();
$query2->execute();
$r2=$query2->fetch();
$query3->execute();
$r3=$query3->fetch();
$query4->execute();
$query5->execute();
$hombre=$r3["man"];
$mujer=$r2["woman"];
$total=$r1["total"];
$cont=11;
$arr=array(0,0,0,0,0,0,0,0,0,0,0,0);
$arr1=array(0,0,0,0,0,0,0,0,0,0,0,0);
while($r4=$query4->fetch()){
	$arr[$cont]= $r4["cant"];
	$cont--;
} 
$cont=11;
while($r5=$query5->fetch()){
	$arr1[$cont]= $r5["cant"];
	$cont--;
} 
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../js/highcharts.js"></script>
<script src="../js/data.js"></script>
<script src="../js/series-label.js"></script>
<script src="../js/exporting.js"></script>
<script src="../js/export-data.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

<div class="container">
<div id="container" style="min-width: 80%;width: 95%; height: 90%; margin: 0 auto; margin-top: 8%;"></div>



<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Cantidad de registros de usuarios'
    },
    subtitle: {
        text: 'Source: Educación Continua'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Registros',
		data: [<?php echo $arr[0] ?>,<?php echo $arr[1]  ?>, <?php echo $arr[2]  ?>, <?php echo $arr[3]  ?>,<?php echo $arr[4]  ?>,
		<?php echo $arr[5]  ?>,<?php echo $arr[6]  ?>,<?php echo $arr[7]  ?>,<?php echo $arr[8]  ?>,<?php echo $arr[9]  ?>,<?php echo $arr[10]  ?>,<?php echo $arr[11]  ?>]
    }
    ]
});

</script>

<section class="what_we_area row">

<div id="container2" style="min-width: 80%;width: 95%; height: 90%; max-width: 600px; margin: 0 auto; margin-top: 5%;"></div>
<script type="text/javascript">
// Build the chart
Highcharts.chart('container2', {
chart: {
	plotBorderWidth: null,
	plotShadow: false,
	type: 'pie'
},
title: {
	text: 'Procentaje de hombres y mujeres registrados'
},
tooltip: {
	pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
},
plotOptions: {
	pie: {
		allowPointSelect: true,
		cursor: 'pointer',
		dataLabels: {
			enabled: false
		},
		showInLegend: true
	}
},
series: [{
	name: 'Porcentaje',
	colorByPoint: true,
	data: [{
		name: 'Hombres',
		color:'#0000FF',
		y: <?php echo $hombre/$total ?>, 
		sliced: true,
		selected: true,
	}, {
		name: 'Mujeres',
		color:'#F08080',
		y: <?php echo $mujer/$total ?>
	}]
}]
});
</script>
</section>
<section class="what_we_area row">
	<div id="container3" style="min-width: 80%;width: 95%; height: 90%; max-width: 600px; margin: 0 auto; margin-top: 5%;"></div>
	<script type="text/javascript">
Highcharts.chart('container3', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Cantidad de cursos registrados'
    },
    subtitle: {
        text: 'Source: Educación Continua'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Registros',
		data: [<?php echo $arr1[0] ?>,<?php echo $arr1[1]  ?>, <?php echo $arr1[2]  ?>, <?php echo $arr1[3]  ?>,<?php echo $arr1[4]  ?>,
		<?php echo $arr1[5]  ?>,<?php echo $arr1[6]  ?>,<?php echo $arr1[7]  ?>,<?php echo $arr1[8]  ?>,<?php echo $arr1[9]  ?>,<?php echo $arr1[10]  ?>,<?php echo $arr1[11]  ?>]
    }
    ]
});

</script>
</section>
</div>





<?php 
include '_footer.php';
 ?>
