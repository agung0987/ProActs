@extends('dashboard')

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
<!--awal template -->
<!-- <script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script> -->
        <section class="bodytabel">
        <div id="layoutSidenav">
    <div id="layoutSidenav_content">
            <div class="container-sm">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5 judul">
                                    <h2> <b>Data wilayah</b></h2>
                                </div>
                                <div class="col-sm-7">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambahwil"
                                        class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span
                                            style="padding-top: 4px;">Tambah Wilayah</span></a>
                                    <!-- <a href="#" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to Excel</span></a> -->
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover rounded">
                            <thead class="backgroud-thead">
                                <tr>
                                    <td><b> Id</b></td>
                                    <td><b>Nama</b></td>
                                    <td><b>Alamat</b></td>
                                    <td><b>Email</b></td>
                                    <td><b>NO Telp</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $data_get)

                                <tr>
                                    <td>
                                        {{$data_get->id}}

                                    </td>

                                    <td>
                                        {{$data_get->nama}}

                                    </td>
                                    <td>
                                        {{$data_get->alamat}}

                                    </td>
                                    <td>
                                        {{$data_get->email}}

                                    </td>
                                    <td>
                                        {{$data_get->no_telp}}

                                    </td>
                                    <td style="width: 3rem;">
                                        <div class="d-flex">
                                            <div class="dropdown me-1">
                                                <button type="button"
                                                    class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm"
                                                    id="dropdownMenuOffset" data-bs-toggle="dropdown"
                                                    aria-expanded="false" data-bs-offset="10,20">
                                                    Aksi
                                                </button>
                                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                                                    <li><a class="btn btn-default btn-xs fs-6" type="button"
                                                            class="btn btn-primary" data-bs-toggle="modal" href=""
                                                            data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                                                    <li><a class="btn btn-default btn-xs delete_wilayah"
                                                            href="#" data-id="{{$data_get->id}}">Hapus</a>
                                                    </li>
                                                    <li><a class="btn btn-default btn-xs" type="button"
                                                            class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal-{{$data_get->id}}">Details</a>
                                                    </li>
                                                </ul>
                                            </div>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix">

                            <!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
          <ul class="pagination">
            <li class="page-item disabled"><a href="#">Previous</a></li>
            <li class="page-item"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item active"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">4</a></li>
            <li class="page-item"><a href="#" class="page-link">5</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
          </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
        <!-- akhir template -->



        <!-- akhir template -->
        @foreach($data as $data_get)
        <div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header backgroud-thead">
                        <h5 class="modal-title" id="exampleModalLabel">Data Detail </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bacground-body-modal">
                        <table class="table table-sm">
                            <tr>
                                <td><b>ID </b></td>
                                <td><span id="nip"></span>{{$data_get->id}}</td>
                            </tr>
                            <tr>
                                <td><b>Nama </b></td>
                                <td><span id="nip"></span>{{$data_get->nama}}</td>
                            </tr>
                            <tr>
                                <td><b>Alamat </b></td>
                                <td><span id="nip"></span>{{$data_get->alamat}}</td>
                            </tr>
                            <tr>
                                <td><b>Email </b></td>
                                <td><span id="nip"></span>{{$data_get->email}}</td>
                            </tr>
                            <tr>
                                <td><b>No Telepon </b></td>
                                <td><span id="nip"></span>{{$data_get->no_telp}}</td>
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
<div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <form action="{{ route('dtwl-edit', ['id' => $data_get->id]) }}"  id="myForm-edit-wilayah<?php echo $data_get->id; ?>" method="POST">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header backgroud-thead">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Wilayah </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bacground-body-modal">
                            <table>

                                <tr style="width: 100%; height: 50px;">
                                    <td><b>ID </b></td>
                                    <td><input style="width: 165%" name="id" type="text" class="form-control" value=" {{$data_get->id}}"> </td>
                                </tr>
                                <tr style="width: 100%; height: 50px;">
                                    <td><b>Nama </b></td>
                                    <td><input style="width: 165%" name="nama" type="text" class="form-control" value=" {{$data_get->nama}}"> </td>
                                </tr>
                                <tr style="width: 100%; height: 50px;">
                                    <td><b>Alamat </b></td>
                                    <td><input style="width: 165%" name="alamat" type="text" class="form-control" value=" {{$data_get->alamat}}"> </td>
                                </tr>
                                </tr>
                                <tr style="width: 100%; height: 50px;">
                                    <td><b>Email </b></td>
                                    <td><input style="width: 165%" name="email" type="text" class="form-control" value=" {{$data_get->email}}"> </td>
                                </tr>
                                <tr style="width: 100%; height: 50px;">
                                    <td><b>No Telepon &nbsp; &nbsp; &nbsp; &nbsp;</b></td>
                                    <td><input style="width: 165%" name="no_telp" type="text" class="form-control" value=" {{$data_get->no_telp}}"> </td>
                                </tr>

                            </table>
                        </div>
                        <div class="modal-footer bacground-body-modal" style="border: none;">
                            <button type="sumbit" class="btn btn-primary" id="edit-wilayah<?php echo $data_get->id; ?>">Simpan</button>
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- edit wilayah  -->
<script>
  $(document).on('click', '#edit-wilayah<?php echo $data_get->id; ?>', function(e) {
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
    $('#myForm-edit-wilayah<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit wilayah  -->
        @endforeach
        <!-- akhir edit -->


        <!-- Modal tambah Wilayah -->
        <div class="modal fade" id="tambahwil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('dtwl-tambah')}}"  id="myForm-tambah-wilayah" method="post">
                    @csrf  
                    <div class="modal-content">
                        <div class="modal-header backgroud-thead">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Wilayah</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bacground-body-modal">
                        <table>
                            <tr style="width: 100%; height: 50px;">
                                <td><b>Nama </b></td>
                                <td><input type="text" style="width: 165%" name="nama" class="form-control" id="exampleFormControlInput1"></td>
                            </tr>
                            <tr style="width: 100%; height: 50px;">
                                <td><b>Alamat</b></td>
                                <td><input type="text" style="width: 165%" name="alamat" class="form-control" id="exampleFormControlInput1"></td>
                            </tr>
                            <tr style="width: 100%; height: 50px;">
                                <td><b>Email</b></td>
                                <td><input type="text" style="width: 165%" name="email" class="form-control" id="exampleFormControlInput1"></td>
                            </tr>
                            <tr style="width: 100%; height: 50px;">
                                <td><b>No Telepon &nbsp; &nbsp; &nbsp; &nbsp;</b></td>
                                <td><input type="text" style="width: 165%" name="no_telp" class="form-control" id="exampleFormControlInput1"></td>
                            </tr>
                        </table>
                        </div>
                        <div class="modal-footer bacground-body-modal" style="border: none;">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary" id="tambah-wilayah">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ./Modal tambah jabatan -->


    </div>
</div>
@endsection