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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
</head>

<body>

    <section class="position-relative dropdown-z">
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
                        <li class="nav-item"><a href="/adlogin/addash/department" class="nav-link active"><i
                                    class="bi bi-gear-fill me-1"></i>Department</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> Admin </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ url('/adlogin/addash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                                <a href="{{ url('/adlogin/addash/problem_list') }}" class="dropdown-item"><i
                                        class="bi bi-exclamation-circle me-1"></i>Problem list</a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list') }}"><i
                                        class="bi bi-people-fill me-1"></i></i>Customer list </a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                                    <i class="bi bi-person-fill-slash me-1"></i>Blocked Customer list </a>

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

    @if (session('success'))
        <div class="container d-flex alert alert-success alert-dismissible fade show my-3 text-center justify-content-center"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mt-3 d-flex justify-content-center">
        <div class="col-lg-10  d-flex justify-content-end">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-square me-1"></i>Add Department
            </button>
            {{-- <a name="" id="" class="btn btn-warning" href="#" role="button"><i class="bi bi-plus-square me-1"></i>Add Problem Type</a> --}}
        </div>
    </div>


    <!-- Modal HTML Markup -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/adlogin/addash/department') }}" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Department</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Department Name</label>
                            <input type="text" class="form-control" name="department_name" id="">
                            <div class="er d-flex">
                                <span class="form-text text-danger">
                                    @error('department_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Department Email</label>
                            <input type="email" class="form-control" name="department_email" id="">
                            <div class="er d-flex">
                                <span class="form-text text-danger">
                                    @error('department_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="">
                            <div class="er d-flex">
                                <span class="form-text text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="">
                            <div class="er d-flex">
                                <span class="form-text text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i
                                class="bi bi-x-circle me-1"></i>Close</button>
                        <button type="submit" class="btn btn-success"><i
                                class="bi bi-check2-circle me-1"></i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-sm position-relative table-z">
        <div class="table-responsive mt-4" style="width: 100%;">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Department Name</th>
                        <th>Department Email</th>
                        {{-- <th>Password</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if (!$department_data->isEmpty())
                        @foreach ($department_data as $department)
                            <tr class="">
                                <td>{{ $department->department_id }}</td>
                                <td>{{ ucfirst($department->department) }}</td>
                                <td>{{ $department->email }}</td>
                                {{-- <td>{{ $department->password }}</td> --}}
                                <td>
                                    <div class="container gap-2 d-flex">
                                        <a href="{{ route('department.delete', ['id' => $department->department_id]) }}"
                                            onclick="return confirm(`Are you sure you want to delete department ?
Id : {{ $department->department_id }}
Name : {{ $department->department }} `)">
                                        <button type="button" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-person-slash me-1"></i>Delete</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="5" class="text-center">No data found !</td>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <footer class="foo container-fluid justify-content-center p-1 mt-2">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>

    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    {{-- data tables --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('/js/customer.js') }}"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
