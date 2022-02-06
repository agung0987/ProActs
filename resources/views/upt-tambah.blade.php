@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<section class="bodytabel">
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
    <div class="container">
        <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem;">
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Tambah Data UPT</h2>
                        </li>
                    </ol>

            <table>
                <form action="{{ route('tb-upt-tambah') }}" id="myForm-tambah-upt" method="post">
                    @csrf
                    <tr style="width: 100%; height: 50px;">
                        <td><label class="form-label">Kode</label></td>
                        <td><input type="text" name="kode" class="form-control" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td><label for="nama" class="form-label">Nama</label></td>
                        <td><input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td><label for="alamat" class="form-label">Alamat</label></td>
                        <td><input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td><label for="email" class="form-label">Email</label></td>
                        <td><input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td><label for="no_telp" class="form-label">No Tlp</label></td>
                        <td><input type="text" name="no_telp" class="form-control" id="no_telp" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="width: 100%; height: 50px;">
                        <td><label class="form-label">Wilayah</label></td>
                        <td><select id= "id_wilayah"name="id_wilayah" class="form-control select1">
                        <option selected>--pilih--</option>
                        @foreach($datas as $datas_get)
                          <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                        @endforeach
                        </select></td>
                    </tr>
                    <tr style="width: 100%; height: 10px;">
                    </tr>
                    </table>
                  <div style="width: 100%;"> 
                    <button type="submit" class="btn btn-primary" style="justify-content:right; float:right" id="tambah-upt">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div> 
</section>

@endsection