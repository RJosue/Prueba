<?php
$titulo = "Estadisticas";
include '_header.php'; 
include 'validar.php';
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
scrollablePlotArea: {
	minWidth: 700
}
},

data: {
csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
beforeParse: function (csv) {
	return csv.replace(/\n\n/g, '\n');
}
},

title: {
text: 'Cantidad de inicios de sesion de la página'
},

subtitle: {
text: 'source: LMBD'
},

xAxis: {
tickInterval: 7 * 24 * 3600 * 1000, // one week
tickWidth: 0,
gridLineWidth: 1,
labels: {
	align: 'left',
	x: 3,
	y: -3
}
},

yAxis: [{ // left y axis
title: {
	text: 'Cantidad'
},
labels: {
	align: 'left',
	x: 3,
	y: 16,
	format: '{value:.,0f}'
},
showFirstLabel: false
}, { // right y axis
linkedTo: 0,
gridLineWidth: 0,
opposite: true,
title: {
	text: null
},
labels: {
	align: 'right',
	x: -3,
	y: 16,
	format: '{value:.,0f}'
},
showFirstLabel: false
}],

legend: {
align: 'left',
verticalAlign: 'top',
borderWidth: 0
},

tooltip: {
shared: true,
crosshairs: true
},

plotOptions: {
series: {
	cursor: 'pointer',
	point: {
		events: {
			click: function (e) {
				hs.htmlExpand(null, {
					pageOrigin: {
						x: e.pageX || e.clientX,
						y: e.pageY || e.clientY
					},
					headingText: this.series.name,
					maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
						this.y + ' sessions',
					width: 200
				});
			}
		}
	},
	marker: {
		lineWidth: 1
	}
}
},

series: [{
name: 'N° de usuarios registrados',
lineWidth: 4,
marker: {
	radius: 4
}
}, {
name: 'N° de inicios de sesión'
}]
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
		y: 51.73,
		sliced: true,
		selected: true,
	}, {
		name: 'Mujeres',
		color:'#F08080',
		y: 48.27
	}]
}]
});
</script>
</section>
</div>

<?php 
include '_footer.php';
 ?>
