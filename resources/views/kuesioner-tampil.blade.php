@extends('dashboard')

@section('content')
<!-- template table -->
<!--awal template -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
@php
    $uri = $_SERVER['REQUEST_URI'];
    $_token = isset($_GET['_token']) ? $_GET['_token'] : 'A5zdQSXRGtRTeQ7KOPN3KneARIhAxsPhDz83XeAt';
    echo $_token;
    $_limit = isset($_GET['limit']) ? $_GET['limit'] : '1';
    $_nama = isset($_GET['nama']) ? $_GET['nama'] : 'kosong';
    $halskrng = $limit;
    $halakhir = $datas;

    $next = "kuesioner?nama=$_nama&limit=".($halskrng+1);
    $prev = "kuesioner?nama=$_nama&limit=".($halskrng-1);
@endphp


<section class="bodytabel">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
      <div class="container-sm">
        <div class="table-responsive">
          <table>
            <h2 class="judul pt-2"><b>Data kuesioner</b></h2>
            <form action="/kuesioner">
              <div class="row">
                <div class="col-md-1">
                  <label class="judul" for="cars2"><b>Nama</b></label>
                </div>
                <div class="col-md-4">
                  <div class="input-group input-group-sm mb-3">
                    <select class="name form-control" style="width: 300%;" name="nama"></select>
                    <input type="hidden" name="limit" value=1>
                  </div>
                </div>
              </div>
              <td><button type="submit" class="btn blue btn-success float-left">Cari</button></td>
            </form>
          </table>
          
            <a href="/view/kuesionertambah" class="btn btn-success mb-2" style="float: right;"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Kategori</span></a>

        <table class="table table-striped table-hover rounded  ">
            <thead class="backgroud-thead">
                <tr>
                    <td><b> #</b></td>
                    <td><b>Indikator</b></td>
                    <td><b>Kategori Id</b></td>
                    <td><b>Bobot</b></td>
                    <td><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($Data as $data_get)

                <tr>

                    <td>@php $no = 1; @endphp
                        {{ $loop->index+1 }}
                    </td>

                    <td>
                        {{$data_get->indikator}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->indikator}}"></input> -->
                    </td>
                    <td>
                        {{$data_get->kategori_id}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->kategori_id}}"></input> -->
                    </td>
                    <td>
                        {{$data_get->bobot}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->bobot}}"></input> -->
                    </td>
                    <td style="width: 3rem;">
                        <div class="d-flex">
                            <div class="dropdown me-1">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                                    <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                                    <li><a class="btn btn-default btn-xs delete_kuesioner" data-id="{{$data_get->id}}" href="#">Hapus</a></li>
                                    <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a></li>
                                </ul>
                            </div>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div style="justify-content:center;display: flex; justify-content: center;">
                            <nav aria-label="Page navigation example" style="color:#ddd;">
                                <ul class="pagination">
                                    @if($datas == 0 )
                                    <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
                                    @elseif(app('request')->input('limit') == 1 && app('request')->input('limit') < $datas) <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="{{url($next)}}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        @elseif(app('request')->input('limit') > 1 && app('request')->input('limit') < $datas) <li class="page-item">
                                            <a class="page-link" href="{{url($prev)}}" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="{{url($next)}}" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                            @elseif(app('request')->input('limit') == 1 && $datas == 1)

                                            @elseif(app('request')->input('limit') == $datas )
                                            <li class="page-item">
                                                <a class="page-link" href="{{url($prev)}}" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">{{ app('request')->input('limit') }}</a></li>
                                            @endif
                                </ul>
                            </nav>
                        </div>
    </div>
</div>
</div>
</section>

<script type="text/javascript">
    $('.name').select2({
        placeholder: 'Pilih Nama',
        ajax: {
            url: '/autocomplete_kuesioner',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.indikator,
                            text: item.indikator
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

      <!-- akhir template -->




      <!-- akhir template -->
      @foreach($Data as $data_get)
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
                  <td><span id="id"></span>{{$data_get->id}}</td>
                </tr>
                <tr>
                  <td style="width: 130px;"><b>ID Kategori </b></td>
                  <td><span id="kategori_id"></span> {{$data_get->kategori_id}}</td>
                </tr>
                <tr>
                  <td><b>Indikator </b></td>
                  <td><span id="indikator"></span> {{$data_get->indikator}}</td>
                </tr>
                <tr>
                  <td><b>Bobot: </b></td>
                  <td><span id="bobot"></span>{{$data_get->bobot}}</td>
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
      @foreach($Data as $data_get)
      <div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="#myForm-edit-kuesioner<?php echo $data_get->id; ?>" action="{{ route('kuesioner.edit', ['id' => $data_get->id]) }}" method="POST">
          @csrf
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header backgroud-thead">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kuesioner </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-sm">

                  <tr>
                    <td><b>ID </b></td>
                    <td><input  disabled class="form-control" type="text" name="id" value=" {{$data_get->id}}"> </td>
                  </tr>
                  <tr>
                    <td><b>Id Kategori </b></td>
                    <td><input type="text"  class="form-control" name="kategori_id" value=" {{$data_get->kategori_id}}"> </td>
                  </tr>
                  <tr>
                    <td><b>Indikator </b></td>
                    <td><textarea type="text"  class="form-control" name="indikator" value="{{$data_get->indikator}}">{{$data_get->indikator}}</textarea> </td>
                  </tr>
                  <tr>
                    <td><b>Bobot </b></td>
                    <td><input type="text" class="form-control" name="bobot" value=" {{$data_get->bobot}}"> </td>
                  </tr>

                </table>
              </div>
              <div class="modal-footer">
                <button type="sumbit" class="btn btn-success" id="edit-kuesioner<?php echo $data_get->id; ?>">Simpan</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              </div>
            </div>
          </div>
        </form>
      </div>

      <!-- edit kuesioner  -->
<script>
  $(document).on('click', '#edit-kuesioner<?php echo $data_get->id; ?>', function(e) {
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
    $('#myForm-edit-kuesioner<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit kuesioner  -->

      @endforeach
      <!-- akhir edit -->
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {

    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
    });

    function fetch_data(page) {
      $.ajax({
        url: "/kuesioner/pagination?page=" + page,
        success: function(data) {
          $('#table_data').html(data);
        }
      });
    }

  });
</script>

@endsection