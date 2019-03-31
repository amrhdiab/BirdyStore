<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login | {{$settings['website_name']}}</title>

    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="{{asset('/app/images/favicons/store-white_favicon 16x20.png')}}" sizes="16x20">

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div>
                    <img src="{{asset('/storage/settings')}}/{{$settings['logo2']}}" alt="site-logo2" height="90px" width="90px">
                </div>
                <br>
                <form method="POST" action="{{ route('admin.login.submit') }}">
                    {{ csrf_field() }}
                    <h1>Admin Login</h1>
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="E-Mail Address" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                               required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary submit">
                            Login
                        </button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix"></div>
                        <div>
                            <a href="/">
                                <h1><i class="fa fa-shopping-basket"></i> {{strtoupper($settings['website_name'])}}</h1>
                            </a>
                            <p style="margin-top: -33px">©2019 All Rights Reserved. {{$settings['website_name']}} - E-commerce Website by Amr Diab</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
