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
            <div class="d-flex justify-content-center mb-5">
                <div class="card mt-2" style="width: 90%; height:90%; padding:3rem; ">
                    <div style="height:40px;" class="mb-3">
                        <a href=" /lap_per_pegawai/cetak_pdf" style="float: right" class="btn btn-danger">
                            CETAK PDF<i class="bi bi-file-earmark-pdf"></i></a>
                        <a href=" /export_lap_per_pegawai" style="float: right; margin-right:5px;" class="btn btn-success ">EXPORT EXCEL<i class="bi bi-file-earmark-excel"></i> </a>
                    </div>
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Laporan Penilaian</h2>
                        </li>
                    </ol>
                    @foreach($datauser as $data_get)

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPeriode">Tahun</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->tahun}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPeriode">Bulan</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->bulan}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPeriode">Periode</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->periode}}">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">

                            <label for="inputPegawaiPenilai">Nip</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->nip}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">

                            <label for="inputPegawaiDinilai">Nama</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->nama}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputStatus">Pendidikan</label>
                        </div>
                        <div class="col-md-9">
                            <select disabled class="form-control">
                                <option {{$data_get->pendidikan == 1? 'selected' : '' }}>SMA / SLTA</option>
                                <option {{$data_get->pendidikan == 2? 'selected' : '' }}>D1</option>
                                <option {{$data_get->pendidikan == 3? 'selected' : '' }}>D2</option>
                                <option {{$data_get->pendidikan == 4? 'selected' : '' }}>D3</option>
                                <option {{$data_get->pendidikan == 5? 'selected' : '' }}>D4</option>
                                <option {{$data_get->pendidikan == 6? 'selected' : '' }}>S1</option>
                                <option {{$data_get->pendidikan == 7? 'selected' : '' }}>S2</option>
                                <option {{$data_get->pendidikan == 8? 'selected' : '' }}>S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">

                            <label for="inputPegawaiDinilai">Gender</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->gender}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai">Jabatan</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->jabatan}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai">UPT</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->upt}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai">Wilayah</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->wilayah}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai">Total</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->total}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai"> Transformational Leadership</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->sub1}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai"> Affective Commitment</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->sub2}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai"> General Self Efficacy as Job Self Efficacy</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->sub3}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai"> Job Satisfaction</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->sub4}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="inputPegawaiDinilai"> Organizational Citizenship Behavior (OCB)</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" disabled class="form-control" id="inputPeriode" value="{{$data_get->sub5}}">
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