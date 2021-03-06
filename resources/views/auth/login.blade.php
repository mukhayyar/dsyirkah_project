<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> D'Syirkah | Log In - Admin </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                            <a href="" class="logo-dark">
                                <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <a href="" class="logo-light">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <!-- title-->
                        <div Class="text-center">
                            <h3 class="mt-0">Masuk Dashboard D'Syirka</h3><hr>
                            <h5 class="mt-0">EOA Club | KSPPS Simpul Berkah Sinergi</h5>
                            <p class="text-muted mb-4">Dashbord Khusus Informasi D'Syirkah</p>
                        </div>


                        <!-- form -->
                        <form action="{{ route('login') }}" method="post">
                            @if(Session::has('error'))
                            <div class="alert alert-warning" role="alert">
                                {{Session::get('error')}}
                            </div>
                            @enderror
                            @csrf
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password" required="" id="password" placeholder="Enter your password">
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i>{{ __('Login') }}</button>
                            </div>
                        </form>
                        <!-- end form-->
                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">Ahlan Wasahlan!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Terus Semangat, Bekerjalah dengan Baik <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                        - Admin -
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/app.min.js"></script>

    </body>

</html>
