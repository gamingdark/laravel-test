<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather by ExC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
                max-width: 600px;
                margin: 0 auto;
            }

            .title {
                font-size: 84px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    Weather
                </div>
                <div class="location">
                    <p>Current location: {{$location}}</p>
                    <form action="{{url('/weather/location')}}" method="post">
                        <input type="text" name="locationstring"/>
                        <input type="submit" value="Set location"/>
                    </form>
                </div>
                <div class="weather">
                    <p>Weather info:</p>
                    {!!$info!!}
                    <p>Last notification: <span>{{$notification}}</span></p>
                </div>
                <div class="emails">
                    <p>Subscribed emails:</p>
                    <ul>
                        @foreach ($subscribtions as $subscribtion)
                            <li>{{$subscribtion->email}} <a href="{{url('/weather/unsubscribe')}}/{{$subscribtion->id}}">Remove</a></li>
                        @endforeach
                    </ul>
                    <form action="{{url('/weather/subscribe')}}" method="post">
                        <input type="text" name="email"/>
                        <input type="submit" value="Subscribe"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>