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
                        <li class="nav-item"><a class="nav-link active" href="{{ url('/adlogin/addash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> Admin </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ url('/adlogin/addash/problem_list') }}" class="dropdown-item"><i
                                        class="bi bi-exclamation-circle me-1"></i>Problem list</a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list') }}"><i
                                        class="bi bi-people-fill me-1"></i></i>Customer list </a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/notices') }}">
                                    <i class="bi bi-stickies"></i> Notices </a>
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                                    <i class="bi bi-person-fill-slash me-1"></i>Blocked Customer list </a>
                                <a href="/adlogin/addash/department" class="dropdown-item"><i
                                        class="bi bi-gear-fill me-1"></i>Department</a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="dropdown-item"><i class="bi bi-unlock me-1"></i>Edit password</a>
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

    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs

    <div class="container-sm mt-3 p-0 d-flex align-items-center justify-content-center" id="notice-div">
        <div class="col-1 text-center py-3" id="nh"><b>Importent</b></div>
        <div class="col-11 d-flex align-items-center">
            <marquee>
                @foreach ($notices as $notice)
                    <span>{{ $notice->notice }} &emsp;&emsp; | &emsp;&emsp; </span>
                @endforeach
            </marquee>
        </div>
    </div>

    <!-- Modal HTML Markup -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ url('/adlogin/addash/change_pass') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <i class="bi bi-eye-slash" id="togglePassword"
                                style="
                                position: relative;
                                bottom: 30px;
                                right: -27rem;"></i>
                            <div class="er d-flex" style="position: relative; top: -21px">
                                <span class="form-text text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Confirm new password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password2">
                            <i class="bi bi-eye-slash" id="togglePassword2"
                                style="
                                position: relative;
                                bottom: 30px;
                                right: -27rem;"></i>
                            <div class="er d-flex" style="position: relative; top: -21px">
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
                                class="bi bi-x-circle me-1"></i>Cancel</button>
                        <button type="submit" class="btn btn-success"><i
                                class="bi bi-check2-circle me-1"></i>Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ------ model end ------ --}}

    <div class="container justify-content-center d-flex row m-auto">

        <form action="" id="ad-form">
            <div class="row justify-content-center mt-3">

                <div class="form-group d-flex col-lg-2">
                    <input type="search" name="search" class="form-control form-control-sm"
                        placeholder="Search here" value="{{ $search }}">
                </div>

                <div class="form-group d-flex col-lg-5">
                    <label class="me-1">Problem</label>
                    @if (isset($pt))
                        <select name="pt" class="form-select form-select-sm">
                            @foreach ($problem_types as $pt1)
                                <option value="{{ $pt1->problems }}" {{ $pt == $pt1->problems ? 'selected' : '' }}>
                                    {{ $pt1->problems }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="pt" class="form-select form-select-sm">
                            <option value="">Choose...</option>
                            @foreach ($problem_types as $p_t)
                                <option value="{{ $p_t->problems }}">{{ $p_t->problems }}</option>
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
                            @foreach ($departments as $dept1)
                                <option value="{{ $dept1->department }}"
                                    {{ $dept == $dept1->department ? 'selected' : '' }}>
                                    {{ $dept1->department }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="dept" class="form-select form-select-sm">
                            <option value="">Choose...</option>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept->department }}">{{ $dept->department }}</option>
                            @endforeach
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
        <div class="container-fluid table-z">
            <div class="table-responsive mt-4" style="width: 100%;">
                <table class="table table-striped table-hover align-middle" id="myTable">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            {{-- <th class="w-100">@sortablelink('address')</th> --}}
                            {{-- <th class="text-wrap">@sortablelink('city')</th> --}}
                            <th>State</th>
                            <th>Problem Type</th>
                            <th>Department</th>
                            <th class="no-sort">Status</th>
                            <th class="no-sort">Action</th>
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
                                    {{-- <td>{{ ucfirst($complains->dept) }}</td> --}}
                                    <td>
                                        @if (!empty($complains['departmentcm']))
                                            @foreach ($complains['departmentcm'] as $p)
                                                {{-- {{ !empty($p->department) ? $p->department : 'N/A' }} --}}
                                                {{ empty($p->department) ? 'N/A' : $p->department }}
                                            @endforeach
                                        @else
                                            {{ 'N/A' }}
                                        @endif
                                    </td>
                                    <td>
                                        <p class="m-auto">
                                            @if ($complains->deleted_at != null)
                                                <span class="badge text-bg-danger">Deleted</span>
                                            @elseif ($complains->status == 1)
                                                <span class="badge text-bg-info">Active</span>
                                            @elseif($complains->status == 0)
                                                <span class="badge text-bg-success">Solved</span>
                                            @elseif($complains->status == 2)
                                                <span class="badge text-bg-warning">Pending</span>
                                            @elseif($complains->status == 3)
                                                <span class="badge text-bg-danger">Rejected</span>
                                            @elseif ($complains->status == 4)
                                                <span class="badge text-bg-info">Re-opened</span>
                                            @endif
                                        </p>

                                        @foreach ($blocked_customer as $bcust)
                                            @if ($complains->customer_id == $bcust->customer_id)
                                                @if (!empty($bcust->deleted_at))
                                                    <p class="m-auto">
                                                        <span class="badge text-bg-secondary">User Blocked</span>
                                                    </p>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="container gap-1 d-flex">
                                            <a href="{{ route('complain.edit', ['id' => $complains->complain_id]) }}"><button
                                                    type="button" class="btn btn-sm btn-outline-primary"><i
                                                        class="bi bi-pencil-fill"></i></button></a>
                                            <a href="{{ route('complain.delete', ['id' => $complains->complain_id]) }}"
                                                onclick="return confirm('Are you sure you want to delete complain ?')"><button
                                                    type="button" class="btn btn-sm btn-outline-danger"><i
                                                        class="bi bi-trash"></i></button></a>
                                            @foreach ($blocked_customer as $bcust)
                                                @if ($complains->customer_id == $bcust->customer_id)
                                                    @if (empty($bcust->deleted_at))
                                                        <a href="{{ route('customer.block', ['id' => $complains->customer_id]) }}"
                                                            onclick="return confirm('Are you sure you want to block {{ $complains->name }} ?')"><button
                                                                type="button"
                                                                class="btn btn-sm btn-outline-warning"><i
                                                                    class="bi bi-person-fill-slash"></i></button></a>
                                                    @endif
                                                @endif
                                            @endforeach
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
            {{-- {!! $complain->appends(\Request::except('page'))->render() !!} --}}
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
