{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online complain registration | customer dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

{{-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> --}}
{{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> --}}
{{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>     --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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
                        <li class="nav-item active"> <a class="nav-link active" href="{{ url('/login/dash') }}">
                                <i class="bi bi-plus-lg me-1"></i>Add complain
                            </a> </li>

                        <li class="nav-item"><a class="nav-link" href="{{ url('/login/dash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> {{ ucwords($customer->name) }} </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="/login/edit_profile" class="dropdown-item"><i
                                        class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>
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
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh;">

            <h2 class="text-center mb-4 p-2" id="dash-head" style="background-color: lavender;">Register your complain
            </h2>
            <form class="row g-1" method="post" action="{{ url('/login/dash') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Name<span
                            class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $customer->name }}">
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
                        value="{{ $customer->email }}">
                    <span class="text-danger col-form-label-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label col-form-label-sm">Address<span
                            class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control form-control-sm add-place"
                        id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
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
                        value="{{ old('city') }}">
                    <span class="text-danger col-form-label-sm">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">State<span
                            class="text-danger">*</span></label>
                    <select id="inputState" name="state" class="form-select form-select-sm">
                        <option selected value="0">Choose...</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}" {{ old('state') == $state ? 'selected' : '' }}>
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
                        value="{{ old('zip') }}">
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
                        value="{{ $customer->mob }}">
                    <span class="text-danger col-form-label-sm">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label-sm">Problem type<span class="text-danger">*</span></label>

                    <select name="pt" class="form-select form-select-sm" onchange="showDiv(this)">
                        <option value="0">Choose...</option>

                        @foreach ($problem_types as $p_t)
                            <option value="{{ $p_t->problems }}" {{ old('pt') == $p_t->problems ? 'selected' : '' }}>
                                {{ $p_t->problems }}
                            </option>
                        @endforeach
                    </select>

                    <span class="text-danger col-form-label-sm">
                        @error('pt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                @if (old('pt') == 'Other')
                    <div class="col-md-4" id="hidden_div">
                        <label class="form-label col-form-label-sm">Specify your other problem<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="opt" value="{{old('opt')}}">
                        <span class="text-danger col-form-label-sm">
                            @error('opt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @else
                    <div class="col-md-4" id="hidden_div" style="display:none">
                        <label class="form-label col-form-label-sm">Specify your other problem<span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-sm" name="opt" id="">
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
                        id="floatingTextarea2" style="height: 100px">{{ old('pd') }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('pd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-6">
                    <label for="formFileSm" class="form-label col-form-label-sm">Upload Problem Image<span
                            class="text-danger">*</span></label>
                    <input class="form-control form-control-sm" name="file[]" id="fileInput" type="file"
                        accept="image/*" multiple>
                    <span class="text-danger col-form-label-sm">
                        @error('file')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-5 ms-2">
                    <div>
                        <label for="formFileSm" class="form-label col-form-label-sm">Uploaded Image Preview</label>
                    </div> --}}
{{-- <img class="img-fluid img-thumbnail" style="width: 15vw;" id="blah" src="#"  /> --}}
{{-- <div id="preview"></div> --}}
{{-- <ul id="image-list"></ul> --}}
{{-- </div>
                <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-up-circle me-1"></i>Submit
                        complain</button>
                    <a name="" id="" class="btn btn-danger ms-2"
                        href="{{ url('/login/dash/view') }}" role="button"><i
                            class="bi bi-x-circle me-1"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div> --}}

{{-- <footer class="foo container-fluid justify-content-center p-1">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer> --}}

{{-- <script src="{{ asset('/js/dash.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
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
                    <li class="menu-item">
                        <a href="{{ url('/login/dash/view') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                                    Add New Complain
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
                    <div class="row row-cols-1 row-cols-md-1 g-4 p-5 m-0">
                        <form class="row g-1" method="post" action="{{ url('/login/dash') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control"
                                    id="inputEmail4" value="{{ $customer->name }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label ">Email<span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control"
                                    id="inputEmail4" value="{{ $customer->email }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label ">Address<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control add-place"
                                    id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">City<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="city" class="form-control"
                                    id="inputCity" value="{{ old('city') }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">State<span
                                        class="text-danger">*</span></label>
                                <select id="inputState" name="state" class="form-select">
                                    <option selected value="0">Choose...</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}"
                                            {{ old('state') == $state ? 'selected' : '' }}>
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
                                <label for="inputZip" class="form-label ">Zip<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="zip" class="form-control"
                                    id="inputZip" value="{{ old('zip') }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('zip')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label">Contact number<span
                                        class="text-danger">*</span></label>
                                <input type="number" name="mob" class="form-control"
                                    id="inputPassword4" value="{{ $customer->mob }}">
                                <span class="text-danger col-form-label-sm">
                                    @error('mob')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label ">Problem type<span
                                        class="text-danger">*</span></label>

                                <select name="pt" class="form-select" onchange="showDiv(this)">
                                    <option value="0">Choose...</option>

                                    @foreach ($problem_types as $p_t)
                                        <option value="{{ $p_t->problems }}"
                                            {{ old('pt') == $p_t->problems ? 'selected' : '' }}>
                                            {{ $p_t->problems }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="text-danger col-form-label-sm">
                                    @error('pt')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            @if (old('pt') == 'Other')
                                <div class="col-md-4" id="hidden_div">
                                    <label class="form-label">Specify your other problem<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="opt"
                                        value="{{ old('opt') }}">
                                    <span class="text-danger col-form-label-sm">
                                        @error('opt')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            @else
                                <div class="col-md-4" id="hidden_div" style="display:none">
                                    <label class="form-label ">Specify your problem<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="opt"
                                        id="">
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
                                <textarea class="form-control " name="pd" placeholder="Write a problem here"
                                    id="floatingTextarea2" style="height: 100px">{{ old('pd') }}</textarea>
                                <span class="text-danger col-form-label-sm">
                                    @error('pd')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6">
                                <label for="formFileSm" class="form-label ">Upload Problem Image<span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="file[]" id="fileInput"
                                    type="file" accept="image/*" multiple>
                                <span class="text-danger col-form-label-sm">
                                    @error('file')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5 ms-2">
                                <div>
                                    <label for="formFileSm" class="form-label ">Uploaded Image
                                        Preview</label>
                                </div>
                                {{-- <img class="img-fluid img-thumbnail" style="width: 15vw;" id="blah" src="#"  /> --}}
                                <div id="preview"></div>
                                {{-- <ul id="image-list"></ul> --}}
                            </div>
                            <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"><i
                                        class="bi bi-arrow-up-circle me-1"></i>Submit
                                    complain</button>
                                <a name="" id="" class="btn btn-danger ms-2"
                                    href="{{ url('/login/dash/view') }}" role="button">Cancel</a>
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
    <script src="{{ asset('/js/dash.js') }}"></script>


</body>

</html>
