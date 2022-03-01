<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>KEMENKUMHAM</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="{{ url('backend/css/styles.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- cdn toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>



  <!-- autocomplete -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


  <!-- chart -->
  <script src="js/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <title>High Chart</title>
  <!-- @livewireStyles -->

  <!-- paginate
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark shadow bgnavbar">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('/home') }}"><img src="{{asset('img/log.png')}}" style="width: 3rem; height:2.5rem;"><b>KEMENKUMHAM</b></a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <ul class="navbar-nav ms-auto py-4 py-lg-0">
          @guest
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('registrasi') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else


          <!-- Logout -->
          <div class="btn-group me-3">
            <div style="margin-top:8px;  color:white;">
              <h4>{{Auth::user()->name}}</h5>
            </div>
            <button type="button" class="btn dropdown-toggle" style="color:#fff;" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user fa-fw"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="p-1 pl-3 nav-link" id="logout" href="{{ route('logout') }}">
                  <h6 style="color:black">Logout</h6>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </a>
              </li>
            </ul>
          </div>
          <!-- tutup Logout -->
          @endguest
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav ">
            <br>
            <a class="p-1 pl-3 nav-link" style="color:#fff" href="/home">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Dashboard
            </a>
            <br>
            <div class="p-1 pl-3 sb-sidenav-menu-heading">
              <h5>Master Data</h5>
            </div>
            <a class="p-1 pl-3  nav-link {{ Request::is('tb-pegawai') ? 'active' : ''}} " style="color:#fff" href="{{ url('/tb-pegawai') }}">
              <div class="sb-nav-link-icon"><i class="bi bi-person-bounding-box"></i></div>
              Data Pegawai
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('tb-jabatan') ? 'active' : ''}}" style="color:#fff" href="{{ url('/tb-jabatan?nama=kosong&limit=1') }}">
              <div class="sb-nav-link-icon"><i class="bi bi-bar-chart-line"></i></div>
              Data Jabatan
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('tb-wilayah') ? 'active' : ''}}" style="color:#fff" href="{{url('/tb-wilayah?nama=kosong&limit=1')}}">
              <div class="sb-nav-link-icon"><i class="bi bi-pin-map"></i></div>
              Data Wilayah
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('tb-upt') ? 'active' : ''}}" style="color:#fff" href="{{ url('/tb-upt?nama=kosong&limit=1') }}">
              <div class="sb-nav-link-icon"><i class="bi bi-card-checklist"></i></div>
              Data UPT
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('kategori') ? 'active' : ''}}" style="color:#fff" href="{{ url('/kategori') }}">
              <div class="sb-nav-link-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
                  <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                  <path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
                </svg>
              </div>
              Data Kategori
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('kuesioner') ? 'active' : ''}}" style="color:#fff" href="{{ url('/kuesioner?nama=kosong&limit=1') }}">
              <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-window-plus" viewBox="0 0 16 16">
                  <path d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z" />
                  <path d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4Zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2Z" />
                  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                </svg></div>
              Data Kuesioner
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('periode') ? 'active' : ''}}" style="color:#fff" href="{{ url('/periode') }}">
              <div class="sb-nav-link-icon"><i class="bi bi-calendar3"></i></div>
              Data Periode Penilaian
            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('tb-user') ? 'active' : ''}}" style="color:#fff" href="{{url('tb-user')}}">
              <div class="sb-nav-link-icon"><i class="bi bi-people"></i></div>
              Data User
            </a>
            <!-- <a href="" class="nav-link" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Penilaian proaktif
                            </button> 
                        </a>-->

            <div class="sb-sidenav-menu-heading">
              <h5>Penilaian</h5>
            </div>
            <a class="p-1 pl-3 nav-link {{ Request::is('periodePenilaian-pilih','pegawai-pilih','penilaian') ? 'active' : ''}}" style="color:#fff" href="{{ url('/periodePenilaian-pilih') }}">
              <div class="sb-nav-link-icon">
                <i class="bi bi-journal-check"></i>
              </div>
              Penilaian ProActs

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('Proses-Akhir-Penilaian') ? 'active' : ''}}" style="color:#fff" href="{{ url('/Proses-Akhir-Penilaian') }}">
              <div class="sb-nav-link-icon">
                <i class="bi bi-calculator-fill"></i>
              </div>
              Proses Akhir Periode

            </a>

            <!-- <a class="p-1 pl-3 nav-link {{ Request::is('chart') ? 'active' : ''}}" style="color:#fff" href="{{ url('/chart') }}">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z" />
                                </svg>
                            </div>
                            Grafik
                        </a> -->

            <!-- Laporan -->
            <div class="sb-sidenav-menu-heading">
              <h5>Laporan</h5>
            </div>

            <a class="p-1 pl-3 nav-link {{ Request::is('lap_per_pegawai') ? 'active' : ''}}" style="color:#fff" href="/lap_per_pegawai?caritahun=kosong&caribulan=0&carinip=kosong&limit=1">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Laporan Per-Pegawai

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('lap_jml_wilayah') ? 'active' : ''}}" style="color:#fff" href="/lap_jml_wilayah?caritahun=kosong&caribulan=0&cariwilayah=0&limit=1">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Laporan per-Wilayah

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('lap_jml_upt_wilayah') ? 'active' : ''}}" style="color:#fff" href="/lap_jml_upt_wilayah?caritahun=kosong&caribulan=0&cariwilayah=0&cariupt=0&limit=1">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Laporan per-UPT

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('lap_sub_wilayah') ? 'active' : ''}}" style="color:#fff" href="/lap_sub_wilayah?caritahun=kosong&caribulan=0&cariwilayah=0&limit=1">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Laporan Sub Per Wilayah

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('lap_sub_upt_wilayah') ? 'active' : ''}}" style="color:#fff" href="/lap_sub_upt_wilayah?caritahun=kosong&caribulan=0&cariupt=0&cariwilayah=0&limit=1">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Laporan Sub Per UPT

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('Rangking_Pegawai_wilayah') ? 'active' : ''}}" style="color:#fff" href="/Rangking_Pegawai_wilayah">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Rangking Pegawai Per Wilayah

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('Rangking_Pegawai_Upt') ? 'active' : ''}}" style="color:#fff" href="/Rangking_Pegawai_Upt">
              <div class="sb-nav-link-icon">
                <i class="bi bi-clipboard-data"></i>
              </div>
              Rangking Pegawai Per UPT

            </a>
            <div class="p-1 pl-3 sb-sidenav-menu-heading">
              <h5> Pengaturan</h5>
            </div>
            <a class="nav-link {{ Request::is('export') ? 'active' : ''}}" style="color:#fff" href="{{url('/export')}}">
              <div class="sb-nav-link-icon">
                <i class="bi bi-box-arrow-in-up"></i>
              </div>
              Export

            </a>
            <a class="p-1 pl-3 nav-link {{ Request::is('import') ? 'active' : ''}}" style="color:#fff" href="{{url('/import')}}">
              <div class="sb-nav-link-icon">
                <i class="bi bi-box-arrow-down"></i>
              </div>
              Import

            </a>
            <br>
            <a class="p-1 pl-3 nav-link" style="color:#fff;" href="{{ route('logout') }}" id="logout">
              <div class="sb-nav-link-icon">
                <i class="bi bi-box-arrow-right"></i>
              </div>
              Logout

            </a>
            <br><br><br>
          </div>
        </div>
        <!-- <div class="sb-sidenav-footer" style="color:#fff">
                    <div class="small" style="color:#fff">Logged in as:</div>
                    {{ Auth::user()->name }}
                </div> -->
      </nav>
    </div>
  </div>
  <main>
    @yield('content')
  </main>
  <!-- <footer class="py-3 bg-light mt-5">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-center small">
                <div class="text ml-5"><b>Copyright &copy; KEMENKUMHAM 2021</b> </div>

    </footer> -->





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/js/scripts.js')}}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
  <!-- <script src="{{ asset('backend/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('backend/assets/demo/chart-bar-demo.js')}}"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="{{ asset('backend/js/datatables-simple-demo.js')}}"></script>
</body>







<script>
  @if(Session::has('sukses'))
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: "{{ session::get('sukses') }}",
    showConfirmButton: false,
    timer: 1500
  })
  @endif
</script>

<!-- delete pegawai -->
<script>
  $('.delete_pegawai').click(function() {
    var pegawaiId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/del/" + pegawaiId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete pegawai -->

<!-- tambah pegawai  -->
<script>
  $(document).on('click', '#tambah-pegawai', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-pegawai').submit();
      }
    });
  });
</script>
<!-- akhir tambah pegawai  -->

<!-- delete jabatan -->
<script>
  $('.delete_jabatan').click(function() {
    var jabatanId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/tb-jabatan/delete/" + jabatanId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete jabatan -->



<!-- tambah jabatan  -->
<script>
  $(document).on('click', '#tambah-jabatan', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-jabatan').submit();
      }
    });
  });
</script>
<!-- akhir tambah jabatan  -->

<!-- delete wilayah -->
<script>
  $('.delete_wilayah').click(function() {
    var wilayahId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/delete/" + wilayahId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete wilayah -->

<!-- tambah wilayah  -->
<script>
  $(document).on('click', '#tambah-wilayah', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-wilayah').submit();
      }
    });
  });
</script>
<!-- akhir tambah wilayah  -->

<!-- delete upt -->
<script>
  $('.delete_upt').click(function() {
    var uptId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/tb-upt/delete/" + uptId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete upt -->

<!-- tambah upt  -->
<script>
  $(document).on('click', '#tambah-upt', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-upt').submit();
      }
    });
  });
</script>
<!-- akhir tambah upt  -->

<!-- delete kategori -->
<script>
  $('.delete_kategori').click(function() {
    var kategoriId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/kategori-delete/" + kategoriId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete kategori -->

<!-- tambah kategori  -->
<script>
  $(document).on('click', '#tambah-kategori', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-kategori').submit();
      }
    });
  });
</script>
<!-- akhir tambah kategori  -->

<!-- delete kuesioner -->
<script>
  $('.delete_kuesioner').click(function() {
    var kuesionerId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/kuesioner/delete/" + kuesionerId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete kuesioner -->

<!-- tambah kuesioner  -->
<script>
  $(document).on('click', '#tambah-kuesioner', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-kuesioner').submit();
      }
    });
  });
</script>
<!-- akhir tambah kuesioner  -->

<!-- delete periode -->
<script>
  $('.delete_periode').click(function() {
    var periodeId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/periode/delete/" + periodeId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete periode -->


<!-- tambah periode  -->
<script>
  $(document).on('click', '#tambah-periode', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Tambah data ',
      text: "Apakah Kamu Yakin Ingin Menambah Data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-tambah-periode').submit();
      }
    });
  });
</script>
<!-- akhir tambah periode  -->

<!-- delete user -->
<script>
  $('.delete_user').click(function() {
    var userId = $(this).attr('data-id')
    Swal.fire({
      title: 'Hapus',
      text: "Apakah Kamu Yakin Ingin Menghapus Data Tersebut ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = "/tb-user/delete/" + userId + ""
        // Swal.fire(
        //   'Hapus!',
        //   'Data Berhasil Dihapus!',
        //   'success'
        // )
      }
    });
  });
</script>
<!-- akhir delete user -->

<!-- proses akhir periode  -->
<script>
  $(document).on('click', '#Proses', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Proses ',
      text: "Apakah Anda Yakin Menjalankan Proses Akhir Periode Penilaian ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#myForm-proses').submit();
      }
    });
  });
</script>

<!-- logout  -->
<script>
  $(document).on('click', '#logout', function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Proses ',
      text: "Apakah Anda Yakin ingin Logout ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#logout-form').submit();
      }
    });
  });
</script>

</html>