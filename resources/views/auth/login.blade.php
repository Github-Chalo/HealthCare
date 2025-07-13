<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdventHealth Login</title>
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #f5f5f5, #ffffff) !important;
            overflow: hidden;
        }

        body .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(135deg, #005eb8 50%, transparent 50%),
                        linear-gradient(45deg, #72bf44 50%, transparent 50%) !important;
            background-size: 50% 50%;
            background-repeat: no-repeat;
        }

        body .background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top right, #005eb8, #72bf44);
            clip-path: polygon(0 0, 100% 0, 60% 100%, 0 100%) !important;
            z-index: -1;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
    width: 800px;
    background-color: #fff;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 20px;
}
.logo-box{
    height: 150px;
    width: 150px;
    margin: 5px auto;
}

.logo-box img{
    width: 100%;
    height: 100%;
}

.login-box input{
    width: 100%;
    height: 60px;
    border-radius: 5px;
    margin: 5px auto;
    border: 1px solid #555;
    padding-left: 8px;
}
.login-box input:focus{
    outline: 1px solid #005eb8;
}

.login-box .login-btn{
    width: 100%;
    height: 60px;
    border-radius: 30px;
    border: none;
    outline: none;
    background: #005eb8;
    color: #fff;
    margin: 10px auto;
    font-weight: bold;
}

.login-box .create-btn{
    border-radius: 30px;
    border: none;
    outline: none;
    background: rgb(245, 243, 243);
    text-decoration: none;
    padding: 15px 60px;
    border: 1px solid #005eb8;
    font-weight: bolder;
}

.login-box .middle{
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-box .forgot a{
    float: right;
    text-decoration: none;
    font-weight: bold;
}

        


    </style>
</head>
<body>
    <x-alert/>
    <div class="background"></div>
    <div class="container">
        <div class="login-box">
            <div class="logo-box">
                <img src="{{ asset('/images/logo.svg') }}" alt="sdfsf">
            </div>
            <form action="{{ route('postLogin') }}" method="POST">
                @csrf
                <div class="col-lg-12">
                    <label for="">Email Address</label>
                    <input type="text" name="email" id="" placeholder="Enter your email">
                </div>
                <div class="col-lg-12">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Enter your password">
                </div>
                <div class="forgot">
                    <a href="">Forgot Password?</a>
                </div>
                <div class="col-lg-12">
                    <button class="login-btn">Sign In</button>
                </div>
            </form>
            <div class="col-lg-12 middle">
                <a href="{{ route('register') }}" class="create-btn">Create Account</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
