<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

</head>
<body>
    <section>
        <div class="loginBox"> 
            <img class="user" src="{{ asset('assets/images/user.png') }}" height="100px" width="100px">
            <h3>Login here</h3>
            @error('email')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
            @error('password')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror
            <form method="POST" action="{{ route('login') }}"> @csrf
                <div class="inputBox"> 

                  <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  <input id="password" type="password" name="password" placeholder="Password" required autocomplete="password">

                </div> 
                <input type="submit" name="" value="Login">
            </form> 
            <div class="text-center">
                <p class="text-dark">If new here, Please Signup!</p>
                <a class="signUp" href="{{ route('register') }}">Signup</a>
            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>