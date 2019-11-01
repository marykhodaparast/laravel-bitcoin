<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
    @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
    </div> --}}
    <div style="text-align:center;margin-top:100px;">
        <div style="padding-left:5%;padding-right:5%;">
            <input type="text" />
            <select>
                @foreach($currencies as $currency)
                <option>
                    <span
                        style="background-color:#3f3f94;color:white;padding-left:1%;padding-right:1%;">{{ $currency->name }}
                        {{-- <a href="#" style="color:white;text-decoration:none"><i class="fa fa-angle-down"></i></a> --}}
                    </span>
                </option>
                @endforeach

            </select>
            <div style="width:10%;height:auto;background-color:pink;margin-left:auto;margin-right:216px;">

            </div>
        </div>
        <a href="#"><i class="fa fa-exchange" style="transform:rotate(90deg);margin-top:20px"></i></a>
        <div style="margin-top:20px;">
            <input type="text" />
            <select>
                    @foreach($currencies as $currency)
                    <option>
                        <span
                            style="background-color:#3f3f94;color:white;padding-left:1%;padding-right:1%;">{{ $currency->name }}
                            {{-- <a href="#" style="color:white;text-decoration:none"><i class="fa fa-angle-down"></i></a> --}}
                        </span>
                    </option>
                    @endforeach
            </select>
        </div>
    </div>
</body>
<script type="text/javascript">
    
</script>
</html>
