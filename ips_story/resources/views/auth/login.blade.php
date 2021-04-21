<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IPS</title>
    <meta name="description" content="IPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  --}}
    <link rel="stylesheet" href="{{asset('assets\bootstrap\dist\css\bootstrap.min.css')}}"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    {{--  <link rel="stylesheet" href="{{asset('all.css')}}"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">  --}}

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        /* Made with love by Mutiullah Samim*/

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            /* C:\xampp\htdocs\ips_story\ips_story\public\images\contabildiade-scaled.jpg */
            /* C:\xampp\htdocs\ips_story\ips_story\public\images\Como-manter-a-sua-contabilidade-em-dia_-Siga-nossas.jpg */
            /* C:\xampp\htdocs\ips_story\ips_story\public\images\76cc04ac46709de6ff5413dca2479e5f.jpg */
            /* background-image: url("{{asset('/images/544750.jpg')}}"); */
            background-image: url("{{asset('/images/contabildiade-scaled.jpg')}}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #1285FF;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #1285FF;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #1285FF;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">

                    {{-- _____________________________________________________________________________________________ --}}


                    {{-- <div class="card-body"> --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            {{-- <div class="col-md-12"> --}}
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- </div> --}}
                        </div>


                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="password" placeholder="Password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- </div> --}}
                        </div>

                        <div class="row align-items-center remember">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}> 

                                {{-- <label class="form-check-label" for="remember"> --}}
                                    {{ __('Remember Me') }}
                                {{-- </label> --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn float-right login_btn">
                                {{ __('Login') }}
                            </button>
                        </div>


                        <div class="card-footer">

                            <div class="d-flex justify-content-center">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif

                            </div>
                        </div>
                        {{-- </div> --}}
                        {{-- </div> --}}
                    </form>
                    {{-- </div> --}}

                </div>
            </div>
        </div>
    </div>

</body>

</html>