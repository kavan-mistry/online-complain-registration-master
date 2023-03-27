 <!doctype html>
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

 </html>
