<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mailedit | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/components/login.css') }}" />
</head>
<body>
    <div class="wrap">
        <div class="row">
        <div class="col-sm-3 text-center" id="login-left">
            <div>
                <img class="m-t-2" id="mailman" src="{{ asset('img/postman.svg') }}" alt="">
            </div>
            <div class="p-1">
                <h2>Log In</h2>
            </div>
            <div class="login_wrap">

            </div>
        </div>
        <div class="col" id="login-right">
            <div class="text-center">
                <img class="m-t-5" id="mail-big" src="{{ asset('img/mail_1.svg') }}" alt="">
            </div>
            <div class="text-center">
                <h1>Mailedit</h1>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>