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

    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">
</head>

<body>
    <header>
        <section class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <h3 class="text-decoration-none">Your complaint list
                    </h3>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end justify-self-end" id="main_nav">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active"> <a class="nav-link" href="{{ url('/login/dash') }}"> Add
                                    complain
                                </a> </li>

                            <li class="nav-item"><a class="nav-link active" href="{{ url('/login/dash') . '/view' }}">
                                    Complain list </a>
                            </li>
                            <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                    href="{{ url('/logout') }}" role="button">Log
                                    out</a></li>
                        </ul>
                    </div> <!-- navbar-collapse.// -->
                </div> <!-- container-fluid.// -->
            </nav>
        </section>
    </header>
    @if (session('success'))
        <div class="container d-flex alert alert-success alert-dismissible fade show my-3 text-center justify-content-center"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="post" action="" class="d-flex align-items-center">
        @csrf
        <div class="container justify-content-end d-flex">
            <div class="row d-flex justify-content-between w-100">
                <div class="col-lg-4">
                    <h2>
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="search" value="{{ $search }}">
                            <input type="search" name="search" class="form-control form-control-sm"
                                placeholder="Search here" value="{{ $search }}">
                        </div>
                    </h2>
                </div>
                <div class="col-lg-6 d-flex">
                    <div class="form-group row d-flex w-100">
                        <div class="col-lg-3"><label>Problem Type</label></div>
                        <div class="col-lg-9">
                            @if (isset($pt))
                                <select name="pt" class="form-select form-select-sm ms-2">
                                    @foreach (['water leakage', 'electric wire brokan', 'dranage problem'] as $pt1)
                                        <option value="{{ $pt1 }}" {{ $pt == $pt1 ? 'selected' : '' }}>
                                            {{ $pt1 }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="pt" class="form-select form-select-sm">
                                    <option value="">Choose...</option>
                                    <option value="water leakage">water leakage</option>
                                    <option value="electric wire brokan">electric wire brokan</option>
                                    <option value="dranage problem">dranage problem</option>
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <button class="btn btn-sm btn-outline-success me-2 ms-2">Search</button>
                        <a href="{{ url('/login/dash') . '/view' }}">
                            <button class="btn btn-sm btn-outline-danger" type="button">Reset</button>
                        </a>
                    </div>
                </div>
            </div>
    </form>

    </div>
    <div class="container d-flex row m-auto">

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
                        <th>@sortablelink('dept', 'department')</th>
                        <th>mobile</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="">
                    @if (!$complain->isEmpty())


                        @foreach ($complain as $complains)
                            <tr class="">
                                <td>{{ $complains->complain_id }}</td>
                                <td>{{ $complains->name }}</td>
                                <td>{{ $complains->email }}</td>
                                <td>{{ $complains->address }}</td>
                                <td>{{ $complains->city }}</td>
                                <td>{{ $complains->state }}</td>
                                <td>{{ $complains->pt }}</td>
                                <td>{{ $complains->dept }}</td>
                                <td>{{ $complains->mob }}</td>
                                <td>
                                    @if ($complains->status == 1)
                                        <span class="badge text-bg-info">active</span>
                                    @elseif($complains->status == 0)
                                        <span class="badge text-bg-success">solved</span>
                                    @elseif($complains->status == 2)
                                        <span class="badge text-bg-warning">pending</span>
                                    @elseif($complains->status == 3)
                                        <span class="badge text-bg-danger">rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('detail.view', ['comp_id' => $complains->complain_id]) }}">
                                        <button type="button" class="btn btn-sm btn-warning">view</button>
                                    </a>
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
            {{-- {{ $complain->links() }} --}}
            {{-- {!! $complain->appends(\Request::except('page'))->render() !!} --}}
            {{ $complain->appends(['search' => $search, 'pt' => $pt])->links() }}
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
