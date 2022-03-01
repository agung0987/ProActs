@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )


@section('content')



<div id="layoutSidenav">
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid bg-primary rounded" style="height: 400px;">

        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">
            <h2>DASHBOARD</h2>
          </li>
        </ol>
        
        <div class="row justify-content-center ">
            <div class="col-5 mt-3">
                <div id="spaider" class="border border-dark rounded " style=" width: 25rem;">
                </div>
            </div>
        
            <div class="col-5 mt-3">
                <div id="line" class=" border border-dark rounded " style=" width: 35rem;">
                </div>
            </div>
        </div>
        
        <div class="row card rounded mt-5" style=" margin-left: 100px">
        <div class="row">
            <div class="col">
            <ol>
            <li class="breadcrumb-item active mt-3" style="color:#03b1fc">
                <h2><b>Total Pegawai</b></h2>
            </li>
            </ol>
            </div>
        </div>
                <div class="col ">
                    <i class="bi bi-people fa-7x"></i>
                </div>
        </div>
            
    </div>

    </main>
</div>
</div>

<script>
    Highcharts.chart('spaider', {

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
    categories: ['Sales', 'Marketing', 'Development', 'Customer Support',
        'Information Technology', 'Administration'],
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

series: [{
    name: 'Allocated Budget',
    data: [43000, 19000, 60000, 35000, 17000, 10000],
    pointPlacement: 'on'
}, {
    name: 'Actual Spending',
    data: [50000, 39000, 42000, 31000, 26000, 14000],
    pointPlacement: 'on'
}],

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

<script>
    Highcharts.chart('line', {

title: {
    text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
    text: 'Source: thesolarfoundation.com'
},

yAxis: {
    title: {
        text: 'Number of Employees'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Installation',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
    name: 'Manufacturing',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
    name: 'Sales & Distribution',
    data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
    name: 'Project Development',
    data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
    name: 'Other',
    data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>
@endsection