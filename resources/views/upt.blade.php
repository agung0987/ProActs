@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')
<div class="upt" style="padding-top: 100px;">


    <div class="container">

    <h1>aku coba </h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Tlp</th>
                <th>Id Wilayah</th>
                <th></th>
                <th>Opsi</th>
            </tr>

            @forelse($data as $upt)
            <tr>
                <td>{{$upt ->kode}}</td>
                <td>{{$upt ->nama}}</td>
                <td>{{$upt ->alamat}}</td>
                <td>{{$upt ->email}}</td>
                <td>{{$upt ->no_tlp}}</td>
                <td>{{$upt ->id_wilayah}}</td>
                <td>
                <td><a href="/upt/edit/{{ $upt->id }}" class="btn btn-warning btn-sm"> Edit</a>
                    <a href="/upt/delete/{{ $upt->id }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin ingin dihapus ?')"> Delete</a>
                </td>
                @endforeach
                </select>

            </tr>

        </table>
        <br>
        Halaman : {{ $data->currentPage() }} <br>
        Jumlah Data : {{ $data->total() }} <br>
        Data Per Halaman : {{ $data->perPage() }} <br>
        <td>
            {{-- $data->links() --}}
        </td>
    </div>
</div>
</div>
</div>


@endsection