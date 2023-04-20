<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <title>online complain registration</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}"> --}}

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href=" {{ asset('/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/js/config.js') }}"></script>
</head>

{{--
<body style="font-size: small">

    <div class="container-fluid d-flex log-one" style="height: 85vh">

        <div class="container m-auto p-3 d-flex justify-content-center align-items-center log-two"
            style="max-height: 100vh">
            <h1 class="col text-center">Customer login</h1>
            <form action="{{ url('/login') }}" method="post" name="log-form" onsubmit="return validateForm()"
                class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label col-form-label-sm">Email address</label>
                    <input type="email" name="email" class="form-control form-control-sm" id=""
                        value="{{ old('email') }}">
                    <span class="text-danger col-form-label-sm" id="emailError"></span>
                    <span class="text-danger col-form-label-sm">
                        @if (Session::has('errorEmail'))
                            <p class="text-danger">{{ Session::get('errorEmail') }}</p>
                        @endif
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-form-label-sm">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm" id="password">
                    <i class="bi bi-eye-slash" id="togglePassword"
                        style="
                    position: relative;
                    bottom: 24px;
                    right: -30rem;"></i>
                    <span class="text-danger col-form-label-sm" id="passError"></span>
                    <span class="text-danger col-form-label-sm">
                        @if (Session::has('errorPass'))
                            <p class="text-danger">{{ Session::get('errorPass') }}</p>
                        @endif
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    @if (Session::has('errorPass'))
                        <div id="emailHelp" class="form-text text-danger">forgot password ? <a
                                href="{{ url('/reset-pass') }}">Reset Here</a>
                        </div>
                    @endif
                    <div id="emailHelp" class="form-text">new customer ? <a href="{{ url('/') }}">Register
                            Here</a>
                    </div>
                    <div id="emailHelp" class="form-text">log in as Admin <a href="{{ url('/adlogin') }}">Login
                            Here</a>
                    </div>
                    <div id="emailHelp" class="form-text">log in as department <a href="{{ url('/deptlogin') }}">Login
                            Here</a></div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Log in</button>
            </form>
        </div>
    </div>

    <footer class="foo container-fluid fixed-bottom justify-content-center p-1">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>

    <script src="{{ asset('/js/login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html> --}}


{{-- <!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head> --}}

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link gap-2">
                                <span>
                                    <img src="{{ asset('/img/icons/brands/logo.png') }}" alt=""
                                        style="width: 40px" />
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">OCR</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 text-center">Welcome to Online Complaint Registration ! 👋</h4>
                        <p class="mb-4">
                            Please sign-in to your account and start the Complaining
                        </p>

                        <form id="formAuthentication" class="mb-3" name="log-form" action="{{ url('/login') }}" method="POST"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" autofocus />
                                <span class="text-danger fs-tiny" id="emailError"></span>
                                <span class="text-danger col-form-label-sm">
                                    @if (Session::has('errorEmail'))
                                        <p class="text-danger">{{ Session::get('errorEmail') }}</p>
                                    @endif
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <a href="{{ url('/reset-pass') }}">
                                        <small>Forgot Password?</small>
                                    </a>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                <span class="text-danger fs-tiny" id="passError"></span>
                                <span class="text-danger col-form-label-sm">
                                    @if (Session::has('errorPass'))
                                        <p class="text-danger">{{ Session::get('errorPass') }}</p>
                                    @endif
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">
                                    Sign in
                                </button>
                            </div>
                        </form>

                        <p class="text-center m-auto">
                            <span>New on our platform?</span>
                            <a href="{{ url('/') }}">
                                <span>Create an account</span>
                            </a>
                        </p>
                        <p class="text-center m-auto">
                            <span>login as</span>
                            <a href="{{ url('/adlogin') }}">
                                <span>Admin</span>
                            </a>
                        </p>
                        <p class="text-center m-auto">
                            <span>login as</span>
                            <a href="{{ url('/deptlogin') }}">
                                <span>Department</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <script src="{{ asset('/js/login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>


    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
