<!doctype html>
<html lang="en">

<head>
    <title>Reset password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">

</head>

<body>

    <div class="container m-auto d-flex log-one row justify-content-center" style="height: 100vh">
        <div class="d-flex m-auto row flex-row-fluid flex-column flex-column-fluid text-center">
        @if (session('success'))
            <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            
            <div class="d-flex alert alert-danger alert-dismissible fade show my-5 text-center justify-content-center"
                role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        @endif
        </div>
        <div class="p-3 d-flex row log-two" style="max-height: 45vh; max-width: 50vw;">
            <div class="d-flex justify-content-center">
                <h1> Reset password </h1>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <form action="{{ url('/reset-pass') }}" method="post"
                    class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label col-form-label-sm">Email address</label>
                        <input type="email" name="email" class="form-control form-control-sm" id=""
                            value="{{ old('email') }}">
                        <span class="text-danger col-form-label-sm">
                            {{-- @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif --}}
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Send Reset Link</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
