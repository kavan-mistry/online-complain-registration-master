 {{-- <!doctype html>
 <html lang="en">

 <head>
     <title>email</title>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

 </head>

 <body>

     <div class="container d-flex flex-row-fluid flex-column flex-column-fluid text-center p-10 py-lg-20 justify-content-center align-items-center"
         style="height: 100vh">

         @if (session('success'))
             <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                 role="alert">
                 {{ session('success') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         @elseif (session('error'))
             <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                 role="alert">
                 {{ session('error') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
         @endif

         <img src="{{ asset('/img/safe-mail.png') }}" alt="mail varify" class="img-fluid" style="width: 10%">

         <h1 class="text-align-center title-h1 mt-3">Verify your Email</h1>

         <p class="mt-3">We have sent an email to
             <a href="" style="text-decoration: none">
                @if (session()->get('new_email'))
                    {{ session()->get('new_email') }}
                
                @else
                    {{ $email }}
                @endif
                </a>
             , please check your mailbox to verify your email.
         </p>
         <p>Did’t receive an email? </p>
         <form method="post">
             @csrf
             <button type="submit" class="btn btn-success">Resend varification mail</button>
             <a name="" id="" class="btn btn-danger my-3" href="{{ url('/logout') }}" role="button">Log
                 out</a>
         </form>
         <p>
             if you can't get mail, then please check your email address or change address
         </p>
         <form action="{{ url('/reset-email') }}" method="post">
             <div class="row">
                 <div class="d-flex col-lg-7">
                     @csrf
                     <input type="email" name="email" class="form-control form-control-sm" />
                     <input type="hidden" name="old_email" class="form-control form-control-sm"
                         value="{{ $email }}" />
                 </div>
                 <div class="d-flex col-lg-5">
                     <button type="submit" class="btn btn-sm btn-outline-warning ms-3">Change Email</button>
                 </div>
                </div>
                <span class="text-danger col-form-label-sm">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
         </form>
     </div>


     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
         integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
     </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
         integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
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

     <!-- Icons. Uncomment required icon fonts -->
     <link rel="stylesheet" href=" {{ asset('/vendor/fonts/boxicons.css') }}" />

     <!-- Core CSS -->
     <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
     <link rel="stylesheet" href="{{ asset('/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
     <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

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
     <div class="container-xxl">

         <!-- Content -->
         <div class="authentication-wrapper authentication-basic container-p-y">
             <div class="authentication-inner py-4">
                 <div class="card d-flex align-items-center justify-content-center" style="width: 28rem;">
                     <img src="{{ asset('/img/safe-mail.png') }}" class="card-img-top w-25" alt="email verify">
                     <div class="card-body">
                         <h2 class="card-title text-center">Verify your Email</h2>
                         <p class="card-text">We have sent an email to
                             <a href="" style="text-decoration: none">
                                 @if (session()->get('new_email'))
                                     {{ session()->get('new_email') }}
                                 @else
                                     {{ $email }}
                                 @endif
                             </a>
                             , please check your mailbox to verify your email.
                         </p>
                         <p class="card-text m-0">Did’t receive an email? </p>
                         <div class="my-2 d-flex justify-content-center">
                             <form method="post">
                                 @csrf
                                 <button type="submit" class="btn btn-outline-primary">Resend varification
                                     mail</button>
                                 <a name="" id="" class="btn btn-outline-danger"
                                     href="{{ url('/logout') }}" role="button">Log
                                     out</a>
                             </form>
                         </div>
                         <p class="card-text">
                             if you can't get mail, then please check your email address or change address.
                         </p>
                         <form action="{{ url('/reset-email') }}" method="post">
                             <div class="row">
                                 <div class="d-flex col-lg-7">
                                     @csrf
                                     <input type="email" name="email" class="form-control" />
                                     <input type="hidden" name="old_email" class="form-control"
                                         value="{{ $email }}" />
                                 </div>
                                 <div class="d-flex col-lg-5">
                                     <button type="submit" class="btn btn-outline-warning">Change Email</button>
                                 </div>
                             </div>
                             <span class="text-danger col-form-label-sm">
                                 @error('email')
                                     {{ $message }}
                                 @enderror
                             </span>
                         </form>
                     </div>
                 </div>
                 <!-- / Content -->
             </div>
         </div>
         <!-- Core JS -->
         <!-- build:js assets/vendor/js/core.js -->
         <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
         <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
         <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
         <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

         <script src="{{ asset('/vendor/js/menu.js') }}"></script>
         <!-- endbuild -->

         <script src="{{ asset('/js/login.js') }}"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
         </script>


         <!-- Vendors JS -->

         <!-- Main JS -->
         <script src="{{ asset('/js/main.js') }}"></script>

         <!-- Page JS -->

         <!-- Place this tag in your head or just before your close body tag. -->
         <script async defer src="https://buttons.github.io/buttons.js"></script>
 </body>

 </html>
