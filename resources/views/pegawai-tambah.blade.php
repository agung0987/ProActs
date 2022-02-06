@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')


<section class="bodytabel">


<div class="container-sm">
    <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-primary">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Tambah Pegawai</h2>
                        </li>
                    </ol>

<table>
                <form action="{{ route('tmbh_pegawai') }}" id="myForm-tambah-pegawai" method="post">
                    @csrf
                    <tr style="height: 50px;">
                        <td><label for="nip" class="form-label">NIP</label></td>
                        <td><input type="text" name="nip" class="form-control" id="nip" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label for="exampleInputEmail1" class="form-label">Nama</label></td>
                        <td><input type="text" name="nama"  class="form-control" id="nama" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label for="ttl" class="form-label">Tanggal Lahir</label></td>
                        <td><input type="date" name="TTL" class="form-control" id="ttl" aria-describedby="emailHelp"></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label class="form-label">Pendidikan</label></td>
                        <td><select name="pendidikan" class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option value="1">SMA / SLTA</option>
                            <option value="2">D1</option>
                            <option value="3">D2</option>
                            <option value="2">D3</option>
                            <option value="3">D4</option>
                            <option value="3">S1</option>
                            <option value="2">S2</option>
                            <option value="3">S3</option>
                        </select></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label class="form-label">Gender</label></td>
                        <td><select name="gender" class="form-select" aria-label="Default select example">
                            <option  selected>-</option>
                            <option  value="L">Laki-Laki</option>
                            <option  value="P">Perempuan</option>
                        </select></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label class="form-label">Jabatan</label></td>
                        <td><select id= "id_jabatan"name="id_jabatan" class="form-control select1">
                            <option selected>--pilih--</option>
                            @foreach($datajab as $datas_get)
                                <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label class="form-label">UPT</label></td>
                        <td><select id= "id_upt"name="id_upt" class="form-control select1">
                            <option selected>--pilih--</option>
                            @foreach($dataupt as $datas_get)
                                <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label  for="exampleInputPassword1" class="form-label">Wilayah</label></td>
                        <td><select id= "id_wilayah"name="id_wilayah" class="form-control select1">
                            <option selected>--pilih--</option>
                            @foreach($datawil as $datas_get)
                                <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label for="exampleInputPassword1" class="form-label">No telp</label></td>
                        <td><input type="text" id="phone" class="form-control" name="no_telp" ></td>
                    </tr>
                    <tr style="height: 50px;">
                        <td><label for="id_atasan" class="form-label">Atasan</label></td>
                        <td><select id= "id_atasan"name="id_atasan" class="form-control select1">
                            <option selected>--pilih--</option>
                            @foreach($dataatasan as $datas_get)
                                <option value="{{ $datas_get->id }}">{{ $datas_get->nama }}</option>
                            @endforeach
                        </select></td>
                    </tr>
                    <td><button type="submit" class="btn btn-primary" id="tambah-pegawai" >Simpan</button></td>
                </form>

            </div>
        </div>
    </div>
</section>


@endsection