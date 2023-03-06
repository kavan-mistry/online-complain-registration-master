<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <main>

        <div class="container-sm">
            <h1>
                complain details
            </h1>
            @foreach ($complain as $complain)
                <div>
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
                    <p>Problem Description: {{ $complain->pd }}</p>
                    {{-- <img src="{{ url('storage/app/' . $complain->file) }}" class="img-thumbnail" alt="Complaint Image"> --}}
                    <img src="{{ asset('storage/' .str_replace('public/', '', $complain->file)) }}" class="img-fluid img-thumbnail" alt="Complaint Image">
                </div>
            @endforeach
            {{-- <button type="submit" class="btn btn-primary m-3" url={{ url('login/dash') . '/' . $cid . '/view' }}>back</button> --}}
            <a name="" id="" class="btn btn-primary m-3" href="{{ url('login/dash') . '/' . $cid . '/view' }}"
                        role="button">back</a>
        </div>

    </main>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
