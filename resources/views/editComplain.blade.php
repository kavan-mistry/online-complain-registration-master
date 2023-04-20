{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
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
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/adlogin/addash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> Admin </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ url('/adlogin/addash/problem_list') }}" class="dropdown-item"><i
                                        class="bi bi-exclamation-circle me-1"></i>Problem list</a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list') }}"><i
                                        class="bi bi-people-fill me-1"></i></i>Customer list </a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                                    <i class="bi bi-person-fill-slash me-1"></i>Blocked Customer list </a>
                                <a href="/adlogin/addash/department" class="dropdown-item"><i
                                        class="bi bi-gear-fill me-1"></i>Department</a>
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
    <div class="container-sm d-flex col">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh">
            @if (session('success'))
                <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4 p-2" id="dash-head" style="background-color: lavender;">Edit Complain</h2>
            <form class="row g-1" method="post" action="{{ $url }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Name<span
                            class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->name }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Email<span
                            class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->email }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label col-form-label-sm">Address<span
                            class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control form-control-sm" id="inputAddress"
                        placeholder="1234 Main St" value="{{ $complain->address }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label col-form-label-sm">City<span
                            class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control form-control-sm" id="inputCity"
                        value="{{ $complain->city }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">State<span
                            class="text-danger">*</span></label>
                    <select id="inputState" name="state" class="form-select form-select-sm" disabled>
                        <option selected value="0">Choose...</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}"
                                {{ old('state', $complain->state) == $state ? 'selected' : '' }}>
                                {{ $state }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label col-form-label-sm">Zip<span
                            class="text-danger">*</span></label>
                    <input type="text" name="zip" class="form-control form-control-sm" id="inputZip"
                        value="{{ $complain->zip }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label col-form-label-sm">Contact number<span
                            class="text-danger">*</span></label>
                    <input type="number" name="mob" class="form-control form-control-sm" id="inputPassword4"
                        value="{{ $complain->mob }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">Department</label>
                    <select id="inputState" name="dept" class="form-select form-select-sm" disabled> --}}
{{-- @foreach ($complain->department_id as $dept) --}}
{{-- <option value="{{ $dept_name }}">
                            {{ $dept_name }}</option> --}}
{{-- @endforeach --}}
{{-- </select>
                    <span class="text-danger col-form-label-sm">
                        @error('dept')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                    <select id="inputState" name="pt" class="form-select form-select-sm" disabled> --}}
{{-- <option selected value="0">Choose...</option> --}}
{{-- @foreach ($problem_types as $p_t) --}}
{{-- <option value="{{ $complain->pt }}">{{ $complain->pt }}</option> --}}
{{-- @endforeach --}}
{{-- </select>
                    <span class="text-danger col-form-label-sm">
                        @error('pt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (!empty($complain->opt))
                <div class="col-md-4">
                    <label class="form-label col-form-label-sm">Specified problem<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="opt" id=""
                        value="{{ $complain->opt }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('opt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @endif
                @if (!empty($reopen_complain->feedback))
                    <div class="col-12">
                        <label class="form-label col-form-label-sm">Feedback</label> --}}
{{-- <input type="text" class="form-control form-control-sm" name="feedback" id="" value = "{{$reopen_complain->feedback}}" disabled> --}}
{{-- <textarea class="form-control form-control-sm" name="feedback" id="" cols="30" rows="3"
                            disabled>{{ $reopen_complain->feedback }}</textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('opt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif
                <div class="col-12">
                    <label for="inputAddress2" class="form-label col-form-label-sm">Problem description<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                        id="floatingTextarea2" style="height: 100px" disabled>{{ $complain->pd }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('pd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12 m-auto mt-3">
                    <label class="form-label col-form-label-sm">Customer Uploaded Image</label>
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                            class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                    @endforeach
                </div>
                @if (count($reopen_images) > 0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Customer Uploaded Image (Re-opened)</label>
                        @foreach ($reopen_images as $rimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                @if (count($dept_images) > 0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Department Work Proof Image</label>
                        @foreach ($dept_images as $dimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                @if (count($dept_reopen_images) > 0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Department Work Proof Image (Re-opened)</label>
                        @foreach ($dept_reopen_images as $drimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Status</label>
                    <select id="inputState" name="status" class="form-select form-select-sm"
                        onchange="showDiv(this)">
                        <option value="1" {{ old('status', $complain->status) == 1 ? 'selected' : '' }}>Active
                        </option>
                        <option value="0" {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>Solved
                        </option>
                        <option value="2" {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>Pending
                        </option>
                        <option value="3" {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>Rejected
                        </option>
                        <option value="4" {{ old('status', $complain->status) == 4 ? 'selected' : '' }}>Re-opened
                        </option>
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div id="hidden_div" style="display: none">
                    <label class="form-label col-form-label-sm">Reason for Rejection<span
                            class="text-danger">*</span></label>
                    <textarea name="rejection_reason" class="form-control form-control-sm col-2 ">{{ $complain->rejection_reason }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('rejection_reason')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row-2 mt-3 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil me-2"></i>Edit
                        complain</button>
                    <a name="" id="" class="btn btn-danger ms-2"
                        href="{{ url('/adlogin/addash/view') }}" role="button"><i
                            class="bi bi-caret-left-fill me-1"></i>
                        Back</a></li>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 3) {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
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

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
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
                    <li class="menu-item active">
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
                    <li class="menu-item">
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
                                Edit Complain
                            </h3>
                        </div>

                    </div>

                </nav>


                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <form class="row g-1" method="post" action="{{ $url }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="inputEmail4"
                                    value="{{ $complain->name }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    value="{{ $complain->email }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" id="inputAddress"
                                    placeholder="1234 Main St" value="{{ $complain->address }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control" id="inputCity"
                                    value="{{ $complain->city }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">State<span
                                        class="text-danger">*</span></label>
                                <select id="inputState" name="state" class="form-select" disabled>
                                    <option selected value="0">Choose...</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}"
                                            {{ old('state', $complain->state) == $state ? 'selected' : '' }}>
                                            {{ $state }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="zip" class="form-control" id="inputZip"
                                    value="{{ $complain->zip }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('zip')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label">Contact number<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="mob" class="form-control" id="inputPassword4"
                                    value="{{ $complain->mob }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('mob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Department</label>
                                <select id="inputState" name="dept" class="form-select" disabled>
                                    {{-- @foreach ($complain->department_id as $dept) --}}
                                    <option value="{{ $dept_name }}">{{ $dept_name }}</option>
                                    {{-- @endforeach --}}
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('dept')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">problem type</label>
                                <select id="inputState" name="pt" class="form-select" disabled>
                                    {{-- <option selected value="0">Choose...</option> --}}
                                    {{-- @foreach ($problem_types as $p_t) --}}
                                    <option value="{{ $complain->pt }}">{{ $complain->pt }}</option>
                                    {{-- @endforeach --}}
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('pt')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @if (!empty($complain->opt))
                                <div class="col-md-4">
                                    <label class="form-label">Specified problem<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="opt" id=""
                                        value="{{ $complain->opt }}" disabled>
                                    <span class="text-danger col-form-label-sm">
                                        @error('opt')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            @endif
                            @if (!empty($reopen_complain->feedback))
                                <div class="col-12">
                                    <label class="form-label">Feedback</label>
                                    {{-- <input type="text" class="form-control form-control-sm" name="feedback" id="" value = "{{$reopen_complain->feedback}}" disabled> --}}
                                    <textarea class="form-control" name="feedback" id="" cols="30" rows="3" disabled>{{ $reopen_complain->feedback }}</textarea>
                                    <span class="text-danger col-form-label-sm">
                                        @error('opt')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            @endif
                            <div class="col-12">
                                <label for="inputAddress2" class="form-label">Problem
                                    description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="pd" placeholder="Write a problem here" id="floatingTextarea2"
                                    style="height: 100px" disabled>{{ $complain->pd }}</textarea>
                                <span class="text-danger col-form-label-sm">
                                    @error('pd')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 m-auto mt-3">
                                <label class="form-label">Customer Uploaded Image</label>
                                <div class="row">
                                    @foreach ($images as $image)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                                            class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                                    @endforeach
                                </div>
                            </div>
                            @if (count($reopen_images) > 0)
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Customer Uploaded Image
                                        (Re-opened)</label>
                                    <div class="row">
                                        @foreach ($reopen_images as $rimage)
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if (count($dept_images) > 0)
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Department Work Proof Image</label>
                                    <div class="row">
                                        @foreach ($dept_images as $dimage)
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            @if (count($dept_reopen_images) > 0)
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Department Work Proof Image
                                        (Re-opened)</label>
                                    <div class="row">
                                        @foreach ($dept_reopen_images as $drimage)
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <label for="inputEmail4" class="form-label">Status</label>
                                <select id="inputState" name="status" class="form-select" onchange="showDiv(this)">
                                    <option value="1"
                                        {{ old('status', $complain->status) == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>Solved
                                    </option>
                                    <option value="2"
                                        {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="3"
                                        {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>Rejected
                                    </option>
                                    <option value="4"
                                        {{ old('status', $complain->status) == 4 ? 'selected' : '' }}>Re-opened
                                    </option>
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div id="hidden_div" style="display: none">
                                <label class="form-label">Reason for Rejection<span
                                        class="text-danger">*</span></label>
                                <textarea name="rejection_reason" class="form-control col-2 ">{{ $complain->rejection_reason }}</textarea>
                                <span class="text-danger col-form-label-sm">
                                    @error('rejection_reason')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="row-2 mt-3 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil me-2"></i>Edit
                                    complain</button>
                                <a name="" id="" class="btn btn-danger ms-2"
                                    href="{{ url('/adlogin/addash/view') }}" role="button"><i
                                        class="bi bi-caret-left-fill me-1"></i>
                                    Back</a></li>
                            </div>
                        </form>

                    </div>

                    <!--/ Content -->
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

    <script src="{{ asset('/js/admin.js') }}"></script>
    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 3) {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
    </script>

</body>

</html>
