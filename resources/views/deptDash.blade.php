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

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>

    <section class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <h2 class="display-6 text-decoration-none">Welcome,
                    {{ $de }} department
                </h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end justify-self-end" id="main_nav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link  text-dark" href=""> complain list </a></li>
                        <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                href="{{ url('/logout') }}" role="button">Log
                                out</a></li>
                    </ul>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>
    </section>
    <div class="container d-flex row m-auto">
        
            @if (session()->has('message'))
                <div class="alert alert-success text-center alert-dismissible fade show">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        <div class="container-sm d-flex m-auto justify-content-center ">
            <form method="post" action="" class="col-10">
                @csrf
                <div class="form-group d-flex col">
                    <input type="hidden" name="search" value="">

                    <input type="search" name="search" class="form-control form-control-sm me-4"
                        placeholder="search here" value="{{ $search }}" autocomplete="off">
                    {{-- <label class="form-label-sm m-auto">Department</label>
                
                @if (isset($dept))
                    <select name="dept" class="form-select form-select-sm ms-2">
                        @foreach (['water', 'electricity', 'disaster'] as $dept1)
                            <option value="{{ $dept1 }}" {{ $dept == $dept1 ? 'selected' : '' }}>
                                {{ $dept1 }}</option>
                        @endforeach
                    </select>
                @else
                    <select name="dept" class="form-select form-select-sm ms-2">
                        <option value="">choose..</option>
                        <option value="water">water</option>
                        <option value="electricity">electricity</option>
                        <option value="disaster">disaster</option>
                    </select>
                @endif --}}
                    <button class="btn btn-sm btn-outline-success me-2 ms-2">Search</button>
                    <a href="{{ url('/deptlogin/deptdash' . '/' . $de) }}">
                        <button class="btn btn-sm btn-outline-danger" type="button">Reset</button>
                    </a>
                </div>
            </form>
        </div>


        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>@sortablelink('complain_id', 'id')</th>
                        <th>@sortablelink('name')</th>
                        <th>@sortablelink('email')</th>
                        <th>@sortablelink('address')</th>
                        <th>@sortablelink('city')</th>
                        <th>@sortablelink('state')</th>
                        <th>problem type</th>
                        <th>department</th>
                        <th>mobile</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if (!$complaints->isEmpty())

                        @foreach ($complaints as $complain)
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
                                        <span class="badge text-bg-info">active</span>
                                    @elseif($complain->status == 0)
                                        <span class="badge text-bg-success">solved</span>
                                    @elseif($complain->status == 2)
                                        <span class="badge text-bg-warning">pending</span>
                                    @elseif($complain->status == 3)
                                        <span class="badge text-bg-danger">rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="container gap-2 d-flex">
                                        <a
                                            href="{{ route('deptcomplain.edit', ['id' => $complain->complain_id, 'de' => $complain->dept]) }}"><button
                                                type="button" class="btn btn-sm btn-primary">Edit</button></a>
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
        <div class="row justify-content-center">
            {{-- {{ $complaints->links() }} --}}
            {!! $complaints->appends(\Request::except('page'))->render() !!}
            {{-- {{ $complaints->appends(['search' => $search, 'dept' => $dept])->links() }} --}}
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
