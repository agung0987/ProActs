@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')
<!-- @if(session('sukses'))
<div class="alert alert-success" role="alert">
  {{session('sukses')}}
</div>
@endif -->

<div class="container">
  <div class="row">
    <div class="col-6">
      <h3>Periode Nilai</h3>
    </div>
    <div class="col-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn btn-sm " data-bs-toggle="modal" data-bs-target="#Tambah">
        <th>
          Tambah Periode Nilai
        </th>
      </button>
    </div>

    <br>
    <table class="table table-striped table-hover">
      <tr>
        <th>Tahun</th>
        <th>Periode</th>
        <th>Bulan</th>
        <th>Tgl Mulai</th>
        <th>Tgl Tutup</th>
        <th>Status</th>
        <th></th>
        <th>Opsi</th>
      </tr>

      @forelse($data as $upt)
      <tr>
        <td>{{$upt ->tahun}}</td>
        <td>{{$upt ->periode}}</td>
        <td>{{$upt ->bulan}}</td>
        <td>{{$upt ->tgl_mulai}}</td>
        <td>{{$upt ->tgl_tutup}}</td>
        @if ($upt ->status == 0)
        <td>Tutup</td>
        @else
        <td>Terbit</td>
        @endif
        <td>
        <td><a href="/periode/edit/{{ $upt->id }}" class="btn btn-warning btn-sm"> Edit</a>
          <!-- <button onclick="return confirm('yakin ingin dihapus ?')"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete">
  Delete
</button> -->
          <!-- <form action = "/periode/delete/{{ $upt->id }}" method = "GET"> -->
          <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $upt->id }}"> Delete</a>
          <!-- <button type="button" class="btn btn-primary btn btn-sm " data-bs-toggle="modal" data-bs-target="#delete">
  Delete
</button> -->
          </form>
        </td>
        @endforeach
        </select>
        <!-- class = "btn btn-danger btn-sm"onclick="return confirm('yakin ingin dihapus ?')" -->

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
<!-- modal delete -->


<!-- Modal -->
<div class="modal fade" id="delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin Untuk Menghapus ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Periode Nilai</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="/periode/tambah" method="POST">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun:</label>
            <select name="tahun" id="tahun">
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
            </select>
          </div>
          <form>
            <div class="form-group">
              <label>Periode:</label>
              <select name="periode" id="periode">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Bulan</label>
              <input name="bulan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bulan">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tgl Mulai</label>
              <input name="tgl_mulai" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tgl Mulai">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tgl Tutup</label>
              <input name="tgl_tutup" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tgl Tutup">
            </div>
            <div class="form-group">
              <label>Status:</label>
              <select name="status" id="status">
                <option value="1">Terbit</option>
                <option value="0">Tutup</option>
              </select>
            </div>
            <!-- <div class="form-group">
    <label for="exampleFormControlTextarea1">Catatan</label>
    <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div> -->


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection