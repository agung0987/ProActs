@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')


<div id="layoutSidenav">
    <div id="layoutSidenav_content">

        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-2" style="width: 700px; padding:3rem; ">
                    <ol class="breadcrumb mb-4 justify-content-center bg-success">
                        <li class="breadcrumb-item active" style="color: white;">
                            <h2>Tambah Data Periode Peniaian</h2>
                        </li>
                    </ol>
<table>
                <form action="{{ route('periode-store') }}" id="myForm-tambah-periode" method="post">
                    @csrf
                    <tr style="height: 50px;">
                        <td><label for="tahun" class="form-label">Tahun</label></td>
                        <td><select name="tahun" class="form-select" id="tahun">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select></td>
                    </td>
                    <tr style="height: 50px;">
                        <td><label for="periode" class="form-label">Periode</label></td>
                        <td><select name="periode"   class="form-select" id="periode">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select></td>
                    </td>
                    <tr style="height: 50px;">
                        <td><label for="bulan" class="form-label">Bulan</label></td>
                        <td><input type="text" name="bulan" class="form-control" id="bulan" aria-describedby="emailHelp"></td>
                    </td>
                    <tr style="height: 50px;">
                        <td><label for="tgl_mulai" class="form-label">Tgl Mulai</label></td>
                        <td><input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" aria-describedby="emailHelp"></td>
                    </td>
                    <tr style="height: 50px;">
                        <td><label for="tgl_tutup" class="form-label">Tgl Tutup</label></td>
                        <td><input type="date" name="tgl_tutup" class="form-control" id="tgl_tutup" aria-describedby="emailHelp"></td>
                    </td>
                    <tr style="height: 50px;">
                        <td><label class="form-label">Status</label></td>
                        <td><select name="status" class="form-select" id="status">
                            <option value="1">Terbit</option>
                            <option value="0">Tutup</option>
                         </select></td>
                    </tr>
                    <tr style="height: 50px;">
                    <td><button type="submit" class="btn btn-success" id="tambah-periode">Simpan</button></td>
                    </tr>
                </form>
</table>
            </div>
        </div>
    </div>
</div>
</div>


@endsection