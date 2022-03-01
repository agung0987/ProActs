@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<div id="layoutSidenav">
    <div id="layoutSidenav_content">

        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-success">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Pilih Pegawai</h2>
                        </li>
                    </ol>
                    <!-- form -->
                    <form action="{{url('/penilaian')}}">
                        <div class="mb-3 row">
                            <input type="hidden" name="id_periode" value="{{$id_periode}}" class="form-control" id="exampleInputPenilai" aria-describedby="emailHelp" placeholder="Enter email">
                            @foreach($cobacrud as $dataget)
                            <label for="inputPeriode" class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-10">
                                <input type="text" disabled class="form-control" id="inputPeriode" value="{{$dataget->tahun}} / {{$dataget->periode}} / {{$dataget->bulan}}">
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-3 row">
                            @foreach($dtpn as $dataget)
                            <label for="inputPegawaiPenilai" class="col-sm-2 col-form-label">Pegawai Penilai</label>
                            <div class="col-sm-10" style="margin-top: 1rem;">
                                <input type="text" disabled class="form-control" id="inputPegawaiPenilai" value="{{$dataget->nip}} - {{$dataget->nama}}">
                                <input type="hidden" name="id_penilai" value="{{$dataget->id}}">
                            </div>
                            @endforeach
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPegawaiDinilai" class="col-sm-2 col-form-label">Pegawai Dinilai</label>
                            <div class="col-sm-10" style="margin-top: 1rem;">
                                <select class="nip form-control" name="nip" required></select>
                            </div>
                        </div>
                        <div class="mb-3 row" style="margin-top: 1rem;">
                            <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-select" aria-label="Default select example">
                                    <option selected value="1">Atasan</option>
                                    <option value="2">Sejawat</option>
                                    <option value="3">Bawahan</option>
                                    <option value="4">Diri Sendiri</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" style="justify-content:right; float:right"><b>Mulai</b></button>

                        <!-- tutup form -->
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- script Autocomplete -->
<script type="text/javascript">
    $('.nip').select2({
        placeholder: ' NIP ',
        ajax: {
            url: '/autocomplete',
            dataType: 'json',
            delay: 50,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.nip,
                            text: item.nip + " - " + item.nama
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

@endsection