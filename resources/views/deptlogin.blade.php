<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online complain registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
</head>

<body style="font-size: small">

    <section class="container-fluid sticky-top nvr d-flex align-items-center">
        <nav class="navbar  navbar-expand-lg">
            <div >
                <h3 class="m-auto">
                    <img src="{{ asset('/img/logo.png') }}" alt="" width="40" class="d-inline-block align-text-top">
                    Online Complain Registration
                </h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
            </div> <!-- container-fluid.// -->
        </nav>
    </section>

    <div class="container-fluid d-flex log-one" style="height: 85vh">

        <div class="container m-auto p-3 log-two d-flex justify-content-center align-items-center" style="max-height: 100vh">
            <h1 class="col text-center">Department login</h1>
            <form action="{{ url('/deptlogin') }}" method="post"
                class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label col-form-label-sm">Email address</label>
                    <input type="email" name="email" class="form-control form-control-sm" id=""
                        value="{{ old('email') }}">
                    <span class="text-danger col-form-label-sm">
                        @if (Session::has('errorEmail'))
                            <p class="text-danger">{{ Session::get('errorEmail') }}</p>
                        @endif
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label col-form-label-sm">Password</label>
                    <input type="password" name="password" class="form-control form-control-sm" id="password">
                    <i class="bi bi-eye-slash" id="togglePassword"
                        style="
                    position: relative;
                    bottom: 24px;
                    right: -30rem;"></i>
                    <span class="text-danger col-form-label-sm">
                        @if (Session::has('errorPass'))
                            <p class="text-danger">{{ Session::get('errorPass') }}</p>
                        @endif
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <div id="emailHelp" class="form-text">log in as Admin <a href="{{ url('/adlogin') }}">Login Here</a>
                    </div>
                    <div id="emailHelp" class="form-text">log in as customer <a href="{{ url('/login') }}">Login Here</a>
                    </div>
                    <div id="emailHelp" class="form-text">log in as department <a href="{{ url('/deptlogin') }}">Login
                            Here</a></div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Log in</button>
            </form>
        </div>
    </div>

    <footer class="foo container-fluid fixed-bottom justify-content-center p-1">
        <div>
            Made with 💖 &emsp;   | &emsp; ®  OCR &emsp; | &emsp;  © all rights recieved .
        </div>
    </footer>

    <script src="{{ asset('/js/login.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
</body>

</html>
