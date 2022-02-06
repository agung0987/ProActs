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
          <div style="position:relative">
            <div class = "judul" style="float:left; width: 70%; height:50px;">
              <h2><b>Data Periode Penilaian</b></h2>
            </div>
            <div style="float:left; width: 30%; height:50px; ">
              <a href="/periode/tambah" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Periode Penilaian</span></a>
            </div>
          </div>
          </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
          <thead class="backgroud-thead">
            <tr>
              <td><b>#</b></td>
              <td><b>Tahun</b></td>
              <td><b>Periode</b></td>
              <td><b>Bulan</b></td>
              <td><b>Tgl Mulai</b></td>
              <td><b>Tgl Tutup</b></td>
              <td><b>Status</b></td>
              <td><b>Aksi</b></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data_get)

            <tr>
              <td>
                {{ $data_get ->id }}
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
              <td>
                {{ $data_get->tgl_mulai }}
              </td>
              <td>
                {{ $data_get->tgl_tutup }}
              </td>
              @if ($data_get ->status == 0)
              <td>Tutup</td>
              @else
              <td>Terbit</td>
              @endif
              <td style="width: 0rem;">
                <div class="d-flex">
                  <div class="dropdown me-1">
                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split fs-6" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                      Aksi
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                      <li><a class="btn btn-default btn-xs delete_periode" href="#" data-id="{{$data_get->id}}">Hapus</a></li>
                      <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a></li>
                    </ul>
                  </div>

              </td>





            </tr>

            @endforeach
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
    </div>
  </div>
</section>


<!-- akhir template -->
@foreach($data as $data_get)
<div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header backgroud-thead">
        <h5 class="modal-title" id="exampleModalLabel">Detail Periode Penilaian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">
          <tr>
            <td><b>ID </b></td>
            <td><span name="id"></span>{{$data_get->id}}</td>
          </tr>
          <tr>
            <td> <b>Tahun</b></td>
            <td><span name="tahun"></span>{{$data_get->tahun}}</td>
          </tr>
          <tr>
            <td> <b>Periode</b></td>
            <td><span name="periode"></span>{{$data_get->periode}}</td>
          </tr>
          <tr>
            <td><b> Bulan</b> </td>
            <td><span name="bulan"></span>{{$data_get->bulan}}</td>
          </tr>
          <tr>
            <td> <b>Tgl Mulai</b></td>
            <td><span name="tgl_mulai"></span>{{$data_get->tgl_mulai}}</td>
          </tr>
          <tr>
            <td> <b>Tgl Tutup</b></td>
            <td><span name="tgl_tutup"></span>{{$data_get->tgl_tutup}}</td>
          </tr>
          <tr>
            <td> <b>Status</b></td>
            @if ($data_get ->status == 0)
            <td><span name="id_wilayah"></span>Tutup</td>
            @else
            <td> Terbit </td>
            @endif
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach


<!-- edit -->

<!-- akhir template -->
@foreach($data as $data_get)
<div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header backgroud-thead">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Periode Penilaian </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
<form id="myForm-edit-periode<?php echo $data_get->id; ?>" action="/periode/update/{{$data_get->id}}"  method="POST">
<!-- dashboard.blade.php -->
@csrf
        <div class="modal-body">
          <table class="table table-sm">
            <tr>
              <td> <b>Tahun</b></td>
              <td> <select name="tahun" id="tahun">
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                  </select>
              </td>
            </tr>
            <tr>
            <tr>
              <td> <b>Periode</b></td>
              <td> <select name="periode" id="periode">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                   </select>
             </td>
            </tr>
            <tr>
              <td> <b>Bulan</b></td>
              <td><input type="text" name="bulan" value="{{$data_get->bulan}}"></td>
            </tr>
            <tr>
              <td><b> Tgl Mulai</b> </td>
              <td><input type="date" name="tgl_mulai" value="{{$data_get->tgl_mulai}}"></td>
            </tr>
            <tr>
              <td> <b>Tgl Tutup</b></td>
              <td><input type="date" name="tgl_tutup" value="{{$data_get->tgl_tutup}}"></td>
            </tr>
            <tr>
              <td> <b>Status</b></td>
              <td> <select name="status" id="status" value="{{ $data_get -> status }}">
                        <option value="1">Terbit</option>
                        <option value="0">Tutup</option>
                   </select>
              </td>
            </tr>
            
          </table>
        </div>
        <div class="modal-footer">
     <!-- <a class="btn btn-secondary update" href="#" data-id="{{$data_get->id}}">Edit</a> -->
          <button type="submit" class="btn btn-primary " id="edit-periode<?php echo $data_get->id; ?>">Simpan</button>
      
        </div>
        </div>
    </div>
  </form>
 
</div>

<!-- edit periode  -->
<script>
  $(document).on('click', '#edit-periode<?php echo $data_get->id; ?>', function(e) {
    e.preventDefault();
     Swal.fire({
  title: 'Edit',
  text: "Apakah Kamu Yakin Ingin mengedit Data Tersebut ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Iya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.isConfirmed) {
    $('#myForm-edit-periode<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit periode  -->

@endforeach
<!-- akhir edit -->
@endsection