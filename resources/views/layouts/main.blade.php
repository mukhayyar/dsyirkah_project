<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Landing Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
        @stack('styles')
        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="loading" data-layout-config='{"darkMode":false}' >

        <!-- NAVBAR START -->
        <nav class="navbar sticky-top navbar-expand-lg py-lg-3 navbar-dark" style="background-color: rgb(38, 105, 252);" >
            <div class="container">

                <!-- logo -->
                <a href="/" class="navbar-brand me-lg-5">
                    <img src="/assets/images/logo.png" alt="" class="logo-dark" height="18" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <!-- menus -->
                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <!-- left menu -->
                    <ul class="navbar-nav me-auto align-items-center" >
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link active" href="/">Home</a>
                        </li>
                        @if(!Auth::check())
                        <li class="nav-item mx-lg-1" data-bs-toggle="modal" data-bs-target="#modal-not-login" >
                            <a class="nav-link">Mutlaqah</a>
                        </li>
                        <li class="nav-item mx-lg-1" data-bs-toggle="modal" data-bs-target="#modal-not-login">
                            <a class="nav-link">Muqayyadah</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a class="nav-link" href="">Area Anggota</a>
                        </li>
                        @else
                        <li class="nav-item mx-lg-1">
                            <a href="/mutlaqah" class="nav-link">Mutlaqah</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a href="/muqayyadah" class="nav-link">Muqayyadah</a>
                        </li>
                        <li class="nav-item mx-lg-1">
                            <a href="/transaction" class="nav-link">Transaksi</a>
                        </li>
                        @endif
                        
                    </ul>

                    <!-- right menu -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        @if(!Auth::check())
                        <li class="nav-item me-0">
                            <a class="btn btn-sm btn-light rounded-pill d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#modal-login">
                                <i class="mdi mdi-account me-2"></i> Masuk
                            </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
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
                        @endif
                        <p></p>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR END -->
        @yield('content')
        
        <div class="modal fade" id="modal-not-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" >
                    <div class="modal-header" style="background-color: rgb(38, 105, 252);">
                        <h4 class="modal-title" id="modal-not-login" style="color: aliceblue;">Harap dibaca</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body text-center" >
                        <h4>D'Syirkah adalah Simpanan Berjangka dari KSPPS Simpul Berkah Sinergi</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsa blanditiis eum
                            aliquam perferendis facere quibusdam natus eaque neque sequi exercitationem necessitatibus nemo accusantium, hic reiciendis velit dolorem praesentium! Quia.
                        </p>
                        <div style="margin-top: 2%;">
                            <div class="text-sm-center"><h5>Silahkan Hubungi Kami jika membutuhkan penjelasan lebih lanjut Atau langsung Daftar Sebagai Anggota</h5></div>
                            <div class="text-center mt-sm-0 mt-3 text-sm-center">
                                <a class="btn btn-lg font-16 btn-danger" id="btn-proposal" data-bs-toggle="modal" data-bs-target="#modal-daftar">
                                    <i class="mdi mdi-badge-account-outline"></i> Daftar Jadi Anggota </a>
                                <a href="" class="btn btn-lg font-16 btn-success" id="btn-Wa-center">
                                    <i class="mdi mdi-whatsapp"></i> WA Customer Services </a>
                            </div><br>
                            <div class="text-sm-center"><h6>Sudah Memiliki Akun? Silahkan Masuk </h6></div>
                            <a class="btn btn-lg font-16 btn-primary" data-bs-toggle="modal" data-bs-target="#modal-login" id="btn-Wa-center">
                                <i class="mdi mdi-account-box-outline"></i> Masuk Anggota</a>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg loading authentication-bg">
                <div class="modal-content bg-transparent">
                <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-7 col-lg-5">
                                <div class="card">
                                    <!-- Logo -->
                                    <div class="modal-header" style="background-color: #0652f8">
                                        <a href="/">
                                            <span><img src="/assets/images/logo.png" alt="" height="18"></span>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="text-center w-75 m-auto">
                                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Masuk</h4>
                                            <p class="text-muted mb-4">Silahkan masuk Untuk ikut andil dalam Program D'Syirkah</p>
                                        </div>
                                        <div>
                                        <form action="/login" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="emailaddress" required name="email" placeholder="Enter your email">
                                            </div>
                                            <div class="mb-3">
                                                <a href="{{route('password.email')}}" class="text-muted float-end"><small>Forgot your password?</small></a>
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="remember" id="checkbox-signin" checked>
                                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="mb-3 mb-0 text-center">
                                                <button class="btn btn-primary" type="submit"> Log In </button>
                                            </div>
                                        </form>
                                    </div>
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Anda Belum Memiliki Akun? <a href="" class="text-muted ms-1" data-bs-toggle="modal" data-bs-target="#modal-daftar"><b>Daftar</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                </div>
                <!-- end page -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg loading authentication-bg">
                <div class="modal-content bg-transparent">
                <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-7 col-lg-5">
                                <div class="card">
                                    <!-- Logo-->
                                    <div class="modal-header" style="background-color: #0652f8">
                                        <a href="/">
                                            <span><img src="/assets/images/logo.png" alt="" height="18"></span>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>

                                    <div class="card-body p-4">

                                        <div class="text-center w-75 m-auto">
                                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Daftar Akun</h4>
                                            <p class="text-muted mb-4">Untuk Mendaftar akun di program ini anda wajib sebagai anggota KSPPS Simpul Berkah Sinergi</p>
                                        </div>

                                        <form action="/register" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nomor Buku Anggota (BA)</label>
                                                <input class="form-control" type="text" id="nomor_ba" name="nomor_ba" placeholder="contoh: 0.123.1234567" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nama Lengkap</label>
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Enter your name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="fullname" class="form-label">Nomor HP</label>
                                                <input class="form-control" type="text" id="no_hp" name="no_hp" placeholder="Enter your name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="emailaddress" class="form-label">Email address</label>
                                                <input class="form-control" type="email" id="email" name="email" required placeholder="Enter your email">
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Enter your password">
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-signup" required>
                                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                                </div>
                                            </div>

                                            <div class="mb-3 text-center" >
                                                <button class="btn btn-primary" type="submit"> Daftar </button>
                                            </div>

                                        </form>
                                        <div class="row mt-3">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Anda Sudah Memiliki Akun? <a href="" class="text-muted ms-1" data-bs-toggle="modal" data-bs-target="#modal-login"><b>Masuk</b></a></p>
                                            </div> <!-- end col -->
                                        </div>
                                    </div> <!-- end card-body -->
                                </div>
                                <!-- end card -->
                                <!-- end row -->

                            </div> <!-- end col -->
                        </div>

                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                </div>
                <!-- end page -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="modal-cekemail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg loading authentication-bg">
                <div class="modal-content bg-transparent">
                <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xxl-7 col-lg-5">
                                <div class="card">
                                    <!-- Logo-->
                                    <div class="modal-header" style="background-color: #0652f8">
                                        <a href="/">
                                            <span><img src="/assets/images/logo.png" alt="" height="18"></span>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>

                                    <div class="card-body p-4">

                                        <div class="text-center m-auto">
                                            <img src="/assets/images/mail_sent.svg" alt="mail sent image" height="64" />
                                            <h4 class="text-dark-50 text-center mt-4 fw-bold">Silahkan Cek Email anda</h4>
                                            <p class="text-muted mb-4">
                                                Kami mengirimkan email ke <b>youremail@domain.com</b>.
                                                silahkan cek email & melakukan Verifikasi akun.
                                            </p>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div>
                                <!-- end card -->
                                <!-- end row -->
                            </div> <!-- end col -->
                        </div>

                        <!-- end row -->
                    </div>
                    <!-- end container -->
                </div>
                </div>
                <!-- end page -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- START FOOTER -->
        <footer class="bg-dark py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <img src="/assets/images/logo.png" alt="" class="logo-dark" height="18" />
                        <p class="text-muted mt-4">Hyper makes it easier to build better websites with
                            <br> great speed. Save hundreds of hours of design
                            <br> and development by using it.</p>
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-4 mt-3 mt-lg-0">
                        <h5 class="text-light">Company</h5>
                        <ul class="list-unstyled ps-0 mb-0 mt-3">
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">About Us</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Documentation</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Blog</a></li>
                            <li class="mt-2"><a href="javascript: void(0);" class="text-muted">Affiliate Program</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-5">
                            <p class="text-muted mt-4 text-center mb-0">© 2022 - <script>document.write(new Date().getFullYear())</script> EOA Club | D'Syirkah. KSPPS Simpul Berkah Sinergi
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->

        <!-- bundle -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>
        @stack('scripts')
    </body>

</html>
