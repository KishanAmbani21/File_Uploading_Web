<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

body{
  background: #37517e;
}

    </style>
</head>

<body>
    <section class="vh-100 bg-image"
        >
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Login Page</h2>

                                <form action="{{ route('loginUser') }}" method="POST" enctype="multipart/form-data">
                                    @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                    @if (Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                    @endif
                                    @csrf
                                    
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="form3Example3cg" style="padding-left: 18px; padding-bottom: 5px; font-size:20px;">Email :</label>
                                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="Email" placeholder="Enter Email" value="{{ old('Email') }}"  >
                                        <span class="text-danger">@error('Email') {{ $message }} @enderror</span>
                                    </div>


                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label for="form3Example4cg" style="padding-left: 18px; padding-bottom: 5px; font-size:20px;">Password :</label>
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="Password" placeholder="Enter Password" value="{{ old('Password') }}"  >
                                        <span class="text-danger">@error('Password') {{ $message }} @enderror</span>
                                        </div>

                                    <div class="d-flex justify-content-center">
                                        <input type="submit" data-mdb-button-init class="btn btn-danger px-5 mt-2" value="Login">
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">If you don't have an account? Please <a href="register"
                                        class="fw-bold text-body"><u>Register here</u></a></p>

                                     
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>