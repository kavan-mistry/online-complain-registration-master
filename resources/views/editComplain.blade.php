<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>
    <section class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h2 class="display-6 text-decoration-none">Welcome, Admin</h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end justify-self-end" id="main_nav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link  text-dark" href="{{ url('/adlogin/addash/view') }}">
                                complain list </a></li>
                        <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                href="{{ url('/logout') }}" role="button">Log
                                out</a></li>
                    </ul>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>
    </section>
    <div class="container-sm d-flex col" style="height: 100vh">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh">
            @if (session('success'))
                <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4 p-2" style="background-color: lavender;">Edit Complain</h2>
            <form class="row g-1" method="post" action="{{ $url }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->name }}">
                    <span class="text-danger col-form-label-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->email }}">
                    <span class="text-danger col-form-label-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label col-form-label-sm">Address</label>
                    <input type="text" name="address" class="form-control form-control-sm" id="inputAddress"
                        placeholder="1234 Main St" value="{{ $complain->address }}">
                    <span class="text-danger col-form-label-sm">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label col-form-label-sm">City</label>
                    <input type="text" name="city" class="form-control form-control-sm" id="inputCity"
                        value="{{ $complain->city }}">
                    <span class="text-danger col-form-label-sm">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">State</label>
                    <select id="inputState" name="state" class="form-select form-select-sm">
                        @foreach (['Gujarat', 'Rajasthan', 'panjab'] as $state)
                            <option value="{{ $state }}" {{ $complain->state == $state ? 'selected' : '' }}>
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
                    <label for="inputZip" class="form-label col-form-label-sm">Zip</label>
                    <input type="text" name="zip" class="form-control form-control-sm" id="inputZip"
                        value="{{ $complain->zip }}">
                    <span class="text-danger col-form-label-sm">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                    <select id="inputState" name="pt" class="form-select form-select-sm">
                        @foreach (['water leakage', 'electric wire brokan', 'dranage problem'] as $pt)
                            <option value="{{ $pt }}" {{ $complain->pt == $pt ? 'selected' : '' }}>
                                {{ $pt }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('pt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">Department</label>
                    <select id="inputState" name="dept" class="form-select form-select-sm">
                        @foreach (['water', 'electricity', 'disaster'] as $dept)
                            <option value="{{ $dept }}" {{ $complain->dept == $dept ? 'selected' : '' }}>
                                {{ $dept }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('dept')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label col-form-label-sm">Contact number</label>
                    <input type="number" name="mob" class="form-control form-control-sm" id="inputPassword4"
                        value="{{ $complain->mob }}">
                    <span class="text-danger col-form-label-sm">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label col-form-label-sm">Problem description</label>
                    <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                        id="floatingTextarea2" style="height: 100px">{{ $complain->pd }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('pd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-6 m-auto m-3">
                    <label class="form-label col-form-label-sm">uploaded Image</label>
                    <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file)) }}"
                        class="img-thumbnail" alt="Complaint Image">
                </div>
                @if (isset($complain->file_update))
                    <div class="col-6 m-auto mt-3">
                        <label class="form-label col-form-label-sm">updated Image</label>
                        <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file_update)) }}"
                            class="img-thumbnail" alt="Complaint Image">
                    </div>
                @endif
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Status</label>
                    <select id="inputState" name="status" class="form-select form-select-sm">
                        <option value="1" {{ $complain->status == 1 ? 'selected' : '' }}>active</option>
                        <option value="0" {{ $complain->status == 0 ? 'selected' : '' }}>solved</option>
                        <option value="2" {{ $complain->status == 2 ? 'selected' : '' }}>pending</option>
                        <option value="3" {{ $complain->status == 3 ? 'selected' : '' }}>rejected</option>
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Edit complain</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
