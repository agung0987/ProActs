@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')
<section class="bodytabel">

<div id ="layoutSidenav">
    <div id ="layoutSidenav_content">
  <div class="container-sm ">
    <div class="table-responsive">
      <div class="table-wrapper mb-5">
        <div class="table-title ">
          <div class="row">
            <div class="col-sm-3 judul" style="center">
              <h2><b>EXPORT</b></h2>
            </div>
          </div>
        </div>
        <form action="/exportfile" method="get">
                @csrf
      <table>
  <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Pegawai" id="defaultCheck1"></td>
        <td><label class="form-check-label" for="defaultCheck1"> Data Pegawai </label></td>
  </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Jabatan" id="defaultCheck2"> </td>
        <td><label class="form-check-label" for="defaultCheck2"> Data Jabatan </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Wilayah" id="defaultCheck3"></td>
        <td><label class="form-check-label" for="defaultCheck3"> Data Wilayah </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_UPT" id="defaultCheck4"></td>
        <td><label class="form-check-label" for="defaultCheck4"> Data UPT </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Kategori" id="defaultCheck5"></td>
        <td><label class="form-check-label" for="defaultCheck5"> Data Kategori </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Kuesioner" id="defaultCheck6"></td>
        <td><label class="form-check-label" for="defaultCheck6"> Data Kuesioner </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Periode_Nilai" id="defaultCheck7"></td>
        <td><label class="form-check-label" for="defaultCheck7"> Data Periode Nilai Penilaian </label></td>
    </tr>
    <tr style="float:left; width: 100%; height:40px; ">
        <td><input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_User" id="defaultCheck8"></td>
        <td><label class="form-check-label" for="defaultCheck8"> Data User </label></td>
    </tr>
<tr style="float:left; width: 100%; height:40px; ">
<td><button type="submit" class="btn btn-success coba">Export</button></td>
</tr>
</table>
</form>

</table>
        
        </div>
      </div>
    </div>
  </section>