<!doctype html>
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
                                <i class="bi bi-person-circle"></i> {{ ucfirst($de) }} department </a>
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
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">Department</label>
                        <select id="inputState" name="dept" class="form-select form-select-sm" disabled>
                            <option>{{ $complain->dept }}</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('dept')
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
                    <div class="col-9 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Customer Uploaded Image</label>
                        @foreach ($images as $image)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img3" alt="Complaint Image">
                        @endforeach
                    </div>
                    @if (isset($complain->file_update))
                        <div class="col-6 m-auto mt-3">
                            <label class="form-label col-form-label-sm">Department Work Proof Image</label>
                            <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file_update)) }}"
                                class="img-thumbnail" id="up-img" alt="Complaint Image">
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
                                active</option>
                            <option value="0" {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>solved
                            </option>
                            <option value="2" {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>pending
                            </option>
                            <option value="3" {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>
                                rejected</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div id="hidden_div" style="display:none">
                        <label class="form-label col-form-label-sm">Reason for Rejection<span class="text-danger">*</span></label>
                        <textarea name="rejection_reason" class="form-control form-control-sm">{{ $complain->rejection_reason }}</textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('rejection_reason')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-6">
                        <label for="formFileSm" class="form-label col-form-label-sm">Update Work Of Proof</label>
                        <input class="form-control form-control-sm" name="update_file" id="formFileSm"
                            type="file" onchange="readURL(this);" accept="image/*">
                        <span class="text-danger col-form-label-sm">
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
                        <img class="img-fluid img-thumbnail" style="width: 15vw;" id="blah" src="#" />
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

    <script src="{{ asset('/js/dept.js') }}"></script>

</body>

</html>
