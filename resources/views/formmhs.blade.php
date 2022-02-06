@extends('dashboard')

@section('content')


<section class="container">
    <div class="card" style="padding-left: 2rem; padding-right:2rem;">
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
        <fieldset>
            <legend>Login</legend>
            <p>
                <label>Nim:</label>
                <input type="text" name="nim" />
            </p>
            <p>
                <label>Nama:</label>
                <input type="text" name="nama" />
            </p>
            <p>
                <label>Alamat:</label>
                <input type="text" name="alamat" />
            </p>
            <p>
                <label>Kelamin:</label>
                <input type="radio" name="Kelamin" value="L" /> Laki-Laki
                <input type="radio" name="Kelamin" value="P" />Perempuan
            </p>
            <p>
                <label>Tanggal lahir:</label>
                <input type="date" name="tgl_lahir" />
            </p>
            <p>
                <label>Hoby:</label>
                <input type="checkbox" name="hoby[]" value="Menari" /> Menari
                <input type="checkbox" name="hoby[]" value="Sepak Bola" />Sepak Bola
                <input type="checkbox" name="hoby[]" value="Berenang" /> Berenang
                <br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                <input type="checkbox" name="hoby[]" value="Nonton Film" />Nonton Film
                <input type="checkbox" name="hoby[]" value="Travelling" />Travelling
                <input type="checkbox" name="hoby[]" value="Bermain Musik" /> Bermain Musik
            </p>
            <p>
                <label>Email:</label>
                <input type="email" name="Email" />
            </p>
            <p>
                <label>IPK:</label>
                <input type="text" name="ipk" />
            </p>
            <p>
                <label>fakultas:</label>
                <select name="fakultas" class="form-control select1">
                    <option value="">--Pilih--</option>
                    <option value="teknik"> teknik</option>
                    <option value="Ekonom"> Ekonomi</option>
                    <option value="Kedokteran"> Kedokteran</option>
                </select>
            </p>
            <p>
                <label>Prodi:</label>
                <select name="prodi" class="form-control select2">
                    <option value="">--Pilih--</option>
                    <option value="Teknik Informatika"> Teknik Informatika</option>
                    <option value="Hukum Pidana"> Hukum Pidana</option>
                    <option value="dokter"> dokter</option>
                </select>
            </p>
            <div class="mb-3">
                <label for="foto" class="form-label">Upload Foto</label>
                <input class="form-control" type="file" name="file" id="formFile">
            </div>
            <button type="submit">simpan</button>
        </fieldset>
    </form>
    </div>
</section>





@endsection



