# Kekso (ExC) test task'ai, woo!

Nu kažkas lyg ir gavos, labai nepavyko schedulerio istestuot, nes ant Windozes pasikurt pain in the posterior.\
Bet manually per artisan'ą veikia tvarkingai, ir bandant schedule:run erroru nemeto :)

## Package installation

- composer require exc/todo dev-master\
  composer require exc/weather dev-master
  
- php artisan migrate

- config/app.php
<pre>
    'providers' => [
        ....
        Exc\Todo\TodoServiceProvider::class,
        Exc\Weather\WeatherServiceProvider::class,
        ....
    ]
</pre>

- pasiekiama adresais\
    *host*/todo\
    *host*/weather