@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')  
<section class="bodytabel">

<div id ="layoutSidenav">
    <div id ="layoutSidenav_content">
  <div class="container-sm">
    <div class="table-responsive">
      <div class="table-wrapper mb-5">
        <div class="table-title ">
          <div class="row">
            <div class="col-sm-3">
              <h2> Data <b>Periode Penilaian</b></h2>
            </div>

            <div class="col-sm-9">
              <a href="/periode/tambah" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Periode Penilaian</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
          <thead class="backgroud-thead">
            <tr>
              <td><b>#</b></td>
              <td><b>ID</b></td>
              <td><b>Tahun</b></td>
              <td><b>Periode</b></td>
              <td><b>Bulan</b></td>
              <td><b>Status</b></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data_get)

            <tr>
              <td>@php $no = 1; @endphp
                {{ $loop->index+1 }}
              </td>



              <td>
                {{ $data_get->tahun }}
              
              </td>
              <td>
                {{ $data_get->periode }}
              
              </td>
              <td>
                {{ $data_get->bulan }}
              </td>
              @if ($data_get ->status == 0)
              <td>Tutup</td>
              @else
              <td>Terbit</td>
              @endif
              <td>
              @if ($data_get ->status == 1)
                <a href="/pegawai-pilih" class = "btn btn-warning btn-sm col-4" style="color: black">Nilai</a>
              @else
                <a href="" class = "btn btn-danger btn-sm col-4" style="color: white">Lihat</a>
              @endif
              </td>
            @endforeach
            </tr>
    </tbody>
</table>

    </div>
    </div>
</div>
</section>