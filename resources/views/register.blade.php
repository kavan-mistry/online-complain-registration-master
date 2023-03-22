<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online complain registration</title>

    {{-- google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://unpkg.com/typed.js@2.0.132/dist/typed.umd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <style>
        #forimg {

            background-image: url("{{ asset('/img/bg.avif') }}");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: left;
        }
    </style>

</head>
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
<body style="font-size: small">
    <div class="container-fluid reg-show d-flex justify-content-center align-items-center text-align-right"
        id="forimg">
        <h1 class="text-align-center title-h1">Online Complain Registration</h1>
    </div>
    <div class="km"> <span id="element"></span></div>
    <div class="km2">
        <a type="button" href="#reg-two" class="btn btn-outline-warning">Register Now</a>
    </div>
    <a href="#reg-two">
        <div class="ico animated">

            <div class="circle circle-top"></div>
            <div class="circle circle-main"></div>
            <div class="circle circle-bottom"></div>

            <svg class="svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 612"
                style="enable-background:new 0 0 612 612;" xml:space="preserve">
                <defs>
                    <clipPath id="cut-off-arrow">
                        <circle cx="306" cy="306" r="287" />
                    </clipPath>

                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                        <feColorMatrix in="blur" mode="matrix"
                            values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                        <feBlend in="SourceGraphic" in2="goo" />
                    </filter>

                </defs>
                <path class="st-arrow"
                    d="M317.5,487.6c0.3-0.3,0.4-0.7,0.7-1.1l112.6-112.6c6.3-6.3,6.3-16.5,0-22.7c-6.3-6.3-16.5-6.3-22.7,0
                          l-86,86V136.1c0-8.9-7.3-16.2-16.2-16.2c-8.9,0-16.2,7.3-16.2,16.2v301.1l-86-86c-6.3-6.3-16.5-6.3-22.7,0
                          c-6.3,6.3-6.3,16.5,0,22.7l112.7,112.7c0.3,0.3,0.4,0.7,0.7,1c0.5,0.5,1.2,0.5,1.7,0.9c1.7,1.4,3.6,2.3,5.6,2.9
                          c0.8,0.2,1.5,0.4,2.3,0.4C308.8,492.6,313.8,491.3,317.5,487.6z" />
            </svg>
        </div>
    </a>
    <div class="container-fluid d-flex mb-3 reg-two" id="reg-two" style="height: 110vh">
        <div class="container m-auto p-auto d-flex justify-content-center align-items-center row reg-three p-3"
            style="max-height: 100vh">
            <h1 class="col ms-5">Customer Registration</h1>


            <form action="{{ url('/') }}" method="post" name="reg-form" onsubmit="return validateForm()"
                class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                @csrf
                <div class="mb-2">
                    <label for="" class="form-label col-form-label-sm">Name</label>
                    <input type="text" name="name" class="form-control form-control-sm"
                        value="{{ old('name') }}">
                    <div class="error">
                        <span class="text-danger col-form-label-sm" id="firstNameError"></span>
                        <span class="text-danger col-form-label-sm">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label col-form-label-sm">Email address</label>
                    <input type="email" name="email" class="form-control form-control-sm"
                        value="{{ old('email') }}">
                    <div class="error">
                        <span class="text-danger col-form-label-sm" id="emailError"></span>
                        <span class="text-danger col-form-label-sm">
                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label col-form-label-sm">Mobile number</label>
                    <input type="tel" name="mob" pattern="\d{10}" class="form-control form-control-sm"
                        value="{{ old('mob') }}" >
                    <div class="error">
                        <span class="text-danger col-form-label-sm" id="numError"></span>
                        <span class="text-danger col-form-label-sm">
                            @error('mob')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label col-form-label-sm">Password</label>
                    <input type="password" name="passward" class="form-control form-control-sm">
                    <div class="error">
                        <span class="text-danger col-form-label-sm" id="passError"></span>
                        <span class="text-danger col-form-label-sm">
                            @error('passward')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="" class="form-label col-form-label-sm">Canform Password</label>
                    <input type="password" name="passward_confirmation" class="form-control form-control-sm">
                    <div class="error">
                        <span class="text-danger col-form-label-sm" id="conpassError"></span>
                        <span class="text-danger col-form-label-sm">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <div id="emailHelp" class="form-text">Already have an account? <a
                            href="{{ url('/login') }}">Login
                            Here</a></div>
                    <div id="emailHelp" class="form-text">log in as Admin <a href="{{ url('/adlogin') }}">Login
                            Here</a></div>
                    <div id="emailHelp" class="form-text">log in as department <a
                            href="{{ url('/deptlogin') }}">Login
                            Here</a></div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Register</button>
            </form>


        </div>
    </div>

    <footer class="foo container-fluid p-1">
        <div>
            Made with 💖 |  ®  OCR  | © all rights recieved.
        </div>
        <div class="f_social_icon hstack gap-3">
            Follow us on 
            <a href="" id="icon-instagram"><i class="bi-instagram"></i></a>
            <a href="" id="icon-linkedin"><i class="bi-linkedin"></i></a>
            <a href="" id="icon-github"><i class="bi-github"></i></a>
            <a href="" id="icon-telegram"><i class="bi-telegram"></i></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>

    <script src="{{ asset('/js/register.js') }}"></script>
</body>

</html>
