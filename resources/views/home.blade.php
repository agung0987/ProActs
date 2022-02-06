@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )


@section('content')



<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        <h2>DASHBOARD</h2>
                    </li>
                </ol>
                <div class="row">
                    <div class="col-9">

                         <!-- grafik 1 & 2 -->
            <div class="row mb-3">
              <div class="col">
                <div id="card-chart-wilayah" class="card-chart ms-1 " style=" width: 25rem;">
                </div>
              </div>

              <div class="col">
                <div id="card-chart-upt" class="card-chart ms-1 " style=" width: 30rem;">
                </div>
              </div>
            </div>
            <!-- grafik 3 & 4 -->
            <div class="row mt-3">
              <div class="col">
                <div id="rerata pendidikan" class="card-chart ms-1 " style=" width: 25rem;">
                </div>
              </div>

              <div class="col">
                <div id="rerata per-bulan" class="card-chart ms-1 " style=" width: 30rem;">
                </div>
              </div>
            </div>
                        <ol class="breadcrumb mt-3 mb-4">
                            <li class="breadcrumb-item active">
                                <h4>Rangking Pegawai Terbaik</h4>
                            </li>
                        </ol>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a type="button" class="btn btn-primary mb-1" href="{{ url('lap_per_pegawai?caritahun=kosong&caribulan=0&carinip=kosong&limit=1') }}"
                                    style="float:right;">View
                                    All</a>
                                <table class="table table-striped table-hover rounded  mt-1">
                                    <thead class="backgroud-thead">
                                        <tr>
                                            <td><b>#</b></td>
                                            <td><b>Nip</b></td>
                                            <td><b>Nama</b></td>
                                            <td><b>Upt</b></td>
                                            <td><b>Total</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawai as $data_get)

                                        <tr>
                                            <td>
                                                @php $no = 1; @endphp
                                                {{ $loop->index+1 }}
                                            </td>
                                            <td>
                                                {{ $data_get->nip }}

                                            </td>
                                            <td>
                                                {{ $data_get->nama }}

                                            </td>
                                            <td>
                                                {{ $data_get->upt }}

                                            </td>
                                            <td>
                                                {{ $data_get->total }}
                                                @if( $data_get->total >= 300)
                                                <img src="{{url('img/senyum.png')}}" style="width:25px" alt="">
                                                @elseif( $data_get->total >= 200 and $data_get->total <= 300) 
                                                <img src="{{url('img/sedang.png')}}" style="width:25px" alt="">
                                                    @elseif( $data_get->total <= 200 ) 
                                                    <img src="{{url('img/kecewa.png')}}" style="width:25px" alt="">
                                                        @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-6">
                                <a type="button" class="btn btn-primary mb-1" href="{{ url('lap_per_pegawai') }}"
                                    style="float:right;">View
                                    All</a>
                                <table class="table table-striped table-hover rounded  mt-1">
                                    <thead class="backgroud-thead">
                                        <tr>
                                            <td><b>#</b></td>
                                            <td><b>Nip</b></td>
                                            <td><b>Nama</b></td>
                                            <td><b>Upt</b></td>
                                            <td><b>Total</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pegawai as $data_get)

                                        <tr>
                                            <td>
                                                @php $no = 1; @endphp
                                                {{ $loop->index+1 }}
                                            </td>
                                            <td>
                                                {{ $data_get->nip }}

                                            </td>
                                            <td>
                                                {{ $data_get->nama }}

                                            </td>
                                            <td>
                                                {{ $data_get->upt }}

                                            </td>
                                            <td>
                                                {{ $data_get->total }}
                                                @if( $data_get->total >= 300)
                                                <img src="{{url('img/senyum.png')}}" style="width:25px" alt="">
                                                @elseif( $data_get->total >= 200 and $data_get->total <= 300) 
                                                <img src="{{url('img/sedang.png')}}" style="width:25px" alt="">
                                                    @elseif( $data_get->total <= 200 ) 
                                                    <img src="{{url('img/kecewa.png')}}" style="width:25px" alt="">
                                                        @endif
                                            </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>





                    </div>
                    <div class="col-3 mt-5">
                        <!-- <div class="row"> -->
                        @foreach($data as $data_get)
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><i class="fa fa-user"></i> Pegawai Dinilai</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{ $data_get->dinilai}}</div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-success text-white mb-4 ">
                            <div class="card-body"><i class="bi bi-pie-chart-fill"></i> Rerata Total</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->total}}</div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Perceived
                                Ease of Use</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub1}}</div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Perceived
                                Usefulness</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub2}}</div>

                            </div>
                        </div>
                        <!-- </div> -->

                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card text-white mb-4" style="background-color:#8b1eba">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Perceived
                                Satisfaction</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub3}}</div>

                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card text-white mb-4" style="background-color:#ba1e5f">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Actual
                                Useas</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub4}}</div>

                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-warning text-white mb-4" style="background-color:#ba1e5f">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i>
                                Performance Impact <br> (Problem identification speed)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub5}}</div>

                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i>
                                (Decision-making speed)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub6}}</div>

                            </div>
                        </div>
                        <!-- </div> -->


                        <!-- <div class="col-xl-3 col-md-6"> -->
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> (Extent of
                                analysis in decision-making)</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$data_get->sub7}}</div>

                            </div>
                        </div>
                        <!-- </div> -->

                        @endforeach
                        <!-- </div> -->
                    </div>


                </div>

            </div>

            <div class="row">

            </div>
    </div>
    </main>
</div>
</div>


<script>
  Highcharts.chart('card-chart-upt', {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: 'Grafik Score per-Gender'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
      point: {
        valueSuffix: '%'
      }
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %'
        }
      }
    },credits: {
      enabled: false
    },
    series: {!!$str_gender!!}
  });
</script>

<script>
  // console.log({!!$dtwl!!});
  Highcharts.chart('card-chart-wilayah', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Score per-Wilayah'
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Score'
      }
    },
    tooltip: {

      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    credits: {
      enabled: false
    },
    series: {!!$dtwl!!}
  });
</script>

<script>
  Highcharts.chart('rerata pendidikan', {
    chart: {
      polar: true,
      type: 'line'
    },
    accessibility: {
      description: 'A spiderweb chart compares the allocated budget against actual spending within an organization. The spider chart has six spokes. Each spoke represents one of the 6 departments within the organization: sales, marketing, development, customer support, information technology and administration. The chart is interactive, and each data point is displayed upon hovering. The chart clearly shows that 4 of the 6 departments have overspent their budget with Marketing responsible for the greatest overspend of $20,000. The allocated budget and actual spending data points for each department are as follows: Sales. Budget equals $43,000; spending equals $50,000. Marketing. Budget equals $19,000; spending equals $39,000. Development. Budget equals $60,000; spending equals $42,000. Customer support. Budget equals $35,000; spending equals $31,000. Information technology. Budget equals $17,000; spending equals $26,000. Administration. Budget equals $10,000; spending equals $14,000.'
    },

    title: {
      text: '&nbsp Grafik Score per-Pendidikan',
      x: -80
    },

    pane: {
      size: '80%'
    },

    xAxis: {
      categories: ['Pendidikan'],
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

    series: {!!$str_pnd!!},
    credits: {
      enabled: false
    },

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


<!-- rerata bulan -->
<script>
  Highcharts.chart('rerata per-bulan', {
    title: {
      text: 'Grafik Score per-Bulan'
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

    series: {!!$str_bln!!},
    credits: {
      enabled: false
    },

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