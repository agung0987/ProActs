@extends('dashboard')

@section('content')
<!--awal template -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
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
                <div class="col-sm-5 judul">
                  <h2> <b>Data kategori</b></h2>
                </div>
                <!-- <div class="col-sm-7">
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Add New User</span></a>
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to Excel</span></a>
            </div> -->
                <div class="col-sm-12">
                  <a href="/view/kategori-tambah" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Kategori</span></a>
                </div>
              </div>
            </div>
            <table class="table table-striped table-hover rounded">
              <thead class="backgroud-thead">
                <tr>
                  <td><b> #</b></td>
                  <td><b>Kategori</b></td>
                  <td><b>Action</b></td>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $data_get)

                <tr>
                    <td>@php $no = 1; @endphp
                      {{ $loop->index+1 }}
                    </td>

                    <td>
                      {{$data_get->kategori}}
                      <!-- <input type="text" name="kategori" value="{{$data_get->kategori}}"></input> -->
                    </td>
                    <td style="width: 3rem;">
                      <div class="d-flex">
                        <div class="dropdown me-1">
                          <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                            Aksi
                          </button>
                          <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                            <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                            <li><a class="btn btn-default btn-xs delete_kategori" data-id="{{$data_get->id}}" href="#">Hapus</a></li>
                            <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a></li>
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
    </section>
    <!-- akhir template -->



    <!-- akhir template -->
    @foreach($data as $data_get)
    <div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header  backgroud-thead">
            <h5 class="modal-title" id="exampleModalLabel">Data Detail </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-sm">
              <tr>
                <td><b>ID </b></td>
                <td><span id="nip"></span>{{$data_get->id}}</td>
              </tr>
              <tr>
                <td><b>Kategori </b></td>
                <td><span id="nip"></span>{{$data_get->kategori}}</td>
              </tr>

            </table>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>
    @endforeach


    <!-- edit -->

    <!-- akhir template -->
    @foreach($data as $data_get)
    <div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form id="myForm-edit-kategori<?php echo $data_get->id; ?>" action="{{ route('in.edit', ['id' => $data_get->id]) }}" method="POST">
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header backgroud-thead">
              <h5 class="modal-title" id="exampleModalLabel">Edit Kategori </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-sm">

                <tr>
                  <td><b>ID </b></td>
                  <td><input type="text"  disabled class="form-control" name="id" value=" {{$data_get->id}}"> </td>
                </tr>
                <tr>
                  <td><b>Kategori </b></td>
                  <td><input type="text"  class="form-control" name="kategori" value=" {{$data_get->kategori}}"> </td>
                </tr>

              </table>
            </div>
            <div class="modal-footer">
              <button type="sumbit" class="btn btn-primary" id="edit-kategori<?php echo $data_get->id; ?>">Simpan</button>
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- edit kategori  -->
<script>
  $(document).on('click', '#edit-kategori<?php echo $data_get->id; ?>', function(e) {
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
    $('#myForm-edit-kategori<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit kategori  -->

    @endforeach
    <!-- akhir edit -->

    <div>
      <div>

        @endsection