<!doctype html>
<html lang="en">

<head>
    <title>Zakia-Farmasi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/login/css/style.css">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Zakia - Farmasi</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Login Dulu Gaes</h3>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="post" class="login-form" action="{{ route('login.auth') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="username" placeholder="Username" value="{{ old('username')}}">
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" name="password" placeholder="Password" value="{{ old('password')}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/login/js/jquery.min.js"></script>
    <script src="/assets/login/js/popper.js"></script>
    <script src="/assets/login/js/bootstrap.min.js"></script>
    <script src="/assets/login/js/main.js"></script>

</body>

</html>