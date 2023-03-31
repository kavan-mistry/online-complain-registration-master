<!doctype html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet"
        type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <li class="nav-item"><a href="/login/edit_profile" class="nav-link active"><i class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> {{ ucwords($customer->name) }} </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ url('/login/dash') }}">
                                    <i class="bi bi-plus-lg me-1"></i>Add complain
                                </a>
                                <a class="dropdown-item" href="{{ url('/login/dash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
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


    <div class="contaier-sm main-div d-flex justify-content-center align-items-center p-3">
        <form action="{{ url('/login/edit_profile') }}" method="post">
            @csrf
            <div class="row form-group d-flex justify-content-center align-items-center">
                <div class="col-lg-6 text-center h-div">
                    <h2>
                        Edit Profile
                    </h2>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" id="" value="{{ $customer->name }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Email</label><span class="text-danger warning"> &nbsp; You must validate your email after updating it.</span>
                    <input type="email" name="email" class="form-control" id="" value="{{ $customer->email }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Mobile</label>
                    <input type="tel" name="mob" class="form-control" id="" value="{{ $customer->mob }}">
                    <div class="text-danger col-form-label-sm ff">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">New Password</label>
                    <input type="text" name="password" class="form-control" id="" >
                    <div class="text-danger col-form-label-sm ff">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2">
                    <label for="">Confirm Password</label>
                    <input type="text" name="password_confirmation" class="form-control" id="" >
                    <div class="text-danger col-form-label-sm ff">
                        @error('confirm_password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 m-2 d-flex justify-content-center gap-2 align-items-center">
                    <button name="submit" id="" class="btn btn-outline-success" type="submit"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                    <a name="cancel" id="" class="btn btn-outline-danger" href="{{ url('/login/dash') . '/view' }}" role="button"><i class="bi bi-x-circle me-1"></i>Cancel</a>
                </div>
            </div>
        </form>
    </div>



    <footer>
        <div class="foo">
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

</html>
