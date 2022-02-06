@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
    <section class="bodytabel">


<div class="container-sm">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-3 judul">
                        <h2> <b>Data Jabatan</b></h2>
                    </div>

                    <div class="col-sm-9">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#tambahJab" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Jabatan</span></a>
                    </div>


                </div>
            </div>
            <table class="table table-striped table-hover rounded  ">
                <thead class="backgroud-thead">
                    <tr>
                        <td style="width: 30%"><b>ID</b></td>
                        <td style="width: 40%"><b>Nama</b></td>
                        <td style="width: 25%"><b>Action</b></td>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach($data as $data_get)

                    <tr>
                        <td>
                        @php $no = 1; @endphp
                        {{ $loop->index+1 }}
                        </td>



                        <td>
                            {{ $data_get->nama }}
                            <!-- <input name="users_id[]" value="{{  $data_get->users_id }}"></input> -->

                        </td>
                        <td style="width: 3rem;">
                            <div class="d-flex">
                                <div class="dropdown me-1">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split fs-6" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                                        
                                            <li><a class="btn btn-default btn-xs delete_jabatan" 
                                            data-id ="{{ $data_get->id }}"href="#">Hapus</a></li>
                                        
                                        <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a></li>
                                    </ul>
                                </div>

                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>{{ $data->perPage() }}</b> out of <b>{{ $data->total() }} </b> entries</div>
                {{$data->links()}}
            </div>
        </div>
    </div>
</div>
</section>


<!-- modal detail -->
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
                    <td> <b>ID</b></td>
                    <td><span id="nama"></span>{{$data_get->id}}</td>
                </tr>
                <tr>
                    <td> <b>Nama</b></td>
                    <td><span id="ttl"></span>{{$data_get->nama}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
@endforeach
<!-- akhir modal detail -->

<!-- edit -->
@foreach($data as $data_get)
<div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header backgroud-thead">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bacground-body-modal">
            <form id="myForm-edit-jabatan<?php echo $data_get->id; ?>" action="{{ route('dtjb-edit', ['id' => $data_get->id]) }}"  method="POST">
                @csrf
                <table>

                    <tr style="width: 100%; height: 50px;">
                        <td><b>ID </b></td>
                        <td><input style="width: 178%" type="text" class="form-control" disabled name="id" value=" {{$data_get->id}}"> </td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td> <b>Nama &nbsp; &nbsp; &nbsp; &nbsp;</b></td>
                        <td><input style="width: 178%" type="text" class="form-control" name="nama" value="{{$data_get->nama}}"></td>
                    </tr>

                </table>
            
            <div class="modal-footer bacground-body-modal" style="border: none;" >
                <button type="sumbit" class="btn btn-primary" id="edit-jabatan<?php echo $data_get->id; ?>" >Simpan</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- edit jabatan  -->
<script>
  $(document).on('click', '#edit-jabatan<?php echo $data_get->id; ?>', function(e) {
    e.preventDefault();
    console.log(<?php echo $data_get->id; ?>);
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
    $('#myForm-edit-jabatan<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit jabatan  -->

@endforeach
<!-- akhir edit -->


<!-- Modal tambah jabatan -->
<div class="modal fade" id="tambahJab" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <form action="{{route('dtjb-tambah')}}" id="myForm-tambah-jabatan" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header backgroud-thead">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bacground-body-modal">
            <table>
                    <td><b>Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </b></td>
                    <td><input type="text" style="width: 178%" name="nama" class="form-control" id="exampleFormControlInput1"></td>
            </table>
            </div>
            <div class="modal-footer bacground-body-modal" style="border: none;" >
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary" id="tambah-jabatan">Simpan</button>
            </div>
        </div>
    </form>
</div>
</div>
<!-- ./Modal tambah jabatan -->

    </div>
</div>


@endsection