<!doctype html>
<html lang="en">

<head>
    <title>customer list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                        <li class="nav-item "><a class="nav-link active"
                                href="{{ url('/adlogin/addash/customer_list') }}"><i
                                    class="bi bi-people-fill me-1"></i></i>Customer list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> Admin </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-envelope-exclamation me-1"></i>Change Email</a> --}}
                                {{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-arrow-clockwise me-1"></i>Change password</a> --}}
                                <a class="dropdown-item" href="{{ url('/adlogin/addash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                                {{-- <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list') }}"><i class="bi bi-people-fill me-1"></i></i>Customer list </a> --}}
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                                    <i class="bi bi-person-fill-slash me-1"></i>Blocked Customer list </a>
                                <a href="/adlogin/addash/department" class="dropdown-item"><i
                                        class="bi bi-gear-fill me-1"></i>Department</a>
                                <a href="{{ url('/adlogin/addash/problem_list') }}" class="dropdown-item"><i
                                        class="bi bi-exclamation-circle me-1"></i>Problem list</a>
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


    <div class="container-sm position-relative table-z">
        <div class="table-responsive mt-4" style="width: 100%;">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Varified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if (!$customers->isEmpty())
                        @foreach ($customers as $customer)
                            <tr class="">
                                <td>{{ $customer->customer_id }}</td>
                                <td>{{ ucfirst($customer->name) }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->mob }}</td>
                                <td>
                                    @if ($customer->is_verified == 1)
                                        <span class="badge text-bg-success">Yes</span>
                                    @else
                                        <span class="badge text-bg-danger">No</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="container gap-2 d-flex">
                                        <a href="{{ route('customer.block', ['id' => $customer->customer_id]) }}"
                                            onclick="return confirm(`Are you sure you want to block customer ?
Id : {{ $customer->customer_id }}
Name : {{ $customer->name }} `)"><button
                                                type="button" class="btn btn-sm btn-outline-danger"><i
                                                    class="bi bi-person-slash me-1"></i>Block</button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="11" class="text-center">No data found !</td>
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

    <script src="{{ asset('/js/admin.js') }}"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
