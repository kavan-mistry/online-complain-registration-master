<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>online complain registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-size: small">
        <div class="container-sm d-flex" style="height: 100vh">
            
            <div class="container m-auto p-auto d-flex justify-content-center align-items-center" style="max-height: 100vh">
                <h1 class="col">Admin login</h1>
             <form action="{{url('/adlogin')}}" method="post" class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                @csrf 
                 <div class="mb-3">
                    <label for="" class="form-label col-form-label-sm">Email address</label>
                    <input type="email" name="email" class="form-control form-control-sm" id="" value="{{old('email')}}">
                    <span class="text-danger col-form-label-sm">
                        @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                        @error('email')
                            {{$message}}
                        @enderror
                       </span>  
                </div>
                 <div class="mb-3">
                   <label for="" class="form-label col-form-label-sm">Passward</label>
                   <input type="password" name="passward" class="form-control form-control-sm" id="">
                   <span class="text-danger col-form-label-sm">
                    @if (Session::has('error'))
                            <p class="text-danger">{{ Session::get('error') }}</p>
                        @endif
                    @error('passward')
                        {{$message}}
                    @enderror
                   </span> 
                </div>
                 <div class="mb-3">
                     <div id="emailHelp" class="form-text">log in as Admin <a href="{{url('/adlogin')}}">Login Here</a></div>
                     <div id="emailHelp" class="form-text">log in as department <a href="{{url('/deptlogin')}} ">Login Here</a></div>
                 </div>
                 <button type="submit" class="btn btn-primary btn-sm">Log in</button>
               </form>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>