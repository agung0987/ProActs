@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<section class="bodytabel">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div id ="layoutSidenav">
    <div id ="layoutSidenav_content">
  <div class="container-sm ">
    <div class="table-responsive">
      <div class="table-wrapper mb-5">
        <div class="table-title ">
          <div class="row">
            <div class="col-sm-3 judul" style="center">
              <h2><b>IMPORT</b></h2>
            </div>
          </div>
        </div> 
        
        <table class="table table-sm ">
          <tr >
            <td class="judul"><b>Data Pegawai </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
			        IMPORT
		        </button> 
            </td>
          </tr>
          <tr>
            <td class="judul"><b> Data Jabatan </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#Jabatan">
			        IMPORT
		        </button>
            </td>
          </tr>
          <tr>
            <td class="judul"><b> Data Wilayah </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#Wilayah">
			        IMPORT
		        </button>
            </td>
          </tr>
          <tr>
            <td class="judul"><b> Data Upt </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#upt">
			        IMPORT
		        </button>
            </td>
          </tr>
          <tr>
            <td class="judul"><b> Data Kategori </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#kategori">
			        IMPORT
		        </button>
            </td>
          </tr>
		  <tr>
            <td class="judul"><b> Data Kuesioner </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#kuesioner">
			        IMPORT
		        </button>
            </td>
          </tr>
		  <tr>
            <td class="judul"><b> Data Periode Penilaian </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#periode">
			        IMPORT
		        </button>
            </td>
          </tr>
		  <tr>
            <td class="judul"><b> Data User </b></td>
            <td>
                <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#user">
			        IMPORT
		        </button>
            </td>
          </tr>


        </table>




        <!-- Import Excel Tabel Pegawai -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_pegawai" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
        </form>
		</div>
		</div>

    <!-- Import Excel Tabel Jabatan -->
    <div class="modal fade" id="Jabatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_jabatan" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

<!-- Import Excel Tabel Wilayah -->
<div class="modal fade" id="Wilayah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_wilayah" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

    <!-- Import Excel Tabel Upt -->
<div class="modal fade" id="upt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_upt" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

        <!-- Import Excel Tabel Kategori -->
<div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_kategori" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

		  <!-- Import Excel Tabel kuesioner -->
<div class="modal fade" id="kuesioner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_kuesioner" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

			  <!-- Import Excel Tabel Periode Penilaian -->
<div class="modal fade" id="periode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_periode" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>

		 <!-- Import Excel Tabel User -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/import_user" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
          </form>
		</div>
		</div>


      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection