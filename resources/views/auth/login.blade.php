<!DOCTYPE html>
<html lang="en">

<head>
    <title>login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('assets/css/css-login/images/icons/favicon.ico')}}">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/css/css-login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/css/css-login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/css-login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('assets/css/css-login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/css-login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/css-login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/css-login/css/main.css')}}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="warp-login-pic">
                {{-- <div class="login100-pic js-tilt" data-tilt> --}}
                    <img src="{{url('assets/css/css-login/images/login.jpg')}}" width="470px" height="380px">
                {{-- </div> --}}
            </div>
            <div class="line">
            </div>
            <div class="login-form">
            <span class="login100-form-title">
                Welcome to
                <br>
                Database Angkutan Umum Kota Bandung
            </span>
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                    <input id="email" type="email" class="form-control input100 @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                    <span class="focus-input100"></span>
                    
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">

                    <input id="password" type="password"
                        class="form-control input100 @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn  pl-5 pr-1">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>

                </div>

                </form>
            </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="{{asset('assets/css/css-login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/css/css-login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assets/css/css-login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/css/css-login/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/css/css-login/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{asset('assets/css/css-login/js/main.js')}}"></script>

</body>

</html>