<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SUZURAN</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        /* Custom CSS */
        .section {
            padding: 50px 0;
        }

        .card {
            margin-bottom: 30px;
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- Navbar -->

    <!-- CONTENT -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="mb-5">Estrakurikuler di SMK Suzuran </h2>
                </div>
            </div>
            <div class="row">
                @foreach ($eskul as $data)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{asset('/storage/ekskuls/' . $data->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->ekskul}}</h5>
                            <p class="card-text">{{$data->deskripsi}}</p>
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- CONTENT -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- Footer -->

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>
