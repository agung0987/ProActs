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
	
	<div class="container justify-content-center" id="container" style="padding-top: 3rem;">


	<!-- <script src="js/barchart.js"></script> -->
	<script>
	Highcharts.chart('container', {

chart: {
  polar: true,
  type: 'line'
},

accessibility: {
  description: 'A spiderweb chart compares the allocated budget against actual spending within an organization. The spider chart has six spokes. Each spoke represents one of the 6 departments within the organization: sales, marketing, development, customer support, information technology and administration. The chart is interactive, and each data point is displayed upon hovering. The chart clearly shows that 4 of the 6 departments have overspent their budget with Marketing responsible for the greatest overspend of $20,000. The allocated budget and actual spending data points for each department are as follows: Sales. Budget equals $43,000; spending equals $50,000. Marketing. Budget equals $19,000; spending equals $39,000. Development. Budget equals $60,000; spending equals $42,000. Customer support. Budget equals $35,000; spending equals $31,000. Information technology. Budget equals $17,000; spending equals $26,000. Administration. Budget equals $10,000; spending equals $14,000.'
},

title: {
  text: 'Budget vs spending',
  x: -80
},

pane: {
  size: '80%'
},

xAxis: {
  categories: ['sub1', 'sub2', 'sub3', 'sub4',
	'sub5', 'sub6', 'sub7'],
  tickmarkPlacement: 'on',
  lineWidth: 0
},

yAxis: {
  gridLineInterpolation: 'polygon',
  lineWidth: 0,
  min: 0
},

tooltip: {
  shared: true,
  pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
},

legend: {
  align: 'right',
  verticalAlign: 'middle',
  layout: 'vertical'
},

series: {!!$data!!},

responsive: {
  rules: [{
	condition: {
	  maxWidth: 500
	},
	chartOptions: {
	  legend: {
		align: 'center',
		verticalAlign: 'bottom',
		layout: 'horizontal'
	  },
	  pane: {
		size: '70%'
	  }
	}
  }]
}

});
	</script>
	
	<div class="mt-3">
	

	<table class="table table-striped table-hover" style="color:with">
  <thead>
    <tr>
	<td>Nama</td>
		<td>sub1</td>
		<td>sub2</td>
		<td>sub3</td>
		<td>sub4</td>
		<td>sub5</td>
		<td>sub6</td>
		<td>sub7</td>
    </tr>
  </thead>
  <tbody>
	  @foreach($tampil as $get)
    <tr>
      <td>
		  {{$get->wilayah}}
	  </td>
      <td>
		  {{$get->sub1}}
	  </td>
      <td>
		  {{$get->sub2}}
	  </td>
      <td>
		  {{$get->sub3}}
	  </td>
      <td>
		  {{$get->sub4}}
	  </td>
      <td>
		  {{$get->sub5}}
	  </td>
      <td>
		  {{$get->sub6}}
	  </td>
      <td>
		  {{$get->sub7}}
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>
	</div>
	</div>
</body>
@endsection