@extends('dashboard')

@section('content')
<!--awal template -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>


<section class="bodytabel">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <div class="container-sm">
        <div class="table-responsive">
          <table>
            <h2 class="judul pt-2"><b>Data User</b></h2>
            <form action="/tb-user">
              <div class="row">
                <div class="col-md-1">
                  <label class="judul" for="cars2"><b>Nama</b></label>
                </div>
                <div class="col-md-4">
                  <div class="input-group input-group-sm mb-3">
                    <select class="name form-control" style="width: 300%;" name="nama"></select>
                  </div>
                </div>
              </div>
              <td><button type="submit" class="btn blue btn-success float-left">Cari</button></td>
            </form>
          </table>
                <!-- <div class="col-sm-7">
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Add New User</span></a>
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to Excel</span></a>
            </div> -->
            <table class="table table-striped table-hover rounded">
              <thead class="backgroud-thead">
                <tr>
                  <td><b> #</b></td>
                  <td><b>Nama</b></td>
                  <td><b>Email</b></td>
                  <td><b>Hak Akses</b></td>
                  <td><b>ID Pegawai</b></td>
                  <td><b>Aksi</b></td>
                </tr>
              </thead>
              <tbody>

                @foreach($datauser as $data_get)

                <tr>

                  <td>@php $no = 1; @endphp
                    {{ $loop->index+1 }}
                  </td>

                  <td>
                    {{$data_get->name}}

                  </td>
                  <td>
                    {{$data_get->email}}

                  </td>
                  <td>
                    {{$data_get->hakAkses}}
                  </td>
                  <td>
                    {{$data_get->id_pegawai}}
                  </td>
                  <td style="width: 3rem;">
                    <div class="d-flex">
                      <div class="dropdown me-1">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                          Aksi
                        </button>
                        <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                          <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                          <li><a class="btn btn-default btn-xs delete_user" data-id="{{$data_get->id}}" href="#">Hapus</a></li>
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
    @foreach($datauser as $data_get)
    <div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header backgroud-thead">
            <h5 class="modal-title" id="exampleModalLabel">Data Detail </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-sm">
              <tr>
                <td><b>ID: </b></td>
                <td><span id="id"></span>{{$data_get->id}}</td>
              </tr>
              <tr>
                <td><b>Nama: </b></td>
                <td><span id="name"></span>{{$data_get->name}}</td>
              </tr>
              <tr>
                <td><b>Email: </b></td>
                <td><span id="email"></span>{{$data_get->email}}</td>
              </tr>
              <tr>
                <td><b>Hak Akses: </b></td>
                <td><span id="hakAkses"></span>{{$data_get->hakAkses}}</td>
              </tr>
              <tr>
                <td><b>ID Pegawai: </b></td>
                <td><span id="id_pegawai"></span>{{$data_get->id_pegawai}}</td>
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
    @foreach($datauser as $data_get)
    <div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form id="myForm-edit-user<?php echo $data_get->id; ?>" action="{{ route('tb-user-edit', ['id' => $data_get->id]) }}" method="POST">
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header backgroud-thead">
              <h5 class="modal-title" id="exampleModalLabel">Edit User </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-sm">

                <tr>
                  <td><b>ID </b></td>
                  <td><input type="text" disabled name="id" value=" {{$data_get->id}}"> </td>
                </tr>
                <tr>
                  <td><b>Nama </b></td>
                  <td><input type="text" name="name" value=" {{$data_get->name}}"> </td>
                </tr>
                <tr>
                  <td><b>Email </b></td>
                  <td><input type="text" name="email" value=" {{$data_get->email}}"> </td>
                </tr>
                <tr>
                  <td><b>Hak Akses </b></td>
                  <td><input type="text" name="hakAkses" value=" {{$data_get->hakAkses}}"> </td>
                </tr>
                <tr>
                  <td><b>ID Pegawai </b></td>
                  <td><input type="text" name="id_pegawai" value=" {{$data_get->id_pegawai}}"> </td>
                </tr>

              </table>
            </div>
            <div class="modal-footer">
              <button type="sumbit" class="btn btn-primary" id="edit-user<?php echo $data_get->id; ?>">Simpan</button>
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- edit user  -->
    <script>
      $(document).on('click', '#edit-user<?php echo $data_get->id; ?>', function(e) {
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
            $('#myForm-edit-user<?php echo $data_get->id; ?>').submit();
          }
        });
      });
    </script>
    <!-- akhir edit user  -->

    @endforeach
    <!-- akhir edit -->
  </div>
</div>

<script type="text/javascript">
  $('.name').select2({
    placeholder: 'Pilih Nama',
    ajax: {
      url: '/autocomplete_user',
      dataType: 'json',
      delay: 250,
      processResults: function(data) {
        return {
          results: $.map(data, function(item) {
            return {
              id: item.name,
              text: item.name
            }
          })
        };
      },
      cache: true
    }
  });
</script>
@endsection