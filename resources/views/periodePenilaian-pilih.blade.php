@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')  
<section class="bodytabel">

<div id ="layoutSidenav">
    <div id ="layoutSidenav_content">
  <div class="container-sm">
    <div class="table-responsive">
      <div class="table-wrapper mb-5">
        <div class="table-title ">
          <div class="row">
            <div class="col-sm-7 judul">
              <h2><b> Data Periode Penilaian</b></h2>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
          <thead class="backgroud-thead">
            <tr>
              <td><b>ID</b></td>
              <td><b>Tahun</b></td>
              <td><b>Periode</b></td>
              <td><b>Bulan</b></td>
              <td><b>Status</b></td>
              <td><b>Aksi</b></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data_get)

            <tr>
            <td>
                {{ $data_get->id }}
              
              </td>

              <td>
                {{ $data_get->tahun }}
              
              </td>
              <td>
                {{ $data_get->periode }}
              
              </td>
              <td>
              @if($data_get->bulan == 1 )
                    Januari
                    @elseif ($data_get->bulan == 2 )
                    Februari
                    @elseif ($data_get->bulan == 3 )
                    Maret
                    @elseif ($data_get->bulan == 4 )
                    April
                    @elseif ($data_get->bulan == 5 )
                    Mei
                    @elseif ($data_get->bulan == 6 )
                    Juni
                    @elseif ($data_get->bulan == 7 )
                    Juli
                    @elseif ($data_get->bulan == 8 )
                    Agustus
                    @elseif ($data_get->bulan == 9 )
                    September
                    @elseif ($data_get->bulan == 10 )
                    Oktober
                    @elseif ($data_get->bulan == 11 )
                    November
                    @elseif ($data_get->bulan == 12 )
                    Desember


                    @endif

              </td>
              @if ($data_get ->status == 0)
              <td>Tutup</td>
              @else
              <td>Terbit</td>
              @endif
              <td>
              @if ($data_get ->status == 1)
              <form action="{{url('/pegawai-pilih')}}">
                @csrf
                <input type="hidden" name="periode" value="{{$data_get->id}}">
                <button class = "btn btn-warning btn-sm col-4" type="submit" style="color: black">Nilai</button>
                </form>
              @else
                <a href="" class = "btn btn-danger btn-sm col-4" style="color: white">Lihat</a>
              @endif
              </td>
            @endforeach
            </tr>
    </tbody>
</table>

    </div>
    </div>
</div>
</section>
@endsection