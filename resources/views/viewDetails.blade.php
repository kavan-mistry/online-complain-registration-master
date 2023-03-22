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

    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
</head>

<body>
    <div class="container-fluid d-flex row justify-content-center align-items-center mt-4">
        <h1 style="background-color: lavender;" class="text-center p-2">
            complain details
        </h1>
        <div class="container w-50">
            @foreach ($complain as $complain)
                <div class="card p-0">
                    <div class="card-header fw-bold">
                        Complaint ID:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->complain_id }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Name:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->name }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Address:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->address }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        City:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->city }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        State:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->state }}</li>
                    </ul>
                    <div class="card-header fw-bold">
                        Zip:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $complain->zip }}</li>
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
                        <li class="list-group-item">{{ $complain->dept }}</li>
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
                        Uploaded Image:
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file)) }}"
                                class="img-fluid img-thumbnail" alt="Complaint Image">
                        </li>
                    </ul>
                </div>
            @endforeach

            <a name="" id="" class="btn btn-primary m-3" href="{{ url('login/dash') . '/view' }}"
                role="button">back</a>
        </div>
        {{-- <div>
                <p>Complaint ID: {{ $complain->complain_id }}</p>
                <p>Name: {{ $complain->name }}</p>
                <p>Email: {{ $complain->email }}</p>
                <p>Address: {{ $complain->address }}</p>
                <p>City: {{ $complain->city }}</p>
                <p>State: {{ $complain->state }}</p>
                <p>Zip: {{ $complain->zip }}</p>
                <p>Problem Type: {{ $complain->pt }}</p>
                <p>Department: {{ $complain->dept }}</p>
                <p>Mobile Number: {{ $complain->mob }}</p>
                <p>Problem Description: {{ $complain->pd }}</p> --}}
        {{-- <img src="{{ url('storage/app/' . $complain->file) }}" class="img-thumbnail" alt="Complaint Image"> --}}
        {{-- <img src="{{ asset('storage/' . str_replace('public/', '', $complain->file)) }}"
                    class="img-fluid img-thumbnail" alt="Complaint Image">
            </div> --}}

        {{-- <button type="submit" class="btn btn-primary m-3" url={{ url('login/dash') . '/' . $cid . '/view' }}>back</button> --}}

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
