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
        <title>Telemedicine</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ url('backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        @livewireStyles
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{ url('/') }}">Telemedicine</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown" >
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    @guest
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user fa-fw"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    @endguest
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="{{ url('/admin') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Halaman Utama
                            </a>
                            <a class="nav-link" href="{{ url('/profil') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Profil
                            </a>
                            <div class="sb-sidenav-menu-heading">Cek Kondisi</div>
                            <a class="nav-link" href="{{ url('/test') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-stethoscope"></i></div>
                                Lakukan Tes
                            </a>
                            <div class="sb-sidenav-menu-heading">Fitur Lainnya</div>
                            <a class="nav-link" href="https://www.cnnindonesia.com/search/?query=Covid">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Artikel
                            </a>
                            <a class="nav-link" href="{{ url('/rujukan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Nomor Darurat
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}  saya adalah user
                        <div>
                        <a class="btn text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
            <main>
            @yield('content')
            </main>
            <footer class="py-3 bg-light mt-4">
                    <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                    <div class="text ml-5">Copyright &copy; Telemedicine 2021</div>

        </footer> 
           
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{ asset('backend/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/js/datatables-simple-demo.js')}}"></script>
        @livewireScripts
    </body>
</html>

