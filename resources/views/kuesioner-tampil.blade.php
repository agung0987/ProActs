@extends('dashboard')

@section('content')
<!-- template table -->
<!--awal template -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<section class="bodytabel">
  <div id="layoutSidenav">
    <div id="layoutSidenav_content">
  
      <div class="container-sm" style="padding-top: 2rem;">
        <div id="table_data">
          @include('pagination_data_kuesioner')
        </div>
      </div>

      <!-- akhir template -->




      <!-- akhir template -->
      @foreach($Data as $data_get)
      <div class="modal fade" id="exampleModal-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header  backgroud-thead">
              <h5 class="modal-title" id="exampleModalLabel">Data Detail </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <table class="table table-sm">
                <tr>
                  <td><b>ID </b></td>
                  <td><span id="id"></span>{{$data_get->id}}</td>
                </tr>
                <tr>
                  <td style="width: 130px;"><b>ID Kategori </b></td>
                  <td><span id="kategori_id"></span> {{$data_get->kategori_id}}</td>
                </tr>
                <tr>
                  <td><b>Indikator </b></td>
                  <td><span id="indikator"></span> {{$data_get->indikator}}</td>
                </tr>
                <tr>
                  <td><b>Bobot: </b></td>
                  <td><span id="bobot"></span>{{$data_get->bobot}}</td>
                </tr>

              </table>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            </div>
          </div>
        </div>
      </div>
      @endforeach


      <!-- edit -->

      <!-- akhir template -->
      @foreach($Data as $data_get)
      <div class="modal fade" id="modaledit-{{$data_get->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="#myForm-edit-kuesioner<?php echo $data_get->id; ?>" action="{{ route('kuesioner.edit', ['id' => $data_get->id]) }}" method="POST">
          @csrf
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header backgroud-thead">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kuesioner </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <table class="table table-sm">

                  <tr>
                    <td><b>ID </b></td>
                    <td><input  disabled class="form-control" type="text" name="id" value=" {{$data_get->id}}"> </td>
                  </tr>
                  <tr>
                    <td><b>Id Kategori </b></td>
                    <td><input type="text"  class="form-control" name="kategori_id" value=" {{$data_get->kategori_id}}"> </td>
                  </tr>
                  <tr>
                    <td><b>Indikator </b></td>
                    <td><textarea type="text"  class="form-control" name="indikator" value="{{$data_get->indikator}}">{{$data_get->indikator}}</textarea> </td>
                  </tr>
                  <tr>
                    <td><b>Bobot </b></td>
                    <td><input type="text" class="form-control" name="bobot" value=" {{$data_get->bobot}}"> </td>
                  </tr>

                </table>
              </div>
              <div class="modal-footer">
                <button type="sumbit" class="btn btn-secondary" id="edit-kuesioner<?php echo $data_get->id; ?>">Simpan</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              </div>
            </div>
          </div>
        </form>
      </div>

      <!-- edit kuesioner  -->
<script>
  $(document).on('click', '#edit-kuesioner<?php echo $data_get->id; ?>', function(e) {
    e.preventDefault();
     Swal.fire({
  title: 'Edit',
  text: "Apakah Kamu Yakin Ingin mengedit Data Tersebut ?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Iya',
  cancelButtonText: 'Tidak'
}).then((result) => {
  if (result.isConfirmed) {
    $('#myForm-edit-kuesioner<?php echo $data_get->id; ?>').submit();
  }
});
   });
</script>
<!-- akhir edit kuesioner  -->

      @endforeach
      <!-- akhir edit -->
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {

    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
    });

    function fetch_data(page) {
      $.ajax({
        url: "/kuesioner/pagination?page=" + page,
        success: function(data) {
          $('#table_data').html(data);
        }
      });
    }

  });
</script>

@endsection