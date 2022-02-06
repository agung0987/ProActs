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
            <div class="col-sm-5 judul">
              <h2> <b>Data Periode Penilaian</b></h2>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
          <thead class="backgroud-thead">
            <tr>
              <td><b>#</b></td>
              <td><b>Tahun</b></td>
              <td><b>Periode</b></td>
              <td><b>Bulan</b></td>
              <td><b>Aksi</b></td>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $data_get)

            <tr>
              <td>
                {{$data_get->id}}
              </td>



              <td>
                {{ $data_get->tahun }}
              
              </td>
              <td>
                {{ $data_get->periode }}
              
              </td>
              <td>
                {{ $data_get->bulan }}
              
              </td>
              <td style="width:3rem" >
             <form action="/Proses" id="myForm-proses">
               <input type="hidden" name="_id_periode" value="{{ $data_get->id}}"></input>
               <button class = "btn btn-warning btn-sm" type="submit" style="color: black" id="Proses">Proses</button>
             </form>
              
               
                
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