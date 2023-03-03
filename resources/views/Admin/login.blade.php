<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('Admin_styles/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('Admin_styles/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('Admin_styles/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('Admin_styles/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('Admin_styles/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        @if(session()->has('login_message'))
                        <div class="alert alert-danger">
                            {{session('login_message')}}
                        </div>
                        @endif
                        @if(session()->has('logout'))
                        <div class="alert alert-success">
                            {{session()->get('logout')}}
                        </div>
                        @endif
                        <div class="login-form">
                            <form action="{{route('Admin.auth')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    @if(session()->has('errorEmail'))
                                    <small class="text-danger">
                                        {{session()->get('errorEmail')}}
                                    </small>
                                    @endif
                                </div>
                                <div class="form-group m-b-20">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @if(session()->has('errorPassword'))
                                    <small class="text-danger">
                                        {{session()->get('errorPassword')}}
                                    </small>
                                    @endif
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Main JS-->
    <script src="{{asset('Admin_styles/js/main.js')}}"></script>
</body>

</html>