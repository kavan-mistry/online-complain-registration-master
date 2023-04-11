<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit complain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
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
                                <a class="dropdown-item" href="{{ url('/adlogin/addash/customer_list_blocked') }}">
                                    <i class="bi bi-person-fill-slash me-1"></i>Blocked Customer list </a>
                                <a href="/adlogin/addash/department" class="dropdown-item"><i
                                        class="bi bi-gear-fill me-1"></i>Department</a>
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
    <div class="container-sm d-flex col">
        <div class="container m-auto p-auto justify-content-center align-items-center" style="max-height: 100vh">
            @if (session('success'))
                <div class="d-flex alert alert-success alert-dismissible fade show my-5 text-center justify-content-center"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="text-center mb-4 p-2" id="dash-head" style="background-color: lavender;">Edit Complain</h2>
            <form class="row g-1" method="post" action="{{ $url }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Name<span
                            class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->name }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Email<span
                            class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control form-control-sm" id="inputEmail4"
                        value="{{ $complain->email }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label col-form-label-sm">Address<span
                            class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control form-control-sm" id="inputAddress"
                        placeholder="1234 Main St" value="{{ $complain->address }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label col-form-label-sm">City<span
                            class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control form-control-sm" id="inputCity"
                        value="{{ $complain->city }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('city')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">State<span
                            class="text-danger">*</span></label>
                    <select id="inputState" name="state" class="form-select form-select-sm" disabled>
                        <option selected value="0">Choose...</option>
                        @foreach ($states as $state)
                            <option value="{{ $state }}"
                                {{ old('state', $complain->state) == $state ? 'selected' : '' }}>
                                {{ $state }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label col-form-label-sm">Zip<span
                            class="text-danger">*</span></label>
                    <input type="text" name="zip" class="form-control form-control-sm" id="inputZip"
                        value="{{ $complain->zip }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('zip')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label col-form-label-sm">Contact number<span
                            class="text-danger">*</span></label>
                    <input type="number" name="mob" class="form-control form-control-sm" id="inputPassword4"
                        value="{{ $complain->mob }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('mob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">Department</label>
                    <select id="inputState" name="dept" class="form-select form-select-sm" disabled>
                        {{-- @foreach ($complain->department_id as $dept) --}}
                        <option value="{{ $dept_name }}">
                            {{ $dept_name }}</option>
                        {{-- @endforeach --}}
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('dept')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label col-form-label-sm">problem type</label>
                    <select id="inputState" name="pt" class="form-select form-select-sm" disabled>
                        {{-- <option selected value="0">Choose...</option> --}}
                        {{-- @foreach ($problem_types as $p_t) --}}
                        <option value="{{ $complain->pt }}">{{ $complain->pt }}</option>
                        {{-- @endforeach --}}
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('pt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (!empty($complain->opt))
                <div class="col-md-4">
                    <label class="form-label col-form-label-sm">Specified problem<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="opt" id=""
                        value="{{ $complain->opt }}" disabled>
                    <span class="text-danger col-form-label-sm">
                        @error('opt')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @endif
                @if (!empty($reopen_complain->feedback))
                    <div class="col-12">
                        <label class="form-label col-form-label-sm">Feedback</label>
                        {{-- <input type="text" class="form-control form-control-sm" name="feedback" id="" value = "{{$reopen_complain->feedback}}" disabled> --}}
                        <textarea class="form-control form-control-sm" name="feedback" id="" cols="30" rows="3"
                            disabled>{{ $reopen_complain->feedback }}</textarea>
                        <span class="text-danger col-form-label-sm">
                            @error('opt')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @endif
                <div class="col-12">
                    <label for="inputAddress2" class="form-label col-form-label-sm">Problem description<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control form-control-sm" name="pd" placeholder="Write a problem here"
                        id="floatingTextarea2" style="height: 100px" disabled>{{ $complain->pd }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('pd')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-12 m-auto mt-3">
                    <label class="form-label col-form-label-sm">Customer Uploaded Image</label>
                    @foreach ($images as $image)
                        <img src="{{ asset('storage/' . str_replace('public/', '', $image->url)) }}"
                            class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                    @endforeach
                </div>
                @if (count($reopen_images) > 0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Customer Uploaded Image (Re-opened)</label>
                        @foreach ($reopen_images as $rimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $rimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                @if (count($dept_images)>0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Department Work Proof Image</label>
                        @foreach ($dept_images as $dimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $dimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                @if (count($dept_reopen_images)>0)
                    <div class="col-12 m-auto mt-3">
                        <label class="form-label col-form-label-sm">Department Work Proof Image (Re-opened)</label>
                        @foreach ($dept_reopen_images as $drimage)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $drimage->url)) }}"
                                class="img-fluid img-thumbnail" id="up-img4" alt="Complaint Image">
                        @endforeach
                    </div>
                @endif
                <div class="col-md-4">
                    <label for="inputEmail4" class="form-label col-form-label-sm">Status</label>
                    <select id="inputState" name="status" class="form-select form-select-sm"
                        onchange="showDiv(this)">
                        <option value="1" {{ old('status', $complain->status) == 1 ? 'selected' : '' }}>Active
                        </option>
                        <option value="0" {{ old('status', $complain->status) == 0 ? 'selected' : '' }}>Solved
                        </option>
                        <option value="2" {{ old('status', $complain->status) == 2 ? 'selected' : '' }}>Pending
                        </option>
                        <option value="3" {{ old('status', $complain->status) == 3 ? 'selected' : '' }}>Rejected
                        </option>
                        <option value="4" {{ old('status', $complain->status) == 4 ? 'selected' : '' }}>Re-opened
                        </option>
                    </select>
                    <span class="text-danger col-form-label-sm">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div id="hidden_div" style="display: none">
                    <label class="form-label col-form-label-sm">Reason for Rejection<span
                            class="text-danger">*</span></label>
                    <textarea name="rejection_reason" class="form-control form-control-sm col-2 ">{{ $complain->rejection_reason }}</textarea>
                    <span class="text-danger col-form-label-sm">
                        @error('rejection_reason')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row-2 mt-3 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil me-2"></i>Edit
                        complain</button>
                    <a name="" id="" class="btn btn-danger ms-2"
                        href="{{ url('/adlogin/addash/view') }}" role="button"><i
                            class="bi bi-caret-left-fill me-1"></i>
                        Back</a></li>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        function showDiv(select) {
            if (select.value == 3) {
                document.getElementById('hidden_div').style.display = "block";
            } else {
                document.getElementById('hidden_div').style.display = "none";
            }
        }
    </script>
</body>

</html>
