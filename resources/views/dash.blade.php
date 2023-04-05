<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online complain registration | customer dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> --}}
    {{-- <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>     --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
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
                                <a href="/login/edit_profile" class="dropdown-item"><i class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>
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

    <div class="container-sm d-flex col">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh;">

            <h2 class="text-center mb-4 p-2" id="dash-head" style="background-color: lavender;">Register your complain
            </h2>
            <form class="row g-1" method="post" action="{{ url('/login/dash') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $customer->name }}">
                    <span class="text-danger col-form-label-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Email<span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $customer->email }}">
                    <span class="text-danger col-form-label-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label col-form-label-sm">Address<span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control form-control-sm add-place" id="inputAddress"
                        placeholder="1234 Main St" value="{{ old('address') }}">
                    <span class="text-danger col-form-label-sm">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label col-form-label-sm">City<span class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control form-control-sm" id="inputCity"
                        value="{{ old('city') }}">
                    <span class="text-danger col-form-label-sm">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">State<span class="text-danger">*</span></label>
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
                    <label for="inputZip" class="form-label col-form-label-sm">Zip<span class="text-danger">*</span></label>
                    <input type="text" name="zip" class="form-control form-control-sm" id="inputZip"
                        value="{{ old('zip') }}">
                    <span class="text-danger col-form-label-sm">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label class="form-label col-form-label-sm">Problem type<span class="text-danger">*</span></label>
                    
                    <select name="pt" class="form-select form-select-sm">
                        <option value="">Choose...</option>
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
                


                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label col-form-label-sm">Contact number<span class="text-danger">*</span></label>
                    <input type="number" name="mob" class="form-control form-control-sm" id="inputPassword4"
                        value="{{ $customer->mob }}">
                    <span class="text-danger col-form-label-sm">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label col-form-label-sm">Problem description<span class="text-danger">*</span></label>
                    <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                        id="floatingTextarea2" style="height: 100px">{{ old('pd') }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('pd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-6">
                    <label for="formFileSm" class="form-label col-form-label-sm">Upload Problem Image<span class="text-danger">*</span></label>
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
                    </div>
                    {{-- <img class="img-fluid img-thumbnail" style="width: 15vw;" id="blah" src="#"  /> --}}
                    <div id="preview"></div>
                    {{-- <ul id="image-list"></ul> --}}
                </div>
                <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-arrow-up-circle me-1"></i>Submit complain</button>
                    <a name="" id="" class="btn btn-danger ms-2"
                                        href="{{ url('/login/dash/view') }}" role="button"><i class="bi bi-x-circle me-1"></i>Cancel</a>
                </div>
            </form>
        </div>
    </div>

    {{-- <footer class="foo container-fluid justify-content-center p-1">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer> --}}

    <script src="{{ asset('/js/dash.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
