<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online complain registration | customer dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <section class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h2 class="display-6 text-decoration-none">Welcome,
                    {{ $customer->name }}</h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end justify-self-end" id="main_nav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item active"> <a class="nav-link  text-dark"
                                href="{{ url('/login/dash') . '/' . $cid }}">Home
                            </a> </li>
                        <li class="nav-item"><a class="nav-link  text-dark"
                                href="{{ url('/login/dash') . '/' . $cid . '/view' }}"> view
                                complain </a></li>
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
            <h2 class="text-center mb-4">online complain registration</h1>
                <form class="row g-1" method="post" action="{{ url('/login/dash') . '/' . $cid }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label col-form-label-sm">Name</label>
                        <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                            value="{{ $customer->name }}">
                        <span class="text-danger col-form-label-sm">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label col-form-label-sm">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                            value="{{ $customer->email }}">
                        <span class="text-danger col-form-label-sm">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label col-form-label-sm">Address</label>
                        <input type="text" name="address" class="form-control form-control-sm" id="inputAddress"
                            placeholder="1234 Main St">
                        <span class="text-danger col-form-label-sm">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label col-form-label-sm">City</label>
                        <input type="text" name="city" class="form-control form-control-sm" id="inputCity">
                        <span class="text-danger col-form-label-sm">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">State</label>
                        <select id="inputState" name="state" class="form-select form-select-sm">
                            <option selected value="0">Choose...</option>
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
                        <input type="text" name="zip" class="form-control form-control-sm" id="inputZip">
                        <span class="text-danger col-form-label-sm">
                            @error('zip')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                        <select id="inputState" name="pt" class="form-select form-select-sm">
                            <option selected value="0">Choose...</option>
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
                        <label for="inputStateDept" class="form-label col-form-label-sm">Department</label>
                        <input type="hidden" id="inputStateDept" name="dept" value="">
                        <select id="inputStateDeptVisible" class="form-select form-select-sm">
                            <option selected value="0">Choose...</option>
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

                    <script>
                        $(function() {
                            var inputStatePt = $('#inputState[name="pt"]');
                            var inputStateDeptVisible = $('#inputStateDeptVisible');
                            var inputStateDept = $('#inputStateDept');
                    
                            inputStatePt.on('change', function() {
                                switch ($(this).val()) {
                                    case 'water leakage':
                                        inputStateDeptVisible.val('water').attr('disabled', true);
                                        inputStateDept.val('water');
                                        break;
                                    case 'electric wire brokan':
                                        inputStateDeptVisible.val('electricity').attr('disabled', true);
                                        inputStateDept.val('electricity');
                                        break;
                                    case 'dranage problem':
                                        inputStateDeptVisible.val('disaster').attr('disabled', true);
                                        inputStateDept.val('disaster');
                                        break;
                                    default:
                                        inputStateDeptVisible.val('0').attr('disabled', false);
                                        inputStateDept.val('');
                                        break;
                                }
                            });
                        });
                    </script>

                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label col-form-label-sm">Contact number</label>
                        <input type="number" name="mob" class="form-control form-control-sm"
                            id="inputPassword4" value="{{ $customer->mob }}">
                        <span class="text-danger col-form-label-sm">
                            @error('mob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label col-form-label-sm">Problem description</label>
                        <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                            id="floatingTextarea2" style="height: 100px"></textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('pd')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12">
                        <label for="formFileSm" class="form-label col-form-label-sm">file input</label>
                        <input class="form-control form-control-sm" name="file" id="formFileSm" type="file"
                            accept="image/*">
                        <span class="text-danger col-form-label-sm">
                            @error('file')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit complain</button>
                    </div>
                </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
