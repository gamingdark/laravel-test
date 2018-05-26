<?php

namespace Exc\Weather;

use GuzzleHttp\Client;

class WeatherHandler
{
    const APP_ID = '5f013fa005e6c45522adad8cc0659bd4';
    const WIND_SPEED_THRESHOLD = 10;
    
    public static function getWeatherData($locationstring)
    {
        $client = new Client();
        $response = $client->request('GET', "api.openweathermap.org/data/2.5/weather?q=$locationstring&appid=".WeatherHandler::APP_ID."&mode=html");
        return $response->getBody();
    }
    
    public static function getWindSpeed($locationstring)
    {
        $client = new Client();
        $response = $client->request('GET', "api.openweathermap.org/data/2.5/weather?q=$locationstring&appid=".WeatherHandler::APP_ID);
        $weatherInfo = json_decode($response->getBody());
        return $weatherInfo->wind->speed;
    }
}