<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Mcr - Laravel Meetup in Manchester, UK</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body, a {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            a {
              text-decoration: none;
            }
            .meetup a:hover {
              border-bottom: 1px solid;
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
                color:#f75e54;
                font-size: 84px;
            }

            .links {
                margin-bottom: 40px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links > a:hover {
                color:#f75e54;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .fab {
                vertical-align: middle;
                font-size:2em;
            }

            .meetup {
                font-size:1.5em;
                line-height: 1.5em;
            }
            .meetup span {
                font-weight: 400;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel <span>Mcr</span>
                </div>

                <div class="links">
                    <a href="https://github.com/laravelmcr" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://meetup.com/laravel-mcr" target="_blank"><i class="fab fa-meetup"></i></a>
                    <a href="https://twitter.com/mcrlaravel" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>

                <div class="meetup">
                    <p><span>Next Meetup:</span> <a href="{{ $nextMeetup['link'] }}" target="_blank">{{ $nextMeetup['time']->format('ga') }}, {{ $nextMeetup['date']->format('jS F Y') }} @ {{ $nextMeetup['location'] }}</a></p>
                </div>


            </div>
        </div>


    </body>
</html>
