@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="/lib/js/snippets-1.0.js"></script>
<script>
  (function() {
    var bsa_optimize = document.createElement('script');
    bsa_optimize.type = 'text/javascript';
    bsa_optimize.async = true;
    bsa_optimize.src = 'https://cdn4.buysellads.net/pub/tutorialrepublic.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa_optimize);
  })();
</script>
<!--Google Analytics-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-40117907-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-40117907-1');
</script>
<!--End:Google Analytics-->
<script>
  $(document).ready(function() {
    $("#preview").attr("scrolling", "no");

    // Fullscreen preview
    $("#myModal").on('show.bs.modal', function(event) {
      $(this).find(".modal-body").html('<iframe src="bootstrap/crud-data-table-for-database-with-modal-form.php" frameborder="0" class="fullscreen"></iframe>');
    });
  });
</script>
<div id="layoutSidenav">
            <div id="layoutSidenav_content">
<section class="bodytabel">
  
  <div class="container-sm">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-3 judul">
              <h2 style=""> <b>Data Pegawai</b></h2>
            </div>

            <div class="col-sm-9">
              <a href="/tb-pegawai/tambahh" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Pegawai</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
          <thead class="backgroud-thead">
            <tr>
              <td><b>NIP</b></td>
              <td><b>Nama</b></td>
              <td><b>Jabatan</b></td>
              <td><b>Action</b></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data_get)

            <tr>
              <td>
                {{$data_get->nip}}
              </td>



              <td>
                {{ $data_get->nama }}
               

              </td>
              <td>
                {{ $data_get->jabatan }}

              </td>




              <td style="width: 3rem;">
                <div class="d-flex">
                  <div class="dropdown me-1">
                    <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                      Aksi
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                      <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                      <li><a class="btn btn-default btn-xs delete_pegawai" data-id="{{ $data_get->id }}"
                       href="#">Hapus</a></li>
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
</section>




<!-- detail -->
<!-- akhir template -->
@foreach($data as $data_get)
<div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header backgroud-thead">
        <h5 class="modal-title" id="exampleModalLabel"  >Detail Pegawai</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bacground-body-modal">
        <table class="table table-sm">
          <tr>
            <td><b>ID </b></td>
            <td><span id="id"></span>{{$data_get->id}}</td>
          </tr>
          <tr>
            <td><b>NIP </b></td>
            <td><span id="nip"></span>{{$data_get->nip}}</td>
          </tr>
          <tr>
            <td><b>Tanggal Lahir </b></td>
            <td><span id="ttl"></span>{{$data_get->TTL}}</td>
          </tr>
          <tr>
            <td><b>Pendidikan </b></td>
            <td><span id="nip"></span>{{$data_get->pendidikan}}</td>
          </tr>
          <tr>
            <td><b>Gender: </b></td>
            <td><span id="nip"></span>{{$data_get->id}}</td>
          </tr>
          <tr>
            <td><b>Jabatan </b></td>
            <td><span id="nip"></span>{{$data_get->jabatan}}</td>
          </tr>
          <tr>
            <td><b>UPT </b></td>
            <td><span id="nip"></span>{{$data_get->upt}}</td>
          </tr>
          <tr>
            <td><b>Wilayah </b></td>
            <td><span id="nip"></span>{{$data_get->wilayah}}</td>
          </tr>
          <tr>
            <td><b>No Telp </b></td>
            <td><span id="nip"></span>{{$data_get->no_telp}}</td>
          </tr>
          <tr>
            <td><b>Atasan </b></td>
            <td><span id="nip"></span>{{$data_get->atasan}}</td>
          </tr>
      


        </table>
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
      <div class="modal-content" style="width: 600px; ">
        <div class="modal-header backgroud-thead">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bacground-body-modal">
        <form id="myForm-edit-pegawai<?php echo $data_get->id; ?>" action="{{ route('dtpg_edit', ['id' => $data_get->id]) }}"  method="POST">
        @csrf
          <table>

            <tr style="width: 100%; height: 50px;">
            <td><b>ID &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b></td>
            <td><input style="width: 191%"name="id" disabled class="form-control" value="{{$data_get->id}}"></input></td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>NIP </b></td>
            <td><input style="width: 191%" name="nip" class="form-control" value="{{$data_get->nip}}"></input></td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Nama </b></td>
            <td><input style="width: 191%" name="nama" class="form-control" value="{{$data_get->nama}}"></input></td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Tanggal Lahir &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</b></td>
            <td><input type="date" style="width: 191%" name="TTL" class="form-control date" value="{{$data_get->TTL}}"></input></td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Pendidikan </b></td>
            <td><select style="width: 191%" name="pendidikan" class="form-select" aria-label="Default select example">
                          
                            <option value="1">SMA / SLTA</option>
                            <option value="2">D1</option>
                            <option value="3">D2</option>
                            <option value="2">D3</option>
                            <option value="3">D4</option>
                            <option value="3">S1</option>
                            <option value="2">S2</option>
                            <option value="3">S3</option>
                  </select>
              </td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Gender </b></td>
            <td><select style="width: 191%" name="gender" class="form-select" aria-label="Default select example">
                          
                            <option  value="P">Laki-Laki</option>
                            <option  value="L">Perempuan</option>
                </select>
            </td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Jabatan </b></td>
            <td>
                  <select  style="width: 191%" name="id_jabatan" class="form-control select1">
                    
                      @foreach($datajab as $datas_get)
                          <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                      @endforeach
                  </select>
              </td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>UPT </b></td>
            <td>
                  <select style="width: 191%" name="id_upt" class="form-control select1">
                    
                      @foreach($dataupt as $datas_get)
                          <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                      @endforeach
                  </select>
             </td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Wilayah </b></td>
            <td>
                  <select style="width: 191%" name="id_wilayah" class="form-control select1">
                      @foreach($datawil as $datas_get)
                          <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                      @endforeach
                  </select>
            </td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>No Telepon </b></td>
            <td><input style="width: 191%" name="no_telp" class="form-control" value="{{$data_get->no_telp}}"></input></td>
          </tr>
          <tr style="width: 100%; height: 50px;">
            <td><b>Atasan </b></td>
            <td>
                  <select style="width: 191%" name="id_atasan" class="form-control select1">
                    
                      @foreach($dataatasan as $datas_get)
                          <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                      @endforeach
                  </select>
            </td>
          </tr>

          </table>
          </form>
        </div>
        <div class="modal-footer bacground-body-modal" style="border: none;" >
          <button type="sumbit" class="btn btn-primary" id="edit-pegawai<?php echo $data_get->id; ?>" >Simpan</button>
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
</div>

<!-- edit pegawai  -->
<script>
  $(document).on('click', '#edit-pegawai<?php echo $data_get->id; ?>', function(e) {
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
    $('#myForm-edit-pegawai<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit pegawai  -->

@endforeach
<!-- akhir edit -->


</div>
    </div>

@endsection