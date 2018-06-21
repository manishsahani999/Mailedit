<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Mailedit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/components/login.css') }}" />
</head>
<body>
    <div class="wrap">
        <div class="row">
        <div class="col-sm-4 text-right" id="register-left">
            <div>
                <img class="m-t-5" id="register-icon" src="{{ asset('img/email.svg') }}" alt="">
            </div>
        </div>
        <div class="col m-l-2" id="register-right">
            <div class="m-t-5">
                <h2>Get Started with free account</h2>
            </div>
            <div class="register_wrap m-t-2">
                <div class="m-b-2">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Inventore praesentium consequuntur,
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                name="name" value="{{ old('name') }}"
                                required autofocus
                                placeholder="Username">
                    </div>
                    <div class="form-group">
                            <input type="text" class="form-control form-control-lg"
                                name="email" value="{{ old('email') }}"
                                required autofocus
                                placeholder="Email">
                    </div>
                    <div class="form-group">
                            <input type="password" class="form-control form-control-lg"
                                name="password" required autofocus
                                placeholder="Password">
                    </div>
                    <div class="form-group">
                            <input type="password" class="form-control form-control-lg"
                                name="password_confirmation" required autofocus
                                placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary register-btn">Get Started</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>