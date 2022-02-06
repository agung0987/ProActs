@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h4>Tambah Kategori</h2>
                        </li>
                    </ol>
                    <!-- form -->
                    <form id="myForm-tambah-kategori" action="/kategori-tambah" method="post">
                        @csrf
                        <div class="mb-3 row" >
                            <label for="inputkategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10" >
                                <input class="inputkategori form-control" name="kategori"></input>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="tambah-kategori" style="justify-content:right; float:right"><b>Simpan</b></button>

                        <!-- tutup form -->
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection