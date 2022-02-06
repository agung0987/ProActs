@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')  
<section class="bodytabel">

<div id ="layoutSidenav">
    <div id ="layoutSidenav_content">
  <div class="container-sm">
    <div class="table-responsive">
      <div class="table-wrapper mb-5">
      <div class="container d-flex h-100 col text-center justify-content-center align-self-center">
            <div class="col-11">
      <table>
                <tr style="float:left; width: 100%; height: 60px; ">
                            <td class="judul"><h2> <b>Rangking Pegawai Wilayah</b></h2></td>
                </tr>
                            <form action="/Rangking_Pegawai_wilayah" >
                            <tr style="float:left; width: 100%; height: 40px; ">
                                <td><label for="cars1"><b>Tahun &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</b></label>
                                </td>
                                <td><select id="cars1" style="width: 200px" name="caritahun">
                                    <option value="kosong">-- Pilih Tahun --</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                                </td>
                            </tr>
                            <tr style="float:left; width: 100%; height: 40px; ">
                            <td><label for="cars2"><b>Bulan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b></label></td>
                                <td><select  id="cars2" name="caribulan">
                                    <option value="0">-- Pilih Bulan --</option>
                                    <option value="1">January</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="1">Mei</option>
                                    <option value="2">Juni</option>
                                    <option value="3">Juli</option>
                                    <option value="4">Agustus</option>
                                    <option value="2">September</option>
                                    <option value="3">Oktober</option>
                                    <option value="4">November</option>
                                    <option value="2">Desember</option>
                                </select></td>
                            </tr>
                            <tr style="float:left; width: 100%; height: 40px; ">
                                <td><label for="cars3"><b>Wilayah  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b></label></td>
                                <td><select id= "cars3" name="cariwilayah">
                                <option value="0">-- Pilih Wilayah </option>
                                    @foreach($datawil as $datas_get)
                                        <option value="{{ $datas_get->nama }}">{{ $datas_get->nama }}</option>
                                    @endforeach
                                </select></td>
                            </tr>
                            <tr style="float:left; width: 100%; height: 40px; ">
                                <td><label for="cars2"><b> Data Perhalaman  &nbsp; </b></label>
                                </td>
                                <td><select  id="cars2" name="limit">
                                    <option value="100">-- Data Perhalaman --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                </td>
                            </tr>
                            <tr style="float:left; width: 100%; height: 40px; ">
                                <td><button type="submit" class="btn blue btn-primary float-left">Cari</button></td>
                            </tr>
                            </form>
            </table>
            </div>
        </div>
        <div class="table-title ">
          <div class="row">
          </div>
        </div>
        <div class="container d-flex h-100 col text-center justify-content-center align-self-center">
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
            </tr>
    </tbody>
</table>
</div>
    </div>
    </div>
    </div>
</div>
</section>
@endsection