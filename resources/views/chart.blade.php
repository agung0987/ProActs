@extends('dashboard')

@section('content')
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
	<script src="js/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<title>High Chart</title>
</head>
<body>
	
	<div class="container" id="container" style="padding-top: 5rem;">


	<!-- <script src="js/barchart.js"></script> -->
	<script>
	Highcharts.chart('container', {

title: {
  text: 'Grafik Rerata per-Wilayah'
},

subtitle: {
  text: ''
},

yAxis: {
  title: {
	text: 'Score'
  }
},

xAxis: {
  accessibility: {
	rangeDescription: 'Jumlah Data Yang ADA di Jawa Timur'
  }
},

legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},
credits: {
      enabled: false
    },
plotOptions: {
  series: {
	label: {
	  connectorAllowed: false
	},
	pointStart: 2010
  }
},

series: {!!$data!!}

});
	</script>
	</div>
</body>
@endsection