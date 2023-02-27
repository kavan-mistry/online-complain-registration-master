<!doctype html>
<html lang="en">

<head>
    <title>complain view</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
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
                            <a class="nav-link" aria-current="page" href="{{ url('/login/dash') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/login/dash/view') }}">view complain</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <a name="" id="" class="btn btn-danger" href="{{url('/logout')}}" role="button">Log out</a>
                      </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container d-flex">
        <div class="table-responsive-sm mt-3">
            <table class="table table-striped table-hover table-borderless align-middle">
                <thead class="table-light">
                    <tr>
                        <th>complain id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>address</th>
                        <th>city</th>
                        <th>state</th>
                        <th>problem type</th>
                        <th>department</th>
                        <th>mobile</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($complain as $complain)
                        <tr class="">
                            <td>{{ $complain->complain_id }}</td>
                            <td>{{ $complain->name }}</td>
                            <td>{{ $complain->email }}</td>
                            <td>{{ $complain->address }}</td>
                            <td>{{ $complain->city }}</td>
                            <td>{{ $complain->state }}</td>
                            <td>{{ $complain->pt }}</td>
                            <td>{{ $complain->dept }}</td>
                            <td>{{ $complain->mob }}</td>
                            <td>
                                @if ($complain->status == 1)
                                <span class="badge text-bg-success">active</span>
                                @else
                                <span class="badge text-bg-danger">solved</span>    
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
