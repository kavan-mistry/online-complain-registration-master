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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    {{-- data table --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/css/customer.css') }}">
</head>

<body>
    <header>
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

                            <li class="nav-item"><a class="nav-link active" href="{{ url('/login/dash') . '/view' }}">
                                    <i class="bi bi-card-list me-1"></i>Complain list </a>
                            </li>
                            {{-- <li class="nav-item"><a class="nav-link active">
                                    <i class="bi bi-person-circle"></i> {{ $user }} </a>
                            </li>
                            <li class="nav-item"><a name="" id="" class="btn btn-danger my-3"
                                    href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                    Log out</a></li> --}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                        class="bi bi-person-circle"></i> {{ ucwords($user) }} </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="/login/edit_profile" class="dropdown-item"><i
                                            class="bi bi-person-fill-gear me-1"></i>Edit Profile</a>

                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex justify-content-center">
                                        <a name="" id="" class="btn btn-danger"
                                            href="{{ url('/logout') }}" role="button"><i class="bi bi-door-open"></i>
                                            Log out</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- navbar-collapse.// -->
                </div> <!-- container-fluid.// -->
            </nav>
        </section>


    </header>
    @include('notify::components.notify')
    <x-notify::notify />
    @notifyJs
    {{-- @if (session('success')) --}}
        {{-- <div class="container d-flex alert alert-success alert-dismissible fade show my-3 text-center justify-content-center"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> --}}
        
    {{-- @endif --}}
    <form method="post" action="" class="d-flex mt-4 align-items-center">
        @csrf
        <div class="container justify-content-end d-flex">
            <div class="row d-flex justify-content-between w-100">
                <div class="col-lg-2">
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
                                    @foreach ($problem_types as $pt1)
                                        <option value="{{ $pt1 }}"
                                            {{ $pt == $pt1->problems ? 'selected' : '' }}>
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
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <button class="btn btn-sm btn-outline-success me-2"><i
                                class="bi bi-search me-1"></i>Search</button>
                        <a href="{{ url('/login/dash/view') }}" style="text-decoration: none;">
                            <button class="btn btn-sm btn-outline-danger" type="button"><i
                                    class="bi bi-arrow-clockwise me-1"></i>Reset</button>
                        </a>
                        <a href="{{ url('/login/dash') }}">
                            <button class="btn btn-sm btn-outline-warning ms-2" type="button"><i
                                    class="bi bi-plus-lg me-1"></i>Add Complain</button>
                        </a>
                    </div>
                </div>
            </div>
    </form>

    </div>
    <div class="container d-flex row m-auto">

        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover align-middle" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        {{-- <th>@sortablelink('address')</th> --}}
                        {{-- <th>@sortablelink('city')</th> --}}
                        <th>State</th>
                        <th>Problem Type</th>
                        {{-- <th>@sortablelink('dept', 'department')</th> --}}
                        <th class="no-sort">Status</th>
                        <th class="no-sort">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    {{-- @if (!$complain->isEmpty()) --}}


                        @foreach ($complain as $complains)
                            <tr class="">
                                <td>{{ $complains->complain_id }}</td>
                                <td>{{ ucfirst($complains->name) }}</td>
                                <td>{{ $complains->email }}</td>
                                <td>{{ $complains->mob }}</td>
                                {{-- <td>{{ $complains->address }}</td> --}}
                                {{-- <td>{{ ucfirst($complains->city) }}</td> --}}
                                <td>{{ $complains->state }}</td>
                                <td>{{ $complains->pt }}</td>
                                {{-- <td>{{ $complains->dept }}</td> --}}
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

                                    <a href="{{ route('detail.view', ['comp_id' => $complains->complain_id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-success m-1"><i
                                                class="bi bi-eye-fill me-1"></i>view</button>
                                    </a>

                                    @if ($complains->status == 1)    
                                    <a href="{{ route('complain.close', ['id' => $complains->complain_id]) }}"
                                        onclick="return confirm(`Are you sure you want to Close
Id : {{ $complains->complain_id }}  
Problem : {{ $complains->pt }} ?`)">
                                        <button type="button" class="btn btn-sm btn-outline-danger m-1"><i
                                                class="bi bi-x-circle-fill me-1"></i>close</button></a>
                                    </a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    {{-- @else
                        <td colspan="11" class="text-center">No data found !</td>
                    @endif --}}
                </tbody>
            </table>
        </div>
        <div class="row justify-content-center">
            {{-- {{ $complain->links() }} --}}
            {{-- {!! $complain->appends(\Request::except('page'))->render() !!} --}}
            {{-- {{ $complain->appends(['search' => $search, 'pt' => $pt])->links() }} --}}
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
