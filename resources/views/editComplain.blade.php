<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/adlogin/addash/view') }}">view complain</a>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <a name="" id="" class="btn btn-danger" href="{{ url('/logout') }}"
                        role="button">Log out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-sm d-flex col" style="height: 100vh">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh">
            @if (session('success'))
                <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4">edit complain</h1>
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
                            <option>{{ $complain->state}}</option>
                            <option>Gujarat</option>
                            <option>Rajasthan</option>
                            <option>panjab</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label col-form-label-sm">Zip</label>
                        <input type="text" name="zip" class="form-control form-control-sm" id="inputZip" value="{{ $complain->zip}}">
                        <span class="text-danger col-form-label-sm">
                            @error('zip')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                        <select id="inputState" name="pt" class="form-select form-select-sm">
                            <option>{{ $complain->pt}}</option>
                            <option>water leakage</option>
                            <option>electric wire brokan</option>
                            <option>dranage problem</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('pt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">Department</label>
                        <select id="inputState" name="dept" class="form-select form-select-sm" value>
                            <option>{{ $complain->dept}}</option>
                            <option>water</option>
                            <option>electricity</option>
                            <option>disaster</option>
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
                            id="inputPassword4" value="{{ $complain->mob}}">
                        <span class="text-danger col-form-label-sm">
                            @error('mob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label col-form-label-sm">Problem description</label>
                        <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                            id="floatingTextarea2" style="height: 100px" >{{ $complain->pd}}</textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('pd')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 m-3">
                        <label class="form-label col-form-label-sm">uploaded Image</label>
                        <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file)) }}"
                            class="img-thumbnail" alt="Complaint Image">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label col-form-label-sm">Status</label>
                        <select id="inputState" name="status" class="form-select form-select-sm">
                            <option>{{ $complain->status}}</option>
                            <option>1</option>
                            <option>0</option>
                        </select>
                        <span class="text-danger col-form-label-sm">
                            @error('state')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 mt-3 d-flex justify-content-center">
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
