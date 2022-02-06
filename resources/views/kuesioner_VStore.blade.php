@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h4>Tambah Kuesioner</h4>
                        </li>
                    </ol>
                    <!-- form -->

                    <form id="myForm-tambah-kuesioner" action="/kuesionertambah" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="inputIndikator" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori_id" class="form-select" aria-label="Default select example">
                                    @foreach($data as $data_get)
                                    <option value="{{ $data_get->id }}">{{ $data_get->kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputIndikator" class="col-sm-2 col-form-label">indikator</label>
                            <div class="col-sm-10">
                                <input class="inputkategori form-control" name="indikator"></input>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="inputIndikator" class="col-sm-2 col-form-label">Bobot</label>
                            <div class="col-sm-10">
                                <input class="inputkategori form-control" type="number" name="bobot">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputstatus" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" type="number" class="form-select" aria-label="Default select example">
                                    <option value=1>Atasan</option>
                                    <option value=2>Sejawat</option>
                                    <option value=3>Bawahan</option>
                                    <option value=4>Diri Sendiri</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="tambah-kuesioner" style="justify-content:right; float:right"><b>Simpan</b></button>

                        <!-- tutup form -->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection