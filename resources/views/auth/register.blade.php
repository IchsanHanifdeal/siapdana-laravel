<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>{{ config('app.name') }} | {{ $title }}</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('index') }}"><img class="logo-icon me-2" src="{{asset('assets/images/logo.png')}}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Daftar ke {{ config('app.name')}}</h2>
					<div class="auth-form-container text-start mx-auto">
						<form class="auth-form auth-signup-form" action="{{route('store.register')}}" method="POST">
                            @csrf
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name @error('username') is-invalid @enderror" placeholder="Username" required="required">
                                @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Nama Lengkap</label>
								<input id="signup-name" name="nama" type="text" class="form-control signup-name" placeholder="Nama Lengkap" required="required" value="{{ old('nama') }}">
							</div>
							<div class="email mb-3">
                                <label class="sr-only" for="signup-email">Email</label>
								<input id="signup-name" name="email" type="email" class="form-control signup-name @error('email') is-invalid @enderror" placeholder="Email" required="required" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
							</div>
							<div class="email mb-3">
                                <label class="sr-only" for="signup-email">No Handphone</label>
								<input id="signup-name" name="no_handphone" type="number" class="form-control signup-name @error('no_handphone') is-invalid @enderror" placeholder="No Handphone" required="required" value="{{ old('no_handphone')}}">
                                @error('no_handphone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
							</div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Tempat Lahir</label>
                                <input id="signup-name" name="tempat" type="text" class="form-control signup-name" placeholder="Tempat Lahir" required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Tanggal Lahir</label>
                                <input id="signup-name" name="tanggal_lahir" type="date" class="form-control signup-name" placeholder="Tanggal Lahir" required="required" value="{{ date('Y-m-d')}}">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Pekerjaan</label>
                                <input id="signup-name" name="pekerjaan" type="text" class="form-control signup-name" placeholder="Pekerjaan" required="required" value="{{ old('pekerjaan') }}">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Alamat</label>
                                <input id="signup-name" name="alamat" type="text" class="form-control signup-name" placeholder="Alamat" required="required" value="{{ old('alamat')}}">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Password</label>
                                <input id="signup-name" name="password" type="password" class="form-control signup-name" placeholder="Password" required="required">
                            </div>
							
							<div class="text-center">
								<button type="submit" style="background: #2A3D5E" class="btn app-btn-primary w-100 theme-btn mx-auto">Daftar</button>
							</div>
						</form><!--//auth-form-->
						
                        <div class="auth-option text-center pt-5">Sudah punya akun? <a class="text-link"
                            style="color:#2A3D5E" href="{{ route('login') }}"><b>Masuk disini!</b></a>.</div>
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

