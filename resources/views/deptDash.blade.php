<!doctype html>
<html lang="en">

<head>
    <title>complain view</title>
    @notifyCss
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">

</head>

<body>

    <section class="">
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

                        {{-- <li class="nav-item"><a class="nav-link active" href="{{ url('/deptlogin/deptdash') }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li> --}}
                        <li class="nav-item"><a class="nav-link active">
                                <i class="bi bi-person-circle"></i> {{ $department }} department </a>
                        </li>
                        <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                Log out</a></li>
                    </ul>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>
    </section>

    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs

    <div class="container d-flex row m-auto">

        @if (session()->has('message'))
            <div class="alert alert-success text-center alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="post" action="" class="">
            <div class="container d-flex m-auto justify-content-center mt-4">
                @csrf
                <div class="form-group d-flex col-lg-6">
                    <input type="hidden" name="search" value="">

                    <input type="search" name="search" class="form-control form-control-sm me-4"
                        placeholder="Search here" value="{{ $search }}" autocomplete="off">
                </div>
                <div class="form-group d-flex col-lg-2">
                    <button class="btn btn-sm btn-outline-success me-2 ms-2"><i
                            class="bi bi-search me-1"></i>Search</button>
                    <a href="{{ url('/deptlogin/deptdash') }}">
                        <button class="btn btn-sm btn-outline-danger" type="button"><i
                                class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    </a>
                </div>
            </div>
        </form>


        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        {{-- <th>@sortablelink('address')</th> --}}
                        <th>City</th>
                        <th>State</th>
                        <th>Problem Type</th>
                        {{-- <th>department</th> --}}
                        <th>Status</th>
                        <th class="no-sort">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    {{-- @if (!$complaints->isEmpty()) --}}

                        @foreach ($complaints as $complain)
                            <tr class="">
                                <td>{{ $complain->complain_id }}</td>
                                <td>{{ ucfirst($complain->name) }}</td>
                                <td>{{ $complain->email }}</td>
                                <td>{{ $complain->mob }}</td>
                                {{-- <td>{{ $complain->address }}</td> --}}
                                <td>{{ ucfirst($complain->city) }}</td>
                                <td>{{ $complain->state }}</td>
                                <td>{{ $complain->pt }}</td>
                                {{-- <td>{{ $complain->dept }}</td> --}}
                                <td>
                                    @if ($complain->status == 1)
                                        <span class="badge text-bg-info">Active</span>
                                    @elseif($complain->status == 0)
                                        <span class="badge text-bg-success">Solved</span>
                                    @elseif($complain->status == 2)
                                        <span class="badge text-bg-warning">Pending</span>
                                    @elseif($complain->status == 3)
                                        <span class="badge text-bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="container gap-2 d-flex">
                                        <a
                                            href="{{ route('deptcomplain.edit', ['id' => $complain->complain_id, 'de' => $complain->dept]) }}"><button
                                                type="button" class="btn btn-sm btn-outline-primary"><i
                                                    class="bi bi-pencil me-1"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    {{-- @else
                        <td colspan="9" class="text-center">No data found !</td>
                    @endif --}}
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{-- {{ $complaints->links() }} --}}
            {{-- {!! $complaints->appends(\Request::except('page'))->render() !!} --}}
            {{-- {{ $complaints->appends(['search' => $search, 'dept' => $dept])->links() }} --}}
        </div>
    </div>

    <footer class="foo container-fluid fixed-bottom justify-content-center p-1">
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
