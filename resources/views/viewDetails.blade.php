<!doctype html>
<html lang="en">

<head>
    <title>complain information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                        <li class="nav-item active"> <a class="nav-link" href="{{ url('/login/dash') }}">
                                <i class="bi bi-plus-lg me-1"></i>Add complain
                            </a> </li>

                        <li class="nav-item"><a class="nav-link active" href="{{ url('/login/dash') . '/view' }}">
                                <i class="bi bi-card-list me-1"></i>Complain list </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                    class="bi bi-person-circle"></i> {{ $user }} </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a href="/reset-pass" class="dropdown-item"><i class="bi bi-envelope-exclamation me-1"></i>Change Email</a> --}}
                                <a href="/reset-pass" class="dropdown-item"><i
                                        class="bi bi-arrow-clockwise me-1"></i>Change password</a>
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

    <div class="container d-flex row justify-content-center align-items-center m-auto mt-4">
        <div class="mb-3 d-flex justify-content-center py-2" style="background-color: lavender; border-radius: 10px;">
            <div class="col-1 d-flex m-auto" style="z-index: 5;">
                <a name="" id="" class="btn btn-primary" href="{{ url('login/dash') . '/view' }}"
                    role="button"><i class="bi bi-caret-left-fill me-2"></i>Back</a>
            </div>
            <div class="col-11" style="
            left: -74px;
            position: relative;">
                <h3 id="dash-head" class="text-center m-auto">
                    Complain Details
                </h3>
            </div>
        </div>
        <div class="container w-75 mb-3">
            @foreach ($complain as $complain)
                <div class="card p-0">
                    <div class="card-header fw-bold">
                        Complaint ID:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->complain_id }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Complaint Status:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($complain->status == 1)
                                <span class="badge text-bg-info">Active</span>
                            @elseif($complain->status == 0)
                                <span class="badge text-bg-success">Solved</span>
                            @elseif($complain->status == 2)
                                <span class="badge text-bg-warning">Pending</span>
                            @elseif($complain->status == 3)
                                <span class="badge text-bg-danger">Rejected</span>
                            @elseif($complain->status == 4)
                                <span class="badge text-bg-info">Re-opened</span>
                            @endif
                        </li>
                    </ul>
                    <div class="card-header fw-bold">
                        Info:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name : {{ $complain->name }}</li>
                        <li class="list-group-item">Address : {{ $complain->address }}</li>
                        <li class="list-group-item">City : {{ $complain->city }}</li>
                        <li class="list-group-item">State : {{ $complain->state }}</li>
                        <li class="list-group-item">Zip : {{ $complain->zip }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Problem Type:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->pt }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Department:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $dept_name }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Mobile Number:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->mob }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Problem Description:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->pd }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Customer Uploaded Image:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                                    class="img-fluid img-thumbnail" id="up-img2" alt="Complaint Image">
                            @endforeach
                        </li>
                    </ul>
                    @if (count($dept_images) > 0)
                        <div class="card-header fw-bold">
                            Department Work Proof Image:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @foreach ($dept_images as $dimage)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                        class="img-fluid img-thumbnail" id="up-img2" alt="Complaint Image">
                                @endforeach
                            </li>
                        </ul>
                    @endif
                    @if (count($reopen_complain) > 0)
                        <div class="card-header fw-bold">
                            Reopen History:
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($reopen_complain as $rcomp)
                                <li class="list-group-item">
                                    Reopen Date & Time : {{ $rcomp->created_at }}
                                </li>
                                <li class="list-group-item">
                                    {{-- Feedback : 
                                    <li class="list-group-item">{{$rcomp->feedback}}</li> --}}
                                    <div>
                                        Feedback :
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            {{ $rcomp->feedback }}
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-group-item">
                                    @if (!$reopen_images == null)
                                        <div>
                                            Customer Uploaded Image (Re-opened) :
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                @foreach ($reopen_images as $rimage)
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                                        class="img-fluid img-thumbnail" id="up-img2"
                                                        alt="Complaint Image">
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                                <li class="list-group-item">
                                    @if (!$reopen_images == null)
                                        <div>
                                            Department work of proof (Re-opened) :
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                @foreach ($dept_reopen_images as $drimage)
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                                        class="img-fluid img-thumbnail" id="up-img2"
                                                        alt="Complaint Image">
                                                @endforeach
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @if (isset($complain->rejection_reason))
                        <div class="card-header fw-bold">
                            Rejection reason:
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                {{ $complain->rejection_reason }}
                            </li>
                        </ul>
                    @endif
                </div>
            @endforeach

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
