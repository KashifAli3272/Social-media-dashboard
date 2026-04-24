<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Social App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1d2b64, #f8cdda);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            border-radius: 15px;
        }
        .brand-title {
            font-weight: bold;
            font-size: 28px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="text-center mb-4 text-white">
                <div class="brand-title">Social App</div>
                <p class="small">Connect • Share • Explore</p>
            </div>

            <div class="card shadow-lg auth-card">
                <div class="card-body p-4">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
