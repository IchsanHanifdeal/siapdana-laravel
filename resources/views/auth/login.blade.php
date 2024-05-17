<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} | {{ $title }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('index') }}"><img
                                class="logo-icon me-2" src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Masuk ke {{ config('app.name') }}</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="{{ route('authenticate.login')}}" method="POST">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" name="email" type="email"
                                    class="form-control signin-email" placeholder="Alamat Email" required="required">
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password"
                                    class="form-control signin-password" placeholder="Password" required="required">
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto"
                                    style="background: #2A3D5E">Masuk</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">tidak punya akun? <a class="text-link"
                                style="color:#2A3D5E" href="{{ route('register') }}"><b>Daftar disini!</b></a>.</div>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">Jelajahi Peminjaman Siap Dana</h5>
                        <div>Siap Dana adalah platform pinjaman online yang menawarkan solusi keuangan cepat dan
                            mudah.
                        </div>
                    </div>
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->

    </div><!--//row-->


</body>

</html>
