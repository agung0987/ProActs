@extends('dashboard')

@section('content')

@php
$uri = $_SERVER['REQUEST_URI'];
$_token = isset($_GET['_token']) ? $_GET['_token'] : 'A5zdQSXRGtRTeQ7KOPN3KneARIhAxsPhDz83XeAt';
echo $_token;
$_limit = isset($_GET['limit']) ? $_GET['limit'] : '1';
$_nama = isset($_GET['nama']) ? $_GET['nama'] : 'kosong';

$halskrng = $limit;
$halakhir = $datas;

$next = "tb-wilayah?nama=$_nama&limit=".($halskrng+1);
$prev = "tb-wilayah?nama=$_nama&limit=".($halskrng-1);
@endphp

<!-- <form action="">

</form> -->

<section class="bodytabel">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-sm">
                <div class="table-responsive">
                    <table>
                        <h2 class="judul pt-2"><b>Data Wilayah</b></h2>
                        <form action="/tb-wilayah">
                            <div class="row">
                                <div class="col-md-1">
                                    <label class="judul" for="cars2"><b>Nama</b></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-sm mb-3">
                                        <select class="cari form-control" style="width: 300%;" required name="nama"></select>
                                        <input type="hidden" name="limit" value=1>
                                    </div>
                                </div>
                            </div>
                            <td><button type="submit" class="btn blue btn-success float-left">Cari</button></td>
                        </form>
                    </table>

                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambahwil" class="btn btn-success mb-2" style="float: right;"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Wilayah</span></a>
                    <!-- <a href="#" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to Excel</span></a> -->

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
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                                                <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                                                <li><a class="btn btn-default btn-xs delete_wilayah" href="#" data-id="{{$data_get->id}}">Hapus</a>
                                                </li>
                                                <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a>
                                                </li>
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
<div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('dtwl-edit', ['id' => $data_get->id]) }}" id="myForm-edit-wilayah<?php echo $data_get->id; ?>" method="POST">
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
                    <button type="sumbit" class="btn btn-success" id="edit-wilayah<?php echo $data_get->id; ?>">Simpan</button>
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
        <form action="{{route('dtwl-tambah')}}" id="myForm-tambah-wilayah" method="post">
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
                    <button type="submit" class="btn btn-success" id="tambah-wilayah">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ./Modal tambah jabatan -->


</div>
</div>


<script type="text/javascript">
    $('.cari').select2({
        placeholder: 'Pilih Nama',
        ajax: {
            url: '/autocomplete_wilayah',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.nama,
                            text: item.nama
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection