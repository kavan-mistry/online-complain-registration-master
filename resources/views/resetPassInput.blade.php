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

    <div class="container m-auto d-flex log-one row justify-content-center align-items-center" style="height: 100vh">
        
        <div class="p-3 d-flex row log-two" style="max-height: 70vh; max-width: 50vw;">
            <div class="d-flex justify-content-center">
                <h1> Reset password </h1>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <form action="{{ url('/reset-pass' . '/' . $cid . '/' . $tokan) }}" method="post"
                    class="align-self-center row-cols-lg-auto w-50 card p-4 shadow d-flex justify-content-center">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label col-form-label-sm">password</label>
                        <input type="password" name="password" class="form-control form-control-sm" id="">
                        <span class="text-danger col-form-label-sm">
                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label col-form-label-sm">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-sm" id="">
                        <span class="text-danger col-form-label-sm">
                            @if (Session::has('error'))
                                <p class="text-danger">{{ Session::get('error') }}</p>
                            @endif
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Reset password</button>
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
