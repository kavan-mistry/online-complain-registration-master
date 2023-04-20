{{-- <!doctype html>
<html lang="en">

<head>
    <title>complain information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
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
                        <li class="nav-item active"> <a class="nav-link" href="{{ url('/login/dash') }}">
                                <i class="bi bi-plus-lg me-1"></i>Add complain
                            </a> </li>

                        <li class="nav-item"><a class="nav-link active" href="{{ url('/login/dash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> {{ $user }} </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-envelope-exclamation me-1"></i>Change Email</a> --}}
{{-- <a href="/reset-pass" class="dropdown-item"><i
                                        class="bi bi-arrow-clockwise me-1"></i>Change password</a>
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

    <div class="container d-flex row justify-content-center align-items-center m-auto mt-4">
        <div class="mb-3 d-flex justify-content-center py-2" style="background-color: lavender; border-radius: 10px;">
            <div class="col-1 d-flex m-auto" style="z-index: 5;">
                <a name="" id="" class="btn btn-primary" href="{{ url('login/dash') . '/view' }}"
                    role="button"><i class="bi bi-caret-left-fill me-2"></i>Back</a>
            </div>
            <div class="col-11" style="
            left: -74px;
            position: relative;">
                <h3 id="dash-head" class="text-center m-auto">
                    Complain Details
                </h3>
            </div>
        </div>
        <div class="container w-75 mb-3">
            @foreach ($complain as $complain)
                <div class="card p-0">
                    <div class="card-header fw-bold">
                        Complaint ID:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->complain_id }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Complaint Status:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($complain->status == 1)
                                <span class="badge text-bg-info">Active</span>
                            @elseif($complain->status == 0)
                                <span class="badge text-bg-success">Solved</span>
                            @elseif($complain->status == 2)
                                <span class="badge text-bg-warning">Pending</span>
                            @elseif($complain->status == 3)
                                <span class="badge text-bg-danger">Rejected</span>
                            @elseif($complain->status == 4)
                                <span class="badge text-bg-info">Re-opened</span>
                            @endif
                        </li>
                    </ul>
                    <div class="card-header fw-bold">
                        Info:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{ $complain->name }}</li>
                        <li class="list-group-item">Address : {{ $complain->address }}</li>
                        <li class="list-group-item">City : {{ $complain->city }}</li>
                        <li class="list-group-item">State : {{ $complain->state }}</li>
                        <li class="list-group-item">Zip : {{ $complain->zip }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Problem Type:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->pt }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Department:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $dept_name }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Mobile Number:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->mob }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Problem Description:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->pd }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Customer Uploaded Image:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                                    class="img-fluid img-thumbnail" id="up-img2" alt="Complaint Image">
                            @endforeach
                        </li>
                    </ul>
                    @if (count($dept_images) > 0)
                        <div class="card-header fw-bold">
                            Department Work Proof Image:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @foreach ($dept_images as $dimage)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                        class="img-fluid img-thumbnail" id="up-img2" alt="Complaint Image">
                                @endforeach
                            </li>
                        </ul>
                    @endif
                    @if (count($reopen_complain) > 0)
                        <div class="card-header fw-bold">
                            Reopen History:
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($reopen_complain as $rcomp)
                                <li class="list-group-item">
                                    Reopen Date & Time : {{ $rcomp->created_at }}
                                </li>
                                <li class="list-group-item"> --}}
{{-- Feedback : 
                                    <li class="list-group-item">{{$rcomp->feedback}}</li> --}}
{{-- <div>
                                        Feedback :
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            {{ $rcomp->feedback }}
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    @if (!$reopen_images == null)
                                        <div>
                                            Customer Uploaded Image (Re-opened) :
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                @foreach ($reopen_images as $rimage)
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                                        class="img-fluid img-thumbnail" id="up-img2"
                                                        alt="Complaint Image">
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    @if (!$reopen_images == null)
                                        <div>
                                            Department work of proof (Re-opened) :
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                @foreach ($dept_reopen_images as $drimage)
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                                        class="img-fluid img-thumbnail" id="up-img2"
                                                        alt="Complaint Image">
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (isset($complain->rejection_reason))
                        <div class="card-header fw-bold">
                            Rejection reason:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $complain->rejection_reason }}
                            </li>
                        </ul>
                    @endif
                </div>
            @endforeach

        </div>

    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
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
    @notifyCss
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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
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
                                    <span class="fw-semibold d-block"> {{ ucwords($user) }}</span>
                                    <small class="text-muted">User</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url('/login/dash') }}">
                            <i class="bx bx-plus me-2"></i> <span class="align-middle">Add New
                                Complain</span>
                        </a>
                    </li>
                    <li class="menu-item">
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
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->
                <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-between"
                        id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center justify-content-center">
                                <h3 class="m-0">
                                    Complaint Details
                                </h3>
                            </div>
                        </div>
                        <!-- /Search -->

                        <a href="{{ url('login/dash') . '/view' }}" class="btn btn-primary">Back</a>

                    </div>
                </nav>
                <!--/ Navbar -->

                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="row row-cols-1 row-cols-md-3 g-4 p-4 m-0">

                        @foreach ($complain as $complain)
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Complaint ID:</h5>
                                        <p class="card-text">{{ $complain->complain_id }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Complaint Status:</h5>
                                        <p class="card-text">
                                            @if ($complain->status == 1)
                                                <span class="badge rounded-pill bg-label-primary">Active</span>
                                            @elseif($complain->status == 0)
                                                <span class="badge rounded-pill bg-label-success">Solved</span>
                                            @elseif($complain->status == 2)
                                                <span class="badge rounded-pill bg-label-warning">Pending</span>
                                            @elseif($complain->status == 3)
                                                <span class="badge rounded-pill bg-label-danger">Rejected</span>
                                            @elseif($complain->status == 4)
                                                <span class="badge rounded-pill bg-label-info">Re-opened</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @if (isset($complain->rejection_reason))
                                <div class="col d-flex align-items-center justify-content-center">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h5 class="card-title"> Rejection reason : </h5>
                                            <p class="card-text">{{ $complain->rejection_reason }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Problem Type : </h5>
                                        <p class="card-text">{{ $complain->pt }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Department : </h5>
                                        <p class="card-text">{{ $dept_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-center justify-content-center">
                                <div class="card text-center" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Mobile Number : </h5>
                                        <p class="card-text">{{ $complain->mob }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex align-items-center justify-content-center">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">Info:</h5>
                                        <p class="card-text">Name : {{ $complain->name }}</p>
                                        <p class="card-text">Address : {{ $complain->address }}</p>
                                        <p class="card-text">City : {{ $complain->city }}</p>
                                        <p class="card-text">State : {{ $complain->state }}</p>
                                        <p class="card-text">Zip : {{ $complain->zip }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 d-flex align-items-center justify-content-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Problem Description : </h5>
                                        <p class="card-text">{{ $complain->pd }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Customer Uploaded Image : </h5>
                                        <div class="row">
                                            @foreach ($images as $image)
                                                <div class="col d-flex justify-content-center align-items-center">
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                                                        class="" id="up-img2" alt="Complaint Image">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($dept_images) > 0)
                                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Department Work Proof Image : </h5>
                                            <div class="row">
                                                @foreach ($dept_images as $dimage)
                                                    <div class="col d-flex justify-content-center align-items-center">
                                                        <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                                            class="" id="up-img2" alt="Complaint Image">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (count($reopen_complain) > 0)
                                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Reopen History : </h5>
                                            @foreach ($reopen_complain as $rcomp)
                                                <p class="card-text">Reopen Date & Time : {{ $rcomp->created_at }}</p>
                                                <p class="card-text">Feedback : {{ $rcomp->feedback }}</p>
                                                <p class="card-text">Customer Uploaded Image (Re-opened) : </p>
                                                <p class="card-text">
                                                <div class="row">
                                                    @foreach ($reopen_images as $rimage)
                                                        <div
                                                            class="col d-flex justify-content-center align-items-center">
                                                            <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                                                class="" id="up-img2" alt="Complaint Image">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                </p>
                                                <p class="card-text">Department work of proof (Re-opened) : </p>
                                                <p class="card-text">
                                                <div class="row">
                                                    @foreach ($dept_reopen_images as $drimage)
                                                        <div
                                                            class="col d-flex justify-content-center align-items-center">
                                                            <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                                                class="" id="up-img2" alt="Complaint Image">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with 😃 by
                            <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">Kavan
                                Mistry</a>
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
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    {{-- <script src="{{ asset('/js/login.js') }}"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}

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
    <script src="{{ asset('/js/dash.js') }}"></script>


</body>

</html>
