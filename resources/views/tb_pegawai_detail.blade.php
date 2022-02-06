@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')


<section class="bodytabel">


    <div class="container-sm">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-3">
                            <h2> Tabel <b> Pegawai</b></h2>
                        </div>


                    </div>
                </div>


                @foreach($data as $data_get)               
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP: </label>
                        <input type="text" name="nip" class="form-control" id="nip" value="{{$data_get->[$data_get->id]nama}}"aria-describedby="emailHelp">
                    </div>
                    @endforeach
                    <!-- <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="ttl" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="TTL" class="form-control" id="ttl" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pendidikan</label>
                        <select name="pendidikan" class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option value="1">SMA / SLTA</option>
                            <option value="2">D1</option>
                            <option value="3">D2</option>
                            <option value="2">D3</option>
                            <option value="3">D4</option>
                            <option value="3">S1</option>
                            <option value="2">S2</option>
                            <option value="3">S3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                            <option  selected>-</option>
                            <option  value="P">Laki-Laki</option>
                            <option  value="L">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Jabatan</label>
                        <select name="id_jabatan" class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option  value="1">Direktur</option>
                            <option  value="2">Manajer</option>
                            <option  value="3">Sek Direktur</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID UPT</label>
                        <select name="id_upt" class="form-select" aria-label="Default select example">
                            <option  selected>-</option>
                            <option  value="1">One</option>
                            <option  value="2">Two</option>
                            <option  value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label  for="exampleInputPassword1" class="form-label">ID Wilayah</label>
                        <select name="id_wilayah" class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option  value="1">One</option>
                            <option  value="2">Two</option>
                            <option  value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">No telp</label>
                        <input type="tel" id="phone" name="no_telp" >
                    </div>
                    <div class="mb-3">
                        <label for="id_atasan" class="form-label">ID Atasan</label>
                        <select name="id_atasan" class="form-select" aria-label="Default select example">
                            <option selected>-</option>
                            <option  value="1">One</option>
                            <option  value="2">Two</option>
                            <option  value="3">Three</option>
                        </select>
                    </div> -->
                    <button href="http://127.0.0.1:8000/tb-pegawai" type="submit" class="btn btn-primary">bacl</button>
                

            </div>
        </div>
    </div>
</section>


@endsection