<?php

namespace Exc\Weather\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use Exc\Weather\Models\Subscribtion;
use Exc\Weather\Models\Location;
use Exc\Weather\Models\Notification;
use Exc\Weather\WeatherHandler;
use Exc\Weather\Mail\NotificationMail;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check wind speed and notify users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $location = Location::first();
        if ($location == null) {
            $this->info('Location not set');
            return;
        }
        
        $windSpeed = WeatherHandler::getWindSpeed($location->locationstring);
        
        // for testing
        // $windSpeed = rand(0, 100) / 5;
        
        $notification = Notification::getStatus();
        
        $this->info("Wind speed @ $location->locationstring: $windSpeed");
        $this->info($notification->message);
        
        if ($windSpeed > WeatherHandler::WIND_SPEED_THRESHOLD && $notification->status != 'wind_up') {
            $this->info('Sending notifications for wind speed increasing');
            $this->notify("Weather by ExC - wind increasing!", "Wind speed in $location->locationstring increasing! Current speed: $windSpeed m/s");
            Notification::create(['status' => 'wind_up']);
        } elseif ($windSpeed < WeatherHandler::WIND_SPEED_THRESHOLD && $notification->status == 'wind_up') {
            $this->info('Sending notifications for wind speed decreasing');
            $this->notify("Weather by ExC - wind decreasing!", "Wind speed in $location->locationstring decreasing! Current speed: $windSpeed m/s");
            Notification::create(['status' => 'wind_down']);
        }
    }
    
    private function notify($subject, $content)
    {
        $subscribtions = Subscribtion::all();
        
        foreach ($subscribtions as $subscribtion) {
            $this->info($subscribtion->id . ': ' . $subscribtion->email);
            Mail::to($subscribtion->email)->send(new NotificationMail($subject, $content, $subscribtion->id));
        }
    }
}
