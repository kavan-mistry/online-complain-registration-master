{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>


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

                        <li class="nav-item"><a class="nav-link" href="{{ url('/deptlogin/deptdash') }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item"><a class="nav-link active">
                                <i class="bi bi-person-circle"></i> {{ ucfirst($dept_name) }} department </a>
                        </li>
                        <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                Log out</a></li>
                    </ul>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>
    </section>
    <div class="container-sm d-flex col mt-4" style="height: 100vh">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh">
            @if (session('success'))
                <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4 p-2" id="dash-head" style="background-color: lavender;">Edit Complain</h1>
                <form class="row g-1" method="post" action="{{ $url }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label col-form-label-sm">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                            value="{{ $complain->name }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label col-form-label-sm">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                            value="{{ $complain->email }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label col-form-label-sm">Address</label>
                        <input type="text" name="address" class="form-control form-control-sm" id="inputAddress"
                            placeholder="1234 Main St" value="{{ $complain->address }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label col-form-label-sm">City</label>
                        <input type="text" name="city" class="form-control form-control-sm" id="inputCity"
                            value="{{ $complain->city }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">State</label>
                        <select id="inputState" name="state" class="form-select form-select-sm" disabled>
                            <option>{{ $complain->state }}</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label col-form-label-sm">Zip</label>
                        <input type="text" name="zip" class="form-control form-control-sm" id="inputZip"
                            value="{{ $complain->zip }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('zip')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label col-form-label-sm">Contact number</label>
                        <input type="number" name="mob" class="form-control form-control-sm"
                            id="inputPassword4" value="{{ $complain->mob }}" disabled>
                        <span class="text-danger col-form-label-sm">
                            @error('mob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">Department</label>
                        <select id="inputState" name="dept" class="form-select form-select-sm" disabled>
                            <option>{{ $dept_name }}</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('dept')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                        <select id="inputState" name="pt" class="form-select form-select-sm" disabled>
                            <option>{{ $complain->pt }}</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('pt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    @if (isset($complain->opt))
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
                    @if ($reopen_complain != null)
                        <div class="col-12">
                            <label class="form-label col-form-label-sm">Feedback</label>
                            <textarea class="form-control form-control-sm" name="feedback" id="" cols="30" rows="3"
                                disabled>{{ $reopen_complain->feedback }}</textarea>
                            <span class="text-danger col-form-label-sm">
                                @error('opt')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    @endif
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label col-form-label-sm">Problem description</label>
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
                                class="img-fluid img-thumbnail" id="up-img3" alt="Complaint Image">
                        @endforeach
                    </div>
                    @if (count($reopen_images) > 0)
                        <div class="col-12 m-auto mt-3">
                            <label class="form-label col-form-label-sm">Customer Uploaded Image (Re-opened)</label>
                            @foreach ($reopen_images as $rimages)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $rimages->url)) }}"
                                    class="img-thumbnail" id="up-img3" alt="Complaint Image">
                            @endforeach
                        </div>
                    @endif
                    @if (count($dept_images) > 0)
                        <div class="col-12 m-auto mt-3">
                            <label class="form-label col-form-label-sm">Department Work Proof Image</label>
                            @foreach ($dept_images as $dimages)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $dimages->url)) }}"
                                    class="img-thumbnail" id="up-img3" alt="Complaint Image">
                            @endforeach
                        </div>
                    @endif
                    @if (isset($dept_reopen_images))
                        <div class="col-12 m-auto mt-3">
                            <label class="form-label col-form-label-sm">Department Work Proof Image (Re-opened)</label>
                            @foreach ($dept_reopen_images as $drimages)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $drimages->url)) }}"
                                    class="img-thumbnail" id="up-img3" alt="Complaint Image">
                            @endforeach
                        </div>
                    @endif
                    <div class="col-md-3">
                        <label class="form-label col-form-label-sm">Status</label>
                        <label for="" hidden>
                            {{ session()->get('status') }}
                        </label>
                        <select id="inputStateSelection" name="status" class="form-select form-select-sm"
                            onchange="showDiv(this)">
                            <option value="1" {{ old('status', $complain->status) == 1 ? 'selected' : '' }}>
                                Active</option>
                            <option value="0" {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>
                                Solved
                            </option>
                            <option value="2" {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="3" {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>
                                Rejected</option>
                            <option value="4" {{ old('status', $complain->status) == 4 ? 'selected' : '' }}>
                                Re-opened</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div id="hidden_div" style="display:none">
                        <label class="form-label col-form-label-sm">Reason for Rejection<span
                                class="text-danger">*</span></label>
                        <textarea name="rejection_reason" class="form-control form-control-sm">{{ $complain->rejection_reason }}</textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('rejection_reason')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="formFileSm" class="form-label col-form-label-sm">Update Work Of Proof</label>
                        <input class="form-control form-control-sm" name="update_file[]" id="fileInput"
                            type="file" accept="image/*" multiple> --}}
{{-- <input class="form-control form-control-sm" name="file[]" id="fileInput" type="file" 
                        accept="image/*" multiple> --}}
{{-- <span class="text-danger col-form-label-sm">
                            @error('file')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5 ms-2">
                        <div>
                            <label for="formFileSm" class="form-label col-form-label-sm">Uploaded Image
                                Preview</label>
                        </div>
                        <div id="preview"></div>
                    </div>
                    <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit
                            complain</button>
                        <a href="{{ url('/deptlogin/deptdash') }}" class="btn btn-warning ms-2"><i
                                class="bi bi-x-circle me-1"></i>Cancel</a>
                    </div>
                </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="{{ asset('/js/dept.js') }}"></script> --}}
{{-- <script src="{{ asset('/js/dash.js') }}"></script> --}}
{{-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">

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
                                        <img src="{{ asset('/img/avatars/6.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block"> {{ ucwords($dept_name) }}</span>
                                    <small class="text-muted">Department</small>
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
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <h3 class="m-0">
                                        Edit Complain
                                    </h3>
                                </div>

                            </div>
                            <!-- /Search -->

                        </div>
                    </nav>
                </form>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="row row-cols-1 row-cols-md-1 g-4 p-4 m-0">
                        <form class="row g-1" method="post" action="{{ $url }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmail4"
                                    value="{{ $complain->name }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    value="{{ $complain->email }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="inputAddress"
                                    placeholder="1234 Main St" value="{{ $complain->address }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" name="city" class="form-control" id="inputCity"
                                    value="{{ $complain->city }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" name="state" class="form-select" disabled>
                                    <option>{{ $complain->state }}</option>
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" name="zip" class="form-control" id="inputZip"
                                    value="{{ $complain->zip }}" disabled>
                                <span class="text-danger col-form-label-sm">
                                    @error('zip')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label">Contact
                                    number</label>
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
                                    <option>{{ $dept_name }}</option>
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
                                    <option>{{ $complain->pt }}</option>
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('pt')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @if (isset($complain->opt))
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
                            @if ($reopen_complain != null)
                                <div class="col-12">
                                    <label class="form-label">Feedback</label>
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
                                    description</label>
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
                                            class="img-fluid img-thumbnail" id="up-img3" alt="Complaint Image">
                                    @endforeach
                                </div>
                            </div>
                            @if (count($reopen_images) > 0)
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Customer Uploaded Image
                                        (Re-opened)</label>
                                        <div class="row">
                                    @foreach ($reopen_images as $rimages)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $rimages->url)) }}"
                                            class="img-thumbnail" id="up-img3" alt="Complaint Image">
                                    @endforeach
                                </div>
                                </div>
                            @endif
                            @if (count($dept_images) > 0)
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Department Work Proof Image</label>
                                    <div class="row">
                                    @foreach ($dept_images as $dimages)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $dimages->url)) }}"
                                            class="img-thumbnail" id="up-img3" alt="Complaint Image">
                                    @endforeach
                                </div>
                                </div>
                            @endif
                            @if (isset($dept_reopen_images))
                                <div class="col-12 m-auto mt-3">
                                    <label class="form-label">Department Work Proof Image
                                        (Re-opened)</label>
                                        <div class="row">
                                    @foreach ($dept_reopen_images as $drimages)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $drimages->url)) }}"
                                            class="img-thumbnail" id="up-img3" alt="Complaint Image">
                                    @endforeach
                                </div>
                                </div>
                            @endif
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <label for="" hidden>
                                    {{ session()->get('status') }}
                                </label>
                                <select id="inputStateSelection" name="status" class="form-select"
                                    onchange="showDiv(this)">
                                    <option value="1"
                                        {{ old('status', $complain->status) == 1 ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="0"
                                        {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>
                                        Solved
                                    </option>
                                    <option value="2"
                                        {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="3"
                                        {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>
                                        Rejected</option>
                                    <option value="4"
                                        {{ old('status', $complain->status) == 4 ? 'selected' : '' }}>
                                        Re-opened</option>
                                </select>
                                <span class="text-danger col-form-label-sm">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div id="hidden_div" style="display:none">
                                <label class="form-label">Reason for Rejection<span
                                        class="text-danger"> *</span></label>
                                <textarea name="rejection_reason" class="form-control">{{ $complain->rejection_reason }}</textarea>
                                <span class="text-danger col-form-label-sm">
                                    @error('rejection_reason')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6">
                                <label for="formFileSm" class="form-label">Update Work Of
                                    Proof</label>
                                <input class="form-control" name="update_file[]" id="fileInput" type="file"
                                    accept="image/*" multiple>
                                {{-- <input class="form-control form-control-sm" name="file[]" id="fileInput" type="file" 
                            accept="image/*" multiple> --}}
                                <span class="text-danger col-form-label-sm">
                                    @error('file')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5 ms-2">
                                <div>
                                    <label for="formFileSm" class="form-label">Uploaded Image
                                        Preview</label>
                                </div>
                                <div id="preview"></div>
                            </div>
                            <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil me-1"></i>Edit
                                    complain</button>
                                <a href="{{ url('/deptlogin/deptdash') }}" class="btn btn-danger ms-2">Cancel</a>
                            </div>
                        </form>
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
    {{-- <script src="{{ asset('/js/dash.js') }}"></script> --}}
    <script src="{{ asset('/js/dept.js') }}"></script>


</body>

</html>
