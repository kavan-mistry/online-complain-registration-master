{{-- <!doctype html>
<html lang="en">

<head>
    <title>bloked customer list</title>
    @notifyCss
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}"> --}}

{{-- data table --}}
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
</head>

<body>

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
                        <li class="nav-item "><a class="nav-link active"
                                href="{{ url('/adlogin/addash/customer_list_blocked') }}"><i
                                    class="bi bi-people-fill me-1"></i></i>Blocked Customer list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> Admin </a>
                            <div class="dropdown-menu dropdown-menu-end"> --}}
{{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-envelope-exclamation me-1"></i>Change Email</a> --}}
{{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-arrow-clockwise me-1"></i>Change password</a> --}}
{{-- <a class="dropdown-item" href="{{ url('/adlogin/addash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list') }}"><i
                                        class="bi bi-people-fill me-1"></i></i>Customer list </a>
                                <a href="/adlogin/addash/department" class="dropdown-item"><i
                                        class="bi bi-gear-fill me-1"></i>Department</a>
                                <a href="{{ url('/adlogin/addash/problem_list') }}" class="dropdown-item"><i
                                        class="bi bi-exclamation-circle me-1"></i>Problem list</a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"
                                    class="dropdown-item"><i class="bi bi-unlock me-1"></i>Edit password</a>
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

    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs --}}

{{-- ------- edit password model ------ --}}

{{-- <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('/adlogin/addash/change_pass') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <i class="bi bi-eye-slash" id="togglePassword"
                                style="
                                position: relative;
                                bottom: 30px;
                                right: -27rem;"></i>
                            <div class="er d-flex" style="position: relative; top: -21px">
                                <span class="form-text text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Confirm new password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password2">
                            <i class="bi bi-eye-slash" id="togglePassword2"
                                style="
                                position: relative;
                                bottom: 30px;
                                right: -27rem;"></i>
                            <div class="er d-flex" style="position: relative; top: -21px">
                                <span class="form-text text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-circle me-1"></i>Cancel</button>
                        <button type="submit" class="btn btn-success"><i
                                class="bi bi-check2-circle me-1"></i>Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

{{-- --------- end edit password model ---------- --}}


{{-- <div class="container-sm position-relative table-z">
        <div class="table-responsive mt-4" style="width: 100%;">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Varified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                        @foreach ($customers as $customer)
                            <tr class="">
                                <td>{{ $customer->customer_id }}</td>
                                <td>{{ ucfirst($customer->name) }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->mob }}</td>
                                <td>
                                    @if ($customer->is_verified == 1)
                                        <span class="badge text-bg-success">Yes</span>
                                    @else
                                        <span class="badge text-bg-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="container gap-2 d-flex">
                                        <a href="{{ route('customer.unblock', ['id' => $customer->customer_id]) }}"
                                            onclick="return confirm(`Are you sure you want to Unblock customer ?
Id : {{ $customer->customer_id }}
Name : {{ $customer->name }} `)">
                                            <button type="button" class="btn btn-sm btn-outline-warning"><i
                                                    class="bi bi-person-check-fill me-1"></i></i>Unblock</button></a>
                                        <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}"
                                            onclick="return confirm(`Are you sure you want to Delete customer ?
Id : {{ $customer->customer_id }}
Name : {{ $customer->name }} `)">
                                            <button type="button" class="btn btn-sm btn-outline-danger"><i
                                                    class="bi bi-person-x-fill me-1"></i>Delete</button></a>
                                    </div>
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
    </footer> --}}

{{-- jquery --}}
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> --}}

{{-- data tables --}}
{{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/js/admin.js') }}"></script> --}}

<!-- Bootstrap JavaScript Libraries -->
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
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
                                        <img src="{{ asset('/img/avatars/7.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">Admin</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/adlogin/addash/view') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/adlogin/addash/problem_list') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-error-circle'></i>Problem list</a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url('/adlogin/addash/customer_list') }}">
                            <i class='menu-icon tf-icons bx bxs-group'></i>Customer list </a>
                    </li>
                    <li class="menu-item active">
                        <a class="menu-link" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                            <i class='menu-icon tf-icons bx bx-block'></i>Blocked Customer list </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="{{ url('/adlogin/addash/notices') }}">
                            <i class='menu-icon tf-icons bx bx-sticker'></i>Notices </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/adlogin/addash/department') }}" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-cog'></i>Department</a>
                    </li>
                    <li class="menu-item">
                        <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" class="menu-link">
                            <i class='menu-icon tf-icons bx bxs-lock-open'></i>Edit password</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ url('/logout') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-power-off"></i>Log out</a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Modal HTML Markup -->
            <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ url('/adlogin/addash/change_pass') }}" method="post">
                            @csrf
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <i class="bi bi-eye-slash" id="togglePassword"
                                        style="
                        position: relative;
                        bottom: 30px;
                        right: -27rem;"></i>
                                    <div class="er d-flex" style="position: relative; top: -21px">
                                        <span class="form-text text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Confirm new password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password2">
                                    <i class="bi bi-eye-slash" id="togglePassword2"
                                        style="
                        position: relative;
                        bottom: 30px;
                        right: -27rem;"></i>
                                    <div class="er d-flex" style="position: relative; top: -21px">
                                        <span class="form-text text-danger">
                                            @error('password_confirmation')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                        class="bx bx-x-circle"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"><i class="bx bx-check-circle"></i>
                                    Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- ------ model end ------ --}}

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

                    <div class="navbar-nav-right d-flex align-items-center justify-content-center gap-3"
                        id="navbar-collapse">

                        <div class="nav-item d-flex align-items-center">
                            <h3 class="m-0">
                                Customer list
                            </h3>
                        </div>

                    </div>
                </nav>


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-fluid flex-grow-1 container-p-y">

                        <div class="card mt-4">
                            <div class="card-datatable table-responsive">
                                <table
                                    class="table datatables-basic table-borderless table-hover table-striped border-bottom"
                                    id="myTable">

                                    <thead class="table-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Varified</th>
                                            <th class="no-sort text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($customers as $customer)
                                            <tr class="">
                                                <td>{{ $customer->customer_id }}</td>
                                                <td>{{ ucfirst($customer->name) }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->mob }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        @if ($customer->is_verified == 1)
                                                            <span class="badge bg-success">Yes</span>
                                                        @else
                                                            <span class="badge bg-danger">No</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="container gap-2 d-flex justify-content-center">
                                                        <a href="{{ route('customer.unblock', ['id' => $customer->customer_id]) }}"
                                                            onclick="return confirm(`Are you sure you want to Unblock customer ?
                    Id : {{ $customer->customer_id }}
                    Name : {{ $customer->name }} `)">
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-warning"><i class='bx bxs-user-check'></i> Unblock</button></a>
                                                        <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }}"
                                                            onclick="return confirm(`Are you sure you want to Delete customer ?
                    Id : {{ $customer->customer_id }}
                    Name : {{ $customer->name }} `)">
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-danger"><i class='bx bxs-trash' ></i>Delete</button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/ Content -->
                </div>
                <!--/ Content wrapper -->
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

    <script src="{{ asset('/js/admin.js') }}"></script>


</body>

</html>
