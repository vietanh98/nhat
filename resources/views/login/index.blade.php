<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Cloud Login Form Responsive Widget Template :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Cloud Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <link rel="stylesheet" href="{{secure_asset('backend/css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{secure_asset('backend/css/fontawesome-all.css')}}">

</head>

<body>
    <h1>
        Welcome, Login Admin
    </h1>

    <!-- content -->
    <div class="container">
        <!-- content form -->
        <div class="sub-main-w3">
            <form method="post" action="{{ route('admin.post.login')}}" id = "form-login">
                {{ csrf_field() }}
                @if (session('status'))
                <p style="color: Red; font-size:16px;font-family: 'Encode Sans Condensed', sans-serif;"> {{ session('status') }}</p>
                @endif
                <div class="form-style-agile" >
                    <label>
                        <i class="fas fa-user"></i>
                        Username
                    </label>
                    <input placeholder="Username" name="email" type="text" id="email">
                    @if($errors->has('email'))
                    <p style="color: Red; font-size:16px;font-family: 'Encode Sans Condensed', sans-serif;" id="email_validate">{{$errors->first('email')}}</p>
                    @endif
                </div>
                <div class="form-style-agile" id="password">
                    <label>
                        <i class="fas fa-unlock-alt"></i>
                        Password
                    </label>
                    <input placeholder="Password" name="password" type="password"  id="password">
                    @if($errors->has('password'))
                    <p style="color: Red; font-size:16px;font-family: 'Encode Sans Condensed', sans-serif;" id="password_validate">{{$errors->first('password')}}</p>
                    @endif
                </div>
                <input type="submit" value="Log In">
            </form>
        </div>
        <!-- //content form -->
    </div>
    <!-- //content -->
</body>
<script src="{{secure_asset('backend/js/validate.js')}}"></script>

</html>
