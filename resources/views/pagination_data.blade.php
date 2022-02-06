@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

@php
    $uri = $_SERVER['REQUEST_URI'];
    $_token = isset($_GET['_token']) ? $_GET['_token'] : 'A5zdQSXRGtRTeQ7KOPN3KneARIhAxsPhDz83XeAt'; 
    echo $_token;
    $_tahun = isset($_GET['caritahun']) ? $_GET['caritahun'] : 'kosong';
    $_bulan = isset($_GET['caribulan']) ? $_GET['caribulan'] : '0';
    $_nip = isset($_GET['carinip']) ? $_GET['carinip'] : 'kosong';
    $_limit = isset($_GET['limit']) ? $_GET['limit'] : '1';
    $halskrng = $limit;
    $halakhir = $datas; 
    
    $next = "lap_per_pegawai?_token=$_token&caritahun=$_tahun&caribulan=$_bulan&carinip=$_nip&limit=".($halskrng+1);
    $prev = "lap_per_pegawai?_token=$_token&caritahun=$_tahun&caribulan=$_bulan&carinip=$_nip&limit=".($halskrng-1);
@endphp

<section class="bodytabel">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-sm">
<div class="table-responsive">
    <div class="table-title" style="padding:0">
        <div class="row">
            <div class="col-sm-3 judul">
            </div>
        </div>
    </div>
    <table>
        <tr style="float:left; width: 100%; height: 60px; ">
            <td class="judul">
                <h2><b>Laporan Per-Pegawai</b></h2>
            </td>
        </tr>
        <form action="/lap_per_pegawai">
        {{csrf_field()}}
            <tr style="float:left; width: 100%; height:40px;">
                <td><label for="cars1"><b>Tahun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
                <td> <select id="cars1" style="width: 200px" name="caritahun">
                        <option value="kosong" {{$_tahun == "kosong" ? 'selected' : ''}}>-- Pilih Tahun --</option>
                        <option value="2017" {{$_tahun == "2017" ? 'selected' : ''}}>2017</option>
                        <option value="2018" {{$_tahun == "2018" ? 'selected' : ''}}>2018</option>
                        <option value="2019" {{$_tahun == "2019" ? 'selected' : ''}}>2019</option>
                        <option value="2020" {{$_tahun == "2020" ? 'selected' : ''}}>2020</option>
                    </select>
                </td>
            </tr>
            <tr style="float:left; width: 100%; height:40px;">
                <!-- <div style="float:left; width: 100%; height:40px; "> -->
                <td><label for="cars2"><b>Bulan&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </b></label></td>
                <td>
                    <select id="cars2" name="caribulan">
                        <option value="0"  {{ $_bulan == "0" ? 'selected' : ''}}>-- Pilih Bulan --</option>
                        <option value="1"  {{ $_bulan == "1" ? 'selected' : ''}}>January</option>
                        <option value="2"  {{ $_bulan == "2" ? 'selected' : ''}}>Februari</option>
                        <option value="3"  {{ $_bulan == "3" ? 'selected' : ''}}>Maret</option>
                        <option value="4"  {{ $_bulan == "4" ? 'selected' : ''}}>April</option>
                        <option value="5"  {{ $_bulan == "5" ? 'selected' : ''}}>Mei</option>
                        <option value="6"  {{ $_bulan == "6" ? 'selected' : ''}}>Juni</option>
                        <option value="7"  {{ $_bulan == "7" ? 'selected' : ''}}>Juli</option>
                        <option value="8"  {{ $_bulan == "8" ? 'selected' : ''}}>Agustus</option>
                        <option value="9"  {{ $_bulan == "9" ? 'selected' : ''}}>September</option>
                        <option value="10" {{ $_bulan == "10" ? 'selected' : ''}}>Oktober</option>
                        <option value="11" {{ $_bulan == "11" ? 'selected' : ''}}>November</option>
                        <option value="12" {{ $_bulan == "12" ? 'selected' : ''}}>Desember</option>
                    </select>
                </td>
                <!-- </div> -->
            </tr>
            <tr style="float:left; width: 100%; height:50px;">
                <td><b> Nip&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b></td>
                <td><select class="nip form-control" style="width: 150%;" name="carinip">
                @if($_GET['carinip'] == 'kosong')
                <option value="kosong">-- PIlih Data --</option>
                @else
                <option value={{ $_nip == $_GET['carinip'] ? $_GET['carinip'] : '--PILIH NIP--'}} selected> {{ $_nip == $_GET['carinip'] ? $_GET['carinip'] : '-- Pilih NIP --'}}</option>
                @endif
                </select></td>
            </tr>
            <input type = "text" name="limit" value ="1" hidden></input>
            <tr style="float:left; width: 100%; height:50px;">
                <!-- <div style="float:left; width: 100%; height:80px;"> -->
                <td><button type="submit" class="btn blue btn-primary float-left">Cari</button></td>
                <!-- </div> -->
            </tr>
            <!-- <tr style="height:45px;">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                    crossorigin="anonymous">
                <td style="float: right"> <a href=" /lap_per_pegawai/cetak_pdf" class="btn btn-danger">
                        CETAK PDF <i class="bi bi-file-earmark-pdf"></i></a></td>
                <td style="float: right"><a href=" /export_lap_per_pegawai" class="btn btn-success ">EXPORT EXCEL <i class="bi bi-file-earmark-excel"></i></a></td>
            </tr> -->
        </form>
    </table>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
                    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
                    crossorigin="anonymous">
                    <div style="height:40px;">
                 <a href=" /lap_per_pegawai/cetak_pdf" style="float: right" class="btn btn-danger">
                        CETAK PDF<i class="bi bi-file-earmark-pdf"></i></a>
                <a href=" /export_lap_per_pegawai" style="float: right; margin-right:5px;" class="btn btn-success ">EXPORT EXCEL<i class="bi bi-file-earmark-excel"></i> </a>
                    </div>

    <table class="table table-striped table-hover rounded  ">
        <thead class="backgroud-thead">
            <tr>
                <td><b>Tahun</b></td>
                <td><b>Periode</b></td>
                <td><b>Bulan</b></td>
                <td><b>Nip</b></td>
                <td><b>Nama</b></td>
                <td><b>Pendidikan</b></td>
                <td><b>Gender</b></td>
                <td><b>Jabatan</b></td>
                <td><b>Upt</b></td>
                <td><b>Wilayah</b></td>
                <td><b>Total</b></td>
                <td><b>Sub1</b></td>
                <td><b>Sub2</b></td>
                <td><b>Sub3</b></td>
                <td><b>Sub4</b></td>
                <td><b>Sub5</b></td>
                <td><b>Sub6</b></td>
                <td><b>Sub7</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach($Data as $data_get)
            <tr>
                <td>
                    {{ $data_get->tahun }}
                </td>
                <td>
                    {{ $data_get->periode }}
                </td>
                <td>
                    {{ $data_get->bulan }}
                </td>
                <td>
                    {{ $data_get->nip }}
                </td>
                <td>
                    {{ $data_get->nama }}
                </td>
                <td>
                    {{ $data_get->pendidikan }}
                </td>
                <td>
                    {{ $data_get->gender }}
                </td>
                <td>
                    {{ $data_get->jabatan }}
                </td>
                <td>
                    {{ $data_get->upt }}
                </td>
                <td>
                    {{ $data_get->wilayah }}
                </td>
                <td>
                    {{ $data_get->total }}
                </td>
                <td>
                    {{ $data_get->sub1 }}
                </td>
                <td>
                    {{ $data_get->sub2 }}
                </td>
                <td>
                    {{ $data_get->sub3 }}
                </td>
                <td>
                    {{ $data_get->sub4 }}
                </td>
                <td>
                    {{ $data_get->sub5 }}
                </td>
                <td>
                    {{ $data_get->sub6 }}
                </td>
                <td>
                    {{ $data_get->sub7 }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
    </div>

    <div style="display: inline-block;">
    
        
    </div>
        
    <nav aria-label="Page navigation example" style="justify-content:center;display: flex;
justify-content: center;">
        <ul class="pagination">
        @if(app('request')->input('limit') == 1 && app('request')->input('limit') < $datas)
        
            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
            <li class="page-item">
            <a class="page-link" href="{{url($next)}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
          @elseif(app('request')->input('limit') > 1 && app('request')->input('limit') < $datas)
          <li class="page-item">
            <a class="page-link" href="{{url($prev)}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
            <li class="page-item">
            <a class="page-link" href="{{url($next)}}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
          @elseif(app('request')->input('limit') == 1 && $datas == 1)

          @elseif(app('request')->input('limit') == $datas )
          <li class="page-item">
            <a class="page-link" href="{{url($prev)}}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
          @endif
          </ul>
        </nav>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>

<script type="text/javascript">
$('.nip').select2({
  placeholder: 'Pilih Nip',
  ajax: {
    url: '/autocomplete_lap_per_pegawai',
    dataType: 'json',
    delay: 250,
    processResults: function (data) {
        return {
        results:  $.map(data, function (item) {
            return {
                id: item.nip,
                text: item.nip
            }
        })
        };
    },
    cache: true
  }
});
</script>

@endsection