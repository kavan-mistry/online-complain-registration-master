{{-- <!doctype html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">
</head>

<body>

    <section class="">
        <nav class="navbar nvr navbar-expand-lg">
            <div class="container-fluid">
                <h3>
                    <img src="{{ asset('/img/logo.png') }}" alt="" width="40"
                        class="d-inline-block align-text-top">
                    Online Complain Registration
                </h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end justify-self-end" id="main_nav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a href="/login/edit_profile" class="nav-link active"><i
                                    class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> {{ ucwords($customer->name) }} </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ url('/login/dash') }}">
                                    <i class="bi bi-plus-lg me-1"></i>Add complain
                                </a>
                                <a class="dropdown-item" href="{{ url('/login/dash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                                <div class="dropdown-divider"></div>
                                <div class="d-flex justify-content-center">
                                    <a name="" id="" class="btn btn-danger" href="{{ url('/logout') }}"
                                        role="button"><i class="bi bi-door-open"></i>
                                        Log out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>
    </section>


    <div class="contaier-sm main-div d-flex justify-content-center align-items-center p-3">
        <form action="{{ url('/login/edit_profile') }}" method="post">
            @csrf
            <div class="row form-group d-flex justify-content-center align-items-center">
                <div class="col-lg-6 text-center h-div">
                    <h2>
                        Edit Profile
                    </h2>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ $customer->name }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Email</label><span class="text-danger warning"> &nbsp; You must validate your
                        email after updating it.</span>
                    <input type="email" name="email" class="form-control" 
                        value="{{ $customer->email }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Mobile</label>
                    <input type="tel" name="mob" class="form-control"
                        value="{{ $customer->mob }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2" style="height:84px">
                    <label for="">New Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <i class="bi bi-eye-slash" id="togglePassword"
                        style="
                    position: relative;
                    bottom: 31px;
                    right: -38rem;"></i>
                    <div class="text-danger col-form-label-sm ff"
                        style="
                    position: relative;
                    top: -25px;">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2" style="height: 84px">
                    <label for="">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password2">
                    <i class="bi bi-eye-slash" id="togglePassword2"
                        style="
                    position: relative;
                    bottom: 31px;
                    right: -38rem;"></i>
                    <div class="text-danger col-form-label-sm ff"
                        style="
                    position: relative;
                    top: -25px;">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2 d-flex justify-content-center gap-2 align-items-center">
                    <button name="submit" id="" class="btn btn-outline-success" type="submit"><i
                            class="bi bi-pencil-square me-1"></i>Edit</button>
                    <a name="cancel" id="" class="btn btn-outline-danger"
                        href="{{ url('/login/dash') . '/view' }}" role="button"><i
                            class="bi bi-x-circle me-1"></i>Cancel</a>
                </div>
            </div>
        </form>
    </div>



    <footer>
        <div class="foo">
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('/js/editProfile.js') }}"></script>
</body>

</html> --}}


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

    {{-- datatables  --}}

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href=" {{ asset('/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">

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

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <!-- Layout container -->
        <div class="layout-container layout-menu-fixed">

            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('/img/icons/brands/logo.png') }}" alt="" style="width: 40px" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">OCR</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block"> {{ ucwords($customer->name) }}</span>
                                    <small class="text-muted">User</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/login/dash/view') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a class="menu-link" href="{{ url('/login/edit_profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url('/logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>

                </ul>
            </aside>
            <!--/ Menu -->

            <!-- Layout page -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-evenly" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center justify-content-center">
                                <h1 class="m-0">
                                    Edit Profile
                                </h1>
                            </div>

                        </div>
                        <!-- /Search -->

                        {{-- problem type search --}}



                        {{-- /problem type search --}}

                        {{-- buttons for search --}}



                        {{-- / buttons for search --}}
                    </div>
                </nav>
                <!--/ Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Content -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <form action="{{ url('/login/edit_profile') }}" method="post">
                            @csrf
                            <div class="row form-group d-flex justify-content-center align-items-center">

                                <div class="col-lg-6 m-2">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ $customer->name }}">
                                    <div class="text-danger col-form-label-sm ff">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-2">
                                    <label for="">Email</label><span class="text-danger warning"> &nbsp; You
                                        must validate your
                                        email after updating it.</span>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $customer->email }}">
                                    <div class="text-danger col-form-label-sm ff">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-2">
                                    <label for="">Mobile</label>
                                    <input type="tel" name="mob" class="form-control"
                                        value="{{ $customer->mob }}">
                                    <div class="text-danger col-form-label-sm ff">
                                        @error('mob')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-2" style="height:84px">
                                    <label for="">New Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <div class="text-danger col-form-label-sm ff">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-2" style="height: 84px">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password2">
                                    <div class="text-danger col-form-label-sm ff">
                                        @error('confirm_password')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 m-2 d-flex justify-content-center gap-2 align-items-center">
                                    <button name="submit" id="" class="btn btn-outline-primary"
                                        type="submit">
                                        <i class='bx bxs-edit'></i> Edit</button>
                                    <a name="cancel" id="" class="btn btn-outline-danger"
                                        href="{{ url('/login/dash') . '/view' }}" role="button">
                                        <i class='bx bxs-x-circle'></i> Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/ Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                , made with 😃 by
                                <a href="https://themeselection.com" target="_blank"
                                    class="footer-link fw-bolder">Kavan Mistry</a>
                            </div>
                            <div>
                                <a href="https://themeselection.com/license/" class="footer-link me-4"
                                    target="_blank">License</a>

                                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                    target="_blank" class="footer-link me-4">Documentation</a>

                                <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                    target="_blank" class="footer-link me-4">Support</a>
                            </div>
                        </div>
                    </footer>
                    <!--/ Footer -->

                    <!-- Content area backdrop -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->

            </div>
            <!--/ Layout page -->

        </div>
        <!--/ Layout container -->

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!--/ Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    {{-- for data tables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>


    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('/js/customer.js') }}"></script>


</body>

</html>
