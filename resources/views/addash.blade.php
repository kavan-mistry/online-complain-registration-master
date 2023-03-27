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

                        <li class="nav-item"><a class="nav-link active" href="{{ url('/adlogin/addash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item"><a class="nav-link active">
                                <i class="bi bi-person-circle"></i> Admin </a>
                        </li>
                        <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                Log out</a></li>
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

    <div class="container justify-content-center d-flex row m-auto">

        <form action="" id="ad-form">
            <div class="row justify-content-center mt-3">

                <div class="form-group d-flex col-lg-2">
                    <input type="search" name="search" class="form-control form-control-sm"
                        placeholder="search here" value="{{ $search }}">
                </div>

                <div class="form-group d-flex col-lg-5">
                    <label class="me-1">Problem</label>
                    @if (isset($pt))
                        <select name="pt" class="form-select form-select-sm">
                            @foreach ($problem_types as $pt1)
                                <option value="{{ $pt1 }}" {{ $pt == $pt1 ? 'selected' : '' }}>
                                    {{ $pt1 }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="pt" class="form-select form-select-sm">
                            <option value="">Choose...</option>
                            @foreach ($problem_types as $p_t)
                                <option value="{{ $p_t }}">{{ $p_t }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group d-flex col-lg-3">
                    <label class="form-label-sm me-1">Department</label>
                    @if (isset($dept))
                        <select name="dept" class="form-select form-select-sm">
                            @foreach (['water', 'electricity', 'disaster', 'general', 'cleaning', 'repair'] as $dept1)
                                <option value="{{ $dept1 }}" {{ $dept == $dept1 ? 'selected' : '' }}>
                                    {{ $dept1 }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="dept" class="form-select form-select-sm">
                            <option value="">Choose...</option>
                            <option value="water">water</option>
                            <option value="electricity">electricity</option>
                            <option value="disaster">disaster</option>
                            <option value="general">general</option>
                            <option value="cleaning">cleaning</option>
                            <option value="repair">repair</option>
                        </select>
                    @endif
                </div>

                <div class="form-group d-flex col-lg-2">
                    <button class="btn btn-sm btn-outline-success"><i class="bi bi-search me-1"></i>Search</button>
                    <a href="{{ url('/adlogin/addash/view') }}">
                        <button class="btn btn-sm btn-outline-danger ms-1" type="button"><i
                                class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                    </a>
                </div>

            </div>
        </form>
        <div class="container-fluid">
            <div class="table-responsive mt-4" style="width: 100%;">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-wrap">@sortablelink('complain_id', 'id')</th>
                            <th class="text-wrap">@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th class="text-wrap">Mobile</th>
                            {{-- <th class="w-100">@sortablelink('address')</th> --}}
                            {{-- <th class="text-wrap">@sortablelink('city')</th> --}}
                            <th class="text-wrap">@sortablelink('state')</th>
                            <th class="text-wrap">@sortablelink('pt','Problem type')</th>
                            <th class="text-wrap">@sortablelink('dept', 'department')</th>
                            <th class="text-wrap">Status</th>
                            <th class="text-wrap">Action</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @if (!$complain->isEmpty())


                            @foreach ($complain as $complains)
                                <tr class="">
                                    <td>{{ $complains->complain_id }}</td>
                                    <td>{{ ucfirst($complains->name) }}</td>
                                    <td>{{ $complains->email }}</td>
                                    <td>{{ $complains->mob }}</td>
                                    {{-- <td>{{ $complains->address }}</td> --}}
                                    {{-- <td>{{ $complains->city }}</td> --}}
                                    <td>{{ $complains->state }}</td>
                                    <td>{{ $complains->pt }}</td>
                                    <td>{{ ucfirst($complains->dept) }}</td>
                                    <td>
                                        @if ($complains->status == 1)
                                            <span class="badge text-bg-info">Active</span>
                                        @elseif($complains->status == 0)
                                            <span class="badge text-bg-success">Solved</span>
                                        @elseif($complains->status == 2)
                                            <span class="badge text-bg-warning">Pending</span>
                                        @elseif($complains->status == 3)
                                            <span class="badge text-bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="container gap-2 d-flex">
                                            <a href="{{ route('complain.edit', ['id' => $complains->complain_id]) }}"><button
                                                    type="button" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-pencil-fill me-1"></i></button></a>
                                            <a href="{{ route('complain.delete', ['id' => $complains->complain_id]) }}"
                                                onclick="return confirm('Are you sure you want to delete complain ?')"><button
                                                    type="button" class="btn btn-sm btn-outline-danger"><i
                                                        class="bi bi-trash me-1"></i></button></a>
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
        <div class="row justify-content-center">
            {{-- {{ $complain->links() }} --}}
            {!! $complain->appends(\Request::except('page'))->render() !!}
        </div>
    </div>

    <footer class="foo container-fluid justify-content-center p-1">
        <div>
            Made with 💖 &emsp; | &emsp; ® OCR &emsp; | &emsp; © all rights recieved .
        </div>
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
