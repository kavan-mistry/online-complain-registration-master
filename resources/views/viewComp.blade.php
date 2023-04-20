{{-- 
<!doctype html>
<html lang="en">

<head>
    <title>complain view</title>
    @notifyCss
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    {{-- data table --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">
</head>

<body>
    <header>
        <section class="position-relative dropdown-z">
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

                            <li class="nav-item"><a class="nav-link active" href="{{ url('/login/dash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="bi bi-person-circle"></i> {{ ucwords($user) }} </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/login/edit_profile" class="dropdown-item"><i
                                            class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>

                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex justify-content-center">
                                        <a name="" id="" class="btn btn-danger"
                                            href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                            Log out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- navbar-collapse.// -->
                </div> <!-- container-fluid.// -->
            </nav>
        </section>


    </header>
    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs

    <div class="container-sm mt-3 p-0 d-flex align-items-center justify-content-center" id="notice-div">
        <div class="col-1 text-center py-3" id="nh"><b>Important</b></div>
        <div class="col-11 d-flex align-items-center">
            <marquee>
                @foreach ($notices as $notice)
                    <span>{{ $notice->notice }} &emsp;&emsp; | &emsp;&emsp; </span>
                @endforeach
            </marquee>
        </div>
    </div>

    <form method="post" action="" class="d-flex mt-4 align-items-center">
        @csrf
        <div class="container justify-content-end d-flex">
            <div class="row d-flex justify-content-between w-100">
                <div class="col-lg-2">
                    <h2>
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="search" value="{{ $search }}">
                            <input type="search" name="search" class="form-control form-control-sm"
                                placeholder="Search here" value="{{ $search }}">
                        </div>
                    </h2>
                </div>
                <div class="col-lg-6 d-flex">
                    <div class="form-group row d-flex w-100">
                        <div class="col-lg-3"><label>Problem Type</label></div>
                        <div class="col-lg-9">
                            @if (isset($pt))
                                <select name="pt" class="form-select form-select-sm ms-2">
                                    @foreach ($problem_types as $pt1)
                                        <option value="{{ $pt1 }}"
                                            {{ $pt == $pt1->problems ? 'selected' : '' }}>
                                            {{ $pt1->problems }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="pt" class="form-select form-select-sm">
                                    <option value="">Choose...</option>
                                    @foreach ($problem_types as $p_t)
                                        <option value="{{ $p_t->problems }}">{{ $p_t->problems }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <button class="btn btn-sm btn-outline-success me-2"><i
                                class="bi bi-search me-1"></i>Search</button>
                        <a href="{{ url('/login/dash/view') }}" style="text-decoration: none;">
                            <button class="btn btn-sm btn-outline-danger" type="button"><i
                                    class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                        </a>
                        <a href="{{ url('/login/dash') }}">
                            <button class="btn btn-sm btn-outline-warning ms-2" type="button"><i
                                    class="bi bi-plus-lg me-1"></i>Add Complain</button>
                        </a>
                    </div>
                </div>
            </div>
    </form>

    </div>
    <div class="container d-flex row m-auto">

        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>State</th>
                        <th>Problem Type</th>
                        <th class="no-sort">Status</th>
                        <th class="no-sort">Action</th>
                    </tr>
                </thead>
                <tbody class=""> --}}
{{-- @if (!$complain->isEmpty()) --}}


{{-- @foreach ($complain as $complains)
                        <tr class="">
                            <td>{{ $complains->complain_id }}</td>
                            <td>{{ ucfirst($complains->name) }}</td>
                            <td>{{ $complains->email }}</td>
                            <td>{{ $complains->mob }}</td>
                            <td>{{ $complains->state }}</td>
                            <td>{{ $complains->pt }}</td>
                            <td>
                                @if ($complains->status == 1)
                                    <span class="badge rounded-pill text-bg-info">Active</span>
                                @elseif($complains->status == 0)
                                    <span class="badge rounded-pill text-bg-success">Solved</span>
                                @elseif($complains->status == 2)
                                    <span class="badge rounded-pill text-bg-warning">Pending</span>
                                @elseif($complains->status == 3)
                                    <span class="badge rounded-pill text-bg-danger">Rejected</span>
                                @elseif($complains->status == 4)
                                    <span class="badge rounded-pill text-bg-info">Re-opened</span>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('detail.view', ['comp_id' => $complains->complain_id]) }}">
                                    <button type="button" class="btn btn-sm btn-outline-success m-1"><i
                                            class="bi bi-eye-fill me-1"></i>view</button>
                                </a>

                                @if ($complains->status == 1)
                                    <a href="{{ route('complain.close', ['id' => $complains->complain_id]) }}"
                                        onclick="return confirm(`Are you sure you want to Close
Id : {{ $complains->complain_id }}  
Problem : {{ $complains->pt }} ?`)">
                                        <button type="button" class="btn btn-sm btn-outline-danger m-1"><i
                                                class="bi bi-x-circle-fill me-1"></i>close</button></a>
                                    </a>
                                @endif

                                @if ($complains->status == 0)
                                   
                                    <button type="button" class="btn btn-sm btn-outline-primary m-1"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="bi bi-node-plus-fill me-1"></i>Re-open
                                    </button> --}}

{{-- ----------------model start--------------- --}}

{{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form
                                                    action="{{ route('complain.reopen', ['id' => $complains->complain_id]) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Re-open
                                                            complain
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Before you go
                                                                please gave us feedback<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" name="feedback" id="" cols="60" rows="3"></textarea>
                                                            <div class="er d-flex"
                                                                style="position: relative; top: -21px">
                                                                <span class="form-text text-danger">
                                                                    @error('feedback')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFileSm"
                                                                class="form-label col-form-label">Upload Problem
                                                                Image<span class="text-danger">*</span></label>
                                                
                                                            <input class="form-control" id="fileInput" type="file"
                                                                name="file[]" accept="Image/*" multiple>
                                                            <div id="preview"></div>
                                                            <span class="text-danger col-form-label-sm">
                                                                @error('file')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal"><i
                                                                class="bi bi-x-circle me-1"></i>Cancel</button>
                                                        <button type="submit" class="btn btn-success"><i
                                                                class="bi bi-check2-circle me-1"></i>Re-open</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}

{{-- -------------------model end-------------- --}}
{{-- @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


    <footer class="foo container-fluid justify-content-center p-1 mt-2">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>

    {{-- jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}

{{-- data tables --}}
{{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/js/customer.js') }}"></script>
    <script src="{{ asset('/js/dash.js') }}"></script> --}}

<!-- Bootstrap JavaScript Libraries -->
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script> --}}

{{--     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
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
                <form method="post" action="" class="d-flex mt-4 align-items-center">
                    @csrf
                    <nav class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center justify-content-evenly"
                            id="navbar-collapse">
                            {{-- <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <input type="text" class="form-control border-0 shadow-none"
                                        placeholder="Search..." aria-label="Search..." />
                                </div>

                            </div>
                            <!-- /Search --> --}}

                            {{-- problem type search --}}

                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center gap-1">
                                    <label>Problem Type</label>
                                    <div>
                                        @if (isset($pt))
                                            <select name="pt" class="form-select form-select-sm ms-2">
                                                @foreach ($problem_types as $pt1)
                                                    <option value="{{ $pt1 }}"
                                                        {{ $pt == $pt1->problems ? 'selected' : '' }}>
                                                        {{ $pt1->problems }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select name="pt" class="form-select form-select-sm">
                                                <option value="">Choose...</option>
                                                @foreach ($problem_types as $p_t)
                                                    <option value="{{ $p_t->problems }}">{{ $p_t->problems }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- /problem type search --}}

                            {{-- buttons for search --}}

                            <div class="navbar-nav align-items-center ms-2 justify-content-end">
                                <div class="nav-item d-flex align-items-center">
                                    <button class="btn btn-sm btn-outline-primary me-2"><i
                                            class="bx bx-search fs-5 lh-0"></i>Search</button>
                                    <a href="{{ url('/login/dash/view') }}" style="text-decoration: none;">
                                        <button class="btn btn-sm btn-outline-danger" type="button"><i
                                                class="bx bx-reset fs-5 lh-0"></i>Reset</button>
                                    </a>
                                    {{-- <a href="{{ url('/login/dash') }}">
                                    <button class="btn btn-sm btn-outline-warning ms-2" type="button"><i
                                            class="bi bi-plus-lg me-1"></i>Add Complain</button>
                                </a> --}}
                                </div>
                            </div>

                            {{-- / buttons for search --}}
                        </div>
                    </nav>
                </form>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <div class="p-0 d-flex align-items-center justify-content-center" id="notice-div">
                            <div class="col-1 text-center text-dark py-3" id="nh">
                                <strong>Important</strong>
                            </div>
                            <div class="col-11 d-flex align-items-center">
                                <marquee>
                                    @foreach ($notices as $notice)
                                        <span>{{ $notice->notice }} &emsp;&emsp; | &emsp;&emsp; </span>
                                    @endforeach
                                </marquee>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="d-flex justify-content-between align-items-center pe-4">
                                <h5 class="card-header col-md-6">Complain List</h5>
                                <div class="create-new">
                                    <a href="{{ url('/login/dash') }}">
                                        <i class="bx bx-plus me-1"></i> <span class="d-none d-lg-inline-block">Add New
                                            Complain</span>
                                    </a>
                                </div>
                            </div>
                            <div class="card-datatable table-responsive">
                                <table id="myDataTable121"
                                    class="table datatables-basic table-borderless table-hover table-striped border-bottom">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Id</th>
                                            {{-- <th>Name</th> --}}
                                            {{-- <th>Email</th> --}}
                                            {{-- <th>Mobile</th> --}}
                                            <th>State</th>
                                            <th>Problem Type</th>
                                            <th class="no-sort">Status</th>
                                            <th class="no-sort">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        {{-- @if (!$complain->isEmpty()) --}}


                                        @foreach ($complain as $complains)
                                            <tr class="">
                                                <td>{{ $complains->complain_id }}</td>
                                                {{-- <td>{{ ucfirst($complains->name) }}</td> --}}
                                                {{-- <td>{{ $complains->email }}</td> --}}
                                                {{-- <td>{{ $complains->mob }}</td> --}}
                                                <td>{{ $complains->state }}</td>
                                                <td>{{ $complains->pt }}</td>
                                                <td>
                                                    @if ($complains->status == 1)
                                                        <span class="badge rounded-pill bg-label-primary">Active</span>
                                                    @elseif($complains->status == 0)
                                                        <span class="badge rounded-pill bg-label-success">Solved</span>
                                                    @elseif($complains->status == 2)
                                                        <span
                                                            class="badge rounded-pill bg-label-warning">Pending</span>
                                                    @elseif($complains->status == 3)
                                                        <span
                                                            class="badge rounded-pill bg-label-danger">Rejected</span>
                                                    @elseif($complains->status == 4)
                                                        <span class="badge rounded-pill bg-label-info">Re-opened</span>
                                                    @endif
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <div class="dropdown">
                                                        <button type="button"
                                                            class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item text-primary"
                                                                href="{{ route('detail.view', ['comp_id' => $complains->complain_id]) }}">
                                                                <i class='bx bx-show'></i> view
                                                            </a>
                                                            @if ($complains->status == 1)
                                                                <a class="dropdown-item text-danger"
                                                                    href="{{ route('complain.close', ['id' => $complains->complain_id]) }}"
                                                                    onclick="return confirm(`Are you sure you want to Close ' {{ $complains->pt }} ' ?`)">
                                                                    <i class='bx bxs-x-circle'></i> close</a>
                                                                </a>
                                                            @endif
                                                            @if ($complains->status == 0)
                                                                <button type="button"
                                                                    class="dropdown-item btn-outline-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modelReopen">
                                                                    <i class='bx bx-reset'></i>Re-open
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    {{-- ----------------model start--------------- --}}

                                                    <div class="modal fade" id="modelReopen"
                                                        data-bs-backdrop="static" data-bs-keyboard="false"
                                                        tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title"
                                                                        id="staticBackdropLabel">
                                                                        Re-open complain
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="mb-2">
                                                                        <label for=""
                                                                            class="form-label">Before you
                                                                            go please gave us feedback<span
                                                                                class="text-danger">*</span></label>
                                                                        <textarea class="form-control" name="feedback" id="" cols="60" rows="3"></textarea>
                                                                        <div class="er d-flex"
                                                                            style="position: relative; top: -21px">
                                                                            <span
                                                                                class="form-text text-danger">
                                                                                @error('feedback')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="formFileSm"
                                                                            class="form-label col-form-label">Upload
                                                                            Problem
                                                                            Image<span
                                                                                class="text-danger">*</span></label>

                                                                        <input class="form-control"
                                                                            id="fileInput" type="file"
                                                                            name="file[]" accept="Image/*"
                                                                            multiple>
                                                                        <div id="preview"></div>
                                                                        <span
                                                                            class="text-danger col-form-label-sm">
                                                                            @error('file')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-danger"
                                                                        data-bs-dismiss="modal"><i
                                                                            class="bx bx-x-circle me-1"></i>Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary"><i class='bx bx-check-circle me-1'></i>Re-open</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- -------------------model end-------------- --}}


                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- / Content -->

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
