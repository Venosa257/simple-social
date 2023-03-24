<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Simple Social</title>

    <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
    <!-- Style -->
    <style>
        body {
            background-color: #f0f2f5;
            padding-top: 70px;
        }
        .navbar {
            background-color: #ffffff;
            border-color: #38393a !important;
        }
        .main-content {
            margin: 0px 7rem !important;
        }
        .bg-card-color {
            background-color: #ffffff;
        }
        .custom-btn-size {
            width: 100%;
        }
    </style>


</head>
<body>
    @include('partials.navbar')
    <div class="container-fluid mt-3">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>feather.replace()</script>
</body>
</html>