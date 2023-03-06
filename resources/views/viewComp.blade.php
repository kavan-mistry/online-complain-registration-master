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
                            <a class="nav-link" aria-current="page"
                                href="{{ url('/login/dash') . '/' . $customer_id }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"
                                href="{{ url('/login/dash') . '/' . $customer_id . '/view' }}">view complain</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <a name="" id="" class="btn btn-danger" href="{{ url('/logout') }}"
                            role="button">Log out</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container d-flex row m-auto">
        <div class="container-sm d-flex m-3">
            <form method="post" action="" class="col-10">
                @csrf
                <div class="form-group d-flex col">
                    <input type="hidden" name="search" value="{{ $search }}">

                    <input type="search" name="search" class="form-control form-control-sm me-4"
                        placeholder="search here" value="{{ $search }}">
                    <label class="form-label-sm m-auto">Department</label>
                    {{-- <select name="dept" class="form-select form-select-sm ms-2">
                        <option value="">choose..</option>
                        <option value="water">water</option>
                        <option value="electricity">electricity</option>
                        <option value="disaster">disaster</option>
                    </select> --}}
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
                    @endif
                    <button class="btn btn-sm btn-outline-success me-2 ms-2">Search</button>
                    <a href="{{ url('/login/dash') . '/' . $customer_id . '/view' }}">
                        <button class="btn btn-sm btn-outline-danger" type="button">Reset</button>
                    </a>
                </div>
            </form>
        </div>
        <div class="table-responsive-sm mt-3">
            <table class="table table-striped table-hover table-borderless align-middle">
                <thead class="table-light">
                    <tr>
                        <th>@sortablelink('complain_id')</th>
                        <th>@sortablelink('name')</th>
                        <th>@sortablelink('email')</th>
                        <th>@sortablelink('address')</th>
                        <th>@sortablelink('city')</th>
                        <th>@sortablelink('state')</th>
                        <th>problem type</th>
                        <th>@sortablelink('dept')</th>
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
                                        <span class="badge text-bg-success">active</span>
                                    @else
                                        <span class="badge text-bg-danger">solved</span>
                                    @endif
                                </td>
                                <td>
                                    <a
                                        href="{{ route('detail.view', ['cid' => $customer_id, 'comp_id' => $complains->complain_id]) }}">
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
            {{ $complain->appends(['search' => $search, 'dept' => $dept])->links() }}
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
