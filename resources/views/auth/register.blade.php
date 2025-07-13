<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdventHealth Register</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/8a42449199.js" crossorigin="anonymous"></script>
</head>
<body>
    <x-alert/>
    <div class="row register-navbar">
        <div class="col-lg-4">
            <div class="register-logo">
                <img src="{{ asset('/images/logo.svg') }}" width="150" alt="">
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-center gap-3 setup" style="color: #005eb8">
            <h3>Setup</h3>
            <i class="fa-solid fa-arrow-right"></i>
            <h3>Connect Records</h3>
            <i class="fa-solid fa-arrow-right"></i>
            <h3>Set Location</h3>
        </div>
    </div>
    <div class="register-box">
        <h3>Let's get started!</h3>
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <label for="">First Name</label>
                    <input type="text" name="fname" placeholder="First Name" value="{{ old('fname') }}">
                </div>
                <div class="col-lg-6">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" value="{{ old('lname')}}" placeholder="Last Name"> 
                </div>
                <div class="col-lg-12">
                    <label for="">Email Address</label>
                    <input type="email" name="email" value="{{ old('email')}}" placeholder="email@domain.com">
                </div>
                <div class="col-lg-6">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="col-lg-6">
                    <label for="">Re-Enter Password</label>
                    <input type="password" name="password_confirmation" placeholder="Re-Enter Password">
                </div>
            </div>
            <div class="register-submit">
                <button>Create My Account</button>
            </div>
            <p>Already have an AdventHealth account? <a href="{{ route('login') }}">Sign In</a></p>
        </form>
    </div>
    <p style="text-align: center">Copyright © 2025 AdventHealth. All rights reserved.</p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
