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
                    <table>
                        <h2 class="judul pt-2"><b>Laporan Per-Pegawai</b></h2>
                        <form action="/lap_per_pegawai">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cars1"><b>Tahun</b></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <select class="form-select" aria-label="Default select example" id="cars3" name="caritahun">
                                            <option value="kosong" {{$_tahun == "kosong" ? 'selected' : ''}}>-- Pilih Tahun --</option>
                                            <option value="2017" {{$_tahun == "2017" ? 'selected' : ''}}>2017</option>
                                            <option value="2018" {{$_tahun == "2018" ? 'selected' : ''}}>2018</option>
                                            <option value="2019" {{$_tahun == "2019" ? 'selected' : ''}}>2019</option>
                                            <option value="2020" {{$_tahun == "2020" ? 'selected' : ''}}>2020</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cars2"><b>Bulan</b></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <select class="form-select" aria-label="Default select example" id="cars2" name="caribulan">
                                            <option value="0" {{ $_bulan == "0" ? 'selected' : ''}}>-- Pilih Bulan --</option>
                                            <option value="1" {{ $_bulan == "1" ? 'selected' : ''}}>January</option>
                                            <option value="2" {{ $_bulan == "2" ? 'selected' : ''}}>Februari</option>
                                            <option value="3" {{ $_bulan == "3" ? 'selected' : ''}}>Maret</option>
                                            <option value="4" {{ $_bulan == "4" ? 'selected' : ''}}>April</option>
                                            <option value="5" {{ $_bulan == "5" ? 'selected' : ''}}>Mei</option>
                                            <option value="6" {{ $_bulan == "6" ? 'selected' : ''}}>Juni</option>
                                            <option value="7" {{ $_bulan == "7" ? 'selected' : ''}}>Juli</option>
                                            <option value="8" {{ $_bulan == "8" ? 'selected' : ''}}>Agustus</option>
                                            <option value="9" {{ $_bulan == "9" ? 'selected' : ''}}>September</option>
                                            <option value="10" {{ $_bulan == "10" ? 'selected' : ''}}>Oktober</option>
                                            <option value="11" {{ $_bulan == "11" ? 'selected' : ''}}>November</option>
                                            <option value="12" {{ $_bulan == "12" ? 'selected' : ''}}>Desember</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="cars2"><b>NIP</b></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <select class="nip form-select" aria-label="Default select example" id="cars2" name="carinip">
                                            @if($_GET['carinip'] == 'kosong')
                                            <option value="kosong">-- PIlih NIP --</option>
                                            @else
                                            <option value={{ $_nip == $_GET['carinip'] ? $_GET['carinip'] : '--PILIH NIP--'}} selected> {{ $_nip == $_GET['carinip'] ? $_GET['carinip'] : '-- Pilih NIP --'}}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="limit" value="1" hidden></input>
                            <td><button type="submit" class="btn blue btn-success float-left">Cari</button></td>

                        </form>
                    </table>
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
                                <td><b>PP</b></td>
                                <td><b>SS</b></td>
                                <td><b>RBS</b></td>
                                <td><b>CO</b></td>
                                <td><b>PWB</b></td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>

                    <div style="display: inline-block;">


                    </div>
                    <div style="justify-content:center;display: flex; justify-content: center;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                @if(app('request')->input('limit') == 1 && app('request')->input('limit') < $datas) <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="{{url($next)}}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                    @elseif(app('request')->input('limit') > 1 && app('request')->input('limit') < $datas) <li class="page-item">
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
    </div>
</section>

<script type="text/javascript">
    $('.nip').select2({
        placeholder: 'Pilih Nip',
        ajax: {
            url: '/autocomplete_lap_per_pegawai',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.nip,
                            text: item.nip + " - " + item.nama
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

@endsection