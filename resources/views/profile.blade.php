@extends('dashboard2')

@section('content')
<!--awal template -->
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 90%; height:90%; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Profile</h2>
                        </li>
                    </ol>
                    @foreach($datauser as $data_get)
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPeriode">NIP</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->nip}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">

                            <label for="inputPegawaiPenilai">Nama</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->nama}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">

                            <label for="inputPegawaiDinilai">Tanggal Lahir</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->TTL}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">

                            <label for="inputStatus">Pendidikan</label>
                        </div>
                        <div class="col-md-6">
                            <select disabled class="form-control" >
                                <option {{$data_get->pendidikan == 1? 'selected' : '' }} >SMA / SLTA</option>
                                <option {{$data_get->pendidikan == 2? 'selected' : '' }} >D1</option>
                                <option {{$data_get->pendidikan == 3? 'selected' : '' }} >D2</option>
                                <option {{$data_get->pendidikan == 4? 'selected' : '' }} >D3</option>
                                <option {{$data_get->pendidikan == 5? 'selected' : '' }} >D4</option>
                                <option {{$data_get->pendidikan == 6? 'selected' : '' }} >S1</option>
                                <option {{$data_get->pendidikan == 7? 'selected' : '' }} >S2</option>
                                <option {{$data_get->pendidikan == 8? 'selected' : '' }} >S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">

                            <label for="inputPegawaiDinilai">Gender</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->gender}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPegawaiDinilai">Jabatan</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->jabatan}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPegawaiDinilai">UPT</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->upt}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPegawaiDinilai">Wilayah</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->wilayah}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPegawaiDinilai">No_Tlp</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->no_telp}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="inputPegawaiDinilai">Atasan</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->atasan}}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
</div>

@endsection