@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

@php
$uri = $_SERVER['REQUEST_URI'];
$_tahun = isset($_GET['caritahun']) ? $_GET['caritahun'] : 'kosong';
$_bulan = isset($_GET['caribulan']) ? $_GET['caribulan'] : '0';
$_wilayah = isset($_GET['cariwilayah']) ? $_GET['cariwilayah'] : '0';
$_upt = isset($_GET['cariupt']) ? $_GET['cariupt'] : '0';
$_limit = isset($_GET['limit']) ? $_GET['limit'] : '1';
@endphp
<div id="layoutSidenav">
  <div id="layoutSidenav_content">

    <section class="bodytabel" style="padding-top: 0">


      <div class="container-sm ">
        <div class="table-responsive">
          <div class="table-wrapper mb-5">
            <div style="position:relative">
              <div class="container d-flex h-100 col justify-content-center align-self-center">
                <div class="col-11">
                  <table>
                    <h2 class="judul"> <b>Rangking Pegawai UPT</b></h2>
                    <form action="/Rangking_Pegawai_Upt">
                      <div class="row">
                        <div class="col-md-2">
                          <label for="cars1"><b>Tahun</b></label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group input-group-sm mb-3">
                            <select class="form-select" aria-label="Default select example" id="cars1" style="width: 200px" name="caritahun">
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
                        <div class="col-md-2">
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
                        <div class="col-md-2">
                          <label for="cars3"><b>Wilayah</b></label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group input-group-sm mb-3">
                            <select class="form-select" aria-label="Default select example" id="cars3" name="cariwilayah">
                              <option value="0" {{ $_wilayah == "0" ? 'selected' : ''}}>-- Pilih Wilayah -- </option>
                              @foreach($datawil as $datas_get)
                              <option value="{{ $datas_get->nama }}">{{ $datas_get->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <label for="cars4"><b>UPT</b></label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group input-group-sm mb-3">
                            <select class="form-select" aria-label="Default select example" id="cars4" name="cariupt">
                              <option value="0" {{ $_upt == "0" ? 'selected' : ''}}>-- Pilih Upt </option>
                              @foreach($dtupt as $datas_get)
                              <option value="{{ $datas_get->nama }}">{{ $datas_get->nama }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <label for="cars5"><b>Data Perhalaman</b></label>
                        </div>
                        <div class="col-md-4">
                          <div class="input-group input-group-sm mb-3">
                            <select class="form-select" aria-label="Default select example" id="cars5" name="limit">
                              <option value="100">-- Data Perhalaman --</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn blue btn-primary float-left">Cari</button>
                    </form>
                  </table>
                </div>
              </div>

              <div class="container d-flex h-100 col text-center justify-content-center align-self-center mt-3">
                <div class="col-11">
                  <table class="table table-striped table-hover rounded  ">
                    <thead class="backgroud-thead">
                      <tr>
                        <td><b>#</b></td>
                        <td><b>Nip</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Jabatan</b></td>
                        <td><b>Upt</b></td>
                        <td><b>Total</b></td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $data_get)

                      <tr>
                        <td>@php $no = 1; @endphp
                          {{ $loop->index+1 }}
                        </td>



                        <td>
                          {{ $data_get->nip }}

                        </td>
                        <td>
                          {{ $data_get->nama }}

                        </td>
                        <td>
                          {{ $data_get->jabatan }}
                        </td>
                        <td>
                          {{ $data_get->upt }}

                        </td>
                        <td>
                          {{ $data_get->total }}

                        </td>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
</div>
@endsection