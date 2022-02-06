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
            <div class="col-sm-3" style="center">
              <h2><b>Export</b></h2>
            </div>
          </div>
        </div>
        <form action="/kirimcoba1" method="get">
                @csrf
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Pegawai" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1"> Tabel Pegawai </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Jabatan" id="defaultCheck2">
        <label class="form-check-label" for="defaultCheck2"> Tabel Jabatan </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Wilayah" id="defaultCheck3">
        <label class="form-check-label" for="defaultCheck3"> Tabel Wilayah </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_UPT" id="defaultCheck4">
        <label class="form-check-label" for="defaultCheck4"> Tabel UPT </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Kategori" id="defaultCheck5">
        <label class="form-check-label" for="defaultCheck5"> Tabel Kategori </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Kuesioner" id="defaultCheck6">
        <label class="form-check-label" for="defaultCheck6"> Tabel Kuesioner </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_Periode_Nilai" id="defaultCheck7">
        <label class="form-check-label" for="defaultCheck7"> Tabel Periode Nilai Penilaian </label>
    </div>
    <div class="form-check">
        <input  class="form-check-label" type="checkbox" name="data[]" value="Tabel_User" id="defaultCheck8">
        <label class="form-check-label" for="defaultCheck8"> Tabel User </label>
    </div>
<div class="form-check">
<button type="submit" class="btn btn-primary coba">Export</button>
</div>
</form>

</table>
        
        </div>
      </div>
    </div>
  </section>
  @endsection