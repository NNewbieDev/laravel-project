<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ url('css/main.css') }}">  --}}
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <div class="header bg-dark">
        Layout sẽ apply vào sau

        <div class="btn-login">
            <a href="{{ route('login') }}">Đăng nhập</a>
        </div>

        <div class="btn-register">
            <a href="{{ route('register') }}">Đăng kí</a>
        </div>
    </div>
</body>

</html>
