<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Mailedit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/components/login.css') }}" />
</head>
<body>
    <div class="wrap">
        <div class="row h-100">
        <div class="col-sm-4 text-center" id="login-left">
            <div>
                <img class="m-t-2" id="mailman" src="{{ asset('img/postman.svg') }}" alt="">
            </div>
            <div class="m-t-1">
                <h2 class="m-b-1">Log In</h2>
                <span>Need a Mailedit account?</span> 
                <a href="{{ route('register') }}">Create Account</a>

                <!-- Errors  -->
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <!-- end errors -->
            </div>
            <div class="login_wrap">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="email"
                            value="{{ old('email') }}" required autofocus
                            placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password"
                            value="{{ old('password') }}" required autofocus
                            placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                    </div>
                </form>
            </div>
            <footer class="m-t-1">
                <span>&copy;Mailedit</span>
            </footer>
        </div>
        <div class="col" id="login-right">
            <div class="row">
                <div class="col-sm-5">
                    <div class="m-t-5 p-1 m-l-2">
                        <h2 class="m-t-2">Lorme heading</h2>
                        <div class="m-b-1">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Ducimus delectus, voluptatum, necessitatibus, quo possimus 
                        eveniet modi quam doloremque earum quia veniam dicta.    
                        </div>
                        <a href="#" class="btn btn-warning"><strong>Find out how</strong></a>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                    <img id="mail-big" src="{{ asset('img/email.svg') }}" alt="">
                </div>
                <div class="text-center">
                    <h1>Mailedit</h1>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>