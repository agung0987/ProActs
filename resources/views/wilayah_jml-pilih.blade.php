@extends('dashboard')

@section('content')
<!--awal template -->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@php
    $uri = $_SERVER['REQUEST_URI'];
    $_token = isset($_GET['_token']) ? $_GET['_token'] : 'A5zdQSXRGtRTeQ7KOPN3KneARIhAxsPhDz83XeAt'; 
    echo $_token;
    $_tahun = isset($_GET['caritahun']) ? $_GET['caritahun'] : 'kosong';
    $_bulan = isset($_GET['caribulan']) ? $_GET['caribulan'] : '0';
    $_wilayah = isset($_GET['carinip']) ? $_GET['cariwilayah'] : '0';
    $_limit = isset($_GET['limit']) ? $_GET['limit'] : '1';
    $halskrng = $limit;
    $halakhir = $datas; 
    
    $next = "lap_per_pegawai?_token=$_token&caritahun=$_tahun&caribulan=$_bulan&cariwilayah=$_wilayah&limit=".($halskrng+1);
    $prev = "lap_per_pegawai?_token=$_token&caritahun=$_tahun&caribulan=$_bulan&cariwilayah=$_wilayah&limit=".($halskrng-1);
@endphp

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
    <section class="bodytabel" style="padding-top: 0">
        <div class="container-sm">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="container d-flex h-100 col text-center justify-content-center align-self-center">
                    <div class="col-11">
            
                        <table>
                            <tr style="float:left; width: 100%; height: 60px; ">
                                <td class="judul"><h2> <b>Laporan per Wilayah</b></h2></td>
                            </tr>
                            <form action="/lap_jml_wilayah" >    
                            <!-- <div style="float:left; width: 100%; height:60px;"> -->
                            <tr style="float:left; width: 100%; height:40px;">  
                            <td ><label for="cars1"><b>Tahun &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label></td>
                            <td> <select id="cars1" style="width: 200px" name="caritahun">
                                    <option value="kosong" {{$_tahun == "kosong" ? 'selected' : ''}}>-- Pilih Tahun --</option>
                                    <option value="2017" {{$_tahun == "2017" ? 'selected' : ''}}>2017</option>
                                    <option value="2018" {{$_tahun == "2018" ? 'selected' : ''}}>2018</option>
                                    <option value="2019" {{$_tahun == "2019" ? 'selected' : ''}}>2019</option>
                                    <option value="2020" {{$_tahun == "2020" ? 'selected' : ''}}>2020</option>
                                </select>
                            </td>
                            </tr>
                            <!-- </div> -->
                            <tr style="float:left; width: 100%; height:40px;">
                            <!-- <div style="float:left; width: 100%; height:40px; "> -->
                            <td><label for="cars2"><b>Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label></td>
                            <td>
                                <select  id="cars2" name="caribulan">
                                    <option value="0"  {{ $_bulan == "0" ? 'selected' : ''}}>-- Pilih Bulan --</option>
                                    <option value="1"  {{ $_bulan == "1" ? 'selected' : ''}}>January</option>
                                    <option value="2"  {{ $_bulan == "2" ? 'selected' : ''}}>Februari</option>
                                    <option value="3"  {{ $_bulan == "3" ? 'selected' : ''}}>Maret</option>
                                    <option value="4"  {{ $_bulan == "4" ? 'selected' : ''}}>April</option>
                                    <option value="5"  {{ $_bulan == "5" ? 'selected' : ''}}>Mei</option>
                                    <option value="6"  {{ $_bulan == "6" ? 'selected' : ''}}>Juni</option>
                                    <option value="7"  {{ $_bulan == "6" ? 'selected' : ''}}>Juli</option>
                                    <option value="8"  {{ $_bulan == "7" ? 'selected' : ''}}>Agustus</option>
                                    <option value="9"  {{ $_bulan == "8" ? 'selected' : ''}}>September</option>
                                    <option value="10" {{ $_bulan == "10" ? 'selected' : ''}}>Oktober</option>
                                    <option value="11" {{ $_bulan == "11" ? 'selected' : ''}}>November</option>
                                    <option value="12" {{ $_bulan == "12" ? 'selected' : ''}}>Desember</option>
                                </select>
                            </td>
                            <!-- </div> -->
                            </tr>
                            <tr style="float:left; width: 100%; height:40px;">
                            <!-- <div style="float:left; width: 100%; height:40px;"> -->
                                <td><label for="cars3"><b>Wilayah &nbsp; </b></label></td>
                                <td>
                                <select id= "cars3" name="cariwilayah" >
                                
                                <option value="0" {{ $_bulan == "0" ? 'selected' : ''}}>-- Pilih Wilayah </option>
                                
                                    @foreach($datawil as $datas_get)
                                        <option value="{{ $datas_get->nama }}">
                                            {{ $datas_get->nama }}</option>
                                    @endforeach
                               
                                </select>
                                <input type = "text" name="limit" value ="1" hidden></input>
                                </td>
                            <!-- </div> -->
                            </tr>
                            <tr style="float:left; width: 100%; height:50px;">
                            <!-- <div style="float:left; width: 100%; height:80px;"> -->
                                <td><button type="submit" class="btn blue btn-primary float-left">Cari</button></td>
                            <!-- </div> -->
                            </tr>
                            </form>
                        </table>
                    </div>
                    </div>
                    <!-- <div class="align-middle w-100 border"> -->
                    <div class="container d-flex h-100 col text-center justify-content-center align-self-center">
                    <div class="col-11">
                        <table class="table table-striped table-hover rounded ">
                        <thead class="backgroud-thead">
                        <tr>
                            <td width="10%"><b> #</b></td>
                            <td width="30%"><b>Wilayah</b></td>
                            <td width="30%"><b>Total</b></td>
                            <!-- <td width="30%"><b>Aksi</b></td> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $val)
                        <tr>

                            <td>@php $no = 1; @endphp
                                {{ $loop->index+1 }}
                            </td>

                            <td>
                              {{$val->wilayah}}

                            </td>
                            <td>
                            {{$val->jumlah}}

                            </td>
                            <div class="d-flex">
                            <!-- <td >
                                
                                        <form action="{{url('/jml_wilayah')}}">
                            <input type="hidden" name="nama" value="{{$val->wilayah}}">
                                   <button class = "btn btn-warning btn-sm" type="submit" style="color: black">Lihat</button>
                                   </form>
                                   </td> -->
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" style="color:#ddd; justify-content:center;display: flex; justify-content: center;">
        <ul class="pagination">
            @if($datas == 0 )
            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
        @elseif(app('request')->input('limit') == 1 && app('request')->input('limit') < $datas)
        
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
</section>
<!-- akhir template -->
</div>
</div>

@endsection